@extends('backend.layouts.app')
@section('content')

<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
      <div class="container-fluid">
      <div class="card">
      <div class="card-header">Profile
                <a href="{{ route('interns.index') }}">
                <button type="button" class="btn btn-outline-warning float-right">Back</button>
                </a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

      
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">

            <!-- Profile Image -->
            <div class="card card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ asset('storage/interns/'.$intern->profile) }}">
                </div>

                 <p class="profile-username text-center">{{ $intern->name }}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email: </b><a class="float-right">{{ $intern->email }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Phone: </b><a class="float-right">{{ $intern->phone }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Address: </b><a class="float-right">{!! $intern->address !!}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Birth Date: </b><a class="float-right">{{ $intern->date_of_birth }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>NRC: </b><a class="float-right">{{ $intern->nrc_no }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Roll No: </b><a class="float-right">{{ $intern->roll_no }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Gender: </b><a class="float-right">{{ $intern->gender }}</a>
                  </li>
                </ul>
           
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
         <!-- /.col -->
         <div class="col-md-8">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link experience" href="#experience" data-toggle="tab">Experience</a></li>
                  <li class="nav-item"><a class="nav-link" href="#details" data-toggle="tab">Details</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="experience">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                      <i class="fas  fa-map">&nbsp; &nbsp;Class Project</i>
                      </div>
                      <!-- /.user-block -->
                      <p>
                      {!! $intern->class_project !!}
                      </p><hr>
              
                      <div class="user-block">
                      <i class="fas  fa-child">&nbsp; &nbsp;Activity</i>
                      </div>
                      <!-- /.user-block -->
                      <p>
                      {!! $intern->activity !!}
                      </p><hr>
                     
                      

                      <div class="user-block">
                      <i class="fas fa-star">&nbsp; &nbsp;Skill</i>
                      </div>
                      <!-- /.user-block -->
                      <p>
                      {!! $intern->skill !!}
                      </p><hr>

                    </div>
                      <!-- /.post -->
                  </div>

                  
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="details">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                        University
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                      <i class="fas fa-university mr-1"></i>
                        <div class="timeline-item">
                        <div class="timeline-body">{{ $intern->university->name }}</div>
                        </div>
                      </div><br>
                      <!-- END timeline item -->
                         
                        <!-- timeline time label -->
                        <div class="time-label">
                        <span class="bg-indigo">Education</span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-book-reader mr-1"></i>
                          <div class="timeline-item">
                          <div class="timeline-body">{{ $intern->education }} </div>
                        </div>
                      </div><br>
                      <!-- END timeline item -->


                        <!-- timeline time label -->
                        <div class="time-label">
                        <span class="bg-warning">Specialization </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas  fa-share-alt-square mr-1"></i>
                        <div class="timeline-item">
                          <div class="timeline-body">{{ $intern->specialization }}</div>
                        </div>
                      </div><br>
                      <!-- END timeline item -->


                       <!-- timeline time label -->
                        <div class="time-label">
                        <span class="bg-lime">Qualification</span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-cog mr-1"></i>
                        <div class="timeline-item">
                          <div class="timeline-body">{!! $intern->qualification !!}</div>
                        </div>
                      </div><br>
                      <!-- END timeline item -->

                     
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->@endsection