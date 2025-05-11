<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

// Kelas yang berisikan tabel dari mahasiswa
class TabelMahasiswa extends DB {
    function create ($data) {
        $query = "INSERT INTO mahasiswa (nim, nama, tempat, tl, gender, email, telp)
                  VALUES ('$data[nim]', '$data[nama]', '$data[tempat]', '$data[tanggal_lahir]', '$data[gender]', '$data[email]', '$data[telepon]')";
        return $this->execute($query);
    }

    function read () {
        $query = "SELECT * FROM mahasiswa";
        return $this->execute($query);
    }

    function update ($data) {
        $query = "UPDATE mahasiswa 
                  SET nim='$data[nim]', nama='$data[nama]', tempat='$data[tempat]', tl='$data[tanggal_lahir]', gender='$data[gender]', email='$data[email]', telp='$data[telepon]'
                  WHERE id='$data[id]'";
        return $this->execute($query);
    }

    function delete ($id) {
        $query = "DELETE FROM mahasiswa WHERE id='$id'";
        return $this->execute($query);
    }
}
