<section class="library-section">
    <h2>Explorar</h2>
    @if ($libraries->isEmpty())
        <p>Não há livros disponíveis no momento.</p>
    @else
        <div class="mosaic-grid">
            @foreach ($libraries as $library)
                <div class="card">
                    <h5>{{ $library->title }}</h5>
                    <hr>
                    <p>{{ $library->synopsis }}</p>
                    <p class="genre">{{ $library->genre }}</p>
                    @if (Auth::user() && Auth::user()->role == '3')
                        <button>
                            <a href="{{ route('library.edit', $library->id) }}">Editar</a>
                        </button>
                        <form action="{{ route('library.destroy', $library->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Deletar</button>
                        </form>
                    @elseif (Auth::user()->role == '1')
                        <button>Comprar</button>
                        <button>
							<a href="{{ route('library.show', $library->id) }}">Visualizar</a>
						</button>
                    @else
                        <button>
							<a href="{{ route('library.show', $library->id) }}">Visualizar</a>
						</button>
                    @endif
                </div>
            @endforeach
        </div>
        <div class="pagination">
            {{ $libraries->links('vendor.pagination.tailwind') }}
        </div>
    @endif
</section>
