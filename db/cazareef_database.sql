-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Gazdă: localhost:3306
-- Timp de generare: ian. 17, 2019 la 11:04 PM
-- Versiune server: 5.6.41
-- Versiune PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `cazareef_database`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `be_ocompany`
--

CREATE TABLE `be_ocompany` (
  `id` int(11) NOT NULL,
  `idowner` int(11) DEFAULT NULL,
  `pc_nume` varchar(50) DEFAULT NULL,
  `pc_prenume` varchar(50) DEFAULT NULL,
  `pc_telefon` varchar(30) DEFAULT NULL,
  `pc_email` varchar(100) DEFAULT NULL,
  `cui` varchar(50) DEFAULT NULL,
  `nrinreg` varchar(50) DEFAULT NULL,
  `adresa_ss` varchar(80) DEFAULT NULL,
  `adresa_ssloc` varchar(100) DEFAULT NULL,
  `adresa_ssjud` varchar(100) DEFAULT NULL,
  `adresa_sscodpostal` varchar(50) DEFAULT NULL,
  `adresa_pl` varchar(80) DEFAULT NULL,
  `adresa_plloc` varchar(100) DEFAULT NULL,
  `adresa_pljud` varchar(100) DEFAULT NULL,
  `adresa_plcodpostal` varchar(50) DEFAULT NULL,
  `telefon_fix` varchar(15) DEFAULT NULL,
  `telefon_mobil` varchar(15) DEFAULT NULL,
  `telefon_fax` varchar(15) DEFAULT NULL,
  `banca_banca` varchar(50) DEFAULT NULL,
  `banca_iban` varchar(24) DEFAULT NULL,
  `trezorerie_trezorerie` varchar(50) DEFAULT NULL,
  `trezorerie_iban` varchar(24) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `be_ocompany`
--

INSERT INTO `be_ocompany` (`id`, `idowner`, `pc_nume`, `pc_prenume`, `pc_telefon`, `pc_email`, `cui`, `nrinreg`, `adresa_ss`, `adresa_ssloc`, `adresa_ssjud`, `adresa_sscodpostal`, `adresa_pl`, `adresa_plloc`, `adresa_pljud`, `adresa_plcodpostal`, `telefon_fix`, `telefon_mobil`, `telefon_fax`, `banca_banca`, `banca_iban`, `trezorerie_trezorerie`, `trezorerie_iban`) VALUES
(1, 1, 'Scripcariu', 'Francesca', '0786804003', 'rooms@sanpantaleo.ro', NULL, NULL, NULL, 'Eforie Nord', 'Constanta', NULL, 'Str. Panselelor Nr. 10', 'Eforie Nord', 'Constanta', 'Romania', '0786804005', '0786804003', NULL, 'Banca Transilvania', 'RO81BTRLRONCRT0452315601', NULL, NULL);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `be_owner`
--

CREATE TABLE `be_owner` (
  `id` int(11) NOT NULL,
  `owner` varchar(50) NOT NULL COMMENT 'Owner',
  `initial` varchar(20) DEFAULT NULL COMMENT 'Owner Initial',
  `titlucompanie` varchar(150) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL COMMENT 'Owner Company',
  `oemail` varchar(100) DEFAULT NULL COMMENT 'Owner E-mail',
  `website` varchar(100) DEFAULT NULL COMMENT 'Owner Website',
  `image_logo` varchar(50) DEFAULT NULL,
  `map` varchar(100) DEFAULT NULL COMMENT 'Owner Location',
  `about` text,
  `facebook` varchar(100) DEFAULT NULL,
  `youtube` varchar(100) DEFAULT NULL,
  `googleplus` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `pinterest` varchar(100) DEFAULT NULL,
  `td_owner` varchar(50) DEFAULT '99' COMMENT 'TradeMark Owner',
  `td_about` varchar(150) DEFAULT NULL,
  `td_initial` varchar(50) DEFAULT NULL COMMENT 'TradeMark Owner Initial',
  `td_company` varchar(50) DEFAULT NULL COMMENT 'TradeMark Owner Company',
  `td_email` varchar(50) DEFAULT NULL COMMENT 'Trade Mark Owner E-mail',
  `td_phone` varchar(50) DEFAULT NULL COMMENT 'Trade Mark Owner Phone',
  `td_website` varchar(50) DEFAULT NULL COMMENT 'Trade Mark Website',
  `td_location` varchar(50) DEFAULT NULL COMMENT 'Trade Mark Location'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `be_owner`
--

INSERT INTO `be_owner` (`id`, `owner`, `initial`, `titlucompanie`, `company`, `oemail`, `website`, `image_logo`, `map`, `about`, `facebook`, `youtube`, `googleplus`, `twitter`, `instagram`, `pinterest`, `td_owner`, `td_about`, `td_initial`, `td_company`, `td_email`, `td_phone`, `td_website`, `td_location`) VALUES
(1, 'San Pantaleo', 'SPR', 'San Pantaleo Rooms | Eforie Nord', 'San Pantaleo Rooms', 'rooms@sanpantaleo.ro', 'www.cazare-eforienord.com', 'photo-0ghvxmse.jpg', NULL, NULL, 'https://www.facebook.com/Eforie-Nord-San-Pantaleo-Rooms-2690732554484681/?modal=admin_todo_tour', 'https://www.youtube.com/channel/UCLp86M5r62VAe2JC3UiFAfw', NULL, NULL, NULL, NULL, 'WebEtwas', NULL, 'WEW', 'WebEtwas', 'web.etwas@yahoo.com', ' 	+40 761 139 150', 'www.webetwas.com', 'Str. Dornei Nr.7 - Vrancea, Focsani');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `be_users`
--

CREATE TABLE `be_users` (
  `id` int(11) NOT NULL,
  `idowner` int(11) NOT NULL,
  `privilege` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0:normal, 1:fuckinggod',
  `user_name` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0:not,1:active',
  `image_logo` varchar(50) DEFAULT NULL,
  `date_insert` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `be_users`
--

INSERT INTO `be_users` (`id`, `idowner`, `privilege`, `user_name`, `user_password`, `email`, `status`, `image_logo`, `date_insert`) VALUES
(1, 1, 1, 'fuckinggod', '8287458823facb8ff918dbfabcd22ccb', 'wewzeroday@webetwas.com', 0, 'logo_admin.png', '2017-07-30 15:21:47'),
(2, 1, 0, 'admin', '8287458823facb8ff918dbfabcd22ccb', 'rooms@sanpantaleo.ro', 0, 'logo_web.png', '2017-07-30 12:22:28');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `camere`
--

CREATE TABLE `camere` (
  `id_item` int(11) NOT NULL,
  `id_object` int(11) NOT NULL,
  `item_isactive` int(11) NOT NULL DEFAULT '1',
  `item_key` varchar(100) DEFAULT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_parent_fake` tinyint(4) NOT NULL DEFAULT '0',
  `http_id` varchar(250) DEFAULT NULL,
  `http_title_browser` varchar(200) DEFAULT NULL,
  `http_meta_description` varchar(200) DEFAULT NULL,
  `http_keywords` varchar(250) DEFAULT NULL,
  `titlu_prezentare` varchar(250) DEFAULT NULL,
  `id_video` int(11) NOT NULL DEFAULT '0',
  `id_video2` int(11) NOT NULL DEFAULT '0',
  `i_content_ro` text,
  `offer_stat` tinyint(4) NOT NULL DEFAULT '0',
  `offer_titlu` varchar(250) DEFAULT NULL,
  `offer_content` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Eliminarea datelor din tabel `camere`
--

INSERT INTO `camere` (`id_item`, `id_object`, `item_isactive`, `item_key`, `item_name`, `item_parent_fake`, `http_id`, `http_title_browser`, `http_meta_description`, `http_keywords`, `titlu_prezentare`, `id_video`, `id_video2`, `i_content_ro`, `offer_stat`, `offer_titlu`, `offer_content`) VALUES
(10, 3, 1, NULL, 'Singola', 0, 'singola', NULL, NULL, NULL, 'Singola', 21, 18, '<h2 style=\"margin-top: 0px; margin-right: 0px; margin-left: 0px; padding: 0px; line-height: 24px;\">Ce este Lorem Ipsum?</h2><p style=\"margin-bottom: 15px; padding: 0px;\"><font color=\"#000000\" face=\"Open Sans, Arial, sans-serif\"><span style=\"font-size: 14px;\">Lorem Ipsum </span></font>este pur şi simplu o machetă pentru text a industriei tipografice. Lorem Ipsum a fost macheta standard a industriei încă din secolul al XVI-lea, când un tipograf anonim a luat o planşetă de litere şi le-a amestecat pentru a crea o carte demonstrativă pentru literele respective. Nu doar că a supravieţuit timp de cinci secole, dar şi a facut saltul în tipografia electronică practic neschimbată. A fost popularizată în anii \'60 odată cu ieşirea colilor Letraset care conţineau pasaje Lorem Ipsum, iar mai recent, prin programele de publicare pentru calculator, ca Aldus PageMaker care includeau versiuni de Lorem Ipsum.</p>', 0, NULL, NULL),
(11, 3, 1, NULL, 'Dubla twin', 0, 'dubla_twin', NULL, NULL, NULL, 'Dubla twin', 0, 0, '<p><b style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</b><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;este pur şi simplu o machetă pentru text a industriei tipografice. Lorem Ipsum a fost macheta standard a industriei încă din secolul al XVI-lea, când un tipograf anonim a luat o planşetă de litere şi le-a amestecat pentru a crea o carte demonstrativă pentru literele respective. Nu doar că a supravieţuit timp de cinci secole, dar şi a facut saltul în tipografia electronică practic neschimbată. A fost popularizată în anii \'60 odată cu ieşirea colilor Letraset care conţineau pasaje Lorem Ipsum, iar mai recent, prin programele de publicare pentru calculator, ca Aldus PageMaker care includeau versiuni de Lorem Ipsum.</span><br></p>', 0, NULL, NULL),
(12, 3, 1, NULL, 'Dubla matrim.', 0, 'dubla_matrim.', NULL, NULL, NULL, 'Dubla matrim.', 0, 0, NULL, 0, NULL, NULL),
(13, 3, 1, NULL, 'Tripla', 0, 'tripla', NULL, NULL, NULL, 'Tripla', 0, 0, '<p><b style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</b><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;este pur şi simplu o machetă pentru text a industriei tipografice. Lorem Ipsum a fost macheta standard a industriei încă din secolul al XVI-lea, când un tipograf anonim a luat o planşetă de litere şi le-a amestecat pentru a crea o carte demonstrativă pentru literele respective. Nu doar că a supravieţuit timp de cinci secole, dar şi a facut saltul în tipografia electronică practic neschimbată. A fost popularizată în anii \'60 odată cu ieşirea colilor Letraset care conţineau pasaje Lorem Ipsum, iar mai recent, prin programele de publicare pentru calculator, ca Aldus PageMaker care includeau versiuni de Lorem Ipsum.</span><br></p>', 0, NULL, NULL),
(14, 3, 1, NULL, 'Cvadrupla', 0, 'cvadrupla', NULL, NULL, NULL, 'Cvadrupla', 0, 0, NULL, 0, NULL, NULL),
(15, 3, 1, NULL, 'Luxury Suite', 0, 'luxury_suite', NULL, NULL, NULL, 'Luxury Suite', 0, 0, '<p><b style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</b><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;este pur şi simplu o machetă pentru text a industriei tipografice. Lorem Ipsum a fost macheta standard a industriei încă din secolul al XVI-lea, când un tipograf anonim a luat o planşetă de litere şi le-a amestecat pentru a crea o carte demonstrativă pentru literele respective. Nu doar că a supravieţuit timp de cinci secole, dar şi a facut saltul în tipografia electronică practic neschimbată. A fost popularizată în anii \'60 odată cu ieşirea colilor Letraset care conţineau pasaje Lorem Ipsum, iar mai recent, prin programele de publicare pentru calculator, ca Aldus PageMaker care includeau versiuni de Lorem Ipsum.</span><br></p>', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `camere_images`
--

CREATE TABLE `camere_images` (
  `id` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `title1` int(11) DEFAULT NULL,
  `title2` int(11) DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL,
  `img_ref` varchar(50) DEFAULT NULL,
  `s` tinyint(4) NOT NULL DEFAULT '0',
  `m` tinyint(4) NOT NULL DEFAULT '0',
  `l` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Eliminarea datelor din tabel `camere_images`
--

INSERT INTO `camere_images` (`id`, `id_item`, `title1`, `title2`, `img`, `img_ref`, `s`, `m`, `l`) VALUES
(4, 1, NULL, NULL, 'photo-sqn8pary.jpeg', 'poza', 1, 1, 1),
(5, 1, NULL, NULL, 'photo-87mjzpve.jpeg', 'poza', 1, 1, 1),
(6, 1, NULL, NULL, 'photo-v6no7dbl.jpeg', 'poza', 1, 1, 1),
(7, 1, NULL, NULL, 'photo-1kwhon4n.jpeg', 'poza', 1, 1, 1),
(8, 1, NULL, NULL, 'photo-g9dxdn8b.jpeg', 'poza', 1, 1, 1),
(9, 1, NULL, NULL, 'photo-sdtchvsl.jpeg', 'poza', 1, 1, 1),
(17, 1, NULL, NULL, 'photo-dkitp2mz.jpeg', 'poza', 1, 1, 1),
(18, 5, NULL, NULL, 'photo-kmjaigz6.jpeg', 'poza', 1, 1, 1),
(16, 2, NULL, NULL, 'photo-fnel9zcr.jpeg', 'poza', 1, 1, 1),
(15, 2, NULL, NULL, 'photo-05fwxjob.jpeg', 'poza', 1, 1, 1),
(14, 2, NULL, NULL, 'photo-k3a74gnx.jpeg', 'poza', 1, 1, 1),
(19, 5, NULL, NULL, 'photo-ek0iuy8y.jpeg', 'poza', 1, 1, 1),
(20, 5, NULL, NULL, 'photo-9bdmifyg.jpeg', 'poza', 1, 1, 1),
(21, 5, NULL, NULL, 'photo-ai3ukyay.jpeg', 'poza', 1, 1, 1),
(22, 5, NULL, NULL, 'photo-wxaexghc.jpeg', 'poza', 1, 1, 1),
(23, 5, NULL, NULL, 'photo-hdfn4wbu.jpeg', 'poza', 1, 1, 1),
(24, 5, NULL, NULL, 'photo-zvylot4d.jpeg', 'poza', 1, 1, 1),
(25, 3, NULL, NULL, 'photo-p5aumo0d.jpeg', 'poza', 1, 1, 1),
(26, 9, NULL, NULL, 'photo-hv5i3e2z.jpg', 'poza', 1, 1, 1),
(38, 10, NULL, NULL, 'photo-rxtezgal.jpg', 'poza', 1, 1, 1),
(37, 10, NULL, NULL, 'photo-uupljkx5.jpg', 'poza', 1, 1, 1),
(36, 10, NULL, NULL, 'photo-rxapihkc.jpg', 'poza', 1, 1, 1),
(39, 10, NULL, NULL, 'photo-rzjwetoj.jpg', 'poza', 1, 1, 1),
(40, 15, NULL, NULL, 'photo-ddbu19o0.jpeg', 'poza', 1, 1, 1);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `camere_intervale`
--

CREATE TABLE `camere_intervale` (
  `id_interval` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `date_startux` bigint(20) NOT NULL,
  `date_endux` bigint(20) NOT NULL,
  `pret` varchar(100) NOT NULL,
  `displayoferta` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `camere_intervale`
--

INSERT INTO `camere_intervale` (`id_interval`, `id_item`, `date_start`, `date_end`, `date_startux`, `date_endux`, `pret`, `displayoferta`) VALUES
(18, 2, '2017-11-09 00:00:00', '2017-11-22 00:00:00', 1510178400, 1511301600, '55', 0),
(7, 3, '2017-11-09 00:00:00', '2017-11-11 00:00:00', 1510178400, 1510351200, '123', 1),
(19, 5, '2017-11-17 00:00:00', '2018-01-26 00:00:00', 1510869600, 1516917600, '30', 1),
(5, 4, '2017-11-09 00:00:00', '2017-11-30 00:00:00', 1510178400, 1511992800, '123', 1);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `camere_rezervari`
--

CREATE TABLE `camere_rezervari` (
  `id_rezervare` int(11) NOT NULL,
  `numeprenume` varchar(100) NOT NULL,
  `adresa` varchar(250) NOT NULL,
  `telefon` varchar(50) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `adulti` tinyint(4) DEFAULT '0',
  `copii` tinyint(4) DEFAULT '0',
  `d_start` datetime NOT NULL,
  `d_end` datetime NOT NULL,
  `id_interval` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `timp_efectiv` int(11) NOT NULL,
  `total` bigint(20) NOT NULL,
  `status` enum('Noua','In desfasurare','Finalizata') NOT NULL DEFAULT 'Noua',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `chain_links`
--

CREATE TABLE `chain_links` (
  `id_link` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL DEFAULT '0',
  `idhttp_url` varchar(50) NOT NULL,
  `denumire_ro` varchar(150) NOT NULL,
  `denumire_en` varchar(150) DEFAULT NULL,
  `title_browser_ro` varchar(150) DEFAULT NULL,
  `meta_description` varchar(250) DEFAULT NULL,
  `keywords` varchar(250) DEFAULT NULL,
  `unique_id` varchar(32) NOT NULL,
  `justfuckinggod` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `chain_links`
--

INSERT INTO `chain_links` (`id_link`, `id_parent`, `idhttp_url`, `denumire_ro`, `denumire_en`, `title_browser_ro`, `meta_description`, `keywords`, `unique_id`, `justfuckinggod`) VALUES
(6, 0, 'camerele_noastre', 'Camerele noastre', NULL, NULL, NULL, NULL, 'b6e7800cbe1e30a31188dbd6c384d3ee', 0),
(7, 0, 'galerie', 'Galerie', NULL, NULL, NULL, NULL, '8ca0b77bb3cbb6bdd07974c207915b2a', 0),
(8, 7, 'galerie_foto', 'Galerie foto', NULL, NULL, NULL, NULL, '38e048d22b7a2ef6967a2c8ba63dd67e', 0),
(4, 0, 'meniuri', 'Meniuri', NULL, NULL, NULL, NULL, '996535551c0b06473d7b268e134fcecb', 1),
(5, 4, 'meniul_site-ului', 'Meniul site-ului', NULL, NULL, NULL, NULL, '7f9a54582705ec3db12382266d6cdb34', 0),
(9, 7, 'galerie_video', 'Galerie video', NULL, NULL, NULL, NULL, '375c7f26fdc1fe95bac7bfa466696577', 0),
(10, 4, 'meniu_footer', 'Meniu Footer', NULL, NULL, NULL, NULL, '23a7cdf313fd074165304e89056ae895', 0);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `fe_pages`
--

CREATE TABLE `fe_pages` (
  `id` int(11) NOT NULL,
  `id_page` varchar(250) NOT NULL,
  `position` tinyint(4) DEFAULT NULL COMMENT 'position. order it''s place',
  `title` varchar(250) NOT NULL,
  `title_ro` varchar(250) DEFAULT NULL,
  `title_browser_ro` varchar(250) NOT NULL,
  `title_content_ro` varchar(250) DEFAULT NULL,
  `subtitle_content_ro` varchar(250) DEFAULT NULL,
  `content_ro` text,
  `keywords` varchar(250) DEFAULT NULL,
  `meta_description` varchar(250) DEFAULT NULL,
  `admin_message` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `fe_pages`
--

INSERT INTO `fe_pages` (`id`, `id_page`, `position`, `title`, `title_ro`, `title_browser_ro`, `title_content_ro`, `subtitle_content_ro`, `content_ro`, `keywords`, `meta_description`, `admin_message`) VALUES
(1, 'acasa', 1, 'Acasa', 'Acasa', 'Sanpantaleo Rooms | Eforie Nord', NULL, NULL, '<h1><p class=\"MsoNormal\" style=\"line-height: 1;\"><b style=\"font-size: 18px;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style=\"color: rgb(0, 0, 255);\">&nbsp;&nbsp; LITORALUL MĂRII NEGRE, MAI APROAPE DE TINE!</span></b></p><p class=\"MsoNormal\" style=\"line-height: 1;\"><b style=\"font-size: 18px;\"><br></b><font face=\"Verdana\"><b style=\"\"><i style=\"\"><span style=\"font-size: 12pt; color: rgb(0, 0, 0);\">San Pantaleo Rooms</span></i></b><b style=\"color: inherit;\"><span style=\"font-size: 12pt; color: rgb(34, 34, 34);\">&nbsp;-</span></b><span style=\"font-size: 14px; color: rgb(34, 34, 34);\">&nbsp;</span><span style=\"font-size: 18px; color: rgb(34, 34, 34);\">modern si elegant,\r\noferind condiții deosebite de cazare, deschis si in extrasezon, situat in cea\r\nmai buna zona a stațiunii Eforie Nord, lângă Hotel Europa, la maximum 1 minut </span><span style=\"font-size: 18px; color: black;\">de plaja\r\nBelona, una dintre cele mai cautate plaje din statiunea Eforie Nord</span><span style=\"font-size: 18px; color: rgb(34, 34, 34);\">, la 100 m de centrul\r\nstatiunii, 3 minute de Teatrul de vara si 5 minute de gara, pe strada de shopping\r\n- Str. Panselelor, reprezinta locul ideal de cazare pentru cei care doresc sa\r\npetreaca o vacanta de vis la malul marii.</span></font></p></h1><h1><p class=\"MsoNormal\"><span style=\"font-size: 12pt; line-height: 115%; background-color: rgb(239, 239, 239);\"><font face=\"Verdana\"><o:p></o:p></font></span></p></h1><h1><p class=\"MsoNormal\" style=\"line-height: 1;\"><br></p><p class=\"MsoNormal\" style=\"line-height: 1;\"><span style=\"line-height: 115%;\" arial\",\"sans-serif\";=\"\" mso-fareast-font-family:calibri;mso-fareast-theme-font:minor-latin;mso-ansi-language:=\"\" en-us;mso-fareast-language:en-us;mso-bidi-language:ar-sa\"=\"\"></span></p><p class=\"MsoNormal\"><br></p></h1>', 'cazare, eforie nord', 'Sanpantaleo Rooms - Cazare Eforie Nord', NULL),
(2, 'contact', 5, 'Contact', 'Contact', 'Contact', NULL, NULL, '<p><br></p>', NULL, NULL, NULL),
(8, 'galerie_foto', 3, 'Galerie Foto', 'Galerie Foto', 'Galerie Foto', 'Galerie Foto', NULL, '<p>Imagini din Galeria foto<br></p>', NULL, NULL, NULL),
(4, 'despre_noi', 2, 'Prezentare', 'Prezentare', 'Prezentare', 'Prezentare', NULL, '<p style=\"line-height: 1.2;\"><b>San Pantaleo Rooms</b>&nbsp; structurata pe 3 nivele&nbsp; va pune la dispozitie&nbsp; camere pentru 2, 3, 4 persoane si un apartament:<br><br>•&nbsp; camere duble cu pat matrimonial sau twin<br>•&nbsp; camere triple + posibilitate 1 pat suplimentar<br>•&nbsp; luxury suite ( 2 camere duble separate, living, baie, chicineta, terasa )</p><p style=\"line-height: 1.2;\"><br>Toate camerele sunt dotate si utilate cu:<br><br>• Aer conditionat<br>• Incalzire in extrasezon - centrala proprie<br>• Baie proprie cu cada<br>• Tv LCD<br>• minibar<br>• internet wireless<br>• balcon / terasa ( unele camere )<br><br>Plajele, bine intretinute cu nisip fin, sunt situate la numai un minut fata de locatie. In zona se gasesc diverse restaurante, autoserviri, fast food-uri, patiserii si magazine, centre de inchirieri biciclete, jet ski, plimbari cu vaporasul, sanatoriul Grand, baile de namol Techirghiol.<br></p>', NULL, NULL, NULL),
(5, 'oferte', 6, 'Tarife', 'Tarife', 'Tarife', 'Tarife', NULL, '<p class=\"MsoNormal\" style=\"margin-bottom: 10.5px; line-height: 1;\"><strong style=\"color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 16px;\">Pentru tarife, rezervari sau alte informatii va rugam sa ne contactati:&nbsp;<br></strong><br></p><p class=\"MsoNormal\" style=\"margin-bottom: 10.5px; line-height: 1;\"><span style=\"font-weight: bold;\"><span style=\"color: rgb(0, 0, 255); font-size: 12px;\">***</span><span style=\"font-size: 12px;\">&nbsp;&nbsp;</span><span style=\"color: rgb(0, 0, 0); font-size: 12px;\">Tel: 0786804003 /&nbsp;0786804005</span><span style=\"font-size: 12px;\">&nbsp;</span><span style=\"color: rgb(0, 0, 255); font-size: 12px;\">***</span><span style=\"color: rgb(0, 0, 0); font-size: 12px;\"> E-mail: rooms@sanpantaleo.ro</span><span style=\"font-size: 12px;\">&nbsp;</span><span style=\"color: rgb(0, 0, 255); font-size: 12px;\">***&nbsp;</span></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 10.5px; line-height: 1;\"><span style=\"font-weight: bold;\"><span style=\"color: rgb(0, 0, 255); font-size: 12px;\">***&nbsp;&nbsp;</span><span style=\"color: rgb(0, 0, 0);\"><span style=\"font-size: 12px;\">Contact:&nbsp;</span><span style=\"font-size: 12px;\">Scripcariu Francesca</span></span><span style=\"font-size: 12px;\">&nbsp;</span><span style=\"color: rgb(0, 0, 255); font-size: 12px;\">***</span></span><span style=\"color: rgb(0, 0, 255);\"><br></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 10.5px; line-height: 1;\"><span style=\"line-height: 17.25px; color: rgb(0, 0, 0);\">Tarifele sunt pe noapte si difera in functie de perioada, nr. de nopti si nr. de persoane.</span></p><p class=\"MsoNormal\" style=\"margin-bottom: 10.5px; line-height: 1;\"><span style=\"color: rgb(0, 0, 0);\">Facilitati copii:<br></span></p><p class=\"MsoFooter\" style=\"margin-bottom: 10.5px; line-height: 1;\"><span style=\"color: rgb(0, 0, 0);\"><o:p></o:p></span></p><p class=\"MsoFooter\" style=\"margin-bottom: 10.5px; line-height: 1;\"><span style=\"color: rgb(0, 0, 0);\">0 - 4 ani - gratuitate la cazare&nbsp;<o:p></o:p></span></p><p class=\"MsoFooter\" style=\"margin-bottom: 10.5px; line-height: 1;\"><span style=\"color: rgb(0, 0, 0);\">4 - 10 ani - gratuitate la cazare, opțional pat suplimentar se achită 30 lei/zi.</span></p><p class=\"MsoFooter\" style=\"margin-bottom: 10.5px; line-height: 1;\"><span style=\"color: rgb(0, 0, 0);\"><o:p></o:p></span></p><p class=\"MsoFooter\" style=\"margin-bottom: 10.5px; line-height: 1;\"><span style=\"line-height: 17.25px; color: rgb(0, 0, 0);\">Peste 10 ani - se achită pat suplimentar 50 lei/zi.</span></p><p class=\"MsoNormal\"><b><span style=\"font-size:8.0pt;line-height:115%;font-family:\" arial\",\"sans-serif\";=\"\" color:black;mso-themecolor:text1\"=\"\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<o:p></o:p></span></b></p><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"181\" style=\"width: 136pt;\"><tbody><tr height=\"34\" style=\"height: 25.5pt;\"><td height=\"34\" class=\"xl63\" width=\"181\" style=\"height: 25.5pt; width: 136pt;\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"181\" style=\"width: 136pt;\"><tbody><tr height=\"34\" style=\"height: 25.5pt;\"><td height=\"34\" class=\"xl65\" width=\"181\" style=\"height: 25.5pt; width: 136pt;\"><br><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"181\" style=\"width: 136pt;\"><tbody><tr height=\"34\" style=\"height: 25.5pt;\"><td height=\"34\" class=\"xl65\" width=\"181\" style=\"height: 25.5pt; width: 136pt;\"><br><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"181\" style=\"width: 136pt;\"><tbody><tr height=\"34\" style=\"height: 25.5pt;\"><td height=\"34\" class=\"xl65\" width=\"181\" style=\"height: 25.5pt; width: 136pt;\"><br><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"181\" style=\"width: 136pt;\"><tbody><tr height=\"34\" style=\"height: 25.5pt;\"><td height=\"34\" class=\"xl65\" width=\"181\" style=\"height: 25.5pt; width: 136pt;\"><br><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"181\" style=\"width: 136pt;\"><tbody><tr height=\"34\" style=\"height: 25.5pt;\"><td height=\"34\" class=\"xl65\" width=\"181\" style=\"height: 25.5pt; width: 136pt;\"><br><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"181\" style=\"width: 136pt;\"><tbody><tr height=\"34\" style=\"height: 25.5pt;\"><td height=\"34\" class=\"xl65\" width=\"181\" style=\"height: 25.5pt; width: 136pt;\"><br><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"181\" style=\"width: 136pt;\"><tbody><tr height=\"34\" style=\"height: 25.5pt;\"><td height=\"34\" class=\"xl65\" width=\"181\" style=\"height: 25.5pt; width: 136pt;\">&nbsp;<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"181\" style=\"width: 136pt;\"><tbody><tr height=\"34\" style=\"height: 25.5pt;\"><td height=\"34\" class=\"xl65\" width=\"181\" style=\"height: 25.5pt; width: 136pt;\"><br></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"181\" style=\"width: 136pt;\"><tbody><tr height=\"34\" style=\"height: 25.5pt;\"><td height=\"34\" class=\"xl65\" width=\"181\" style=\"height: 25.5pt; width: 136pt;\"><br><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"181\" style=\"width: 136pt;\"><tbody><tr height=\"34\" style=\"height: 25.5pt;\"><td height=\"34\" class=\"xl65\" width=\"181\" style=\"height: 25.5pt; width: 136pt;\"><br><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"181\" style=\"width: 136pt;\"><tbody><tr height=\"34\" style=\"height: 25.5pt;\"><td height=\"34\" class=\"xl65\" width=\"181\" style=\"height: 25.5pt; width: 136pt;\"><br></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><p class=\"MsoNormal\"><span style=\"font-size:8.0pt;line-height:115%;font-family:\r\n\" arial\",\"sans-serif\";color:black;mso-themecolor:text1\"=\"\">&nbsp; &nbsp;</span></p><br><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"181\" style=\"width: 136pt;\"><tbody><tr height=\"34\" style=\"height:25.5pt\"><td height=\"34\" class=\"xl65\" width=\"181\" style=\"height:25.5pt;width:136pt\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"181\" style=\"width: 136pt;\"><tbody></tbody></table></td></tr></tbody></table><p class=\"MsoNormal\"><span style=\"font-size:8.0pt;line-height:115%;font-family:\r\n\" arial\",\"sans-serif\";color:black;mso-themecolor:text1\"=\"\">&nbsp; &nbsp; &nbsp;</span></p><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"181\" style=\"width: 136pt;\"><tbody><tr height=\"34\" style=\"height:25.5pt\">\r\n  <td height=\"34\" class=\"xl65\" width=\"181\" style=\"height:25.5pt;width:136pt\">&nbsp;</td></tr></tbody></table><p class=\"MsoNormal\"><span style=\"font-size:8.0pt;line-height:115%;font-family:\r\n\" arial\",\"sans-serif\";color:black;mso-themecolor:text1\"=\"\"></span><span style=\"font-size: 8pt;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </span><span style=\"font-size: 8pt;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></p><p class=\"MsoNormal\"><span style=\"font-size:8.0pt;line-height:115%;font-family:\r\n\" arial\",\"sans-serif\";color:black;mso-themecolor:text1\"=\"\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></p>', NULL, NULL, NULL),
(6, 'camere', 8, 'Camere', 'Camere', 'Camere EforieNord', 'Camerele noastre', NULL, '<p>ngrxgx</p>', 'cazare, eforie nord', 'Cazare in eforie nord', NULL),
(7, 'rezervari', 7, 'Rezerva acum', 'Rezerva acum', 'Rezerva acum', 'Rezerva acum!', NULL, '<p class=\"MsoNormal\"><span style=\"line-height: 115%; color: rgb(0, 0, 255);\">•</span><span style=\"line-height: 115%;\"> <span style=\"color: rgb(0, 0, 0);\">Pentru rezervare se\r\nva achita in avans pretul primei nopti de cazare in</span> <span style=\"font-weight: bold; color: rgb(0, 0, 0);\">cont: RO81BTRLRONCRT0452315601,</span><span style=\"color: rgb(0, 0, 255); font-weight: bold;\">&nbsp; &nbsp; &nbsp; &nbsp;</span><span style=\"color: rgb(0, 0, 0);\"><span style=\"font-weight: bold;\">Banca Transilvania, deschis pe numele Scripcariu Francesca</span><span style=\"font-weight: bold;\">.</span></span><span style=\"color: rgb(0, 0, 255); font-weight: bold;\">&nbsp;</span></span></p><p class=\"MsoNormal\"><span style=\"line-height: 115%;\"><span style=\"line-height: 115%; color: rgb(0, 0, 255);\">•</span><span style=\"line-height: 115%;\"> <span style=\"color: rgb(0, 0, 0);\">Restul de plata a\r\nsejurului se face în momentul check-in- ului.</span></span></span></p><p class=\"MsoNormal\"><span style=\"line-height: 115%;\"><span style=\"line-height: 115%;\"><span style=\"line-height: 115%; color: rgb(0, 0, 255);\">•</span><span style=\"line-height: 115%;\">&nbsp;<span style=\"color: rgb(0, 0, 0);\">Inaintea transferului rugam sa ne contactati\r\npentru a va confirma disponibilitatea locurilor de cazare.</span></span></span></span></p><p class=\"MsoNormal\"><span style=\"line-height: 115%;\"><span style=\"line-height: 115%;\"><span style=\"line-height: 115%;\"><span style=\"line-height: 115%; color: rgb(0, 0, 255);\">•</span><span style=\"line-height: 115%;\"> <span style=\"color: rgb(0, 0, 0);\">Rezervarea va fi\r\nconfirmata in scris sau telefonic de catre departamentul de rezervari.</span></span></span></span></span></p><p class=\"MsoNormal\"><span style=\"line-height: 115%;\"><span style=\"line-height: 115%;\"><span style=\"line-height: 115%;\"><span style=\"line-height: 115%;\"><span style=\"line-height: 115%; color: rgb(255, 0, 0);\">•</span><span style=\"line-height: 115%;\"> <i style=\"color: rgb(0, 0, 255);\">Fara aceasta\r\nconfirmare, rezervarea nu este valida.</i></span></span></span></span></span></p><p class=\"MsoNormal\"><span style=\"line-height: 115%;\"><span style=\"line-height: 115%;\"><span style=\"line-height: 115%;\"><span style=\"line-height: 115%;\"><span style=\"line-height: 115%;\"><span style=\"line-height: 115%; color: rgb(0, 0, 255);\">•</span><span style=\"line-height: 115%;\"> <span style=\"color: rgb(0, 0, 0);\">Avansul nu se\r\nreturneaza daca persoana ( clientul ) nu va comunica printr-un e-mail cu cel\r\nputin 10 zile calendaristice inainte de data sosirii, anularea rezervarii sau\r\nschimbarii in ceea ce priveste data sosirii &nbsp;indiferent de natura cauzei.</span></span></span></span></span></span></span></p><p class=\"MsoNormal\"><span style=\"line-height: 115%;\"><span style=\"line-height: 115%;\"><span style=\"line-height: 115%;\"><span style=\"line-height: 115%;\"><span style=\"line-height: 115%;\"><span style=\"line-height: 115%;\"><span style=\"line-height: 115%; color: rgb(0, 0, 255);\">•</span><span style=\"line-height: 115%;\"> <span style=\"color: rgb(0, 0, 0);\">Cazarea se va face\r\nîn baza prezentarii unui act de identitate ( inclusiv pentru copii ), a\r\nvoucher-ului ( în cazul turistilor cu sejurul comandat la o agentie de turism )\r\nsi a completarii &nbsp;fisei de turist.</span></span></span></span></span></span></span></span></p><p class=\"MsoNormal\"><span style=\"line-height: 115%;\"><span style=\"line-height: 115%;\"><span style=\"line-height: 115%;\"><span style=\"line-height: 115%;\"><span style=\"line-height: 115%;\"><span style=\"line-height: 115%;\"><span style=\"line-height: 115%;\"></span></span></span></span></span></span></span></p><p class=\"MsoNormal\"><span style=\"line-height: 115%;\"><span style=\"color: rgb(0, 0, 255);\">•</span> <span style=\"color: rgb(0, 0, 0);\">Ziua de cazare&nbsp; începe la ora 13.00 (ora de la\r\ncare camera poate fi ocupata / check-in si turistul poate beneficia de toate\r\nserviciile achitate).</span></span></p><p class=\"MsoNormal\"><span style=\"line-height: 115%;\"><b><font face=\"Vijaya, sans-serif\"><span style=\"font-size: 12pt;\"><o:p></o:p></span></font></b></span></p><p class=\"MsoNormal\"><span style=\"line-height: 115%;\"><span style=\"line-height: 115%;\"><span style=\"line-height: 115%;\"><span style=\"line-height: 115%;\"><span style=\"line-height: 115%;\"><span style=\"line-height: 115%;\"><span style=\"line-height: 115%;\"><span style=\"line-height: 115%;\"><span style=\"line-height: 115%;\"><span style=\"color: rgb(0, 0, 255);\">•</span> <span style=\"color: rgb(0, 0, 0);\">Eliberarea camerei,\r\nîn ziua de check-out, se face pâna la ora 10.00.</span></span></span></span></span></span></span></span></span></span></p><p class=\"MsoNormal\"><span style=\"line-height: 115%;\"><span style=\"color: rgb(0, 0, 255);\">• </span><span style=\"color: rgb(0, 0, 0);\">Early\r\ncheck-in: 30% aplicat la pretul primei nop</span></span><span style=\"color: rgb(0, 0, 0);\"><span style=\"line-height: 115%;\">ț</span><span style=\"line-height: 115%;\">i de cazare – în functie de\r\ndisponibilitate, dar nu mai devreme de ora 9.00.</span></span></p><p class=\"MsoNormal\"><span style=\"line-height: 115%;\"><b><font face=\"Vijaya, sans-serif\"><span style=\"font-size: 12pt;\"><o:p></o:p></span></font></b></span></p><p class=\"MsoNormal\"><span style=\"line-height: 115%;\"><span style=\"line-height: 115%;\"><span style=\"line-height: 115%;\"><span style=\"line-height: 115%;\"><span style=\"line-height: 115%;\"><span style=\"line-height: 115%;\"><span style=\"line-height: 115%;\"><span style=\"line-height: 115%;\"><span style=\"line-height: 115%;\"></span></span></span></span></span></span></span></span></span></p><p class=\"MsoNormal\"><span style=\"line-height: 115%;\"><span style=\"color: rgb(0, 0, 255);\">•</span> <span style=\"color: rgb(0, 0, 0);\">Late\r\ncheck- out (pana la ora 22:00): 30% aplicat la pretul ultimei nopti de cazare –\r\nin functie de disponibilitate.</span></span></p><p class=\"MsoNormal\"><span style=\"line-height: 115%;\"><b><font face=\"Vijaya, sans-serif\"><span style=\"font-size: 12pt;\"><o:p></o:p></span></font></b></span></p><p class=\"MsoNormal\"><span style=\"line-height: 115%;\"><span style=\"color: rgb(0, 0, 255);\">•</span> <span style=\"color: rgb(0, 0, 0);\">Camerele sunt exclusiv pentru <i>nefumatori</i>.</span></span></p><p class=\"MsoNormal\"><span style=\"line-height: 115%;\"><b><font face=\"Vijaya, sans-serif\"><span style=\"font-size: 12pt;\"><o:p></o:p></span></font></b></span></p><p class=\"MsoNormal\"><span style=\"line-height: 115%;\"><span style=\"color: rgb(0, 0, 255);\">•</span><span style=\"color: rgb(0, 0, 0);\"> Iubim\r\nanimalele de companie dar NU sunt acceptate in hotel.</span></span></p><p class=\"MsoNormal\"><span style=\"line-height: 115%;\"><b><font face=\"Vijaya, sans-serif\"><span style=\"font-size: 12pt;\"><o:p></o:p></span></font></b></span></p><p class=\"MsoNormal\"><span style=\"line-height: 115%;\"><span style=\"color: rgb(0, 0, 255);\">•</span> <i style=\"color: rgb(0, 0, 0);\">NU\r\nse admite accesul in camere cu produse alimentare !</i></span></p>', NULL, NULL, NULL),
(9, 'galerie_video', 4, 'Galerie Video', 'Galerie Video', 'Galerie Video', 'Galerie Video', NULL, NULL, NULL, NULL, NULL),
(10, 'gdpr', 12, 'GDPR', 'GDPR', '', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `fe_pages_banners`
--

CREATE TABLE `fe_pages_banners` (
  `id` int(11) NOT NULL,
  `idpage` int(11) NOT NULL,
  `img` varchar(50) DEFAULT NULL,
  `img_ref` varchar(50) DEFAULT NULL,
  `titlu` varchar(250) DEFAULT NULL,
  `subtitlu` varchar(250) DEFAULT NULL,
  `href` varchar(250) DEFAULT NULL,
  `thref` varchar(250) DEFAULT NULL,
  `text` varchar(250) DEFAULT NULL,
  `content` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `fe_pages_banners`
--

INSERT INTO `fe_pages_banners` (`id`, `idpage`, `img`, `img_ref`, `titlu`, `subtitlu`, `href`, `thref`, `text`, `content`) VALUES
(136, 5, 'photo-sid47y6h.jpg', 'banner1', NULL, NULL, NULL, NULL, NULL, NULL),
(103, 8, 'photo-ihnucrgt.jpg', 'banner1', NULL, NULL, NULL, NULL, NULL, NULL),
(132, 9, 'photo-q7yepjso.jpg', 'banner1', NULL, NULL, NULL, NULL, NULL, NULL),
(125, 7, 'photo-39btxg15.jpg', 'banner1', NULL, NULL, NULL, NULL, NULL, NULL),
(147, 1, 'photo-f6shzotu.jpg', 'banner1', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `fe_pages_images`
--

CREATE TABLE `fe_pages_images` (
  `id` int(11) NOT NULL,
  `idpage` int(11) NOT NULL,
  `title1` int(11) DEFAULT NULL,
  `title2` int(11) DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL,
  `img_ref` varchar(50) DEFAULT NULL,
  `s` tinyint(4) NOT NULL DEFAULT '0',
  `m` tinyint(4) NOT NULL DEFAULT '0',
  `l` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `fe_pages_images`
--

INSERT INTO `fe_pages_images` (`id`, `idpage`, `title1`, `title2`, `img`, `img_ref`, `s`, `m`, `l`) VALUES
(74, 4, NULL, NULL, 'photo-ohb2ykfx.jpg', 'poza', 1, 1, 1),
(82, 4, NULL, NULL, 'photo-vw9drns0.jpg', 'poza', 1, 1, 1),
(83, 4, NULL, NULL, 'photo-csnfy6uu.jpg', 'poza', 1, 1, 1),
(84, 4, NULL, NULL, 'photo-rslabb4n.jpg', 'poza', 1, 1, 1);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `fe_pages_structure`
--

CREATE TABLE `fe_pages_structure` (
  `id` int(11) NOT NULL,
  `idpage` int(11) NOT NULL,
  `title_content` int(11) NOT NULL DEFAULT '0',
  `subtitle_content` int(11) NOT NULL DEFAULT '0',
  `is_active` int(11) NOT NULL DEFAULT '0' COMMENT '0:false,1:true',
  `is_page` int(11) NOT NULL DEFAULT '0',
  `filehtml` varchar(50) DEFAULT NULL,
  `filejs` varchar(50) DEFAULT NULL,
  `gotcontroller` int(11) NOT NULL DEFAULT '0' COMMENT '0:false,1:true',
  `banner1` int(11) NOT NULL DEFAULT '0' COMMENT '0:false,1:true',
  `banner2` int(11) NOT NULL DEFAULT '0' COMMENT '0:false,1:true',
  `banner3` int(11) NOT NULL DEFAULT '0',
  `banner4` int(11) NOT NULL DEFAULT '0',
  `banner1_w` int(11) DEFAULT NULL,
  `banner1_h` int(11) DEFAULT NULL,
  `banner1_p` int(11) NOT NULL DEFAULT '0' COMMENT 'Keep proportion',
  `banner2_w` int(11) DEFAULT NULL,
  `banner2_h` int(11) DEFAULT NULL,
  `banner2_p` int(11) NOT NULL DEFAULT '0' COMMENT 'Keep proportion',
  `banner3_w` int(11) DEFAULT NULL,
  `banner3_h` int(11) DEFAULT NULL,
  `banner3_p` int(11) NOT NULL DEFAULT '0',
  `banner4_w` int(11) DEFAULT NULL,
  `banner4_h` int(11) DEFAULT NULL,
  `banner4_p` int(11) NOT NULL DEFAULT '0',
  `image` int(11) NOT NULL DEFAULT '0' COMMENT '0:false,1:true',
  `image_sw` int(11) DEFAULT NULL,
  `image_sh` int(11) DEFAULT NULL,
  `image_sp` int(11) NOT NULL DEFAULT '0',
  `image_mw` int(11) DEFAULT NULL,
  `image_mh` int(11) DEFAULT NULL,
  `image_mp` int(11) NOT NULL DEFAULT '0',
  `image_lw` int(11) DEFAULT NULL,
  `image_lh` int(11) DEFAULT NULL,
  `image_lp` int(11) NOT NULL DEFAULT '0',
  `menu` int(11) NOT NULL DEFAULT '0' COMMENT '0:false,1:true',
  `slider` int(11) NOT NULL DEFAULT '0' COMMENT '0:false,1:true'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `fe_pages_structure`
--

INSERT INTO `fe_pages_structure` (`id`, `idpage`, `title_content`, `subtitle_content`, `is_active`, `is_page`, `filehtml`, `filejs`, `gotcontroller`, `banner1`, `banner2`, `banner3`, `banner4`, `banner1_w`, `banner1_h`, `banner1_p`, `banner2_w`, `banner2_h`, `banner2_p`, `banner3_w`, `banner3_h`, `banner3_p`, `banner4_w`, `banner4_h`, `banner4_p`, `image`, `image_sw`, `image_sh`, `image_sp`, `image_mw`, `image_mh`, `image_mp`, `image_lw`, `image_lh`, `image_lp`, `menu`, `slider`) VALUES
(1, 1, 0, 0, 1, 1, 'acasa', NULL, 0, 1, 0, 0, 0, 2100, 1000, 1, 2100, 1000, 1, 2100, 1000, 1, NULL, NULL, 0, 1, NULL, NULL, 0, NULL, NULL, 0, 1200, NULL, 1, 0, 0),
(2, 2, 1, 0, 1, 1, 'contact', NULL, 1, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, 1, 0),
(8, 8, 1, 0, 1, 1, 'galerie_foto', 'js_galerie_foto', 0, 1, 0, 0, 0, 1270, 359, 1, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, 1, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 1, 0, 0),
(4, 4, 1, 0, 1, 1, 'pagina', NULL, 0, 0, 0, 0, 0, 1270, 576, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, 1, 1200, NULL, 1, NULL, NULL, 0, 1200, NULL, 1, 0, 0),
(5, 5, 1, 0, 1, 1, 'oferte', NULL, 0, 1, 0, 0, 0, 1270, 359, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0),
(6, 6, 1, 0, 0, 1, 'camera', 'js_camera', 0, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0),
(7, 7, 1, 0, 1, 1, 'rezervari', NULL, 0, 1, 0, 0, 0, 1270, 359, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0),
(9, 9, 0, 0, 1, 1, 'galerie_video', 'js_galerie_video', 0, 1, 0, 0, 0, 1270, 359, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `galerie_foto`
--

CREATE TABLE `galerie_foto` (
  `id_item` int(11) NOT NULL,
  `id_object` int(11) NOT NULL,
  `item_isactive` int(11) NOT NULL DEFAULT '1',
  `item_key` varchar(50) DEFAULT NULL COMMENT 'Item Key used if item_name doesn''t have a value, or anything else',
  `item_name` varchar(50) DEFAULT NULL,
  `item_parent_fake` tinyint(4) NOT NULL DEFAULT '0',
  `http_id` varchar(250) DEFAULT NULL,
  `http_title_browser` varchar(200) DEFAULT NULL,
  `http_meta_description` varchar(200) DEFAULT NULL,
  `http_keywords` varchar(250) DEFAULT NULL,
  `titlu_prezentare` varchar(250) DEFAULT NULL,
  `i_content_ro` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Eliminarea datelor din tabel `galerie_foto`
--

INSERT INTO `galerie_foto` (`id_item`, `id_object`, `item_isactive`, `item_key`, `item_name`, `item_parent_fake`, `http_id`, `http_title_browser`, `http_meta_description`, `http_keywords`, `titlu_prezentare`, `i_content_ro`) VALUES
(27, 4, 1, 'NR_CRT_27', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 4, 1, 'NR_CRT_26', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 4, 1, 'NR_CRT_25', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 4, 1, 'NR_CRT_24', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 4, 1, 'NR_CRT_23', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 4, 1, 'NR_CRT_22', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 4, 1, 'NR_CRT_1', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `galerie_foto_images`
--

CREATE TABLE `galerie_foto_images` (
  `id` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `title1` int(11) DEFAULT NULL,
  `title2` int(11) DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL,
  `img_ref` varchar(50) DEFAULT NULL,
  `s` tinyint(4) NOT NULL DEFAULT '0',
  `m` tinyint(4) NOT NULL DEFAULT '0',
  `l` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Eliminarea datelor din tabel `galerie_foto_images`
--

INSERT INTO `galerie_foto_images` (`id`, `id_item`, `title1`, `title2`, `img`, `img_ref`, `s`, `m`, `l`) VALUES
(1, 1, NULL, NULL, 'photo-ygebwx3c.jpeg', 'poza', 1, 1, 1),
(3, 2, NULL, NULL, 'photo-fibor3p6.jpeg', 'poza', 1, 1, 1),
(4, 3, NULL, NULL, 'photo-8mrv2j5u.jpeg', 'poza', 1, 1, 1),
(5, 4, NULL, NULL, 'photo-cfdqqvug.jpeg', 'poza', 1, 1, 1),
(15, 13, NULL, NULL, 'photo-laizq4dh.jpg', 'poza', 1, 1, 1),
(7, 6, NULL, NULL, 'photo-3ydxzt8s.jpeg', 'poza', 1, 1, 1),
(8, 7, NULL, NULL, 'photo-j5yfh0p2.jpeg', 'poza', 1, 1, 1),
(9, 8, NULL, NULL, 'photo-e1ap6fcq.jpeg', 'poza', 1, 1, 1),
(10, 9, NULL, NULL, 'photo-y6kets83.jpeg', 'poza', 1, 1, 1),
(12, 10, NULL, NULL, 'photo-etj54dfw.jpg', 'poza', 1, 1, 1),
(14, 12, NULL, NULL, 'photo-sbklw1h9.jpg', 'poza', 1, 1, 1),
(16, 14, NULL, NULL, 'photo-wipzu6a2.jpg', 'poza', 1, 1, 1),
(17, 15, NULL, NULL, 'photo-jkpm07qf.jpg', 'poza', 1, 1, 1),
(18, 15, NULL, NULL, 'photo-rdjwbk7s.jpg', 'poza', 1, 1, 1),
(19, 15, NULL, NULL, 'photo-wbnyavaz.jpg', 'poza', 1, 1, 1),
(20, 15, NULL, NULL, 'photo-6j74qytv.jpg', 'poza', 1, 1, 1),
(21, 15, NULL, NULL, 'photo-c0jhjygh.jpg', 'poza', 1, 1, 1),
(22, 15, NULL, NULL, 'photo-bosfype6.jpg', 'poza', 1, 1, 1),
(30, 18, NULL, NULL, 'photo-8mkixfuk.jpg', 'poza', 1, 1, 1),
(34, 21, NULL, NULL, 'photo-eioxvsce.jpg', 'poza', 1, 1, 1),
(35, 22, NULL, NULL, 'photo-f54ogcrx.jpg', 'poza', 1, 1, 1),
(36, 23, NULL, NULL, 'photo-qjudkwwv.jpg', 'poza', 1, 1, 1),
(37, 24, NULL, NULL, 'photo-qsrkfx21.jpg', 'poza', 1, 1, 1),
(38, 24, NULL, NULL, 'photo-qubhpatf.jpg', 'poza', 1, 1, 1),
(39, 24, NULL, NULL, 'photo-6wrdk02l.jpg', 'poza', 1, 1, 1),
(40, 25, NULL, NULL, 'photo-qbtndpkv.jpg', 'poza', 1, 1, 1),
(41, 26, NULL, NULL, 'photo-0nozghqr.jpg', 'poza', 1, 1, 1),
(42, 27, NULL, NULL, 'photo-lwaecnua.jpg', 'poza', 1, 1, 1);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `galerie_video`
--

CREATE TABLE `galerie_video` (
  `id_item` int(11) NOT NULL,
  `id_object` int(11) NOT NULL,
  `item_isactive` int(11) NOT NULL DEFAULT '1',
  `item_key` varchar(50) DEFAULT NULL COMMENT 'Item Key used if item_name doesn''t have a value, or anything else',
  `item_name` varchar(50) DEFAULT NULL,
  `item_videocode` varchar(200) DEFAULT NULL,
  `item_parent_fake` tinyint(4) NOT NULL DEFAULT '0',
  `http_id` varchar(250) DEFAULT NULL,
  `http_title_browser` varchar(200) DEFAULT NULL,
  `http_meta_description` varchar(200) DEFAULT NULL,
  `http_keywords` varchar(250) DEFAULT NULL,
  `titlu_prezentare` varchar(250) DEFAULT NULL,
  `i_content_ro` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Eliminarea datelor din tabel `galerie_video`
--

INSERT INTO `galerie_video` (`id_item`, `id_object`, `item_isactive`, `item_key`, `item_name`, `item_videocode`, `item_parent_fake`, `http_id`, `http_title_browser`, `http_meta_description`, `http_keywords`, `titlu_prezentare`, `i_content_ro`) VALUES
(21, 5, 1, 'NR_CRT_20', 'Eforie Nord video 3', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/i0x3P9vjT5w\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 5, 1, 'NR_CRT_19', 'San Pantaleo Rooms', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/m8fVdmwTcRI\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 5, 1, 'NR_CRT_18', 'Eforie Nord - iarna', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Q4QTlWNGo0Q\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 5, 1, 'NR_CRT_1', 'Eforie Nord video 1', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/MP98tFYg3tA\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 5, 1, 'NR_CRT_16', 'Eforie Nord video 2', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/zRU9iwQQtNE\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 5, 1, 'NR_CRT_17', 'Eforie Nord - primavara', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/DUd5eaBv0kU\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 5, 1, 'NR_CRT_22', 'Eforie Nord video 4', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/b-Xk_S1EA0o\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 5, 1, 'NR_CRT_24', 'Eforie Nord - Rasarit', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/7bQSP6KnQj4\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 5, 1, 'NR_CRT_25', 'Eforie Nord video 5', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/d16M6cI4gkk\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 5, 1, 'NR_CRT_26', 'Eforie Nord video 7', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/BxKqfOFjZPg\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></ifram', 0, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `galerie_video_images`
--

CREATE TABLE `galerie_video_images` (
  `id` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `title1` int(11) DEFAULT NULL,
  `title2` int(11) DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL,
  `img_ref` varchar(50) DEFAULT NULL,
  `s` tinyint(4) NOT NULL DEFAULT '0',
  `m` tinyint(4) NOT NULL DEFAULT '0',
  `l` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Eliminarea datelor din tabel `galerie_video_images`
--

INSERT INTO `galerie_video_images` (`id`, `id_item`, `title1`, `title2`, `img`, `img_ref`, `s`, `m`, `l`) VALUES
(1, 1, NULL, NULL, 'photo-pgcgm263.jpg', 'poza', 1, 1, 1),
(2, 2, NULL, NULL, 'photo-pgcgm263.jpg', 'poza', 1, 1, 1),
(3, 3, NULL, NULL, 'photo-pgcgm263.jpg', 'poza', 1, 1, 1),
(4, 4, NULL, NULL, 'photo-pgcgm263.jpg', 'poza', 1, 1, 1),
(5, 5, NULL, NULL, 'photo-pgcgm263.jpg', 'poza', 1, 1, 1),
(6, 6, NULL, NULL, 'photo-pgcgm263.jpg', 'poza', 1, 1, 1),
(7, 7, NULL, NULL, 'photo-pgcgm263.jpg', 'poza', 1, 1, 1),
(8, 8, NULL, NULL, 'photo-pco9v7st.jpg', 'poza', 1, 1, 1),
(9, 10, NULL, NULL, 'photo-ciuns4j3.png', 'poza', 1, 1, 1),
(10, 11, NULL, NULL, 'photo-gp7hmt8b.jpg', 'poza', 1, 1, 1),
(11, 12, NULL, NULL, 'photo-pjun4kor.jpg', 'poza', 1, 1, 1),
(13, 15, NULL, NULL, 'photo-sy3dyz4l.jpg', 'poza', 1, 1, 1),
(14, 16, NULL, NULL, 'photo-d0aszk5k.jpg', 'poza', 1, 1, 1),
(15, 17, NULL, NULL, 'photo-qppxtu8o.jpg', 'poza', 1, 1, 1),
(16, 18, NULL, NULL, 'photo-3jnv7xmb.jpg', 'poza', 1, 1, 1),
(17, 19, NULL, NULL, 'photo-krnuawbi.jpg', 'poza', 1, 1, 1),
(19, 21, NULL, NULL, 'photo-rz7nalnc.jpg', 'poza', 1, 1, 1),
(20, 22, NULL, NULL, 'photo-fyo9ehj1.jpg', 'poza', 1, 1, 1),
(21, 23, NULL, NULL, 'photo-pmitlqst.jpg', 'poza', 1, 1, 1),
(22, 24, NULL, NULL, 'photo-tfiqfbga.jpg', 'poza', 1, 1, 1),
(23, 25, NULL, NULL, 'photo-jr1np8kz.jpg', 'poza', 1, 1, 1),
(24, 26, NULL, NULL, 'photo-ywr3s56f.jpg', 'poza', 1, 1, 1);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `meniuri`
--

CREATE TABLE `meniuri` (
  `id_item` int(11) NOT NULL,
  `id_object` int(11) NOT NULL,
  `item_isactive` tinyint(4) NOT NULL DEFAULT '0',
  `item_key` varchar(100) DEFAULT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_parent_fake` tinyint(4) NOT NULL DEFAULT '0',
  `path` varchar(50) DEFAULT NULL,
  `fullpath` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Eliminarea datelor din tabel `meniuri`
--

INSERT INTO `meniuri` (`id_item`, `id_object`, `item_isactive`, `item_key`, `item_name`, `item_parent_fake`, `path`, `fullpath`) VALUES
(1, 1, 1, NULL, 'Acasa', 1, NULL, '/'),
(2, 1, 1, NULL, 'Contact', 1, NULL, 'contact'),
(5, 1, 1, NULL, 'Galerie', 1, NULL, 'galerie-foto'),
(4, 1, 1, NULL, 'Prezentare', 1, NULL, 'despre_noi'),
(6, 1, 1, NULL, 'Galerie foto', 0, NULL, 'galerie/galerie_foto'),
(7, 1, 1, NULL, 'Galerie video', 0, NULL, 'galerie/galerie_video'),
(8, 1, 1, NULL, 'Tarife', 1, NULL, 'oferte'),
(9, 1, 1, NULL, 'Rezerva ACUM', 1, NULL, 'rezervari'),
(10, 1, 1, NULL, 'Camere', 1, NULL, 'camere'),
(17, 1, 1, NULL, 'GDPR', 0, NULL, 'gdpr'),
(18, 1, 1, NULL, 'Politica Cookies', 0, NULL, 'politica_cookies'),
(19, 1, 1, NULL, 'Termeni si Conditii', 0, NULL, 'termeni_conditii');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `newsletter`
--

CREATE TABLE `newsletter` (
  `id_item` int(11) NOT NULL,
  `numeprenume` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `newsletter`
--

INSERT INTO `newsletter` (`id_item`, `numeprenume`, `email`) VALUES
(2, 'web etwas', 'test@webetwas.com'),
(3, 'asdasda', 'asdada@yahoo.com'),
(4, 'info23', 'info23@cantatic.com');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `obj_content`
--

CREATE TABLE `obj_content` (
  `idcontent_object` int(11) NOT NULL,
  `orderby` int(11) NOT NULL DEFAULT '0',
  `id_object` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `id_link` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `obj_content`
--

INSERT INTO `obj_content` (`idcontent_object`, `orderby`, `id_object`, `id_item`, `id_link`) VALUES
(1, 1, 1, 1, 5),
(2, 13, 1, 2, 5),
(5, 10, 1, 5, 5),
(4, 2, 1, 4, 5),
(6, 11, 1, 6, 5),
(7, 12, 1, 7, 5),
(8, 14, 1, 8, 5),
(9, 15, 1, 9, 5),
(73, 1, 3, 10, 6),
(53, 3, 1, 10, 5),
(77, 2, 5, 15, 9),
(89, 0, 4, 21, 8),
(98, 4, 3, 13, 6),
(97, 2, 3, 12, 6),
(96, 3, 3, 11, 6),
(86, 10, 5, 24, 9),
(78, 3, 5, 16, 9),
(85, 5, 5, 23, 9),
(83, 4, 5, 21, 9),
(90, 0, 4, 22, 8),
(80, 9, 5, 18, 9),
(81, 1, 5, 19, 9),
(95, 0, 4, 27, 8),
(94, 0, 4, 26, 8),
(93, 0, 4, 25, 8),
(92, 0, 4, 24, 8),
(91, 0, 4, 23, 8),
(103, 2, 1, 19, 10),
(102, 3, 1, 18, 10),
(101, 1, 1, 17, 10),
(79, 8, 5, 17, 9),
(88, 7, 5, 26, 9),
(87, 6, 5, 25, 9),
(99, 5, 3, 14, 6),
(104, 0, 3, 15, 6);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `obj_objects`
--

CREATE TABLE `obj_objects` (
  `id_object` int(11) NOT NULL,
  `obj_controller` varchar(50) NOT NULL,
  `obj_name` varchar(50) NOT NULL,
  `obj_table` varchar(50) NOT NULL,
  `obj_table_img` varchar(50) DEFAULT NULL,
  `targetchains` varchar(250) DEFAULT NULL COMMENT 'jSON to restrict access to Chains'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `obj_objects`
--

INSERT INTO `obj_objects` (`id_object`, `obj_controller`, `obj_name`, `obj_table`, `obj_table_img`, `targetchains`) VALUES
(1, 'meniuri', 'meniuri', 'meniuri', NULL, NULL),
(5, 'galerie_video', 'galerie_video', 'galerie_video', 'galerie_video_images', '{\"column\":\"id_link\",\"values\":[9]}'),
(3, 'camere', 'camere', 'camere', 'camere_images', '{\"column\":\"id_link\",\"values\":[6]}'),
(4, 'galerie_foto', 'galerie_foto', 'galerie_foto', 'galerie_foto_images', '{\"column\":\"id_link\",\"values\":[8]}');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `portofoliu_proiecte`
--

CREATE TABLE `portofoliu_proiecte` (
  `id_item` int(11) NOT NULL,
  `id_object` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_parent_fake` tinyint(4) NOT NULL DEFAULT '0',
  `item_content_ro` varchar(150) DEFAULT NULL,
  `item_www` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `portofoliu_proiecte_images`
--

CREATE TABLE `portofoliu_proiecte_images` (
  `id` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `title1` int(11) DEFAULT NULL,
  `title2` int(11) DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL,
  `img_ref` varchar(50) DEFAULT NULL,
  `s` tinyint(4) NOT NULL DEFAULT '0',
  `m` tinyint(4) NOT NULL DEFAULT '0',
  `l` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `be_ocompany`
--
ALTER TABLE `be_ocompany`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idowner` (`idowner`);

--
-- Indexuri pentru tabele `be_owner`
--
ALTER TABLE `be_owner`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `be_users`
--
ALTER TABLE `be_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD KEY `idowner` (`idowner`);

--
-- Indexuri pentru tabele `camere`
--
ALTER TABLE `camere`
  ADD PRIMARY KEY (`id_item`),
  ADD UNIQUE KEY `http_id` (`http_id`),
  ADD KEY `id_object` (`id_object`);

--
-- Indexuri pentru tabele `camere_images`
--
ALTER TABLE `camere_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idpage` (`id_item`);

--
-- Indexuri pentru tabele `camere_intervale`
--
ALTER TABLE `camere_intervale`
  ADD PRIMARY KEY (`id_interval`),
  ADD KEY `id_camera` (`id_item`);

--
-- Indexuri pentru tabele `camere_rezervari`
--
ALTER TABLE `camere_rezervari`
  ADD PRIMARY KEY (`id_rezervare`);

--
-- Indexuri pentru tabele `chain_links`
--
ALTER TABLE `chain_links`
  ADD PRIMARY KEY (`id_link`),
  ADD KEY `id_parent` (`id_parent`);

--
-- Indexuri pentru tabele `fe_pages`
--
ALTER TABLE `fe_pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_page` (`id_page`);

--
-- Indexuri pentru tabele `fe_pages_banners`
--
ALTER TABLE `fe_pages_banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idpage` (`idpage`);

--
-- Indexuri pentru tabele `fe_pages_images`
--
ALTER TABLE `fe_pages_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idpage` (`idpage`);

--
-- Indexuri pentru tabele `fe_pages_structure`
--
ALTER TABLE `fe_pages_structure`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idpage` (`idpage`);

--
-- Indexuri pentru tabele `galerie_foto`
--
ALTER TABLE `galerie_foto`
  ADD PRIMARY KEY (`id_item`),
  ADD UNIQUE KEY `http_id` (`http_id`),
  ADD KEY `id_object` (`id_object`);

--
-- Indexuri pentru tabele `galerie_foto_images`
--
ALTER TABLE `galerie_foto_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idpage` (`id_item`);

--
-- Indexuri pentru tabele `galerie_video`
--
ALTER TABLE `galerie_video`
  ADD PRIMARY KEY (`id_item`),
  ADD UNIQUE KEY `http_id` (`http_id`),
  ADD KEY `id_object` (`id_object`);

--
-- Indexuri pentru tabele `galerie_video_images`
--
ALTER TABLE `galerie_video_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idpage` (`id_item`);

--
-- Indexuri pentru tabele `meniuri`
--
ALTER TABLE `meniuri`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `id_object` (`id_object`);

--
-- Indexuri pentru tabele `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id_item`);

--
-- Indexuri pentru tabele `obj_content`
--
ALTER TABLE `obj_content`
  ADD PRIMARY KEY (`idcontent_object`),
  ADD KEY `id_object` (`id_object`),
  ADD KEY `id_item` (`id_item`),
  ADD KEY `id_category` (`id_link`);

--
-- Indexuri pentru tabele `obj_objects`
--
ALTER TABLE `obj_objects`
  ADD PRIMARY KEY (`id_object`),
  ADD UNIQUE KEY `table` (`obj_table`);

--
-- Indexuri pentru tabele `portofoliu_proiecte`
--
ALTER TABLE `portofoliu_proiecte`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `id_object` (`id_object`);

--
-- Indexuri pentru tabele `portofoliu_proiecte_images`
--
ALTER TABLE `portofoliu_proiecte_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idpage` (`id_item`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `be_ocompany`
--
ALTER TABLE `be_ocompany`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pentru tabele `be_owner`
--
ALTER TABLE `be_owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pentru tabele `be_users`
--
ALTER TABLE `be_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pentru tabele `camere`
--
ALTER TABLE `camere`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pentru tabele `camere_images`
--
ALTER TABLE `camere_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pentru tabele `camere_intervale`
--
ALTER TABLE `camere_intervale`
  MODIFY `id_interval` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pentru tabele `camere_rezervari`
--
ALTER TABLE `camere_rezervari`
  MODIFY `id_rezervare` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pentru tabele `chain_links`
--
ALTER TABLE `chain_links`
  MODIFY `id_link` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pentru tabele `fe_pages`
--
ALTER TABLE `fe_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pentru tabele `fe_pages_banners`
--
ALTER TABLE `fe_pages_banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT pentru tabele `fe_pages_images`
--
ALTER TABLE `fe_pages_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT pentru tabele `fe_pages_structure`
--
ALTER TABLE `fe_pages_structure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pentru tabele `galerie_foto`
--
ALTER TABLE `galerie_foto`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pentru tabele `galerie_foto_images`
--
ALTER TABLE `galerie_foto_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pentru tabele `galerie_video`
--
ALTER TABLE `galerie_video`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pentru tabele `galerie_video_images`
--
ALTER TABLE `galerie_video_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pentru tabele `meniuri`
--
ALTER TABLE `meniuri`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pentru tabele `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pentru tabele `obj_content`
--
ALTER TABLE `obj_content`
  MODIFY `idcontent_object` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT pentru tabele `obj_objects`
--
ALTER TABLE `obj_objects`
  MODIFY `id_object` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pentru tabele `portofoliu_proiecte`
--
ALTER TABLE `portofoliu_proiecte`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `portofoliu_proiecte_images`
--
ALTER TABLE `portofoliu_proiecte_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
