-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 29/03/2018 às 12:59
-- Versão do servidor: 5.7.21-0ubuntu0.16.04.1
-- Versão do PHP: 5.6.32-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `phpizza`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `categoria_id` int(11) NOT NULL,
  `categoria_nome` varchar(200) DEFAULT NULL,
  `categoria_pos` int(11) DEFAULT NULL,
  `categoria_meia` int(1) DEFAULT '0',
  `categoria_ordem` int(11) DEFAULT NULL,
  `categoria_ref` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `categoria`
--

INSERT INTO `categoria` (`categoria_id`, `categoria_nome`, `categoria_pos`, `categoria_meia`, `categoria_ordem`, `categoria_ref`) VALUES
(1, 'PIZZAS', 1, 1, 1, 255),
(2, 'ESFIHAS', 4, 0, 4, 0),
(3, 'REFRIGERANTES', 6, 0, 6, 0),
(5, 'CERVEJAS', 7, 0, 7, 0),
(7, 'BROTOS', 3, 1, 3, 0),
(11, 'PIZZA DOCE', 2, 1, 2, 0),
(13, 'ESFIHAS DOCE', 5, 0, 5, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `cliente_id` int(11) NOT NULL,
  `cliente_nome` varchar(200) DEFAULT NULL,
  `cliente_email` varchar(200) DEFAULT NULL,
  `cliente_fone` varchar(20) DEFAULT NULL,
  `cliente_fone2` varchar(20) DEFAULT NULL,
  `cliente_cpf` varchar(200) DEFAULT NULL,
  `cliente_senha` varchar(200) DEFAULT NULL,
  `cliente_fone3` varchar(200) DEFAULT NULL,
  `cliente_foto` varchar(200) DEFAULT NULL,
  `cliente_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `cliente`
--

INSERT INTO `cliente` (`cliente_id`, `cliente_nome`, `cliente_email`, `cliente_fone`, `cliente_fone2`, `cliente_cpf`, `cliente_senha`, `cliente_fone3`, `cliente_foto`, `cliente_token`) VALUES
(10, 'Orlando almeida', 'teste@teste.com', '(13) 3333-3333', '(13) 33333-3333', '399.982.498-05', '202cb962ac59075b964b07152d234b70', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `config`
--

CREATE TABLE `config` (
  `config_id` int(11) NOT NULL,
  `config_nome` varchar(200) DEFAULT NULL,
  `config_foto` varchar(200) DEFAULT NULL,
  `config_desc` longtext,
  `config_horario` varchar(200) DEFAULT NULL,
  `config_aberto` int(1) DEFAULT '1',
  `config_entrega` varchar(200) DEFAULT NULL,
  `config_taxa_entrega` double(10,2) DEFAULT NULL,
  `config_fone1` varchar(200) DEFAULT NULL,
  `config_fone2` varchar(200) DEFAULT NULL,
  `config_fone3` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `config`
--

INSERT INTO `config` (`config_id`, `config_nome`, `config_foto`, `config_desc`, `config_horario`, `config_aberto`, `config_entrega`, `config_taxa_entrega`, `config_fone1`, `config_fone2`, `config_fone3`) VALUES
(1, 'Pizzaria PHP', 'logo.png', '<div><div><div style="text-align: justify;">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.<br><font color="#ffffff" face="Arial" style="background-color: inherit;"></font></div></div></div>', '17:00 às 22:00 hrs de Segunda a Domingo', 1, '30-45 min', 2.35, '(11) 0000-0000', '(11) 0000-0000', '(11) 6666-6666');

-- --------------------------------------------------------

--
-- Estrutura para tabela `endereco`
--

CREATE TABLE `endereco` (
  `endereco_id` int(11) NOT NULL,
  `endereco_cliente` int(11) DEFAULT NULL,
  `endereco_endereco` varchar(200) DEFAULT NULL,
  `endereco_numero` varchar(200) DEFAULT NULL,
  `endereco_bairro` varchar(200) DEFAULT NULL,
  `endereco_cidade` varchar(200) DEFAULT NULL,
  `endereco_uf` varchar(200) DEFAULT NULL,
  `endereco_cep` varchar(200) DEFAULT NULL,
  `endereco_referencia` varchar(200) DEFAULT NULL,
  `endereco_nome` varchar(200) DEFAULT NULL,
  `endereco_complemento` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `endereco`
--

INSERT INTO `endereco` (`endereco_id`, `endereco_cliente`, `endereco_endereco`, `endereco_numero`, `endereco_bairro`, `endereco_cidade`, `endereco_uf`, `endereco_cep`, `endereco_referencia`, `endereco_nome`, `endereco_complemento`) VALUES
(118, 10, 'Avenida Bartolomeu de Gusmão', '45', 'Boqueirão', 'Santos', 'SP', '11045-400', NULL, 'casa', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `entrega`
--

CREATE TABLE `entrega` (
  `entrega_id` int(11) NOT NULL,
  `entrega_inicio` varchar(10) DEFAULT NULL,
  `entrega_fim` varchar(10) DEFAULT NULL,
  `entrega_taxa` decimal(10,2) DEFAULT NULL,
  `entrega_nome` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `entrega`
--

INSERT INTO `entrega` (`entrega_id`, `entrega_inicio`, `entrega_fim`, `entrega_taxa`, `entrega_nome`) VALUES
(6, '09780340', '09780340', '5.00', 'Sao bernardo'),
(8, '09175360', '09175900', '2.00', 'Vila Helena'),
(9, '09132000', '09171200', '2.00', 'Vila Luzita'),
(10, '09121400', '09195750', '2.00', 'Vila Pires'),
(11, '09175000', '09180970', '2.00', 'Vila Linda'),
(12, '09172580', '09172750', '2.00', 'Vila Junqueira'),
(13, '09020170', '09030700', '3.00', 'Vila Assunção'),
(14, '09030160', '09180971', '2.00', 'Vila Alzira'),
(15, '09176000', '09176220', '2.00', 'Vila Marina'),
(16, '09010000', '09210900', '2.00', 'Centro de Santo Andre'),
(17, '09190040', '09181725', '3.00', 'Jardim Paraíso'),
(18, '09185360', '09185400', '2.00', 'Vila Apiaí'),
(19, '09040210', '09041900', '3.00', 'Vila Bastos'),
(20, '09050000', '09051560', '3.00', 'Vila Floresta'),
(21, '09190000', '09190999', '3.00', 'Vila Gilda'),
(22, '09172000', '09175835', '2.00', 'Jardim do Estádio'),
(23, '09120470', '09181340', '2.00', 'Jardim Progresso'),
(24, '09185090', '09185235', '2.00', 'Jardim Cristiane'),
(25, '09170080', '09290970', '3.00', 'Vila João Ramalho'),
(26, '09170510', '09171480', '3.00', 'Jardim Guarará'),
(29, '09172422', '09175260', '2.00', 'Vila Vitória'),
(31, '09110620', '09121290', '2.00', 'Vila Humaitá'),
(32, '09110410', '09111345', '3.00', 'Vila Homero Thon'),
(33, '09130470', '09132280', '3.00', 'Vila Suiça'),
(34, '09182000', '09182380', '3.00', 'Jd  Las Vegas'),
(35, '18120000', '18120990', '1.00', 'Mairinque - SP'),
(36, '11718255', '11718255', '3.00', 'santos sp'),
(37, '11045400', '11718255', '2.53', 'Santos e PG');

-- --------------------------------------------------------

--
-- Estrutura para tabela `foto`
--

CREATE TABLE `foto` (
  `foto_id` int(11) NOT NULL,
  `foto_url` varchar(200) DEFAULT NULL,
  `foto_chamado` int(5) DEFAULT NULL,
  `foto_item` varchar(200) DEFAULT NULL,
  `foto_cliente` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_categoria` int(11) DEFAULT NULL,
  `item_nome` varchar(200) DEFAULT NULL,
  `item_desc` longtext,
  `item_foto` varchar(200) DEFAULT NULL,
  `item_obs` longtext,
  `item_preco` double(10,2) DEFAULT NULL,
  `item_codigo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `item`
--

INSERT INTO `item` (`item_id`, `item_categoria`, `item_nome`, `item_desc`, `item_foto`, `item_obs`, `item_preco`, `item_codigo`) VALUES
(15, 1, 'ATUM', '<b>ATUM,E CEBOLA.</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 35.00, '1'),
(16, 1, 'ALHO', '<b>ALHO FRITO E MUSSA.</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 29.00, '2'),
(17, 1, 'ALICHE', '<b>ALICHE,MUSSA,PARMESAO E TOMATE.</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 38.00, '3'),
(18, 1, 'A MODA DA CASA I', '<b>ATUM,CALABRESA,CHAMPI,CATU E PARMESAO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 40.00, '4'),
(19, 1, 'M DA CASA II', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 42.00, '5'),
(20, 1, 'M DA CASA III', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 43.00, '6'),
(21, 1, 'M DO CHEFE I', '<b>PRESUNTO,PALMITO,ERVILHA,MUSSA,BACON E PARMESAO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 40.00, '7'),
(22, 1, 'M DO CHEFE II', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 39.00, '8'),
(23, 1, 'BAIANA', '<b>CALABRESA MOIDA,PIMENTA,OVOS E CBL</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 29.00, '9'),
(24, 1, 'BAIACATU', '<b>CALABRESA MOIDA E CATU</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 32.00, '10'),
(25, 1, 'BAURU', '<b>PRESUNTO,MUSSA E RDLS DE TOMATE</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 32.00, '11'),
(26, 1, 'BACON', '<b>MUSSA E BACON</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 34.00, '12'),
(27, 1, 'BOLOGNESA I', '<b>CARNE MOIDA E MUSSA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 34.00, '13'),
(28, 1, 'BOLOGNESA II', '<b>CARNE MOIDA,CALABRESA E CATU</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '14'),
(29, 1, 'BROCOLIS I', '<b>BROCOLIS,CATU E ALHO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 34.00, '15'),
(30, 1, 'BROCOLIS II', '<b>BROCOLIS,MUSSA,BACON E ALHO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 35.00, '16'),
(31, 1, 'CATUPIRY', '<b>MOLHO DE TOMATE E CATU</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 31.00, '17'),
(32, 1, '5 QUEIJOS', '<b>MUSSA,PROVOLONE,GORGONZOLA,CATU,PARMESAO.</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 42.00, '18'),
(33, 1, 'CALABRESA', '<b>CALABRESA E CBL</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 28.00, '19'),
(34, 1, 'CALACATU', '<b>CALABRESA FATIADA E CATU</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 32.00, '20'),
(35, 1, 'CANADENSE', '<b>LOMBO,CBL E CATU</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 35.00, '21'),
(36, 1, 'DI FELICE', '<b>FRANGO,MUSSA,CATU E BACON</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 38.00, '22'),
(37, 1, 'CHAMPION', '<b>CHAMPI E MUSSA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '23'),
(38, 1, 'DA VILA', '<b>CALABRESA,OVOS,MILHO E CATU</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 34.00, '25'),
(39, 1, '2 QUEIJOS', '<b>MUSSARELA E CATUPIRY</b>', 'img-6941-6018-jpeg_1452020013.JPEG', '<p><br></p>', 33.32, '26'),
(40, 1, 'DELICIA', '<b>FRANGO,PRESUNTO,MILHO E CATUPIRY</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '27'),
(41, 1, 'DO PAPA', '<b>LOMBO,OVOS,ERVILHA,CATU E BACON</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 37.00, '28'),
(42, 1, 'ESCAROLA', '<b>ESCAROLA,CBL,MUSSA E BACON</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 32.00, '29'),
(43, 1, 'ESCAROLA ESP', '<b>ESCAROLA,PALMITO,MUSSA E ALHO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 34.00, '30'),
(44, 1, 'EU E VOCE', '<b>EU FAÇO A MASSA E VC ESCOLHE 4 INGREDIENTES</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '31'),
(45, 1, 'FRANCATU', '<b>FRANGO COM CATU</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 35.00, '32'),
(46, 1, 'FRANGO CAIPIRA', '<b>FRANGO,MILHO ERVILHA E MUSSA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 35.00, '33'),
(47, 1, 'FRANGO VENEZA', '<b>FRANGO,PALMITO,CATU E MUSSA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 37.00, '34'),
(48, 1, 'FRANGO A MODA', '<b>FRANGO,PRESUNTO,MUSSA,CBL E BACON</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 39.00, '35'),
(49, 1, 'FRANGO BRASILEIR', '<b>FRANGO,MILHO E CATU</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 35.00, '36'),
(50, 1, 'FRANGO MINEIRO', '<b>FRANGO,CBL E MUSSA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 34.00, '37'),
(51, 1, 'ABC', '<b>FRANGO,ESCAROLA,PRESUNTO,PALMITO E MUSSA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 40.00, '38'),
(52, 1, 'AMERICANA', '<b>LOMBO,MUSSA E TOMATE</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 35.00, '39'),
(53, 1, 'ATUM II', '<b>ATUM,CHAMPI,MUSSA E TOMATE</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 38.00, '40'),
(54, 1, 'LOMBO I', '<b>LOMBO,CBL E MUSSA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 34.00, '41'),
(55, 1, 'SICILIANA I', '<b>CHAMPI,MUSSA E BACON</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '42'),
(56, 1, 'MUSSARELA I', '<b>MOLHO E MUSSA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 28.00, '43'),
(57, 1, 'MUSSARELA II', '<b>MOLHO,TOMATE PICADO E MUSSA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 29.00, '44'),
(58, 1, 'MARGUERITA I', '<b>MUSSA,RDLS DE TOMATE E MANJERICAO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 29.00, '45'),
(59, 1, 'MILHO VERDE I', '<b>MILHO E MUSSA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 29.00, '46'),
(60, 1, 'NAPOLITANA', '<b>MUSSA,TOMATE E PARMESAO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 34.00, '47'),
(61, 1, 'NAMORADOS I', '<b>MUSSA,PALMITO,CATU E MILHO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '48'),
(62, 1, 'PERUANA', '<b>ATUM,ERVILHA,CBL,PALMITO E MUSSA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 38.00, '49'),
(63, 1, 'PORTUGUESA I', '<b>PRESUNTO,OVOS,ERVILHA,MUSSA E BACON</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '50'),
(64, 1, 'PORTUGUESA ESPL', '<b>PRESUNTO,ERVILHA,OVOS,CBL,MUSSA E MILHO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 38.00, '51'),
(65, 1, 'PORTUGUESA LIGHT', '<b>PRESUNTO,OVOS,ERVILHA,PALMITO,CBL,MUSSA E MILHO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 40.00, '52'),
(66, 1, 'PALMITO', '<b>PALMITO,MUSSA E RDLS DE TOMATE</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '53'),
(67, 1, 'PALMITO CATUPIRY', '<b>PALMITO E CATU</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 38.00, '54'),
(68, 1, 'PIZZAIOLO I', '<b>ATUM,PALMITO,MUSSA E BACON</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '55'),
(69, 1, '4 QUEIJOS I', '<b>MUSSA,PARMESAO,PROVOLONE,GORGONZOLA.</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 38.00, '56'),
(70, 1, '4 QUEIJOS II', '<b>MUSSA,PARMESAO,PROVOLONE,CATU.</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 38.00, '57'),
(71, 1, 'RALLYE', '<b>LOMBO,OVOS,CATUPIRY,E TOMATE.</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '58'),
(72, 1, 'CAPRICHOSA', '<b>LOMBO,MUSSA,CATU,E TOMATE</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 38.00, '59'),
(73, 1, 'RUCULA', '<b>MUSSA,RUCULA,TOMATE SECO.</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '60'),
(74, 1, 'SANTO ANDRE', '<b>CALAB MOIDA,MILHO,MUSSA,CATU,BOCM,TOMATE,SECO.</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 41.00, '61'),
(75, 1, 'SAO LUIZ', '<b>PEITO DE PERU,CHAMPI,MUSSA E CATU</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 39.00, '62'),
(76, 1, 'TOSCANA', '<b>CALAB FATIADA, MUSSA E CEBOLA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 34.00, '63'),
(77, 1, 'TROPICAL', '<b>ATUM,MILHO E MUSSA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '64'),
(78, 1, 'VEGETARIANA I', '<b>ESCAROLA,PALMITO,MILHO,ERVILHA,CBL E ALHO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '65'),
(79, 1, 'CORINTHIANA', '<b>ATUM,CEBOLA,PROVOLONE,BCOM,+ MOLHO.</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 35.00, '66'),
(80, 1, 'PALMEIRENSE', '<b>LOMBO,PROVOLONE,RUCULA E TOMATE.</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 35.00, '67'),
(81, 1, 'SANTISTA', '<b>ATUIM,CBL,MILHO E CATU</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 35.00, '68'),
(82, 1, 'TRICOLOR', '<b>MUSSA,ATUM,MILHO E PALMITO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 35.00, '69'),
(83, 1, 'CARIJOS', '<b>FRANGO,PALMITO,MUSSA E BACON</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '70'),
(84, 1, 'BANANA', '<b>BANANA,CANELA E LEITE CONDENSADO</b>', 'banana-jpg_1479554029.jpg', '<p><br></p>', 27.00, '71'),
(85, 11, 'BANANA CHOCOLATE', '<b>BANANA,LEITE CONDENSADO E CHOCOLATE</b>', 'bananachocolate-jpg_1479553519.jpg', '<p><br></p>', 32.00, '72'),
(86, 11, 'ROMEU E JULIETA', '<b>GOIABADA E MUSSA</b>', 'romeu-jpg_1479554329.jpg', '<p><br></p>', 28.00, '73'),
(87, 11, 'BRIGADEIRO', '<b>CHOCOLATE,LEITE CONDENSADO,GRANULADO E CEREJAS</b>', 'brigadeiro-jpg_1479553989.jpg', '<p><br></p>', 35.00, '74'),
(88, 1, 'CRISTAL', '<b>PALMITO,MUSSA,CATU E BACON</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '75'),
(89, 1, 'MINEIRA I', '<b>COUVE,CALABRESA,MUSSA E BACON</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 35.00, '76'),
(90, 1, 'LOMBO II', '<b>OMBO,PALMITO,CBL,BACON E MUSSA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 39.00, '77'),
(91, 1, 'MISTA', '<b>PRESUNTO,OVOS,MUSSA E TOMATE</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 35.00, '78'),
(92, 1, 'TRES QUEIJOS', '<b>MUSSA ,CATU E PARM,ESAO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 35.00, '79'),
(93, 1, 'PRIMAVERA', '<b>FRANGO,BROCOLIS,CHAMPI E CATU</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 38.00, '80'),
(94, 1, 'BRASILEIRA I', '<b>LOMBO,OVOS,MUSSA,CATU,E BACON</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 39.00, '81'),
(95, 1, 'JABA I', '<b>JABA,CBL E CATU</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 39.00, '82'),
(96, 1, 'JABA II', '<b>JABA,CBL,MUSSA E BACON</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 40.00, '83'),
(97, 1, 'PIZZA DOG', '<b>SAISICHA,PURE,MILHO,CATU,CHEDDAR E BATATA PALHA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 40.00, '85'),
(98, 1, 'ALEMA', '<b>MUSSA,CALABRESA,BACON E CBL</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '86'),
(99, 1, 'A MODA DO CHEFE III', '<b>MUSSA,PRESUNTO,CHAMPI E CBL</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 35.00, '87'),
(100, 1, 'BRASILEIRA II', '<b>CALABRESA,MUSSA,MILHO E ERVILHA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 34.00, '88'),
(101, 1, 'CAIPIRA', '<b>FRANGO,CALABRESA MOIDA,MUSSA E CBL</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 35.00, '89'),
(102, 1, 'ROMANA', '<b>PRESUNTO,MUSSA,ALICHE E TOMATE</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '90'),
(103, 1, 'CARIOCA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '91'),
(104, 1, 'CAPRI', '<b>MUSSA,FRANGO E ATUM</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 35.00, '92'),
(105, 1, 'CROCANTE', '<b>ESCAROLA,PRESUNTO,PALMITO,ERVILHA E MUSSA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '93'),
(106, 1, 'DA SOGRA', '<b>LOMBO,PALMITO,CATU E BACON</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 38.00, '94'),
(107, 1, 'DONA HORTÊNCIA', '<b>FRANGO,CANELONES D EPRESUNTO,MUSSA ,BACON E PALMITO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 39.00, '95'),
(108, 1, 'FASCINANTE', '<b>FRANGO,PALMITO,ERVILHA,MILHO,BACON E PARMESAO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 39.00, '96'),
(109, 1, 'JABA III', '<b>JABA,CALABRESA MOIDA,MUSSA,PROVOLONE,BACON E CBL</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 44.00, '97'),
(110, 1, 'JABA IV', '<b>JABA,CATU,PROVOLONE,BACON E MUSSA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 44.00, '98'),
(111, 1, 'MARGHERITA II', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 33.00, '99'),
(112, 1, 'MILHO VERDE II', '<b>MILHO E CATU</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 30.00, '100'),
(113, 1, 'MINEIRA II', '<b>MUSSA,LOMBO,CALABRESA,MOLHO E PARMESAO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 39.00, '101'),
(114, 1, 'NAMORADOS II', '<b>LOMBO,PROVOLONE,CATU,BACON E RDLS DE TOMATE</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 38.00, '102'),
(115, 1, 'NATURAL', '<b>PALMITO,ERVILHA,MILHO,ESCAROLA,TOMATE E MUSSA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 39.00, '103'),
(116, 1, 'PAULISTA', '<b>MUSSA,PRESUNTO,CBL,ATUIM,PALMITO E ERVILHA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 40.00, '104'),
(117, 1, 'PERU I', '<b>PEITO DE PERU,MUSSA E TOMATE</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 34.00, '105'),
(118, 1, 'PERU II', '<b>PEITO DE PERU,ESCAROLA SAIPICADA COM MUSSA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 37.00, '106'),
(119, 1, 'PIZZAIOLO II', '<b>FRANGO,PALMITO,CATU,MILHO E BACON</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 39.00, '107'),
(120, 1, 'PROVOLONE', '<b>MOLHO E  PROVOLONE</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '108'),
(121, 1, 'QUATRO ESTACOES', '<b>1/4 MUSSA 1/4CALABRESA 1/4ATUM 1/4 PORTUGUESA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 38.00, '109'),
(122, 1, 'SABOROSA', '<b>MUSSA E SALAME</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '110'),
(123, 1, 'SALOMAO', '<b>MUSSA,SALAME,CBL E TOMATE</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '111'),
(124, 1, 'SICILIANA II', '<b>CHAMPI,PALMITO,CATU E BACON</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 39.00, '112'),
(125, 1, 'VEGETARIANA  II', '<b>MUSSA,PALMITO,MILHO,ERVILHA E CHAMPI</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '113'),
(126, 1, 'VENUS', '<b>PRESUNTO,CALABRESA,MUSSA E CATU</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '114'),
(127, 1, 'VENEZA', '<b>PALMITO,MUSSA,PRESUNTO E CATU</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '115'),
(128, 11, 'PRESTIGIO', '<b>CHOCOLATE,COCO RALADO E LEITE CONDENSADO</b>', 'prestigio-jpg_1479554145.jpg', '<p><br></p>', 35.00, '116'),
(129, 11, 'SONHO DE VALSA', '<b>CHOCOLATE E SONHO DE VALSA</b>', 'sonho-png_1479554204.png', '<p><br></p>', 35.00, '117'),
(130, 1, 'PEPERONI', '<b>PEPERONI,CBL,MUSSA E RDLS DE TOMATE</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 40.00, '118'),
(131, 13, 'ESF CHOCOLATE', '<b><br></b>', 'esfiha-doce-jpg_1479553083.jpg', '<p><br></p>', 4.50, '200'),
(132, 13, 'ESFH BANANA', '<b></b>', 'esfiha-doce-jpg_1479553083.jpg', NULL, 3.50, '201'),
(133, 13, 'ESFH ROMEU JULIETA', '<b></b>', 'esfiha-doce-jpg_1479553083.jpg', NULL, 3.50, '202'),
(134, 2, 'ESFH CARNE', '<b><br></b>', 'esfiras-png_1463265819.png', '<p><br></p>', 3.50, '203'),
(135, 2, 'ESFH CALABRESA', '<b></b>', 'esfiras-png_1463265819.png', NULL, 3.50, '204'),
(136, 2, 'ESFH QUEIJO', '<b></b>', 'esfiras-png_1463265819.png', NULL, 3.50, '205'),
(137, 2, 'ESFH CATUPIRY', '<b></b>', 'esfiras-png_1463265819.png', NULL, 3.50, '206'),
(138, 2, 'ESFH ATUM C CATU', '<b></b>', 'esfiras-png_1463265819.png', NULL, 4.50, '207'),
(139, 2, 'ESFH FRANCATU', '<b></b>', 'esfiras-png_1463265819.png', NULL, 4.50, '208'),
(140, 2, 'ESFH MILHO C CATU', '<b></b>', 'esfiras-png_1463265819.png', NULL, 4.50, '209'),
(141, 2, 'ESFH PALM C CATU', '<b></b>', 'esfiras-png_1463265819.png', NULL, 4.50, '210'),
(142, 2, 'ESFH DOIS QJOS', '<b></b>', 'esfiras-png_1463265819.png', NULL, 4.50, '211'),
(143, 2, 'ESFH CALAB C CATU', '<b></b>', 'esfiras-png_1463265819.png', NULL, 4.50, '212'),
(144, 2, 'ESFH BCOM C QJO', '<b></b>', 'esfiras-png_1463265819.png', NULL, 4.50, '213'),
(145, 2, 'ESFH PALM C QJO', '<b></b>', 'esfiras-png_1463265819.png', NULL, 4.50, '214'),
(146, 2, 'ESFH CALAB C QJO', '<b></b>', 'esfiras-png_1463265819.png', NULL, 4.50, '215'),
(147, 2, 'ESFH ESCAROLA C QJO', '<b></b>', 'esfiras-png_1463265819.png', NULL, 4.50, '216'),
(148, 2, 'ESFH MILHO C QJO', '<b></b>', 'esfiras-png_1463265819.png', NULL, 4.50, '217'),
(149, 2, 'ESFH ATUM C QJO', '<b></b>', 'esfiras-png_1463265819.png', NULL, 4.50, '218'),
(150, 2, 'ESFH QJO C T.SECO', '<b></b>', 'esfiras-png_1463265819.png', NULL, 4.50, '219'),
(151, 4, 'PACOTE 220', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 50.00, '220'),
(152, 13, 'ESF BANANA C CHOCOL', '<b></b>', 'esfiha-doce-jpg_1479553083.jpg', NULL, 4.50, '221'),
(153, 2, 'ESFH ATUM', '<b></b>', 'esfiras-png_1463265819.png', NULL, 3.50, '222'),
(154, 2, 'ESFH CARNE C QJO', '<b></b>', 'esfiras-png_1463265819.png', NULL, 4.50, '223'),
(155, 2, 'ESFH FRANGO', '<b></b>', 'esfiras-png_1463265819.png', NULL, 3.50, '224'),
(156, 4, 'PACOTE 230', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 53.00, '230'),
(157, 4, 'PACOTE 240', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 50.00, '240'),
(158, 4, 'PACOTE 250', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 50.00, '250'),
(159, 2, 'ESFH BAURU', '<b></b>', 'esfiras-png_1463265819.png', NULL, 4.50, '260'),
(160, 3, 'T N T ENERGETICO', '<b><br></b>', 'tnt-png_1479551860.png', '<p><br></p>', 10.00, '270'),
(161, 15, 'SU FRESH', '<b>SUCOS</b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 2.50, '271'),
(162, 15, 'SUCO NATURAL 450 ML', '<b>SUCO NATURAL</b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 6.00, '272'),
(163, 3, 'COCA-COLA 2LT', '<b><br></b>', 'coca-jpg_1479551773.jpg', '<p><br></p>', 10.00, '300'),
(164, 3, 'FANTA 2LT', '<b><br></b>', 'fanta-png_1479551166.png', '<p><br></p>', 9.00, '301'),
(165, 3, 'GUARANA ANT', '<b><br></b>', 'guarana-png_1479551205.png', '<p><br></p>', 9.00, '302'),
(166, 3, 'GUARANA DOLLY', '<b><br></b>', 'dolly-png_1479551224.png', '<p><br></p>', 6.00, '303'),
(167, 3, 'COCA LIGHT 2 LT', '<b><br></b>', 'untitled-png_1479551145.png', '<p><br></p>', 10.00, '304'),
(168, 3, 'SPRITE', '<b><br></b>', 'sprite-png_1479551317.png', '<p><br></p>', 9.00, '305'),
(169, 10, 'COCA LATA', '<b></b>', 'lata-jpg_1463101088.jpg', NULL, 4.50, '306'),
(170, 10, 'FANTA LATA', '<b></b>', 'lata-jpg_1463101088.jpg', NULL, 4.50, '307'),
(171, 10, 'GUARANA LATA', '<b></b>', 'lata-jpg_1463101088.jpg', NULL, 4.50, '308'),
(172, 10, 'COCA LIGHT LATA', '<b></b>', 'lata-jpg_1463101088.jpg', NULL, 4.50, '309'),
(173, 10, 'MINE COCA', '<b>COCA</b>', 'lata-jpg_1463101088.jpg', NULL, 2.00, '310'),
(174, 5, 'BRAHMA LATA', '<b><br></b>', 'brahama-png_1479552071.png', '<p><br></p>', 5.00, '311'),
(175, 3, 'SKOL LATA', '<b><br></b>', 'skol-png_1479551373.png', '<p><br></p>', 5.00, '312'),
(176, 5, 'ITAIPAVA', '<b><br></b>', 'itaipava-png_1479552115.png', '<p><br></p>', 5.00, '313'),
(177, 3, 'GUARANA ZERO', '<b><br></b>', 'guaranalight-png_1479551288.png', '<p><br></p>', 9.00, '315'),
(178, 3, 'COCA ZERO', '<b><br></b>', 'cocalight-png_1479551099.png', '<p><br></p>', 10.00, '316'),
(179, 3, 'REFRI 600 ML', '<b><br></b>', '600x600-png_1479551668.png', '<p><br></p>', 6.50, '317'),
(180, 5, 'SKOL', '<b><br></b>', 'sk-png_1479552749.png', '<p><br></p>', 9.00, '401'),
(181, 5, 'BRAHMA', '<b><br></b>', 'bra-png_1479552769.png', '<p><br></p>', 9.00, '402'),
(182, 5, 'ITAIPAVA', '<b><br></b>', 'ita-png_1479552668.png', '<p><br></p>', 9.00, '403'),
(183, 5, 'BOHEMIA', '<b><br></b>', 'bohemia-jpg_1479552024.jpg', '<p><br></p>', 10.00, '404'),
(184, 5, 'ORIGINAL', '<b><br></b>', 'original-png_1479552608.png', '<p><br></p>', 11.00, '405'),
(185, 5, 'SKOL LATA', '<b><br></b>', 'skol2-png_1479552151.png', '<p><br></p>', 4.50, '406'),
(186, 5, 'BRAHMA LATA', '<b><br></b>', 'brahama-png_1479552090.png', '<p><br></p>', 4.50, '407'),
(187, 5, 'ITAIPAVA LATA', '<b><br></b>', 'itaipava-png_1479552133.png', '<p><br></p>', 4.50, '408'),
(188, 5, 'BOHEMIA LATA', '<b><br></b>', 'bohemia-jpg_1479552314.jpg', '<p><br></p>', 4.50, '409'),
(189, 5, 'CERVEJA SEM ALCOOL', '<b><br></b>', 'semalcool-png_1479552508.png', '<p><br></p>', 4.50, '410'),
(190, 14, 'CAIP RUM BACARDI', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 11.00, '411'),
(191, 14, 'CAIPIRINHA PINGA', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 8.50, '412'),
(192, 14, 'CAIPPIRINHA DE SMIRNOFF', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 13.00, '413'),
(193, 14, 'CAIPIRINHA STEINHAEG', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 12.00, '414'),
(194, 14, 'CAIPIRINHA DE SAKE', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 13.00, '415'),
(195, 14, 'WHISKY OLD EIGHT', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 9.00, '416'),
(196, 14, 'WISKY PASSPORT', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 11.00, '417'),
(197, 14, 'WHISKY RED LABEL', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 15.00, '418'),
(198, 14, 'WHISKYJ JB', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 15.00, '419'),
(199, 14, 'DOMECQ', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 6.00, '420'),
(200, 14, 'DREHER', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 4.00, '421'),
(201, 14, 'CAMPARI', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 8.00, '422'),
(202, 14, 'CINAR', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 4.00, '423'),
(203, 14, 'MARTINI', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 5.00, '424'),
(204, 14, 'STEINHAEGER', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 8.00, '425'),
(205, 14, 'SMIRNOFF', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 8.00, '426'),
(206, 14, 'SAN REMY', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 6.00, '427'),
(207, 14, 'TEQUILA', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 15.00, '428'),
(208, 14, 'AMARULA', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 9.00, '429'),
(209, 14, 'SALINAS', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 6.00, '430'),
(210, 14, 'SELETA', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 6.00, '431'),
(211, 14, 'BOAZINHA', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 6.00, '432'),
(212, 14, 'NEGA FULO', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 6.00, '433'),
(213, 14, 'SAO FCO', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 4.00, '434'),
(214, 14, 'YPIOCA', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 4.00, '435'),
(215, 14, 'SAGATIBA', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 5.00, '436'),
(216, 6, 'VINHO ALMADEN', '<b></b>', 'vinhos-jpg_1463266382.jpg', NULL, 45.00, '437'),
(217, 6, 'VINHO MOLDONI', '<b></b>', 'vinhos-jpg_1463266382.jpg', NULL, 19.90, '438'),
(218, 6, 'VINHO CASAL GARCIA', '<b></b>', 'vinhos-jpg_1463266382.jpg', NULL, 32.00, '439'),
(219, 6, 'VINHO LIEB FRAMICH', '<b></b>', 'vinhos-jpg_1463266382.jpg', NULL, 28.00, '440'),
(220, 6, 'VINHO SALTON', '<b></b>', 'vinhos-jpg_1463266382.jpg', NULL, 32.00, '441'),
(221, 15, 'SUCO MARACUJA', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 5.50, '442'),
(222, 15, 'SUCO LARANJA', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 5.50, '443'),
(223, 15, 'SUCO ACEROLA', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 5.50, '444'),
(224, 15, 'SUCO ABACAXI', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 5.50, '445'),
(225, 15, 'SUCO MORANGO', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 5.50, '446'),
(226, 15, 'SUCO MANGA', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 5.50, '447'),
(227, 15, 'SUCO C LEITE', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 7.00, '448'),
(228, 10, 'COCA COLA LATA', '<b></b>', 'lata-jpg_1463101088.jpg', NULL, 4.50, '449'),
(229, 10, 'FANTA LARAJA LATA', '<b><br></b>', 'lata-jpg_1463101088.jpg', '<p><br></p>', 4.50, '450'),
(230, 10, 'FANTA UVA LATA', '<b></b>', 'lata-jpg_1463101088.jpg', NULL, 4.50, '451'),
(231, 10, 'GUARANA LATA', '<b></b>', 'lata-jpg_1463101088.jpg', NULL, 4.50, '452'),
(232, 10, 'SODA LATA', '<b></b>', 'lata-jpg_1463101088.jpg', NULL, 4.50, '453'),
(233, 10, 'COCA ZERO LATA', '<b></b>', 'lata-jpg_1463101088.jpg', NULL, 4.50, '454'),
(234, 10, 'GUARANA ZERO LATA', '<b></b>', 'lata-jpg_1463101088.jpg', NULL, 4.50, '455'),
(235, 10, 'TONICA LATA', '<b></b>', 'lata-jpg_1463101088.jpg', NULL, 4.50, '456'),
(236, 10, 'H2O', '<b></b>', 'lata-jpg_1463101088.jpg', NULL, 4.00, '457'),
(237, 10, 'AGUA', '<b></b>', 'lata-jpg_1463101088.jpg', NULL, 3.00, '458'),
(238, 10, 'AGUA COM GAS', '<b></b>', 'lata-jpg_1463101088.jpg', NULL, 4.00, '459'),
(239, 15, 'LARANJA C ACEROLA', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 7.00, '460'),
(240, 10, 'REFRI C LIMAO E GELO', '<b></b>', 'lata-jpg_1463101088.jpg', NULL, 5.00, '461'),
(241, 5, 'MALZBIER LATA E LONG', '<b><br></b>', 'malzibie-png_1479552244.png', '<p><br></p>', 4.00, '462'),
(242, 3, 'REFRIG 2L', '<b><br></b>', 'refr-2l-png_1479551688.png', '<p><br></p>', 11.00, '463'),
(243, 6, 'JARRA DE VINHO', '<b><br></b>', 'vinhos-jpg_1463266382.jpg', '<p><br></p>', 19.00, '464'),
(244, 6, 'MEIA JARRA DE VINHO', '<b></b>', 'vinhos-jpg_1463266382.jpg', NULL, 11.00, '465'),
(245, 6, 'TAÇA DE VINHO', '<b></b>', 'vinhos-jpg_1463266382.jpg', NULL, 4.00, '466'),
(246, 12, 'PORÇOES', '<b>PORÇOES</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 12.00, '467'),
(247, 6, 'PINGA 51  E  V  BARREIRO', '<b></b>', 'vinhos-jpg_1463266382.jpg', NULL, 3.00, '468'),
(248, 6, 'VINHO DO FRADE', '<b></b>', 'vinhos-jpg_1463266382.jpg', NULL, 18.00, '469'),
(249, 6, 'VINHO DO FRADE', '<b></b>', 'vinhos-jpg_1463266382.jpg', NULL, 18.00, '470'),
(250, 10, 'SCHWEPPES CITRUS', '<b></b>', 'lata-jpg_1463101088.jpg', NULL, 4.50, '471'),
(251, 1, 'SU FRESH', '<b>SUCOS</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 7.00, '472'),
(252, 14, 'SMIRNOFF ICE', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 6.00, '473'),
(253, 15, 'SUCO NATURAL 1 L', '<b>SUCOS</b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 10.00, '474'),
(254, 8, 'PRODUTO EXTRA', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 3.00, '500'),
(255, 8, 'DISCO DE PIZZA', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 3.00, '501'),
(256, 8, 'BORDA DE CHEDDAR', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 3.00, '502'),
(257, 9, 'ENTREGA', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 2.00, '503'),
(258, 1, 'TX IFOOD', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 3.00, '504'),
(259, 3, 'FANTA UVA', '<b><br></b>', 'fantauva-png_1479551181.png', '<p><br></p>', 9.00, '507'),
(260, 7, 'BTO ATUM', '<b>ATUM E CBL</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '601'),
(261, 7, 'BTO ALHO', '<b>ALHO FRITO E MUSSA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 20.00, '602'),
(262, 7, 'BTO ALICHE', '<b>ALICHE,MUSSA,TOMATE E PARMESAO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 23.00, '603'),
(263, 7, 'BTO A MODA DA CASA I', '<b>ATUM,CALABRESA,CHAMPI,CATU E PARMESAO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 25.00, '604'),
(264, 7, 'BTO A MODA D CASA II', '<b>ESCAROLA,CALABRESA,PALMITO,ERVILHA,CATU E PARMESAO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 25.00, '605'),
(265, 7, 'BTO A MODA DCASA III', '<b>PRESUNTO,PALMITO,MILHO,ERVILHA,OVOS,BACON,CANELONES E MUSSA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 26.00, '606'),
(266, 7, 'BTO A MODA D CHEFE I', '<b>PRESUNTO,PALMITO,ERVILHA,MUSSA,BACON E PARMESAO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '607'),
(267, 7, 'BTO A MODA DCHEFE II', '<b>PALMITO,OVOS,PIMENTA,CATU,MUSSA E PARMESAO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '608'),
(268, 7, 'BTO BAIANA', '<b>CALABRESA MOIDA,PIMENTA,OVOS E CBL</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 19.00, '609'),
(269, 7, 'BTO BAIACATU', '<b>CALABRESA MOIDA E CATU</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 20.00, '610'),
(270, 7, 'BTO BAURU', '<b>PRESUNTO,MUSSA E RDLS DE TOMATE</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 21.00, '611'),
(271, 7, 'BTO BACON', '<b>MUSSA E BACON</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '612'),
(272, 7, 'BTO BOLOGNHESA I', '<b>CARNE MOIDA  E MUSSA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '613'),
(273, 7, 'BTO BOLOGNHESA II', '<b>CARNE MOIDA,CALABRESA E CATU</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '614'),
(274, 7, 'BTO BROCOLIS I', '<b>BROCOLIS,CATU E ALHO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '615'),
(275, 7, 'BTO BROCOLIS II', '<b>BROCOLIS,MUSSA,BACON E ALHO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '616'),
(276, 7, 'BTO CATUPIRY', '<b>MOLHO DE TOMATE E CATU</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 20.00, '617'),
(277, 7, 'BTO CINCO QUEIJOS', '<b>MUSSA,PROVOLONE,GORGONZOLA,CATU E PARMESAO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 25.00, '618'),
(278, 7, 'BTO CALABRESA', '<b>CALABRESA E CBL</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 18.00, '619'),
(279, 7, 'BTO CALACATU', '<b>CALABRESA FATIADA E CATU</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 20.00, '620'),
(280, 7, 'BTO CANADENSE', '<b>LOMBO,CBL E CATU</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '621'),
(281, 7, 'BTO DI FELICE', '<b>FRANGO,MUSSA,CATU E BACON</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 23.00, '622'),
(282, 7, 'BTO CHAMPIGNON', '<b>CHAMPI E MUSSA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '623'),
(283, 7, 'BTO DA VILA', '<b>CALABRESA,OVOS,MILHO E CATU</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 23.00, '625'),
(284, 7, 'BTO DOIS QUEIJOS', '<b>MUSSA E CATU</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 21.00, '626'),
(285, 7, 'BTO DELICIA', '<b>FRANGO,PRESUNTO,MILHO E CATU</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '627'),
(286, 7, 'BTO DO PAPA', '<b>LOMBO,OVOS,ERVILHA,CATU E BACON</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 23.00, '628'),
(287, 7, 'BTO ESCAROLA', '<b>ESCAROLA,CBL,MUSSA E  BACON</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 21.00, '629'),
(288, 7, 'BTO ESCAROLA ESP', '<b>ESCAROLA,PALMITO,MUSSA E ALHO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '630'),
(289, 7, 'BTO EU E VOCE', '<b>EU FAÇO A MASSA  A MASSA E VC ESCOLHE 4 INGREDIENTES</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 23.00, '631'),
(290, 7, 'BTO FRANCATU', '<b>FRANGO COM CATU</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '632'),
(291, 7, 'BTO FRANGO CAIPIRA', '<b>FRANGO,MILHO,ERVILHA E MUSSA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '633'),
(292, 7, 'BTO FRANGO VENEZA', '<b>FRANGO,PALMITO,CATU E MUSSA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 23.00, '634'),
(293, 7, 'BTO FRANGO A MODA', '<b>FRANGO,PRESUNTO,MUSSA,CBL E BACON</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '635'),
(294, 7, 'BTO FRANGO BRASILEIR', '<b>FRANGO,MILHO E CATU</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '636'),
(295, 7, 'BTO FRANGO MINEIRO', '<b>FRANGO,CBL E MUSSA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '637'),
(296, 7, 'BTO ABC', '<b>FRANGO,ESCAROLA,PRESUNTO,PALMITO E MUSSA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '638'),
(297, 7, 'BTO AMERICANA', '<b>LOMBO,MUSSA E TOMATE</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '639'),
(298, 7, 'BTO ATUM II', '<b>ATUM,CHAMPI,MUSSA E TOMATE</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 23.00, '640'),
(299, 7, 'BTO LOMBO I', '<b>LOMBO,CBL E MUSSA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '641'),
(300, 7, 'BTO SICILIANA I', '<b>CHAMPI,MUSSA E BACON</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '642'),
(301, 7, 'BTO MUSSARELA', '<b>MOLHO E MUSSA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 18.00, '643'),
(302, 7, 'BTO MUSSARELA II', '<b>MOLHO,TOMATE PICADO E MUSSA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 19.00, '644'),
(303, 7, 'BTO MARGUERITA I', '<b>MUSSA,RDLS DE TOMATE E MANJERICAO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 19.00, '645'),
(304, 7, 'BTO MILHO VERDE', '<b>MILHO E MUSSA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 19.00, '646'),
(305, 7, 'BTO NAPOLITANA', '<b>MUSSA,TOMATE E PARMESAO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '647'),
(306, 7, 'BTO NAMORADOS I', '<b>MUSSA,PALMITO,CATU E MILHO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '648'),
(307, 7, 'BTO PERUANA', '<b>ATUM,ERVILHA,CBL,PALMITO E MUSSA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 23.00, '649'),
(308, 7, 'BTO PORTUGUESA', '<b>PRESUNTO,OVOS,ERVILHA,MUSSA E BACON</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '650'),
(309, 7, 'BTO PORTUGUESA ES', '<b>PRESUNTO,ERVILHA,OVOS,CBL,MUSSA E MILHO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 23.00, '651'),
(310, 7, 'BTO PORTUG  LIGHT', '<b>PRESUNTO,OVOS,ERVILHA,PALMITO,CBL,MUSSA E MILHO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 25.00, '652'),
(311, 7, 'BTO PALMITO', '<b>PALMITO,MUSSA E RDLS DE TOMATE</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '653'),
(312, 7, 'BTO PALMITO CATU', '<b>PALMITO E CATU</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 23.00, '654'),
(313, 7, 'BTO PIZZAIOLO I', '<b>ATUM,PALMITO,MUSSA E BACON</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '655'),
(314, 7, 'BTO QUATRO QUEIJOSI', '<b>MUSSA,PARMESAO,PROVOLONE E GORGONZOLA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 23.00, '656'),
(315, 7, 'BTO QUATRO QUEIJOSII', '<b>MUSSA,PARMESAO,PROVOLONE E CATU</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 23.00, '657'),
(316, 7, 'BTO RALLYE', '<b>LOMBO,OVOS,CATU E TOMATE</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '658'),
(317, 7, 'BTO CAPRICHOSA', '<b>LOMBO,MUSSA ,CATU E TOMATE</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '659'),
(318, 7, 'BTO RUCULA', '<b>MUSSA,RUCULA E TOMATE SECO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '660'),
(319, 7, 'BTO SANTO ANDRE', '<b>CALABRESA M OIDA,MILHO,MUSSA,CATU,BACON E TOMATE SECO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 25.00, '661'),
(320, 7, 'BTO SAO LUIZ', '<b>PEITO DE PERU,CHAMPI,MUSSA E CATU</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '662'),
(321, 7, 'BTO TOSCANA', '<b>CALABRESA FATIADA,MUSSA E CBL</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '663'),
(322, 7, 'BTO TROPICAL', '<b>ATUM,MILHO E MUSSA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '664'),
(323, 7, 'BTO VEGETARIANA  I', '<b>ESCAROLA,PALMITO,MILHO,ERVILHA,CBL E ALHO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '665'),
(324, 7, 'BTO CORINTHIANA', '<b>ATUM,CBL,PROVOLONE,BACON E MAIS MOLHO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '666'),
(325, 7, 'BTO PALMEIRENSE', '<b>LOMBO,PROVOLONE,RUCULA E TOMATE</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '667'),
(326, 7, 'BTO SANTISTA', '<b>ATUIM,CBL,MILHO E CATU</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '668'),
(327, 7, 'BTO TRICOLOR', '<b>MUSSA,ATUM,MILHO E PALMITO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '669'),
(328, 7, 'BTO CARIJOS', '<b>FRANGO,PALMITO,MUSSA E BACON</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '670'),
(329, 12, 'BTO BANANA.DOCE', '<b>BANANA,CANELA E LEITE CONDENSADO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 17.00, '671'),
(330, 12, 'BTO BANANA CHOCOLAT', '<b>BANANA,LEITE CONDENSADO E CHOCOLATE</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 18.00, '672'),
(331, 12, 'BTO ROMEU E JULIETA', '<b>GOIABADA E MUSSA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 18.00, '673'),
(332, 12, 'BTO BRIGADEIRO', '<b>CHOCOLATE,LEITE CONDENSADO,GRANULADO E CEREJA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '674'),
(333, 7, 'BTO CRISTAL', '<b>PALMITO,MUSSA,CATU E BACON</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '675'),
(334, 7, 'BTO MINEIRA I', '<b>COUVE,CALABRESA,MUSSA E BACON</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '676'),
(335, 7, 'BTO LOMBO II', '<b>LOMBO,PALMITO,CBL,BACON E MUSSA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '677'),
(336, 7, 'BTO MISTA', '<b>PRESUNTO,OVOS,MUSSA E TOMATE</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '678'),
(337, 7, 'BTO TRES QUEIJOS', '<b>MUSSA,CATU E PARMESAO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '679'),
(338, 7, 'BTO PRIMAVERA', '<b>FRANGO,BROCOLIS,CHAMPI E CATU</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 23.00, '680'),
(339, 7, 'BTO BRASILEIRA I', '<b>LOMBO,OVOS,MUSSA,CATU E BACON</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '681'),
(340, 7, 'BTO JABA I', '<b>JABA,CBL E CATU</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '682'),
(341, 7, 'BTO JABA II', '<b>JABA,CBL,MUSSA E BACON</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 25.00, '683'),
(342, 7, 'BTO PIZZA DOG', '<b>SALSICHA,PURE,MILHO,CATU,CHEDDAR E BATATA PALHA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '685'),
(343, 7, 'BTO ALEMA', '<b>MUSSA,CALABRESA,BACON E CBL</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '686'),
(344, 7, 'BTO A CHEFE III', '<b>MUSSA,PRESUNTO,CHAMPI E CBL</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '687'),
(345, 7, 'BTO BRASILEIRA II', '<b>CALABRESA,MUSSA,MILHO E ERVILHA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '688'),
(346, 7, 'BTO CAIPIRA', '<b>FRANGO,CALABRESA MOIDA,MUSSA E CBL</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '689'),
(347, 7, 'BTO ROMANA', '<b>PRESUNTO,MUSSA,ALICHE E TOMATE</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '690'),
(348, 7, 'BTO CARIOCA', '<b>CATU,MILHO E ATUM</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '691'),
(349, 7, 'BTO CAPRI', '<b>MUSSA,FRANGO E ATUM</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '692'),
(350, 7, 'BTO CROCANTE', '<b>ESCAROLA,PRESUNTO,PALMITO,ERVILHA E MUSSA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '693'),
(351, 7, 'BTO DA SOGRA', '<b>LOMBO,PALMITO,CATU E BACON</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 23.00, '694'),
(352, 7, 'BTO DONA HORTENCIA', '<b>FRANGO,CANELONES DE PRESUNTO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '695'),
(353, 7, 'BTO FASCINANTE', '<b>FRANGO,PALMITO,ERVILHA,MILHO,BACON E PARMESAO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '696'),
(354, 7, 'BTO JABA III', '<b>CATU,MILHO E ATUM</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 26.00, '697'),
(355, 7, 'BTO JABA IV', '<b>JABA,CATU,PROVOLONE,BACON  E MUSSA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 26.00, '698'),
(356, 7, 'BTO MARGHERITA II', '<b>MUSSA,PRESUNTO,PARMESAO E MANJERICAO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 21.00, '699'),
(357, 7, 'BTO MILHO VERDE II', '<b>MILHO E CATU</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 19.00, '700'),
(358, 7, 'BTO MINEIRA II', '<b>MUSSA,LOMBO,CALABRESA,MOLHO E PARMESAO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '701'),
(359, 7, 'BTO NAMORADOS II', '<b>LOMBO,PROVOLONE,CATU,BACON E RDLS DE TOMATE</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 23.00, '702'),
(360, 7, 'BTO NATURAL', '<b>PALMITO,ERVILHA,MILHO,ESCAROLA,TOMATE E MUSSA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '703'),
(361, 7, 'BTO PAULISTA', '<b>MUSSA,PRESUNTO,CBL,ATUM,PALMITO E ERVILHA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '704'),
(362, 7, 'BTO PERU I', '<b>PEITO DE PERU,MUSSA E TOMATE</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '705'),
(363, 7, 'BTO PERU II', '<b>PEITO DE PERU,ESCAROLA SALPÍCADA COM MUSSA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '706'),
(364, 7, 'BTO PIZZAIOLO II', '<b>FRANGO,PALMITO,CATU,MILHO E BACON</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '707'),
(365, 7, 'BTO PROVOLONE', '<b>MOLHO E PROVOLONE</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '708'),
(366, 7, 'BTO SABOROSA', '<b>MUSSA E SALAME</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '710'),
(367, 7, 'BTO SALOMAO', '<b>MUSSA,SALAME,CBL E TOMATE</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '711'),
(368, 7, 'BTO SILICIANA II', '<b>CHAMPI,PALMITO,CATU E BACON</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '712'),
(369, 7, 'BTO VEGETARIANA II', '<b>MUSSA,PALMITO,MILHO,ERVILHA E CHAMPI</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '713'),
(370, 7, 'BTO VENUS', '<b>PRESUNTO,CALABRESA,MUSSA E CATU</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '714'),
(371, 7, 'BTO VENEZA', '<b>PALMITO,MUSSA,PRESUNTO E CATU</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '715'),
(372, 12, 'BTO PRESTIGIO', '<b>CHOCOLATE,COCOC RALADO E LEITE CONDENSADO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '716'),
(373, 12, 'BTO SONHO DE VALSA', '<b>CHOCOLATE E BOMBONS SONHO DE VALSA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '717'),
(374, 1, 'BTO DE PEPERONI', '<b>PEPPERONI,CBL,MUSSA,E RDLS DE TOMATE</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '718'),
(375, 1, 'SUCO', '<b>*</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 6.00, '747'),
(376, 15, 'SUCO DE UVA SAN MARTIN', '<b>SUCO</b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 22.00, '748'),
(377, 6, 'VINHO', '<b></b>', 'vinhos-jpg_1463266382.jpg', NULL, 17.00, '750'),
(378, 6, 'VINHO SAN MARTIN', '<b>VINHO</b>', 'vinhos-jpg_1463266382.jpg', NULL, 22.00, '751'),
(379, 1, 'DEL VALLE SALAO', '<b>SUCOS</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 10.00, '752'),
(380, 15, 'LIMAO E GELO', '<b>LIMAO E GELO</b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 1.00, '753'),
(381, 14, 'CAIPIRINHA MINEIRA', '<b>CAIPIRINHA</b>', 'logo-pizzaria-jpg_1462540961.jpg', NULL, 11.50, '754'),
(382, 17, 'COMBINADO', '<b>NAO EXCLUIR </b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 0.00, '999'),
(383, 1, 'ATUM', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 35.00, '1001'),
(384, 1, 'ALHO', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 34.00, '1002'),
(385, 1, 'ALICHE', '<b>ALICHE,MUSSA,TOMATE E PARMESAO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 38.00, '1003'),
(386, 1, 'A MODA DA CASA I', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 42.00, '1004'),
(387, 1, 'A MODA DA CASA II', '<b>ESCAROLA,CALABRESA,PALMITO,ERVILHA,CATU E PARMESAO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 43.00, '1005'),
(388, 1, 'A MODA DA CASA III', '<b>PRESUNTO,PALMITO,MILHO,ERVILHA,OVOS,BACON,CANELONES E MUSSA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 46.00, '1006'),
(389, 1, 'A MODA DO CHEFE I', '<b>PRESUNTO,PALMITO,ERVILHA,MUSSA,BACON E PARMESAO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 41.00, '1007'),
(390, 1, 'A MODA DO CHEFE II', '<b>PALMITO,OVOS,PIMENTA,CATU,MUSSA E PARMESAO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 41.00, '1008'),
(391, 1, 'BAIANA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 31.00, '1009'),
(392, 1, 'BAIACATU', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 35.00, '1010'),
(393, 1, 'BAURU', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 34.00, '1011'),
(394, 1, 'BACOM', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '1012'),
(395, 1, 'BOLOGNESA I', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '1013'),
(396, 1, 'BOLOGNESA II', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 37.00, '1014'),
(397, 1, 'BROCOLIS I', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '1015'),
(398, 1, 'BROCOLIS II', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 37.00, '1016'),
(399, 1, 'CATUPIRY', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 34.00, '1017'),
(400, 1, 'CINCO QUEIJOS', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 41.00, '1018'),
(401, 1, 'CALABRESA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 29.00, '1019'),
(402, 1, 'CALACATU', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 35.00, '1020'),
(403, 1, 'CANADENSE', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '1021'),
(404, 1, 'DI FELICCE', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 38.00, '1022'),
(405, 1, 'CHAMPIGNOM', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 35.00, '1023'),
(406, 1, 'DA VILA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '1025'),
(407, 1, 'DOIS QUEIJOS', '<b>MUSSA E CATU</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '1026'),
(408, 1, 'DELICIA', '<b>FRANGO,PRESUNTO,MILHO E CATU</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 37.00, '1027'),
(409, 1, 'DO PAPA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 38.00, '1028'),
(410, 1, 'ESCAROLA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 35.00, '1029'),
(411, 1, 'ESCAROLA ESPECIAL', '<b>ESCAROLA,PALMITO,MUSSA E ALHO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 35.00, '1030'),
(412, 1, 'EU E VOCE', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 38.00, '1031'),
(413, 1, 'FRANCATU', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '1032'),
(414, 1, 'FRANCO CAIPIRA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 37.00, '1033'),
(415, 1, 'FRANGO VENEZA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 38.00, '1034'),
(416, 1, 'FRANGO A MODA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 39.00, '1035'),
(417, 1, 'FRANGO BRASILEIRO', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '1036'),
(418, 1, 'FRANGO MINEIRO', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '1037'),
(419, 1, 'ABC', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 40.00, '1038'),
(420, 1, 'AMERICANA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '1039'),
(421, 1, 'ATUM II', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 38.00, '1040'),
(422, 1, 'LOMBO I', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '1041'),
(423, 1, 'SICILIANA I', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 37.00, '1042'),
(424, 1, 'MUSSARELA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 29.00, '1043'),
(425, 1, 'MUSSARELA II', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 31.00, '1044'),
(426, 1, 'MARGHERITA I', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 31.00, '1045'),
(427, 1, 'MILHO VERDE I', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 32.00, '1046'),
(428, 1, 'NAPOLITANA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 35.00, '1047'),
(429, 1, 'NAMORADOS I', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 37.00, '1048'),
(430, 1, 'PERUANA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 38.00, '1049'),
(431, 1, 'PORTUGUESA I', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 37.00, '1050'),
(432, 1, 'PORTUGUESA ESPECIAL', '<b>PRESUNTO,ERVILHA ,.OVOS,CBL,MUSSA E  MILHO</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 38.00, '1051'),
(433, 1, 'PORTUGUESA LIGHT', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 40.00, '1052'),
(434, 1, 'PALMITO', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '1053'),
(435, 1, 'PALMITO COM CATUPIRY', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 38.00, '1054'),
(436, 1, 'PIZZAIOLLO I', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 37.00, '1055'),
(437, 1, 'QUATRO QUEIJOS I', '<b>MUSSA,PARMESAO,PROVOLONE E GORGONZOLA</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 39.00, '1056'),
(438, 1, 'QUATRO QUEIJOS II', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 39.00, '1057'),
(439, 1, 'RALLYE', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 37.00, '1058'),
(440, 1, 'CAPRICHOSA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 38.00, '1059'),
(441, 1, 'RUCULA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 37.00, '1060'),
(442, 1, 'SANTO ANDRE', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 42.00, '1061'),
(443, 1, 'SAO LUIZ', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 39.00, '1062'),
(444, 1, 'TOSCANA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '1063'),
(445, 1, 'TROPICAL', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 37.00, '1064'),
(446, 1, 'VEGETARIANA I', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 37.00, '1065'),
(447, 1, 'CORINTHIANA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 37.00, '1066'),
(448, 1, 'PALMEIRENSE', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 37.00, '1067'),
(449, 1, 'SANTISTA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 37.00, '1068'),
(450, 1, 'TRICOLOR', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 37.00, '1069'),
(451, 1, 'CARIJOS', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 38.00, '1070'),
(452, 11, 'BANANA', '<b><br></b>', 'banana-jpg_1479554049.jpg', '<p><br></p>', 30.00, '1071'),
(453, 11, 'BANANA C CHOCOLATE', '<b>BANANA,LEITE CONDENSADO E CHOCOLATE</b>', 'bananachocolate-jpg_1479553503.jpg', '<p><br></p>', 33.00, '1072'),
(454, 11, 'ROMEU E JULIETA', '<b><br></b>', 'romeu-jpg_1479554349.jpg', '<p><br></p>', 33.00, '1073'),
(455, 11, 'BRIGADEIRO', '<b><br></b>', 'brigadeiro-jpg_1479554005.jpg', '<p><br></p>', 36.00, '1074'),
(456, 1, 'CRISTAL', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 38.00, '1075'),
(457, 1, 'MINEIRA I', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '1076'),
(458, 1, 'LOMBO II', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 38.00, '1077'),
(459, 1, 'MISTA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 35.00, '1078'),
(460, 1, 'TRES  QUEIJOS', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 37.00, '1079'),
(461, 1, 'PRIMAVERA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 38.00, '1080'),
(462, 1, 'BRASILEIRA I', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 39.00, '1081'),
(463, 1, 'JABA I', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 39.00, '1082'),
(464, 1, 'JABA II', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 40.00, '1083'),
(465, 1, 'PIZZA DOG', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 39.00, '1085'),
(466, 1, 'ALEMA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '1086'),
(467, 1, 'A MODA DO CHEFE III', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 37.00, '1087'),
(468, 1, 'BRASILEIRA II', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '1088'),
(469, 1, 'CAIPIRA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '1089'),
(470, 1, 'ROMANA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 37.00, '1090'),
(471, 1, 'CARIOCA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '1091'),
(472, 1, 'CAPRI', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '1092'),
(473, 1, 'CROCANTE', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 39.00, '1093'),
(474, 1, 'DA SOGRA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 38.00, '1094'),
(475, 1, 'DONA HORTENCIA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 39.00, '1095'),
(476, 1, 'FASCINANTE', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 40.00, '1096'),
(477, 1, 'JABA III', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 42.00, '1097'),
(478, 1, 'JABA IV', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 42.00, '1098'),
(479, 1, 'MARGHERITA II', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '1099'),
(480, 1, 'MILHO VERDE II', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 33.00, '1100'),
(481, 1, 'MINEIRA II', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 38.00, '1101'),
(482, 1, 'NAMORADOS II', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 38.00, '1102');
INSERT INTO `item` (`item_id`, `item_categoria`, `item_nome`, `item_desc`, `item_foto`, `item_obs`, `item_preco`, `item_codigo`) VALUES
(483, 1, 'NATURAL', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 37.00, '1103'),
(484, 1, 'PAULISTA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 38.00, '1104'),
(485, 1, 'PERU I', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 35.00, '1105'),
(486, 1, 'PERU II', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '1106'),
(487, 1, 'PIZZAOLO II', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 39.00, '1107'),
(488, 1, 'PROVOLONE', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 36.00, '1108'),
(489, 1, 'QUATRO ESTACOES', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 39.00, '1109'),
(490, 1, 'SABOROSA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 37.00, '1110'),
(491, 1, 'SALOMAO', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 37.00, '1111'),
(492, 1, 'SICILIANA II', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 39.00, '1112'),
(493, 1, 'VEGETARIANA II', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 37.00, '1113'),
(494, 1, 'VENUS', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 37.00, '1114'),
(495, 1, 'VENEZA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 37.00, '1115'),
(496, 11, 'PRESTIGIO', '<b><br></b>', 'prestigio-jpg_1479554165.jpg', '<p><br></p>', 36.00, '1116'),
(497, 11, 'SONHO DE VALSA', '<b><br></b>', 'sonho-png_1479554265.png', '<p><br></p>', 38.00, '1117'),
(498, 1, 'PEPERONI', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 39.00, '1118'),
(499, 1, 'SAO LUIZ', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 39.00, '1162'),
(500, 7, 'BTO ATUM', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '2001'),
(501, 7, 'BTO ALHO', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 21.00, '2002'),
(502, 7, 'BTO ALICHE', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '2003'),
(503, 7, 'BTO MODA DA CASA 1', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 26.00, '2004'),
(504, 7, 'BTO MODA DA CASA II', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 27.00, '2005'),
(505, 7, 'BTO MODA DA CASA III', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 28.00, '2006'),
(506, 7, 'BTO MODA DO CHEFE I', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 25.00, '2007'),
(507, 7, 'BTO MODA DO CHEFE II', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 25.00, '2008'),
(508, 7, 'BTO BAIANA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 19.00, '2009'),
(509, 7, 'BTO BAIACATU', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '2010'),
(510, 7, 'BTO BAURU', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 21.00, '2011'),
(511, 7, 'BTO BACON', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '2012'),
(512, 7, 'BTO BOLONGNESA I', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '2013'),
(513, 7, 'BTO BOLOGNESA II', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 23.00, '2014'),
(514, 7, 'BTO BROCOLIS I', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '2015'),
(515, 7, 'BTO BROCOLIS II', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 23.00, '2016'),
(516, 7, 'BTO CATUPIRY', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 21.00, '2017'),
(517, 7, 'BTO CINCO QUEIJOS', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 25.00, '2018'),
(518, 7, 'BTO CALABRESA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 18.00, '2019'),
(519, 7, 'BTO CALACATU', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '2020'),
(520, 7, 'BTO CANADENSE', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '2021'),
(521, 7, 'BTO DE FELICE', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '2022'),
(522, 7, 'BTO CHAMPIGNON', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '2023'),
(523, 7, 'BTO DA VILA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '2025'),
(524, 7, 'BTO DOIS QUIJOS', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '2026'),
(525, 7, 'BTO DELICIA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 23.00, '2027'),
(526, 7, 'BTO DO PAPA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '2028'),
(527, 7, 'BTO ESCAROLA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '2029'),
(528, 7, 'BTO ESCAROLA ESPEC', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '2030'),
(529, 7, 'BTO EU E VOCE', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '2031'),
(530, 7, 'BTO FRANCATU', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '2032'),
(531, 7, 'BTO FRANGO CAIPIRA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 23.00, '2033'),
(532, 7, 'BTO FRANGO VENEZA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '2034'),
(533, 7, 'BTO FRANGO A MODA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '2035'),
(534, 7, 'BTO FRANGO BRASILEI', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '2036'),
(535, 7, 'BTO FRANGO MINEIRO', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '2037'),
(536, 7, 'BTO ABC', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 25.00, '2038'),
(537, 7, 'BTO AMERICANA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '2039'),
(538, 7, 'BTO ATUM II', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '2040'),
(539, 7, 'BTO LOMBO', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '2041'),
(540, 7, 'SICILIANA I ', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 23.00, '2042'),
(541, 7, 'BTO MUSSARELA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 18.00, '2043'),
(542, 7, 'BTO MUSSARELA II', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 19.00, '2044'),
(543, 7, 'BTO MARGHERITA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 19.00, '2045'),
(544, 7, 'BTO MILHO VERDE', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 20.00, '2046'),
(545, 7, 'BTO NAPOLITANA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '2047'),
(546, 7, 'BTO NAMORADOS I      ', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 23.00, '2048'),
(547, 7, 'BTO PERUANA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '2049'),
(548, 7, 'BTO PORTUGUESA I', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 23.00, '2050'),
(549, 7, 'BTO PORTUGUESA ESPE', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '2051'),
(550, 7, 'BTO PORTUGUESA LIGH', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 25.00, '2052'),
(551, 7, 'BTO PALMITO', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '2053'),
(552, 7, 'BTO PALMITO C CATUP', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '2054'),
(553, 7, 'BTO PIZZAIOLO I', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 23.00, '2055'),
(554, 7, 'BTO QUATRO QUEIJ I', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '2056'),
(555, 7, 'BTO QUATRO QUEIJ II', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '2057'),
(556, 7, 'BTO RALLYE', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 23.00, '2058'),
(557, 7, 'BTO CAPRICHOSA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '2059'),
(558, 7, 'BTO RUCULA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 23.00, '2060'),
(559, 7, 'BTO SANTO ANDRE', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 26.00, '2061'),
(560, 7, 'BTO SAO LUIZ', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '2062'),
(561, 7, 'BTO TOSCANA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '2063'),
(562, 7, 'BTO TROPICAL', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 23.00, '2064'),
(563, 7, 'BTO VEGETERIANA I', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 23.00, '2065'),
(564, 7, 'BTO CORINTHIANA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 23.00, '2066'),
(565, 7, 'BTO PALMEIRENSE', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 23.00, '2067'),
(566, 7, 'BTO SANTISTA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 23.00, '2068'),
(567, 7, 'BTO TRICOLOR', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 23.00, '2069'),
(568, 7, 'BTO CARIJOS', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '2070'),
(569, 12, 'BTO BANANA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 19.00, '2071'),
(570, 12, 'BTO BANANA COM CHOCOLATE', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 21.00, '2072'),
(571, 12, 'BTO ROMEU E JULIETA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 21.00, '2073'),
(572, 12, 'BTO BRIGADEIRO', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '2074'),
(573, 7, 'BTO CRISTAL', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '2075'),
(574, 7, 'BTO MINEIRA I', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '2076'),
(575, 7, 'BTO LOMBO II', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '2077'),
(576, 7, 'BTO MISTA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '2078'),
(577, 7, 'BTO TRES QUEIJOS', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 23.00, '2079'),
(578, 7, 'BTO PRIMAVERA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '2080'),
(579, 7, 'BTO BRASILEIRA I', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '2081'),
(580, 7, 'BTO JABA I', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '2082'),
(581, 7, 'BTO JABA II', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 25.00, '2083'),
(582, 7, 'BTO PIZZA DOG', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '2085'),
(583, 7, 'BTO ALEMA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '2086'),
(584, 7, 'BTO MDA DO CHEFE III', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 23.00, '2087'),
(585, 7, 'BTO BRASILEIRA II', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '2088'),
(586, 7, 'BTO CAIPIRA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '2089'),
(587, 7, 'BTO ROMANA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 23.00, '2090'),
(588, 7, 'BTO CARIOCA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '2091'),
(589, 7, 'BTO CAPRI', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '2092'),
(590, 7, 'BTO CROCANTE', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '2093'),
(591, 7, 'BTO DA SOGRA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '2094'),
(592, 7, 'BTO DONA HORTENCIA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '2095'),
(593, 7, 'BTO FACINANTE', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 25.00, '2096'),
(594, 7, 'BTO JABA III', '<b>JABA,CALABRESA MOIDA,MUSSA,PROVOLONE,BACON E CBL</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 26.00, '2097'),
(595, 7, 'BTO JABA IV', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 26.00, '2098'),
(596, 7, 'BTO MARGHERITA II', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '2099'),
(597, 7, 'BTO MILHO VERDE II', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 21.00, '2100'),
(598, 7, 'BTO MINEIRA II', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '2101'),
(599, 7, 'BTO NAMORADOS II', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '2102'),
(600, 7, 'BTO NATURAL', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 23.00, '2103'),
(601, 1, 'BTO PAULISTA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '2104'),
(602, 7, 'BTO PERU I', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '2105'),
(603, 7, 'BTO PERU II', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '2106'),
(604, 7, 'BOT PIZZAIOLO II', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '2107'),
(605, 7, 'BTO PROVOLONE', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '2108'),
(606, 7, 'BTO QUATRO ESTACOES', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 0.00, '2109'),
(607, 7, 'BTO SABOROSA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 23.00, '2110'),
(608, 7, 'BTO SALOMAO', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 23.00, '2111'),
(609, 7, 'BTO SICILIANA II', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '2112'),
(610, 7, 'BTO VEGETARIANA II', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 23.00, '2113'),
(611, 7, 'BTO VENUS', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 23.00, '2114'),
(612, 7, 'BTO VENEZA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 23.00, '2115'),
(613, 12, 'BTO PRESTIGIO', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 22.00, '2116'),
(614, 12, 'BTO SONHO DE VALSA', '<b></b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '2117'),
(615, 11, 'BTO PEPERONI', '<b>PEPERONE,CBL,MUSSA E RDLS DE TOMATE</b>', 'img-6941-6018-jpeg_1452020013.JPEG', NULL, 24.00, '2118'),
(616, 13, 'ESF CHOCOLATE', '<b></b>', 'esfiha-doce-jpg_1479553083.jpg', NULL, 4.90, '2200'),
(617, 13, 'ESF BANANA', '<b></b>', 'esfiha-doce-jpg_1479553083.jpg', NULL, 3.90, '2201'),
(618, 13, 'ESF ROMEU E JULIETA', '<b></b>', 'esfiha-doce-jpg_1479553083.jpg', NULL, 3.90, '2202'),
(619, 2, 'ESF DE CARNE', '<b></b>', 'esfiras-png_1463265819.png', NULL, 3.90, '2203'),
(620, 2, 'ESF DE CALABRESA', '<b></b>', 'esfiras-png_1463265819.png', NULL, 3.90, '2204'),
(621, 2, 'ESF DE QUEIJO', '<b></b>', 'esfiras-png_1463265819.png', NULL, 3.90, '2205'),
(622, 2, 'ESF DE CATUPIRY', '<b></b>', 'esfiras-png_1463265819.png', NULL, 3.90, '2206'),
(623, 2, 'ESF DE ATUM C CATUP', '<b></b>', 'esfiras-png_1463265819.png', NULL, 4.90, '2207'),
(624, 2, 'ESF FRANG C CATUPIR', '<b></b>', 'esfiras-png_1463265819.png', NULL, 4.90, '2208'),
(625, 2, 'ESF MILHO C CATUPIR', '<b></b>', 'esfiras-png_1463265819.png', NULL, 4.90, '2209'),
(626, 2, 'ESF PALMITO C CATUP', '<b></b>', 'esfiras-png_1463265819.png', NULL, 4.90, '2210'),
(627, 2, 'ESF QUEIJO C CATUPI', '<b></b>', 'esfiras-png_1463265819.png', NULL, 4.90, '2211'),
(628, 2, 'ESF CALABRESA C CATU', '<b></b>', 'esfiras-png_1463265819.png', NULL, 4.90, '2212'),
(629, 2, 'ESF BACON C QUEIJO', '<b></b>', 'esfiras-png_1463265819.png', NULL, 4.90, '2213'),
(630, 2, 'ESF PALMITO C QUEIJO', '<b></b>', 'esfiras-png_1463265819.png', NULL, 4.90, '2214'),
(631, 2, 'ESF CALABRES C QUEIJ', '<b></b>', 'esfiras-png_1463265819.png', NULL, 4.90, '2215'),
(632, 2, 'ESF ESCAROLA C QUEIJ', '<b></b>', 'esfiras-png_1463265819.png', NULL, 4.90, '2216'),
(633, 2, 'ESF MILHO C QUEIJO', '<b></b>', 'esfiras-png_1463265819.png', NULL, 4.90, '2217'),
(634, 2, 'ESF ATUM C QUEIJO', '<b></b>', 'esfiras-png_1463265819.png', NULL, 4.90, '2218'),
(635, 2, 'ESF QUEIJO C TOM SEC', '<b></b>', 'esfiras-png_1463265819.png', NULL, 4.90, '2219'),
(636, 13, 'ESF BANANA C CHOLAT', '<b></b>', 'esfiha-doce-jpg_1479553083.jpg', NULL, 4.90, '2221'),
(637, 2, 'ESF ATUM', '<b></b>', 'esfiras-png_1463265819.png', NULL, 3.90, '2222'),
(638, 2, 'ESF CARNE C QUEIJO', '<b></b>', 'esfiras-png_1463265819.png', NULL, 3.50, '2223'),
(639, 2, 'ESF FRANGO', '<b></b>', 'esfiras-png_1463265819.png', NULL, 3.90, '2224'),
(640, 2, 'ESF BAURU', '<b></b>', 'esfiras-png_1463265819.png', NULL, 4.90, '2260'),
(641, 1, 'BAIANA', '<b>CALABRESA MOIDA,OVOS,CEBOLA E PIMENTA</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'CALABRESA MOIDA,OVOS,CEBOLA E PIMENTA', 27.99, '24'),
(642, 1, 'SHOW BIS DUPLO', '<b>CHOCOLATE AO LEITE BIS BRANCO E PRETO</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'CHOCOLATE AO LEITE BIS BRANCO E PRETO', 27.99, '84'),
(643, 7, 'BROTO ALHO', '<b>MUSSARELA E ALHO</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'MUSSARELA E ALHO', 21.00, '119'),
(644, 7, 'BROTO AMERICANA', '<b>LOMBO MUSSARELA E RODELAS DE TOMATE</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'LOMBO MUSSARELA E RODELAS DE TOMATE', 22.00, '120'),
(645, 7, 'BROTO ATUM II', '<b>ATUM CHAMPION TOMATE E MUSSARELA</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'ATUM CHAMPION TOMATE E MUSSARELA', 25.00, '121'),
(646, 7, 'BROTO BACON', '<b>MUSSARELA CEBOLA E BACON</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'MUSSARELA CEBOLA E BACON', 22.00, '122'),
(647, 7, 'BROTO BAIACATU', '<b>CALABRESA MOIDA E CATUPIRY</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'CALABRESA MOIDA E CATUPIRY', 22.00, '123'),
(648, 7, 'BROTO BAIANA', '<b>CALABRESA MOIDA OVOS CEBOLA E PIMENTA</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'CALABRESA MOIDA OVOS CEBOLA E PIMENTA', 20.00, '124'),
(649, 7, 'BROTO BAND FM', '<b>PRESUNTO,PALMITO FRANGO MILHO E CATUPIRY</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'PRESUNTO,PALMITO FRANGO MILHO E CATUPIRY', 24.00, '125'),
(650, 7, 'BROTO BAURU', '<b>PRESUNTO MUSSARELA E RODELAS DE TOMATE</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'PRESUNTO MUSSARELA E RODELAS DE TOMATE', 22.00, '126'),
(651, 7, 'BROTO BOLONHESA', '<b>CARNE MOIDA, MUSSARELA E MAIS MOLHO</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'CARNE MOIDA, MUSSARELA E MAIS MOLHO', 22.00, '127'),
(652, 7, 'BROTO BROCOLIS', '<b>BROCOLIS MUSSARELA E BACON</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'BROCOLIS MUSSARELA E BACON', 23.00, '128'),
(653, 7, 'BROTO CAIPIRA', '<b>FRANGO MILHO E CATUPIRY</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'FRANGO MILHO E CATUPIRY', 22.00, '129'),
(654, 7, 'BROTO CALACATU', '<b>CALABRESA FATIADA E CATUPIRY</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'CALABRESA FATIADA E CATUPIRY', 22.00, '130'),
(655, 7, 'BROTO CAMARAO', '<b>CAMARAO AO MOLHO CEBOL E MUSSARELA</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'CAMARAO AO MOLHO CEBOL E MUSSARELA', 33.00, '131'),
(656, 7, 'BROTO CANADENSE', '<b>LOMBO CATUPIRY E CEBOLA</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'LOMBO CATUPIRY E CEBOLA', 23.00, '132'),
(657, 7, 'BROTO CATUPALHA', '<b>CATUPIRY E BATATA PALHA</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'CATUPIRY E BATATA PALHA', 21.00, '133'),
(658, 7, 'BROTO CATUPIRY', '<b>CATUPIRY</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'CATUPIRY', 21.00, '134'),
(659, 7, 'BROTO CHAMPION', '<b>CHAMPION MUSSARELA E BACON</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'CHAMPION MUSSARELA E BACON', 22.00, '135'),
(660, 7, 'BROTO ESCAROLA', '<b>ESCAROLA CEBOLA MUSSARELA E BACON</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'ESCAROLA CEBOLA MUSSARELA E BACON', 23.00, '136'),
(661, 7, 'BROTO ESCAROLA ESPECIAL', '<b>ESCAROLA PALMITO MUSSARELA E ALHO</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'ESCAROLA PALMITO MUSSARELA E ALHO', 24.00, '137'),
(662, 7, 'BROTO EXECUTIVA', '<b>FRANGO PROVOLONE PARMESAO E BACON</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'FRANGO PROVOLONE PARMESAO E BACON', 24.00, '138'),
(663, 7, 'BROTO FRANCESA', '<b>FRANGO MUSSARELA CATUPIRY E CHEDDAR</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'FRANGO MUSSARELA CATUPIRY E CHEDDAR', 24.00, '139'),
(664, 7, 'BROTO FRANGO VENEZA', '<b>FRANGO PALMITO MUSSARELA E CATUPIRY</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'FRANGO PALMITO MUSSARELA E CATUPIRY', 26.00, '140'),
(665, 7, 'BROTO FRANGO A MODA', '<b>FRANGO PRESUNTO MUSSARELA CEBOLA E BACON</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'FRANGO PRESUNTO MUSSARELA CEBOLA E BACON', 26.00, '141'),
(666, 7, 'BROTO HOT E DOG', '<b>SALSICHA PURE MILHO ERVILHA CHEDDAR E CATUPIRY</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'SALSICHA PURE MILHO ERVILHA CHEDDAR E CATUPIRY', 20.00, '142'),
(667, 7, 'BROTO ITALIANA', '<b>CALABRESA ERVILHA MILHO E MUSSARELA</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'CALABRESA ERVILHA MILHO E MUSSARELA', 23.00, '143'),
(668, 7, 'BROTO JABA ', '<b>JABA CATUPIRY E CEBOLA</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'JABA CATUPIRY E CEBOLA', 24.00, '144'),
(669, 7, 'BROTO II', '<b>JABA MUSSARELA CEBOLA E BACON</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'JABA MUSSARELA CEBOLA E BACON', 25.00, '145'),
(670, 7, 'BROTO JABA III', '<b>JABA MUSSA CALABRESA MOIDA CEBOLA PROVOLONE E BACON</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'JABA MUSSA CALABRESA MOIDA CEBOLA PROVOLONE E BACON', 27.00, '146'),
(671, 7, 'BROTO LOMBOCAN', '<b>LOMBO CATUPIRY E BACON</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'LOMBO CATUPIRY E BACON', 23.00, '147'),
(672, 7, 'BROTO LOMBO', '<b>LOMBO E CEBOLA</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'LOMBO E CEBOLA', 22.00, '148'),
(673, 7, 'BROTO LOMBO II', '<b>LOMBO PALMITO CEBOLA MUSSARELA E BACON</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'LOMBO PALMITO CEBOLA MUSSARELA E BACON', 25.00, '149'),
(674, 7, 'BROTO MARGUERITA', '<b>MUSSARELA MOLHO MANJERICAO E TOMATE</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'MUSSARELA MOLHO MANJERICAO E TOMATE', 22.00, '150'),
(675, 7, 'BROTO MOLHO I', '<b>MUSSARELA E MILHO</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'MUSSARELA E MILHO', 20.00, '151'),
(676, 7, 'BROTO MILHO II', '<b>CATUPIRY E MILHO</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'CATUPIRY E MILHO', 22.00, '152'),
(677, 7, 'BROTO NAMORADOS', '<b>PALMITO MUSSARELA E CATUPIRY</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'PALMITO MUSSARELA E CATUPIRY', 23.00, '153'),
(678, 7, 'BROTO NAMORADOS II', '<b>LOMBO PROVOLONE CATUPIRY TOMATE E BACON</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'LOMBO PROVOLONE CATUPIRY TOMATE E BACON', 25.00, '154'),
(679, 7, 'BROTO DE NAPOLITANA', '<b>MUSSARELA MOLHO DE TOMATE E PARMESAO</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'MUSSARELA MOLHO DE TOMATE E PARMESAO', 23.00, '155'),
(680, 7, 'BROTO ORQUIDEA', '<b>ESCAROLA PALMITO MILHO CEBOLA MUSSARELA E BACON</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'ESCAROLA PALMITO MILHO CEBOLA MUSSARELA E BACON', 24.00, '156'),
(681, 7, 'BROTO PALMITO', '<b>PALMITO MUSSARELA E BACON</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'PALMITO MUSSARELA E BACON', 23.00, '157'),
(682, 7, 'BROTO PARMEGIANA', '<b>LOMBO MUSSARELA E BACON</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'LOMBO MUSSARELA E BACON', 23.00, '158'),
(683, 7, 'BROTO PEITO DE PERU', '<b>PEITO DE PERU E MUSSARELA</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'PEITO DE PERU E MUSSARELA', 25.00, '159'),
(684, 7, 'BROTO PEPPERONI', '<b>PEPPERONI E MUSSARELA</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'PEPPERONI E MUSSARELA', 26.00, '160'),
(685, 7, 'BROTO PERUANA', '<b>ATUM PALMITO ERVILHA CEBOLA E MUSSARELA</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'ATUM PALMITO ERVILHA CEBOLA E MUSSARELA', 25.00, '161'),
(686, 7, 'BROTO PORTUGUESA LIGHT', '<b>PRESUNTO MUSSARELA PALMITO MILHO ERVILHA OVOS E CEBOLA</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'PRESUNTO MUSSARELA PALMITO MILHO ERVILHA OVOS E CEBOLA', 26.00, '162'),
(687, 7, 'BROTO PONEY CLUB', '<b>ATUM OVOS CEBOLA CAMARAO MUSSARELA E BACON</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'ATUM OVOS CEBOLA CAMARAO MUSSARELA E BACON', 30.00, '163'),
(688, 7, 'BROTO PROVOLONE', '<b>PROVOLONE E RODELAS DE TOMATE</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'PROVOLONE E RODELAS DE TOMATE', 22.00, '164'),
(689, 7, 'BROTO ROMANA', '<b>MUSSARELA E ALICHE</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'MUSSARELA E ALICHE', 22.00, '165'),
(690, 7, 'BROTO RUCULA', '<b>MUSSARELA RUCULA E TOMATE SECO</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'MUSSARELA RUCULA E TOMATE SECO', 23.00, '166'),
(691, 7, 'BROTO SALAME', '<b>SALAME E MUSSARELA</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'SALAME E MUSSARELA', 24.00, '167'),
(692, 7, 'BROTO TOSCANA', '<b>CALABRESA FATIADA CEBOLA E MUSSARELA</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'CALABRESA FATIADA CEBOLA E MUSSARELA', 22.00, '168'),
(693, 7, 'BROTO TROPICAL', '<b>ATUM MUSSARELA E MILHO</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'ATUM MUSSARELA E MILHO', 23.00, '169'),
(694, 7, 'BROTO TA LIGADO', '<b>FRANGO PALMITO CHAMPION CATUPIRY E BACON</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'FRANGO PALMITO CHAMPION CATUPIRY E BACON', 24.00, '170'),
(695, 7, 'BROTO TOP FIVE', '<b>FRANGO MUSSARELA CALABRESA PRESUNTO E CATUPIRY</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'FRANGO MUSSARELA CALABRESA PRESUNTO E CATUPIRY', 25.00, '171'),
(696, 7, 'BROTO VEGETARIANA', '<b>ESCAROLA ERVILHA PALMITO MILHO CEBOLA E ALHO</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'ESCAROLA ERVILHA PALMITO MILHO CEBOLA E ALHO', 24.00, '172'),
(697, 7, 'BROTO VENEZA', '<b>FRANGO BROCOLIS CHAMPIGNON E CATUPIRY</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'FRANGO BROCOLIS CHAMPIGNON E CATUPIRY', 24.00, '173'),
(698, 7, 'BROTO 2 QUEIJOS', '<b>MUSSARELA E CATUPIRY</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'MUSSARELA E CATUPIRY', 21.00, '174'),
(699, 7, 'BROTO 3 QUEIJOS', '<b>PARMESAO MUSSARELA E CATUPIRY</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'PARMESAO MUSSARELA E CATUPIRY', 23.00, '175'),
(700, 7, 'BROTO 4 QUEIJOS', '<b>MUSSARELA CATUPIRY PARMESAO PROVOLONE</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'MUSSARELA CATUPIRY PARMESAO PROVOLONE', 24.00, '176'),
(701, 7, 'BROTO BANANA', '<b>BANANA CANELA E LEITE CONDENSADO</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'BANANA CANELA E LEITE CONDENSADO', 19.00, '177'),
(702, 7, 'BROTO BRIGADEIRO', '<b>CHOCOLATE E CHOCOLATE GRANULADO</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'CHOCOLATE E CHOCOLATE GRANULADO', 22.00, '178'),
(703, 7, 'BROTO CHOCANA', '<b>CHOCOLATE E BANANA</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'CHOCOLATE E BANANA', 22.00, '179'),
(704, 7, 'BROTO CHOCOTINE', '<b>CHOCOLATE OVOMALTIME E CREME DE LEITE</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'CHOCOLATE OVOMALTIME E CREME DE LEITE', 22.00, '180'),
(705, 7, 'BROTO ROMEU E JULIETA', '<b>GOIABADA E MUSSARELA</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'GOIABADA E MUSSARELA', 22.00, '181'),
(706, 7, 'BROTO SHOW BIS', '<b>CHOCOLATE AO LEITE BIS PRETO</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'CHOCOLATE AO LEITE BIS PRETO', 22.00, '182'),
(707, 7, 'BROTO SHOW BIS II', '<b>CHOCOLATE AO LEITE E BIS BRANCO</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'CHOCOLATE AO LEITE E BIS BRANCO', 22.00, '183'),
(708, 7, 'BROTO SHOW BIS DUPLO', '<b>CHOCOLATE AO LEITE BIS PRETO E BRANCO</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'CHOCOLATE AO LEITE BIS PRETO E BRANCO', 23.00, '184'),
(709, 7, 'BROTO M&MS', '<b>CHOCOLATE COM M&MS</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'CHOCOLATE COM M&MS', 22.00, '185'),
(710, 7, 'BROTO PRESTIGIO', '<b>CHOCOLATE COM COCO RALADO</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'CHOCOLATE COM COCO RALADO', 22.00, '186'),
(711, 7, 'BROTO SENSACAO', '<b>CHOCOLATE COM MORANGO</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'CHOCOLATE COM MORANGO', 24.00, '187'),
(712, 7, 'BROTO AMOR DIVINO', '<b>CHOCOLATE AO LEITE COM OURO BRANCO</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'CHOCOLATE AO LEITE COM OURO BRANCO', 22.00, '188'),
(713, 1, 'BROTO DE SONHO DE VALSA', '<b>CHOCOLATE AO LEITE E SONHO DE VALSA</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'CHOCOLATE AO LEITE E SONHO DE VALSA', 22.00, '189'),
(714, 1, 'BROTO DE SUFLAIR', '<b>CHOCOLATE AO LEITE E SUFLAIR</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'CHOCOLATE AO LEITE E SUFLAIR', 22.00, '190'),
(715, 1, 'ACAI 220ML', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', '', 6.50, '225'),
(716, 4, 'ACAI DE 500ML', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', '', 11.00, '226'),
(717, 2, 'ESFIHA BAURU', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', '', 3.50, '314'),
(718, 2, 'ESFIHA 4 QUEIJO', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', '', 3.80, '318'),
(719, 2, 'ESFIHA BACON', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', '', 3.50, '319'),
(720, 2, 'ESFIHA CALABRESA COM CATUPIRY', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', '', 3.50, '320'),
(721, 2, 'ESFIHA ESCAROLA COM  CATUPIRY', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', '', 3.50, '321'),
(722, 2, 'ESFIHA FRANGO COM CATUPIRY', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', '', 3.50, '322'),
(723, 2, 'ESFIHA ATUM COM CATUPIRY', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', '', 3.50, '323'),
(724, 2, 'ESFIHA CHOCOLATE', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', '', 4.00, '324'),
(725, 2, 'ESFIHA CHOCOLATE BRANCO', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', '', 4.00, '325'),
(726, 2, 'ESFIHAS CHOCOLATE COM MORANGO', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', '', 4.00, '326'),
(727, 2, 'ESFIHA BANANA COM CHOCOLATE', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', '', 4.00, '327'),
(728, 2, 'ESFIHA PRESTIGIO', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', '', 4.00, '328'),
(729, 2, 'ESFIHA ROMEU E JULIETA', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', '', 4.00, '329'),
(730, 2, 'ESFIHA SONHO DE VALSA', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', '', 4.00, '330'),
(731, 2, 'ESFIHA CHOCOTINE', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', '', 4.00, '331'),
(732, 2, 'ESFIHA M&MS', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', '', 4.00, '332'),
(733, 2, 'ESFIHA SUFLAIR', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', '', 4.00, '333'),
(734, 2, 'ESFIHA AMOR DIVINO', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', '', 4.00, '334'),
(735, 2, 'ESFIHA SHOW BIS', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', '', 4.00, '335'),
(736, 2, 'ESFIHA BANANA', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', '', 4.00, '336'),
(737, 2, 'ESFIHA BRIGADEIRO', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', '', 4.00, '337'),
(738, 4, 'COMBO ESFIHAS 1', '<b>5CARNE,5 QUEIJO,5 CALABRESA,5 CATUPIRY</b>', 'logo-pizzaria-jpg_1462540961.jpg', '5CARNE,5 QUEIJO,5 CALABRESA,5 CATUPIRY', 42.00, '338'),
(739, 4, 'COMBO ESFIHAS 2', '<b>5 CARNE,5 QUEIJO,5 BAURU,5 ATUM</b>', 'logo-pizzaria-jpg_1462540961.jpg', '5 CARNE,5 QUEIJO,5 BAURU,5 ATUM', 45.00, '339'),
(740, 4, 'COMBO ESFIHAS 3', '<b>5CARNE,5QUEIJO,5 CALABRESA,5 PALMITO</b>', 'logo-pizzaria-jpg_1462540961.jpg', '5CARNE,5QUEIJO,5 CALABRESA,5 PALMITO', 44.00, '340'),
(741, 4, 'COMBO ESFIHAS 4', '<b>5 CARNE,5 QUEIJO,5 CALABRESA, 5 BAURU</b>', 'logo-pizzaria-jpg_1462540961.jpg', '5 CARNE,5 QUEIJO,5 CALABRESA, 5 BAURU', 46.00, '341'),
(742, 4, 'COMBO ESFIHAS 5', '<b>5CARNE,5 QUEIJO,5 CALABRESA,5 FRANGO C/CATUPIRY</b>', 'logo-pizzaria-jpg_1462540961.jpg', '5CARNE,5 QUEIJO,5 CALABRESA,5 FRANGO C/CATUPIRY', 45.00, '342'),
(743, 4, 'COMBO ESFIHAS 6', '<b>5 CARNE,5 CALABRESA,5 CATUPIRY,ESCAROLA C CATUPIRY</b>', 'logo-pizzaria-jpg_1462540961.jpg', '5 CARNE,5 CALABRESA,5 CATUPIRY,ESCAROLA C CATUPIRY', 46.00, '343'),
(744, 4, 'COMBO ESFIHAS 7', '<b>5 CARNE,5 QUEIJO,5CATUPIRY,5 ATUM</b>', 'logo-pizzaria-jpg_1462540961.jpg', '5 CARNE,5 QUEIJO,5CATUPIRY,5 ATUM', 45.00, '344'),
(745, 4, 'COMBO ESFIHAS 8', '<b>5 ATUM,5 ESCAROLA,5 FRANGO,5 PALMITO</b>', 'logo-pizzaria-jpg_1462540961.jpg', '5 ATUM,5 ESCAROLA,5 FRANGO,5 PALMITO', 47.00, '345'),
(746, 1, 'TAXA EXTRA 8*', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', '', 5.00, '505'),
(747, 1, 'TAXA REPRESA', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', '', 2.00, '506'),
(748, 15, 'DEL VALLE UVA 1 LT', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', '', 9.00, '508'),
(749, 1, 'ATUM', '<b>ATUM E CEBOLA</b>', 'logo-pizzaria-jpg_1462540961.jpg', 'ATUM E CEBOLA', 27.99, '1'),
(750, 1, 'SODEXO', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', '', 0.01, '3001'),
(751, 1, 'CIELLO', '<b></b>', 'logo-pizzaria-jpg_1462540961.jpg', '', 0.01, '3002');

-- --------------------------------------------------------

--
-- Estrutura para tabela `opcao`
--

CREATE TABLE `opcao` (
  `opcao_id` int(11) NOT NULL,
  `opcao_item` int(11) DEFAULT NULL,
  `opcao_nome` varchar(200) DEFAULT NULL,
  `opcao_desc` longtext,
  `opcao_preco` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `pagamento_id` int(11) NOT NULL,
  `pagamento_gw` varchar(200) DEFAULT 'SANDBOX',
  `pagamento_usuario` varchar(255) DEFAULT NULL,
  `pagamento_senha` varchar(255) DEFAULT NULL,
  `pagamento_retorno` longtext,
  `pagamento_status` int(11) DEFAULT '1' COMMENT '1 = ativado\n0 = desativado'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `pagamento`
--

INSERT INTO `pagamento` (`pagamento_id`, `pagamento_gw`, `pagamento_usuario`, `pagamento_senha`, `pagamento_retorno`, `pagamento_status`) VALUES
(1, 'SANDBOX', 'orlando.eal_@hotmail.com', '4F30D655DFD64FAA85DA33F663D0B7E9', 'fdsaa', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido`
--

CREATE TABLE `pedido` (
  `pedido_id` int(11) NOT NULL,
  `pedido_data` datetime DEFAULT NULL,
  `pedido_cliente` int(11) DEFAULT NULL,
  `pedido_local` int(11) UNSIGNED ZEROFILL DEFAULT NULL,
  `pedido_status` int(11) DEFAULT '1',
  `pedido_obs` text,
  `pedido_desconto` double(10,2) DEFAULT NULL,
  `pedido_total` double(10,2) DEFAULT NULL,
  `pedido_entrega` double(10,2) DEFAULT NULL,
  `pedido_entrega_prazo` varchar(200) DEFAULT NULL,
  `pedido_integrador` int(11) DEFAULT '0',
  `pedido_obs_pagto` varchar(200) DEFAULT NULL,
  `pedido_url_code` varchar(255) DEFAULT NULL,
  `pedido_pedidourl` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `pedido`
--

INSERT INTO `pedido` (`pedido_id`, `pedido_data`, `pedido_cliente`, `pedido_local`, `pedido_status`, `pedido_obs`, `pedido_desconto`, `pedido_total`, `pedido_entrega`, `pedido_entrega_prazo`, `pedido_integrador`, `pedido_obs_pagto`, `pedido_url_code`, `pedido_pedidourl`) VALUES
(3, '2017-12-12 13:16:17', 10, 00000000118, 4, '', NULL, 35.00, 2.35, '30-45 min,', 0, 'Pagamento Online', '96290FBC-EC9A-4ECE-9222-4CECE863BD4A', 'https://pagseguro.uol.com.br/v2/checkout/payment.html?code=96290FBC-EC9A-4ECE-9222-4CECE863BD4A');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido_lista`
--

CREATE TABLE `pedido_lista` (
  `lista_id` int(11) NOT NULL,
  `lista_pedido` int(11) DEFAULT NULL,
  `lista_item` int(11) DEFAULT NULL,
  `lista_item_nome` varchar(500) DEFAULT NULL,
  `lista_item_preco` double(10,2) DEFAULT NULL,
  `lista_opcao` int(11) DEFAULT NULL,
  `lista_opcao_preco` double(10,2) DEFAULT NULL,
  `lista_opcao_nome` varchar(200) DEFAULT NULL,
  `lista_info` varchar(500) DEFAULT NULL,
  `lista_qtde` int(3) DEFAULT NULL,
  `lista_item_desc` text,
  `lista_item_obs` text,
  `lista_item_codigo` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `pedido_lista`
--

INSERT INTO `pedido_lista` (`lista_id`, `lista_pedido`, `lista_item`, `lista_item_nome`, `lista_item_preco`, `lista_opcao`, `lista_opcao_preco`, `lista_opcao_nome`, `lista_info`, `lista_qtde`, `lista_item_desc`, `lista_item_obs`, `lista_item_codigo`) VALUES
(1, 1, 15, 'ATUM', NULL, 0, 35.00, '', NULL, 1, 'ATUM,E CEBOLA.', '', '1'),
(2, 2, 15, 'ATUM', NULL, 0, 35.00, '', NULL, 1, 'ATUM,E CEBOLA.', '', '1'),
(3, 3, 15, 'ATUM', NULL, 0, 35.00, '', NULL, 1, 'ATUM,E CEBOLA.', '', '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `smtp`
--

CREATE TABLE `smtp` (
  `smtp_id` int(11) NOT NULL,
  `smtp_host` varchar(200) DEFAULT NULL,
  `smtp_port` varchar(200) DEFAULT NULL,
  `smtp_email` varchar(200) DEFAULT NULL,
  `smtp_pass` varchar(200) DEFAULT NULL,
  `smtp_nome` varchar(200) DEFAULT NULL,
  `smtp_bcc` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `smtp`
--

INSERT INTO `smtp` (`smtp_id`, `smtp_host`, `smtp_port`, `smtp_email`, `smtp_pass`, `smtp_nome`, `smtp_bcc`) VALUES
(1, 'mail.clares.com.br', '587', 'abuse@clares.com.br', 'gadgfasdgs', 'Pizzaria PHPSTAFF', 'teste@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL,
  `usuario_nome` varchar(200) DEFAULT NULL,
  `usuario_login` varchar(200) DEFAULT NULL,
  `usuario_senha` varchar(200) DEFAULT NULL,
  `usuario_email` varchar(200) DEFAULT NULL,
  `usuario_fone` varchar(200) DEFAULT NULL,
  `usuario_nivel` int(1) DEFAULT NULL,
  `usuario_avatar` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `usuario_nome`, `usuario_login`, `usuario_senha`, `usuario_email`, `usuario_fone`, `usuario_nivel`, `usuario_avatar`) VALUES
(3, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'falecom@phpstaff.com.br', '', NULL, ''),
(4, 'orlando', 'orlando', '202cb962ac59075b964b07152d234b70', 'orlando@phpstaff.com.br', '', NULL, '');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cliente_id`);

--
-- Índices de tabela `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`config_id`);

--
-- Índices de tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`endereco_id`);

--
-- Índices de tabela `entrega`
--
ALTER TABLE `entrega`
  ADD PRIMARY KEY (`entrega_id`);

--
-- Índices de tabela `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`foto_id`),
  ADD KEY `fk_foto_chamado_idx` (`foto_chamado`);

--
-- Índices de tabela `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Índices de tabela `opcao`
--
ALTER TABLE `opcao`
  ADD PRIMARY KEY (`opcao_id`);

--
-- Índices de tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`pagamento_id`);

--
-- Índices de tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`pedido_id`);

--
-- Índices de tabela `pedido_lista`
--
ALTER TABLE `pedido_lista`
  ADD PRIMARY KEY (`lista_id`);

--
-- Índices de tabela `smtp`
--
ALTER TABLE `smtp`
  ADD PRIMARY KEY (`smtp_id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cliente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de tabela `config`
--
ALTER TABLE `config`
  MODIFY `config_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `endereco_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
--
-- AUTO_INCREMENT de tabela `entrega`
--
ALTER TABLE `entrega`
  MODIFY `entrega_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT de tabela `foto`
--
ALTER TABLE `foto`
  MODIFY `foto_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=755;
--
-- AUTO_INCREMENT de tabela `opcao`
--
ALTER TABLE `opcao`
  MODIFY `opcao_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `pagamento_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `pedido_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `pedido_lista`
--
ALTER TABLE `pedido_lista`
  MODIFY `lista_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `smtp`
--
ALTER TABLE `smtp`
  MODIFY `smtp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
