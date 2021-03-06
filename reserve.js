var dateErrorMessage = "";
var timeErrorMessage = "";
var durationErrorMessage = "";
var year;
var month;
var day;
var hour;
var minute;
var duration;
var endhour;
var endminute;
function isInteger(numstr) {
	var n = ~~Number(numstr);
	return ~~Number(numstr) == Number(numstr) && n >= 0;
}

function isValidDate(dateString)
{
    // Parse the date parts to integers
    var parts = dateString.split("-");
	if(parts.length != 3) {
		dateErrorMessage = "Please write date in YYYY-MM-DD format.";
		return false;
	}
    year = parts[0];
    month = parts[1];
    day = parts[2];
	if(year.length != 4 || month.length != 2 || day.length != 2){
		dateErrorMessage = "Please write date in YYYY-MM-DD format.";
		return false;
	}
	if(!(isInteger(year) && isInteger(month) && isInteger(day))){
		dateErrorMessage = "Invalid date.";
		return false;
	}
	year = parseInt(year);
	month = parseInt(month);
	day = parseInt(day);
    // Check the ranges of month and year
    if(year < 1000 || year > 3000 || month == 0 || month > 12){
		dateErrorMessage = "Invalid date.";
        return false;
	}

    var monthLength = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];

    // Adjust for leap years
    if(year % 400 == 0 || (year % 100 != 0 && year % 4 == 0)){
        monthLength[1] = 29;
	}
    // Check the range of the day
    if(!(day > 0 && day <= monthLength[month - 1])){
		dateErrorMessage = "Invalid date.";
		return false;
	}
	
	return true;
};
function isValidTime(timeString){
	var parts = timeString.split(":");
	if(parts.length != 2){
		timeErrorMessage = "Please write time in HH:MM format.";
		return false;
	}
	hour = parts[0];
	minute = parts[1];
	if(hour.length != 2 || minute.length != 2){
		timeErrorMessage = "Please write time in HH:MM format.";
		return false;
	}
	if(!(isInteger(hour) && isInteger(minute))){
		timeErrorMessage = "Invalid time.";
		return false;
	}
	hour = parseInt(hour);
	minute = parseInt(minute);
	
	if(!(hour >= 0 && hour < 24 && minute >= 0 && minute < 60)){
		timeErrorMessage = "Invalid time.";
		return false;
	}
	return true;
}
function isValidDuration(durationString){
	var parts = durationString.split(":");
	if(parts.length != 2){
		timeErrorMessage = "Please write time in HH:MM format.";
		return false;
	}
	endhour = parts[0];
	endminute = parts[1];
	if(endhour.length != 2 || endminute.length != 2){
		timeErrorMessage = "Please write time in HH:MM format.";
		return false;
	}
	if(!(isInteger(endhour) && isInteger(endminute))){
		timeErrorMessage = "Invalid time.";
		return false;
	}
	endhour = parseInt(endhour);
	endminute = parseInt(endminute);
	
	if(!(endhour >= 0 && endhour < 24 && endminute >= 0 && endminute < 60)){
		timeErrorMessage = "Invalid time.";
		return false;
	}
	return true;
}

function verify() {
	var date = document.getElementById("date");
	var start = document.getElementById("start");
	var duration = document.getElementById("duration");
	var datevalid = isValidDate(date.value);
	var timevalid = isValidTime(start.value);
	var durationvalid = isValidDuration(duration.value);
	if(!datevalid){
		document.getElementById("datel").style.display = "block";
		document.getElementById("datee").style.display = "block";
		document.getElementById("datee").innerHTML = dateErrorMessage;
	} else {
		document.getElementById("datel").style.display = "none";
		document.getElementById("datee").style.display = "none";
	}
	if(!timevalid){
		document.getElementById("startl").style.display = "block";
		document.getElementById("starte").style.display = "block";
		document.getElementById("starte").innerHTML = timeErrorMessage;
	} else {
		document.getElementById("startl").style.display = "none";
		document.getElementById("starte").style.display = "none";
	}
	if(!durationvalid){
		document.getElementById("durationl").style.display = "block";
		document.getElementById("duratione").style.display = "block";
		document.getElementById("duratione").innerHTML = durationErrorMessage;
	} else {
		document.getElementById("durationl").style.display = "none";
		document.getElementById("duratione").style.display = "none";
	}
	
	if(timevalid && durationvalid){
		var hours = endhour - hour;
		var minutes = endminute - minute;
		var duration = 60*hours + minutes;
		if(endhour < hour){
			document.getElementById("durationl").style.display = "block";
			document.getElementById("duratione").style.display = "block";
			document.getElementById("duratione").innerHTML = "End time cannot be earlier than start.";
			durationvalid = false;
		} else if(endhour == hour && endminute < minute){
			document.getElementById("durationl").style.display = "block";
			document.getElementById("duratione").style.display = "block";
			document.getElementById("duratione").innerHTML = "End time cannot be earlier than start.";
			durationvalid = false;
		} else if(duration < 30){
			document.getElementById("durationl").style.display = "block";
			document.getElementById("duratione").style.display = "block";
			document.getElementById("duratione").innerHTML = "Duration must be at least 30 minutes.";
			durationvalid = false;
		} else if(duration > 240){
			document.getElementById("durationl").style.display = "block";
			document.getElementById("duratione").style.display = "block";
			document.getElementById("duratione").innerHTML = "Duration cannot be longer than 4 hours.";
			durationvalid = false;
		}
	}

	return datevalid && timevalid && durationvalid;
}