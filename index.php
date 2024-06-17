<?php

use AnalisticsData\Requests\HttpRequests;








require_once "vendor/autoload.php";


 

$request =  new  HttpRequests();


print_r(["<pre>",$request->get('oh'),$request->get('r')]);



