<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Admin;

class AdminLoginController extends Controller
{

    public function __construct()
    {
      $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
      return view('auth.admin_login');
    }



    public function login(Request $request)
    {


        // $users = Admin::all();

      // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
      ]);
      // Attempt to log the user in
      if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
        // if successful, then redirect to their intended location
        // return redirect()->intended(route('admin.manage_admins'));
    return redirect('admin/manage_categories');

        // return redirect('auth/admin')->intended;

      }
      // if unsuccessful, then redirect back to the login with the form data
    //   return redirect()->back()->withInput($request->only('email', 'remember'));
    // return redirect()->intended(route('admin.a'));
    return redirect('admin/manage_categories');


    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }


    public function index()
    {
        return view('auth.admin');
    }
}
