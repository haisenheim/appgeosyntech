-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 30 Juin 2020 à 12:00
-- Version du serveur :  10.1.9-MariaDB
-- Version de PHP :  5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `geosyntecdb`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'ETUDES/SUIVI'),
(2, 'GEOGRILLE'),
(3, 'GEOTEXTILE NON-TISSE'),
(4, 'GEOTEXTILE TISSE'),
(5, 'GEOCOMPOSITE'),
(6, 'GSB'),
(7, 'GEOCONTAINER'),
(8, 'MACHINE');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `representant_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `semaine` int(11) NOT NULL DEFAULT '0',
  `moi_id` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `sigle` varchar(25) DEFAULT NULL,
  `identifiant` varchar(12) DEFAULT NULL,
  `annee` int(11) NOT NULL,
  `code` varchar(15) DEFAULT NULL,
  `pay_id` int(11) DEFAULT NULL,
  `ville_id` int(11) DEFAULT '0',
  `secteur_id` int(11) DEFAULT '0',
  `tclient_id` int(11) DEFAULT '0',
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `imageUri` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `clients`
--

INSERT INTO `clients` (`id`, `name`, `address`, `email`, `phone`, `representant_id`, `user_id`, `semaine`, `moi_id`, `active`, `sigle`, `identifiant`, `annee`, `code`, `pay_id`, `ville_id`, `secteur_id`, `tclient_id`, `token`, `created_at`, `updated_at`, `imageUri`) VALUES
(1, 'GEOSYNTHETICS TECHNOLOGIES', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'GEOSYNTECH', 'PR1161', 2016, '000', 1, 1, 1, 1, '356a192b7913b04c54574d18c28d46e6395428ab', NULL, NULL, NULL),
(2, 'SINOHYDRO CORP LTD', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'SYNOHYDRO', 'PR117001', 2017, '001', 2, 1, 1, 1, 'da4b9237bacccdf19c0760cab7aec4a8359010b0', NULL, NULL, NULL),
(3, 'ARAB CONTRACTORS CAMEROUN', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'ARAB CONTRACTORS', 'PR116002', 2016, '002', 3, 1, 1, 1, '77de68daecd823babbb58edb1c8e14d7106e83bb', NULL, NULL, NULL),
(4, 'CHINA RAOD AND BRIDGE CORPORATION ', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'CRBC', 'PR117003', 2017, '003', 2, 1, 1, 1, '1b6453892473a467d07372d45eb05abc2031647a', NULL, NULL, NULL),
(5, 'CGCOC GROUP', 'Une adresse bizarre', 'info@cgcoc.com', '6765653565', 0, 0, 0, 0, 1, 'CGCOC', 'PR117004', 2017, '004', 2, 1, 1, 1, 'ac3478d69a3c81fa62e60f5c3696165a4e5e6ac4', NULL, '2020-04-30 13:30:24', NULL),
(6, 'CHINA RAILWAY N°5 ENGINEERING GROUP CO,LTD', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'CREC5', 'PR119005', 2019, '005', 2, 1, 1, 1, 'c1dfd96eea8cc2b62785275bca38ac261256e278', NULL, NULL, NULL),
(7, 'SECA SERVICE SA', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'SECA', 'PR116006', 2016, '006', 1, 2, 2, 1, '902ba3cda1883801594b6e1b452790cc53948fda', NULL, NULL, NULL),
(8, 'RAZEL BEC', NULL, NULL, NULL, 0, 0, 0, 0, 1, NULL, 'PR115007', 2015, '007', 4, 1, 1, 1, 'fe5dbbcea5ce7e2988b8c69bcfdfde8904aabc1f', NULL, NULL, NULL),
(9, 'GETMA SARL', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'GEMAT', 'PR115008', 2015, '008', 1, 2, 1, 1, '0ade7c2cf97f75d009975f4d720d1fa6c19f4897', NULL, NULL, NULL),
(10, 'FCAI Groupe FAYAT', NULL, NULL, NULL, 0, 0, 0, 0, 1, NULL, 'PR116009', 2016, '009', NULL, 0, 0, 1, 'b1d5781111d84f7b3fe45a0852e59758cd7a87e5', NULL, NULL, NULL),
(11, 'Del-Marine Ltd.', NULL, NULL, NULL, 0, 0, 0, 0, 1, NULL, 'PR116010', 2016, '010', NULL, 0, 0, 1, '17ba0791499db908433b80f37c5fbc89b870084b', NULL, NULL, NULL),
(12, 'SOCIETE BUNS', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'BUNS', 'PR116011', 2016, '011', 1, 1, 1, 1, '7b52009b64fd0a2a49e6d8a939753077792b0554', NULL, NULL, NULL),
(13, 'Angelique Int. India', NULL, NULL, NULL, 0, 0, 0, 0, 1, NULL, 'PR116012', 2016, '012', NULL, 0, 0, 1, 'bd307a3ec329e10a2cff8fb87480823da114f8f4', NULL, NULL, NULL),
(14, 'SETRACO NIGERIA', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'SETRACO', 'PR116013', 2016, '013', 7, 0, 1, 1, 'fa35e192121eabf3dabf9f5ea6abdbcbc107ac3b', NULL, NULL, NULL),
(15, 'ZEROCK GROUP', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'ZEROCK', 'PR116014', 2016, '014', NULL, 1, 1, 1, 'f1abd670358e036c31296e66b3b66c382ac00812', NULL, NULL, NULL),
(16, 'SOGEA SATOM', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'SATOM', 'PR116015', 2016, '015', 4, 1, 1, 1, '1574bddb75c78a6fd2251d61e2993b5146201319', NULL, NULL, NULL),
(17, 'VINCI CONSTRUCTION', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'VINCI', 'PR116016', 2016, '016', 4, 1, 1, 1, '0716d9708d321ffb6a00818614779e779925365c', NULL, NULL, NULL),
(18, 'YENIGUN', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'YENIGUN', 'PR117018', 2017, '018', 8, 2, 1, 1, '9e6a55b6b4563e652a23be9d623ca5055c356940', NULL, NULL, NULL),
(19, 'ATIDOLF NIG LTD', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'ATIDOLF', 'PR117019', 2017, '019', 7, 1, 1, 1, 'b3f0c7f6bb763af1be91d9e74eabfeb199dc1f1f', NULL, NULL, NULL),
(20, 'NOUBRU HOLDING', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'NOUBRU', 'PR117020', 2017, '020', 1, 1, 1, 1, '91032ad7bbcb6cf72875e8e8207dcfba80173f7c', NULL, NULL, NULL),
(21, 'PRIME POTOMAC', NULL, NULL, NULL, 0, 0, 0, 0, 1, NULL, 'PR118021', 2018, '021', 1, 3, 1, 1, '472b07b9fcf2c2451e8781e944bf5f77cd8457c8', NULL, NULL, NULL),
(22, 'BON MACON', NULL, NULL, NULL, 0, 0, 0, 0, 1, NULL, 'PR118022', 2018, '022', 1, 1, 1, 1, '12c6fc06c99a462375eeb3f43dfd832b08ca9e17', NULL, NULL, NULL),
(23, 'DEBAKER MASTER ENGENEERING', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'DEBAKER', 'PR117023', 2017, '023', 1, 1, 1, 1, 'd435a6cdd786300dff204ee7c2ef942d3e9034e2', NULL, NULL, NULL),
(24, 'LABOGEC TCHAD ', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'LABOGEC', 'PR118024', 2018, '024', 1, 1, 1, 1, '4d134bc072212ace2df385dae143139da74ec0ef', NULL, NULL, NULL),
(25, 'SOTCOCOG SA', NULL, NULL, NULL, 0, 0, 0, 0, 1, NULL, 'PR118025', 2018, '025', 9, 4, 1, 1, 'f6e1126cedebf23e1463aee73f9df08783640400', NULL, NULL, NULL),
(26, 'SINOMACH', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'SINOMACH', 'PR118026', 2018, '026', 2, 1, 1, 1, '887309d048beef83ad3eabf2a79a64a389ab1c9f', NULL, NULL, NULL),
(27, 'SHANXI FISRT CONSTRUCTION COMPANY Co.ltd', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'SHANXI', 'PR118027', 2018, '027', 2, 1, 1, 1, 'bc33ea4e26e5e1af1408321416956113a4658763', NULL, NULL, NULL),
(28, 'HYSACAM', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'HYSACAM', 'PR118028', 2018, '028', 1, 2, 2, 1, '0a57cb53ba59c46fc4b692527a38a87c78d84028', NULL, NULL, NULL),
(29, 'SOCIETE BOFAS', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'BOFAS', 'PR119029', 2019, '029', 1, 1, 1, 1, '7719a1c782a1ba91c031a682a0a2f8658209adbf', NULL, NULL, NULL),
(30, 'AFCORP TCHAD', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'AFCORP', 'PR119030', 2019, '030', 9, 4, 1, 1, '22d200f8670dbdb3e253a90eee5098477c95c23d', NULL, NULL, NULL),
(31, 'ENCOBAT', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'ENCOBAT', 'PR119031', 2019, '031', 9, 1, 1, 1, '632667547e7cd3e0466547863e1207a8c0c0c549', NULL, NULL, NULL),
(32, 'ECTA BTP', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'ECTA BTP', 'PR217111', 2017, '111', 1, 1, 1, 2, 'cb4e5208b4cd87268b208e49452ed6e89a68e0b8', NULL, NULL, NULL),
(33, 'STUDI INTERNATIONAL', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'STUDI', 'PR217112', 2017, '112', 10, 1, 1, 2, 'b6692ea5df920cad691c20319a6fffd7a4a766b8', NULL, NULL, NULL),
(34, 'AKKHIBRA', NULL, NULL, NULL, 0, 0, 0, 0, 1, NULL, 'PR215113', 2015, '113', 10, 1, 1, 2, 'f1f836cb4ea6efb2a0b1b99f41ad8b103eff4b59', NULL, NULL, NULL),
(35, 'INTEGC', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'INTEGC', 'PR216114', 2016, '114', 1, 1, 1, 2, '972a67c48192728a34979d9a35164c1295401b71', NULL, NULL, NULL),
(36, 'AIDA', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'AIDA', 'PR218115', 2018, '115', 1, 1, 1, 2, 'fc074d501302eb2b93e2554793fcaf50b3bf7291', NULL, NULL, NULL),
(37, 'SCET TUNISIE', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'SCET TUNISIE', 'PR219116', 2019, '116', 10, 1, 1, 2, 'cb7a1d775e800fd1ee4049f7dca9e041eb9ba083', NULL, NULL, NULL),
(38, 'HUESKER Synthetic GmbH ', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'HUESKER', 'PR217117', 2017, '117', 11, 5, 4, 2, '5b384ce32d8cdef02bc3a139d4cac0a22bb029e8', NULL, NULL, NULL),
(39, 'GEOSYNTHETICS TECHNOLOGIES', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'GEOSYNTECH', 'PR217118', 2017, '118', 1, 1, 4, 2, 'ca3512f4dfa95a03169c5a670a4c91a19b3077b4', NULL, NULL, NULL),
(40, 'DIRECTION GENERALE DES ETUDES MINTP', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'DGET-MINTP', 'PR217119', 2017, '119', 1, 1, 1, 2, 'af3e133428b9e25c55bc59fe534248e6a0c0f17b', NULL, NULL, NULL),
(41, 'LOUIS BERGER', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'LOUIS BERGER', 'PR217120', 2017, '120', 4, 1, 1, 2, '761f22b2c1593d0bb87e0b606f990ba4974706de', NULL, NULL, NULL),
(42, 'MILLENIUM CONSULTING', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'MILLENIUM CONSULTING', 'PR219121', 2019, '121', 12, 6, 1, 2, '92cfceb39d57d914ed8b14d0e37643de0797ae56', NULL, NULL, NULL),
(43, 'SAFEGE AFRIQUE CENTRALE', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'SAFEGE', 'PR217122', 2017, '122', 1, 1, 1, 2, '0286dd552c9bea9a69ecb3759e7b94777635514b', NULL, NULL, NULL),
(44, 'SPEA ENGINEERING', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'SPEA', 'PR217123', 2017, '123', 1, 1, 1, 2, '98fbc42faedc02492397cb5962ea3a3ffc0a9243', NULL, NULL, NULL),
(45, 'Ministère des travaux publics', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'MINTP', 'PR317161', 2017, '161', 1, 1, 5, 3, 'fb644351560d8296fe6da332236b1f8d61b2828a', NULL, NULL, NULL),
(46, 'Direction Génerale des travaux d''infrastructure', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'DGTI-MINTP', 'PR317163', 2017, '163', 1, 1, 5, 3, 'fe2ef495a1152561572949784c16bf23abb28057', NULL, NULL, NULL),
(47, 'Direction des Etudes Techniques Routières et Ouvrages d''Art', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'DETROA-MINTP', 'PR317164', 2017, '164', 1, 1, 5, 3, '827bfc458708f0b442009c9c9836f7e4b65557fb', NULL, NULL, NULL),
(48, 'Délégué régional du Ministère des travaux publics', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'REGIONAL', 'PR317167', 2017, '167', 1, 1, 5, 3, '64e095fe763fc62418378753f9402623bea9e227', NULL, NULL, NULL),
(49, 'Chef céllule BAD/Banque mondiale', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'BAD/BM-MINTP', 'PR318168', 2018, '168', 1, 1, 5, 3, '2e01e17467891f7c933dbaa00e1459d23db3fe4f', NULL, NULL, NULL),
(50, 'Ministère de l''habitat et du développement urbain', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'MINHDU', 'PR317162', 2017, '170', 1, 1, 6, 3, 'e1822db470e60d090affd0956d743cb0e7cdf113', NULL, NULL, NULL),
(51, 'Direction des Ouvrages Urbains', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'DOU-MINHDU', 'PR318163', 2018, '171', 1, 1, 6, 3, 'b7eb6c689c037217079766fdb77c3bac3e51cb4c', NULL, NULL, NULL),
(52, 'Ministère de la Défense', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'MINDEF', 'PR316164', 2016, '176', 1, 1, 7, 3, 'a9334987ece78b6fe8bf130ef00b74847c1d3da6', NULL, NULL, NULL),
(53, 'Genie Militaire', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'GEMI-MINDEF', 'PR317165', 2017, '177', 1, 1, 1, 3, 'c5b76da3e608d34edb07244cd9b875ee86906328', NULL, NULL, NULL),
(54, 'Aéroports du Cameroun', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'ADC', 'PR317163', 2017, '180', 1, 1, 8, 3, '80e28a51cbc26fa4bd34938c5e593b36146f5e0c', NULL, NULL, NULL),
(55, 'Port Autonome de Douala', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'PAD', 'PR317166', 2017, '184', 1, 2, 9, 3, '8effee409c625e1a2d8f5033631840e6ce1dcb64', NULL, NULL, NULL),
(56, 'Barrage hydroélectrique de Mekin', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'HYDRO MEKIN', 'PR319188', 2019, '188', 1, 7, 10, 3, '54ceb91256e8190e474aa752a6e0650a2df5ba37', NULL, NULL, NULL),
(57, 'PETROL AND MINING INVEST S.A.', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'P&M INVEST', 'PR319178', 2019, '190', 13, 8, 11, 3, '9109c85a45b703f87f1413a405549a2cea9ab556', NULL, NULL, NULL),
(58, 'Société Nationale de Rafinage', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'SONARA', 'PR319180', 2019, '192', 1, 9, 11, 3, '667be543b02294b7624119adc3a725473df39885', NULL, NULL, NULL),
(59, 'Alluminium du Cameroun', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'ALUCAM', 'PR319182', 2019, '194', 1, 10, 12, 3, '5a5b0f9b7d3f8fc84c3cef8fd8efaaa6c70d75ab', NULL, NULL, NULL),
(60, 'Agence Francaise de Dévéloppement', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'AFD', 'PR319184', 2019, '196', 4, 1, 13, 3, 'e6c3dd630428fd54834172b8fd2735fed9416da4', NULL, NULL, NULL),
(61, 'Plan National d''Urbanisme et de Dévéloppement', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'PNUD', 'PR319185', 2019, '197', 1, 1, 13, 3, '6c1e671f9af5b46d9c1a52067bdf0e53685674f7', NULL, NULL, NULL),
(62, 'Banque Africaine de Devéloppement', NULL, NULL, NULL, 0, 0, 0, 0, 1, 'BAD', 'PR318186', 2018, '198', 1, 1, 13, 3, '511a418e72591eb7e33f703f04c3fa16df6c90bd', NULL, NULL, NULL),
(63, 'ABDOULLAHI ALIOU', NULL, NULL, NULL, 0, 0, 0, 0, 1, NULL, 'PR417211', 2017, '211', 1, 1, 14, 4, 'a17554a0d2b15a664c0e73900184544f19e70227', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `domaines`
--

CREATE TABLE `domaines` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `domaines`
--

INSERT INTO `domaines` (`id`, `name`, `color`) VALUES
(1, 'ENVIRONNEMENT', 'success'),
(2, 'TERRASSEMENT', 'danger'),
(3, 'MINES', 'warning'),
(4, 'ROUTES', 'secondary'),
(5, 'AGRICULTURE', 'info'),
(6, 'HYDRAULIQUE', 'primary'),
(7, 'INFORMATIQUE', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `domaines_projets`
--

CREATE TABLE `domaines_projets` (
  `id` int(11) NOT NULL,
  `projet_id` int(11) NOT NULL DEFAULT '0',
  `domaine_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `domaines_projets`
