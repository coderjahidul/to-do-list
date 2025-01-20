<?php
include_once 'templates/header.php';
// Check if the task ID is provided
if(!isset($_GET['id']) || empty($_GET['id'])){
    die("Task ID is Required.");
}
$taskId = $_GET['id'];

// Initialize Category Objects
$taskObj = new Task();
$categoryObj = new Category();

// Fetch the task details
$task = $taskObj->getTaskById($taskId);
if(!$task){
    die("Task not found.");
}

// Fetch all Categories
$categories = $categoryObj->getAllCategories();

?>
<header>
    <h1>Edit Task</h1>
</header>
<main>
    <section class="edit-task">
        <h2>Update Task Details</h2>
        <?php if (isset($error)): ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>

            <form action="update_task.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                <label for="title">Task Title:</label>
                <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($task['title']); ?>" required>

                <label for="description">Description:</label>
                <textarea id="description" name="description"><?php echo htmlspecialchars($task['description']); ?></textarea>

                <label for="category">Category:</label>
                <select id="category" name="category_id">
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category['id']; ?>" <?php echo ($task['category_id'] == $category['id']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($category['name']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <button type="submit">Update Task</button>
            </form>
    </section>
</main>
<?php 
include_once 'templates/footer.php';
?>