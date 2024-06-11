<?php
session_start();
session_unset();
session_destroy();
header('Location: formSignIn.php?alert=logOut');
