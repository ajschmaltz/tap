<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Auth\Guard;
use Illuminate\Http\Request;

class SubscriptionController extends Controller {

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function invite()
  {
    return view('invite');
  }

	public function subscribe(Guard $auth, Request $request)
  {
    return $auth->user()->subscription('give5')->create($request->get('stripeToken'));
    // subscribe the user
  }



}
