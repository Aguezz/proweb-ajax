<form action="" id="add-mahasiswa-form" onsubmit="handleAddMahasiswaFormSubmit(event)">
    <h2>Tambah Mahasiswa</h2>

    <div>
        <label>NIM</label>
        <input type="text" name="nim" placeholder="NIM" required>
    </div>
    <div>
        <label>Nama</label>
        <input type="text" name="nama" placeholder="Nama" required>
    </div>
    <div>
        <label>UTS</label>
        <input type="number" min="0" max="100" name="uts" placeholder="UTS">
    </div>
    <div>
        <label>UAS</label>
        <input type="number" min="0" max="100" name="uas" placeholder="UAS">
    </div>
    <div>
        <label>Tugas</label>
        <input type="number" min="0" max="100" name="tugas" placeholder="Tugas">
    </div>

    <button type="submit">Tambah</button>
    <button type="reset">Reset</button>
</form>