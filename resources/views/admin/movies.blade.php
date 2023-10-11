@extends('layouts.dashboard.app')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Movies</h1>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Add Movie
        </button>


    </div>


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Movies List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Genre</th>
                        <th>Time</th>
                        <th>Link</th>
                        <th>Updated date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Genre</th>
                        <th>Time</th>
                        <th>Link</th>
                        <th>Updated date</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>

                    @foreach($movies as $movie)

                        <tr>
                            <td>{{ $movie->name }}</td>
                            <td>{{ $movie->genre }}</td>
                            <td>{{ $movie->time }}</td>
                            <td><a href="{{ $movie->link }}">View</a></td>
                            <td>{{ $movie->updated_at }}</td>
                            <td>
                                <div class="dropdown mb-0">
                                    <button class="btn btn-primary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu animated--fade-in"
                                         aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{ url('/admin/movies/view/'.$movie->id ) }}">View</a>
                                        <a class="dropdown-item edit-movie" href="#"
                                           data-id="{{ $movie->id }}">Edit</a>
                                        <a class="dropdown-item delete_movie" href="#"
                                           data-id="{{ $movie->id }}">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="edit-modal-content">

            </div>

        </div>
    </div>


    {{--Modal--}}
    @include('modal.movie_add_modal')
@endsection

@push('script')
    <script>
        // VALIDATE MOVIE TIME
        $(document).on('change', "#movie-time", function (e) {
            const movieTimeRegex = /^(\d{2}):(\d{2}):(\d{2})$/;
            let movieTime = $('#movie-time');

            if (!movieTimeRegex.test(movieTime.val())) {
                movieTime.css("border-color", "red")
                movieTime.val("00:00:00")
            } else {
                movieTime.css("border-color", "blue")
            }
        });

        function alertMessage(message, state) {
            if (state == "s") {
                $('.modal-footer').prepend(`
                    <div class="alert alert-success" role="alert">
                    ${message}
                    </div>`);
            } else {
                $('.modal-footer').prepend(`
                    <div class="alert alert-warning" role="alert">
                    ${message}
                    </div>`);
            }
            setTimeout(function () {
                $('.alert').hide('slow');
            }, 1000)
        }

        $(document).ready(function () {
            $('#dataTable').DataTable();
        });

        $(document).on('click', '.append-btn', function () {
            $('.casts-table-body').append(` <tr>
                                <th><input type="file" class="form-control" class="movie-cast-image" name="cast_image[]"
                                           required></th>
                                <th><input type="text" class="form-control" class="movie-cast-name" name="cast_name[]"
                                           required></th>
                                <th class="d-flex justify-content-between" style="gap:10px;">
                                    <a href="#" class="btn btn-primary btn-circle append-btn" >
                                        +
                                    </a>
                                    <a href="#" class="btn btn-primary btn-danger btn-circle remove-btn">
                                        -
                                    </a></th>
                            </tr>`);

        });

        $(document).on('click', '.remove-btn', function () {
            $(this).closest('tr').remove();
        });

        $(document).ready(function () {
            // EDIT MOVIE MODAL
            $(document).on('click', '.edit-movie', function () {
                let id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    url: "{{ url('/admin/movies/modal/edit') }}" + "/" + id,
                    success: function (response) {
                        console.log("Response from server: " + response);
                        $('#edit-modal-content').append(response);
                        $('#editModal').modal('show');
                    },
                    error: function (jqXHR, error) {
                        console.error(jqXHR.responseJSON.message);
                    }
                });
            })
            $('#editModal').on('hide.bs.modal', function (e) {
                $('#edit-modal-content').append("");
            })

            // CREATE MOVIE
            $(document).on("submit","#create_movie",function (event) {
                event.preventDefault();
                let formData = new FormData(this);
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin_create_movie') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        console.log("Response from server: " + response);
                        location.reload()
                        alertMessage("Success", "s");
                    },
                    error: function (jqXHR, error) {
                        console.error(jqXHR.responseJSON.message);

                        alertMessage(jqXHR.responseJSON.message, "f");
                    }
                });
            });

            // CREATE MOVIE
            $(document).on("submit","#edit_movie",function (event) {
                event.preventDefault();
                let formData = new FormData(this);
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin_edit_movie') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        console.log("Response from server: " + response);
                        location.reload()
                        alertMessage("Success", "s");
                    },
                    error: function (jqXHR, error) {
                        console.error(jqXHR.responseJSON.message);

                        alertMessage(jqXHR.responseJSON.message, "f");
                    }
                });
            });

            // DELETE MOVIE
            $(document).on('click', '.delete_movie', function () {
                let id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    url: "{{ url('/admin/movies/delete') }}" + "/" + id,
                    success: function (response) {
                        console.log("Response from server: " + response);
                        location.reload()
                    },
                    error: function (jqXHR, error) {
                        console.error(jqXHR.responseJSON.message);
                    }
                });
            });

        });


    </script>
    <script>

    </script>

@endpush
