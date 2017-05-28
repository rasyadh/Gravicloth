-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2017 at 10:16 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clothdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id_city` int(11) NOT NULL,
  `id_province` int(11) NOT NULL,
  `city_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id_city`, `id_province`, `city_name`) VALUES
(1, 1, 'Kab. Badung'),
(2, 1, 'Kab. Bangli'),
(3, 1, 'Kab. Buleleng'),
(4, 1, 'Kab Gianyar'),
(5, 1, 'Kab. Jembrana'),
(6, 1, 'Kab. Karangasem'),
(7, 1, 'Kab. Klungkung'),
(8, 1, 'Kab. Tabanan'),
(9, 1, 'Kota Denpasar'),
(10, 2, 'Kab. Bangka'),
(11, 2, 'Kab. Bangka Barat'),
(12, 2, 'Kab. Bangka Selatan'),
(13, 2, 'Kab. Bangka Tengah'),
(14, 2, 'Kab. Belitung'),
(15, 2, 'Kab. Belitung Timur'),
(16, 2, 'Kota Pangkal Pinang'),
(17, 3, 'Kab. Lebak'),
(18, 3, 'Kab. Pandeglang'),
(19, 3, 'Kab. Serang'),
(20, 3, 'Kab. Tangerang'),
(21, 3, 'Kota Cilegon'),
(22, 3, 'Kota Serang'),
(23, 3, 'Kota Tangerang'),
(24, 3, 'Kota Tangerang Selatan'),
(25, 4, 'Kab. Bengkulu Selatan'),
(26, 4, 'Kab. Bengkulu Tengah'),
(27, 4, 'Kab. Bengkulu Utara'),
(28, 4, 'Kab. Kaur'),
(29, 4, 'Kab. Kepahiang'),
(30, 4, 'Kab. Lebong'),
(31, 4, 'Kab. Muko Muko'),
(32, 4, 'Kab. Rejang Lebong'),
(33, 4, 'Kab. Seluma'),
(34, 4, 'Kota Bengkulu'),
(35, 5, 'Kab. Bantul'),
(36, 5, 'Kab. Gunung Kidul'),
(37, 5, 'Kab. Kulon Progo'),
(38, 5, 'Kab. Sleman'),
(39, 5, 'Kota Yogyakarta'),
(40, 6, 'Kab. Kepulauan Seribu'),
(41, 6, 'Kota Jakarta Barat'),
(42, 6, 'Kota Jakarta Pusat'),
(43, 6, 'Kota Jakarta Selatan'),
(44, 6, 'Kota Jakarta Timur'),
(45, 6, 'Kota Jakarta Utara'),
(46, 7, 'Kab. Boalemo'),
(47, 7, 'Kab. Bone Bolango'),
(48, 7, 'Kab. Gorontalo'),
(49, 7, 'Kab. Gorontalo Utara'),
(50, 7, 'Kab. Pohuwato'),
(51, 7, 'Kota Gorontalo'),
(52, 8, 'Kab. Batang Hari'),
(53, 8, 'Kab. Bungo'),
(54, 8, 'Kab. Kerinci'),
(55, 8, 'Kab. Merangin'),
(56, 8, 'Kab, Muaro Jambi'),
(57, 8, 'Kab. Sarolangun'),
(58, 8, 'Kab. Tanjung Jabung Barat'),
(59, 8, 'Kab. Tanjung Jabung Timur'),
(60, 8, 'Kab. Tebo'),
(61, 8, 'Kota Jambi'),
(62, 8, 'Kota Sungaipenuh'),
(63, 9, 'Kab. Bandung'),
(64, 9, 'Kab. Bandung Barat'),
(65, 9, 'Kab. Bekasi'),
(66, 9, 'Kab. Bogor'),
(67, 9, 'Kab. Ciamis'),
(68, 9, 'Kab. Cianjur'),
(69, 9, 'Kab. Cirebon'),
(70, 9, 'Kab. Garut'),
(71, 9, 'Kab. Indramayu'),
(72, 9, 'Kab. Karawang'),
(73, 9, 'Kab. Kuningan'),
(74, 9, 'Kab. Majalengka'),
(75, 9, 'Kab. Purwakarta'),
(76, 9, 'Kab. Subang'),
(77, 9, 'Kab. Sukabumi'),
(78, 9, 'Kab. Sumedang'),
(79, 9, 'Kab. Tasikmalaya'),
(80, 9, 'Kota Bandung'),
(81, 9, 'Kota Banjar'),
(82, 9, 'Kota Bekasi'),
(83, 9, 'Kota Bogor'),
(84, 9, 'Kota Cimahi'),
(85, 9, 'Kota Cirebon'),
(86, 9, 'Kota Depok'),
(87, 9, 'Kota Sukabumi'),
(88, 9, 'Kota Tasikmalaya'),
(89, 10, 'Kab. Banjarnegara'),
(90, 10, 'Kab. Banyumas'),
(91, 10, 'Kab. Batang'),
(92, 10, 'Kab. Blora'),
(93, 10, 'Kab. Boyolali'),
(94, 10, 'Kab. Brebes'),
(95, 10, 'Kab. Cilacap'),
(96, 10, 'Kab. Demak'),
(97, 10, 'Kab. Grobongan'),
(98, 10, 'Kab. Jepara'),
(99, 10, 'Kab. Karanganyar'),
(100, 10, 'Kab. Kebumen'),
(101, 10, 'Kab. Kendal'),
(102, 10, 'Kab. Klaten'),
(103, 10, 'Kab. Kudus'),
(104, 10, 'Kab. Magelang'),
(105, 10, 'Kab. Pati'),
(106, 10, 'Kab. Pekalongan'),
(107, 10, 'Kab. Pemalang'),
(108, 10, 'Kab. Purbalingga'),
(109, 10, 'Kab. Purworejo'),
(110, 10, 'Kab. Rembang'),
(111, 10, 'Kab. Sragen'),
(112, 10, 'Kab. Sukoharjo'),
(113, 10, 'Kab. Tegal'),
(114, 10, 'Kab. Temanggung'),
(115, 10, 'Kab. Wonogiri'),
(116, 10, 'Kab. Wonosobo'),
(117, 10, 'Kota Magelang'),
(118, 10, 'Kota Pekalongan'),
(119, 10, 'Kota Salatiga'),
(120, 10, 'Kota Semarang'),
(121, 10, 'Kota Surakarta (Solo)'),
(122, 10, 'Kota Tegal'),
(123, 11, 'Kab. Bangkalan'),
(124, 11, 'Kab. Banyuwangi'),
(125, 11, 'Kab. Blitar'),
(126, 11, 'Kab. Bojonegoro'),
(127, 11, 'Kab. Bondowoso'),
(128, 11, 'Kab. Gresik'),
(129, 11, 'Kab. Jember'),
(130, 11, 'kab. Jombang'),
(131, 11, 'Kab. Kediri'),
(132, 11, 'Kab. Lamongan'),
(133, 11, 'kab. Lumajang'),
(134, 11, 'Kab. Madiun'),
(135, 11, 'Kab. Magetan'),
(136, 11, 'Kab. Malang'),
(137, 11, 'Kab. Mojokerto'),
(138, 11, 'Kab. Nganjuk'),
(139, 11, 'Kab. Ngawi'),
(140, 11, 'Kab. Pacitan'),
(141, 11, 'Kab. Pamekasan'),
(142, 11, 'Kab. Pasuruan'),
(143, 11, 'Kab. Ponorogo'),
(144, 11, 'Kab. Probolinggo'),
(145, 11, 'Kab. Sampang'),
(146, 11, 'Kab. Sidoarjo'),
(147, 11, 'Kab. Situbondo'),
(148, 11, 'Kab. Sumenep'),
(149, 11, 'Kab. Trenggalek'),
(150, 11, 'Kab. Tuban'),
(151, 11, 'Kab. Tulungaung'),
(152, 11, 'Kota Batu'),
(153, 11, 'Kota Madiun'),
(154, 11, 'Kota Malang'),
(155, 11, 'Kota Mojokerto'),
(156, 11, 'Kota Pasuruan'),
(157, 11, 'Kota Probolinggo'),
(158, 11, 'Kota Surabaya'),
(159, 12, 'Kab. Bengkayang'),
(160, 12, 'Kab. Kapuas Hulu'),
(161, 12, 'Kab. Kayong Utara'),
(162, 12, 'Kab. Ketapang'),
(163, 12, 'Kab. Kubu Raya'),
(164, 12, 'Kab. Landak'),
(165, 12, 'Kab. Melawi'),
(166, 12, 'Kab. Pontianak'),
(167, 12, 'Kab. Sambas'),
(168, 12, 'Kab. Sanggau'),
(169, 12, 'Kab. Sekadau'),
(170, 12, 'Kab. Sintang'),
(171, 12, 'Kota Pontianak'),
(172, 12, 'Kota Singkawang'),
(173, 13, 'Kab. Balangan'),
(174, 13, 'Kab. Banjar'),
(175, 13, 'Kab. Barito Kuala'),
(176, 13, 'Kab. Hulu Sungai Selatan'),
(177, 13, 'Kab. Hulu Sungai Tengah'),
(178, 13, 'Kab. Hulu Sungai Utara'),
(179, 13, 'Kotabaru'),
(180, 13, 'Kab. Tabalong'),
(181, 13, 'Kab. Tanah Bumbu'),
(182, 13, 'Kab. Tanah Laut'),
(183, 13, 'Kab. Tapin'),
(184, 13, 'Kota Banjarbaru'),
(185, 13, 'Kota Banjarmasin'),
(186, 14, 'kab. Barito Selatan'),
(187, 14, 'Kab. Barito Timur'),
(188, 14, 'Kab. Barito Utara'),
(189, 14, 'Kab. Gunung Mas'),
(190, 14, 'Kab. Kapuas'),
(191, 14, 'Kab. Katingan'),
(192, 14, 'Kab. Kotawaringin Barat'),
(193, 14, 'Kab. Kotawaringin Timur'),
(194, 14, 'Kab. Lamandau'),
(195, 14, 'kab. Murung Raya'),
(196, 14, 'Kab. Pulang Pisau'),
(197, 14, 'Kab. Seruyan'),
(198, 14, 'Kab. Sukamara'),
(199, 14, 'Kota Palangka Raya'),
(200, 15, 'Kab. Berau'),
(201, 15, 'Kutai Barat'),
(202, 15, 'Kab. Kutai Kartanegara'),
(203, 15, 'Kab. Kutai Timur'),
(204, 15, 'Kab. Paser'),
(205, 15, 'Kab. Penajam Paser Utara'),
(206, 15, 'Kota Balikpapan'),
(207, 15, 'Kota Bontang'),
(208, 15, 'Kota Samarinda'),
(209, 16, 'Kab. Bulungan (Bulongan)'),
(210, 16, 'Kab. Malinau'),
(211, 16, 'Kab. Nunukan'),
(212, 16, 'Kab. Tana Tidung'),
(213, 16, 'Kota Tarakan'),
(214, 17, 'Kab. Bintan'),
(215, 17, 'Kab. Karimun'),
(216, 17, 'Kab. kepulauan Anambas'),
(217, 17, 'Kab. Lingga'),
(218, 17, 'Kab. Natuna'),
(219, 17, 'Kota Batam'),
(220, 17, 'Kota Tanjung Pinang'),
(221, 18, 'Kab. Lampung Barat'),
(222, 18, 'Kab. Lampung Selatan'),
(223, 18, 'Kab. Lampung Tengah'),
(224, 18, 'Kab. Lampung Timur'),
(225, 18, 'Kab. Lampung Utara'),
(226, 18, 'Kab. Mesuji'),
(227, 18, 'Kab. Pesawaran'),
(228, 18, 'Kab. Pringsewu'),
(229, 18, 'Kab. Tanggamus'),
(230, 18, 'Kab. Tulang Bawang'),
(231, 18, 'Kab. Tulang Bawang Barat'),
(232, 18, 'Kab. Way Kanan'),
(233, 18, 'Kota Bandar Lampung'),
(234, 18, 'Kota Metro'),
(235, 19, 'Kab. Buru'),
(236, 19, 'Kab. Buru Selatan'),
(237, 19, 'Kab. Kepulauan Aru'),
(238, 19, 'Kab. Maluku Barat Daya'),
(239, 19, 'Kab. Maluku Tengah'),
(240, 19, 'Kab. Maluku Tenggara'),
(241, 19, 'Kab. Maluku Tenggara Barat'),
(242, 19, 'Kab. Seram Bagian Barat'),
(243, 19, 'Kab. Seram Bagian Timur'),
(244, 19, 'Kota Ambon'),
(245, 19, 'Kota Tual'),
(246, 20, 'Kab. Halmahera Barat'),
(247, 20, 'Kab. Halmahera Selatan'),
(248, 20, 'Kab. Halmahera Tengah'),
(249, 20, 'Kab. Halmahera Timur'),
(250, 20, 'Kab. Halmahera Utara'),
(251, 20, 'Kab. Kepulauan Sula'),
(252, 20, 'Kab. Pulau Morotai'),
(253, 20, 'Kota Ternate'),
(254, 20, 'Kota Tidore Kepulauan'),
(255, 21, 'Kab. Aceh Barat'),
(256, 21, 'Kab. Aceh Barat Daya'),
(257, 21, 'Kab. Aceh Besar'),
(258, 21, 'Kab. Aceh Jaya'),
(259, 21, 'Kab. Aceh Selatan'),
(260, 21, 'Kab. Aceh Singkil'),
(261, 21, 'Kab. Aceh Tamiang'),
(262, 21, 'Kab. Aceh Tengah'),
(263, 21, 'Kab. Aceh Tenggara'),
(264, 21, 'Kab. Aceh Timur'),
(265, 21, 'Kab. Aceh Utara'),
(266, 21, 'Kab. Bener Meriah'),
(267, 21, 'Kab. Bireuen'),
(268, 21, 'Kab. Gayo Lues'),
(269, 21, 'Kab. Nagan Raya'),
(270, 21, 'Kab. Pidie'),
(271, 21, 'Kab. Pidie Jaya'),
(272, 21, 'Kab. Simeulue'),
(273, 21, 'Kota Banda Aceh'),
(274, 21, 'Kota Langsa'),
(275, 21, 'Kota Lhokseumawe'),
(276, 21, 'Kota Sabang'),
(277, 21, 'Kota Subulussalam'),
(278, 22, 'Kab. Bima'),
(279, 22, 'Kab. Dompu'),
(280, 22, 'Kab. Lombok Barat'),
(281, 22, 'Kab. Lombok Tengah'),
(282, 22, 'Kab. Lombok Timur'),
(283, 22, 'Kab. Lombok Utara'),
(284, 22, 'Kab. Sumbawa'),
(285, 22, 'Kab. Sumbawa Barat'),
(286, 22, 'Kota Bima'),
(287, 22, 'Kota Mataram'),
(288, 23, 'Kab. Alor'),
(289, 23, 'Kab. Belu'),
(290, 23, 'Kab. Ende'),
(291, 23, 'Kab. Flores Timur'),
(292, 23, 'Kab. Kupang'),
(293, 23, 'Kab. Lembata'),
(294, 23, 'Kab. Manggarai'),
(295, 23, 'Kab. manggarai Barat'),
(296, 23, 'Kab. Manggarai Timur'),
(297, 23, 'Kab. Nagekeo'),
(298, 23, 'Kab. Ngada'),
(299, 23, 'Kab. Rote Ndao'),
(300, 23, 'Kab. Sabu Raijua'),
(301, 23, 'Kab. Sikka'),
(302, 23, 'Kab. Sumba Barat'),
(303, 23, 'Kab. Sumba Barat Daya'),
(304, 23, 'Kab. Sumba Tengah'),
(305, 23, 'Kab. Sumba Timur'),
(306, 23, 'Kab. Timor Tengah Selatan'),
(307, 23, 'Kab. Timor Tengah Utara'),
(308, 23, 'Kota Kupang'),
(309, 24, 'Kab. Asmat'),
(310, 24, 'Kab. Biak Numfor'),
(311, 24, 'Kab. Boven Digoel'),
(312, 24, 'Kab. Deiyai (Deliyai)'),
(313, 24, 'Kab. Dogiyai'),
(314, 24, 'Kab. Intan Jaya'),
(315, 24, 'Kab. Jayapura'),
(316, 24, 'Kab. Jayawijaya'),
(317, 24, 'Kab. Keerom'),
(318, 24, 'Kab. Kepulauan Yapen (Yapen Waropen)'),
(319, 24, 'Kab. Lanny Jaya'),
(320, 24, 'Kab. Mamberamo Raya'),
(321, 24, 'Kab. Mamberamo Tengah'),
(322, 24, 'Kab. Mappi'),
(323, 24, 'Kab. Merauke'),
(324, 24, 'Kab. Mimika'),
(325, 24, 'Kab. Nabire'),
(326, 24, 'Kab. Nduga'),
(327, 24, 'Kab. Paniai'),
(328, 24, 'Kab. Pegunungan Bintang'),
(329, 24, 'Kab. Puncak'),
(330, 24, 'Kab. Puncak Jaya'),
(331, 24, 'Kab. Sarmi'),
(332, 24, 'Kab. Supiori'),
(333, 24, 'Kab. Tolikara'),
(334, 24, 'Kab. Waropen'),
(335, 24, 'Kab. Yahukimo'),
(336, 24, 'Kab. Yalimo'),
(337, 24, 'Kota Jayapura'),
(338, 25, 'Kab. Fakfak'),
(339, 25, 'Kab. Kaimana'),
(340, 25, 'Kab. Manokwari'),
(341, 25, 'Kab. Maybrat'),
(342, 25, 'Kab. Raja Ampat'),
(343, 25, 'Kab. Sorong'),
(344, 25, 'Kab. Sorong Selatan'),
(345, 25, 'Kab. Tambrauw'),
(346, 25, 'Kab. Teluk Bintuni'),
(347, 25, 'Kab. Teluk Wondama'),
(348, 25, 'Kab. Kota Sorong'),
(349, 26, 'Kab. Bengkalis'),
(350, 26, 'Kab. Indragiri Hiir'),
(351, 26, 'Kab. Indragoro Hulu'),
(352, 26, 'Kab. Kampar'),
(353, 26, 'Kab. Kepulauan Meranti'),
(354, 26, 'Kab. Kuantan Singingi'),
(355, 26, 'Kab. Pelalawan'),
(356, 26, 'Kab. Rokan Hilir'),
(357, 26, 'Kab. Rokan Hulu'),
(358, 26, 'Kab. Siak'),
(359, 26, 'Kota Dumai'),
(360, 26, 'Kota Pekanbaru'),
(361, 27, 'Kab. Majene'),
(362, 27, 'Kab. Mamasa'),
(363, 27, 'Kab. Mamuju'),
(364, 27, 'Kab. Mamuju Utara'),
(365, 27, 'Kab. Polewali Mandar'),
(366, 28, 'Kab. Bantaeng'),
(367, 28, 'Kab. Barru'),
(368, 28, 'Kab. Bone'),
(369, 28, 'Kab. Bulukumba'),
(370, 28, 'Kab. Enrekang'),
(371, 28, 'Kab. Gowa'),
(372, 28, 'Kab. Jeneponto'),
(373, 28, 'Kab. Luwu'),
(374, 28, 'Kab. Luwu Timur'),
(375, 28, 'Kab. Luwu Utara'),
(376, 28, 'Kab. Maros'),
(377, 28, 'Kab. Pangkajene Kepulauan'),
(378, 28, 'Kab. Pinrang'),
(379, 28, 'Kab. Selayar (Kepulauan Selayar'),
(380, 28, 'Kab. Sidenreng Rappang/Rapang'),
(381, 28, 'Kab. Sinjai'),
(382, 28, 'Kab. Soppeng'),
(383, 28, 'Kab. Takalar'),
(384, 28, 'Kab. Tana Toraja'),
(385, 28, 'Kab. Toraja Utara'),
(386, 28, 'Kab. Wajo'),
(387, 28, 'Kota Makassar'),
(388, 28, 'Kota Palopo'),
(389, 28, 'Kota Parepare'),
(390, 29, 'Kab. Banggai'),
(391, 29, 'Kab. Banggai Kepulauan'),
(392, 29, 'Kab. Buol'),
(393, 29, 'Kab. Donggala'),
(394, 29, 'Kab. Morowali'),
(395, 29, 'Kab. Parigi Muotong'),
(396, 29, 'Kab. Poso'),
(397, 29, 'Kab. Sigi'),
(398, 29, 'Kab. Tojo Una-Una'),
(399, 29, 'Kab. Toli-Toli'),
(400, 29, 'Kota Palu'),
(401, 30, 'Kab. Bombana'),
(402, 30, 'Kab. Buton'),
(403, 30, 'Kab. Buton Utara'),
(404, 30, 'Kab. Kolaka'),
(405, 30, 'Kab. Kolaka Utara'),
(406, 30, 'Kab. Konawe'),
(407, 30, 'Kab. Konawe Selatan'),
(408, 30, 'Kab. Konawe Utara'),
(409, 30, 'Kab. Muna'),
(410, 30, 'Kab. Wakatobi'),
(411, 30, 'Kota Bau-Bau'),
(412, 30, 'Kota Kendari'),
(413, 31, 'Kab. Bolaang Mongondow (Bolmong)'),
(414, 31, 'Kab. Bolaang Mongondow Selatan'),
(415, 31, 'Kab. Bolaang Mongondow Timur'),
(416, 31, 'Kab. Bolaang Mongondow Utara'),
(417, 31, 'Kab. Kepulauan Sangihe'),
(418, 31, 'Kab. Kepulauan Suai Tagulandang Biaro (Sitaro)'),
(419, 31, 'Kab. Kepulauan Talaud'),
(420, 31, 'Kab. Minahasa'),
(421, 31, 'Kab. Minahasa Selatan'),
(422, 31, 'Kab. Minahasa Tenggara'),
(423, 31, 'Kab. Minahasa Utara'),
(424, 31, 'Kota Bitung'),
(425, 31, 'Kota Kotamobagu'),
(426, 31, 'Kota Manado'),
(427, 31, 'Kota Tomohon'),
(428, 32, 'Kab. Agam'),
(429, 32, 'Kab. Dharmasraya'),
(430, 32, 'Kab. Kepulauan Mentawai'),
(431, 32, 'Kab. Lima Puluh Koto/Kota'),
(432, 32, 'Kab. Padang Pariaman'),
(433, 32, 'Kab. Pasaman'),
(434, 32, 'Kab. Pasaman Barat'),
(435, 32, 'Kab. Pesisir Selatan'),
(436, 32, 'Kab. Sijunjung (Sawah Lunto Sijunjung)'),
(437, 32, 'Kab. Solok'),
(438, 32, 'Kab. Solok Selatan'),
(439, 32, 'Kab. Tanah Datar'),
(440, 32, 'Kota Bukittinggi'),
(441, 32, 'Kota Padang'),
(442, 32, 'Kota Padang Panjang'),
(443, 32, 'Kota Pariaman'),
(444, 32, 'Kota Payakumbuh'),
(445, 32, 'Kota Sawah Lunto'),
(446, 32, 'Kota Solok'),
(447, 33, 'Kab. Banyuasin'),
(448, 33, 'Kab. Empat Lawang'),
(449, 33, 'Kab. Lahat'),
(450, 33, 'Kab. Muara Enim'),
(451, 33, 'Kab. Musi Banyuasin'),
(452, 33, 'Kab. Musi Rawas'),
(453, 33, 'Kab. Ogan Llir'),
(454, 33, 'Kab. Ogan Komering Llir'),
(455, 33, 'Kab. Ogan Komering Ulu'),
(456, 33, 'Kab. Ogan Komering Ulu Selatan'),
(457, 33, 'Kab. Ogan Komering Ulu Timur'),
(458, 33, 'Kota Lubuk Linggau'),
(459, 33, 'Kota Pagar Alam'),
(460, 33, 'Kota Palembang'),
(461, 33, 'Kota Prabumulih'),
(462, 34, 'Kab. Asahan'),
(463, 34, 'Kab. Batu Bara'),
(464, 34, 'Kab. Dairi'),
(465, 34, 'Kab. Deli Serdang'),
(466, 34, 'Kab. Humbang Hasundutan'),
(467, 34, 'Kab. Karo'),
(468, 34, 'Kab. Labuhan Batu'),
(469, 34, 'Kab. Labuhan Batu Selatan'),
(470, 34, 'Kab. Labuhan Batu Utara'),
(471, 34, 'Kab. Langkat'),
(472, 34, 'Kab. Mandailing Natal'),
(473, 34, 'Kab. Nias'),
(474, 34, 'Kab. Nias Barat'),
(475, 34, 'Kab. Nias Selatan'),
(476, 34, 'Kab. Nias Utara'),
(477, 34, 'Kab. Padang Lawas'),
(478, 34, 'Kab. Padang Lawas Utara'),
(479, 34, 'Kab. Pakpak Bharat'),
(480, 34, 'Kab. Samosir'),
(481, 34, 'Kab. Serdang Bedagai'),
(482, 34, 'Kab. Simalungun'),
(483, 34, 'Kab. Tapanuli Selatan'),
(484, 34, 'Kab. Tapanuli Tengah'),
(485, 34, 'Kab. Tapanuli Utara'),
(486, 34, 'Kab. Toba Samosir'),
(487, 34, 'Kota Binjai'),
(488, 34, 'Kota Gunungsitoli'),
(489, 34, 'Kota Medan'),
(490, 34, 'Kota Padang Sidempuan'),
(491, 34, 'Kota Pematang Siantar'),
(492, 34, 'Kota Sibolga'),
(493, 34, 'Kota Tanjung Balai'),
(494, 34, 'Kota Tebing Tinggi');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id_color` int(11) NOT NULL,
  `hex_color` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `design`
