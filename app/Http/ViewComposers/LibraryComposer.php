<?php

namespace App\Http\ViewComposers;

use App\Models\Library;
use Illuminate\View\View;

class LibraryComposer
{
    public function compose(View $view)
    {
		$view->with('libraries', Library::orderBy('id', 'desc')->paginate(10));


    }
}