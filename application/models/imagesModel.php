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
        $sql = "SELECT images.*, users.first_name, users.last_name, users.email
                FROM images
                LEFT JOIN users
                ON images.owner = users.id
                ORDER BY date DESC";

        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Get single image
     */

    public function getImage($image){
        $sql = "SELECT images.*, users.first_name, users.last_name, users.email
                FROM images
                LEFT JOIN users
                ON images.owner = users.id
                WHERE images.id=?
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

        $stmt = $this->db->prepare("SELECT * FROM images WHERE owner=?");
        $stmt->execute(array($usr));
        return $stmt->fetch(PDO::FETCH_OBJ);

    }
}

