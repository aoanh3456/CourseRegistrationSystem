<?php
	include 'DBConnection.php';
	
	$search=$_GET["q"];
	$query="";
	$query="SELECT concat(idCourses, '+', case when CourseCode1='' then CourseCode2 else CourseCode1 end, '-', CoursesName) as CourseName
		 FROM courses where idCourses like '%$search%' or CourseCode1 like '%$search%' or CourseCode2 like '%$search%' or CoursesName like '%$search%'";
	$courses = mysqli_query($conn, $query);
	
	$ajax="";
	while ($row=mysqli_fetch_array($courses)){
		$ajax = $row["CourseName"];
	}
	
	echo $ajax == "" ? "no suggestion" : $ajax;
?>