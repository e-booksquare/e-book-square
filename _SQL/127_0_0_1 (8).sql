-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Jun-2023 às 23:16
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `e-book_square`
--
CREATE DATABASE IF NOT EXISTS `e-book_square` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `e-book_square`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `amei`
--

CREATE TABLE `amei` (
  `ID_amei` int(11) NOT NULL,
  `user_FK` int(11) NOT NULL,
  `obra_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `amei`
--

INSERT INTO `amei` (`ID_amei`, `user_FK`, `obra_FK`) VALUES
(14, 37, 67),
(15, 46, 67),
(21, 46, 87),
(39, 37, 81),
(41, 41, 81),
(43, 46, 81),
(48, 41, 67);

-- --------------------------------------------------------

--
-- Estrutura da tabela `bloqueio`
--

CREATE TABLE `bloqueio` (
  `ID_bloqueio` int(11) NOT NULL,
  `B_user_FK` int(11) NOT NULL,
  `user_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `capitulo`
--

CREATE TABLE `capitulo` (
  `ID_capitulo` int(11) NOT NULL,
  `titulo_cap` varchar(100) NOT NULL,
  `obra_FK` int(11) NOT NULL,
  `conteudo` text NOT NULL,
  `restricao` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `publicado` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `capitulo`
--

INSERT INTO `capitulo` (`ID_capitulo`, `titulo_cap`, `obra_FK`, `conteudo`, `restricao`, `created_at`, `updated_at`, `publicado`) VALUES
(13, ' Andr&ocirc;meda', 67, 'A volcano is an opening in a planet or moon’s crust through which molten rock, hot gases, and other materials erupt. Volcanoes often form a hill or mountain as layers of rock and ash build up from repeated eruptions.Volcanoes are classified as active, dormant, or extinct. Active volcanoes have a recent history of eruptions; they are likely to erupt again. Dormant volcanoes have not erupted for a very long time but may erupt at a future time. Extinct volcanoes are not expected to erupt in the future.\r\n\r\nInside an active volcano is a chamber in which molten rock, called magma, collects. Pressure builds up inside the magma chamber, causing the magma to move through channels in the rock and escape onto the planet’s surface. Once it flows onto the surface the magma is known as lava.Some volcanic eruptions are explosive, while others occur as a slow lava flow. Eruptions can occur through a main opening at the top of the volcano or through vents that form on the sides. The rate and intensity of eruptions, as well as the composition of the magma, determine the shape of the volcano.Volcanoes are found on both land and the ocean floor. When volcanoes erupt on the ocean floor, they often create underwater mountains and mountain ranges as the released lava cools and hardens. Volcanoes on the ocean floor become islands when the mountains become so large they rise above the surface of the ocean.\r\nA volcano is an opening in a planet or moon’s crust through which molten rock, hot gases, and other materials erupt. Volcanoes often form a hill or mountain as layers of rock and ash build up from repeated eruptions.\r\n\r\nVolcanoes are classified as active, dormant, or extinct. Active volcanoes have a recent history of eruptions; they are likely to erupt again. Dormant volcanoes have not erupted for a very long time but may erupt at a future time. Extinct volcanoes are not expected to erupt in the future.\r\n\r\nInside an active volcano is a chamber in which molten rock, called magma, collects. Pressure builds up inside the magma chamber, causing the magma to move through channels in the rock and escape onto the planet’s surface. Once it flows onto the surface the magma is known as lava.Some volcanic eruptions are explosive, while others occur as a slow lava flow. Eruptions can occur through a main opening at the top of the volcano or through vents that form on the sides. The rate and intensity of eruptions, as well as the composition of the magma, determine the shape of the volcano.\r\n\r\nVolcanoes are found on both land and the ocean floor. When volcanoes erupt on the ocean floor, they often create underwater mountains and mountain ranges as the released lava cools and hardens. Volcanoes on the ocean floor become islands when the mountains become so large they rise above the surface of th', 0, '2023-04-02 21:34:02', '2023-05-13 10:15:23', 1),
(39, ' Cap&iacute;tulo 1', 81, '<p>gcu\\sgdfsagdguafdf</p>', 0, '2023-05-08 21:14:18', '2023-05-09 00:14:18', 1),
(50, 'to be continued', 67, '<p style=\"text-align: right; \">\r\n\r\n<span style=\"color: rgb(17, 17, 17); font-family: Roboto, sans-serif; font-size: 16px; text-align: left; background-color: rgb(255, 255, 255)\">Galinhas (Gallus gallus) são<span>&nbsp;</span></span><strong style=\"font-weight: 700; background-color: rgba(16, 110, 190, 0.18); color: rgb(17, 17, 17); font-family: Roboto, sans-serif; font-size: 16px; text-align: left\">aves domésticas</strong><span style=\"color: rgb(17, 17, 17); font-family: Roboto, sans-serif; font-size: 16px; text-align: left; background-color: rgb(255, 255, 255)\"><span>&nbsp;</span>pertencentes à Ordem Galliforme, Família Phasianidae. São animais de médio porte, variando de 400 gr a 6 kg, de acordo com a raça. São de origem asiática, porém foram introduzidas em todas as partes do mundo graças à domesticação.</span>\r\n<br /></p>', 0, '2023-05-24 22:26:56', '2023-05-25 01:26:56', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `IDCat` int(11) NOT NULL,
  `categoriaCat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`IDCat`, `categoriaCat`) VALUES
(2, 'Ação'),
(3, 'Aventura'),
(4, 'Terror'),
(5, 'Fantasia'),
(6, 'Humor'),
(7, 'Ficção'),
(8, 'Romance'),
(9, 'Conto'),
(10, 'Apocalipse'),
(11, 'Distopia'),
(12, 'Policial'),
(13, 'Horror'),
(14, 'Drama'),
(15, 'Ficção histórica'),
(16, 'LGBTQ+'),
(17, 'Biografia'),
(18, 'Não ficção'),
(19, 'Suspense'),
(20, 'Gastronomia'),
(21, 'Auto-ajuda'),
(22, 'Arte e Fotografia'),
(23, 'Histórico'),
(25, 'Crimes reais'),
(26, 'Artes marciais '),
(27, 'Viagem'),
(28, 'Religião'),
(29, 'Faroeste'),
(30, 'Tecnologia e Ciência'),
(31, 'RPG'),
(32, 'Guerra'),
(33, 'Poesia'),
(34, 'Pós-Apocalipse'),
(35, 'Viagem no Tempo'),
(36, 'SteamPunk'),
(37, 'Cyberpunk '),
(38, 'Espaço sideral '),
(39, 'Mistério'),
(40, 'Investigação'),
(41, 'Ficção feminina'),
(42, 'Medieval'),
(43, 'Oriente médio'),
(44, 'Samurai'),
(45, 'Isekai'),
(46, 'Tensei'),
(47, 'Erótico'),
(48, 'Realismo Mágico'),
(49, 'Magia'),
(50, 'Artigo acâdemico'),
(51, 'Saúde e bem estar'),
(52, 'Cultivação'),
(53, 'Dorama'),
(54, 'Drama policial'),
(55, 'Comédia'),
(56, 'Paranormal'),
(57, 'Jogos'),
(58, 'Alienígena'),
(59, 'Fanfic'),
(60, 'Novel'),
(61, 'Mercenário'),
(62, 'Pirata');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_da_obra`
--

CREATE TABLE `categoria_da_obra` (
  `IDCatObr` int(11) NOT NULL,
  `IDObraFK` int(11) NOT NULL,
  `IDCatFK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categoria_da_obra`
--

INSERT INTO `categoria_da_obra` (`IDCatObr`, `IDObraFK`, `IDCatFK`) VALUES
(135, 67, 2),
(136, 67, 5),
(131, 67, 7),
(132, 67, 34),
(133, 67, 39),
(134, 67, 61),
(156, 81, 3),
(154, 81, 4),
(155, 81, 8),
(160, 81, 14),
(159, 81, 28),
(158, 81, 49),
(157, 81, 61),
(180, 87, 4),
(175, 87, 5),
(179, 87, 8),
(174, 87, 15),
(177, 87, 28),
(176, 87, 32),
(178, 87, 35),
(238, 93, 13),
(239, 93, 22),
(240, 93, 29);

-- --------------------------------------------------------

--
-- Estrutura da tabela `checkweek`
--

CREATE TABLE `checkweek` (
  `ID_checkweek` int(11) NOT NULL,
  `user_FK` int(11) DEFAULT NULL,
  `Monday` tinyint(1) DEFAULT NULL,
  `Tuesday` tinyint(1) DEFAULT NULL,
  `Wednesday` tinyint(1) DEFAULT NULL,
  `Thursday` tinyint(1) DEFAULT NULL,
  `Friday` tinyint(1) DEFAULT NULL,
  `Saturday` tinyint(1) DEFAULT NULL,
  `Sunday` tinyint(1) DEFAULT NULL,
  `max_exp` int(11) DEFAULT 10
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE `comentario` (
  `ID_comentario` int(11) NOT NULL,
  `user_FK` int(11) NOT NULL,
  `destinatario_FK` int(11) NOT NULL,
  `conteudo` varchar(500) NOT NULL,
  `tipo` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `ID_tipo` int(11) NOT NULL,
  `spoiler` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `comentario`
--

INSERT INTO `comentario` (`ID_comentario`, `user_FK`, `destinatario_FK`, `conteudo`, `tipo`, `created_at`, `ID_tipo`, `spoiler`) VALUES
(85, 29, 29, 'Coroi mn, curti, posta mais cap&iacute;tulos, pois to viciado na leitura dessa obra, tmj', 5, '2023-05-25 16:00:15', 13, 0),
(86, 29, 29, 'carai v&eacute;i, referente a morte do prota ap&oacute;s aquele confronto com os 6 s&aacute;bios de Murin, acho que ele poderia ter se dado melhor se tivesse esperado e n&atilde;o fosse muito egoista, mas vamo ver oq rola 🤔😶😶🌟', 5, '2023-05-25 16:02:42', 13, 1),
(87, 46, 29, 'Tu usaste a pr&oacute;pria conta do pr&oacute;prio autor da obra para fazer teste de com se fosse um usu&aacute;rio qualquer passando spoiler por um coment&aacute;rio... Lastim&aacute;vel seu QI 🙄', 6, '2023-05-25 16:05:22', 86, 0),
(97, 37, 29, 'vdd, o animal n&atilde;o sabe nem mesmo apertar o btn de spoiler, vamo denunciar ele. J&aacute; me fudi lendo isso. O prota morrer foi de fude', 6, '2023-05-25 16:17:20', 86, 1),
(98, 41, 29, 'kkkkkkkkkkk mds🤣', 6, '2023-05-25 16:20:03', 86, 0),
(100, 41, 29, 'chala head chala', 5, '2023-05-25 16:35:58', 50, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `conquistas`
--

CREATE TABLE `conquistas` (
  `ID_CON` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `max_avaliacao` int(11) NOT NULL,
  `exp` int(11) NOT NULL,
  `max_leitura` int(11) NOT NULL,
  `max_curtidas` int(11) NOT NULL,
  `max_nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `favorito`
--

CREATE TABLE `favorito` (
  `IDFav` int(11) NOT NULL,
  `user_FK` int(11) NOT NULL,
  `obra_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `favorito`
--

INSERT INTO `favorito` (`IDFav`, `user_FK`, `obra_FK`) VALUES
(112, 29, 67),
(105, 29, 93),
(90, 37, 67),
(104, 37, 81),
(100, 37, 87),
(91, 41, 81),
(7, 46, 67),
(102, 46, 87);

-- --------------------------------------------------------

--
-- Estrutura da tabela `likes`
--

CREATE TABLE `likes` (
  `ID_like` int(11) NOT NULL,
  `ID_tipo` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `feedback` tinyint(4) NOT NULL,
  `destinatario_FK` int(11) NOT NULL,
  `user_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `likes`
--

INSERT INTO `likes` (`ID_like`, `ID_tipo`, `tipo`, `feedback`, `destinatario_FK`, `user_FK`) VALUES
(239, 39, 3, 1, 37, 37),
(240, 43, 3, 1, 37, 37),
(242, 39, 3, 1, 37, 46),
(244, 42, 3, 1, 37, 46),
(245, 43, 3, 1, 37, 46),
(247, 49, 3, 1, 37, 46),
(248, 13, 3, 1, 29, 29),
(249, 39, 3, 1, 37, 29),
(250, 13, 3, 1, 29, 37);

-- --------------------------------------------------------

--
-- Estrutura da tabela `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`, `created_at`) VALUES
(1, 37, 41, 'conversa n°1', '2023-06-04 21:40:20'),
(2, 29, 37, 'covrs n°2', '2023-06-04 21:40:20'),
(4, 37, 41, 'cvrs', '2023-06-04 21:40:20'),
(5, 41, 37, 'cvrs 5', '2023-06-04 21:40:20'),
(6, 29, 37, 'cvrs n 6', '2023-06-04 21:40:20'),
(7, 37, 41, 'fala meu caro, roubaram minha vó e estão pedindo dinheiro, acha que a validade dela sobressai o custo do reenvestimento?', '2023-06-05 16:47:31');

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacao`
--

CREATE TABLE `notificacao` (
  `IDNOT` int(11) NOT NULL,
  `conta_obra` tinyint(4) NOT NULL DEFAULT 0,
  `tipoNOT` tinyint(4) NOT NULL,
  `nomeNOT` varchar(150) NOT NULL,
  `fotoNOT` varchar(255) NOT NULL,
  `conteudoNOT` varchar(300) NOT NULL,
  `URLNOT` varchar(150) NOT NULL,
  `dataNOT` datetime NOT NULL,
  `activeNOT` tinyint(4) NOT NULL DEFAULT 1,
  `destinatario_FKNOT` int(11) NOT NULL,
  `user_FKNOT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `notificacao`
--

INSERT INTO `notificacao` (`IDNOT`, `conta_obra`, `tipoNOT`, `nomeNOT`, `fotoNOT`, `conteudoNOT`, `URLNOT`, `dataNOT`, `activeNOT`, `destinatario_FKNOT`, `user_FKNOT`) VALUES
(34, 1, 10, 'Anna Carrey', 'fdbcd0af33da1469a538b1eea995c86eAll-Good-Things-A-Hope-In-Hell-_online-video-cutter.com_.gif', ' curtiu o capítulo \'A Comedy Conversation Bet...\' na obra \'The Crazy School\'', 'perfil.php?user=46', '2023-05-22 15:23:08', 0, 37, 46),
(35, 1, 9, 'Katsurazur4', 'a72570cc71f7e91dfb77a253c11888c3profilegin.jpg', ' publicou uma nova obra, \'G.O.T\', seja um dos primeiros a lerem !!', 'capa_da_obra.php?obra=93', '2023-05-23 16:49:33', 0, 29, 37),
(36, 1, 9, 'Katsurazur4', 'a72570cc71f7e91dfb77a253c11888c3profilegin.jpg', ' publicou uma nova obra, \'G.O.T\', seja um dos primeiros a lerem !!', 'capa_da_obra.php?obra=93', '2023-05-23 16:49:33', 0, 41, 37),
(37, 1, 9, 'Katsurazur4', 'a72570cc71f7e91dfb77a253c11888c3profilegin.jpg', ' publicou uma nova obra, \'G.O.T\', seja um dos primeiros a lerem !!', 'capa_da_obra.php?obra=93', '2023-05-23 16:49:33', 0, 46, 37),
(38, 0, 8, 'Anna Carrey', 'fdbcd0af33da1469a538b1eea995c86eAll-Good-Things-A-Hope-In-Hell-_online-video-cutter.com_.gif', ' começou a te seguir', 'perfil.php?user=46', '2023-05-24 16:25:21', 0, 29, 46),
(39, 1, 10, 'Ratsel', 'b0119412b863f297fe9c66eff8c1f957bannergifwpp.gif', ' curtiu o capítulo \' Cap&iacute;tulo 1\' na obra \'Sahovi\'', 'perfil.php?user=29', '2023-05-25 07:07:07', 0, 37, 29),
(40, 1, 10, 'Katsurazur4', 'a72570cc71f7e91dfb77a253c11888c3profilegin.jpg', ' curtiu o capítulo \' Andr&ocirc;meda\' na obra \'Volcanic return\'', 'perfil.php?user=37', '2023-05-25 16:18:23', 1, 29, 37),
(41, 1, 9, 'Mohamed', '8f58be70c3cc49d37d028e6ff74746eesamurai-4836642_1920.jpg', ' amou sua obra em \'Volcanic return\'', 'perfil.php?user=41', '2023-05-25 17:08:19', 1, 29, 41);

-- --------------------------------------------------------

--
-- Estrutura da tabela `obra`
--

CREATE TABLE `obra` (
  `ID_obra` int(11) NOT NULL,
  `nome_obra` varchar(105) NOT NULL,
  `user_FK` int(11) NOT NULL,
  `descricao` varchar(1500) NOT NULL,
  `etaria` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `foto_obra` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `publicado` tinyint(4) NOT NULL DEFAULT 1,
  `Finalizado` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `obra`
--

INSERT INTO `obra` (`ID_obra`, `nome_obra`, `user_FK`, `descricao`, `etaria`, `created_at`, `foto_obra`, `updated_at`, `publicado`, `Finalizado`) VALUES
(67, 'Volcanic return', 29, 'Inside an active volcano is a chamber in which molten rock, called magma, collects. Pressure builds up inside the magma chamber, causing the magma to move through channels in the rock and escape onto the planet&rsquo;s surface. Once it flows onto the surface the magma is known as lava.', 'Adulto', '2023-04-02 19:31:33', 'a11ebbe336f933268712e80ac56ba888voulcanic.jpg', '2023-05-25 01:26:56', 1, 0),
(81, 'Sahovi', 37, 'Um mercen&aacute;rio com um forte trauma do passado quer se vingar, mas muitos coisas o impedem.', 'Adulto', '2023-05-06 05:16:04', '592ae62e541a522edbf1e8e365cb7c12sahovi.jfif', '2023-05-09 00:14:18', 1, 0),
(87, 'A Jornada de Okalhity: Imortalidade al&eacute;m dos S&eacute;culos', 46, '\r\nH&aacute; muito tempo, em uma terra repleta de lendas e mist&eacute;rios, vivia um personagem extraordin&aacute;rio chamado Okalhity. Ele era &uacute;nico, dotado de uma d&aacute;diva especial que o tornava imortal e eterno. Desde o princ&iacute;pio dos tempos, Okalhity vagava pela terra, testemunhando o nascimento e a queda de imp&eacute;rios, a ascens&atilde;o e a extin&ccedil;&atilde;o de civiliza&ccedil;&otilde;es.\r\n\r\nOkalhity tinha uma apar&ecirc;ncia jovem e vigorosa, mas seus olhos carregavam a sabedoria acumulada ao longo dos s&eacute;culos. Ele presenciou eventos que mudaram o curso da hist&oacute;ria, atravessando guerras e revolu&ccedil;&otilde;es, experimentando a alegria e a tristeza dos seres humanos. Ele era um observador silencioso, um guardi&atilde;o dos segredos do passado.\r\n\r\nEm sua busca pela compreens&atilde;o do mundo e da exist&ecirc;ncia humana, Okalhity dedicou-se &agrave; aprendizagem constante. Ele estudou as artes, ci&ecirc;ncias e filosofia, mergulhando profundamente na busca pelo conhecimento. Com o tempo, ele dominou v&aacute;rias l&iacute;nguas e acumulou um vasto acervo de hist&oacute;rias e mitos.\r\n\r\nEntretanto, a imortalidade de Okalhity trouxe consigo um fardo pesado. Enquanto testemunhava o ciclo constante de vida e morte, ele enfrentou a solid&atilde;o e a perda. Ele viu seus entes queridos envelhecerem e partiram, enquanto ele permanecia inalterado. A conex&atilde;o com outros seres humanos tornou-se fugaz e ef&ecirc;mera.\r\n\r\nCansado d', 'Adulto', '2023-05-16 16:41:56', '66f8f7896265d7794a876e7b8f8a3eccokal.jfif', '2023-05-16 19:41:56', 1, 0),
(93, 'G.O.T', 37, 'Desdes o fim dos tempos, um ser bla bla bla', 'Adulto', '2023-05-23 16:49:32', '24de20a7aa11b9f4a96bd70c5533e331tronogotme.png', '2023-05-23 19:49:32', 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `rankeamento`
--

CREATE TABLE `rankeamento` (
  `IDRAN` int(11) NOT NULL,
  `rankPontosRAN` int(11) NOT NULL DEFAULT 0,
  `levelRAN` int(11) NOT NULL DEFAULT 1,
  `expRAN` int(11) NOT NULL DEFAULT 0,
  `maxExpRAN` int(11) NOT NULL DEFAULT 100,
  `user_FKRAN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `rankeamento`
--

INSERT INTO `rankeamento` (`IDRAN`, `rankPontosRAN`, `levelRAN`, `expRAN`, `maxExpRAN`, `user_FKRAN`) VALUES
(2, 70, 1, 0, 100, 37),
(3, 0, 1, 0, 100, 29),
(4, 0, 1, 0, 100, 41),
(5, 0, 1, 0, 100, 44),
(6, 0, 1, 0, 100, 46);

-- --------------------------------------------------------

--
-- Estrutura da tabela `report`
--

CREATE TABLE `report` (
  `ID_report` int(11) NOT NULL,
  `ID_tipo` int(11) NOT NULL,
  `tipo` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `conteudo` varchar(500) NOT NULL,
  `user_FK` int(11) NOT NULL,
  `obra_FK` int(11) NOT NULL,
  `destinatario_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `seguir`
--

CREATE TABLE `seguir` (
  `ID_seguir` int(11) NOT NULL,
  `user_FK` int(11) NOT NULL,
  `seguidor_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `seguir`
--

INSERT INTO `seguir` (`ID_seguir`, `user_FK`, `seguidor_FK`) VALUES
(31, 29, 41),
(56, 41, 46),
(71, 46, 29),
(72, 37, 29),
(115, 37, 41),
(117, 29, 37),
(120, 37, 46),
(121, 29, 46);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_conq`
--

CREATE TABLE `user_conq` (
  `ID_ConUser` int(11) NOT NULL,
  `avaliacao` int(11) NOT NULL,
  `leitura` int(11) NOT NULL,
  `curtidas` int(11) NOT NULL,
  `nivel` int(11) NOT NULL,
  `user_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `ID_user` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `banner` varchar(150) NOT NULL,
  `descricaoUSU` varchar(1500) NOT NULL,
  `chavePix` varchar(300) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `senha` varchar(255) NOT NULL,
  `data_cad` date NOT NULL,
  `recuperar_senha` varchar(255) NOT NULL,
  `NOTmsg` tinyint(1) NOT NULL DEFAULT 1,
  `NOTatdp` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`ID_user`, `nome`, `codigo`, `email`, `foto`, `banner`, `descricaoUSU`, `chavePix`, `status`, `senha`, `data_cad`, `recuperar_senha`, `NOTmsg`, `NOTatdp`) VALUES
(29, 'Ratsel', '@sifudiasnaomais77', 'ratsel00h@gmail.com', 'b0119412b863f297fe9c66eff8c1f957bannergifwpp.gif', '721bd26ecd26294dd268e762e721c6b9pexels-photo-13271915.webp', 'Quando dizem que a primeira impress&atilde;o &eacute; a que fica, est&atilde;o dizendo a mais pura verdade! O seu perfil &eacute; a sua porta de entrada nas redes sociais, ent&atilde;o cuide bem dele e deixe-o bem atrativo para os seus visitantes! Frases para perfil s&atilde;o muito &uacute;teis na hora de fazer um resumo sobre si mesmo na sua conta online.', '', 0, '$2y$10$lY0nAUZ..kO9YzgUaqbXBe92nFSyp8KT0SwPMy8kcYWcNLGSE.0Wy', '2022-11-19', '$2y$10$.j3nQd8rjF3zfCkuLPDCWegoRuSo5e4UzWb1Lo0fJEsuGOIdyic06', 1, 1),
(37, 'Katsurazur4', '@katsurazur4170', 'ebooksquare.tcc@gmail.com', 'a72570cc71f7e91dfb77a253c11888c3profilegin.jpg', '2433b360643f09393ba0ebb426365450bannerpri.gif', 'Descri&ccedil;&atilde;o &eacute; o texto que cont&eacute;m informa&ccedil;&otilde;es detalhadas sobre as caracter&iacute;sticas de algo ou algu&eacute;m. Assim, ela possibilita a pessoa que a l&ecirc; ou a ouve imaginar com facilidade o que est&aacute; sendo descrito - objetos, lugares, acontecimentos ou pessoas, como por exemplo. A descri&ccedil;&atilde;o pode contemplar aquilo que vemos - que s&atilde;o as caracter&iacute;sticas f&iacute;sicas', 'manda pix', 1, '$2y$10$0sLGvB2mphjI.6foQeUXwOaAgxxc30wJ0TSL/9yE89Sg5mb4KVGva', '2022-11-21', '', 1, 1),
(41, 'Mohamed', '@mohamed007', 'Manito@gmail.com', '8f58be70c3cc49d37d028e6ff74746eesamurai-4836642_1920.jpg', '5294e7253c32ee3c89737da3e2ff3db5maxresdefault.png', 'randomly random\r\n', 'ratsel00h@gmail.com', 0, '$2y$10$7uMp6lY.48ppExHc9xj4nOiAzXZ0Gekd.tVPRljjm4yrBwJmt8tAi', '2022-12-07', '', 1, 1),
(44, 'Maicon Junior', '@maiconjunior', 'maicon997476957@gmail.com', '', '', '', '', 0, '$2y$10$zzNYygn5MaSclM92t2kDoup/TbkaxtOxzJ9ihHZpcWQRT72BX32ja', '2023-03-27', '', 1, 1),
(46, 'Anna Carrey', '@annecrry', 'robux@gmail.com', 'fdbcd0af33da1469a538b1eea995c86eAll-Good-Things-A-Hope-In-Hell-_online-video-cutter.com_.gif', '86ff822cbaa8f7d2c694528dc84db0fdbnrrobux.png', '📚🖋️ Ol&aacute;! Sou Anne Carrey, uma escritora indie de 22 anos apaixonada por palavras e contadora de hist&oacute;rias sombrias no universo cyberpunk. \r\n\r\n🕷️📖 Mergulho nas profundezas do terror, da fic&ccedil;&atilde;o e do mundo tecnol&oacute;gico, criando mundos dist&oacute;picos repletos de desafios e questionamentos. \r\n\r\n💀✨ Bem-vindo ao meu mundo de arrepios e implantes cibern&eacute;ticos! Aqui, compartilho meus livros, onde o futuro dist&oacute;pico se funde com a alta tecnologia, criando tramas envolventes e personagens complexos. Acompanhe-me nessa jornada macabra atrav&eacute;s de cidades neon e megacorpora&ccedil;&otilde;es sinistras. Junte-se a mim e desvende os segredos sombrios que se escondem nas entranhas do ciberespa&ccedil;o. 🌑🔍📚🌆', 'annecrry@gmail.com', 0, '$2y$10$dmY/vhcPjuP6S8AWV2nmb.6k988oatNhVBO4mkLqg8ZRLaUE8fOvG', '2023-03-29', '', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `view`
--

CREATE TABLE `view` (
  `IDView` int(11) NOT NULL,
  `user_FK` int(11) NOT NULL,
  `capitulo_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `view`
--

INSERT INTO `view` (`IDView`, `user_FK`, `capitulo_FK`) VALUES
(11, 29, 13),
(14, 37, 13),
(20, 37, 39),
(21, 46, 39),
(22, 46, 13),
(23, 29, 50),
(24, 29, 39),
(25, 37, 50),
(26, 41, 13),
(27, 41, 50);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `amei`
--
ALTER TABLE `amei`
  ADD PRIMARY KEY (`ID_amei`),
  ADD KEY `obra_FK` (`obra_FK`),
  ADD KEY `user_FK` (`user_FK`);

--
-- Índices para tabela `bloqueio`
--
ALTER TABLE `bloqueio`
  ADD PRIMARY KEY (`ID_bloqueio`),
  ADD KEY `B_user_FK` (`B_user_FK`),
  ADD KEY `user_FK` (`user_FK`);

--
-- Índices para tabela `capitulo`
--
ALTER TABLE `capitulo`
  ADD PRIMARY KEY (`ID_capitulo`),
  ADD KEY `obra_FK` (`obra_FK`);

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`IDCat`);

--
-- Índices para tabela `categoria_da_obra`
--
ALTER TABLE `categoria_da_obra`
  ADD PRIMARY KEY (`IDCatObr`),
  ADD KEY `IDObraFK` (`IDObraFK`,`IDCatFK`),
  ADD KEY `categoria_da_obra_ibfk_1` (`IDCatFK`);

--
-- Índices para tabela `checkweek`
--
ALTER TABLE `checkweek`
  ADD PRIMARY KEY (`ID_checkweek`),
  ADD KEY `user_FK` (`user_FK`);

--
-- Índices para tabela `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`ID_comentario`),
  ADD KEY `user_FK` (`user_FK`),
  ADD KEY `destinatario_FK` (`destinatario_FK`);

--
-- Índices para tabela `conquistas`
--
ALTER TABLE `conquistas`
  ADD PRIMARY KEY (`ID_CON`);

--
-- Índices para tabela `favorito`
--
ALTER TABLE `favorito`
  ADD PRIMARY KEY (`IDFav`),
  ADD KEY `user_FK` (`user_FK`,`obra_FK`),
  ADD KEY `obra_FK` (`obra_FK`);

--
-- Índices para tabela `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`ID_like`),
  ADD KEY `likes_ibfk_1` (`user_FK`),
  ADD KEY `destinatario_FK` (`destinatario_FK`);

--
-- Índices para tabela `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`),
  ADD KEY `messages_ibfk_1` (`incoming_msg_id`),
  ADD KEY `messages_ibfk_2` (`outgoing_msg_id`);

--
-- Índices para tabela `notificacao`
--
ALTER TABLE `notificacao`
  ADD PRIMARY KEY (`IDNOT`),
  ADD KEY `user_FKNOT` (`user_FKNOT`),
  ADD KEY `destinatario_FKNOT` (`destinatario_FKNOT`);

--
-- Índices para tabela `obra`
--
ALTER TABLE `obra`
  ADD PRIMARY KEY (`ID_obra`),
  ADD KEY `user_FK` (`user_FK`);

--
-- Índices para tabela `rankeamento`
--
ALTER TABLE `rankeamento`
  ADD PRIMARY KEY (`IDRAN`),
  ADD KEY `user_FKRAN` (`user_FKRAN`);

--
-- Índices para tabela `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`ID_report`),
  ADD KEY `obra_FK` (`obra_FK`),
  ADD KEY `user_FK` (`user_FK`),
  ADD KEY `destinatario_FK` (`destinatario_FK`);

--
-- Índices para tabela `seguir`
--
ALTER TABLE `seguir`
  ADD PRIMARY KEY (`ID_seguir`),
  ADD KEY `user_FK` (`user_FK`),
  ADD KEY `seguidor` (`seguidor_FK`);

--
-- Índices para tabela `user_conq`
--
ALTER TABLE `user_conq`
  ADD PRIMARY KEY (`ID_ConUser`),
  ADD KEY `user_FK` (`user_FK`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_user`);

--
-- Índices para tabela `view`
--
ALTER TABLE `view`
  ADD PRIMARY KEY (`IDView`),
  ADD KEY `user_FK` (`user_FK`),
  ADD KEY `capitulo_FK` (`capitulo_FK`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `amei`
--
ALTER TABLE `amei`
  MODIFY `ID_amei` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de tabela `bloqueio`
--
ALTER TABLE `bloqueio`
  MODIFY `ID_bloqueio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `capitulo`
--
ALTER TABLE `capitulo`
  MODIFY `ID_capitulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `IDCat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de tabela `categoria_da_obra`
--
ALTER TABLE `categoria_da_obra`
  MODIFY `IDCatObr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT de tabela `checkweek`
--
ALTER TABLE `checkweek`
  MODIFY `ID_checkweek` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `comentario`
--
ALTER TABLE `comentario`
  MODIFY `ID_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de tabela `conquistas`
--
ALTER TABLE `conquistas`
  MODIFY `ID_CON` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `favorito`
--
ALTER TABLE `favorito`
  MODIFY `IDFav` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT de tabela `likes`
--
ALTER TABLE `likes`
  MODIFY `ID_like` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT de tabela `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `notificacao`
--
ALTER TABLE `notificacao`
  MODIFY `IDNOT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de tabela `obra`
--
ALTER TABLE `obra`
  MODIFY `ID_obra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT de tabela `rankeamento`
--
ALTER TABLE `rankeamento`
  MODIFY `IDRAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `report`
--
ALTER TABLE `report`
  MODIFY `ID_report` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `seguir`
--
ALTER TABLE `seguir`
  MODIFY `ID_seguir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT de tabela `user_conq`
--
ALTER TABLE `user_conq`
  MODIFY `ID_ConUser` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de tabela `view`
--
ALTER TABLE `view`
  MODIFY `IDView` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `amei`
--
ALTER TABLE `amei`
  ADD CONSTRAINT `amei_ibfk_1` FOREIGN KEY (`obra_FK`) REFERENCES `obra` (`ID_obra`) ON DELETE CASCADE,
  ADD CONSTRAINT `amei_ibfk_2` FOREIGN KEY (`user_FK`) REFERENCES `usuario` (`ID_user`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `bloqueio`
--
ALTER TABLE `bloqueio`
  ADD CONSTRAINT `bloqueio_ibfk_1` FOREIGN KEY (`B_user_FK`) REFERENCES `usuario` (`ID_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `bloqueio_ibfk_2` FOREIGN KEY (`user_FK`) REFERENCES `usuario` (`ID_user`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `capitulo`
--
ALTER TABLE `capitulo`
  ADD CONSTRAINT `capitulo_ibfk_1` FOREIGN KEY (`obra_FK`) REFERENCES `obra` (`ID_obra`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `categoria_da_obra`
--
ALTER TABLE `categoria_da_obra`
  ADD CONSTRAINT `categoria_da_obra_ibfk_1` FOREIGN KEY (`IDCatFK`) REFERENCES `categoria` (`IDCat`) ON DELETE CASCADE,
  ADD CONSTRAINT `categoria_da_obra_ibfk_2` FOREIGN KEY (`IDObraFK`) REFERENCES `obra` (`ID_obra`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `checkweek`
--
ALTER TABLE `checkweek`
  ADD CONSTRAINT `checkweek_ibfk_1` FOREIGN KEY (`user_FK`) REFERENCES `usuario` (`ID_user`);

--
-- Limitadores para a tabela `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`user_FK`) REFERENCES `usuario` (`ID_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`destinatario_FK`) REFERENCES `usuario` (`ID_user`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `favorito`
--
ALTER TABLE `favorito`
  ADD CONSTRAINT `favorito_ibfk_1` FOREIGN KEY (`obra_FK`) REFERENCES `obra` (`ID_obra`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorito_ibfk_2` FOREIGN KEY (`user_FK`) REFERENCES `usuario` (`ID_user`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`user_FK`) REFERENCES `usuario` (`ID_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`destinatario_FK`) REFERENCES `usuario` (`ID_user`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`incoming_msg_id`) REFERENCES `usuario` (`ID_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`outgoing_msg_id`) REFERENCES `usuario` (`ID_user`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `notificacao`
--
ALTER TABLE `notificacao`
  ADD CONSTRAINT `notificacao_ibfk_1` FOREIGN KEY (`user_FKNOT`) REFERENCES `usuario` (`ID_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `notificacao_ibfk_2` FOREIGN KEY (`destinatario_FKNOT`) REFERENCES `usuario` (`ID_user`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `obra`
--
ALTER TABLE `obra`
  ADD CONSTRAINT `obra_ibfk_1` FOREIGN KEY (`user_FK`) REFERENCES `usuario` (`ID_user`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `rankeamento`
--
ALTER TABLE `rankeamento`
  ADD CONSTRAINT `rankeamento_ibfk_1` FOREIGN KEY (`user_FKRAN`) REFERENCES `usuario` (`ID_user`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`obra_FK`) REFERENCES `obra` (`ID_obra`),
  ADD CONSTRAINT `report_ibfk_2` FOREIGN KEY (`user_FK`) REFERENCES `usuario` (`ID_user`),
  ADD CONSTRAINT `report_ibfk_3` FOREIGN KEY (`destinatario_FK`) REFERENCES `usuario` (`ID_user`);

--
-- Limitadores para a tabela `seguir`
--
ALTER TABLE `seguir`
  ADD CONSTRAINT `seguir_ibfk_1` FOREIGN KEY (`user_FK`) REFERENCES `usuario` (`ID_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `seguir_ibfk_2` FOREIGN KEY (`seguidor_FK`) REFERENCES `usuario` (`ID_user`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `user_conq`
--
ALTER TABLE `user_conq`
  ADD CONSTRAINT `user_conq_ibfk_1` FOREIGN KEY (`user_FK`) REFERENCES `usuario` (`ID_user`);

--
-- Limitadores para a tabela `view`
--
ALTER TABLE `view`
  ADD CONSTRAINT `view_ibfk_1` FOREIGN KEY (`capitulo_FK`) REFERENCES `capitulo` (`ID_capitulo`) ON DELETE CASCADE,
  ADD CONSTRAINT `view_ibfk_2` FOREIGN KEY (`user_FK`) REFERENCES `usuario` (`ID_user`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
