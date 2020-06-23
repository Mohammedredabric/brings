<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\Admin;
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
       $admins=Admin::all();
       return view('admin.user.index',['admins'=>$admins]);
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
        Admin::create([$request->except('_token')]);
        return Redirect() -> route('admin.admin') -> with(['success'=>'success']);
      }catch (\Exception $ex){
        return redirect() -> route('admin.admin') -> with(['error'=>'error']);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin=Admin::find($id);
        if (!$admin)return Redirect() -> route('admin.admin') -> with(['error'=>'error']);
        else return view('admin.user.edit',compact('admin'));
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
        $admin = Admin::find($id);
        if (!$admin) return Redirect() -> route('admin.admin') -> with(['error'=>'error']);
        else {
          $admin -> update($request -> except('_token'));
          return redirect() -> route('admin.admin') -> with(['success'=>'success']);
        }
      }catch (\Exception $ex){
        return redirect() -> route('admin.admin') -> with(['error'=>'error']);
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
        $admin = Admin::find($id);
        if (!$admin) return Redirect() -> route('admin.admin') -> with(['error'=>'error']);
        else {
          $admin -> delete();
          return  redirect()->route('admin.admin') -> with(['success'=>'success']);
        }

      }catch (\Exception $ex){
        return redirect() -> route('admin.admin') -> with(['error'=>'error']);
      }

    }
}
