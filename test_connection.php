<?php
require_once 'config/database.php';

try {
    $database = new Database();
    $conn = $database->getConnection();
    
    if ($conn) {
        echo "<div style='color: green; padding: 20px; border: 1px solid green; margin: 20px;'>
                <h2>Database Connection Successful!</h2>
                <p>Connected to database: volunteer_management</p>
              </div>";
        
        $stmt = $conn->query("SHOW TABLES");
        $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
        
        echo "<div style='padding: 20px; border: 1px solid #ccc; margin: 20px;'>
                <h3>Database Tables:</h3>
                <ul>";
        foreach ($tables as $table) {
            echo "<li>" . htmlspecialchars($table) . "</li>";
        }
        echo "</ul></div>";
    }
} catch (PDOException $e) {
    echo "<div style='color: red; padding: 20px; border: 1px solid red; margin: 20px;'>
            <h2>Database Connection Failed!</h2>
            <p>Error: " . $e->getMessage() . "</p>
            <p>Please check:</p>
            <ul>
                <li>XAMPP is running (Apache and MySQL)</li>
                <li>Database 'volunteer_management' exists</li>
                <li>Username and password in config/database.php are correct</li>
            </ul>
          </div>";
}
?> 