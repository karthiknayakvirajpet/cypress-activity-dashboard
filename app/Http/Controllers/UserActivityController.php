<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserActivity;
use App\Models\User;
use Illuminate\Support\Carbon;

class UserActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Fetch user and activity details
        $users = User::withCount('userActivity')->where('is_super_admin', false)->orderBy('created_at')->get();

        return view('admin.user_activity.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $user = User::find($id);
        return view('admin.user_activity.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validate input values
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'date' => 'required|date',
        ]);

        //Check count of activity for the user for current day
        $activity_count = UserActivity::where('user_id', $request->user_id)->whereDate('date', $validatedData['date'])->count();

        if($activity_count >= 4) {
            return redirect()->back()->withErrors(['msg' => 'You can add upto 4 activities for the date: ' . $validatedData['date']])->withInput();
        }

        //Save user activity
        $user_activity = new UserActivity();
        $user_activity->user_id = $request->user_id;
        $user_activity->title = $validatedData['title'];
        $user_activity->description = $validatedData['description'];
        $user_activity->image = $request->file('image')->store('images','public'); //storing image in storage/app/public/images
        $user_activity->date = $validatedData['date'];
        $user_activity->save();

        return redirect()->route('user-activities.show', ['user_activity'=>$request->user_id])->with('success', 'User Activity created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //Fetch user activities details
        $user_activity = UserActivity::where('user_id', $id)->orderBy('created_at')->get();
        $user = User::find($id);

        return view('admin.user_activity.show', compact('user_activity', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user_activity = UserActivity::find($id);
        return view('admin.user_activity.edit', compact('user_activity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Validate input values
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'date' => 'required|date',
        ]);

        $activity = UserActivity::where('id', $request->user_activity_id)->first();

        //Check count of activity for the user for current day
        $activity_count = UserActivity::where('user_id', $activity->user_id)->whereDate('date', $validatedData['date'])->count();

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
        $activity->is_edited = 1;
        $activity->save();

        return redirect()->route('user-activities.show', ['user_activity'=>$activity->user_id])->with('success', 'User Activity updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        if ($request->ajax())
        {
            $user_activity = UserActivity::find($id);
            $user_activity->is_edited = 1;
            $user_activity->save();
            $user_activity->delete();
        }
        return response()->json(['success'=>'User Activity deleted successfully.']);
    }


    /************************************************************************
    *Check count of user activities for selected date
    *************************************************************************/
    public function checkUserActivityCount(Request $request, $user_id, $date)
    {
        if ($request->ajax())
        {
            $activity_count = UserActivity::where('user_id', $user_id)->whereDate('date', $date)->count();
        }
        return response()->json(['activity_count' => $activity_count]);
    }
}
