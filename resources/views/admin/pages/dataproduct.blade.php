@extends('admin.layout.main')

@section('title', 'Data Product')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="mb-2 page-title">Data Product</h2>
                {{-- <p class="card-text">DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool,
                    built upon the foundations of progressive enhancement, that adds all of these advanced features to any
                    HTML table. </p> --}}
                <div class="row my-4">
                    <!-- Small table -->
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                                aria-hidden="true">×</span>
                                        </button>


                                        <?php
                                        
                                        $nomer = 1;
                                        
                                        ?>

                                        @foreach ($errors->all() as $error)
                                            <li>{{ $nomer++ }}. {{ $error }}</li>
                                        @endforeach
                                    </div>
                                @endif
                                <!-- table -->
                                <table class="table datatables responsive nowrap" style="width:100%" id="dataTable-1">
                                    <div class="align-right text-right mb-3">
                                        <button class="btn btn-success btn-sm" data-toggle="modal"
                                            data-target="#addModal">Add</button>
                                    </div>

                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Deskripsi</th>
                                            <th>Harga</th>
                                            <th>Rating</th>
                                            <th>Kategori</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($products as $data)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td><img class="rounded-circle"
                                                        src="{{ asset('foto/product/' . $data['image']) }}" height="40"
                                                        width="40" alt=""></td>
                                                <td>{{ $data->nama }}</td>
                                                <td> <button type="button" class="btn btn-success btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#detailModal{{ $data->id }}">Detail</button></td>
                                                <td>Rp. {{ number_format($data->harga) }}</td>
                                                <td>{{ $data->rating }}</td>
                                                <td>{{ $data->kategori->nama }}</td>
                                                <td>

                                                    <button class="btn btn-warning btn-sm" data-toggle="modal"
                                                        data-target="#editModal{{ $data->id }}">Edit</button>

                                                    <button class="btn btn-danger btn-sm" data-toggle="modal"
                                                        data-target="#deleteModal{{ $data->id }}">Delete</button>

                                                </td>
                                            </tr>

                                            <!-- Modal -->
                                            <div class="modal fade bd-example-modal-lg"
                                                id="detailModal{{ $data->id }}">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Detail Modal</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal"><span>&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Desc</label>
                                                                    <div class="col-sm-10">
                                                                        <textarea class="form-control" cols="30" rows="5">{{ $data->deskripsi }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="deleteModal{{ $data->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="defaultModalLabel">Delete Modal</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Yakin Ingin Menghapus Data?
                                                        </div>
                                                        <form action="/dataproduct/{{ $data->id }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn mb-2 btn-success"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn mb-2 btn-danger">Delete</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="editModal{{ $data->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="defaultModalLabel">Edit Modal</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="/dataproduct/{{ $data->id }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="recipient-name"
                                                                        class="col-form-label">Nama</label>
                                                                    <input type="text" value="{{ $data->nama }}"
                                                                        name="nama" class="form-control"
                                                                        id="recipient-name">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="recipient-name"
                                                                        class="col-form-label">Image</label>
                                                                    <input type="file" value="" name="image"
                                                                        class="form-control" id="recipient-name">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="recipient-name"
                                                                        class="col-form-label">Harga</label>
                                                                    <input type="text" value="{{ $data->harga }}"
                                                                        name="harga" class="form-control"
                                                                        id="recipient-name">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="recipient-name"
                                                                        class="col-form-label">Rating</label>
                                                                    <input type="text" value="{{ $data->rating }}"
                                                                        name="rating" class="form-control"
                                                                        id="recipient-name">
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label for="example-textarea">Deskripsi</label>
                                                                    <textarea class="form-control" name="deskripsi" id="example-textarea" rows="4">{{ $data->deskripsi }}</textarea>
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label for="example-select">Input Select</label>
                                                                    <select name="id_kategori" class="form-control"
                                                                        id="example-select">
                                                                        <option selected value="{{ $data->id_kategori }}">
                                                                            {{ $data->kategori->nama }}
                                                                            @foreach ($kategori as $data)
                                                                        <option value="{{ $data->id }}">
                                                                            {{ $data->nama }}
                                                                        </option>
                                        @endforeach
                                        </select>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn mb-2 btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn mb-2 btn-success">Save
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
            </tbody>
            </table>
            <!-- Add Modal -->
            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="defaultModalLabel">Add Modal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="/dataproduct" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Nama</label>
                                    <input type="text" value="" name="nama" class="form-control"
                                        id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Image</label>
                                    <input type="file" value="" name="image" class="form-control"
                                        id="recipient-name">
                                </div>

                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Harga</label>
                                    <input type="text" value="" name="harga" class="form-control"
                                        id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Rating</label>
                                    <input type="text" value="" name="rating" class="form-control"
                                        id="recipient-name">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="example-textarea">Deskripsi</label>
                                    <textarea class="form-control" name="deskripsi" id="example-textarea" rows="4"></textarea>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="example-select">Input Select</label>
                                    <select name="id_kategori" class="form-control" id="example-select">
                                        <option value="">Pilih Kategori</option>
                                        @foreach ($kategori as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn mb-2 btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn mb-2 btn-success">Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div> <!-- simple table -->
    </div> <!-- end section -->
    </div> <!-- .col-12 -->
    </div> <!-- .row -->
    </div> <!-- .container-fluid -->
@endsection

@section('script')
    <script>
        $('#dataTable-1').DataTable({
            autoWidth: true,
            // "lengthMenu": [
            //     [16, 32, 64, -1],
            //     [16, 32, 64, "All"]
            // ]
            dom: 'Bfrtip',


            lengthMenu: [
                [10, 25, 50, -1],
                ['10 rows', '25 rows', '50 rows', 'Show all']
            ],

            buttons: [{
                    extend: 'colvis',
                    className: 'btn btn-primary btn-sm',
                    text: 'Column Visibility',
                    // columns: ':gt(0)'


                },

                {

                    extend: 'pageLength',
                    className: 'btn btn-primary btn-sm',
                    text: 'Page Length',
                    // columns: ':gt(0)'
                },


                // 'colvis', 'pageLength',

                {
                    extend: 'excel',
                    className: 'btn btn-primary btn-sm',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },

                // {
                //     extend: 'csv',
                //     className: 'btn btn-primary btn-sm',
                //     exportOptions: {
                //         columns: [0, ':visible']
                //     }
                // },
                {
                    extend: 'pdf',
                    className: 'btn btn-primary btn-sm',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },

                {
                    extend: 'print',
                    className: 'btn btn-primary btn-sm',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },

                // 'pageLength', 'colvis',
                // 'copy', 'csv', 'excel', 'print'

            ],
        });
    </script>
@endsection

@section('sweetalert')
    @if (Session::get('update'))
        <script>
            Swal.fire(
                'Success',
                'Data Berhasil Di Update',
                'success'
            )
        </script>
    @endif
    @if (Session::get('delete'))
        <script>
            Swal.fire(
                'Success',
                'Data Berhasil Di Hapus',
                'success'
            )
        </script>
    @endif
    @if (Session::get('create'))
        <script>
            Swal.fire(
                'Success',
                'Data Berhasil Ditambahkan',
                'success'
            )
        </script>
    @endif
    @if (Session::get('gagal'))
        <script>
            Swal.fire(
                'Success',
                'Data Gagal Ditambahkan',
                'error'
            )
        </script>
    @endif

@endsection
