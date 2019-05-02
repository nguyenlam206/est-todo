<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css">
    <link rel="stylesheet" media='print' href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.print.css">

</head>
<body>
    <div class="container">
        <h1>Detail Task</h1>
        <div id="task" class="col-md-8">
            <form class="form-horizontal" name="task" id="form-task">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="name">Name:</label>
                    <div class="col-sm-10">          
                        <input type="text" class="form-control" id="name" placeholder="Task" name="name" value="<?php echo $task['name']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="start_date">Start Date:</label>
                    <div class="col-sm-10">          
                        <input type="datetime" class="form-control datepicker" id="start_date" placeholder="Start Date" name="start_date" value="<?php echo $task['start_date']; ?>">
                    </div>
                </div><div class="form-group">
                    <label class="control-label col-sm-2" for="start_date">End Date:</label>
                    <div class="col-sm-10">          
                        <input type="datetime" class="form-control datepicker" id="end_date" placeholder="End Date" name="end_date" value="<?php echo $task['end_date']; ?>">
                    </div>
                </div>
                    <div class="form-group"><label class="control-label col-sm-2" for="status">Status:</label>
                    <div class="col-sm-10">
                        <select name="status" id="status" class="form-control">
                            <option value="planning">Planning</option>
                            <option value="doing">Doing</option>
                            <option value="complete">Complete</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <button id="btn-update" type="button" class="btn btn-warning">Update</button>
                    <button id="btn-delete" type="button" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
    <script src="/js/task.js"></script>

    <script>
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd'
        });

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: []
        });

        setOption(
            document.querySelector("select[name='status']"),
            "<?php echo $task['status']; ?>"
        );

        $('#btn-update').on('click', function (e) {
            update(<?php echo $task['id'] ?>);
        });

        $('#btn-delete').on('click', function (e) {
            deleteTask(<?php echo $task['id'] ?>);
        });
    </script>


</body>
</html>