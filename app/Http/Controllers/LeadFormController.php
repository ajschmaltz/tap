<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\LeadForm;
use Illuminate\Http\Request;

class LeadFormController extends Controller {

	public function create()
  {
    return view('create');
  }

  public function post(Request $request)
  {
    LeadForm::create([
      'title' => $request->get('title'),
      'photos' => json_encode($request->get('photos')),
      'textfields' => json_encode($request->get('textfields')),
      'selects' => json_encode($request->get('selects')),
      'location' => $request->get('location', 0),
      'email' => $request->get('email')
    ]);
  }

  public function show($id, LeadForm $leadForm)
  {
    return view('job')->withForm($leadForm->find($id));
  }

}
