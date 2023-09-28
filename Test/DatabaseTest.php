<?php

require_once __DIR__ . '/../Config/Database.php';

use Config\Database;

$dbTest = Database::getConnection();
echo "Berhasil Terkoneksi" . PHP_EOL;