--

INSERT INTO `domaines_projets` (`id`, `projet_id`, `domaine_id`) VALUES
(3, 1, 4),
(4, 1, 5),
(5, 1, 7);

-- --------------------------------------------------------

--
-- Structure de la table `etapes`
--

CREATE TABLE `etapes` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `sequence` int(11) NOT NULL DEFAULT '1',
  `phase_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `etapes`
--

INSERT INTO `etapes` (`id`, `name`, `sequence`, `phase_id`) VALUES
(1, 'Prospection', 1, 1),
(2, 'APS', 2, 1),
(3, 'APD', 3, 1),
(4, 'Maîtrise d''oeuvre\r\n', 1, 2),
(5, 'Contractant', 2, 2),
(6, 'Variante', 3, 2),
(7, 'Fourniture', 4, 2),
(8, 'Assistance', 5, 2);

-- --------------------------------------------------------

--
-- Structure de la table `forders`
--

CREATE TABLE `forders` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `projet_id` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `jour` date DEFAULT NULL,
  `semaine` int(11) NOT NULL DEFAULT '0',
  `moi_id` int(11) NOT NULL DEFAULT '0',
  `annee` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `note_speciale` text,
  `modalites_paiement` text,
  `fournisseur_id` int(11) NOT NULL DEFAULT '0',
  `billnum` varchar(20) DEFAULT NULL,
  `facture_id` int(11) DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `forders`
--

INSERT INTO `forders` (`id`, `name`, `projet_id`, `created_at`, `updated_at`, `jour`, `semaine`, `moi_id`, `annee`, `user_id`, `note_speciale`, `modalites_paiement`, `fournisseur_id`, `billnum`, `facture_id`, `active`, `token`) VALUES
(1, '2005071910', 1, '2020-05-07 13:50:37', '2020-05-07 13:50:37', '2020-05-08', 19, 5, 2020, 1, '<ol>\r\n<li>Premiere note</li>\r\n<li>Deuxieme note</li>\r\n<li>Une derniere note</li>\r\n</ol>', '<ul style="list-style-type: circle;">\r\n<li>Une premier paiement de<strong> 38%</strong></li>\r\n<li>Un deuxieme</li>\r\n<li>Etc ...</li>\r\n</ul>', 1, NULL, 0, 1, 'd9cdad209f1f17be21f2680f6bc854ed655354a5');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseurs`
--

