<?php
// Load database credentials
require_once '../config.php';

try {
    // Establish database connection
    $pdo = new PDO("mysql:host=$host;dbname=$db;port=$port", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    // Fetch migration files
    $migrationPath = __DIR__ . '/database/migrations/migrate';
    $migrationFiles = glob($migrationPath . '/database/migrations/*.sql');

    foreach ($migrationFiles as $file) {
        echo "Running migration: $file\n";
        $sql = file_get_contents($file);
        $pdo->exec($sql);
    }

    echo "All migrations executed successfully.\n";
} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}
