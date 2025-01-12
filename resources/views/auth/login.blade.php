@extends('layouts.app')

@section('content')
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<form method="POST" action="{{ route('login') }}">
    @csrf
    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required />
    @error('email') <span>{{ $message }}</span> @enderror

    <input type="password" name="password" placeholder="Password" required />
    @error('password') <span>{{ $message }}</span> @enderror

    <button type="submit">Login</button>
</form>
@endsection
