@extends('layouts.main')

@section('container')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">

            <div class="box">

                <div class="box-header">
                    <h3 class="box-title">CRUD With Sweet Alert</h3> <br>
                </div>

                <!-- /.box-header -->
                <div class="box-body">

                <a href="/crud_sweetalert/create" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Add New Data
                </a>

                <hr>

                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Provinsi</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($data as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->province_name }}</td>
                                <td>
                                    <a href="/crud_sweetalert/{{ $row->id }}/edit" class="btn btn-success">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <form method="post" action="/crud_sweetalert/{{ $row->id }}" style="display: inline">
                                        @method('delete')
                                        @csrf

                                        <button class="btn btn-danger tombol-hapus">
                                            <i class="fa fa-trash"></i>
                                        </button>

                                        <button class="tombol-hapus2" style="display: none">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
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


    <script src="/asset/sweetAlert/sweetalert2.all.min.js"></script>


    @if (session()->has('success'))
        <script>
        Swal.fire({
            icon: 'success', //Icon : success, error, warning, info, question
            title: 'Berhasil',
            text: '{{ session('success') }}'
            // footer: 'Data Mahasiswa Tersimpan Ke Database'
        });
        </script>
    @endif

    {{-- Pesan Konfimasi Sebelum Hapus Data --}}
    <script>
        $('.tombol-hapus').on('click', function(e){ //tombol-hapus = a href

            e.preventDefault(); // Mematikan fungsi href pada a

            // Ambil Link dari tombol hapus yang sedang di klik
            const href = '/crud_sweetalert/{{ $row->id }}';

            Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Data Provinsi Akan Dihapus!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus Data!'
            }).then((result) => {
            if (result.value) { //Jika Ya
                $('.tombol-hapus2').click();
            }
            });

        });
    </script>
@endsection