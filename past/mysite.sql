-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-04-23 10:25:01
-- 服务器版本： 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mysite`
--

-- --------------------------------------------------------

--
-- 表的结构 `admini_root`
--

CREATE TABLE `admini_root` (
  `idadmini_root` int(11) NOT NULL,
  `mailAddress` varchar(100) DEFAULT NULL,
  `passw` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admini_root`
--

INSERT INTO `admini_root` (`idadmini_root`, `mailAddress`, `passw`) VALUES
(1, '896995920@qq.com', '$2y$10$4kl/T94L7CcdwQBjGpsgkuAYKGP.DLM5g4Uq6RNK68e0IsI9SYaW2');

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE `article` (
  `idarticle` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `sketch` varchar(600) NOT NULL,
  `content` longtext NOT NULL,
 # `c_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `views_num` int(11) DEFAULT NULL COMMENT '浏览数，每读取一次数据库加载加一次'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章';

-- --------------------------------------------------------

--
-- 表的结构 `article_category`
--

CREATE TABLE `article_category` (
  `id` int(11) NOT NULL,
  `article_category_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章分类有两个外键';

-- --------------------------------------------------------

--
-- 表的结构 `article_discuss`
--

CREATE TABLE `article_discuss` (
  `id` int(11) NOT NULL,
  `discuss_cotent` varchar(3000) NOT NULL,
#  `c_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `article_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章';

-- --------------------------------------------------------

--
-- 表的结构 `blogroll`
--

CREATE TABLE `blogroll` (
  `idblogroll` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `url` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `captcha`
--

CREATE TABLE `captcha` (
  `idcaptcha` int(11) NOT NULL,
  `captcha_time` timestamp NULL DEFAULT NULL,
  `word` varchar(70) DEFAULT NULL,
  `filename` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE `category` (
  `idcategory` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `comment` text COMMENT '分类注释'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`idcategory`, `name`, `comment`) VALUES
(1, 'study', NULL),
(5, 'literature', NULL),
(6, 'music', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `menu`
--

CREATE TABLE `menu` (
  `idmenu` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `template_name` varchar(200) NOT NULL,
  `intro` varchar(300) DEFAULT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `menu`
--

INSERT INTO `menu` (`idmenu`, `name`, `template_name`, `intro`, `order_id`) VALUES
(41, 'study', 'study', '自己的一些研究', 2),
(43, '留言板', 'message_board ', '对网站的建议 和对我的留言', 6);

-- --------------------------------------------------------

--
-- 表的结构 `menu_category`
--

CREATE TABLE `menu_category` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='菜单分类表有两个外键';

-- --------------------------------------------------------

--
-- 表的结构 `views_num`
--

CREATE TABLE `views_num` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章浏览量记录表';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admini_root`
--
ALTER TABLE `admini_root`
  ADD PRIMARY KEY (`idadmini_root`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`idarticle`);

--
-- Indexes for table `article_category`
--
ALTER TABLE `article_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_category_id` (`article_category_id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `article_discuss`
--
ALTER TABLE `article_discuss`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `blogroll`
--
ALTER TABLE `blogroll`
  ADD PRIMARY KEY (`idblogroll`);

--
-- Indexes for table `captcha`
--
ALTER TABLE `captcha`
  ADD PRIMARY KEY (`idcaptcha`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idcategory`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idmenu`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Indexes for table `menu_category`
--
ALTER TABLE `menu_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `views_num`
--
ALTER TABLE `views_num`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admini_root`
--
ALTER TABLE `admini_root`
  MODIFY `idadmini_root` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `article`
--
ALTER TABLE `article`
  MODIFY `idarticle` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `article_category`
--
ALTER TABLE `article_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `article_discuss`
--
ALTER TABLE `article_discuss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `blogroll`
--
ALTER TABLE `blogroll`
  MODIFY `idblogroll` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `captcha`
--
ALTER TABLE `captcha`
  MODIFY `idcaptcha` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `category`
--
ALTER TABLE `category`
  MODIFY `idcategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `menu`
--
ALTER TABLE `menu`
  MODIFY `idmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- 使用表AUTO_INCREMENT `menu_category`
--
ALTER TABLE `menu_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `views_num`
--
ALTER TABLE `views_num`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 限制导出的表
--

--
-- 限制表 `article_category`
--
ALTER TABLE `article_category`
  ADD CONSTRAINT `article_category_ibfk_1` FOREIGN KEY (`article_category_id`) REFERENCES `article` (`idarticle`),
  ADD CONSTRAINT `article_category_ibfk_2` FOREIGN KEY (`article_id`) REFERENCES `article` (`idarticle`);

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
