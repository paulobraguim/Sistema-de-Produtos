<?php

require "app/database/Database.php";
require "config/config.php";

$c = new Database(DB, USER, PASS);