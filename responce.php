<?php
session_start();
$oldid = $_SESSION['TID'];
$reqid = $_GET['payment_request_id'];
$status = $_GET['payment_status'];
$id = $_GET['payment_id'];
if($oldid == $reqid)
{
    if($status == 'Credit')
    {
        echo "SuccessFully <br/>";
        echo "Payment Id is : ".$id."<br/>";
    }
}
?>
<a href="index">Go To Home</a>
