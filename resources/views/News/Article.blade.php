@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
{{--            {{ $news->category }}--}} category
        </h3>
        <div class="blog-post">
            <h2 class="blog-post-title">{{ $news->title }}</h2>
            <p class="blog-post-meta">{{ $news->created_at }}<a href="#">{{ $news->author }}</a></p>
            <p>{!! $news->description !!}</p>
        </div>
    </div>
</div>
@endsection
