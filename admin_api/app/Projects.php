<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    public $table = 'projects';
	
	public function projects()
    {
		return $this->users->get();
    }
}
