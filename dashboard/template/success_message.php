<?php  
if($this->session->userdata('status_msg')){
?>
    <div class="alert alert-<?php echo $_SESSION['status_type'] ?>" role="alert">
        <?php echo $_SESSION['status_msg'] ?>
    </div>
<?php
unset($_SESSION['status_msg']);	
unset($_SESSION['status_type']);	
}
?>
<?php  
if($this->session->userdata('delete_msg')){
?>
    <div class="alert alert-<?php echo $_SESSION['delete_type'] ?>" role="alert">
        <?php echo $_SESSION['delete_msg'] ?>
    </div>
<?php
unset($_SESSION['delete_msg']);	
unset($_SESSION['delete_type']);	
}
?>
<?php  
if($this->session->userdata('update_msg')){
?>
    <div class="alert alert-<?php echo $_SESSION['update_type'] ?>" role="alert">
        <?php echo $_SESSION['update_msg'] ?>
    </div>
<?php
unset($_SESSION['update_msg']);	
unset($_SESSION['update_type']);	
}
?>