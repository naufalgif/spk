@extends('admin.layout_a.a_template')
@section('title','Detail Gejala')

@section('content')
<table class="table">
<tr>
    <th width="100px">ID Gejala</th>
    <th width="30px">:</th>
    <th>{{ $symptoms->id_gejala }}</th>
 </tr>
 <tr>
    <th width="100px">Pertanyaan</th>
    <th width="30px">:</th>
    <th>{{ $symptoms->pertanyaan }}</th>
 </tr>
 <tr>
    <th width="100px">Gejala</th>
    <th width="30px">:</th>
    <th>{{ $symptoms->gejala }}</th>
 </tr>
 <tr>
    <th>
        <a href="/gejala" class="btn btn-success tbn-sm">Kembali</a>
    </th>
 </tr>
 </table>
@endsection