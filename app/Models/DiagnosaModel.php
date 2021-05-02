<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DiagnosaModel extends Model
{
    public function allData()
    {
        return DB::table('diagnosa')
        ->leftJoin('users', 'users.id', '=', 'diagnosa.id_user')
        ->get();
    }
}
