@extends('layouts.app')

@section('content')
    <div class="container-fluid text-light bg-success py-3">
        <div class="container">
            <h1>Create Courses</h1>
        </div>
    </div>
    <div class="container-fluid bg-white py-3">
        <div class="container">
            {{-- internal links | show only when login --}}
            <div class="row">
                <div class="col-12">
                    @include('include.courseslink')
                </div>
            </div>

            {{-- message --}}
            @include('include.messages')
            
            {{-- content  --}}
            <div class="py-4">
                <h3>Add New Course</h3>
                <form action="{{ route('courses.store') }}" class="from-group" method="POST" enctype="">
                    @csrf 

                    <div class="row">
                        {{-- Left Column --}}
                        <div class="col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="courseName">Course Name</label>
                                <input type="text" name="courseName" class="form-control" placeholder="e.g.: HTML">
                            </div>
                            <div class="form-group">
                                <label for="courseTime">Course Time</label>
                                <input type="text" name="courseTime" class="form-control" placeholder="e.g.: 2:00PM - 4:00PM">
                            </div>
                            <div class="form-group">
                                <label for="lecturer_id">Course Lecturer</label>
                                <select name="lecturer_id" id="" class="form-control">
                                        <option class="form-control" value="">Select Lecturer</option>
                                    @foreach ($lecturers as $Lecturer)
                                        <option class="form-control" value="{{ $Lecturer->id }}">{{ $Lecturer->firstName.' '.$Lecturer->lastName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="courseFee">Course Fee</label>
                                <input type="text" name="courseFee" class="form-control" placeholder="e.g.: $50">
                            </div>
                        </div>
                        {{-- Right Column --}}
                        <div class="col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="courseDescription">Course Description</label>
                                <textarea type="text" name="courseDescription" class="form-control" rows="11" placeholder="e.g.: HTML is used to develop the UI of web pages..." ></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="submitbtn"></label>
                        <input type="submit" name="submitbtn" value="Submit Course" class="btn btn-primary float-right">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection