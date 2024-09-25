@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-3xl font-bold mb-4">User Dashboard</h1>

    <p>Welcome, {{ Auth::user()->name }}! This is your dashboard.</p>

    <!-- Add content relevant to normal users here -->
</div>
@endsection
