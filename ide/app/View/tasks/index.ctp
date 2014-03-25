<h2>Tasks</h2>
<?php 
if(empty($tasks)) :
 ?>
<h1> There are no tasks to list</h1>
<?php else: ?>
	<table>
		<tr>
			<td>Title</td>
			<td>Status</td>
			<td>Created</td>
			<td>Actions</td>
		</tr>
	</table>
	<?php foreach($tasks as $i=>$task): ?>
		<tr>
			<td>
				<?php echo $task['Task']['title'] ?>
			</td>
			<td>
				<?php 
					if($task['Task']['done'])echo 'Done';
					else echo 'Pending';
				 ?>
			</td>
			<td>
				<?php echo $task['Task']['created'] ?>
			</td>
			<td>
				This will be added later soon....
			</td>

		</tr>
	<?php endforeach; ?>
<?php endif; ?>
