<?php

class Article
{
    private string $title;
    private string $content;
    private User $author;

    public function __construct($title, $content, User $author)
    {
        $this->title   = $title;
        $this->content = $content;
        $this->author  = $author;
    }

    /**
     * Get the author of the article.
     *
     * @return User Author of the article.
     */
    public function getAuthor(): User
    {
        return $this->author;
    }

    /**
     * Change the author of the article.
     *
     * @param   User  $newAuthor  New author of the article.
     */
    public function changeAuthor(User $newAuthor) : void
    {
        $this->author = $newAuthor;
    }
}