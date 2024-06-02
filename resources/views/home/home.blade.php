@extends('layouts.app')

@section('content')
    @auth
	<main>
		<section>
			<h2>Novidades</h2>
			<p>Confira os últimos lançamentos e atualizações da nossa biblioteca.</p>
            </section>
            <section>
                <h2>Livros Populares</h2>
                <p>Descubra os livros mais populares entre nossos leitores.</p>
            </section>
            
            <div id="library-section">
				@include('partials.library')
			</div>
        </main>
    @endauth
@endsection