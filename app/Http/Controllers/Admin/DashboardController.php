<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

  // Dashboard - Analytics
  public function index(){
    $pageConfigs = [
      'pageHeader' => false
    ];

    return view('admin.dashboard.index', [
      'pageConfigs' => $pageConfigs
    ]);
  }

}
