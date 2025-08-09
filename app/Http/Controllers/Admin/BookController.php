<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = DB::table('books')
                 ->leftJoin('categories', 'books.category_id', '=', 'categories.id')
                 ->select('books.*', 'categories.title')
                 ->paginate(20);

        return view('content.apps.book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('type', 'book')->get(['id','title']);
        return view('content.apps.book.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:books,name'
        ]);


        if ($validator->fails()) {
            $errors = $validator->errors();
            $errorDisplay = "";
            foreach ($errors->messages() as $key => $error) {
                $errorDisplay = $errorDisplay . '<br>' . $error[0];
            }
            Alert::toast($errorDisplay, 'error')->timerProgressBar();
            return redirect()->back();
        }

        $data = $request->all();
        $data['category_id'] = $request->category_id;
        $data['is_deleted'] = $request->status == 1 ? false : true;
        unset($data['_token']);


        $book = Book::Create($data);
        $book->addAllMediaFromTokens();
        if ($book) {
            Alert::toast("Book Created Successfully", 'success');
            return redirect()->route('books.index');
        } else {
            Alert::toast('Fail to create new Book', 'error');
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::where('type', 'book')->get(['id','title']);
        $book = Book::findOrFail($id);
        return view('content.apps.book.edit', compact('categories', 'book'));
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
        $validator = Validator::make($request->except('_method'), [
            'name' => 'required|unique:books,name,'. $id
        ]);


        if ($validator->fails()) {
            $errors = $validator->errors();
            $errorDisplay = "";
            foreach ($errors->messages() as $key => $error) {
                $errorDisplay = $errorDisplay . '<br>' . $error[0];
            }
            Alert::toast($errorDisplay, 'error')->timerProgressBar();
            return redirect()->back();
        }

        $data = $request->except('_method');
        $data['category_id'] = $request->category_id;
        $data['is_deleted'] = $request->status == 1 ? false : true;
        unset($data['_token']);
        unset($data['media']);
        unset($data['status']);


        $book = Book::where('id', $id)->update($data);
        $book = Book::find($id);
        $book->addAllMediaFromTokens();
        if ($book) {
            Alert::toast("Book Updated Successfully", 'success');
            return redirect()->route('books.index');
        } else {
            Alert::toast('Fail to update Book', 'error');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::where('id', $id)->delete();
        Alert::toast("Book Deleted Successfully", 'success');
        return redirect()->route('books.index');
    }
}
