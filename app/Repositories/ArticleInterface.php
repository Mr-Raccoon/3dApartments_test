<?php

namespace App\Repositories;
use App\Models\Article;

interface ArticleInterface
{
    public function all();

    public function create($data);

    public function delete($id);
}
