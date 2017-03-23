# Tutorial PHP and mysqli
```PHP

<?php

// Connect.
$db = new mysqli('localhost', 'user', 'pass', 'mydatabase');

// Routine on connection fail.
if ($db->connect_errno > 0) {
	die('Unable to connect to the database ['. $db->connect_error .']');
}

// Fetch latest 3 table entries.
$sql = "SELECT id FROM table ORDER BY id DESC LIMIT 3 WHERE 'published' = 1";
$result = $db->query($sql);

// Routine on query fail.
if (!$result) {
	die('There was an error running the query [' . $db->error . ']');
}

// Display row titles.
while($row = $result->fetch_assoc()) {
	echo $row['title'] . '<br/>';
}

// Display total results.
echo 'Total results: ' . $result->num_rows;

// Free system resources.
$result->free();

// Close connection.
$db->close();

```