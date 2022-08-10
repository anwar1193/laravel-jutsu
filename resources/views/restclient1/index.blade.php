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
              <h3 class="box-title">Rest Client 1</h3> <br>
              <span>URL Rest Server : <a target="_blank" href="https://anwar-news.000webhostapp.com/">https://anwar-news.000webhostapp.com/</a></span>
            </div>

            <!-- /.box-header -->
            <div class="box-body">

            <a href="/rest_client1/create" class="btn btn-primary">
                <i class="fa fa-plus"></i> Add New Data
            </a>

            <hr>

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row['username'] }}</td>
                            <td>{{ $row['address'] }}</td>
                            <td>
                                <a href="/rest_client1/{{ $row['id'] }}/edit" class="btn btn-success">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <form method="post" action="/rest_client1/{{ $row['id'] }}" style="display: inline">
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