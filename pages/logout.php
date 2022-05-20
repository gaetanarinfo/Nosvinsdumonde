<?php

unset($_SESSION['user_id']);
session_destroy();
header("Location: /fr/");