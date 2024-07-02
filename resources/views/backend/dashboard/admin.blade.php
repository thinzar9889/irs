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
                                                <h4 class="mb-0">Interns  </h4>
                                            </div>
                                            <div class="icon-shape icon-md bg-light-primary text-primary rounded-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="18" height="18" fill="currentColor">
                                                    <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5zm1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0zM1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div>
                                            <h1> {{ $totalInterns}} </h1>
                                            <p class="mb-0">
                                            <a href="backend.interns.index" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                                                <h4 class="mb-0">Company  </h4>
                                            </div>
                                            <div class="icon-shape icon-md bg-light-primary text-primary rounded-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="18" height="18" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M2 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-.5-.5H2zM3 3H2v1h1V3z"></path>
                                                    <path d="M5 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM5.5 7a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 4a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9z"></path>
                                                    <path fill-rule="evenodd" d="M1.5 7a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5V7zM2 7h1v1H2V7zm0 3.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5H2zm1 .5H2v1h1v-1z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div>

                                            <h1 class="fw-bold">{{ $totalCompany }} </h1>
                                            <p class="mb-0">
                                            <a href="backend.companies.index" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                                                <h4 class="mb-0"> Com Supervisor</h4>
                                            </div>
                                            <div class="icon-shape icon-md bg-light-primary text-primary rounded-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="18" height="18" fill="currentColor">
                                                    <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div>
                                            <h1 class="fw-bold">{{ $totalCompanySupervisor }}</h1>
                                            <p class="mb-0">
                                            <a href="backend.company-supervisors.index" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                                                <h4 class="mb-0"> Uni Supervisor</h4>
                                            </div>
                                            <div class="icon-shape icon-md bg-light-primary text-primary rounded-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="18" height="18" fill="currentColor">
                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                                                    <path d="M8 13A5 5 0 1 1 8 3a5 5 0 0 1 0 10zm0 1A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path>
                                                    <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8z"></path>
                                                    <path d="M9.5 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div>
                                            <h1 class="fw-bold">{{ $totalUniSupervisor }}</h1>
                                            <p class="mb-0">
                                            <a href="backend.university-supervisors.index" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
            </section>
        </div>
    </div>
@endsection


@section('script')
    <script type="text/javascript">
        $(document).ready( function () {

        });
    </script>
@endsection
