<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    public $table = 'users';
	
	  public function Users()
    {
		return $this->users->get();
    }
}
