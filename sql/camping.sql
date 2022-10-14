-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主機: localhost
-- 建立日期: Sep 02, 2022, 08:39 AM
-- 伺服器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 資料庫: `camping`
-- 

-- --------------------------------------------------------

-- 
-- 資料表格式： `pyclass`
-- 

CREATE TABLE `pyclass` (
  `classid` int(3) NOT NULL auto_increment COMMENT '產品類別',
  `level` int(3) NOT NULL COMMENT '所在層級',
  `cname` varchar(30) collate utf8_unicode_ci NOT NULL COMMENT '類別名稱',
  `sort` int(3) NOT NULL COMMENT '列表排序',
  `uplink` int(3) NOT NULL COMMENT '上層連結',
  `creat_date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP COMMENT '建立時間與更新時間',
  PRIMARY KEY  (`classid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=33 ;

-- 
-- 列出以下資料庫的數據： `pyclass`
-- 

INSERT INTO `pyclass` VALUES (1, 1, '露營預約', 1, 0, '0000-00-00 00:00:00');
INSERT INTO `pyclass` VALUES (2, 1, '出租商品', 2, 0, '0000-00-00 00:00:00');
INSERT INTO `pyclass` VALUES (3, 1, '購買商品', 3, 0, '0000-00-00 00:00:00');
INSERT INTO `pyclass` VALUES (11, 2, '北部', 1, 1, '0000-00-00 00:00:00');
INSERT INTO `pyclass` VALUES (12, 2, '中部', 2, 1, '0000-00-00 00:00:00');
INSERT INTO `pyclass` VALUES (13, 2, '南部', 3, 1, '0000-00-00 00:00:00');
INSERT INTO `pyclass` VALUES (14, 2, '東部', 4, 1, '0000-00-00 00:00:00');
INSERT INTO `pyclass` VALUES (21, 2, '帳篷', 1, 1, '0000-00-00 00:00:00');
INSERT INTO `pyclass` VALUES (22, 2, '睡袋', 2, 1, '0000-00-00 00:00:00');
INSERT INTO `pyclass` VALUES (31, 2, '帳篷', 1, 1, '0000-00-00 00:00:00');
INSERT INTO `pyclass` VALUES (32, 2, '睡袋', 2, 1, '0000-00-00 00:00:00');
