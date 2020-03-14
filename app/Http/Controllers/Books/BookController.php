<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Models\Book;

class BookController extends Controller
{
    public function create()
    {
        return view('Books/create');
    }

    public function store(BookStoreRequest $request)
    {
        $data = $request->all();
        $bookModel = app(Book::class);
        $data = $bookModel->create([
            'name' => $data['name'],
            'writer' => $data['writer'],
            'page_number' => $data['page_number'],
        ]);

        return redirect()->route('books.index');
    }

    public function index()
    {
        $bookModel = app(Book::class);
        $books = $bookModel->all();
        return view('Books/index', compact('books')); // parametros: view, o que eu quero retornar pra view
    }

    public function destroy($id)
    {
        if (!empty($id)) {
            $bookModel = app(Book::class);
            $book = $bookModel->find($id);
            if (!empty($book)) {
                $book->delete();
                return response()->json([
                    'status'  => 'success',
                    'message' => 'Livro deletado com sucesso.',
                    'reload'  => true,
                ]);
            } else {
                return response()->json([
                    'status'  => 'error',
                    'message' => 'Livro não encontrado.',
                    'reload'  => true,
                ]);
            }
        } else {
            return response()->json([
                'status'  => 'error',
                'message' => 'ID não está na requisição',
                'reload'  => true,
            ]);
        }
    }

    public function edit($id)
    {
        $bookModel = app(Book::class);
        $book = $bookModel->find($id); // esse find só procura pelo id
        return view('Books/edit', compact('book'));
    }

    public function update(BookUpdateRequest $request, $id)
    {
        $data = $request->all();
        $bookModel = app(Book::class);
        $book = $bookModel->find($id);
        $book->update([
            'name' => $data['name'],
            'writer' => $data['writer'],
            'page_number' => $data['page_number'],
        ]);

        return redirect()->route('books.index');
    }
}
