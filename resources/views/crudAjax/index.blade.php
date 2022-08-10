@extends('layouts.main')

@section('container')
    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

        <div class="box">

            <div class="box-header">
              <h3 class="box-title">CRUD AJAX</h3>
            </div>

            <!-- /.box-header -->
            <div class="box-body">

            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-add">
                <i class="fa fa-plus"></i> Add New Data
            </a>

            <hr>

              <table id="productTable" class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th>Product Category</th>
                        <th>Product Stock</th>
                        <th>Product Image</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($products as $row)
                        <tr id="sid{{ $row['id'] }}">
                            <td class="td_norut">
                                {{ $loop->iteration }}
                                <input type="text" id="nomor_urut" value="{{ $loop->iteration }}" hidden>
                            </td>
                            <td>{{ $row['product_code'] }}</td>
                            <td>{{ $row['product_name'] }}</td>
                            <td>{{ $row['product_category'] }}</td>
                            <td>{{ $row['product_stock'] }}</td>
                            <td>{{ $row['product_image'] }}</td>
                            <td>
                                <a href="javascript:void(0)" onclick="editProduct({{ $row['id'] }})" class="btn btn-info btn-xs">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a href="javascript:void(0)" onclick="deleteProduct({{ $row['id'] }})" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i>
                                </a>
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


  {{-- Modal Tambah Data --}}
  <div class="modal fade" id="modal-add">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Add New Data</h4>
        </div>
        <div class="modal-body">
            
            <form id="formAdd">
                @csrf
                <div class="form-group">
                    <label for="productCode">Product Code</label>
                    <input type="text" class="form-control" id="productCode" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="productName">Product Name</label>
                    <input type="text" class="form-control" id="productName" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="productCategory">Product Category</label>
                    <input type="text" class="form-control" id="productCategory" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="productStock">Product Stock</label>
                    <input type="number" class="form-control" id="productStock">
                </div>

                <div class="form-group">
                    <label for="productImage">Product Image</label>
                    <input type="text" class="form-control" id="productImage">
                </div>

                <button type="button" class="btn btn-default pull-left btn-sm" data-dismiss="modal">Close</button>
                &nbsp;
                <button type="submit" class="btn btn-primary btn-sm">Save Data</button>
            </form>

        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  {{-- END Modal Tambah Data --}}


  {{-- Modal Edit Data --}}
  <div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Add New Data</h4>
        </div>
        <div class="modal-body">
            
            <form id="formEdit">
                @csrf
                <input type="text" id="id" name="id" hidden>
                <div class="form-group">
                    <label for="productCode">Product Code</label>
                    <input type="text" class="form-control" id="productCode2" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="productName">Product Name</label>
                    <input type="text" class="form-control" id="productName2" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="productCategory">Product Category</label>
                    <input type="text" class="form-control" id="productCategory2" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="productStock">Product Stock</label>
                    <input type="number" class="form-control" id="productStock2">
                </div>

                <div class="form-group">
                    <label for="productImage">Product Image</label>
                    <input type="text" class="form-control" id="productImage2">
                </div>

                <button type="button" class="btn btn-default pull-left btn-sm" data-dismiss="modal">Close</button>
                &nbsp;
                <button type="submit" class="btn btn-primary btn-sm">Update Data</button>
            </form>

        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  {{-- END Modal Edit Data --}}

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <script>
    $('#formAdd').submit(function(e){
        e.preventDefault();

        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        let productCode = $('#productCode').val();
        let productName = $('#productName').val();
        let productCategory = $('#productCategory').val();
        let productStock = $('#productStock').val();
        let productImage = $('#productImage').val();

        let nomor_urut0 = $('.td_norut:last #nomor_urut').val();
        let nomor_urut = Number(nomor_urut0);
        nomor_urut++;

        $.ajax({
           url: "{{ route('crud_ajax.add') }}" ,
           type: "POST",
           data: {
            productCode:productCode,
            productName:productName,
            productCategory:productCategory,
            productStock:productStock,
            productImage:productImage
           },
           success:function(response)
           {
            if(response){
                $('#productTable tbody').append(`
                    <tr>
                        <td class="td_norut">
                            ${nomor_urut}
                            <input type="text" id="nomor_urut" value="${nomor_urut}" hidden>
                        </td>  
                        <td>${response.product_code}</td>
                        <td>${response.product_name}</td>
                        <td>${response.product_category}</td>
                        <td>${response.product_stock}</td>
                        <td>${response.product_image}</td>
                        <td>
                            <a href="javascript:void(0)" onclick="editProduct(${response.id})" class="btn btn-info btn-xs">
                                <i class="fa fa-edit"></i>
                            </a>

                            <a href="javascript:void(0)" onclick="deleteProduct(${response.id})" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                `);

                $('#formAdd')[0].reset();
                $('#modal-add').modal('hide');
            }
           }
        });
    });
  </script>


<script>
    // Tampil product by id ke form
    function editProduct(id)
    {
        $.get('/crud_ajax/'+id, function(product){
            $('#id').val(product.id);
            $('#productCode2').val(product.product_code);
            $('#productName2').val(product.product_name);
            $('#productCategory2').val(product.product_category);
            $('#productStock2').val(product.product_stock);
            $('#productImage2').val(product.product_image);
            $('#modal-edit').modal('toggle');
        });
    }

    $('#formEdit').submit(function(e){
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let id = $('#id').val();
        let productCode = $('#productCode2').val();
        let productName = $('#productName2').val();
        let productCategory = $('#productCategory2').val();
        let productStock = $('#productStock2').val();
        let productImage = $('#productImage2').val();

        $.ajax({
            url:"{{ route('crud_ajax.update') }}",
            type:"PUT",
            data:{
                id:id,
                productCode:productCode,
                productName:productName,
                productCategory:productCategory,
                productStock:productStock,
                productImage:productImage
            },
            success:function(response){
                $('#sid' + response.id + ' td:nth-child(2)').text(response.product_code);
                $('#sid' + response.id + ' td:nth-child(3)').text(response.product_name);
                $('#sid' + response.id + ' td:nth-child(4)').text(response.product_category);
                $('#sid' + response.id + ' td:nth-child(5)').text(response.product_stock);
                $('#sid' + response.id + ' td:nth-child(6)').text(response.product_image);
                $('#modal-edit').modal('toggle');
                $('#formEdit')[0].reset();
            }
        });
    });
</script>

<script>
    function deleteProduct(id)
    {
        if(confirm("Do you want to delete this record?"))
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url:'/student/'+id,
                type:'DELETE',
                data:{},
                success:function(response){
                    $('#sid'+id).remove();
                }
            });
        }
    }
</script>

  @endsection