@extends('backend.layouts.app')
@section('content')
<div class="wrapper">
<div class="content-wrapper">
<div class="card">
    <div class="card-body">
        <table class="table table-bordered Datatable" style="width:100%;">
            <thead>
                <th class="text-center no-sort no-search"></th>
                <th class="text-center">Title</th>
                <th class="text-center">Description</th>
                <th class="text-center no-sort">Leaders</th>
                <th class="text-center">Start Date</th>
                <th class="text-center">Deadline</th>
                <th class="text-center">Status</th>
                <th class="text-center no-sort">Action</th>
                <th class="text-center no-search hidden">Updated at</th>
            </thead>
        </table>
    </div>
</div>
</div></div>
@endsection
@section('script')
<script>
    $(document).ready( function () {
            @if (session('success'))
                Swal.fire({
                    title: "{{ session('success') }}",
                    icon: "success"
                });
            @endif
            $('#projects-datatable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('projects.index') }}",
                columns: [
                    { data: 'plus-icon', name: 'plus-icon', class: 'text-center' },
                    { data: 'title', name: 'title', class: 'text-center' },
                    { data: 'description', name: 'description', class: 'text-center' },
                    { data: 'leaders', name: 'leaders', class: 'text-center' },
                    { data: 'start_date', name: 'start_date', class: 'text-center' },
                    { data: 'deadline', name: 'deadline', class: 'text-center' },
                    { data: 'status', name: 'status', class: 'text-center' },
                    { data: 'action', name: 'action', class: 'text-center' },
                    { data: 'updated_at', name: 'updated_at', class: 'text-center' },
                ],
                order: [[ 10, "desc" ]],
            });

            $(document).on('click', '.delete-btn', function (e) {
                e.preventDefault();
                let id = $(this).attr('data-id');
                Swal.fire({
                    title: "Are you sure want to delete?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type:"POST",
                            url: "{{ route('delete-project') }}",
                            data: { id: id},
                            dataType: 'json',
                            success: function(res){
                                let table = $('#project-datatable').dataTable();
                                table.fnDraw(false);
                                Swal.fire({
                                    title: "Deleted!",
                                    icon: "success"
                                });
                                // setTimeout(function() {
                                //     window.location.reload();
                                // }, 3000); // Delay in milliseconds
                            }
                        });
                    }
                });
            });
        });
    
    </script>
@endsection