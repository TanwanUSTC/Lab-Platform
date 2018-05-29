<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Repertory;
use App\Purchase;
class BookaddController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('table_pages/bookadd');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'bid' => 'required|unique:books',
        'bname' => 'required',
        ]);
    $book = new Book;
    $book->bid= $request->get('bid');
    $book->bname = $request->get('bname');
    $book->author = $request->get('author');
    $book->pub = $request->get('pub');
    $book->type = $request->get('type');
    
    $purchase = new Purchase;
    $purchase->bid = $request->get('bid');
    $purchase->bname = $request->get('bname');
    $purchase->author = $request->get('author');
    $purchase->pub = $request->get('pub');
    $purchase->type = $request->get('type');
    $purchase->qty = 1;
    $purchase->save(); 

    $repe = Repertory::where('bname', $book->bname)->first();
    if($repe){
        $repe->rqty += 1;
        $repe->left += 1;
    }
    else{
        $repe = new Repertory;
        $repe->bname = $request->get('bname');
        $repe->rqty += 1;
        $repe->left += 1;
    }    
    if ($book->save() && $repe->save()) {
        return redirect()->back()->withInput()->withErrors('添加成功！');
    } else {
        return redirect()->back()->withInput()->withErrors('添加失败！');
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
