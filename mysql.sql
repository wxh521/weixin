--
-- Table structure for table `medicine`
--
DROP TABLE IF EXISTS `medicine`;
CREATE TABLE `medicine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '中药名',
  `pinyin` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '名称拼音',
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '别名',
  `ename` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '英文名',
  `origin` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '来源',
  `shape` text COLLATE utf8_unicode_ci NOT NULL COMMENT '植物形态',
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '产地分布',
  `process` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '采收加工',
  `properties` text COLLATE utf8_unicode_ci NOT NULL COMMENT '药材性状',
  `belong` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '性味归经',
  `effect` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '功效与作用',
  `apply` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '临床应用',
  `ingredient` text COLLATE utf8_unicode_ci NOT NULL COMMENT '主要成分',
  `forbidden` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '使用禁忌',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '图片',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='中药表';

--
-- Table structure for table `helper`
--
DROP TABLE IF EXISTS `helper`;
CREATE TABLE `helper` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '助手名称',
  `description` text COLLATE utf8_unicode_ci NOT NULL COMMENT '助手简介',
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '助手url',
  `status` enum('1','0') NOT NULL COMMENT '助手状态, 0:停用，1:启用',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='助手功能列表';

--
-- Table structure for table `game`
--
DROP TABLE IF EXISTS `game`;
CREATE TABLE `game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '游戏名称',
  `platform` enum('1','2','3') NOT NULL COMMENT '游戏适用平台, 1:适用手机，2:适用PC，3:全平台',
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '游戏url',
  `status` enum('1','0') NOT NULL COMMENT '游戏状态, 0:停用，1:启用',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='游戏列表';