function submit(){
	if(validate) document.getElementById("submit_button").click();
}

function validate(){
		var correct = true
		
		if(document.getElementById("course_name").value == "" || document.getElementById("course_name").value == null) correct = false;
		var number = document.getElementById("course_name").value 
		if(number == "" || number == null || isNaN(number) || number < 1000 || number > 9999) correct = false;
		var start = document.getElementById("course_start").value 
		if(start == "" || start == null || isNaN(start) || start < 0 || number > 2359) correct = false;
		var end = document.getElementById("course_start").value 
		if(end == "" || end == null || isNaN(end) || end < 0 || end > 2359) correct = false;
		
		return correct;
}
function show(){
document.getElementById("course_add").style.visibility="visible";
document.getElementById("show_button").style.visibility="hidden";
}
	var counter=0;

function addCourse(){
	
	var parentDiv = document.createElement("div");	//Create the blocks to display a course
	var name = document.createElement("div");
	var code = document.createElement("div");
	var number = document.createElement("div");
	var start = document.createElement("div");
	var duration = document.createElement("div");
	//var insert_after = document.createElement("div");
	
	name.setAttribute("id", "course_name");		//Set the "ID" attributes of the div elements
	code.setAttribute("id", "course_code");
	number.setAttribute("id", "course_number");
	start.setAttribute("id", "course_start");
	duration.setAttribute("id", "course_duration");
	//insert_after.setAttribute("id", "insert_after");
	counter=counter+1;
	parentDiv.setAttribute("id", "course_"+counter);
	
	var form_name = document.getElementById("form_course_name");
	
	name.innerHTML = document.getElementById("form_course_name").value;
	var form_course_code = document.getElementById("form_course_code");
	code.innerHTML = form_course_code.options[form_course_code.selectedIndex].value;
	//code.innerHTML = document.getElementById("form_course_code").value;
	number.innerHTML = document.getElementById("form_course_number").value;
	start.innerHTML = document.getElementById("form_course_start_time").value;
	duration.innerHTML = document.getElementById("form_course_duration").value;
	
	
	var insertCourse = document.getElementById("insert_here");	//Find where to display the course info in the html code
	//insert.setAttribute("id", "course_"+counter);	//change the id of the element found. We are going to place another element with that id after the block with this course
	
	parentDiv.appendChild(name);
	parentDiv.appendChild(code);
	parentDiv.appendChild(number);
	parentDiv.appendChild(start);
	parentDiv.appendChild(duration);
	//parentDiv.appendChild(insert_after);
	//insertParent.insertBefore(insertCourse, parentDiv);
	insertCourse.appendChild(parentDiv);
	
	//document.getElementById("course_name").innerHTML += "Test!";
}
