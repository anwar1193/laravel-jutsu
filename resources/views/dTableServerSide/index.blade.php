@extends('layouts.main')

@section('container')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

        <div class="box">

            <div class="box-header">
              <h3 class="box-title">{{ $title }}</h3> <br>
            </div>

            <!-- /.box-header -->
            <div class="box-body">

              <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Item</th>
                        <th>Gambar</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                   
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

  <script type="text/javascript">
    $(function() {

        var table = $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('dtable_serverside.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'item_name',
                    name: 'item_name'
                },
                {
                    data: 'item_image',
                    name: 'item_image',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

    });
</script>

@endsection