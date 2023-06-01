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
              <h3 class="box-title">{{ __('message.welcome') }}</h3> <br>
              <h3 class="box-title">{{ __('message.languange') }}</h3>
            </div>

            <!-- /.box-header -->
            <div class="box-body">

            <form method="post" action="{{ route('localization.change') }}">
                @csrf
                Ganti Bahasa :
                <select name="languange" required>
                    <option value="">-Pilih-</option>
                    <option value="en" {{ $lang_now == 'en' ? 'selected' : NULL }}>English</option>
                    <option value="id" {{ $lang_now == 'id' ? 'selected' : NULL }}>Indonesia</option>
                    <option value="jp" {{ $lang_now == 'jp' ? 'selected' : NULL }}>Japan</option>
                </select>

                <button type="submit" class="btn btn-success btn-sm">Submit</button>
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