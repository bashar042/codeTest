<?php
require "vendor/autoload.php";
$transactionCommission = new TransactionCommission();
$outputs = $transactionCommission->getTransactionCommission(file_get_contents($argv[1]));
if(!empty($outputs)){
    for($i=0;$i<count($outputs);$i++){
        echo $outputs[$i]."\n";
    }
}

