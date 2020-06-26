<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Customer;
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
    $products=Product::Selection() -> get() ;
    return view('admin.product.index',compact('products'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $customers = Customer::Customers() -> get();
    return view('admin.product.create',compact('customers'));
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
      $file="";
      if ($request->has('image')) {
        $file = $this->SaveImage('products', $request->image);
      }
      Product::create([
        'ref' => $request->input('ref'),
        'name' => $request->input('name'),
        'price' =>$request->input('price'),
        // 'paking_type' => $request->input('paking_type'),
        'image' => $file,
        'customer_id' => $request->input('customer'),
        'description' => $request->input('description'),
      ]);
      return Redirect() -> route('product.index') -> with(['success'=>'success']);
    }catch (\Exception $ex){
      return Redirect() -> route('product.index') -> with(['error'=>'error']);
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
    $product = Product::find($id);
    $customers = Customer::Customers() -> get();

    if (!$product)return Redirect() -> route('product.index') -> with(['error'=>'error']);
    else return view('admin.product.edit',compact('product','customers'));
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
      $product = Product::findOrfail($id);
      if (!$product) return Redirect() -> route('product.index') -> with(['error'=>'error']);
      else {
        $file=$product -> image;
        if ($request->has('image')) {
          $file = $this->SaveImage('products', $request->image);
        }
        $product -> update([
          'ref' => $request->input('ref'),
          'name' => $request->input('name'),
          'price' =>$request->input('price'),
          // 'paking_type' => $request->input('paking_type'),
          'image' => $file,
          'customer_id' => $request->input('customer'),
          'description' => $request->input('description'),
        ]);

        return redirect() -> route('product.index') -> with(['success'=>'success']);
      }
    }catch (\Exception $ex){
      return redirect() -> route('product.index') -> with(['error'=>'error']);
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
      $product =  Product::findORfail($id);
      if (!$product) return Redirect() -> route('product.index') -> with(['error'=>'error']);
      else {
        $product -> delete();
        return  redirect()->route('product.index') -> with(['success'=>'success']);
      }

    }catch (\Exception $ex){
      return redirect() -> route('product.index') -> with(['error'=>'error']);
    }

  }
}
