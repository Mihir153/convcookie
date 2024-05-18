<?php
if (!class_exists('Process_Ajax_Call')) {
    class Process_Ajax_Call
    {
        public function __construct()
        {
            add_action('wp_ajax_process_ajax', array($this, 'process_ajax'));
        }

        public function process_ajax()
        {
           // print_r($_POST);exit;
            // $title = $_POST['title'];
            // $message = $_POST['message'];
            // $buttonlabel1 = $_POST['buttonlabel1'];
            // $buttonlabel2 = $_POST['buttonlabel2'];
            // $cookielabel = $_POST['cookielabel'];
            // $cookieduration = $_POST['cookieduration'];
            // $cookiedescription = $_POST['cookiedescription'];

            // update_option('cookie_title', $title);
            // update_option('cookie_message', $message);
            // update_option('cookie_buttonlabel1', $buttonlabel1);
            // update_option('cookie_buttonlabel2', $buttonlabel2);

        }
    }

}

new Process_Ajax_Call();
?>
