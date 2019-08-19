@extends('layouts.app')
@section('content')
    <div class="container-fluid text-light bg-success py-3">
        <div class="container">
            <h1>Add New Lecturer</h1>
        </div>
    </div>
    
    <div class="container-fluid bg-white py-3">
        <div class="container">
            {{-- internal links | show only when login --}}
            <div class="row">
                <div class="col-12">
                    @include('include.lecturerslink')
                </div>
            </div>
            
            {{-- message --}}
            @include('include.messages')
            
            {{-- content  --}}
            <div class="py-4">
                    <h3>Add New Lecturer</h3>
                    <form action="{{ route('lecturers.store') }}" class="from-group" method="POST" enctype="">
                        @csrf 
                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label for="courseName">First Name</label>
                                    <input type="text" name="firstName" class="form-control" placeholder="e.g.: Khalil ">
                                    <span class="text-danger">{{ $errors->first('firstName') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="courseName">Last Name</label>
                                    <input type="text" name="lastName" class="form-control" placeholder="e.g.: Nazari">
                                    <span class="text-danger">{{ $errors->first('lastName') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="courseName">Nick Name</label>
                                    <input type="text" name="nickName" class="form-control" placeholder="e.g.: Ahmad">
                                    <span class="text-danger">{{ $errors->first('nickName') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="courseName">Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="e.g.: PHD">
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="e.g.: ali@icoodeschool.com">
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="accessno">Access Number</label>
                                    <input type="text" name="accessno" class="form-control" placeholder="e.g.: 6549">
                                    <span class="text-danger">{{ $errors->first('accessno') }}</span>
                                </div>
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label for="about">About</label>
                                    <textarea type="text" name="about" class="form-control" rows="11" placeholder="e.g.: I'm professor of mathemtic ..." ></textarea>
                                    <span class="text-danger">{{ $errors->first('about') }}</span>
                                </div>

                                <div class="form-group">
                                    <label for="submitbtn"></label>
                                    <input type="submit" name="submitbtn" value="Submit" class="btn btn-primary float-right">
                                </div>
                            </div>
                        </div>
    
                        
                    </form>
                </div>
        </div>
    </div>
@endsection