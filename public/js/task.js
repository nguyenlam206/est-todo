/**
 * Get data from form
 */
function getFormData() {
    let data = {};
    $.each($('#form-task').serializeArray(), function(i, field) {
        data[field.name] = field.value;
    });

    return data;

}

/**
 * Validate input
 * 
 * @param Array data 
 */
function validate(data) {
    return data.name && data.start_date && data.end_date && data.status;
}

function create() {
    data = getFormData();

    if(validate(data)){
        $.ajax({
            url: "/task/create",
            method: "POST",
            data: data
        }).done(function(data) {
            window.location.href = '/';
        }).fail(function(data){
            alert("Cannot create!");
        });
    } else {
        alert("All fields are required");
    }
}

/**
 * Load detail Task
 */
function loadDetail(event) {
    window.location.href = "task/detail/" + event.id;
}

/**
 * Update task
 */
function update(id) {
    data = getFormData();

    if(validate(data)){
        $.ajax({
            url: "/task/update/" + id,
            method: "POST",
            data: data
        }).done(function(data) {
            window.location.href = '/';
        }).fail(function(data){
            alert("Cannot update!");
        });
    } else {
        alert("All fields are required");
    }
}

/**
 * Delete task
 */
function deleteTask(id) {
    $.ajax({
        url: "/task/delete/" + id,
        method: "DELETE"
    }).done(function(data) {
        window.location.href = '/';
    }).fail(function(data){
        alert("Cannot Delete!");
    });
}

function setOption(selectElement, value) {
    var options = selectElement.options;
    for (var i = 0, optionsLength = options.length; i < optionsLength; i++) {
      if (options[i].value == value) {
          selectElement.selectedIndex = i;
          return true;
      }
    }
    return false;
  }

