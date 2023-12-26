<?php

require "./Classes/Article.php";
require "./Classes/User.php";
require "./Classes/ArticleRepositoryInterface.php";
require "./Classes/ArticleRepository.php";


// Examples
$user1 = new User(1, 'Jimmy Page');
$user2 = new User(2, 'John Lennon');

$articleRepository = new ArticleRepository();

$article1 = $user1->createArticle($articleRepository, 'Title 1', 'Content 1');
$article2 = $user1->createArticle($articleRepository, 'Title 2', 'Content 2');

$authorOfArticle1 = $article1->getAuthor();

// Get all articles of a user using the repository
$user1Articles = $user1->getArticles($articleRepository);

// Change the author
$article1->changeAuthor($user2);