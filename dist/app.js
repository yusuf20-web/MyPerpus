let addRow = document.getElementById("add-row");
addRow.addEventListener("click", function () {
  let table = document.getElementById('table').getElementsByTagName("tbody")[0];
  let newRow = table.insertRow(table.rows.length);

  let namaBukuCell = newRow.insertCell(0);
  let aksiCell = newRow.insertCell(1);
  let bukuName = document.getElementById("id_buku");
  //UNTUK MENAMPILKAN ISI DARI NAMA BUKU(BERUPA TEXT)
  bukuName = bukuName.options[bukuName.selectedIndex].text;
  let bukuId = document.getElementById("id_buku").value;
  if(bukuId == "") {
    alert("Buku Tidak Boleh Kosongan");
    return false;
  }
  namaBukuCell.innerHTML = bukuName + "<input type='hidden' name='id_buku' value='" + bukuId + "'>";

  namaBukuCell.innerHTML = bukuName;
  aksiCell.innerHTML = "<button onclick='deleteRow(this)' type='button' class='btn btn-sm btn-danger'>Hapus</button>";

});

function deleteRow(button) {
  let row = button.parentNode.parentNode;
  row.parentNode.removeChild(row);

}
