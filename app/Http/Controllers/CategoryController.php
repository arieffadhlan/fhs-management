<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('categories')
            ->select('id', 'nama_kategori')
            ->get();
        return view('pages.data-master.kategori.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.data-master.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = ['required' => 'Harap masukkan :attribute!'];
        $this->validate($request, [
            'nama_kategori' => 'required'
        ], $messages);

        Category::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect('/master/kategori')->with('success', 'Data kategori telah berhasil ditambahkan!');
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
        $category = DB::table('categories')
            ->select('id', 'nama_kategori',)
            ->where('id', '=', $id)
            ->get();

        return view('pages.data-master.kategori.edit', compact('category'));
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
        $category = Category::whereId($id)->first();

        $messages = ['required' => 'Harap masukkan :attribute!'];
        $this->validate($request, [
            'nama_kategori' => 'required'
        ], $messages);

        $category->update([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect('/master/kategori')->with('success', 'Data kategori telah berhasil diperbaharui!');
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
