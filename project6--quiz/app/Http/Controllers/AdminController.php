<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::all();
        return view("admin.manage_admin", compact("admins"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.manage_admin_create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:admins',
            'password'=>'required|min:8'
        ],
        [
            'name.required' => 'هذا الحقل مطلوب',
            'email.required' => 'هذا الحقل مطلوب',
            'email.unique' => 'البريد الإلكتروني موجود بالفعل',
            'password.required' => 'هذا الحقل مطلوب'
        ]
);

        Admin::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password
        ]);
        $admins = Admin::all();
        return view("admin.manage_admin", compact("admins"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin=Admin::where('id',$id)->first();
        return view("admin.manage_admin_edit",compact("admin"));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:admins',
            'password'=>'required|min:8'
        ]);

        Admin::where('id',$id)->update([

            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password
        ]);
        // $categories = Category::all();
        return redirect('admin/manage_admins');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($admin)
    {


        Admin::where('id',$admin)->delete();

        return redirect('admin/manage_admins')->with('success','تم حذف الصنف بنجاح');
    }
}
