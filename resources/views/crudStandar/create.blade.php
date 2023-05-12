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
              <h3 class="box-title">CRUD Standar With Resource - Tambah Data</h3> <br>
            </div>

            <!-- /.box-header -->
            <div class="box-body">

                <div class="row">
                    <div class="col-md-6">
                        <form method="post" action="/crud_standar">
                            @csrf
        
                            {{-- Nama Lengkap --}}
                            <div class="form-group">
                                <label for="emp_name">Nama Lengkap :</label>
                                
                                <input type="text" name="emp_name" class="form-control @error('emp_name') is-invalid @enderror" id="emp_name" autofocus value="{{ old('emp_name') }}">
        
                                @error('emp_name')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Agama --}}
                            <div class="form-group">
                                <label for="emp_religion">Agama :</label>
                                <select name="emp_religion" id="emp_religion" class="form-control @error('emp_name') is-invalid @enderror">
                                    <option value="">- Pilih Agama -</option>
                                    @foreach ($religion as $data)
                                        <option value="{{ $data }}">{{ $data }}</option>
                                    @endforeach
                                </select>

                                @error('emp_religion')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Jenis Kelamin --}}
                            <div class="form-group">
                                <label for="emp_gender">Jenis Kelamin : </label>
                                <input type="radio" name="emp_gender" value="Laki-laki" checked> Laki-laki
                                <input type="radio" name="emp_gender" value="Perempuan"> Perempuan
                            </div>

                            {{-- Tanggal Lahir --}}
                            <div class="form-group">
                                <label for="emp_birthdate">Tanggal Lahir</label>
                                <input type="date" name="emp_birthdate" class="form-control @error('emp_birthdate') is-invalid @enderror" id="emp_birthdate" autofocus value="{{ old('emp_birthdate') }}">
        
                                @error('emp_birthdate')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Alamat --}}
                            <div class="form-group">
                                <label for="emp_adress">Alamat :</label>
                                <textarea name="emp_adress" id="emp_adress" class="form-control @error('emp_adress') is-invalid @enderror"></textarea>
        
                                @error('emp_adress')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <a href="/crud_standar" class="btn btn-danger">
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