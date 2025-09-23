<?php
session_start();
session_destroy();
header("location:check_session.php");
?>