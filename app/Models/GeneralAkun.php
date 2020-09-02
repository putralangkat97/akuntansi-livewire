<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralAkun extends Model
{
    protected $table = 'general_akun';
    protected $guarded = [];

    public function akun() {
        return $this->belongsTo('App\Models\Akun', 'akun_id');
    }

    public function subGeneralAkuns() {
        return $this->hasMany('App\Models\SubGeneralAkun');
    }
}
