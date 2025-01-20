<?php 
    require_once 'templates/header.php';
?>
    <header>
        <h1>To-Do List App</h1>
    </header>

    <main>
        <!-- Task List Section -->
        <section class="task-list">
            <h2>Your Tasks</h2>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- PHP Loop to display tasks -->
                    <?php
                        $taskObj = new Task();
                        $tasks = $taskObj->getAllTasks();
                        foreach($tasks as $index => $task){
                            echo "<tr>
                                <td>" . $index + 1 . "</td>
                                <td>{$task['title']}</td>
                                <td>{$task['description']}</td>
                                <td>{$task['category_name']}</td>
                                <td>
                                    <a href='edit_task.php?id={$task['id']}'>Edit</a> |
                                    <a href='delete_task.php?id={$task['id']}' onclick='return confirm(\"Are You Sure?\")'>Delete</a>
                                </td>
                            </tr>";
                        }
                    ?>
                </tbody>
            </table>
        </section>

        <!-- Add Task Section -->
        <section class="add-task">
            <h2>Add New Task</h2>
            <form action="add_task.php" method="POST">
                <label for="title">Task Title:</label>
                <input type="text" id="title" name="title" required>

                <label for="description">Description:</label>
                <textarea id="description" name="description"></textarea>

                <label for="category">Category:</label>
                <select id="category" name="category_id">
                    <!-- PHP Loop to display categories -->
                    <option value="">Select Category</option>
                    <?php
                    $categoryObj = new Category();
                    $categories = $categoryObj->getAllCategories();
                    foreach ($categories as $category){
                        echo "<option value='{$category['id']}'>{$category['name']}</option>";
                    }
                    ?>
                </select>

                <button type="submit">Add Task</button>
            </form>
        </section>

        <!-- Add Category Section -->
        <section class="add-category">
            <h2>Add New Category</h2>
            <form action="add_category.php" method="POST">
                <label for="category-name">Category Name:</label>
                <input type="text" id="category-name" name="name" required>
                <button type="submit">Add Category</button>
            </form>
        </section>
    </main>

<?php include_once 'templates/footer.php';?>