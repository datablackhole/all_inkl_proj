<?php

class DatabaseExporter
{
    private $dbObj;

    public function __construct($host, $username, $password, $database)
    {
        $this->dbObj = new Database($host, $username, $password, $database);
    }

    public function containsDDL($sqlString)
    {
        // List of DDL keywords to check
        $ddlKeywords = ['CREATE', 'ALTER', 'DROP', 'TRUNCATE', 'COMMENT', 'RENAME'];

        // Convert the SQL string to uppercase for case-insensitive matching
        $sqlStringUpper = strtoupper($sqlString);

        // Check if any DDL keyword is present in the SQL string
        foreach ($ddlKeywords as $ddlKeyword) {
            if (strpos($sqlStringUpper, $ddlKeyword) !== false) {
                return true;
            }
        }

        return false;
    }

    public function exportCSV($query)
    {
        if ($this->containsDDL($query)) {
            http_response_code(500);
            echo "Internal Server Error: The SQL string contains DDL statements.";
            exit;
        }

        $result = $this->dbObj->getResult($query);

        // Fetch the result set metadata to get column names
        $columns = [];
        while ($columnInfo = $result->fetch_field()) {
            $columns[] = $columnInfo->name;
        }

        // Fetch all the data
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        // Close the MySQL connection
        $this->dbObj->closeConnection();

        // Create CSV content
        $csvContent = implode(',', $columns) . "\n";
        foreach ($data as $row) {
            $csvContent .= implode(',', $row) . "\n";
        }

        // Set the content type to CSV
        // header('Content-Type: application/html');
        // header('Content-Disposition: attachment; filename="export.csv"');

        // Output the CSV content
        echo $csvContent;
    }
}

// Usage
require 'DB.php';

$host = $_POST["host"];
$database = $_POST["database"];
$username = $_POST["username"];
$password = $_POST["password"];

$query = $_POST["sql"];

$exporter = new DatabaseExporter($host, $username, $password, $database);
$exporter->exportCSV($query);

?>
