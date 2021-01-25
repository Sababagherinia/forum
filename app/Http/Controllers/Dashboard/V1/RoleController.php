<?php

namespace App\Http\Controllers\Dashboard\V1;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Validator;

class RoleController extends DashboardController
{
    private function getPageTitle()
    {
        return "نقش";
    }


    public function __construct()
    {
        $this->middleware('super_admin');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        -----------------------------
        $roles = Role::latest()->paginate(10);
        $pageTitle = $this->getPageTitle() . " - لیست";
        return view('Dashboard.Role.index', compact('pageTitle', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::latest()->get();
//        -----------------------------
        $pageTitle = "نقش - ایجاد";
//        -----------------------------
        return view('Dashboard.Role.create', compact('pageTitle', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:2|max:255|unique:roles',
            'label' => 'required|min:2|max:255|unique:roles',
        ]);
        if ($validator->fails()) {
            $this->errorMessage($validator);
            return redirect()->back()->withInput();
        }

        $role = Role::create([
            'title' => $request->input('title'),
            'label' => $request->input('label'),
            'permissions' => 'nullable|array',
        ]);


        $role->permissions()->sync($request->input('permissions'));


        $this->successMessage(['عملیات موفقیت آمیز بود']);
        return redirect()->to($request->input('redirects_to'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
        $permissions = Permission::latest()->get();
        $pageTitle = $this->getPageTitle() . " - ویرایش";
        return view('Dashboard.Role.edit', compact('role', 'pageTitle', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Role $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:2|max:255|unique:roles,title,' . $role->id,
            'label' => 'required|min:2|max:255|unique:roles,label,' . $role->id,
            'permissions' => 'nullable|array',
        ]);
        if ($validator->fails()) {
            $this->errorMessage($validator);
            return redirect()->back()->withInput();
        }
        $role->update([
            "title" => $request->input('title'),
            "label" => $request->input('label'),
        ]);
        $role->permissions()->sync($request->input('permissions'));
//        -----------------------------
        $this->successMessage(['عملیات موفیت آمیز بود']);
        return redirect()->to($request->input('redirects_to'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Role $role)
    {
//        -----------------------------
        $role->delete();
//        -----------------------------
        $this->successMessage(['عملیات موفیت آمیز بود']);
        return redirect()->to($request->input('redirects_to'));
    }
}
