@extends('admin.layout_a.a_template')
@section('title','Gejala')

@section('content')
    <div class='row'>
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                <p class="box-title">Berikut data-data yang berisi pertanyaan dan gejala untuk diagnosis penyakit gagal ginjal</p>
                </div>
                <div class="box-body">
                <a href="/gejala/add" class="btn btn-primary btn-sm">Add</a>
                <br>
                @if (session('pesan'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
                        {{ session('pesan') }}
                        </div>
                @endif
                <br> 
                <table class='table table-bordered bg-info'> 
                        <thead>
                        <tr class='bg-primary'>
                            <th style="width:80px">ID Gejala</th>
                            <th>Gejala</th>
                            <th>Pertanyaan</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                         <!--php $no=1; ?>-->
                         @foreach ($symptoms as $data)
                        <tr>
                            <td>{{ $data->id_gejala }}</td>
                            <td>{{ $data->gejala }}</td>
                            <td>{{ $data->pertanyaan }}</td>
                            <td>
                                <a href="/gejala/edit/{{ $data->id_gejala }}" class="btn btn-sm btn-warning">Edit</a>
                                <a href="/gejala/detail/{{ $data->id_gejala }}" class="btn btn-sm btn-success">Detail</a>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_gejala }}">
                                    Delete
                                </button>
                            </td>
                        </tr>
                         @endforeach
                        </tbody>
                        </table>

        @foreach ( $symptoms as $data)
        <div class="modal modal-danger fade" id="delete{{ $data->id_gejala }}">
          <div class="modal-dialog ">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{ $data->gejala }}</h4>
              </div>
              <div class="modal-body">
                <p>Apakah Anda Yakin Ingin Menghapus Data Ini ??</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
                <a href="/gejala/delete/{{ $data->id_gejala }}" class="btn btn-outline">Ya</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        @endforeach
        
                </div>
            </div>
        </div>
    </div>
@endsection