@extends('admin.layout_a.a_template')
@section('title','Detail Solusi')

@section('content')
<table class="table">
<tr>
    <th width="100px">ID Solusi</th>
    <th width="30px">:</th>
    <th>{{ $solution->id_solusi }}</th>
 </tr>
 <tr>
    <th width="100px">Pencegahan</th>
    <th width="30px">:</th>
    <th>{{ $solution->pencegahan }}</th>
 </tr>
 <tr>
    <th width="100px">Solusi</th>
    <th width="30px">:</th>
    <th>{{ $solution->solusi }}</th>
 </tr>
 <tr>
    <th>
        <a href="/solusi" class="btn btn-success tbn-sm">Kembali</a>
    </th>
 </tr>
 </table>
@endsection