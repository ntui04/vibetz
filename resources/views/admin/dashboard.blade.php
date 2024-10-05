@extends('layouts.app')

@section('content')
<div class="container mx-auto">

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

   
</div>
@endsection
