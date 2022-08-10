@extends('layouts.main')

@section('container')
    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Add Data to Rest Client 1</h3> <br>
              <span>URL Rest Server : <a target="_blank" href="https://anwar-news.000webhostapp.com/">https://anwar-news.000webhostapp.com/</a></span>
            </div>

            <!-- /.box-header -->
            <div class="box-body">

                <div class="col-md-6">
                    <form action="/rest_client1" method="post">

                        @csrf

                        <div class="form-group @error('username') has-error @enderror">
                            <label>Username :</label>
                            <input type="text" class="form-control" name="username" autocomplete="off" autofocus value="{{ old('username') }}">
                            @error('username')
                                <div class="invalid-feedback text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group @error('address') has-error @enderror">
                            <label>Address :</label>
                            <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                            @error('address')
                                <div class="invalid-feedback text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <a href="/rest_client1" class="btn btn-danger btn-sm">
                            <i class="fa fa-backward"></i> Back
                        </a>

                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-save"></i> Save Data
                        </button>

                    </form>
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