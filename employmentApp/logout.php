<?php
/**
 * Created by PhpStorm.
 * User: andrei.cirt
 * Date: 2/23/2017
 * Time: 11:03
 */

 require_once("methods.php");

	// session_start();
	$_SESSION["admin_id"] = null;
	$_SESSION["username"] = null;
	redirect_to("login.php");