@extends('layouts.app')
@section('content')
    <div class="container-fluid text-light bg-success py-3">
        <div class="container">
            <h1>Course Details</h1>
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
            <div class="row py-4">
                <div class="col-12 border border-light">
                    @foreach ($course as $course)
                        
                    
                    <h3 class="">{{ $course->courseName }}</h3>
                    <p class="">{{ $course->courseDescription }}</p>

                    <br>
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <span><b>Lecturer : </b><a class="text-decoration-none" href="{{ route('lecturers.show', $course->id) }}">{{ $course->firstName }}</a></span> &nbsp;&nbsp;&nbsp;
                            <span><b>Time : </b>{{ $course->courseTime }}</span> &nbsp;&nbsp;&nbsp;
                            <span><b>Course Fee : </b>${{ $course->courseFee }}</span> &nbsp;&nbsp;&nbsp;
                        </div>
                        <div class="col-md-12 col-lg-6">
                            @if (Auth::guest())
                                <a href="#" class="btn btn-primary btn-sm float-right m-2"> Clike to Enrol</a>
                            @else
                                <a href="{{ route('courses.edit', $course->id ) }}" class="btn btn-primary btn-sm float-right m-2">Edit Course detail</a>
                                <form action="{{ route('courses.destroy', $course->id ) }}" method="post">
                                    @csrf 
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger btn-sm float-right m-2" value="Delete Course" name="deletebtn">
                                </form>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection