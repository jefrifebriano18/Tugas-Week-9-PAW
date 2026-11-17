@extends('layout')
@section('title', $judul)
@section('content')
<h2>{{ $judul }}</h2>
<p>Halaman ini hanya dapat dibuka oleh role yang berhak.</p>
<a href="{{ route('dashboard') }}">&larr; Kembali ke dashboard</a>
@endsection
