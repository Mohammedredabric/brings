<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $products=Product::all();
    return view('admin.product.index',['products'=>$products]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.product.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(ProductRequest $request)
  {
    try {
      Product::create([$request->except('_token')]);
      return Redirect() -> route('admin.product') -> with(['success'=>'success']);
    }catch (\Exception $ex){
      return redirect() -> route('admin.product') -> with(['error'=>'error']);
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
    $product = Product::find($id);
    if (!$product)return Redirect() -> route('admin.product') -> with(['error'=>'error']);
    else return view('admin.product.edit',compact('product'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(ProductRequest $request, $id)
  {
    try {
      $product = Product::find($id);
      if (!$product) return Redirect() -> route('admin.product') -> with(['error'=>'error']);
      else {
        $product -> update($request -> except('_token'));
        return redirect() -> route('admin.product') -> with(['success'=>'success']);
      }
    }catch (\Exception $ex){
      return redirect() -> route('admin.product') -> with(['error'=>'error']);
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
      $product =  Product::find($id);
      if (!$product) return Redirect() -> route('admin.product') -> with(['error'=>'error']);
      else {
        $product -> delete();
        return  redirect()->route('admin.product') -> with(['success'=>'success']);
      }

    }catch (\Exception $ex){
      return redirect() -> route('admin.product') -> with(['error'=>'error']);
    }

  }
}
