/* One component needed for our project is the form for the user to enter the foods they have eaten. 
For this component, we will need a form. Elements of the form include the following:

- Search form for looking up items in database
- Field for manual entry of food
	a.) field for food name
	b.) field for carb count
- Field for input of the serving size
- submission button
- save to database
*/



/*Kingsley Nyaosi
This portion of the code creates the search form 
It is univeral and can be used on any page that we wish to include a search form
Its only role is to create the search form and therefore follows the single principle responsibility */

/*
<html> 
    <head> 
	    <meta  http-equiv="Content-Type" content="text/html;  charset=iso-8859-1"> 
	    <title>Search  Food</title> 
    </head> 
	  <p>
    <body> 
	    <h3>Search for common foods</h3> 
	    <p>You  may search by Food type</p> 
	    <form  method="post" action="search.php?go"  id="searchform"> 
	      <input  type="text" name="name"> 
	      <input  type="submit" name="submit" value="Search"> 
	    </form> 
    </body> 
</html> 

*/


/* Tiffany Connors
This portion of code saves the form data to the database.
This follows the single principle responsibility because it has only one reason to change. The only reason for changes to be made to this section is if additional user input fields are added. */

<?php
$connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server 
$db = mysql_select_db("host", $connection); // Selecting Database from Server  (need to update with actual server & database info)
if(isset($_POST['submit'])){ // Fetching variables of the form 
$date = $_POST['date'];
$food = $_POST['food'];
$caloriesPerServing = $_POST['calories'];
$servingSize = $_POST['serving'];

if($date !=''|| $food !=''|| $caloriesPerServing !=''|| $servingSize !=''){
//Insert Query of SQL
$query = mysql_query("insert into users(date, food, calories, serving)values ('$date', '$food', '$caloriesPerServing', '$servingSize')");
echo "<br/><br/><span>Data Inserted successfully...!!</span>";
}
else{
echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
}
}
mysql_close($connection); // Closing Connection with Server
?>
