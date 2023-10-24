<?php

class Comment
{
    private $conn;
    private $table = 'comments';

    // Properties
    public $id;
    public $comment;
    public $state;
    public $createAt;

    // Constructor
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Get comments
    public function read()
    {
        $query = 'SELECT c.id AS id_comment, c.comment AS comment, c.state AS state, c.createAt AS createAt, c.user_id, u.email AS user_name, a.title AS article_title  FROM ' . $this->table . ' c LEFT JOIN users u ON u.id = c.user_id LEFT JOIN articles a ON a.id = c.article_id';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $comments = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $comments;
    }

    // Get individual comment
    public function read_individual($id)
    {
        $query = 'SELECT c.id AS id_comment, c.comment AS comment, c.state AS state, c.createAt AS createAt, c.user_id, u.email AS user_name, a.title AS article_title  FROM ' . $this->table . ' c LEFT JOIN users u ON u.id = c.user_id LEFT JOIN articles a ON a.id = c.article_id WHERE c.id = ? LIMIT 0,1';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $comment = $stmt->fetch(PDO::FETCH_OBJ);
        return $comment;
    }

    // Get comments by article id
    public function readByArticleId($articleId)
    {
        $query = 'SELECT c.id AS id_comment, c.comment AS comment, c.state AS state, c.createAt AS createAt, c.user_id, u.email AS user_name FROM ' . $this->table . ' c INNER JOIN users u ON u.id = c.user_id WHERE article_id = :article_id && state = 1';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":article_id", $articleId);
        $stmt->execute();
        $comments = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $comments;
    }

    // Create a new comment
    public function create($email, $comment, $articleId)
    {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        $userId = $user->id;

        $query2 = 'INSERT INTO ' . $this->table . ' (comment, user_id, article_id, state) VALUES(:comment, :user_id, :article_id, 0)';
        $stmt = $this->conn->prepare($query2);
        $stmt->bindParam(":comment", $comment, PDO::PARAM_STR);
        $stmt->bindParam(":user_id", $userId, PDO::PARAM_INT);
        $stmt->bindParam(":article_id", $articleId, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        }
        printf("error %s\n", $stmt->error);
        return false;
    }

    // Update a comment
    public function update($commentId, $state)
    {
        $query = 'UPDATE ' . $this->table . ' SET state = :state WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $commentId, PDO::PARAM_INT);
        $stmt->bindParam(":state", $state, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        }
        printf("error %s\n", $stmt->error);
    }

    // Delete a comment
    public function delete($commentId)
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $commentId, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return true;
        }
        printf("error %s\n", $stmt->error);
    }
}