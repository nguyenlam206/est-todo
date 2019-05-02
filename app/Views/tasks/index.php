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
        <h1>Create Task</h1>
        <div id="task" class="col-md-8">
            <form class="form-horizontal" name="task" id="form-task">
                <div class="form-group">
                    <input type="text" class="form-control" id="name" placeholder="Task" name="name" required>
                </div>
                <div class="form-group">
                    <input type="datetime" class="form-control datepicker" id="start_date" name="start_date" placeholder="Starting Date" required>
                </div>
                <div class="form-group">
                    <input type="datetime" class="form-control datepicker" id="end_date" name="end_date" placeholder="Ending Date">
                </div>
                <div class="form-group">
                    <select name="status" id="status" class="form-control">
                        <option value="planning">Planning</option>
                        <option value="doing">Doing</option>
                        <option value="complete">Complete</option>
                    </select>
                </div>
                <div class="form-group">
                    <button id="btn-add" type="button" class="btn btn-primary">Add task</button>
                </div>
            </form>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
    <script src="/js/task.js"></script>

    <script>
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd'
        });

        $('#btn-add').on('click', function (e) {
            create();
        });
    </script>


</body>
</html>