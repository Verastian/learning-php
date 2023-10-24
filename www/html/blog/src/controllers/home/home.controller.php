<?php
class HomeController
{
  private $articleService;

  public function __construct()
  {
    $this->articleService = new ArticleService();
  }


  function index()
  {
    $articles = $this->articleService->getAllArticles();
    include('src/views/home.view.php');
  }
}
?>