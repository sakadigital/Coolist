<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyDomains extends Model
{
	public function Companies()
    {
        return $this->belongsTo('App\Companies');
    }

}
