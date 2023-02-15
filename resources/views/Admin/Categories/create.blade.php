@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Add Category</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-outline-secondary">Back</a>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
        </div>
    </div>
    <div>
        @if ($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        <form method="post" action="{{ route('admin.categories.store') }}">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror">
            </div>
            <div class="form-group">
                <label for="sources">Sources</label>
                <select id="sources" name="sources[]" class="form-control @error('sources') is-invalid @enderror" multiple>
                    <option value="0">->Select<-</option>
                    @foreach($sources as $source)
                        <option @if(old('source') === $source) selected @endif value="{{ $source->id }}">{{ $source->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" id="description" name="description" value="{{ old('description') }}" class="form-control @error('description') is-invalid @enderror">
            </div>
            <button type="submit" class="btn btn-sm btn-outline-secondary">Add+</button>
        </form>
    </div>
@endsection
