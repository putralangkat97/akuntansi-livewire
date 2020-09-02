<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    protected $guarded = [];

    public function generalAkuns() {
        return $this->hasMany('App\Models\GeneralAkun', 'akun_id');
    }

    public function subGeneralAkuns() {
        return $this->hasMany('App\Models\SubGeneralAkun');
    }
}
