-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 09, 2025 at 03:09 PM
-- Server version: 8.4.3
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `js-project`
--

-- --------------------------------------------------------

--
-- Table structure for table `akt21`
--

CREATE TABLE `akt21` (
  `id` int NOT NULL,
  `aktiviti` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akt21`
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
-- Table structure for table `apm`
--

CREATE TABLE `apm` (
  `id` int NOT NULL,
  `apm` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sub` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apm`
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
-- Table structure for table `apn`
--

CREATE TABLE `apn` (
  `id` int NOT NULL,
  `apn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sub` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apn`
--

INSERT INTO `apn` (`id`, `apn`, `sub`) VALUES
(1, '教师要求学生概述今日所学。', '音乐');

-- --------------------------------------------------------

--
-- Table structure for table `aspirasi`
--

CREATE TABLE `aspirasi` (
  `id` int NOT NULL,
  `aspirasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aspirasi`
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
-- Table structure for table `au`
--

CREATE TABLE `au` (
  `id` int NOT NULL,
  `au` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sub` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `au`
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
-- Table structure for table `bbm`
--

CREATE TABLE `bbm` (
  `id` int NOT NULL,
  `bbm` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bbm`
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
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `id` int NOT NULL,
  `userId` int NOT NULL,
  `year` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `month` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` int NOT NULL,
  `day` int NOT NULL,
  `cTime` time NOT NULL,
  `cDate` date NOT NULL,
  `pDate` date DEFAULT NULL,
  `minggu` int NOT NULL,
  `penggal` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int NOT NULL,
  `calId` int NOT NULL,
  `userId` int NOT NULL,
  `periodId` int NOT NULL,
  `date` int NOT NULL,
  `month` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `year` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `day` int NOT NULL,
  `penggal` int NOT NULL,
  `minggu` int NOT NULL,
  `preset` int NOT NULL,
  `tema` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tajuk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kdg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cstd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `op` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apm` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `au` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `emk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nilai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `bbm` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pemikiran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `peta` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pbd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tahap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `akt21` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `p21` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `praujian` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pascaujian` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `k6` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `aspirasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `refleksi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `inputRef` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tsm` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cstd`
--

CREATE TABLE `cstd` (
  `id` int NOT NULL,
  `cstd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sub` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cstd`
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
(19, '5.1.3 在音乐活动中实践道德价值', '音乐'),
(20, '2.3.3 根据节奏动一动', '音乐');

-- --------------------------------------------------------

--
-- Table structure for table `emk`
--

CREATE TABLE `emk` (
  `id` int NOT NULL,
  `emk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emk`
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
-- Table structure for table `kdg`
--

CREATE TABLE `kdg` (
  `id` int NOT NULL,
  `kdg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sub` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kdg`
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
-- Table structure for table `kemahiran`
--

CREATE TABLE `kemahiran` (
  `id` int NOT NULL,
  `kemahiran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kemahiran`
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
-- Table structure for table `kk`
--

CREATE TABLE `kk` (
  `id` int NOT NULL,
  `kk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sub` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kk`
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
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int NOT NULL,
  `nilai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai`
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
-- Table structure for table `op`
--

CREATE TABLE `op` (
  `id` int NOT NULL,
  `op` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sub` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `op`
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
-- Table structure for table `p21`
--

CREATE TABLE `p21` (
  `id` int NOT NULL,
  `p21` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p21`
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
-- Table structure for table `pemikiran`
--

CREATE TABLE `pemikiran` (
  `id` int NOT NULL,
  `pemikiran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemikiran`
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
-- Table structure for table `period`
--

CREATE TABLE `period` (
  `no` int NOT NULL,
  `userId` int NOT NULL,
  `day` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `std` int NOT NULL,
  `sub` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `start` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `end` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `noStu` int NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `period`
--

INSERT INTO `period` (`no`, `userId`, `day`, `std`, `sub`, `class`, `start`, `end`, `noStu`, `status`, `date`) VALUES
(65, 25, '0', 1, 'MATHEMATICS', '3322241', '16:24', '18:26', 44, 1, '2025-01-19'),
(66, 25, '0', 5, '华文', '33222', '17:24', '14:28', 44, 1, '2025-01-19'),
(67, 28, '2', 1, 'ENGLISH', 'test ', '21:11', '23:11', 23, 1, '2025-01-14'),
(68, 31, '1', 1, 'ENGLISH', 'll', '10:14', '10:16', 12, 1, '2025-01-06'),
(69, 31, '1', 1, 'SCIENCE', 'aa', '11:02', '11:04', 0, 1, '2025-01-06'),
(70, 25, '0', 4, 'MATHEMATICS', 'kjl;', '18:55', '14:58', 2363, 1, '2025-01-26'),
(74, 28, '3', 1, 'ENGLISH', 'test ', '00:30', '04:30', 23, 1, '2025-01-08'),
(75, 28, '3', 1, 'ENGLISH', 'test ', '02:32', '04:32', 32, 1, '2025-01-08'),
(76, 25, '0', 2, 'SCIENCE', '3322241', '11:31', '11:31', 44, 1, '2025-01-26'),
(77, 28, '3', 1, 'ENGLISH', 'rq', '15:11', '16:11', 654, 0, NULL),
(78, 25, '2', 1, 'ENGLISH', '1111', '15:57', '19:55', 2363, 0, NULL),
(79, 25, '0', 3, '音乐', 'lớp 1', '19:19', '21:23', 44, 1, '2025-01-26'),
(80, 31, '1', 1, 'test ', '22', '10:29', '10:29', 40, 1, '2025-01-06'),
(82, 28, '0', 1, 'ENGLISH', 'asdf', '21:10', '20:13', 23, 0, NULL),
(83, 28, '0', 1, 'ENGLISH', 'fSfds', '15:22', '18:22', 54, 0, NULL),
(84, 33, '0', 2, 'SCIENCE', '3322241', '17:53', '16:55', 44, 1, '2025-03-16'),
(85, 31, '1', 1, 'ENGLISH', 'gg', '14:10', '14:11', 12, 1, '2025-03-03');

-- --------------------------------------------------------

--
-- Table structure for table `peta`
--

CREATE TABLE `peta` (
  `id` int NOT NULL,
  `peta` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peta`
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
-- Table structure for table `preset`
--

CREATE TABLE `preset` (
  `id` int NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tema` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tajuk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kdg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cstd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `op` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apm` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `au` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `period` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `preset`
--

INSERT INTO `preset` (`id`, `subject`, `tema`, `tajuk`, `kdg`, `cstd`, `op`, `kk`, `apm`, `au`, `apn`, `period`) VALUES
(60, '音乐', '单元一 我的好朋友', '好朋友，好同学', '2.1 唱歌', '2.1.1 以准确的发音唱歌/n2.1.2 以正确的音准唱歌', '以准确的发音和音准唱歌。', '跟着乐谱图标敲击乐器唱至少3句歌词。', '教师提问问题激发学生兴趣，”你们来到学校有没有认识好朋友、好同学呀？”', '发声练习。/n引导学生以准确的发音和音准唱歌。/n在老师领导下，一面唱歌，一面跟着乐谱图标敲击乐器。', '教师要求学生概述今日所学。', NULL),
(61, '音乐', '单元一 我的好朋友', '好朋友，好同学', '2.2 敲击乐器', '2.2.4 跟着乐谱图标敲击乐器', '以准确的发音和音准唱歌。', '跟着乐谱图标敲击乐器唱至少3句歌词。', '教师提问问题激发学生兴趣，”你们来到学校有没有认识好朋友、好同学呀？”', '发声练习。/n引导学生以准确的发音和音准唱歌。/n在老师领导下，一面唱歌，一面跟着乐谱图标敲击乐器。', '教师要求学生概述今日所学。', NULL),
(62, '音乐', '单元一 我的好朋友', '请你跟我这样做', '2.3 跟着音乐做动作', '2.3.3 根据节奏动一动', '根据节奏动一动。', '自创至少1种节奏。', '教师播放歌曲，学生聆听后演唱。', '老师念一念“请你跟我这样做”，学生根据节奏动一动。/n引导学生自创节奏。', '教师要求学生概述今日所学。', NULL),
(63, '音乐', '单元三 新年到，真快乐', '新年到', '2.1 唱歌', '2.1.1 以准确的发音唱歌/n2.1.2 以正确的音准唱歌', '以准确的发音和音准唱歌。', '随着音乐，唱至少5句歌词。', '教师使用歌曲导入。', '随着歌曲的旋律学唱歌。/n随着音乐，根据乐谱图标的节奏拍手。', '教师要求学生概述今日所学。', NULL),
(64, '音乐', '单元三 新年到，真快乐', '请你跟我这样拍', '3.1 音乐创作', '3.1.2 利用乐谱图标代替自创简单的节奏', '模仿老师拍打乐谱图标的节奏。', '自创至少1种节奏，然后随着音乐，拍出自创的节奏。', '教师使用歌曲导入。', '引导学生模仿老师拍打乐谱图标的节奏。/n引导学生自创节奏，然后随着音乐，拍出自创的节奏。', '教师要求学生概述今日所学。', NULL),
(65, '音乐', '单元五 小小游戏', '听听', '1.1 音乐元素', '1.1.2 认识、了解和分辨强的力度和弱的力度/n1.1.3 认识、了解和分辨声音和乐器的音色', '认识、了解和分辨强的力度和弱的力度及分辨声音和乐器的音色。', '聆听和辨别至少2种声音。', '教师使用歌曲导入。', '以适当的节奏朗读歌词。/n以正确的音准和不同的音色，随着歌曲的旋律学唱歌。/n引导学生聆听和辨别大声、小声、欢呼声、歌声、笛声和敲击声。/n一面唱歌，一面跟着歌词做动作。', '教师要求学生概述今日所学。', NULL),
(66, '音乐', '单元五 小小游戏', '玩游戏', '2.1 唱歌', '2.1.1 以准确的发音唱歌/n2.1.2 以正确的音准唱歌', '以准确的发音和音准唱歌。', '随着音乐，唱至少5句歌词。', '跟随老师朗读歌词。', '一面唱歌，一面跟着歌词做动作。/n一面唱歌，一面跟着拍子做动作。/n一面唱歌，一面玩游戏。', '教师要求学生概述今日所学。', NULL),
(67, '音乐', '单元七 算一算', 'COUNTINGS FINGERS', '2.1.1 唱歌', '2.1.1 以准确的发音唱歌/n2.1.2 以正确的音准唱歌/n2.1.3 跟着拍子唱歌', '以准确的发音和音准唱歌。', '随着音乐，唱至少5句歌词。', '跟随老师朗读歌词。', '学生根据所规定的速度演唱和敲击乐器。/n教师以正确的音调唱出歌曲。/n学生根据音乐做动作。', '教师要求学生概述今日所学。', NULL),
(68, '音乐', '单元七 算一算', 'COUNTINGS FINGERS', '2.2 敲击乐器', '2.2.1 跟着拍子敲打乐器', '以准确的发音和音准唱歌。', '随着音乐，唱至少5句歌词。', '跟随老师朗读歌词。', '学生根据所规定的速度演唱和敲击乐器。/n教师以正确的音调唱出歌曲。/n学生根据音乐做动作。', '教师要求学生概述今日所学。', NULL),
(69, '音乐', '单元七 算一算', '储蓄歌', '1.1 音乐元素', '1.1.2 认识、了解和分辨强的力度和弱的力度', '认识、了解和分辨强的力度和弱的力度及跟着乐谱图标敲击乐器。', '分辨至少2种强的力度和弱的力度。', '跟随老师朗读歌词。', '学生根据所规定的速度演唱和敲击乐器。/n教师以正确的音调唱出歌曲。/n学生根据音乐做动作。', '教师要求学生概述今日所学。', NULL),
(70, '音乐', '单元七 算一算', '储蓄歌', '2.2 敲击乐器', '2.2.4 跟着乐谱图标敲击乐器', '认识、了解和分辨强的力度和弱的力度及跟着乐谱图标敲击乐器。', '分辨至少2种强的力度和弱的力度。', '跟随老师朗读歌词。', '学生根据所规定的速度演唱和敲击乐器。/n教师以正确的音调唱出歌曲。/n学生根据音乐做动作。', '教师要求学生概述今日所学。', NULL),
(71, '音乐', '单元九 我的生活', '做早操', '2.1 唱歌', '2.1.1 以准确的发音唱歌/n2.1.2 以正确的音准唱歌', '以准确的发音和音准唱歌。', '随着音乐，唱至少5句歌词。', '教师使用歌曲导入。', '以正确的音准唱歌。/n引导学生根据歌词和节拍自创动作。/n一面唱歌，一面做出自创动作。', '教师要求学生概述今日所学。', NULL),
(72, '音乐', '单元九 我的生活', '做早操', '2.2 敲击乐器', '', '以准确的发音和音准唱歌。', '随着音乐，唱至少5句歌词。', '教师使用歌曲导入。', '以正确的音准唱歌。/n引导学生根据歌词和节拍自创动作。/n一面唱歌，一面做出自创动作。', '教师要求学生概述今日所学。', NULL),
(73, '音乐', '单元九 我的生活', '做早操', '2.3 跟着音乐做动作', '2.3.1 跟着歌曲做出动作', '以准确的发音和音准唱歌。', '随着音乐，唱至少5句歌词。', '教师使用歌曲导入。', '以正确的音准唱歌。/n引导学生根据歌词和节拍自创动作。/n一面唱歌，一面做出自创动作。', '教师要求学生概述今日所学。', NULL),
(74, '音乐', '单元九 我的生活', '我的朋友在哪里', '1.1 音乐元素', '1.1.2 认识、了解和分辨强的力度和弱的力度', '认识、了解和分辨强的力度和弱的力度及正确地发出各种声音。', '分辨至少2种强的力度和弱的力度，发出至少3种声音。', '教师使用歌曲导入。', '随着歌曲旋律，学习唱歌。/n一面唱歌，一面拍打身体不同的部位。/n引导学生辨识强音和弱音。', '教师要求学生概述今日所学。', NULL),
(75, '音乐', '单元九 我的生活', '我的朋友在哪里', '2.3 跟着音乐做动作', '2.3.2 跟着歌曲的拍子做动作', '认识、了解和分辨强的力度和弱的力度及正确地发出各种声音。', '分辨至少2种强的力度和弱的力度，发出至少3种声音。', '教师使用歌曲导入。', '随着歌曲旋律，学习唱歌。/n一面唱歌，一面拍打身体不同的部位。/n引导学生辨识强音和弱音。', '教师要求学生概述今日所学。', NULL),
(76, '音乐', '单元九 我的生活', '我的朋友在哪里', '3.1 音乐创作', '3.1.1 发出各种声音', '认识、了解和分辨强的力度和弱的力度及正确地发出各种声音。', '分辨至少2种强的力度和弱的力度，发出至少3种声音。', '教师使用歌曲导入。', '随着歌曲旋律，学习唱歌。/n一面唱歌，一面拍打身体不同的部位。/n引导学生辨识强音和弱音。', '教师要求学生概述今日所学。', NULL),
(77, '音乐', '单元九 我的生活', '过山车', '1.1 音乐元素', '1.1.3 认识、了解和分辨声音和乐器的音色', '以准确的发音和音准唱歌及认识、了解和分辨声音和乐器的音色。', '分辨至少2种声音和乐器的音色。', '教师引导学生认识第28页的敲击乐器及示范敲击乐器的正确握法和敲击法。', '学生听乐器所发出的声音然后写出乐器名称。/n教师引导学生唱《过山车》。/n学生根据29页乐谱图标以响板，手铃和铃鼓敲击出节奏。', '教师要求学生概述今日所学。', NULL),
(78, '音乐', '单元九 我的生活', '过山车', '2.1 唱歌', '2.1.1 以准确的发音唱歌', '以准确的发音和音准唱歌及认识、了解和分辨声音和乐器的音色。', '分辨至少2种声音和乐器的音色。', '教师引导学生认识第28页的敲击乐器及示范敲击乐器的正确握法和敲击法。', '学生听乐器所发出的声音然后写出乐器名称。/n教师引导学生唱《过山车》。/n学生根据29页乐谱图标以响板，手铃和铃鼓敲击出节奏。', '教师要求学生概述今日所学。', NULL),
(79, '音乐', '单元九 我的生活', '过山车', '2.2 敲击乐器', '2.2.2 根据乐曲的拍子演奏敲击乐器/n2.2.3 根据乐曲的旋律模式敲击乐器/n2.2.4 跟着乐谱图标敲击乐器', '以准确的发音和音准唱歌及认识、了解和分辨声音和乐器的音色。', '分辨至少2种声音和乐器的音色。', '教师引导学生认识第28页的敲击乐器及示范敲击乐器的正确握法和敲击法。', '学生听乐器所发出的声音然后写出乐器名称。/n教师引导学生唱《过山车》。/n学生根据29页乐谱图标以响板，手铃和铃鼓敲击出节奏。', '教师要求学生概述今日所学。', NULL),
(80, '音乐', '单元十一 可爱的动物', '我爱动物园', '1.1 音乐元素', '1.1.2 认识、了解和分辨强的力度和弱的力度/n1.1.3 认识、了解和分辨声音和乐器的音色', '以准确的发音和音准唱歌及认识、了解和分辨声音和乐器的音色。', '分辨至少2种声音和乐器的音色。', '跟随老师朗读歌词和学习唱歌。', '引导学生模仿动物的叫声。/n辨别动物发出强或弱的叫声。/n老师解说和强调力度 – 强音和弱音。', '教师要求学生概述今日所学。', NULL),
(81, '音乐', '单元十一 可爱的动物', '我爱动物园', '2.1 唱歌', '2.1.1 以准确的发音唱歌/n2.1.2 以正确的音准唱歌', '以准确的发音和音准唱歌及认识、了解和分辨声音和乐器的音色。', '分辨至少2种声音和乐器的音色。', '跟随老师朗读歌词和学习唱歌。', '引导学生模仿动物的叫声。/n辨别动物发出强或弱的叫声。/n老师解说和强调力度 – 强音和弱音。', '教师要求学生概述今日所学。', NULL),
(82, '音乐', '单元十一 可爱的动物', '我爱动物园', '3.1 音乐创作', '3.1.1 发出各种声音', '以准确的发音和音准唱歌及认识、了解和分辨声音和乐器的音色。', '分辨至少2种声音和乐器的音色。', '跟随老师朗读歌词和学习唱歌。', '引导学生模仿动物的叫声。/n辨别动物发出强或弱的叫声。/n老师解说和强调力度 – 强音和弱音。', '教师要求学生概述今日所学。', NULL),
(83, '音乐', '单元十一 可爱的动物', 'BUNYI BINATANG', '2.1 唱歌', '2.1.1 以准确的发音唱歌/n2.1.2 以正确的音准唱歌', '以准确的发音和音准唱歌。', '随着音乐，唱至少5句歌词。', '以正确的语音朗读歌词。', '习唱歌唱。/n模仿歌词中动物的叫声。/n以不同的动物叫声演唱歌曲。', '教师要求学生概述今日所学。', NULL),
(84, '音乐', '单元十一 可爱的动物', 'BUNYI BINATANG', '3.1 音乐创作', '3.1.1 发出各种声音', '以准确的发音和音准唱歌。', '随着音乐，唱至少5句歌词。', '以正确的语音朗读歌词。', '习唱歌唱。/n模仿歌词中动物的叫声。/n以不同的动物叫声演唱歌曲。', '教师要求学生概述今日所学。', NULL),
(85, '音乐', '5.0 音乐艺术课业（一）', '教师与学生根据1-11课题内容策划与安排艺术课业', '5.1 音乐表演', '5.1.1 策划音乐表演/n5.1.3 在音乐活动中实践道德价值', '以道德价值来策划音乐表演。', '以至少2种道德价值来策划音乐表演。', '教师使用歌曲导入。', '教师与学生讨论适合的两首歌曲，然后将学生分成两组。/n分配好歌曲后，学生在各自的组别里讨论如何呈现表演。/n各组学生再把自己组员分成三个小组，分别为歌唱组、动作组和乐器组。/n各组决定想用的乐器并一起以图标创作节奏。', '教师要求学生概述今日所学。', NULL),
(86, '音乐', '5.0 音乐艺术课业（一）', '教师与学生根据1-11课题内容策划与安排艺术课业', '5.1 音乐表演', '5.1.1 策划音乐表演/n5.1.3 在音乐活动中实践道德价值', '以道德价值来策划音乐表演。', '以至少3种道德价值来策划音乐表演。', '教师使用歌曲导入。', '各组的小组开始以分开式练习唱歌、做动作和敲击乐器。/n歌唱组以正确的站姿、呼吸法和清晰的咬字练习歌唱。/n动作组配合歌曲设计组员们的动作。/n乐器组根据所设计的乐谱图标上的节奏一起练习敲击乐器。', '教师要求学生概述今日所学。', NULL),
(87, '音乐', '5.0 音乐艺术课业（一）', '教师与学生根据1-11课题内容策划与安排艺术课业', '5.1 音乐表演', '5.1.2 呈献音乐表演/n5.1.3 在音乐活动中实践道德价值', '以道德价值来呈现音乐表演。', '以至少2种道德价值来策划音乐表演。', '教师使用歌曲导入。', '学生分组完成表演。/n结束后，学生检讨自己的表演及说出需要改善之处。/n学生说出自己是否满意自己的表演。', '教师要求学生概述今日所学。', NULL),
(88, '音乐', '单元十三 传统音乐', '音乐鉴赏', '4.1 鉴赏音乐作品', '4.1.1 确认马来西亚传统音乐 i 音乐种类 ii 实践传统音乐的社群', '确认及运用马来西亚传统音乐。', '运用至少1种马来西亚传统音乐。', '教师使用歌曲导入。', '教师歌曲后与学生讨论所听到的音乐。/n教师播放视频，然后与学生讨论视频的呈现方式和特点。/n教师解说马来传统音乐Dikir Barat和其惯用的敲击乐器。/n学生观赏其他视频并认出所用的乐器。', '教师要求学生概述今日所学。', NULL),
(89, '音乐', '单元十五 我的风筝', '放风筝', '2.1 唱歌', '2.1.1 以准确的发音唱歌/n2.1.2 以正确的音准唱歌', '以准确的发音和音准唱歌。', '随着音乐，唱至少5句歌词。', '跟随老师朗读歌词和学习唱歌。', '学生注意唱歌时的发音和音准。/n跟着乐谱图标敲击乐器。/n学生分组各自用响板和铃鼓拍打节奏。', '教师要求学生概述今日所学。', NULL),
(90, '音乐', '单元十五 我的风筝', '放风筝', '2.2 敲击乐器', '2.2.1 跟着乐谱图标敲击乐器', '以准确的发音和音准唱歌。', '随着音乐，唱至少5句歌词。', '跟随老师朗读歌词和学习唱歌。', '学生注意唱歌时的发音和音准。/n跟着乐谱图标敲击乐器。/n学生分组各自用响板和铃鼓拍打节奏。', '教师要求学生概述今日所学。', NULL),
(91, '音乐', '单元十五 我的风筝', 'WAU BULAN', '2.1 唱歌', '2.1.1 以准确的发音唱歌/n2.1.2 以正确的音准唱歌/n2.1.3 跟着拍子唱歌', '以准确的发音和音准唱歌。', '随着音乐，唱至少5句歌词。', '跟随老师朗读歌词。', '以较慢或较快的速度演唱歌曲。/n随着音乐，跟着乐谱图标拍手。', '教师要求学生概述今日所学。', NULL),
(92, '音乐', '单元十五 我的风筝', 'WAU BULAN', '2.2 敲击乐器', '2.2.4 跟着乐谱图标敲击乐器', '以准确的发音和音准唱歌。', '随着音乐，唱至少5句歌词。', '跟随老师朗读歌词。', '以较慢或较快的速度演唱歌曲。/n随着音乐，跟着乐谱图标拍手。', '教师要求学生概述今日所学。', NULL),
(93, '音乐', '单元十五 我的风筝', 'WAU BULAN', '2.3 跟着音乐做动作', '2.3.3 跟着速度做动作', '跟着速度做动作', '跟着速度做至少3种动作', '复习歌曲。', '利用不同的节奏演唱。/n学生以四四拍节奏做出不同的动作来配合dikir barat歌曲《Wau Bulan》。/n学生坐在地板上并跟着音乐做dikir barat的基本和简单的动作。', '教师要求学生概述今日所学。', NULL),
(94, '音乐', '单元十七 小小创作家', '-', '2.2 敲击乐器', '2.2.4 跟着乐谱图标敲击乐器', '利用乐谱图标代替自创简单的节奏', '利用至少3个乐谱图标代替自创简单的节奏', '教师使用歌曲导入。', '跟随老师一面拍手，一面念节奏。/n跟着乐谱图标敲击乐器。/n学生自创节奏。', '教师要求学生概述今日所学。', NULL),
(95, '音乐', '单元十七 小小创作家', '-', '3.1 音乐创作', '3.1.2 利用乐谱图标代替自创简单的节奏', '利用乐谱图标代替自创简单的节奏', '利用至少3个乐谱图标代替自创简单的节奏', '教师使用歌曲导入。', '跟随老师一面拍手，一面念节奏。/n跟着乐谱图标敲击乐器。/n学生自创节奏。', '教师要求学生概述今日所学。', NULL),
(96, '音乐', '单元十七 小小创作家', '创作节奏真有趣', '2.2 敲击乐器', '2.2.4 跟着乐谱图标敲击乐器', '利用乐谱图标代替自创简单的节奏', '利用至少3个乐谱图标代替自创简单的节奏', '教师使用歌曲导入。', '跟随老师一面拍手，一面念节奏。/n跟着乐谱图标敲击乐器。/n学生自创节奏。', '教师要求学生概述今日所学。', NULL),
(97, '音乐', '单元十七 小小创作家', '创作节奏真有趣', '3.1 音乐创作', '3.1.2 利用乐谱图标代替自创简单的节奏', '利用乐谱图标代替自创简单的节奏', '利用至少3个乐谱图标代替自创简单的节奏', '教师使用歌曲导入。', '跟随老师一面拍手，一面念节奏。/n跟着乐谱图标敲击乐器。/n学生自创节奏。', '教师要求学生概述今日所学。', NULL),
(98, '音乐', '单元十九 小乐队', '小乐队', '2.1 唱歌', '2.1.1 以准确的发音唱歌/n2.1.2 以正确的音准唱歌', '以准确的发音和音准唱歌。', '随着音乐，唱至少5句歌词。', '跟随老师朗读歌词和学习唱歌。', '跟随歌曲节拍，一面唱歌，一面原地踏步。/n学生以自己喜欢的乐谱图标创作四四拍节奏。/n教师选几位学生前来，自选乐器拍打自创的节奏。', '教师要求学生概述今日所学。', NULL),
(99, '音乐', '单元十九 小乐队', '小乐队', '2.2 敲击乐器', '2.2.4 跟着乐谱图标敲击乐器', '以准确的发音和音准唱歌。', '随着音乐，唱至少5句歌词。', '跟随老师朗读歌词和学习唱歌。', '跟随歌曲节拍，一面唱歌，一面原地踏步。/n学生以自己喜欢的乐谱图标创作四四拍节奏。/n教师选几位学生前来，自选乐器拍打自创的节奏。', '教师要求学生概述今日所学。', NULL),
(100, '音乐', '单元十九 小乐队', '小乐队', '2.2 敲击乐器', '2.2.4 跟着乐谱图标敲击乐器', '根据歌词做动作及发出各种声音', '根据歌词做出至少2种动作及发出至少2种声音', '复习歌曲。', '随着歌曲的旋律，模仿打鼓、敲锣、吹喇叭及吹笛子的姿势做动作。/n学生演唱《小乐队》，并跟随歌曲的节拍，一面唱歌，一面像操步般原地踏步。/n学生做出各种打鼓，敲锣，吹喇叭及吹笛子的姿势。', '教师要求学生概述今日所学。', NULL),
(101, '音乐', '单元十九 小乐队', '小乐队', '2.3 跟着音乐做动作', '2.3.1 根据歌词做动作', '根据歌词做动作及发出各种声音', '根据歌词做出至少2种动作及发出至少2种声音', '复习歌曲。', '随着歌曲的旋律，模仿打鼓、敲锣、吹喇叭及吹笛子的姿势做动作。/n学生演唱《小乐队》，并跟随歌曲的节拍，一面唱歌，一面像操步般原地踏步。/n学生做出各种打鼓，敲锣，吹喇叭及吹笛子的姿势。', '教师要求学生概述今日所学。', NULL),
(102, '音乐', '单元十九 小乐队', '小乐队', '3.1 音乐创作', '3.1.1 发出各种声音', '根据歌词做动作及发出各种声音', '根据歌词做出至少2种动作及发出至少2种声音', '复习歌曲。', '随着歌曲的旋律，模仿打鼓、敲锣、吹喇叭及吹笛子的姿势做动作。/n学生演唱《小乐队》，并跟随歌曲的节拍，一面唱歌，一面像操步般原地踏步。/n学生做出各种打鼓，敲锣，吹喇叭及吹笛子的姿势。', '教师要求学生概述今日所学。', NULL),
(103, '音乐', '单元十九 小乐队', '小乐队', '1.1 音乐元素', '1.1.3 认识、了解和分辨声音和乐器的音色', '认识、了解和分辨声音和乐器的音色及发出各种声音。', '分辨至少2种声音和乐器的音色及发出至少3种声音。', '教师使用歌曲导入。', '聆听物品敲打时发出的声音，并辨别其音色。/n选一种物品作为敲击乐器，随着乐谱图标，敲打《小乐队》的节奏。', '教师要求学生概述今日所学。', NULL),
(104, '音乐', '单元十九 小乐队', '小乐队', '2.2 敲击乐器', '2.2.4 跟着乐谱图标敲击乐器', '认识、了解和分辨声音和乐器的音色及发出各种声音。', '分辨至少2种声音和乐器的音色及发出至少3种声音。', '教师使用歌曲导入。', '聆听物品敲打时发出的声音，并辨别其音色。/n选一种物品作为敲击乐器，随着乐谱图标，敲打《小乐队》的节奏。', '教师要求学生概述今日所学。', NULL),
(105, '音乐', '单元十九 小乐队', '小乐队', '3.1 音乐创作', '3.1.1 发出各种声音。', '认识、了解和分辨声音和乐器的音色及发出各种声音。', '分辨至少2种声音和乐器的音色及发出至少3种声音。', '教师使用歌曲导入。', '聆听物品敲打时发出的声音，并辨别其音色。/n选一种物品作为敲击乐器，随着乐谱图标，敲打《小乐队》的节奏。', '教师要求学生概述今日所学。', NULL),
(106, '音乐', '单元十九 小乐队', '过山车', '1.1 音乐元素', '1.1.1 认识、了解和分辨高音和低音', '以准确的发音和音准唱歌及做动作。', '随着音乐，唱至少5句歌词。', '教师使用歌曲导入。', '跟随老师朗读歌词和学习唱歌。/n学生根据音调的高低做动作。', '教师要求学生概述今日所学。', NULL),
(107, '音乐', '单元十九 小乐队', '过山车', '2.1 唱歌', '2.1.1 以准确的发音唱歌/n2.1.2 以正确的音准唱歌', '以准确的发音和音准唱歌及做动作。', '随着音乐，唱至少5句歌词。', '教师使用歌曲导入。', '跟随老师朗读歌词和学习唱歌。/n学生根据音调的高低做动作。', '教师要求学生概述今日所学。', NULL),
(108, '音乐', '单元十九 小乐队', '过山车', '2.3 跟着音乐做动作', '2.3.1 根据歌词做动作', '以准确的发音和音准唱歌及做动作。', '随着音乐，唱至少5句歌词。', '教师使用歌曲导入。', '跟随老师朗读歌词和学习唱歌。/n学生根据音调的高低做动作。', '教师要求学生概述今日所学。', NULL),
(109, '音乐', '单元二十一 我的家庭', '我的家', '1.1 音乐元素', '1.1.3 认识、了解和分辨声音和乐器的音色', '以准确的发音和音准唱歌及认识、了解和分辨声音和乐器的音色。', '分辨至少2种声音和乐器的音色。', '教师使用歌曲导入。', '跟随老师朗读歌词和学习唱歌。/n男女两组一起合唱歌曲。', '教师要求学生概述今日所学。', NULL),
(110, '音乐', '单元二十一 我的家庭', '我的家', '2.1 唱歌', '2.1.1 以准确的发音唱歌/n2.1.2 以正确的音准唱歌', '以准确的发音和音准唱歌及认识、了解和分辨声音和乐器的音色。', '分辨至少2种声音和乐器的音色。', '教师使用歌曲导入。', '跟随老师朗读歌词和学习唱歌。/n男女两组一起合唱歌曲。', '教师要求学生概述今日所学。', NULL),
(111, '音乐', '单元二十一 我的家庭', '我的家', '1.1 音乐元素', '1.1.3 认识、了解和分辨声音和乐器的音色', '以准确的发音和音准唱歌及认识、了解和分辨声音和乐器的音色。', '分辨至少3种声音和乐器的音色。', '教师使用歌曲导入。', '跟随老师朗读歌词和学习唱歌。/n男女两组一起合唱歌曲。', '教师要求学生概述今日所学。', NULL),
(112, '音乐', '单元二十一 我的家庭', '我的家', '2.1 唱歌', '2.1.1 以准确的发音唱歌/n2.1.2 以正确的音准唱歌', '以准确的发音和音准唱歌及认识、了解和分辨声音和乐器的音色。', '分辨至少3种声音和乐器的音色。', '教师使用歌曲导入。', '跟随老师朗读歌词和学习唱歌。/n男女两组一起合唱歌曲。', '教师要求学生概述今日所学。', NULL),
(113, '音乐', '单元二十一 我的家庭', '好爸妈', '2.1 唱歌', '2.1.1 以准确的发音唱歌/n2.1.2 以正确的音准唱歌', '以准确的发音和音准唱歌。', '随着音乐，唱至少5句歌词。', '教师使用歌曲导入。', '跟随老师朗读歌词和学习唱歌。/n学生注意唱歌时的发音、节奏和音准。', '教师要求学生概述今日所学。', NULL),
(114, '音乐', '单元二十一 我的家庭', '好爸妈', '2.1 唱歌', '2.1.1 以准确的发音唱歌/n2.1.2 以正确的音准唱歌/n2.1.3 跟着拍子唱歌', '以准确的发音和音准唱歌。', '随着音乐，唱至少5句歌词。', '复习歌曲。', '学生注意唱歌时的发音、节奏和音准。/n学生根据所规定的速度演唱歌曲。', '教师要求学生概述今日所学。', NULL),
(115, '音乐', '单元二十一 我的家庭', '好爸妈', '2.2 敲击乐器', '2.2.1 跟着速度敲打乐器/n2.2.4 跟着乐谱图标敲击乐器', '根据所规定的速度敲击乐器。', '根据所规定的速度敲击至少2种乐器。', '复习歌曲。', '学生根据所规定的速度敲击乐器。/n学生根据所规定的速度一面唱歌，一面敲打乐器。', '教师要求学生概述今日所学。', NULL),
(116, '音乐', '5.0 音乐艺术课业（二）', '教师与学生根据课题内容策划与安排艺术课业', '5.1 音乐表演', '5.1.1 策划音乐表演/n5.1.3 在音乐活动中实践道德价值', '以道德价值来策划音乐表演。', '以2个道德价值来策划音乐表演。', '教师使用歌曲导入。', '教师与学生讨论适合的两首歌曲，然后将学生分成两组。/n分配好歌曲后，学生在各自的组别里讨论如何呈现表演。/n各组学生再把自己组员分成三个小组，分别为歌唱组、动作组和乐器组。/n各组决定想用的乐器并一起以图标创作节奏。', '教师要求学生概述今日所学。', NULL),
(117, '音乐', '5.0 音乐艺术课业（二）', '教师与学生根据课题内容策划与安排艺术课业 歌曲：各组可选任何一首单元十二至单元二十一的歌曲', '5.1 音乐表演', '5.1.2 呈献音乐表演/n5.1.3 在音乐活动中实践道德价值', '利用即兴物品发出各种声音来呈献音乐表演。', '利用即兴物品发出至少3种声音来呈献音乐表演。', '教师使用歌曲导入。', '学生分组完成表演。/n结束后，学生检讨自己的表演及说出需要改善之处。/n学生说出自己是否满意自己的表演。', '教师要求学生概述今日所学。', NULL),
(118, '音乐', '5.0 音乐艺术课业（二）', '教师与学生根据课题内容策划与安排艺术课业 歌曲：各组可选任何一首单元十二至单元二十一的歌曲', '3.1 音乐创作', '3.1.1 利用即兴物品发出各种声音', '利用即兴物品发出各种声音来呈献音乐表演。', '利用即兴物品发出至少3种声音来呈献音乐表演。', '教师使用歌曲导入。', '学生分组完成表演。/n结束后，学生检讨自己的表演及说出需要改善之处。/n学生说出自己是否满意自己的表演。', '教师要求学生概述今日所学。', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `process`
--

CREATE TABLE `process` (
  `id` int NOT NULL,
  `period_id` int NOT NULL,
  `sub` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tema` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `tajuk` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `kdg` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `cstd` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `op` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `kk` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `apm` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `au` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `apn` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `refleksi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `emk` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `nilai` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `abm` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `kb` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `peta` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `tsm` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `tahap` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `akt21` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `p21` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `praujian` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `pascaujian` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `6k` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `aspirasi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `inputRefleksi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `pbd` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `penggal` int NOT NULL DEFAULT '0',
  `minggu` int NOT NULL DEFAULT '0',
  `nameRefleksi` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `process`
--

INSERT INTO `process` (`id`, `period_id`, `sub`, `tema`, `tajuk`, `kdg`, `cstd`, `op`, `kk`, `apm`, `au`, `apn`, `refleksi`, `emk`, `nilai`, `abm`, `kb`, `peta`, `tsm`, `tahap`, `akt21`, `p21`, `praujian`, `pascaujian`, `6k`, `aspirasi`, `inputRefleksi`, `pbd`, `penggal`, `minggu`, `nameRefleksi`) VALUES
(128, 65, 'MATHEMATICS', '单元十三 传统音乐', '音乐鉴赏', '4.1 鉴赏音乐作品', '4.1.1 确认马来西亚传统音乐 i 音乐种类 ii 实践传统音乐的社群', '确认及运用马来西亚传统音乐。', '运用至少1种马来西亚传统音乐。', '教师使用歌曲导入。', '教师歌曲后与学生讨论所听到的音乐。 教师播放视频，然后与学生讨论视频的呈现方式和特点。 教师解说马来传统音乐Dikir Barat和其惯用的敲击乐器。 学生观赏其他视频并认出所用的乐器。', '教师要求学生概述今日所学。', '__位学生能够掌握技能。', '信息通讯技术', '根据资料解释', '光碟', '评价', '圆形图', '[\"_ 2 _ \\/ _ 39 __ \\u4f4d\\u5b66\\u751f 39\\u4e0d\\u80fd\\u638c \\u63e1\\u6280\\u80fd\\u5c06\\u989d\\u5916\\u8f85\\u5bfc\",\"_ 6 _ \\/ _ 40 __ \\u4f4d\\u5b66\\u80fd\\u591f\\u638c\\u63e1 \\u6280\\u80fd\\u5c06\\u7ed9\\u4e88\\u989d\\u5916\\u7684\\u5de9\\u56fa\\u7ec3\\u4e60\",\"_ 2 _ \\/ _ 15 __ \\u4f4d\\u5b66\\u80fd\\u591f\\u638c \\u63e1\\u6280\\u80fd\\u5c06\\u7ed9\\u4e88\\u989d\\u5916\\u9ad8\\u601d \\u7ef4\\u7684\\u7ec3\\u4e60\"]', 'TP2', 'Classification (Klasifikasi)', '技能/过程', '写作', '阅读', '批判性思维', '领导能力', '[\"653\"]', 'xcgzxdfgh', 34, 21, '__位学生能够掌握技能。'),
(129, 66, '华文', '5.0 音乐艺术课业（二）', '教师与学生根据课题内容策划与安排艺术课业', '5.1 音乐表演', '5.1.1 策划音乐表演 5.1.3 在音乐活动中实践道德价值', '以道德价值来策划音乐表演。', '以2个道德价值来策划音乐表演。', '教师使用歌曲导入。', '教师与学生讨论适合的两首歌曲，然后将学生分成两组。 分配好歌曲后，学生在各自的组别里讨论如何呈现表演。 各组学生再把自己组员分成三个小组，分别为歌唱组、动作组和乐器组。 各组决定想用的乐器并一起以图标创作节奏。', '教师要求学生概述今日所学。', '辅导组：__位学生能够在老师引导下掌握技能，__位同学课后跟进，并进行课后辅导。巩固组：__位学生能够掌握技能，__位同学课后跟进，并进行课后辅导。增广组：__位学生能够掌握技能，__位同学课后跟进，并进行课后辅导。', '信息通讯技术', '陈述故事', '光碟', '分析', '圆形图', '[\"_ 444444444444 _ \\/ _ 44444444 __ \\u4f4d\\u5b66\\u751f 44444444\\u4e0d\\u80fd\\u638c \\u63e1\\u6280\\u80fd\\u5c06\\u989d\\u5916\\u8f85\\u5bfc\",\"_ 444444444 _ \\/ _ 4444444444444 __ \\u4f4d\\u5b66\\u80fd\\u591f\\u638c\\u63e1 \\u6280\\u80fd\\u5c06\\u7ed9\\u4e88\\u989d\\u5916\\u7684\\u5de9\\u56fa\\u7ec3\\u4e60\",\"_ 44444444444 _ \\/ _ 4444444444 __ \\u4f4d\\u5b66\\u80fd\\u591f\\u638c \\u63e1\\u6280\\u80fd\\u5c06\\u7ed9\\u4e88\\u989d\\u5916\\u9ad8\\u601d \\u7ef4\\u7684\\u7ec3\\u4e60\"]', 'TP2', 'Cloze Procedures (Isikan tempat kosong)', '沟通', '阅读', '阅读', '批判性思维', '思考创新', '[\"6\",\"3\",\"55\",\"35\",\"3\",\"62\"]', 'xcgzxdfgh', 34, 21, '辅导组：__位学生能够在老师引导下掌握技能，__位同学课后跟进，并进行课后辅导。巩固组：__位学生能够掌握技能，__位同学课后跟进，并进行课后辅导。增广组：__位学生能够掌握技能，__位同学课后跟进，并进行课后辅导。'),
(130, 67, 'ENGLISH', '5.0 音乐艺术课业（二）', '教师与学生根据课题内容策划与安排艺术课业 歌曲：各组可选任何一首单元十二至单元二十一的歌曲', '3.1 音乐创作', '3.1.1 利用即兴物品发出各种声音', '利用即兴物品发出各种声音来呈献音乐表演。', '利用即兴物品发出至少3种声音来呈献音乐表演。', '教师使用歌曲导入。', '学生分组完成表演。结束后，学生检讨自己的表演及说出需要改善之处。学生说出自己是否满意自己的表演。', '教师要求学生概述今日所学。', '__位学生能够掌握技能。', '', '', '', '', '', '[\"_2 \\/ 39_ \\u4f4d\\u5b66\\u751f\\u4e0d\\u80fd\\u638c \\u63e1\\u6280\\u80fd\\u5c06\\u989d\\u5916\\u8f85\\u5bfc\", \"_6 \\/ 40_ \\u4f4d\\u5b66\\u80fd\\u591f\\u638c\\u63e1 \\u6280\\u80fd\\u5c06\\u7ed9\\u4e88\\u989d\\u5916\\u7684\\u5de9\\u56fa\\u7ec3\\u4e60\", \"_2 \\/15 _ \\u4f4d\\u5b66\\u80fd\\u591f\\u638c \\u63e1\\u6280\\u80fd\\u5c06\\u7ed9\\u4e88\\u989d\\u5916\\u9ad8\\u601d \\u7ef4\\u7684\\u7ec3\\u4e60\"]', '', '', '', '', '', '', '', '[\"333\"]', '', 1, 2, '__位学生能够掌握技能。'),
(131, 68, 'ENGLISH', '单元一 我的好朋友', '请你跟我这样做', '2.3 跟着音乐做动作', '2.3.3 根据节奏动一动', '根据节奏动一动。', '自创至少1种节奏。', '教师播放歌曲，学生聆听后演唱。', '老师念一念“请你跟我这样做”，学生根据节奏动一动。引导学生自创节奏。', '教师要求学生概述今日所学。', '__位学生能掌握技能，__位学生还需要教师的辅导。', '企业家元素', '问答比赛', '钢琴', '创造', '圆形图', '[\"_ 2 _ \\/ _ 39 __ \\u4f4d\\u5b66\\u751f 39\\u4e0d\\u80fd\\u638c \\u63e1\\u6280\\u80fd\\u5c06\\u989d\\u5916\\u8f85\\u5bfc\",\"_ 6 _ \\/ _ 40 __ \\u4f4d\\u5b66\\u80fd\\u591f\\u638c\\u63e1 \\u6280\\u80fd\\u5c06\\u7ed9\\u4e88\\u989d\\u5916\\u7684\\u5de9\\u56fa\\u7ec3\\u4e60\",\"_ 2 _ \\/ _ 15 __ \\u4f4d\\u5b66\\u80fd\\u591f\\u638c \\u63e1\\u6280\\u80fd\\u5c06\\u7ed9\\u4e88\\u989d\\u5916\\u9ad8\\u601d \\u7ef4\\u7684\\u7ec3\\u4e60\"]', 'TP1', 'Commercial (Iklan)', '沟通', '阅读', '表演', '沟通', '知识水平', '[\"4\",\"4\"]', 'll', 9, 8, '__位学生能掌握技能，__位学生还需要教师的辅导。'),
(132, 70, 'MATHEMATICS', '5.0 音乐艺术课业（二）', '教师与学生根据课题内容策划与安排艺术课业 歌曲：各组可选任何一首单元十二至单元二十一的歌曲', '5.1 音乐表演', '5.1.2 呈献音乐表演 5.1.3 在音乐活动中实践道德价值', '利用即兴物品发出各种声音来呈献音乐表演。', '利用即兴物品发出至少3种声音来呈献音乐表演。', '教师使用歌曲导入。', '学生分组完成表演。 结束后，学生检讨自己的表演及说出需要改善之处。 学生说出自己是否满意自己的表演。', '教师要求学生概述今日所学。', '__位学生能够掌握技能，__位学生课后跟进，__位学生缺席。', '企业家元素', '制作图案', '音乐影片', '评价', '气泡图', '[\"_ 555 _ \\/ _ 5555 __ \\u4f4d\\u5b66\\u751f 5555\\u4e0d\\u80fd\\u638c \\u63e1\\u6280\\u80fd\\u5c06\\u989d\\u5916\\u8f85\\u5bfc\",\"_ 555 _ \\/ _ 5555 __ \\u4f4d\\u5b66\\u80fd\\u591f\\u638c\\u63e1 \\u6280\\u80fd\\u5c06\\u7ed9\\u4e88\\u989d\\u5916\\u7684\\u5de9\\u56fa\\u7ec3\\u4e60\",\"_ 555 _ \\/ _ 5555 __ \\u4f4d\\u5b66\\u80fd\\u591f\\u638c \\u63e1\\u6280\\u80fd\\u5c06\\u7ed9\\u4e88\\u989d\\u5916\\u9ad8\\u601d \\u7ef4\\u7684\\u7ec3\\u4e60\"]', 'TP1', 'Classification (Klasifikasi)', '技能/过程', '阅读', '写作', '合作', '思考创新', '[\"3\",\"2\",\"1\"]', 'fdgfdgfd', 4, 7, '__位学生能够掌握技能，__位学生课后跟进，__位学生缺席。'),
(133, 71, 'ENGLISH', '5.0 音乐艺术课业（二）', '教师与学生根据课题内容策划与安排艺术课业 歌曲：各组可选任何一首单元十二至单元二十一的歌曲', '3.1 音乐创作', '3.1.1 利用即兴物品发出各种声音', '利用即兴物品发出各种声音来呈献音乐表演。', '利用即兴物品发出至少3种声音来呈献音乐表演。', '教师使用歌曲导入。', '学生分组完成表演。结束后，学生检讨自己的表演及说出需要改善之处。学生说出自己是否满意自己的表演。', '教师要求学生概述今日所学。', '__位学生能够掌握技能，__位学生课后跟进，__位学生缺席。', '', '', '', '', '', '[\"23\\/22\",\"11\\/11\",\"9\\/9\"]', '', '', '', '', '', '', '', '[\"5\",\"6\",\"1\"]', '', 11, 12, '__位学生能够掌握技能，__位学生课后跟进，__位学生缺席。'),
(134, 74, 'ENGLISH', '单元一 我的好朋友', '请你跟我这样做', '2.3 跟着音乐做动作', '2.3.3 根据节奏动一动', '根据节奏动一动。', '自创至少1种节奏。', '教师播放歌曲，学生聆听后演唱。', '老师念一念“请你跟我这样做”，学生根据节奏动一动。引导学生自创节奏。', '教师要求学生概述今日所学。', '__位学生能够掌握技能，__位学生课后跟进，__位学生缺席。', '', '', '', '', '', '[\"12\",\"13\",\"14\"]', '', '', '', '', '', '', '', '[\"5\",\"6\",\"7\"]', '', 8, 8, '__位学生能够掌握技能，__位学生课后跟进，__位学生缺席。'),
(135, 76, 'SCIENCE', '5.0 音乐艺术课业（二）', '教师与学生根据课题内容策划与安排艺术课业 歌曲：各组可选任何一首单元十二至单元二十一的歌曲', '3.1 音乐创作', '3.1.1 利用即兴物品发出各种声音', '利用即兴物品发出各种声音来呈献音乐表演。', '利用即兴物品发出至少3种声音来呈献音乐表演。', '教师使用歌曲导入。', '学生分组完成表演。 结束后，学生检讨自己的表演及说出需要改善之处。 学生说出自己是否满意自己的表演。', '教师要求学生概述今日所学。', '__位学生能够掌握技能，__位学生课后跟进，__位学生缺席。', '企业家元素', '作总结', '音乐影片', '应用', '流动图', '[\"_ 41 _ \\/ _ 1414 __ \\u4f4d\\u5b66\\u751f 1414\\u4e0d\\u80fd\\u638c \\u63e1\\u6280\\u80fd\\u5c06\\u989d\\u5916\\u8f85\\u5bfc\",\"_ 2 _ \\/ _ 245 __ \\u4f4d\\u5b66\\u80fd\\u591f\\u638c\\u63e1 \\u6280\\u80fd\\u5c06\\u7ed9\\u4e88\\u989d\\u5916\\u7684\\u5de9\\u56fa\\u7ec3\\u4e60\",\"_ 24 _ \\/ _ 242 __ \\u4f4d\\u5b66\\u80fd\\u591f\\u638c \\u63e1\\u6280\\u80fd\\u5c06\\u7ed9\\u4e88\\u989d\\u5916\\u9ad8\\u601d \\u7ef4\\u7684\\u7ec3\\u4e60\"]', 'TP2', 'Classification (Klasifikasi)', '以学生为中心', '阅读', '写作', '批判性思维', '双语能力', '[\"5\",\"4\",\"4\"]', 'fdgfdgfd', 34, 15, '__位学生能够掌握技能，__位学生课后跟进，__位学生缺席。'),
(136, 75, 'ENGLISH', '单元十七 小小创作家', '创作节奏真有趣', '3.1 音乐创作', '3.1.2 利用乐谱图标代替自创简单的节奏', '利用乐谱图标代替自创简单的节奏', '利用至少3个乐谱图标代替自创简单的节奏', '教师使用歌曲导入。', '跟随老师一面拍手，一面念节奏。跟着乐谱图标敲击乐器。学生自创节奏。', '教师要求学生概述今日所学。', '__位学生能够掌握技能，__位学生课后跟进，__位学生缺席。', '', '', '', '', '', '[\"_ 3 _ \\/ _ 4 __ \\u4f4d\\u5b66\\u751f 4\\u4e0d\\u80fd\\u638c \\u63e1\\u6280\\u80fd\\u5c06\\u989d\\u5916\\u8f85\\u5bfc\",\"_ 5 _ \\/ _ 6 __ \\u4f4d\\u5b66\\u80fd\\u591f\\u638c\\u63e1 \\u6280\\u80fd\\u5c06\\u7ed9\\u4e88\\u989d\\u5916\\u7684\\u5de9\\u56fa\\u7ec3\\u4e60\",\"_ 7 _ \\/ _ 8 __ \\u4f4d\\u5b66\\u80fd\\u591f\\u638c \\u63e1\\u6280\\u80fd\\u5c06\\u7ed9\\u4e88\\u989d\\u5916\\u9ad8\\u601d \\u7ef4\\u7684\\u7ec3\\u4e60\"]', '', '', '', '', '', '', '', '[\"4\",\"1\",\"8\"]', '', 2, 2, '__位学生能够掌握技能，__位学生课后跟进，__位学生缺席。'),
(137, 79, '音乐', '单元七 算一算', 'COUNTINGS FINGERS', '2.1.1 唱歌', '2.1.1 以准确的发音唱歌\n2.1.2 以正确的音准唱歌\n2.1.3 跟着拍子唱歌', '以准确的发音和音准唱歌。', '随着音乐，唱至少5句歌词。', '跟随老师朗读歌词。', '学生根据所规定的速度演唱和敲击乐器。\n教师以正确的音调唱出歌曲。\n学生根据音乐做动作。', '教师要求学生概述今日所学。', '__位学生能够掌握技能，__位学生课后跟进，__位学生缺席。', '创造与革新元素', '作总结', '演示文稿', '评价', '多倍流动图', '[\"_ 55 _ \\/ _ 45454 __ \\u4f4d\\u5b66\\u751f 45454\\u4e0d\\u80fd\\u638c \\u63e1\\u6280\\u80fd\\u5c06\\u989d\\u5916\\u8f85\\u5bfc\",\"_ 54 _ \\/ _ 4545 __ \\u4f4d\\u5b66\\u80fd\\u591f\\u638c\\u63e1 \\u6280\\u80fd\\u5c06\\u7ed9\\u4e88\\u989d\\u5916\\u7684\\u5de9\\u56fa\\u7ec3\\u4e60\",\"_ 45 _ \\/ _ 45454 __ \\u4f4d\\u5b66\\u80fd\\u591f\\u638c \\u63e1\\u6280\\u80fd\\u5c06\\u7ed9\\u4e88\\u989d\\u5916\\u9ad8\\u601d \\u7ef4\\u7684\\u7ec3\\u4e60\"]', 'TP5', 'Classification (Klasifikasi)', '技能/过程', '课业', '课业', '合作', '领导能力', '[\"22\",\"22\",\"22\"]', 'ngu xi', 5, 66, '__位学生能够掌握技能，__位学生课后跟进，__位学生缺席。'),
(138, 69, 'SCIENCE', '5.0 音乐艺术课业（一）', '教师与学生根据1-11课题内容策划与安排艺术课业', '5.1 音乐表演', '5.1.2 呈献音乐表演 5.1.3 在音乐活动中实践道德价值', '以道德价值来呈现音乐表演。', '以至少2种道德价值来策划音乐表演。', '教师使用歌曲导入。', '学生分组完成表演。结束后，学生检讨自己的表演及说出需要改善之处。学生说出自己是否满意自己的表演。', '教师要求学生概述今日所学。', '__位学生能够掌握技能。', '环境教育', '问答比赛', '键盘', '评价', '气泡图', '[\"_ 1 _ \\/ _ 33 __ \\u4f4d\\u5b66\\u751f 33\\u4e0d\\u80fd\\u638c \\u63e1\\u6280\\u80fd\\u5c06\\u989d\\u5916\\u8f85\\u5bfc\",\"_ 2 _ \\/ _ 3 __ \\u4f4d\\u5b66\\u80fd\\u591f\\u638c\\u63e1 \\u6280\\u80fd\\u5c06\\u7ed9\\u4e88\\u989d\\u5916\\u7684\\u5de9\\u56fa\\u7ec3\\u4e60\",\"_ 3 _ \\/ _ 3 __ \\u4f4d\\u5b66\\u80fd\\u591f\\u638c \\u63e1\\u6280\\u80fd\\u5c06\\u7ed9\\u4e88\\u989d\\u5916\\u9ad8\\u601d \\u7ef4\\u7684\\u7ec3\\u4e60\"]', 'TP1', 'Classification (Klasifikasi)', '社区学习', '表演', '表演', '沟通', '知识水平', '[\"1\"]', 'ff', 3, 3, '__位学生能够掌握技能。'),
(139, 80, 'test ', '单元三 新年到，真快乐', '请你跟我这样拍', '3.1 音乐创作', '3.1.2 利用乐谱图标代替自创简单的节奏', '模仿老师拍打乐谱图标的节奏。', '自创至少1种节奏，然后随着音乐，拍出自创的节奏。', '教师使用歌曲导入。', '引导学生模仿老师拍打乐谱图标的节奏。引导学生自创节奏，然后随着音乐，拍出自创的节奏。', '教师要求学生概述今日所学。', '__位学生能掌握技能，__位学生还需要教师的辅导。', '环境教育', '创造力', '音乐影片', '评价', '圆形图', '[\"_ 3 _ \\/ _ 3 __ \\u4f4d\\u5b66\\u751f 3\\u4e0d\\u80fd\\u638c \\u63e1\\u6280\\u80fd\\u5c06\\u989d\\u5916\\u8f85\\u5bfc\",\"_ 3 _ \\/ _ 3 __ \\u4f4d\\u5b66\\u80fd\\u591f\\u638c\\u63e1 \\u6280\\u80fd\\u5c06\\u7ed9\\u4e88\\u989d\\u5916\\u7684\\u5de9\\u56fa\\u7ec3\\u4e60\",\"_ 3 _ \\/ _ 3 __ \\u4f4d\\u5b66\\u80fd\\u591f\\u638c \\u63e1\\u6280\\u80fd\\u5c06\\u7ed9\\u4e88\\u989d\\u5916\\u9ad8\\u601d \\u7ef4\\u7684\\u7ec3\\u4e60\"]', 'TP1', '4', '生活技能', '表演', '表演', '沟通', '知识水平', '[\"2\",\"3\"]', 'rr', 3, 3, '__位学生能掌握技能，__位学生还需要教师的辅导。'),
(140, 85, 'ENGLISH', '5.0 音乐艺术课业（二）', '教师与学生根据课题内容策划与安排艺术课业 歌曲：各组可选任何一首单元十二至单元二十一的歌曲', '3.1 音乐创作', '3.1.1 利用即兴物品发出各种声音', '利用即兴物品发出各种声音来呈献音乐表演。', '利用即兴物品发出至少3种声音来呈献音乐表演。', '教师使用歌曲导入。', '学生分组完成表演。结束后，学生检讨自己的表演及说出需要改善之处。学生说出自己是否满意自己的表演。', '教师要求学生概述今日所学。', '__位学生达致教学目标。', '环境教育', '创造力', '钢琴', '评价', '双气泡图', '[\"_ 1 _ \\/ _ 4 __ \\u4f4d\\u5b66\\u751f 4\\u4e0d\\u80fd\\u638c \\u63e1\\u6280\\u80fd\\u5c06\\u989d\\u5916\\u8f85\\u5bfc\",\"_ 2 _ \\/ _ 5 __ \\u4f4d\\u5b66\\u80fd\\u591f\\u638c\\u63e1 \\u6280\\u80fd\\u5c06\\u7ed9\\u4e88\\u989d\\u5916\\u7684\\u5de9\\u56fa\\u7ec3\\u4e60\",\"_ 3 _ \\/ _ 6 __ \\u4f4d\\u5b66\\u80fd\\u591f\\u638c \\u63e1\\u6280\\u80fd\\u5c06\\u7ed9\\u4e88\\u989d\\u5916\\u9ad8\\u601d \\u7ef4\\u7684\\u7ec3\\u4e60\"]', 'TP2', 'Circle Time (Bulatan Masa)', '技能/过程', '写作', '阅读', '批判性思维', '国家认同', '[\"1\"]', 'jk', 2, 2, '__位学生达致教学目标。'),
(141, 84, 'SCIENCE', '单元一 我的好朋友', '好朋友，好同学', '2.1 唱歌\n2.2 敲击乐器', '2.1.1 以准确的发音唱歌\n2.1.2 以正确的音准唱歌\n2.2.4 跟着乐谱图标敲击乐器\n2.3.3 根据节奏动一动\n3.1.2 利用乐谱图标代替自创简单的节奏\n1.1.2 认识、了解和分辨强的力度和弱的力度\n1.1.3 认识、了解和分辨声音和乐器的音色\n2.1.3 跟着拍子唱歌\n2.2.2 根据乐曲的拍子演奏敲击乐器\n2.2.3 根据乐曲的旋律模式敲击乐器\n5.1.2 呈献音乐表演\n5.1.3 在音乐活动中实践道德价值\n4.1.1 确认马来西亚传统音乐 i 音乐种类 ii 实践传统音乐的社群\n2.2.1 跟着速度敲打乐器', '根据节奏动一动。', '自创至少1种节奏。\n自创至少1种节奏，然后随着音乐，拍出自创的节奏。\n聆听和辨别至少2种声音。', '教师播放歌曲，学生聆听后演唱。', '老师念一念“请你跟我这样做”，学生根据节奏动一动。\n引导学生自创节奏。', '教师要求学生概述今日所学。', '__位学生能够掌握技能。', '环境教育', '回答理解能力', '音乐符号挂图', '创造', '流动图', '[\"_ 25 _ \\/ _ 75757 __ \\u4f4d\\u5b66\\u751f 75757\\u4e0d\\u80fd\\u638c \\u63e1\\u6280\\u80fd\\u5c06\\u989d\\u5916\\u8f85\\u5bfc\",\"_ 55 _ \\/ _ 7575 __ \\u4f4d\\u5b66\\u80fd\\u591f\\u638c\\u63e1 \\u6280\\u80fd\\u5c06\\u7ed9\\u4e88\\u989d\\u5916\\u7684\\u5de9\\u56fa\\u7ec3\\u4e60\",\"_ 445 _ \\/ _ 5757 __ \\u4f4d\\u5b66\\u80fd\\u591f\\u638c \\u63e1\\u6280\\u80fd\\u5c06\\u7ed9\\u4e88\\u989d\\u5916\\u9ad8\\u601d \\u7ef4\\u7684\\u7ec3\\u4e60\"]', 'TP1', 'Circle Time (Bulatan Masa)', '沟通', '阅读', '阅读', '批判性思维', '知识水平', '[\"1\"]', 'jkgl', 5, 6, '__位学生能够掌握技能。');

-- --------------------------------------------------------

--
-- Table structure for table `refleksi`
--

CREATE TABLE `refleksi` (
  `id` int NOT NULL,
  `refleksi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sub` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `input` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `refleksi`
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
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int NOT NULL,
  `name` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `status`) VALUES
(2, 'BAHASA MELAYU', 2),
(3, 'ENGLISH', 1),
(4, 'SCIENCE', 1),
(5, 'MATHEMATICS', 1),
(6, '音乐', 1),
(7, 'MORAL', 1),
(8, '华文', 1),
(11, 'www', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tahap`
--

CREATE TABLE `tahap` (
  `id` int NOT NULL,
  `tahap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tahap`
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
-- Table structure for table `ujian`
--

CREATE TABLE `ujian` (
  `id` int NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ujian`
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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `hp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `credit` int NOT NULL,
  `status` int NOT NULL,
  `role` int NOT NULL DEFAULT '1' COMMENT '1: user , 2 admin',
  `token` int NOT NULL DEFAULT '365' COMMENT 'Number of registrations'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `password`, `hp`, `credit`, `status`, `role`, `token`) VALUES
(26, 'admin@gmail.com', '123', '$2y$10$HNp43l5C3zNU71PWnjBQA.mi9i96OFa1lFHJwGkUExpqB/mIgcCeK', '122222', 300, 1, 2, 365),
(27, '111@gmail.com', '111', '$2y$10$q6tJp8srfXBxAkrFLw38zObPEDYfzEgKz0rAwmyWBkS5n1DVHxY6W', '11111', 300, 1, 1, 365),
(28, 'giaphung2k1@gmail.com', 'giaphung2k1', '$2y$10$YohkyU9WJhWybPLUVFb0E.Y5/AUKv2sp5Y7A6PD1Zfwz.ee/aSQSu', '24324', 0, 1, 1, 359),
(29, 'www@gmail.com', 'www', '$2y$10$sCbbke.UQ.bzqWe3VHSvKu3wQluVFlldif1o2ciGB2kfy2w49Yap2', '123456789', 0, 1, 1, 362),
(30, 'naz@gmail.com', 'naz', '$2y$10$VRG8nCh8/329Jq./SD9EVOUQM.C9Fi4XdTBexC4tBf7gHARdSeOSi', '123456789', 365, 1, 1, 365),
(31, 'hh@gmail.com', 'hh', '$2y$10$Tf2OKrPnBN8D/dMK4.XAJ.5tMeVzOClf0XTvST3A2oU/pY0QZH876', '12345678', 300, 1, 1, 360),
(32, 'giaphung@gmail.com', 'giaphung', '$2y$10$ALZoGkkOhr.YORRNsI6m6.YT2pBlcmEk0f0XPpZvkACC74qm2wMSq', '32432', 32432, 1, 1, 365),
(33, 'dangxuong2000@gmail.com', 'dangxuong', '$2y$10$HNp43l5C3zNU71PWnjBQA.mi9i96OFa1lFHJwGkUExpqB/mIgcCeK', '0976594507', 0, 1, 1, 364),
(34, 'dangxuong98@gmail.com', 'hanhdth', '$2y$10$Zi6w13PBkcXizitlrz3Qsud.jbkx9lmGiMw/vNBNDiPGIeBq2zhsG', '0976594504', 3, 1, 1, 365),
(35, 'example@example.com', 'user1', '$2y$10$0X36S9YNLQTJ5YLAL/ao0.Q9KmtjXtwZkTGcO11VdlEg8jQ70UoQu', '976592649', 100, 1, 1, 365);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akt21`
--
ALTER TABLE `akt21`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apm`
--
ALTER TABLE `apm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apn`
--
ALTER TABLE `apn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aspirasi`
--
ALTER TABLE `aspirasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `au`
--
ALTER TABLE `au`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bbm`
--
ALTER TABLE `bbm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cstd`
--
ALTER TABLE `cstd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emk`
--
ALTER TABLE `emk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kdg`
--
ALTER TABLE `kdg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kemahiran`
--
ALTER TABLE `kemahiran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kk`
--
ALTER TABLE `kk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `op`
--
ALTER TABLE `op`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p21`
--
ALTER TABLE `p21`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemikiran`
--
ALTER TABLE `pemikiran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `period`
--
ALTER TABLE `period`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `peta`
--
ALTER TABLE `peta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `preset`
--
ALTER TABLE `preset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `process`
--
ALTER TABLE `process`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refleksi`
--
ALTER TABLE `refleksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tahap`
--
ALTER TABLE `tahap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akt21`
--
ALTER TABLE `akt21`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `apm`
--
ALTER TABLE `apm`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `apn`
--
ALTER TABLE `apn`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `aspirasi`
--
ALTER TABLE `aspirasi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `au`
--
ALTER TABLE `au`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `bbm`
--
ALTER TABLE `bbm`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cstd`
--
ALTER TABLE `cstd`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `emk`
--
ALTER TABLE `emk`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `kdg`
--
ALTER TABLE `kdg`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kemahiran`
--
ALTER TABLE `kemahiran`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kk`
--
ALTER TABLE `kk`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `op`
--
ALTER TABLE `op`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `p21`
--
ALTER TABLE `p21`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pemikiran`
--
ALTER TABLE `pemikiran`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `period`
--
ALTER TABLE `period`
  MODIFY `no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `peta`
--
ALTER TABLE `peta`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `preset`
--
ALTER TABLE `preset`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `process`
--
ALTER TABLE `process`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `refleksi`
--
ALTER TABLE `refleksi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tahap`
--
ALTER TABLE `tahap`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ujian`
--
ALTER TABLE `ujian`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
