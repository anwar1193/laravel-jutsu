@extends('layouts.main')

@section('container')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

        <div class="box">

            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Success!</h4>
                    {{ session('success') }}
                </div>
            @endif

            <div class="box-header">
              <h3 class="box-title">CRUD Standar With Resource - View Data</h3> <br>
            </div>

            <!-- /.box-header -->
            <div class="box-body">

            <a href="/crud_standar/create" class="btn btn-primary">
                <i class="fa fa-plus"></i> Add New Data
            </a>

            <a href="/crud_standar/custom" class="btn btn-warning">
                Ke Halaman Custom
            </a>

            <hr>

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Agama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->emp_name }}</td>
                            <td>{{ $row->emp_religion }}</td>
                            <td>{{ $row->emp_gender }}</td>
                            <td>{{ date('d-m-Y', strtotime($row->emp_birthdate)) }}</td>
                            <td>{{ $row['emp_adress'] }}</td>
                            <td>
                                <a href="/crud_standar/{{ $row->id }}/edit" class="btn btn-success">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <form method="post" action="/crud_standar/{{ $row->id }}" style="display: inline">
                                    @method('delete')
                                    @csrf

                                    <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection