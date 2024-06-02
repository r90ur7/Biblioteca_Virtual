<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Http\Request;

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
		$libraries = Library::paginate(10);
		return view('partials.library', ['libraries' => $libraries]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('partials.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$library = new Library();
		$library->name = $request->input('name');
		$library->author = $request->input('author');
		$library->save();
		
		return redirect()->route('library.index')->with('success', 'Library created successfully');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$library = Library::find($id);
		return view('partials.show', ['library' => $library]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$library = Library::find($id);
		return view('partials.edit', ['library' => $library]);
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
		$library = Library::find($id);
		$library->name = $request->input('name');
		$library->author = $request->input('author');
		$library->save();
		
		return redirect()->route('library.index')->with('success', 'Library updated successfully');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$library = Library::find($id);
		$library->delete();
		
		return redirect()->route('library.index')->with('success', 'Library deleted successfully');
	}
}