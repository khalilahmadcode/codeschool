@extends('layouts.app')
@section('content')
    <div class="container-fluid text-light bg-success py-3">
        <div class="container">
            <h1>Courses</h1>
        </div>
    </div>
    
    <div class="container-fluid bg-white py-3">
        <div class="container">
            {{-- internal links | show only when login --}}
            @if ( !Auth::guest() )
                <div class="row">
                    <div class="col-12">
                        @include('include.courseslink')
                    </div>
                </div>
            @endif
            
            
            {{-- message --}}
            @include('include.messages')
            
            {{-- content  --}}
            <div class="row">
                @if ( count($courses) > 0)
                    @foreach ($courses as $course)
                        <div class="col-sm-12 col-md-4 py-2 my-2">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $course->courseName }}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">subtitle</h6>
                                    <p class="card-text">
                                        <span><b>Taught By: </b>{{ $course->firstName }}</span><br>
                                        <span><b> Time: </b>{{ $course->courseTime }}</span>
                                    </p>
                                    <a href="/courses/{{$course->id}}" class="card-link">Course Detail</a>
                                </div>
                            </div>
                        </div>
                    @endforeach 
                @else
                    <div class="col-md-6 col-sm-12 py-2 my-2">
                        <h2>No courses available </h2>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection