<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\SubAkun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class test extends Controller
{
    public function api() {
        return response()->json([DB::table('akuns')->get()]);
    }
}
