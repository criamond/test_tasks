<?php


class User
{
    private int $id;
    private string $name;

    public function __construct(int $id, string $name)
    {
        $this->id   = $id;
        $this->name = $name;
    }

    /**
     * Create a new article by user.
     *
     * @param   string  $title    Article title.
     * @param   string  $content  Article content.
     *
     * @return Article Created article.
     */
    public function createArticle(ArticleRepositoryInterface $articleRepository, string $title, string $content): Article
    {
        $article = $articleRepository->createArticleByUser($title, $content, $this);

        return $article;
    }

    /**
     * Get all articles of user.
     *
     * @param   ArticleRepositoryInterface  $articleRepository  Repository for fetching articles.
     *
     * @return array Array of user's articles.
     */
    public function getArticles(ArticleRepositoryInterface $articleRepository): array
    {
        return $articleRepository->getArticlesByUser($this);
    }
}