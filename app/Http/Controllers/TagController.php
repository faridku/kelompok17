<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function show($tag_id)
    {
        $tag = Tag::find($tag_id);
        $list = $tag->question;
        // dd($list);
        return view('tags.list', compact('list', 'tag'));
    }
}
