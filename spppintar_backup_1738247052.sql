

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

INSERT INTO bebasan VALUES("1","1","2","1","300000","belum","20000","admin","2022-06-26");
INSERT INTO bebasan VALUES("2","1","3","1","300000","belum","0","admin","2022-06-26");
INSERT INTO bebasan VALUES("3","1","4","1","300000","belum","0","admin","2022-06-26");
INSERT INTO bebasan VALUES("4","1","5","1","300000","belum","0","admin","2022-06-26");
INSERT INTO bebasan VALUES("5","1","6","1","300000","belum","0","admin","2022-06-26");
INSERT INTO bebasan VALUES("6","1","7","1","300000","belum","0","admin","2022-06-26");
INSERT INTO bebasan VALUES("7","1","8","1","300000","belum","0","admin","2022-06-26");
INSERT INTO bebasan VALUES("8","1","9","1","300000","belum","0","admin","2022-06-26");
INSERT INTO bebasan VALUES("9","1","10","1","300000","belum","0","admin","2022-06-26");
INSERT INTO bebasan VALUES("10","1","11","1","300000","belum","0","admin","2022-06-26");
INSERT INTO bebasan VALUES("11","1","12","1","300000","belum","0","admin","2022-06-26");
INSERT INTO bebasan VALUES("12","1","13","1","300000","belum","0","admin","2022-06-26");
INSERT INTO bebasan VALUES("13","1","15","1","300000","belum","0","admin","2022-06-26");
INSERT INTO bebasan VALUES("14","1","16","1","300000","belum","0","admin","2022-06-26");
INSERT INTO bebasan VALUES("15","1","17","1","300000","belum","0","admin","2022-06-26");
INSERT INTO bebasan VALUES("16","1","18","1","300000","belum","0","admin","2022-06-26");
INSERT INTO bebasan VALUES("17","1","19","1","300000","belum","0","admin","2022-06-26");
INSERT INTO bebasan VALUES("18","1","20","1","300000","belum","0","admin","2022-06-26");
INSERT INTO bebasan VALUES("19","1","21","1","300000","belum","0","admin","2022-06-26");
INSERT INTO bebasan VALUES("20","1","22","1","300000","belum","0","admin","2022-06-26");
INSERT INTO bebasan VALUES("21","1","23","1","300000","belum","0","admin","2022-06-26");
INSERT INTO bebasan VALUES("22","1","24","1","300000","belum","0","admin","2022-06-26");
INSERT INTO bebasan VALUES("23","1","25","1","300000","belum","0","admin","2022-06-26");



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

INSERT INTO bebasan_pay VALUES("1","1","1","2","2022-06-26","admin","20000","280000");



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
) ENGINE=InnoDB AUTO_INCREMENT=277 DEFAULT CHARSET=latin1;

