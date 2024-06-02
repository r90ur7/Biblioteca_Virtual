<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;

	protected $fillable = [
		'title' => 'max:100',
		'author' => 'max:100',
		'genre' => 'max:50',
		'publication_year' => 'date',
		'publisher'  => 'max:100',
		'page_count',
		'synopsis'  => 'max:500',
	];
}