<html>
<body>
	<h1>Сброс пароля для <?php echo $identity;?></h1>
	<p>Пожалуйста кликните на <?php echo anchor('auth/reset_password/'. $forgotten_password_code, 'Сбросить Пароль');?>.</p>
</body>
</html>