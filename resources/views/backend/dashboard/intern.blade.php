@extends('backend.layouts.app')
@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                <div class="bg-primary pt-10 pb-21"></div>
                    <div class="mt-n22 px-6 container-fluid">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="mb-3 mb-lg-1">
                                            <h3 class="mb-2"></h3>
                                        </div>
                                        <div>
                                            <a class="btn btn-white" href="/#"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6 col-xl-3 col-lg-6 col-md-12 col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div>
                                                <h4 class="mb-0">Reports</h4>
                                            </div>
                                            <div class="icon-shape icon-md bg-light-primary text-primary rounded-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="18" height="18" fill="currentColor">
                                                    <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5zm1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0zM1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div>
                                            <h1> {{ $totalWeeklyReports }} </h1>
                                            <p class="mb-0">
                                                <span className="text-dark me-2">2</span>
                                                Completed
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6 col-xl-3 col-lg-6 col-md-12 col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div>
                                                <h4 class="mb-0">Interns</h4>
                                            </div>
                                            <div class="icon-shape icon-md bg-light-primary text-primary rounded-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="18" height="18" fill="currentColor">
                                                    <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5zm1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0zM1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div>
                                            <h1> {{ $assignedTasks}} </h1>
                                            <p class="mb-0">
                                                <span className="text-dark me-2">2</span>
                                                Completed
                                            </p>
                                        </div>
                                    </div>
                                </div>
</div></div></div></div></div>
 @endsection
