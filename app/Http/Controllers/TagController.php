<?php

namespace Todolist\Http\Controllers;

use Illuminate\Http\Request;
use Todolist\Http\Requests;
use Todolist\Http\Controllers\Controller;

class TagController extends Controller {

    public function getIndex() {
        $tags = \Todolist\Models\Tag::all();
        return view('tags.lista', ['tags' => $tags]);
    }

}
