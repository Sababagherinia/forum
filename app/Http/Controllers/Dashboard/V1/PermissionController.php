<?php

namespace App\Http\Controllers\Dashboard\V1;

use App\Permission;
use Illuminate\Http\Request;
use Validator;

class PermissionController extends DashboardController
{
    private function getPageTitle()
    {
        return "دسترسی";
    }

    public function __construct()
    {
        $this->middleware('super_admin');
    }

    public function resetPermissions()
    { 
//        Permission::truncate();
        Permission::whereNotNull('id')->delete();
        foreach (Permission::permissionFields()['title'] as $title => $label) {
            foreach (Permission::permissionFields()['permission'] as $titleEnd => $labelEnd) {
                Permission::create([
                    "title" => $title . $titleEnd,
                    "label" => $labelEnd . " " . $label,
                ]);
            }
        }

        foreach (Permission::permissionCustomFields() as $customField)
        {
            Permission::create([
                "title" => $customField['title'],
                "label" => $customField['label'],
            ]);
        }

        $this->successMessage(['عملیات موفقیت آمیز بود']);
        return redirect(route('dashboard.permission.index'));

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::latest()->paginate(10);
        $pageTitle = $this->getPageTitle() . " - لیست";
        return view('Dashboard.Permission.index', compact('pageTitle', 'permissions'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        -----------------------------
        $pageTitle = $this->getPageTitle() . " - ایجاد";
//        -----------------------------
        return view('Dashboard.Permission.create', compact('pageTitle'));
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
            'title' => 'required|min:2|max:255|unique:permissions',
            'label' => 'required|min:2|max:255|unique:permissions',
        ]);
        if ($validator->fails()) {
            $this->errorMessage($validator);
            return redirect()->back()->withInput();
        }

        Permission::create([
            "title" => $request->input('title'),
            "label" => $request->input('label'),
        ]);


        $this->successMessage(['عملیات موفقیت آمیز بود']);
        return redirect()->to($request->input('redirects_to'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        //
        $pageTitle = $this->getPageTitle() . " - ویرایش";
        return view('Dashboard.Permission.edit', compact('permission', 'pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:2|max:255|unique:permissions,title,' . $permission->id,
            'label' => 'required|min:2|max:255|unique:permissions,label,' . $permission->id,
        ]);
        if ($validator->fails()) {
            $this->errorMessage($validator);
            return redirect()->back()->withInput();
        }
        $permission->update([
            "title" => $request->input('title'),
            "label" => $request->input('label'),
        ]);
//        -----------------------------
        $this->successMessage(['عملیات موفیت آمیز بود']);
        return redirect()->to($request->input('redirects_to'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Permission $permission)
    {
//        -----------------------------
        $permission->delete();
//        -----------------------------
        $this->successMessage(['عملیات موفیت آمیز بود']);
        return redirect()->to($request->input('redirects_to'));
    }

    public function reset(Request $request)
    {

    }
}
