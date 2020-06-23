<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('guest')->except('logout');
      $this->middleware('guest:admin')->except('logout');
      $this->middleware('guest:customer')->except('logout');
      $this->middleware('guest:deliverymen')->except('logout');

    }

    public function showAdminLoginForm()
    {
      return view('auth.login', ['url' => 'admin']);
    }

    public function adminLogin(Request $request)
    {
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
      ]);

      if (Auth::guard('admin')->attempt(['email' => $request->input('email') , 'password' => $request->input('password')])) {
        return redirect()->Route('admin.dashboard');
      }
      return back()->withInput($request->only('email', 'remember'));
    }

    public function showCustomerLoginForm()
  {
    return view('auth.login', ['url' => 'customer']);
  }

    public function customerLogin(Request $request)
  {
    $this->validate($request, [
      'email'   => 'required|email',
      'password' => 'required|min:6'
    ]);

    if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

      return redirect()->Route('customer.dashboard');
    }
    return back()->withInput($request->only('email', 'remember'));
  }

    public function showDeliveryMenLoginForm()
  {
    return view('auth.login', ['url' => 'deliverymen']);
  }

    public function deliveryMenLogin(Request $request)
  {
    $this->validate($request, [
      'email'   => 'required|email',
      'password' => 'required|min:6'
    ]);

    if (Auth::guard('deliverymen')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

      return redirect()->Route('deliverymen.dashboard');
    }
    return back()->withInput($request->only('email', 'remember'));
  }




}
