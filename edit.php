<?php

require_once './lib/connection.php';

$oldNim = $_GET['nim'];

$newNim = $_POST['nim'];
$nama = $_POST['nama'];
$uts = $_POST['uts'] ? $_POST['uts'] : 0;
$uas = $_POST['uas'] ? $_POST['uas'] : 0;
$tugas = $_POST['tugas'] ? $_POST['tugas'] : 0;

$handle = $db->Prepare("UPDATE `mahasiswa` SET `nim` = ?, `nama` = ? , `uts` = ?, `uas` = ?, `tugas` = ? WHERE `nim` = ? LIMIT 1");
$bindVariables = [
    0 => $newNim,
    1 => $nama,
    2 => $uts,
    3 => $uas,
    4 => $tugas,
    5 => $oldNim,
];

$db->Execute($handle, $bindVariables);

echo $db->ErrorMsg();
echo "Data berhasil diedit";
