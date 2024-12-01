<?php

class Course {
    private $id;
    private $title;
    private $description;
    private $image_preview;

    private $category_id;
    private $created_at;
    private $updated_at;

    // Constructor to initialize the course object
    public function __construct($id = null, $title = '', $description = '',$image_preview = '', $category_id = null, $created_at = '', $updated_at = '') {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->image_preview = $image_preview;
        $this->category_id = $category_id;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    // Getters and Setters
    public function getId() {
        return $this->id;
    }

    public function gettitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    
    public function getImagePreview() {
        return $this->image_preview;
    }

    public function getCategoryId() {
        return $this->category_id;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function getUpdatedAt() {
        return $this->updated_at;
    }

    // Method to save a course to the database
    public function save($mysqli) {
        if ($this->id) {
            // Update existing course
            $stmt = $mysqli->prepare("UPDATE courses SET title = ?, description = ?, image_preview= ? , category_id = ? WHERE id = ?");
            $stmt->bind_param('ssii', $this->title, $this->description,$this->image_preview, $this->category_id, $this->id);
        } else {
            // Insert new course
            $stmt = $mysqli->prepare("INSERT INTO courses (title, description,image_preview, category_id) VALUES (?, ?, ?)");
            $stmt->bind_param('ssi', $this->title, $this->description,$this->image_preview, $this->category_id);
        }

        $stmt->execute();
        $stmt->close();
    }

    // Method to fetch all courses from the database
    public static function all($mysqli) {
        $sql = "SELECT * FROM courses";
        $result = $mysqli->query($sql);

        $courses = [];
        while ($row = $result->fetch_assoc()) {
            $courses[] = new Course($row['id'], $row['title'], $row['description'],$row['image_preview'], $row['category_id'], $row['created_at'], $row['updated_at']);
        }
        return $courses;
    }

    // Method to fetch a specific course by ID
    public static function find($mysqli, $id) {
        $stmt = $mysqli->prepare("SELECT * FROM courses WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $course = null;
        if ($row = $result->fetch_assoc()) {
            $course = new Course($row['id'], $row['title'], $row['description'], $row['image_preview'],$row['category_id'], $row['created_at'], $row['updated_at']);
        }

        $stmt->close();
        return $course;
    }
}
