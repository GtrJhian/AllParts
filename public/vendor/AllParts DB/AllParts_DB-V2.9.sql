DROP DATABASE IF EXISTS ALLPARTS;
CREATE DATABASE IF NOT EXISTS ALLPARTS;
USE ALLPARTS;

CREATE TABLE customer(
	Cus_ID INT NOT NULL AUTO_INCREMENT,
	F_Name VARCHAR(15) NOT NULL,
	L_Name VARCHAR(15) NOT NULL,
	M_Name VARCHAR(10),
	Contact_No VARCHAR(15) NOT NULL,
	Address VARCHAR(30) NOT NULL,
	Company VARCHAR(30),
	TIN_no VARCHAR(20),
	OSCA_PWD_ID VARCHAR(20),
	Cus_Archived BOOLEAN NOT NULL,
	PRIMARY KEY(Cus_ID)	
);

CREATE TABLE users(
    id INT NOT NULL AUTO_INCREMENT,		
	username VARCHAR(20),
	password VARCHAR(60),
	position VARCHAR(50),
	F_Name VARCHAR(15) NOT NULL,
	L_Name VARCHAR(15) NOT NULL,
	M_Name VARCHAR(10),
	Contact_No VARCHAR(15) NOT NULL,
	Address VARCHAR(30) NOT NULL,
	Email VARCHAR(30) NOT NULL,
	Sex BOOLEAN NOT NULL,
	user_access tinyint, 
	remember_token varchar(100),
	User_Archived BOOLEAN NOT NULL,
	PRIMARY KEY(id)
);

/*
CREATE TABLE accounts(
	Acc_ID INT NOT NULL AUTO_INCREMENT,
	User_ID INT NOT NULL,
	Username VARCHAR(20) NOT NULL,
	Password VARCHAR(16) NOT NULL,
	Date_Created DATE NOT NULL,
	Acc_Archived BOOLEAN NOT NULL,
	PRIMARY KEY(Acc_ID),
	FOREIGN KEY(User_ID) REFERENCES Users(id)
);

*/

CREATE TABLE item_pics(
	pic_id int not null AUTO_INCREMENT,
	pic_url varchar(255),
	archive boolean,
	PRIMARY KEY(pic_id)
);


CREATE TABLE item_brands(
	brand_id int not null AUTO_INCREMENT,
	brand_name varchar(50),
	brand_pic INT, /*Foreign key from item_pics table*/
	archive boolean, 
	PRIMARY KEY(brand_id),
	FOREIGN KEY(brand_pic) REFERENCES item_pics(pic_id)
);

CREATE TABLE item_categories(
	category_id int not null AUTO_INCREMENT,
	item_category varchar(50),
	categ_pic INT, /*Foreign key from item_pics table*/
	archive boolean,
	PRIMARY KEY(category_id),
	FOREIGN KEY(categ_pic) REFERENCES item_pics(pic_id)
);

CREATE TABLE inventory(
	Item_ID INT NOT NULL AUTO_INCREMENT,
	Item_Category INT, /*Foreign key from item_categories table*/
	Item_Brand INT, /*Foreign key from item_brands table*/
	Item_Code VARCHAR(100),
	Item_Description VARCHAR(255),
	Item_Type INT NOT NULL, /*0-Item, 1-Package*/
	Alarm_Quantity INT NOT NULL, 
	Item_Quantity INT NOT NULL,	
	Item_Unit VARCHAR(30),
	Item_Price DECIMAL(10,2),
	archive boolean,
	PRIMARY KEY(Item_ID),
	FOREIGN KEY(Item_Category) REFERENCES item_categories(category_id),
	FOREIGN KEY(Item_Brand) REFERENCES item_brands(brand_id)
);

CREATE TABLE item_packages(
	package_id int not null AUTO_INCREMENT,
	item_id int not null,
	needed_item int not null,
	needed_quantity int not null,
	PRIMARY KEY(package_id),
	FOREIGN KEY(item_id) REFERENCES inventory(item_id),
	FOREIGN KEY(needed_item) REFERENCES inventory(item_id)
);

