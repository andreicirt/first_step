<?php
/**
 * Created by PhpStorm.
 * User: andrei.cirt
 * Date: 2/22/2017
 * Time: 14:10
 */


 require_once("connection.php");
 require_once("methods.php");

 // confirm_logged_in();
  $admin_set = find_all();
 $layout_context = "super_admin"; ?>
<?php include("layouts/header.php"); ?>
<section>
    <div style="float:right ">
        <a href="logout.php" class="button button1">Logout</a>
    </div>
    <h1>Employment APP</h1>
    <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
            <tr>
                <th>UserName</th>
                <th>Team</th>
                <th>Rank</th>
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
                    <td><?php echo htmlentities($admin["rank"]); ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <div style="float: left">
    </div>
</section>
<?php include("layouts/footer.php"); ?>






