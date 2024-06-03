@extends('layouts.app')

@section('content')
    <main class="container">
        <h1>Detalhes do Livro</h1>
        <div>
            <h2>Title: {{ $library->title }}</h2>
            <p>Author: {{ $library->author }}</p>
            <p>Genre: {{ $library->genre }}</p>
            <p>Publication Year: {{ $library->publication_year }}</p>
            <p>Publisher: {{ $library->publisher }}</p>
            <p>Page Count: {{ $library->page_count }}</p>
            <p>Synopsis: {{ $library->synopsis }}</p>
        </div>
        <div>
            <a href="{{ route('home') }}" class="btn btn-primary">Voltar</a>
            <form action="{{ route('library.destroy', $library->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar</button>
            </form>
        </div>
    </main>
@endsection