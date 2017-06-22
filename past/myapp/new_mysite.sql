#先建主表
CREATE TABLE if not exists `admini_root` (
  `idadmini_root` int(11) NOT NULL AUTO_INCREMENT,
  `mailAddress` varchar(100) DEFAULT NULL,
  `passw` varchar(64) DEFAULT NULL,
  primary key(idadmini_root)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `admini_root` (`idadmini_root`, `mailAddress`, `passw`) VALUES
(NULL, '896995920@qq.com', '$2y$10$4kl/T94L7CcdwQBjGpsgkuAYKGP.DLM5g4Uq6RNK68e0IsI9SYaW2');

#先建没有外键约束，约束其他表的表
CREATE TABLE if not exists `category` (
  `idcategory` int(11) NOT NULL primary key AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  unique key(name)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
#菜单表
CREATE TABLE if not exists `menu` (
  `idmenu` int(11) NOT NULL primary key AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `url` varchar(200) NOT NULL,
  `intro` varchar(300) DEFAULT NULL,
  `order_id` int(11) NOT NULL unique key
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
#菜单分类表
CREATE TABLE if not exists menu_category(
  `id` int(11) NOT NULL primary key AUTO_INCREMENT,
  category_id int not null,
  menu_id int not null,
  foreign key(category_id) references category(idcategory),
  foreign key(menu_id) references menu(idmenu)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 comment="菜单分类表有两个外键";
#文章表
CREATE TABLE if not exists `article` (
  `idarticle` int(11) NOT NULL AUTO_INCREMENT primary key,
  `title` varchar(200) NOT NULL,
  `sketch` varchar(600) NOT NULL,
  `content` longtext NOT NULL,
  `c_time` datetime NOT NULL DEFAULT NOW()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章';
#文章分类表
CREATE TABLE if not exists article_category(
`id` int(11) NOT NULL primary key AUTO_INCREMENT,
  article_category_id int not null,
  article_id int not null,
  foreign key(article_category_id) references article(idarticle),
  foreign key(article_id) references article(idarticle)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章分类有两个外键';
#记录文章浏览量
CREATE TABLE if not exists `views_num` (
  `id` int(11) NOT NULL primary key AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `count`   int not  null DEFAULT 0,
  foreign key(article_id) references article(idarticle)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '文章浏览量记录表';
CREATE TABLE if not exists `blogroll` (
  `idblogroll` int(11) NOT NULL primary key AUTO_INCREMENT,
  name	varchar(150) not null,
  `url` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE if not exists `captcha` (
  `idcaptcha` int(11) NOT NULL primary key AUTO_INCREMENT,
  `captcha_time` timestamp NULL DEFAULT NULL,
  `word` varchar(70) DEFAULT NULL,
  `filename` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;