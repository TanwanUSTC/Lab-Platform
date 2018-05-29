<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Repertory;
class UpdateBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('table_pages/updatebook');
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
        if(!($request->get('bname') or 
        $request->get('pub') or $request->get('bid') or  
        $request->get('author') or $request->get('type'))){
            return redirect()->back()->withInput()->withErrors('什么条件也没有填写,所以什么也没有发生');
        }
        if(!($request->get('bid')) and $request->get('bid_c')){
            return redirect()->back()->withInput()->withErrors('请只在修改某一本ID的情况下输入');
        }



        if(($request->get('bname_c'))){
            if(
                ($request->get('bname')) 
                and 
                !(  $request->get('pub') or 
                    $request->get('bid') or  
                    $request->get('author') or 
                    $request->get('type')
                )
               ){
                    $books = Book::where('bname',$request->get('bname'))->
                        update(['bname'=>$request->get('bname_c')]);
                    $repe = Repertory::where('bname', $request->get('bname'))->
                        update(['bname'=>$request->get('bname_c')]);
                    return redirect()->back()->withInput()->withErrors("更新成功");
            }
            else{
                return redirect()->back()->withInput()->withErrors("只允许修改全部某本书的书名");
            }
        }
        $books = Book::null2all('bid',$request->get('bid'))->null2all('bname',$request->get('bname'))
        ->null2all('pub',$request->get('pub'))->null2all('author',$request->get('author'))
        ->null2all('type',$request->get('type'))->
        updatenull2all('bid',$request->get('bid_c'))->updatenull2all('bname',$request->get('bname_c'))
        ->updatenull2all('pub',$request->get('pub_c'))->updatenull2all('author',$request->get('author_c'))
        ->updatenull2all('type',$request->get('type_c'));

        return redirect()->back()->withInput()->withErrors("更新成功");
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
