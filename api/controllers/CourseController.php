<?php

class CourseController {
    private $mysqli;

    public function __construct($mysqli) {
        $this->mysqli = $mysqli;
    }

    // Method to list all courses
    public function index() {
        $courses = Course::all($this->mysqli);
        include 'views/courses/index.php'; // Assuming you have a view to display the courses
    }

    // Method to show the form for creating a new course
    public function create() {
        include 'views/courses/create.php'; // View for course creation form
    }

    // Method to store a new course in the database
    public function store() {
        $name = $_POST['title'];
        $description = $_POST['description'];
        $category_id = $_POST['category_id'];
        $image_preview = $_POST['image_preview'];


        $course = new Course(null, $title, $description,$image_preview, $category_id);
        $course->save($this->mysqli);

        header('Location: /courses'); // Redirect to courses list page
    }

    // Method to show the form for editing a course
    public function edit($id) {
        $course = Course::find($this->mysqli, $id);
        if ($course) {
            include 'views/courses/edit.php'; // View for editing course
        } else {
            echo "Course not found.";
        }
    }

    // Method to update an existing course in the database
    public function update($id) {
        $name = $_POST['title'];
        $description = $_POST['description'];
        $category_id = $_POST['category_id'];
        $image_preview = $_POST['image_preview'];


        $course = new Course($id, $name, $description,$image_preview, $category_id);
        $course->save($this->mysqli);

        header('Location: /courses'); // Redirect to courses list page
    }

    // Method to delete a course
    public function destroy($id) {
        $stmt = $this->mysqli->prepare("DELETE FROM courses WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->close();

        header('Location: /courses'); // Redirect to courses list page
    }
}
