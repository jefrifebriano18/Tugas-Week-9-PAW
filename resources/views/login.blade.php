@extends('layout')
@section('title', 'Login')
@section('content')
<h2>Login Aplikasi Akademik</h2>
<form method="POST" action="{{ url('/login') }}">
    @csrf
    <label>Email</label>
    <input type="email" name="email" value="{{ old('email') }}" required>
    <label>Password</label>
    <input type="password" name="password" required>
    @error('email')<p class="err">{{ $message }}</p>@enderror
    <button type="submit">Login</button>
</form>
@endsection
