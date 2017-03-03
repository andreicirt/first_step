<?php
/**
 * Created by PhpStorm.
 * User: andrei.cirt
 * Date: 2/22/2017
 * Time: 13:56
 */

 require_once("connection.php");
 require_once("methods.php"); ?>

<?php
$username = "";

if (isset($_POST['submit'])) {
    // Process the form

    // validations
    $required_fields = array("username", "password");
    validate_presences($required_fields);

    if (empty($errors)) {
        // Attempt Login

        $username = $_POST["username"];
        $password = $_POST["password"];

        $found_admin = attempt_login($username, $password);

        if ($found_admin) {
            // Success
            // Mark user as logged in
            $_SESSION["admin_id"] = $found_admin["id"];
            $_SESSION["username"] = $found_admin["username"];

            if ($found_admin['rank'] == 'MANAGER'){
                redirect_to("super_admin.php");
            } elseif ($found_admin['rank'] == 'TLEAD'){
                redirect_to("admin.php");
            } elseif ($found_admin['rank'] == 'ROOKIE'){
                redirect_to("user.php");
            }

        } else {
            // Failure
            $_SESSION["message"] = "Username/password not found.";
        }
    }
} else {
    // This is probably a GET request

} // end: if (isset($_POST['submit']))

?>

<?php $layout_context = "Owner"; ?>
<?php include("layouts/header.php"); ?>
<div id="main">
    <div id="navigation">
        &nbsp;
    </div>
    <div id="page">
        <div id="test" >
            <?php echo message(); ?>
            <?php echo form_errors($errors); ?>
        <h2>Login</h2>
        <form action="login.php" method="post" >
            <p>Username:
                <input type="text" name="username" value="<?php echo htmlentities($username); ?>" />
            </p>
            <p>Password:
                <input type="password" name="password" value="" />
            </p>
            <button class="button button1" type="submit" name="submit"> Log In </button>
        </form>
        </div>
    </div>
</div>
<?php include("layouts/footer.php"); ?>
