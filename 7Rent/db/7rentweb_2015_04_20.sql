/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : 7rentweb

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-04-20 08:41:17
*/

SET FOREIGN_KEY_CHECKS=0;

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
INSERT INTO `tbcustomer` VALUES ('1428131505', '1427339560', '', 'ra', 'vy', '', '', '', '', '', 'M', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '', '0');
INSERT INTO `tbcustomer` VALUES ('1428133218', '1427342479', '', 'ro', 'tha', 'rotha', '', '', '', '', 'M', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '', '0');

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
INSERT INTO `tblcategory` VALUES ('1427341194', '1427339560', 'XYZ', '2', 'dsfsdfsdfdsa');
INSERT INTO `tblcategory` VALUES ('1427342573', '1427342479', 'ABC', '1', 'zxcvxcvcxzvc');

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
  `RentDate` float DEFAULT NULL,
  `PayDate` float DEFAULT NULL,
  `Price` float DEFAULT NULL,
  `isLeave` bit(1) DEFAULT NULL,
  `LeaveDate` date DEFAULT NULL,
  `Description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblcustomer_rent
-- ----------------------------

-- ----------------------------
-- Table structure for `tblrentitem`
-- ----------------------------
DROP TABLE IF EXISTS `tblrentitem`;
CREATE TABLE `tblrentitem` (
  `RentItemID` text,
  `CompanyID` text,
  `ItemName` text,
  `Price` float DEFAULT NULL,
  `isStatus` bit(1) DEFAULT NULL,
  `Desciption` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblrentitem
-- ----------------------------
INSERT INTO `tblrentitem` VALUES ('1428029924', '1427339560', 'SVTech', '120', null, '');

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
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Category_Select_Company`()
BEGIN

	SELECT 	
	C.CategoryID AS CategoryID,
	C.CompanyID AS CompanyID,
	CO.CompanyName AS CompanyName,
	C.CategoryName AS CategoryName,
	C.OrderNo AS OrderNo,
	C.Description AS Description
	From tblCategory C
	INNER JOIN tblcompany CO ON C.CompanyID=CO.CompanyID;

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
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Customer_Rent_Insert`(IN   _Customer_RentID  NVARCHAR(50)  ,_CustomerID  NVARCHAR(50),_RentItemID  NVARCHAR(50),_CompanyID  NVARCHAR(50),_RentDate Datetime,_PayDate Datetime,_Price float,_isLeave bit,_LeaveDate Datetime,_Description  NVARCHAR(50))
BEGIN

INSERT INTO tblrentitem(
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
-- Procedure structure for `sp_Customer_Rent_Select`
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_Customer_Rent_Select`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Customer_Rent_Select`(IN  _Search NVARCHAR(200))
BEGIN

IF (_Search="") THEN
	SELECT 	
	RentItemID,
	CompanyID,
	ItemName,
	Price,
  isStatus,
	Desciption
	From tblrentitem;
ELSE 
	SELECT 	
	RentItemID,
	CompanyID,
	ItemName,
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
-- Procedure structure for `sp_Customer_Rent_Select_Company`
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_Customer_Rent_Select_Company`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Customer_Rent_Select_Company`()
BEGIN

	SELECT 	
	I.RentItemID AS RentItemID,
	I.CompanyID AS CompanyID,
	CO.CompanyName AS CompanyName,
	I.ItemName AS ItemName,
	I.Price AS Price,
  I.isStatus AS isStatus,
	I.Desciption AS Desciption
	From tblrentitem I
	INNER JOIN tblcompany CO ON I.CompanyID=CO.CompanyID;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `sp_Customer_Rent_Update`
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_Customer_Rent_Update`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Customer_Rent_Update`(IN  _RentItemID NVARCHAR(50), _CompanyID NVARCHAR(50) , _ItemName NVARCHAR(100), _Price  float,_isStatus bit, _Decription NVARCHAR(250))
BEGIN
	UPDATE tblrentitem SET
				CompanyID=_CompanyID ,
				ItemName=_ItemName ,
				Price=_Price,
				isStatus=_isStatus,
				Desciption=_sDecription  
	WHERE RentItemID=_RentItemID;
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_RentItem_Insert`(IN  _RentItemID NVARCHAR(50), _CompanyID NVARCHAR(50), _ItemName NVARCHAR(100), _Price float,_isStatus bit, _Desciption NVARCHAR(250))
BEGIN

INSERT INTO tblrentitem(
	RentItemID,
	CompanyID,
	ItemName,
	Price,
	isStatus,
	Desciption
)
	VALUES ( 
	_RentItemID,
	_CompanyID,
	_ItemName,
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
	Price,
  isStatus,
	Desciption
	From tblrentitem;
ELSE 
	SELECT 	
	RentItemID,
	CompanyID,
	ItemName,
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_RentItem_Select_Company`()
BEGIN

	SELECT 	
	I.RentItemID AS RentItemID,
	I.CompanyID AS CompanyID,
	CO.CompanyName AS CompanyName,
	I.ItemName AS ItemName,
	I.Price AS Price,
  I.isStatus AS isStatus,
	I.Desciption AS Desciption
	From tblrentitem I
	INNER JOIN tblcompany CO ON I.CompanyID=CO.CompanyID;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `sp_RentItem_Update`
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_RentItem_Update`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_RentItem_Update`(IN  _RentItemID NVARCHAR(50), _CompanyID NVARCHAR(50) , _ItemName NVARCHAR(100), _Price  float,_isStatus bit, _Decription NVARCHAR(250))
BEGIN
	UPDATE tblrentitem SET
				CompanyID=_CompanyID ,
				ItemName=_ItemName ,
				Price=_Price,
				isStatus=_isStatus,
				Desciption=_sDecription  
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
