@extends('backend.layouts.app')
@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <!-- general form elements -->
                            <div class="hover-overlay">

                            </div>
                            <div class="card card-light">
                                <div class="card-header">
                                    <h3 class="card-title">Create New Internship</h3>
                                    <a href="{{ route('internships.index') }}">
                                        <button type="button" class="btn btn-sm btn-outline-primary float-right">Back</button>
                                    </a>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="{{ route('internships.store') }}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="intern_id">Intern <span class="text-danger">*</span></label>
                                                    <select
                                                        class="form-control select-two @error('intern_id') is-invalid @enderror"
                                                        name="intern_id" id="intern_id">
                                                        <option value="">---</option>
                                                        @foreach ($interns as $intern)
                                                            <option value="{{ $intern->id }}">{{ $intern->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('intern_id')
                                                        <span class="invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="company_id">Company <span
                                                            class="text-danger">*</span></label>
                                                    <select
                                                        class="form-control select-two @error('company_id') is-invalid @enderror"
                                                        name="company_id" id="company_id">
                                                        <option value="">---</option>
                                                        @foreach ($companies as $company)
                                                            <option value="{{ $company->id }}">{{ $company->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('company_id')
                                                        <span class="invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="startDate">Start Date <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="start_date"
                                                        class="form-control @error('start_date') is-invalid @enderror"
                                                        id="startDate" value="{{ old('start_date') }}">
                                                    @error('start_date')
                                                        <span class="invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="endDate">End Date <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="end_date"
                                                        class="form-control @error('end_date') is-invalid @enderror"
                                                        id="endDate" value="{{ old('end_date') }}">
                                                    @error('end_date')
                                                        <span class="invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>
                                      
                                            <div class="mb-3">
                                                <label for="summernote1">Description</label>
                                                <textarea name="description" cols="30" rows="10" id="summernote1"
                                            class="form-control"></textarea>
                                            </div>
                                            <!--<div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <textarea class="form-control" name="description" id="description" rows="3">{{ old('description') }}</textarea>
                                                </div>
                                            </div>-->
                                        
                                    </div>
                                    <!-- /.card-body -->
                                    <div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-sm btn-outline-success">Submit</button>
                                            <a href="{{ route('university-supervisors.index') }}"
                                            class="btn btn-sm btn-warning">Cancel</a>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->

            </section>


        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.select-two').select2({
                theme: 'bootstrap4'
            })

            //  daterange picker
            $('#startDate').daterangepicker({
                "singleDatePicker": true,
                "showDropdowns": true,
                "autoApply": true,
                "locale": {
                    "format": "YYYY-MM-DD",
                }
            });

            $('#endDate').daterangepicker({
                "singleDatePicker": true,
                "showDropdowns": true,
                "autoApply": true,
                "locale": {
                    "format": "YYYY-MM-DD",
                }
            });
        });
    </script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#summernote1').summernote();
    });
</script>

@endsection

