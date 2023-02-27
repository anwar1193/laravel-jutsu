@extends('layouts.main')

@section('container')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

        <div class="box">

            <div class="box-header">
              <h3 class="box-title">CRUD Upload With Resource - Tambah Data</h3> <br>
            </div>

            <!-- /.box-header -->
            <div class="box-body">

                <div class="row">
                    <div class="col-md-6">
                        <form method="post" action="/crud_upload/{{ $data->id }}" enctype="multipart/form-data">
                            @method('put')
                            @csrf
        
                            {{-- Nama Item --}}
                            <div class="form-group">
                                <label for="item_name">Nama Item :</label>
                                <input type="text" name="item_name" class="form-control @error('item_name') is-invalid @enderror" id="item_name" autofocus autocomplete="off" value="{{ old('item_name', $data->item_name) }}">
        
                                @error('item_name')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            {{-- Gambar Item --}}
                            <div class="form-group">
                                <label for="item_image">Gambar Item :</label> <br>

                                {{-- Ambil data gambar lama untuk dikirim sebagai triger hapus gambar lama --}}
                                <input type="hidden" name="item_image_old" value="{{ $data->item_image }}">

                                @if ($data->item_image)
                                    <img src="{{ asset('storage/'.$data->item_image) }}" class="img-preview img-fluid mb-3 col-sm-5">
                                @else
                                    <img class="img-preview img-fluid mb-3 col-sm-5">
                                @endif
                                
                                <input type="file" name="item_image" class="form-control @error('item_image') is-invalid @enderror" id="item_image" onchange="previewImage()">
        
                                @error('item_image')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            

                            <a href="/crud_upload" class="btn btn-danger">
                                <i class="fa fa-backward"></i> Kembali
                            </a>

                            <button class="btn btn-success" type="submit">
                                <i class="fa fa-save"></i> Update Data
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

  <script>
    // function preview image sebelum di simpan
    function previewImage(){
        const image = document.querySelector('#item_image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent){
        imgPreview.src = oFREvent.target.result;
        }
    }
  </script>
@endsection