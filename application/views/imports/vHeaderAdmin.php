<?php if(isset($this->session->userdata['adminSession'])){
    echo"asdAS";
    ?>
<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <title>Admin ES</title>
    <link href="<?php echo base_url('assets/jcAssets/css/corecss.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/jcAssets/css/bootstrap-4.0.0-beta-dist/bootstrap.min.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/jcAssets/css/bootstrap-4.0.0-beta-dist/bootstrap.min.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/jcAssets/font-awesome-4.7.0/css/font-awesome.min.css')?>" rel="stylesheet" />

    <script src="<?php echo base_url('assets/jcAssets/js/popper.min.js"')?>"></script>
    <script src="<?php echo base_url('assets/jcAssets/js/jquery-3.2.1.min.js"')?>"></script>
    <script src="<?php echo base_url('assets/jcAssets/js/bootstrap.min.js"')?>"></script>

  </head>
<?php }else{
        redirect("cLogin/login");
        }?>