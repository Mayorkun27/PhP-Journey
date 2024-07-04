<?php

// CREATE AN ARRAY TO TELL US ABOUT SOMEONE YOU DON"T KNOW OR KNOW

$aboutRoseline = array(
    "fName" => "Bamigboye",
    "sName" => "Roseline",
    "occupStatus" => array("Student", "Web Developer", "Housing Agent"),
    "dept" => "Computer Science",
    "places" => array("LAUTECH", "BuggyBillions", "Adenike"),
    "mNo" => 203764,
    "mStatus" => "Dating",
    "spouseName" => "Classified",
    "Level" => 400,
    "CGPA" => 1.20,
    "title" => "Create an array to tell everyone about someone you don't know or know"
);
$break = "<br>";

echo("The title of the assignment was to"." ". $aboutRoseline["title"].$break."I will be talking about someone I don't know (Just fiction)".$break."Her name is ".$aboutRoseline["fName"]." ".$aboutRoseline["sName"].".".$break."She is a ".$aboutRoseline["Level"]." level ".$aboutRoseline["occupStatus"][0]." currently studying ".$aboutRoseline["dept"]." at ".$aboutRoseline["places"][0]." with the Matric Number of ".$aboutRoseline["mNo"]." and a CGPA of ".$aboutRoseline["CGPA"]." also a ".$aboutRoseline["occupStatus"][1]." at ".$aboutRoseline["places"][1]." and formerly an ".$aboutRoseline["occupStatus"][2]." who stays at ".$aboutRoseline["places"][2]);
?>