<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LibraryController extends Controller
{
    private $library;
    public function __construct()
    {
        $this->middleware('auth');
        $this->library = new Library();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libraries = Library::orderBy('id', 'desc')
    ->paginate(10);
        return response()->view('partials.library', ['libraries' => $libraries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('library.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	public function store(Request $request)
	{
		$rules = [
			'title' => 'required|max:100',
			'author' => 'required|max:100',
			'genre' => 'required|max:50',
			'publication_year' => 'required|date_format:Y',
			'publisher' => 'required|max:100',
			'page_count' => 'required|integer|min:0',
			'synopsis' => 'nullable|max:500',
		];

		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
			return response()->redirectToRoute('library.create')
				->withErrors($validator)
				->withInput();
		}

		$library = new Library();
		$library->title = $request->input('title');
		$library->author = $request->input('author');
		$library->genre = $request->input('genre');
		$library->publication_year = $request->input('publication_year');
		$library->publisher = $request->input('publisher');
		$library->page_count = $request->input('page_count');
		$library->synopsis = $request->input('synopsis');

		$library->save();

		return redirect()->route('home')->with('success', 'Library created successfully');
	}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Library $book)
    {
        return response()->view('Library.show', ['library' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Library $book)
    {
        return response()->view('Library.edit', ['library' => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'max:100',
            'author' => 'max:100',
            'genre' => 'max:50',
            'publication_year' => 'date',
            'publisher' => 'max:100',
            'page_count' => 'integer',
            'synopsis' => 'max:500',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->redirectToRoute('library.edit', ['book' => $id])
                ->withErrors($validator)
                ->withInput();
        }

        $library = Library::find($id);

        if (!$library) {
            abort(404, 'Library not found');
        }

        $library->title = $request->input('title');
        $library->author = $request->input('author');
        $library->genre = $request->input('genre');
        $library->publication_year = $request->input('publication_year');
        $library->publisher = $request->input('publisher');
        $library->page_count = $request->input('page_count');
        $library->synopsis = $request->input('synopsis');

        $library->save();

        return redirect()->route('home')->with('success', 'Library updated successfully');
    }

/**
 * Remove the specified resource from storage.
 *
 * @param int $id
 * @return \Illuminate\Http\Response
 */
    public function destroy($id)
    {
        $library = Library::find($id);
        $library->delete();

        return redirect()->route('home')->with('success', 'Library deleted successfully');
    }
}