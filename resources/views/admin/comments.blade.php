@extends('layouts.dashboard.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Comments</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Comments List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Comment</th>
                        <th>Movie Name</th>
                        <th class="text-center">Status</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Comment</th>
                        <th>Movie Name</th>
                        <th class="text-center">Status</th>
                    </tr>
                    </tfoot>
                    <tbody>

                    @foreach($comments as $comment)
                        <tr>
                            <td>{{ $comment->name }}</td>
                            <td>{{ $comment->comment }}</td>
                            <td>
                                <a href="{{ url('/admin/movies/view/'.$comment->movie_id ) }}">{{ $comment->movie_name }}</a>
                            </td>
                            <td class="d-flex justify-content-around"><input type="checkbox"
                                                                             class="btn-lg comment-approve"
                                                                             data-id="{{ $comment->id }}" {{ $comment->is_approved == 1 ? "checked" : "" }} />
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection

@push('script')
    <script>
        $(document).ready(function () {

            $(document).on('change', '.comment-approve', function () {
                let id = $(this).data('id');
                if ($(this).is(':checked')) {
                    ajaxCall(id, 1)
                } else {
                    ajaxCall(id, 0)
                }

                function ajaxCall(id, approval) {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('/admin/comments/update') }}" + "/" + id + "/" + approval,
                        success: function (response) {
                            $('.toast-body').text(response);
                            triggerToast(response);
                        },
                        error: function (jqXHR, error) {
                            triggerToast(jqXHR.responseJSON.message);
                        }
                    });
                }


            });

        });

    </script>
@endpush
