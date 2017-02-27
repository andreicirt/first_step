<?php
/**
 * Created by PhpStorm.
 * User: andrei.cirt
 * Date: 2/22/2017
 * Time: 15:01
 */


 require_once("connection.php");
 require_once("methods.php");

 // confirm_logged_in();
  $admin_set = find_all();
 $layout_context = "super_admin"; ?>
<?php include("layouts/header.php"); ?>
<section>
    <div style="float:right ">
        <a href="logout.php">Logout</a>
    </div>
    <h1>Employment APP</h1>
    <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
            <tr>
                <th>UserName</th>
                <th>Team</th>
                <th>Rank</th>
                <th>Actions</th>
            </tr>
            </thead>
        </table>
    </div>
    <div class="tbl-content">
        <?php echo message(); ?>
        <table cellpadding="0" cellspacing="0" border="0">
                <?php while($admin = mysqli_fetch_assoc($admin_set)) { ?>
                    <tr>
                        <td><?php echo htmlentities($admin["username"]); ?></td>
                        <td><?php echo htmlentities($admin["team"]); ?></td>
                        <td><?php echo htmlentities($admin["role"]); ?></td>
                        <td><a href="edit_employee.php">Edit </a>
                            | <a href="remove_employee.php?id=<?php echo urlencode($admin["id"]); ?>" onclick="return confirm('Are you sure?');">Delete</a></td>
                    </tr>
                <?php } ?>
            </table>
    </div>
    <div style="float: left">
        <a href="new_employee.php">Add new employee</a>
        </div>
    </section>
<?php include("layouts/footer.php"); ?>






