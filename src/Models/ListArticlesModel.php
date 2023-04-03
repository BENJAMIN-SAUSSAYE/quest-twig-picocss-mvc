<?php

namespace App\Models;

/*
function createConnection(): PDO
{
    return new PDO("mysql:host=" . SERVER . ";dbname=" . DATABASE . ";charset=utf8", USER, PASSWORD);
}
*/
/*
function getAllArticle(): array
{
    // Fetching all recipes from database -  assuming the database is okay
    $connection = createConnection();
    $statement = $connection->query('SELECT id, title FROM recipe');
    $recipes = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $recipes;
}
*/

class ListArticlesModel
{
    public static function getAllArticle(): array
    {
        return [
            ['id' => 1, 'title' => 'Visit Components classless', 'img' => 'imgArticle1.png', 'intro' => 'Some quick example text to build on the card title and make up the bulk of the card\'s content', 'link' => 'https://picocss.com/docs/classless.html'],
            ['id' => 2, 'title' => 'Facing Cascade Style Sheet', 'img' => 'imgArticle2.png', 'intro' => 'Some quick example text', 'link' => 'https://picocss.com/docs/classless.html'],
            ['id' => 3, 'title' => 'Contemplate Form Inputs river', 'img' => 'imgArticle3.png', 'intro' => 'Make up the bulk of the card\'s content', 'link' => 'https://picocss.com/docs/classless.html'],
            ['id' => 4, 'title' => 'Enjoy no Javascript', 'img' => 'imgArticle4.png', 'intro' => 'Build on the card title and make up the bulk of the card\'s content', 'link' => 'https://picocss.com/docs/classless.html'],
        ];
    }
}
