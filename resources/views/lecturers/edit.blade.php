@extends('layouts.app')
@section('content')
    <div class="container-fluid text-light bg-success py-3">
        <div class="container">
            <h1>Update Lecturer Details</h1>
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
                    <h3>Lecturer Details</h3>
                    <form action="{{ route('lecturers.update', $lecturer->id) }}" class="from-group" method="POST" enctype="">

                        @csrf 
                        @method('PATCH')

                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label for="courseName">First Name</label>
                                    <input type="text" name="firstName" value="{{ $lecturer->firstName }}" class="form-control" placeholder="e.g.: Khalil ">
                                </div>
                                <div class="form-group">
                                    <label for="courseName">Last Name</label>
                                    <input type="text" name="lastName" value="{{ $lecturer->lastName }}" class="form-control" placeholder="e.g.: Nazari">
                                </div>
                                <div class="form-group">
                                    <label for="courseName">Nick Name</label>
                                    <input type="text" name="nickName" value="{{ $lecturer->nickName }}" class="form-control" placeholder="e.g.: Ahmad">
                                </div>
                                <div class="form-group">
                                    <label for="courseName">Title</label>
                                    <input type="text" name="title" value="{{ $lecturer->title }}" class="form-control" placeholder="e.g.: PHD">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" value="{{ $lecturer->email }}" class="form-control" placeholder="e.g.: ali@icoodeschool.com">
                                </div>
                                <div class="form-group">
                                    <label for="accessno">Access Number</label>
                                    <input type="text" name="accessno" value="{{ $lecturer->accessno }}" class="form-control" placeholder="e.g.: 6549">
                                </div>
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label for="about">About</label>
                                    <textarea type="text" name="about" class="form-control" rows="15" placeholder="e.g.: I'm professor of mathemtic ..." >{{ $lecturer->about }}</textarea>
                                </div>

                                
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="submitbtn"></label>
                                    <input type="submit" name="submitbtn" value="Update" class="btn btn-primary float-right">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
@endsection