@extends('layouts.main')

@section('container')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
    
            <div class="box">
    
                <div class="box-header">
                  <h3 class="box-title">CRUD Multiple - Detail Data</h3> <br>
                </div>
    
                <!-- /.box-header -->
                <div class="box-body">
    
                <div class="row">
                    <div class="col-md-6">
                        <table class="table">
                            <tr>
                                <th>Kode Transaksi</th>
                                <td>:</td>
                                <td>{{ $data->trans_code }}</td>
                            </tr>
        
                            <tr>
                                <th>Admin</th>
                                <td>:</td>
                                <td>{{ $data->trans_admin }}</td>
                            </tr>
                        </table>    
                    </div> 
                </div>

                <div class="row">
                    <div class="col-md-10">
                        <h5>LIST PRODUCT</h5>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <td>NO</td>
                                    <td>Produk</td>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($detail as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->product_name }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <a href="/crud_multiple" class="btn btn-danger btn-sm">
                    <i class="fa fa-backward"></i> Kembali
                </a>

                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
    
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection