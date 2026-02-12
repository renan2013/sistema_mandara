-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 12-02-2026 a las 22:13:38
-- Versión del servidor: 11.8.3-MariaDB-log
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u852886994_mandara`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `edad` date DEFAULT NULL,
  `mes` varchar(10) NOT NULL,
  `celular` varchar(40) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `observaciones` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombre`, `apellido`, `email`, `edad`, `mes`, `celular`, `direccion`, `observaciones`, `created_at`, `updated_at`) VALUES
(14, 'Marianela ', 'Zúñiga Schlotterhausen', 'marianella.zuniga@hotmail.com', '1977-11-24', '11', '88683701', 'El Castillo Heredia ', 'Microblanding cejas\r\nMicropigmentacion ojos\r\nDepilación cera ', '2023-12-13 18:14:03', '2023-12-20 21:54:20'),
(15, 'Jennina ', 'Sánchez Morera', 'ninamorera72@gmail.com', '1972-10-17', '10', '89199986', 'Santo domingo ', 'Tratamiento corporal anita ', '2023-12-13 20:51:50', '2023-12-20 21:54:05'),
(16, 'Maria José ', 'Abarca Sánchez ', 'majoabarca1@gmail.com', '2001-10-02', '10', '87305132', 'Santo domingo _New York ', 'Depilación ipl bk ax labio superior cera en piernas ', '2023-12-13 20:53:46', '2023-12-20 21:53:51'),
(17, 'Erika ', 'Cerdas Paninski', 'kika2911@hotmail.com', '1988-11-29', '11', '60092029', 'San Antonio de Belén ', 'Cliente Estrella ', '2023-12-14 19:42:27', '2023-12-20 21:53:20'),
(18, 'Yorllaneyla ', 'Elizondo ', 'Yorya79@hotmail.com', '1979-10-04', '10', '88348518', 'Moravia ', 'Cliente Estrella. ', '2023-12-15 14:28:05', '2023-12-20 21:53:01'),
(19, 'Carmen ', 'Villalobos Arias ', 'carmenvillarias@hotmail.com', '1959-01-21', '01', '83996485', 'El castillo Heredia ', 'Cliente Estrella. ', '2023-12-15 14:34:28', '2023-12-20 21:52:48'),
(22, 'Gabriela ', 'Fernández González ', 'gabygfdz29@gmail.com', '1993-06-29', '06', '86016637', 'Santa Ana ', 'Cliente dulce. ', '2023-12-16 16:19:33', '2023-12-20 21:52:16'),
(23, 'Karla Johanna ', 'Morera Méndez ', 'moreramendezjohanna@gmail.com', '1990-03-06', '03', '71910046', 'Moravia ', 'Exporadica. Depilación ', '2023-12-16 16:23:02', '2023-12-20 21:51:57'),
(24, 'Fabiola ', 'Olivares Soto ', 'fabi150899@gmail.com', '1999-08-15', '08', '87311978', 'San Pablo Heredia ', 'Frecuente depilación. ', '2023-12-16 16:25:58', '2023-12-20 21:51:39'),
(25, 'Cristina ', 'Mora Trejos ', 'mtrejos_86@hotmail.com', '1986-02-12', '02', '88797707', 'Puriscal', 'Cliente exporadica facial. ', '2023-12-16 16:28:36', '2023-12-20 21:51:22'),
(26, 'Kimberly', 'Bermudez Granja', 'kim.pame19@gmail.com', '1992-08-25', '08', '70078992', 'Desamparados ', 'Clienta regula depis\r\n', '2023-12-16 16:32:22', '2023-12-20 21:51:05'),
(27, 'Lilliana', 'León Feoli', 'lilyleon5@hotmail.com', '1965-05-29', '05', '88473402', 'Moravia ', 'Super regular mega especial ', '2023-12-16 16:49:29', '2023-12-20 21:50:46'),
(28, 'Wendy ', 'Esquive Villalobos ', 'wesquivel506@hotmail.com', '1984-01-12', '01', '84935445', 'San Isidro Heredia ', 'Clienta estrella. Muy regular.\r\n', '2023-12-16 19:15:40', '2023-12-20 21:50:24'),
(29, 'Aza ', 'Gómez Pérez ', 'azagomez@hotmail.com', '1984-04-03', '04', '61810228', 'La Garita Alajuela ', 'Una vez al año micro cejas. ', '2023-12-16 21:04:45', '2023-12-20 21:50:05'),
(30, 'Hannia ', 'Guevara Sequeira ', '', '1961-01-11', '01', '83030829', 'Tibás ', 'Una vez al año micro cejas. ', '2023-12-16 21:06:21', '2023-12-20 21:49:44'),
(32, 'Maritza ', 'Herra Vindas ', 'mherrav@gmail.com', '1956-02-20', '02', '83285818', 'Guadalupe ', 'Clienta una vez al año micro cejas.\r\n', '2023-12-18 17:30:39', '2023-12-20 21:49:18'),
(34, 'Mónica', 'Obando Pérez ', 'minicaiobando@yahoo.es', '1976-08-28', '08', '50761613749', 'Tibás ', 'Super clienta. Solo que dispersa y no vive en costa rica. ', '2023-12-18 18:51:45', '2023-12-20 21:48:56'),
(35, 'Ana Victoria ', 'Vega Obando ', 'avi.vega05@gamil.com', '2005-07-25', '07', '85361908', 'Tibás ', 'Bella y dulce\r\nClienta regular dispersa.\r\n', '2023-12-18 19:00:55', '2023-12-20 21:48:42'),
(36, 'María Nela ', 'Arauz Vargas. ', 'nelarauz57@gmail.com', '1957-01-09', '01', '86041551', 'Tibás ', 'Clienta estrella. ', '2023-12-19 00:24:58', '2023-12-20 21:48:25'),
(37, 'Karina ', 'Herrera González ', 'karina.herrera.gonzalez@gmail.com', '1986-08-12', '08', '88602247', 'San Pablo Heredia ', 'Dulce regular ', '2023-12-19 01:36:01', '2023-12-20 21:48:08'),
(38, 'Stephanie ', 'Arce ', 'stephaniepbubu@gmail.com', '1991-01-12', '01', '62512833', 'Tibás ', 'Bella Tefa. ', '2023-12-19 01:39:27', '2023-12-20 21:47:49'),
(39, 'Magdiela ', 'Camacho Ramírez ', 'magdielacr@gmail.com', '1973-11-13', '11', '89142317', 'San Isidro Heredia ', 'Super clienta. ', '2023-12-19 15:23:14', '2023-12-20 21:47:34'),
(40, 'Malaquias ', 'Monge Valverde ', 'elvallesa2@yahoo.com', '1970-03-18', '03', '83097508', 'San Pablo Heredia', 'Mi cliente favorito ', '2023-12-19 22:35:32', '2023-12-20 21:47:14'),
(41, 'Thelma', 'Guzmán Vargas ', 'thelmaguzmanvarg@gmail.com', '1947-06-02', '06', '88823933', 'Tibás ', 'Bella señora ', '2023-12-20 00:41:19', '2023-12-20 21:46:47'),
(42, 'Eliza ', 'Barrantes Oconitrillo', 'barranteseli@hotmail.com', '1984-12-04', '12', '89943010', 'San Joaquín Heredia ', 'Mi chica super especial. ', '2023-12-20 02:07:06', '2023-12-20 21:46:31'),
(43, 'Sofía ', 'Rojas Alpizar ', 'sofia.rojas@adnlosdelfines.com', '1974-12-23', '12', '89931984', 'San Isidro Heredia ', 'Super amiga clienta ', '2023-12-20 16:16:01', '2023-12-20 21:46:01'),
(47, 'Ignacio ', 'León Parra ', 'ignacioleon@icloud.com', '1972-08-25', '08', ' 88904879', 'Escazú ', 'Muy cliente, años de fidelidad. Super reservado. ', '2023-12-21 15:39:10', '2023-12-21 15:39:10'),
(48, 'Catherine', 'Castro Herrera ', 'Catherinecastroherrera@gmail.com', '1985-11-20', '11', '83384661', 'Tibás ', 'Mega super clienta ', '2023-12-21 16:20:07', '2023-12-21 16:20:07'),
(59, 'Natalia ', 'Oconitrillo Barrantes ', 'noconitrillo@centralturbodiesel.com', '1980-10-13', '10', '88848404', 'Santo Domingo Heredia ', '❤️⭐', '2024-01-16 22:48:35', '2024-01-16 22:48:35'),
(61, 'Melannie ', 'Soto Ortiz ', 'melanniesotto@gmail.com', '1997-07-29', '07', '86569803', 'San Miguel de Santo Domingo Heredia ', 'Es dulce he ingenua ', '2024-01-16 23:01:21', '2024-01-16 23:01:21'),
(63, 'Gerardín', 'De Loos', 'nanagercr@yahoo.com', '1978-08-08', '08', '83805571', 'Curridabat. ', 'Mi negra bella ', '2024-01-17 15:59:53', '2024-01-17 15:59:53'),
(67, 'Catalina ', 'Salas jenkins', 'cata1811@hotmail.com', '1978-11-18', '11', '88453116', 'Santo Domingo Heredia ', 'Hika de doña maría yenkins ', '2024-01-18 22:46:36', '2024-01-18 22:46:36'),
(68, 'Marlen ', 'Mesen Escobar', 'm.me1955@hotmail.com', '1955-08-19', '08', '89939812', 'Moravia ', '', '2024-01-19 18:01:35', '2024-01-19 18:01:35'),
(69, 'Marjorie', 'Bustos Lopez', 'cositakalatito@gmail.com', '1972-02-17', '02', '61324306', 'Uruca ', '', '2024-01-19 19:38:09', '2024-01-19 19:38:09'),
(70, 'Adriána ', 'Teran Valverde ', 'adriana.teran2211@gmail.com', '1977-01-22', '01', '89931336', 'San Isidro Heredia ', '', '2024-01-19 21:57:30', '2024-01-19 21:57:30'),
(71, 'Gilberto ', 'Cerdas Bustos ', 'gilbertoc@zerdasbustos.net', '1969-06-28', '06', '87075745', 'Heredia centro. Barrio Fátima ', '', '2024-01-20 17:02:12', '2024-01-20 17:02:12'),
(72, 'Carolina ', 'Rojas Alpizar ', 'carolayi@gmail.com', '1978-01-30', '01', '83734595', 'Curridabat ', '', '2024-01-20 18:43:58', '2024-01-20 18:43:58'),
(73, 'Laura ', 'Lizano Chávez ', 'lizanolau@yahooo.com', '1979-02-27', '02', '88624008', 'Heredia ', '', '2024-01-20 20:01:04', '2024-01-20 20:01:04'),
(74, 'Melany', 'Silva Campos ', 'melanys504@gmail.com', '2007-05-22', '05', '63033879', 'Heredia santo domingo ', '', '2024-01-20 20:23:34', '2024-01-20 20:23:34'),
(75, 'Hellen ', 'Campos Obregón ', 'hellenvco@gmail.com', '1986-10-24', '10', '61026874', 'Santo Domingo Heredia ', '', '2024-01-20 20:24:59', '2024-01-20 20:24:59'),
(76, 'Bryan ', 'Avalos Céspedes ', 'bryan.avalosc19@gmai.com', '1998-05-19', '05', '61888978', 'Zapote, San José ', '', '2024-01-20 22:13:13', '2024-01-20 22:13:13'),
(82, 'Kattia ', 'Trejos Ávila ', 'kattia.trejos@hotmail.com', '1995-02-02', '02', '84052243', 'Puriscal', '', '2024-01-24 15:22:17', '2024-01-24 15:22:17'),
(84, 'Sonia ', 'Vindas Delgado', 'vindas.sonia@yahoo.es', '1990-08-13', '08', '88283180', 'Parrita', '', '2024-01-26 00:52:51', '2024-01-26 00:52:51'),
(87, 'Ana Cristina ', 'Jiménez Pérez ', 'acristinajp@hotmail.com', '1985-07-07', '07', '60462969', 'Grecia ', 'Es un sol de persona. ', '2024-01-26 02:14:32', '2024-01-26 02:14:32'),
(88, 'Desireee', 'Valverde Soto', 'devalso@hotmail.com', '1977-01-06', '01', '88792430', 'Tibás ', '', '2024-01-26 02:28:44', '2024-01-26 02:28:44'),
(90, 'Paula ', 'Gómez Vaglio ', 'kipivaglio@hotmail.com', '1976-06-08', '06', '83160797', 'Tibás ', '', '2024-01-26 02:31:57', '2024-01-26 02:31:57'),
(91, 'Lilliana', 'Obaldia Marín ', 'liobaldia@gmail.com', '1956-03-05', '03', '88243076', 'Tibás ', '', '2024-01-26 17:02:30', '2024-01-26 17:02:30'),
(92, 'Stephanie ', 'Hernández Agüero ', 'stehernandez@gmail.com', '1983-09-25', '09', '87351194', 'Curridabat ', '', '2024-01-26 18:39:22', '2024-01-26 18:39:22'),
(108, 'Damaris', 'Jirón Bolaños ', 'jironbd@gmail.com', '1969-07-01', '07', '87351130', 'Tibás lloren te ', '', '2024-01-27 17:32:29', '2024-01-27 17:32:29'),
(122, 'Carloltita ', 'Alvarado Hernández ', 'carlotta1808@gmail.com', '1990-03-18', '3', '60232222', 'Tibás ', '', '2024-02-10 14:24:35', '2024-02-10 14:24:35'),
(123, 'Paola', 'Gómez Arias ', 'pgomezarias@gmail.com', '1978-08-01', '7', '89288383', 'Tibás ', '', '2024-02-10 16:41:42', '2024-02-10 16:41:42'),
(124, 'Hazel ', 'Soto Torres', 'hazsoto26@gmail.com', '1979-10-26', '10', '88555505', 'Parrita', '', '2024-02-10 16:44:40', '2024-02-10 17:37:44'),
(125, 'Paula', 'Umaña Arias ', 'pau.andrea0690@gmail.com', '1990-06-06', '6', '87127009', 'Alajuela ', '', '2024-02-10 16:46:11', '2024-02-10 16:46:11'),
(126, 'Elizabeth ', 'Valverde Vargas ', 'eluzavalverde2454@outlook.es', '1954-02-02', '2', '83900407', 'San Ramón ', '', '2024-02-10 16:51:09', '2024-02-10 16:51:09'),
(127, 'Angélica ', 'Fernández Vargas ', 'ikfernandezvar@gmail.com', '1992-12-07', '12', '60121992', 'Sabana, nunciatura ', '', '2024-02-10 16:54:41', '2024-02-10 16:54:41'),
(128, 'Isabel', 'Murillo Barrantes ', 'isacristinamurillo@gmail.com', '1995-01-11', '1', '83025570', 'Heredia ', '', '2024-02-10 16:57:29', '2024-02-10 16:57:29'),
(129, 'Yorleny ', 'Sandi Vizcaino', 'yorle.chunin10@gmail.com', '2024-10-10', '10', '88607172', 'Tibás ', '', '2024-02-10 17:00:50', '2024-02-10 17:00:50'),
(130, 'Erika', 'Elizondo ', 'eehlacr@gmail.com', '2024-09-28', '9', '88270222', 'Escazú ', '', '2024-02-10 17:04:29', '2024-02-10 17:04:29'),
(131, 'Dyala ', 'Orozco', 'waraya03@gmail.com', '2024-08-21', '8', '86177777', 'Guanacaste, carrillo ', '', '2024-02-10 17:05:45', '2024-02-10 17:05:45'),
(132, 'Priscilla', 'Guillen Jiménez ', 'pguillen77@gmail.com', '1977-09-18', '9', '88158131', 'Cartago', '', '2024-02-10 17:08:41', '2024-02-10 17:08:41'),
(133, 'Mercedes ', 'Jiménez Solano', '', '1955-09-24', '9', '', 'Cartago ', 'Mamá de Pri Guillen ', '2024-02-10 17:10:18', '2024-02-10 17:10:18'),
(134, 'María José ', 'Méndez Brich ', 'mariajom9@gmail.com', '1992-12-09', '12', '88932600', 'Heredia ', '', '2024-02-10 17:12:05', '2024-02-10 17:12:05'),
(135, 'Ana', 'Brich Mesegue', 'anabrchm@gmail.com', '1961-08-27', '8', '88696097', 'Heredia ', '', '2024-02-10 17:13:42', '2024-02-10 17:13:42'),
(136, 'Christian ', 'Chávez Barquero ', 'christian.chavezbarquero1@gmail.com', '1976-04-27', '4', '88778821', 'Moravia ', '', '2024-02-10 17:15:31', '2024-02-10 17:15:31'),
(137, 'Marianela ', 'Montero Cascante', 'nelamc84@gmail.com', '1984-03-09', '3', '88480380', 'Coronado', '', '2024-02-10 17:16:59', '2024-02-10 17:16:59'),
(138, 'Nicole ', 'Alvarado Rivera', 'nicolealvarado2110@gmail.com', '1997-12-09', '12', '89376904', 'Heredia ', '', '2024-02-10 17:19:44', '2024-02-10 17:19:44'),
(139, 'Gina', 'Ortiz Calderón ', 'gina_goc@outlook.com', '1971-02-23', '2', '89961179', 'Moravia ', '', '2024-02-10 17:22:40', '2024-02-10 17:22:40'),
(140, 'Gabriela ', 'Corrales Vega ', 'gcorrales@carpacr.com', '1975-02-02', '2', '61708220', 'Heredia ', '', '2024-02-10 17:25:39', '2024-02-10 17:25:39'),
(141, 'Liliana', 'Rodriguez Soto', 'lillyrodriguez0107@gmail.com', '1956-07-01', '6', '61485952', 'Moravia ', '', '2024-02-10 17:28:27', '2024-02-10 17:28:27'),
(142, 'Shirley ', 'Fernández Sánchez ', 'shirley.fernandez.sanchez@gmail.com', '1960-09-12', '9', '83430539', 'Hatillo ', '', '2024-02-10 17:30:28', '2024-02-10 17:30:28'),
(143, 'Gaudy ', 'Rivera González ', 'gaudyrivera@hotmail.com', '1977-03-11', '3', '87225422', 'Heredia ', '', '2024-02-10 17:33:46', '2024-02-10 17:33:46'),
(144, 'Cristina', 'Oconitrillo Barrantes ', 'ltdcob@gmail.com', '1979-11-07', '11', '89980678', 'Santo domingo Heredia ', '', '2024-02-10 18:09:12', '2024-02-10 18:09:12'),
(145, 'Christopher ', 'Kraemer', 'christopherkraemer@hotmail.com', '1986-02-25', '2', '89953131', 'Tibás', '', '2024-02-10 18:53:20', '2024-02-10 18:53:20'),
(146, 'Maria Teresa ', 'Rodriguez Chavarria ', 'mariarodri96@gmail.com', '1992-07-30', '7', '88465017', 'Santo domingo Heredia ', '', '2024-02-10 19:02:28', '2024-02-10 19:02:28'),
(147, 'Tasha', 'Edwards Mattus ', 'tasha.edwards06@gmail.com', '1977-03-06', '3', '83502860', 'Barrio México ', '', '2024-02-10 19:18:32', '2024-02-10 19:18:32'),
(149, 'Cinthia ', 'Ramírez Ángulo ', 'cinthyaa13@live.com', '1982-08-13', '8', '83119141', 'Heredia ', '', '2024-02-12 23:37:27', '2024-02-12 23:37:27'),
(150, 'Ivónne ', 'Mora Zamora ', 'mora_i2@hotmail.com', '1976-09-20', '9', '89930069', 'Tibás ', '', '2024-02-12 23:38:59', '2024-02-12 23:38:59'),
(151, 'Yendri ', 'Berrocal', '', '0000-00-00', '', '', '', '', '2024-02-13 17:03:07', '2024-02-13 17:03:07'),
(153, 'Cecilia ', 'Soto Bogantes ', 'cecysotobigantes@gmail.com', '1946-07-04', '7', '89323539', 'Tibás ', '', '2024-02-15 15:22:47', '2024-02-15 15:22:47'),
(154, 'Heidy', 'Acosta Lazo ', 'heidy_acosta@yahoo.com', '1989-09-30', '9', '87065664', 'Tibás ', '', '2024-02-15 15:24:52', '2024-02-15 15:24:52'),
(155, 'Silinia', 'Rodriguez Obando ', 'patri9083@gmail.com', '1971-01-24', '1', '89514728', 'Tibás ', '', '2024-02-15 15:26:34', '2024-02-15 15:26:34'),
(156, 'Marieta ', 'Ceciliano Murillo ', 'marietacm@gmail.com', '1984-04-16', '4', '88940574', 'Grecia ', '', '2024-02-15 15:27:40', '2024-02-15 15:27:40'),
(157, 'Yendri', 'Berrocal Bogantes ', 'yendrisbb@gmail.com', '1998-11-02', '11', '72197043', 'Tibás ', '', '2024-02-16 01:24:01', '2024-02-16 01:24:01'),
(159, 'Carolina ', 'Arguedas ', 'c.arguedas@outlook.es', '1991-04-04', '4', '', '', '', '2024-04-01 20:57:43', '2024-04-01 20:57:43'),
(160, 'Michael ', 'Marín ', 'maikurf@gmail.com', '1986-05-18', '5', '62319799', '', '', '2024-04-01 20:58:40', '2024-04-01 20:58:40'),
(161, 'Patsy ', 'Mora Retana ', 'patsymoraretana@yohoo.es', '1971-06-14', '6', '87034583', 'Pavas ', '', '2024-04-08 14:44:34', '2024-04-08 14:44:34'),
(162, 'Marcela ', 'Aimerich Rodríguez ', 'roayma@hotmail.com', '1979-12-15', '12', '88349962', 'Curridabat ', '', '2024-04-08 15:16:26', '2024-04-08 15:16:26'),
(163, 'Roberto ', 'Dixon Ballestero ', 'rocasticr@yahoo.com', '1965-10-02', '10', '88325671', 'Torres del  paseo Colón ', '', '2024-04-08 15:27:03', '2024-04-08 15:27:03'),
(164, 'Vanessa ', 'Hernández Arce. ', 'vaneh0625@gmail.com', '2004-12-06', '12', '85102555', 'Moravia ', '', '2024-04-08 23:43:01', '2024-04-08 23:43:01'),
(165, 'Katia ', 'Araya ', 'k.araya@uniformesks.com', '1973-09-09', '9', '83098904', 'Uruca ', '', '2024-04-08 23:49:31', '2024-04-08 23:49:31'),
(166, 'Any ', 'Madrigal Escoto ', 'anymadrgal22@gmail.com', '1990-04-22', '4', '89240453', 'Guápiles ', '', '2024-04-20 19:50:22', '2024-04-20 19:50:22'),
(170, 'Daniela ', 'Solano Rodríguez ', 'dsolano1890@gmail.com', '1990-01-18', '1', '88325658', 'Heredia ', '', '2024-07-22 17:39:38', '2024-07-22 17:39:38'),
(171, 'Alexandra ', 'Rodriguez BARQUERO ', 'alerodriguezb@hitmail.com', '1963-07-22', '7', '88325713', 'Tibás ', '', '2024-07-22 17:41:00', '2024-07-22 17:41:00'),
(172, 'Gabriel ', 'Villavicencio Herrera ', 'gabovihe@gmail.com', '1986-10-10', '10', '83379836', 'Tibás ', '', '2024-08-07 18:31:45', '2024-08-07 18:31:45'),
(173, 'Melissa', 'Salazar Granera ', 'meligranera@gmail.com', '1882-05-16', '5', '88805273', 'Tibás ', '', '2024-08-07 18:33:56', '2024-08-07 18:33:56'),
(174, 'Omar ', 'Guzmán Castro ', 'omarg_1781@hotmail.com', '1981-11-17', '11', '86399880', 'Tibás ', '', '2024-08-14 12:56:34', '2024-08-14 12:56:34'),
(175, 'Max ', 'Valverde Soto ', 'dmco@me.com', '1973-01-19', '1', '88340430', 'Tibás', '', '2024-08-14 23:11:54', '2024-08-14 23:11:54'),
(178, 'Laura ', 'Ortega Abarca ', 'lau07cr@yahoo.com', '1983-02-07', '2', '83154562', 'Tibás ', '', '2024-09-14 18:10:32', '2024-09-14 18:10:32'),
(179, 'Yarini', 'Madrigal Escoto ', 'yarini23@hotmail.es', '1987-03-23', '3', '87875600', 'Heredia ', '', '2024-10-02 16:32:49', '2024-10-02 16:32:49'),
(180, 'Naza', 'Carranza Alvarado ', 'nazacarranza@gmail.hotmail.com', '1989-03-21', '3', '89259696', 'Heredia ', '', '2024-10-07 23:48:54', '2024-10-07 23:48:54'),
(181, 'Marcela ', 'Ureña Vargas ', 'marceure@gmail.com', '1986-03-22', '3', '87185277', 'Heredia ', '', '2024-10-08 00:13:00', '2024-10-08 00:13:00'),
(182, 'Edwin', 'Olaya Torres ', 'olaya-85@hotmail.com', '1985-01-21', '1', '88463706', 'Guadalupe', '', '2024-10-08 21:08:54', '2024-10-08 21:08:54'),
(183, 'Julie', 'Arrieta Favez', 'julieaaf@gmail.com', '1971-11-18', '11', '83412051', 'Tibás', '', '2024-10-09 00:09:36', '2024-10-09 00:09:36'),
(184, 'María Eugenia ', 'Jenkins Alvarado ', 'marucr88@yahoo.com', '1952-08-08', '8', '83955314', 'Tibás ', '', '2024-10-10 00:25:55', '2024-10-10 00:25:55'),
(185, 'Pamela ', 'Hernández Arias. ', 'karlapa_12@hotmail.com', '1988-12-05', '12', '84964190', 'Heredia ', '', '2024-10-12 18:16:42', '2024-10-12 18:16:42'),
(186, 'Adriána ', 'Amaya Soto ', 'daviviendacr@gmail.com', '1975-06-12', '6', '87069160', 'Belén Heredia ', '\r\n', '2024-10-12 19:49:27', '2024-10-12 19:49:27'),
(187, 'Vivíana ', 'Amaya Soto ', 'grupoamaya.vibiana@gmail.com', '1975-06-12', '6', '83071025', 'Belén Heredia ', '', '2024-10-12 21:24:40', '2024-10-12 21:24:40'),
(188, 'Naty ', 'Amaya Soto ', 'nasamaya43@gmail.com', '1978-02-19', '2', '88896274', 'Belén Heredia ', '', '2024-10-12 22:49:29', '2024-10-12 22:49:29'),
(190, 'Gricelda ', 'Sibaja Álvarez ', 'griselda.sibaja@gmail.com', '1955-05-13', '5', '88850603', 'Tibás', '', '2024-10-22 23:50:09', '2024-10-22 23:50:09'),
(191, 'Ivania ', 'Jiménez Badilla ', 'draivanniajimenez@gmail.com', '1972-06-30', '6', '83029635', 'Heredia ', '', '2024-10-22 23:58:18', '2024-10-22 23:58:18'),
(192, 'Kristy', 'Quesada Gómez ', 'kriquesada@yahoo.com', '1980-10-09', '10', '83486176', 'Heredia ', '', '2024-10-23 00:38:58', '2024-10-23 00:38:58'),
(193, 'Gladys ', 'Rivas Olivares ', 'gladysrivasolivares@gmail.com', '1964-06-30', '6', '88149237', 'Très ríos ', '', '2024-10-23 00:42:00', '2024-10-23 00:42:00'),
(194, 'Antonieta ', 'Vargas Méndez ', 'manto904@hotmail.com', '1990-04-04', '4', '88937648', 'Pérez Zeledon ', '', '2024-10-23 00:46:10', '2024-10-23 00:46:10'),
(195, 'Ariani', 'Sandino Quiroz', 'ariani100700@hotmail.com', '1997-10-15', '10', '86231777', 'Tibás', '', '2024-10-23 00:50:44', '2024-10-23 00:50:44'),
(196, 'Sandra ', 'Guzmán', 'sandra5353@gmail.com', '1944-11-17', '11', '83247644', 'Tibás ', '', '2024-10-23 01:07:53', '2024-10-23 01:07:53'),
(197, 'Casilda', 'Sancho Barrantes ', 'casildasancho16@yahoo.com', '1945-06-16', '6', '88744093', 'San Carlos ', '', '2024-10-23 01:15:36', '2024-10-23 01:15:36'),
(198, 'Mónica ', 'Arguedas Leon ', 'dra.monica.arguedas@gamil.com', '1992-12-11', '12', '70135664', 'Moravia ', '', '2024-10-24 00:44:57', '2024-10-24 00:44:57'),
(199, 'Marcela ', 'Soto Jiménez ', 'marcesoto81@yohoo.com', '1981-02-09', '2', '84850707', 'Heredia ', '', '2024-10-24 16:22:38', '2024-10-24 16:22:38'),
(200, 'Katherine ', 'Gamboa Padilla ', 'kgpadilla27@gmail.com', '1979-11-27', '11', '89978887', 'Tibás ', '', '2024-10-24 17:19:03', '2024-10-24 17:19:03'),
(201, 'Yazmin ', 'Hernández Leal', 'jazhl_23@hotmail.com', '1986-04-23', '4', '88154075', 'Tibás ', '', '2024-10-25 15:52:27', '2024-10-25 15:52:27'),
(202, 'Amelita ', 'Solano Rojas', 'chelonie12@hotmail.com', '1962-02-23', '2', '83715354', 'Tibas', '', '2024-10-25 18:55:46', '2024-10-25 18:55:46'),
(203, 'Ivette', 'Enríquez Guevara ', 'ivettenriquez@gmail.com', '1967-06-07', '6', '88644134', 'Tibás ', '', '2024-10-25 18:57:33', '2024-10-25 18:57:33'),
(204, 'Marta', 'Vega Valderrama ', 'martha.vega214@gmail.com', '1972-01-02', '1', '88539066', 'Escazú ', '', '2024-10-25 18:58:58', '2024-10-25 18:58:58'),
(205, 'Cynthia ', 'Barrantes Gamboa ', 'cynthia.barrantes@gmail.com', '1980-09-08', '9', '88652702', 'Puriscal ', '', '2024-10-25 22:27:54', '2024-10-25 22:27:54'),
(206, 'Rebeca', 'Rodriguez Núñez ', 'reronu@gmail.com', '1979-09-28', '9', '86065417', 'Heredia ', '', '2024-10-31 00:51:09', '2024-10-31 00:51:09'),
(207, 'Elizabeth ', 'Ruiz Mora ', 'eliru.payasita@hotmail.com', '1985-10-02', '10', '84216833', 'Guápiles ', '', '2024-11-01 04:04:28', '2024-11-01 04:04:28'),
(208, 'Laura', 'López barquero ', 'laubarquero@hotmail.com', '1978-10-19', '10', '8813998', 'Barrio socorro ', '', '2024-11-01 22:36:20', '2024-11-01 22:36:20'),
(209, 'Evelin ', 'Zúñiga ', 'evezusan@gmail.com', '1977-04-15', '4', '85707600', 'Tibás ', '', '2024-11-01 23:01:47', '2024-11-01 23:01:47'),
(210, 'Xinita ', 'Alvarado Mora ', 'xinia.alvarado@gmail.com', '1976-01-03', '1', '88255221', 'Coronado ', '', '2024-11-01 23:05:20', '2024-11-01 23:05:20'),
(212, 'Laura ', 'Jara Morua ', 'ljmorua@gmail.com', '1978-07-06', '7', '88816138', 'Desamparados ', '', '2025-01-12 01:03:54', '2025-01-12 01:03:54'),
(213, 'Cécilia ', 'Alfaro Barrantes ', '', '1951-12-04', '12', '88930821', 'Tibás ', '', '2025-01-12 01:28:22', '2025-01-12 01:28:22'),
(214, 'Valeriana ', 'Arias Canet', 'valecanet22@gmail.com', '2005-11-22', '11', '88616357', 'Tibás', '', '2025-01-12 01:29:45', '2025-01-12 01:29:45'),
(215, 'Mandara Estética', '', '', '0000-00-00', '', '', '', '', '2025-01-18 03:02:31', '2025-01-18 03:02:31'),
(216, 'Elsy ', 'López Casallas ', 'gelc_jwe@hotmail.com', '1976-02-05', '2', '84995455', 'Heredia ', '', '2025-01-18 23:04:41', '2025-01-18 23:04:41'),
(217, 'Marvin ', 'Morales Miranda ', 'disemacomercial@yohoo.com', '1968-02-09', '2', '61351729', 'Tibás.', '', '2025-01-28 21:15:20', '2025-01-28 21:15:20'),
(218, 'Andrea ', 'Sánchez Gutiérrez ', 'asg-16-2@hotmail.com', '1987-02-16', '2', '61635448', 'Santo domingo Heredia ', '', '2025-02-13 00:26:58', '2025-02-13 00:26:58'),
(219, 'Ana Lucía ', 'Barahona Castillo ', 'arq.anacastillob@gmail.com', '1967-01-19', '1', '87011355', 'Moravia ', '', '2025-02-28 20:58:16', '2025-02-28 20:58:16'),
(223, 'Celnia ', 'Caldera Hernandez', 'celniacaldera86@hotmail.com', '1986-01-29', '1', '63323210', 'Heredia santo domingo ', 'Dimex 155830716500', '2025-04-03 23:32:32', '2025-04-03 23:32:32'),
(224, 'Vanessa ', 'Hernández Arce ', 'vanh0625@gmail.com', '2004-12-06', '12', '85102555', 'Moravia ', '', '2025-05-16 21:31:08', '2025-05-16 21:31:08'),
(225, 'Sharn ', 'Montenegro Hernández ', 'shar1222@hotmail.com', '1989-03-12', '3', '83428581', 'Moravia ', '', '2025-05-16 21:46:12', '2025-05-16 21:46:12'),
(226, 'Mariana ', 'Cerdas Paninski', 'marianacerdas@hotmail.com', '1984-03-16', '3', '64283920', 'Moravia', '', '2025-05-16 21:56:53', '2025-05-16 21:56:53'),
(227, 'Hellen ', 'Bloisse Torres ', 'hbloise@bloiseyasociados.com', '1971-06-30', '6', '88731939', 'Cartago', '', '2025-05-16 22:05:19', '2025-05-16 22:05:19'),
(228, 'Fiorella', 'Porras Pizarro', 'fio_porras@icliud.com', '1992-02-07', '2', '83139897', 'Heredia ', '', '2025-05-16 22:12:41', '2025-05-16 22:12:41'),
(229, 'Gabriela ', 'Cambronero Fernández ', '', '1980-12-31', '12', '88482221', 'Guapiles', '', '2025-05-16 22:16:06', '2025-05-16 22:16:06'),
(230, 'Roxana ', 'Trevisano', 'faxyrx7@aol', '1957-08-14', '8', '', 'Jaco', '', '2025-05-16 22:22:24', '2025-05-16 22:22:24'),
(231, 'Irma', 'Guerrero', '', '1938-08-17', '8', '22632245', 'Heredia ', '', '2025-05-16 22:23:22', '2025-05-16 22:23:22'),
(232, 'Heidy', 'Georgia ', '', '0000-00-00', '', '', 'Heredia ciudad cariari ', '', '2025-05-17 01:22:48', '2025-05-17 01:22:48'),
(233, 'Yajania ', 'Barrantes Vargas ', 'taylin10@gmail.com', '1989-11-29', '11', '83357847', 'Guapiles ', '', '2025-05-17 01:27:15', '2025-05-17 01:27:15'),
(234, 'Selenia ', 'Barrantes Torres ', 'selenia.b76@gmail.com', '1976-12-02', '12', '83179304', 'Cartago', '', '2025-05-17 01:33:00', '2025-05-17 01:33:00'),
(235, 'Josselyn ', 'Hernández Gamboa ', 'josyhg_02@hotmail.com', '1999-05-02', '5', '86526912', 'Tibas ', '', '2025-05-17 01:42:26', '2025-05-17 01:42:26'),
(236, 'Valeria ', 'Arias Canet ', 'valecanet22@gmail.com', '2025-11-22', '11', '88616357', 'Moravia ', '', '2025-05-17 02:03:00', '2025-05-17 02:03:00'),
(237, 'Shirlene ', 'Santillan Agilar', 'shirlenesantillan@gmail.com', '1979-07-17', '7', '71465442', 'San pedro ', '', '2025-05-17 21:56:06', '2025-05-17 21:56:06'),
(238, 'Estefania ', 'Ramirez Lara ', 'nival9420@gmail.com', '1994-02-22', '2', '62141505', 'Tibas', '', '2025-05-17 22:01:20', '2025-05-17 22:01:20'),
(240, 'Mariana ', 'Agüero González ', 'maguero25@hotmail.com', '1992-04-25', '4', '83309584', 'Tibas', '', '2025-05-17 23:48:46', '2025-05-17 23:48:46'),
(241, 'Franciny ', 'Montero Peñaranda ', 'fmontero13@gmail.com', '1983-07-13', '7', '87056920', 'Heredia ', '', '2025-05-18 00:11:59', '2025-05-18 00:11:59'),
(242, 'Yeni', 'Arce Herrera', 'jenny.arce06@gmail.com', '1977-11-02', '11', '87100715', 'Moravia ', '', '2025-05-18 00:13:12', '2025-05-18 00:13:12'),
(243, 'Evelin', 'Quintero Guzmán ', 'evy1227@hotmail.com', '1982-03-27', '3', '71025376', 'Cartago', '', '2025-05-18 00:26:58', '2025-05-18 00:26:58'),
(244, 'Michelle ', 'Bolaños Kiefer ', 'michelleboki@hotmail.com', '1974-06-15', '6', '83160101', 'Moravia ', '', '2025-05-18 15:57:26', '2025-05-18 15:57:26'),
(245, 'German ', 'Volio Castillo ', 'gvokioc9227@gmail.com', '1970-10-11', '10', '', 'Moravia ', '', '2025-05-18 15:58:22', '2025-05-18 15:58:22'),
(246, 'Sandra ', 'González ', '', '0000-00-00', '', '+971555971540', 'Portugal ', '', '2025-05-18 16:15:17', '2025-05-18 16:15:17'),
(247, 'Jorge ', 'Umaña Alvarado ', '', '0000-00-00', '', '88813877', 'Santo Domingo Heredia ', '', '2025-05-18 16:53:08', '2025-05-18 16:53:08'),
(248, 'Macarena ', 'Sharpe Benítez ', 'macarenasharpe@gmail.com', '1981-03-18', '3', '83190362', 'San pedro', '', '2025-05-18 18:06:33', '2025-05-18 18:06:33'),
(249, 'Mariam', 'Zeledon Oviedo', 'mariamz1@yahoo.com', '2025-08-01', '7', '88118265', 'Heredia ', '', '2025-05-18 18:15:39', '2025-05-18 18:15:39'),
(251, 'Sofia ', 'Salas Viquez ', 'sofiasalasv@gmail.com', '1989-06-28', '6', '88282275', 'Heredia ', '', '2025-05-18 18:45:24', '2025-05-18 18:45:24'),
(252, 'Daniel ', 'Castillo Granados', 'dacastil92@gmail.com', '1992-04-28', '4', '83480372', 'Heredia ', '', '2025-05-18 18:46:33', '2025-05-18 18:46:33'),
(254, 'Alfonso ', 'Montero Cascante', 'alfonsomcm87@hotmail.com', '1987-09-21', '9', '87032972', 'Coronado', '', '2025-05-18 22:24:20', '2025-05-18 22:24:20'),
(255, 'Karina ', 'Badilla Martinez', 'karikaki22@hotmail.com', '1985-01-31', '1', '86512290', 'Perez Zeledon ', '', '2025-05-19 01:04:49', '2025-05-19 01:04:49'),
(256, 'Marjorie', 'Espinoza Matarrita', 'nazayoss40@gmail.com', '1974-01-02', '1', '88143608', 'Tibas ', '', '2025-05-19 01:06:11', '2025-05-19 01:06:11'),
(257, 'Nela ', 'Zeledon Bolaños ', '', '0000-00-00', '', '87070727', 'Belen Heredia ', '', '2025-05-19 01:37:29', '2025-05-19 01:37:29'),
(258, 'Stella ', 'Peralta Cortez', 'peralta.stella@gmail.com', '1975-04-13', '4', '72873708', 'San pedro ', '', '2025-05-19 01:42:42', '2025-05-19 01:42:42'),
(259, 'Maria Jose ', 'Rivera Perez ', 'mjrp23@hotmail.com', '1991-12-23', '12', '86634030', 'Heredia ', '', '2025-05-19 21:22:10', '2025-05-19 21:22:10'),
(260, 'Andrea ', 'Sanchez Gutierrez ', 'asg-16-2@hotmail.com', '1982-02-16', '2', '61635448', 'Heredia ', '', '2025-05-19 21:23:39', '2025-05-19 21:23:39'),
(261, 'Melania', 'Feoli Leon', 'melafeolileon@gmail.com', '1991-07-11', '7', '8837081', 'Estasos unidos', '', '2025-05-19 21:28:01', '2025-05-19 21:28:01'),
(262, 'Virginia ', 'Chavarria Cordero', 'pucasi13@gmail.com', '1960-06-13', '6', '89863333', 'Puntarenas ', '', '2025-05-19 21:29:19', '2025-05-19 21:29:19'),
(263, 'Monica ', 'Perez Barrantes ', 'monica_p_b@hotmail.com', '1984-11-13', '11', '89917878', 'Santa Ana ', '', '2025-05-19 21:33:15', '2025-05-19 21:33:15'),
(264, 'Laura ', 'Fonseca Mesen ', 'laufonseca7@hotmail.com', '1978-06-07', '6', '83153406', 'Curridabat ', '', '2025-05-19 21:38:53', '2025-05-19 21:38:53'),
(265, 'Jimena', 'Rojas Zeledon ', '', '0000-00-00', '', '84637777', 'Belen ', 'Hika de nela zeledon. Minimos datos ', '2025-05-19 21:50:52', '2025-05-19 21:50:52'),
(266, 'Maria ', 'Rojas Flores ', 'dra.mariarojasflores@gmail.com', '1991-01-25', '1', '71101929', 'Nicoya Guanacaste ', '', '2025-05-19 21:57:47', '2025-05-19 21:57:47'),
(267, 'Amber ', 'Wood', 'amberreddickwood@gmail.com', '1980-10-22', '10', '+1(404)8047378', 'Belen ', '', '2025-05-19 21:59:37', '2025-05-19 21:59:37'),
(268, 'Vanessa ', 'Ramirez Mayorga', 'vanessaramirez.ucr@gmail.com', '1968-08-29', '8', '85520892', 'San pedro ', '', '2025-05-19 23:20:10', '2025-05-19 23:20:10'),
(269, 'Xiomara ', 'Quiros Lumbi', '', '0000-00-00', '', '84485105', 'Tibas ', '', '2025-05-19 23:25:17', '2025-05-19 23:25:17'),
(270, 'Silvia ', 'Barrientos ', 'sylvinabc@hotmail.com', '1963-09-03', '9', '88404446', 'Hatillo ', '', '2025-05-19 23:33:25', '2025-05-19 23:33:25'),
(271, 'Maria Cécilia ', 'Alfaro Barrantes ', '', '1951-12-04', '12', '83930821', 'Tibas ', '', '2025-05-19 23:48:47', '2025-05-19 23:48:47'),
(272, 'Andreina', 'Casas', 'ninacascor@gmail.com', '1984-08-09', '8', '61756569', 'Tibas ', '', '2025-05-19 23:55:37', '2025-05-19 23:55:37'),
(273, 'Aurea ', 'De Mata', '', '1960-06-01', '5', '87082778', 'San Pedro ', '', '2025-05-20 00:05:06', '2025-05-20 00:05:06'),
(274, 'Carlos ', 'Villalobos Soto ', 'cvillalobossoto@gmail.com', '1974-12-09', '12', '83630833', 'Santo domingo Heredia ', '', '2025-05-20 00:14:52', '2025-05-20 00:14:52'),
(275, 'Rosberly', 'Mora Arias ', 'rossmares76@gmail.com', '1976-08-03', '8', '84510236', 'Parrita ', '', '2025-05-20 00:42:41', '2025-05-20 00:42:41'),
(276, 'Rocio', 'Segura Cortes ', 'machilla1974@gmail.com', '1974-04-01', '3', '88272116', 'Moravia ', '', '2025-05-20 01:33:04', '2025-05-20 01:33:04'),
(277, 'Isabelle ', 'Delgado Varela ', 'pifidv@gmail.com', '1974-03-07', '3', '88819637', 'Santo Domingo Heredia ', '', '2025-05-20 01:34:12', '2025-05-20 01:34:12'),
(278, 'Olga ', 'Delgado Sánchez ', 'olguids12@gyahooo.com', '1957-10-12', '10', '88106776', 'Curri. ', '', '2025-05-23 16:04:18', '2025-05-23 16:04:18'),
(279, 'Mariana ', 'Vega Sánchez ', 'marianavs.2002@gmail.com', '2002-07-02', '7', '71145061', 'Puriscal ', '', '2025-06-10 16:01:05', '2025-06-10 16:01:05'),
(280, 'Moni y Bebe ', '', '', '0000-00-00', '', '', '', '', '2025-06-14 16:44:58', '2025-06-14 16:44:58'),
(281, 'Keyner, Vic y Sofi ', '', '', '0000-00-00', '', '', '', '', '2025-08-12 03:01:50', '2025-08-12 03:01:50'),
(282, 'Yari & Diego ', '', '', '0000-00-00', '', '', '', '', '2025-08-12 03:12:55', '2025-08-12 03:12:55'),
(283, 'Dianita. ', '', '', '0000-00-00', '', '', '', '', '2025-10-14 23:59:48', '2025-10-14 23:59:48'),
(284, 'Ana Irene ', 'Vega S ', '', '0000-00-00', '', '', '', '', '2026-02-11 20:49:08', '2026-02-11 20:49:08'),
(285, 'Ana Irene ', 'Vega Sánchez ', '', '0000-00-00', '', '', '', '', '2026-02-11 20:50:47', '2026-02-11 20:50:47'),
(286, 'Ana Irene ', 'Vega Sánchez ', '', '0000-00-00', '', '', '', '', '2026-02-12 04:34:00', '2026-02-12 04:34:00'),
(288, 'Renan', 'Galvan', 'renangalvan@gmail.com', '1971-08-02', '8', '87777849', '506 87777849', 'Ingeniero de software', '2026-02-12 16:15:54', '2026-02-12 16:15:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(50) NOT NULL,
  `tienda` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`, `tienda`) VALUES
(14, 'Tratamiento Corporal', 2),
(15, 'Tratamiento Facial', 2),
(16, 'Productos para el cabello', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id_cita` int(11) UNSIGNED NOT NULL,
  `tratamiento` varchar(50) NOT NULL,
  `detalle` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `hora_inicio` varchar(50) NOT NULL,
  `hora_final` varchar(50) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `importe` int(10) NOT NULL,
  `modo_pago` varchar(100) NOT NULL,
  `observaciones_c` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id_cita`, `tratamiento`, `detalle`, `fecha`, `hora_inicio`, `hora_final`, `estado`, `importe`, `modo_pago`, `observaciones_c`, `created_at`, `updated_at`, `id`) VALUES
(36, 'Corporal', 'Dep. Cera - Cejas', '2024-01-16', '12:30', '13:41', 'P', 5000, '', '', '2024-01-16 18:41:31', '2024-01-16 18:41:31', 24),
(37, 'Corporal', 'Dep. Def. - Pierna completa', '2024-01-16', '23:30', '12:30', 'P', 23000, '', '', '2024-01-16 18:43:06', '2024-01-16 18:43:06', 14),
(38, 'Corporal', 'Dep. Def. - Área bikini', '2024-01-15', '18:00', '18:30', 'P', 30000, '', '', '2024-01-16 18:48:04', '2024-01-16 18:48:04', 16),
(39, 'Corporal', 'Dep. Cera - Cuerpo Total', '2024-01-16', '09:00', '10:00', 'P', 32000, '', 'Depilación corporal\r\nOndulado de pestañas ', '2024-01-16 22:51:35', '2024-01-16 22:51:35', 59),
(40, 'Facial', 'Microderhabracion efecto glow', '2024-01-16', '14:30', '16:00', 'P', 35000, '', 'Dermapen con coctel de toscani ', '2024-01-16 22:57:18', '2024-01-16 22:57:18', 42),
(41, 'Corporal', 'Dep. Cera - Pierna completa', '2024-01-16', '16:00', '16:30', 'P', 11000, '', '', '2024-01-16 23:02:43', '2024-01-16 23:02:43', 61),
(43, 'Corporal', 'Dep. Cera - Media pierna', '2024-01-17', '09:00', '09:30', 'F', 8000, 'Contado', '100 a favor. Bk y media pierna ', '2024-01-17 16:35:04', '2024-01-17 16:35:04', 63),
(47, 'Facial', 'Radiofrecuencia facial', '2024-01-17', '16:30', '18:00', 'F', 35000, 'Sinpe', '', '2024-01-18 00:03:04', '2024-01-18 00:03:04', 47),
(50, 'Facial', 'Limpieza facial profunda', '2024-01-18', '15:30', '17:00', 'F', 30000, 'Contado', '', '2024-01-18 22:49:37', '2024-01-18 22:49:37', 67),
(51, 'Facial', 'Dermapén facial', '2024-01-20', '15:00', '16:15', 'F', 0, 'Otros', '', '2024-01-20 22:15:35', '2024-01-20 22:15:35', 76),
(52, 'Facial', 'Limpieza facial profunda', '2024-01-20', '22:00', '23:00', 'F', 35000, 'Sinpe', '', '2024-01-20 22:16:46', '2024-01-20 22:16:46', 71),
(53, 'Facial', 'Microblanding de cejas', '2024-01-20', '23:00', '12:29', 'F', 100000, 'Contado', 'Tomada como nueva hace mucho tiempo se la había echo.\r\nBrown 2,Brown 1 y una gota de Brown 3 ', '2024-01-20 22:19:06', '2024-01-20 22:19:06', 72),
(54, 'Corporal', 'Dep. Cera - Cuerpo Total', '2024-01-20', '13:30', '14:00', 'F', 17000, 'Sinpe', '', '2024-01-20 22:20:14', '2024-01-20 22:20:14', 73),
(55, 'Corporal', 'Dep. Cera - Cuerpo Total', '2024-01-20', '14:00', '14:30', 'F', 14000, 'Sinpe', '', '2024-01-20 22:21:16', '2024-01-20 22:21:16', 75),
(56, 'Corporal', 'Dep. Cera - Cuerpo Total', '2024-01-20', '14:30', '15:00', 'F', 18000, 'Sinpe', '', '2024-01-20 22:23:06', '2024-01-20 22:23:06', 74),
(57, 'Facial', 'Microblanding de cejas', '2024-01-25', '22:00', '23:30', 'F', 50000, 'Transferencia', '', '2024-01-26 00:15:05', '2024-01-26 00:15:05', 15),
(58, 'Facial', 'Radiofrecuencia facial', '2024-01-25', '21:00', '22:00', 'F', 35000, 'Sinpe', '', '2024-01-26 00:16:31', '2024-01-26 00:16:31', 27),
(59, 'Facial', 'Microblanding de cejas', '2024-01-22', '09:30', '11:00', 'F', 60000, 'Sinpe', '50 mil pendientes 2024\r\n10mil ipl facial.\r\n', '2024-01-26 00:19:44', '2024-01-26 00:19:44', 43),
(60, 'Facial', 'Radiofrecuencia facial', '2024-01-25', '15:30', '17:00', 'F', 35000, 'Tarjeta', '', '2024-01-26 00:50:14', '2024-01-26 00:50:14', 40),
(61, 'Corporal', 'Dep. Cera - Cuerpo Total', '2024-01-25', '13:30', '14:30', 'F', 24000, 'Tarjeta', '', '2024-01-26 00:51:08', '2024-01-26 00:51:08', 48),
(62, 'Facial', 'Microblanding de cejas', '2024-01-23', '21:00', '17:00', 'F', 144000, 'Sinpe', 'Trabajos varios parrita. ', '2024-01-26 00:54:35', '2024-01-26 00:54:35', 84),
(63, 'Facial', 'Dermapén facial', '2024-01-19', '17:00', '20:00', 'F', 80000, 'Sinpe', 'Retoque de cejas 45\r\nDermapen 35', '2024-01-26 02:16:12', '2024-01-26 02:16:12', 87),
(64, 'Facial', 'Limpieza facial profunda', '2024-01-19', '12:00', '13:30', 'F', 35000, 'Sinpe', '', '2024-01-26 02:18:35', '2024-01-26 02:18:35', 69),
(65, 'Facial', 'Microblanding de cejas', '2024-01-19', '22:00', '23:30', 'F', 0, 'Otros', 'Retoque de 40 días pagadas en diciembre ', '2024-01-26 02:20:23', '2024-01-26 02:20:23', 68),
(66, 'Corporal', 'Dep. Cera - Área bikini', '2024-01-19', '14:30', '15:00', 'F', 13000, 'Sinpe', '', '2024-01-26 02:22:13', '2024-01-26 02:22:13', 70),
(67, 'Corporal', 'Dep. Cera - Cuerpo Total', '2024-01-18', '15:00', '15:30', 'F', 15000, 'Sinpe', '', '2024-01-26 02:32:58', '2024-01-26 02:32:58', 90),
(68, 'Facial', 'Limpieza facial profunda', '2024-01-18', '17:00', '18:30', 'F', 35000, 'Pendiente', '', '2024-01-26 02:34:13', '2024-01-26 02:34:13', 88),
(69, 'Facial', 'Dermapén facial', '2024-01-18', '22:00', '23:00', 'F', 35000, 'Sinpe', '', '2024-01-26 02:35:22', '2024-01-26 02:35:22', 41),
(70, 'Facial', 'Microblanding de cejas', '2024-01-19', '16:00', '17:30', 'F', 50000, 'Pendiente', '', '2024-01-26 02:36:35', '2024-01-26 02:36:35', 88),
(71, 'Facial', 'Microblanding de cejas', '2024-02-01', '11:30', '01:00', 'F', 50000, 'Tarjeta', '', '2024-02-10 17:43:55', '2024-02-10 17:43:55', 126),
(72, 'Facial', 'Yellow peell', '2024-02-01', '16:00', '17:00', 'F', 40000, 'Sinpe', '', '2024-02-10 17:45:47', '2024-02-10 17:45:47', 123),
(73, 'Corporal', 'Paquete masaje básico', '2024-02-02', '09:00', '10:30', 'F', 0, 'Otros', '', '2024-02-10 17:47:00', '2024-02-10 17:47:00', 19),
(74, 'Corporal', 'Masaje con maderitas', '2024-02-02', '10:30', '00:00', 'F', 0, 'Otros', 'Masaje #2 paquete ', '2024-02-10 17:48:52', '2024-02-10 17:48:52', 15),
(75, 'Facial', 'Microblanding de cejas', '2024-02-02', '10:30', '01:00', 'F', 68000, 'Sinpe', 'Micro de cejas y ondulado de pestañas ', '2024-02-10 17:50:20', '2024-02-10 17:50:20', 69),
(76, 'Corporal', 'Dep. Cera - Área bikini', '2024-02-02', '14:00', '14:30', 'F', 5000, 'Sinpe', '', '2024-02-10 17:52:13', '2024-02-10 17:52:13', 129),
(77, 'Corporal', 'Dep. Cera - Cuerpo Total', '2024-02-02', '15:30', '16:30', 'F', 25000, 'Contado', '', '2024-02-10 17:53:49', '2024-02-10 17:53:49', 125),
(78, 'Corporal', 'Masaje con maderitas', '2024-02-02', '16:00', '17:30', 'F', 25000, 'Sinpe', 'Masaje con anita. ', '2024-02-10 17:56:33', '2024-02-10 17:56:33', 88),
(79, 'Corporal', 'Dep. Cera - Cejas', '2024-02-03', '16:00', '16:30', 'F', 3000, 'Contado', '', '2024-02-10 17:58:58', '2024-02-10 17:58:58', 23),
(80, 'Corporal', 'Dep. Def. - Media pierna', '2024-02-03', '10:00', '11:00', 'F', 30000, 'Contado', '', '2024-02-10 17:59:59', '2024-02-10 17:59:59', 127),
(81, 'Facial', 'Dermapén facial', '2024-02-03', '11:00', '12:30', 'F', 35000, 'Sinpe', '', '2024-02-10 18:01:52', '2024-02-10 18:01:52', 143),
(82, 'Corporal', 'Dep. Cera - Cuerpo Total', '2024-02-03', '12:30', '13:00', 'F', 14000, 'Sinpe', '', '2024-02-10 18:11:00', '2024-02-10 18:11:00', 144),
(83, 'Corporal', 'Masaje post_operatorio', '2024-02-03', '14:00', '15:00', 'F', 22000, 'Sinpe', '', '2024-02-10 18:12:09', '2024-02-10 18:12:09', 92),
(84, 'Facial', 'Limpieza facial profunda', '2024-02-05', '10:00', '11:30', 'F', 35000, 'Sinpe', '', '2024-02-10 18:15:28', '2024-02-10 18:15:28', 128),
(85, 'Facial', 'Microblanding de cejas', '2024-02-05', '17:00', '19:00', 'F', 137860, 'Tarjeta', '122000 13% 15860 total 137860\r\nFacial micro cejas y bloqueador ', '2024-02-10 18:36:17', '2024-02-10 18:36:17', 142),
(86, 'Facial', 'Limpieza facial profunda', '2024-02-06', '13:30', '14:30', 'F', 30000, 'Sinpe', '', '2024-02-10 18:37:52', '2024-02-10 18:37:52', 130),
(87, 'Corporal', 'Dep. Cera - Cuerpo Total', '2024-02-06', '15:30', '16:30', 'F', 21000, 'Sinpe', '', '2024-02-10 18:40:14', '2024-02-10 18:40:14', 139),
(88, 'Corporal', 'Dep. Cera - Cuerpo Total', '2024-02-07', '10:00', '11:00', 'F', 21, 'Sinpe', '', '2024-02-10 18:41:20', '2024-02-10 18:41:20', 124),
(89, 'Corporal', 'Tratamiento corporal con combinado', '2024-02-07', '15:00', '16:45', 'F', 18000, 'Sinpe', 'Ondulado de pestañas más el masaje corporal ', '2024-02-10 18:43:53', '2024-02-10 18:43:53', 18),
(90, 'Corporal', 'Masaje con maderitas', '2024-02-08', '10:00', '11:30', 'F', 0, 'Otros', 'Masaje #3', '2024-02-10 18:45:52', '2024-02-10 18:45:52', 15),
(91, 'Corporal', 'Masaje con maderitas', '2024-02-08', '11:30', '12:30', 'F', 12000, 'Pendiente', '', '2024-02-10 18:47:15', '2024-02-10 18:47:15', 122),
(92, 'Corporal', 'Paquete masaje reductivo básico', '2024-02-09', '21:00', '10:30', 'F', 120000, 'Transferencia', 'Paquete de masaje. #1 ', '2024-02-10 18:48:31', '2024-02-10 18:48:31', 19),
(93, 'Corporal', 'Masaje Relajante', '2024-02-01', '10:00', '11:30', 'F', 25000, 'Contado', '', '2024-02-10 18:55:23', '2024-02-10 18:55:23', 145),
(94, 'Corporal', 'Dep. Cera - Cuerpo Total', '2024-02-09', '10:30', '11:00', 'F', 11000, 'Sinpe', '', '2024-02-10 18:57:33', '2024-02-10 18:57:33', 75),
(95, 'Corporal', 'Masaje con maderitas', '2024-02-09', '16:00', '17:30', 'F', 25000, 'Sinpe', 'Masaje con anita ', '2024-02-10 18:58:41', '2024-02-10 18:58:41', 88),
(96, 'Corporal', 'Dep. Cera - Cuerpo Total', '2024-02-02', '14:30', '15:10', 'F', 21000, 'Sinpe', '', '2024-02-10 19:03:37', '2024-02-10 19:03:37', 146),
(97, 'Corporal', 'Dep. Cera - Cuerpo Total', '2024-01-30', '11:00', '12:00', 'F', 25000, 'Sinpe', '', '2024-02-10 19:19:59', '2024-02-10 19:19:59', 147),
(98, 'Corporal', 'Dep. Cera - Pierna completa', '2024-01-31', '10:00', '10:30', 'F', 11000, 'Sinpe', '', '2024-02-10 19:21:23', '2024-02-10 19:21:23', 141),
(99, 'Corporal', 'Dep. Cera - Área bikini', '2024-01-31', '17:00', '17:30', 'F', 7000, 'Sinpe', '', '2024-02-10 19:22:36', '2024-02-10 19:22:36', 138),
(100, 'Facial', 'Limpieza facial', '2024-01-30', '13:00', '14:30', 'F', 50000, 'Tarjeta', '', '2024-02-10 19:23:55', '2024-02-10 19:23:55', 140),
(101, 'Corporal', 'Masaje post_operatorio', '2024-01-30', '15:00', '16:00', 'F', 22000, 'Sinpe', '', '2024-02-10 19:24:51', '2024-02-10 19:24:51', 38),
(102, 'Facial', 'Microblanding de cejas', '2024-01-29', '10:00', '00:00', 'F', 100000, 'Contado', '', '2024-02-10 19:26:06', '2024-02-10 19:26:06', 131),
(103, 'Facial', 'Limpieza facial profunda', '2024-01-29', '11:30', '13:00', 'F', 37000, 'Sinpe', 'Limpieza facial 25\r\nMasaje piernas 12 ', '2024-02-10 19:27:23', '2024-02-10 19:27:23', 122),
(104, 'Corporal', 'Dep. Cera - Cuerpo Total', '2024-02-12', '10:00', '11:00', 'F', 14000, 'Sinpe', '', '2024-02-12 23:40:05', '2024-02-12 23:40:05', 59),
(105, 'Corporal', 'Dep. Cera - Cuerpo Total', '2024-02-12', '17:00', '17:30', 'F', 25000, 'Sinpe', 'Ipl piernas aislado\r\nAxi y mentón ', '2024-02-12 23:42:32', '2024-02-12 23:42:32', 150),
(106, 'Facial', 'Limpieza facial', '2024-02-12', '16:30', '16:45', 'F', 38420, 'Tarjeta', 'Bloqueador con color el amarillo. 34 mil más impuesto ', '2024-02-12 23:50:49', '2024-02-12 23:50:49', 149),
(107, 'Facial', 'Dermapén facial', '2024-02-13', '14:30', '17:00', 'F', 85000, 'Sinpe', 'Dermapen\r\nBloqueador cc crem bronce\r\nMasaje espalda anita. ', '2024-02-14 22:26:00', '2024-02-14 22:26:00', 42),
(108, 'Corporal', 'Dep. Cera - Facial', '2024-02-14', '10:30', '11:00', 'F', 6000, 'Pendiente', '', '2024-02-15 15:29:34', '2024-02-15 15:29:34', 156),
(109, 'Facial', 'Radiofrecuencia facial', '2024-02-14', '14:00', '15:00', 'F', 10000, 'Pendiente', 'Solo radio por una mala aplicación de botox en el risoruo te sigomaticos ', '2024-02-15 15:31:03', '2024-02-15 15:31:03', 154),
(110, 'Corporal', 'Dep. Cera - Cuerpo Total', '2024-02-14', '15:00', '16:00', 'F', 17000, 'Sinpe', '', '2024-02-15 15:32:24', '2024-02-15 15:32:24', 155),
(111, 'Corporal', 'Dep. Cera - Facial', '2024-02-14', '16:00', '16:30', 'F', 6000, 'Pendiente', '', '2024-02-15 15:34:10', '2024-02-15 15:34:10', 35),
(112, 'Corporal', 'Dep. Cera - Facial', '2024-02-15', '09:00', '09:30', 'F', 5000, 'Contado', '', '2024-02-15 15:35:15', '2024-02-15 15:35:15', 153),
(116, 'Corporal', 'Dep. Cera - Facial', '2024-03-14', '09:00', '09:30', 'F', 5000, 'Contado', '', '2024-03-14 17:00:23', '2024-03-14 17:00:23', 153),
(117, 'Facial', 'Limpieza facial profunda', '2024-03-13', '11:00', '11:30', 'F', 30000, 'Sinpe', '', '2024-03-14 17:01:38', '2024-03-14 17:01:38', 42),
(118, 'Facial', 'Limpieza facial', '2024-03-13', '10:00', '11:30', 'F', 30000, 'Sinpe', '', '2024-03-14 17:03:06', '2024-03-14 17:03:06', 47),
(119, 'Facial', 'Limpieza facial', '2024-03-11', '18:00', '19:40', 'F', 43000, 'Sinpe', 'Limpieza facial, ondulado de pestañas, depilación de cejas con tinte y Bigote. ', '2024-03-14 17:04:40', '2024-03-14 17:06:15', 127),
(120, 'Facial', 'Microblanding de cejas', '2024-03-11', '10:00', '11:30', 'F', 0, 'Otros', 'No pago era retoque ya estaba pago ', '2024-03-14 17:10:14', '2024-03-14 17:10:14', 131),
(121, 'Corporal', 'Dep. Cera - Cuerpo Total', '2024-04-05', '09:00', '10:00', 'F', 16000, 'Sinpe', 'Masaje número 7 ', '2024-04-08 14:18:19', '2024-04-08 14:18:19', 19),
(122, 'Facial', 'Lifting (ondulado) de pestañas', '2024-04-05', '13:30', '14:30', 'F', 31000, 'Sinpe', 'Ondulado y depilación ', '2024-04-08 14:20:21', '2024-04-08 14:20:21', 134),
(123, 'Facial', 'Limpieza facial profunda', '2024-04-05', '16:00', '17:30', 'F', 35000, 'Pendiente', '', '2024-04-08 14:21:41', '2024-04-08 14:21:41', 88),
(124, 'Corporal', 'Dep. Cera - Área bikini', '2024-04-05', '18:00', '18:30', 'F', 7000, 'Pendiente', '', '2024-04-08 14:22:48', '2024-04-08 14:22:48', 138),
(125, 'Corporal', 'Paquete masaje básico', '2024-04-03', '11:30', '00:30', 'F', 12000, 'Sinpe', 'Masaje en piernas ', '2024-04-08 14:31:18', '2024-04-08 14:31:18', 122),
(126, 'Corporal', 'Paquete masaje reductivo básico', '2024-04-03', '16:00', '17:30', 'F', 0, 'Otros', 'Paquete masaje número 7 ', '2024-04-08 14:34:11', '2024-04-08 14:34:11', 18),
(127, 'Facial', 'Dermapén facial', '2024-04-02', '00:00', '13:30', 'F', 35000, 'Sinpe', '', '2024-04-08 14:36:36', '2024-04-08 14:36:36', 71),
(128, 'Corporal', 'Dep. Cera - Cuerpo Total', '2024-04-02', '16:00', '16:30', 'F', 10000, 'Sinpe', 'Depi de ax y depi facial ', '2024-04-08 14:38:24', '2024-04-08 14:38:24', 155),
(129, 'Facial', 'Radiofrecuencia facial', '2024-04-02', '10:00', '11:30', 'F', 30000, 'Sinpe', '', '2024-04-08 14:45:33', '2024-04-08 14:45:33', 161),
(130, 'Facial', 'Radiofrecuencia facial', '2024-04-01', '09:00', '10:30', 'F', 35000, 'Sinpe', '', '2024-04-08 14:46:53', '2024-04-08 14:46:53', 27),
(131, 'Corporal', 'Dep. Cera - Área bikini', '2024-03-27', '10:00', '10:30', 'F', 13000, 'Tarjeta', '', '2024-04-08 14:53:14', '2024-04-08 14:53:14', 70),
(132, 'Corporal', 'Dep. Cera - Cuerpo Total', '2024-03-27', '13:00', '13:30', 'F', 0, 'Otros', 'Depilación pierna completa y bikini ', '2024-04-08 14:55:32', '2024-04-08 14:55:32', 38),
(133, 'Facial', 'Limpieza facial profunda', '2024-03-26', '09:00', '11:00', 'F', 40000, 'Sinpe', 'Mini limpieza y masaje corporal ', '2024-04-08 14:57:01', '2024-04-08 14:57:01', 39),
(134, 'Facial', 'Limpieza facial', '2024-03-26', '11:00', '00:30', 'F', 37000, 'Sinpe', '', '2024-04-08 14:58:26', '2024-04-08 14:58:26', 41),
(135, 'Facial', 'Limpieza facial profunda', '2024-03-26', '16:30', '17:30', 'F', 35000, 'Sinpe', '', '2024-04-08 15:04:13', '2024-04-08 15:04:13', 34),
(136, 'Facial', 'Limpieza facial profunda', '2024-03-26', '14:00', '16:00', 'F', 60000, 'Tarjeta', 'Facial de mace y facial de diego ', '2024-04-08 15:17:58', '2024-04-08 15:17:58', 162),
(137, 'Facial', 'Microblanding de cejas', '2024-03-25', '11:00', '00:30', 'F', 50000, 'Sinpe', '', '2024-04-08 15:19:18', '2024-04-08 15:19:18', 128),
(138, 'Corporal', 'Paquete de masaje reductivo localizado con aparato', '2024-03-26', '00:30', '01:30', 'F', 50000, 'Sinpe', 'Masaje número 7 anita ', '2024-04-08 15:28:26', '2024-04-08 15:28:26', 163),
(139, 'Corporal', 'Dep. Cera - Cuerpo Total', '2024-04-04', '00:30', '13:30', 'F', 0, 'Otros', 'Solo aparatologia número 8 marcela ', '2024-04-08 15:32:21', '2024-04-08 15:32:21', 163),
(140, 'Facial', 'Microblanding de cejas', '2024-03-25', '09:30', '11:00', 'F', 50000, 'Sinpe', '', '2024-04-08 23:40:52', '2024-04-08 23:40:52', 82),
(141, 'Corporal', 'Dep. Cera - Cuerpo Total', '2024-03-25', '14:00', '14:30', 'F', 18000, 'Sinpe', '', '2024-04-08 23:44:36', '2024-04-08 23:44:36', 164),
(142, 'Corporal', 'Paquete masaje básico', '2024-03-25', '14:30', '15:30', 'F', 25000, 'Contado', '', '2024-04-08 23:45:39', '2024-04-08 23:45:39', 145),
(143, 'Corporal', 'Dep. Cera - Cuerpo Total', '2024-03-25', '16:00', '17:00', 'F', 21000, 'Sinpe', '', '2024-04-08 23:47:11', '2024-04-08 23:47:11', 90),
(144, 'Facial', 'Radiofrecuencia facial', '2024-03-25', '17:00', '18:30', 'F', 37000, 'Sinpe', '', '2024-04-08 23:50:33', '2024-04-08 23:50:33', 165),
(146, 'Corporal', 'Dep. Cera - Cuerpo Total', '2024-04-08', '16:00', '16:30', 'F', 14000, 'Sinpe', '', '2024-04-08 23:53:05', '2024-04-08 23:53:05', 59),
(147, 'Corporal', 'Dep. Cera - Cuerpo Total', '2024-04-08', '16:30', '17:00', 'F', 14000, 'Sinpe', '', '2024-04-08 23:54:02', '2024-04-08 23:54:02', 144),
(148, 'Corporal', 'Dep. Cera - Facial', '2024-04-08', '17:00', '17:30', 'F', 12000, 'Pendiente', '', '2024-04-08 23:55:36', '2024-04-08 23:55:36', 35),
(149, 'Facial', 'Limpieza facial', '2024-08-27', '15:00', '16:00', 'F', 35000, 'Sinpe', 'Limpieza facial he hidratacion. ', '2024-08-28 00:18:04', '2024-08-28 00:18:04', 71),
(150, 'Facial', 'Microblanding de cejas', '2024-09-14', '10:30', '12:30', 'F', 100000, 'Sinpe', 'Régalo. Día de la madre del esposo. ', '2024-09-14 18:12:23', '2024-09-14 18:12:23', 178),
(151, 'Corporal', 'Dep. Cera - Facial', '2024-10-02', '11:00', '11:30', 'F', 11000, 'Sinpe', '', '2024-10-02 17:33:07', '2024-10-02 17:33:07', 153),
(152, 'Corporal', 'Paquete de masaje reductivo localizado con aparato', '2024-10-02', '14:15', '15:45', 'F', 12000, 'Sinpe', '', '2024-10-03 01:42:54', '2024-10-03 01:42:54', 122),
(153, 'Corporal', 'Dep. Cera - Pierna completa', '2024-10-03', '09:30', '10:00', 'F', 8000, 'Contado', '', '2024-10-03 17:35:02', '2024-10-03 17:35:02', 63),
(154, 'Facial', 'Mesoterapia facial', '2024-10-03', '10:00', '11:15', 'F', 30000, 'Sinpe', '', '2024-10-03 17:36:09', '2024-10-03 17:36:09', 41),
(155, 'Corporal', 'Paquete de masaje reductivo localizado con aparato', '2024-10-03', '11:00', '00:30', 'F', 0, 'Otros', 'Masaje #9 con anita. ', '2024-10-03 17:37:47', '2024-10-03 17:37:47', 15),
(156, 'Corporal', 'Paquete de masaje reductivo localizado con aparato', '2024-10-04', '16:00', '17:30', 'F', 25000, 'Sinpe', '', '2024-10-07 22:57:11', '2024-10-07 22:57:11', 88),
(157, 'Corporal', 'Dep. Def. - Media pierna', '2024-10-04', '14:30', '15:15', 'C', 30000, 'Sinpe', '', '2024-10-07 23:47:21', '2024-10-07 23:47:21', 127),
(158, 'Corporal', 'Dep. Cera - Cuerpo Total', '2024-10-03', '11:30', '12:30', 'F', 36000, 'Sinpe', '', '2024-10-07 23:50:19', '2024-10-07 23:50:19', 180),
(159, 'Facial', 'Yellow peell', '2024-10-01', '16:30', '17:30', 'F', 111000, 'Sinpe', 'Yellow peelin y 2 certificados de regalo ', '2024-10-07 23:57:21', '2024-10-07 23:57:21', 179),
(160, 'Corporal', 'Dep. Cera - Área bikini', '2024-10-04', '14:00', '14:30', 'F', 5000, 'Sinpe', '', '2024-10-08 00:00:00', '2024-10-08 00:00:00', 129),
(161, 'Corporal', 'Dep. Cera - Cuerpo Total', '2024-10-05', '12:00', '12:30', 'F', 14000, 'Sinpe', '', '2024-10-08 00:01:05', '2024-10-08 00:01:05', 144),
(162, 'Corporal', 'Dep. Cera - Cuerpo Total', '2024-10-05', '15:00', '15:45', 'F', 17000, 'Sinpe', '', '2024-10-08 00:06:01', '2024-10-08 00:06:01', 73),
(163, 'Facial', 'Microblanding de cejas', '2024-10-07', '21:00', '12:30', 'F', 102000, 'Transferencia', 'Limpieza facial, depilación total y retoque de cejas. ', '2024-10-08 00:08:38', '2024-10-08 00:08:38', 19),
(164, 'Corporal', 'Dep. Cera - Área bikini', '2024-10-07', '14:30', '15:00', 'F', 10000, 'Sinpe', '', '2024-10-08 00:13:53', '2024-10-08 00:13:53', 181),
(165, 'Corporal', 'Dep. Def. - Pierna completa', '2024-10-03', '09:00', '09:30', 'F', 11000, 'Sinpe', '', '2024-10-08 21:09:54', '2024-10-08 21:09:54', 182),
(166, 'Corporal', 'Dep. Def. - Facial', '2024-10-08', '17:30', '18:00', 'F', 13000, 'Tarjeta', '', '2024-10-09 00:10:37', '2024-10-09 00:10:37', 183),
(167, 'Facial', 'Radiofrecuencia facial', '2024-10-08', '19:00', '20:50', 'F', 54000, 'Sinpe', '', '2024-10-09 04:13:07', '2024-10-09 04:13:07', 143),
(168, 'Facial', 'Dermapén facial', '2024-10-09', '11:30', '13:00', 'F', 65000, 'Sinpe', 'Dermapen 35 mil y gel limpiador 30 mil', '2024-10-10 00:12:17', '2024-10-10 00:12:17', 27),
(169, 'Corporal', 'Paquete de masaje reductivo localizado con aparato', '2024-10-09', '14:00', '15:30', 'F', 12000, 'Sinpe', '', '2024-10-10 00:13:30', '2024-10-10 00:13:30', 122),
(170, 'Corporal', 'Dep. Cera - Cuerpo Total', '2024-10-09', '15:45', '16:30', 'F', 15000, 'Contado', '', '2024-10-10 00:14:55', '2024-10-10 00:14:55', 139),
(171, 'Corporal', 'Dep. Cera - Facial', '2024-10-09', '17:00', '17:30', 'F', 5000, 'Contado', '', '2024-10-10 00:26:49', '2024-10-10 00:26:49', 184),
(172, 'Facial', 'Limpieza facial', '2024-10-09', '13:00', '13:30', 'F', 160000, 'Tarjeta', 'Fue solo compra de producto ', '2024-10-10 00:30:53', '2024-10-10 00:30:53', 179),
(173, 'Facial', 'Microblanding de cejas', '2024-10-12', '23:00', '12:30', 'F', 0, 'Otros', 'Retoque.\r\nCejas pagadas en setiembre ', '2024-10-12 18:25:29', '2024-10-12 18:25:29', 185),
(174, 'Corporal', 'Paquete de masaje reductivo localizado con aparato', '2024-10-10', '23:00', '12:30', 'F', 130000, 'Transferencia', '80 saldo pendiente\r\n50 abono nuevo paquete ', '2024-10-12 18:28:28', '2024-10-12 18:28:28', 15),
(175, 'Corporal', 'Paquete de masaje reductivo localizado con aparato', '2024-10-10', '16:00', '17:30', 'F', 33000, 'Sinpe', '', '2024-10-12 18:29:43', '2024-10-12 18:29:43', 70),
(176, 'Corporal', 'Dep. Def. - Área bikini', '2024-10-10', '15:30', '16:00', 'F', 0, 'Otros', 'Aplicación #1  ipl área de bk. ', '2024-10-12 18:31:53', '2024-10-12 18:31:53', 138),
(177, 'Corporal', 'Dep. Cera - Cejas', '2024-10-10', '19:00', '19:30', 'F', 0, 'Otros', '', '2024-10-12 18:34:13', '2024-10-12 18:34:13', 24),
(178, 'Facial', 'Lifting (ondulado) de pestañas', '2024-10-11', '18:00', '19:30', 'F', 36000, 'Sinpe', '', '2024-10-12 18:40:10', '2024-10-12 18:40:10', 28),
(179, 'Facial', 'Microblanding de cejas', '2024-10-12', '12:30', '14:00', 'F', 150000, 'Tarjeta', 'Pago 3 retoques. ', '2024-10-12 19:50:21', '2024-10-12 20:19:12', 186),
(180, 'Facial', 'Microblanding de cejas', '2024-10-12', '14:00', '15:30', 'F', 0, 'Otros', 'Pago la hermana ', '2024-10-12 21:25:39', '2024-10-12 21:25:39', 187),
(181, 'Facial', 'Microblanding de cejas', '2024-10-12', '15:30', '17:00', 'F', 0, 'Otros', '', '2024-10-12 22:52:14', '2024-10-12 22:52:14', 188),
(182, 'Facial', 'Lifting (ondulado) de pestañas', '2024-10-15', '15:00', '16:00', 'F', 24000, 'Tarjeta', '', '2024-10-18 00:08:15', '2024-10-18 00:08:15', 149),
(183, 'Corporal', 'Dep. Cera - Cuerpo Total', '2024-10-17', '17:00', '17:30', 'F', 21000, 'Sinpe', '', '2024-10-18 00:12:10', '2024-10-18 00:12:10', 150),
(184, 'Facial', 'Microblanding de cejas', '2024-10-11', '09:30', '11:00', 'F', 0, 'Otros', 'Retoque de cejas ', '2024-10-22 23:51:33', '2024-10-22 23:51:33', 190),
(185, 'Corporal', 'Masaje post_operatorio', '2024-10-10', '13:00', '14:00', 'F', 50000, 'Sinpe', 'Abdomen #1', '2024-10-22 23:59:50', '2024-10-22 23:59:50', 191),
(186, 'Corporal', 'Dep. Cera - Cuerpo Total', '2024-10-10', '18:00', '19:00', 'F', 20000, 'Sinpe', '', '2024-10-23 00:40:16', '2024-10-23 00:40:16', 192),
(187, 'Facial', 'Lifting (ondulado) de pestañas', '2024-10-14', '14:00', '15:00', 'F', 15000, 'Tarjeta', '', '2024-10-23 00:42:59', '2024-10-23 00:42:59', 193),
(188, 'Facial', 'Dermapén facial', '2024-10-15', '17:30', '19:00', 'F', 55000, 'Contado', '30 en efectivo.\r\nSaldo 25 mil ', '2024-10-23 00:47:33', '2024-10-23 00:47:33', 194),
(189, 'Corporal', 'Dep. Def. - Facial', '2024-10-17', '09:00', '09:30', 'F', 25000, 'Sinpe', 'También depilación definitiva de axilas ', '2024-10-23 00:52:56', '2024-10-23 00:52:56', 195),
(190, 'Corporal', 'Paquete de masaje reductivo localizado con aparato', '2024-10-17', '11:00', '12:30', 'F', 0, 'Otros', 'Masaje 1 de paquete corporal ', '2024-10-23 00:54:12', '2024-10-23 00:54:12', 15),
(191, 'Corporal', 'Dep. Cera - Cuerpo Total', '2024-10-17', '13:30', '15:00', 'F', 11000, 'Sinpe', 'Abdomen 2\r\nMás depilación cera ', '2024-10-23 00:55:19', '2024-10-23 00:55:19', 191),
(192, 'Facial', 'Radiofrecuencia facial', '2024-10-18', '21:00', '10:00', 'F', 30000, 'Sinpe', '', '2024-10-23 00:58:59', '2024-10-23 00:58:59', 161),
(193, 'Corporal', 'Dep. Cera - Cuerpo Total', '2024-10-18', '10:00', '10:30', 'F', 14000, 'Sinpe', '', '2024-10-23 01:00:08', '2024-10-23 01:00:08', 61),
(194, 'Corporal', 'Dep. Cera - Cuerpo Total', '2024-10-18', '12:00', '13:00', 'F', 24000, 'Tarjeta', '', '2024-10-23 01:03:38', '2024-10-23 01:03:38', 48),
(195, 'Corporal', 'Paquete de masaje reductivo localizado con aparato', '2024-10-18', '14:00', '15:00', 'F', 12000, 'Contado', '', '2024-10-23 01:04:27', '2024-10-23 01:04:27', 122),
(196, 'Corporal', 'Paquete de masaje reductivo localizado con aparato', '2024-10-18', '16:00', '17:30', 'F', 25000, 'Transferencia', 'Masaje con anita ', '2024-10-23 01:05:25', '2024-10-23 01:05:25', 88),
(197, 'Facial', 'Dermapén facial', '2024-10-18', '10:30', '00:00', 'F', 35000, 'Contado', '', '2024-10-23 01:08:43', '2024-10-23 01:08:43', 196),
(198, 'Corporal', 'Dep. Cera - Facial', '2024-10-19', '11:30', '12:00', 'F', 6000, 'Sinpe', '', '2024-10-23 01:09:56', '2024-10-23 01:09:56', 22),
(199, 'Facial', 'Microblanding de cejas', '2024-10-19', '13:00', '14:30', 'F', 50000, 'Tarjeta', '', '2024-10-23 01:16:33', '2024-10-23 01:16:33', 197),
(200, 'Corporal', 'Dep. Cera - Cuerpo Total', '2024-10-21', '09:00', '10:30', 'F', 0, 'Otros', 'Masaje 10 de paquete ', '2024-10-23 01:20:52', '2024-10-23 01:20:52', 19),
(201, 'Corporal', 'Dep. Cera - Cuerpo Total', '2024-10-23', '17:30', '18:30', 'F', 28000, 'Sinpe', '', '2024-10-24 01:36:49', '2024-10-24 01:36:49', 198),
(202, 'Facial', 'Limpieza facial profunda', '2024-10-22', '14:30', '15:30', 'F', 30000, 'Sinpe', '', '2024-10-24 01:37:47', '2024-10-24 01:37:47', 42),
(203, 'Corporal', 'Dep. Def. - Área bikini', '2024-10-22', '17:00', '17:30', 'F', 20000, 'Sinpe', 'Ipl 2 ', '2024-10-24 01:41:26', '2024-10-24 01:41:26', 155),
(204, 'Facial', 'Dermapén facial', '2024-10-24', '09:00', '10:30', 'F', 30000, 'Sinpe', '', '2024-10-24 16:28:05', '2024-10-24 16:28:05', 199),
(205, 'Corporal', 'Dep. Cera - Cuerpo Total', '2024-10-24', '10:30', '11:19', 'F', 17000, 'Sinpe', '', '2024-10-24 17:20:15', '2024-10-24 17:20:15', 200),
(206, 'Corporal', 'Paquete de masaje reductivo localizado con aparato', '2024-10-24', '11:00', '00:30', 'F', 0, 'Otros', 'Masaje paquete #2', '2024-10-24 17:22:18', '2024-10-24 17:22:18', 15),
(207, 'Corporal', 'Dep. Cera - Área bikini', '2024-10-25', '09:30', '09:53', 'F', 7000, 'Sinpe', '', '2024-10-25 15:53:45', '2024-10-25 15:53:45', 201),
(208, 'Corporal', 'Paquete de masaje reductivo localizado con aparato', '2024-10-24', '16:00', '17:15', 'F', 0, 'Otros', 'Masaje #10', '2024-10-25 15:57:35', '2024-10-25 15:57:35', 70),
(209, 'Corporal', 'Masaje post_operatorio', '2024-10-24', '14:00', '15:15', 'F', 50000, 'Sinpe', 'Masaje #3 ', '2024-10-25 15:58:49', '2024-10-25 15:58:49', 191),
(210, 'Corporal', 'Paquete de masaje reductivo localizado con aparato', '2024-10-25', '14:30', '16:00', 'F', 12000, 'Sinpe', '', '2024-10-25 22:22:24', '2024-10-25 22:22:24', 122),
(211, 'Facial', 'Radiofrecuencia facial', '2024-10-25', '10:29', '12:30', 'F', 35000, 'Sinpe', '', '2024-10-25 22:23:27', '2024-10-25 22:23:27', 202),
(212, 'Corporal', 'Dep. Cera - Cejas', '2024-10-25', '12:00', '12:15', 'F', 3000, 'Sinpe', '', '2024-10-25 22:24:17', '2024-10-25 22:24:17', 135),
(213, 'Corporal', 'Dep. Cera - Cuerpo Total', '2024-10-25', '12:15', '12:50', 'F', 13000, 'Sinpe', '', '2024-10-25 22:25:26', '2024-10-25 22:25:26', 134),
(214, 'Facial', 'Limpieza facial', '2024-10-22', '21:30', '23:00', 'F', 30000, 'Sinpe', '', '2024-10-25 22:28:40', '2024-10-25 22:28:40', 205),
(215, 'Corporal', 'Dep. Cera - Cuerpo Total', '2024-10-17', '15:00', '15:30', 'F', 20000, 'Sinpe', '', '2024-10-25 22:30:38', '2024-10-25 22:30:38', 204),
(216, 'Facial', 'Microblanding de cejas', '2024-10-19', '15:00', '16:30', 'F', 50000, 'Contado', '', '2024-10-25 22:31:56', '2024-10-25 22:31:56', 203),
(217, 'Corporal', 'Dep. Cera - Facial', '2024-10-28', '09:00', '09:30', 'F', 14850, 'Contado', '', '2024-11-01 04:00:07', '2024-11-01 04:00:07', 153),
(218, 'Facial', 'Limpieza facial', '2024-10-28', '11:00', '12:30', 'F', 0, 'Otros', 'Sertificado de regalo', '2024-11-01 04:05:36', '2024-11-01 04:05:36', 207),
(219, 'Corporal', 'Dep. Cera - Pierna completa', '2024-10-30', '10:00', '10:30', 'F', 11000, 'Sinpe', '', '2024-11-01 16:50:03', '2024-11-01 16:50:03', 182),
(220, 'Corporal', 'Paquete de masaje reductivo localizado con aparato', '2024-10-30', '14:00', '15:30', 'F', 12000, 'Sinpe', '', '2024-11-01 16:51:16', '2024-11-01 16:51:16', 122),
(221, 'Facial', 'Microblanding de cejas', '2024-10-30', '16:30', '19:00', 'F', 118000, 'Transferencia', 'Microblanding de cejas más ondulado de pestañas ', '2024-11-01 16:54:13', '2024-11-01 16:54:13', 206),
(222, 'Corporal', 'Masaje Relajante', '2024-10-30', '17:30', '18:30', 'F', 54000, 'Sinpe', 'Masaje crema y depi facial ', '2024-11-01 16:58:03', '2024-11-01 16:58:03', 34),
(223, 'Corporal', 'Dep. Cera - Cuerpo Total', '2024-10-30', '15:30', '16:00', 'F', 12000, 'Sinpe', 'Depilación de miranda hija ', '2024-11-01 23:03:01', '2024-11-01 23:03:01', 209),
(224, 'Corporal', 'Dep. Def. - Media pierna', '2024-10-28', '15:00', '15:30', 'F', 45000, 'Sinpe', 'Depilación de media pierna y axilas de lourdes ', '2024-11-01 23:06:50', '2024-11-01 23:06:50', 210),
(225, 'Corporal', 'Dep. Cera - Cuerpo Total', '2024-10-31', '09:00', '09:30', 'F', 25000, 'Sinpe', '', '2024-11-02 00:32:48', '2024-11-02 00:32:48', 125),
(226, 'Corporal', 'Dep. Cera - Área bikini', '2024-10-31', '09:30', '10:00', 'F', 5000, 'Sinpe', '', '2024-11-02 00:34:42', '2024-11-02 00:34:42', 129),
(227, 'Facial', 'Dermapén facial', '2024-10-31', '10:00', '23:20', 'F', 37000, 'Sinpe', '', '2024-11-02 00:35:45', '2024-11-02 00:35:45', 41),
(228, 'Facial', 'Microblanding de cejas', '2024-10-31', '11:30', '13:00', 'F', 67, 'Sinpe', 'Microblanding cejas y depilación corporal ', '2024-11-02 00:37:26', '2024-11-02 00:37:26', 180),
(229, 'Corporal', 'Masaje post_operatorio', '2024-10-31', '13:30', '14:30', 'F', 10000, 'Contado', '', '2024-11-02 00:51:49', '2024-11-02 00:51:49', 191),
(230, 'Corporal', 'Masaje Relajante', '2024-10-31', '15:00', '16:20', 'F', 25008, 'Contado', '', '2024-11-02 00:52:46', '2024-11-02 00:52:46', 145),
(231, 'Corporal', 'Paquete de masaje reductivo localizado con aparato', '2024-11-01', '09:00', '22:20', 'F', 120000, 'Transferencia', 'Masaje 1  paquete', '2024-11-02 00:59:49', '2024-11-02 00:59:49', 19),
(232, 'Corporal', 'Paquete de masaje reductivo localizado con aparato', '2024-11-01', '11:00', '12:45', 'F', 0, 'Pendiente', 'Masaje 1\r\nDepilación ', '2024-11-02 01:01:57', '2024-11-02 01:01:57', 199),
(233, 'Corporal', 'Dep. Cera - Cuerpo Total', '2024-11-01', '12:00', '12:30', 'F', 14000, 'Tarjeta', '', '2024-11-02 01:02:59', '2024-11-02 01:02:59', 91),
(234, 'Corporal', 'Dep. Def. - Área bikini', '2024-11-01', '13:00', '13:30', 'F', 0, 'Otros', 'Changé ', '2024-11-02 01:04:28', '2024-11-02 01:04:28', 38),
(235, 'Facial', 'Limpieza facial', '2024-11-01', '15:30', '16:40', 'F', 0, 'Otros', 'Certificado de obsequio ', '2024-11-02 01:08:53', '2024-11-02 01:08:53', 208),
(236, 'Corporal', 'Paquete de masaje reductivo localizado con aparato', '2024-11-01', '16:00', '18:20', 'F', 60000, 'Sinpe', 'Masaje con anita\r\nDermapen marce ', '2024-11-02 01:10:26', '2024-11-02 01:10:26', 88),
(237, 'Facial', 'Microblanding de cejas', '2025-01-08', '17:30', '19:00', 'F', 50000, 'Tarjeta', '', '2025-01-12 01:09:27', '2025-01-12 01:09:27', 212),
(238, 'Corporal', 'Dep. Cera - Área bikini', '2025-01-08', '14:30', '15:00', 'F', 10000, 'Sinpe', '', '2025-01-12 01:10:42', '2025-01-12 01:10:42', 181),
(239, 'Facial', 'Microderhabracion efecto glow', '2025-01-08', '13:00', '14:30', 'F', 25000, 'Contado', '', '2025-01-12 01:11:43', '2025-01-12 01:11:43', 163),
(240, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-01-08', '12:30', '13:00', 'F', 14000, 'Sinpe', '', '2025-01-12 01:12:38', '2025-01-12 01:12:38', 59),
(241, 'Facial', 'Microblanding de cejas', '2025-01-08', '15:00', '16:30', 'F', 0, 'Otros', '', '2025-01-12 01:14:07', '2025-01-12 01:14:07', 206),
(242, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-01-09', '12:00', '13:30', 'F', 72000, 'Tarjeta', '', '2025-01-12 01:15:55', '2025-01-12 01:15:55', 124),
(243, 'Corporal', 'Paquete masaje reductivo básico', '2025-01-10', '09:00', '10:30', 'F', 0, 'Otros', '', '2025-01-12 01:17:17', '2025-01-12 01:17:17', 19),
(244, 'Corporal', 'Dep. Cera - Espalda', '2025-01-10', '10:30', '23:00', 'F', 10000, 'Contado', '', '2025-01-12 01:18:08', '2025-01-12 01:18:08', 145),
(245, 'Corporal', 'Dep. Cera - Pierna completa', '2025-01-10', '13:00', '13:30', 'F', 0, 'Otros', '', '2025-01-12 01:20:25', '2025-01-12 01:20:25', 38),
(246, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-01-10', '14:00', '15:00', 'F', 20000, 'Contado', '', '2025-01-12 01:22:04', '2025-01-12 01:22:04', 90),
(247, 'Corporal', 'Dep. Cera - Área bikini', '2025-01-10', '15:00', '15:30', 'F', 5000, 'Sinpe', '', '2025-01-12 01:23:25', '2025-01-12 01:23:25', 129),
(248, 'Facial', 'Lifting (ondulado) de pestañas', '2025-01-10', '15:30', '16:30', 'F', 15000, 'Sinpe', '', '2025-01-12 01:24:16', '2025-01-12 01:24:16', 193),
(249, 'Facial', 'Limpieza facial', '2025-01-08', '09:00', '10:30', 'F', 50000, 'Contado', '', '2025-01-12 01:30:46', '2025-01-12 01:30:46', 213),
(250, 'Corporal', 'Dep. Cera - Cejas', '2025-01-10', '12:00', '12:30', 'F', 3000, 'Sinpe', '', '2025-01-12 01:31:36', '2025-01-12 01:31:36', 214),
(251, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-01-11', '15:30', '16:10', 'F', 12000, 'Sinpe', '', '2025-01-12 01:33:24', '2025-01-12 01:33:24', 192),
(252, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-01-11', '16:30', '17:30', 'F', 25000, 'Sinpe', '', '2025-01-12 01:35:49', '2025-01-12 01:35:49', 198),
(253, 'Facial', 'Radiofrecuencia facial', '2025-02-28', '10:30', '12:00', 'F', 70000, 'Transferencia', 'Radio frecuencia facial y crema despigmentante. ', '2025-02-28 20:42:20', '2025-02-28 20:42:20', 196),
(254, 'Corporal', 'Dep. Cera - Facial', '2025-02-27', '15:00', '15:30', 'F', 6000, 'Tarjeta', '', '2025-02-28 20:44:15', '2025-02-28 20:44:15', 22),
(255, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-02-27', '13:00', '13:30', 'F', 38000, 'Sinpe', '', '2025-02-28 20:45:43', '2025-02-28 20:45:43', 59),
(256, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-02-27', '13:30', '14:00', 'F', 14000, 'Sinpe', '', '2025-02-28 20:46:28', '2025-02-28 20:46:28', 144),
(257, 'Corporal', 'Paquete masaje básico', '2025-02-27', '10:30', '11:45', 'F', 140000, 'Transferencia', 'Paquete de masaje #1', '2025-02-28 20:47:52', '2025-02-28 20:47:52', 19),
(258, 'Corporal', 'Paquete de masaje reductivo localizado con aparato', '2025-02-27', '10:00', '11:45', 'F', 77000, 'Sinpe', 'Masaje #5\r\nAbono a tratamiento ', '2025-02-28 20:49:49', '2025-02-28 20:49:49', 199),
(259, 'Facial', 'Microblanding de cejas', '2025-02-25', '09:30', '20:00', 'F', 165000, 'Sinpe', 'Visita a parrita. 165 total. 40 en efectivo ', '2025-02-28 20:51:50', '2025-02-28 20:51:50', 84),
(260, 'Corporal', 'Masaje con maderitas', '2025-02-24', '21:30', '11:00', 'F', 0, 'Otros', 'Masaje #3', '2025-02-28 20:59:36', '2025-02-28 20:59:36', 219),
(261, 'Facial', 'Limpieza facial profunda', '2025-02-22', '10:00', '11:30', 'F', 30000, 'Sinpe', '', '2025-02-28 21:01:53', '2025-02-28 21:01:53', 195),
(262, 'Facial', 'Radiofrecuencia facial', '2025-02-27', '09:00', '10:30', 'F', 30000, 'Sinpe', 'Facial 20 y 10 de las cremas ', '2025-02-28 21:43:17', '2025-02-28 21:43:17', 27),
(263, 'Facial', 'Orange pelll', '2025-02-21', '09:00', '10:00', 'F', 50000, 'Sinpe', '35 del peeling\r\n25 de cremas ', '2025-02-28 21:45:03', '2025-02-28 21:45:03', 27),
(264, 'Facial', 'Radiofrecuencia facial', '2025-02-21', '10:30', '12:00', 'F', 35000, 'Sinpe', '', '2025-02-28 21:47:52', '2025-02-28 21:47:52', 202),
(265, 'Corporal', 'Dep. Cera - Facial', '2025-02-21', '12:00', '12:30', 'F', 5000, 'Contado', '', '2025-02-28 21:49:47', '2025-02-28 21:49:47', 184),
(266, 'Facial', 'Radiofrecuencia facial', '2025-02-20', '14:00', '15:30', 'F', 35000, 'Sinpe', '', '2025-02-28 21:51:29', '2025-02-28 21:51:29', 41),
(267, 'Corporal', 'Paquete masaje reductivo básico', '2025-05-08', '15:00', '16:30', 'F', 50000, 'Transferencia', 'Abono a tratamiento corporal. 180 _50/130 sado. #1', '2025-05-08 23:48:58', '2025-05-08 23:48:58', 18),
(268, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-05-08', '12:30', '13:00', 'F', 20000, 'Sinpe', '', '2025-05-08 23:50:06', '2025-05-08 23:50:06', 90),
(269, 'Facial', 'Microblanding de cejas', '2025-05-13', '09:00', '19:00', 'F', 108000, 'Sinpe', '3 clientes 2 en sinpe 1 efectivo ', '2025-05-14 18:55:27', '2025-05-14 18:55:27', 84),
(270, 'Corporal', 'Paquete masaje básico', '2025-05-16', '09:00', '10:30', 'F', 0, 'Otros', 'Masaje #9', '2025-05-16 21:26:08', '2025-05-16 21:26:08', 19),
(271, 'Facial', 'Radiofrecuencia facial', '2025-05-16', '10:30', '12:00', 'F', 35000, 'Contado', '', '2025-05-16 21:27:15', '2025-05-16 21:27:15', 196),
(272, 'Corporal', 'Paquete masaje básico', '2025-05-16', '14:00', '15:00', 'F', 0, 'Otros', '', '2025-05-16 21:28:15', '2025-05-16 21:28:15', 18),
(273, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-05-15', '11:00', '12:00', 'F', 23500, 'Sinpe', '', '2025-05-16 21:32:07', '2025-05-16 21:32:07', 224),
(274, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-05-15', '12:00', '12:30', 'F', 15000, 'Sinpe', '', '2025-05-16 21:33:09', '2025-05-16 21:33:09', 91),
(275, 'Corporal', 'Dep. Cera - Cejas', '2025-05-14', '14:00', '14:30', 'F', 6000, 'Sinpe', '', '2025-05-16 21:34:32', '2025-05-16 21:34:32', 22),
(276, 'Facial', 'Microblanding de cejas', '2025-05-13', '09:00', '19:00', 'F', 108000, 'Sinpe', '', '2025-05-16 21:35:29', '2025-05-16 21:35:29', 84),
(277, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-05-12', '10:30', '12:00', 'F', 25000, 'Sinpe', 'Masaje numéro ', '2025-05-16 21:37:07', '2025-05-16 21:37:07', 27),
(278, 'Corporal', 'Masaje con maderitas', '2025-05-12', '09:30', '11:00', 'F', 0, 'Otros', 'Masaje #1 ', '2025-05-16 21:38:18', '2025-05-16 21:38:18', 219),
(279, 'Corporal', 'Masaje post_operatorio', '2025-05-10', '08:00', '09:00', 'F', 15000, 'Sinpe', 'Post solo en la cola ', '2025-05-16 21:39:51', '2025-05-16 21:39:51', 42),
(280, 'Corporal', 'Dep. Def. - Área bikini', '2025-05-09', '17:30', '18:00', 'F', 20000, 'Sinpe', 'Ipl bk #8', '2025-05-16 21:41:30', '2025-05-16 21:41:30', 155),
(281, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-05-09', '16:00', '17:01', 'F', 50000, 'Sinpe', 'Pafo lo de ella + tia y mama ', '2025-05-16 21:42:42', '2025-05-16 21:42:42', 146),
(282, 'Corporal', 'Masaje con maderitas', '2025-05-09', '15:00', '16:30', 'F', 25000, 'Transferencia', '', '2025-05-16 21:43:51', '2025-05-16 21:43:51', 88),
(283, 'Facial', 'Limpieza facial', '2025-05-09', '12:00', '13:30', 'F', 0, 'Otros', 'Sertificado de obsequio ', '2025-05-16 21:47:29', '2025-05-16 21:47:29', 225),
(284, 'Corporal', 'Paquete masaje básico', '2025-05-09', '09:00', '11:00', 'F', 30000, 'Transferencia', 'Masaje #8 y tratamiento facial ', '2025-05-16 21:50:37', '2025-05-16 21:50:37', 19),
(285, 'Corporal', 'Paquete masaje reductivo básico', '2025-05-09', '09:00', '11:00', 'F', 25000, 'Sinpe', 'Masje #7', '2025-05-16 21:52:02', '2025-05-16 21:52:02', 27),
(286, 'Corporal', 'Masaje con maderitas', '2025-05-08', '16:00', '17:30', 'F', 0, 'Otros', '', '2025-05-16 21:53:38', '2025-05-16 21:53:38', 70),
(287, 'Facial', 'Limpieza facial', '2025-05-16', '16:00', '16:30', 'F', 54000, 'Sinpe', 'Compra de producto ', '2025-05-16 21:58:33', '2025-05-16 21:58:33', 226),
(288, 'Corporal', 'Dep. Def. - Área bikini', '2025-05-16', '16:30', '17:00', 'F', 12500, 'Sinpe', 'Abono a tratamiento ipl bk ', '2025-05-16 22:00:19', '2025-05-16 22:00:19', 138),
(289, 'Facial', 'Radiofrecuencia facial', '2025-05-08', '09:00', '10:30', 'F', 40000, 'Sinpe', '', '2025-05-16 22:02:16', '2025-05-16 22:02:16', 47),
(290, 'Corporal', 'Dep. Cera - Área bikini', '2025-05-07', '18:30', '19:00', 'F', 7000, 'Sinpe', '', '2025-05-16 22:03:09', '2025-05-16 22:03:09', 37),
(291, 'Facial', 'Microblanding de cejas', '2025-05-07', '15:00', '16:30', 'F', 50000, 'Sinpe', '', '2025-05-16 22:06:17', '2025-05-16 22:06:17', 227),
(292, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-05-07', '14:00', '14:40', 'F', 15000, 'Tarjeta', '', '2025-05-16 22:13:47', '2025-05-16 22:13:47', 228),
(293, 'Facial', 'Limpieza facial', '2025-05-07', '12:00', '14:00', 'F', 66000, 'Sinpe', 'Comision por trabajo ', '2025-05-16 22:17:14', '2025-05-16 22:17:14', 229),
(294, 'Facial', 'Microderhabracion efecto glow', '2025-05-07', '09:00', '10:00', 'F', 35000, 'Sinpe', '', '2025-05-16 22:17:57', '2025-05-16 22:17:57', 205),
(295, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-05-06', '16:30', '17:15', 'F', 25000, 'Sinpe', '', '2025-05-16 22:20:17', '2025-05-16 22:20:17', 125),
(296, 'Facial', 'Micropigmentacion de ojos 2 líneas', '2025-05-06', '11:00', '12:00', 'F', 80000, 'Tarjeta', '', '2025-05-17 01:19:09', '2025-05-17 01:19:09', 230),
(297, 'Facial', 'Microblanding de cejas', '2025-05-06', '12:00', '13:30', 'F', 100000, 'Tarjeta', '', '2025-05-17 01:19:57', '2025-05-17 01:19:57', 231),
(298, 'Facial', 'Limpieza facial', '2025-05-06', '09:40', '11:00', 'F', 25000, 'Contado', '', '2025-05-17 01:20:57', '2025-05-17 01:20:57', 163),
(299, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-05-06', '09:00', '09:40', 'F', 20000, 'Tarjeta', '', '2025-05-17 01:21:45', '2025-05-17 01:21:45', 48),
(300, 'Corporal', 'Dep. Cera - Área bikini', '2025-05-05', '13:00', '13:30', 'F', 8000, 'Tarjeta', '', '2025-05-17 01:23:48', '2025-05-17 01:23:48', 232),
(301, 'Facial', 'Microblanding de cejas', '2025-05-03', '10:00', '11:30', 'F', 50000, 'Sinpe', '', '2025-05-17 01:28:21', '2025-05-17 01:28:21', 233),
(302, 'Facial', 'Microblanding de cejas', '2025-05-03', '12:30', '14:00', 'F', 50000, 'Sinpe', '', '2025-05-17 01:34:04', '2025-05-17 01:34:04', 234),
(303, 'Corporal', 'Masaje Relajante', '2025-05-03', '15:00', '18:30', 'F', 35000, 'Sinpe', '', '2025-05-17 01:34:54', '2025-05-17 01:34:54', 73),
(304, 'Corporal', 'Paquete de masaje reductivo localizado con aparato', '2025-05-02', '09:00', '11:00', 'F', 25000, 'Sinpe', 'Masaje #6', '2025-05-17 01:36:21', '2025-05-17 01:36:21', 27),
(305, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-05-02', '09:00', '10:30', 'F', 0, 'Otros', 'Masaje #7', '2025-05-17 01:37:47', '2025-05-17 01:37:47', 19),
(306, 'Corporal', 'Masaje con maderitas', '2025-05-02', '15:00', '16:30', 'F', 25000, 'Transferencia', '', '2025-05-17 01:39:56', '2025-05-17 01:39:56', 88),
(307, 'Corporal', 'Dep. Cera - Área bikini', '2025-05-02', '15:30', '16:00', 'F', 7000, 'Sinpe', '', '2025-05-17 01:43:35', '2025-05-17 01:43:35', 235),
(308, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-05-01', '10:00', '10:30', 'F', 14000, 'Sinpe', '', '2025-05-17 01:44:45', '2025-05-17 01:44:45', 144),
(309, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-05-01', '10:30', '11:00', 'F', 14000, 'Sinpe', '', '2025-05-17 01:45:38', '2025-05-17 01:45:38', 59),
(310, 'Facial', 'Limpieza facial', '2025-05-01', '11:30', '13:00', 'F', 37000, 'Tarjeta', '', '2025-05-17 01:46:37', '2025-05-17 01:46:37', 226),
(311, 'Facial', 'Limpieza facial', '2025-05-06', '12:00', '12:05', 'F', 55000, 'Sinpe', 'Venta de producto contorno de ojos ', '2025-05-17 01:48:55', '2025-05-17 01:48:55', 166),
(312, 'Facial', 'Dermapén facial', '2025-04-30', '11:30', '12:30', 'F', 35000, 'Sinpe', '', '2025-05-17 01:49:51', '2025-05-17 01:49:51', 179),
(313, 'Facial', 'Limpieza facial', '2025-05-12', '10:00', '10:05', 'F', 20000, 'Sinpe', 'Venta de producto cc crema 30 mil ', '2025-05-17 01:52:10', '2025-05-17 01:52:10', 122),
(314, 'Facial', 'Dermapén facial', '2025-04-29', '10:30', '12:00', 'F', 35000, 'Pendiente', '', '2025-05-17 01:53:15', '2025-05-17 01:53:15', 199),
(315, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-04-29', '14:00', '15:00', 'F', 25000, 'Pendiente', '', '2025-05-17 01:56:57', '2025-05-17 01:56:57', 180),
(316, 'Corporal', 'Dep. Def. - Facial', '2025-04-29', '16:00', '16:15', 'F', 30000, 'Sinpe', '', '2025-05-17 02:00:58', '2025-05-17 02:00:58', 210),
(317, 'Corporal', 'Dep. Cera - Cejas', '2025-04-29', '17:00', '17:30', 'F', 3000, 'Sinpe', '', '2025-05-17 02:09:05', '2025-05-17 02:09:05', 214),
(318, 'Corporal', 'Masaje con maderitas', '2025-04-28', '09:30', '11:00', 'F', 150000, 'Sinpe', 'Masaje #10 y pago de una el proximo paquete ', '2025-05-17 02:10:24', '2025-05-17 02:10:24', 219),
(319, 'Corporal', 'Masaje post_operatorio', '2025-04-28', '13:30', '14:30', 'F', 0, 'Otros', '', '2025-05-17 20:46:01', '2025-05-17 20:46:01', 191),
(320, 'Corporal', 'Paquete masaje básico', '2025-04-26', '10:00', '11:30', 'F', 0, 'Otros', '', '2025-05-17 20:50:25', '2025-05-17 20:50:25', 19),
(321, 'Corporal', 'Dep. Def. - Facial', '2025-04-26', '13:00', '13:30', 'F', 15000, 'Sinpe', '', '2025-05-17 20:52:05', '2025-05-17 20:52:05', 195),
(322, 'Facial', 'Radiofrecuencia facial', '2025-04-25', '09:00', '10:30', 'F', 35000, 'Sinpe', '', '2025-05-17 20:53:06', '2025-05-17 20:53:06', 27),
(323, 'Facial', 'Mesoterapia facial', '2025-04-25', '15:00', '16:00', 'F', 37000, 'Transferencia', '', '2025-05-17 20:54:11', '2025-05-17 20:54:11', 88),
(324, 'Facial', 'Limpieza facial', '2025-04-25', '16:30', '18:00', 'F', 35000, 'Sinpe', '', '2025-05-17 20:55:10', '2025-05-17 20:55:10', 154),
(325, 'Facial', 'Radiofrecuencia facial', '2025-04-24', '10:30', '12:00', 'F', 35000, 'Sinpe', '', '2025-05-17 20:57:41', '2025-05-17 20:57:41', 41),
(326, 'Corporal', 'Paquete de masaje reductivo localizado con aparato', '2025-04-24', '11:00', '12:30', 'F', 25000, 'Sinpe', 'Masaje #5', '2025-05-17 20:59:03', '2025-05-17 20:59:03', 27),
(327, 'Corporal', 'Dep. Cera - Facial', '2025-04-23', '12:45', '13:15', 'F', 7000, 'Sinpe', '', '2025-05-17 21:08:46', '2025-05-17 21:10:38', 134),
(328, 'Corporal', 'Dep. Cera - Facial', '2025-04-23', '11:00', '11:30', 'F', 7000, 'Tarjeta', '', '2025-05-17 21:10:06', '2025-05-17 21:10:06', 161),
(329, 'Facial', 'Microblanding de cejas', '2025-04-23', '10:00', '11:00', 'F', 0, 'Otros', '', '2025-05-17 21:11:42', '2025-05-17 21:11:42', 128),
(330, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-04-23', '09:30', '10:00', 'F', 10500, 'Pendiente', '', '2025-05-17 21:13:05', '2025-05-17 21:13:05', 199),
(331, 'Facial', 'Limpieza facial', '2025-04-22', '10:00', '11:30', 'F', 50000, 'Sinpe', '', '2025-05-17 21:18:54', '2025-05-17 21:18:54', 163),
(332, 'Corporal', 'Masaje post_operatorio', '2025-04-21', '14:00', '15:00', 'F', 20000, 'Sinpe', 'Masaje #4', '2025-05-17 21:20:19', '2025-05-17 21:21:05', 191),
(333, 'Corporal', 'Masaje con maderitas', '2025-04-21', '09:30', '11:00', 'F', 0, 'Otros', '', '2025-05-17 21:21:58', '2025-05-17 21:21:58', 219),
(334, 'Corporal', 'Paquete de masaje reductivo localizado con aparato', '2025-04-16', '09:30', '11:00', 'F', 25000, 'Sinpe', 'Masaje #4', '2025-05-17 21:36:31', '2025-05-17 21:36:31', 27),
(335, 'Corporal', 'Dep. Cera - Área bikini', '2025-04-16', '10:30', '11:00', 'F', 8000, 'Contado', '', '2025-05-17 21:37:59', '2025-05-17 21:37:59', 63),
(336, 'Corporal', 'Masaje post_operatorio', '2025-04-15', '12:00', '13:00', 'F', 0, 'Otros', 'Masaje #4', '2025-05-17 21:39:33', '2025-05-17 21:39:33', 191),
(337, 'Facial', 'Limpieza facial', '2025-04-15', '15:00', '16:30', 'F', 30000, 'Tarjeta', '', '2025-05-17 21:46:27', '2025-05-17 21:46:27', 48),
(338, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-04-15', '17:30', '19:00', 'F', 42000, 'Sinpe', 'Depi de ella y meme ', '2025-05-17 21:48:35', '2025-05-17 21:48:35', 143),
(339, 'Facial', 'Limpieza facial', '2025-04-14', '09:00', '10:30', 'F', 42500, 'Sinpe', 'Facial +ipl bk ', '2025-05-17 21:50:41', '2025-05-17 21:50:41', 138),
(340, 'Facial', 'Microblanding de cejas', '2025-04-22', '15:00', '16:30', 'F', 22000, 'Sinpe', 'Saldo 28 mil ', '2025-05-17 21:57:42', '2025-05-17 21:57:42', 237),
(341, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-04-15', '08:00', '09:30', 'F', 43500, 'Sinpe', '', '2025-05-17 22:03:03', '2025-05-17 22:03:03', 238),
(342, 'Corporal', 'Dep. Cera - Cejas', '2025-04-12', '14:00', '14:30', 'F', 5000, 'Contado', '', '2025-05-17 22:06:31', '2025-05-17 22:06:31', 184),
(343, 'Corporal', 'Paquete de masaje reductivo localizado con aparato', '2025-04-11', '09:00', '11:00', 'F', 25000, 'Sinpe', 'Masaje #3', '2025-05-17 22:07:45', '2025-05-17 22:07:45', 27),
(344, 'Facial', 'Limpieza facial', '2025-04-11', '10:00', '10:10', 'F', 35000, 'Contado', 'Bloqueador ', '2025-05-17 22:09:09', '2025-05-17 22:09:09', 153),
(345, 'Corporal', 'Dep. Cera - Área bikini', '2025-04-21', '15:30', '16:00', 'F', 7000, 'Sinpe', '', '2025-05-17 22:16:50', '2025-05-17 22:16:50', 200),
(346, 'Facial', 'Microblanding de cejas', '2025-04-11', '14:00', '17:00', 'F', 200000, 'Sinpe', 'Mama y tia cejas ', '2025-05-17 22:19:05', '2025-05-17 22:19:05', 186),
(347, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-04-11', '12:00', '13:00', 'F', 23000, 'Sinpe', '', '2025-05-17 23:49:53', '2025-05-17 23:49:53', 240),
(348, 'Corporal', 'Dep. Cera - Pierna completa', '2025-04-10', '10:00', '11:00', 'F', 14000, 'Sinpe', '', '2025-05-17 23:51:04', '2025-05-17 23:51:04', 61),
(349, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-04-10', '14:00', '15:00', 'F', 24000, 'Sinpe', '', '2025-05-17 23:52:40', '2025-05-17 23:52:40', 198),
(350, 'Corporal', 'Dep. Cera - Cejas', '2025-04-10', '18:00', '18:30', 'F', 3000, 'Sinpe', '', '2025-05-17 23:54:18', '2025-05-17 23:54:18', 214),
(351, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-04-09', '09:00', '10:00', 'F', 24000, 'Tarjeta', '', '2025-05-17 23:55:12', '2025-05-17 23:55:12', 48),
(352, 'Corporal', 'Dep. Cera - Área bikini', '2025-04-09', '11:00', '12:00', 'F', 16000, 'Contado', 'Ella y su amiga ', '2025-05-17 23:59:10', '2025-05-17 23:59:10', 232),
(353, 'Facial', 'Limpieza facial', '2025-04-09', '12:59', '13:30', 'F', 20000, 'Sinpe', '', '2025-05-17 23:59:55', '2025-05-17 23:59:55', 163),
(354, 'Facial', 'Microblanding de cejas', '2025-04-08', '10:00', '11:30', 'F', 50000, 'Sinpe', '', '2025-05-18 00:14:50', '2025-05-18 00:14:50', 241);
INSERT INTO `citas` (`id_cita`, `tratamiento`, `detalle`, `fecha`, `hora_inicio`, `hora_final`, `estado`, `importe`, `modo_pago`, `observaciones_c`, `created_at`, `updated_at`, `id`) VALUES
(355, 'Facial', 'Limpieza facial', '2025-04-08', '13:00', '13:30', 'F', 0, 'Otros', 'Revision botox la doc ', '2025-05-18 00:15:58', '2025-05-18 00:15:58', 242),
(356, 'Facial', 'Dermapén facial', '2025-04-08', '15:00', '16:00', 'F', 60000, 'Sinpe', 'Mas ampolla vitamina c ', '2025-05-18 00:17:27', '2025-05-18 00:17:27', 130),
(357, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-04-08', '16:00', '16:30', 'F', 5000, 'Sinpe', '', '2025-05-18 00:19:54', '2025-05-18 00:19:54', 129),
(358, 'Corporal', 'Dep. Def. - Área bikini', '2025-04-08', '17:00', '17:30', 'F', 20000, 'Sinpe', '', '2025-05-18 00:23:08', '2025-05-18 00:23:08', 155),
(359, 'Facial', 'Microblanding de cejas', '2025-04-11', '10:30', '12:00', 'F', 50000, 'Sinpe', '', '2025-05-18 00:28:15', '2025-05-18 00:28:15', 243),
(360, 'Corporal', 'Masaje con maderitas', '2025-04-07', '09:30', '11:00', 'F', 0, 'Otros', 'Masaje #8', '2025-05-18 00:29:43', '2025-05-18 00:29:43', 219),
(361, 'Corporal', 'Masaje post_operatorio', '2025-04-07', '13:00', '14:00', 'F', 20000, 'Sinpe', '', '2025-05-18 00:30:45', '2025-05-18 00:30:45', 191),
(362, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-04-07', '11:00', '11:30', 'F', 23000, 'Transferencia', '', '2025-05-18 16:00:01', '2025-05-18 16:00:01', 244),
(363, 'Corporal', 'Dep. Cera - Espalda', '2025-04-07', '11:30', '12:00', 'F', 12000, 'Sinpe', '', '2025-05-18 16:00:55', '2025-05-18 16:00:55', 245),
(364, 'Facial', 'Limpieza facial', '2025-04-05', '13:30', '15:00', 'F', 62000, 'Sinpe', '', '2025-05-18 16:02:17', '2025-05-18 16:02:17', 209),
(365, 'Facial', 'Microblanding de cejas', '2025-04-05', '15:00', '16:30', 'F', 50000, 'Transferencia', '', '2025-05-18 16:06:01', '2025-05-18 16:06:01', 132),
(366, 'Corporal', 'Paquete de masaje reductivo localizado con aparato', '2025-04-04', '09:00', '11:00', 'F', 25000, 'Sinpe', 'Masaje #2', '2025-05-18 16:07:38', '2025-05-18 16:07:38', 27),
(367, 'Corporal', 'Dep. Cera - Área bikini', '2025-04-04', '09:00', '09:30', 'F', 10000, 'Tarjeta', '', '2025-05-18 16:16:18', '2025-05-18 16:16:18', 246),
(368, 'Facial', 'Dermapén facial', '2025-04-04', '10:00', '11:30', 'F', 35000, 'Contado', '', '2025-05-18 16:17:22', '2025-05-18 16:17:22', 196),
(369, 'Facial', 'Lifting (ondulado) de pestañas', '2025-04-04', '11:30', '13:00', 'F', 30000, 'Tarjeta', '', '2025-05-18 16:18:41', '2025-05-18 16:18:41', 193),
(370, 'Corporal', 'Dep. Cera - Área bikini', '2025-04-04', '13:30', '14:00', 'F', 7000, 'Sinpe', '', '2025-05-18 16:19:56', '2025-05-18 16:19:56', 235),
(371, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-04-04', '14:30', '15:00', 'F', 14000, 'Sinpe', '', '2025-05-18 16:21:02', '2025-05-18 16:21:02', 59),
(372, 'Corporal', 'Masaje con maderitas', '2025-04-04', '15:00', '16:30', 'F', 25000, 'Transferencia', '', '2025-05-18 16:21:48', '2025-05-18 16:21:48', 88),
(373, 'Facial', 'Mesoterapia facial', '2025-04-03', '09:00', '10:30', 'F', 40000, 'Sinpe', '', '2025-05-18 16:28:16', '2025-05-18 16:28:16', 47),
(374, 'Facial', 'Limpieza facial', '2025-04-03', '15:30', '17:00', 'F', 0, 'Otros', 'Cortesía ', '2025-05-18 16:29:26', '2025-05-18 16:29:26', 40),
(375, 'Facial', 'Yellow peell', '2025-04-03', '17:00', '18:00', 'F', 61000, 'Sinpe', '', '2025-05-18 16:32:41', '2025-05-18 16:32:41', 223),
(376, 'Corporal', 'Dep. Cera - Media pierna', '2025-04-02', '16:30', '17:00', 'F', 10000, 'Sinpe', '', '2025-05-18 16:36:39', '2025-05-18 16:36:39', 122),
(377, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-04-02', '17:00', '18:00', 'F', 20000, 'Sinpe', '', '2025-05-18 16:38:13', '2025-05-18 16:38:13', 90),
(378, 'Facial', 'Microblanding de cejas', '2025-04-01', '09:00', '19:00', 'F', 144000, 'Sinpe', '', '2025-05-18 16:39:59', '2025-05-18 16:39:59', 84),
(379, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-03-31', '10:00', '10:30', 'F', 14000, 'Sinpe', '', '2025-05-18 16:48:55', '2025-05-18 16:48:55', 144),
(380, 'Facial', 'Dermapén facial', '2025-03-31', '12:00', '13:30', 'F', 30000, 'Sinpe', '', '2025-05-18 16:49:48', '2025-05-18 16:49:48', 240),
(381, 'Facial', 'Dermapén facial', '2025-03-31', '15:00', '16:30', 'F', 37000, 'Sinpe', '', '2025-05-18 16:54:02', '2025-05-18 16:54:02', 247),
(382, 'Corporal', 'Paquete masaje básico', '2025-03-28', '09:00', '10:30', 'F', 0, 'Otros', 'Masaje #5', '2025-05-18 16:56:55', '2025-05-18 16:56:55', 19),
(383, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-04-04', '16:00', '16:30', 'F', 18000, 'Sinpe', '', '2025-05-18 18:08:03', '2025-05-18 18:08:03', 248),
(384, 'Corporal', 'Dep. Cera - Cejas', '2025-03-28', '11:00', '11:30', 'F', 5000, 'Contado', '', '2025-05-18 18:09:22', '2025-05-18 18:09:22', 184),
(385, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-03-28', '14:30', '15:30', 'F', 50000, 'Sinpe', 'Mas la tia y la mama ', '2025-05-18 18:12:55', '2025-05-18 18:12:55', 146),
(386, 'Corporal', 'Dep. Cera - Área bikini', '2025-03-28', '14:00', '14:30', 'F', 8000, 'Tarjeta', '', '2025-05-18 18:16:35', '2025-05-18 18:16:35', 249),
(387, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-03-28', '15:30', '16:30', 'F', 25000, 'Sinpe', '', '2025-05-18 18:48:30', '2025-05-18 18:48:30', 147),
(388, 'Corporal', 'Dep. Def. - Área bikini', '2025-03-28', '18:00', '18:20', 'F', 20000, 'Sinpe', '', '2025-05-18 18:50:19', '2025-05-18 18:50:19', 251),
(389, 'Corporal', 'Dep. Cera - Pierna completa', '2025-03-28', '18:20', '19:00', 'F', 12000, 'Sinpe', '', '2025-05-18 18:51:08', '2025-05-18 18:51:08', 252),
(390, 'Facial', 'Limpieza facial', '2025-03-28', '19:00', '20:15', 'F', 35000, 'Sinpe', '', '2025-05-18 18:51:59', '2025-05-18 18:51:59', 28),
(391, 'Facial', 'Microblanding de cejas', '2025-03-27', '09:30', '11:00', 'F', 60000, 'Sinpe', '', '2025-05-18 18:58:26', '2025-05-18 18:58:26', 199),
(392, 'Corporal', 'Paquete de masaje reductivo localizado con aparato', '2025-03-26', '10:00', '11:30', 'F', 25000, 'Sinpe', '', '2025-05-18 18:59:25', '2025-05-18 18:59:25', 27),
(393, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-03-26', '11:00', '11:30', 'F', 20000, 'Sinpe', '', '2025-05-18 19:03:02', '2025-05-18 19:03:02', 204),
(394, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-03-26', '17:30', '18:00', 'F', 17000, 'Sinpe', '', '2025-05-18 22:08:36', '2025-05-18 22:08:36', 150),
(395, 'Facial', 'Dermapén facial', '2025-03-25', '11:00', '12:30', 'F', 35000, 'Sinpe', '', '2025-05-18 22:09:39', '2025-05-18 22:09:39', 27),
(396, 'Corporal', 'Dep. Cera - Área bikini', '2025-03-25', '12:45', '13:30', 'F', 14000, 'Sinpe', '', '2025-05-18 22:12:28', '2025-05-18 22:12:28', 134),
(397, 'Facial', 'Microblanding de cejas', '2025-03-25', '14:00', '15:30', 'F', 50000, 'Contado', '', '2025-05-18 22:13:35', '2025-05-18 22:13:35', 246),
(398, 'Facial', 'Limpieza facial', '2025-03-24', '13:30', '14:30', 'F', 35000, 'Sinpe', '', '2025-05-18 22:25:52', '2025-05-18 22:25:52', 254),
(399, 'Corporal', 'Masaje post_operatorio', '2025-03-24', '15:00', '16:00', 'F', 10000, 'Contado', '', '2025-05-18 22:27:09', '2025-05-18 22:27:09', 191),
(400, 'Facial', 'Dermapén facial', '2025-03-22', '14:00', '15:30', 'F', 45000, 'Sinpe', '', '2025-05-18 22:28:31', '2025-05-18 22:28:31', 128),
(401, 'Facial', 'Limpieza facial', '2025-03-22', '11:00', '12:30', 'F', 30000, 'Sinpe', '', '2025-05-18 22:29:26', '2025-05-18 22:29:26', 252),
(402, 'Corporal', 'Masaje con maderitas', '2025-03-21', '15:00', '16:30', 'F', 25000, 'Sinpe', '', '2025-05-18 22:30:28', '2025-05-18 22:30:28', 88),
(403, 'Facial', 'Limpieza facial', '2025-03-21', '15:00', '16:30', 'F', 35000, 'Sinpe', '', '2025-05-18 22:32:10', '2025-05-18 22:32:10', 136),
(404, 'Corporal', 'Dep. Cera - Área bikini', '2025-03-21', '13:00', '13:30', 'F', 7000, 'Sinpe', '', '2025-05-18 22:33:12', '2025-05-18 22:33:12', 235),
(405, 'Corporal', 'Masaje Relajante', '2025-03-21', '11:00', '12:30', 'F', 35000, 'Sinpe', '', '2025-05-18 22:34:06', '2025-05-18 22:34:06', 34),
(406, 'Facial', 'Dermapén facial', '2025-03-21', '11:00', '12:30', 'F', 35000, 'Contado', '', '2025-05-18 22:34:57', '2025-05-18 22:34:57', 196),
(407, 'Corporal', 'Paquete masaje básico', '2025-03-21', '09:00', '10:30', 'F', 0, 'Otros', 'Masaje #4', '2025-05-18 22:35:52', '2025-05-18 22:35:52', 19),
(408, 'Facial', 'Dermapén facial', '2025-03-20', '10:00', '11:30', 'F', 35000, 'Sinpe', '', '2025-05-18 22:49:51', '2025-05-18 22:49:51', 41),
(409, 'Facial', 'Dermapén facial', '2025-03-20', '14:00', '15:30', 'F', 35000, 'Sinpe', '', '2025-05-18 23:19:53', '2025-05-18 23:19:53', 202),
(410, 'Corporal', 'Dep. Def. - Facial', '2025-03-20', '15:30', '16:00', 'F', 15000, 'Sinpe', 'Ipl ax #9 lourdes', '2025-05-18 23:22:27', '2025-05-18 23:22:27', 210),
(411, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-03-19', '10:00', '10:30', 'F', 14000, 'Sinpe', '', '2025-05-18 23:23:56', '2025-05-18 23:23:56', 59),
(412, 'Corporal', 'Dep. Cera - Área bikini', '2025-03-19', '18:00', '18:30', 'F', 7000, 'Sinpe', '', '2025-05-18 23:25:12', '2025-05-18 23:25:12', 37),
(413, 'Facial', 'Limpieza facial', '2025-03-18', '22:30', '12:00', 'F', 20000, 'Sinpe', '', '2025-05-18 23:25:52', '2025-05-18 23:25:52', 163),
(414, 'Corporal', 'Masaje con maderitas', '2025-03-17', '21:30', '11:00', 'F', 0, 'Otros', '', '2025-05-18 23:26:36', '2025-05-18 23:26:36', 219),
(415, 'Corporal', 'Masaje post_operatorio', '2025-03-17', '15:00', '16:00', 'F', 20000, 'Sinpe', '', '2025-05-18 23:27:27', '2025-05-18 23:27:27', 191),
(416, 'Facial', 'Microblanding de cejas', '2025-03-15', '11:00', '12:30', 'F', 50000, 'Sinpe', '', '2025-05-19 00:53:43', '2025-05-19 00:53:43', 25),
(417, 'Facial', 'Microblanding de cejas', '2025-03-15', '12:30', '14:00', 'F', 50000, 'Sinpe', '', '2025-05-19 00:54:46', '2025-05-19 00:54:46', 82),
(418, 'Facial', 'Microblanding de cejas', '2025-03-15', '14:00', '15:30', 'F', 13000, 'Sinpe', '', '2025-05-19 00:55:36', '2025-05-19 00:55:36', 209),
(419, 'Corporal', 'Paquete masaje básico', '2025-03-14', '09:00', '10:30', 'F', 0, 'Otros', 'Masaje #3', '2025-05-19 00:56:41', '2025-05-19 00:56:41', 19),
(420, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-03-14', '10:30', '11:30', 'F', 24000, 'Tarjeta', '', '2025-05-19 00:57:54', '2025-05-19 00:57:54', 48),
(421, 'Corporal', 'Dep. Cera - Facial', '2025-03-14', '13:00', '13:20', 'F', 6000, 'Sinpe', '', '2025-05-19 00:58:57', '2025-05-19 00:58:57', 22),
(422, 'Facial', 'Microblanding de cejas', '2025-03-15', '22:00', '11:30', 'F', 45000, 'Sinpe', '', '2025-05-19 01:07:22', '2025-05-19 01:07:22', 255),
(423, 'Corporal', 'Dep. Cera - Área bikini', '2025-03-14', '14:00', '14:30', 'F', 8000, 'Sinpe', '', '2025-05-19 01:08:29', '2025-05-19 01:08:29', 256),
(424, 'Corporal', 'Masaje con maderitas', '2025-03-14', '15:00', '16:30', 'F', 25000, 'Transferencia', '', '2025-05-19 01:09:18', '2025-05-19 01:09:18', 88),
(425, 'Corporal', 'Dep. Cera - Bigote', '2025-03-13', '09:30', '10:00', 'F', 6000, 'Transferencia', '', '2025-05-19 01:10:18', '2025-05-19 01:10:18', 244),
(426, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-03-13', '11:30', '12:30', 'F', 0, 'Otros', '', '2025-05-19 01:14:09', '2025-05-19 01:14:09', 180),
(427, 'Corporal', 'Dep. Def. - Área bikini', '2025-03-13', '13:00', '13:30', 'F', 19000, 'Sinpe', 'Cange con gim ', '2025-05-19 01:16:19', '2025-05-19 01:16:19', 38),
(428, 'Corporal', 'Dep. Cera - Cejas', '2025-03-13', '18:30', '19:00', 'F', 3000, 'Sinpe', '', '2025-05-19 01:22:59', '2025-05-19 01:22:59', 236),
(429, 'Facial', 'Microderhabracion efecto glow', '2025-03-12', '09:00', '10:00', 'F', 35000, 'Sinpe', '', '2025-05-19 01:24:05', '2025-05-19 01:24:05', 205),
(430, 'Facial', 'Microderhabracion efecto glow', '2025-03-12', '17:30', '18:30', 'F', 42000, 'Sinpe', '', '2025-05-19 01:26:03', '2025-05-19 01:26:03', 194),
(431, 'Corporal', 'Masaje con maderitas', '2025-03-11', '10:00', '11:30', 'F', 0, 'Otros', '', '2025-05-19 01:27:00', '2025-05-19 01:27:00', 199),
(432, 'Corporal', 'Dep. Cera - Cejas', '2025-03-11', '12:30', '13:00', 'F', 6000, 'Sinpe', '', '2025-05-19 01:32:05', '2025-05-19 01:32:05', 161),
(433, 'Corporal', 'Dep. Cera - Cejas', '2025-03-11', '13:00', '13:30', 'F', 5000, 'Contado', '', '2025-05-19 01:33:20', '2025-05-19 01:33:20', 184),
(434, 'Corporal', 'Masaje con maderitas', '2025-03-10', '09:30', '11:00', 'F', 0, 'Otros', '', '2025-05-19 01:34:08', '2025-05-19 01:34:08', 219),
(435, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-03-10', '11:00', '12:00', 'F', 25000, 'Sinpe', '', '2025-05-19 01:35:01', '2025-05-19 01:35:01', 125),
(436, 'Corporal', 'Dep. Cera - Área bikini', '2025-03-10', '12:00', '12:30', 'F', 8000, 'Tarjeta', '', '2025-05-19 01:35:47', '2025-05-19 01:35:47', 232),
(437, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-03-10', '14:00', '15:00', 'F', 48000, 'Sinpe', '', '2025-05-19 01:38:39', '2025-05-19 01:38:39', 257),
(438, 'Corporal', 'Masaje post_operatorio', '2025-03-10', '15:30', '16:30', 'F', 0, 'Otros', '', '2025-05-19 01:39:33', '2025-05-19 01:39:33', 191),
(439, 'Facial', 'Microblanding de cejas', '2025-03-13', '10:00', '11:30', 'F', 25000, 'Sinpe', '', '2025-05-19 01:43:49', '2025-05-19 01:43:49', 258),
(440, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-04-21', '11:00', '12:00', 'F', 13500, 'Sinpe', '', '2025-05-19 21:30:55', '2025-05-19 21:30:55', 262),
(441, 'Facial', 'Limpieza facial', '2025-04-03', '19:00', '20:30', 'F', 30000, 'Sinpe', '', '2025-05-19 21:34:21', '2025-05-19 21:34:21', 263),
(442, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-03-26', '16:30', '17:30', 'F', 26000, 'Sinpe', '', '2025-05-19 21:36:43', '2025-05-19 21:36:43', 259),
(443, 'Corporal', 'Dep. Cera - Área bikini', '2025-03-28', '10:30', '11:00', 'F', 14000, 'Tarjeta', '', '2025-05-19 21:40:01', '2025-05-19 21:40:01', 264),
(444, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-04-08', '14:30', '14:45', 'F', 3500, 'Contado', '', '2025-05-19 21:41:49', '2025-05-19 21:41:49', 262),
(445, 'Facial', 'Limpieza facial', '2025-03-13', '17:00', '18:30', 'F', 30000, 'Sinpe', '', '2025-05-19 21:44:14', '2025-05-19 21:44:14', 260),
(446, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-03-13', '18:30', '18:35', 'F', 35000, 'Tarjeta', 'Certificado para su esposo ', '2025-05-19 21:45:24', '2025-05-19 21:45:24', 218),
(447, 'Corporal', 'Dep. Def. - Área bikini', '2025-03-07', '17:00', '17:30', 'F', 20000, 'Contado', '', '2025-05-19 21:47:56', '2025-05-19 21:47:56', 155),
(448, 'Corporal', 'Masaje con maderitas', '2025-03-07', '16:00', '17:30', 'F', 25000, 'Transferencia', '', '2025-05-19 21:48:53', '2025-05-19 21:48:53', 88),
(449, 'Facial', 'Limpieza facial', '2025-03-07', '14:00', '15:30', 'F', 42000, 'Sinpe', '', '2025-05-19 21:51:51', '2025-05-19 21:51:51', 265),
(450, 'Facial', 'Microblanding de cejas', '2025-03-07', '10:00', '11:30', 'F', 50000, 'Sinpe', '', '2025-05-19 22:00:48', '2025-05-19 22:00:48', 266),
(451, 'Corporal', 'Dep. Cera - Área bikini', '2025-03-07', '09:30', '10:00', 'F', 8000, 'Tarjeta', '', '2025-05-19 22:01:38', '2025-05-19 22:01:38', 267),
(452, 'Facial', 'Limpieza facial', '2025-03-06', '18:30', '19:30', 'F', 30000, 'Sinpe', 'Regalo a su novio ❤️', '2025-05-19 22:03:43', '2025-05-19 22:03:43', 251),
(453, 'Facial', 'Limpieza facial', '2025-03-06', '13:00', '14:30', 'F', 25000, 'Sinpe', '', '2025-05-19 22:04:42', '2025-05-19 22:04:42', 43),
(454, 'Corporal', 'Paquete masaje reductivo básico', '2025-03-06', '10:00', '11:30', 'F', 0, 'Otros', 'Masaje #2', '2025-05-19 22:05:49', '2025-05-19 22:05:49', 19),
(455, 'Facial', 'Dermapén facial', '2025-03-06', '09:00', '10:00', 'F', 35000, 'Sinpe', '', '2025-05-19 22:06:41', '2025-05-19 22:06:41', 261),
(456, 'Facial', 'Radiofrecuencia facial', '2025-03-05', '09:00', '10:30', 'F', 40000, 'Sinpe', '', '2025-05-19 23:03:29', '2025-05-19 23:03:29', 47),
(457, 'Corporal', 'Dep. Cera - Cejas', '2025-03-05', '11:00', '11:20', 'F', 3000, 'Contado', '', '2025-05-19 23:04:26', '2025-05-19 23:04:26', 135),
(458, 'Corporal', 'Dep. Cera - Pierna completa', '2025-03-05', '11:30', '12:00', 'F', 12000, 'Contado', '', '2025-05-19 23:05:08', '2025-05-19 23:05:08', 182),
(459, 'Corporal', 'Masaje Relajante', '2025-03-05', '13:00', '14:30', 'F', 0, 'Otros', 'Cortesía ', '2025-05-19 23:07:12', '2025-05-19 23:07:12', 43),
(460, 'Facial', 'Limpieza facial', '2025-03-05', '14:00', '14:10', 'F', 25000, 'Contado', '', '2025-05-19 23:08:21', '2025-05-19 23:08:21', 229),
(461, 'Facial', 'Limpieza facial', '2025-03-04', '10:30', '12:00', 'F', 20000, 'Contado', '', '2025-05-19 23:09:17', '2025-05-19 23:09:17', 163),
(462, 'Facial', 'Dermapén facial', '2025-03-04', '14:30', '17:00', 'F', 125000, 'Sinpe', 'Microblanding cejas + ojos + dermapen ', '2025-05-19 23:10:57', '2025-05-19 23:10:57', 128),
(463, 'Corporal', 'Dep. Cera - Facial', '2025-03-04', '17:30', '18:00', 'F', 14000, 'Transferencia', '', '2025-05-19 23:12:21', '2025-05-19 23:12:21', 34),
(464, 'Corporal', 'Dep. Cera - Área bikini', '2025-03-03', '12:00', '12:30', 'F', 10000, 'Sinpe', '', '2025-05-19 23:15:48', '2025-05-19 23:15:48', 181),
(465, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-03-01', '08:00', '08:30', 'F', 17000, 'Sinpe', '', '2025-05-19 23:22:06', '2025-05-19 23:22:06', 268),
(466, 'Corporal', 'Dep. Cera - Facial', '2025-03-01', '08:30', '09:00', 'F', 15000, 'Sinpe', '', '2025-05-19 23:26:17', '2025-05-19 23:26:17', 269),
(467, 'Facial', 'Microblanding de cejas', '2025-03-01', '10:00', '11:30', 'F', 0, 'Otros', 'Retoque de cejas ', '2025-05-19 23:27:11', '2025-05-19 23:27:11', 216),
(468, 'Facial', 'Lifting (ondulado) de pestañas', '2025-03-01', '11:30', '12:30', 'F', 24000, 'Sinpe', '', '2025-05-19 23:28:27', '2025-05-19 23:28:27', 134),
(469, 'Facial', 'Microblanding de cejas', '2025-03-01', '14:00', '15:30', 'F', 40000, 'Sinpe', '', '2025-05-19 23:35:24', '2025-05-19 23:35:24', 270),
(470, 'Facial', 'Limpieza facial', '2025-02-22', '11:30', '12:30', 'F', 30000, 'Contado', '', '2025-05-19 23:49:40', '2025-05-19 23:49:40', 213),
(471, 'Corporal', 'Paquete masaje reductivo básico', '2025-02-20', '09:00', '10:30', 'F', 0, 'Otros', '', '2025-05-19 23:51:44', '2025-05-19 23:51:44', 19),
(472, 'Corporal', 'Dep. Cera - Área bikini', '2025-02-20', '11:00', '11:30', 'F', 8000, 'Sinpe', '', '2025-05-19 23:56:26', '2025-05-19 23:56:26', 272),
(473, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-02-20', '11:45', '12:45', 'F', 25000, 'Sinpe', '', '2025-05-19 23:58:00', '2025-05-19 23:58:00', 125),
(474, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-02-18', '15:00', '16:00', 'F', 21000, 'Sinpe', '', '2025-05-20 00:05:58', '2025-05-20 00:05:58', 273),
(475, 'Corporal', 'Masaje con maderitas', '2025-02-17', '09:30', '11:00', 'F', 0, 'Otros', '', '2025-05-20 00:07:28', '2025-05-20 00:07:28', 219),
(476, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-02-17', '11:30', '12:30', 'F', 24000, 'Sinpe', 'Mama y tia. ', '2025-05-20 00:10:14', '2025-05-20 00:10:14', 146),
(477, 'Corporal', 'Dep. Def. - Facial', '2025-02-17', '17:00', '17:30', 'F', 15000, 'Sinpe', 'Ipl #5', '2025-05-20 00:11:44', '2025-05-20 00:11:44', 195),
(478, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-02-15', '10:00', '11:00', 'F', 24000, 'Tarjeta', '', '2025-05-20 00:22:44', '2025-05-20 00:22:44', 259),
(479, 'Facial', 'Microblanding de cejas', '2025-02-15', '11:00', '13:00', 'F', 80000, 'Sinpe', '+ Facial ', '2025-05-20 01:35:41', '2025-05-20 01:35:41', 275),
(480, 'Facial', 'Microblanding de cejas', '2025-02-15', '13:00', '14:30', 'F', 50000, 'Sinpe', '', '2025-05-20 01:36:48', '2025-05-20 01:36:48', 276),
(481, 'Facial', 'Microderhabracion efecto glow', '2025-02-14', '09:00', '10:00', 'F', 55000, 'Transferencia', '+ masaje corporal ', '2025-05-20 01:38:17', '2025-05-20 01:38:17', 88),
(482, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-02-14', '10:30', '11:30', 'F', 24000, 'Tarjeta', '', '2025-05-20 01:42:38', '2025-05-20 01:42:38', 48),
(483, 'Corporal', 'Dep. Cera - Facial', '2025-02-14', '11:30', '12:00', 'F', 7000, 'Sinpe', '', '2025-05-20 01:44:14', '2025-05-20 01:44:14', 161),
(484, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-02-14', '12:30', '13:15', 'F', 15000, 'Sinpe', '', '2025-05-20 01:45:09', '2025-05-20 01:45:09', 17),
(485, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-02-14', '15:00', '16:00', 'F', 58000, 'Tarjeta', 'Depi + producto', '2025-05-20 01:46:39', '2025-05-20 01:46:39', 124),
(486, 'Corporal', 'Dep. Def. - Área bikini', '2025-02-13', '09:00', '09:30', 'F', 12500, 'Sinpe', '', '2025-05-20 02:06:01', '2025-05-20 02:06:01', 138),
(487, 'Corporal', 'Dep. Cera - Área bikini', '2025-02-13', '09:30', '10:00', 'F', 8000, 'Sinpe', '', '2025-05-20 02:08:16', '2025-05-20 02:08:16', 235),
(488, 'Facial', 'Limpieza facial', '2025-02-13', '22:00', '11:30', 'F', 30000, 'Sinpe', '', '2025-05-20 02:09:29', '2025-05-20 02:09:29', 199),
(489, 'Corporal', 'Masaje con maderitas', '2025-02-13', '11:00', '12:00', 'F', 0, 'Otros', '', '2025-05-20 02:12:16', '2025-05-20 02:12:16', 199),
(490, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-02-13', '15:30', '16:20', 'F', 21000, 'Sinpe', '', '2025-05-20 02:13:45', '2025-05-20 02:13:45', 146),
(491, 'Corporal', 'Dep. Cera - Cuerpo Total', '2025-02-13', '16:30', '17:30', 'F', 23500, 'Sinpe', '', '2025-05-20 02:15:14', '2025-05-20 02:15:14', 238),
(492, 'Corporal', 'Dep. Cera - Área bikini', '2025-02-13', '17:30', '18:00', 'F', 7000, 'Sinpe', '', '2025-05-20 02:21:38', '2025-05-20 02:21:38', 200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE `ciudades` (
  `id_ciudad` int(11) NOT NULL,
  `nombre_ciudad` varchar(255) NOT NULL,
  `id_pais` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`id_ciudad`, `nombre_ciudad`, `id_pais`) VALUES
(17, '10000', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `celular` varchar(50) NOT NULL,
  `edad` date DEFAULT NULL,
  `observaciones` varchar(300) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `continentes`
--

CREATE TABLE `continentes` (
  `id_continente` int(11) NOT NULL,
  `nombre_continente` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `continentes`
--

INSERT INTO `continentes` (`id_continente`, `nombre_continente`) VALUES
(3, 'Facial'),
(4, 'Corporal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `celular` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `tratamiento` varchar(20) NOT NULL,
  `observaciones` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `employees`
--

INSERT INTO `employees` (`id`, `nombre`, `celular`, `fecha`, `email`, `tratamiento`, `observaciones`) VALUES
(14, 'Prueba 1', '76543547', '2023-12-13', 'renangalvan@gmail.com', 'facial', 'nada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesas`
--

CREATE TABLE `mesas` (
  `id_mesa` int(11) NOT NULL,
  `numero_mesa` int(10) NOT NULL,
  `liberacion` int(11) NOT NULL,
  `unidad` int(11) NOT NULL,
  `republicano` int(11) NOT NULL,
  `puriscal_en_marcha` int(11) NOT NULL,
  `personero` varchar(100) NOT NULL,
  `fecha_registro` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `mesas`
--

INSERT INTO `mesas` (`id_mesa`, `numero_mesa`, `liberacion`, `unidad`, `republicano`, `puriscal_en_marcha`, `personero`, `fecha_registro`) VALUES
(9, 712, 34, 25, 30, 15, 'Renan Galvan', '2024-01-30 05:20:22'),
(10, 712, 23, 45, 34, 20, 'Alberto', '2024-01-30 05:22:06'),
(11, 714, 23, 12, 78, 12, 'Pilo', '2024-01-30 05:22:57'),
(12, 761, 23, 12, 56, 23, 'Maria', '2024-01-30 05:23:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `id_pais` int(11) NOT NULL,
  `nombre_pais` varchar(255) NOT NULL,
  `id_continente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id_pais`, `nombre_pais`, `id_continente`) VALUES
(11, 'Limpieza Facial', 3),
(12, 'Limpieza facial profunda', 3),
(13, 'Pedicure', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(50) NOT NULL,
  `detalle_producto` varchar(250) NOT NULL,
  `precio_producto` decimal(10,2) NOT NULL,
  `imagen_producto` varchar(250) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre_producto`, `detalle_producto`, `precio_producto`, `imagen_producto`, `id_categoria`) VALUES
(22, 'Champu Nivea', 'fdhsfadhyas hjgfhgdfasdf hsafdhasfdhad', 20000.00, 'champu.png', 16);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_cita`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`id_ciudad`),
  ADD KEY `pais_id` (`id_pais`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `continentes`
--
ALTER TABLE `continentes`
  ADD PRIMARY KEY (`id_continente`);

--
-- Indices de la tabla `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`id_mesa`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`id_pais`),
  ADD KEY `continente_id` (`id_continente`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=289;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id_cita` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=493;

--
-- AUTO_INCREMENT de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  MODIFY `id_ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `continentes`
--
ALTER TABLE `continentes`
  MODIFY `id_continente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `mesas`
--
ALTER TABLE `mesas`
  MODIFY `id_mesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `id_pais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `id` FOREIGN KEY (`id`) REFERENCES `alumnos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD CONSTRAINT `ciudades_ibfk_1` FOREIGN KEY (`id_pais`) REFERENCES `paises` (`id_pais`);

--
-- Filtros para la tabla `paises`
--
ALTER TABLE `paises`
  ADD CONSTRAINT `paises_ibfk_1` FOREIGN KEY (`id_continente`) REFERENCES `continentes` (`id_continente`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
