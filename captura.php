<?php 

// Va identificar el pago cuando se realice 
$payment = $_GET['payment_id'];
$status = $_GET['status'];
$payment_type= $_GET['payment_type'];
$order_id = $_GET['merchant_order_id'];

echo "<h3>Pago Exitoso</h3>";

echo $payment. '<br>';
echo $status. '<br>';
echo $payment_type. '<br>';
echo $order_id. '<br>';
?>