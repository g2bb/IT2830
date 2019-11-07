var server = "http://ec2-18-219-205-255.us-east-2.compute.amazonaws.com/CS2830/classInfo.php?";

function start(){
    loadCA();
    loadNC();
}

function loadCA() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var xmlDoc = this.responseXML;
            var x = xmlDoc.getElementsByTagName("currentAssignment");
            var name, date;
            for (var i = 0; i<x.length; i++){
                name = x[i].getElementsByTagName("assignmentName")[0].childNodes[0].nodeValue;
                date = x[i].getElementsByTagName("dueDateTimestamp")[0].childNodes[0].nodeValue;
            }
            document.getElementById("CurrentAssignment").innerHTML =
            "The next assignment, " + name + ", is due on " + UnixToDate(date);
        } else {
            document.getElementById("CurrentAssignment").innerHTML = '<img src="spinner.gif" class="loading" alt="Loading Animation">';
        }
    };
    xhttp.open("GET", server + "content=currentAssignment&format=xml", true);
    xhttp.send();
}

function loadNC() {
    document.getElementById("NextClass").innerHTML = '<img src="spinner.gif" class="loading" alt="Loading Animation">';
    $.getJSON(server + "content=nextClassDate&format=json", function(result){
        $.each(result, function(i, date){
                document.getElementById("NextClass").innerHTML = UnixToDate(date);
        });
    });
}

function loadOH(day){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var xmlDoc = this.responseXML;
            var x = xmlDoc.getElementsByTagName("officeHour");
            var name, time, loc, output = "";
            for(var i = 0; i<x.length; i++){
                output += x[i].getElementsByTagName("person")[0].childNodes[0].nodeValue + " has office hours from " + x[i].getElementsByTagName("time")[0].childNodes[0].nodeValue + " at " + x[i].getElementsByTagName("location")[0].childNodes[0].nodeValue + "<br/>";
            }
            document.getElementById("OfficeHours").innerHTML = output;
        } else {
            document.getElementById("OfficeHours").innerHTML = '<img src="spinner.gif" class="loading" alt="Loading Animation">';
        }
    };
    xhttp.open("GET", server + "content=officeHours&format=xml&day=" + day, true);
    xhttp.send();
}

function UnixToDate(unixtimestamp){
    // Months array
    var months_arr = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
    // Convert timestamp to milliseconds
    var date = new Date(unixtimestamp*1000);
    // Year
    var year = date.getFullYear();
    // Month
    var month = months_arr[date.getMonth()];
    // Day
    var day = date.getDate();
    // Hours
    var hours = date.getHours();
    // Minutes
    var minutes = "0" + date.getMinutes();
    // Seconds
    var seconds = "0" + date.getSeconds();
    // Display date time in MM-dd-yyyy h:m:s format
    var convdataTime = month+' '+day+', '+year+' '+hours + ':' + minutes.substr(-2) + ':' + seconds.substr(-2);
    return convdataTime;
}