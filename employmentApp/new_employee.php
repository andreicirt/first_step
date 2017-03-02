<?php
/**
 * Created by PhpStorm.
 * User: andrei.cirt
 * Date: 2/23/2017
 * Time: 13:14
 */

    require_once("connection.php");
    require_once("methods.php");
  //  confirm_logged_in();

    $connection = Connect();

if (isset($_POST['submit'])) {
    // Process the form

    // validations
    $required_fields = array("username", "password");
    validate_presences($required_fields);

    $fields_with_max_lengths = array("username" => 30);
    validate_max_lengths($fields_with_max_lengths);

    if (empty($errors)) {
        // Perform Create

        $username = mysql_prep($_POST["username"]);
        $team = mysql_prep($_POST["team"]);
        $rank = mysql_prep($_POST["rank"]);
        $hashed_password = password_encrypt($_POST["password"]);

        $query  = "INSERT INTO employment (";
        $query .= "  username, team, rank , hire_date , hashed_password";
        $query .= ") VALUES (";
        $query .= "  '{$username}', '{$team}','{$rank}' , NOW(), '{$hashed_password}'";
        $query .= ")";
        $result = mysqli_query($connection, $query);

        if ($result) {
            // Success
            $_SESSION["message"] = "Employee created.";
            redirect_to("super_admin.php");
        } else {
            // Failure
            $_SESSION["message"] = "Employee creation failed.";
        }
    }
} else {
    // This is probably a GET request

} // end: if (isset($_POST['submit']))

?>
<?php $teamNames = find_team_from_db();
     $layout_context = "new_employee"; ?>
<?php include("layouts/header.php"); ?>
<div id="main">
    <div id="navigation">
        &nbsp;
    </div>
    <div id="page">
        <div id="test" >
        <?php echo message(); ?>
        <?php echo form_errors($errors); ?>
        <h2>Create Employee</h2>
        <form action="new_employee.php" method="post">
            <p>Username:
                <input type="text" name="username" value="" />
            <p>Rank:
                <select name="rank" >
                    <option value="ROOKIE">ROOKIE</option>
                    <option value="TLEAD">TLEAD</option>
                    <option value="MANAGER">MANAGER</option>
                </select>
            </p>
            <p>Team:
                <select name="team" >
                    <?php while($team = mysqli_fetch_assoc($teamNames)) { ?>
                        <option value=" <?php echo htmlentities($team["team_name"]);?>" > <?php echo htmlentities($team["team_name"]);?> </option>
                    <?php } ?>
                </select>
            </p>
            <p>Password:
                <input type="password" name="password" value="" />
            </p>
            <br><br>
            <button class="button button1" type="submit" name="submit" >Create Employee </button>
        </form>
        <br />
            <br><br>
        <a href="super_admin.php" class="button button1" role="button">Cancel</a>
    </div>
</div>
    <?php include("layouts/footer.php"); ?>