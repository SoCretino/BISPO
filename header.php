<header id="header" role="navigation" itemscope itemtype="https://schema.org/WPHeader">
	<nav class="nav-bar">
		<div class="nav-brand">
			<a href="index.php"><img src="img/logo.png" width="275" height="75" alt="backline"></a>
		</div>
		<div class="nav-contact">
			<i class="fa fa-phone" aria-hidden="true"></i> 2114-9417
		</div>
	</nav>
	<div class="header-menu">
		<ul class="header-list">
			<li class="menu-item">
				<span class="equipos"><a href="#">Productos ▾</a></span>
				<ul class="header-submenu">
					<?php 
						include 'mysql_connection.php'; 
						$query = "SELECT * FROM category";
						$result = $mysqli->query($query);
						while ($rows = $result->fetch_array(MYSQLI_ASSOC)):
							echo '<li><a href="categoria.php?category_id=' . $rows['id'] . '">' . $rows['name'] . '</a></li>';
						endwhile;
						$result->free();
						$mysqli->close();
					?>
				</ul>
			</li>
			<li><a href="nosotros.php">Nosotros</a></li>
			<li><a href="requisitos.php">Requisitos</a></li>
			<li><a href="eventos.php">Eventos</a></li>
		</ul>
	</div>
	<div class="zona">
		Estamos en Zona Oeste!
	</div>
	<nav class="nav-bar-mobile">
		<div class="nav-brand">
			<a href="index.php"><img src="img/logo_mobile.png" width="200" height="75" alt="backline"></a>
		</div>
		<button class="hamburger hamburger--squeeze" type="button">
			<span class="hamburger-box">
				<span class="hamburger-inner"></span>
			</span>
		</button>
	</nav>
	<div class="header-menu-mobile">
		<ul class="header-list-mobile">
			<li class="equipos-mobile">
				<a href="#">Productos ▾</a>
				<ul class="header-submenu-mobile">
					<?php 
						include 'mysql_connection.php'; 
						$query = "SELECT * FROM category";
						$result = $mysqli->query($query);
						while ($rows = $result->fetch_array(MYSQLI_ASSOC)):
							echo '<li><a href="categoria.php?category_id=' . $rows['id'] . '">' . $rows['name'] . '</a></li>';
						endwhile;
						$result->free();
						$mysqli->close();
					?>
				</ul>
			</li>
			<li><a href="nosotros.php">Nosotros</a></li>
			<li><a href="requisitos.php">Requisitos</a></li>
			<li><a href="eventos.php">Eventos</a></li>
		</ul>
	</div>
</header>