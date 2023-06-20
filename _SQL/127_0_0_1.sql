-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20/06/2023 às 18:05
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

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
-- Estrutura para tabela `amei`
--

CREATE TABLE `amei` (
  `ID_amei` int(11) NOT NULL,
  `user_FK` int(11) NOT NULL,
  `obra_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `amei`
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
-- Estrutura para tabela `bloqueio`
--

CREATE TABLE `bloqueio` (
  `ID_bloqueio` int(11) NOT NULL,
  `B_user_FK` int(11) NOT NULL,
  `user_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `capitulo`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `capitulo`
--

INSERT INTO `capitulo` (`ID_capitulo`, `titulo_cap`, `obra_FK`, `conteudo`, `restricao`, `created_at`, `updated_at`, `publicado`) VALUES
(13, ' Andr&ocirc;meda', 67, 'A volcano is an opening in a planet or moon’s crust through which molten rock, hot gases, and other materials erupt. Volcanoes often form a hill or mountain as layers of rock and ash build up from repeated eruptions.Volcanoes are classified as active, dormant, or extinct. Active volcanoes have a recent history of eruptions; they are likely to erupt again. Dormant volcanoes have not erupted for a very long time but may erupt at a future time. Extinct volcanoes are not expected to erupt in the future.\r\n\r\nInside an active volcano is a chamber in which molten rock, called magma, collects. Pressure builds up inside the magma chamber, causing the magma to move through channels in the rock and escape onto the planet’s surface. Once it flows onto the surface the magma is known as lava.Some volcanic eruptions are explosive, while others occur as a slow lava flow. Eruptions can occur through a main opening at the top of the volcano or through vents that form on the sides. The rate and intensity of eruptions, as well as the composition of the magma, determine the shape of the volcano.Volcanoes are found on both land and the ocean floor. When volcanoes erupt on the ocean floor, they often create underwater mountains and mountain ranges as the released lava cools and hardens. Volcanoes on the ocean floor become islands when the mountains become so large they rise above the surface of the ocean.\r\nA volcano is an opening in a planet or moon’s crust through which molten rock, hot gases, and other materials erupt. Volcanoes often form a hill or mountain as layers of rock and ash build up from repeated eruptions.\r\n\r\nVolcanoes are classified as active, dormant, or extinct. Active volcanoes have a recent history of eruptions; they are likely to erupt again. Dormant volcanoes have not erupted for a very long time but may erupt at a future time. Extinct volcanoes are not expected to erupt in the future.\r\n\r\nInside an active volcano is a chamber in which molten rock, called magma, collects. Pressure builds up inside the magma chamber, causing the magma to move through channels in the rock and escape onto the planet’s surface. Once it flows onto the surface the magma is known as lava.Some volcanic eruptions are explosive, while others occur as a slow lava flow. Eruptions can occur through a main opening at the top of the volcano or through vents that form on the sides. The rate and intensity of eruptions, as well as the composition of the magma, determine the shape of the volcano.\r\n\r\nVolcanoes are found on both land and the ocean floor. When volcanoes erupt on the ocean floor, they often create underwater mountains and mountain ranges as the released lava cools and hardens. Volcanoes on the ocean floor become islands when the mountains become so large they rise above the surface of th', 0, '2023-04-02 21:34:02', '2023-05-13 10:15:23', 1),
(39, ' Cap&iacute;tulo 1', 81, '<p>gcu\\sgdfsagdguafdf</p>', 0, '2023-05-08 21:14:18', '2023-05-09 00:14:18', 1),
(50, 'to be continued', 67, '<p style=\"text-align: right; \">\r\n\r\n<span style=\"color: rgb(17, 17, 17); font-family: Roboto, sans-serif; font-size: 16px; text-align: left; background-color: rgb(255, 255, 255)\">Galinhas (Gallus gallus) são<span>&nbsp;</span></span><strong style=\"font-weight: 700; background-color: rgba(16, 110, 190, 0.18); color: rgb(17, 17, 17); font-family: Roboto, sans-serif; font-size: 16px; text-align: left\">aves domésticas</strong><span style=\"color: rgb(17, 17, 17); font-family: Roboto, sans-serif; font-size: 16px; text-align: left; background-color: rgb(255, 255, 255)\"><span>&nbsp;</span>pertencentes à Ordem Galliforme, Família Phasianidae. São animais de médio porte, variando de 400 gr a 6 kg, de acordo com a raça. São de origem asiática, porém foram introduzidas em todas as partes do mundo graças à domesticação.</span>\r\n<br /></p>', 0, '2023-05-24 22:26:56', '2023-05-25 01:26:56', 1),
(51, 'Capítulo 1', 67, 'Era uma vez, em um reino distante, uma jovem princesa chamada Isabella. Ela vivia em um castelo encantado rodeado por belos jardins...', 0, '2023-06-20 01:36:05', '2023-06-20 04:36:05', 1),
(52, 'Capítulo 2', 67, 'Enquanto Isabella explorava os corredores sombrios do castelo, ela descobriu um segredo ancestral que abalou suas convicções...', 0, '2023-06-20 01:36:05', '2023-06-20 04:36:05', 1),
(53, 'Capítulo 3', 67, 'Determinada a desvendar o mistério, Isabella embarcou em uma jornada perigosa que a levaria a encontros inesperados e grandes desafios...', 0, '2023-06-20 01:36:05', '2023-06-20 04:36:05', 1),
(54, 'Capítulo 1', 81, 'No vilarejo pacífico de Greenfield, um jovem chamado Lucas descobriu uma antiga profecia que o ligava a uma misteriosa joia...', 0, '2023-06-20 01:36:05', '2023-06-20 04:36:05', 1),
(55, 'Capítulo 2', 81, 'Ao lado de seus leais amigos, Lucas embarcou em uma jornada épica para encontrar as outras peças da joia e desvendar o seu verdadeiro poder...', 0, '2023-06-20 01:36:05', '2023-06-20 04:36:05', 1),
(56, 'Capítulo 3', 81, 'No caminho, eles enfrentaram criaturas sombrias, resolveram enigmas e aprenderam valiosas lições de amizade e coragem...', 0, '2023-06-20 01:36:05', '2023-06-20 04:36:05', 1),
(57, 'Capítulo 1', 87, 'Em uma pequena cidade chamada Harmonyville, um grupo de jovens músicos formou uma banda com o sonho de alcançar o estrelato...', 0, '2023-06-20 01:36:05', '2023-06-20 04:36:05', 1),
(58, 'Capítulo 2', 87, 'Conforme a banda se tornava popular, eles enfrentaram desafios, rivalidades e descobriram o verdadeiro significado da música...', 0, '2023-06-20 01:36:05', '2023-06-20 04:36:05', 1),
(59, 'Capítulo 3', 87, 'Com suas canções cativantes e performances energéticas, a banda conquistou o coração do público e escreveu seu nome na história da música...', 0, '2023-06-20 01:36:05', '2023-06-20 04:36:05', 1),
(60, 'Capítulo 1', 93, 'Era uma vez, em um mundo de fantasia, um jovem herói chamado Alex. Ele possuía um poder mágico único e uma missão grandiosa...', 0, '2023-06-20 01:36:05', '2023-06-20 04:36:05', 1),
(61, 'Capítulo 2', 93, 'Alex enfrentou criaturas malignas, desafiou perigosos labirintos e encontrou aliados improváveis em sua jornada para salvar o reino...', 0, '2023-06-20 01:36:05', '2023-06-20 04:36:05', 1),
(62, 'Capítulo 3', 93, 'Com bravura e determinação, Alex se tornou uma lenda, cumprindo sua missão e trazendo paz e harmonia de volta ao mundo...', 0, '2023-06-20 01:36:05', '2023-06-20 04:36:05', 1),
(63, 'Capítulo 1', 94, 'Em um futuro distópico, a humanidade luta para sobreviver em um mundo pós-apocalíptico. Nesse cenário desolador, um jovem chamado Ethan emerge como um símbolo de esperança...', 0, '2023-06-20 01:36:05', '2023-06-20 04:36:05', 1),
(64, 'Capítulo 2', 94, 'Ethan lidera um grupo de resistência contra um governo opressor, enfrentando batalhas emocionantes e desafiando as injustiças do sistema...', 0, '2023-06-20 01:36:05', '2023-06-20 04:36:05', 1),
(65, 'Capítulo 3', 94, 'Sua coragem e sacrifícios inspiram outros a se unirem à causa, iniciando uma revolução que poderá mudar o destino da humanidade...', 0, '2023-06-20 01:36:05', '2023-06-20 04:36:05', 1),
(66, 'Capítulo 1', 95, 'Em um mundo governado por magia, uma jovem feiticeira chamada Luna embarca em uma jornada em busca de conhecimento e domínio de seus poderes...', 0, '2023-06-20 01:36:05', '2023-06-20 04:36:05', 1),
(67, 'Capítulo 2', 95, 'Ao longo de sua jornada, Luna enfrenta desafios místicos, encontra mentores sábios e descobre segredos antigos sobre a origem da magia...', 0, '2023-06-20 01:36:05', '2023-06-20 04:36:05', 1),
(68, 'Capítulo 3', 95, 'Com seu espírito determinado e habilidades aprimoradas, Luna se torna uma das feiticeiras mais poderosas de todos os tempos...', 0, '2023-06-20 01:36:05', '2023-06-20 04:36:05', 1),
(69, 'O Mistério dos Espelhos', 105, 'Alexander reúne um grupo de bravos guerreiros e parte em uma perigosa busca pelo Dragão de Fogo, cujo poder pode mudar o curso da guerra. Enquanto enfrentam criaturas míticas e superam obstáculos mortais, eles se aproximam cada vez mais do covil do dragão.', 0, '2023-06-20 01:42:59', '2023-06-20 04:42:59', 1),
(70, 'O Confronto Final', 105, 'Com o destino do reino em jogo, Alexander e seus companheiros enfrentam o Dragão de Fogo em uma batalha épica. Eles terão que mostrar coragem, lealdade e sacrifício para derrotar a criatura e trazer a paz de volta ao reino.', 0, '2023-06-20 01:44:44', '2023-06-20 04:44:44', 1),
(92, 'A Queda das Sombras', 94, 'Uma ameaça ancestral surge, mergulhando o mundo em trevas e desencadeando uma batalha épica entre a luz e as sombras.', 0, '2023-06-20 02:02:13', '2023-06-20 05:02:13', 1),
(93, 'Em Busca da Verdade', 95, 'Os protagonistas embarcam em uma jornada perigosa para descobrir a verdade oculta que mudará o curso da história.', 0, '2023-06-20 02:02:13', '2023-06-20 05:02:13', 1),
(94, 'A Aliança Inesperada', 96, 'Aliados improváveis se unem contra uma ameaça em comum neste capítulo repleto de intriga e traição.', 0, '2023-06-20 02:02:13', '2023-06-20 05:02:13', 1),
(95, 'O Poder do Destino', 97, 'Neste capítulo emocionante, os personagens descobrem seu verdadeiro potencial e se deparam com o papel do destino em suas vidas.', 0, '2023-06-20 02:02:13', '2023-06-20 05:02:13', 1),
(96, 'Confronto no Abismo', 98, 'Um confronto climático ocorre no abismo do desconhecido, testando a coragem e a determinação dos heróis.', 0, '2023-06-20 02:02:13', '2023-06-20 05:02:13', 1),
(97, 'À Beira do Colapso', 99, 'O mundo está à beira do colapso e os protagonistas enfrentam desafios inimagináveis neste capítulo de alta tensão.', 0, '2023-06-20 02:02:13', '2023-06-20 05:02:13', 1),
(98, 'O Renascimento da Esperança', 100, 'Neste capítulo emocionante, a esperança renasce das cinzas enquanto os personagens lutam para reverter os eventos devastadores.', 0, '2023-06-20 02:02:13', '2023-06-20 05:02:13', 1),
(99, 'O Legado Perdido', 101, 'Um legado misterioso é descoberto, revelando segredos que desafiam as noções dos personagens sobre sua própria história.', 0, '2023-06-20 02:02:13', '2023-06-20 05:02:13', 1),
(100, 'À Sombra da Traição', 102, 'A sombra da traição paira sobre os protagonistas neste capítulo repleto de reviravoltas e revelações surpreendentes.', 0, '2023-06-20 02:02:13', '2023-06-20 05:02:13', 1),
(101, 'A Promessa Cumprida', 103, 'Uma promessa antiga é finalmente cumprida neste capítulo comovente, trazendo resolução e redenção aos personagens.', 0, '2023-06-20 02:02:13', '2023-06-20 05:02:13', 1),
(102, 'O Despertar da Escuridão', 105, 'Uma força sinistra desperta neste capítulo sombrio, ameaçando mergulhar o mundo em trevas eternas.', 0, '2023-06-20 02:02:13', '2023-06-20 05:02:13', 1),
(103, 'O Destino em Jogo', 105, 'Com o destino do reino em jogo, Alexander e seus companheiros enfrentam o Dragão de Fogo em uma batalha épica. Eles terão que mostrar coragem, lealdade e sacrifício para derrotar a criatura e trazer a paz de volta ao reino.', 0, '2023-06-20 02:02:13', '2023-06-20 05:02:13', 1),
(104, 'O Mistério Profundo', 106, 'Neste capítulo enigmático, os protagonistas mergulham em um mistério profundo que os levará a lugares obscuros e desconhecidos.', 0, '2023-06-20 02:02:13', '2023-06-20 05:02:13', 1),
(105, 'O Despertar dos Antigos', 107, 'Antigos seres despertam de seu sono milenar, trazendo consigo uma ameaça avassaladora neste capítulo cheio de suspense.', 0, '2023-06-20 02:02:13', '2023-06-20 05:02:13', 1),
(106, 'O Caminho da Redenção', 108, 'Os personagens enfrentam seu passado sombrio e trilham o difícil caminho da redenção neste capítulo emocionante.', 0, '2023-06-20 02:02:13', '2023-06-20 05:02:13', 1),
(107, 'A Última Batalha', 109, 'A última batalha se aproxima, e os protagonistas se preparam para enfrentar seu maior desafio neste capítulo carregado de tensão e emoção.', 0, '2023-06-20 02:02:13', '2023-06-20 05:02:13', 1),
(108, 'O Segredo Revelado', 110, 'Neste capítulo revelador, os segredos mais obscuros vêm à tona, mudando para sempre a vida dos personagens.', 0, '2023-06-20 02:02:13', '2023-06-20 05:02:13', 1),
(109, 'O Despertar da Magia', 111, 'A magia ancestral desperta neste capítulo mágico, trazendo consigo poderes inimagináveis e desafios surpreendentes.', 0, '2023-06-20 02:02:13', '2023-06-20 05:02:13', 1),
(110, 'O Julgamento Final', 112, 'No capítulo final emocionante, os protagonistas enfrentam o julgamento final, onde suas escolhas determinarão o destino do mundo.', 0, '2023-06-20 02:02:13', '2023-06-20 05:02:13', 1),
(111, 'Entre Dois Mundos', 113, 'Os personagens se encontram divididos entre dois mundos, lutando para encontrar seu lugar neste capítulo cheio de conflitos internos.', 0, '2023-06-20 02:02:13', '2023-06-20 05:02:13', 1),
(112, 'A Jornada Interminável', 114, 'A jornada dos protagonistas parece não ter fim, levando-os a lugares desconhecidos e desafiadores neste capítulo de aventura constante.', 0, '2023-06-20 02:02:13', '2023-06-20 05:02:13', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `IDCat` int(11) NOT NULL,
  `categoriaCat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categoria`
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
-- Estrutura para tabela `categoria_da_obra`
--

CREATE TABLE `categoria_da_obra` (
  `IDCatObr` int(11) NOT NULL,
  `IDObraFK` int(11) NOT NULL,
  `IDCatFK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categoria_da_obra`
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
(240, 93, 29),
(301, 94, 2),
(302, 94, 2),
(303, 94, 7),
(304, 95, 3),
(305, 95, 13),
(306, 95, 19),
(307, 96, 4),
(308, 96, 5),
(309, 96, 15),
(310, 97, 6),
(311, 97, 10),
(312, 97, 31),
(313, 98, 2),
(314, 98, 2),
(315, 98, 13),
(316, 99, 4),
(317, 99, 5),
(318, 99, 27),
(319, 100, 8),
(320, 100, 14),
(321, 100, 19),
(322, 101, 4),
(323, 101, 13),
(324, 101, 19),
(325, 102, 9),
(326, 102, 14),
(327, 102, 33),
(328, 103, 5),
(329, 103, 20),
(330, 103, 28);

-- --------------------------------------------------------

--
-- Estrutura para tabela `checkweek`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentario`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `comentario`
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
-- Estrutura para tabela `conquistas`
--

CREATE TABLE `conquistas` (
  `ID_CON` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `max_avaliacao` int(11) NOT NULL,
  `exp` int(11) NOT NULL,
  `max_leitura` int(11) NOT NULL,
  `max_curtidas` int(11) NOT NULL,
  `max_nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `favorito`
--

CREATE TABLE `favorito` (
  `IDFav` int(11) NOT NULL,
  `user_FK` int(11) NOT NULL,
  `obra_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `favorito`
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
-- Estrutura para tabela `likes`
--

CREATE TABLE `likes` (
  `ID_like` int(11) NOT NULL,
  `ID_tipo` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `feedback` tinyint(4) NOT NULL,
  `destinatario_FK` int(11) NOT NULL,
  `user_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `likes`
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
-- Estrutura para tabela `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `messages`
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
-- Estrutura para tabela `notificacao`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `notificacao`
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
-- Estrutura para tabela `obra`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `obra`
--

INSERT INTO `obra` (`ID_obra`, `nome_obra`, `user_FK`, `descricao`, `etaria`, `created_at`, `foto_obra`, `updated_at`, `publicado`, `Finalizado`) VALUES
(67, 'Volcanic return', 29, 'Inside an active volcano is a chamber in which molten rock, called magma, collects. Pressure builds up inside the magma chamber, causing the magma to move through channels in the rock and escape onto the planet&rsquo;s surface. Once it flows onto the surface the magma is known as lava.', 'Adulto', '2023-04-02 19:31:33', '', '2023-06-20 15:59:42', 1, 0),
(81, 'Sahovi', 37, 'Um mercen&aacute;rio com um forte trauma do passado quer se vingar, mas muitos coisas o impedem.', 'Adulto', '2023-05-06 05:16:04', '', '2023-06-20 15:59:42', 1, 0),
(87, 'A Jornada de Okalhity: Imortalidade al&eacute;m dos S&eacute;culos', 46, '\r\nH&aacute; muito tempo, em uma terra repleta de lendas e mist&eacute;rios, vivia um personagem extraordin&aacute;rio chamado Okalhity. Ele era &uacute;nico, dotado de uma d&aacute;diva especial que o tornava imortal e eterno. Desde o princ&iacute;pio dos tempos, Okalhity vagava pela terra, testemunhando o nascimento e a queda de imp&eacute;rios, a ascens&atilde;o e a extin&ccedil;&atilde;o de civiliza&ccedil;&otilde;es.\r\n\r\nOkalhity tinha uma apar&ecirc;ncia jovem e vigorosa, mas seus olhos carregavam a sabedoria acumulada ao longo dos s&eacute;culos. Ele presenciou eventos que mudaram o curso da hist&oacute;ria, atravessando guerras e revolu&ccedil;&otilde;es, experimentando a alegria e a tristeza dos seres humanos. Ele era um observador silencioso, um guardi&atilde;o dos segredos do passado.\r\n\r\nEm sua busca pela compreens&atilde;o do mundo e da exist&ecirc;ncia humana, Okalhity dedicou-se &agrave; aprendizagem constante. Ele estudou as artes, ci&ecirc;ncias e filosofia, mergulhando profundamente na busca pelo conhecimento. Com o tempo, ele dominou v&aacute;rias l&iacute;nguas e acumulou um vasto acervo de hist&oacute;rias e mitos.\r\n\r\nEntretanto, a imortalidade de Okalhity trouxe consigo um fardo pesado. Enquanto testemunhava o ciclo constante de vida e morte, ele enfrentou a solid&atilde;o e a perda. Ele viu seus entes queridos envelhecerem e partiram, enquanto ele permanecia inalterado. A conex&atilde;o com outros seres humanos tornou-se fugaz e ef&ecirc;mera.\r\n\r\nCansado d', 'Adulto', '2023-05-16 16:41:56', '', '2023-06-20 15:59:42', 1, 0),
(93, 'G.O.T', 37, 'Desdes o fim dos tempos, um ser bla bla bla', 'Adulto', '2023-05-23 16:49:32', '', '2023-06-20 15:59:42', 1, 0),
(94, 'O Segredo das Sombras', 29, 'Uma história de suspense e mistério que envolve um detetive em busca da verdade', 'Adulto', '2023-06-19 23:47:54', '', '2023-06-20 02:49:18', 1, 0),
(95, 'A Magia Proibida', 29, 'Uma aventura fantástica em um mundo repleto de magia e perigos', 'Adulto', '2023-06-19 23:47:54', '', '2023-06-20 02:49:17', 1, 0),
(96, 'O Mistério do Passado', 29, 'Um drama policial que revela segredos sombrios de personagens enigmáticos', 'Adulto', '2023-06-19 23:47:54', '', '2023-06-20 02:49:15', 1, 0),
(97, 'A Jornada Épica', 37, 'Uma aventura emocionante repleta de ação e batalhas épicas', 'Adulto', '2023-06-19 23:47:54', '', '2023-06-20 02:49:13', 1, 0),
(98, 'O Legado Perdido', 37, 'Uma história de fantasia que segue a jornada de heróis em busca de artefatos místicos', 'Adulto', '2023-06-19 23:47:54', '', '2023-06-20 02:49:06', 1, 0),
(99, 'A Última Esperança', 37, 'Um conto pós-apocalíptico sobre a luta pela sobrevivência da humanidade', 'Adulto', '2023-06-19 23:47:54', '', '2023-06-20 02:49:04', 1, 0),
(100, 'O Poder das Estrelas', 41, 'Uma obra de ficção científica que explora as maravilhas do espaço sideral', 'Adulto', '2023-06-19 23:47:54', '', '2023-06-20 02:49:00', 1, 0),
(101, 'O Segredo das Runas', 41, 'Uma aventura histórica que revela os mistérios da antiga civilização', 'Adulto', '2023-06-19 23:47:54', '', '2023-06-20 02:48:56', 1, 0),
(102, 'O Portal Mágico', 44, 'Uma fantasia encantadora que transporta os leitores para um mundo mágico', 'Adulto', '2023-06-19 23:47:54', '', '2023-06-20 02:48:48', 1, 0),
(103, 'O Mistério do Enigma', 44, 'Um suspense intrigante que desafia os personagens a desvendarem um enigma mortal', 'Adulto', '2023-06-19 23:47:54', '', '2023-06-20 02:48:44', 1, 0),
(105, 'Sombras do Passado', 69, 'Em uma cidade sombria e assolada pelo crime, um detetive obstinado chamado Jack Thompson investiga uma série de assassinatos brutais que parecem estar conectados a eventos traumáticos de seu próprio passado. À medida que ele mergulha cada vez mais na escuridão, segredos perturbadores vêm à tona, desafiando sua sanidade e colocando sua vida em perigo.', 'Adulto', '2023-06-20 01:41:12', '', '2023-06-20 04:41:12', 1, 0),
(106, 'O Domínio das Trevas', 46, 'Uma história sombria de horror que explora os limites da mente humana', 'Adulto', '2023-06-20 01:52:39', '', '2023-06-20 04:52:39', 1, 0),
(107, 'A Herança Perdida', 37, 'Um mistério familiar cheio de segredos e reviravoltas inesperadas', 'Adulto', '2023-06-20 01:52:39', '', '2023-06-20 04:52:39', 1, 0),
(108, 'A Lenda do Herói', 44, 'Uma jornada épica de um herói destinado a salvar o mundo da destruição', 'Adulto', '2023-06-20 01:52:39', '', '2023-06-20 04:52:39', 1, 0),
(109, 'O Segredo do Amuleto', 37, 'Um objeto místico que concede poderes incríveis, mas a um custo terrível', 'Adulto', '2023-06-20 01:52:39', '', '2023-06-20 04:52:39', 1, 0),
(110, 'A Trama Sinistra', 29, 'Uma conspiração sombria que ameaça a paz e a estabilidade do mundo', 'Adulto', '2023-06-20 01:52:39', '', '2023-06-20 04:52:39', 1, 0),
(111, 'O Mistério do Manuscrito', 69, 'Um manuscrito antigo que guarda segredos ocultos e perigosos', 'Adulto', '2023-06-20 01:52:39', '', '2023-06-20 04:52:39', 1, 0),
(112, 'A Profecia Esquecida', 44, 'Uma profecia antiga que se torna realidade, desencadeando uma série de eventos catastróficos', 'Adulto', '2023-06-20 01:52:39', '', '2023-06-20 04:52:39', 1, 0),
(113, 'O Enigma do Labirinto', 44, 'Um labirinto mortal cheio de armadilhas e desafios mortais', 'Adulto', '2023-06-20 01:52:39', '', '2023-06-20 04:52:39', 1, 0),
(114, 'A Busca pelo Tesouro', 69, 'Uma emocionante caçada ao tesouro perdido que testará a coragem dos aventureiros', 'Adulto', '2023-06-20 01:52:39', '', '2023-06-20 04:52:39', 1, 0),
(115, 'O Despertar das Feras', 69, 'Criaturas ancestrais despertam e ameaçam a existência da humanidade', 'Adulto', '2023-06-20 01:52:39', '', '2023-06-20 04:52:39', 1, 0),
(116, 'A Queda das Estrelas', 29, 'Um império galáctico entra em colapso e desencadeia uma guerra interplanetária', 'Adulto', '2023-06-20 01:54:07', '', '2023-06-20 04:54:07', 1, 0),
(117, 'A Maldição do Espelho', 46, 'Um espelho amaldiçoado reflete os piores medos de quem o encara', 'Adulto', '2023-06-20 01:54:07', '', '2023-06-20 04:54:07', 1, 0),
(118, 'O Legado Divino', 29, 'Deuses antigos retornam para reivindicar seu poder e influência sobre a humanidade', 'Adulto', '2023-06-20 01:54:07', '', '2023-06-20 04:54:07', 1, 0),
(119, 'O Segredo das Ruínas', 37, 'Uma expedição arqueológica descobre um segredo oculto nas ruínas de uma civilização perdida', 'Adulto', '2023-06-20 01:54:07', '', '2023-06-20 04:54:07', 1, 0),
(120, 'A Noite dos Pesadelos', 29, 'Criaturas sinistras e pesadelos aterrorizantes assombram uma cidade adormecida', 'Adulto', '2023-06-20 01:54:07', '', '2023-06-20 04:54:07', 1, 0),
(121, 'A Busca pelo Conhecimento', 69, 'Um aprendiz busca conhecimentos proibidos em uma jornada perigosa e proibida', 'Adulto', '2023-06-20 01:54:07', '', '2023-06-20 04:54:07', 1, 0),
(122, 'O Segredo das Profundezas', 69, 'Um segredo sombrio escondido nas profundezas do oceano ameaça a existência humana', 'Adulto', '2023-06-20 01:54:07', '', '2023-06-20 04:54:07', 1, 0),
(123, 'A Profecia do Destino', 44, 'Uma profecia milenar guia o destino de um herói relutante em sua jornada épica', 'Adulto', '2023-06-20 01:54:07', '', '2023-06-20 04:54:07', 1, 0),
(124, 'A Ordem dos Guardiões', 41, 'Uma sociedade secreta protege relíquias poderosas de cair nas mãos erradas', 'Adulto', '2023-06-20 01:54:07', '', '2023-06-20 04:54:07', 1, 0),
(125, 'O Mistério do Portal', 29, 'Um portal mágico se abre, conectando dois mundos e desencadeando consequências imprevisíveis', 'Adulto', '2023-06-20 01:54:07', '', '2023-06-20 04:54:07', 1, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `rankeamento`
--

CREATE TABLE `rankeamento` (
  `IDRAN` int(11) NOT NULL,
  `rankPontosRAN` int(11) NOT NULL DEFAULT 0,
  `levelRAN` int(11) NOT NULL DEFAULT 1,
  `expRAN` int(11) NOT NULL DEFAULT 0,
  `maxExpRAN` int(11) NOT NULL DEFAULT 100,
  `user_FKRAN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `rankeamento`
--

INSERT INTO `rankeamento` (`IDRAN`, `rankPontosRAN`, `levelRAN`, `expRAN`, `maxExpRAN`, `user_FKRAN`) VALUES
(2, 70, 1, 0, 100, 37),
(3, 0, 1, 0, 100, 29),
(4, 0, 1, 0, 100, 41),
(5, 0, 1, 0, 100, 44),
(6, 0, 1, 0, 100, 46),
(13, 0, 1, 0, 100, 69);

-- --------------------------------------------------------

--
-- Estrutura para tabela `report`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `seguir`
--

CREATE TABLE `seguir` (
  `ID_seguir` int(11) NOT NULL,
  `user_FK` int(11) NOT NULL,
  `seguidor_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `seguir`
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
-- Estrutura para tabela `user_conq`
--

CREATE TABLE `user_conq` (
  `ID_ConUser` int(11) NOT NULL,
  `avaliacao` int(11) NOT NULL,
  `leitura` int(11) NOT NULL,
  `curtidas` int(11) NOT NULL,
  `nivel` int(11) NOT NULL,
  `user_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`ID_user`, `nome`, `codigo`, `email`, `foto`, `banner`, `descricaoUSU`, `chavePix`, `status`, `senha`, `data_cad`, `recuperar_senha`, `NOTmsg`, `NOTatdp`) VALUES
(29, 'Ratsel', '@sifudiasnaomais77', 'ratsel00h@gmail.com', '', '721bd26ecd26294dd268e762e721c6b9pexels-photo-13271915.webp', 'Quando dizem que a primeira impress&atilde;o &eacute; a que fica, est&atilde;o dizendo a mais pura verdade! O seu perfil &eacute; a sua porta de entrada nas redes sociais, ent&atilde;o cuide bem dele e deixe-o bem atrativo para os seus visitantes! Frases para perfil s&atilde;o muito &uacute;teis na hora de fazer um resumo sobre si mesmo na sua conta online.', '', 0, '$2y$10$lY0nAUZ..kO9YzgUaqbXBe92nFSyp8KT0SwPMy8kcYWcNLGSE.0Wy', '2022-11-19', '', 1, 1),
(37, 'Katsurazur4', '@katsurazur4170', 'ebooksquare.tcc@gmail.com', '', '', 'Descri&ccedil;&atilde;o &eacute; o texto que cont&eacute;m informa&ccedil;&otilde;es detalhadas sobre as caracter&iacute;sticas de algo ou algu&eacute;m. Assim, ela possibilita a pessoa que a l&ecirc; ou a ouve imaginar com facilidade o que est&aacute; sendo descrito - objetos, lugares, acontecimentos ou pessoas, como por exemplo. A descri&ccedil;&atilde;o pode contemplar aquilo que vemos - que s&atilde;o as caracter&iacute;sticas f&iacute;sicas', 'manda pix', 1, '$2y$10$0sLGvB2mphjI.6foQeUXwOaAgxxc30wJ0TSL/9yE89Sg5mb4KVGva', '2022-11-21', '', 1, 1),
(41, 'Mohamed', '@mohamed007', 'Manito@gmail.com', '', '', 'randomly random\r\n', 'ratsel00h@gmail.com', 0, '$2y$10$7uMp6lY.48ppExHc9xj4nOiAzXZ0Gekd.tVPRljjm4yrBwJmt8tAi', '2022-12-07', '', 1, 1),
(44, 'Maicon Junior', '@maiconjunior', 'maicon997476957@gmail.com', '', '', '', '', 0, '$2y$10$zzNYygn5MaSclM92t2kDoup/TbkaxtOxzJ9ihHZpcWQRT72BX32ja', '2023-03-27', '', 1, 1),
(46, 'Anna Carrey', '@annecrry', 'robux@gmail.com', '', '', '📚🖋️ Ol&aacute;! Sou Anne Carrey, uma escritora indie de 22 anos apaixonada por palavras e contadora de hist&oacute;rias sombrias no universo cyberpunk. \r\n\r\n🕷️📖 Mergulho nas profundezas do terror, da fic&ccedil;&atilde;o e do mundo tecnol&oacute;gico, criando mundos dist&oacute;picos repletos de desafios e questionamentos. \r\n\r\n💀✨ Bem-vindo ao meu mundo de arrepios e implantes cibern&eacute;ticos! Aqui, compartilho meus livros, onde o futuro dist&oacute;pico se funde com a alta tecnologia, criando tramas envolventes e personagens complexos. Acompanhe-me nessa jornada macabra atrav&eacute;s de cidades neon e megacorpora&ccedil;&otilde;es sinistras. Junte-se a mim e desvende os segredos sombrios que se escondem nas entranhas do ciberespa&ccedil;o. 🌑🔍📚🌆', 'annecrry@gmail.com', 0, '$2y$10$dmY/vhcPjuP6S8AWV2nmb.6k988oatNhVBO4mkLqg8ZRLaUE8fOvG', '2023-03-29', '', 1, 1),
(69, 'Felipe', '@felipe', 'fefecaje@hotmail.com', '', '', '', '', 0, '$2y$10$uehlUtaPLs21t.5xAljUWuhyMeHFUY62Edf3lVFpwTVgr5mBVsBdy', '2023-06-20', '', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `view`
--

CREATE TABLE `view` (
  `IDView` int(11) NOT NULL,
  `user_FK` int(11) NOT NULL,
  `capitulo_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `view`
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
-- Índices de tabela `amei`
--
ALTER TABLE `amei`
  ADD PRIMARY KEY (`ID_amei`),
  ADD KEY `obra_FK` (`obra_FK`),
  ADD KEY `user_FK` (`user_FK`);

--
-- Índices de tabela `bloqueio`
--
ALTER TABLE `bloqueio`
  ADD PRIMARY KEY (`ID_bloqueio`),
  ADD KEY `B_user_FK` (`B_user_FK`),
  ADD KEY `user_FK` (`user_FK`);

--
-- Índices de tabela `capitulo`
--
ALTER TABLE `capitulo`
  ADD PRIMARY KEY (`ID_capitulo`),
  ADD KEY `obra_FK` (`obra_FK`);

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`IDCat`);

--
-- Índices de tabela `categoria_da_obra`
--
ALTER TABLE `categoria_da_obra`
  ADD PRIMARY KEY (`IDCatObr`),
  ADD KEY `IDObraFK` (`IDObraFK`,`IDCatFK`),
  ADD KEY `categoria_da_obra_ibfk_1` (`IDCatFK`);

--
-- Índices de tabela `checkweek`
--
ALTER TABLE `checkweek`
  ADD PRIMARY KEY (`ID_checkweek`),
  ADD KEY `user_FK` (`user_FK`);

--
-- Índices de tabela `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`ID_comentario`),
  ADD KEY `user_FK` (`user_FK`),
  ADD KEY `destinatario_FK` (`destinatario_FK`);

--
-- Índices de tabela `conquistas`
--
ALTER TABLE `conquistas`
  ADD PRIMARY KEY (`ID_CON`);

--
-- Índices de tabela `favorito`
--
ALTER TABLE `favorito`
  ADD PRIMARY KEY (`IDFav`),
  ADD KEY `user_FK` (`user_FK`,`obra_FK`),
  ADD KEY `obra_FK` (`obra_FK`);

--
-- Índices de tabela `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`ID_like`),
  ADD KEY `likes_ibfk_1` (`user_FK`),
  ADD KEY `destinatario_FK` (`destinatario_FK`);

--
-- Índices de tabela `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`),
  ADD KEY `messages_ibfk_1` (`incoming_msg_id`),
  ADD KEY `messages_ibfk_2` (`outgoing_msg_id`);

--
-- Índices de tabela `notificacao`
--
ALTER TABLE `notificacao`
  ADD PRIMARY KEY (`IDNOT`),
  ADD KEY `user_FKNOT` (`user_FKNOT`),
  ADD KEY `destinatario_FKNOT` (`destinatario_FKNOT`);

--
-- Índices de tabela `obra`
--
ALTER TABLE `obra`
  ADD PRIMARY KEY (`ID_obra`),
  ADD KEY `user_FK` (`user_FK`);

--
-- Índices de tabela `rankeamento`
--
ALTER TABLE `rankeamento`
  ADD PRIMARY KEY (`IDRAN`),
  ADD KEY `user_FKRAN` (`user_FKRAN`);

--
-- Índices de tabela `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`ID_report`),
  ADD KEY `obra_FK` (`obra_FK`),
  ADD KEY `user_FK` (`user_FK`),
  ADD KEY `destinatario_FK` (`destinatario_FK`);

--
-- Índices de tabela `seguir`
--
ALTER TABLE `seguir`
  ADD PRIMARY KEY (`ID_seguir`),
  ADD KEY `user_FK` (`user_FK`),
  ADD KEY `seguidor` (`seguidor_FK`);

--
-- Índices de tabela `user_conq`
--
ALTER TABLE `user_conq`
  ADD PRIMARY KEY (`ID_ConUser`),
  ADD KEY `user_FK` (`user_FK`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_user`);

--
-- Índices de tabela `view`
--
ALTER TABLE `view`
  ADD PRIMARY KEY (`IDView`),
  ADD KEY `user_FK` (`user_FK`),
  ADD KEY `capitulo_FK` (`capitulo_FK`);

--
-- AUTO_INCREMENT para tabelas despejadas
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
  MODIFY `ID_capitulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `IDCat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de tabela `categoria_da_obra`
--
ALTER TABLE `categoria_da_obra`
  MODIFY `IDCatObr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=331;

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
  MODIFY `ID_obra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT de tabela `rankeamento`
--
ALTER TABLE `rankeamento`
  MODIFY `IDRAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de tabela `view`
--
ALTER TABLE `view`
  MODIFY `IDView` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `amei`
--
ALTER TABLE `amei`
  ADD CONSTRAINT `amei_ibfk_1` FOREIGN KEY (`obra_FK`) REFERENCES `obra` (`ID_obra`) ON DELETE CASCADE,
  ADD CONSTRAINT `amei_ibfk_2` FOREIGN KEY (`user_FK`) REFERENCES `usuario` (`ID_user`) ON DELETE CASCADE;

--
-- Restrições para tabelas `bloqueio`
--
ALTER TABLE `bloqueio`
  ADD CONSTRAINT `bloqueio_ibfk_1` FOREIGN KEY (`B_user_FK`) REFERENCES `usuario` (`ID_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `bloqueio_ibfk_2` FOREIGN KEY (`user_FK`) REFERENCES `usuario` (`ID_user`) ON DELETE CASCADE;

--
-- Restrições para tabelas `capitulo`
--
ALTER TABLE `capitulo`
  ADD CONSTRAINT `capitulo_ibfk_1` FOREIGN KEY (`obra_FK`) REFERENCES `obra` (`ID_obra`) ON DELETE CASCADE;

--
-- Restrições para tabelas `categoria_da_obra`
--
ALTER TABLE `categoria_da_obra`
  ADD CONSTRAINT `categoria_da_obra_ibfk_1` FOREIGN KEY (`IDCatFK`) REFERENCES `categoria` (`IDCat`) ON DELETE CASCADE,
  ADD CONSTRAINT `categoria_da_obra_ibfk_2` FOREIGN KEY (`IDObraFK`) REFERENCES `obra` (`ID_obra`) ON DELETE CASCADE;

--
-- Restrições para tabelas `checkweek`
--
ALTER TABLE `checkweek`
  ADD CONSTRAINT `checkweek_ibfk_1` FOREIGN KEY (`user_FK`) REFERENCES `usuario` (`ID_user`);

--
-- Restrições para tabelas `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`user_FK`) REFERENCES `usuario` (`ID_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`destinatario_FK`) REFERENCES `usuario` (`ID_user`) ON DELETE CASCADE;

--
-- Restrições para tabelas `favorito`
--
ALTER TABLE `favorito`
  ADD CONSTRAINT `favorito_ibfk_1` FOREIGN KEY (`obra_FK`) REFERENCES `obra` (`ID_obra`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorito_ibfk_2` FOREIGN KEY (`user_FK`) REFERENCES `usuario` (`ID_user`) ON DELETE CASCADE;

--
-- Restrições para tabelas `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`user_FK`) REFERENCES `usuario` (`ID_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`destinatario_FK`) REFERENCES `usuario` (`ID_user`) ON DELETE CASCADE;

--
-- Restrições para tabelas `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`incoming_msg_id`) REFERENCES `usuario` (`ID_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`outgoing_msg_id`) REFERENCES `usuario` (`ID_user`) ON DELETE CASCADE;

--
-- Restrições para tabelas `notificacao`
--
ALTER TABLE `notificacao`
  ADD CONSTRAINT `notificacao_ibfk_1` FOREIGN KEY (`user_FKNOT`) REFERENCES `usuario` (`ID_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `notificacao_ibfk_2` FOREIGN KEY (`destinatario_FKNOT`) REFERENCES `usuario` (`ID_user`) ON DELETE CASCADE;

--
-- Restrições para tabelas `obra`
--
ALTER TABLE `obra`
  ADD CONSTRAINT `obra_ibfk_1` FOREIGN KEY (`user_FK`) REFERENCES `usuario` (`ID_user`) ON DELETE CASCADE;

--
-- Restrições para tabelas `rankeamento`
--
ALTER TABLE `rankeamento`
  ADD CONSTRAINT `rankeamento_ibfk_1` FOREIGN KEY (`user_FKRAN`) REFERENCES `usuario` (`ID_user`) ON DELETE CASCADE;

--
-- Restrições para tabelas `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`obra_FK`) REFERENCES `obra` (`ID_obra`),
  ADD CONSTRAINT `report_ibfk_2` FOREIGN KEY (`user_FK`) REFERENCES `usuario` (`ID_user`),
  ADD CONSTRAINT `report_ibfk_3` FOREIGN KEY (`destinatario_FK`) REFERENCES `usuario` (`ID_user`);

--
-- Restrições para tabelas `seguir`
--
ALTER TABLE `seguir`
  ADD CONSTRAINT `seguir_ibfk_1` FOREIGN KEY (`user_FK`) REFERENCES `usuario` (`ID_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `seguir_ibfk_2` FOREIGN KEY (`seguidor_FK`) REFERENCES `usuario` (`ID_user`) ON DELETE CASCADE;

--
-- Restrições para tabelas `user_conq`
--
ALTER TABLE `user_conq`
  ADD CONSTRAINT `user_conq_ibfk_1` FOREIGN KEY (`user_FK`) REFERENCES `usuario` (`ID_user`);

--
-- Restrições para tabelas `view`
--
ALTER TABLE `view`
  ADD CONSTRAINT `view_ibfk_1` FOREIGN KEY (`capitulo_FK`) REFERENCES `capitulo` (`ID_capitulo`) ON DELETE CASCADE,
  ADD CONSTRAINT `view_ibfk_2` FOREIGN KEY (`user_FK`) REFERENCES `usuario` (`ID_user`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
