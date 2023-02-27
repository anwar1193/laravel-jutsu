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
                  <h3 class="box-title">CRUD Multiple</h3> <br>
                </div>
    
                <!-- /.box-header -->
                <div class="box-body">
    
                <a href="/crud_multiple/create" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Add New Data
                </a>
    
                <hr>
    
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Transaksi</th>
                            <th>Admin</th>
                            <th>Action</th>
                        </tr>
                    </thead>
    
                    <tbody>
                        @foreach ($data as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->trans_code }}</td>
                                <td>{{ $row->trans_admin }}</td>
                                <td>
                                    <a href="/crud_multiple/{{ $row->id }}" class="btn btn-warning">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <a href="/crud_multiple/{{ $row->id }}/edit" class="btn btn-success">
                                        <i class="fa fa-edit"></i>
                                    </a>
    
                                    <form method="post" action="/crud_multiple/{{ $row->id }}" style="display: inline">
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