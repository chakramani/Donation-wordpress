
<?php
  /*
  Template Name: Donor
  */
  get_header();

?> 
<?php
    global $wpdb;
    $table=$wpdb->prefix . 'registration';
    $query = $wpdb->prepare( "SELECT * FROM $table");
    $result=$wpdb->get_results($query);

?>


<div class="container customerDonationTable">
    <table id="customers">
        <tr class="donor1_header">
            <th>First Name</th>
            <th>Caste</th>
            <th>E-Mail</th>
            <th>Address</th>
            <th>Phone Number</th>
        </tr>
        <?php
        foreach ( $result as $print )  
        { 
            ?>
            <tr>
                <td> <?php echo $print->first_name; ?></td>
                <td><?php echo $print->last_name; ?> </td>
                <td> <?php echo $print->email ; ?> </td>
                <td> <?php echo $print->address; ?> </td>
                <td><?php echo $print->phone; ?> </td>
            </tr>
            <?php 
        } 
        ?>
    </table>
</div>

<?php get_footer()?>