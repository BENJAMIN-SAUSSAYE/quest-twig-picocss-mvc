<?php

namespace App\Controllers;

use App\Models\ListArticlesModel;

class IndexController extends BaseController
{
    private array $articles = [];
    public function show()
    {
        $articles = ListArticlesModel::getAllArticle();
        //var_dump($articles);

        echo $this->render('home.html.twig', ['articles' => $articles]);
    }
}
