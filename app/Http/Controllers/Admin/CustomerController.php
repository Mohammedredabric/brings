<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $customeres=Customer::select('id','fname', 'lname','avatar','statut','city','email')->get();

    return view('admin.customer.index',compact('customeres'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.customer.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(CustomerRequest $request)
  {
    try {
      $file="";
      if ($request->has('avatar')) {
        $file = $this->SaveImage('profile/user-uploads', $request->avatar);
      }
      $statut="Active";
      if (!$request->has('statut')) {
        $statut = 'Desactive';
      }
      Customer::create([
        'fname' => $request -> input('fname'),
        'lname' => $request -> input('lname'),
        'phone' => $request -> input('phone'),
        'address' => $request -> input('address'),
        'city' => $request -> input('city'),
        'email' => $request -> input('email'),
        'bank' => $request -> input('bank'),
        'rib' => $request -> input('rib'),
        'discount' => $request -> input('discount'),
        'avatar' => $file,
        'statut' => $statut,
        'password' => Hash::make($request -> input('password'))
      ]);
      return Redirect() -> route('customer.index') -> with(['success'=>'success']);
    }catch (\Exception $ex){
      return redirect() -> route('customer.index') -> with(['error'=>'error']);
    }
  }

  public function SaveImage($folder, $photo)
  {
    $file_extension = $photo->getClientOriginalExtension();

    $file_name = $photo->hashName() . '.' . $file_extension;
    $path ="images/" . $folder;
    $photo->move($path, $file_name);
    return $path . "/" . $file_name;
  }


  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    try {
      $customer = Customer::findOrfail($id)->makeVisible(['bank','rib','id']);
      if (!$customer)return Redirect() -> route('customer.index') -> with(['error'=>'error']);
      else return view('admin.customer.edit',compact('customer'));
    }catch (\Exception $ex)
    {
      return Redirect() -> route('customer.index') -> with(['error'=>'error']);
    }

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(CustomerRequest $request, $id)
  {
    try {
      $customer = Customer::findorfail($id);
      if (!$customer) return Redirect() -> route('customer.index') -> with(['error'=>'error']);
      else {
        $file=$customer->avatar;
        if ($request->has('avatar')) {
          $file = $this->SaveImage('profile/user-uploads', $request->avatar);
        }
        $statut=$customer->statut;
        if (!$request->input('statut')) {
          $statut = 'Desactive';
        }
        $customer -> update([
          'fname' => $request -> input('fname'),
          'lname' => $request -> input('lname'),
          'phone' => $request -> input('phone'),
          'address' => $request -> input('address'),
          'city' => $request -> input('city'),
          'email' => $request -> input('email'),
          'bank' => $request -> input('bank'),
          'rib' => $request -> input('rib'),
          'discount' => $request -> input('discount'),
          'avatar' => $file,
          'statut' => $statut,
          'password' => Hash::make($request -> input('password'))
        ]);
        return redirect() -> route('customer.index') -> with(['success'=>'success']);
      }
    }catch (\Exception $ex){
      return redirect() -> route('customer.index') -> with(['error'=>'error']);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    try {
      $customer =  Customer::findorfail($id);
      if (!$customer) return Redirect() -> route('customer.index') -> with(['error'=>'error']);
      else {
        $customer -> delete();
        return  redirect()->route('customer.index') -> with(['success'=>'success']);
      }

    }catch (\Exception $ex){
      return redirect() -> route('customer.index') -> with(['error'=>'error']);
    }

  }
}
