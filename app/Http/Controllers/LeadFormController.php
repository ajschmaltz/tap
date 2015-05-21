<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\LeadForm;
use Illuminate\Http\Request;

class LeadFormController extends Controller {

  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('subscription');
  }

	public function create()
  {
    return view('form.create');
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

  public function show($id, LeadForm $lead_form)
  {
    return view('form.show')->withForm($lead_form->find($id));
  }

  public function index(LeadForm $lead_form)
  {
    return view('form.index')->withForms($lead_form->all());
  }

}
