<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SolusiModel;

class SolusiController extends Controller
{
    public function __construct()
    {
    $this->SolusiModel = new SolusiModel();
    $this->middleware('auth');        
    }

    public function index()
    {
        $data = [
            'solution' => $this->SolusiModel->allData(),
        ];
        return view('admin/a_solusi', $data);
    }

    public function detail($id_solusi)
    {
        if (!$this->SolusiModel->detailData($id_solusi)) {
            abort(404);
        }
        $data = [
            'solution' => $this->SolusiModel->detailData($id_solusi),
        ];
        return view('admin/a_detailsolusi', $data);
    }

    public function add()
    {
        return view('admin/a_addsolusi'); 
    }

    public function insert()
    {
        Request()->validate([
            'pencegahan' => 'required|max:255',
            'solusi'    => 'required'
        ], [
            'pencegahan.required' => 'Wajib Diisi !!',
            'pencegahan.unique' => 'Data Ini Sudah Ada',
            'pencegahan.max' => 'Data tidak boleh diisi lebih dari 255 karakter',
            'solusi.required' => 'Wajib Diisi !!'
        ]);

        $data = [
            'solusi' => Request()->solusi,
            'pencegahan' => Request()->pencegahan,
        ];
    
        $this->SolusiModel->addData($data);
        return redirect()->route('solusi')->with('pesan','Data Berhasil Ditambahkan');
    }
}
