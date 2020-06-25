<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeliveryMenRequest;
use App\Models\DeliveryMen;
use Illuminate\Http\Request;

class DeliveryMenController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $deliverymens=DeliveryMen::select('id','fname', 'lname','avatar','statut','city','email')->get();
    return view('admin.deliverymen.index',compact('deliverymens'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.deliverymen.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(DeliveryMenRequest $request)
  {
    try {
      DeliveryMen::create([$request->except('_token')]);
      return Redirect() -> route('admin.deliverymen') -> with(['success'=>'success']);
    }catch (\Exception $ex){
      return redirect() -> route('admin.deliverymen') -> with(['error'=>'error']);
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
    $deliverymen = DeliveryMen::find($id);
    if (!$deliverymen)return Redirect() -> route('admin.deliverymen') -> with(['error'=>'error']);
    else return view('admin.deliverymen.edit',compact('deliverymen'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(DeliveryMen $request, $id)
  {
    try {
      $deliverymen = DeliveryMen::find($id);
      if (!$deliverymen) return Redirect() -> route('admin.deliverymen') -> with(['error'=>'error']);
      else {
        $deliverymen -> update($request -> except('_token'));
        return redirect() -> route('admin.deliverymen') -> with(['success'=>'success']);
      }
    }catch (\Exception $ex){
      return redirect() -> route('admin.deliverymen') -> with(['error'=>'error']);
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
      $deliverymen =  DeliveryMen::find($id);
      if (!$deliverymen) return Redirect() -> route('admin.deliverymen') -> with(['error'=>'error']);
      else {
        $deliverymen -> delete();
        return  redirect()->route('admin.deliverymen') -> with(['success'=>'success']);
      }

    }catch (\Exception $ex){
      return redirect() -> route('admin.deliverymen') -> with(['error'=>'error']);
    }

  }
}
