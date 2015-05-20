<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class LeadForm extends Model {

	protected $fillable = ['title', 'photos', 'textfields', 'selects', 'location', 'email'];

}
