<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    public function ComapanyDomains()
    {
        return $this->hasMany('App\ComapanyDomains');
    }

     public function Users()
    {
        return $this->hasMany('App\Users');
    }


}
