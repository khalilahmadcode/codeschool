@extends('layouts.app')

@section('content')

<div class="container-fluid text-light bg-success py-3">
    <div class="container">
        <h1>Contact Us</h1>
    </div>
</div>

<div class="container-fluid py-3">
    <div class="container">
        @include('include.messages')
        <br>
        <h4>Please Enter your details and Write us aboute yourself so we will contact you back as soon as posible.</h4>
        <br>
        <form action="{{ route('contactus.store') }}" method="POST" class="form-group">

            @csrf

            <div class="row">
                {{-- right column --}}
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" name="firstName" placeholder="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="" class="form-control">
                    </div>
                </div>
                {{-- left column --}}
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="">Last Name</label>
                        <input type="text" name="lastName" placeholder="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="phone" placeholder="" class="form-control">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="about">About</label>
                        <textarea type="text" name="about" placeholder="Please Write us about yourself" rows="8" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="submitbtn"></label>
                        <input type="submit" name="submitbtn" value="Send" class="btn btn-primary float-right">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- End of section --}}
@endsection