@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4 fw-bold">Feedback</h3>

    @if($feedbacks->count())
    <div class="list-group shadow-sm">
        @foreach($feedbacks as $feedback)
        <div class="list-group-item">
            <h5 class="mb-1 fw-semibold">{{ $feedback->name }} <small
                    class="text-muted">({{ $feedback->email }})</small></h5>
            <p class="mb-1">{{ $feedback->message }}</p>
            <small class="text-muted">{{ $feedback->created_at->format('d M Y H:i') }}</small>
        </div>
        @endforeach
    </div>

    <div class="mt-3">
        {{ $feedbacks->links() }}
    </div>
    @else
    <p class="text-muted">No feedback found.</p>
    @endif
</div>
@endsection