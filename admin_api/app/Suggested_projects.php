<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suggested_projects extends Model
{
     public $table = 'suggested_projects';
	
	public function suggested_projects()
    {
		return $this->users->get();
    }
}
