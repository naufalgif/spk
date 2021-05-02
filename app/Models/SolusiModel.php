<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SolusiModel extends Model
{
    public function allData()
    {
        return DB::table('tbl_solusi')->get();
    }

    public function detailData($id_solusi)
    {
       return DB::table('tbl_solusi')->where('id_solusi', $id_solusi)->first();
    }

    public function addData($data)
    {
        DB::table('tbl_solusi')->insert($data);
    }
}
