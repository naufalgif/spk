@extends('admin.layout_a.a_template')
@section('title','Diagnosa')

@section('content')
<div class="table-responsive">
        <table class='table table-bordered bg-info'> 
                <thead>
                        <tr class='bg-primary'>
                            <th style="width:100px">ID Diagnosa</th>
                            <th style="width:100px">ID User</th>
                            <th>Nama</th>
                            <th>Hasil</th>
                        </tr>
                </thead>
                <tbody>
                @foreach ( $diagnosis as $data)
                    <tr>
                        <td>{{ $data->id_diagnosa }}</td>
                        <td>{{ $data->id_user }}</td>
                        <td>{{ $data->nama_user }}</td>
                        <td>{{ $data->hasil_diagnosa }}</td>
                    </tr>
                @endforeach
                </tbody>
        </table>
</div>                 
@endsection