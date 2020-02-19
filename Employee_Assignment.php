<!DOCTYPE html>

<?php include "../inc/dbinfo.inc";?>
<?php include "/var/www/html/session.php";?>

<?php
/* Check whether the table exists and, if not, create it. */
function VerifyEmployeesTable($connection, $dbName) {
  if(!TableExists("employee", $connection, $dbName)) 
  { 
     $query = "CREATE TABLE `employee` (
         `ID` int(11) NOT NULL AUTO_INCREMENT,
         `Name` varchar(45) DEFAULT NULL,
         `Address` varchar(90) DEFAULT NULL,
         PRIMARY KEY (`ID`),
         UNIQUE KEY `ID_UNIQUE` (`ID`)
       ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1";

     if(!mysqli_query($connection, $query)) echo("<p>Error creating table.</p>");
  }
}

/* Check for the existence of a table. */
function TableExists($tableName, $connection, $dbName) {
  $t = mysqli_real_escape_string($connection, $tableName);
  $d = mysqli_real_escape_string($connection, $dbName);

  $checktable = mysqli_query($connection, 
      "SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_NAME = '$t' AND TABLE_SCHEMA = '$d'");

  if(mysqli_num_rows($checktable) > 0) return true;

  return false;
}

?>
                
</center>

<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ERP</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Icons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="css/Theme.min.css">
    <!-- Skins -->
    <link rel="stylesheet" href="css/_all-skins.min.css">


  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini-->
          <span class="logo-mini"><b>D</b>IR</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Design It Right</b></span>
        </a>
        <!-- Header Navbar (styles can be found in header.less) -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages (style can be found in dropdown.less) -->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">0</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 0 messages</li>
                  <li>
                    <!-- inner menu-->
                    <ul class="menu">

                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
              <!-- Notifications ( style can be found in dropdown.less ) -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">0</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 0 notifications</li>
                  <li>
                    <!-- inner menu -->
                    <ul class="menu">

                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              <!-- User Account (style can be found in dropdown.less) -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="img/sandu.png" class="user-image" alt="User Image">
                  <span class="hidden-xs">Mr. Massarwi</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="sign_out.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar ( style can be found in sidebar.less )-->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="img/sandu.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Mr. Massarwi</p>
            </div>
          </div>
          <!-- sidebar menu(style can be found in sidebar.less) -->
          <ul class="sidebar-menu">
            <li class="treeview">
              <a href="#">
                <i class="fa fa-male"></i> <span>Employees</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Details</a></li>
                <li><a href="Pages/aysam.html"><i class="fa fa-circle-o"></i> Assign Employees</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-truck"></i> <span>Inventory</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Details</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Orders</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-building"></i> <span>Projects</span>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-automobile"></i> <span>Vehicles</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Details</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Fuel Prediction</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-book"></i> <span>Financal Data</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Income/Outcome</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Statistics</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar"></i> <span>Calendar</span>
              </a>
            </li>
	    <li class="treeview">
              <a href="rawi_dist.php">
                <i class="fa fa-merhak"></i> <span>Rawi l3'aleee</span>
              </a>
            </li>			
		

              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                    <li>
                      <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
                      <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">



<!-- h1 ll coordinates wl maps -->
<h1>
<html>
<head>
</head>
<body>

<form method="post" action='aysam_test.php'>
  <p>hon el city</p>
  <textarea name='address' placeholder='Street name,City state,Country'></textarea>
  <input type="submit" name="submit_address" value="Get Coordinates">
</form>

</body>
</html>
</h1>

<!-- h3 to view el table -->
<h3>
<html>
<center>
<body>
<?php

  /* Connect to MySQL and select the database. */
  $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

  $database = mysqli_select_db($connection, DB_DATABASE);

  /* Ensure that the Employees table exists. */
  VerifyEmployeesTable($connection, DB_DATABASE); 
?>


<!-- Display table data. -->
<table border="1" cellpadding="2" cellspacing="2">
<tr>
<td>ID</td>
<td>Name</td>
<td>LastName</td>
<td>Gender</td>
<td>Age</td>
<td>City</td>
<td>Rank</td>
<td>Salary</td>
<td>PhoneNumber</td>
<td>AdditionalInfo</td>
</tr>
<?php
$result = mysqli_query($connection, "select * from employee  ;"); 
while($query_data = mysqli_fetch_row($result)) {
echo "<tr>";
echo "<td>",$query_data[0], "</td>",
"<td>",$query_data[1], "</td>",
"<td>",$query_data[2], "</td>",
"<td>",$query_data[3], "</td>",
"<td>",$query_data[4], "</td>",
"<td>",$query_data[5], "</td>",
"<td>",$query_data[6], "</td>",
"<td>",$query_data[7], "</td>",
"<td>",$query_data[8], "</td>",
"<td>",$query_data[9], "</td>";
   
echo "</tr>";
}
?>
</table>

