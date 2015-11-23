<?php

namespace Todolist\Http\Controllers;

use Illuminate\Http\Request;
use Todolist\Http\Requests;
use Todolist\Http\Controllers\Controller;
use Todolist\Models\Tag;
use Illuminate\Http\Exception\HttpResponseException;

class TagController extends Controller {

    /**
     * Carrega a view que lista as tags ou mostra uma tag específica caso 
     * um id seja passado diferente de nulo
     * @return String
     */
    public function getIndex($id = null) {
        $tags = \Todolist\Models\Tag::all();
        return view('tags.lista', ['tags' => $tags]);

    }
}
