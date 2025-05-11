<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

include_once("KontrakView.php");

class TampilMahasiswa implements KontrakView {
	private $prosesmahasiswa; // Presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function __construct ($presenter) { $this->prosesmahasiswa = $presenter; }

	function table () {
		$data = null;

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosesmahasiswa->getSize(); $i++) {
			$no = $i + 1;
			$data .= "<tr>
				<td>" . $no . "</td>
				<td>" . $this->prosesmahasiswa->getNim($i) . "</td>
				<td>" . $this->prosesmahasiswa->getNama($i) . "</td>
				<td>" . $this->prosesmahasiswa->getTempat($i) . "</td>
				<td>" . $this->prosesmahasiswa->getTl($i) . "</td>
				<td>" . $this->prosesmahasiswa->getGender($i) . "</td>
				<td>" . $this->prosesmahasiswa->getEmail($i) . "</td>
				<td>" . $this->prosesmahasiswa->getTelp($i) . "</td>
				<td>
					<a href='index.php?form=" . $i . "' class='btn btn-warning btn-sm'>Edit</a>
					<a href='index.php?delete_id=" . $this->prosesmahasiswa->getId($i) . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this item?\")'>Delete</a>
			</tr>";
		}
		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);

		// Menampilkan ke layar
		$this->tpl->write();
	}

	function form ($id = null) {
		$_id = false; // untuk menandakan apakah kita akan menampilkan form tambah atau edit
		if ($id != null) $_id = true;
		// Membaca template skin.html
		$this->tpl = new Template("templates/form.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("XID", $_id ? '<input type="hidden" name="id" value="' . $this->prosesmahasiswa->getId($id) . '">' : "");
		$this->tpl->replace("XNIM", $_id ? $this->prosesmahasiswa->getNim($id) : "");
		$this->tpl->replace("XNAME", $_id ? $this->prosesmahasiswa->getNama($id) : "");
		$this->tpl->replace("XTEMPAT", $_id ? $this->prosesmahasiswa->getTempat($id) : "");
		$this->tpl->replace("XTL", $_id ? $this->prosesmahasiswa->getTl($id) : "");
		$this->tpl->replace("XCOWO", $_id && $this->prosesmahasiswa->getGender($id) == "Laki-laki" ? "selected" : "");
		$this->tpl->replace("XCEWE", $_id && $this->prosesmahasiswa->getGender($id) == "Perempuan" ? "selected" : "");
		$this->tpl->replace("XEMAIL", $_id ? $this->prosesmahasiswa->getEmail($id) : "");
		$this->tpl->replace("XTELP", $_id ? $this->prosesmahasiswa->getTelp($id) : "");
		$this->tpl->replace("XTYPE", $_id ? "EDIT" : "TAMBAH");
		$this->tpl->replace("XSUBMIT", $_id ? "edit" : "add");

		// Menampilkan ke layar
		$this->tpl->write();
	}
}
