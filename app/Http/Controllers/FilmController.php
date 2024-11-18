<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class FilmController extends Controller
{
    //
    public function index()
    {
        $film = DB::table('film')->get();
        // var_dump($film);die;
        return view('film', compact('film'));
    }
    public function add(Request $request)
    {
        DB::table('film')->insert([
            'judul' => $request->input('judul'),
            'rilis' => $request->input('rilis'),
            'genre' => $request->input('genre'),
            'deskripsi' => $request->input('deskripsi')
        ]);
        return redirect()->route('film');
    }
    public function edit(Request $request, $id)
    {
        DB::table('film')->where('filmID', $id)->update([
            'judul' => $request->input('judul'),
            'rilis' => $request->input('rilis'),
            'genre' => $request->input('genre'),
            'deskripsi' => $request->input('deskripsi')
        ]);
        return redirect()->route('film');
    }
    public function delete($id)
    {
        DB::table('film')->where('filmID', $id)->delete();
        return redirect()->route('film');
    }
}
