<?php

const TASKS_FILE = 'tasks.json';

function saveTasks(array $tasks): void
{
    file_put_contents(TASKS_FILE, json_encode($tasks, JSON_PRETTY_PRINT));
}

function loadTasks(): array
{
    if (!file_exists(TASKS_FILE)) {
        return [];
    }
    $data = file_get_contents(TASKS_FILE);
    return $data ? json_decode($data, true) : [];
}

$tasks = loadTasks();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['task']) && !empty(trim($_POST['task']))) {
        $tasks[] = [
            "task" => htmlspecialchars(trim($_POST['task'])),
            "done" => false
        ];
    } 

    if (isset($_POST['toggle'])) {
        $index = (int)$_POST['toggle'];
        if (isset($tasks[$index])) {
            $tasks[$index]['done'] = !$tasks[$index]['done'];
        }
    }

    if (isset($_POST['delete'])) {
        $index = (int)$_POST['delete'];
        if (isset($tasks[$index])) {
            array_splice($tasks, $index, 1);
        }
    }

    saveTasks($tasks);
    header('Location:' . $_SERVER['PHP_SELF']);
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>To-Do App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.min.css">
    <style>
        body {
            margin-top: 20px;
        }

        .task-card {
            border: 1px solid #ececec;
            padding: 20px;
            border-radius: 5px;
            background: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .task-done {
            text-decoration: line-through;
            color: #888;
        }

        .task-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        button {
            cursor: pointer;
        }

        .task-label {
            display: block;
            width: 100%;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="task-card">
            <h1>To-Do App</h1>

            <form method="POST">
                <div class="row">
                    <div class="column column-75">
                        <input type="text" name="task" placeholder="Enter a new task" required>
                    </div>
                    <div class="column column-25">
                        <button type="submit" class="button-primary">Add Task</button>
                    </div>
                </div>
            </form>

            <h2>Task List</h2>
            <ul style="list-style: none; padding: 0;">
                <?php if (empty($tasks)) : ?>
                    <li>No tasks yet. Add one above</li>
                <?php else : ?>
                    <?php foreach ($tasks as $index => $task) : ?>
                        <li class="task-item">
                            <!-- Task Done -->
                            <form method="POST" style="flex-grow: 1;">
                                <input type="hidden" name="toggle" value="<?= $index ?>">
                                <label class="task-label" onclick="this.closest('form').submit();">
                                    <span class="<?= $task['done'] ? 'task-done' : '' ?>">
                                        <?= 'Task ' . ($index + 1) ?>: <?= $task['task'] ?>
                                    </span>
                                </label>
                            </form>

                            <!-- Delete Button -->
                            <form method="POST">
                                <input type="hidden" name="delete" value="<?= $index ?>">
                                <button type="submit" class="button button-outline" style="margin-left: 10px;">Delete</button>
                            </form>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</body>

</html>