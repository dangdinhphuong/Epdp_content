-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 29 nov. 2024 à 16:50
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `js-project`
--

-- --------------------------------------------------------

--
-- Structure de la table `akt21`
--

CREATE TABLE `akt21` (
  `id` int(11) NOT NULL,
  `aktiviti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `akt21`
--

INSERT INTO `akt21` (`id`, `aktiviti`) VALUES
(1, '3 Steps Interview (3 Langkah Temubual)'),
(2, '4\'s Brainstorming'),
(3, 'All Write Round Robin'),
(4, 'Anecdotal Notes (Nota Anekdot)'),
(5, 'Artscape (Langkaran)'),
(6, 'Attitude Movement (Pergerakan mengikut pendapat)'),
(7, 'Be The Expert'),
(8, 'Brainstorming (Sumbangsaran)'),
(9, 'Built The Biggest Tower (Membina menara yang terbesar)'),
(10, 'Bus Stop (Hentian Bas)'),
(11, 'Café (Kedai Kopi)'),
(12, 'Carousel (Karusel)'),
(13, 'Chain Line (Rangkaian)'),
(14, 'Chart and Share (Catat dan kongsi)'),
(15, 'Checklist (Senarai Semak)'),
(16, 'Chunking (Gabungan)'),
(17, 'Circle Time (Bulatan Masa)'),
(18, 'Classification (Klasifikasi)'),
(19, 'Cloze Procedures (Isikan tempat kosong)'),
(20, 'Collaboration (Kolaborasi)'),
(21, 'Commercial (Iklan)'),
(22, 'Compass Point (Tanda Kompas)'),
(23, 'Constructivism (Konstruktivisme)'),
(24, 'Continuous Round Robin'),
(25, 'Continuum (Penerusan)'),
(26, 'Deklamasi Sajak/Nyanyian'),
(27, 'Diamond Ranking (Susunan Berlian)'),
(28, 'Dip (Cerun/Lurah)'),
(29, 'Distansing (Jarak)'),
(30, 'Dramatisation (Drama)'),
(31, 'Drawing Posters (Melukis Poster)'),
(32, 'Encoys (Utusan)'),
(33, 'Examples (Contoh)'),
(34, 'Exit Cards (Kad keluar)'),
(35, 'Fan-N-Pick'),
(36, 'Find A Partner'),
(37, 'Free Discussion (Perbincangan Bebas)'),
(38, 'Freeze Frame (Rangka Beku)'),
(39, 'Galery Walk (Lawatan ke geleri)'),
(40, 'Gallery Walk'),
(41, 'Games (Permainan)'),
(42, 'Give One Get One'),
(43, 'Goldfish Bowl (Mangkuk ikan emas)'),
(44, 'Graphic Organiser (Pengurusan grafic)'),
(45, 'GRASPS'),
(46, 'Grassskirt'),
(47, 'Hot Seat'),
(48, 'Hot Seating (Kerusi Panas)'),
(49, 'Human Graphing (Graf Manusia)'),
(50, 'I See, I Think, I Wonder (Saya lihat, Saya fikir dan saya bertanya)'),
(51, 'IB Tree (Pokok IB)'),
(52, 'Iceberg (Bongkah ais / Aisberg)'),
(53, 'Indicator (Petunjuk)'),
(54, 'Inside Outside Circle'),
(55, 'Jigsaw Reading (Susun Suai)'),
(56, 'KWL Chart (Carta KWL)'),
(57, 'Learning Modalities (Gaya Persembahan)'),
(58, 'Learning Trios A-B-C (tiga serangkai (A-B-C)'),
(59, 'Listening Triad (Pendengaran bertiga)'),
(60, 'Make Predictions (Membuat andaian)'),
(61, 'Mind Map (Peta Minda)'),
(62, 'Mix-Pair-Share'),
(63, 'Numbered Heads Together'),
(64, 'One Two Group'),
(65, 'Parachute Building (Membina payung terjun)'),
(66, 'Party (Pesta)'),
(67, 'Pembentangan Hasil Sendiri'),
(68, 'Personal Action Plan (Pelan tindakan peribadi)'),
(69, 'Personal Learning Experiences (Pengalaman Peribadi)'),
(70, 'Peta i-Think'),
(71, 'Post It Notes (Nota tampalan)'),
(72, 'Presentations (Persembahan)'),
(73, 'Puzzle it Out (Selesaikan)'),
(74, 'Qudrat Activity (Aktiviti Berempat)'),
(75, 'Question Builder (Pembina Soalan)	 \r\n\r\n'),
(76, 'Quick Quiz (Kuiz Cepat)'),
(77, 'Quiz-Quiz Trade'),
(78, 'Radio Phone In (Radio Telefon )'),
(79, 'Rainbow Groups (Kumpulan Pelangi)'),
(80, 'Rally Table'),
(81, 'Read and highlight (baca dan tanda)'),
(82, 'Recap Group (Mengulangi / mengingat semula)'),
(83, 'Rocket writing (Penulisan pantas)'),
(84, 'Role Play'),
(85, 'Rotationg Stations (Stesyen Berputar)'),
(86, 'Round Table'),
(87, 'Rubrics (Rubrik)'),
(88, 'Self-Presentation'),
(89, 'Sharing (Berkongsi)'),
(90, 'Shout Out (laungan)'),
(91, 'Single Round Robin'),
(92, 'Six Thinking Hats (6 Topi Pemikir)'),
(93, 'Skits (Sketsa)'),
(94, 'Snow Balling (Bola Salji)'),
(95, 'Stand-N-Share'),
(96, 'Stiry Books (Buku Cerita)'),
(97, 'Stretch to Sketch (Lukis mengikut kreativiti)'),
(98, 'Survey (Tinjauan)'),
(99, 'SWOT'),
(100, 'Table Cloth (Alas Meja)'),
(101, 'Table Talkers (Perbincangan di meja)'),
(102, 'Take Off Touch Down'),
(103, 'Talk Partners (Rakan Berbual)'),
(104, 'Think - Pair - Share (Fikir - Pasang - Kongsi)'),
(105, 'Think-Pair-Share'),
(106, 'Thinking Hat'),
(107, 'Three Stray One Stay'),
(108, 'Thumb Up (Isyarat Tangan)'),
(109, 'Time capsules (Kapsul Masa)'),
(110, 'Timed Round Robin'),
(111, 'Timeline (Garisan Masa)'),
(112, 'Traffic Lights (Lampu Isyarat)'),
(113, 'TV Chat Show (Bual TV)'),
(114, 'Using Large Picture Card (Gambar / Photo besar)'),
(115, 'Video Clips (Klip Video)'),
(116, 'Webs / Spider Diagrams (Rajah Sarang Labah-labah)'),
(117, 'What Matters (Apa yang penting)'),
(118, 'Y chart (Carta Y)');

-- --------------------------------------------------------

--
-- Structure de la table `apm`
--

CREATE TABLE `apm` (
  `id` int(11) NOT NULL,
  `apm` varchar(255) NOT NULL,
  `sub` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `apm`
--

INSERT INTO `apm` (`id`, `apm`, `sub`) VALUES
(1, '教师提问问题激发学生兴趣，”你们来到学校有没有认识好朋友、好同学呀？”', '音乐'),
(2, '教师播放歌曲，学生聆听后演唱。', '音乐'),
(3, '教师使用歌曲导入。', '音乐'),
(4, '跟随老师朗读歌词。', '音乐'),
(5, '教师引导学生认识第28页的敲击乐器及示范敲击乐器的正确握法和敲击法。', '音乐'),
(6, '跟随老师朗读歌词和学习唱歌。', '音乐'),
(7, '以正确的语音朗读歌词。', '音乐'),
(8, '复习歌曲。', '音乐');

-- --------------------------------------------------------

--
-- Structure de la table `apn`
--

CREATE TABLE `apn` (
  `id` int(11) NOT NULL,
  `apn` varchar(255) NOT NULL,
  `sub` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `apn`
--

INSERT INTO `apn` (`id`, `apn`, `sub`) VALUES
(1, '教师要求学生概述今日所学。', '音乐');

-- --------------------------------------------------------

--
-- Structure de la table `aspirasi`
--

CREATE TABLE `aspirasi` (
  `id` int(11) NOT NULL,
  `aspirasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `aspirasi`
--

INSERT INTO `aspirasi` (`id`, `aspirasi`) VALUES
(1, '知识水平'),
(2, '领导能力'),
(3, '双语能力'),
(4, '国家认同'),
(5, '思考创新'),
(6, '伦理道德');

-- --------------------------------------------------------

--
-- Structure de la table `au`
--

CREATE TABLE `au` (
  `id` int(11) NOT NULL,
  `au` varchar(255) NOT NULL,
  `sub` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `au`
--

INSERT INTO `au` (`id`, `au`, `sub`) VALUES
(1, '发声练习。', '音乐'),
(2, '引导学生以准确的发音和音准唱歌。', '音乐'),
(3, '在老师领导下，一面唱歌，一面跟着乐谱图标敲击乐器。', '音乐'),
(4, '老师念一念“请你跟我这样做”，学生根据节奏动一动。', '音乐'),
(5, '引导学生自创节奏。', '音乐'),
(6, '随着歌曲的旋律学唱歌。', '音乐'),
(7, '随着音乐，根据乐谱图标的节奏拍手。', '音乐'),
(8, '引导学生模仿老师拍打乐谱图标的节奏。', '音乐'),
(9, '引导学生自创节奏，然后随着音乐，拍出自创的节奏。', '音乐'),
(10, '以适当的节奏朗读歌词。', '音乐'),
(11, '以正确的音准和不同的音色，随着歌曲的旋律学唱歌。', '音乐'),
(12, '引导学生聆听和辨别大声、小声、欢呼声、歌声、笛声和敲击声。', '音乐'),
(13, '一面唱歌，一面跟着歌词做动作。', '音乐'),
(14, '一面唱歌，一面跟着拍子做动作。', '音乐'),
(15, '一面唱歌，一面玩游戏。', '音乐'),
(16, '学生根据所规定的速度演唱和敲击乐器。', '音乐'),
(17, '教师以正确的音调唱出歌曲。', '音乐'),
(18, '学生根据音乐做动作。', '音乐'),
(19, '以正确的音准唱歌。', '音乐'),
(20, '引导学生根据歌词和节拍自创动作。', '音乐'),
(21, '一面唱歌，一面做出自创动作。', '音乐'),
(22, '随着歌曲旋律，学习唱歌。', '音乐'),
(23, '一面唱歌，一面拍打身体不同的部位。', '音乐'),
(24, '引导学生辨识强音和弱音。', '音乐'),
(25, '学生听乐器所发出的声音然后写出乐器名称。', '音乐'),
(26, '教师引导学生唱《过山车》。', '音乐'),
(27, '学生根据29页乐谱图标以响板，手铃和铃鼓敲击出节奏。', '音乐'),
(28, '引导学生模仿动物的叫声。', '音乐'),
(29, '辨别动物发出强或弱的叫声。', '音乐'),
(30, '老师解说和强调力度 – 强音和弱音。', '音乐'),
(31, '习唱歌唱。', '音乐'),
(32, '模仿歌词中动物的叫声。', '音乐'),
(33, '以不同的动物叫声演唱歌曲。', '音乐'),
(34, '教师与学生讨论适合的两首歌曲，然后将学生分成两组。', '音乐'),
(35, '分配好歌曲后，学生在各自的组别里讨论如何呈现表演。', '音乐'),
(36, '各组学生再把自己组员分成三个小组，分别为歌唱组、动作组和乐器组。', '音乐'),
(37, '各组决定想用的乐器并一起以图标创作节奏。', '音乐'),
(38, '各组的小组开始以分开式练习唱歌、做动作和敲击乐器。', '音乐'),
(39, '歌唱组以正确的站姿、呼吸法和清晰的咬字练习歌唱。', '音乐'),
(40, '动作组配合歌曲设计组员们的动作。', '音乐'),
(41, '乐器组根据所设计的乐谱图标上的节奏一起练习敲击乐器。', '音乐'),
(42, '学生分组完成表演。', '音乐'),
(43, '结束后，学生检讨自己的表演及说出需要改善之处。', '音乐'),
(44, '学生说出自己是否满意自己的表演。', '音乐'),
(45, '教师歌曲后与学生讨论所听到的音乐。', '音乐'),
(46, '教师播放视频，然后与学生讨论视频的呈现方式和特点。', '音乐'),
(47, '教师解说马来传统音乐Dikir Barat和其惯用的敲击乐器。', '音乐'),
(48, '学生观赏其他视频并认出所用的乐器。', '音乐'),
(49, '学生注意唱歌时的发音和音准。', '音乐'),
(50, '跟着乐谱图标敲击乐器。', '音乐'),
(51, '学生分组各自用响板和铃鼓拍打节奏。', '音乐'),
(52, '以较慢或较快的速度演唱歌曲。', '音乐'),
(53, '随着音乐，跟着乐谱图标拍手。', '音乐'),
(54, '利用不同的节奏演唱。', '音乐'),
(55, '学生以四四拍节奏做出不同的动作来配合dikir barat歌曲《Wau Bulan》。', '音乐'),
(56, '学生坐在地板上并跟着音乐做dikir barat的基本和简单的动作。', '音乐'),
(57, '跟随老师一面拍手，一面念节奏。', '音乐'),
(58, '学生自创节奏。', '音乐'),
(59, '跟随歌曲节拍，一面唱歌，一面原地踏步。', '音乐'),
(60, '学生以自己喜欢的乐谱图标创作四四拍节奏。', '音乐'),
(61, '教师选几位学生前来，自选乐器拍打自创的节奏。', '音乐'),
(62, '随着歌曲的旋律，模仿打鼓、敲锣、吹喇叭及吹笛子的姿势做动作。', '音乐'),
(63, '学生演唱《小乐队》，并跟随歌曲的节拍，一面唱歌，一面像操步般原地踏步。', '音乐'),
(64, '学生做出各种打鼓，敲锣，吹喇叭及吹笛子的姿势。', '音乐'),
(65, '聆听物品敲打时发出的声音，并辨别其音色。', '音乐'),
(66, '选一种物品作为敲击乐器，随着乐谱图标，敲打《小乐队》的节奏。', '音乐'),
(67, '跟随老师朗读歌词和学习唱歌。', '音乐'),
(68, '学生根据音调的高低做动作。', '音乐'),
(69, '男女两组一起合唱歌曲。', '音乐'),
(70, '学生注意唱歌时的发音、节奏和音准。', '音乐'),
(71, '学生根据所规定的速度演唱歌曲。', '音乐'),
(72, '学生根据所规定的速度敲击乐器。', '音乐'),
(73, '学生根据所规定的速度一面唱歌，一面敲打乐器。', '音乐');

-- --------------------------------------------------------

--
-- Structure de la table `bbm`
--

CREATE TABLE `bbm` (
  `id` int(11) NOT NULL,
  `bbm` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `bbm`
--

INSERT INTO `bbm` (`id`, `bbm`) VALUES
(1, '课本，笔，尺'),
(2, '钢琴'),
(3, '键盘'),
(4, '手铃'),
(5, '笛子'),
(6, '铃鼓'),
(7, '双响木'),
(8, '三角铁'),
(9, 'Google Meet'),
(10, 'Google Classroom'),
(11, '竖笛挂图'),
(12, '五线谱挂图'),
(13, '响板'),
(14, '动作挂图'),
(15, '拍子挂图'),
(16, '音乐符号挂图'),
(17, '歌词挂图'),
(18, '音乐影片'),
(19, '光碟'),
(20, '演示文稿'),
(21, '小鼓'),
(22, '中鼓'),
(23, '大鼓'),
(24, '乐器'),
(25, '分数卡'),
(26, '秤'),
(27, '量角器'),
(28, '量尺'),
(29, '量筒'),
(30, '卷尺'),
(31, '各国货币'),
(32, '数学练习'),
(33, '课本'),
(34, '作业'),
(35, '立体模型'),
(36, '小数卡'),
(37, '数轴表'),
(38, '账单'),
(39, '发票'),
(40, '计算器'),
(41, '钱币'),
(42, '数字卡'),
(43, '算盘'),
(44, '年历'),
(45, '时钟'),
(46, '坐标图'),
(47, '三角尺'),
(48, '直尺'),
(49, '模型'),
(50, '挂图');

-- --------------------------------------------------------

--
-- Structure de la table `calendar`
--

CREATE TABLE `calendar` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `year` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `date` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `cTime` time NOT NULL,
  `cDate` date NOT NULL,
  `pDate` date DEFAULT NULL,
  `minggu` int(11) NOT NULL,
  `penggal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `calId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `periodId` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `day` int(11) NOT NULL,
  `penggal` int(11) NOT NULL,
  `minggu` int(11) NOT NULL,
  `preset` int(11) NOT NULL,
  `tema` varchar(255) NOT NULL,
  `tajuk` varchar(255) NOT NULL,
  `kdg` varchar(255) NOT NULL,
  `cstd` varchar(255) NOT NULL,
  `op` varchar(255) NOT NULL,
  `kk` varchar(255) NOT NULL,
  `apm` varchar(255) NOT NULL,
  `au` varchar(255) NOT NULL,
  `apn` varchar(255) NOT NULL,
  `emk` varchar(255) NOT NULL,
  `nilai` varchar(255) NOT NULL,
  `bbm` varchar(255) NOT NULL,
  `pemikiran` varchar(255) NOT NULL,
  `peta` varchar(255) NOT NULL,
  `pbd` varchar(255) NOT NULL,
  `tahap` varchar(255) NOT NULL,
  `akt21` varchar(255) NOT NULL,
  `p21` varchar(255) NOT NULL,
  `praujian` varchar(255) NOT NULL,
  `pascaujian` varchar(255) NOT NULL,
  `k6` varchar(255) NOT NULL,
  `aspirasi` varchar(255) NOT NULL,
  `refleksi` varchar(255) NOT NULL,
  `inputRef` varchar(255) NOT NULL,
  `tsm` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cstd`
--

CREATE TABLE `cstd` (
  `id` int(11) NOT NULL,
  `cstd` varchar(255) NOT NULL,
  `sub` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `cstd`
--

INSERT INTO `cstd` (`id`, `cstd`, `sub`) VALUES
(1, '1.1.1 认识、了解和分辨高音和低音', '音乐'),
(2, '1.1.2 认识、了解和分辨强的力度和弱的力度', '音乐'),
(3, '1.1.3 认识、了解和分辨声音和乐器的音色', '音乐'),
(4, '2.1.1 以准确的发音唱歌', '音乐'),
(5, '2.1.2 以正确的音准唱歌', '音乐'),
(6, '2.1.3 跟着拍子唱歌', '音乐'),
(7, '2.2.1 跟着乐谱图标敲击乐器', '音乐'),
(8, '2.2.2 根据乐曲的拍子演奏敲击乐器', '音乐'),
(9, '2.2.3 根据乐曲的旋律模式敲击乐器', '音乐'),
(10, '2.2.4 跟着乐谱图标敲击乐器', '音乐'),
(11, '2.3.1 根据歌词做动作', '音乐'),
(12, '2.3.2 跟着歌曲的拍子做动作', '音乐'),
(13, '2.3.3 跟着速度做动作', '音乐'),
(14, '3.1.1 发出各种声音', '音乐'),
(15, '3.1.2 利用乐谱图标代替 自创简单的节奏', '音乐'),
(16, '4.1.1 确认马来西亚传统音乐 i 音乐种类 ii 实践传统音乐的社群', '音乐'),
(17, '5.1.1 策划音乐表演', '音乐'),
(18, '5.1.2 呈献音乐表演', '音乐'),
(19, '5.1.3 在音乐活动中实践道德价值', '音乐');

-- --------------------------------------------------------

--
-- Structure de la table `emk`
--

CREATE TABLE `emk` (
  `id` int(11) NOT NULL,
  `emk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `emk`
--

INSERT INTO `emk` (`id`, `emk`) VALUES
(1, '语文跨课程'),
(2, '环境教育'),
(3, '道德价值'),
(4, '科学与工艺'),
(5, '爱国主义'),
(6, '思维技能'),
(7, '领导能力'),
(8, '学习如何学习'),
(9, '社交与生殖健康教育'),
(10, '反贪污'),
(11, '未来研究'),
(12, '消费者教育'),
(13, '公路安全'),
(14, '创造与革新元素'),
(15, '企业家元素'),
(16, '信息通讯技术');

-- --------------------------------------------------------

--
-- Structure de la table `kdg`
--

CREATE TABLE `kdg` (
  `id` int(11) NOT NULL,
  `kdg` varchar(255) NOT NULL,
  `sub` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `kdg`
--

INSERT INTO `kdg` (`id`, `kdg`, `sub`) VALUES
(1, '2.1 唱歌', '音乐'),
(2, '2.2 敲击乐器', '音乐'),
(3, '2.3 跟着音乐做动作', '音乐'),
(4, '3.1 音乐创作', '音乐'),
(5, '1.1 音乐元素', '音乐'),
(6, '5.1 音乐表演', '音乐'),
(7, '4.1 鉴赏音乐作品', '音乐');

-- --------------------------------------------------------

--
-- Structure de la table `kemahiran`
--

CREATE TABLE `kemahiran` (
  `id` int(11) NOT NULL,
  `kemahiran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `kemahiran`
--

INSERT INTO `kemahiran` (`id`, `kemahiran`) VALUES
(1, '沟通'),
(2, '合作'),
(3, '角色'),
(4, '批判性思维'),
(5, '创意与创新'),
(6, '国籍');

-- --------------------------------------------------------

--
-- Structure de la table `kk`
--

CREATE TABLE `kk` (
  `id` int(11) NOT NULL,
  `kk` varchar(255) NOT NULL,
  `sub` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `kk`
--

INSERT INTO `kk` (`id`, `kk`, `sub`) VALUES
(1, '跟着乐谱图标敲击乐器唱至少3句歌词。', '音乐'),
(2, '自创至少1种节奏。', '音乐'),
(3, '随着音乐，唱至少5句歌词。', '音乐'),
(4, '自创至少1种节奏，然后随着音乐，拍出自创的节奏。', '音乐'),
(5, '聆听和辨别至少2种声音。', '音乐'),
(6, '分辨至少2种强的力度和弱的力度。', '音乐'),
(7, '分辨至少2种强的力度和弱的力度，发出至少3种声音。', '音乐'),
(8, '分辨至少2种声音和乐器的音色。', '音乐'),
(9, '以至少2种道德价值来策划音乐表演。', '音乐'),
(10, '以至少3种道德价值来策划音乐表演。', '音乐'),
(11, '运用至少1种马来西亚传统音乐。', '音乐'),
(12, '跟着速度做至少3种动作。', '音乐'),
(13, '利用至少3个乐谱图标代替自创简单的节奏。', '音乐'),
(14, '根据歌词做出至少2种动作及发出至少2种声音。', '音乐'),
(15, '分辨至少2种声音和乐器的音色及发出至少3种声音。', '音乐'),
(16, '分辨至少3种声音和乐器的音色。', '音乐'),
(17, '根据所规定的速度敲击至少2种乐器。', '音乐'),
(18, '以2个道德价值来策划音乐表演。', '音乐'),
(19, '利用即兴物品发出至少3种声音来呈献音乐表演。', '音乐');

-- --------------------------------------------------------

--
-- Structure de la table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `nilai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `nilai`
--

INSERT INTO `nilai` (`id`, `nilai`) VALUES
(1, '表演'),
(2, '问答比赛'),
(3, '创造力'),
(4, '胆量'),
(5, '听写'),
(6, '作品'),
(7, '看图讲故事'),
(8, '书写'),
(9, '学生作业'),
(10, '计划/课业'),
(11, '观察'),
(12, '唱歌与活动'),
(13, '完成故事'),
(14, '回答理解能力'),
(15, '回答理解程度'),
(16, '交谈'),
(17, '根据资料解释'),
(18, '陈述故事'),
(19, '制作图案'),
(20, '作总结'),
(21, '构造句子'),
(22, '表达意见'),
(23, '完成句子'),
(24, '发音韵文'),
(25, '口述'),
(26, '作业'),
(27, '朗读');

-- --------------------------------------------------------

--
-- Structure de la table `op`
--

CREATE TABLE `op` (
  `id` int(11) NOT NULL,
  `op` varchar(255) NOT NULL,
  `sub` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `op`
--

INSERT INTO `op` (`id`, `op`, `sub`) VALUES
(1, '以准确的发音和音准唱歌。', '音乐'),
(2, '根据节奏动一动。', '音乐'),
(3, '模仿老师拍打乐谱图标的节奏。', '音乐'),
(4, '认识、了解和分辨强的力度和弱的力度及分辨声音和乐器的音色。', '音乐'),
(5, '认识、了解和分辨强的力度和弱的力度及跟着乐谱图标敲击乐器。', '音乐'),
(6, '认识、了解和分辨强的力度和弱的力度及正确地发出各种声音。', '音乐'),
(7, '以准确的发音和音准唱歌及认识、了解和分辨声音和乐器的音色。', '音乐'),
(8, '以准确的发音和音准唱歌及认识、了解和分辨声音和乐器的音色和强的力度和弱的力度。', '音乐'),
(9, '以道德价值来策划音乐表演。', '音乐'),
(10, '以道德价值来呈现音乐表演。', '音乐'),
(11, '确认及运用马来西亚传统音乐。', '音乐'),
(12, '跟着速度做动作。', '音乐'),
(13, '利用乐谱图标代替自创简单的节奏。', '音乐'),
(14, '根据歌词做动作及发出各种声音。', '音乐'),
(15, '认识、了解和分辨声音和乐器的音色及发出各种声音。', '音乐'),
(16, '以准确的发音和音准唱歌及做动作。', '音乐'),
(17, '根据所规定的速度敲击乐器。', '音乐'),
(18, '利用即兴物品发出各种声音来呈献音乐表演。', '音乐');

-- --------------------------------------------------------

--
-- Structure de la table `p21`
--

CREATE TABLE `p21` (
  `id` int(11) NOT NULL,
  `p21` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `p21`
--

INSERT INTO `p21` (`id`, `p21`) VALUES
(1, '生活技能'),
(2, '社区学习'),
(3, '终身学习'),
(4, '道德价值观'),
(5, '高思维技能'),
(6, '分组活动'),
(7, '创造力'),
(8, '合作学习'),
(9, '小组活动'),
(10, '形成性评估'),
(11, '批判性思维'),
(12, '技能/过程'),
(13, '沟通'),
(14, '以学生为中心');

-- --------------------------------------------------------

--
-- Structure de la table `pemikiran`
--

CREATE TABLE `pemikiran` (
  `id` int(11) NOT NULL,
  `pemikiran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `pemikiran`
--

INSERT INTO `pemikiran` (`id`, `pemikiran`) VALUES
(1, '创造'),
(2, '评价'),
(3, '分析'),
(4, '应用'),
(5, '理解'),
(6, '知道');

-- --------------------------------------------------------

--
-- Structure de la table `period`
--

CREATE TABLE `period` (
  `no` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `day` varchar(255) NOT NULL,
  `std` int(11) NOT NULL,
  `sub` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `start` varchar(255) NOT NULL,
  `end` varchar(255) NOT NULL,
  `noStu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `period`
--

INSERT INTO `period` (`no`, `userId`, `day`, `std`, `sub`, `class`, `start`, `end`, `noStu`) VALUES
(5, 1, '1', 1, '音乐', '1M', '08:00', '09:00', 30),
(6, 1, '2', 2, 'MORAL', '1M', '18:23', '18:23', 30),
(9, 1, '2', 3, '音乐', '1M', '18:35', '18:35', 30),
(10, 1, '2', 4, '音乐', '1M', '18:59', '18:59', 30),
(11, 1, '2', 1, '音乐', '1M', '19:01', '19:01', 30),
(13, 1, '1', 1, '音乐', '1M', '21:27', '21:27', 30),
(14, 1, '0', 2, 'BAHASA MELAYU', '33222', '14:03', '15:03', 4),
(15, 1, '0', 6, '华文', '33222', '15:03', '17:03', 4),
(16, 1, '0', 6, 'SCIENCE', '33222', '19:31', '22:32', 4),
(17, 1, '0', 1, 'VietNam', '3322241', '11:21', '09:25', 44),
(18, 1, '0', 3, 'SCIENCE', 'd', '18:42', '21:42', 4);

-- --------------------------------------------------------

--
-- Structure de la table `peta`
--

CREATE TABLE `peta` (
  `id` int(11) NOT NULL,
  `peta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `peta`
--

INSERT INTO `peta` (`id`, `peta`) VALUES
(1, '圆形图'),
(2, '气泡图'),
(3, '双气泡图'),
(4, '树形图'),
(5, '孤形图'),
(6, '流动图'),
(7, '多倍流动图'),
(8, '支架图');

-- --------------------------------------------------------

--
-- Structure de la table `preset`
--

CREATE TABLE `preset` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `tema` varchar(255) NOT NULL,
  `tajuk` varchar(255) NOT NULL,
  `kdg` varchar(255) NOT NULL,
  `cstd` varchar(255) NOT NULL,
  `op` varchar(255) NOT NULL,
  `kk` varchar(255) NOT NULL,
  `apm` varchar(255) NOT NULL,
  `au` varchar(255) NOT NULL,
  `apn` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `preset`
--

INSERT INTO `preset` (`id`, `subject`, `tema`, `tajuk`, `kdg`, `cstd`, `op`, `kk`, `apm`, `au`, `apn`) VALUES
(1, '音乐', '单元一 我的好朋友', '好朋友，好同学', '2.1 唱歌\r\n2.2 敲击乐器', '2.1.1 以准确的发音唱歌\r\n2.1.2 以正确的音准唱歌\r\n2.2.4 跟着乐谱图标敲击乐器', '以准确的发音和音准唱歌。', '跟着乐谱图标敲击乐器唱至少3句歌词。', '教师提问问题激发学生兴趣，”你们来到学校有没有认识好朋友、好同学呀？”', '发声练习。\r\n引导学生以准确的发音和音准唱歌。\r\n在老师领导下，一面唱歌，一面跟着乐谱图标敲击乐器。', '教师要求学生概述今日所学。'),
(2, '音乐', '单元一 我的好朋友', '请你跟我这样做', '2.3 跟着音乐做动作', '2.3.3 根据节奏动一动', '根据节奏动一动。', '自创至少1种节奏。', '教师播放歌曲，学生聆听后演唱。', '老师念一念“请你跟我这样做”，学生根据节奏动一动。\r\n引导学生自创节奏。', '教师要求学生概述今日所学。'),
(3, '音乐', '单元三 新年到，真快乐', '新年到', '2.1 唱歌', '2.1.1 以准确的发音唱歌\r\n2.1.2 以正确的音准唱歌', '以准确的发音和音准唱歌。', '随着音乐，唱至少5句歌词。', '教师使用歌曲导入。', '随着歌曲的旋律学唱歌。\r\n随着音乐，根据乐谱图标的节奏拍手。', '教师要求学生概述今日所学。'),
(4, '音乐', '单元三 新年到，真快乐', '请你跟我这样拍', '3.1 音乐创作', '3.1.2 利用乐谱图标代替自创简单的节奏', '模仿老师拍打乐谱图标的节奏。', '自创至少1种节奏，然后随着音乐，拍出自创的节奏。', '教师使用歌曲导入。', '引导学生模仿老师拍打乐谱图标的节奏。\r\n引导学生自创节奏，然后随着音乐，拍出自创的节奏。', '教师要求学生概述今日所学。'),
(5, '音乐', '单元五 小小游戏', '听听', '1.1 音乐元素', '1.1.2 认识、了解和分辨强的力度和弱的力度\r\n1.1.3 认识、了解和分辨声音和乐器的音色\r\n2.1.1 以准确的发音唱歌\r\n2.1.2 以正确的音准唱歌', '认识、了解和分辨强的力度和弱的力度及分辨声音和乐器的音色。', '聆听和辨别至少2种声音。', '教师使用歌曲导入。', '以适当的节奏朗读歌词。\r\n以正确的音准和不同的音色，随着歌曲的旋律学唱歌。\r\n引导学生聆听和辨别大声、小声、欢呼声、歌声、笛声和敲击声。\r\n一面唱歌，一面跟着歌词做动作。', '教师要求学生概述今日所学。'),
(6, '音乐', '单元五 小小游戏', '玩游戏', '2.1 唱歌', '2.1.1 以准确的发音唱歌\r\n2.1.2 以正确的音准唱歌', '以准确的发音和音准唱歌。', '随着音乐，唱至少5句歌词。', '跟随老师朗读歌词。', '一面唱歌，一面跟着歌词做动作。\r\n一面唱歌，一面跟着拍子做动作。\r\n一面唱歌，一面玩游戏。', '教师要求学生概述今日所学。'),
(7, '音乐', '单元七 算一算', 'COUNTINGS FINGERS', '2.1.1 唱歌\n2.2 敲击乐器', '2.1.1 以准确的发音唱歌\r\n2.1.2 以正确的音准唱歌\r\n2.1.3 跟着拍子唱歌\r\n2.2.1 跟着拍子敲打乐器', '以准确的发音和音准唱歌。', '随着音乐，唱至少5句歌词。', '跟随老师朗读歌词。', '学生根据所规定的速度演唱和敲击乐器。\r\n教师以正确的音调唱出歌曲。\r\n学生根据音乐做动作。', '教师要求学生概述今日所学。'),
(8, '音乐', '单元七 算一算', '储蓄歌', '1.1 音乐元素\r\n2.2 敲击乐器', '1.1.2 认识、了解和分辨强的力度和弱的力度\r\n2.2.4 跟着乐谱图标敲击乐器', '认识、了解和分辨强的力度和弱的力度及跟着乐谱图标敲击乐器。', '分辨至少2种强的力度和弱的力度。', '跟随老师朗读歌词。', '学生根据所规定的速度演唱和敲击乐器。\r\n教师以正确的音调唱出歌曲。\r\n学生根据音乐做动作。', '教师要求学生概述今日所学。'),
(9, '音乐', '单元九 我的生活', '做早操', '2.1 唱歌\r\n2.2 敲击乐器\r\n2.3 跟着音乐做动作', '2.1.1 以准确的发音唱歌\r\n2.1.2 以正确的音准唱歌\r\n2.3.1 跟着歌曲做出动作', '以准确的发音和音准唱歌。', '随着音乐，唱至少5句歌词。', '教师使用歌曲导入。', '以正确的音准唱歌。\r\n引导学生根据歌词和节拍自创动作。\r\n一面唱歌，一面做出自创动作。', '教师要求学生概述今日所学。'),
(10, '音乐', '单元九 我的生活', '我的朋友在哪里', '1.1 音乐元素\r\n2.3 跟着音乐做动作\r\n3.1 音乐创作', '1.1.2 认识、了解和分辨强的力度和弱的力度\r\n2.3.2 跟着歌曲的拍子做动作\r\n3.1.1 发出各种声音', '认识、了解和分辨强的力度和弱的力度及正确地发出各种声音。', '分辨至少2种强的力度和弱的力度，发出至少3种声音。', '教师使用歌曲导入。', '随着歌曲旋律，学习唱歌。\r\n一面唱歌，一面拍打身体不同的部位。\r\n引导学生辨识强音和弱音。', '教师要求学生概述今日所学。'),
(11, '音乐', '单元九 我的生活', '过山车', '1.1 音乐元素\r\n2.1 唱歌\r\n2.2 敲击乐器', '1.1.3 认识、了解和分辨声音和乐器的音色\r\n2.1.1 以准确的发音唱歌\r\n2.2.2 根据乐曲的拍子演奏敲击乐器\r\n2.2.3 根据乐曲的旋律模式敲击乐器\r\n2.2.4 跟着乐谱图标敲击乐器', '以准确的发音和音准唱歌及认识、了解和分辨声音和乐器的音色。', '分辨至少2种声音和乐器的音色。', '教师引导学生认识第28页的敲击乐器及示范敲击乐器的正确握法和敲击法。', '学生听乐器所发出的声音然后写出乐器名称。\r\n教师引导学生唱《过山车》。\r\n学生根据29页乐谱图标以响板，手铃和铃鼓敲击出节奏。', '教师要求学生概述今日所学。'),
(12, '音乐', '单元十一 可爱的动物', '我爱动物园', '1.1 音乐元素\r\n2.1 唱歌\r\n3.1 音乐创作', '1.1.2 认识、了解和分辨强的力度和弱的力度\r\n1.1.3 认识、了解和分辨声音和乐器的音色\r\n2.1.1 以准确的发音唱歌\r\n2.1.2 以正确的音准唱歌\r\n3.1.1 发出各种声音', '以准确的发音和音准唱歌及认识、了解和分辨声音和乐器的音色。', '分辨至少2种声音和乐器的音色。', '跟随老师朗读歌词和学习唱歌。', '引导学生模仿动物的叫声。\r\n辨别动物发出强或弱的叫声。\r\n老师解说和强调力度 – 强音和弱音。', '教师要求学生概述今日所学。'),
(13, '音乐', '单元十一 可爱的动物', 'BUNYI BINATANG', '2.1 唱歌\r\n3.1 音乐创作', '2.1.1 以准确的发音唱歌\r\n2.1.2 以正确的音准唱歌\r\n3.1.1 发出各种声音', '以准确的发音和音准唱歌。', '随着音乐，唱至少5句歌词。', '以正确的语音朗读歌词。', '习唱歌唱。\r\n模仿歌词中动物的叫声。\r\n以不同的动物叫声演唱歌曲。', '教师要求学生概述今日所学。'),
(14, '音乐', '5.0 音乐艺术课业（一）', '教师与学生根据1-11课题内容策划与安排艺术课业', '5.1 音乐表演', '5.1.1 策划音乐表演\r\n5.1.3 在音乐活动中实践道德价值', '以道德价值来策划音乐表演。', '以至少2种道德价值来策划音乐表演。', '教师使用歌曲导入。', '教师与学生讨论适合的两首歌曲，然后将学生分成两组。\r\n分配好歌曲后，学生在各自的组别里讨论如何呈现表演。\r\n各组学生再把自己组员分成三个小组，分别为歌唱组、动作组和乐器组。\r\n各组决定想用的乐器并一起以图标创作节奏。', '教师要求学生概述今日所学。'),
(15, '音乐', '5.0 音乐艺术课业（一）', '教师与学生根据1-11课题内容策划与安排艺术课业', '5.1 音乐表演', '5.1.1 策划音乐表演\r\n5.1.3 在音乐活动中实践道德价值', '以道德价值来策划音乐表演。', '以至少3种道德价值来策划音乐表演。', '教师使用歌曲导入。', '各组的小组开始以分开式练习唱歌、做动作和敲击乐器。\r\n歌唱组以正确的站姿、呼吸法和清晰的咬字练习歌唱。\r\n动作组配合歌曲设计组员们的动作。\r\n乐器组根据所设计的乐谱图标上的节奏一起练习敲击乐器。', '教师要求学生概述今日所学。'),
(16, '音乐', '5.0 音乐艺术课业（一）', '教师与学生根据1-11课题内容策划与安排艺术课业', '5.1 音乐表演', '5.1.2 呈献音乐表演\r\n5.1.3 在音乐活动中实践道德价值', '以道德价值来呈现音乐表演。', '以至少2种道德价值来策划音乐表演。', '教师使用歌曲导入。', '学生分组完成表演。\r\n结束后，学生检讨自己的表演及说出需要改善之处。\r\n学生说出自己是否满意自己的表演。', '教师要求学生概述今日所学。'),
(17, '音乐', '单元十三 传统音乐', '音乐鉴赏', '4.1 鉴赏音乐作品', '4.1.1 确认马来西亚传统音乐 i 音乐种类 ii 实践传统音乐的社群', '确认及运用马来西亚传统音乐。', '运用至少1种马来西亚传统音乐。', '教师使用歌曲导入。', '教师歌曲后与学生讨论所听到的音乐。\r\n教师播放视频，然后与学生讨论视频的呈现方式和特点。\r\n教师解说马来传统音乐Dikir Barat和其惯用的敲击乐器。\r\n学生观赏其他视频并认出所用的乐器。', '教师要求学生概述今日所学。'),
(18, '音乐', '单元十五 我的风筝', '放风筝', '2.1 唱歌\r\n2.2 敲击乐器', '2.1.1 以准确的发音唱歌\r\n2.1.2 以正确的音准唱歌\r\n2.2.1 跟着乐谱图标敲击乐器', '以准确的发音和音准唱歌。', '随着音乐，唱至少5句歌词。', '跟随老师朗读歌词和学习唱歌。', '学生注意唱歌时的发音和音准。\r\n跟着乐谱图标敲击乐器。\r\n学生分组各自用响板和铃鼓拍打节奏。', '教师要求学生概述今日所学。'),
(19, '音乐', '单元十五 我的风筝', 'WAU BULAN', '2.1 唱歌\r\n2.2 敲击乐器', '2.1.1 以准确的发音唱歌\r\n2.1.2 以正确的音准唱歌\r\n2.1.3 跟着拍子唱歌\r\n2.2.4 跟着乐谱图标敲击乐器', '以准确的发音和音准唱歌。', '随着音乐，唱至少5句歌词。', '跟随老师朗读歌词。', '以较慢或较快的速度演唱歌曲。\r\n随着音乐，跟着乐谱图标拍手。', '教师要求学生概述今日所学。'),
(20, '音乐', '单元十五 我的风筝', 'WAU BULAN', '2.3 跟着音乐做动作', '2.3.3 跟着速度做动作', '跟着速度做动作', '跟着速度做至少3种动作', '复习歌曲。', '利用不同的节奏演唱。\r\n学生以四四拍节奏做出不同的动作来配合dikir barat歌曲《Wau Bulan》。\r\n学生坐在地板上并跟着音乐做dikir barat的基本和简单的动作。', '教师要求学生概述今日所学。'),
(21, '音乐', '单元十七 小小创作家', '-', '2.2 敲击乐器\r\n3.1 音乐创作\r\n', '2.2.4 跟着乐谱图标敲击乐器\r\n3.1.2 利用乐谱图标代替自创简单的节奏', '利用乐谱图标代替自创简单的节奏', '利用至少3个乐谱图标代替自创简单的节奏', '教师使用歌曲导入。', '跟随老师一面拍手，一面念节奏。\r\n跟着乐谱图标敲击乐器。\r\n学生自创节奏。', '教师要求学生概述今日所学。'),
(22, '音乐', '单元十七 小小创作家', '创作节奏真有趣', '2.2 敲击乐器\r\n3.1 音乐创作', '2.2.4 跟着乐谱图标敲击乐器\r\n3.1.2 利用乐谱图标代替自创简单的节奏', '利用乐谱图标代替自创简单的节奏', '利用至少3个乐谱图标代替自创简单的节奏', '教师使用歌曲导入。', '跟随老师一面拍手，一面念节奏。\r\n跟着乐谱图标敲击乐器。\r\n学生自创节奏。', '教师要求学生概述今日所学。'),
(23, '音乐', '单元十九 小乐队', '小乐队', '2.1 唱歌\r\n2.2 敲击乐器', '2.1.1 以准确的发音唱歌\r\n2.1.2 以正确的音准唱歌\r\n2.2.4 跟着乐谱图标敲击乐器\r\n', '以准确的发音和音准唱歌。', '随着音乐，唱至少5句歌词。', '跟随老师朗读歌词和学习唱歌。', '跟随歌曲节拍，一面唱歌，一面原地踏步。\r\n学生以自己喜欢的乐谱图标创作四四拍节奏。\r\n教师选几位学生前来，自选乐器拍打自创的节奏。', '教师要求学生概述今日所学。'),
(24, '音乐', '单元十九 小乐队', '小乐队', '2.2 敲击乐器\r\n2.3 跟着音乐做动作\r\n3.1 音乐创作\r\n\r\n', '2.2.4 跟着乐谱图标敲击乐器\r\n2.3.1 根据歌词做动作\r\n3.1.1 发出各种声音', '根据歌词做动作及发出各种声音', '根据歌词做出至少2种动作及发出至少2种声音', '复习歌曲。', '随着歌曲的旋律，模仿打鼓、敲锣、吹喇叭及吹笛子的姿势做动作。\r\n学生演唱《小乐队》，并跟随歌曲的节拍，一面唱歌，一面像操步般原地踏步。\r\n学生做出各种打鼓，敲锣，吹喇叭及吹笛子的姿势。', '教师要求学生概述今日所学。'),
(25, '音乐', '单元十九 小乐队', '小乐队', '1.1 音乐元素\r\n2.2 敲击乐器\r\n3.1 音乐创作', '1.1.3 认识、了解和分辨声音和乐器的音色\r\n2.2.4 跟着乐谱图标敲击乐器\r\n3.1.1 发出各种声音。', '认识、了解和分辨声音和乐器的音色及发出各种声音。', '分辨至少2种声音和乐器的音色及发出至少3种声音。', '教师使用歌曲导入。', '聆听物品敲打时发出的声音，并辨别其音色。\r\n选一种物品作为敲击乐器，随着乐谱图标，敲打《小乐队》的节奏。', '教师要求学生概述今日所学。'),
(26, '音乐', '单元十九 小乐队', '过山车', '1.1 音乐元素\r\n2.1 唱歌\r\n2.3 跟着音乐做动作', '1.1.1 认识、了解和分辨高音和低音\r\n2.1.1 以准确的发音唱歌\r\n2.1.2 以正确的音准唱歌\r\n2.3.1 根据歌词做动作', '以准确的发音和音准唱歌及做动作。', '随着音乐，唱至少5句歌词。', '教师使用歌曲导入。', '跟随老师朗读歌词和学习唱歌。\r\n学生根据音调的高低做动作。', '教师要求学生概述今日所学。'),
(27, '音乐', '单元二十一 我的家庭', '我的家', '1.1 音乐元素\r\n2.1 唱歌', '1.1.3 认识、了解和分辨声音和乐器的音色\r\n2.1.1 以准确的发音唱歌\r\n2.1.2 以正确的音准唱歌', '以准确的发音和音准唱歌及认识、了解和分辨声音和乐器的音色。', '分辨至少2种声音和乐器的音色。', '教师使用歌曲导入。', '跟随老师朗读歌词和学习唱歌。\r\n男女两组一起合唱歌曲。', '教师要求学生概述今日所学。'),
(28, '音乐', '单元二十一 我的家庭', '我的家', '1.1 音乐元素\r\n2.1 唱歌', '1.1.3 认识、了解和分辨声音和乐器的音色\r\n2.1.1 以准确的发音唱歌\r\n2.1.2 以正确的音准唱歌', '以准确的发音和音准唱歌及认识、了解和分辨声音和乐器的音色。', '分辨至少3种声音和乐器的音色。', '教师使用歌曲导入。', '跟随老师朗读歌词和学习唱歌。\r\n男女两组一起合唱歌曲。', '教师要求学生概述今日所学。'),
(29, '音乐', '单元二十一 我的家庭', '好爸妈', '2.1 唱歌', '2.1.1 以准确的发音唱歌\r\n2.1.2 以正确的音准唱歌', '以准确的发音和音准唱歌。', '随着音乐，唱至少5句歌词。', '教师使用歌曲导入。', '跟随老师朗读歌词和学习唱歌。\r\n学生注意唱歌时的发音、节奏和音准。', '教师要求学生概述今日所学。'),
(30, '音乐', '单元二十一 我的家庭', '好爸妈', '2.1 唱歌', '2.1.1 以准确的发音唱歌\r\n2.1.2 以正确的音准唱歌\r\n2.1.3 跟着拍子唱歌', '以准确的发音和音准唱歌。', '随着音乐，唱至少5句歌词。', '复习歌曲。', '学生注意唱歌时的发音、节奏和音准。\r\n学生根据所规定的速度演唱歌曲。', '教师要求学生概述今日所学。'),
(31, '音乐', '单元二十一 我的家庭', '好爸妈', '2.2 敲击乐器', '2.2.1 跟着速度敲打乐器\r\n2.2.4 跟着乐谱图标敲击乐器', '根据所规定的速度敲击乐器。', '根据所规定的速度敲击至少2种乐器。', '复习歌曲。', '学生根据所规定的速度敲击乐器。\r\n学生根据所规定的速度一面唱歌，一面敲打乐器。', '教师要求学生概述今日所学。'),
(32, '音乐', '5.0 音乐艺术课业（二）', '教师与学生根据课题内容策划与安排艺术课业', '5.1 音乐表演', '5.1.1 策划音乐表演\r\n5.1.3 在音乐活动中实践道德价值\r\n', '以道德价值来策划音乐表演。', '以2个道德价值来策划音乐表演。', '教师使用歌曲导入。', '教师与学生讨论适合的两首歌曲，然后将学生分成两组。\r\n分配好歌曲后，学生在各自的组别里讨论如何呈现表演。\r\n各组学生再把自己组员分成三个小组，分别为歌唱组、动作组和乐器组。\r\n各组决定想用的乐器并一起以图标创作节奏。', '教师要求学生概述今日所学。'),
(33, '音乐', '5.0 音乐艺术课业（二）', '教师与学生根据课题内容策划与安排艺术课业 歌曲：各组可选任何一首单元十二至单元二十一的歌曲', '5.1 音乐表演\r\n3.1 音乐创作', '5.1.2 呈献音乐表演\r\n5.1.3 在音乐活动中实践道德价值\r\n3.1.1 利用即兴物品发出各种声音', '利用即兴物品发出各种声音来呈献音乐表演。', '利用即兴物品发出至少3种声音来呈献音乐表演。', '教师使用歌曲导入。', '学生分组完成表演。\r\n结束后，学生检讨自己的表演及说出需要改善之处。\r\n学生说出自己是否满意自己的表演。', '教师要求学生概述今日所学。');

-- --------------------------------------------------------

--
-- Structure de la table `refleksi`
--

CREATE TABLE `refleksi` (
  `id` int(11) NOT NULL,
  `refleksi` varchar(255) NOT NULL,
  `sub` varchar(255) NOT NULL,
  `input` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `refleksi`
--

INSERT INTO `refleksi` (`id`, `refleksi`, `sub`, `input`) VALUES
(1, '__位学生能够掌握技能，__位学生课后跟进。', '音乐', 2),
(2, '__位学生能够掌今日所学。', '音乐', 1),
(3, '__位学生能够掌握技能。', '音乐', 1),
(4, '__位学生达致教学目标。', '音乐', 1),
(5, '__位学生能够掌握技能，__位学生课后跟进，__位学生缺席。', '音乐', 3),
(6, '__位学生能掌握技能，__位学生还需要教师的辅导。', '音乐', 2),
(7, '__位学生能够掌握技能，__位学生课后跟进，并进行课后辅导。', '音乐', 2),
(8, '__位学生能够掌握技能，__位学生缺席。', '音乐', 2),
(9, '__位学生能够掌握技能，__位学生课后跟进。__位学生已经进行课堂评估。', '音乐', 3),
(10, '大部分学生达标。', '音乐', 0),
(11, '__位学生能够掌今日所学，__位学生还需要教师的辅导，__位学生缺席。', '音乐', 3),
(12, '辅导组：__位学生能够在老师引导下掌握技能，__位同学课后跟进，并进行课后辅导。巩固组：__位学生能够掌握技能，__位同学课后跟进，并进行课后辅导。增广组：__位学生能够掌握技能，__位同学课后跟进，并进行课后辅导。', '音乐', 6);

-- --------------------------------------------------------

--
-- Structure de la table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `status`) VALUES
(2, 'BAHASA MELAYU', 2),
(3, 'ENGLISH', 1),
(4, 'SCIENCE', 1),
(5, 'MATHEMATICS', 1),
(6, '音乐', 1),
(7, 'MORAL', 1),
(8, '华文', 1);

-- --------------------------------------------------------

--
-- Structure de la table `tahap`
--

CREATE TABLE `tahap` (
  `id` int(11) NOT NULL,
  `tahap` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tahap`
--

INSERT INTO `tahap` (`id`, `tahap`) VALUES
(1, 'TP1'),
(2, 'TP2'),
(3, 'TP3'),
(4, 'TP4'),
(5, 'TP5'),
(6, 'TP6');

-- --------------------------------------------------------

--
-- Structure de la table `ujian`
--

CREATE TABLE `ujian` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ujian`
--

INSERT INTO `ujian` (`id`, `type`) VALUES
(1, '表演'),
(2, '考卷'),
(3, '线下练习'),
(4, '视频、录影'),
(5, '线上练习: Quizizz'),
(6, '线上练习: Google Form'),
(7, '游戏'),
(8, '线上练习'),
(9, '课业'),
(10, '阅读'),
(11, '写作'),
(12, '回答问题');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hp` varchar(255) NOT NULL,
  `credit` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 1 COMMENT '1: user , 2 admin',
  `token` int(11) NOT NULL DEFAULT 365 COMMENT 'Number of registrations'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `password`, `hp`, `credit`, `status`, `role`, `token`) VALUES
(23, 'dangxuong2000@gmail.com', 'dangxuong2000@gmail.com', '$2y$10$CNvaTdn99YmbCdn/9Lctuu83Fupf/J0OfZUgAFTsxBa2SSBlJRHeW', '0976594504', 0, 1, 2, 365),
(25, 'dangxuong@gmail.com', 'dangxuong@gmail.com', '$2y$10$sCbbke.UQ.bzqWe3VHSvKu3wQluVFlldif1o2ciGB2kfy2w49Yap2', '0976594504', 3, 1, 1, 365),
(26, '123@gmail.com', '123', '$2y$10$q6tJp8srfXBxAkrFLw38zObPEDYfzEgKz0rAwmyWBkS5n1DVHxY6W', '122222', 300, 1, 1, 365),
(27, '111@gmail.com', '111', '$2y$10$q6tJp8srfXBxAkrFLw38zObPEDYfzEgKz0rAwmyWBkS5n1DVHxY6W', '11111', 300, 1, 1, 365);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `akt21`
--
ALTER TABLE `akt21`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `apm`
--
ALTER TABLE `apm`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `apn`
--
ALTER TABLE `apn`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `aspirasi`
--
ALTER TABLE `aspirasi`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `au`
--
ALTER TABLE `au`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `bbm`
--
ALTER TABLE `bbm`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cstd`
--
ALTER TABLE `cstd`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `emk`
--
ALTER TABLE `emk`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `kdg`
--
ALTER TABLE `kdg`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `kemahiran`
--
ALTER TABLE `kemahiran`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `kk`
--
ALTER TABLE `kk`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `op`
--
ALTER TABLE `op`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `p21`
--
ALTER TABLE `p21`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pemikiran`
--
ALTER TABLE `pemikiran`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `period`
--
ALTER TABLE `period`
  ADD PRIMARY KEY (`no`);

--
-- Index pour la table `peta`
--
ALTER TABLE `peta`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `preset`
--
ALTER TABLE `preset`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `refleksi`
--
ALTER TABLE `refleksi`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tahap`
--
ALTER TABLE `tahap`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `akt21`
--
ALTER TABLE `akt21`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT pour la table `apm`
--
ALTER TABLE `apm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `apn`
--
ALTER TABLE `apn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `aspirasi`
--
ALTER TABLE `aspirasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `au`
--
ALTER TABLE `au`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT pour la table `bbm`
--
ALTER TABLE `bbm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `cstd`
--
ALTER TABLE `cstd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `emk`
--
ALTER TABLE `emk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `kdg`
--
ALTER TABLE `kdg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `kemahiran`
--
ALTER TABLE `kemahiran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `kk`
--
ALTER TABLE `kk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `op`
--
ALTER TABLE `op`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `p21`
--
ALTER TABLE `p21`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `pemikiran`
--
ALTER TABLE `pemikiran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `period`
--
ALTER TABLE `period`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `peta`
--
ALTER TABLE `peta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `refleksi`
--
ALTER TABLE `refleksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `tahap`
--
ALTER TABLE `tahap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `ujian`
--
ALTER TABLE `ujian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
