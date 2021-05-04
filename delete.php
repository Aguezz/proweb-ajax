<?php

require_once './lib/connection.php';

$nim = $_GET['nim'];

$handle = $db->Prepare("DELETE FROM `mahasiswa` WHERE `nim` = ? LIMIT 1");
$bindVariables = [
    0 => $nim,
];

$db->Execute($handle, $bindVariables);
