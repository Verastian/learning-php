<?php

class ArticleService
{
    private $articleRepository;


    public function __construct()
    {
        $this->articleRepository = new ArticleRepository();
    }

    public function getAllArticles()
    {
        return $this->articleRepository->getAllArticles();
    }

    public function getArticleById($id)
    {
        return $this->articleRepository->getArticleById($id);
    }

    public function createArticle($title, $image, $text, $createAt)
    {
        $article = new Article(null, $title, $image, $text, $createAt);
        $result = $this->articleRepository->insertArticle($article);
        if ($result) {
            return ['success' => true, 'message' => 'Usuario creado exitosamente.'];
        } else {
            return ['success' => false, 'message' => 'Error al crear el usuario en la base de datos.'];
        }
    }

    public function updateArticle($id, $title, $image, $text, $createAt)
    {
        $article = new Article($id, $title, $image, $text, $createAt);
        $updateResult = $this->articleRepository->updateArticle($article);

        if ($updateResult) {
            return ['success' => true, 'message' => 'Usuario actualizado exitosamente.'];
        } else {
            return ['success' => false, 'message' => 'Error al actualizar el usuario en la base de datos.'];
        }
    }

    public function deleteArticle($id)
    {
        return $this->articleRepository->deleteArticle($id);
    }


}