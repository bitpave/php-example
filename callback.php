<?php

if($_POST['signature'] == 'client_secret' AND $_POST['status'] == 'completed') {
  
// retrieve custom data
$data = json_decode($_POST['custom_data']);

// apply your business logic here

}
