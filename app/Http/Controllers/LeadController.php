<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class LeadController extends Controller {

  public function post(Request $request)
  {
    $test = json_encode($request->all());
    return $test;
    $test = json_decode($request->get('photos'));
    return $request->json('photos');
  }

}
