<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php 

	$qi = QModel::sfwa('message',array('rgto'),array($this->session->userdata('hashcrash')));
	$qic = QModel::c($qi);

	$qu = QModel::sfwa('message',array('rgto','is_read'),array($this->session->userdata('hashcrash'),'0'));
	$quc = QModel::c($qu);

	$qs = QModel::sfwa('message',array('rgfrom'),array($this->session->userdata('hashcrash')));
	$qsc = QModel::c($qs);
?>
<?php if($menu == 'mailbox'): ?>
	<a href="<?php echo base_url('admin/message?c=message&f=new'); ?>" class="btn btn-primary btn-block margin-bottom">Compose</a>
<?php elseif($menu == 'messages'): ?>
	<a href="<?php echo base_url('admin/message?controller=message/mailbox'); ?>" class="btn btn-primary btn-block margin-bottom">Back to Inbox</a>
<?php endif; ?>
<div class="box box-solid">
	<div class="box-header with-border">
		<h3 class="box-title">Folders</h3>
		<div class="box-tools">
			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
		</div>
	</div>
	<div class="box-body no-padding">
		<ul class="nav nav-pills nav-stacked">
			<li><a href="<?php echo base_url('admin/message?controller=message/mailbox'); ?>"><i class="fa fa-inbox"></i> Inbox<span class="label label-primary pull-right"><?php echo $qic; ?></span></a></li>
			<li><a href="<?php echo base_url('admin/message?controller=message/mailbox&f=sent'); ?>"><i class="fa fa-envelope-o"></i> Sent<span class="label label-primary pull-right"><?php echo $qsc; ?></span></a></li>
			<li><a href="<?php echo base_url('admin/message?controller=message/mailbox&f=unread'); ?>"><i class="fa fa-envelope-o"></i> Unread <span class="label label-danger pull-right"><?php echo $quc; ?></span></a></a></li>
		</ul>
	</div>
</div>