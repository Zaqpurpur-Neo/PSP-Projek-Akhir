@extends('templates.main')
<style>
</style>

@section('content')
<div class="container w-100 h-100">
    <div class="mx-auto w-auto align-item-center shadow-l p-4">
        <h1>About Me</h1>
        <h2>Hello, I Am {{ $name }}</h2>
        <p>
        @foreach ($specialist as $spec)
            <span>{{ $spec }}</span>
        @endforeach
        </p>
    </div>
</div>
@endsection
