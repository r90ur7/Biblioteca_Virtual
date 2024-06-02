<section class="library-section">
    <h2>Explorar</h2>
    @if($libraries->isEmpty())
        <p>Não há livros disponíveis no momento.</p>
    @else
        <div class="mosaic-grid">
            @foreach($libraries as $library)
                <div class="card">
					<h5>{{ $library->title }}</h5>
					<hr> 
					<p>{{ $library->synopsis }}</p>
				</div>
            @endforeach
        </div>
        <div class="pagination">
            {{ $libraries->links('vendor.pagination.tailwind') }}
        </div>
    @endif
</section>