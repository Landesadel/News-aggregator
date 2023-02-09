@extends('layouts.main')
@section('content')
    <div class="row mb-2">
@forelse($newsCollection as $news)

        <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-primary">category</strong>
                    <h3 class="mb-0">
                        <a class="text-dark" href="{{ route('article', ['id' => $news->id, 'category' => 'category']) }}">{{ $news->title }}</a>
                    </h3>
                    <div class="mb-1 text-muted">{{ $news->author }}</div>
                    <p class="card-text mb-auto">{{ $news->description }}</p>
                    <div class="mb-1 text-muted">{{ $news->created_at }}</div>
                    <a href="{{ route('article', ['id' => $news->id, 'category' => 'category']) }}">Reading-></a>
                </div>
                <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Card image cap">
            </div>
        </div>
@empty
    <h2>Aren't News here</h2>
@endforelse
    </div>
@endsection

