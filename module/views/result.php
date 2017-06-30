<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="rg-box">
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Vest #</th>
					<th>Batch</th>
					<th>Firstname</th>
					<th>Lastname</th>
					<?php /*<th>MC Type</th>*/ ?>
				</tr>
			</thead>
			<tbody>
				<?php if($query): ?>
					<?php 


					//echo QModel::c($query);
					//die();
						if( ! QModel::c($query)):
					?>
					<tr>
						<td class="text-center" colspan="8">No Records Found</td>
					</tr>
					<?php else: ?>
						<?php 
								foreach (QModel::g($query, TRUE) as $get): 
									$firstname = $get['firstname'];
									$lastname = $get['lastname'];
									$batch = $get['batch'];
									$vest_no = $get['vest_no'];
						?>
					<tr>
						<td><?php echo $vest_no; ?></td>
						<td><?php echo $batch; ?></td>
						<td><?php echo $firstname; ?></td>
						<td><?php echo $lastname; ?></td>
						<?php /*<td>SYM SBSR 2016</td>*/ ?>
					</tr>
					<?php endforeach; endif; ?>
				<?php endif ?>
			</tbody>
		</table>
	</div>
</div>