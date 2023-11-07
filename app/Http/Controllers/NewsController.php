<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;


class NewsController extends Controller
{
    public function home()
    {
        $news = News::all();

        return view('news.index', [
            'news' => $news,
        ]);
    }

    public function newById(int $id)
    {
        $new = News::findOrFail($id);

        return view('news.detalle', [
            'new' => $new,
        ]);
    }
}