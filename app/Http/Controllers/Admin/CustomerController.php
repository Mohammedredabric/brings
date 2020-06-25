<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

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
      Customer::create([$request->except('_token')]);
      return Redirect() -> route('admin.customer') -> with(['success'=>'success']);
    }catch (\Exception $ex){
      return redirect() -> route('admin.customer') -> with(['error'=>'error']);
    }
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $customer = Customer::find($id);
    if (!$customer)return Redirect() -> route('admin.customer') -> with(['error'=>'error']);
    else return view('admin.customer.edit',compact('customer'));
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
      $customer = Customer::find($id);
      if (!$customer) return Redirect() -> route('admin.customer') -> with(['error'=>'error']);
      else {
        $customer -> update($request -> except('_token'));
        return redirect() -> route('admin.customer') -> with(['success'=>'success']);
      }
    }catch (\Exception $ex){
      return redirect() -> route('admin.customer') -> with(['error'=>'error']);
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
      $customer =  Customer::find($id);
      if (!$customer) return Redirect() -> route('admin.customer') -> with(['error'=>'error']);
      else {
        $customer -> delete();
        return  redirect()->route('admin.customer') -> with(['success'=>'success']);
      }

    }catch (\Exception $ex){
      return redirect() -> route('admin.customer') -> with(['error'=>'error']);
    }

  }
}
