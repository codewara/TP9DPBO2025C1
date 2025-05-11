<?php

include_once("KontrakPresenter.php");

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

class ProsesMahasiswa implements KontrakPresenter {
	private $model;
	private $view;
	private $data = [];

	function __construct($view) {
		try {	
			$db_host = "localhost"; // host 
			$db_user = "root"; // user
			$db_password = ""; // password
			$db_name = "mvp_php"; // nama basis data
			$this->model = new TabelMahasiswa($db_host, $db_user, $db_password, $db_name); // instansi TabelMahasiswa
			$this->view = $view; // instansi TampilMahasiswa
			$this->data = array(); // instansi list untuk data Mahasiswa
		} catch (Exception $e) { echo "yah error" . $e->getMessage(); }
	}

	function setView($view) { $this->view = $view; } // set view

	function add ($data) {
		try {
			$this->model->connect ();
			$this->model->create ($data);
			$this->model->close();
		} catch (Exception $e) { echo "yah error" . $e->getMessage(); }

		header("Location: index.php");
	}

	function getAll () {
		try {
			// mengambil data di tabel Mahasiswa
			$this->model->connect ();
			$this->model->read ();

			while ($row = $this->model->fetch ()) {
				$mahasiswa = new Mahasiswa(); // instansiasi objek mahasiswa untuk setiap data mahasiswa
				$mahasiswa->setId($row['id']); // mengisi id
				$mahasiswa->setNim($row['nim']); // mengisi nim
				$mahasiswa->setNama($row['nama']); // mengisi nama
				$mahasiswa->setTempat($row['tempat']); // mengisi tempat
				$mahasiswa->setTl($row['tl']); // mengisi tl
				$mahasiswa->setGender($row['gender']); // mengisi gender
				$mahasiswa->setEmail($row['email']); // mengisi email
				$mahasiswa->setTelp($row['telp']); // mengisi telp

				$this->data[] = $mahasiswa; // tambahkan data mahasiswa ke dalam list
			} $this->model->close();
		} catch (Exception $e) { echo "yah error part 2" . $e->getMessage(); }
	}

	function update ($data) {
		try {
			// mengupdate data di tabel Mahasiswa
			$this->model->connect ();
			$this->model->update ($data);
			$this->model->close();
		} catch (Exception $e) { echo "yah error" . $e->getMessage(); }

		header("Location: index.php");
	}

	function delete ($id) {
		try {
			// menghapus data di tabel Mahasiswa
			$this->model->connect ();
			$this->model->delete ($id);
			$this->model->close();
		} catch (Exception $e) { echo "yah error" . $e->getMessage(); }

		header("Location: index.php");
	}

	function formView ($id = null) {
		$this->getAll (); // ambil semua data mahasiswa
		$this->view->form ($id);
	}

	function tableView () {
		$this->getAll (); // ambil semua data mahasiswa
		$this->view->table (); // tampilkan data mahasiswa
	}

	function getId($i) 		{ return $this->data[$i]->id; 		}
	function getNim($i) 	{ return $this->data[$i]->nim; 		}
	function getNama($i) 	{ return $this->data[$i]->nama; 	}
	function getTempat($i) 	{ return $this->data[$i]->tempat; 	}
	function getTl($i) 		{ return $this->data[$i]->tl; 		}
	function getGender($i) 	{ return $this->data[$i]->gender; 	}
	function getEmail($i) 	{ return $this->data[$i]->email; 	}
	function getTelp($i) 	{ return $this->data[$i]->telp; 	}
	function getSize() 		{ return sizeof($this->data); 		}
}
