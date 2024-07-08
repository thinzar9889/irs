@extends('backend.layouts.app')
@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">

                    <div class="card">
                        <div class="card-header">Weekly Report
                        <a href="{{ route('weekly-reports.index') }}">
                                <button type="button" class="btn btn-sm btn-outline-warning float-right">Back</button>
                                </a>
                        </div>
                           <!-- Main content -->
          
                    <!-- Timelime example  -->
                    <div class="row">
                        <div class="col-12 mt-3">
                            <div class="card">
                                <div class="card-body">
                                    <!-- The time line -->
                                    <div class="timeline">
                                        <!-- timeline time label -->
                                        <div class="time-label">
                                            <span class="bg-red">Monday</span>
                                        </div>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <div>
                                            {{-- <i class="fas fa-envelope bg-indigo"></i> --}}
                                            <i class="fa fa-file-word bg-indigo"></i>
                                            <div class="timeline-item">
                                                <h3 class="timeline-header">Description</h3>
                                                <div class="timeline-body">
                                                    {{ $weeklyReport->monday_report }}
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        <!-- timeline item -->
                                        <div class="time-label">
                                            <span class="bg-green">Tuesday</span>
                                        </div>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fa fa-file-word bg-pink"></i>
                                            <div class="timeline-item">

                                                <h3 class="timeline-header">Description</h3>
                                                <div class="timeline-body">
                                                    {{ $weeklyReport->monday_report }}
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        <!-- timeline item -->
                                        <div class="time-label">
                                            <span class="bg-purple">Wednesday</span>
                                        </div>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fa fa-file-word bg-green"></i>
                                            <div class="timeline-item">

                                                <h3 class="timeline-header">Description</h3>
                                                <div class="timeline-body">
                                                    {{ $weeklyReport->wednesday_report }}
                                                </div>
                                            </div>
                                        </div>
                                        <!-- timeline item -->
                                        <div class="time-label">
                                            <span class="bg-pink">Thursday</span>
                                        </div>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fa fa-file-word bg-purple"></i>
                                            <div class="timeline-item">

                                                <h3 class="timeline-header">Description</h3>
                                                <div class="timeline-body">
                                                    {{ $weeklyReport->thursday_report }}
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        <!-- timeline item -->
                                        <div class="time-label">
                                            <span class="bg-indigo">Friday</span>
                                        </div>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fa fa-file-word bg-red"></i>
                                            <div class="timeline-item">

                                                <h3 class="timeline-header">Description</h3>
                                                <div class="timeline-body">
                                                    {{ $weeklyReport->friday_report }}
                                                </div>
                                            </div>
                                        </div>

                                        <!-- END timeline item -->
                                        <div>
                                            <i class="fas fa-clock bg-gray"></i>
                                        </div>
                                    </div>
                            <!-- END timeline item -->
                            <!-- timeline item -->

                            <nav class="w-100">
                                <div class="nav nav-tabs" id="product-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab"
                                        href="#product-desc" role="tab" aria-controls="product-desc"
                                        aria-selected="true">Reflection</a>
                                   
                                </div>
                            </nav>
                            <div class="tab-content p-3" id="nav-tabContent bg-info">
                                <div class="tab-pane fade active show" id="product-desc" role="tabpanel"
                                    aria-labelledby="product-desc-tab"> {{ $weeklyReport->reflection }} </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    </div>
    <!-- /.col -->
    </div>
    </div>
    <!-- /.timeline -->
</div>

    <!-- /.content -->   

                        </div>
                        
                    </div>
                </div>
            </section>

        </div>
        
    </div>

@endsection