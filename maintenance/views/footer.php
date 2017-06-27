<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="container-fuild"   id="footer">
  <div class="container">
    <div class="col-md-12">
      <div class="col-md-4" id="socialicons">
          <a href=""  class="text-center" style="font-size:16px !important;">&copy; The TCU Files <?php echo (2015 == date('Y')) ? '2014' : '2014 - '.date('Y'); ?></a>
        </div>
        <div class="col-md-8" id="socialicons">
          <ul class="list-inline  pull-right">
            <li><a href="javascript:void(0);" class="hvr-fade soc" title="Facebook"><i class="fa fa-facebook-official" style="padding:5px"></i></a></li>
            <li><a href="javascript:void(0);" class="hvr-fade soc" title="Twitter"><i class="fa fa-twitter" style="padding:5px"></i></a></li>
            <li><a href="javascript:void(0);" class="hvr-fade soc" title="Google +"><i class="fa fa-google-plus" style="padding:5px"></i></a></li>
          </ul>
        </div>
    </div>
  </div>
</div>
<?php echo js_tag('js/jquery.js');?>
<?php echo js_tag('js/bootstrap.min.js');?>


<?php
  if ( ! empty($js))
  {
    foreach($js as $javascript)
    {
      echo '<script type="text/javascript" src='.themes_url("js/".$javascript.".js").'></script>';
    }
  }
?>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});

    $(window).load(function(){
        
        $("<?php echo (isset($valus) ? $valus == 'myModal' : '') ? '#myModal' : ''; ?>").modal('show');
    });
</script>