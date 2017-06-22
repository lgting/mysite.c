create database mysite;

CREATE TABLE `mysite`.`admini_root` (
  `idadmini_root` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NULL,
  `passw` VARCHAR(64) NULL,
 PRIMARY KEY (`idadmini_root`));

CREATE TABLE `mysite`.`menu` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `url` VARCHAR(200) NOT NULL,
  `category_id` int NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM;

CREATE TABLE `mysite`.`article` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(200) NOT NULL,
  `sketch` VARCHAR(600) NOT NULL,
  `content` VARCHAR(3000) NOT NULL,
  `c_time` DATETIME NOT NULL,
  `category_id` INT NOT NULL,
   foreign key(category_id) references category(idcategory),
  PRIMARY KEY (`id`))
COMMENT = '文章';

CREATE TABLE `mysite`.`category` (
  `idcategory` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`idcategory`));

CREATE TABLE `mysite`.`blogroll` (
  `idblogroll` INT NOT NULL AUTO_INCREMENT,
  `url` VARCHAR(300) NOT NULL,
  PRIMARY KEY (`idblogroll`));