CREATE TABLE `fournisseurs` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `sigle` varchar(12) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `identifiant` varchar(12) DEFAULT NULL,
  `annee` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `pay_id` int(11) NOT NULL DEFAULT '0',
  `ville_id` int(11) NOT NULL DEFAULT '0',
  `secteur_id` int(11) NOT NULL DEFAULT '0',
  `semaine` int(11) NOT NULL DEFAULT '0',
  `moi_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `token` varchar(255) DEFAULT NULL,
  `imageUri` varchar(200) DEFAULT NULL,
  `transitaire` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `fournisseurs`
--

INSERT INTO `fournisseurs` (`id`, `name`, `sigle`, `address`, `phone`, `email`, `identifiant`, `annee`, `code`, `pay_id`, `ville_id`, `secteur_id`, `semaine`, `moi_id`, `user_id`, `created_at`, `updated_at`, `active`, `token`, `imageUri`, `transitaire`) VALUES
(1, 'HUESKER SYNTHETIC GmbH', 'HUESKER', ' Fabrikstraße 13-15, 48712 Gescher, Germany 		\n', NULL, NULL, 'PR517240', 2017, 240, 11, 5, 4, 0, 0, 0, NULL, '2020-05-06 17:20:10', 1, NULL, NULL, 0),
(2, 'DAMCO Cameroun S.A', 'DAMCO', NULL, NULL, NULL, 'PR517241', 2017, 241, 1, 2, 15, 0, 0, 0, NULL, NULL, 1, NULL, NULL, 1),
(3, 'DHL Global  Forwarding Cameroun.', 'DHL GF', NULL, NULL, NULL, 'PR518242', 2018, 242, 1, 2, 15, 0, 0, 0, NULL, NULL, 1, NULL, NULL, 1),
(4, 'SOTRAFA SA', NULL, NULL, NULL, NULL, 'PR518243', 2018, 243, 14, 11, 4, 0, 0, 0, NULL, NULL, 1, NULL, NULL, 0),
(5, 'KULU SEVICE', 'KULU', NULL, NULL, NULL, 'PR518244', 2018, 244, 1, 2, 16, 0, 0, 0, NULL, NULL, 1, NULL, NULL, 0),
(6, 'RIB COMPOSITES', 'RIB', NULL, NULL, NULL, 'PR519245', 2019, 245, 4, 12, 4, 0, 0, 0, NULL, NULL, 1, NULL, NULL, 0),
(7, 'GSE', 'GSE', NULL, NULL, NULL, 'PR517246', 2017, 246, 11, 5, 4, 0, 0, 0, NULL, NULL, 1, NULL, NULL, 0),
(8, 'GEOSYNTEC', 'GEOSYNTEC', NULL, NULL, NULL, NULL, 2018, 0, 1, 1, 1, 0, 0, 0, NULL, NULL, 1, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `frncotations`
--

CREATE TABLE `frncotations` (
  `id` int(11) NOT NULL,
  `fournisseur_id` int(11) NOT NULL DEFAULT '0',
  `expected_informations` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `semaine` int(11) NOT NULL DEFAULT '0',
  `moi_id` int(11) DEFAULT '0',
  `annee` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `frncotations`
--

INSERT INTO `frncotations` (`id`, `fournisseur_id`, `expected_informations`, `created_at`, `updated_at`, `semaine`, `moi_id`, `annee`, `active`, `user_id`, `token`) VALUES
(1, 1, '<ul>\r\n<li>Condition 1</li>\r\n<li>Condition 2</li>\r\n<li>Condition 3</li>\r\n</ul>', '2020-05-06 21:26:34', '2020-05-06 21:26:34', 19, 5, 2020, 1, 1, '583eaf62aa7e257e0ac1042a7317701198c32ad2');

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `uri` varchar(100) NOT NULL,
  `livraison_id` int(11) NOT NULL DEFAULT '0',
  `projet_id` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `size` double NOT NULL DEFAULT '0',
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `images`
--

INSERT INTO `images` (`id`, `name`, `uri`, `livraison_id`, `projet_id`, `created_at`, `updated_at`, `size`, `token`) VALUES
(1, 'image 1', 'livraisons/da08fa45155fe87f919ee97816e2ba688eb588a4.jpg', 1, 0, '2020-05-08 14:22:56', '2020-05-08 14:22:56', 0, 'da08fa45155fe87f919ee97816e2ba688eb588a4'),
(2, 'image2', 'livraisons/3130a845df00d8f2c522b78c4b27445625a28bbc.jpg', 1, 0, '2020-05-08 14:42:31', '2020-05-08 14:42:31', 0, '3130a845df00d8f2c522b78c4b27445625a28bbc');

-- --------------------------------------------------------

--
-- Structure de la table `import_options`
--

CREATE TABLE `import_options` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `import_options`
--

INSERT INTO `import_options` (`id`, `name`) VALUES
(1, 'Port to Door'),
(2, 'Port to Port'),
(3, 'Door to Door');

-- --------------------------------------------------------

--
-- Structure de la table `lcotations`
--

CREATE TABLE `lcotations` (
  `id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL DEFAULT '0',
  `transcotation_id` int(11) NOT NULL DEFAULT '0',
  `frncotation_id` int(11) NOT NULL DEFAULT '0',
  `quantity` double DEFAULT '0',
  `price` double DEFAULT '0',
  `devise_id` int(11) DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `lcotations`
