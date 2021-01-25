<?php

namespace App\Http\Controllers\Dashboard\V1;

use App\Token;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

class UserController extends DashboardController
{
    private function getPageTitle()
    {
        return "کاربران";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        -----------------------------
        if (Gate::allows('user-update'))
            $users = User::latest()->paginate(10);
        else
            abort(403);
//        -----------------------------
        $pageTitle = $this->getPageTitle() . " - لیست";
        return view('Dashboard.User.index', compact('pageTitle', 'users'));
    }



    public function create()
    {
    }

    public function store(Request $request)
    {

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
//        -----------------------------
        if ($user->id != auth()->user()->id)
        {
            if (Gate::denies('user-update'))
                abort(403);
        }
        else
            return redirect(route('website.home'  ));

        $pageTitle = $this->getPageTitle() . " - ویرایش";
//        -----------------------------
        return view('Dashboard.User.edit', compact('user', 'pageTitle' ));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if ($user->id != auth()->user()->id)
        {
            if (Gate::denies('user-update'))
                abort(403);
        }
        else
            return view('Dashboard.User.edit', compact('user', 'pageTitle' ));


        $validator = Validator::make($request->all(), [

            'username' => 'nullable|alpha_dash|min:6|max:255|string|unique:users,username,' . $user->id,
            'name' => 'nullable|string|max:255',

            'telephone' => 'nullable|string|max:255',

            'password' => 'nullable|string|min:6',

            'type' => 'nullable|string',
            'roles' => 'nullable|array',




        ]);
        if ($validator->fails()) {
            $this->errorMessage($validator);
            return redirect()->back()->withInput();
        }


        $type = $user->type;
        $blocked = !is_null($request->input('blocked')) ? true : false;

        if ($request->input('type'))
            $type = $request->input('type');


        $password = $user->password;
        if ($request->input('password'))
            $password = Hash::make($request->input('password'));


        $user->slug = null;



        $user->update([
            "username" => $request->input('username'),
            "name" => $request->input('name'),

            "password" => $password,
            "type" => $type,
            "blocked" => $blocked,



        ]);


        if (auth()->user()->isSuperAdmin())
        {
            $user->roles()->sync($request->input('roles'));
        }

        if ($user->id == auth()->user()->id)
            Auth::login($user);


        $this->successMessage(['عملیات موفیت آمیز بود']);

        return redirect()->to($request->input('redirects_to'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }


}
