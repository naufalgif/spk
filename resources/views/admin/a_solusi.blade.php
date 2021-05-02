@extends('admin.layout_a.a_template')
@section('title','Solusi')


@section('content')
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <p class="box-title">Berikut data-data yang berisi solusi dan pencegahan untuk diagnosis penyakit gagal ginjal</p>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <a href="/solusi/add" class="btn btn-primary btn-sm">Add</a>
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
                            <!--<th>No</th>-->
                            <th style="width:80px">ID Solusi</th>
                            <th>Solusi</th>
                            <th>Pencegahan</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!--php $no=1; ?>-->
                         @foreach ($solution as $data)
                        <tr>
                             <!--<td></td>-->
                            <td>{{ $data->id_solusi }}</td>
                            <td>{{ $data->solusi }}</td>
                            <td>{{ $data->pencegahan }}</td>
                            <td>
                                <a href="" class="btn btn-sm btn-warning">Edit</a>
                                <a href="/solusi/detail/{{ $data->id_solusi }}" class="btn btn-sm btn-success">Detail</a>
                                <a href="" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                         @endforeach
                      </tbody>
                    </table>
                </div>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection