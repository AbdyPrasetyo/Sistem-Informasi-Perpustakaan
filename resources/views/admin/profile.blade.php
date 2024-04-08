@extends('layouts/main')
@section('content')
<h4 class="fw-bold py-3 mb-4">Data Kotak Saran</h4>





    @if (session('success'))
    <div class="alert alert-primary alert-dismissible mt-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    @if (session('error'))<div class="alert alert-danger alert-dismissible mt-3" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <div class="card mb-4">
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered mb-4 justify-content-center" id="example">
                <thead class="table-dark">

                    <th>No</th>
                    <th>email</th>
                    <th>NAMA</th>
                    <th>subject</th>
                    <th>message</th>

                    <th>Action</th>

                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($sugar as $sug)


                    <td>{{ $no++ }}</td>
                    <td><a href="mailto:{{ $sug->email }}">{{ $sug->email }}</a></td>
                    <td>{{ $sug->name }}</td>
                    <td>{{ $sug->subject }}</td>
                    <td>{{ $sug->message }}</td>
                    <td>

                        <Button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete-{{ $sug->id }}">
                            <i class='bx bx-trash'></i> Delete</Button>


                    </td>
                    </tr>



                    <!-- Modal delete -->
                    <div class="modal fade" id="delete-{{ $sug->id }}" tabindex="-1" aria-labelledby="#exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin menghapus data saran ini?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('kontak.destroy', $sug->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <div class="text-center">

                                           <h5 class="text-danger"> {{ $sug->email  }} </h5>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Yes</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- end modal --}}
                    @endforeach
                </tbody>


            </table>
            <!--/ Basic DataTable -->

            <hr class="my-5">



            @push('js')

            <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script type="text/javascript" charset="utf8"
                src=" http://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
            <script type="text/javascript" charset="utf8"
                src=" https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
            <script>
                $(document).ready(function () {
                    $('#example').DataTable();
                });
            </script>
            @endpush
        </div>
        @endsection
