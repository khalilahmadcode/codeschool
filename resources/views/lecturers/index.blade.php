@extends('layouts.app')
@section('content')
    <div class="container-fluid text-light bg-success py-3">
        <div class="container">
            <h1>Our Lecturers</h1>
        </div>
    </div>
    
    <div class="container-fluid bg-white py-3">
        <div class="container">
            {{-- internal links | show only when login  --}}
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
            <div class="row py-4">
                @if ( count($lecturers) > 0)
                    @foreach ($lecturers as $lecturer)
                        <div class="col-sm-12 col-md-6 col-lg-3 py-2">
                            <div class="card">
                                <img class="card-img-top w-100" src="/storage/no-image-available.png" alt="Card image cap">
                                <div class="card-body">
                                    <p class="h5 card-title">
                                        {{ $lecturer->firstName .' '. $lecturer->lastName }}
                                        <br><small class="card-text">{{ $lecturer->title }}</small>
                                    </p>
                                    <span class="card-text">{{ $lecturer->email }}</span><br>
                                    <span class="card-text">{{ $lecturer->accessno }}</span><br>
                                    <a href="{{ route('lecturers.show', $lecturer->id ) }}" class="btn btn-outline-primary mt-2 float-auto">View Profile</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else 
                    <h1>No lecturers available.</h1>
                @endif
            </div>
        </div>
    </div>
@endsection