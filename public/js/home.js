
/**
 * Load tasks into calendar
 * 
 * @param array data 
 */
function loadCalendar(data) {
    for(var index in data) {
        data[index]['title'] = data[index]['name'];
        data[index]['start'] = data[index]['start_date'];
        data[index]['end'] = data[index]['end_date'];
        data[index]['backgroundColor'] = getBackgoundColor(data[index]['status']);
    }

    $('#calendar').fullCalendar('removeEvents');
    $('#calendar').fullCalendar('addEventSource', data);
    $('#calendar').fullCalendar('rerenderEvents');

}

/**
 * Add color for task in calendar
 * 
 * @param string status 
 */
function getBackgoundColor(status) {
    if (status == 'doing') {
        return "#ffbe76";
    }

    if (status == 'complete') {
        return "#badc58";
    }
    
    return "";
}