</body>
</html>
</h3>
      
<h4>
<?php include "/var/www/html/distance.php";?>
<?php include "/var/www/html/get_data.php";?>

<?php
function getCoordinates($address){
 
$address = str_replace(" ", "+", $address); // replace all the white space with "+" sign to match with google search pattern
 
$url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=$address";
 
$response = file_get_contents($url);
 
$json = json_decode($response,TRUE); //generate array object from the response from the web
 
return ($json['results'][0]['geometry']['location']['lat'].",".$json['results'][0]['geometry']['location']['lng']);
 
}
?>

<?php
function getLatLong($address){
    if (!is_string($address))die("All Addresses must be passed as a string");
    $_url = sprintf('http://maps.google.com/maps?output=js&q=%s',rawurlencode($address));
    $_result = false;
    if($_result = file_get_contents($_url)) {
        if(strpos($_result,'errortips') > 1 || strpos($_result,'Did you mean:') !== false) return false;
        preg_match('!center:\s*{lat:\s*(-?\d+\.\d+),lng:\s*(-?\d+\.\d+)}!U', $_result, $_match);
        $_coords['lat'] = $_match[1];
        $_coords['long'] = $_match[2];
    }
    return $_coords;
}
?>

<?php 
$result_emp = mysqli_query($connection, "SELECT * FROM employee"); 
$num_rows_emp = mysqli_num_rows($result_emp); // how many emps
$result_pro = mysqli_query($connection, "SELECT * FROM projects  order by Start_time");  
$used_employees=array(); // holds the used emps
$multi_array=array();

echo nl2br("\n<div style ='font:21px/21px Arial,tahoma,sans-serif;color:#ff0000'> $num_rows_emp Employees are available </div>");

