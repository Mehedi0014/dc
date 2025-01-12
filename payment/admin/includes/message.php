<div class="col-xs-12">
    <?php
    $message = "";
    if (isset($_GET['result'])) {
        $message_type = $_GET['result'];
        $alert_type = "";
        switch ($message_type) {
            case 'general_error':
                $message = 'Some thing not right. Change a few things up and try submitting again.';
                $alert_type = 'alert-danger';
                break;
            case 'import_error':
               $message = 'Some thing not right. Change a few things up and try submitting again.';
               $alert_type = 'alert-danger';
               break;
           case 'import_success':
               $message = 'Data Imported Successfully.';
               $alert_type = 'alert-success';
               break;
            case 'info':
                $message = 'Current Action Needs Your Attention, but it is <strong>Not Important.</strong>';
                $alert_type = 'alert-info';
                break;
            case 'general_warning':
                $message = 'Current Action Needs Your Attention, and it is <strong>Important</strong>.';
                $alert_type = 'alert-warning';
                break;
            case 'success':
                $message = 'Record <strong>Saved</strong> Successfully';
                $alert_type = 'alert-success';
                break;
            case 'delete':
                $message = 'Record <strong>Deleted</strong> Sucessfully';
                $alert_type = 'alert-danger';
                break;
            case 'nofile':
                $message = 'No Files Has Benn Found For Download. <strong>Change The Data Range and Try Again Deleted</strong>';
                $alert_type = 'alert-warning';
                break;
        }
    } elseif (isset($_GET['log_in'])) {
        $message_type = $_GET['log_in'];

        $message = "";
        $alert_type = "";
        switch ($message_type) {
            case 'false':
                $message = 'Some thing not right. Invalid User ID or Password Used.';
                $alert_type = 'alert-danger';
                break;
        }
        ?>
    <?php } ?>
    <div id="alert" class="alert <?php echo $alert_type; ?>" role="alert" style="font-size: 18px">
            <!--<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>-->
        <?php echo $message; ?>
    </div>

</div>