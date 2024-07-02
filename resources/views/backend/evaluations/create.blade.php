@extends('backend.layouts.app')
@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <!-- general form elements -->
                            <div class="card card-light">
                                <div class="card-header">
                                    <h3 class="card-title">Create New Evaluation</h3>
                                    <a href="{{ route('evaluations.index') }}">
                                        <button type="button" class="btn btn-outline-warning float-right">Back</button>
                                    </a>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="{{ route('evaluations.store') }}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="intern_id">Intern <span class="text-danger">*</span></label>
                                                    <select id="intern_id" name="intern_id" class="form-control">
                                                        @foreach ($interns as $intern)
                                                            <option value="{{ $intern->id }}">
                                                                {{ $intern->name }}-{{ $intern->roll_no }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('name')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="period">Period <span class="text-danger">*</span></label>
                                                    <input type="text" name="period" class="form-control @error('period') is-invalid @enderror" id="period"
                                                        placeholder="Enter Period"
                                                        value="{{ old('period') }}">
                                                    @error('period')
                                                        <span class="invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="leaves_day">Total leaves taken <span class="text-danger">*</span></label>
                                                    <input type="text" name="leaves_day" class="form-control @error('leaves_day') is-invalid @enderror" id="period"
                                                        placeholder="Enter leaves_day">
                                                    @error('leaves_day')
                                                        <span class="invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="contact_supervisor">Maintained contact with
                                                        supervisor</label>
                                                    <select class="form_control" id="contact_supervisor"
                                                        name="contact_supervisor">
                                                        <option value="excellent">Excellent</option>
                                                        <option value="aboveaverage">Above Average</option>
                                                        <option value="average">Average</option>
                                                        <option value="lessthanaverage">Less than average</option>
                                                        <option value="poor">Poor</option>
                                                        <option value="notobserved">Not Observed</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="punctual">Punctual for works, appointments and
                                                        attendance
                                                        :</label>
                                                    <select class="form_control" id="punctual" name="punctual">
                                                        <option value="excellent">Excellent</option>
                                                        <option value="aboveaverage">Above Average</option>
                                                        <option value="average">Average</option>
                                                        <option value="lessthanaverage">Less than average</option>
                                                        <option value="poor">Poor</option>
                                                        <option value="notobserved">Not Observed</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="reliably_performed_assignments">Reliably performed
                                                        all
                                                        job
                                                        assignments :</label>
                                                    <select class="form_control" id="reliably_performed_assignments"
                                                        name="reliably_performed_assignments">
                                                        <option value="excellent">Excellent</option>
                                                        <option value="aboveaverage">Above Average</option>
                                                        <option value="average">Average</option>
                                                        <option value="lessthanaverage">Less than average</option>
                                                        <option value="poor">Poor</option>
                                                        <option value="notobserved">Not Observed</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="ability_solve_problem">Ability to solve problem
                                                        :</label>
                                                    <select class="form_control" id="ability_solve_problem"
                                                        name="ability_solve_problem">
                                                        <option value="excellent">Excellent</option>
                                                        <option value="aboveaverage">Above Average</option>
                                                        <option value="average">Average</option>
                                                        <option value="lessthanaverage">Less than average</option>
                                                        <option value="poor">Poor</option>
                                                        <option value="notobserved">Not Observed</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="organization_skills">Organization skills :</label>
                                                    <select class="form_control" id="organization_skills"
                                                        name="organization_skills">
                                                        <option value="excellent">Excellent</option>
                                                        <option value="aboveaverage">Above Average</option>
                                                        <option value="average">Average</option>
                                                        <option value="lessthanaverage">Less than average</option>
                                                        <option value="poor">Poor</option>
                                                        <option value="notobserved">Not Observed</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="communication_skills">Communication Skills
                                                        :</label>
                                                    <select class="form_control" id="communication_skills"
                                                        name="communication_skills">
                                                        <option value="excellent">Excellent</option>
                                                        <option value="aboveaverage">Above Average</option>
                                                        <option value="average">Average</option>
                                                        <option value="lessthanaverage">Less than average</option>
                                                        <option value="poor">Poor</option>
                                                        <option value="notobserved">Not Observed</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="ability_work_independently">Ability to work
                                                        independently
                                                        :</label>
                                                    <select class="form_control" id="ability_work_independently"
                                                        name="ability_work_independently">
                                                        <option value="excellent">Excellent</option>
                                                        <option value="aboveaverage">Above Average</option>
                                                        <option value="average">Average</option>
                                                        <option value="lessthanaverage">Less than average</option>
                                                        <option value="poor">Poor</option>
                                                        <option value="notobserved">Not Observed</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="willingness_learn_new_tasks">Willingness to learn
                                                        new
                                                        tasks
                                                        :</label>
                                                    <select class="form_control" id="willingness_learn_new_tasks"
                                                        name="willingness_learn_new_tasks">
                                                        <option value="excellent">Excellent</option>
                                                        <option value="aboveaverage">Above Average</option>
                                                        <option value="average">Average</option>
                                                        <option value="lessthanaverage">Less than average</option>
                                                        <option value="poor">Poor</option>
                                                        <option value="notobserved">Not Observed</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="eagerness_to_learn">Eagerness to learn :</label>
                                                    <select class="form_control" id="eagerness_to_learn"
                                                        name="eagerness_to_learn">
                                                        <option value="excellent">Excellent</option>
                                                        <option value="aboveaverage">Above Average</option>
                                                        <option value="average">Average</option>
                                                        <option value="lessthanaverage">Less than average</option>
                                                        <option value="poor">Poor</option>
                                                        <option value="notobserved">Not Observed</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="basic_skill">Basic Skill :</label>
                                                    <select class="form_control" id="basic_skill" name="basic_skill">
                                                        <option value="excellent">Excellent</option>
                                                        <option value="aboveaverage">Above Average</option>
                                                        <option value="average">Average</option>
                                                        <option value="lessthanaverage">Less than average</option>
                                                        <option value="poor">Poor</option>
                                                        <option value="notobserved">Not Observed</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="professional_appearance">Professional appearance
                                                        :</label>
                                                    <select class="form_control" id="professional_appearance"
                                                        name="professional_appearance">
                                                        <option value="excellent">Excellent</option>
                                                        <option value="aboveaverage">Above Average</option>
                                                        <option value="average">Average</option>
                                                        <option value="lessthanaverage">Less than average</option>
                                                        <option value="poor">Poor</option>
                                                        <option value="notobserved">Not Observed</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="overall_assessment_work_quality">Overall assessment
                                                        of
                                                        work
                                                        quality
                                                        :</label>
                                                    <select class="form_control" id="overall_assessment_work_quality"
                                                        name="overall_assessment_work_quality">
                                                        <option value="excellent">Excellent</option>
                                                        <option value="aboveaverage">Above Average</option>
                                                        <option value="average">Average</option>
                                                        <option value="lessthanaverage">Less than average</option>
                                                        <option value="poor">Poor</option>
                                                        <option value="notobserved">Not Observed</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="professional_viewpoint">Please describe the work /
                                                tasks
                                                that the
                                                student accomplished and how well did the student perform
                                                these
                                                tasks from a
                                                professional view point</label>
                                            <textarea class="form-control" name="professional_viewpoint" id="professional_viewpoint" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="comments_student">Any additional comments on the
                                                student
                                                eg. About
                                                the intern’s work characteristics, technical Knowledge and
                                                skills,
                                                ability
                                                to adapt to work environment / hardware / software etc.
                                            </label>
                                            <textarea class="form-control" name="comments_student" id="comments_student" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="comments_intership">Any Comments on the internship
                                                program.
                                                Eg.
                                                Technical knowledge and skills, academic / curricular
                                                preparation,
                                                methodology, programming, networking etc., to include in our
                                                curriculum to
                                                best prepare our students for the industry.
                                            </label>
                                            <textarea class="form-control" name="comments_intership" id="comments_intership" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="comments">Other Comments</label>
                                            <textarea class="form-control" name="comments" id="comments" rows="3"></textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="discuss_intern">This report has been discussed with
                                                        the
                                                        student intern:</label>
                                                    <select class="form_control" id="discuss_intern"
                                                        name="discuss_intern">
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="signature">Signature</label>
                                                    <input type="file" name="signature" class=" @error('signature') is-invalid @enderror" id="signature">
                                                    @error('signature')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="company_supervisor_id">Supervisor
                                                            Name <span class="text-danger">*</span></label>
                                                        <select id="company_supervisor_id" name="company_supervisor_id"
                                                            class="form-control">
                                                            @foreach ($companySupervisors as $companySupervisor)
                                                                <option value="{{ $companySupervisor->id }}">
                                                                    {{ $companySupervisor->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('company_supervisor_id')
                                                            <span class="invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="title">Supervisor
                                                            Title <span class="text-danger">*</span></label>
                                                        <select id="title" name="title" class="form-control">
                                                            @foreach ($companySupervisors as $companySupervisor)
                                                                <option value="{{ $companySupervisor->id }}">
                                                                    {{ $companySupervisor->position }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="address">Address</label>
                                                        <textarea class="form-control" name="address" id="address" rows="2">{{ old('address') }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="contact">Contact <span class="text-danger">*</span></label>
                                                        <input type="number" name="contact"
                                                            class="form-control @error('contact') is-invalid @enderror"
                                                            id="contact" placeholder="Enter contact"
                                                            value="{{ old('contact') }}">
                                                        @error('contact')
                                                            <span class="invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- /.card-body -->

                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-outline-success">Submit</button>
                                                <a href="{{ route('evaluations.index') }}"
                                                    class="btn btn-outline-danger">Cancel</a>
                                            </div>
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>

            {{-- Form Start Here --}}
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.select-role').select2({
                theme: 'bootstrap4'
            })
        });
    </script>
@endsection
