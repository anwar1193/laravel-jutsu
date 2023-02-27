@extends('layouts.main')

@section('container')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

        <div class="box">

            {{-- @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Success!</h4>
                    {{ session('success') }}
                </div>
            @endif --}}

            <div class="box-header">
              <h3 class="box-title">CRUD With Sweet Alert - Tambah Data</h3> <br>
            </div>

            <!-- /.box-header -->
            <div class="box-body">

                <div class="row">
                    <div class="col-md-6">
                        <form method="post" action="/crud_sweetalert">
                            @csrf
        
                            {{-- Nama Lengkap --}}
                            <div class="form-group">
                                <label for="province_name">Nama Provinsi :</label>
                                <input type="text" name="province_name" class="form-control @error('province_name') is-invalid @enderror" id="province_name" autofocus value="{{ old('province_name') }}" autocomplete="off">
        
                                @error('province_name')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <a href="/crud_sweetalert" class="btn btn-danger">
                                <i class="fa fa-backward"></i> Kembali
                            </a>

                            <button class="btn btn-success" type="submit">
                                <i class="fa fa-save"></i> Simpan Data
                            </button>

                        </form>
                    </div>
                </div>
            
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection