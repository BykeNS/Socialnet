<?php

namespace App\Http\Controllers;
use App\Article;
use Carbon\Carbon;
use Auth;
use DB;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles=Article::paginate(10);          //vraca sve rezultate elokvent
        //$articles=DB::table('users')->get();    // query builder
       // $articles=Article::wherelive(1)->get();    // elokvent
        //$articles=DB::table('articles')->wherelive(0)->get();
        return view('articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$article= new Article;
        $article->user_id=Auth::user()->id;   // 1 način smeštanja u bazu
        $article->content=$request->content;
        $article->live=(boolean)$request->live;
        $article->post_on=$request->post_on;

        $article->save();*/

        Article::create($request->all());  //2 način
        return redirect('/articles');

       /* Article::create([                //3 način
            'user_id'=>Auth::user()->id,
            'content'=>$request->content,
            'live'=>(boolean)$request->live,
            'post_on'=>$request->post_on
        ]);*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit',compact('article'));
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
        $article=Article::findOrFail($id);
        if (!isset($request->live)) 
         $article->update(array($request->all(),['live'=> false ]));
        else
        $article->update($request->all());

        return redirect('/articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article=Article::findOrFail($id);
        $article->delete();

        return redirect('/articles');
    }
}
