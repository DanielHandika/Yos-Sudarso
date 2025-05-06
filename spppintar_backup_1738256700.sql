

CREATE TABLE `backset` (
  `url` varchar(100) NOT NULL,
  `sessiontime` varchar(4) DEFAULT NULL,
  `footer` varchar(50) DEFAULT NULL,
  `themesback` varchar(2) DEFAULT NULL,
  `responsive` varchar(2) DEFAULT NULL,
  `app` varchar(20) NOT NULL,
  `harihapus` int(3) NOT NULL,
  PRIMARY KEY (`url`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO backset VALUES("http://localhost:8080/spppintar","1001","SPP PINTAR","2","0","SPP Pintar","7");



CREATE TABLE `bebasan` (
  `no` int(10) NOT NULL AUTO_INCREMENT,
  `period_id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `jenis_id` int(10) NOT NULL,
  `bill` int(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `sudahbayar` int(10) NOT NULL,
  `kasir` varchar(100) NOT NULL,
  `tgl_input` date NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO bebasan VALUES("1","1","1","2","50000","belum","0","daniel","2025-01-31");
INSERT INTO bebasan VALUES("2","1","2","2","50000","belum","0","daniel","2025-01-31");
INSERT INTO bebasan VALUES("3","1","3","2","50000","belum","0","daniel","2025-01-31");



CREATE TABLE `bebasan_pay` (
  `no` int(10) NOT NULL AUTO_INCREMENT,
  `bebasan_id` int(10) NOT NULL,
  `period_id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `kasir` varchar(100) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `sisa` int(10) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO bebasan_pay VALUES("1","1","1","1","2025-01-30","daniel","50000","0");



CREATE TABLE `bulanan` (
  `no` int(10) NOT NULL AUTO_INCREMENT,
  `period_id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `jenis_id` int(10) NOT NULL,
  `month_id` int(10) NOT NULL,
  `bulanan_bill` int(10) NOT NULL,
  `bulanan_status` varchar(10) NOT NULL,
  `bulanan_bayar` int(10) NOT NULL,
  `kasir` varchar(100) NOT NULL,
  `tgl_input` date NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

INSERT INTO bulanan VALUES("1","1","1","1","1","50000","belum","0","daniel","2025-01-30");
INSERT INTO bulanan VALUES("2","1","1","1","2","50000","belum","0","daniel","2025-01-30");
INSERT INTO bulanan VALUES("3","1","1","1","3","50000","belum","0","daniel","2025-01-30");
INSERT INTO bulanan VALUES("4","1","1","1","4","50000","belum","0","daniel","2025-01-30");
INSERT INTO bulanan VALUES("5","1","1","1","5","50000","belum","0","daniel","2025-01-30");
INSERT INTO bulanan VALUES("6","1","1","1","6","50000","belum","0","daniel","2025-01-30");
INSERT INTO bulanan VALUES("7","1","1","1","7","50000","belum","0","daniel","2025-01-30");
INSERT INTO bulanan VALUES("8","1","1","1","8","50000","belum","0","daniel","2025-01-30");
INSERT INTO bulanan VALUES("9","1","1","1","9","50000","belum","0","daniel","2025-01-30");
INSERT INTO bulanan VALUES("10","1","1","1","10","50000","belum","0","daniel","2025-01-30");
INSERT INTO bulanan VALUES("11","1","1","1","11","50000","belum","0","daniel","2025-01-30");
INSERT INTO bulanan VALUES("12","1","1","1","12","50000","belum","0","daniel","2025-01-30");
INSERT INTO bulanan VALUES("13","1","2","1","1","50000","sudah","50000","daniel","2025-01-30");
INSERT INTO bulanan VALUES("14","1","2","1","2","50000","belum","0","daniel","2025-01-30");
INSERT INTO bulanan VALUES("15","1","2","1","3","50000","belum","0","daniel","2025-01-30");
INSERT INTO bulanan VALUES("16","1","2","1","4","50000","belum","0","daniel","2025-01-30");
INSERT INTO bulanan VALUES("17","1","2","1","5","50000","belum","0","daniel","2025-01-30");
INSERT INTO bulanan VALUES("18","1","2","1","6","50000","belum","0","daniel","2025-01-30");
INSERT INTO bulanan VALUES("19","1","2","1","7","50000","belum","0","daniel","2025-01-30");
INSERT INTO bulanan VALUES("20","1","2","1","8","50000","belum","0","daniel","2025-01-30");
INSERT INTO bulanan VALUES("21","1","2","1","9","50000","belum","0","daniel","2025-01-30");
INSERT INTO bulanan VALUES("22","1","2","1","10","50000","belum","0","daniel","2025-01-30");
INSERT INTO bulanan VALUES("23","1","2","1","11","50000","belum","0","daniel","2025-01-30");
INSERT INTO bulanan VALUES("24","1","2","1","12","50000","belum","0","daniel","2025-01-30");
INSERT INTO bulanan VALUES("25","1","3","1","1","50000","belum","0","daniel","2025-01-30");
INSERT INTO bulanan VALUES("26","1","3","1","2","50000","belum","0","daniel","2025-01-30");
INSERT INTO bulanan VALUES("27","1","3","1","3","50000","belum","0","daniel","2025-01-30");
INSERT INTO bulanan VALUES("28","1","3","1","4","50000","belum","0","daniel","2025-01-30");
INSERT INTO bulanan VALUES("29","1","3","1","5","50000","belum","0","daniel","2025-01-30");
INSERT INTO bulanan VALUES("30","1","3","1","6","50000","belum","0","daniel","2025-01-30");
INSERT INTO bulanan VALUES("31","1","3","1","7","50000","belum","0","daniel","2025-01-30");
INSERT INTO bulanan VALUES("32","1","3","1","8","50000","belum","0","daniel","2025-01-30");
INSERT INTO bulanan VALUES("33","1","3","1","9","50000","belum","0","daniel","2025-01-30");
INSERT INTO bulanan VALUES("34","1","3","1","10","50000","belum","0","daniel","2025-01-30");
INSERT INTO bulanan VALUES("35","1","3","1","11","50000","belum","0","daniel","2025-01-30");
INSERT INTO bulanan VALUES("36","1","3","1","12","50000","belum","0","daniel","2025-01-30");



CREATE TABLE `chmenu` (
  `userjabatan` varchar(20) NOT NULL,
  `menu1` varchar(1) DEFAULT NULL,
  `menu2` varchar(1) DEFAULT NULL,
  `menu3` varchar(1) DEFAULT '0',
  `menu4` varchar(1) DEFAULT '0',
  `menu5` varchar(1) DEFAULT '0',
  `menu6` varchar(1) DEFAULT '0',
  `menu7` varchar(1) DEFAULT '0',
  `menu8` varchar(1) DEFAULT '0',
  `menu9` varchar(1) DEFAULT '0',
  `menu10` varchar(1) DEFAULT '0',
  `menu11` varchar(1) DEFAULT '0',
  PRIMARY KEY (`userjabatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO chmenu VALUES("admin","4","4","4","4","4","4","4","4","4","4","4");
INSERT INTO chmenu VALUES("Karyawan","4","5","4","3","3","2","3","5","1","1","1");
INSERT INTO chmenu VALUES("Operator","5","5","5","5","5","5","5","5","1","1","1");



CREATE TABLE `class` (
  `no` int(10) NOT NULL AUTO_INCREMENT,
  `kelas` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO class VALUES("1","Kelas 7","active");
INSERT INTO class VALUES("2","Kelas 8","active");
INSERT INTO class VALUES("3","Kelas 9","active");



CREATE TABLE `data` (
  `nama` varchar(100) DEFAULT NULL,
  `tagline` varchar(100) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `notelp` varchar(20) DEFAULT NULL,
  `signature` varchar(255) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `web` varchar(100) NOT NULL,
  `npwp` varchar(100) NOT NULL,
  `avatar` varchar(150) NOT NULL,
  `no` int(11) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO data VALUES("SMP Yos Sudarso","Profesional Terpercaya","Bandar Jaya","02100110011","Tut Wuri Handayani","fyma@gmail.com","www.fymamedia/demo.com","19171171718171","upload/image/title.png","0");



CREATE TABLE `event_colors` (
  `no` int(10) NOT NULL AUTO_INCREMENT,
  `warna` varchar(10) NOT NULL,
  `kodewarna` varchar(10) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

INSERT INTO event_colors VALUES("1","Upacara","#64C5B1");
INSERT INTO event_colors VALUES("3","Kelulusan","#32C861");
INSERT INTO event_colors VALUES("4","Pembayaran","#FFA91C");
INSERT INTO event_colors VALUES("5","Ujian","#5553CE");
INSERT INTO event_colors VALUES("7","Festival","#F06292");
INSERT INTO event_colors VALUES("10","Liburan","#313A46");
INSERT INTO event_colors VALUES("13","Study Tour","#FF7F50");
INSERT INTO event_colors VALUES("14","Pramuka","#DAA520");



CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO events VALUES("1","Ujian","#5553CE","2025-01-30 00:00:00","2025-01-31 00:00:00");
INSERT INTO events VALUES("2","Libur Tahun Baru","#313A46","2025-01-01 00:00:00","2025-01-02 00:00:00");
INSERT INTO events VALUES("3","Study Tour","#FF7F50","2025-01-01 00:00:00","2025-01-02 00:00:00");
INSERT INTO events VALUES("4","Libur","#313A46","2025-01-02 00:00:00","2025-01-03 00:00:00");



CREATE TABLE `graduation` (
  `grad_id` int(10) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `user` varchar(20) NOT NULL,
  PRIMARY KEY (`grad_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `info` (
  `nama` varchar(100) DEFAULT NULL,
  `userid` int(10) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO info VALUES("daniel","27","upload/image/IMG_20231206_100834.jpg","2025-01-30","<h1>Pengumuman baru:</h1>Besok Belajar Seperti Biasa<br><p></p>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ","1");



CREATE TABLE `jabatan` (
  `kode` varchar(20) NOT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `no` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`kode`),
  KEY `no` (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

INSERT INTO jabatan VALUES("0001","admin","30");
INSERT INTO jabatan VALUES("0003","Karyawan","31");
INSERT INTO jabatan VALUES("0004","Operator","34");
INSERT INTO jabatan VALUES("0005","Guru","35");



CREATE TABLE `jenis_bayar` (
  `jenis_id` int(10) NOT NULL AUTO_INCREMENT,
  `period_id` int(10) NOT NULL,
  `pos_bayar_id` int(10) NOT NULL,
  `jenis_pembayaran` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tahunajar` varchar(10) NOT NULL,
  `update_time` date NOT NULL,
  `create_time` date NOT NULL,
  PRIMARY KEY (`jenis_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO jenis_bayar VALUES("1","1","1","bulanan","SPP","2024/2025","2025-01-30","2025-01-30");
INSERT INTO jenis_bayar VALUES("2","1","2","bebas","Buku LKS Sem 1","2024/2025","2025-01-30","2025-01-30");



CREATE TABLE `months` (
  `month_id` int(11) NOT NULL AUTO_INCREMENT,
  `month_name` varchar(45) DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`month_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO months VALUES("1","Juli","active");
INSERT INTO months VALUES("2","Agustus","inactive");
INSERT INTO months VALUES("3","September","inactive");
INSERT INTO months VALUES("4","Oktober","inactive");
INSERT INTO months VALUES("5","November","inactive");
INSERT INTO months VALUES("6","Desember","inactive");
INSERT INTO months VALUES("7","Januari","inactive");
INSERT INTO months VALUES("8","Februari","inactive");
INSERT INTO months VALUES("9","Maret","inactive");
INSERT INTO months VALUES("10","April","inactive");
INSERT INTO months VALUES("11","Mei","inactive");
INSERT INTO months VALUES("12","Juni","inactive");



CREATE TABLE `periode` (
  `no` int(10) NOT NULL AUTO_INCREMENT,
  `period_start` year(4) NOT NULL,
  `period_end` year(4) NOT NULL,
  `period_name` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO periode VALUES("1","2024","2025","2024/2025","active");



CREATE TABLE `pin` (
  `pin` varchar(255) NOT NULL,
  `ubah` int(2) NOT NULL,
  PRIMARY KEY (`ubah`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO pin VALUES("10470c3b4b1fed12c3baac014be15fac67c6e815","2");



CREATE TABLE `pos_bayar` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO pos_bayar VALUES("1","SPP","");
INSERT INTO pos_bayar VALUES("2","Buku LKS Sem 1","");



CREATE TABLE `rekening` (
  `no` int(10) NOT NULL AUTO_INCREMENT,
  `bank` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `norek` varchar(20) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO rekening VALUES("4","BCA","ANDI M","120919101");



CREATE TABLE `student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(45) DEFAULT NULL,
  `nisn` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `birth_place` varchar(45) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `nohp` varchar(45) DEFAULT NULL,
  `hobi` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `ibu` varchar(100) DEFAULT NULL,
  `ayahwali` varchar(100) DEFAULT NULL,
  `waortu` varchar(45) DEFAULT NULL,
  `kelas_id` varchar(11) DEFAULT NULL,
  `jurusan` int(11) DEFAULT NULL,
  `catatan` text NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `input_date` date DEFAULT NULL,
  `last_update` date DEFAULT NULL,
  PRIMARY KEY (`student_id`),
  KEY `fk_student_class1_idx` (`kelas_id`),
  KEY `fk_student_majors1_idx` (`jurusan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO student VALUES("1","1234","0","10470c3b4b1fed12c3baac014be15fac67c6e815","Rini","Laki Laki","Lampung","2025-01-14","student/image/IMG_20231206_100845.jpg","+6285977299459","Menulis","Bandar Jaya","A","B","  +6285977299459 ","1","1","Anak Nakal","active","2025-01-30","2025-01-30");
INSERT INTO student VALUES("2","1111","0","10470c3b4b1fed12c3baac014be15fac67c6e815","daneil","Laki Laki","ss","2025-01-29","upload/image/placeholder150x150.png","+6285977299459","d","aa","vv","aa","
  +6285977299459","2","1"," asdw","active","2025-01-30","2025-01-30");
INSERT INTO student VALUES("3","2905","0","10470c3b4b1fed12c3baac014be15fac67c6e815","Sulis","Laki Laki","Lampung","2025-01-30","upload/image/placeholder150x150.png","+6285977299459","Main bola","ad","aa","bb","
  +6285977299459","3","1"," ","active","2025-01-30","2025-01-30");



CREATE TABLE `student_alumni` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(45) DEFAULT NULL,
  `nisn` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `birth_place` varchar(45) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `nohp` varchar(45) DEFAULT NULL,
  `hobi` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `ibu` varchar(100) DEFAULT NULL,
  `ayahwali` varchar(100) DEFAULT NULL,
  `waortu` varchar(45) DEFAULT NULL,
  `kelas_id` varchar(11) DEFAULT NULL,
  `jurusan` int(11) DEFAULT NULL,
  `catatan` text NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `input_date` date DEFAULT NULL,
  `last_update` date DEFAULT NULL,
  PRIMARY KEY (`student_id`),
  KEY `fk_student_class1_idx` (`kelas_id`),
  KEY `fk_student_majors1_idx` (`jurusan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `uang_kategori` (
  `kategori_id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO uang_kategori VALUES("1","Pembayaran Siswa","in","Semua pemasukan yang diperoleh dari iuran bulanan/non bulanan siswa");
INSERT INTO uang_kategori VALUES("4","Dana BOS","in","dana bantuan operasional");
INSERT INTO uang_kategori VALUES("5","Listrik","out","Beban Listrik");



CREATE TABLE `uang_masuk_keluar` (
  `no` int(10) NOT NULL AUTO_INCREMENT,
  `tipe` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `kasir` varchar(100) NOT NULL,
  `kategori_id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `period_id` int(10) NOT NULL,
  `bebas_id` int(10) NOT NULL,
  `bulanan_id` int(10) NOT NULL,
  `tgl_update` date NOT NULL,
  `tgl_input` date NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO uang_masuk_keluar VALUES("1","pay","SPP T.A 2024/2025","pembayaran bulanan","50000","daniel","1","2","1","0","13","2025-01-30","2025-01-30");
INSERT INTO uang_masuk_keluar VALUES("2","pay","Buku LKS Sem 1 T.A 2024/2025","pembayaran cicilan","50000","daniel","1","1","1","1","0","2025-01-30","2025-01-30");
INSERT INTO uang_masuk_keluar VALUES("3","in","Dana BOS","-","500000","daniel","4","0","0","0","0","2025-01-30","2025-01-30");
INSERT INTO uang_masuk_keluar VALUES("4","out","Listrik","Bayar Listrik Bulanan","300000","daniel","5","0","0","0","0","2025-01-30","2025-01-30");



CREATE TABLE `user` (
  `userna_me` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pa_ssword` varchar(70) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `nohp` varchar(20) DEFAULT NULL,
  `tgllahir` date DEFAULT NULL,
  `tglaktif` date DEFAULT NULL,
  `jabatan` varchar(20) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `no` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`userna_me`),
  KEY `no` (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

INSERT INTO user VALUES("admin","admin@admin.com","90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad","admin","alamat","111","2020-02-02","2020-02-02","admin","upload/image/placeholder.png","24");
INSERT INTO user VALUES("Admin1","admin@gmail.com","10470c3b4b1fed12c3baac014be15fac67c6e815","Daniel","aa","00","2025-01-30","2025-01-30","admin","upload/image/placeholder.png","26");
INSERT INTO user VALUES("amin","amin@gmail.com","d3232aa5222d3f0ac68819cddd15c4218a611d18","danielhandika","asdf","0","2025-01-30","2025-01-30","Operator","upload/image/IMG_20231206_100834.jpg","27");

