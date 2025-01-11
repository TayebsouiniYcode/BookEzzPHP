<?php 

include './../utils/Test.php';
include './../views/components/header.php';

    $test = new Test();

    $test->testUserDao();

include './../views/components/footer.php';
