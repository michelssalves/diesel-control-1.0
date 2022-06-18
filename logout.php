<?php
session_start();
session_destroy();
header('Location: login-diesel-control-1.0');
exit();