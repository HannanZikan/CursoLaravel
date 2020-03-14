<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BookStoreRequest;
use App\Models\Book;

class BookController extends Controller
{
    public function create(){
        return view('Books/create');
    }

    public function store(BookStoreRequest $request){
        $data = $request->all();
        $bookModel = app(Book::class);
        $data = $bookModel->create([
            'name' => $data['name'],
            'writer' => $data['writer'],
            'page_number' => $data['page_number'],
        ]);

        return redirect()->route('books.create');
    }

    public function index(){
        $bookModel = app(Book::class);
        $books = $bookModel->all();
        return view('Books/index',compact('books')); // parametros: view, o que eu quero retornar pra view
    }

}
