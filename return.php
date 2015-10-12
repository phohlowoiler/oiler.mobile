<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
</head>
<body>
	<div id="site-wrapper">
		<div id="site-canvas">
			 <div class="container">
				<div class="row">
					<div class="col-md-12 col-lg-12">
						<div class="return-page-wrap">
							<p>Спасибо!<br /> Менеджер перезвонит Вам через 5 минут</p>
							<button onclick="returnToMain();" class="submit-btn">Назад</button>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		function returnToMain(){
			window.location.href = 'index.php';
		}
	</script>
</body>
</html>