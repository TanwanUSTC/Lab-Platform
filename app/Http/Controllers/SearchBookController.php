<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Repertory;
class SearchBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('table_pages/searchbook');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if(!($request->get('bname') or 
        // $request->get('pub') or $request->get('bid') or  
        // $request->get('author') or $request->get('type'))){
        //     return redirect()->back()->withInput()->withErrors('什么也没有填写,所以什么也没有发生');
        // }
        // if($request->get('bid')){
        //     $books=Book::where('bid',$request->get('bid'))->paginate(10);
        //     return view('table_pages.bookinfo',compact('books'));
        // }

        // $books = Book::null2all('bid',$request->get('bid'))->
        // null2all('bname',$request->get('bname'))->
        // null2all('pub',$request->get('pub'))->
        // null2all('author',$request->get('author'))->
        // null2all('type',$request->get('type'))->paginate(10);
        // return view('table_pages.bookinfo',compact('books'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
