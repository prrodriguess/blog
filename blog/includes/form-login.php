<?php

$alertLog = strlen($alertLog) ? '<div class="alert alert-danger">'.$alertLog.'</div>' : '';
$alertRegister = strlen($alertRegister) ? '<div class="alert alert-danger">'.$alertRegister.'</div>' : '';

?>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="./css/style.css">

	<title>Login</title>
</head>
<body>
	<div class="container">
		<div class="col">
			<form action="" method="POST" class="login-email">
				<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
				<?=$alertLog?>
				<div class="input-group">
					<input type="email" placeholder="Email" name="email" required>
				</div>
				<div class="input-group">
					<input type="password" placeholder="Password" name="senha" required>
				</div>
				<div class="input-group">
					<button type="submit" name="action" value="log" class="btn">Logar</button>
				</div>
				<!-- <p class="login-register-text">Não tenho conta. <a href="form-register.php">Registre-se !</a>.</p> -->
			</form>
		</div>
		<div class="col">
			<form action="" method="POST" class="login-email">
				<p class="login-text" style="font-size: 2rem; font-weight: 800;">Cadastrar</p>
				<?=$alertRegister?>
				<div class="input-group">
					<input type="nome" placeholder="Nome" name="nome" required>
				</div>
				<div class="input-group">
					<input type="email" placeholder="Email" name="email" required>
				</div>
				<div class="input-group">
					<input type="password" placeholder="Password" name="senha" required>
				</div>
				<div class="input-group">
					<button type="submit" name="action" value="register" class="btn">Cadastrar</button>
				</div>
				<!-- <p class="login-register-text">Ja tenho conta <a href="form-login.php">Logar agora.</a>.</p> -->
			</form>
		</div>
	</div>
</body>