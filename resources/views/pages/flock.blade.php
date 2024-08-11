@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="twelve columns">
            @auth
            <div class="accordion" style="margin-top: 20px;">
                <button class="accordion-button button -white-bg -rounded">Add a Member to the Flock</button>
                <div class="accordion-content">
                    <div class="container">
                        <form action="/flock" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label for="birthday">Birthday</label>
                                <input type="date" name="birthday" id="birthday" class="form-control @error('birthday') is-invalid @enderror" value="{{ old('birthday') }}" required>
                                @error('birthday')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label for="breed">Breed</label>
                                <input type="text" name="breed" id="breed" class="form-control @error('breed') is-invalid @enderror" value="{{ old('breed') }}" required>
                                @error('breed')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label for="age">Age</label>
                                <input type="number" name="age" id="age" class="form-control @error('age') is-invalid @enderror" value="{{ old('age') }}" required>
                                @error('age')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label for="image">Photo</label>
                                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                            </div>

                            <div class="form-group">
                                <label for="bio">Bio</label>
                                <textarea name="bio" id="bio" class="form-control @error('bio') is-invalid @enderror">{{ old('bio') }}</textarea>
                                @error('bio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <button type="submit" class="button -clover-bg" style="color:white;">Add Chicken</button>
                        </form>
                    </div>
                </div>
            </div>
        @endauth
            <h1>Flock</h1>
            @livewire('chickens')
        </div>
    </div>
@endsection
