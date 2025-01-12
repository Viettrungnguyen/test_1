@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('reset-password') }}">
    @csrf
    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required />
    @error('email') <span>{{ $message }}</span> @enderror

    <button type="submit">Reset Password</button>
</form>
@endsection
