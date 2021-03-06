<!-- 
    Purpose of Script: Manager Menu Bar to be used in every manager page
    Written by: Michael H
    last updated: Michael 12/02/21, Jason 19/2/21, Jason 20/2/21, Michael 20/2/21, Michael 22/02/21
    Added new links and removed the holidays, added new links, added create & delete acc links, added Log out & change roster (both yet to be implemented)
    Jason 1/3/21
    Removed the create new manager, create new staff, and delete manager tabs. Added functions tab
    Jason 4/3/21 Removed add manager and add staff and put them under 'Other Functions'
-->
<?php
session_start();
include "ServerDetail.php"; 
     if(!(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true && isset($_SESSION["Position"]) && $_SESSION["Position"] === Manager)){
    	header("location: ManagementLogin.php");
    	exit;
     }
 global $link;

 $Email=$_SESSION['Email'];
 $update=false;
 $sql = "SELECT * FROM Managers WHERE Business_Email = '$Email'";
 $result = mysqli_query($link,$sql);
 if(mysqli_num_rows($result) > 0){
    $update=true;
 }
?>

<!-- Was neccesary to have the below css in this file as makes reference to topnav class which is created in this file and is not in scope if css
     were to be included in the websiteStyle css file -->

     <style>
    /* 
       Reference : https://www.w3schools.com/howto/howto_js_topnav.asp
        Add a black background color to the top navigation 
    */
    .topnavM {
        background-color: lightseagreen;
        overflow: hidden;
    }
    
    /* Style the links inside the navigation bar */
    .topnavM a {
        float: left;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
    }
    
    /* Change the color of links on hover */
    .topnavM a:hover {
        background-color: #ddd;
        color: black;
    }
    
    /* The below style is not used currently, as would reduce maintainability of site as I'd need to actually put the code at the top of every php file and 
       define the active page, can see if client wants it*/
    /* Add a color to the active/current link 
    .topnav a.active {
        background-color: #4CAF50;
        color: white;
    }
    */
    
</style>


<div class="topnavM">
  <!-- <a class="active" href="HomePage.php">Home</a>              This was commented out as having a diff colour for active tab reduces site maintability-->
  <a href="ManagerHomePage.php"> Manager Home </a>
  <a href="EmployeeRosterAlterations.php"> Employee Rostering </a>
  <a href="DeliveryPickupSched.php"> Delivery & Pick up schedule </a>  
  <a href="OrderCheck.php"> Order Check  </a> 
  <a href="RentalFreq.php"> Rental Frequency </a>
  <a href="SalesRevenue.php"> Sales revenue by product </a>
  <a href="EmployeeHours.php"> Employee Hours worked  </a>
  <a href="BestCustomers.php"> Best Customers  </a> 
  <a href="Functions.php"> Other Functions </a>
<?php if ($update){ ?>
 <a href="AddManagerInfo.php">Change Details</a>
<?php } else { ?>
  <a href="AddManagerInfo.php"> Add my Info </a>
<?php } ?>
  <a href="LogOut.php"> Log Out </a>

</div>