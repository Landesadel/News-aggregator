@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit category</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="{{ route('admin.source.index') }}" class="btn btn-sm btn-outline-secondary">Back</a>
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
        <form method="post" action="{{ route('admin.source.update', ['source' => $source]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="Categories">Category</label>
                <select id="Categories" name="Categories[]" class="form-control @error('Categories') is-invalid @enderror" multiple>
                    <option value="0">->Select<-</option>
                    @foreach($categories as $category)
                        <option @if(in_array($category->id,   $source->categories->pluck('id')->toArray())) selected @endif value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ $source->name }}" class="form-control @error('name') is-invalid @enderror">
            </div>
            <div class="form-group">
                <label for="url">Url</label>
                <input type="url" id="url" name="url" value="{{ $source->url }}" class="form-control @error('url') is-invalid @enderror">
            </div>
            <button type="submit" class="btn btn-sm btn-outline-secondary">Edit+</button>
        </form>
    </div>
@endsection
