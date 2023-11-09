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
              <h3 class="box-title">Alternative Join</h3> <br>
            </div>

            <!-- /.box-header -->
            <div class="box-body">

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Transaksi</th>
                        <th>Nama Produk</th>
                        <th>Tanggal Transaksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($result as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row['kode_transaksi'] }}</td>
                            <td>{{ $row['nama_product'] }}</td>
                            <td>{{ $row['tanggal_transaksi'] }}</td>
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