while($query_data_pro = mysqli_fetch_row($result_pro)) {
array_push($multi_array,[$query_data_pro[0]]); //add the id as array
echo nl2br("\n --------------------------------------------------------------------------------------------------------------------------");
echo nl2br("\n project number - $query_data_pro[0]");
$coordinates_pro=array();

$sql_pro = mysqli_query($connection, "SELECT * FROM Cities WHERE CityName='$query_data_pro[2]'");
$row_pro = mysqli_fetch_row($sql_pro );
$coordinates_pro[0]=$row_pro[1];
$coordinates_pro[1]=$row_pro[2];

echo nl2br("\n project cooooor $coordinates_pro[0],-$coordinates_pro[1]");
$result_emp->data_seek(0);
$pro_emp_dist=array();//holds the distance between all the emps to a project
$employee_names=array(); //holds the names of the emps
$employee_ids=array(); //holds the ids of the emps
$employee_ranks=array(); //holds the ranks of the emps
$rank1_flag=FALSE;
$rank2_flag=FALSE; // to add the last rank 2

while($query_data_emp = mysqli_fetch_row($result_emp)) {

if (in_array("$query_data_emp[0]", $used_employees)) {
    continue;
}
$sql_emp = mysqli_query($connection, "SELECT * FROM Cities WHERE CityName='$query_data_emp[5]'");
$row_emp = mysqli_fetch_row($sql_emp );
$coordinates_emp[0]=$row_emp[1];
$coordinates_emp[1]=$row_emp[2];

echo nl2br("\n $query_data_emp[1] cooooor $coordinates_emp[0],-$coordinates_emp[1]");

// do these lines only if the employee flag is true (wasnt used before)

$_dist=distance($coordinates_pro[0],-$coordinates_pro[1],$coordinates_emp[0],-$coordinates_emp[1],'M');
array_push($employee_names,"$query_data_emp[1] $query_data_emp[2]");
array_push($pro_emp_dist,$_dist);
array_push($employee_ids,$query_data_emp[0]); 
array_push($employee_ranks,$query_data_emp[6]); 

$coordinates_emp=array();
} // closes the second while - employees loop

	$len = count($pro_emp_dist);

	for($i=0;$i<$len;$i++){
	   echo nl2br("\n the distance is : $pro_emp_dist[$i] , $employee_names[$i]");
	}

$pro_emp_allocate=array(); // employees attached to this project (names)
$rank1_name=null; //holds the rank 1 name
$rank1_id=null; //same for id
$rank2_name=null; //used to add the last rank 2
$rank2_id=null; //used to add the last rank 2
$pro_min=$query_data_pro[4];

echo nl2br("\n -------------------------------------------------------------");
$len3=count($pro_emp_allocate);


echo nl2br("\n<div style ='font:11px/21px Arial,tahoma,sans-serif;color:#ff0000'> Filling employees... </div>");

while($len3<$pro_min-1) //fill the project with rank 2 employees (min - 1)
{
//check if there still available emps, if not break out of the while	
$used_len = count($used_employees);
if($num_rows_emp<=$used_len)
{echo nl2br("\n<div style ='font:11px/21px Arial,tahoma,sans-serif;color:#ff00b6'> There is a lack of employees. </div>");
break; 
}

$index = array_search(min($pro_emp_dist), $pro_emp_dist);
$len3=count($pro_emp_allocate);
	if($len3>=$pro_min-1)
	{
	  break;
	}
	if($employee_ranks[$index]==1)
	{
	  if($rank1_flag==FALSE)
		{
		   $rank1_name=$employee_names[$index];
		   $rank1_id=$employee_ids[$index];
		   $rank1_flag=TRUE;
		}
	  unset($pro_emp_dist[$index]);
	  continue;
	}
	array_push($pro_emp_allocate,$employee_names[$index]);
	array_push($used_employees,$employee_ids[$index]); //flag the emp as used
	unset($pro_emp_dist[$index]);
} // close while(len < min-1) -- filled min-1 for the project


if($rank1_flag==TRUE and $num_rows_emp>$used_len)
{
	array_push($pro_emp_allocate,$rank1_name);
	array_push($used_employees,$rank1_id);
}


else //no one was rank1 out of the employees filled so far
{
	
while(count($pro_emp_dist)>0)
	{
	$index = array_search(min($pro_emp_dist), $pro_emp_dist);
	if($employee_ranks[$index]==2)
		{
		  if($rank2_flag==FALSE){ //if this is the first rank2 we find
		    $rank2_name=$employee_names[$index];
		    $rank2_id=$employee_ids[$index];
		    $rank2_flag=TRUE;   }

		  unset($pro_emp_dist[$index]);
		  continue;
		}
	$rank1_flag=TRUE;
	array_push($pro_emp_allocate,$employee_names[$index]);
	array_push($used_employees,$employee_ids[$index]); //flag the emp as used
	unset($pro_emp_dist[$index]);
	break;
	} 

if($rank1_flag==FALSE and $num_rows_emp>$used_len) //if here theres still no rank1, then we dont have any left so push a rank2 instead
{
echo nl2br("\n<div style ='font:11px/21px Arial,tahoma,sans-serif;color:#006aff'> there are no more rank 1 , so pushed the nearest rank 2. </div>");

array_push($pro_emp_allocate,$rank2_name);
array_push($used_employees,$rank2_id);
}
}//close ELSE

$len3 = count($pro_emp_allocate);

$counter=-1;
foreach ($multi_array as $inner_array){
  $counter++;
 if($inner_array[0]==$query_data_pro[0]) break;
}

foreach($pro_emp_allocate as $names){
	array_push($multi_array[$counter],$names);
}

} //close the first while for projects,
//till here we have minimum emps for each project with a rank 1 included

foreach ($multi_array as $big_arr => $names) {
 echo "project number is {$names[0]} and employees are <br />";
    $counter=0;
    foreach ($names as $name) {
	if($counter++==0) continue;
        echo "{$name}<br />";
    }
}

$temp_len=count($used_employees);
echo nl2br("\n<div style ='font:18px/21px Arial,tahoma,sans-serif;color:#ff0000'> $temp_len Employees were used for the projects. </div>");

echo nl2br("\n" .($num_rows_emp-$temp_len). " more available employee(s), Refilling the projects...");

//fill rationally the rest of the emps
$used_len = count($used_employees);

$while_breaker=FALSE;
$project_max_counter=0; //count how many projects got to the max


