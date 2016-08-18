CREATE DATABASE IF NOT EXISTS `shopImooc`;
USE `shopImooc`;
/* 管理员表 */
 DROP TABLE IF EXISTS `imooc_admin`; 
CREATE TABLE `imooc_admin`(
`id` tinyint unsigned auto_increment key, /* 自增长，主键 */
`username` varchar(20) not null unique, /* 唯一 */
`password` char(32) not null, 
`email` varchar(50) not null
);

/* 分类表 */
 DROP TABLE IF EXISTS `imooc_cate`; 
CREATE TABLE `imooc_cate`(
`id` smallint(5) unsigned auto_increment key,
`cName` varchar(50) unique
);

/* 商品表 */
 DROP TABLE IF EXISTS `imooc_pro`; 
 CREATE TABLE `imooc_pro`(
 `id` int(10) unsigned auto_increment key,
 `pName` varchar(50) not null unique,
 `pSn` varchar(50) not null,
 `pNum` int unsigned default '1',
 `mPrice` decimal(10,2) not null,
 `iPrice` decimal(10,2) not null,
 `pDesc` text,
 `pImg` varchar(50) not null,
 `pubTime` int unsigned not null,
 `isShow` tinyint(1) default '1',  -- 以此代替布尔类型
 `isHot` tinyint(1) default '0',
 `cId` smallint unsigned not null
 );
 
/* 用户表 */
  DROP TABLE IF EXISTS `imooc_user`; 
  CREATE TABLE `imooc_user`(
  `id` int(10) unsigned auto_increment key,
  `username` varchar(20) not null unique,
  `password` char(32) not null,
   sex enum('保密','男','女') not null, /* `sex` tinyint(1) not null default '2',*/ /*0 male; 1 female; 2 secret;*/
  `face` varchar(50) not null,
  `regTime` int(10) unsigned not null
  );
  
/* 相册表 */
  DROP TABLE IF EXISTS `imooc_album`; 
  CREATE TABLE `imooc_album`(
  `id` int unsigned auto_increment key,
  `pid` int unsigned not null,
  `albumPath` varchar(50) not null
  );
  
  
  