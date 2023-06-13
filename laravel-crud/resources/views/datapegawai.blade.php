<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>CRUD LARAVEL</title>
  </head>

  <body>
      <div class="container">
        <h1 class="text-center mb-4 mt-2 text-monospace fw-bold" style="background-color: rgb(61, 99, 187); color: white; padding-bottom: 10px;">Data Pegawai</h1>

            <a href="/tambahpegawai" class="btn btn-success" style="font-weight: bold">Tambah +</a>

            <div class="row g-3 align-items-center mt-2">
              <div class="col-auto">
                <form action="/pegawai" method="GET">
                    <div class="input-group">
                        <input type="search" id="inputPassword6" name="search" class="form-control border-2 border-warning" aria-describedby="passwordHelpInline" style="background-color: rgb(235, 235, 235);">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="submit">
                                <i class="fas fa-search"></i>
                                </button>
                            </div>
                    </div>
                </form>

            </div>


            <div class="col-auto">
                <a href="/exportpdf" class="btn" style="background-color: maroon; color: white; font-weight: bold;">Export PDF</a>
            </div>

            <div class="col-auto">
                <a href="/exportexcel" class="btn btn-success" style="font-weight: bold">Export Excel</a>
            </div>

            <div class="col-auto">
                <button type="button" class="btn btn-primary" style="font-weight: bold" data-bs-toggle="modal" data-bs-target="#exampleModal">Import Data
                </button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/importexcel" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="file" name="file" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



            </div>
            <div class="row">
            {{-- @if ($message = Session::get('success'))
                <div class="alert alert-success alert-full-width" role="alert" style="width:100%">
                   {{$message}}
                </div>
            @endif --}}
            <div class="table-responsive mt-3 mb-3">

            <style>
                /* Mengubah warna latar belakang saat cursor hover */
                .table-hover tbody tr:hover{
                    background-color: rgb(210, 230, 247);
                }
            </style>

            <table class="table table-hover table-bordered table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col"class="text-center">#</th>
                        <th scope="col"class="text-center">Nama</th>
                        <th scope="col"class="text-center">Foto</th>
                        <th scope="col"class="text-center">Jenis Kelamin</th>
                        <th scope="col"class="text-center">No Telepon</th>
                        <th scope="col"class="text-center">Dibuat</th>
                        <th scope="col"class="text-center">Option</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($data as $index => $row)
                    <tr >
                        <th scope="row" class="text-center">{{ $index + $data->firstitem() }}</th>
                        <td class="text-center">{{$row->nama}}</td>
                        <td class="text-center">
                            <img src="{{asset('fotopegawai/'.$row->foto)}}" alt="" style="width: 40px;">
                        </td>
                        <td class="text-center">{{$row->jeniskelamin}}</td>
                        <td class="text-center">0{{$row->notelpon}}</td>
                        <td class="text-center">{{$row->created_at->format('D, d M Y')}}</td>
                        <td class="text-center">
                            <a href="/tampilkandata/ {{ $row->id }}" class="btn btn-info">Edit</a>
                            <a href="#" class="btn btn-danger delete" data-id="{{$row->id}}" data-nama="{{$row->nama}}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        {{ $data->links() }}
        </div>
        </div>



            <!-- Optional JavaScript; choose one of the two! -->

            <!-- Option 1: Bootstrap Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>

            <!-- Option 2: Separate Popper and Bootstrap JS -->
            <!--
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
            -->


        </body>
                    <script>
                    $('.delete').click(function(){
                        var pegawaiid = $(this).attr('data-id');
                        var nama = $(this).attr('data-nama');
                        swal({
                                title: "Yakin?",
                                text: "Kamu akan menghapus data pegawai dengan nama "+nama+" ",
                                icon: "warning",
                                buttons: true,
                                dangerMode: true,
                                })
                                .then((willDelete) => {
                                if (willDelete) {
                                    window.location = "/delete/"+pegawaiid+""
                                    swal("Data berhasil dihapus", {
                                    icon: "success",
                                    });
                                } else {
                                    swal("Data tidak jadi dihapus");
                                }
                            });
                    });
                    </script>

        <script>

            @if (Session:: has('success'))
            toastr.success("{{ Session::get('success') }}")
            @endif

        </script>

        </html>

