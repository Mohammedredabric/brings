<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeliveryMenRequest;
use App\Models\DeliveryMen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DeliveryMenController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $deliverymens=DeliveryMen::selection()->get();
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
      $file="";
      if ($request->has('avatar')) {
        $file = $this->SaveImage('profile/deliverymen-uploads', $request->avatar);
      }
      $statut="Active";
      if (!$request->has('statut')) {
        $statut = 'Desactive';
      }
      DeliveryMen::create([
        'fname' => $request -> input('fname'),
        'lname' => $request -> input('lname'),
        'phone' => $request -> input('phone'),
        'address' => $request -> input('address'),
        'city' => $request -> input('city'),
        'email' => $request -> input('email'),
        'bank' => $request -> input('bank'),
        'rib' => $request -> input('rib'),
        'price_delivery' => $request -> input('price_cancel'),
        'price_refund' => $request -> input('price_cancel'),
        'price_cancel' => $request -> input('price_cancel'),
        'avatar' => $file,
        'statut' => $statut,
        'password' => Hash::make($request -> input('password'))
      ]);
      return Redirect() -> route('deliverymen.index') -> with(['success'=>'success']);
    }catch (\Exception $ex){
      return redirect() -> route('deliverymen.index') -> with(['error'=>'error']);
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
      $deliverymen = DeliveryMen::findOrfail($id)->makeVisible(['bank','rib','id']);
      if (!$deliverymen)return Redirect() -> route('deliverymen.index') -> with(['error'=>'error']);
      else return view('admin.deliverymen.edit',compact('deliverymen'));
    }catch (\Exception $ex)
    {
      return Redirect() -> route('deliverymen.index') -> with(['error'=>'error']);
    }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */

  public function update(DeliveryMenRequest $request, $id)
  {
    try {
      $deliverymen = DeliveryMen::FindOrfail($id)->makeVisible(['bank','rib','id']);
      if (!$deliverymen) return Redirect() -> route('deliverymen.index') -> with(['error'=>'error']);
      else {
        $file = $deliverymen->avatar;
        if ($request->has('avatar')) {
          $file = $this->SaveImage('profile/deliverymen-uploads', $request->avatar);
        }
        $statut = $deliverymen->statut;
        if (!$request->input('statut')) {
          $statut = 'Desactive';
        }
        $deliverymen -> update([
          'fname' => $request -> input('fname'),
          'lname' => $request -> input('lname'),
          'phone' => $request -> input('phone'),
          'address' => $request -> input('address'),
          'city' => $request -> input('city'),
          'email' => $request -> input('email'),
          'bank' => $request -> input('bank'),
          'rib' => $request -> input('rib'),
          'price_delivery' => $request -> input('price_cancel'),
          'price_refund' => $request -> input('price_cancel'),
          'price_cancel' => $request -> input('price_cancel'),
          'avatar' => $file,
          'statut' => $statut,
          'password' => Hash::make($request -> input('password'))
        ]);
        return redirect() -> route('deliverymen.index') -> with(['success'=>'success']);
      }
    }catch (\Exception $ex){
      return redirect() -> route('deliverymen.index') -> with(['error'=>'error']);
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
      $deliverymen =  DeliveryMen::findOrfail($id);
      if (!$deliverymen) return Redirect() -> route('deliverymen.index') -> with(['error'=>'error']);
      else {
        $deliverymen -> delete();
        return  redirect()->route('deliverymen.index') -> with(['success'=>'success']);
      }

    }catch (\Exception $ex){
      return redirect() -> route('deliverymen.index') -> with(['error'=>'error']);
    }

  }
}
