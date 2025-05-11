<?php

include_once("model/Template.class.php");
include_once("model/DB.class.php");
include_once("model/Mahasiswa.class.php");
include_once("model/TabelMahasiswa.class.php");
include_once("view/TampilMahasiswa.php");

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

// Interface atau gambaran dari presenter akan seperti apa
interface KontrakPresenter
{	
	public function setView($view);
	public function add ($data);
	public function getAll ();
	public function update ($data);
	public function delete ($id);
	public function getId($i);
	public function getNim($i);
	public function getNama($i);
	public function getTempat($i);
	public function getTl($i);
	public function getGender($i);
	public function getSize();
}