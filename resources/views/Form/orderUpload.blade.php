<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Upload</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="{{ asset('assets/css/blog.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
<x-news.header></x-news.header>
<div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
        <a class="btn btn-sm btn-outline-secondary" href='/'>Back</a>
        <a class="btn btn-sm btn-outline-secondary" href='/category'>News categories</a>
    </nav>
</div>

    <form method="post" action="{{ route('form.upload') }}">
        @csrf
        <div class="form-group">
            <label for="fullName">Title</label>
            <input type="text" id="fullName" name="fullName" class="form-control">
        </div>
        <div class="form-group">
            <label for="phone">Author</label>
            <input type="tel" id="phone" name="phone" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Text</label>
            <textarea type="text" id="description" name="description" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-sm btn-outline-secondary">Send+</button>
    </form>
</div>
</body>
</html>

