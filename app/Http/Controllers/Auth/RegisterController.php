<?php

namespace App\Http\Controllers\Auth;

use App\Models\DeliveryMen;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Admin;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
          'fname' => ['required', 'string', 'max:255'],
          'lname' => ['required', 'string', 'max:255'],
          'phone' => ['required', 'string', 'max:255'],
          'address' => ['required', 'string', 'max:255'],
          'city' => ['required', 'string', 'max:255'],
          'email' => ['required', 'email', 'max:255', 'unique:admins'],
          'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showAdminRegisterForm()
    {
      return view('auth.register', ['url' => 'admin']);
    }

    protected function createAdmin(Request $request)
    {
      $this->validator($request->all())->validate();
      $admin = Admin::create([
        'email' => $request['email'],
        'password' => Hash::make($request['password']),
        'fname' => $request['fname'],
        'lname' => $request['lname'],
        'phone' => $request['phone'],
        'address' => $request['address'],
        'city' => $request['city'],
      ]);

      return redirect()->Route('admin.login');
    }

    public function showCustomerLoginForm()
    {
      return view('auth.register', ['url' => 'customer']);
    }

    protected function createCustomer(Request $request)
    {
      $this->validator($request->all())->validate();
      $Customer= Customer::create([
        'email' => $request['email'],
        'password' => Hash::make($request['password']),
        'fname' => $request['fname'],
        'lname' => $request['lname'],
        'phone' => $request['phone'],
        'address' => $request['address'],
        'city' => $request['city'],
      ]);
      return redirect()->Route('customer.login');
    }

    public function showDeliveryMenLoginForm()
  {
    return view('auth.register', ['url' => 'deliverymen']);
  }

    protected function createDeliveryMen(Request $request)
  {
    $this->validator($request->all())->validate();
    $Customer= DeliveryMen::create([
      'email' => $request['email'],
      'password' => Hash::make($request['password']),
      'fname' => $request['fname'],
      'lname' => $request['lname'],
      'phone' => $request['phone'],
      'address' => $request['address'],
      'city' => $request['city'],
    ]);
    return redirect()->Route('deliverymen.login');
  }


 }
