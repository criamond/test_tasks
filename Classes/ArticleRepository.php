<?php

class ArticleRepository implements ArticleRepositoryInterface
{
    /**
     * Get all articles by user.
     *
     * @param   User  $user  User object.
     *
     * @return array Array of articles written by the user.
     */
    public function getArticlesByUser(User $user): array
    {
        // Database query to get articles by user.
        return [];
    }

    public function createArticleByUser(string $title, string $content, User $user): Article
    {

        $new_article = new Article($title, $content, $user);

        //....
        return $new_article;
    }
}