@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Add News</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="{{ route('admin.news.index') }}" class="btn btn-sm btn-outline-secondary">Back</a>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
        </div>
    </div>
    <div>
        @if ($errors->any()))
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        <form method="post" action="{{ route('admin.news.store') }}">
            @csrf
            <div class="form-group">
                <label for="Categories_id">Category</label>
                <select id="Categories_id" name="Categories_id[]" class="form-control @error('Categories_id') is-invalid @enderror" multiple>
                    <option value="0">->Select<-</option>
                    @foreach($categories as $category)
                        <option @if(old('category') === $category) selected @endif value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>

            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror">
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" id="author" name="author" value="{{ old('author') }}" class="form-control @error('author') is-invalid @enderror">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" class="form-control @error('status') is-invalid @enderror">
                    @foreach($statuses as $status)
                        <option @if(old('status') === $status) selected @endif value="{{ $status }}">{{ $status }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="image">Picture</label>
                <input type="file" id="image" name="image" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Text</label>
                <textarea type="text" id="description" name="description"  class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
            </div>
            <button type="submit" class="btn btn-sm btn-outline-secondary">Add+</button>
        </form>
    </div>
@endsection
