<?php

class ImagesModel
{
    /**
     * Every model needs a database connection, passed to the model
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    /**
     * Get all images
     */

    public function getAllImages(){
        $sql = "SELECT images.*, users.first_name, users.last_name, users.email, users.username
                FROM images
                LEFT JOIN users
                ON images.owner = users.id
                WHERE images.is_private = FALSE
                ORDER BY date DESC";

        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getComments($image_id){
        $sql = "SELECT image_comments.*, users.first_name, users.last_name, users.email, users.username
                FROM image_comments
                LEFT JOIN users
                ON image_comments.owner = users.id
                WHERE image_comments.image_id = ?
                ORDER BY date DESC";

        $query = $this->db->prepare($sql);
        $query->execute(array($image_id));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function insertComment($image_id, $comment, $user){
        $stmt = "INSERT INTO image_comments (owner, content, image_id) VALUES (?,?,?)";
        $status = $this->db->prepare($stmt);
        $status->execute(array($user, $comment, $image_id));
        return $status;

    }

    /**
     * Get single image
     */

    public function getImage($image){
        $sql = "SELECT images.*, users.first_name, users.last_name, users.email, users.username
                FROM images
                LEFT JOIN users
                ON images.owner = users.id
                WHERE images.id=? AND images.deleted = FALSE
                ORDER BY date DESC";

        $query = $this->db->prepare($sql);
        $query->execute(array($image));
        return $query->fetch(PDO::FETCH_OBJ);
    }

    /**
    * Get images for user
    */

    public function getImagesForUser($user){
        $user_query = $this->db->prepare("SELECT id FROM users WHERE username=?");
        $user_query->execute(array($user));
        $usr = $user_query->fetch(PDO::FETCH_COLUMN);

        $stmt = $this->db->prepare("SELECT * FROM images WHERE owner=? AND is_private=FALSE AND deleted=FALSE ORDER BY date DESC");
        $stmt->execute(array($usr));
        return $stmt->fetchAll(PDO::FETCH_OBJ);

    }
}

