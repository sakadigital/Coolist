<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusTypes extends Model
{
    public function Users()
    {
        return $this->hasMany('App\Users');
    }
}
