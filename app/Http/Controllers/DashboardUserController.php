<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();

        $countUser = User::count();

        return view('dashboard.dashboard', [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'users' => $users,
            'countUser' => $countUser
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.action.create', [
            'title' => 'Create',
            'active' => 'create',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|max:30',
            'fullname' => 'required|max:100',
            'password' => 'required'
        ]);

        if($request->input('password')) {
            $validated['password'] = Hash::make($request->input('password'));
        }

        User::create($validated);

        return redirect()->back()->with('success', 'Create User Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
        */
        public function edit($id)
        {
            $user = User::findOrFail($id);;
            return view('dashboard.action.edit', [
                'title' => 'Edit',
                'active' => 'edit',
                'user' => $user
            ]);
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, $id)
        {
            $rules = [
                'fullname' => 'required',
                'username' => 'required'
            ];

            $validated = $request->validate($rules);

            User::where('id', $id)
            ->update($validated);

            return redirect()->back()->with('success', 'User Update Successfully');
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::destroy('id', $id);
        return redirect('/user')->with('successDelete', 'User Delete Successfully');
    }
}
