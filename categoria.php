<!DOCTYPE html>
<html lang="es-AR" itemscope="itemscope" itemtype="http://schema.org/WebPage">
	<head prefix="og: http://ogp.me/ns#">
		<?php include('meta-css.php'); ?>
	</head>
	<body>
		<?php include('header.php'); ?>
		<main class="main" role="main">
			<?php 
				$get_category_id = $_GET['category_id'];
				include 'mysql_connection.php'; 
				$query = "SELECT * FROM category WHERE id = $get_category_id";
				$result = $mysqli->query($query);
				while ($rows = $result->fetch_array(MYSQLI_ASSOC)):
					echo '<h1 class="section">' . $rows['name'] . '</h1>';
				endwhile;
			?>
			<section class="backline-wrapper row align-center text-center">
				<?php 
					$query = "SELECT * FROM item WHERE category_id = $get_category_id ORDER BY price DESC";
					$result = $mysqli->query($query);
					while ($rows = $result->fetch_array(MYSQLI_ASSOC)):
						echo 
							'<div class="small-12 medium-4 columns">
								<a href="item.php?item_id=' . $rows['id'] . '">
									<div class="backline-item">
										<img src="' . $rows['image'] . '">
										<div class="backline-content">
											<span class="item-content-name">' . $rows['name'] . '</span>
											<span class="item-content-price">$ ' . $rows['price'] . '</span>
										</div>
										<div class="ver-button">Ver</div>
									</div>
								</a>
							</div>';
					endwhile;
					$result->free();
					$mysqli->close();
				?>
			</section>
			<div id="back-top">
  				<a href="#" style="font-size:4rem"><i class="fa fa-chevron-circle-up color" aria-hidden="true"></i></a>
			</div>
		</main>
		<?php include('footer.php'); ?>
		<?php include('scripts.php'); ?>
		<script>
			$("#back-top").hide();
			$(function () {
				$(window).scroll(function () {
					if ( $(this).scrollTop() > 1250 && $(window).width() > 639 ) {
						$('#back-top').fadeIn();
					} else {
						$('#back-top').fadeOut();
					}
				});
			    // scroll body to 0px on click
				$('#back-top').click(function () {
					$('body,html').animate({
						scrollTop: 0
					}, 1000);
					return false;
				});
			});
		</script>
	</body>
</html>