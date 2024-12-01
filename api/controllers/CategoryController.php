<?php

require 'models/CategoryModel.php';

class CategoryController {
    public function getAllCategories() {
        $model = new CategoryModel();
        $categories = $model->fetchAll();
        echo json_encode($categories);
    }

    public function getCategoryById($id) {
        $model = new CategoryModel();
        $category = $model->fetchById($id);
        if ($category) {
            echo json_encode($category);
        } else {
            http_response_code(404);
            echo json_encode(["error" => "Category not found"]);
        }
    }
}