INSERT INTO bulanan VALUES("1","1","2","2","1","300000","sudah","300000","admin","2022-06-26");
INSERT INTO bulanan VALUES("2","1","2","2","2","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("3","1","2","2","3","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("4","1","2","2","4","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("5","1","2","2","5","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("6","1","2","2","6","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("7","1","2","2","7","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("8","1","2","2","8","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("9","1","2","2","9","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("10","1","2","2","10","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("11","1","2","2","11","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("12","1","2","2","12","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("13","1","3","2","1","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("14","1","3","2","2","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("15","1","3","2","3","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("16","1","3","2","4","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("17","1","3","2","5","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("18","1","3","2","6","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("19","1","3","2","7","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("20","1","3","2","8","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("21","1","3","2","9","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("22","1","3","2","10","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("23","1","3","2","11","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("24","1","3","2","12","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("25","1","4","2","1","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("26","1","4","2","2","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("27","1","4","2","3","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("28","1","4","2","4","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("29","1","4","2","5","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("30","1","4","2","6","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("31","1","4","2","7","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("32","1","4","2","8","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("33","1","4","2","9","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("34","1","4","2","10","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("35","1","4","2","11","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("36","1","4","2","12","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("37","1","5","2","1","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("38","1","5","2","2","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("39","1","5","2","3","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("40","1","5","2","4","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("41","1","5","2","5","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("42","1","5","2","6","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("43","1","5","2","7","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("44","1","5","2","8","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("45","1","5","2","9","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("46","1","5","2","10","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("47","1","5","2","11","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("48","1","5","2","12","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("49","1","6","2","1","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("50","1","6","2","2","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("51","1","6","2","3","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("52","1","6","2","4","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("53","1","6","2","5","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("54","1","6","2","6","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("55","1","6","2","7","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("56","1","6","2","8","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("57","1","6","2","9","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("58","1","6","2","10","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("59","1","6","2","11","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("60","1","6","2","12","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("61","1","7","2","1","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("62","1","7","2","2","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("63","1","7","2","3","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("64","1","7","2","4","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("65","1","7","2","5","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("66","1","7","2","6","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("67","1","7","2","7","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("68","1","7","2","8","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("69","1","7","2","9","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("70","1","7","2","10","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("71","1","7","2","11","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("72","1","7","2","12","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("73","1","8","2","1","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("74","1","8","2","2","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("75","1","8","2","3","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("76","1","8","2","4","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("77","1","8","2","5","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("78","1","8","2","6","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("79","1","8","2","7","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("80","1","8","2","8","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("81","1","8","2","9","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("82","1","8","2","10","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("83","1","8","2","11","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("84","1","8","2","12","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("85","1","9","2","1","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("86","1","9","2","2","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("87","1","9","2","3","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("88","1","9","2","4","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("89","1","9","2","5","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("90","1","9","2","6","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("91","1","9","2","7","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("92","1","9","2","8","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("93","1","9","2","9","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("94","1","9","2","10","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("95","1","9","2","11","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("96","1","9","2","12","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("97","1","10","2","1","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("98","1","10","2","2","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("99","1","10","2","3","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("100","1","10","2","4","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("101","1","10","2","5","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("102","1","10","2","6","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("103","1","10","2","7","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("104","1","10","2","8","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("105","1","10","2","9","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("106","1","10","2","10","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("107","1","10","2","11","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("108","1","10","2","12","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("109","1","11","2","1","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("110","1","11","2","2","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("111","1","11","2","3","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("112","1","11","2","4","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("113","1","11","2","5","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("114","1","11","2","6","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("115","1","11","2","7","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("116","1","11","2","8","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("117","1","11","2","9","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("118","1","11","2","10","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("119","1","11","2","11","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("120","1","11","2","12","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("121","1","12","2","1","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("122","1","12","2","2","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("123","1","12","2","3","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("124","1","12","2","4","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("125","1","12","2","5","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("126","1","12","2","6","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("127","1","12","2","7","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("128","1","12","2","8","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("129","1","12","2","9","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("130","1","12","2","10","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("131","1","12","2","11","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("132","1","12","2","12","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("133","1","13","2","1","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("134","1","13","2","2","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("135","1","13","2","3","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("136","1","13","2","4","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("137","1","13","2","5","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("138","1","13","2","6","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("139","1","13","2","7","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("140","1","13","2","8","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("141","1","13","2","9","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("142","1","13","2","10","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("143","1","13","2","11","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("144","1","13","2","12","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("145","1","15","2","1","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("146","1","15","2","2","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("147","1","15","2","3","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("148","1","15","2","4","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("149","1","15","2","5","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("150","1","15","2","6","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("151","1","15","2","7","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("152","1","15","2","8","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("153","1","15","2","9","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("154","1","15","2","10","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("155","1","15","2","11","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("156","1","15","2","12","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("157","1","16","2","1","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("158","1","16","2","2","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("159","1","16","2","3","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("160","1","16","2","4","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("161","1","16","2","5","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("162","1","16","2","6","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("163","1","16","2","7","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("164","1","16","2","8","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("165","1","16","2","9","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("166","1","16","2","10","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("167","1","16","2","11","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("168","1","16","2","12","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("169","1","17","2","1","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("170","1","17","2","2","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("171","1","17","2","3","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("172","1","17","2","4","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("173","1","17","2","5","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("174","1","17","2","6","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("175","1","17","2","7","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("176","1","17","2","8","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("177","1","17","2","9","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("178","1","17","2","10","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("179","1","17","2","11","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("180","1","17","2","12","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("181","1","18","2","1","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("182","1","18","2","2","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("183","1","18","2","3","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("184","1","18","2","4","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("185","1","18","2","5","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("186","1","18","2","6","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("187","1","18","2","7","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("188","1","18","2","8","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("189","1","18","2","9","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("190","1","18","2","10","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("191","1","18","2","11","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("192","1","18","2","12","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("193","1","19","2","1","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("194","1","19","2","2","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("195","1","19","2","3","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("196","1","19","2","4","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("197","1","19","2","5","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("198","1","19","2","6","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("199","1","19","2","7","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("200","1","19","2","8","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("201","1","19","2","9","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("202","1","19","2","10","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("203","1","19","2","11","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("204","1","19","2","12","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("205","1","20","2","1","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("206","1","20","2","2","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("207","1","20","2","3","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("208","1","20","2","4","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("209","1","20","2","5","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("210","1","20","2","6","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("211","1","20","2","7","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("212","1","20","2","8","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("213","1","20","2","9","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("214","1","20","2","10","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("215","1","20","2","11","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("216","1","20","2","12","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("217","1","21","2","1","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("218","1","21","2","2","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("219","1","21","2","3","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("220","1","21","2","4","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("221","1","21","2","5","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("222","1","21","2","6","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("223","1","21","2","7","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("224","1","21","2","8","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("225","1","21","2","9","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("226","1","21","2","10","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("227","1","21","2","11","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("228","1","21","2","12","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("229","1","22","2","1","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("230","1","22","2","2","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("231","1","22","2","3","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("232","1","22","2","4","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("233","1","22","2","5","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("234","1","22","2","6","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("235","1","22","2","7","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("236","1","22","2","8","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("237","1","22","2","9","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("238","1","22","2","10","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("239","1","22","2","11","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("240","1","22","2","12","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("241","1","23","2","1","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("242","1","23","2","2","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("243","1","23","2","3","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("244","1","23","2","4","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("245","1","23","2","5","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("246","1","23","2","6","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("247","1","23","2","7","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("248","1","23","2","8","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("249","1","23","2","9","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("250","1","23","2","10","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("251","1","23","2","11","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("252","1","23","2","12","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("253","1","24","2","1","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("254","1","24","2","2","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("255","1","24","2","3","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("256","1","24","2","4","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("257","1","24","2","5","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("258","1","24","2","6","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("259","1","24","2","7","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("260","1","24","2","8","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("261","1","24","2","9","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("262","1","24","2","10","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("263","1","24","2","11","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("264","1","24","2","12","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("265","1","25","2","1","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("266","1","25","2","2","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("267","1","25","2","3","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("268","1","25","2","4","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("269","1","25","2","5","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("270","1","25","2","6","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("271","1","25","2","7","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("272","1","25","2","8","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("273","1","25","2","9","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("274","1","25","2","10","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("275","1","25","2","11","300000","belum","0","admin","2022-06-26");
INSERT INTO bulanan VALUES("276","1","25","2","12","300000","belum","0","admin","2022-06-26");



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



CREATE TABLE `class` (
  `no` int(10) NOT NULL AUTO_INCREMENT,
  `kelas` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO class VALUES("1","X(A)","active");
INSERT INTO class VALUES("2","X B","active");
INSERT INTO class VALUES("3","Xi A","active");



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

INSERT INTO data VALUES("SMA FYMA MEDIA NUSANTARA 1","Profesional Terpercaya","jalan Ngurah Rai no.8 , Denpasar, Bali","02100110011","Tut Wuri Handayani","fyma@gmail.com","www.fymamedia/demo.com","19171171718171","upload/image/tut wuri.png","0");



CREATE TABLE `event_colors` (
  `no` int(10) NOT NULL AUTO_INCREMENT,
  `warna` varchar(10) NOT NULL,
  `kodewarna` varchar(10) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO event_colors VALUES("1","Upacara","#64C5B1");
INSERT INTO event_colors VALUES("2","Pengumuman","#34D3EB");
INSERT INTO event_colors VALUES("3","Kelulusan","#32C861");
INSERT INTO event_colors VALUES("4","Pembayaran","#FFA91C");
INSERT INTO event_colors VALUES("5","Ujian","#5553CE");
INSERT INTO event_colors VALUES("6","Penting","#F96A74");
INSERT INTO event_colors VALUES("7","Festival","#F06292");
INSERT INTO event_colors VALUES("10","Liburan","#313A46");
INSERT INTO event_colors VALUES("12","TEs","#64C5b1");



CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO events VALUES("1","aaa","#64C5b1","2022-06-19 08:03:43","2022-06-19 08:03:43");



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

INSERT INTO info VALUES("admin","24","upload/image/placeholder.png","2022-06-20","<h1>Pengumuman baru:</h1><p>hanya beli di tokopedia.com/warungebook</p><p><br></p><p>Pastikan beli original</p><p><br></p><p>AAAA</p><p></p>                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ","1");



CREATE TABLE `jabatan` (
  `kode` varchar(20) NOT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `no` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`kode`),
  KEY `no` (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

INSERT INTO jabatan VALUES("0001","admin","30");
INSERT INTO jabatan VALUES("0003","Karyawan","31");



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

INSERT INTO jenis_bayar VALUES("1","1","2","bebas","Buku","2020/2021","2022-06-26","2022-06-26");
INSERT INTO jenis_bayar VALUES("2","1","1","bulanan","SPP","2020/2021","2022-06-26","2022-06-26");



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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO periode VALUES("1","2020","2021","2020/2021","active");
INSERT INTO periode VALUES("2","2019","2020","2019/2020","inactive");



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

INSERT INTO pos_bayar VALUES("1","SPP","sumbangan");
INSERT INTO pos_bayar VALUES("2","Buku","buku");



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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

INSERT INTO student VALUES("2","1234","0","10470c3b4b1fed12c3baac014be15fac67c6e815","Andi Andromeda","Laki Laki","Jakarta","2005-09-12","student/image/sky.png","6285712345678","Baca","Jakarta","Sukiah","Shobun","6285678963457","2","1","nakal","active","2022-06-20","2022-06-20");
INSERT INTO student VALUES("3","1235","0","10470c3b4b1fed12c3baac014be15fac67c6e815","Budi","Perempuan","Jakarta","2005-09-13","image/placeholder.png","6285712345678","","Jakarta","Sukiah","Shobun","6285678963457","2","2","","active","2022-06-20","2022-06-20");
INSERT INTO student VALUES("4","1236","0","10470c3b4b1fed12c3baac014be15fac67c6e815","Dedi","Laki Laki","Jambi","2005-09-14","image/placeholder.png","6285712345678","Nyanyi","Jambi","Sukiah","Shobun","6285678963457","3","1","","active","2022-06-20","2022-06-20");
INSERT INTO student VALUES("5","1237","0","10470c3b4b1fed12c3baac014be15fac67c6e815","Rudi","Perempuan","Lampung","2005-09-15","image/placeholder.png","6285712345678","","Lampung","Sukiah","Shobun","6285678963457","2","2","","active","2022-06-20","2022-06-20");
INSERT INTO student VALUES("6","1238","0","10470c3b4b1fed12c3baac014be15fac67c6e815","Didi","Laki Laki","Aceh","2005-09-16","image/placeholder.png","6285712345678","","Aceh","Sukiah","Shobun","6285678963457","3","1","","active","2022-06-20","2022-06-20");
INSERT INTO student VALUES("7","1239","0","10470c3b4b1fed12c3baac014be15fac67c6e815","Beni","Perempuan","Medan","2005-09-17","image/placeholder.png","6285712345678","Menulis","Medan","Sukiah","Shobun","6285678963457","2","2","","active","2022-06-20","2022-06-20");
INSERT INTO student VALUES("8","1240","0","10470c3b4b1fed12c3baac014be15fac67c6e815","Deni","Laki Laki","Papua","2005-09-18","image/placeholder.png","6285712345678","","Papua","Sukiah","Shobun","6285678963457","3","1","","active","2022-06-20","2022-06-20");
INSERT INTO student VALUES("9","1241","0","10470c3b4b1fed12c3baac014be15fac67c6e815","Ani","Perempuan","Bogor","2005-09-19","image/placeholder.png","6285712345678","","Bogor","Sukiah","Shobun","6285678963457","2","2","","active","2022-06-20","2022-06-20");
INSERT INTO student VALUES("10","1242","0","10470c3b4b1fed12c3baac014be15fac67c6e815","Roni","Laki Laki","Jombang","2005-09-20","image/placeholder.png","6285712345678","Main game","Jombang","Sukiah","Shobun","6285678963457","3","1","","active","2022-06-20","2022-06-20");
INSERT INTO student VALUES("11","1243","0","10470c3b4b1fed12c3baac014be15fac67c6e815","Toni","Perempuan","Japan","2005-09-21","image/placeholder.png","6285712345678","","Japan","Sukiah","Shobun","6285678963457","2","2","","active","2022-06-20","2022-06-20");
INSERT INTO student VALUES("12","1244","0","10470c3b4b1fed12c3baac014be15fac67c6e815","Soni","Laki Laki","Bengkulu","2005-09-22","image/placeholder.png","6285712345678","","Bengkulu","Sukiah","Shobun","6285678963457","3","1","","active","2022-06-20","2022-06-20");
INSERT INTO student VALUES("13","1245","0","10470c3b4b1fed12c3baac014be15fac67c6e815","Sunni","Perempuan","dumai","2005-09-23","image/placeholder.png","6285712345678","","dumai","Sukiah","Shobun","6285678963457","2","2","","active","2022-06-20","2022-06-20");
INSERT INTO student VALUES("15","1247","0","10470c3b4b1fed12c3baac014be15fac67c6e815","Nini","Perempuan","Jember","2005-09-25","image/placeholder.png","6285712345678","","Jember","Sukiah","Shobun","6285678963457","2","2","","active","2022-06-20","2022-06-20");
INSERT INTO student VALUES("16","1248","0","10470c3b4b1fed12c3baac014be15fac67c6e815","Noni","Laki Laki","Brebes","2005-09-26","image/placeholder.png","6285712345678","","Brebes","Sukiah","Shobun","6285678963457","1","1","","active","2022-06-20","2022-06-20");
INSERT INTO student VALUES("17","1249","0","10470c3b4b1fed12c3baac014be15fac67c6e815","Yani","Perempuan","Tegal","2005-09-27","image/placeholder.png","6285712345678","","Tegal","Sukiah","Shobun","6285678963457","2","2","","active","2022-06-20","2022-06-20");
INSERT INTO student VALUES("18","1250","0","10470c3b4b1fed12c3baac014be15fac67c6e815","Ardi","Laki Laki","Parang","2005-09-28","image/placeholder.png","6285712345678","","Parang","Sukiah","Shobun","6285678963457","1","1","","active","2022-06-20","2022-06-20");
INSERT INTO student VALUES("19","1251","0","10470c3b4b1fed12c3baac014be15fac67c6e815","boni","Perempuan","Gowa","2005-09-29","image/placeholder.png","6285712345678","","Gowa","Sukiah","Shobun","6285678963457","2","2","","active","2022-06-20","2022-06-20");
INSERT INTO student VALUES("20","1252","0","10470c3b4b1fed12c3baac014be15fac67c6e815","aan","Laki Laki","Padang","2005-09-30","image/placeholder.png","6285712345678","","Padang","Sukiah","Shobun","6285678963457","1","1","","active","2022-06-20","2022-06-20");
INSERT INTO student VALUES("21","1253","0","10470c3b4b1fed12c3baac014be15fac67c6e815","ian","Perempuan","Palembang","2005-10-01","image/placeholder.png","6285712345678","","Palembang","Sukiah","Shobun","6285678963457","2","2","","active","2022-06-20","2022-06-20");
INSERT INTO student VALUES("22","1254","0","10470c3b4b1fed12c3baac014be15fac67c6e815","ardian","Laki Laki","Riau","1970-01-01","image/placeholder.png","6285712345678","","Riau","Sukiah","Shobun","6285678963457","1","1","","active","2022-06-20","2022-06-20");
INSERT INTO student VALUES("23","1255","0","10470c3b4b1fed12c3baac014be15fac67c6e815","bunian","Perempuan","batam","1970-01-01","image/placeholder.png","6285712345678","","batam","Sukiah","Shobun","6285678963457","2","2","","active","2022-06-20","2022-06-20");
INSERT INTO student VALUES("24","1256","0","10470c3b4b1fed12c3baac014be15fac67c6e815","roki","Laki Laki","belitung","1970-01-01","image/placeholder.png","6285712345678","","belitung","Sukiah","Shobun","6285678963457","1","1","","active","2022-06-20","2022-06-20");
INSERT INTO student VALUES("25","1257","0","10470c3b4b1fed12c3baac014be15fac67c6e815","ruan","Perempuan","batang","1970-01-01","image/placeholder.png","6285712345678","","batang","Sukiah","Shobun","6285678963457","1","1","","active","2022-06-20","2022-06-20");



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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

INSERT INTO student_alumni VALUES("14","1246","0","10470c3b4b1fed12c3baac014be15fac67c6e815","Sani","Laki Laki","malang","2005-09-24","image/placeholder.png","6285712345678","","malang","Sukiah","Shobun","6285678963457","3","1","","lulus","2022-06-20","2022-06-20");



CREATE TABLE `uang_kategori` (
  `kategori_id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO uang_masuk_keluar VALUES("1","pay","SPP T.A 2020/2021","pembayaran bulanan","300000","admin","1","2","1","0","1","2022-06-26","2022-06-26");
INSERT INTO uang_masuk_keluar VALUES("2","pay","Buku T.A 2020/2021","pembayaran cicilan","20000","admin","1","2","1","1","0","2022-06-26","2022-06-26");



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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

INSERT INTO user VALUES("admin","admin@admin.com","90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad","admin","alamat","111","2020-02-02","2020-02-02","admin","upload/image/placeholder.png","24");
INSERT INTO user VALUES("admin2","admin2@gmail.com","10470c3b4b1fed12c3baac014be15fac67c6e815","admin2","jajajana","021736262","2022-06-23","2022-06-23","admin","upload/image/placeholder.png","25");

