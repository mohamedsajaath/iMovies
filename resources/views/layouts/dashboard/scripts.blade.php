<script src="https://cdn.tiny.cloud/1/39y77bbnodzcw45bboz4dzbi7c07mh4pr5nvitr1hhfj3tm8/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
<script src="{{ asset('assets/dashboard/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('assets/dashboard/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('assets/dashboard/js/sb-admin-2.min.js') }}"></script>


<script src="{{ asset('assets/dashboard/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $('#dataTable').DataTable();


    function triggerToast(message) {
        $('#toast-position').append(`
         <div class="toast" style="position: absolute; top: 20%; right: 5%; width:400px;" data-delay="1000" >
            <div class="toast-header">
            <strong class="mr-auto">iMovie Notification</strong>
            <small>Just now</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
                ${message}
        </div>
    </div>
        `);

        $('.toast').toast("show");
    }
</script>



