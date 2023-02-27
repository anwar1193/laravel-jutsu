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
              <h3 class="box-title">CRUD Multiple - Tambah Data</h3> <br>
            </div>

            <!-- /.box-header -->
            <div class="box-body">

                <div class="row">
                    <div class="col-md-6">
                        <form method="post" action="/crud_multiple">
                            @csrf
        
                            {{-- Kode Transaksi --}}
                            <div class="form-group">
                                <label for="trans_code">Kode Transaksi :</label>
                                <input type="text" name="trans_code" class="form-control @error('trans_code') is-invalid @enderror" id="trans_code" autofocus value="{{ old('trans_code') }}">
        
                                @error('trans_code')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Admin Transaksi --}}
                            <div class="form-group">
                                <label for="trans_admin">Admin :</label>
                                <input type="text" name="trans_admin" class="form-control @error('trans_admin') is-invalid @enderror" id="trans_admin" value="{{ old('trans_admin', auth()->user()->name) }}" readonly>
        
                                @error('trans_admin')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- List Produk --}}
                            <div>
                                <table class="table table-bordered" id="tableLoop">
                                    <thead>
                                        <tr class="bg-success">
                                        <th>#</th>
                                        <th>Pilih Barang</th>
                                        <th class="text-center">
                                            <button class="btn btn-primary btn-xs" id="BarisBaru">
                                            <i class="fa fa-plus"></i> Baris Baru
                                            </button>
                                        </th>
                                        </tr>
                                    </thead>
                        
                                    <tbody id="table_data"></tbody>
                                </table>
                            </div>
                  

                            <a href="/crud_multiple" class="btn btn-danger">
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


  <script type="text/javascript">

    $(document).ready(function(){
      for(b=1; b<=1; b++){
        barisBaru();
      }
      $('#BarisBaru').click(function(e){
        e.preventDefault();
        barisBaru();
      });

      $("tableLoop tbody").find('input[type=text]').filter(':visible:first').focus();
    });
    
    function barisBaru(){
      $(document).ready(function(){
        $("[data-toggle='tooltip'").tooltip();
      });

      var Nomor = $("#tableLoop tbody tr").length + 1;
      var Baris = '<tr>';
              Baris += '<td class="text-center">'+Nomor+'</td>';

              Baris += '<td>';
                Baris += '<select class="form-control trans_product" name="trans_product[]">';
                Baris += '<option value="">- Pilih -</option>';
                Baris += '<?php foreach($product as $row_prod) : ?>';
                Baris += '<option value="<?php echo $row_prod['id'] ?>"><?php echo $row_prod['product_name'] ?></option>';
                Baris += '<?php endforeach; ?>';
                Baris += '</select>';
              Baris += '</td>';

              Baris += '<td class="text-center">';
                Baris += '<a class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus Baris" id="HapusBaris"><i class="fa fa-times"></i></a>';
              Baris += '</td>';
          Baris += '</tr>';

      $("#tableLoop tbody").append(Baris);
      $("#tableLoop tbody tr").each(function(){
        $(this).find('td:nth-child(2) input').focus();
      });

    }

    $(document).on('click', '#HapusBaris', function(e){
      e.preventDefault();
      var Nomor = 1;
      $(this).parent().parent().remove();
      $('tableLoop tbody tr').each(function(){
        $(this).find('td:nth-child(1)').html(Nomor);
        Nomor++;
      });
    });

  </script>
@endsection