--

CREATE TABLE `design` (
  `id_design` int(11) NOT NULL,
  `design_name` varchar(50) NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_description` text NOT NULL,
  `stock` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `id_category`, `product_name`, `product_description`, `stock`, `price`, `created_at`) VALUES
(1, 1, 'Kaos Strip', 'Kaos Strip dapat memiliki berbagai macam custom desain, warna, serta ukuran yang beragam.', 10, 50000, '2017-05-26 08:17:40');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id_category` int(11) NOT NULL,
  `category_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id_category`, `category_name`) VALUES
(1, 'Kaos');

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `id_promo` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `promo_detail` text NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `id_province` int(11) NOT NULL,
  `province_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id_province`, `province_name`) VALUES
(1, 'Bali'),
(2, 'Bangka Belitung'),
(3, 'Banten'),
(4, 'Bengkulu'),
(5, 'DKI Yogyakarta'),
(6, 'DKI Jakarta'),
(7, 'Gorontalo'),
(8, 'Jambi'),
(9, 'Jawa Barat'),
(10, 'Jawa Tengah'),
(11, 'Jawa Timur'),
(12, 'Kalimantan Barat'),
(13, 'Kalimantan Selatan'),
(14, 'Kalimantan Tengah'),
(15, 'Kalimantan Timur'),
(16, 'Kalimantan Utara'),
(17, 'Kepulauan Riau'),
(18, 'Lampung'),
(19, 'Maluku'),
(20, 'Maluku Utara'),
(21, 'Naggroe Aceh Darussalam (NAD)'),
(22, 'Nusa Tenggara Barat (NTB)'),
(23, 'Nusa Tenggara Timur (NTT)'),
(24, 'Papua'),
(25, 'Papua Barat'),
(26, 'Riau'),
(27, 'Sulawesi Barat'),
(28, 'Sulawesi Selatan'),
(29, 'Sulawesi Tengah'),
(30, 'Sulawesi Tenggara'),
(31, 'Sulawesi Utara'),
(32, 'Sumatera Barat'),
(33, 'Sumatera Selatan'),
(34, 'Sumatera Utara');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `review_description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `role`) VALUES
(1, 'admin'),
(2, 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id_size` int(11) NOT NULL,
  `size_code` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id_transaction` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_payment` int(11) NOT NULL,
  `transaction_date` date NOT NULL,
  `status_payment` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_detail`
--

CREATE TABLE `transaction_detail` (
  `id_transaction` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_design` int(11) NOT NULL,
  `id_color` int(11) NOT NULL,
  `id_size` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_role`, `name`, `email`, `password`, `created_at`) VALUES
(1, 1, 'admin', 'admincloth@gravicodev.id', 'admincloth', '2017-05-26 09:06:23');

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `id_user` int(11) NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `id_province` int(11) NOT NULL,
  `id_city` int(11) NOT NULL,
  `postal_code` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id_user`, `date_of_birth`, `address`, `phone_number`, `id_province`, `id_city`, `postal_code`) VALUES
