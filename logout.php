<?php

//destroy the session
session_destroy();
//redirect to login.php
header("Location: login.php");
?>