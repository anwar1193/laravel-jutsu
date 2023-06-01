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
              <h3 class="box-title">{{ $title }}</h3> <hr>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
                <form method="post" action="{{ route('email.send') }}">
                    @csrf
                    <div class="form-group">
                        <label for="">Email Tujuan</label>
                        <input type="email" class="form-control" name="email_tujuan" id="email_tujuan" required autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="">Subject</label>
                        <input type="text" class="form-control" name="subject" id="subject" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="">Pesan</label>
                        <textarea id="editor1" name="pesan" rows="10" cols="80"></textarea>
                    </div>

                    <button type="submit" class="btn btn-success btn-sm">
                        <i class="fa fa-send"></i> Kirim Email
                    </button>
                </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection