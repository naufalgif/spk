<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiagnosaModel;

class DiagnosaController extends Controller
{
    public function __construct()
    {
        $this->DiagnosaModel = new DiagnosaModel();
    }

    public function index()
    {
        $data = [
            'diagnosis'=> $this->DiagnosaModel->allData(),
        ];
        return view('admin/a_diagnosa', $data);
    }
}
