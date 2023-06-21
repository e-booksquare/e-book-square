-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21/06/2023 às 19:39
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
(39, 37, 81),
(41, 41, 81),
(43, 46, 81),
(48, 41, 67),
(50, 37, 135),
(51, 46, 135);

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
(102, 'O Despertar da Escuridão', 105, 'Uma força sinistra desperta neste capítulo sombrio, ameaçando mergulhar o mundo em trevas eternas.', 0, '2023-06-20 02:02:13', '2023-06-20 05:02:13', 1),
(103, 'O Destino em Jogo', 105, 'Com o destino do reino em jogo, Alexander e seus companheiros enfrentam o Dragão de Fogo em uma batalha épica. Eles terão que mostrar coragem, lealdade e sacrifício para derrotar a criatura e trazer a paz de volta ao reino.', 0, '2023-06-20 02:02:13', '2023-06-20 05:02:13', 1),
(104, 'O Mistério Profundo', 106, 'Neste capítulo enigmático, os protagonistas mergulham em um mistério profundo que os levará a lugares obscuros e desconhecidos.', 0, '2023-06-20 02:02:13', '2023-06-20 05:02:13', 1),
(105, 'O Despertar dos Antigos', 107, 'Antigos seres despertam de seu sono milenar, trazendo consigo uma ameaça avassaladora neste capítulo cheio de suspense.', 0, '2023-06-20 02:02:13', '2023-06-20 05:02:13', 1),
(107, 'A Última Batalha', 109, 'A última batalha se aproxima, e os protagonistas se preparam para enfrentar seu maior desafio neste capítulo carregado de tensão e emoção.', 0, '2023-06-20 02:02:13', '2023-06-20 05:02:13', 1),
(108, 'O Segredo Revelado', 110, 'Neste capítulo revelador, os segredos mais obscuros vêm à tona, mudando para sempre a vida dos personagens.', 0, '2023-06-20 02:02:13', '2023-06-20 05:02:13', 1),
(109, 'O Despertar da Magia', 111, 'A magia ancestral desperta neste capítulo mágico, trazendo consigo poderes inimagináveis e desafios surpreendentes.', 0, '2023-06-20 02:02:13', '2023-06-20 05:02:13', 1),
(112, 'A Jornada Interminável', 114, 'A jornada dos protagonistas parece não ter fim, levando-os a lugares desconhecidos e desafiadores neste capítulo de aventura constante.', 0, '2023-06-20 02:02:13', '2023-06-20 05:02:13', 1),
(119, 'A regress&atilde;o (One shot)', 130, '<p>Era uma vez uma jovem chamada Sofia que sofria de estranhas e inexplic&aacute;veis mem&oacute;rias de uma vida passada. Sempre que ela se deparava com certos lugares ou objetos, sentimentos intensos de familiaridade a dominavam. Determinada a desvendar o mist&eacute;rio, Sofia come&ccedil;ou uma jornada de regress&atilde;o, buscando ajuda de um terapeuta especializado. Atrav&eacute;s das sess&otilde;es, ela foi transportada para diferentes per&iacute;odos hist&oacute;ricos, vivendo momentos de alegria, tristeza e aventura em vidas que pareciam distantes. Aos poucos, Sofia percebeu que as pessoas que encontrava nas regress&otilde;es tamb&eacute;m existiam em sua vida atual, refor&ccedil;ando ainda mais os la&ccedil;os entre suas exist&ecirc;ncias passadas e presentes. Com coragem e determina&ccedil;&atilde;o, ela desvendou segredos antigos e encontrou uma nova compreens&atilde;o de si mesma, aceitando seu passado e abra&ccedil;ando o presente com gratid&atilde;o e sabedoria.</p>\r\n', 0, '2023-06-20 21:45:49', '2023-06-21 00:45:49', 1),
(120, ' Cap&iacute;tulo 1', 131, '<p>Era uma vez uma jovem chamada Sofia que sofria de estranhas e inexplic&aacute;veis mem&oacute;rias de uma vida passada. Sempre que ela se deparava com certos lugares ou objetos, sentimentos intensos de familiaridade a dominavam. Determinada a desvendar o mist&eacute;rio, Sofia come&ccedil;ou uma jornada de regress&atilde;o, buscando ajuda de um terapeuta especializado. Atrav&eacute;s das sess&otilde;es, ela foi transportada para diferentes per&iacute;odos hist&oacute;ricos, vivendo momentos de alegria, tristeza e aventura em vidas que pareciam distantes. Aos poucos, Sofia percebeu que as pessoas que encontrava nas regress&otilde;es tamb&eacute;m existiam em sua vida atual, refor&ccedil;ando ainda mais os la&ccedil;os entre suas exist&ecirc;ncias passadas e presentes. Com coragem e determina&ccedil;&atilde;o, ela desvendou segredos antigos e encontrou uma nova compreens&atilde;o de si mesma, aceitando seu passado e abra&ccedil;ando o presente com gratid&atilde;o e sabedoria.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 0, '2023-06-20 21:53:10', '2023-06-21 00:53:10', 1),
(122, 'Do &Eacute;pico ao Viral: A Origem dos Memes', 135, '<p>Os memes, em sua ess&ecirc;ncia, s&atilde;o uma forma de comunica&ccedil;&atilde;o viral na era digital, que combinam imagens, v&iacute;deos, frases e refer&ecirc;ncias culturais para transmitir ideias e gerar risadas. Embora pare&ccedil;am uma inven&ccedil;&atilde;o recente, a verdade &eacute; que os memes t&ecirc;m ra&iacute;zes profundas na hist&oacute;ria da humanidade. Desde os tempos antigos, as pessoas compartilhavam hist&oacute;rias e piadas engra&ccedil;adas por meio de desenhos, textos escritos e at&eacute; mesmo em pinturas nas cavernas. No entanto, com o surgimento da internet e das redes sociais, os memes ganharam uma nova forma de propaga&ccedil;&atilde;o e alcan&ccedil;aram uma popularidade massiva.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>O boom dos memes aconteceu na d&eacute;cada de 2000, com a populariza&ccedil;&atilde;o dos f&oacute;runs online e das plataformas de compartilhamento de conte&uacute;do. Foi nessa &eacute;poca que os primeiros memes virais come&ccedil;aram a surgir, conquistando a aten&ccedil;&atilde;o do p&uacute;blico e se espalhando rapidamente pela internet. A combina&ccedil;&atilde;o de imagens ic&ocirc;nicas, como o &quot;Rage Guy&quot; e o &quot;Forever Alone&quot;, com legendas engra&ccedil;adas e situa&ccedil;&otilde;es absurdas, conquistou milh&otilde;es de pessoas ao redor do mundo. &Agrave; medida que as redes sociais evolu&iacute;ram, os memes se tornaram ainda mais presentes no dia a dia das pessoas, com os usu&aacute;rios adaptando e remixando as imagens e conceitos originais para criar novos memes e piadas instantaneamente reconhec&iacute;veis. Assim, os memes se tornaram uma linguagem pr&oacute;pria, que transcende fronteiras culturais e proporciona uma forma &uacute;nica de comunica&ccedil;&atilde;o e entretenimento na era digital.</p>\r\n', 0, '2023-06-21 12:49:09', '2023-06-21 15:49:09', 1);

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
(388, 67, 2),
(389, 67, 5),
(390, 67, 7),
(391, 67, 34),
(392, 67, 39),
(393, 67, 61),
(156, 81, 3),
(154, 81, 4),
(155, 81, 8),
(160, 81, 14),
(159, 81, 28),
(158, 81, 49),
(157, 81, 61),
(238, 93, 13),
(239, 93, 22),
(240, 93, 29),
(406, 94, 2),
(407, 94, 7),
(401, 95, 3),
(402, 95, 13),
(403, 95, 19),
(307, 96, 4),
(308, 96, 5),
(309, 96, 15),
(375, 97, 6),
(376, 97, 10),
(377, 97, 31),
(373, 98, 2),
(374, 98, 13),
(370, 99, 4),
(371, 99, 5),
(372, 99, 27),
(319, 100, 8),
(320, 100, 14),
(321, 100, 19),
(322, 101, 4),
(323, 101, 13),
(324, 101, 19),
(367, 107, 16),
(368, 107, 19),
(369, 107, 20),
(400, 110, 16),
(399, 110, 19),
(359, 115, 2),
(398, 120, 5),
(396, 125, 14),
(397, 125, 19),
(380, 130, 15),
(381, 130, 20),
(418, 131, 19),
(414, 134, 2),
(415, 134, 3),
(416, 134, 14),
(417, 134, 41),
(419, 135, 6),
(421, 135, 39),
(420, 135, 55);

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
(100, 41, 29, 'chala head chala', 5, '2023-05-25 16:35:58', 50, 0),
(103, 69, 29, 'Ol&aacute;\n', 5, '2023-06-20 21:13:39', 64, 0),
(105, 46, 37, 'mais please 😉👀', 5, '2023-06-21 12:58:46', 122, 0),
(106, 69, 37, 'mas foi depois disso kkk', 5, '2023-06-21 13:09:44', 105, 0);

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
(117, 29, 95),
(116, 29, 96),
(115, 29, 131),
(114, 29, 134),
(90, 37, 67),
(104, 37, 81),
(118, 37, 135),
(91, 41, 81),
(7, 46, 67),
(113, 69, 115);

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
(250, 13, 3, 1, 29, 37),
(253, 122, 3, 1, 37, 37),
(254, 122, 3, 1, 37, 46),
(255, 105, 3, 1, 37, 69);

-- --------------------------------------------------------

--
-- Estrutura para tabela `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `view` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`, `view`, `created_at`) VALUES
(1, 37, 41, 'conversa n°1', 1, '2023-06-21 17:04:15'),
(2, 29, 37, 'covrs n°2', 0, '2023-06-04 21:40:20'),
(4, 37, 41, 'cvrs', 1, '2023-06-21 17:04:15'),
(5, 41, 37, 'cvrs 5', 0, '2023-06-04 21:40:20'),
(6, 29, 37, 'cvrs n 6', 0, '2023-06-04 21:40:20'),
(7, 37, 41, 'fala meu caro, roubaram minha vó e estão pedindo dinheiro, acha que a validade dela sobressai o custo do reenvestimento?', 1, '2023-06-21 17:04:15'),
(8, 29, 37, 'chaama', 0, '2023-06-21 17:04:01'),
(9, 46, 37, 'eai', 1, '2023-06-21 17:29:19'),
(10, 69, 37, 'calvo', 0, '2023-06-21 17:05:56'),
(11, 37, 46, 'oi :)', 0, '2023-06-21 17:29:29');

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
(39, 1, 10, 'Ratsel', 'b0119412b863f297fe9c66eff8c1f957bannergifwpp.gif', ' curtiu o capítulo \' Cap&iacute;tulo 1\' na obra \'Sahovi\'', 'perfil.php?user=29', '2023-05-25 07:07:07', 0, 37, 29),
(55, 1, 9, 'Ratsel', 'ad5968dc8f2e700fa2ab4cea37dbb4a7urahara2.jpg', ' publicou uma nova obra, \'A Herdeira das Sombras\', seja um dos primeiros a lerem !!', 'capa_da_obra.php?obra=134', '2023-06-21 12:29:37', 1, 41, 29),
(56, 1, 9, 'Ratsel', 'ad5968dc8f2e700fa2ab4cea37dbb4a7urahara2.jpg', ' publicou uma nova obra, \'A Herdeira das Sombras\', seja um dos primeiros a lerem !!', 'capa_da_obra.php?obra=134', '2023-06-21 12:29:37', 1, 37, 29),
(61, 1, 9, 'Anna Carrey', 'dcb27b7e5057c704f36f3278536b1c07imganecrry.jpg', ' amou sua obra em \'A arte dos memes\'', 'perfil.php?user=46', '2023-06-21 12:57:53', 1, 37, 46),
(62, 1, 10, 'Anna Carrey', 'dcb27b7e5057c704f36f3278536b1c07imganecrry.jpg', ' curtiu o capítulo \'Do &Eacute;pico ao Viral:...\' na obra \'A arte dos memes\'', 'perfil.php?user=46', '2023-06-21 12:57:58', 1, 37, 46),
(64, 0, 8, 'Felipe', '60344ef01d16398693101775197b303acafé.jpg', ' começou a te seguir', 'perfil.php?user=69', '2023-06-21 13:08:26', 1, 37, 69),
(65, 1, 10, 'Felipe', '60344ef01d16398693101775197b303acafé.jpg', ' curtiu o capítulo \'O Despertar dos Antigos\' na obra \'A Heran&ccedil;a Perdida\'', 'perfil.php?user=69', '2023-06-21 13:08:48', 1, 37, 69),
(67, 1, 9, 'Katsurazur4', '4d827bf32a2a9add1524771db6506ba9WhatsApp_Image_2023-06-21_at_12.38.40_PM.jpeg', ' publicou uma nova obra, \'rr23r23r2\', seja um dos primeiros a lerem !!', 'capa_da_obra.php?obra=136', '2023-06-21 13:55:55', 1, 41, 37),
(69, 1, 9, 'Katsurazur4', '4d827bf32a2a9add1524771db6506ba9WhatsApp_Image_2023-06-21_at_12.38.40_PM.jpeg', ' publicou uma nova obra, \'rr23r23r2\', seja um dos primeiros a lerem !!', 'capa_da_obra.php?obra=136', '2023-06-21 13:55:55', 1, 69, 37);

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
(67, 'Volcanic return', 29, 'Inside an active volcano is a chamber in which molten rock, called magma, collects. Pressure builds up inside the magma chamber, causing the magma to move through channels in the rock and escape onto the planet&rsquo;s surface. Once it flows onto the surface the magma is known as lava.', '', '2023-04-02 19:31:33', 'a7893b2745e0c2c9c28b477b8bc1e73alandscape3.jpg', '2023-06-21 00:51:42', 1, 0),
(81, 'Sahovi', 37, 'Um mercen&aacute;rio com um forte trauma do passado quer se vingar, mas muitos coisas o impedem.', 'Adulto', '2023-05-06 05:16:04', '', '2023-06-20 15:59:42', 1, 0),
(93, 'G.O.T', 37, 'Desdes o fim dos tempos, um ser bla bla bla', 'Adulto', '2023-05-23 16:49:32', '', '2023-06-20 15:59:42', 1, 0),
(94, 'O Segredo das Sombras', 29, 'Uma hist&oacute;ria de suspense e mist&eacute;rio que envolve um detetive em busca da verdade', '', '2023-06-19 23:47:54', 'd95e2201b9db6316a06f0f806809f401cigarro_na_mesa.jpg', '2023-06-21 00:56:48', 1, 0),
(95, 'A Magia Proibida', 29, 'Uma aventura fant&aacute;stica em um mundo repleto de magia e perigos', '', '2023-06-19 23:47:54', '7838ad861a1a69fc9cf28813f5cbd557gato_no_muro.jpg', '2023-06-21 00:55:14', 1, 0),
(96, 'O Mistério do Passado', 29, 'Um drama policial que revela segredos sombrios de personagens enigmáticos', 'Adulto', '2023-06-19 23:47:54', '', '2023-06-20 02:49:15', 1, 0),
(97, 'A Jornada &Eacute;pica', 37, 'Uma aventura emocionante repleta de a&ccedil;&atilde;o e batalhas &eacute;picas', '', '2023-06-19 23:47:54', 'e70aaf9cef025eafd2d36ece4a25f961farol.jpg', '2023-06-21 00:42:21', 1, 0),
(98, 'O Legado Perdido', 37, 'Uma hist&oacute;ria de fantasia que segue a jornada de her&oacute;is em busca de artefatos m&iacute;sticos', '', '2023-06-19 23:47:54', 'cbbc989fb2cd193095a321ad0ae2916bduans.jpg', '2023-06-21 00:42:06', 1, 0),
(99, 'A &Uacute;ltima Esperan&ccedil;a', 37, 'Um conto p&oacute;s-apocal&iacute;ptico sobre a luta pela sobreviv&ecirc;ncia da humanidade', '', '2023-06-19 23:47:54', '90afc47100090621d1e44fc6ff6235cacowboy.jpg', '2023-06-21 00:41:45', 1, 0),
(100, 'O Poder das Estrelas', 41, 'Uma obra de ficção científica que explora as maravilhas do espaço sideral', 'Adulto', '2023-06-19 23:47:54', '', '2023-06-20 02:49:00', 1, 0),
(101, 'O Segredo das Runas', 41, 'Uma aventura histórica que revela os mistérios da antiga civilização', 'Adulto', '2023-06-19 23:47:54', '', '2023-06-20 02:48:56', 1, 0),
(105, 'Sombras do Passado', 69, 'Em uma cidade sombria e assolada pelo crime, um detetive obstinado chamado Jack Thompson investiga uma série de assassinatos brutais que parecem estar conectados a eventos traumáticos de seu próprio passado. À medida que ele mergulha cada vez mais na escuridão, segredos perturbadores vêm à tona, desafiando sua sanidade e colocando sua vida em perigo.', 'Adulto', '2023-06-20 01:41:12', '', '2023-06-20 04:41:12', 1, 0),
(106, 'O Domínio das Trevas', 46, 'Uma história sombria de horror que explora os limites da mente humana', 'Adulto', '2023-06-20 01:52:39', '', '2023-06-20 04:52:39', 1, 0),
(107, 'A Heran&ccedil;a Perdida', 37, 'Um mist&eacute;rio familiar cheio de segredos e reviravoltas inesperadas', '', '2023-06-20 01:52:39', 'c923bb62ac400bc2c328c72724ee4e25car.jpg', '2023-06-21 00:41:02', 1, 0),
(109, 'O Segredo do Amuleto', 37, 'Um objeto m&iacute;stico que concede poderes incr&iacute;veis, mas a um custo terr&iacute;vel', '', '2023-06-20 01:52:39', '18812a0a8fe3e075a1ae36a6cf62021abusoal.jpg', '2023-06-21 00:38:14', 1, 0),
(110, 'A Trama Sinistra', 29, 'Uma conspira&ccedil;&atilde;o sombria que amea&ccedil;a a paz e a estabilidade do mundo', '', '2023-06-20 01:52:39', '0a51c6a0d4d01a8d0c20638ce3c7b53clandscape3.jpg', '2023-06-21 00:55:00', 1, 0),
(111, 'O Mistério do Manuscrito', 69, 'Um manuscrito antigo que guarda segredos ocultos e perigosos', 'Adulto', '2023-06-20 01:52:39', '', '2023-06-20 04:52:39', 1, 0),
(114, 'A Busca pelo Tesouro', 69, 'Uma emocionante caçada ao tesouro perdido que testará a coragem dos aventureiros', 'Adulto', '2023-06-20 01:52:39', '', '2023-06-20 04:52:39', 1, 0),
(115, 'O Despertar das Feras', 69, 'Criaturas ancestrais despertam e amea&ccedil;am a exist&ecirc;ncia da humanidade', '', '2023-06-20 01:52:39', '07f814a49ce67853f999134b98b17c97transferir.jpg', '2023-06-21 00:01:48', 1, 0),
(116, 'A Queda das Estrelas', 29, 'Um império galáctico entra em colapso e desencadeia uma guerra interplanetária', 'Adulto', '2023-06-20 01:54:07', '', '2023-06-20 04:54:07', 1, 0),
(117, 'A Maldição do Espelho', 46, 'Um espelho amaldiçoado reflete os piores medos de quem o encara', 'Adulto', '2023-06-20 01:54:07', '', '2023-06-20 04:54:07', 1, 0),
(118, 'O Legado Divino', 29, 'Deuses antigos retornam para reivindicar seu poder e influência sobre a humanidade', 'Adulto', '2023-06-20 01:54:07', '', '2023-06-20 04:54:07', 1, 0),
(119, 'O Segredo das Ru&iacute;nas', 37, 'Uma expedi&ccedil;&atilde;o arqueol&oacute;gica descobre um segredo oculto nas ru&iacute;nas de uma civiliza&ccedil;&atilde;o perdida', '', '2023-06-20 01:54:07', '312c6cd4215d754d610466914b2d85d1baleia.jpg', '2023-06-21 00:37:41', 1, 0),
(120, 'A Noite dos Pesadelos', 29, 'Criaturas sinistras e pesadelos aterrorizantes assombram uma cidade adormecida', '', '2023-06-20 01:54:07', '8334d7d7911838c74ca6518f2da75527landscape.jpg', '2023-06-21 00:54:38', 1, 0),
(121, 'A Busca pelo Conhecimento', 69, 'Um aprendiz busca conhecimentos proibidos em uma jornada perigosa e proibida', 'Adulto', '2023-06-20 01:54:07', '', '2023-06-20 04:54:07', 1, 0),
(122, 'O Segredo das Profundezas', 69, 'Um segredo sombrio escondido nas profundezas do oceano ameaça a existência humana', 'Adulto', '2023-06-20 01:54:07', '', '2023-06-20 04:54:07', 1, 0),
(124, 'A Ordem dos Guardiões', 41, 'Uma sociedade secreta protege relíquias poderosas de cair nas mãos erradas', 'Adulto', '2023-06-20 01:54:07', '', '2023-06-20 04:54:07', 1, 0),
(125, 'O Mist&eacute;rio do Portal', 29, 'Um portal m&aacute;gico se abre, conectando dois mundos e desencadeando consequ&ecirc;ncias imprevis&iacute;veis', '', '2023-06-20 01:54:07', '7e7c133833814034352f13dd956bbdbahanburgher.jpg', '2023-06-21 00:54:14', 1, 0),
(130, 'O grande regresso', 72, 'Uma hist&oacute;ria de regresso', '', '2023-06-20 21:44:37', 'e1a2d13eb4e2997fb6c92fa95575e350moon.jpg', '2023-06-21 00:46:07', 1, 0),
(131, 'O perdido do cabelo de maicon', 29, 'Maicon, um jovem de dezoito anos, se depara com um desafio inesperado que tem afetado sua autoconfian&ccedil;a: a calv&iacute;cie precoce. Apesar de sua idade, ele j&aacute; notou a queda acentuada de cabelo, especialmente na regi&atilde;o frontal, o que o faz sentir-se preocupado e inseguro.', '', '2023-06-20 21:52:55', '662ad2bab98994be06f29347965b6dd1urahara.jpg', '2023-06-21 15:42:45', 1, 0),
(134, 'A Herdeira das Sombras', 29, ' Uma exploradora destemida embarca em uma expedi&ccedil;&atilde;o para encontrar um reino lend&aacute;rio que desapareceu h&aacute; s&eacute;culos. Ela enfrenta criaturas m&iacute;sticas e perigos mortais enquanto desvenda os segredos do reino perdido.', '', '2023-06-21 12:29:37', '180aa35c0559827fdf12a66be11ae37esakura.jpg', '2023-06-21 15:31:36', 1, 0),
(135, 'A arte dos memes', 37, 'Em &quot;A  arte dos memes&quot;, mergulhamos no mundo hilariante e viciante dos memes. Conhe&ccedil;a Alex, um jovem criativo e apaixonado pela internet, que descobre o poder dos memes para fazer as pessoas rirem e se conectarem. Com seu talento para criar conte&uacute;do viral, Alex se torna um dos maiores influencers da internet, levando a &quot;Arte dos Memes&quot; a um novo patamar.', 'Livre', '2023-06-21 12:47:15', '83e2db140be7c839a70f3a3053a18a0dobracomedia.jpg', '2023-06-21 15:49:09', 1, 0);

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
(2, 80, 1, 0, 100, 37),
(3, 0, 1, 0, 100, 29),
(4, 0, 1, 0, 100, 41),
(6, 0, 1, 0, 100, 46),
(13, 0, 1, 0, 100, 69),
(16, 0, 1, 0, 100, 72);

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
(121, 29, 46),
(124, 37, 69);

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
(29, 'Ratsel', '@sifudiasnaomais77', 'ratsel00h@gmail.com', 'ad5968dc8f2e700fa2ab4cea37dbb4a7urahara2.jpg', '5528eb81b1a100cd82f670d6d32b2f46calçadão.jpg', 'Quando dizem que a primeira impress&atilde;o &eacute; a que fica, est&atilde;o dizendo a mais pura verdade! O seu perfil &eacute; a sua porta de entrada nas redes sociais, ent&atilde;o cuide bem dele e deixe-o bem atrativo para os seus visitantes! Frases para perfil s&atilde;o muito &uacute;teis na hora de fazer um resumo sobre si mesmo na sua conta online.', '', 0, '$2y$10$lY0nAUZ..kO9YzgUaqbXBe92nFSyp8KT0SwPMy8kcYWcNLGSE.0Wy', '2022-11-19', '', 1, 1),
(37, 'Katsurazur4', '@katsurazur4170', 'ebooksquare.tcc@gmail.com', '4d827bf32a2a9add1524771db6506ba9WhatsApp_Image_2023-06-21_at_12.38.40_PM.jpeg', '687a9b11a3c89dfa4bf637446c718340ppkats.gif', 'Descri&ccedil;&atilde;o &eacute; o texto que cont&eacute;m informa&ccedil;&otilde;es detalhadas sobre as caracter&iacute;sticas de algo ou algu&eacute;m. Assim, ela possibilita a pessoa que a l&ecirc; ou a ouve imaginar com facilidade o que est&aacute; sendo descrito - objetos, lugares, acontecimentos ou pessoas, como por exemplo. A descri&ccedil;&atilde;o pode contemplar aquilo que vemos - que s&atilde;o as caracter&iacute;sticas f&iacute;sicas', '', 1, '$2y$10$0sLGvB2mphjI.6foQeUXwOaAgxxc30wJ0TSL/9yE89Sg5mb4KVGva', '2022-11-21', '', 1, 1),
(41, 'Mohamed', '@mohamed007', 'Manito@gmail.com', '', '', 'randomly random\r\n', 'ratsel00h@gmail.com', 0, '$2y$10$7uMp6lY.48ppExHc9xj4nOiAzXZ0Gekd.tVPRljjm4yrBwJmt8tAi', '2022-12-07', '', 1, 1),
(46, 'Anna Carrey', '@annecrry', 'robux@gmail.com', 'dcb27b7e5057c704f36f3278536b1c07imganecrry.jpg', '85c1f866e13a520c793fc9de5eab12c0banneranecrry.jpg', '📚🖋️ Ol&aacute;! Sou Anne Carrey, uma escritora indie de 22 anos apaixonada por palavras e contadora de hist&oacute;rias sombrias no universo cyberpunk. \r\n\r\n🕷️📖 Mergulho nas profundezas do terror, da fic&ccedil;&atilde;o e do mundo tecnol&oacute;gico, criando mundos dist&oacute;picos repletos de desafios and questionamentos. \r\n\r\n💀✨ Bem-vindo ao meu mundo de arrepios e implantes cibern&eacute;ticos! Aqui, compartilho meus livros, onde o futuro dist&oacute;pico se funde com a alta tecnologia, criando tramas envolventes e personagens complexos. Acompanhe-me nessa jornada macabra atrav&eacute;s de cidades neon e megacorpora&ccedil;&otilde;es sinistras. Junte-se a mim e desvende os segredos sombrios que se escondem nas entranhas do ciberespa&ccedil;o. 🌑🔍📚🌆', '', 0, '$2y$10$dmY/vhcPjuP6S8AWV2nmb.6k988oatNhVBO4mkLqg8ZRLaUE8fOvG', '2023-03-29', '', 1, 1),
(69, 'Felipe', '@felipe', 'fefecaje@hotmail.com', '60344ef01d16398693101775197b303acafé.jpg', 'a272ec89ebb65be7be371b11c655e6f6slam_duink.jpg', 'Eu sou o maicon', '', 0, '$2y$10$uehlUtaPLs21t.5xAljUWuhyMeHFUY62Edf3lVFpwTVgr5mBVsBdy', '2023-06-20', '', 1, 1),
(72, 'ola', '@ola', 'maicon997476957@gmail.com', 'fd2632c34a26506e97f55c85c5b7209cthorfinn.jpg', '', '', '', 0, '$2y$10$L83.roaUMDirQeytHvBYZ.9S6MXbtICGrjjRfXKrouuM91ZpRFvLm', '2023-06-20', '', 1, 1);

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
(27, 41, 50),
(34, 69, 64),
(35, 37, 122),
(36, 46, 122),
(37, 69, 105);

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
  MODIFY `ID_amei` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de tabela `bloqueio`
