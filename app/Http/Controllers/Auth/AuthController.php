<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
use Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    const USER_ADMIN = 1;
    const USER_NORMAL = 0;
    //
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        if(!Auth::guest())
        {
            return redirect("/");
        }
        return view('auth.login');
    }  
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        if (!Auth::guest())
        {
            if (Auth::user()->roles === 1)
            {
                return view('auth.registration');
            }
        }
        return redirect("/")->withSuccess('Oppes! You don\' have any privileges to access this page!');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);
   
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], true)) {
            // ddd($request->session()->get('key'));
            return redirect()->intended('/');
        } else {
            return redirect()->back()->withInput([$request->input('email')])->withErrors('Wrong Email or Password. Please Try Again!');
        }
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("admin/users")->withSuccess('Great! You have Successfully added new users');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if(Auth::check() && Auth::user()->roles === 1){
            return view('admin-index');
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}
