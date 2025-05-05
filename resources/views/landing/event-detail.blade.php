@extends('layouts.landing')

@section('content')
<div class="container mx-auto px-4 py-12">

    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <img src="{{ asset('storage/' . $event->poster_image) }}" alt="{{ $event->title }}"
            class="w-full h-80 object-cover">
        <div class="p-6">
            <h1 class="text-4xl font-bold mb-4">{{ $event->title }}</h1>
            <p class="text-gray-700 mb-2">
                {{ \Carbon\Carbon::parse($event->start_time)->format('d M Y H:i') }} -
                {{ \Carbon\Carbon::parse($event->end_time)->format('d M Y H:i') }}
            </p>
            <p class="text-gray-500 mb-4">{{ $event->location }}</p>
            <div class="text-gray-800 leading-relaxed">
                {!! nl2br(e($event->description)) !!}
            </div>
            <a href="{{ route('event.index') }}"
                class="inline-block mt-6 bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded-full">
                ← Back to Events
            </a>
        </div>
    </div>

</div>
@endsection