@extends('layouts.app')

@section('content')
    <main>
        @auth
            {{ session('status') }}
            <section>
                <h2>Livros em Destaque</h2>
                <ul>
                    <li>Dom Casmurro</li>
                    <li>Grande Sertão: Veredas</li>
                    <li>Memórias Póstumas de Brás Cubas</li>
                </ul>
            </section>
            <section>
                <h2>Categorias</h2>
                <ul>
                    <li>Romance</li>
                    <li>Ficção Científica</li>
                    <li>Poesia</li>
                </ul>
            </section>
        @endauth
    </main>
@endsection
