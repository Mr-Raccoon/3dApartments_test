<?php

namespace App\Repositories;

use App\Repositories\ArticleInterface;
use App\Models\Article;

class ArticleRepository implements ArticleInterface
{
    protected $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    public function all()
    {
        return $this->article->all();
    }

    public function create($data)
    {
        $this->article->name = $data['name'];
        $this->article->text = $data['text'];
        $this->article->image_src = $data['image_src'] ?? '';

        $this->article->save();
    }

    public function delete($id)
    {
        $this->article->find($id)->delete();
    }
}
