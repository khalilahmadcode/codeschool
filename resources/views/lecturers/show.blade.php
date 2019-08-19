@extends('layouts.app')
@section('content')
    <div class="container-fluid text-light bg-success py-3">
        <div class="container">
            <h1>Lecturer Profile</h1>
        </div>
    </div>
    
    <div class="container-fluid bg-white py-3">
        <div class="container">
            {{-- internal links | show only when login --}}
            @if (!Auth::guest())
                <div class="row">
                    <div class="col-12">
                        @include('include.lecturerslink')
                    </div>
                </div> 
            @endif

            {{-- message --}}
            @include('include.messages')
            
            {{-- content  --}}
            <div class="row py-3">
               <div class="col-sm-12 col-md-5 col-lg-4 ">
                    <img src="/storage/no-image-available.png" class="w-100" alt="">
               </div>
               <div class="col-sm-12 col-md-7 col-lg-8">
                   <h3>{{ $lecturer->firstName.' '.$lecturer->lastName }}</h3>
                   <p class="lead text-justify"> {{ $lecturer->about }}</p>
                   <p class="py-2">
                       <span><b>Title : </b> {{ $lecturer->title }} </span><br>
                       <span><b>Email : </b> {{ $lecturer->email }} </span><br>
                       <span><b>Access No. : </b> {{ $lecturer->accessno }} </span><br>
                       <span><b>Ranking : </b> 9/10  <small>Ranking is based on student survey.</small></span>
                   </p>
                   <p class="">
                        <span><b>Courses Taught: </b>
                            @foreach ($courses as $course)
                                <a href='{{ route('courses.show', $course->course_id) }}' class='btn btn-outline-primary btn-sm'>{{ $course->courseName}}</a>
                            @endforeach
                        </span>
                        <span class="float-right">
                            <button class="btn btn-primary btn-sm">Send Email</button>
                            <button class="btn btn-primary btn-sm">Download CV</button>
                        </span>
                   </p>
                   <p class="py-2 float-right">
                        @if (!Auth::guest())
                            <form action="{{ route('lecturers.destroy', $lecturer->id ) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-primary btn-sm" href="{{ route('lecturers.edit', $lecturer->id ) }}">Update</a>
                                <input type="submit" class="btn btn-primary btn-sm" value="Delete" name="deltebtn">
                            </form>
                        @endif
                   </p>
                </div>
            </div>
        </div>
    </div>
@endsection