<?php
/**
 * Created by PhpStorm.
 * User: andrei.cirt
 * Date: 2/23/2017
 * Time: 10:46
 */

    require_once("connection.php");
    require_once("methods.php");
    confirm_logged_in();



  $admin = find_admin_by_id($_GET["id"]);
  if (!$admin) {
      // admin ID was missing or invalid or
      // admin couldn't be found in database
      redirect_to("super_admin.php");
  }

  $connection = Connect();

  $id = $admin["id"];
  $query = "UPDATE `problemaphp`.`employment` SET leave_date = NOW() WHERE  id= {$id} LIMIT 1";
  $result = mysqli_query($connection, $query);

  if ($result && mysqli_affected_rows($connection) == 1) {
      // Success
      $_SESSION["message"] = "Admin deleted.";
      redirect_to("super_admin.php");
  } else {
      // Failure
      $_SESSION["message"] = "Admin deletion failed.";
      redirect_to("super_admin.php");
  }
