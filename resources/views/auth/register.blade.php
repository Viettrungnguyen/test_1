@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('register') }}">
    @csrf
    <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" />
    @error('name') <span>{{ $message }}</span> @enderror

    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required />
    @error('email') <span>{{ $message }}</span> @enderror

    <input type="password" name="password" placeholder="Password" required />
    @error('password') <span>{{ $message }}</span> @enderror

    <button type="submit">Register</button>
</form>
@endsection
