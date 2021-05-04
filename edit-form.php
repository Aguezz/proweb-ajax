<?php

require_once './lib/connection.php';

$nim = $_GET['nim'];
$handle = $db->Prepare("SELECT * FROM `mahasiswa` WHERE nim = ? LIMIT 1");
$bindVariables = [0 => $nim];

$result = $db->Execute($handle, $bindVariables);
$mahasiswa = $result->FetchObj();

?>

<form action="" id="edit-mahasiswa-form" onsubmit="handleEditMahasiswaFormSubmit(event)">
    <h2>Edit Mahasiswa</h2>

    <input type="hidden" name="old-nim" value="<?= $nim ?>">

    <div>
        <label>NIM</label>
        <input type="text" name="nim" value="<?= htmlentities($mahasiswa->nim) ?>" placeholder="NIM" required>
    </div>
    <div>
        <label>Nama</label>
        <input type="text" name="nama" value="<?= htmlentities($mahasiswa->nama) ?>" placeholder="Nama" required>
    </div>
    <div>
        <label>UTS</label>
        <input type="number" name="uts" min="0" max="100" value="<?= $mahasiswa->uts ?>" placeholder="UTS">
    </div>
    <div>
        <label>UAS</label>
        <input type="number" name="uas" min="0" max="100" value="<?= $mahasiswa->uas ?>" placeholder="UAS">
    </div>
    <div>
        <label>Tugas</label>
        <input type="number" name="tugas" min="0" max="100" value="<?= $mahasiswa->tugas ?>" placeholder="Tugas">
    </div>

    <button type="submit">Simpan</button>
    <button type="button" onclick="showAddMahasiswaForm()">Cancel</button>
</form>