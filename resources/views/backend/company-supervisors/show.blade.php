@extends('backend.layouts.app')
@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="card-header">
                        <div class="center text-muted">
                            <h4>Company Supervisors Details</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-body pb-0">

                            <div class="card bg-light d-flex flex-fill">
                                <div class="card-header text-primary border-bottom-0">
                                    Ethen Supervisor
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="lead text-success"><b>{{ $companySupervisor->name }}</b></h2>
                                            <p class="text-primary text-sm"><b>About: </b>
                                                {{ $companySupervisor->position }}</p>
                                            <div class="row">

                                                <div class="col">
                                                    <div class="small text-primary"><span><i
                                                                class="fas fa-lg fa-envelope"></i></span>
                                                        Email:
                                                        {{ $companySupervisor->email ?? '---' }}
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="small text-primary"><span><i
                                                                class="fas fa-lg fa-phone"></i></span> Phone
                                                        #:
                                                        {{ $companySupervisor->phone }}
                                                    </div>
                                                </div>
                                            </div><br>
                                            {{-- </tr>
                                                <tr> --}}
                                            <div class="row">

                                                <div class="col">
                                                    <div class="small text-primary"><span><i
                                                                class="fas fa-lg fa-building"></i></span>
                                                        Company:
                                                        {{ $companySupervisor->company->name }}
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="small text-primary"><span><i
                                                                class="fas fa-lg fa-map-marker"></i></span>
                                                        Address:
                                                        {{ $companySupervisor->address ?? '---' }}</div>
                                                </div>
                                            </div>


                                    {{-- </div> --}}
                                    {{-- </table> --}}
                                </div>

                                <div class="col-5 text-center">
                                    <img src="../../dist/img/user1-128x128.jpg" alt="user-avatar"
                                        class="img-circle img-fluid">
                                </div>
                            </div>
                            {{-- </div>
                        </div>

                    </div>
                </div>
        </div> --}}
    {{-- </div>
    </div>
    </div>
    </div> --}}

    {{-- </div>
    </div> --}}
    </section>
    </div>
    </div>
@endsection
