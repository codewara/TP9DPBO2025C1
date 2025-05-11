<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

include_once("presenter/ProsesMahasiswa.php");
include_once("view/TampilMahasiswa.php");

$present = new ProsesMahasiswa(null);
$view = new TampilMahasiswa($present);
$present->setView($view);

if (isset ($_GET['form'])) $present->formView ($_GET['form'] == 'X' ? null : $_GET['form']);

else if (isset ($_POST['add'])) $present->add ($_POST);

else if (isset ($_POST['edit'])) $present->update ($_POST);

else if (!empty ($_GET['delete_id']))  $present->delete($_GET['delete_id']);

else $present->tableView ();
