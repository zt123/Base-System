-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: 10.0.0.250
-- Generation Time: 2014-06-27 12:31:28
-- 服务器版本： 5.5.37-0ubuntu0.12.04.1
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `examination`
--

-- --------------------------------------------------------

--
-- 表的结构 `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section` varchar(255) NOT NULL DEFAULT 'system',
  `_key` varchar(255) NOT NULL,
  `_value` text NOT NULL,
  `_comment` varchar(255) DEFAULT '',
  `is_deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='系统配置文档' AUTO_INCREMENT=33 ;

-- --------------------------------------------------------

--
-- 表的结构 `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) DEFAULT NULL COMMENT '原文件名称',
  `file_type` varchar(50) DEFAULT NULL COMMENT '文件类型',
  `file_size` bigint(20) DEFAULT NULL COMMENT '文件大小',
  `file_extension` varchar(20) DEFAULT NULL COMMENT '文件扩展名',
  `ctime` int(11) DEFAULT NULL COMMENT '创建时间',
  `hash_code` varchar(32) DEFAULT NULL COMMENT 'MD5值',
  `is_deleted` tinyint(1) DEFAULT '0' COMMENT '是否删除，0：正常 1：删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='文件资源表' AUTO_INCREMENT=93 ;

-- --------------------------------------------------------

--
-- 表的结构 `log_visitor`
--

CREATE TABLE IF NOT EXISTS `log_visitor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL COMMENT '访问地址',
  `hash` varchar(32) DEFAULT NULL COMMENT 'hash唯一值',
  `uid` int(11) NOT NULL DEFAULT '1' COMMENT '用户ID',
  `referer` varchar(255) DEFAULT NULL COMMENT 'HTTP_REFERER',
  `user_agent` varchar(255) DEFAULT NULL COMMENT 'User-Agent',
  `vip` varchar(15) DEFAULT NULL COMMENT '来访IP',
  `type` varchar(50) DEFAULT NULL COMMENT '访问类型',
  `ctime` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户访问日志' AUTO_INCREMENT=9034 ;

-- --------------------------------------------------------

--
-- 表的结构 `manager`
--

CREATE TABLE IF NOT EXISTS `manager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `passwd` varchar(255) NOT NULL,
  `sp` varchar(255) NOT NULL COMMENT '特殊权限',
  `status` int(11) NOT NULL COMMENT '账号状态',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- 表的结构 `multiple_choice`
--

CREATE TABLE IF NOT EXISTS `multiple_choice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL COMMENT '题干',
  `type` tinyint(1) NOT NULL COMMENT '单选，还是多选',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `multiple_choice_answer`
--

CREATE TABLE IF NOT EXISTS `multiple_choice_answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mc_id` int(11) NOT NULL COMMENT '题目id',
  `content` int(11) NOT NULL COMMENT '答案内容',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
