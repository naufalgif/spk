<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GejalaModel;

class GejalaController extends Controller
{
    public function __construct()
    {
    $this->GejalaModel = new GejalaModel();        
    }

    public function index()
    {
        $data = [
            'symptoms' => $this->GejalaModel->allData(),
        ];
        return view('admin/a_gejala', $data);
    }

    public function detail($id_gejala)
    {
        if (!$this->GejalaModel->detailData($id_gejala)) {
            abort(404);
        }
        $data = [
            'symptoms' => $this->GejalaModel->detailData($id_gejala),
        ];
        return view('admin/a_detailgejala', $data);
    }

    public function add()
    {
        return view('admin/a_addgejala'); 
    }

    public function insert()
    {
        Request()->validate([
            'id_gejala' => 'required|unique:tbl_gejala,id_gejala',
            'pertanyaan' => 'required|max:255',
            'gejala'    => 'required'
        ], [
            'id_gejala.required' => 'Wajib Diisi !!',
            'id_gejala.unique' => 'Data Ini Sudah Ada',
            'id_gejala.min' => 'Data tidak boleh diisi kurang dari 4 karakter',
            'pertanyaan.required' => 'Wajib Diisi !!',
            'pertanyaan.unique' => 'Data Ini Sudah Ada',
            'pertanyaan.max' => 'Data tidak boleh diisi lebih dari 255 karakter',
            'gejala.required' => 'Wajib Diisi !!'
        ]);

        $data = [
            'id_gejala' => Request()->id_gejala,
            'gejala' => Request()->gejala,
            'pertanyaan' => Request()->pertanyaan,
        ];
    
        $this->GejalaModel->addData($data);
        return redirect()->route('gejala')->with('pesan','Data Berhasil Ditambahkan');
    }

    public function edit($id_gejala)
    {
        if (!$this->GejalaModel->detailData($id_gejala)) {
            abort(404);
        }
        $data = [
            'symptoms' => $this->GejalaModel->detailData($id_gejala),
        ];
        return view('admin/a_editgejala',  $data);
    }

    public function update($id_gejala)
    {
        Request()->validate([
            'pertanyaan' => 'required|max:255',
            'gejala'    => 'required'
        ], [
            'pertanyaan.required' => 'Wajib Diisi !!',
            'pertanyaan.unique' => 'Data Ini Sudah Ada',
            'pertanyaan.max' => 'Data tidak boleh diisi lebih dari 255 karakter',
            'gejala.required' => 'Wajib Diisi !!'
        ]);

        $data = [
            'id_gejala' => Request()->id_gejala,
            'gejala' => Request()->gejala,
            'pertanyaan' => Request()->pertanyaan,
        ];
    
        $this->GejalaModel->editData($id_gejala, $data);
        return redirect()->route('gejala')->with('pesan','Data Berhasil Diubah');
    }

    public function delete($id_gejala)
    {
        $this->GejalaModel->deleteData($id_gejala);
        return redirect()->route('gejala')->with('pesan','Data Berhasil Dihapus');
    }
}
