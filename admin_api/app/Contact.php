<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
	public $table = 'contacts';
	
	  public function contact()
    {
		return $this->users->get();
    }
}
