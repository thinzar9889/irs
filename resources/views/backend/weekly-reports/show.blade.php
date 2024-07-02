@extends('backend.layouts.app')
@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">

                    <div class="card">
                        <div class="card-header">Weekly Report</div>
                        <div class="card-body">
                            <div class="card-body">
                                <p class="card-text">Intern Name: {{ $weeklyReport->internship->intern->name }}</p>
                                <p class="card-text">Week No: {{ $weeklyReport->week_no }}</p>
                                <p class="card-text">Start Date: {{ $weeklyReport->start_date }}</p>
                                <p class="card-text">End Date: {{ $weeklyReport->end_date }}</p>
                                <p class="card-text">Monday: {{ $weeklyReport->monday_report }}</p>
                                <p class="card-text">Tuesday: {{ $weeklyReport->tuesday_report }}</p>
                                <p class="card-text">Wednesday: {{ $weeklyReport->wednesday_report }}</p>
                                <p class="card-text">Thursday: {{ $weeklyReport->thursday_report }}</p>
                                <p class="card-text">Friday: {{ $weeklyReport->friday_report }}</p>
                                {{-- <p class="card-text">Comment: {{ $weeklyReport->comment }}</p> --}}
                                <p class="card-text">Reflection: {{ $weeklyReport->reflection }}</p>
                                </hr>
                            </div>
                        </div>
                    </div>
                </div>


        </div>
        </section>
    </div>
    </div>
@endsection
