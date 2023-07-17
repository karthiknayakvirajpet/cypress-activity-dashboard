<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class APIController extends Controller
{
    /************************************************************************
    *User registration API
    *************************************************************************/
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) 
        {
            return response()->json([
                'status' => 400, 
                'message' => 'Failed.',
                'data' => [],
                'error' => [ 'message' => $validator->errors() ]
            ])->setStatusCode(400);
        }

        //create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'status' => 201, 
            'message' => 'User registered successfully.',
            'data' => [],
            'error' => []
        ])->setStatusCode(201);
    }

    /************************************************************************
    *User login API
    *************************************************************************/
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) 
        {
            return response()->json([
                'status' => 400, 
                'message' => 'Failed.',
                'data' => [],
                'error' => [ 'message' => $validator->errors() ]
            ])->setStatusCode(400);
        }

        //login credentials
        $credentials = $request->only('email', 'password');

        //authentication logic
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            //update user login time
            $user->last_login_at = Carbon::now();
            $user->save();

            $token = $user->createToken('authToken')->plainTextToken; //create a token

            return response()->json([
                'status' => 200, 
                'message' => 'Success.',
                'data' => ['access_token' => $token, 'token_type' => 'Bearer',],
                'error' => []
            ])->setStatusCode(200);
        }

        return response()->json([
                'status' => 401, 
                'message' => 'Failed.',
                'data' => [],
                'error' => [ 'message' => 'Invalid credentials.' ]
            ])->setStatusCode(401);
    }

    /************************************************************************
    *Get logged users activity by date - API
    *************************************************************************/
    public function loggedUsersActivity(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'start_date' => 'required|date_format:d/m/Y',
            'end_date' => 'required|date_format:d/m/Y',
        ]);

        if ($validator->fails()) 
        {
            return response()->json([
                'status' => 400, 
                'message' => 'Failed.',
                'data' => [],
                'error' => [ 'message' => $validator->errors() ]
            ])->setStatusCode(400);
        }

        //change date format
        $start_date = Carbon::createFromFormat('d/m/Y', $request->start_date)->toDateString();
        $end_date = Carbon::createFromFormat('d/m/Y', $request->end_date)->toDateString();

        //fetch logged in users activities
        $user_activites = User::select('name as user_name', 'email', 'title as activity_title', 'description as activity_description', 'date as activity_date', 'is_global as is_global_activity', 'is_edited as activity_is_edited', 'user_activities.created_at as activity_created_at', 'user_activities.updated_at as activity_updated_at')
                    ->leftJoin('user_activities', 'users.id', '=', 'user_activities.user_id')
                    ->where('is_super_admin', false)
                    ->where('last_login_at', '!=', NULL)
                    ->whereBetween('user_activities.date', [$start_date, $end_date])
                    ->get();

        return response()->json([
                'status' => 200, 
                'message' => 'Success.',
                'data' => $user_activites,
                'error' => []
            ])->setStatusCode(200);
    }

}
