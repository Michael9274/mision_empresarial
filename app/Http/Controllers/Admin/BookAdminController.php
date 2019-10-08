<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Traits\BookLists;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookAdminController extends Controller
{

    use BookLists;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = $this->bookLists();

        return view('admin.books.index', compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable'
        ]);

        if ($request->file('image')){
            $image = $request->file('image')->storeAs(
                'public/books', str_replace(' ', '',$request->title).'.jpg'
            );
            $data['image'] = $image;
        }


        Book::create($data);

        return redirect()->route('libros.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable'
        ]);

        $idProduct = $request->idBook;

        $book = Book::find($idProduct);

        if ($request->file('image')){
            $image = $request->file('image')->storeAs(
                'public/books', $request->title.'.jpg'
            );
            $data['image'] = $image;
        }
        $book->update($data);


        return redirect()->route('libros.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::findOrFail($id)->delete();

        return redirect()->route('libros.index');
    }
}