--

INSERT INTO `lcotations` (`id`, `produit_id`, `transcotation_id`, `frncotation_id`, `quantity`, `price`, `devise_id`, `active`) VALUES
(1, 16, 1, 0, 379, 1.85, 0, 1),
(3, 19, 1, 0, 45, 23, 0, 1),
(4, 27, 1, 0, 459, 24, 0, 1),
(5, 16, 0, 1, 23.97, 1.85, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `lforders`
--

CREATE TABLE `lforders` (
  `id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL DEFAULT '0',
  `forder_id` int(11) NOT NULL DEFAULT '0',
  `quantity` double NOT NULL DEFAULT '0',
  `unit_id` int(11) NOT NULL DEFAULT '0',
  `price` double NOT NULL DEFAULT '0',
  `devise_id` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `lforders`
--

INSERT INTO `lforders` (`id`, `produit_id`, `forder_id`, `quantity`, `unit_id`, `price`, `devise_id`, `active`) VALUES
(1, 16, 1, 234.54, 0, 1.85, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `lignlivs`
--

CREATE TABLE `lignlivs` (
  `id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL DEFAULT '0',
  `livraison_id` int(11) NOT NULL DEFAULT '0',
  `observations` text,
  `quantity` double NOT NULL DEFAULT '0',
  `longueur` double DEFAULT '0',
  `largeur` double DEFAULT '0',
  `nombre` int(11) NOT NULL DEFAULT '0',
  `unit_id` int(11) DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `lignlivs`
--

INSERT INTO `lignlivs` (`id`, `produit_id`, `livraison_id`, `observations`, `quantity`, `longueur`, `largeur`, `nombre`, `unit_id`, `active`) VALUES
(1, 16, 1, 'Une petite observation', 72200, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `livraisons`
--

CREATE TABLE `livraisons` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `client_id` int(11) NOT NULL DEFAULT '0',
  `fournisseur_id` int(11) NOT NULL DEFAULT '0',
  `bcnum` varchar(20) DEFAULT NULL,
  `transport_option_id` int(11) NOT NULL DEFAULT '0',
  `modalites_paiement` text,
  `jour` date DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `semaine` int(11) NOT NULL DEFAULT '0',
  `moi_id` int(11) NOT NULL DEFAULT '0',
  `annee` int(11) NOT NULL DEFAULT '0',
  `observation` text,
  `presence_client` text,
  `presence_fournisseur` text,
  `file_uri` varchar(100) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `token` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `livraisons`
--

INSERT INTO `livraisons` (`id`, `name`, `client_id`, `fournisseur_id`, `bcnum`, `transport_option_id`, `modalites_paiement`, `jour`, `created_at`, `updated_at`, `semaine`, `moi_id`, `annee`, `observation`, `presence_client`, `presence_fournisseur`, `file_uri`, `active`, `token`, `user_id`) VALUES
(1, '2005081910', 2, 1, 'RN4-LOT2-2019-001', 1, '<ul>\r\n<li>35% d''avance</li>\r\n<li>26% au milieu</li>\r\n<li>etc ...</li>\r\n</ul>\r\n<p>&nbsp;</p>', '2020-05-07', '2020-05-08 10:21:51', '2020-05-08 15:15:59', 19, 5, 2020, '<p>Quelques observations de base</p>', '<ul>\r\n<li>Armel Belinga</li>\r\n</ul>', '<ul>\r\n<li>Un premier chinois</li>\r\n<li>un deuxieme chinois</li>\r\n<li>etc ..</li>\r\n</ul>', NULL, 1, '1b4fa9cc2b51dde5d70ddb6f37f6e1a35823494b', 1);

-- --------------------------------------------------------

--
-- Structure de la table `lproformas`
--

CREATE TABLE `lproformas` (
  `id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL DEFAULT '0',
  `proforma_id` int(11) NOT NULL DEFAULT '0',
  `quantity` double NOT NULL DEFAULT '0',
  `unit_id` int(11) DEFAULT '0',
  `price` double NOT NULL DEFAULT '0',
  `devise_id` int(11) DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `lproformas`
--

INSERT INTO `lproformas` (`id`, `produit_id`, `proforma_id`, `quantity`, `unit_id`, `price`, `devise_id`, `active`) VALUES
(1, 16, 1, 72000, 0, 2823, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `mois`
--

CREATE TABLE `mois` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `mois`
--

INSERT INTO `mois` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'JANVIER', NULL, NULL),
(2, 'FEVRIER', NULL, NULL),
(3, 'MARS', NULL, NULL),
(4, 'AVRIL', NULL, NULL),
(5, 'MAI', NULL, NULL),
(6, 'JUIN', NULL, NULL),
(7, 'JUILLET', NULL, NULL),
(8, 'AOUT', NULL, NULL),
(9, 'SEPTEMBRE', NULL, NULL),
(10, 'OCTOBRE', NULL, NULL),
(11, 'NOVEMBRE', NULL, NULL),
(12, 'DECEMBRE', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `pays`
--

INSERT INTO `pays` (`id`, `name`) VALUES
(1, 'Cameroun'),
(2, 'Chine'),
(3, 'Egypte'),
(4, 'France'),
(7, 'Nigeria'),
(8, 'Turquie'),
(9, 'TCHAD'),
(10, 'Tunisie'),
(11, 'Allemagne'),
(12, 'MAROC'),
(13, 'REP. GUINEE'),
(14, 'ESPAGNE'),
(15, 'GHANA');

-- --------------------------------------------------------

--
-- Structure de la table `phases`
--

CREATE TABLE `phases` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `sequence` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `phases`
--

INSERT INTO `phases` (`id`, `name`, `sequence`) VALUES
(1, 'PHASE D''ETUDE DU PROJET', 1),
(2, 'PHASE D''EXECUTION DU PROJET', 2);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `num2` int(11) NOT NULL,
  `code` varchar(12) DEFAULT NULL,
  `num3` int(11) NOT NULL,
  `num4` int(11) NOT NULL,
  `type` varchar(25) DEFAULT NULL,
  `name1` varchar(12) DEFAULT NULL,
  `name2` varchar(45) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `largeur` decimal(12,2) DEFAULT NULL,
  `longueur` decimal(11,2) DEFAULT NULL,
  `diametre` decimal(11,2) DEFAULT NULL,
  `poids` decimal(12,2) DEFAULT NULL,
  `volume` decimal(12,2) DEFAULT NULL,
  `autre` int(11) NOT NULL,
  `fournisseur_id` int(11) NOT NULL DEFAULT '0',
  `tproduit_id` int(11) NOT NULL DEFAULT '0',
  `category_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`id`, `num`, `num2`, `code`, `num3`, `num4`, `type`, `name1`, `name2`, `description`, `largeur`, `longueur`, `diametre`, `poids`, `volume`, `autre`, `fournisseur_id`, `tproduit_id`, `category_id`) VALUES
(1, 101, 1, '0101190', 1, 90, 'ETUDES/SUIVI', 'DESIGN', ' & SUIVI', 'Etude d''exécution d''une variante géosynthéque ; le suivi à l''exécution et l''assistance technique à la réalisation du projet. ', NULL, '0.00', '0.00', NULL, NULL, 0, 8, 1, 1),
(2, 102, 2, '0102190', 1, 90, 'ETUDES/SUIVI', NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 8, 0, 1),
(3, 1101, 1, '110124010', 240, 10, 'GEOGRILLE', 'Fortrac®', '80 T', 'Geosynthetics Mat for Earth Wall Reinforcement, with protective polymer\ncoating, for technical use. Mass per unit area ca 320 g/m2\nUltimate Tensile Strength long./trans. >=80 kN/m', '5.00', '200.00', '38.00', NULL, NULL, 0, 1, 3, 2),
(4, 1102, 2, '110224010', 240, 10, 'GEOGRILLE', 'Fortrac®', '110 T', 'Geosynthetics Mat for Earth Wall Reinforcement, for technical use', '5.00', '200.00', '38.00', NULL, NULL, 0, 1, 3, 2),
(5, 1103, 3, '110324010', 240, 10, 'GEOGRILLE', 'Fortrac®', '150 T', 'Geosynthetics Mat for Earth Wall Reinforcement, for technical use', '5.00', '200.00', '38.00', NULL, NULL, 0, 1, 3, 2),
(6, 1104, 4, '110424010', 240, 10, 'GEOGRILLE', 'Fortrac®', '200 T', 'Geosynthetics Mat for Earth Wall Reinforcement, with protective polymer\ncoating, for technical use. Mass per unit area ca 530 g/m2\nUltimate Tensile Strength long./trans. >=200 kN/m', '5.00', '200.00', '52.00', NULL, NULL, 0, 1, 3, 2),
(7, 1105, 5, '110524010', 240, 10, 'GEOGRILLE', 'Fortrac®', 'R 300/50-30 T', 'Geosynthetics Mat for Earth Wall Reinforcement, for technical use', '5.00', '200.00', '0.00', NULL, NULL, 0, 1, 3, 2),
(8, 1106, 6, '110624010', 240, 10, 'GEOGRILLE', 'Fortrac®', 'R 400/50-30 T', 'Geosynthetics Mat for Earth Wall Reinforcement, for technical use', '5.00', '200.00', '0.00', NULL, NULL, 0, 1, 3, 2),
(9, 1107, 7, '110724010', 240, 10, 'GEOGRILLE', 'Fortrac®', NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 3, 2),
(10, 1108, 8, '110824010', 240, 10, 'GEOGRILLE', 'Fortrac®', NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 3, 2),
(11, 1109, 9, '110924010', 240, 10, 'GEOGRILLE', 'Fortrac®', NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 3, 2),
(12, 1110, 10, '111024010', 240, 10, 'GEOGRILLE', 'Fortrac®', '3D', NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 3, 2),
(13, 1201, 11, '120124010', 240, 10, 'GEOGRILLE', 'HaTelit®', 'C 40/17', NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 4, 2),
(14, 1202, 12, '120224010', 240, 10, 'GEOGRILLE', 'HaTelit®', 'XP 50', NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 4, 2),
(15, 1203, 13, '120324010', 240, 10, 'GEOGRILLE', 'HaTelit®', 'G 50', NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 4, 2),
(16, 1204, 14, '120424010', 240, 10, 'GEOGRILLE', 'HaTelit®', 'G 100', 'Flexible geosynthetic Mat for Asphalt Reinforcement made from glass-fibres.', '3.80', '100.00', '38.00', '254.10', '0.55', 70199000, 1, 4, 2),
(17, 1205, 15, '120524010', 240, 10, 'GEOGRILLE', 'HaTelit®', 'BL', NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 4, 2),
(18, 1206, 16, '120624010', 240, 10, 'GEOGRILLE', 'HaTe®', 'MV 300', 'Mixed nonwoven, multicolor, Geosynthetic Mat for separation and filtration,\nfor technical use. Mass per unit area : 300 g/m²,GRK 2 ', NULL, '0.00', '0.00', NULL, NULL, 0, 1, 5, 2),
(19, 1207, 17, '120724010', 240, 10, 'GEOGRILLE', 'HaTe®', 'Drain 1B1 WAS7', NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 5, 2),
(20, 1208, 18, '120824010', 240, 10, 'GEOGRILLE', 'HaTe®', '23.142/GR', NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 5, 2),
(21, 1209, 19, '120924030', 240, 30, 'GEOTEXTILE NON-TISSE', 'HaTe®', 'A1000', NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 5, 3),
(22, 1210, 20, '121024031', 240, 31, 'GEOTEXTILE NON-TISSE', 'HaTe®', 'B500', NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 5, 3),
(23, 1211, 21, '121124032', 240, 32, 'GEOTEXTILE NON-TISSE', 'PP®', '80/80', NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 6, 3),
(24, 1301, 22, '130124010', 240, 10, 'GEOGRILLE', 'MineGrid®', NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 7, 2),
(25, 1302, 23, '130224010', 240, 10, 'GEOGRILLE', 'MineGrid®', NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 7, 2),
(26, 1303, 24, '130324011', 240, 11, 'GEOGRILLE', 'MineGrid®', NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 7, 2),
(27, 1401, 25, '140124020', 240, 20, 'GEOTEXTILE TISSE', 'Stabilenka®', '100/50', 'Woven geotextile from PES.', '5.00', '150.00', '0.00', NULL, NULL, 0, 1, 8, 4),
(28, 1402, 26, '140224020', 240, 20, 'GEOTEXTILE TISSE', 'Stabilenka®', '200/45', 'Woven geotextile from PES.', '5.00', '150.00', '0.00', NULL, NULL, 0, 1, 8, 4),
(29, 1403, 27, '140324020', 240, 20, 'GEOTEXTILE TISSE', 'Stabilenka®', '400/50', 'Woven geotextile from PES.', '5.00', '150.00', '0.00', NULL, NULL, 0, 1, 8, 4),
(30, 1404, 28, '140424020', 240, 20, 'GEOTEXTILE TISSE', 'Stabilenka®', '600/50', 'Woven geotextile from PES.', '5.00', '150.00', '0.00', NULL, NULL, 0, 1, 8, 4),
(31, 1405, 29, '140524020', 240, 20, 'GEOTEXTILE TISSE', 'Stabilenka®', '800/100', 'Woven geotextile from PES.', '5.00', '150.00', '0.00', NULL, NULL, 0, 1, 8, 4),
(32, 1406, 30, '140624020', 240, 20, 'GEOTEXTILE TISSE', 'Stabilenka®', '1200', 'Woven geotextile from PES.', '5.00', '150.00', '0.00', NULL, NULL, 0, 1, 8, 4),
(33, 1407, 31, '140724020', 240, 20, 'GEOTEXTILE TISSE', 'Stabilenka®', '1800', 'Woven geotextile from PES.', '5.00', '150.00', '0.00', NULL, NULL, 0, 1, 8, 4),
(34, 1501, 32, '150124020', 240, 20, 'GEOTEXTILE TISSE', 'Robutec®', NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 9, 4),
(35, 1502, 33, '150224020', 240, 20, 'GEOTEXTILE TISSE', 'Robutec®', NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 9, 4),
(36, 1503, 34, '150324020', 240, 20, 'GEOTEXTILE TISSE', 'Robutec®', NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 9, 4),
(37, 1504, 35, '150424020', 240, 20, 'GEOTEXTILE TISSE', 'Robutec®', NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 9, 4),
(38, 1601, 36, '160124020', 240, 20, 'GEOTEXTILE TISSE', 'Ringtrac®', NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 10, 4),
(39, 1602, 37, '160224020', 240, 20, 'GEOTEXTILE TISSE', 'Ringtrac®', NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 10, 4),
(40, 1603, 38, '160324020', 240, 20, 'GEOTEXTILE TISSE', 'Ringtrac®', NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 10, 4),
(41, 1604, 39, '160424020', 240, 20, 'GEOTEXTILE TISSE', 'Ringtrac®', NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 10, 4),
(42, 1701, 40, '170124020', 240, 20, 'GEOTEXTILE TISSE', 'Basetrac®', 'Woven', NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 11, 4),
(43, 1702, 41, '170224030', 240, 30, 'GEOTEXTILE NON-TISSE', 'Non-tissés', NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 12, 3),
(44, 1703, 42, '170324010', 240, 10, 'GEOGRILLE', 'Basetrac®', 'Grid PVA 65/65', 'Geosynthetic Mat Flexible and highly resilient geogrid,raw material : PVA with protective polymer coating, for technical use. Mass per unit area 330 g/m². Ultimate tensile strength long./trans. >= 65/65 kN/m', '5.00', '200.00', '0.00', NULL, NULL, 0, 1, 11, 2),
(45, 1704, 43, '170424030', 240, 30, 'GEOTEXTILE NON-TISSE', 'Basetrac®', 'Nonwoven BS15', 'Flexible, Geosynthetic Mat for separation and filtration,\nfor technical use. Mass per unit area: 310 g/m²,\nUltimate tensile strength long./trans. >= 15/15 kN/m', '5.00', '100.00', '0.00', NULL, NULL, 0, 1, 11, 3),
(46, 1705, 44, '170524030', 240, 30, 'GEOTEXTILE NON-TISSE', 'Basetrac®', 'Nonwoven BS25', 'Flexible, Geosynthetic Mat for separation and filtration,\nfor technical use. Mass per unit area: 310 g/m²,\nUltimate tensile strength long./trans. >= 25/25 kN/m', '5.00', '100.00', '0.00', NULL, NULL, 0, 1, 11, 3),
(47, 1706, 45, '170624030', 240, 30, 'GEOTEXTILE NON-TISSE', 'Basetrac®', 'Nonwoven E 150 K3', 'Flexible, Geosynthetic Mat for separation and filtration,\nfor technical use. Mass per unit area: 150 g/m²,\nUltimate tensile strength long./trans. >= 3,8/9 kN/m', '3.00', '100.00', '0.00', NULL, NULL, 0, 1, 11, 3),
(48, 1707, 46, '170724040', 240, 40, 'GEOCOMPOSITE', 'Basetrac®', 'Duo-C', NULL, '5.00', '200.00', '0.00', NULL, NULL, 0, 1, 11, 5),
(49, 1708, 47, '170824040', 240, 40, 'GEOCOMPOSITE', 'Basetrac®', 'Duo', NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 11, 5),
(50, 1801, 48, '180124040', 240, 40, 'GEOCOMPOSITE', 'SamiGrid®', 'XP 50 S', 'Reinforcement composite for the rehabilitation of concrete pavement with a bituminous coating.', NULL, '0.00', '0.00', NULL, NULL, 0, 1, 13, 5),
(51, 1802, 49, '180224040', 240, 40, 'GEOCOMPOSITE', 'SamiGrid®', NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 13, 5),
(52, 1803, 50, '180324040', 240, 40, 'GEOCOMPOSITE', 'SamiGrid®', NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 13, 5),
(53, 1804, 51, '180424040', 240, 40, 'GEOCOMPOSITE', 'SamiGrid®', NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 13, 5),
(54, 1901, 52, '190124040', 240, 40, 'GEOCOMPOSITE', 'Tektoseal®', 'Active', NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 14, 5),
(55, 1902, 53, '190224040', 240, 40, 'GEOCOMPOSITE', 'Tektoseal®', 'Sand', NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 14, 5),
(56, 1903, 54, '190324060', 240, 60, 'GSB', 'Tektoseal®', 'Clay', NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 14, 6),
(57, 2001, 55, '200124050', 240, 50, 'GEOCONTAINER', 'SoilTain®', 'Dewatering (DW)', NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 15, 7),
(58, 2002, 56, '200224050', 240, 50, 'GEOCONTAINER', 'SoilTain®', 'Coast protection (CP) Ht. 1,20m', NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 15, 7),
(59, 2003, 57, '200324051', 240, 51, 'GEOCONTAINER', 'SoilTain®', 'Coast protection (CP) Ht. 1,45m', NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 15, 7),
(60, 2004, 58, '200424050', 240, 50, 'GEOCONTAINER', 'SoilTain®', 'Coast protection (CP) Ht. 1,70m', NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 15, 7),
(61, 2005, 59, '200524051', 240, 51, 'GEOCONTAINER', 'SoilTain®', 'Coast protection (CP) Ht. 1,95m', NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 15, 7),
(62, 2006, 60, '200624050', 240, 50, 'GEOCONTAINER', 'SoilTain®', 'Coast protection (CP) Ht. 2,20m', NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 15, 7),
(63, 2007, 61, '200724051', 240, 51, 'GEOCONTAINER', 'SoilTain®', 'Coast protection (CP) Ht. 2,45m', NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 15, 7),
(64, 2008, 62, '200824051', 240, 51, 'GEOCONTAINER', 'SoilTain®', 'Coast protection (CP) Ht. 2,70m', NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 15, 7),
(65, 2101, 63, '210124050', 240, 50, 'GEOCONTAINER', 'Incomat®', 'Standard', NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 16, 7),
(66, 2102, 64, '210224050', 240, 50, 'GEOCONTAINER', 'Incomat®', 'Standard', NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 16, 7),
(67, 2103, 65, '210324050', 240, 50, 'GEOCONTAINER', 'Incomat®', 'Standard', NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 16, 7),
(68, 2104, 66, '210424050', 240, 50, 'GEOCONTAINER', 'Incomat®', 'Pipeline cover', NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 16, 7),
(69, 2105, 67, '210524050', 240, 50, 'GEOCONTAINER', 'Incomat®', 'Pipeline cover', NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 16, 7),
(70, 2106, 68, '210624050', 240, 50, 'GEOCONTAINER', 'Incomat®', 'Pipeline cover', NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 16, 7),
(71, 2107, 69, '210724050', 240, 50, 'GEOCONTAINER', 'Incomat®', 'Flex 32cm', NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 16, 7),
(72, 2108, 70, '210824050', 240, 50, 'GEOCONTAINER', 'Incomat®', 'Flex 15cm', NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 16, 7),
(73, 2109, 71, '210924050', 240, 50, 'GEOCONTAINER', 'Incomat®', 'Flex 15cm', NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 16, 7),
(74, 2110, 72, '211024050', 240, 50, 'GEOCONTAINER', 'Incomat®', 'FP', NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 16, 7),
(75, 2111, 73, '211124050', 240, 50, 'GEOCONTAINER', 'Incomat®', 'FP', NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 16, 7),
(76, 2112, 74, '211224050', 240, 50, 'GEOCONTAINER', 'Incomat®', 'FP', NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 16, 7),
(77, 2113, 75, '211324050', 240, 50, 'GEOCONTAINER', 'Incomat®', 'Grib 15cm', NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 16, 7),
(78, 2114, 76, '211424050', 240, 50, 'GEOCONTAINER', 'Incomat®', 'Grib 11cm', NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 16, 7),
(79, 2115, 77, '211524050', 240, 50, 'GEOCONTAINER', 'Incomat®', 'Grib 11cm', NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 16, 7),
(80, 2201, 78, '220124060', 240, 60, 'GSB', 'NaBento®', 'RL-N', NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 17, 6),
(81, 2202, 79, '220224060', 240, 60, 'GSB', 'NaBento®', 'RL-C', NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 17, 6),
(82, 2203, 80, '220324060', 240, 60, 'GSB', 'NaBento®', NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 17, 6),
(83, 2204, 81, '220424060', 240, 60, 'GSB', 'NaBento®', NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, 0, 1, 17, 6),
(84, 2301, 82, '2301240100', 240, 100, 'MACHINE', 'HaTelit®', 'Installation Tool LKW', 'AB-GERAET-H Unrulling Device', NULL, '0.00', '0.00', NULL, NULL, 84314980, 1, 4, 8);

-- --------------------------------------------------------

--
-- Structure de la table `produits_projets`
--

CREATE TABLE `produits_projets` (
  `id` int(11) NOT NULL,
  `projet_id` int(11) NOT NULL DEFAULT '0',
  `produit_id` int(11) NOT NULL DEFAULT '0',
  `quantity` double NOT NULL DEFAULT '0',
  `unit_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produits_projets`
--

INSERT INTO `produits_projets` (`id`, `projet_id`, `produit_id`, `quantity`, `unit_id`) VALUES
(4, 1, 1, 1, 2),
(5, 1, 7, 234.54, 1),
(6, 1, 19, 23.97, 1);

-- --------------------------------------------------------

--
-- Structure de la table `proformas`
--

CREATE TABLE `proformas` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `client_id` int(11) NOT NULL DEFAULT '0',
  `debut` date DEFAULT NULL,
  `fin` date DEFAULT NULL,
  `note_speciale` text,
  `modalites_paiement` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `token` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `semaine` int(11) DEFAULT '0',
  `moi_id` int(11) DEFAULT '0',
  `annee` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `proformas`
--

INSERT INTO `proformas` (`id`, `name`, `client_id`, `debut`, `fin`, `note_speciale`, `modalites_paiement`, `created_at`, `updated_at`, `user_id`, `token`, `active`, `semaine`, `moi_id`, `annee`) VALUES
(1, '2005061910', 2, '2020-05-04', '2020-05-23', '<ol>\r\n<li>Une premiere note</li>\r\n<li>Une deuxieme</li>\r\n</ol>', '<ul>\r\n<li>35% au depart</li>\r\n<li>20% au milieu</li>\r\n<li>le reste a la fin</li>\r\n</ul>', '2020-05-06 22:41:03', '2020-05-06 22:41:03', 1, '6a83e40b98602c8776a927ef9c200499a2d4cfaa', 1, 19, 5, 2020);

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

CREATE TABLE `projets` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `maitreouvrage_id` int(11) DEFAULT '0',
  `cs_id` int(11) DEFAULT '0',
  `ing_id` int(11) DEFAULT '0',
  `contractant_id` int(11) DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `semaine` int(11) NOT NULL DEFAULT '0',
  `moi_id` int(11) NOT NULL DEFAULT '0',
  `annee` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `client_id` int(11) DEFAULT '0',
  `lieu` varchar(200) DEFAULT NULL,
  `region_id` int(11) DEFAULT '0',
  `pay_id` int(11) DEFAULT '0',
  `demandeur_name` varchar(200) DEFAULT NULL,
  `demandeur_email` varchar(100) DEFAULT NULL,
  `demandeur_phone` varchar(50) DEFAULT NULL,
  `demandeur_address` varchar(100) DEFAULT NULL,
  `pf_name` varchar(100) DEFAULT NULL,
  `pf_email` varchar(100) DEFAULT NULL,
  `pf_phone` varchar(50) DEFAULT NULL,
  `pf_address` varchar(50) DEFAULT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `projets`
--

INSERT INTO `projets` (`id`, `name`, `maitreouvrage_id`, `cs_id`, `ing_id`, `contractant_id`, `created_at`, `updated_at`, `semaine`, `moi_id`, `annee`, `user_id`, `active`, `client_id`, `lieu`, `region_id`, `pay_id`, `demandeur_name`, `demandeur_email`, `demandeur_phone`, `demandeur_address`, `pf_name`, `pf_email`, `pf_phone`, `pf_address`, `token`) VALUES
(1, 'TRAVAUX DE RESTRUCTURATION DE L''AXE NGALLA A BISSOMBO DEPARTEMENT DU DJA ET LOBO DANS LA REGION DU SUD AVEC LA CONSTRUCTION D''UN PONT (90ml) SUR LA LOBO', 45, 47, 48, 56, '2020-05-02 00:18:23', '2020-05-02 00:18:23', 18, 5, 2020, 1, 1, 9, 'ASSOK', 10, 1, 'ANYOUTOULOU OBAM', 'test@test.com', NULL, NULL, 'Fabrice Finke Nya', 'finkenya@yahoo.de', '698 61 39 11/ 672 97 14 91', NULL, '2680d6cb749b5b3becaa0e205ac45408fafbb966');

-- --------------------------------------------------------

--
-- Structure de la table `projets_etapes`
--

CREATE TABLE `projets_etapes` (
  `id` int(11) NOT NULL,
  `projet_id` int(11) NOT NULL DEFAULT '0',
  `etape_id` int(11) NOT NULL DEFAULT '0',
  `debut` date DEFAULT NULL,
  `fin` date DEFAULT NULL,
  `groupe1` int(11) DEFAULT '0',
  `entreprise1` int(11) DEFAULT '0',
  `groupe2` int(11) DEFAULT '0',
  `entreprise2` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `projets_etapes`
--

INSERT INTO `projets_etapes` (`id`, `projet_id`, `etape_id`, `debut`, `fin`, `groupe1`, `entreprise1`, `groupe2`, `entreprise2`) VALUES
(1, 1, 1, '2020-05-06', '2020-05-23', 2, 3, 5, 8);

-- --------------------------------------------------------

--
-- Structure de la table `regions`
--

CREATE TABLE `regions` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `regions`
--

INSERT INTO `regions` (`id`, `name`) VALUES
(1, 'EXTREME NORD'),
(2, 'NORD'),
(3, 'ADAMAOUA'),
(4, 'CENTRE'),
(5, 'EST'),
(6, 'OUEST'),
(7, 'NORD OUEST'),
(8, 'SUD OUEST'),
(9, 'LITTORAL'),
(10, 'SUD');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'ADMINISTRATEUR'),
(2, 'RESPONSABLE RESSOURCES HUMAINES'),
(3, 'RESPONSABLE RELATION CLIENT'),
(4, 'RESPONSABLE APPROVISIONNEMENT'),
(5, 'RESPONSABLE DES OPERATIONS'),
(6, 'ADMIN CLIENT'),
(7, 'POINTEUR CLIENT'),
(8, 'AGENT');

-- --------------------------------------------------------

--
-- Structure de la table `secteurs`
--

CREATE TABLE `secteurs` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `secteurs`
--

INSERT INTO `secteurs` (`id`, `name`) VALUES
(1, 'GENIE CIVIL'),
(2, 'ENVIRONNEMENT'),
(4, 'GEÉOSYNTHÉTIQUES'),
(5, 'TRAVAUX PUBLICS'),
(6, 'HABITAT ET URBANISME'),
(7, 'DÉFENSE NATIONALE'),
(8, 'AÉROPOTUAIRE'),
(9, 'PORTUAIRE'),
(10, 'HYDRO ÉLÉCTRICITÉ'),
(11, 'HYDROCARBURE'),
(12, 'MÉTALURGIE'),
(13, 'INVESTISSEMENT'),
(14, 'PRIVÉ'),
(15, 'TRANSIT'),
(16, 'FINANCES ET COMPTABILITÉ');

-- --------------------------------------------------------

--
-- Structure de la table `tclients`
--

CREATE TABLE `tclients` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tclients`
--

INSERT INTO `tclients` (`id`, `name`) VALUES
(1, 'ENTREPRISES DE REALISATION'),
(2, 'BUREAUX D''ETUDES'),
(3, 'ADMINISTRATIONS'),
(4, 'PARTICULIERS');

-- --------------------------------------------------------

--
-- Structure de la table `tproduits`
--

CREATE TABLE `tproduits` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tproduits`
--

INSERT INTO `tproduits` (`id`, `name`, `code`) VALUES
(1, 'DESIGN', '0100'),
(2, NULL, NULL),
(3, 'Fortrac®', '1100'),
(4, 'HaTelit®', '1200'),
(5, 'HaTe®', '1200'),
(6, 'PP®', '1200'),
(7, 'MineGrid®', '1300'),
(8, 'Stabilenka®', '1400'),
(9, 'Robutec®', '1500'),
(10, 'Ringtrac®', '1600'),
(11, 'Basetrac®', '1700'),
(12, 'Non-tissés', '1700'),
(13, 'SamiGrid®', '1800'),
(14, 'Tektoseal®', '1900'),
(15, 'SoilTain®', '2000'),
(16, 'Incomat®', '2100'),
(17, 'NaBento®', '2200');

-- --------------------------------------------------------

--
-- Structure de la table `transcotations`
--

CREATE TABLE `transcotations` (
  `id` int(11) NOT NULL,
  `transitaire_id` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `semaine` int(11) NOT NULL DEFAULT '0',
  `moi_id` int(11) NOT NULL DEFAULT '0',
  `annee` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `origine_id` int(11) NOT NULL DEFAULT '0',
  `destination_id` int(11) NOT NULL DEFAULT '0',
  `import_option_id` int(11) NOT NULL DEFAULT '0',
  `transport_option_id` int(11) NOT NULL DEFAULT '1',
  `ft40` int(11) DEFAULT '0',
  `ft20` int(11) DEFAULT '0',
  `pallets` int(11) DEFAULT '0',
  `expected_informations` text,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `token` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `transcotations`
--

INSERT INTO `transcotations` (`id`, `transitaire_id`, `created_at`, `updated_at`, `semaine`, `moi_id`, `annee`, `active`, `origine_id`, `destination_id`, `import_option_id`, `transport_option_id`, `ft40`, `ft20`, `pallets`, `expected_informations`, `user_id`, `token`) VALUES
(1, 3, '2020-05-03 16:32:10', '2020-05-03 16:32:10', 18, 5, 2020, 1, 5, 2, 1, 1, 20, 2, NULL, 'Informations tres importantes', 1, 'f71c73afdea2295eb3941b19b8156abdd24af7f6');

-- --------------------------------------------------------

--
-- Structure de la table `transport_options`
--

CREATE TABLE `transport_options` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `transport_options`
--

INSERT INTO `transport_options` (`id`, `name`) VALUES
(1, 'Shipping'),
(2, 'By air'),
(3, 'Land');

-- --------------------------------------------------------

--
-- Structure de la table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `symbole` varchar(10) DEFAULT NULL,
  `metrique` varchar(100) DEFAULT NULL,
  `metric` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `units`
--

INSERT INTO `units` (`id`, `name`, `symbole`, `metrique`, `metric`) VALUES
(1, 'Metre carre', 'm2', 'Surface', 'Area'),
(2, 'Facture', 'ft', 'Facture', 'Bill');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT '4',
  `male` tinyint(1) NOT NULL DEFAULT '1',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `pay_id` int(11) DEFAULT '0',
  `ville_id` int(11) DEFAULT '0',
  `client_id` int(11) DEFAULT '0',
  `fournisseur_id` int(11) NOT NULL DEFAULT '0',
  `email` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageUri` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `last_login` datetime DEFAULT NULL,
  `moi_id` int(11) DEFAULT NULL,
  `annee` int(11) DEFAULT '0',
  `creator_id` int(11) DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `address`, `phone`, `role_id`, `male`, `active`, `pay_id`, `ville_id`, `client_id`, `fournisseur_id`, `email`, `password`, `imageUri`, `last_login`, `moi_id`, `annee`, `creator_id`, `remember_token`, `created_at`, `updated_at`, `token`) VALUES
(1, 'Clement', 'Essomba', 'Coraf', '0678999999', 1, 1, 1, 1, 0, 0, 0, 'clementessomba@gmail.com', '$2y$10$44Z2w82lhNMH6IZZ5zMj9OEQFsXRnMET8vnA15UmzMj5HzNRLsOEq', '', NULL, 5, 2019, 0, '1f51NtBkL70cvbvj8PVeaxppGb6EDUN8pAXVvbg5vf8nq41kFi9Cc4tBkWeI', '2019-05-30 21:35:40', '2019-05-30 21:35:40', 'c4ca4238a0b923820dcc509a6f75849b'),
(14, 'Remy', 'Abena Abena', NULL, '02343434334', 6, 1, 1, 4, 0, 64, 0, 'abena@testcli.com', '$2y$10$zTOAP4NufPCCjs7EC/4/3OpoyW9yV9fw.YREkte52r5IrVCWApGEG', '', NULL, 4, 2020, 0, NULL, '2020-04-30 12:34:54', '2020-04-30 12:34:54', 'a626b5f57b5acff57b710689eacd7aa15a6940af');

-- --------------------------------------------------------

--
-- Structure de la table `villes`
--

CREATE TABLE `villes` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `pay_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `villes`
--

INSERT INTO `villes` (`id`, `name`, `pay_id`) VALUES
(1, 'Yaoundé', 1),
(2, 'Douala', 1),
(3, 'Garoua', 1),
(4, 'MAROUA', 1),
(5, 'Gescher', 11),
(6, 'Rabat', 12),
(7, 'MEKIN', 1),
(8, 'KAMSAR', 13),
(9, 'LIMBE', 1),
(10, 'EDEA', 1),
(11, 'Almeria', 14),
(12, 'Paris', 4),
(13, 'NGOUMOU', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `annee_index` (`annee`),
  ADD KEY `id` (`id`),
  ADD KEY `annee` (`annee`);

--
-- Index pour la table `domaines`
--
ALTER TABLE `domaines`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `domaines_projets`
--
ALTER TABLE `domaines_projets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etapes`
--
ALTER TABLE `etapes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `forders`
--
ALTER TABLE `forders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `annee_index` (`annee`),
  ADD KEY `code_index` (`code`);

--
-- Index pour la table `frncotations`
--
ALTER TABLE `frncotations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `import_options`
--
ALTER TABLE `import_options`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lcotations`
--
ALTER TABLE `lcotations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lforders`
--
ALTER TABLE `lforders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lignlivs`
--
ALTER TABLE `lignlivs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `livraisons`
--
ALTER TABLE `livraisons`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lproformas`
--
ALTER TABLE `lproformas`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mois`
--
ALTER TABLE `mois`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `phases`
--
ALTER TABLE `phases`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `num_index` (`num`),
  ADD KEY `num2_index` (`num2`),
  ADD KEY `num3_index` (`num3`),
  ADD KEY `num4_index` (`num4`),
  ADD KEY `emballagel_index` (`longueur`),
  ADD KEY `emballagem_index` (`diametre`),
  ADD KEY `autre_index` (`autre`);

--
-- Index pour la table `produits_projets`
--
ALTER TABLE `produits_projets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `proformas`
--
ALTER TABLE `proformas`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `projets`
--
ALTER TABLE `projets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `projets_etapes`
--
ALTER TABLE `projets_etapes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `secteurs`
--
ALTER TABLE `secteurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tclients`
--
ALTER TABLE `tclients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tproduits`
--
ALTER TABLE `tproduits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `transcotations`
--
ALTER TABLE `transcotations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `transport_options`
--
ALTER TABLE `transport_options`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `villes`
--
ALTER TABLE `villes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT pour la table `domaines`
--
ALTER TABLE `domaines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `domaines_projets`
--
ALTER TABLE `domaines_projets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `etapes`
--
ALTER TABLE `etapes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `forders`
--
ALTER TABLE `forders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `frncotations`
--
ALTER TABLE `frncotations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `import_options`
--
ALTER TABLE `import_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `lcotations`
--
ALTER TABLE `lcotations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `lforders`
--
ALTER TABLE `lforders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `lignlivs`
--
ALTER TABLE `lignlivs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `livraisons`
--
ALTER TABLE `livraisons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `lproformas`
--
ALTER TABLE `lproformas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `mois`
--
ALTER TABLE `mois`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `phases`
--
ALTER TABLE `phases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT pour la table `produits_projets`
--
ALTER TABLE `produits_projets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `proformas`
--
ALTER TABLE `proformas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `projets`
--
ALTER TABLE `projets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `projets_etapes`
--
ALTER TABLE `projets_etapes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `secteurs`
--
ALTER TABLE `secteurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `tclients`
--
ALTER TABLE `tclients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `tproduits`
--
ALTER TABLE `tproduits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `transcotations`
--
ALTER TABLE `transcotations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `transport_options`
--
ALTER TABLE `transport_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `villes`
--
ALTER TABLE `villes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
