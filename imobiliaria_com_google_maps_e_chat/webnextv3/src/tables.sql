
CREATE TABLE `categoria` (
  `categoria_id` int(11) NOT NULL auto_increment,
  `categoria_title` varchar(200) default NULL,
  `categoria_url` varchar(200) default NULL,
  PRIMARY KEY  (`categoria_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

-- 
-- Extraindo dados da tabela `categoria`
-- 

INSERT INTO `categoria` (`categoria_id`, `categoria_title`, `categoria_url`) VALUES 
(3, 'Poá', 'poa'),
(4, 'Ferraz de Vasconcelos', 'ferraz-de-vasconcelos'),
(5, 'Suzano', 'suzano'),
(6, 'Itaquaquecetuba', 'itaquaquecetuba'),
(9, 'São José', 'sao-jose'),
(10, 'Biritiba Mirim', 'biritiba-mirim'),
(11, 'Rio Grande', 'rio-grande');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `chatban`
-- 

CREATE TABLE `chatban` (
  `banid` int(11) NOT NULL auto_increment,
  `dtmcreated` datetime default '0000-00-00 00:00:00',
  `dtmtill` datetime default '0000-00-00 00:00:00',
  `address` varchar(255) default NULL,
  `comment` varchar(255) default NULL,
  `blockedCount` int(11) default '0',
  PRIMARY KEY  (`banid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `chatban`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `chatconfig`
-- 

CREATE TABLE `chatconfig` (
  `id` int(11) NOT NULL auto_increment,
  `vckey` varchar(255) default NULL,
  `vcvalue` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

-- 
-- Extraindo dados da tabela `chatconfig`
-- 

INSERT INTO `chatconfig` (`id`, `vckey`, `vcvalue`) VALUES 
(1, 'dbversion', '1.6.3'),
(2, 'featuresversion', '1.6.4'),
(3, 'title', 'Next Imóveis'),
(4, 'hosturl', 'http://127.0.0.1/webnextv2/'),
(5, 'logo', ''),
(6, 'usernamepattern', '{name}'),
(7, 'chatstyle', 'simplicity'),
(8, 'chattitle', 'Atendimento Online'),
(9, 'geolink', 'http://api.hostip.info/get_html.php?ip={ip}'),
(10, 'geolinkparams', 'width=440,height=100,toolbar=0,scrollbars=0,location=0,status=1,menubar=0,resizable=1'),
(11, 'max_uploaded_file_size', '100000'),
(12, 'max_connections_from_one_host', '10'),
(13, 'email', 'teste@clareslab.com.br'),
(14, 'left_messages_locale', 'en'),
(15, 'sendmessagekey', 'enter'),
(16, 'enableban', '0'),
(17, 'enablessl', '0'),
(18, 'forcessl', '0'),
(19, 'usercanchangename', '1'),
(20, 'enablegroups', '0'),
(21, 'enablestatistics', '1'),
(22, 'enablepresurvey', '1'),
(23, 'surveyaskmail', '0'),
(24, 'surveyaskgroup', '1'),
(25, 'surveyaskmessage', '0'),
(26, 'enablepopupnotification', '0'),
(27, 'showonlineoperators', '0'),
(28, 'enablecaptcha', '0'),
(29, 'online_timeout', '30'),
(30, 'updatefrequency_operator', '2'),
(31, 'updatefrequency_chat', '2'),
(32, 'updatefrequency_oldchat', '7');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `chatgroup`
-- 

CREATE TABLE `chatgroup` (
  `groupid` int(11) NOT NULL auto_increment,
  `vcemail` varchar(64) default NULL,
  `vclocalname` varchar(64) NOT NULL,
  `vccommonname` varchar(64) NOT NULL,
  `vclocaldescription` varchar(1024) NOT NULL,
  `vccommondescription` varchar(1024) NOT NULL,
  PRIMARY KEY  (`groupid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `chatgroup`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `chatgroupoperator`
-- 

CREATE TABLE `chatgroupoperator` (
  `groupid` int(11) NOT NULL,
  `operatorid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `chatgroupoperator`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `chatmessage`
-- 

CREATE TABLE `chatmessage` (
  `messageid` int(11) NOT NULL auto_increment,
  `threadid` int(11) NOT NULL,
  `ikind` int(11) NOT NULL,
  `agentId` int(11) NOT NULL default '0',
  `tmessage` text NOT NULL,
  `dtmcreated` datetime default '0000-00-00 00:00:00',
  `tname` varchar(64) default NULL,
  PRIMARY KEY  (`messageid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1230 ;

-- 
-- Extraindo dados da tabela `chatmessage`
-- 

INSERT INTO `chatmessage` (`messageid`, `threadid`, `ikind`, `agentId`, `tmessage`, `dtmcreated`, `tname`) VALUES 
(1218, 5, 3, 0, 'O visitante veio da página http://127.0.0.1/webnextv2/', '2013-04-20 01:55:16', NULL),
(1219, 5, 4, 0, 'Obrigado por nos contatar. Aguarde...', '2013-04-20 01:55:16', NULL),
(1220, 5, 1, 0, 'asdas', '2013-04-20 01:55:21', 'Visitante'),
(1221, 5, 1, 0, 'sadasdsad', '2013-04-20 01:55:37', 'Visitante'),
(1222, 5, 6, 0, 'O visitante mudou seu nome Visitante para rafae', '2013-04-20 01:55:42', NULL),
(1223, 5, 1, 0, 'asdasd', '2013-04-20 01:55:48', 'rafae'),
(1224, 5, 3, 0, 'Visitor navigated to http://127.0.0.1/webnextv2/', '2013-04-20 01:56:40', NULL),
(1225, 5, 3, 0, 'Visitor navigated to http://127.0.0.1/webnextv2/', '2013-04-20 01:56:44', NULL),
(1226, 5, 3, 0, 'Visitor navigated to http://127.0.0.1/webnextv2/', '2013-04-20 01:56:51', NULL),
(1227, 5, 3, 0, 'Visitor navigated to http://127.0.0.1/webnextv2/', '2013-04-20 01:56:54', NULL),
(1228, 6, 3, 0, 'O visitante veio da página http://127.0.0.1/webnextv2/', '2013-05-22 15:22:03', NULL),
(1229, 6, 4, 0, 'Obrigado por nos contatar. Aguarde...', '2013-05-22 15:22:03', NULL);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `chatoperator`
-- 

CREATE TABLE `chatoperator` (
  `operatorid` int(11) NOT NULL auto_increment,
  `vclogin` varchar(64) NOT NULL,
  `vcpassword` varchar(64) NOT NULL,
  `vclocalename` varchar(64) NOT NULL,
  `vccommonname` varchar(64) NOT NULL,
  `vcemail` varchar(64) default NULL,
  `dtmlastvisited` datetime default '0000-00-00 00:00:00',
  `istatus` int(11) default '0',
  `vcavatar` varchar(255) default NULL,
  `vcjabbername` varchar(255) default NULL,
  `iperm` int(11) default '65535',
  `dtmrestore` datetime default '0000-00-00 00:00:00',
  `vcrestoretoken` varchar(64) default NULL,
  PRIMARY KEY  (`operatorid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- 
-- Extraindo dados da tabela `chatoperator`
-- 

INSERT INTO `chatoperator` (`operatorid`, `vclogin`, `vcpassword`, `vclocalename`, `vccommonname`, `vcemail`, `dtmlastvisited`, `istatus`, `vcavatar`, `vcjabbername`, `iperm`, `dtmrestore`, `vcrestoretoken`) VALUES 
(1, 'admin', 'c3284d0f94606de1fd2af172aba15bf3', 'Admin', 'Admin', 'rafadinix@gmail.com', '2013-05-22 15:28:34', 0, '', '', 65535, '0000-00-00 00:00:00', NULL),
(8, 'luka', 'aaf1871328897892eafa8929d49aa364', 'Lucas Clares', 'Lucas Clares', 'lucas@clares.com.br', '0000-00-00 00:00:00', 0, NULL, NULL, 65520, '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `chatresponses`
-- 

CREATE TABLE `chatresponses` (
  `id` int(11) NOT NULL auto_increment,
  `locale` varchar(8) default NULL,
  `groupid` int(11) default NULL,
  `vcvalue` varchar(1024) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Extraindo dados da tabela `chatresponses`
-- 

INSERT INTO `chatresponses` (`id`, `locale`, `groupid`, `vcvalue`) VALUES 
(1, 'pt-br', NULL, 'Olá, como posso ajudá-lo?'),
(2, 'pt-br', NULL, 'Olá! Bem vindo ao nosso suporte. Como posso ajudá-lo?');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `chatrevision`
-- 

CREATE TABLE `chatrevision` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `chatrevision`
-- 

INSERT INTO `chatrevision` (`id`) VALUES 
(25);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `chatthread`
-- 

CREATE TABLE `chatthread` (
  `threadid` int(11) NOT NULL auto_increment,
  `userName` varchar(64) NOT NULL,
  `userid` varchar(255) default NULL,
  `agentName` varchar(64) default NULL,
  `agentId` int(11) NOT NULL default '0',
  `dtmcreated` datetime default '0000-00-00 00:00:00',
  `dtmmodified` datetime default '0000-00-00 00:00:00',
  `lrevision` int(11) NOT NULL default '0',
  `istate` int(11) NOT NULL default '0',
  `ltoken` int(11) NOT NULL,
  `remote` varchar(255) default NULL,
  `referer` text,
  `nextagent` int(11) NOT NULL default '0',
  `locale` varchar(8) default NULL,
  `lastpinguser` datetime default '0000-00-00 00:00:00',
  `lastpingagent` datetime default '0000-00-00 00:00:00',
  `userTyping` int(11) default '0',
  `agentTyping` int(11) default '0',
  `shownmessageid` int(11) NOT NULL default '0',
  `userAgent` varchar(255) default NULL,
  `messageCount` varchar(16) default NULL,
  `groupid` int(11) default NULL,
  PRIMARY KEY  (`threadid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- Extraindo dados da tabela `chatthread`
-- 

INSERT INTO `chatthread` (`threadid`, `userName`, `userid`, `agentName`, `agentId`, `dtmcreated`, `dtmmodified`, `lrevision`, `istate`, `ltoken`, `remote`, `referer`, `nextagent`, `locale`, `lastpinguser`, `lastpingagent`, `userTyping`, `agentTyping`, `shownmessageid`, `userAgent`, `messageCount`, `groupid`) VALUES 
(5, 'rafae', '1366432709.718681225585', NULL, 0, '2013-04-20 01:55:16', '2013-04-20 01:55:42', 23, 0, 29102339, '127.0.0.1', 'http://127.0.0.1/webnextv2/', 0, 'pt-br', '2013-04-20 01:56:02', '2013-04-20 01:55:42', 0, 0, 1220, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.64 Safari/537.31', NULL, NULL),
(6, 'Rafael Clares', '1366432709.718681225585', NULL, 0, '2013-05-22 15:22:03', '2013-05-22 15:22:03', 25, 0, 51708495, '127.0.0.1', 'http://127.0.0.1/webnextv2/', 0, 'pt-br', '2013-05-22 15:23:46', '0000-00-00 00:00:00', 0, 0, 0, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.93 Safari/537.36', NULL, NULL);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `cliente`
-- 

CREATE TABLE `cliente` (
  `cliente_id` int(11) NOT NULL auto_increment,
  `cliente_nome` varchar(200) default NULL,
  `cliente_creci` varchar(20) default NULL,
  `cliente_telefone3` varchar(20) default NULL,
  `cliente_rua` varchar(300) default NULL,
  `cliente_uf` varchar(2) default NULL,
  `cliente_num` varchar(20) default NULL,
  `cliente_complemento` varchar(2000) default NULL,
  `cliente_cidade` varchar(200) default NULL,
  `cliente_bairro` varchar(200) default NULL,
  `cliente_cep` varchar(20) default NULL,
  `cliente_telefone1` varchar(20) default NULL,
  `cliente_telefone2` varchar(20) default NULL,
  `cliente_lat` varchar(40) NOT NULL,
  `cliente_lon` varchar(40) NOT NULL,
  PRIMARY KEY  (`cliente_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Extraindo dados da tabela `cliente`
-- 

INSERT INTO `cliente` (`cliente_id`, `cliente_nome`, `cliente_creci`, `cliente_telefone3`, `cliente_rua`, `cliente_uf`, `cliente_num`, `cliente_complemento`, `cliente_cidade`, `cliente_bairro`, `cliente_cep`, `cliente_telefone1`, `cliente_telefone2`, `cliente_lat`, `cliente_lon`) VALUES 
(1, 'Rafael Clares Diniz', '3.5555', 'Nextel ID 8*555', 'Avenida Brasil', 'SP', '100', '', 'Praia Grande', 'Centro', '11701-090', '(11) 5555-5555', '(11) 9595-95955', '-23.9674904', '-46.3876674');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `config`
-- 

CREATE TABLE `config` (
  `config_id` int(11) NOT NULL auto_increment,
  `config_site_title` varchar(500) default NULL,
  `config_site_description` text,
  `config_site_keywords` text,
  `config_site_about` text,
  PRIMARY KEY  (`config_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Extraindo dados da tabela `config`
-- 

INSERT INTO `config` (`config_id`, `config_site_title`, `config_site_description`, `config_site_keywords`, `config_site_about`) VALUES 
(1, 'Next Imóveis', 'Encontre seu imóvel aqui.', 'imóveis, imobiliária, apartamentos, casas, sobrados, terrenos, fazendas', '<p style="text-align: justify;"></p>\r\n\r\n<p style="text-align: justify;">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>\r\n\r\n<span style=" text-align: start;">\r\n</span>');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `dono`
-- 

CREATE TABLE `dono` (
  `dono_id` int(11) NOT NULL auto_increment,
  `dono_nome` varchar(200) default NULL,
  `dono_creci` varchar(20) default NULL,
  `dono_telefone3` varchar(20) default NULL,
  `dono_rua` varchar(300) default NULL,
  `dono_uf` varchar(2) default NULL,
  `dono_num` varchar(20) default NULL,
  `dono_complemento` varchar(2000) default NULL,
  `dono_cidade` varchar(200) default NULL,
  `dono_bairro` varchar(200) default NULL,
  `dono_cep` varchar(20) default NULL,
  `dono_telefone1` varchar(20) default NULL,
  `dono_telefone2` varchar(20) default NULL,
  `dono_email` varchar(200) default NULL,
  `dono_user` int(11) NOT NULL,
  PRIMARY KEY  (`dono_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Extraindo dados da tabela `dono`
-- 

INSERT INTO `dono` (`dono_id`, `dono_nome`, `dono_creci`, `dono_telefone3`, `dono_rua`, `dono_uf`, `dono_num`, `dono_complemento`, `dono_cidade`, `dono_bairro`, `dono_cep`, `dono_telefone1`, `dono_telefone2`, `dono_email`, `dono_user`) VALUES 
(1, 'Imobiliária', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(2, 'Rafael Clares', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(11)4747-4545', NULL, NULL, 0),
(3, 'Demo', NULL, '55555', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11 4444-5555', '111 555555', 'demo@demeo', 7);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `foto`
-- 

CREATE TABLE `foto` (
  `foto_id` int(11) NOT NULL auto_increment,
  `foto_title` varchar(200) default NULL,
  `foto_url` varchar(200) default NULL,
  `foto_pos` int(11) default '0',
  `foto_item` int(11) default NULL,
  PRIMARY KEY  (`foto_id`),
  KEY `fk_foto_item` (`foto_item`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=232 ;

-- 
-- Extraindo dados da tabela `foto`
-- 

INSERT INTO `foto` (`foto_id`, `foto_title`, `foto_url`, `foto_pos`, `foto_item`) VALUES 
(161, NULL, '3dbad64fda8d60c2b4e9e4731e6ada1e.jpg', 1, 1),
(162, NULL, '00d2568baa0d85805aac05a12b2b04ca.jpg', 0, 1),
(163, NULL, '8170432e611843249455197b67e24ad4.jpg', 4, 1),
(164, NULL, '8cc230256df36f1240e4debfa702d27a.jpg', 2, 1),
(165, NULL, '7595faf9257596416dcacfc7959b88fd.jpg', 3, 1),
(166, NULL, 'fcb29351d82344cb5e77f76347b09661.jpg', 2, 2),
(167, NULL, '341d03695adb142e76f5e9ab9f19ffb4.jpg', 3, 2),
(168, NULL, '623465e8b9d097dca94de31f8231eabb.jpg', 4, 2),
(169, NULL, '7e1647bddfda35007ff493b793582981.jpg', 7, 2),
(170, NULL, 'b3340facdce75e29fd15b5cfa3f6aa74.jpg', 5, 2),
(171, NULL, '95838a2093a8475e9d2977e08b8bb1c2.jpg', 0, 2),
(173, NULL, '485694b935b4b45eb7a7801950bfa72a.jpg', 1, 2),
(174, NULL, '425f89190887b81ba938efeb094da492.jpg', 6, 2),
(177, NULL, '5ef5d3c9fae9ad428249303ebd1864b9.jpg', 5, 3),
(178, NULL, 'd6c10fd9f8ac7702d503f611fdf9851e.jpg', 4, 3),
(179, NULL, '56e6728281bca181f7376f3cccba5f2e.jpg', 3, 3),
(180, NULL, 'a6cb388d8b35156238e4977a622ba6e5.jpg', 2, 3),
(181, NULL, 'd424d80a7b285c53cf7219dd3a486a55.jpg', 0, 3),
(182, NULL, '6feceb11aa33e2b2ffb4640894ff6b7a.jpg', 6, 3),
(183, NULL, 'c9c8370ac17f157da3954df465d26817.jpg', 1, 3),
(191, NULL, '609134b89a73b9f9e96a509cc00f37aa.jpg', 2, 5),
(192, NULL, '3f9ff6ba705f7a66551f11f676762759.jpg', 0, 5),
(193, NULL, 'b7d1120db303ad2fdc11aaa04132f34a.jpg', 3, 5),
(194, NULL, 'e5fbf8dad68ff111baa7a524d0e47a87.jpg', 4, 5),
(195, NULL, 'eaf64d928ab992b2702070e5356fa0eb.jpg', 1, 5),
(196, NULL, 'ac94a92c3c4cb5517822d1454e9c6ea0.jpg', 5, 5),
(197, NULL, '7b7e50cd19f783880e0487d711f58f59.jpg', 4, 4),
(198, NULL, '477968888dacf62030ea659cdf0fbc07.jpg', 0, 4),
(199, NULL, 'f478656deed9cc2c3c2a1835794e6eb4.jpg', 1, 4),
(200, NULL, '09a7e695fe98dcd6533e6492f4d8ad46.jpg', 2, 4),
(201, NULL, 'a2609143e7b502c528b18c2b3e09ece6.jpg', 3, 4),
(202, NULL, 'e4643642dcf083fb54d13c1c38d6d8fa.jpg', 1, 6),
(203, NULL, '7423024362fdb384d68fa29bc08794e9.jpg', 0, 6),
(204, NULL, '3c22330167011fe6844f41d2a290b154.jpg', 3, 6),
(205, NULL, '9614ec633522ced80589b74688d2704c.jpg', 4, 6),
(206, NULL, '3a4252b2263cd6ecc52ca2d60bc3e250.jpg', 2, 6),
(207, NULL, 'c9c62f51105f3b86c1ace85c8965fb17.jpg', 0, 7),
(208, NULL, '29970011a72634d1855ef96e71d4b495.jpg', 0, 7),
(209, NULL, 'd3c1c8ce9641ef2b9716a5339c5b678d.jpg', 0, 7),
(210, NULL, '58f12a2c5494225d992a5eefaeb128d4.jpg', 0, 7),
(211, NULL, '0c625cfd3be5e9e5a86983a1b6bdf55d.jpg', 0, 7),
(217, NULL, 'a5c3733cd0d16400a981b24c7acdcd33.jpg', 0, 8),
(218, NULL, 'b31a3d755e69c3225a018c25732d2532.jpg', 2, 8),
(219, NULL, '3d05fa28a0d26c50502d732a9074ffe1.jpg', 3, 8),
(220, NULL, '4ca27c82447aaabbd2c37427d5413c2b.jpg', 4, 8),
(221, NULL, '56d205d3242dea399b948b6e7219c5d3.jpg', 1, 8),
(222, NULL, '214f2c8f1811ebc602631d126a5e3b09.jpg', 0, 9),
(223, NULL, '8d39b6f9b9f00adee90388eb5d9d4861.jpg', 0, 7),
(224, NULL, 'dd0cb22baa97fc1788d24ed425b5ca2d.jpg', 0, 7),
(225, NULL, '62d9fd225946a925203d5ab7bc5ccd57.jpg', 0, 7),
(226, NULL, '8d127d1b679436b4991705ba9e0ccc2a.jpg', 0, 7),
(227, NULL, '733a4cb64b5011517584bb2ffdb082a9.jpg', 0, 7),
(228, NULL, 'fdce4f3b91a5f5ac0d18df551d997e98.jpg', 0, 7),
(229, NULL, '2e685068c232edac959986ea80d4e214.jpg', 0, 7),
(230, NULL, '135fae25f4d8d20c38e7712e807fd109.jpg', 0, 7),
(231, NULL, '5fcd003479dea4dc8728fbf4c0fc5da1.jpg', 5, 4);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `item`
-- 

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL auto_increment,
  `item_ref` varchar(200) default NULL,
  `item_desc` text,
  `item_sub` int(11) default NULL,
  `item_preco` double default NULL,
  `item_url` varchar(300) default NULL,
  `item_show` int(11) default '0' COMMENT '1 = sim',
  `item_vendido` varchar(100) default '0' COMMENT '1 = vendido\r\n2 = alugado',
  `item_views` int(11) default '0',
  `item_categoria` int(11) default NULL,
  `item_area` int(11) default '0',
  `item_dorm` int(11) default '0',
  `item_wc` int(11) default '1',
  `item_suite` int(11) default '0',
  `item_vaga` int(11) default '0',
  `item_finalidade` int(11) default '1' COMMENT '1 = venda\r\n2 = locacao\r\n3 = ambos',
  `item_tipo` int(11) default '1' COMMENT '1 = casas',
  `item_destaque` int(11) default '0' COMMENT '1 = sim',
  `item_destaque_pos` int(11) default '0',
  `item_slide` int(11) default '0' COMMENT '1 = sim',
  `item_preco_locacao` double default NULL,
  `item_busca` varchar(500) default NULL,
  `item_preco_condominio` double default '0',
  `item_preco_iptu` double default '0',
  `item_endereco` varchar(300) default NULL,
  `item_mapa` int(11) default '1' COMMENT '2 sim',
  `item_dono` int(11) default '0',
  `item_user` int(11) default '1',
  `item_pos` int(11) NOT NULL default '0',
  `item_preco_temp` double(10,2) NOT NULL,
  `item_lat` varchar(40) NOT NULL,
  `item_lon` varchar(40) NOT NULL,
  PRIMARY KEY  (`item_id`),
  KEY `fk_item_sub` (`item_sub`),
  KEY `fk_item_tipo` (`item_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- 
-- Extraindo dados da tabela `item`
-- 

INSERT INTO `item` (`item_id`, `item_ref`, `item_desc`, `item_sub`, `item_preco`, `item_url`, `item_show`, `item_vendido`, `item_views`, `item_categoria`, `item_area`, `item_dorm`, `item_wc`, `item_suite`, `item_vaga`, `item_finalidade`, `item_tipo`, `item_destaque`, `item_destaque_pos`, `item_slide`, `item_preco_locacao`, `item_busca`, `item_preco_condominio`, `item_preco_iptu`, `item_endereco`, `item_mapa`, `item_dono`, `item_user`, `item_pos`, `item_preco_temp`, `item_lat`, `item_lon`) VALUES 
(1, 'CAS001', '<div style="text-align: justify;">Placeat, Nam aut iste vitae sequi ex et et et a adipisicing velit maxime recusandae. Veritatis magnam fugiat, do atque ratione sit, autem esse velit, aut in quis at cumque hic iure quos cupidatat ex possimus, dolor exercitationem in nihil rem labore consequuntur ut sint, neque ex accusamus qui est, consequatur, cupiditate aut aut ut dolore rerum praesentium esse, quis minus.</div>', 47, 150000, '123', 1, '0', 488, 5, 125, 4, 2, 2, 2, 3, 9, 1, 0, 0, 500, 'Casa Suzano Vila Figueira', 0, 0, '', 1, 2, 7, 4, 0.00, '-23.5525098', '-46.3085144'),
(2, 'SOB002', '<p style="text-align: justify;">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.<span rel="pastemarkerend" id="pastemarkerend35232"></span><br>\r\n</p>', 28, 130000, NULL, 1, '1', 46, 5, 525, 3, 2, 1, 1, 1, 3, 1, 0, 1, 0, 'Sobrado Suzano Jardim Imperador', 0, 0, '', 1, 0, 1, 5, 0.00, '-23.5357183', '-46.3198998'),
(3, 'APA003', 'Earum aut ad et proident, ut magni reiciendis molestiae et quibusdam totam dolorem nemo esse enim non dolor officiis et quam aliquid enim labore quae Nam incidunt, dolor modi deserunt est inventore et reprehenderit molestias fugiat non aute est quod minima vel mollitia qui error amet, rerum recusandae. Irure vel et eum aut exercitationem odit dolore tenetur nihil.', 1, 250000, NULL, 1, '0', 44, 3, 400, 2, 1, 0, 2, 1, 8, 1, 0, 1, 0, 'Apartamento Poá Centro', 0, 0, '', 1, 0, 1, 6, 0.00, '-23.5215025', '-46.3420789'),
(4, 'APA004', 'Velit, assumenda delectus, cupidatat reprehenderit saepe aliquam hic aut sint, adipisci dolore error dolorem quam dolor voluptatem, harum et ut temporibus eius veniam, non fugit, lorem iusto explicabo. Necessitatibus aliquip dicta ut laborum. Consequuntur ullamco iste ut nemo vero odio recusandae. Obcaecati et.', 29, 127000, NULL, 1, '0', 91, 6, 60, 2, 1, 0, 1, 1, 8, 1, 0, 1, 0, 'Apartamento Itaquaquecetuba Jardim Luciana', 0, 0, '', 1, 0, 1, 7, 0.00, '-23.4991776', '-46.3546715'),
(5, 'SOB005', '<p>Ut at labore quo commodi beatae voluptatum ut at possimus, sequi dolor doloribus mollitia ut ex voluptatem, fuga. Voluptatibus et repudiandae voluptas sed eveniet, nulla Nam aliqua. Earum esse, et quia quaerat incidunt, delectus, dolorem anim ut optio, autem doloremque et cillum eos, ut sed magni et vel.<br>\r\nEsse Imóvel não está à venda, as fotos meramente ilustrativas.</p>', 32, 0, NULL, 1, '0', 248, 5, 400, 3, 2, 1, 2, 1, 3, 1, 0, 1, 1600, 'Sobrado Suzano Vila Maluf', 0, 57, '', 1, 0, 1, 3, 0.00, '-23.5254878', '-46.3025232'),
(6, 'SOB006', '<p><div style="text-align: justify;">Ut at labore quo commodi beatae voluptatum ut at possimus, sequi dolor doloribus mollitia ut ex voluptatem, fuga. Voluptatibus et repudiandae voluptas sed eveniet, nulla Nam aliqua. Earum esse, et quia quaerat incidunt, delectus, dolorem anim ut optio, autem doloremque et cillum eos, ut sed magni et vel.<br>\r\nEsse Imóvel não está à venda, as fotos meramente ilustrativas.</div>\r\n</p>', 25, 250000, NULL, 1, '0', 105, 5, 300, 3, 2, 1, 2, 1, 3, 1, 0, 1, 0, 'Sobrado Suzano Centro', 0, 110, 'Benjamin Constant, 500', 2, 0, 1, 2, 0.00, '-23.5385287', '-46.3108648'),
(7, 'CAS007', '<p><div style="text-align: justify;">Ut at labore quo commodi beatae voluptatum ut at possimus, sequi dolor doloribus mollitia ut ex voluptatem, fuga. Voluptatibus et repudiandae voluptas sed eveniet, nulla Nam aliqua. Earum esse, et quia quaerat incidunt, delectus, dolorem anim ut optio, autem doloremque et cillum eos, ut sed magni et vel.<br>\r\nEsse Imóvel não está à venda, as fotos meramente ilustrativas.</div>\r\n</p>', 3, 175000, NULL, 1, '0', 175, 3, 250, 2, 1, 0, 2, 1, 16, 1, 0, 1, 0, 'Casa em Condomínio Poá Jardim Medina', 250, 80, '', 2, 0, 1, 1, 0.00, '-23.5144803', '-46.3474754'),
(8, 'SOB008', '<p><div style="text-align: justify;">Ut at labore quo commodi beatae voluptatum ut at possimus, sequi dolor doloribus mollitia ut ex voluptatem, fuga. Voluptatibus et repudiandae voluptas sed eveniet, nulla Nam aliqua. Earum esse, et quia quaerat incidunt, delectus, dolorem anim ut optio, autem doloremque et cillum eos, ut sed magni et vel.<br>\r\nEsse Imóvel não está à venda, as fotos meramente ilustrativas.</div>\r\n</p>', 25, 275000, NULL, 1, '3', 101, 5, 420, 2, 2, 2, 2, 1, 3, 1, 0, 0, 0, 'Sobrado Suzano Centro', 200, 90, 'Rua Benjamin Constant, 1500', 2, 2, 1, 8, 0.00, '-23.5468178', '-46.3141639'),
(9, 'APA009', '', 50, 200000, NULL, 1, '4', 50, 10, 0, 1, 1, 1, 1, 4, 8, 1, 0, 1, 2000, 'Apartamento Biritiba Mirim Vertentes do Biritiba', 0, 0, '', 1, 2, 1, 0, 200.00, '-23.5738391', '-46.038513');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `smtp`
-- 

CREATE TABLE `smtp` (
  `smtp_id` int(11) NOT NULL auto_increment,
  `smtp_host` varchar(200) default NULL,
  `smtp_username` varchar(100) default NULL,
  `smtp_password` varchar(100) default NULL,
  `smtp_fromname` varchar(200) default NULL,
  `smtp_bcc` varchar(100) default NULL,
  `smtp_replyto` varchar(100) default NULL,
  `smtp_port` int(11) default NULL,
  PRIMARY KEY  (`smtp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Extraindo dados da tabela `smtp`
-- 

INSERT INTO `smtp` (`smtp_id`, `smtp_host`, `smtp_username`, `smtp_password`, `smtp_fromname`, `smtp_bcc`, `smtp_replyto`, `smtp_port`) VALUES 
(1, 'mail.seusite.com.br', 'teste@seusite.com.br', '', 'Next Imóveis', 'outroemail@gmail.com', 'outroemail@gmail.com', 587);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `sub`
-- 

CREATE TABLE `sub` (
  `sub_id` int(11) NOT NULL auto_increment,
  `sub_title` varchar(200) default NULL,
  `sub_url` varchar(200) default NULL,
  `sub_categoria` int(11) default NULL,
  PRIMARY KEY  (`sub_id`),
  KEY `fk_sub_categoria` (`sub_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

-- 
-- Extraindo dados da tabela `sub`
-- 

INSERT INTO `sub` (`sub_id`, `sub_title`, `sub_url`, `sub_categoria`) VALUES 
(1, 'Centro', 'centro', 3),
(2, 'Jardim São José', 'jardim-sao-jose', 4),
(3, 'Jardim Medina', 'jardim-medina', 3),
(4, 'Perracine', 'perracine', 3),
(5, 'Vila de Mauro', 'vila-de-mauro', 3),
(6, 'Calmon Viana', 'calmon-viana', 3),
(7, 'Vila Monteiro', 'vila-monteiro', 3),
(8, 'Fonte', 'fonte', 3),
(9, 'Bela Vista', 'bela-vista', 3),
(10, 'Jd. Ana Maria', 'jd-ana-maria', 3),
(11, 'Jd. Santa Helena', 'jd-santa-helena', 3),
(12, 'Cambiri', 'cambiri', 3),
(14, 'Vila Lucia', 'vila-lucia', 3),
(15, 'Jardim Ivonete', 'jardim-ivonete', 3),
(16, 'Bairro Santa Rita', 'bairro-santa-rita', 6),
(18, 'Kemel', 'kemel', 3),
(20, 'Jardim Obelisco', 'jardim-obelisco', 3),
(21, 'Jardim Picosse', 'jardim-picosse', 3),
(23, 'Tereza Palma', 'tereza-palma', 3),
(24, 'Vila Varela', 'vila-varela', 3),
(25, 'Centro', 'centro', 5),
(27, 'Calmon vianna', 'calmon-vianna', 5),
(28, 'Jardim Imperador', 'jardim-imperador', 5),
(29, 'Jardim Luciana', 'jardim-luciana', 6),
(30, 'Bela Vista', 'bela-vista', 6),
(32, 'Vila Maluf', 'vila-maluf', 5),
(33, 'Vila Adda', 'vila-adda', 3),
(34, 'JD América', 'jd-america', 3),
(35, 'Vila Àurea', 'vila-aurea', 3),
(36, 'Vila perréli', 'vila-perreli', 3),
(38, 'Jd Nova América', 'jd-nova-america', 5),
(39, 'Nova Poá', 'nova-poa', 3),
(42, 'Vila Júlia', 'vila-julia', 3),
(43, 'Vila Figueiredo', 'vila-figueiredo', 5),
(44, 'Santa Filomena', 'santa-filomena', 3),
(45, 'Vila Odete', 'vila-odete', 3),
(46, 'Jardim Bela Vista', 'jardim-bela-vista', 3),
(47, 'Vila Figueira', 'vila-figueira', 5),
(48, 'Aracaré', 'aracare', 3),
(50, 'Vertentes do Biritiba', 'vertentes-do-biritiba', 10),
(51, 'Centro', 'centro', 11);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `tipo`
-- 

CREATE TABLE `tipo` (
  `tipo_id` int(11) NOT NULL auto_increment,
  `tipo_title` varchar(100) default NULL,
  `tipo_url` varchar(200) default NULL,
  PRIMARY KEY  (`tipo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

-- 
-- Extraindo dados da tabela `tipo`
-- 

INSERT INTO `tipo` (`tipo_id`, `tipo_title`, `tipo_url`) VALUES 
(1, 'Galpão', 'galpao'),
(2, 'Terreno', 'terreno'),
(3, 'Sobrado', 'sobrado'),
(4, 'Sala Comercial', 'sala-comercial'),
(5, 'Chácara', 'chacara'),
(6, 'Sítio', 'sitio'),
(7, 'Fazenda', 'fazenda'),
(8, 'Apartamento', 'apartamento'),
(9, 'Casa', 'casa'),
(10, 'Comercial', 'comercial'),
(11, 'Lote', 'lote'),
(13, 'Área', 'area'),
(14, 'Lançamento', 'lancamento'),
(15, 'Casa + Salão Comercial', 'casa-salao-comercial'),
(16, 'Casa em Condomínio', 'casa-em-condominio'),
(17, 'Flat', 'flat'),
(18, 'Loja', 'loja'),
(19, 'Indústria', 'industria'),
(20, 'Hotel', 'hotel'),
(21, 'Prédio', 'predio'),
(22, 'Ilha', 'ilha'),
(23, 'Prontos para Morar', 'prontos-para-morar'),
(24, 'Breves Lançamentos', 'breves-lancamentos');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `user`
-- 

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL auto_increment,
  `user_login` varchar(20) default NULL,
  `user_password` varchar(100) default NULL,
  `user_email` varchar(100) default NULL,
  `user_name` varchar(200) default NULL,
  `user_level` int(11) default '2' COMMENT '2 = corretor',
  `user_fone1` varchar(20) default NULL,
  `user_fone2` varchar(20) default NULL,
  `user_creci` varchar(20) default NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- 
-- Extraindo dados da tabela `user`
-- 

INSERT INTO `user` (`user_id`, `user_login`, `user_password`, `user_email`, `user_name`, `user_level`, `user_fone1`, `user_fone2`, `user_creci`) VALUES 
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'rafadinix@gmail.com', 'Admin', 1, NULL, NULL, NULL),
(7, 'luka', 'd81b9ce93c866abb7f0feb747d88868c', 'lucas@clares.com.br', 'Lucas Clares', 2, NULL, NULL, NULL);

-- 
-- Restrições para as tabelas dumpadas
-- 

-- 
-- Restrições para a tabela `foto`
-- 
ALTER TABLE `foto`
  ADD CONSTRAINT `fk_foto_item` FOREIGN KEY (`foto_item`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- 
-- Restrições para a tabela `item`
-- 
ALTER TABLE `item`
  ADD CONSTRAINT `fk_item_sub` FOREIGN KEY (`item_sub`) REFERENCES `sub` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_item_tipo` FOREIGN KEY (`item_tipo`) REFERENCES `tipo` (`tipo_id`) ON DELETE CASCADE ON UPDATE CASCADE;

