<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Repertory;
use App\Elimate;
use App\Borrow;
use App\Admin;
use App\User;
use Auth;
use DB;
class ReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('table_pages/return');
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
            $book = Book::where('bid',$request->get('bid'))->first();
            if(!$book){
                return redirect()->back()->withInput()->withErrors('图书ID出错,请检查填写是否有问题');
            }
            $borrow = Borrow::where('bid',$request->get('bid'))->
            where('uid',Auth::user()->id)->first();
            if(!$borrow){
                return redirect()->back()->withInput()->withErrors('该本书已还,请检查填写是否有问题');
            }
            
            
            $repe = Repertory::where('bname',$book->bname)->first();
            $repe->left += 1;

            $now = strtotime("now");
            $past = strtotime($borrow->created_at);
            $cost =  ($now - $past)*0.000004;

            $user = User::where('id', Auth::user()->id)->first();
            if(!$user->money){
                $user->money = 0-$cost;
            }
            else{
                $user->money -= $cost;
            }
            $user->save();
            $borrow->delete();
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
