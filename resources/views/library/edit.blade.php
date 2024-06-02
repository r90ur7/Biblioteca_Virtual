@extends('layouts.app')

@section('content')
    <main class="container">
        <h1>Editar Livro</h1>
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
        <form action="{{ route('library.update', $library->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{ $library->title }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" name="author" id="author" value="{{ $library->author }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="genre">Genre</label>
                <input type="text" name="genre" id="genre" value="{{ $library->genre }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="publication_year">Publication Year</label>
                <input type="text" name="publication_year" id="publication_year" value="{{ $library->publication_year }}"
                    class="form-control">
            </div>

            <div class="form-group">
                <label for="publisher">Publisher</label>
                <input type="text" name="publisher" id="publisher" value="{{ $library->publisher }}"
                    class="form-control">
            </div>

            <div class="form-group">
                <label for="page_count">Page Count</label>
                <input type="number" name="page_count" id="page_count" value="{{ $library->page_count }}"
                    class="form-control">
            </div>

            <div class="form-group">
                <label for="synopsis">Synopsis</label>
                <textarea name="synopsis" id="synopsis" class="form-control">{{ $library->synopsis }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </main>
@endsection
