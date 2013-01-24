<div class="container">
<h1>Пользователи</h1>
<p>Список пользвателей.</p>

<div id="infoMessage"><?php echo $message;?></div>

<table cellpadding=0 cellspacing=10 class="table-striped table">
	<tr>
		
		<th>E-mail</th>
		<th>Группа</th>
		<th>Статус</th>
		<th>Действие</th>
	</tr>
	<?php foreach ($users as $user):?>
		<tr>
			
			<td><?php echo $user->email;?></td>
			<td>
				<?php foreach ($user->groups as $group):?>
					<?php echo anchor("auth/edit_group/".$group->id, $group->name) ;?><br />
                <?php endforeach?>
			</td>
			<td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, 'Активно') : anchor("auth/activate/". $user->id, 'Неактивно');?></td>
			<td><?php echo anchor("auth/edit_user/".$user->id, 'Редактировать') ;?></td>
		</tr>
	<?php endforeach;?>
</table>

<p><a href="<?php echo site_url('auth/create_user');?>">Добавить нового пользователя</a> | <a href="<?php echo site_url('auth/create_group');?>">Создать новую группу пользователей</a></p>
</div>