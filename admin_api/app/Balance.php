<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    public $table = 'balance';
	
	  public function Balance()
    {
		return $this->users->get();
    }
}
