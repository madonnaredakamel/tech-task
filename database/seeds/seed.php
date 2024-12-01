<?php
// /database/seeds/seed.php

require_once '/../../config.php';

// Read the categories.json file
$CategoriesFile = '../../data/categories.json';
if (!file_exists($CategoriesFile)) {
    die("Mock data file does not exist.");
}

$categorydata = json_decode(file_get_contents($CategoriesFile), true);
if ($categorydata === null) {
    die("Invalid JSON format.");
}

// Prepare the SQL statement for inserting mock data
$sql = 'INSERT INTO categories (id, name, parent_id) VALUES (?, ?, ?)';
$stmt = $mysqli->prepare($sql);

// Now bind the actual variables

// Loop through the mock data and insert it into the categories table
foreach ($categorydata as $category) {
   
    $stmt->bind_param('iss', $category['id'], $category['name'], $category['parent_id']);
    $stmt->execute();
    // Execute the statement
    if ($stmt->execute()) {
        echo "Inserted category: " . $category['name'] . "\n";
    } else {
        echo "Failed to insert category: " . $category['name'] . "\n";
    }
}


$CoursesFile = '../../data/course_list.json';
if (!file_exists($CoursesFile)) {
    die("Mock data file does not exist.");
}

$coursedata = json_decode(file_get_contents($CoursesFile), true);
if ($coursedata === null) {
    die("Invalid JSON format.");
}

// Prepare the SQL statement for inserting mock data
$sql = 'INSERT INTO courses (id, title, description, image_preview , category_id) VALUES (?, ?, ?,?,?)';
$stmt = $mysqli->prepare($sql);

// Now bind the actual variables

// Loop through the mock data and insert it into the courses table
foreach ($coursedata as $course) {
   
    $stmt->bind_param('iss', $course['id'], $course['title'],$course['description'],$course['image_preview'], $course['category_id']);
    $stmt->execute();
    // Execute the statement
    if ($stmt->execute()) {
        echo "Inserted course: " . $course['name'] . "\n";
    } else {
        echo "Failed to insert course: " . $course['name'] . "\n";
    }
}


?>
