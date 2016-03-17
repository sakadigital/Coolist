<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    public function Companies()
    {
        return $this->belongsTo('App\Companies');
    }
    public function Roles ()
    {
        return $this->belongsTo('App\Roles');
    }
    public function StatusTypes()
    {
        return $this->belongsTo('App\StatusTypes');
    }
}
