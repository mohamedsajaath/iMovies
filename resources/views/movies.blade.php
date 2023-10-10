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
                        <th>Description</th>
                        <th>Time</th>
                        <th>Link</th>
                        <th>Updated date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
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
                            <td>{{ $movie->description }}</td>
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
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ADD MOVIE</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin_create_movie') }}" method="post" enctype="multipart/form-data"
                      id="create_movie">
                    <div class="modal-body">

                        @csrf
                        {{--NAME--}}
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Name:<sup
                                    class="text-danger">*</sup></label>
                            <input type="text" class="form-control" id="movie-name" name="name">
                        </div>
                        {{--DESCRIPTION--}}
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Description:<sup
                                    class="text-danger">*</sup></label>
                            <textarea class="form-control" id="message-description" name="description"></textarea>
                        </div>
                        <div class="d-flex w-100 justify-content-between " style="gap:10%;">
                            {{--RATING--}}
                            <div class="form-group w-50">
                                <label for="message-text" class="col-form-label">Rating:<sup class="text-danger">*</sup></label>
                                <input type="number" min="1" max="5" class="form-control" id="movie-rating"
                                       name="rating" required>
                            </div>
                            {{--DURATION--}}
                            <div class="form-group w-50">
                                <label for="message-text" class="col-form-label">Duration:<sup
                                        class="text-danger">*</sup></label>
                                <input type="text" class="form-control" id="movie-time" name="time" value="00:00"
                                       required>
                            </div>
                        </div>
                        <div class="d-flex w-100 justify-content-between " style="gap:10%;">
                            {{--RELEASE DATE--}}
                            <div class="form-group w-50">
                                <label for="message-text" class="col-form-label">Release Date:<sup
                                        class="text-danger">*</sup></label>
                                <input type="date" class="form-control" id="movie-release" name="release" required>
                            </div>
                            {{--LANGUAGE--}}
                            <div class="form-group w-50">
                                <label for="message-text" class="col-form-label">Language:<sup
                                        class="text-danger">*</sup></label>
                                <input type="text" class="form-control" id="movie-language" name="language" required>
                            </div>
                        </div>
                        {{--GENRE--}}
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Genre:<sup
                                    class="text-danger">*</sup></label>
                            <input type="text" class="form-control" id="movie-genre" name="genre"
                                   required>
                        </div>
                        {{--LINK--}}
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Link:</label>
                            <input type="text" class="form-control" id="movie-link" name="link" placeholder="https://">
                        </div>

                        {{--IMAGES--}}
                        <span class="mb-5">Visuals <sup class="text-danger">*</sup></span>
                        <div class="d-flex w-100 justify-content-between " style="gap:10%;">
                            <div class="form-group w-50">
                                <label for="message-text" class="col-form-label">Thumbnail:</label>
                                <input type="file" class="form-control" id="movie-thumbnail" name="thumbnail" required>
                                <small class="text-gray-400">1080*52</small>
                            </div>
                            <div class="form-group w-50">
                                <label for="message-text" class="col-form-label">Poster:</label>
                                <input type="file" class="form-control" id="movie-poster" name="poster" required>
                                <small class="text-gray-400">1800*52</small>
                            </div>
                        </div>


                        <span class="mb-5">Visibility <sup class="text-danger">*</sup></span>
                        <div class="d-flex w-100 justify-content-between " style="gap:10%;">
                            <div class="form-group w-50">
                                <label class="form-check-label">Top Movie List</label><br>
                                <div class="d-inline-flex" style="gap:10%;">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="top_section" id="on-top"
                                               value="1">
                                        <label class="form-check-label" for="on-top">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="top_section" id="on-top2"
                                               checked value="0">
                                        <label class="form-check-label" for="on-top2">
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group w-50">
                                <label class="form-check-label">Coming Soon </label><br>
                                <div class="d-inline-flex" style="gap:10%;">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="coming_soon"
                                               id="coming-soon" value="1">
                                        <label class="form-check-label" for="coming-soon">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="coming_soon"
                                               id="coming-soon2" value="0" checked>
                                        <label class="form-check-label" for="coming-soon2">
                                            No
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{--CASTS--}}
                        <span class="mb-5">Casts<sup class="text-danger">*</sup></span>
                        <table class="table" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Action    <a href="#" class="append-btn btn" >+</a></th>

                            </tr>
                            </thead>
                            <tbody class="casts-table-body">
                            <tr>
                                <th><input type="file" class="form-control" class="movie-cast-image" name="cast_image[]"
                                           required></th>
                                <th><input type="text" class="form-control" class="movie-cast-name" name="cast_name[]"
                                           required></th>
                                <th class="d-flex justify-content-between" style="gap:10px;">
                                    <a href="#" class="btn btn-primary btn-circle append-btn">
                                        +
                                    </a>
                                    <a href="#" class="btn btn-primary btn-danger btn-circle remove-btn">
                                        -
                                    </a>
                                </th>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="add-movie-btn">ADD</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

@endsection

@push('script')
    <script>
        $(document).on('change', "#movie-time", function (e) {
            const movieTimeRegex = /^(\d{2}):(\d{2})$/;
            let movieTime = $('#movie-time');

            if (!movieTimeRegex.test(movieTime.val())) {
                movieTime.css("border-color", "red")
                movieTime.val("00:00")
            } else {
                movieTime.css("border-color", "blue")
            }

        });

        $(document).ready(function () {
            $("#create_movie").submit(function (event) {
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


      $(document).on('click','.append-btn',function () {
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

      $(document).on('click','.remove-btn',function (){
          $(this).closest('tr').remove();
      });

    </script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>

@endpush
