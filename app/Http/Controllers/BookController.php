<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookDetail;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.book.index', [
            'books' => Book::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.book.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);

        $validatedData = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'category_id' => 'required',
            'description' => 'required',
        ]);

        if ($request->file('cover')) {
            $validatedData['cover'] = $request->file('cover')->store('cover_book');
        }

        Book::create($validatedData);

        $book_id = Book::latest()->first()->id;

        for ($i = 0; $i < $request['stock']; $i++) {
            BookDetail::create([
                'book_id' => $book_id,
            ]);
        }

        return redirect('/book');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('pages.book.show', [
            'book' => $book,
            'stock_available' => BookDetail::where('book_id', $book->id)->where('availability', 'available')->get()->count()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('pages.book.edit', [
            'book' => $book,
            'categories' => Category::all(),
            'stock_total' => BookDetail::where('book_id', $book->id)->get()->count()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        // dd($request);

        $validatedData = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'category_id' => 'required',
            'description' => 'required',
        ]);

        if ($request->file('cover')) {
            $validatedData['cover'] = $request->file('cover')->store('cover_book');
        }

        $book->update($validatedData);

        $bookStock = BookDetail::where('book_id', $book->id)->get()->count();

        if ($request['stock'] > $bookStock) {

            for ($i = 0; $i < $request['stock'] - $bookStock; $i++) {
                BookDetail::create([
                    'book_id' => $book->id,
                ]);
            }
        } else {
            for ($i = 0; $i < $bookStock - $request['stock']; $i++) {
                BookDetail::where('book_id', $book->id)->where('availability', 'available')->latest()->first()->delete();
            }
        }


        return redirect('/book');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect('/book');
    }
}
