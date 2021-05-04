const formContainer = document.getElementById("form-container");
const tableContainer = document.getElementById("table-container");

function showAddMahasiswaForm() {
  request("GET", "add-form.php", null, function (res) {
    formContainer.innerHTML = res.responseText;
  });
}

function showEditMahasiswaForm(nim) {
  request("GET", "edit-form.php?nim=" + nim, null, function (res) {
    formContainer.innerHTML = res.responseText;
  });
}

function handleAddMahasiswaFormSubmit(e) {
  e.preventDefault();

  const form = document.getElementById('add-mahasiswa-form');
  const data = {
    nim: form.querySelector("input[name=nim]").value,
    nama: form.querySelector("input[name=nama]").value,
    uts: form.querySelector("input[name=uts]").value,
    uas: form.querySelector("input[name=uas]").value,
    tugas: form.querySelector("input[name=tugas]").value,
  };

  request("POST", "add.php", data, function (res) {
    alert(res.responseText);
    form.reset();
    renderTable();
  });
}

function handleEditMahasiswaFormSubmit(e) {
  e.preventDefault();

  const form = document.getElementById('edit-mahasiswa-form');
  const oldNim = form.querySelector("input[name=old-nim]").value;
  const data = {
    nim: form.querySelector("input[name=nim]").value,
    nama: form.querySelector("input[name=nama]").value,
    uts: form.querySelector("input[name=uts]").value,
    uas: form.querySelector("input[name=uas]").value,
    tugas: form.querySelector("input[name=tugas]").value,
  };

  request("POST", "edit.php?nim=" + oldNim, data, function (res) {
    alert(res.responseText);
    showAddMahasiswaForm();
    renderTable();
  });
}

function handleEditButtonClick(nim) {
  showEditMahasiswaForm(nim);
}

function handleDeleteButtonClick(nim) {
  const agree = confirm("Apakah Anda yakin ingin menghapus data ini?");
  if (agree) {
    const url = "delete.php?nim=" + nim;
    request("GET", url, null, function (res) {
      renderTable();
    });
  }
}

function renderTable() {
  request("GET", "table.php", null, function (res) {
    document.getElementById("table-container").innerHTML = res.responseText;
  });
}
