<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model {

  protected $fillable = ['uuid', 'filename'];

	public function lead()
  {
    return $this->hasOne(Lead::class);
  }

}
