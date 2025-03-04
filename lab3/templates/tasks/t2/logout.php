<?php
session_start();
session_unset();
session_destroy();
header('Location: http://lab3.local/templates/tasks/t2/1.php');
exit;