--
ALTER TABLE `bloqueio`
  MODIFY `ID_bloqueio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `capitulo`
--
ALTER TABLE `capitulo`
  MODIFY `ID_capitulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `IDCat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de tabela `categoria_da_obra`
--
ALTER TABLE `categoria_da_obra`
  MODIFY `IDCatObr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=423;

--
-- AUTO_INCREMENT de tabela `checkweek`
--
ALTER TABLE `checkweek`
  MODIFY `ID_checkweek` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `comentario`
--
ALTER TABLE `comentario`
  MODIFY `ID_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT de tabela `conquistas`
--
ALTER TABLE `conquistas`
  MODIFY `ID_CON` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `favorito`
--
ALTER TABLE `favorito`
  MODIFY `IDFav` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT de tabela `likes`
--
ALTER TABLE `likes`
  MODIFY `ID_like` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT de tabela `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `notificacao`
--
ALTER TABLE `notificacao`
  MODIFY `IDNOT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de tabela `obra`
--
ALTER TABLE `obra`
  MODIFY `ID_obra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT de tabela `rankeamento`
--
ALTER TABLE `rankeamento`
  MODIFY `IDRAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `report`
--
ALTER TABLE `report`
  MODIFY `ID_report` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `seguir`
--
ALTER TABLE `seguir`
  MODIFY `ID_seguir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT de tabela `user_conq`
--
ALTER TABLE `user_conq`
  MODIFY `ID_ConUser` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de tabela `view`
--
ALTER TABLE `view`
  MODIFY `IDView` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
