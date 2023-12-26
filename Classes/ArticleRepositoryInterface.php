<?php

interface ArticleRepositoryInterface
{
    public function getArticlesByUser(User $user);
}