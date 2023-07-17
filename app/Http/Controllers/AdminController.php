<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\User;
use App\Models\UserActivity;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    /************************************************************************
    *Activity index
    *************************************************************************/
    public function dashboard()
    {
        //Fetch activities
        $activities = Activity::orderBy('created_at')->get();
        return view('admin.activity.index', compact('activities'));
    }

    /************************************************************************
    *Create activity
    *************************************************************************/
    public function createActivity()
    {
        return view('admin.activity.create');
    }

    /************************************************************************
    *Store activity
    *************************************************************************/
    public function storeActivity(Request $request)
    {
        //Validate input values
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'date' => 'required|date',
        ]);

        //Check count of activity for a current day
        $activity_count = Activity::whereDate('date', $validatedData['date'])->count();
        if($activity_count >= 4) {
            return redirect()->back()->withErrors(['msg' => 'You can add upto 4 activities for the date: ' . $validatedData['date']])->withInput();
        }
        
        //Save activity
        $activity = new Activity();
        $activity->title = $validatedData['title'];
        $activity->description = $validatedData['description'];
        $activity->image = $request->file('image')->store('images','public'); //storing image in storage/app/public/images
        $activity->date = $validatedData['date'];
        $activity->save();

        $users = User::select('id')->where('is_super_admin', false)->get();

        //Add newly created activity to all the users
        foreach ($users as $user) 
        {
            $activity_count = UserActivity::where('user_id', $user->id)->whereDate('date', $validatedData['date'])->count();

            if(!($activity_count >= 4)) //Check if user has more than 4 activities including global and direct assigned activity
            {
                $user_activity = new UserActivity();
                $user_activity->user_id = $user->id;
                $user_activity->activity_id = $activity->id;
                $user_activity->title = $validatedData['title'];
                $user_activity->description = $validatedData['description'];
                $user_activity->image = $request->file('image')->store('images','public'); //storing image in storage/app/public/images
                $user_activity->date = $validatedData['date'];
                $user_activity->is_global = 1; //Added globally
                $user_activity->save();
            }
        }

        return redirect()->route('admin.dashboard')->with('success', 'Activity created successfully.');
    }

    /************************************************************************
    *Admin - edit activity
    *************************************************************************/
    public function editActivity($id)
    {
        $activity = Activity::find($id);
        return view('admin.activity.edit', compact('activity'));
    }

    /************************************************************************
    *Update activity
    *************************************************************************/
    public function updateActivity(Request $request)
    {
        //Validate input values
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'date' => 'required|date',
        ]);

        $activity = Activity::where('id', $request->activity_id)->first();

        //Check count of activity for a current day
        $activity_count = Activity::whereDate('date', $validatedData['date'])->count();
        if($validatedData['date'] != $activity->date && $activity_count >= 4) {
            return redirect()->back()->withErrors(['msg' => 'You can add upto 4 activities for the date: ' . $validatedData['date']])->withInput();
        }

        $activity->title = $request->title;
        $activity->description = $request->description;

        if($request->file('image')) //updating image if image exists in request
        {
           $activity->image = $request->file('image')->store('images','public'); //storing image in storage/app/public/images
        }

        $activity->date = $request->date;
        $activity->save();

        //update user activity which is not edited
        $user_activities = UserActivity::where('activity_id', $activity->id)->where('is_edited', false)
                                ->update([
                                    'title' => $request->title,
                                    'description' => $request->description,
                                    'image' => $activity->image,
                                    'date' => $request->date
                                ]);

        return redirect()->route('admin.dashboard')->with('success', 'Activity updated successfully.');
    }

    /************************************************************************
    *Delete activity
    *************************************************************************/
    public function deleteActivity(Request $request)
    {
        if ($request->ajax())
        {
            $activity = Activity::find($request['id']);

            //delete user activity which is not edited
            UserActivity::where('activity_id', $activity->id)->where('is_edited', false)->delete();

            //delete global activity
            $activity->delete();
        }
        return response()->json(['success'=>'Activity deleted successfully.']);
    }


    /************************************************************************
    *Check count of activities for selected date
    *************************************************************************/
    public function checkActivityCount(Request $request, $date)
    {
        if ($request->ajax())
        {
            $activity_count = Activity::whereDate('date', $date)->count();
        }
        return response()->json(['activity_count' => $activity_count]);
    }
}
