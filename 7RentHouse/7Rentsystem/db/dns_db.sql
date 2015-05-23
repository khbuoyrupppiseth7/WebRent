/*
Navicat MySQL Data Transfer

Source Server         : MySQL
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : dns_db

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-01-20 08:44:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tbldns`
-- ----------------------------
DROP TABLE IF EXISTS `tbldns`;
CREATE TABLE `tbldns` (
  `dnsID` text CHARACTER SET utf8,
  `dnsName` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `DateFrom` date DEFAULT NULL,
  `DateTo` date DEFAULT NULL,
  `IsLiveTime` date DEFAULT NULL,
  `CusName` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `CusPhone` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `CusAddress` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `CusDesc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `UserAddnew` text,
  `UserAddnewDate` date DEFAULT NULL,
  `UserUpdate` text,
  `UserUpdateDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbldns
-- ----------------------------
INSERT INTO `tbldns` VALUES ('1', 'DNS1', '2015-01-01', '2016-01-03', '2100-01-01', 'Rotha', '012555111', '#27E0z', 'Welcome', null, null, null, null);
INSERT INTO `tbldns` VALUES ('2', 'DNS2', '2014-10-29', '4029-01-03', '2100-01-01', 'Nara', '09777744445', '#251A1, St.2010', 'Hello,', null, null, null, null);
INSERT INTO `tbldns` VALUES ('1419479355', 'DNS3', '2013-01-01', '2016-01-03', '2100-01-01', 'A1', '012', '#27E0z,', 'Hello,', null, null, null, null);
INSERT INTO `tbldns` VALUES ('1419479356', 'DNS3', '2014-10-10', '2016-12-25', '0000-00-00', 'A2', '012', '#27E0z,', 'Hello,', null, null, null, null);
INSERT INTO `tbldns` VALUES ('1419479424', 'How you.', '2014-10-10', '2015-12-27', '2100-01-01', 'A3', '012778877', '#208', 'Hello,', null, null, null, null);
INSERT INTO `tbldns` VALUES ('1419558338', 'World', '2015-10-10', '2015-12-27', '2100-01-01', 'A4', '012778877', '#208', 'Hello,', null, null, null, null);
INSERT INTO `tbldns` VALUES ('1420274327', 'DNS 33', '2014-01-01', '2015-01-03', '2100-01-01', 'A5', '', '', '', null, null, null, null);
INSERT INTO `tbldns` VALUES ('1420276869', 'Hello,', '2015-10-12', '2017-01-03', '0000-00-00', 'Chea Sombath', '012555522', '#89Ez0,', 'Welcome to Cambodia.', null, null, null, null);
INSERT INTO `tbldns` VALUES ('1420277629', 'DNS 25', '2015-01-01', '2018-01-03', '0000-00-00', 'Nara', '0125444412', 'No.123', 'Descibetion', 'admin', '2015-01-03', null, null);

-- ----------------------------
-- Table structure for `tbluseracc`
-- ----------------------------
DROP TABLE IF EXISTS `tbluseracc`;
CREATE TABLE `tbluseracc` (
  `UserID` text NOT NULL,
  `ComID` text,
  `UserFirstName` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `UserLastName` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `UserName` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `UserPwd` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `UserLevel` int(2) DEFAULT NULL,
  `UserDesc` text CHARACTER SET utf8,
  `LastUpdate` datetime DEFAULT NULL,
  `UserStatus` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbluseracc
-- ----------------------------
INSERT INTO `tbluseracc` VALUES ('1418008914', '1', 'admin', 'admin', 'admin', 'T3JITG9YU1FtWHB5cUJuN0tOUU1BUT09', '1', '', '2014-12-08 00:00:00', '1');
INSERT INTO `tbluseracc` VALUES ('1418012106', '1', 'rotha', '007', 'rotha', 'N1Y5b20zcHBSdlUrWVBaOEdFaVdaQT09', '2', '', '2014-12-23 09:55:05', '1');
INSERT INTO `tbluseracc` VALUES ('1421030674', '1', null, null, 'rotha', '12345', '1', null, '2015-01-12 09:44:34', '1');
INSERT INTO `tbluseracc` VALUES ('1421030874', '1', null, null, 'nara', 'T3JITG9YU1FtWHB5cUJuN0tOUU1BUT09', '1', null, '2015-01-12 09:47:54', '1');

-- ----------------------------
-- Table structure for `tbluserhistory`
-- ----------------------------
DROP TABLE IF EXISTS `tbluserhistory`;
CREATE TABLE `tbluserhistory` (
  `UserHistoryID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) DEFAULT NULL,
  `UserHistoryStartDate` datetime DEFAULT NULL,
  `UserHistoryEndDate` datetime DEFAULT NULL,
  PRIMARY KEY (`UserHistoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbluserhistory
-- ----------------------------
INSERT INTO `tbluserhistory` VALUES ('1', '1418012106', '2014-12-24 08:13:05', '2014-12-24 08:21:11');
INSERT INTO `tbluserhistory` VALUES ('2', '1418008914', '2014-12-24 08:21:16', '2014-12-24 09:00:09');
INSERT INTO `tbluserhistory` VALUES ('3', '1418012106', '2015-01-03 15:07:06', '2015-01-03 15:21:36');
INSERT INTO `tbluserhistory` VALUES ('4', '1418012106', '2015-01-03 15:21:41', '2015-01-03 15:28:04');
INSERT INTO `tbluserhistory` VALUES ('5', '1418008914', '2015-01-03 15:28:09', '2015-01-03 15:28:25');
INSERT INTO `tbluserhistory` VALUES ('6', '1418008914', '2015-01-03 15:28:34', '2015-01-03 15:28:40');
INSERT INTO `tbluserhistory` VALUES ('7', '1418012106', '2015-01-03 15:28:47', '2015-01-03 15:32:25');
INSERT INTO `tbluserhistory` VALUES ('8', '1418008914', '2015-01-03 15:32:34', '2015-01-03 15:32:41');
INSERT INTO `tbluserhistory` VALUES ('9', '1418012106', '2015-01-12 08:41:52', '2015-01-12 09:48:04');
INSERT INTO `tbluserhistory` VALUES ('10', '1421030874', '2015-01-12 09:48:10', '2015-01-12 10:16:58');
INSERT INTO `tbluserhistory` VALUES ('11', '1421030874', '2015-01-12 10:17:06', '2015-01-12 10:17:18');

-- ----------------------------
-- Procedure structure for `spUserAccInsert`
-- ----------------------------
DROP PROCEDURE IF EXISTS `spUserAccInsert`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spUserAccInsert`( 
IN 
_UserID NVARCHAR(500),
_ComID NVARCHAR(500),
_UserFirstName NVARCHAR(1000),
_UserLastName NVARCHAR(1000),
_UserName NVARCHAR(500),
_UserPwd NVARCHAR(1000),
_UserLevel INT,
_UserDesc NVARCHAR(1000),
_LastUpdate DATE,
_UserStatus INT
)
BEGIN

INSERT INTO tbluseracc( 
	UserID,
	ComID,
	UserFirstName,
	UserLastName,
	UserName,
	UserPwd,
	UserLevel,
	UserDesc,
	LastUpdate,
	UserStatus
)
	VALUES ( 
	_UserID,
	_ComID,
	_UserFirstName,
	_UserLastName,
	_UserName,
	_UserPwd,
	_UserLevel,
	_UserDesc,
	_LastUpdate,
  _UserStatus
);

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `spUserAccSelete`
-- ----------------------------
DROP PROCEDURE IF EXISTS `spUserAccSelete`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spUserAccSelete`(_UserName NVARCHAR(500),
_UserPwd NVARCHAR(500))
BEGIN
 
SELECT acc.UserID AS UserID,
	acc.ComID,
	acc.UserName,
	acc.UserPwd,
	acc.UserLevel AS UserLevel,
	acc.UserStatus
FROM tbluseracc acc
WHERE acc.UserName = _UserName 
AND acc.UserPwd = _UserPwd
AND acc.UserStatus = 1;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `spUserAccSeleteAll`
-- ----------------------------
DROP PROCEDURE IF EXISTS `spUserAccSeleteAll`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spUserAccSeleteAll`()
BEGIN
 
SELECT 
	acc.UserID AS UserID,
	acc.ComID AS ComID,
	acc.UserName AS UserName,
	acc.UserLevel AS UserLevel,
	acc.UserStatus AS UserStatus
FROM tbluseracc acc
ORDER BY UserID Desc;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `spUserAccUpdate`
-- ----------------------------
DROP PROCEDURE IF EXISTS `spUserAccUpdate`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spUserAccUpdate`(
IN _UserID NVARCHAR(500), 
_ComID NVARCHAR(500),
_UserFirstName NVARCHAR(1000),
_UserLastName NVARCHAR(1000),
_UserName NVARCHAR(1000),
_UserLevel INT,
_UserDesc NVARCHAR(1000),
_LastUpdate DATETIME,
_UserStatus INT
)
BEGIN

UPDATE tbluseracc
SET UserID = _UserID,
	ComID = _ComID ,
  UserFirstName = _UserFirstName,
	UserLastName = _UserLastName,
	UserName = _UserName,
	UserLevel = _UserLevel,
	UserDesc = _UserDesc,
	LastUpdate = _LastUpdate,
  UserStatus = _UserStatus
WHERE UserID = _UserID ;

END
;;
DELIMITER ;
