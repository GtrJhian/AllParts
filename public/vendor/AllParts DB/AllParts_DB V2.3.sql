CREATE DATABASE ALLPARTS;
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
	User_ID INT NOT NULL AUTO_INCREMENT,		
	F_Name VARCHAR(15) NOT NULL,
	L_Name VARCHAR(15) NOT NULL,
	M_Name VARCHAR(10),
	Contact_No VARCHAR(15) NOT NULL,
	Address VARCHAR(30) NOT NULL,
	Email VARCHAR(30) NOT NULL,
	Sex BOOLEAN NOT NULL,
	User_Archived BOOLEAN NOT NULL,
	PRIMARY KEY(User_ID)
);

CREATE TABLE accounts(
	Acc_ID INT NOT NULL AUTO_INCREMENT,
	User_ID INT NOT NULL,
	Username VARCHAR(20) NOT NULL,
	Password VARCHAR(16) NOT NULL,
	Date_Created DATE NOT NULL,
	Acc_Archived BOOLEAN NOT NULL,
	PRIMARY KEY(Acc_ID),
	FOREIGN KEY(User_ID) REFERENCES Users(User_ID)
);

CREATE TABLE purchase_order(
	Order_No INT AUTO_INCREMENT,
	Order_From VARCHAR(30) NOT NULL,
	Order_Date DATE NOT NULL,
	Invoice_No INT NOT NULL,
	Signature VARCHAR(15),
	PRIMARY KEY(Order_NO)
);

CREATE TABLE order_detail(
	Order_No INT AUTO_INCREMENT,
	Quantity INT NOT NULL,
	Unit VARCHAR(10) NOT NULL,
	Description VARCHAR (30) NOT NULL,
	Unit_Price INT NOT NULL,
	FOREIGN KEY(Order_No) REFERENCES Purchase_Order(Order_No)
);

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
	Sale_ID INT AUTO_INCREMENT NOT NULL,
	Cus_ID INT NOT NULL,
	Sale_Date DATE NOT NULL,
	Balance DECIMAL(10,2) NOT NULL,
	sales_invoice_no varchar(50) NOT NULL,
	term_of_payment int NOT NULL, /*selection*/
	amount_rendered decimal(10,2),
	Vat_sales decimal(10,2),
	Vat_amount decimal(10,2),
	amount_received decimal(10,2),
	PRIMARY KEY(Sale_ID),
	FOREIGN KEY (Cus_ID) REFERENCES Customer(Cus_ID)
);

CREATE TABLE sale_detail(
	Sale_ID INT NOT NULL AUTO_INCREMENT,
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
	Acc_Payment DECIMAL(6,2),
	PRIMARY KEY(TR_Acc),
	FOREIGN KEY(Sale_ID) REFERENCES Sale(Sale_ID)
);


CREATE TABLE user_log(
	Acc_ID INT NOT NULL AUTO_INCREMENT,
	Action VARCHAR(20) NOT NULL,
	Date DATETIME NOT NULL,
	FOREIGN KEY(Acc_ID) REFERENCES Accounts(Acc_ID)
);

