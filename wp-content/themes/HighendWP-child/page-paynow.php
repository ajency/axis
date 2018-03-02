<?php
/**
 * @package WordPress
 * @subpackage Highend
 */
/*
Template Name: Pay Now
*/
?>

<?php get_header(); ?>

<?php
$main_content_style = "";
if ( vp_metabox('background_settings.hb_content_background_color') )
	$main_content_style = ' style="background-color: ' . vp_metabox('background_settings.hb_content_background_color') . ';"';
?>


<div id="main-content"<?php echo $main_content_style; ?>>
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
				<form method="post" action="<?php echo get_stylesheet_directory_uri(); ?>/page-payform.php">
				  <table width="100%" align="center" border="0" cellspacing="2" cellpadding="3" class="tdata">
				    <tr>
				      <td width="35%">Hotel Name:</td>
				      <td><input type="text" name="name" id="name" placeholder="Enter Hotel Name" required></td>
				    </tr>

				    <tr>
				      <td>Email:</td>
				      <td><input type="text" name="email" id="email" placeholder="Enter Email Address" required></td>
				    </tr>
				    <tr>
				      <td>Contact Number:</td>
				      <td><input type="text" name="contact_no" id="contact_no" placeholder="Enter Contact Number" required></td>
				    </tr>
				    <tr>
				      <td>Invoice:</td>
				      <td><input type="text" name="company" id="company" placeholder="Enter Invoice Number" required></td>
				    </tr>
				    <tr>
				      <td>Amount:</td>
				      <td><input type="number" name="amount" id="amount" value="0"></td>
				    </tr>

				    <tr>
				      <td>&nbsp;</td>
				      <td class="axis-green-btn">
				      	<button type="submit" name="submit">Submit</button>
				      </td>
				    </tr>

				  </table>
				</form>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>