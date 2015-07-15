/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : 7rentweb

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-04-30 14:07:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `customer_rent_pay`
-- ----------------------------
DROP TABLE IF EXISTS `customer_rent_pay`;
CREATE TABLE `customer_rent_pay` (
  `Customer_RentID` text CHARACTER SET utf8,
  `UserID` text CHARACTER SET utf8,
  `RentItemID` text CHARACTER SET utf8,
  `PayDate` date DEFAULT NULL,
  `RealPayDate` date DEFAULT NULL,
  `Price` float DEFAULT NULL,
  `Electric` float DEFAULT NULL,
  `Water` float DEFAULT NULL,
  `garbage` float DEFAULT NULL,
  `Other` float DEFAULT NULL,
  `TotalPay` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of customer_rent_pay
-- ----------------------------
INSERT INTO `customer_rent_pay` VALUES ('1430191352', '1', '1430191352', '2015-04-28', '2015-04-28', '100', '5', '4', '3', '2', '114');
INSERT INTO `customer_rent_pay` VALUES ('1430296185', '1', '1430191429', '2015-05-10', '2015-04-29', '75', '5', '5', '2.5', '0', '87.5');
INSERT INTO `customer_rent_pay` VALUES ('1430301348', '1', '1430191370', '2015-04-09', '2015-04-29', '120', '3', '3', '44', '0', '170');
INSERT INTO `customer_rent_pay` VALUES ('1430301479', '1', '1430191352', '2015-04-28', '2015-04-29', '100', '0', '0', '0', '0', '100');
INSERT INTO `customer_rent_pay` VALUES ('1430301519', '1', '1430191352', '2015-05-13', '2015-04-29', '100', '0', '0', '0', '0', '100');
INSERT INTO `customer_rent_pay` VALUES ('1430362728', '1', '1430191370', '2015-05-01', '2015-05-05', '120', '0', '0', '0', '0', '120');

-- ----------------------------
-- Table structure for `tbcustomer`
-- ----------------------------
DROP TABLE IF EXISTS `tbcustomer`;
CREATE TABLE `tbcustomer` (
  `CustomerID` text,
  `CompanyID` text,
  `memberTitle` text,
  `firstName` text,
  `lastName` text,
  `fullName` text,
  `nickName` text,
  `idType` text,
  `icpassportNo` text,
  `Nationality` text,
  `Gender` text,
  `Birthdate` datetime DEFAULT NULL,
  `MaritalStatus` text,
  `Address` text,
  `ZipCode` text,
  `PostalCode` text,
  `POBox` text,
  `City` text,
  `Country` text,
  `Tel1` text,
  `Fax` text,
  `Mobile` text,
  `eMail` text,
  `autono` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbcustomer
-- ----------------------------
INSERT INTO `tbcustomer` VALUES ('1428131505', '1427339560', '', 'ra', 'vy', 'ravy', '', '', '', '', 'M', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '', '0');
INSERT INTO `tbcustomer` VALUES ('1428133218', '1427342479', '', 'ro', 'tha', 'rotha', '', '', '', '', 'M', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '', '0');
INSERT INTO `tbcustomer` VALUES ('1430295066', '1427339560', '', 'to', 'la', 'tola', '', '', '', '', 'M', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '', '0');
INSERT INTO `tbcustomer` VALUES ('1430295156', '1427339560', '', 'mouy', 'lay', 'mouylay', '', '', '', '', 'M', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '', '0');

-- ----------------------------
-- Table structure for `tblcategory`
-- ----------------------------
DROP TABLE IF EXISTS `tblcategory`;
CREATE TABLE `tblcategory` (
  `CategoryID` text,
  `CompanyID` text,
  `CategoryName` text,
  `OrderNo` int(11) DEFAULT NULL,
  `Description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblcategory
-- ----------------------------
INSERT INTO `tblcategory` VALUES ('1430191060', '1427339560', 'Watashi', '1', '');
INSERT INTO `tblcategory` VALUES ('1430191071', '1427339560', 'SVTech', '2', '');
INSERT INTO `tblcategory` VALUES ('1430191081', '1427342479', 'Galaxy S', '3', '');
INSERT INTO `tblcategory` VALUES ('1430191093', '1427342479', 'Galaxy Note', '4', '');

-- ----------------------------
-- Table structure for `tblcompany`
-- ----------------------------
DROP TABLE IF EXISTS `tblcompany`;
CREATE TABLE `tblcompany` (
  `CompanyID` text,
  `CompanyName` text,
  `Description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblcompany
-- ----------------------------
INSERT INTO `tblcompany` VALUES ('1427339560', '7Technology', 'sfsdafasdzx77777');
INSERT INTO `tblcompany` VALUES ('1427342479', 'Samsung', 'sfsdfvzxcvzxcvz');

-- ----------------------------
-- Table structure for `tblcustomer_rent`
-- ----------------------------
DROP TABLE IF EXISTS `tblcustomer_rent`;
CREATE TABLE `tblcustomer_rent` (
  `Customer_RentID` text,
  `CustomerID` text,
  `RentItemID` text,
  `CompanyID` text,
  `RentDate` date DEFAULT NULL,
  `PayDate` date DEFAULT NULL,
  `Price` float DEFAULT NULL,
  `isLeave` bit(1) DEFAULT NULL,
  `LeaveDate` date DEFAULT NULL,
  `Description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblcustomer_rent
-- ----------------------------
INSERT INTO `tblcustomer_rent` VALUES ('1430192128', '1428131505', '1430191352', '1427339560', '2015-04-28', '2015-04-28', '100', '', '0000-00-00', '');
INSERT INTO `tblcustomer_rent` VALUES ('1430292357', '1428133218', '1430191392', '1427342479', '2015-05-11', '2015-05-10', '300', '', '0000-00-00', '');
INSERT INTO `tblcustomer_rent` VALUES ('1430295114', '1430295066', '1430191370', '1427339560', '2015-04-02', '2015-04-01', '120', '', '0000-00-00', '');
INSERT INTO `tblcustomer_rent` VALUES ('1430295244', '1430295156', '1430191429', '1427339560', '2015-05-01', '2015-05-10', '75', '', '0000-00-00', '');

-- ----------------------------
-- Table structure for `tblrentitem`
-- ----------------------------
DROP TABLE IF EXISTS `tblrentitem`;
CREATE TABLE `tblrentitem` (
  `RentItemID` text,
  `CompanyID` text,
  `ItemName` text,
  `CategoryID` text,
  `Price` float DEFAULT NULL,
  `isStatus` bit(1) DEFAULT NULL,
  `Desciption` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblrentitem
-- ----------------------------
INSERT INTO `tblrentitem` VALUES ('1428029924', '1427339560', '001', '1427342573', '120', '', '');
INSERT INTO `tblrentitem` VALUES ('1429828052', '1427342479', '002', '1427342573', '130', '', '');
INSERT INTO `tblrentitem` VALUES ('1429828072', '1427342479', '003', '1427341194', '100', '', '');
INSERT INTO `tblrentitem` VALUES ('1430191352', '1427339560', 'T001', '1430191060', '100', '', '');
INSERT INTO `tblrentitem` VALUES ('1430191370', '1427339560', 'T002', '1430191060', '120', '', '');
INSERT INTO `tblrentitem` VALUES ('1430191392', '1427342479', 'S001', '1430191081', '300', '', '');
INSERT INTO `tblrentitem` VALUES ('1430191414', '1427342479', 'S002', '1430191081', '400', '', '');
INSERT INTO `tblrentitem` VALUES ('1430191429', '1427339560', 'T003', '1430191060', '75', '', '');

-- ----------------------------
-- Table structure for `tblusers`
-- ----------------------------
DROP TABLE IF EXISTS `tblusers`;
CREATE TABLE `tblusers` (
  `UserID` text,
  `BranchID` text,
  `UserName` text,
  `Password` text,
  `Level` int(11) DEFAULT NULL,
  `Decription` text,
  `Status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblusers
-- ----------------------------
INSERT INTO `tblusers` VALUES ('1', '1', 'admin', 'T3JITG9YU1FtWHB5cUJuN0tOUU1BUT09', '1', null, '1');
INSERT INTO `tblusers` VALUES ('1427253518', '1', 'rotha', 'T3JITG9YU1FtWHB5cUJuN0tOUU1BUT09', '2', 'dcbvcxg', '1');
INSERT INTO `tblusers` VALUES ('1427271527', '004', 'nana', 'Q0RQc0ttVGVENktwbkh4aXdyUTVkdz09', '2', 'cvbvcxbx', '1');

-- ----------------------------
-- Procedure structure for `spUserAccSelete`
-- ----------------------------
DROP PROCEDURE IF EXISTS `spUserAccSelete`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spUserAccSelete`(_UserName NVARCHAR(500),
_UserPwd NVARCHAR(500))
BEGIN
 
SELECT UserID, BranchID, UserName, `Password` AS UserPassword, `Level` AS Level, `STATUS` AS UserStatus FROM `tblusers` 
WHERE UserName = _UserName 
AND `Password` = _UserPwd 
AND `STATUS` = 1;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `sp_Category_Delete`
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_Category_Delete`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Category_Delete`(IN  _CategoryID  NVARCHAR(50))
BEGIN
	DELETE From tblCategory
	WHERE CategoryID=_CategoryID;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `sp_Category_Insert`
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_Category_Insert`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Category_Insert`(IN  _CategoryID NVARCHAR(50), _CompanyID NVARCHAR(50), _CategoryName NVARCHAR(100), _OrderNo int, _Description NVARCHAR(250))
BEGIN

INSERT INTO tblCategory(
	CategoryID,
	CompanyID,
	CategoryName,
	OrderNo,
	Description
	
)
	VALUES ( 
	_CategoryID,
	_CompanyID,
	_CategoryName,
	_OrderNo,
	_Description
);

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `sp_Category_Select`
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_Category_Select`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Category_Select`(IN  _Search NVARCHAR(200))
BEGIN

IF (_Search="") THEN
	SELECT 	
	CategoryID,
	CompanyID,
	CategoryName,
	OrderNo,
	Description

	From tblCategory;
ELSE 
	SELECT 	
	CategoryID,
	CompanyID,
	CategoryName,
	OrderNo,
	Description
	From tblCategory
	WHERE (CategoryName Like CONCAT('%' , _Search , '%') OR Decription Like Description('%' , _Search , '%')  );
END IF;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `sp_Category_Select_Company`
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_Category_Select_Company`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Category_Select_Company`(IN  _Search NVARCHAR(500))
BEGIN

IF (_Search="") THEN
	SELECT 	
	C.CategoryID AS CategoryID,
	C.CompanyID AS CompanyID,
	CO.CompanyName AS CompanyName,
	C.CategoryName AS CategoryName,
	C.OrderNo AS OrderNo,
	C.Description AS Description
	From tblCategory C
	INNER JOIN tblcompany CO ON C.CompanyID=CO.CompanyID;
ELSE
	SELECT 	
	C.CategoryID AS CategoryID,
	C.CompanyID AS CompanyID,
	CO.CompanyName AS CompanyName,
	C.CategoryName AS CategoryName,
	C.OrderNo AS OrderNo,
	C.Description AS Description
	From tblCategory C
	INNER JOIN tblcompany CO ON C.CompanyID=CO.CompanyID
	WHERE (C.CategoryName Like CONCAT('%' , _Search , '%') OR CO.CompanyName Like CONCAT('%' , _Search , '%') OR C.Description Like CONCAT('%' , _Search , '%')  );
END IF;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `sp_Category_Update`
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_Category_Update`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Category_Update`(IN  _CategoryID NVARCHAR(50),_CompanyID NVARCHAR(50) , _CategoryName NVARCHAR(100), _OrderNo int, _Decription NVARCHAR(250))
BEGIN
	UPDATE tblCategory SET
				CompanyID=_CompanyID ,
				CategoryName=_CategoryName ,
				OrderNo=_OrderNo ,
				Description=_Decription 
	WHERE CategoryID=_CategoryID;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `sp_Company_Delete`
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_Company_Delete`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Company_Delete`(IN  _CompanyID NVARCHAR(50))
BEGIN
	DELETE From tblCompany 
	WHERE CompanyID=_CompanyID;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `sp_Company_Insert`
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_Company_Insert`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Company_Insert`(IN 
_CompanyID NVARCHAR(50),
 _CompanyName NVARCHAR(100), 
_Description NVARCHAR(500))
BEGIN

INSERT INTO tblCompany(
	CompanyID,
	CompanyName,
	Description
	
)
	VALUES ( 
	_CompanyID,
	_CompanyName,
	_Description	
);

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `sp_Company_Select`
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_Company_Select`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Company_Select`(IN  _Search NVARCHAR(200))
BEGIN

IF (_Search="") THEN
	SELECT 	
		CompanyID,
		CompanyName,
		Description
	From tblcompany;
ELSE 
	SELECT 	
		CompanyID,
		CompanyName,
		Description
	From tblcompany 
	WHERE (CompanyName Like CONCAT('%' , _Search , '%') OR Description Like CONCAT('%' , _Search , '%')  );
END IF;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `sp_Company_Update`
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_Company_Update`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Company_Update`(IN  _CompanyID NVARCHAR(50),_CompanyName NVARCHAR(100),_Description NVARCHAR(250))
BEGIN
	UPDATE tblCompany SET
			CompanyName=_CompanyName,
			Description=_Description
	WHERE CompanyID=_CompanyID;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `sp_Customer_Delete`
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_Customer_Delete`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Customer_Delete`(IN  _CustomerID NVARCHAR(50))
BEGIN
	DELETE From tbCustomer
	WHERE CustomerID=_CustomerID;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `sp_Customer_Insert`
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_Customer_Insert`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Customer_Insert`(IN  _CustomerID NVARCHAR(50),_CompanyID  NVARCHAR(200),_memberTitle NVARCHAR(200),_firstName NVARCHAR(200),_lastName  NVARCHAR(200),_fullName NVARCHAR(200),_nickName  NVARCHAR(200),_idType  NVARCHAR(200),_icpassportNo NVARCHAR(200),_Nationality NVARCHAR(200) ,_Gender NVARCHAR(200),_Birthdate datetime,_MaritalStatus NVARCHAR(200) ,_Address NVARCHAR(200),_ZipCode NVARCHAR(200),_PostalCode NVARCHAR(200),_POBox  NVARCHAR(200),_City NVARCHAR(200),_Country NVARCHAR(200),_Tel1 NVARCHAR(200),_Fax NVARCHAR(200) ,_Mobile NVARCHAR(200),_eMail NVARCHAR(200) ,_autono int)
BEGIN

INSERT INTO tbCustomer(
					  CustomerID
					 ,CompanyID
           ,memberTitle
           ,firstName
           ,lastName
           ,fullName
           ,nickName
           ,idType
           ,icpassportNo
           ,Nationality
           ,Gender
           ,Birthdate
           ,MaritalStatus
           ,Address
           ,ZipCode
           ,PostalCode
           ,POBox
           ,City
           ,Country
           ,Tel1
           ,Fax
           ,Mobile
           ,eMail
           ,autono
)
	VALUES ( 
						_CustomerID
					 ,_CompanyID
           ,_memberTitle
           ,_firstName
           ,_lastName
           ,_fullName
           ,_nickName
           ,_idType
           ,_icpassportNo
           ,_Nationality
           ,_Gender
           ,_Birthdate
           ,_MaritalStatus
           ,_Address
           ,_ZipCode
           ,_PostalCode
           ,_POBox
           ,_City
           ,_Country
           ,_Tel1
           ,_Fax
           ,_Mobile
           ,_eMail
           ,_autono
);

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `sp_Customer_Rent_Delete`
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_Customer_Rent_Delete`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Customer_Rent_Delete`(IN  _Customer_RentID NVARCHAR(50))
BEGIN
	DELETE From tblcustomer_rent
	WHERE Customer_RentID=_Customer_RentID;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `sp_Customer_Rent_Insert`
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_Customer_Rent_Insert`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Customer_Rent_Insert`(IN   _Customer_RentID  NVARCHAR(50)  , _CustomerID  NVARCHAR(50), _RentItemID  NVARCHAR(50), _CompanyID  NVARCHAR(50), _RentDate Datetime, _PayDate Datetime, _Price float, _isLeave bit, _LeaveDate Datetime, _Description  NVARCHAR(50))
BEGIN

INSERT INTO tblcustomer_rent(
		Customer_RentID,
		CustomerID,
		RentItemID,
		CompanyID,
		RentDate,
		PayDate,
		Price,
		isLeave,
		LeaveDate,
		Description

)
	VALUES ( 
	_Customer_RentID,
	_CustomerID,
	_RentItemID,
	_CompanyID,
	_RentDate,
	_PayDate,
	_Price,
	_isLeave,
	_LeaveDate,
	_Description

);

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `sp_Customer_Rent_Payment_Insert`
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_Customer_Rent_Payment_Insert`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Customer_Rent_Payment_Insert`(IN _Customer_RentID NVARCHAR(50) ,_UserID NVARCHAR(50),_RentItemID NVARCHAR(50),_PayDate Datetime,_RealPayDate Datetime,_Price float, _Electric float, _Water float, _garbage float, _Other float, _TotalPay float)
BEGIN

INSERT INTO Customer_Rent_Pay(
		Customer_RentID,
		UserID,
    RentItemID,
		PayDate,
		RealPayDate,
		Price,
		Electric,
		Water,
		garbage,
		Other,
		TotalPay
)
	VALUES ( 
		_Customer_RentID,
		_UserID,
		_RentItemID,
		_PayDate,
		_RealPayDate,
		_Price,
		_Electric,
		_Water,
		_garbage,
		_Other,
		_TotalPay
);

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `sp_Customer_Rent_Select`
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_Customer_Rent_Select`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Customer_Rent_Select`(IN  _Search NVARCHAR(200))
BEGIN

	SELECT 	
		Customer_RentID,
		CustomerID,
		RentItemID,
		CompanyID,
		RentDate,
		PayDate,
		Price,
		isLeave,
		LeaveDate,
		Description
	From tblcustomer_rent;


END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `sp_Customer_Rent_Select_Company`
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_Customer_Rent_Select_Company`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Customer_Rent_Select_Company`(IN  _Search NVARCHAR(500), _PayDate Datetime)
BEGIN
IF (_Search="") THEN
	SELECT 	
	CR.Customer_RentID AS Customer_RentID,
	CR.RentItemID AS RentItemID,
	I.ItemName AS ItemName,
	CR.CompanyID AS CompanyID,
  CO.CompanyName AS CompanyName,
 	I.CategoryID AS CategoryID,
	CA.CategoryName AS CategoryName,
	C.CustomerID AS CustomerID,
	C.fullName AS FullName,
	CR.RentDate AS RentDate,
	CR.PayDate AS PayDate,
	CR.Price AS Price,
  CR.isLeave AS isLeave,
	CR.LeaveDate AS LeaveDate,
	CR.Description AS Desciption
	FROM tblcustomer_rent CR
	INNER JOIN  tblrentitem I ON CR.RentItemID=I.RentItemID
	INNER JOIN tblcategory CA ON I.CategoryID=CA.CategoryID
	INNER JOIN tblcompany CO ON CR.CompanyID=CO.CompanyID
	INNER JOIN tbcustomer C ON CR.CustomerID=C.CustomerID
 WHERE CR.RentItemID NOT IN(SELECT RentItemID FROM customer_rent_pay WHERE Month(PayDate)=Month(_PayDate) and Year(PayDate)=Year(_PayDate))
 AND Month(CR.PayDate)<=Month(_PayDate) AND Year(CR.PayDate)<=Year(_PayDate);

ELSE
	SELECT 	
		CR.Customer_RentID AS Customer_RentID,
		CR.RentItemID AS RentItemID,
		I.ItemName AS ItemName,
		CR.CompanyID AS CompanyID,
		CO.CompanyName AS CompanyName,
		I.CategoryID AS CategoryID,
		CA.CategoryName AS CategoryName,
		C.CustomerID AS CustomerID,
		C.fullName AS FullName,
		CR.RentDate AS RentDate,
		CR.PayDate AS PayDate,
		CR.Price AS Price,
		CR.isLeave AS isLeave,
		CR.LeaveDate AS LeaveDate,
		CR.Description AS Desciption
		FROM tblcustomer_rent CR
		INNER JOIN  tblrentitem I ON CR.RentItemID=I.RentItemID
		INNER JOIN tblcategory CA ON I.CategoryID=CA.CategoryID
		INNER JOIN tblcompany CO ON CR.CompanyID=CO.CompanyID
		INNER JOIN tbcustomer C ON CR.CustomerID=C.CustomerID
 WHERE CR.RentItemID NOT IN(SELECT RentItemID FROM customer_rent_pay WHERE Month(PayDate)=Month(_PayDate) and Year(PayDate)=Year(_PayDate))
 AND Month(CR.PayDate)<=Month(_PayDate) AND Year(CR.PayDate)<=Year(_PayDate) AND (C.fullName Like CONCAT('%' , _Search , '%') OR CA.CategoryName Like CONCAT('%' , _Search , '%') OR I.ItemName Like CONCAT('%' , _Search , '%') OR CO.CompanyName Like CONCAT('%' , _Search , '%') OR CR.Description Like CONCAT('%' , _Search , '%')  );
END IF;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `sp_Customer_Rent_Update`
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_Customer_Rent_Update`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Customer_Rent_Update`(IN   _Customer_RentID  NVARCHAR(50)  , _CustomerID  NVARCHAR(50), _RentItemID  NVARCHAR(50), _CompanyID  NVARCHAR(50), _RentDate Datetime, _PayDate Datetime, _Price float, _isLeave bit, _LeaveDate Datetime, _Description  NVARCHAR(50))
BEGIN
	UPDATE tblcustomer_rent SET
		CustomerID=_CustomerID,
		RentItemID=_RentItemID,
		CompanyID=_CompanyID,
		RentDate=_RentDate,
		PayDate=_PayDate,
		Price=_Price,
		isLeave=_isLeave,
		LeaveDate=_LeaveDate,
		Description=_Description 
	WHERE Customer_RentID=_Customer_RentID;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `sp_Customer_Select`
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_Customer_Select`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Customer_Select`(IN  _Search NVARCHAR(200))
BEGIN

IF (_Search="") THEN
	SELECT 	
					  CustomerID
					 ,CompanyID
           ,memberTitle
           ,firstName
           ,lastName
           ,fullName
           ,nickName
           ,idType
           ,icpassportNo
           ,Nationality
           ,Gender
           ,Birthdate
           ,MaritalStatus
           ,Address
           ,ZipCode
           ,PostalCode
           ,POBox
           ,City
           ,Country
           ,Tel1
           ,Fax
           ,Mobile
           ,eMail
           ,autono
	From tbCustomer;
ELSE 
	SELECT 	
						CustomerID
					 ,CompanyID
           ,memberTitle
           ,firstName
           ,lastName
           ,fullName
           ,nickName
           ,idType
           ,icpassportNo
           ,Nationality
           ,Gender
           ,Birthdate
           ,MaritalStatus
           ,Address
           ,ZipCode
           ,PostalCode
           ,POBox
           ,City
           ,Country
           ,Tel1
           ,Fax
           ,Mobile
           ,eMail
           ,autono
	From tbCustomer
	WHERE (firstName Like CONCAT('%' , _Search , '%') OR lastName Like CONCAT('%' , _Search , '%')  );
END IF;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `sp_Customer_Select_Company`
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_Customer_Select_Company`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Customer_Select_Company`()
BEGIN

	SELECT 	
					  CS.CustomerID AS CustomerID
					 ,CS.CompanyID AS CompanyID
					 ,CO.CompanyName AS CompanyName
           ,CS.memberTitle AS memberTitle
           ,CS.firstName AS firstName
           ,CS.lastName AS lastName
           ,CS.fullName AS fullName
           ,CS.nickName AS nickName
           ,CS.idType AS idType
           ,CS.icpassportNo AS icpassportNo
           ,CS.Nationality AS Nationality
           ,CS.Gender AS Gender
           ,CS.Birthdate AS Birthdate
           ,CS.MaritalStatus AS MaritalStatus
           ,CS.Address AS Address
           ,CS.ZipCode AS ZipCode
           ,CS.PostalCode AS PostalCode
           ,CS.POBox AS POBox
           ,CS.City AS City
           ,CS.Country AS Country
           ,CS.Tel1 AS Tel1
           ,CS.Fax AS Fax
           ,CS.Mobile AS Mobile
           ,CS.eMail AS eMail
           ,CS.autono AS autono
	From tbCustomer CS
	INNER JOIN tblcompany CO ON CS.CompanyID=CO.CompanyID;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `sp_Customer_Select_CustomerID`
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_Customer_Select_CustomerID`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Customer_Select_CustomerID`(IN  _CustomerID NVARCHAR(200))
BEGIN

	SELECT 	  memberTitle
           ,firstName
           ,lastName
           ,fullName
           ,nickName
           ,idType
           ,icpassportNo
           ,Nationality
           ,Gender
           ,Birthdate
           ,MaritalStatus
           ,Address
           ,ZipCode
           ,PostalCode
           ,POBox
           ,City
           ,Country
           ,Tel1
           ,Fax
           ,Mobile
           ,eMail
           ,autono
	From tbCustomer
	Where CustomerID=_CustomerID;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `sp_Customer_Update`
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_Customer_Update`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Customer_Update`(IN  _CustomerID NVARCHAR(50) )
BEGIN
	UPDATE tbCustomer SET
					 CompanyID=_CompanyID
           ,memberTitle=_memberTitle
           ,firstName=_firstName
           ,lastName=_lastName
           ,fullName=_fullName
           ,nickName=_nickName
           ,idType=_idType
           ,icpassportNo=_icpassportNo
           ,Nationality=_Nationality
           ,Gender=_Gender
           ,Birthdate=_Birthdate
           ,MaritalStatus=_MaritalStatus
           ,Address=_Address
           ,ZipCode=_ZipCode
           ,PostalCode=_PostalCode
           ,POBox=_POBox
           ,City=_City
           ,Country=_Country
           ,Tel1=_Tel1
           ,Fax=_Fax
           ,Mobile=_Mobile
           ,eMail=_eMail
           ,autono=_autono
	WHERE CustomerID=_CustomerID;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `sp_RentItem_Delete`
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_RentItem_Delete`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_RentItem_Delete`(IN  _RentItemID NVARCHAR(50))
BEGIN
	DELETE From tblrentitem
	WHERE RentItemID=_RentItemID;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `sp_RentItem_Insert`
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_RentItem_Insert`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_RentItem_Insert`(IN  _RentItemID NVARCHAR(50), _CompanyID NVARCHAR(50), _ItemName NVARCHAR(100), _CategoryID NVARCHAR(100), _Price float,_isStatus bit, _Desciption NVARCHAR(250))
BEGIN

INSERT INTO tblrentitem(
	RentItemID,
	CompanyID,
	ItemName,
	CategoryID,
	Price,
	isStatus,
	Desciption
)
	VALUES ( 
	_RentItemID,
	_CompanyID,
	_ItemName,
	_CategoryID,
	_Price,
	_isStatus,
	_Desciption
);

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `sp_RentItem_Select`
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_RentItem_Select`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_RentItem_Select`(IN  _Search NVARCHAR(200))
BEGIN

IF (_Search="") THEN
	SELECT 	
	RentItemID,
	CompanyID,
	ItemName,
	CategoryID,
	Price,
  isStatus,
	Desciption
	From tblrentitem;
ELSE 
	SELECT 	
	RentItemID,
	CompanyID,
	ItemName,
	CategoryID,
	Price,
	isStatus,
	Desciption
	From tblrentitem
	WHERE (ItemName Like CONCAT('%' , _Search , '%') OR Desciption Like CONCAT('%' , _Search , '%')  );
END IF;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `sp_RentItem_Select_Company`
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_RentItem_Select_Company`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_RentItem_Select_Company`(IN  _Search NVARCHAR(500))
BEGIN
IF (_Search="") THEN
	SELECT 	
	I.RentItemID AS RentItemID,
	I.CompanyID AS CompanyID,
	CO.CompanyName AS CompanyName,
	I.ItemName AS ItemName,
	CA.CategoryID AS CategoryID,
	CA.CategoryName AS CategoryName,
	I.Price AS Price,
  I.isStatus AS isStatus,
	I.Desciption AS Desciption
	From tblrentitem I
	LEFT JOIN tblcompany CO ON I.CompanyID=CO.CompanyID
	INNER JOIN tblcategory CA ON I.CategoryID=CA.CategoryID;
ELSE
	SELECT 	
	I.RentItemID AS RentItemID,
	I.CompanyID AS CompanyID,
	CO.CompanyName AS CompanyName,
	I.ItemName AS ItemName,
	CA.CategoryID AS CategoryID,
	CA.CategoryName AS CategoryName,
	I.Price AS Price,
  I.isStatus AS isStatus,
	I.Desciption AS Desciption
	From tblrentitem I
	LEFT JOIN tblcompany CO ON I.CompanyID=CO.CompanyID
	INNER JOIN tblcategory CA ON I.CategoryID=CA.CategoryID
WHERE (I.ItemName Like CONCAT('%' , _Search , '%') OR CA.CategoryName Like CONCAT('%' , _Search , '%') OR CO.CompanyName Like CONCAT('%' , _Search , '%') OR I.Desciption Like CONCAT('%' , _Search , '%')  );
END IF;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `sp_RentItem_Update`
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_RentItem_Update`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_RentItem_Update`(IN  _RentItemID NVARCHAR(50), _CompanyID NVARCHAR(50) , _ItemName NVARCHAR(100),_CategoryID NVARCHAR(100), _Price  float,_isStatus bit, _Decription NVARCHAR(250))
BEGIN
	UPDATE tblrentitem SET
				CompanyID=_CompanyID ,
				ItemName=_ItemName ,
				CategoryID=_CategoryID,
				Price=_Price,
				isStatus=_isStatus,
				Desciption=_Decription  
	WHERE RentItemID=_RentItemID;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `sp_UserAccount_Delete`
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_UserAccount_Delete`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_UserAccount_Delete`(IN  _UserID  NVARCHAR(100))
BEGIN
	DELETE From tblusers 
  WHERE UserID=_UserID;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `sp_UserAccount_Select`
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_UserAccount_Select`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_UserAccount_Select`(IN  _Search NVARCHAR(100))
BEGIN

IF (_Search="") THEN
	SELECT 	
	UserID,
	BranchID,
	UserName,
	Password,
	Level,
	Decription,
	Status	
	From tblusers;
ELSE 
	SELECT 	
		UserID,
		BranchID,
		UserName,
		Password,
		Level,
		Decription,
		Status
	From tblusers 
	WHERE (UserName Like CONCAT('%' , _Search , '%') OR Decription Like CONCAT('%' , _Search , '%')  );
END IF;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `sp_UserAccount_Select_By_ID`
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_UserAccount_Select_By_ID`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_UserAccount_Select_By_ID`(IN  _BranchID NVARCHAR(100))
BEGIN

	SELECT 	
	UserID,
	BranchID,
	UserName,
	Password,
	Level,
	Decription,
	Status	
	From tblusers
	WHERE BranchID=_BranchID;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `sp_UserAccount_Update`
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_UserAccount_Update`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_UserAccount_Update`(IN  _UserID  NVARCHAR(100),_BranchID  NVARCHAR(50),_UserName  NVARCHAR(100), _Level int,_Decription NVARCHAR(500),_Status int)
BEGIN
	UPDATE tblusers SET
			BranchID =_BranchID,
			UserName=_UserName,
			Level=_Level,
			Decription=_Decription,
			Status=_Status
	WHERE UserID=_UserID;
END
;;
DELIMITER ;
