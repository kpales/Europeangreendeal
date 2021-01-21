<?php
/**
 * Template Name: Report
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>
<div class="container">
    <div class="row">
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "european-standards-and-green-deal";
        //create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM wp_frm_item_metas ORDER BY `wp_frm_item_metas`.`item_id` ASC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                if(($row["field_id"] = '76'))
                echo $row["meta_value"]. "<br>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </div>
</div>


<?php get_footer(); ?>



