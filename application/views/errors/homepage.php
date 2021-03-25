	<!DOCTYPE html>
<html>
<head>
	<title></title>
			<link href="http://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

	<header>
		<?php $this->load->view('components/header');?>
	</header>
	<main role="main">
		<?php $this->load->view($page);?>
	</main>
	<footer class="text-muted">
		<?php $this->load->view('components/footer');?>
	</footer>
</body>
</html>