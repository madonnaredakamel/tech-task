<?php

class CategoryModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=db.cc.localhost;dbname=course_catalog', 'username', 'password');
    }

    public function fetchAll() {
        $stmt = $this->db->prepare("SELECT * FROM categories");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchById($id) {
        $stmt = $this->db->prepare("SELECT * FROM categories WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
