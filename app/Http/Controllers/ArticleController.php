<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Repositories\ArticleRepository;

class ArticleController extends Controller
{
    protected $articles;

    public function __construct(Article $article)
    {
        $this->articles = new ArticleRepository($article);
    }

    public function create(Request $request) {
        $data = $request->all();
        if ($request->image_src !== '' && $request->image_src !== null) {
            $data['image_src'] = $request->image_src->store('img', 'local');
        } else {
            $data['image_src'] = '';
        }

        $this->articles->create($data);
    }

    public function all() {
        return view('index');
    }

    public function getArticlesApi() {
        $articles = $this->articles->all();
        return response()->json($articles);
    }

    public function delete(Request $request) {
        if (!$request->input('id') ) {
            return response()->json([
                'status' => 'error',
                'msg' => 'Error',
                'name' => 'Something went wrong :('
            ], 422);
        }

        $this->articles->delete($request->input('id'));

        return response()->json([
            'status' => 'success',
            'name' => 'Deleted',
            'msg' => 'Your article has been deleted',
        ], 201);
    }
}