(1, '1996-08-18', 'Dupak 5 / No. 42', '083856535951', 11, 158, 60171);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id_city`),
  ADD KEY `id_province` (`id_province`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id_color`);

--
-- Indexes for table `design`
--
ALTER TABLE `design`
  ADD PRIMARY KEY (`id_design`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id_promo`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id_province`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD KEY `id_product` (`id_product`,`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id_size`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id_transaction`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD KEY `id_transaction` (`id_transaction`,`id_product`,`id_design`,`id_color`,`id_size`),
  ADD KEY `id_size` (`id_size`),
  ADD KEY `id_color` (`id_color`),
  ADD KEY `id_design` (`id_design`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD KEY `id_user` (`id_user`,`id_province`,`id_city`),
  ADD KEY `id_province` (`id_province`),
  ADD KEY `id_city` (`id_city`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id_city` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=495;
--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id_color` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `design`
--
ALTER TABLE `design`
  MODIFY `id_design` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `id_promo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `id_province` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id_size` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id_transaction` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`id_province`) REFERENCES `province` (`id_province`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `product_category` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `promo`
--
ALTER TABLE `promo`
  ADD CONSTRAINT `promo_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD CONSTRAINT `transaction_detail_ibfk_1` FOREIGN KEY (`id_transaction`) REFERENCES `transaction` (`id_transaction`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_detail_ibfk_2` FOREIGN KEY (`id_size`) REFERENCES `size` (`id_size`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_detail_ibfk_3` FOREIGN KEY (`id_color`) REFERENCES `color` (`id_color`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_detail_ibfk_4` FOREIGN KEY (`id_design`) REFERENCES `design` (`id_design`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_detail_ibfk_5` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD CONSTRAINT `user_detail_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_detail_ibfk_2` FOREIGN KEY (`id_province`) REFERENCES `province` (`id_province`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_detail_ibfk_3` FOREIGN KEY (`id_city`) REFERENCES `city` (`id_city`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