while($num_rows_emp>$used_len) 
{
$num_rows_pro = mysqli_num_rows($result_pro);

if($num_rows_pro==$project_max_counter)
{ break; }

$project_max_counter=0; 


if(!$num_rows_pro)
{ echo nl2br("\n \n<div style ='font:18px/21px Arial,tahoma,sans-serif;color:#ff0000'> You dont have any projects. </div>");  break;}

$result_pro->data_seek(0); //reset to start over

while($query_data_pro = mysqli_fetch_row($result_pro)) 
{

echo nl2br("\n --------------------------------------------------------------------------------------------------------------------------");
echo nl2br("\n project number - $query_data_pro[0]");
$coordinates_pro=array();

$sql_pro = mysqli_query($connection, "SELECT * FROM Cities WHERE CityName='$query_data_pro[2]'");
$row_pro = mysqli_fetch_row($sql_pro );
$coordinates_pro[0]=$row_pro[1];
$coordinates_pro[1]=$row_pro[2];

echo nl2br("\n project cooooor $coordinates_pro[0],-$coordinates_pro[1]");
$result_emp->data_seek(0);
$pro_emp_dist=array();
$employee_names=array(); 
$employee_ids=array();
$employee_ranks=array();

while($query_data_emp = mysqli_fetch_row($result_emp)) {

$pro_emp_allocate=array(); 

if (in_array("$query_data_emp[0]", $used_employees)) {
    continue;
}
$sql_emp = mysqli_query($connection, "SELECT * FROM Cities WHERE CityName='$query_data_emp[5]'");
$row_emp = mysqli_fetch_row($sql_emp );
$coordinates_emp[0]=$row_emp[1];
$coordinates_emp[1]=$row_emp[2];

echo nl2br("\n $query_data_emp[1] cooooor $coordinates_emp[0],-$coordinates_emp[1]");

// do these lines only if the employee flag is true (wasnt used before)

$_dist=distance($coordinates_pro[0],-$coordinates_pro[1],$coordinates_emp[0],-$coordinates_emp[1],'M');
array_push($employee_names,"$query_data_emp[1] $query_data_emp[2]");
array_push($pro_emp_dist,$_dist);
array_push($employee_ids,$query_data_emp[0]); 
array_push($employee_ranks,$query_data_emp[6]); 

$coordinates_emp=array();
} //closes the third while


$len = count($pro_emp_dist);

	for($i=0;$i<$len;$i++){
	   echo nl2br("\n the distance is : $pro_emp_dist[$i] , $employee_names[$i]");
	}

$pro_min=$query_data_pro[4];
$pro_max=$query_data_pro[3];
$pro_ya7as=ceil(($pro_min+$pro_max)/2);

echo nl2br("\n -------------------------------------------------------------");
$len3=count($pro_emp_allocate);


echo nl2br("\n<div style ='font:11px/21px Arial,tahoma,sans-serif;color:#ff0000'> Filling employees... </div>");
//fill for each project once, if still available emps do it again

while($len3<$pro_ya7as)
{
//check if there still available emps, if not break out of the while	
$used_len = count($used_employees);

if($num_rows_emp<=$used_len)
{
$while_breaker=TRUE;
break; 
}

$index = array_search(min($pro_emp_dist), $pro_emp_dist);
$len3=count($pro_emp_allocate);


//if we passed el max continue 
$multi_counter=-1;
foreach ($multi_array as $inner_array){
  $multi_counter++;
 if($inner_array[0]==$query_data_pro[0]) break;
}

$array_size=count($multi_array[$multi_counter]) - 1 + $len3;

	if($len3>=$pro_ya7as)
	{
	  break;
	}
	if($query_data_pro[3]<=$array_size)
	{
	  $project_max_counter++;
	  break;
	}
	array_push($pro_emp_allocate,$employee_names[$index]);
	array_push($used_employees,$employee_ids[$index]); //flag the emp as used
	unset($pro_emp_dist[$index]);
}

$counter=-1;
foreach ($multi_array as $inner_array){
  $counter++;
 if($inner_array[0]==$query_data_pro[0]) break;
}

foreach($pro_emp_allocate as $names){
	array_push($multi_array[$counter],$names);
}

if($while_breaker==TRUE)
{ break;}

}

if($while_breaker==TRUE)
{ break;}

}

foreach ($multi_array as $big_arr => $names) {
 echo "project number is {$names[0]} and employees are <br />";
    $counter=0;
    foreach ($names as $name) {
	if($counter++==0) continue;
        echo "{$name}<br />";
    }
}

?>
</h4>

<!-- Clean up. -->
<?php

  mysqli_free_result($result);
  mysqli_close($connection);

?>

</section>
      </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0.0
        </div>
        <strong>Created By: Elias, Rawi, Maram, Mira And Aysam.</strong>
      </footer>


    <!-- jQuery 2.1.4 -->
    <script src="js/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 (not sure needed, try to delete at the end of the project)--> 
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip (not sure needed, try to delete at the end of the project) -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- jvectormap (for mobile browsers) -->
    <script src="js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="js/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="js/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll (used for the notifications) -->
    <script src="js/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="js/fastclick/fastclick.min.js"></script>
    <!-- used for resolution -->
    <script src="js/app.min.js"></script>

  </body>
</html>

