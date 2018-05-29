<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Repertory;
use App\Elimate;
use App\Borrow;
use App\Admin;
use Auth;
class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('table_pages/borrow');
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
            'bid' => 'required',
            ]);
            $money = Auth::user()->money;
            if($money<-100){
                return redirect()->back()->withInput()->withErrors("共欠款：{$money}，欠款太多，超过了100元,请先还清欠款");
            }
            $book = Book::where('bid',$request->get('bid'))->first();
            if(!$book){
                return redirect()->back()->withInput()->withErrors('图书ID出错,请检查填写是否有问题');
            }
            $borrow_val = Borrow::where('bid',$request->get('bid'))->first();
            if($borrow_val){
                return redirect()->back()->withInput()->withErrors('该本书已借出,请检查填写是否有问题');
            }
            $borrow = new Borrow;
            $borrow->bid = $request->get('bid');
            $borrow->uid = Auth::user()->id;
            $repe = Repertory::where('bname',$book->bname)->first();
            $repe->left -= 1;
            
            if ($borrow->save() and $repe->save()) {
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
