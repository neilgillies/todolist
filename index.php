<?php
include 'db.php';

// Add a new task
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['task'])) {
    $task = $_POST['task'];
    $sql = "INSERT INTO tasks (task) VALUES ('$task')";
    $conn->query($sql);
}

// Delete a task
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM tasks WHERE id=$id";
    $conn->query($sql);
}

$result = $conn->query("SELECT * FROM tasks");
?>

<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
</head>
<body>
    <h1>To-Do List</h1>
    <form method="POST" action="">
        <input type="text" name="task" required>
        <button type="submit">Add Task</button>
    </form>
    <ul>
        <?php while ($row = $result->fetch_assoc()): ?>
            <li>
                <?php echo $row['task']; ?>
                <a href="?delete=<?php echo $row['id']; ?>">Delete</a>
            </li>
        <?php endwhile; ?>
    </ul>
</body>
</html>
