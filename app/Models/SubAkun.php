<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubAkun extends Model
{
    protected $guarded = [];

    public function akun() {
        return $this->belongsTo('App\Models\Akun', 'akun_id');
    }
}
