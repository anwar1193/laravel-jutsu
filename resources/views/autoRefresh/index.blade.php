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
              <h3 class="box-title">Auto Refresh</h3> <br>
            </div>

            <!-- /.box-header -->
            <div class="box-body">

                <div id="tampil">
                    <script type="text/javascript">
                        $(document).ready(function(){
                            setInterval(function(){
                                $('#tampil').load('/auto-refresh/get_data')
                            }, 2000);
                        });
                    </script>
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
    $(document).ready(function(){
        // $(document).on('click', '#tes-tombol', function(){
        //     alert("OKE");
        // });
    });
  </script>
@endsection