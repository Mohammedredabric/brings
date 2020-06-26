<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $admins=Admin::selection()->get();
       return view('admin.user.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
      try {
        $file="";
        if ($request->has('avatar')) {
          $file = $this->SaveImage('profile/customer-uploads', $request->avatar);
        }
        $statut="Active";
        if (!$request->has('statut')) {
          $statut = 'Desactive';
        }
        Admin::create([
          'fname' => $request -> input('fname'),
          'lname' => $request -> input('lname'),
          'phone' => $request -> input('phone'),
          'address' => $request -> input('address'),
          'city' => $request -> input('city'),
          'email' => $request -> input('email'),
          'bank' => $request -> input('bank'),
          'rib' => $request -> input('rib'),
          'avatar' => $file,
          'statut' => $statut,
          'password' => Hash::make($request -> input('password'))
        ]);
        return Redirect() -> route('user.index') -> with(['success'=>'success']);
      }catch (\Exception $ex){
        return redirect() -> route('user.index') -> with(['error'=>'error']);
      }
    }

    public function show($id){

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
        $admin=Admin::findOrfail($id)->makeVisible(['bank','rib','id']);
        if (!$admin)return Redirect() -> route('user.index') -> with(['error'=>'error']);
        else return view('admin.user.edit',compact('admin'));
      }catch (\Exception $ex){
        return redirect() -> route('user.index') -> with(['error'=>'error']);
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
      try {
        $admin = Admin::findOrfail($id);
        if (!$admin) return Redirect() -> route('user.index') -> with(['error'=>'error']);
        else {
          $file=$admin->avatar;
          if ($request->has('avatar')) {
            $file = $this->SaveImage('profile/user-uploads', $request->avatar);
          }
          $statut=$admin->statut;
          if (!$request->input('statut')) {
            $statut = 'Desactive';
          }

          $admin->update([
            'fname' => $request -> input('fname'),
            'lname' => $request -> input('lname'),
            'phone' => $request -> input('phone'),
            'address' => $request -> input('address'),
            'city' => $request -> input('city'),
            'email' => $request -> input('email'),
            'bank' => $request -> input('bank'),
            'rib' => $request -> input('rib'),
            'avatar' => $file,
            'statut' => $statut,
            'password' => Hash::make($request -> input('password'))
          ]);
          return redirect() -> route('user.index') -> with(['success'=>'success']);
        }
      }catch (\Exception $ex){
        return redirect() -> route('user.index') -> with(['error'=>'error']);
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
        $admin = Admin::findOrfail($id);
        if (!$admin) return Redirect() -> route('user.index') -> with(['error'=>'error']);
        else {
          $admin -> delete();
          return  redirect()->route('user.index') -> with(['success'=>'success']);
        }

      }catch (\Exception $ex){
        return redirect() -> route('user.index') -> with(['error'=>'error']);
      }

    }
}
