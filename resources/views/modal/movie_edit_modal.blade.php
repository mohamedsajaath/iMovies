<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">EDIT MOVIE</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form action="{{ route('admin_edit_movie') }}" method="post" enctype="multipart/form-data"
      id="edit_movie">
    <div class="modal-body">

        @csrf
        <input type="hidden" name="id" value="{{ $movie->id }}">
        {{--NAME--}}
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name:<sup
                    class="text-danger">*</sup></label>
            <input type="text" class="form-control" id="movie-name" name="name" value="{{ $movie->name }}">
        </div>
        {{--DESCRIPTION--}}
        <div class="form-group">
            <label for="message-text" class="col-form-label">Description:<sup
                    class="text-danger">*</sup></label>
            <textarea class="form-control" id="message-description" name="description"
                      value="{{ $movie->description }}">{{ $movie->description }}</textarea>
        </div>
        <div class="d-flex w-100 justify-content-between " style="gap:10%;">
            {{--RATING--}}
            <div class="form-group w-50">
                <label for="message-text" class="col-form-label">Rating:<sup class="text-danger">*</sup></label>
                <input type="number" min="1" max="5" class="form-control" id="movie-rating"
                       name="rating" value="{{ $movie->rating }}" required>
            </div>
            {{--DURATION--}}
            <div class="form-group w-50">
                <label for="message-text" class="col-form-label">Duration:<sup
                        class="text-danger">*</sup></label>
                <input type="text" class="form-control" id="movie-time" name="time" value="00:00"
                       value="{{ $movie->time }}"
                       required>
            </div>
        </div>
        <div class="d-flex w-100 justify-content-between " style="gap:10%;">
            {{--DIRECTOR--}}
            <div class="form-group w-50">
                <label for="message-text" class="col-form-label">Director:<sup
                        class="text-danger">*</sup></label>
                <input type="text" class="form-control" id="movie-director" name="director"
                       value="{{ $movie->director }}" required>
            </div>
            {{--WRITER--}}
            <div class="form-group w-50">
                <label for="message-text" class="col-form-label">Writer:<sup
                        class="text-danger">*</sup></label>
                <input type="text" class="form-control" id="movie-writer" name="writer" value="{{ $movie->writer }}"
                       required>
            </div>
        </div>
        <div class="d-flex w-100 justify-content-between " style="gap:10%;">
            {{--RELEASE DATE--}}
            <div class="form-group w-50">
                <label for="message-text" class="col-form-label">Release Date:<sup
                        class="text-danger">*</sup></label>
                <input type="date" class="form-control" id="movie-release" name="release" value="{{ $movie->release }}"
                       required>
            </div>
            {{--LANGUAGE--}}
            <div class="form-group w-50">
                <label for="message-text" class="col-form-label">Language:<sup
                        class="text-danger">*</sup></label>
                <input type="text" class="form-control" id="movie-language" name="language"
                       value="{{ $movie->language }}" required>
            </div>
        </div>
        {{--GENRE--}}
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Genre:<sup
                    class="text-danger">*</sup></label>
            <input type="text" class="form-control" id="movie-genre" name="genre" value="{{ $movie->genre }}"
                   required>
        </div>
        {{--LINK--}}
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Link:</label>
            <input type="text" class="form-control" id="movie-link" name="link" placeholder="https://"
                   value="{{ $movie->link }}">
        </div>

        {{--IMAGES--}}
        <span class="mb-5">Visuals <sup class="text-danger">*</sup></span>
        <div class="d-flex w-100 justify-content-between " style="gap:10%;">
            <div class="form-group w-50">
                <label for="message-text" class="col-form-label">Thumbnail:</label>
                <input type="file" class="form-control" id="movie-thumbnail" name="thumbnail">
                <small class="text-gray-400">Portrait</small><br/>
                <img src="{{ asset($movie->thumbnail_image) }}" width="150" height="150">
            </div>
            <div class="form-group w-50">
                <label for="message-text" class="col-form-label">Poster:</label>
                <input type="file" class="form-control" id="movie-poster" name="poster">
                <small class="text-gray-400">Landscape</small><br/>
                <img src="{{ asset($movie->poster_image) }}" width="150" height="150">
            </div>
        </div>


        <span class="mb-5">Visibility <sup class="text-danger">*</sup></span>
        <div class="d-flex w-100 justify-content-between " style="gap:10%;">
            <div class="form-group w-50">
                <label class="form-check-label">Top Movie List</label><br>
                <div class="d-inline-flex" style="gap:10%;">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="top_section" id="on-top"
                               value="1" {{ $movie->top_section == 1 ? "checked":"" }}>
                        <label class="form-check-label" for="on-top">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="top_section" id="on-top2"
                               {{ $movie->top_section == 0 ? "checked":"" }} value="0">
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
                               id="coming-soon" {{ $movie->coming_soon == 1 ? "checked":"" }} value="1">
                        <label class="form-check-label" for="coming-soon">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="coming_soon"
                               id="coming-soon2" value="0" {{ $movie->coming_soon == 0 ? "checked":"" }}>
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
                <th>Action <a href="#" class="append-btn btn">+</a></th>

            </tr>
            </thead>
            <tbody class="casts-table-body">

            @foreach($movie->casts as $cast)
                <tr>
                    <td style="display: flex;justify-content: space-between;">
                        <input type="hidden" value="{{ $cast->id }}" name="cast_id[]">
                        <img src="{{ asset($cast->image) }}" width="50"
                             height="40" style="border-radius: 100%;">
                        <input type="file" class="form-control" class="movie-cast-image" width="100" name="cast_image[]"
                               ></td>
                    <td><input type="text" class="form-control" class="movie-cast-name" name="cast_name[]"
                               value="{{ $cast->name }}" required></td>
                    <td>
                        <a href="#" class="btn btn-primary btn-danger btn-circle remove-btn">
                            -
                        </a>
                    </td>
                </tr>

            @endforeach

            </tbody>
        </table>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="edit-movie-btn">Update</button>
    </div>
</form>


