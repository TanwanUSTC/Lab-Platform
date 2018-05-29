<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Repertory;
use App\Purchase;
class AddRepertoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('table_pages/addrepertory');
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
            'bname' => 'required',
            'qty' => 'required',
            ]);   
        $repe = Repertory::where('bname', $request->get('bname'))->first();
        if($repe){
            $bookold = Book::where('bname',$request->get('bname'))->first();
            $purchase = new Purchase;
            $purchase->bid = 0;
            $purchase->bname = $bookold->bname;
            $purchase->author = $bookold->author;
            $purchase->pub = $bookold->pub;
            $purchase->type = $bookold->type;
            $purchase->qty = $request->get('qty');
            $purchase->save(); 
            $repe->rqty += $request->get('qty');
            $repe->left += $request->get('qty');
            for ($i=0; $i<($request->get('qty'));$i++) {
                $book = new Book;
                $book->bid= rand(1000000,4200000000);
                $book->bname = $request->get('bname');
                $book->author = $bookold->author;
                $book->pub = $bookold->pub;
                $book->type = $bookold->type;
                if($book->save()){
                    continue;
                }
                else{
                    $i=$i-1;
                }
            }
        }
        else{
            if($request->get('bname') and 
            $request->get('pub') and $request->get('author') and 
            $request->get('type')){
                ;
            }
            else{
                return redirect()->back()->withInput()->withErrors('之前没有该名字书的记录,请输入详细信息');
            }
            $repe = new Repertory;
            $repe->bname = $request->get('bname');
            $repe->rqty = $request->get('qty');
            $repe->left = $request->get('qty');
            $purchase = new Purchase;
            $purchase->bid = 0;
            $purchase->bname = $request->get('bname');
            $purchase->author = $request->get('author');
            $purchase->pub = $request->get('pub');
            $purchase->type = $request->get('type');
            $purchase->qty = $request->get('qty');
            $purchase->save(); 
            for ($i=0; $i<($request->get('qty'));$i++) {
                $book = new Book;
                $book->bid= rand(1000000,4200000000);
                $book->bname = $request->get('bname');
                $book->author = $request->get('author');
                $book->pub = $request->get('pub');
                $book->type = $request->get('type');
                $book->save();
                if($book->save()){
                    continue;
                }
                else{
                    $i=$i-1;
                }
            }
        }
        if ($repe->save()) {
            return redirect()->back()->withInput()->withErrors('成功！');
        } else {
            return redirect()->back()->withInput()->withErrors('失败！');
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
