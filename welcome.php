<?php session_start(); ?>
<?php
if (!isset($_SESSION['username'])) {
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Don't forget daily tasks - To do</title>
    <link rel="stylesheet" href="/vendors/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/welcome.css">
    <link rel="stylesheet" href="/css/fontawesome/css/all.min.css">

</head>

<body class="position-relative">

    <!-- Button trigger modal -->
    <button type="button" id="lauch" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#taskModal"></button>

    <!-- Modal -->
    <div class="modal fade" id="taskModal">
        <div class="modal-dialog modal-center">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">To do</h5>
                    <button type="button" id="taskClose" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" class="row">
                        <div class="my-3">
                            <input type="text" class="form-control" name="modal-task" id="modal-task" placeholder="Task/Todo">
                        </div>
                        <div class="my-3">
                            <select name="modal-priority" id="modal-priority" class="form-select">
                                <option value="Normal" selected>Normal</option>
                                <option value="High">High</option>
                                <option value="Medium">Medium</option>
                                <option value="Low">Low</option>
                            </select>
                        </div>
                        <div class="my-3">
                            <input type="date" class="form-control" name="modal-date" id="modal-date">
                        </div>
                        <div class="my-3">
                            <input type="submit" class="form-control border bg-success text-white" value="Update" name="update" id="update">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <div class="user__details container mt-4">
        <div class="row">
            <div class="col-8"></div>
            <div class="col">
                Welcome, <?php echo $_SESSION['username']; ?>
                <a href="logout.php" class="pl-2 font-weight-bold">Logout</a>
            </div>
        </div>
    </div>
    <div class="container p-3">

        <ul id="myTab" class="nav nav-tabs">
            <li class="nav-item todo__bg-secondary">
                <a href="#tasks" class="nav-link active text-dark" data-bs-toggle="tab" id="tasks-tab">Tasks</a>
            </li>
            <li class="nav-item todo__bg-secondary">
                <a href="#finished" class="nav-link text-dark" data-bs-toggle="tab" id="finished-tasks-tab">Finished Tasks</a>
            </li>
            <li class="nav-item todo__bg-secondary">
                <a href="#recycle" class="nav-link text-dark" data-bs-toggle="tab" id="recycle-bin-tab">Recycle Bin</a>
            </li>
            <li>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="tasks">
                <div class="border  border-top-0">
                    <!-- Add task container -->
                    <div class="container">
                        <div class="row pt-4 pl-1">
                            <div class="col">
                                <h1 class="task__title font-weight-bolder">Add task</h1>
                            </div>
                        </div>
                        <div class="row text-center px-3">
                            <div class="col font-weight-bold todo__bg-secondary p-2">Task</div>
                            <div class="col-2 font-weight-bold todo__bg-secondary p-2">Priority</div>
                            <div class="col font-weight-bold todo__bg-secondary p-2">Due Date</div>
                        </div>
                    </div>

                    <div class="container px-3">
                        <form method="post" class="row" id="task-form">
                            <div class="col">
                                <div class="my-3">
                                    <input type="text" class="form-control" name="task" id="task" placeholder="Task/Todo">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="my-3">
                                    <select name="priority" id="priority" class="form-select">
                                        <option value="Normal" selected>Normal</option>
                                        <option value="High">High</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Low">Low</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="my-3">
                                    <input type="date" class="form-control" name="date" id="date">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="my-3">
                                    <input type="submit" class="form-control border bg-success text-white" value="Add task" name="add" id="add">
                                </div>
                            </div>
                        </form>
                    </div>


                    <!-- Todo container -->
                    <div class="container mt-3">
                        <div class="row pl-1">
                            <div class="col">
                                <h2 class="font-weight-bolder">To do</h2>
                            </div>
                        </div>
                    </div>

                    <!-- Todo lists -->
                    <div class="container">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Priority</th>
                                    <th>Task</th>
                                    <th>Due date</th>
                                    <th>Progress</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="all-tasks"></tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="tab-pane fade" id="finished">
                <div class="container border border-top-0 pt-4">
                    <!-- Todo container -->
                    <div class="container">
                        <div class="row pl-1">
                            <div class="col">
                                <h2 class="font-weight-bolder">Finished tasks</h2>
                            </div>
                        </div>
                    </div>

                    <!-- Todo lists -->
                    <div class="container">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Priority</th>
                                    <th>Task</th>
                                    <th>Due date</th>
                                    <th>Progress</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="finished-tasks">
                                <tr>
                                    <td>High</td>
                                    <td>First task
                                        lore
                                    </td>
                                    <td>today (fri 25 oct)</td>
                                    <td>Progress</td>
                                    <td>
                                        <a href="#" class="text-decoration-none">
                                            <i class="fa fa-trash-alt mx-1 text-danger" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="recycle">
                <div class="container border border-top-0 pt-4">
                    <!-- Todo container -->
                    <div class="container">
                        <div class="row pl-1">
                            <div class="col">
                                <h2 class="font-weight-bolder">Recycle bin</h2>
                            </div>
                        </div>
                    </div>

                    <!-- Todo lists -->
                    <div class="container">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Priority</th>
                                    <th>Task</th>
                                    <th>Due date</th>
                                    <th>Progress</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="recycles"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="/vendors/js/jquery.min.js"></script>
    <script src="/vendors/js/bootstrap.bundle.min.js"></script>

    <script>
        // when click edit button
        let updateId = 0;
        var triggerTabList = [].slice.call(document.querySelectorAll('#myTab a'));
        triggerTabList.forEach(function(triggerEl) {
            var tabTrigger = new bootstrap.Tab(triggerEl);

            triggerEl.addEventListener('click', function(event) {
                event.preventDefault();
                tabTrigger.show();
            })
        });

        var taskModal = new bootstrap.Modal(document.getElementById('taskModal'));

        $('#lauch').click(function() {
            taskModal.toggle();
        });
        $('#taskClose').click(function() {
            taskModal.toggle();
        });
        $('#update').click(function() {
            taskModal.toggle();
        });



        // fetch tasks
        function fetchTasks() {

            $.ajax({
                type: 'GET',
                url: 'includes/fetch.php',
                success: function(data) {
                    $('#all-tasks').html(data);
                },
                error: function(xhr, status, error) {
                    alert('Something wrong when fetch data!');
                }
            });
        }

        //fetch finished tasks
        function fetchFinishedTasks() {
            $.ajax({
                type: 'GET',
                url: 'includes/finished_tasks.php',
                success: function(data) {
                    $('#finished-tasks').html(data);
                },
                error: function(xhr, status, error) {
                    alert('Something wrong when fetch data!');
                }
            });
        }

        //fetch recycles tasks
        function fetchRecycles() {
            $.ajax({
                type: 'GET',
                url: 'includes/recycles.php',
                success: function(data) {
                    $('#recycles').html(data);
                },
                error: function(xhr, status, error) {
                    alert('Something wrong when fetch data!');
                }
            });
        }

        // task update
        function taskUpdate(id) {
            $.ajax({
                type: 'POST',
                url: 'includes/update.php',
                data: {
                    id: id
                },
                success: function(data) {
                    let fetchData = JSON.parse(data);
                    $('#lauch').click();
                    $('#modal-task').val(fetchData['task_name']);
                    $('#modal-priority').val(fetchData['task_priority']);
                    $('#modal-date').val(fetchData['task_due_date']);

                },
                error: function(xhr, status, error) {
                    alert('Something wrong when fetch data!');
                }
            });
        }



        // task progress
        function taskProgress(id, progress) {
            $.ajax({
                type: 'POST',
                url: 'includes/progress.php',
                data: {
                    id: id,
                    progress: progress
                },
                success: function(data) {
                    if (data) {
                        fetchTasks();
                        fetchFinishedTasks();
                    } else {
                        alert('Something wrong in progress!');
                    }

                },
                error: function(xhr, status, error) {
                    alert('Something wrong!');
                }
            });
        }



        $(document).ready(function() {
            // fetch all tasks
            fetchTasks();
            fetchFinishedTasks();
            fetchRecycles();

            $('#add').on('click', function(e) {
                e.preventDefault();

                let task = $('#task').val();
                let priority = $('#priority').val();
                let date = $('#date').val();

                if (!(task == '' || priority == '' || date == '')) {
                    $.ajax({
                        type: 'POST',
                        url: 'includes/add.php',
                        data: {
                            task: task,
                            priority: priority,
                            date: date
                        },
                        success: function(data) {
                            if (data) {
                                document.getElementById('task-form').reset();
                                fetchTasks();
                            } else {
                                alert('Something went wrong!');
                            }

                        },
                        error: function(xhr, status, error) {
                            alert('Something went wrong!');
                        }
                    });
                } else {
                    alert('All filled required!');
                }


            });

            $('#all-tasks').on('click', 'a i.task__progress-icon', function() {
                let taskId = $(this).attr('id');
                if ($(this).is('i.fas.fa-clock')) {
                    $(this).attr('class', 'task__progress-icon fa fa-check-circle mx-1 text-success');
                    taskProgress(taskId, 'Completed');
                } else {
                    $(this).attr('class', 'task__progress-icon fas fa-clock mx-1 text-secondary');
                    taskProgress(taskId, 'In progress');
                }

            });

            $('#all-tasks').on('click', 'a.task__edit', function() {
                let taskId = $(this).attr('id');
                updateId = taskId;
                taskUpdate(taskId);
            });

            $('#update').on('click', function(e) {
                e.preventDefault();
                let task = $('#modal-task').val();
                let priority = $('#modal-priority').val();
                let date = $('#modal-date').val();

                if (!(task == '' || priority == '' || date == '')) {
                    $.ajax({
                        type: 'POST',
                        url: 'includes/update.php',
                        data: {
                            id: updateId,
                            task: task,
                            priority: priority,
                            date: date,
                            update: 'update'
                        },
                        success: function(data) {
                            if (data) {
                                fetchTasks();
                                fetchFinishedTasks();
                            } else {
                                alert('Something went wrong!');
                            }
                        },
                        error: function(xhr, status, error) {
                            alert('Something went wrong!');
                        }
                    });
                } else {
                    alert('All filled required!');
                }
            });

            $('#all-tasks').on('click', 'a.task__trash', function() {
                let taskId = $(this).attr('id');

                $.ajax({
                    type: 'POST',
                    url: 'includes/delete_task.php',
                    data: {
                        id: taskId,
                    },
                    success: function(data) {
                        if (data) {
                            fetchTasks();
                            fetchFinishedTasks();
                            fetchRecycles();
                        } else {
                            alert('Something went wrong!');
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('Something went wrong!');
                    }
                });
            });

            $('#recycles').on('click', 'a.task__delete', function() {
                let recycleId = $(this).attr('id');
                $.ajax({
                    type: 'POST',
                    url: 'includes/delete_recycle.php',
                    data: {
                        id: recycleId,
                    },
                    success: function(data) {
                        if (data) {
                            fetchRecycles();
                        } else {
                            alert('Something wrong in progress!');
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('Something wrong!');
                    }
                });
            });

            $('#recycles').on('click', 'a.task__recycle', function() {
                let recycleId = $(this).attr('id');
                $.ajax({
                    type: 'POST',
                    url: 'includes/restore.php',
                    data: {
                        id: recycleId,
                    },
                    success: function(data) {
                        if (data) {
                            fetchRecycles();
                            fetchTasks();
                            fetchFinishedTasks();
                        } else {
                            alert('Something wrong in progress!');
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('Something wrong!');
                    }
                });
            });

            $('#finished-tasks').on('click', 'a.task__trash', function() {
                let taskId = $(this).attr('id');
                $.ajax({
                    type: 'POST',
                    url: 'includes/delete_task.php',
                    data: {
                        id: taskId,
                    },
                    success: function(data) {
                        if (data) {
                            fetchTasks();
                            fetchFinishedTasks();
                            fetchRecycles();
                        } else {
                            alert('Something went wrong!');
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('Something went wrong!');
                    }
                });
            });

        });
    </script>

</body>

</html>