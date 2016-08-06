
DROP DATABASE IF EXISTS wnet_test_task;
CREATE DATABASE wnet_test_task;
USE wnet_test_task;


--	obj_customers;
--	obj_contracts;
--	obj_services.


DROP TABLE IF EXISTS obj_customers;
CREATE TABLE obj_customers (
	id_customer int (11) auto_increment NOT NULL,
	name_customer varchar (250) NOT NULL,
	company enum('company_1','company_2','company_3'),
	PRIMARY KEY (id_customer),
        UNIQUE KEY i__ocst__name_customer(name_customer),
	KEY i__ocst__company(company)
);

INSERT INTO obj_customers(name_customer, company)
VALUES('Vasya', 1), ('Jhon', 2), ('Jeck', 2), ('Ann', 3), ('Helen', 3), ('Katrin', 3);

DROP TABLE IF EXISTS obj_contracts;
CREATE TABLE obj_contracts ( 
	id_contract int(11) auto_increment NOT NULL,
	f_id_customer int (11),
	`number` varchar(100),
	date_sign date,
	staff_number varchar(100),
	PRIMARY KEY (id_contract),
	UNIQUE KEY i__ocntr__number(`number`),
	KEY i__ocntr__f_id_customer(f_id_customer)
);

INSERT INTO obj_contracts (f_id_customer, `number`, date_sign, staff_number)
VALUES
(1, 'VASYA_1', '2001-01-01', 10),
(1, 'VASYA_2', '2002-02-02', 20),
(1, 'VASYA_3', '2003-03-03', 30),

(2, 'JHON_1', '2011-01-01', 100),
(2, 'JHON_2', '2012-01-01', 200),

(3, 'JECK_1', '2013-01-01', 300),

(4, 'ANN_1', '2014-05-05', 3),
(4, 'ANN_2', '2014-06-06', 9),

(6, 'KATRIN_1', '2000-11-11', 1),
(6, 'KATRIN_2', '2000-11-12', 2),
(6, 'KATRIN_3', '2000-11-13', 3),
(6, 'KATRIN_4', '2000-11-14', 4),
(6, 'KATRIN_5', '2000-11-15', 5)

;

DROP TABLE IF EXISTS obj_services;
CREATE TABLE obj_services (
	id_service int(11) auto_increment NOT NULL,
	f_id_contract  int(11) NOT NULL,
	title_service varchar(250),
	status enum('work','connecting','disconnected'),
	PRIMARY KEY (id_service),
	KEY i__osrv__f_id_contract(f_id_contract),
--	UNIQUE KEY i__osrv__title_service(title_service),
	KEY i__osrv__status(status)
);

INSERT INTO obj_services(f_id_contract, title_service, status)
VALUES
(1, 'SERVICE 1', 1),
(1, 'SERVICE 2', 1),
(1, 'SERVICE 3', 2),

(2, 'SERVICE 4', 1),
(2, 'SERVICE 5', 1),

(3, 'SERVICE 6', 2),
(3, 'SERVICE 7', 1),
(3, 'SERVICE 8', 3),
(3, 'SERVICE 9', 2),

(5, 'SERVICE 10', 1),

(6, 'SERVICE 11', 1),
(6, 'SERVICE 12', 2),

(7, 'SERVICE 13', 1),

(8, 'SERVICE 14', 1),
(8, 'SERVICE 15', 2),

(9, 'SERVICE 16', 1),
(9, 'SERVICE 17', 3),
(9, 'SERVICE 18', 2),

(10, 'SERVICE 19', 1),

(11, 'SERVICE 20', 1),
(11, 'SERVICE 21', 2),

(12, 'SERVICE 22', 1),
(12, 'SERVICE 23', 1),

(13, 'SERVICE 24', 2),
(13, 'SERVICE 25', 1),
(13, 'SERVICE 26', 1),
(13, 'SERVICE 27', 3)


;



