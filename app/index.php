<?php
header('Content-Type:application/json');
print_r(file_get_contents('http://ip.jsontest.com/'.$_SERVER['REQUEST_URI']));
exit;