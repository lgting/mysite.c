-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 �?06 �?25 �?02:19
-- 服务器版本: 5.5.53
-- PHP 版本: 5.6.27

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `mysite`
--

-- --------------------------------------------------------

--
-- 表的结构 `admini_root`
--

CREATE TABLE IF NOT EXISTS `admini_root` (
  `idadmini_root` int(11) NOT NULL AUTO_INCREMENT,
  `mailAddress` varchar(100) DEFAULT NULL,
  `passw` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`idadmini_root`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `admini_root`
--

INSERT INTO `admini_root` (`idadmini_root`, `mailAddress`, `passw`) VALUES
(1, '896995920@qq.com', '$2y$10$EqaNDG8ysVmAUra.dW8DXOcNuxmu5bSV/oCZPUYfrtopCsGFtnTt6');

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `idarticle` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `sketch` varchar(600) NOT NULL,
  `content` longtext,
  `article_category` int(40) DEFAULT NULL,
  `c_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `views_num` int(11) DEFAULT NULL COMMENT '浏览数，每读取一次数据库加载加一次',
  PRIMARY KEY (`idarticle`),
  KEY `article_category` (`article_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='文章' AUTO_INCREMENT=57 ;

--
-- 转存表中的数据 `article`
--

INSERT INTO `article` (`idarticle`, `title`, `sketch`, `content`, `article_category`, `c_time`, `views_num`) VALUES
(53, 'test', 'sdfsdfsd', '<table style="border:0px;width:934px;margin:1em auto;color:#222222;font-family:sans-serif;background-color:#FFFFFF;">\r\n	<tbody>\r\n		<tr class="h">\r\n			<td style="border:1px solid #666666;vertical-align:baseline;">\r\n				<a href="http://www.php.net/"><img border="0" src="data:image/png;base64,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" alt="PHP logo" /></a>\r\n				<h1 class="p" style="font-size:18px;">\r\n					PHP Version 5.6.27\r\n				</h1>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<table style="border:0px;width:934px;margin:1em auto;color:#222222;font-family:sans-serif;background-color:#FFFFFF;">\r\n	<tbody>\r\n		<tr>\r\n			<td class="e" style="border:1px solid #666666;vertical-align:baseline;background-color:#CCCCFF;font-weight:bold;">\r\n				System\r\n			</td>\r\n			<td class="v" style="border:1px solid #666666;vertical-align:baseline;background-color:#DDDDDD;">\r\n				Windows NT GUIYI-PC 6.1 build 7601 (Windows 7 Enterprise Edition Service Pack 1) i586\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td class="e" style="border:1px solid #666666;vertical-align:baseline;background-color:#CCCCFF;font-weight:bold;">\r\n				Build Date\r\n			</td>\r\n			<td class="v" style="border:1px solid #666666;vertical-align:baseline;background-color:#DDDDDD;">\r\n				Oct 14 2016 10:15:39\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td class="e" style="border:1px solid #666666;vertical-align:baseline;background-color:#CCCCFF;font-weight:bold;">\r\n				Compiler\r\n			</td>\r\n			<td class="v" style="border:1px solid #666666;vertical-align:baseline;background-color:#DDDDDD;">\r\n				MSVC11 (Visual C++ 2012)\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td class="e" style="border:1px solid #666666;vertical-align:baseline;background-color:#CCCCFF;font-weight:bold;">\r\n				Architecture\r\n			</td>\r\n			<td class="v" style="border:1px solid #666666;vertical-align:baseline;background-color:#DDDDDD;">\r\n				x86\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td class="e" style="border:1px solid #666666;vertical-align:baseline;background-color:#CCCCFF;font-weight:bold;">\r\n				Configure Command\r\n			</td>\r\n			<td class="v" style="border:1px solid #666666;vertical-align:baseline;background-color:#DDDDDD;">\r\n				cscript /nologo configure.js "--enable-snapshot-build" "--enable-debug-pack" "--disable-zts" "--disable-isapi" "--disable-nsapi" "--without-mssql" "--without-pdo-mssql" "--without-pi3web" "--with-pdo-oci=c:php-sdkoraclex86instantclient_12_1sdk,shared" "--with-oci8-12c=c:php-sdkoraclex86instantclient_12_1sdk,shared" "--with-enchant=shared" "--enable-object-out-dir=../obj/" "--enable-com-dotnet=shared" "--with-mcrypt=static" "--without-analyzer" "--with-pgo"\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td class="e" style="border:1px solid #666666;vertical-align:baseline;background-color:#CCCCFF;font-weight:bold;">\r\n				Server API\r\n			</td>\r\n			<td class="v" style="border:1px solid #666666;vertical-align:baseline;background-color:#DDDDDD;">\r\n				CGI/FastCGI\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td class="e" style="border:1px solid #666666;vertical-align:baseline;background-color:#CCCCFF;font-weight:bold;">\r\n				Virtual Directory Support\r\n			</td>\r\n			<td class="v" style="border:1px solid #666666;vertical-align:baseline;background-color:#DDDDDD;">\r\n				disabled\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td class="e" style="border:1px solid #666666;vertical-align:baseline;background-color:#CCCCFF;font-weight:bold;">\r\n				Configuration File (php.ini) Path\r\n			</td>\r\n			<td class="v" style="border:1px solid #666666;vertical-align:baseline;background-color:#DDDDDD;">\r\n				C:Windows\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td class="e" style="border:1px solid #666666;vertical-align:baseline;background-color:#CCCCFF;font-weight:bold;">\r\n				Loaded Configuration File\r\n			</td>\r\n			<td class="v" style="border:1px solid #666666;vertical-align:baseline;background-color:#DDDDDD;">\r\n				D:phpStudyphpphp-5.6.27-ntsphp.ini\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td class="e" style="border:1px solid #666666;vertical-align:baseline;background-color:#CCCCFF;font-weight:bold;">\r\n				Scan this dir for additional .ini files\r\n			</td>\r\n			<td class="v" style="border:1px solid #666666;vertical-align:baseline;background-color:#DDDDDD;">\r\n				(none)\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td class="e" style="border:1px solid #666666;vertical-align:baseline;background-color:#CCCCFF;font-weight:bold;">\r\n				Additional .ini files parsed\r\n			</td>\r\n			<td class="v" style="border:1px solid #666666;vertical-align:baseline;background-color:#DDDDDD;">\r\n				(none)\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td class="e" style="border:1px solid #666666;vertical-align:baseline;background-color:#CCCCFF;font-weight:bold;">\r\n				PHP API\r\n			</td>\r\n			<td class="v" style="border:1px solid #666666;vertical-align:baseline;background-color:#DDDDDD;">\r\n				20131106\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td class="e" style="border:1px solid #666666;vertical-align:baseline;background-color:#CCCCFF;font-weight:bold;">\r\n				PHP Extension\r\n			</td>\r\n			<td class="v" style="border:1px solid #666666;vertical-align:baseline;background-color:#DDDDDD;">\r\n				20131226\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td class="e" style="border:1px solid #666666;vertical-align:baseline;background-color:#CCCCFF;font-weight:bold;">\r\n				Zend Extension\r\n			</td>\r\n			<td class="v" style="border:1px solid #666666;vertical-align:baseline;background-color:#DDDDDD;">\r\n				220131226\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td class="e" style="border:1px solid #666666;vertical-align:baseline;background-color:#CCCCFF;font-weight:bold;">\r\n				Zend Extension Build\r\n			</td>\r\n			<td class="v" style="border:1px solid #666666;vertical-align:baseline;background-color:#DDDDDD;">\r\n				API220131226,NTS,VC11\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td class="e" style="border:1px solid #666666;vertical-align:baseline;background-color:#CCCCFF;font-weight:bold;">\r\n				PHP Extension Build\r\n			</td>\r\n			<td class="v" style="border:1px solid #666666;vertical-align:baseline;background-color:#DDDDDD;">\r\n				API20131226,NTS,VC11\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td class="e" style="border:1px solid #666666;vertical-align:baseline;background-color:#CCCCFF;font-weight:bold;">\r\n				Debug Build\r\n			</td>\r\n			<td class="v" style="border:1px solid #666666;vertical-align:baseline;background-color:#DDDDDD;">\r\n				no\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td class="e" style="border:1px solid #666666;vertical-align:baseline;background-color:#CCCCFF;font-weight:bold;">\r\n				Thread Safety\r\n			</td>\r\n			<td class="v" style="border:1px solid #666666;vertical-align:baseline;background-color:#DDDDDD;">\r\n				disabled\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td class="e" style="border:1px solid #666666;vertical-align:baseline;background-color:#CCCCFF;font-weight:bold;">\r\n				Zend Signal Handling\r\n			</td>\r\n			<td class="v" style="border:1px solid #666666;vertical-align:baseline;background-color:#DDDDDD;">\r\n				disabled\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td class="e" style="border:1px solid #666666;vertical-align:baseline;background-color:#CCCCFF;font-weight:bold;">\r\n				Zend Memory Manager\r\n			</td>\r\n			<td class="v" style="border:1px solid #666666;vertical-align:baseline;background-color:#DDDDDD;">\r\n				enabled\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td class="e" style="border:1px solid #666666;vertical-align:baseline;background-color:#CCCCFF;font-weight:bold;">\r\n				Zend Multibyte Support\r\n			</td>\r\n			<td class="v" style="border:1px solid #666666;vertical-align:baseline;background-color:#DDDDDD;">\r\n				provided by mbstring\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td class="e" style="border:1px solid #666666;vertical-align:baseline;background-color:#CCCCFF;font-weight:bold;">\r\n				IPv6 Support\r\n			</td>\r\n			<td class="v" style="border:1px solid #666666;vertical-align:baseline;background-color:#DDDDDD;">\r\n				enabled\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td class="e" style="border:1px solid #666666;vertical-align:baseline;background-color:#CCCCFF;font-weight:bold;">\r\n				DTrace Support\r\n			</td>\r\n			<td class="v" style="border:1px solid #666666;vertical-align:baseline;background-color:#DDDDDD;">\r\n				disabled\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td class="e" style="border:1px solid #666666;vertical-align:baseline;background-color:#CCCCFF;font-weight:bold;">\r\n				Registered PHP Streams\r\n			</td>\r\n			<td class="v" style="border:1px solid #666666;vertical-align:baseline;background-color:#DDDDDD;">\r\n				php, file, glob, data, http, ftp, zip, compress.zlib, compress.bzip2, phar\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td class="e" style="border:1px solid #666666;vertical-align:baseline;background-color:#CCCCFF;font-weight:bold;">\r\n				Registered Stream Socket Transports\r\n			</td>\r\n			<td class="v" style="border:1px solid #666666;vertical-align:baseline;background-color:#DDDDDD;">\r\n				tcp, udp\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td class="e" style="border:1px solid #666666;vertical-align:baseline;background-color:#CCCCFF;font-weight:bold;">\r\n				Registered Stream Filters\r\n			</td>\r\n			<td class="v" style="border:1px solid #666666;vertical-align:baseline;background-color:#DDDDDD;">\r\n				convert.iconv.*, mcrypt.*, mdecrypt.*, string.rot13, string.toupper, string.tolower, string.strip_tags, convert.*, consumed, dechunk, zlib.*, bzip2.*\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<table style="border:0px;width:934px;margin:1em auto;color:#222222;font-family:sans-serif;background-color:#FFFFFF;">\r\n	<tbody>\r\n		<tr class="v">\r\n			<td style="border:1px solid #666666;vertical-align:baseline;">\r\n				<a href="http://www.zend.com/"><img border="0" src="data:image/png;base64,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" alt="Zend logo" /></a>This program makes use of the Zend Scripting Language Engine:<br />\r\nZend&nbsp;Engine&nbsp;v2.6.0,&nbsp;Copyright&nbsp;(c)&nbsp;1998-2016&nbsp;Zend&nbsp;Technologies<br />\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 1, '2017-06-23 16:20:28', NULL),
(54, '水电费', '水电费水电费\r\n\r\nPL/SQL Challenge 每日一题：2017-6-17 在并行查询中执行函数\r\n阅读：192次评论（3）\r\n2017-06-23\r\n(原发表于 2011-7-15) 最先答对且答案未经编辑的puber将获得纪念章一枚(答案不可编辑但可发新贴补充或纠正)，其他会员如果提供有价值的分析、讨论也可获得纪念章一枚。 每两周的优胜者可获得itpub奖励的技术图书一本。 以往旧题索引： [url]http://www.itpub.net/f...\r\n', '<img src="http://www.itpub.net/source/plugin/itpubcms/images/itpubcms%20(100).jpg" />\n<div class="l4" style="font-family:宋体, Arial;">\n	<a href="http://www.itpub.net/thread-2089134-1-1.html" target="_blank"><img src="http://www.itpub.net/source/plugin/itpubcms/images/itpubcms%20(100).jpg" width="100" height="100" alt="" /></a>\n</div>\n<div class="r4" style="font-family:宋体, Arial;">\n	<div class="tit5" style="font-size:16px;font-family:&quot;">\n		<a href="http://www.itpub.net/thread-2089134-1-1.html" target="_blank">PL/SQL Challenge 每日一题：2017-6-17 在并行查询中执行函数</a>\n	</div>\n	<div class="tit6">\n		<a class="yd">阅读：192次</a><a href="http://www.itpub.net/thread-2089134-1-1.html" class="pl" target="_blank">评论<span style="color:#CE0000;">（3）</span></a>\n	</div>\n	<div class="tit7" style="color:#888888;">\n		2017-06-23\n	</div>\n</div>\n<div class="clear" style="font-family:宋体, Arial;">\n</div>\n<p style="text-indent:24px;color:#666666;font-family:宋体, Arial;">\n	(原发表于 2011-7-15) 最先答对且答案未经编辑的puber将获得纪念章一枚(答案不可编辑但可发新贴补充或纠正)，其他会员如果提供有价值的分析、讨论也可获得纪念章一枚。 每两周的优胜者可获得itpub奖励的技术图书一本。 以往旧题索引： [url]http://www.itpub.net/f...\n</p>\n<div class="tit8" style="font-family:宋体, Arial;">\n	<div class="l">\n		<div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">\n		</div>\n	</div>\n</div>', 1, '2017-06-24 12:54:48', NULL),
(55, '发 ', 'sdf撒扥', '', 5, '2017-06-24 13:03:24', NULL),
(56, '水电费水电费水电费十点多', '水电费', 'i不回家后', 1, '2017-06-24 13:06:25', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `article_discuss`
--

CREATE TABLE IF NOT EXISTS `article_discuss` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `discuss_cotent` varchar(3000) NOT NULL,
  `c_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `article_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `article_id` (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `blogroll`
--

CREATE TABLE IF NOT EXISTS `blogroll` (
  `idblogroll` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `url` varchar(300) NOT NULL,
  PRIMARY KEY (`idblogroll`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `captcha`
--

CREATE TABLE IF NOT EXISTS `captcha` (
  `idcaptcha` int(11) NOT NULL AUTO_INCREMENT,
  `captcha_time` timestamp NULL DEFAULT NULL,
  `word` varchar(70) DEFAULT NULL,
  `filename` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idcaptcha`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `captcha`
--

INSERT INTO `captcha` (`idcaptcha`, `captcha_time`, `word`, `filename`) VALUES
(1, '2017-06-24 12:42:55', 'Tf', '1498308175.7194.jpg'),
(2, '2017-06-24 13:25:50', 'Io', '1498310750.3572.jpg'),
(3, '2017-06-24 13:26:03', 'cJ', '1498310763.4248.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `idcategory` int(11) NOT NULL AUTO_INCREMENT,
  `coverUrl` varchar(300) NOT NULL COMMENT '封面图片路径',
  `name` varchar(200) NOT NULL,
  `intro` text NOT NULL COMMENT '分类介绍',
  `comment` text COMMENT '分类注释',
  PRIMARY KEY (`idcategory`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`idcategory`, `coverUrl`, `name`, `intro`, `comment`) VALUES
(1, '', 'study', '', NULL),
(5, '', 'literature', '', NULL),
(6, '', 'music', '', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `idmenu` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `template_name` varchar(200) NOT NULL,
  `intro` varchar(300) DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`idmenu`),
  UNIQUE KEY `order_id` (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- 转存表中的数据 `menu`
--

INSERT INTO `menu` (`idmenu`, `name`, `template_name`, `intro`, `order_id`) VALUES
(41, 'study', 'study', '自己的一些研究', 2),
(43, '留言板', 'message_board ', '对网站的建议 和对我的留言', 6),
(44, 'music', 'mjusic', '惊世毒妃 水电费接口', 1);

-- --------------------------------------------------------

--
-- 表的结构 `menu_category`
--

CREATE TABLE IF NOT EXISTS `menu_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `menu_id` (`menu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='菜单分类表有两个外键' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `menu_category`
--

INSERT INTO `menu_category` (`id`, `category_id`, `menu_id`) VALUES
(1, 1, 41);

-- --------------------------------------------------------

--
-- 表的结构 `views_num`
--

CREATE TABLE IF NOT EXISTS `views_num` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `article_id` (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章浏览量记录表' AUTO_INCREMENT=1 ;

--
-- 限制导出的表
--

--
-- 限制表 `article_discuss`
--
ALTER TABLE `article_discuss`
  ADD CONSTRAINT `article_discuss_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `article` (`idarticle`);

--
-- 限制表 `menu_category`
--
ALTER TABLE `menu_category`
  ADD CONSTRAINT `menu_category_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`idcategory`),
  ADD CONSTRAINT `menu_category_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`idmenu`);

--
-- 限制表 `views_num`
--
ALTER TABLE `views_num`
  ADD CONSTRAINT `views_num_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `article` (`idarticle`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
