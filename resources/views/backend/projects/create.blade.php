@extends('backend.layouts.app')
@section('content')
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
            <div class="card">
            <div class="card-header">
                                <h3 class="card-title">Create New Project</h3>
                                <a href="{{ route('projects.index') }}">
                                <button type="button" class="btn btn-outline-warning float-right">Back</button>
                                </a>
                            </div>

    <div class="card-body">
        <form action="{{route('projects.store')}}" method="POST" autocomplete="off" enctype="multipart/form-data" id="create-form">
            @csrf

            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Description</label>
                <textarea name="description" class="form-control md-textarea" rows="5"></textarea>
            </div>

            <div class="form-group">
                <label for="images">Images (Only PNG, JPG, JPEG)</label>
                <input type="file" name="images[]" class="form-control p-1" id="images" multiple accept="image/.png,.jpg,.jpeg">

                <div class="preview_img my-2"></div>
            </div>

            <div class="form-group">
                <label for="files">Files (Only PDF)</label>
                <input type="file" name="files[]" class="form-control p-1" id="files" multiple accept="application/pdf">
            </div>

            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" id="start_date" name="start_date" class="form-control datepicker">
            </div>

            <div class="form-group">
                <label for="deadline_date">Deadline</label>
                <input type="date" id="deadline_date" name="deadline_date" class="form-control datepicker">
            </div>

            <div class="form-group">
                <label for="">Leader</label>
                <select name="leaders" class="form-control select-ninja">
                    <option value="">-- Please Choose --</option>
                    @foreach ($interns as $intern)
                    <option value="{{$intern->id}}">{{$intern->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="members">Member</label>
                <select name="member[]" id="members" class="form-control select-ninja" multiple>
                    <option value="">-- Please Choose --</option>
                    @foreach ($interns as $intern)
                    <option value="{{$intern->id}}">{{$intern->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="">Priority</label>
                <select name="priority" class="form-control select-ninja">
                    <option value="">-- Please Choose --</option>
                    <option value="high">High</option>
                    <option value="middle">Middle</option>
                    <option value="low">Low</option>
                </select>
            </div>

            <div class="form-group">
                <label for="">Status</label>
                <select name="status" class="form-control select-ninja">
                    <option value="">-- Please Choose --</option>
                    <option value="pending">Pending</option>
                    <option value="in_progress">In Progress</option>
                    <option value="complete">Complete</option>
                </select>
            </div>
            <div class="card-footer">
            <div class="d-flex justify-content-center mt-2 mb-3">
            <div class="col-md-2">
                    <button type="submit" class="btn btn-theme btn-sm  btn btn-outline-success">Confirm</button>
                    </div> 
            </div>
            </div>
        </form>
    </div>
</div>
<!--add-->
</div></section></div></div>
@endsection
@section('script')


<script>
    $(document).ready(function(){
        $('#images').on('change', function(){
            var file_length = document.getElementById('images').files.length;
            $('.preview_img').html('');
            for(var i = 0; i < file_length; i++){
                $('.preview_img').append(`<img src="${URL.createObjectURL(event.target.files[i])}"/>`);
            }
        });

        $(document).ready(function (){
            $('.select-two').select2({
                theme: 'bootstrap4'
            })
            
        $(document).ready(function() {
            $('#members').select2();
            });


            //  daterange picker
            $('#startDate').daterangepicker({
                "singleDatePicker": true,
                "showDropdowns": true,
                "autoApply": true,
                "locale": {
                    "format": "MM-DD-YYY",
                }
            });

            $('#endDate').daterangepicker({
                "singleDatePicker": true,
                "showDropdowns": true,
                "autoApply": true,
                "locale": {
                    "format": "MM-DD-YYY",
                }
            });
        });
    });
</script>
@endsection