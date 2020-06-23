<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WarehouseRequest;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $warehouses=Warehouse::all();
    return view('admin.warehouse.index',['customers'=>$warehouses]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.warehouse.create');
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
      Warehouse::create([$request->except('_token')]);
      return Redirect() -> route('admin.warehouse') -> with(['success'=>'success']);
    }catch (\Exception $ex){
      return redirect() -> route('admin.warehouse') -> with(['error'=>'error']);
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
    $warehouse = Warehouse::find($id);
    if (!$warehouse)return Redirect() -> route('admin.warehouse') -> with(['error'=>'error']);
    else return view('admin.warehouse.edit',compact('warehouse'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(WarehouseRequest $request, $id)
  {
    try {
      $warehouse = Warehouse::find($id);
      if (!$warehouse) return Redirect() -> route('admin.warehouse') -> with(['error'=>'error']);
      else {
        $warehouse -> update($request -> except('_token'));
        return redirect() -> route('admin.warehouse') -> with(['success'=>'success']);
      }
    }catch (\Exception $ex){
      return redirect() -> route('admin.warehouse') -> with(['error'=>'error']);
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
      $warehouse =  Warehouse::find($id);
      if (!$warehouse) return Redirect() -> route('admin.warehouse') -> with(['error'=>'error']);
      else {
        $warehouse -> delete();
        return  redirect()->route('admin.warehouse') -> with(['success'=>'success']);
      }

    }catch (\Exception $ex){
      return redirect() -> route('admin.warehouse') -> with(['error'=>'error']);
    }

  }
}
