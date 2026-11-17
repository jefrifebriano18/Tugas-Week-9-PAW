@extends('layout')
@section('title', 'Dashboard')
@section('content')
<h2>Dashboard</h2>
<p>Halo, <b>{{ auth()->user()->name }}</b> (role: <b>{{ auth()->user()->role }}</b>)</p>
<nav>
    <a href="{{ route('materi.lihat') }}">Lihat Materi</a>
    @if(in_array(auth()->user()->role, ['admin', 'dosen']))
        <a href="{{ url('/kelola-materi') }}">Kelola Materi</a>
        <a href="{{ route('nilai.kelola') }}">Kelola Nilai</a>
    @endif
    @if(auth()->user()->role === 'admin')
        <a href="{{ route('pengguna') }}">Manajemen Pengguna</a>
    @endif
    @if(in_array(auth()->user()->role, ['admin', 'mahasiswa']))
        <a href="{{ route('nilai.saya') }}">Nilai Saya</a>
    @endif
</nav>
<form method="POST" action="{{ route('logout') }}" style="margin-top:24px">@csrf<button>Logout</button></form>
@endsection