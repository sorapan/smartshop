<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?=base_url()?>asset/css/bootstrap.css">
    <?php
    if(isset($css))
        if(!is_array($css))
            echo '<link rel="stylesheet" href="'.$css.'">';
        else{
            foreach($css as $cssvalue)echo '<link rel="stylesheet" href="'.$cssvalue.'">';
        }
    ?>
</head>
<body>


    <?php $this->load->view($include);?>



<script src="<?=base_url()?>asset/js/jquery.js"></script>
<script src="<?=base_url()?>asset/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>asset/js/MenuControl.js"></script>
<?php
if(isset($js))
    if(!is_array($js))
        echo '<script src="'.$js.'"></script>';
    else
        foreach($js as $jsvalue)echo '<script src="'.$jsvalue.'"></script>';
?>
</body>
</html>

<?php

function titleMessage($msg = "Smartshop | Welcome"){
    if(isset($msg))return $msg;
}

?>