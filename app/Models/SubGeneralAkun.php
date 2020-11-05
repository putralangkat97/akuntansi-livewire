<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubGeneralAkun extends Model
{
    protected $guarded = [];
    protected $table = 'sub_general_akuns';

    public function generalAkun() {
        return $this->belongsTo('App\Models\GeneralAkun');
    }
}
