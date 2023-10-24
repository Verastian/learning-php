<?php
// require_once 'src/models/article/article.model.php';
// require_once('config/database.config.php');
$servicePath = "config/database.config.php";
if (file_exists($servicePath)) {
    require_once($servicePath);
} else {
    echo "El archivo de servicio no se encontró en la ubicación especificada.";
    // Realiza otras acciones necesarias si el archivo no se encuentra
}
class ArticleRepository
{
    private $mssql;

    public function __construct()
    {
        $this->mssql = MYSQLConnect();
    }

    public function getAllArticles()
    {
        $articles = array();
        try {
            $query = "SELECT * FROM article";
            $result = mysqlQ($this->mssql, $query);
            if ($result) {
                while ($row = mysqlF($result)) {
                    $article = new Article($row['id'], $row['title'], $row['image'], $row['text'], $row['createAt']);
                    $articles[] = $article;
                }
            }
        } catch (Exception $e) {
            echo "Error en la conexión a la base de datos:" . $e->getMessage();
        }
        return $articles;
    }

    public function getArticleById($id)
    {
        try {
            $query = "SELECT * FROM article WHERE id = " . $id;
            $result = mysqlQ($this->mssql, $query);
            $row = mysqlF($result);
            if ($row) {
                return new Article($row['id'], $row['title'], $row['image'], $row['text'], $row['createAt']);
            } else {
                return null;
            }
        } catch (Exception $e) {
            echo "Error en la conexión a la base de datos:" . $e->getMessage();
        }
    }

    public function insertArticle(Article $article)
    {
        try {
            $title = $article->getTitle();
            $image = $article->getImage();
            $text = $article->getText();
            $createAt = $article->getCreateAt();
            $query = "INSERT INTO article (title, image, text,createAt) VALUES ('$title', '$image', '$text','$createAt')";
            return mysqlQ($this->mssql, $query);
        } catch (Exception $e) {
            echo "Error en la conexión a la base de datos:" . $e->getMessage();
        }
    }

    public function updateArticle(Article $article)
    {
        try {
            $id = $article->getId();
            $title = $article->getTitle();
            $image = $article->getImage();
            $text = $article->getText();
            $createAt = $article->getCreateAt();
            $query = "UPDATE article SET title='$title', image='$image', text='$text', createAt='$createAt' WHERE id=$id";
            return mysqlQ($this->mssql, $query);
        } catch (Exception $e) {
            echo "Error en la conexión a la base de datos:" . $e->getMessage();
        }
    }

    public function deleteArticle($id)
    {
        try {
            $query = "DELETE FROM article WHERE id=$id";
            return mysqlQ($this->mssql, $query);
        } catch (Exception $e) {
            echo "Error en la conexión a la base de datos:" . $e->getMessage();
        }
    }
}