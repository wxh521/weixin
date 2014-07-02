--
-- Table structure for table `medicine`
--
DROP TABLE IF EXISTS `medicine`;
CREATE TABLE `medicine` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='中药表';

