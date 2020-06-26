<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WarehouseRequest;
use App\Models\City;
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
    $warehouses=Warehouse::Selectwithcity() -> get();

    return view('admin.warehouse.index',compact('warehouses'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $citise=City::active() -> get();
    return view('admin.warehouse.create',compact('citise'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(WarehouseRequest $request)
  {
    try {
        Warehouse::create([
        'name' => $request->input('name'),
        'address' => $request->input('address'),
        'phone' =>  $request->input('phone'),
        'city_id' =>  $request->input('city_id'),
        'price_warehousing' => $request->input('price_warehousing'),
        'price_packing_basic' => $request->input('price_packing_basic'),
        'price_packing_ultra' =>  $request->input('price_packing_ultra'),
        'price_packing_primum' =>  $request->input('price_packing_primum'),
        ]);
      return Redirect() -> route('warehouse.index') -> with(['success'=>'success']);
    }catch (\Exception $ex){
      return redirect() -> route('warehouse.index') -> with(['error'=>'error']);
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
    $warehouse = Warehouse::findOrfail($id);
    $citise=City::active() -> get();

    if (!$warehouse)return Redirect() -> route('warehouse.index') -> with(['error'=>'error']);
    else return view('admin.warehouse.edit',compact('warehouse','citise'));
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
      $warehouse = Warehouse::findOrfail($id);
      if (!$warehouse) return Redirect() -> route('warehouse.index') -> with(['error'=>'error']);
      else {
        $warehouse->update([
          'name' => $request->input('name'),
          'address' => $request->input('address'),
          'phone' =>  $request->input('phone'),
          'city_id' =>  $request->input('city_id'),
          'price_warehousing' => $request->input('price_warehousing'),
          'price_packing_basic' => $request->input('price_packing_basic'),
          'price_packing_ultra' =>  $request->input('price_packing_ultra'),
          'price_packing_primum' =>  $request->input('price_packing_primum'),
        ]);
        return redirect() -> route('warehouse.index') -> with(['success'=>'success']);
      }
    }catch (\Exception $ex){
      return redirect() -> route('warehouse.index') -> with(['error'=>'error']);
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
      $warehouse =  Warehouse::findOrfail($id);
      if (!$warehouse) return Redirect() -> route('warehouse.index') -> with(['error'=>'error']);
      else {
        $warehouse -> delete();
        return  redirect()->route('warehouse.index') -> with(['success'=>'success']);
      }
    }catch (\Exception $ex){
      return redirect() -> route('warehouse.index') -> with(['error'=>'error']);
    }

  }
}
