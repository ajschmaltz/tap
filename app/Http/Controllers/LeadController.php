<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller {

  public function post(Request $request, Lead $lead)
  {
    $lead = $lead->create([
      'location' => $request->get('location'),
      'details' => $request->get('details'),
      'email' => $request->get('email'),
      'phone' => $request->get('phone')
    ]);

    foreach(json_decode($request->get('photos')) as $photo) {
      $lead->photos()->create([
        'uuid' => $photo->uuid,
        'filename' => $photo->name
      ]);
    }
  }

  public function index(Lead $lead)
  {
    return view('lead.index')->withLeads($lead->all());
  }

  public function show($id, Lead $lead)
  {
    return view('lead.show')->withLead($lead->find($id));
  }

}
