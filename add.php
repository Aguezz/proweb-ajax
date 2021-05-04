<?php

require_once './lib/connection.php';

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$uts = $_POST['uts'] ? $_POST['uts'] : 0;
$uas = $_POST['uas'] ? $_POST['uas'] : 0;
$tugas = $_POST['tugas'] ? $_POST['tugas'] : 0;

$handle = $db->Prepare("INSERT INTO `mahasiswa` (`nim`, `nama`, `uts`, `uas`, `tugas`) VALUES (?, ?, ?, ?, ?)");
$bindVariables = [
    0 => $nim,
    1 => $nama,
    2 => $uts,
    3 => $uas,
    4 => $tugas,
];

$db->Execute($handle, $bindVariables);

echo "Data berhasil ditambahkan";
