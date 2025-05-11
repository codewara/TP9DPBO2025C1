# Janji
_Saya Datuk Daneswara Raditya Samsura dengan NIM 2308224 mengerjakan Tugas Praktikum 9 pada Mata Kuliah Desain dan Pemrograman Berorientasi Objek (DPBO) untuk keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin_

# Deskripsi & Desain Program

Program mengimplementasi desain arsitektur Model-View-Presenter (MVP) dengan 1 tabel dan 1 model, yaitu `Mahasiswa`. Pada model juga dapat diimplementasi Create-Read-Update-Delete (CRUD) sebagai metode pengelolaan data.

```plaintext
Program
├── model/
│   ├── DB.class.php
│   │   ├── connect ()
│   │   ├── close   ()
│   │   ├── fetch   ()
│   │   └── execute ([query])
│   ├── Mahasiswa.class.php
│   │   ├── setter
│   │   └── getter
│   ├── TabelMahasiswa.class.php
│   │   ├── create ([data])
│   │   ├── read   ()
│   │   ├── update ([data])
│   │   └── delete ([ID])
│   └── Template.class.php
│       ├── clear      ()
│       ├── write      ()
│       ├── getContent ()
│       └── replace    ([old], [new])
├── view/
│   ├── KontrakPresenter.presenter.php
│   └── ProsesMahasiswa.php
│       ├── setView ([view])
│       ├── add     ([data])
│       ├── getAll  ()
│       ├── update  ([data])
│       └── delete  ([ID])
└── presenter/
    ├── KontrakView.php
    └── TampilMahasiswa.php
        ├── table ()
        └── form  ([ID])
```

- Template yang digunakan hanya __2__, yaitu `skin.html` yang akan menampilkan tabel dari model (`table()`), dan `form.html` yang akan menampilkan form untuk fitur create dan update, yang mana keduanya akan me-replace indikator tertentu untuk menyesuaikan laman (create atau update pada `form([ID])`).
- Setiap presenter bertanggung jawab penuh untuk pengambilan dan pengelolaan data dari model, dan menyediakannya untuk digunakan oleh view tanpa melibatkan logika database dalam kelas view.

# Dokumentasi
https://github.com/user-attachments/assets/aa43fbd0-6861-48d2-ab17-5d18642c4c5c