CREATE TABLE sale(
	Sale_ID INT NOT NULL AUTO_INCREMENT,
	Cus_ID INT NOT NULL,
	Sale_Date DATE NOT NULL,
	/*Balance DECIMAL(10,2) NOT NULL, */
	sales_invoice_no varchar(50) NOT NULL,
	term_of_payment varchar(100),
/*	amount_rendered decimal(10,2), */
	debit decimal(10,2),
	Vat_sales decimal(10,2),
	Vat_amount decimal(10,2),
/*	amount_received decimal(10,2), */
	credit decimal(10,2) NOT NULL,
	Sale_archived boolean,
	PRIMARY KEY(Sale_ID),
	FOREIGN KEY (Cus_ID) REFERENCES Customer(Cus_ID)
);

CREATE TABLE sale_detail(
	Sale_ID INT NOT NULL,
	Item_ID INT NOT NULL,
	Quantity INT NOT NULL,
	Unit VARCHAR(10) NOT NULL,
	Unit_Price DECIMAL(10,2) NOT NULL,
	FOREIGN KEY(Sale_ID) REFERENCES Sale(Sale_ID),
	FOREIGN KEY(Item_ID) REFERENCES inventory(Item_ID)
);

CREATE TABLE accounting(
	TR_Acc INT NOT NULL AUTO_INCREMENT,
	Sale_ID INT NOT NULL,
	Acc_Date DATE,
	Acc_Payment DECIMAL(10,2),
	PRIMARY KEY(TR_Acc),
	FOREIGN KEY(Sale_ID) REFERENCES Sale(Sale_ID)
);


CREATE TABLE supplier(
	Supplier_ID INT AUTO_INCREMENT,
	Company_Name VARCHAR(255) NOT NULL,
	Company_Address VARCHAR(255) NOT NULL,
	Company_Contact VARCHAR(30),
	Company_Email VARCHAR(30),
	TIN_No VARCHAR(50),
	deleted_at timestamp NULL,
	created_at timestamp NULL,
	updated_at timestamp NULL,
	archive boolean,
	PRIMARY KEY(Supplier_ID)
);
/*
CREATE TABLE purchase_order(
	Order_No INT AUTO_INCREMENT,
	Supplier_ID INT NOT NULL,
	Order_Date DATE NOT NULL,
	Invoice_No VARCHAR(50),
	Amount DECIMAL(10,2),
	Description VARCHAR(255),
	--Signature VARCHAR(15),--
	PRIMARY KEY(Order_No),
	FOREIGN KEY(Supplier_ID) REFERENCES supplier(Supplier_ID)
); */

CREATE TABLE `purchase_order` (
  `Order_No` int(11) NOT NULL,
  `Supplier_ID` int(11) NOT NULL,
  `Order_Date` date NOT NULL,
  `Invoice_No` varchar(50) DEFAULT NULL,
  `Amount` decimal(10,2) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`Order_No`),
  ADD KEY `Supplier_ID` (`Supplier_ID`);

/*
CREATE TABLE order_detail(
	Order_No INT NOT NULL,
	Item_ID INT NOT NULL,
	Quantity INT NOT NULL,
	Unit VARCHAR(10),
--	Description VARCHAR (30) NOT NULL,--
	Unit_Price DECIMAL(10,2) NOT NULL,
	FOREIGN KEY(Order_No) REFERENCES Purchase_Order(Order_No),
	FOREIGN KEY(Item_ID) REFERENCES inventory(Item_ID)
);
*/

CREATE TABLE `order_detail` (
  `Order_No` int(11) NOT NULL,
  `Item_ID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Unit` varchar(10) DEFAULT NULL,
  `Unit_Price` decimal(10,2) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `order_detail`
  ADD KEY `Order_No` (`Order_No`),
  ADD KEY `Item_ID` (`Item_ID`);


CREATE TABLE user_log(
	module tinyint NOT NULL COMMENT '0-I, 1-B, 2-Su, 3-St, 4- U',
	User_ID INT NOT NULL,
    Action VARCHAR(100) NOT NULL,
    Date DATETIME NOT NULL,
    FOREIGN KEY (User_ID) REFERENCES users(id)
);


