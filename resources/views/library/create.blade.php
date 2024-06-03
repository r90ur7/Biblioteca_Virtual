@extends('layouts.app')

@section('content')
    <main class="container">
        <h1>Publique seu Livro</h1>
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('library.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" name="author" id="author" value="{{ old('author') }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="genre">Genre</label>
                <input type="text" name="genre" id="genre" value="{{ old('genre') }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="publication_year">Publication Year</label>
                <input type="text" name="publication_year" id="publication_year" value="{{ old('publication_year') }}"
                    class="form-control">
            </div>

            <div class="form-group">
                <label for="publisher">Publisher</label>
                <input type="text" name="publisher" id="publisher" value="{{ old('publisher') }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="page_count">Page Count</label>
                <input type="number" name="page_count" id="page_count" value="{{ old('page_count') }}"
                    class="form-control">
            </div>

            <div class="form-group">
                <label for="synopsis">Synopsis</label>
                <textarea name="synopsis" id="synopsis" class="form-control">{{ old('synopsis') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Criar</button>
        </form>
    </main>
@endsection
