<html>
<body>
	<h1>Активация аккаунта <?php echo $identity;?></h1>
	<p>Пожалуйста перейдите по ссылке <?php echo anchor('auth/activate/'. $id .'/'. $activation, 'Автивировать Ваш аккаунт');?>.</p>
</body>
</html>