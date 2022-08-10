@extends('layouts.main')

@section('container')
    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

        <div class="box">

            <div class="box-header">
              <h3 class="box-title">DYNAMIC SELECT</h3>
              <hr>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
                

                {{-- Isi Select --}}
                    {{-- @livewire('select') --}}

                    <div class="row">
                        <div class="col-md-6">
                    
                            <div class="form-group">
                                <label for="province">Province</label>
                                <select name="province" id="province" class="form-control">
                                    <option value="">Choose a province</option>
                                    @foreach ($provinces as $row)
                                        <option value="{{ $row['id'] }}">{{ $row['province_name'] }}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                    
                            {{-- @if (count($cities) > 0) --}}
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <select name="city" id="city" class="form-control">
                                        <option></option>
                                    </select>
                                </div>
                            {{-- @endif --}}
                    
                        </div>
                    </div>
                {{-- END Isi Select --}}
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <script>
    
    $('#province').on('change', function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let province_id = $(this).val();

        if(province_id != ''){
            $.ajax({
                url:"{{ route('dynamic.showcity') }}",
                type: "POST",
                data: {
                    province_id:province_id
                },
                success:function(response)
                {
                    $('#city').html(response);
                }
            });
        }  
    });

  </script>

  @endsection