
<?php
use yii\helpers\Html;
$this->title = 'Handysolver';
?>
<div class="container">

	<div style="text-align: center;">
		<div class="pull-left" style="border: 1px solid black ; padding: 3px;"><img src="images/logo.png" alt="image not found" height="80" width="80" />
		</div>
		<h2>To-do List Application</h2>
		<h4>Where to-do items are added/deleted and belong to categories.</h4>
		<br>
		<br>
		<?php print_r($category)?>
		<div style="border: 1px solid black;padding: 15px;">
		<div class="row">
			<div class="col-sm-3">
				<select>
					<option value="" selected>Category</option>
					<option>Category A</option>
					<option>Category B</option>
					<option>Category C</option>
				</select>
			</div>
			<div class="col-sm-4">
				<input type="text" name="" style="width: 60%;">
				<button style="background: green;color: white;">Add</button>
			</div>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<?php
			
			?>
			<div class="row">
				<table class="table table-bordered" align="center">
					<thead>
						<tr>
							<th>ToDo Item name</th>
							<th>Category</th>
							<th>Timestamp</th>
							<th>Actions</th>
						</tr>
					</thead>
					
					<tbody>
						<?php if(count($todo)>0)
						{
							foreach($todo as $todo ){
							?>
						<tr>
							<td><?php echo $todo->name;?></td>
							<td><?php echo $todo->category_id;?></td>
							<td><?php echo $todo->timestamp;?></td>
							<td><?=Html::a('Delete', ['/site/test'], ['class'=>'btn']);?><span></td>
						</tr>
						<?php 
							}
						}
						else {?>
						<tr>
							<td>Record not found</td>
						</tr>
						<?php }?>
					</tbody>
				</table>
				
			</div>
		</div>
		

		</div>
	</div>
</div>
