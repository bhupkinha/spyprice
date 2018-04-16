<!DOCTYPE html>
<?php
?>
<html lang= "en_us">
    <head>
        <?php echo $this->Html->meta('faviconn.ico', '/faviconn.ico', ['type' => 'icon']); ?>
        <meta charset="utf-8" />
   <title>Spyprice</title>
        
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       
        <?= $this->Html->css('custome1') ?> 
        <?php //echo $this->Html->css('color-css/default-color') ?> 
        <?php
        //if($cookie_value['loc'] != NULL){ 
        // echo $this->Html->css('color-css/'.$cookie_value['loc']);
        // }  
        ?>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css?v=21">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css?v=21">
        
       
    </head>
    
        <?= $this->fetch('content') ?>

        <?= $this->Html->script('jquery-3.1.1.min') ?>
        <?= $this->Html->script('ckeditor/ckeditor.js') ?>
        <?= $this->Html->script('bootstrap.min') ?>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        <?= $this->Html->script('form-validation.js') ?>
        <?= $this->Html->script('bootstrap-datepicker.js') ?>
        <?= $this->Html->script('bootstrap-timepicker.min.js') ?>
        <?= $this->Html->script('jqcarousel.js') ?>

        <?= $this->Html->script('https://s3-eu-west-1.amazonaws.com/marajobs/frontend/js/intlTelInput.js?v=2') ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.js"></script>
        <script type="text/javascript" src="https://cdn.rawgit.com/leafo/sticky-kit/v1.1.2/jquery.sticky-kit.min.js"></script>
        <?= $this->Html->script('theia-sticky-sidebar.js?v=21') ?>
        <?= $this->Html->script('sticky.js?v=21') ?>
        <?= $this->Html->script('main.js?v=21') ?>
      
<script>
		function myFunction() {
		    var x = document.getElementById("myTopnav");
		    if (x.className === "topnav") {
		        x.className += " responsive";
		    } else {
		        x.className = "topnav";
		    }
		}
		</script>
  
