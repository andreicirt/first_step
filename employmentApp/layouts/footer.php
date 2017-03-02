<?php
/**
 * Created by PhpStorm.
 * User: andrei.cirt
 * Date: 2/24/2017
 * Time: 14:53
 */
?>

<div id="footer" style="border-bottom-color: white">Employment <?php echo date("Y"); ?>, App</div>

    </body>
</html>
<?php
// Close database connection
if (isset($connection)) {
    mysqli_close($connection);
}
?>


