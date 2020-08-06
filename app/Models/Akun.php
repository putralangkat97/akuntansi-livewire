<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    protected $guarded = [];

    public function subAkuns() {
        return $this->hasMany('App\Models\SubAkun', 'akun_id');
    }
}
