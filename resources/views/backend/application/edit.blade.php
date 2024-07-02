@extends('backend.layouts.app')

@section('content')
    <div class="wrapper mt-3">
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Edit Application</h5>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('application.index') }}"
                                        class="btn btn-sm btn-outline-primary float-right">Back</a>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('application.update', $application->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" name='title'
                                            value="{{ old('title', $application->title) }}" placeholder="Enter Job Title">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="position">Position</label>
                                        <input type="text" class="form-control" name='position'
                                            value="{{ old('position', $application->position) }}"
                                            placeholder="Enter Job Position">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="department">Department</label>
                                        <input type="text" class="form-control" name='department'
                                            value="{{ old('department', $application->department) }}"
                                            placeholder="Enter Job Department">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="company_id">Comapny</label>
                                        <select name="company_id" id="company_id" class="form-control">
                                            <option value="">--select--</option>
                                            @foreach ($companies as $company)
                                                <option {{ $company->id == $application->company_id ? 'selected' : '' }}
                                                    value="{{ $company->id }}">{{ $company->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="gender">Gender</label>
                                        <select name="gender" id="gender" class="form-control">
                                            <option value="">--select--</option>
                                            <option {{ $application->gender == 'male' ? 'selected' : '' }} value="male">
                                                Male</option>
                                            <option {{ $application->gender == 'female' ? 'selected' : '' }}
                                                value="female">Female</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="education">Education</label>
                                        <input type="text" class="form-control" name='education'
                                            value="{{ old('education', $application->education) }}"
                                            placeholder="Enter Education">
                                    </div>
                                    {{-- <div class="col-md-3 mb-3">
                                            <label for="location">Location</label>
                                            <input type="text" class="form-control" name='location' value="{{ old('title', $application->title) }}" placeholder="Enter Location">
                                        </div> --}}
                                    <div class="col-md-3 mb-3">
                                        <label for="salary">Stipend</label>
                                        <select name="salary" id="salary" class="form-control">
                                            <option value="">--select--</option>
                                            <option {{ $application->salary == 'Paid' ? 'selected' : '' }} value="Paid">
                                                Paid</option>
                                            <option {{ $application->salary == 'Unpaid' ? 'selected' : '' }}
                                                value="Unpaid">Unpaid</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="intern_no">No of Openings</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="number" class="form-control"
                                                    value="{{ old('intern_male', $application->male) }}" name='intern_male'
                                                    placeholder="male">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="number" class="form-control"
                                                    value="{{ old('intern_female', $application->female) }}"
                                                    name='intern_female' placeholder="female">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="intern_no">Period</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="date" class="form-control"
                                                    value="{{ old('from_date', $application->from_date) }}"
                                                    name='from_date' placeholder="male">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="date" class="form-control"
                                                    value="{{ old('to_date', $application->to_date) }}" name='to_date'
                                                    placeholder="female">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name='email'
                                            value="{{ old('email', $application->email) }}" placeholder="Enter CV Mail">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="phone">Contact Phone</label>
                                        <input type="text" class="form-control" name='phone'
                                            value="{{ old('phone', $application->phone) }}"
                                            placeholder="Enter Contact Phone">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="job-type">Type</label>
                                        <select name="type" id="job-type" class="form-control">
                                            <option value="fulltime">Fulltime</option>
                                            <option value="remote">Remote</option>
                                            <option value="parttime">Parttime</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="salary">Image</label>
                                            <input type="file" name='image'>
                                        </div>
                                        @if (!empty($application->image))
                                            <div class="mb-2">
                                                <a href="{{ asset('storage/' . $application->image) }}"
                                                    target="_blank"><img
                                                        src="{{ asset('storage/' . $application->image) }}"
                                                        style="width: 100px;"></a>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="summernote1">Description</label>
                                    <textarea name="description" cols="30" rows="10" id="summernote1" class="form-control">{{ old('description', $application->description) }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="summernote2">Requirements</label>
                                    <textarea name="requirement" cols="30" rows="10" id="summernote2" class="form-control">{{ old('requirement', $application->requirement) }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <Benefit for="summernote3">Benefit</label>
                                        <textarea name="benefit" cols="30" rows="10" id="summernote3" class="form-control">{{ old('benefit', $application->benefit) }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="summernote4">Highlight</label>
                                    <textarea name="highlight" cols="30" rows="10" id="summernote4" class="form-control">{{ old('highlight', $application->highlight) }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="summernote5">Opportunity</label>
                                    <textarea name="opportunity" cols="30" rows="10" id="summernote5" class="form-control">{{ old('opportunity', $application->opportunity) }}</textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-sm btn-outline-primary">Submit</button>
                                <a href="{{ route('application.index') }}" class="btn btn-sm btn-warning">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#summernote1').summernote();
            $('#summernote2').summernote();
            $('#summernote3').summernote();
            $('#summernote4').summernote();
            $('#summernote5').summernote();
        });
    </script>
@endsection
