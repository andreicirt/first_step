<?php
/**
 * Created by PhpStorm.
 * User: andrei.cirt
 * Date: 3/3/2017
 * Time: 13:45
 */


require_once ("connection.php");

$errors = array();

function mysql_prep($string) {
    global $connection;

    $escaped_string = mysqli_real_escape_string($connection, $string);
    return $escaped_string;
}


function fieldname_as_text($fieldname) {
    $fieldname = str_replace("_", " ", $fieldname);
    $fieldname = ucfirst($fieldname);
    return $fieldname;
}

// * presence
// use trim() so empty spaces don't count
// use === to avoid false positives
// empty() would consider "0" to be empty
function has_presence($value) {
    return isset($value) && $value !== "";
}

function validate_presences($required_fields) {
    global $errors;
    foreach($required_fields as $field) {
        $value = trim($_POST[$field]);
        if (!has_presence($value)) {
            $errors[$field] = fieldname_as_text($field) . " can't be blank";
        }
    }
}

// * string length
// max length
function has_max_length($value, $max) {
    return strlen($value) <= $max;
}

function validate_max_lengths($fields_with_max_lengths) {
    global $errors;
    // Expects an assoc. array
    foreach($fields_with_max_lengths as $field => $max) {
        $value = trim($_POST[$field]);
        if (!has_max_length($value, $max)) {
            $errors[$field] = fieldname_as_text($field) . " is too long";
        }
    }
}

function redirect_to($new_location) {
    header("Location: " . $new_location);
    exit;
}

function confirm_query($result_set) {
    if (!$result_set) {
        die("Database query failed.");
    }
}



function password_check($password, $existing_hash) {
    // existing hash contains format and salt at start
    $hash = crypt($password, $existing_hash);
    var_dump($existing_hash);
    var_dump($hash);
    if ($hash === $existing_hash) {
        return true;
    } else {
        return false;
    }
}

function generate_salt($length) {
    // Not 100% unique, not 100% random, but good enough for a salt
    // MD5 returns 32 characters
    $unique_random_string = md5(uniqid(mt_rand(), true));

    // Valid characters for a salt are [a-zA-Z0-9./]
    $base64_string = base64_encode($unique_random_string);

    // But not '+' which is valid in base64 encoding
    $modified_base64_string = str_replace('+', '.', $base64_string);

    // Truncate string to the correct length
    $salt = substr($modified_base64_string, 0, $length);

    return $salt;
}

function password_encrypt($password) {
    $hash_format = "$2y$10$";   // Tells PHP to use Blowfish with a "cost" of 10
    $salt_length = 22; 					// Blowfish salts should be 22-characters or more
    $salt = generate_salt($salt_length);
    $format_and_salt = $hash_format . $salt;
    $hash = crypt($password, $format_and_salt);
    return $hash;
}



function attempt_login($username, $password) {
    $admin = find_admin_by_username($username);
    if ($admin) {
        // found admin, now check password
        if (password_check($password, $admin["hashed_password"])) {
            // password matches
            return $admin;
        } else {
            // password does not match
            return false;
        }
    } else {
        // admin not found
        return false;
    }
}

//function find_all_admins() {
//    $connection = Connect();
//
//    $query  = "SELECT * ";
//    $query .= "FROM employment ";
//    $query .= "WHERE rank = 'ADMIN'";
//    $admin_set = mysqli_query($connection, $query);
//    confirm_query($admin_set);
//    return $admin_set;
//}

function find_admin_by_username($username) {
    $connection = Connect();
    $safe_username = mysqli_real_escape_string($connection, $username);

    $query  = "SELECT * ";
    $query .= "FROM employment ";
    $query .= "WHERE username = '{$safe_username}' ";
//    $query .= "and role = 'ADMIN'";////
    $query .= "LIMIT 1";
    $admin_set = mysqli_query($connection, $query);
    confirm_query($admin_set);
    if($admin = mysqli_fetch_assoc($admin_set)) {
        return $admin;
    } else {
        return null;
    }

}


function logged_in() {
    return isset($_SESSION['admin_id']);
}

function confirm_logged_in() {
    if (!logged_in()) {
        redirect_to("super_admin.php");
    }
}


session_start();

function message() {
    if (isset($_SESSION["message"])) {
        $output = "<div class=\"message\">";
        $output .= htmlentities($_SESSION["message"]);
        $output .= "</div>";

        // clear message after use
        $_SESSION["message"] = null;

        return $output;
    }
}

function errors() {
    if (isset($_SESSION["errors"])) {
        $errors = $_SESSION["errors"];

        // clear message after use
        $_SESSION["errors"] = null;

        return $errors;
    }
}
function form_errors($errors=array()) {
    $output = "";
    if (!empty($errors)) {
        $output .= "<div class=\"error\">";
        $output .= "Please fix the following errors:";
        $output .= "<ul>";
        foreach ($errors as $key => $error) {
            $output .= "<li>";
            $output .= htmlentities($error);
            $output .= "</li>";
        }
        $output .= "</ul>";
        $output .= "</div>";
    }
    return $output;
}

function find_admin_by_id($admin_id) {
    $connection = Connect();

    $safe_admin_id = mysqli_real_escape_string($connection, $admin_id);

    $query  = "SELECT * ";
    $query .= "FROM employment ";
    $query .= "WHERE id = {$safe_admin_id} ";
    $query .= "LIMIT 1";
    $admin_set = mysqli_query($connection, $query);
    confirm_query($admin_set);
    if($admin = mysqli_fetch_assoc($admin_set)) {
        return $admin;
    } else {
        return null;
    }
}

function find_all() {
    $connection = Connect();

    $query  = "SELECT * ";
    $query .= "FROM employment ";
    $query .= "WHERE leave_date is NULL";
    $admin_set = mysqli_query($connection, $query);
    confirm_query($admin_set);
    return $admin_set;
}

function find_team_from_db(){
    $connection = Connect();

    $query  = "SELECT * ";
    $query .= "FROM teams ";
    $teams = mysqli_query($connection, $query);
    confirm_query($teams);
    return $teams;
}
