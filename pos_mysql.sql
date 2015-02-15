--
-- To use this file do either of:
-- - copy/paste all the following code into the mysql client (in terminal)
-- - $ cat schema.sql | mysql -u root
--

DROP DATABASE IF EXISTS pos;
CREATE DATABASE pos;
USE pos;

--
-- Create database tables
--
CREATE TABLE customer (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    email VARCHAR(255),
    gender VARCHAR(50),
    customer_since DATE
);

CREATE TABLE item (
    id INT auto_increment primary key,
    name VARCHAR(100),
    price DECIMAL(7,2)
);

CREATE TABLE invoice (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    created_at TIMESTAMP
);

CREATE TABLE invoice_item (
    id INT AUTO_INCREMENT PRIMARY KEY,
    invoice_id INT NOT NULL,
    item_id INT NOT NULL,
    quantity INT
);

--
-- Insert sample data
--

INSERT INTO customer (first_name, last_name, email, gender, customer_since)
    VALUES ('moe', 'o\'dools', 'moe@moes.com', 'male', CURDATE());

INSERT INTO customer (first_name, last_name, email, gender, customer_since)
    VALUES ('frank', 'sinatra', 'blueeyes@swinger.com', 'male', CURDATE());

INSERT INTO customer (first_name, last_name, email, gender, customer_since)
    VALUES ('dean', 'martin', 'deano@ladidadoo.com', 'male', CURDATE());

INSERT INTO customer (first_name, last_name, email, gender, customer_since)
    VALUES ('ben', 'franklin', 'zapped@foundingfathers.com', 'male', CURDATE());

INSERT INTO customer (first_name, last_name, email, gender, customer_since)
    VALUES ('otis', 'campbell', 'towndrunk@mayberryjail.gov', 'male', CURDATE());

INSERT INTO customer (first_name, last_name, email, gender, customer_since)
    VALUES ('george', 'thorogood', 'george@badbone.com', 'male', CURDATE());

INSERT INTO customer (first_name, last_name, email, gender, customer_since)
    VALUES ('mickey', 'mantle', '7@yankees.com', 'male', CURDATE());

INSERT INTO customer (first_name, last_name, email, gender, customer_since)
    VALUES ('marilyn', 'monroe', 'realeminem@bombshell.com', 'female', CURDATE());

INSERT INTO customer (first_name, last_name, email, gender, customer_since)
    VALUES ('norm', 'peterson', 'norm!@cheers.com', 'male', CURDATE());

INSERT INTO customer (first_name, last_name, email, gender, customer_since)
    VALUES ('don', 'draper', 'mowomen@motroubles.com', 'male', CURDATE());

INSERT INTO item (name, price) VALUES ('draft beer', 4.00);

INSERT INTO item (name, price) VALUES ('jack daniels', 6.00);

INSERT INTO item (name, price) VALUES ('scotch', 5.00);

INSERT INTO item (name, price) VALUES ('whiskey', 2.00);

INSERT INTO item (name, price) VALUES ('bourbon', 2.00);

INSERT INTO item (name, price) VALUES ('bloody mary', 8.00);

INSERT INTO item (name, price) VALUES ('rum', 4.00);

INSERT INTO item (name, price) VALUES ('tequila', 3.00);

INSERT INTO item (name, price) VALUES ('martini', 10.00);

INSERT INTO item (name, price) VALUES ('water', 15.00);

INSERT INTO invoice (customer_id, created_at) VALUES (1, NOW());

INSERT INTO invoice (customer_id, created_at) VALUES (2, NOW());

INSERT INTO invoice (customer_id, created_at) VALUES (3, NOW());

INSERT INTO invoice (customer_id, created_at) VALUES (4, NOW());

INSERT INTO invoice (customer_id, created_at) VALUES (5, NOW());

INSERT INTO invoice (customer_id, created_at) VALUES (6, NOW());

INSERT INTO invoice (customer_id, created_at) VALUES (7, NOW());

INSERT INTO invoice (customer_id, created_at) VALUES (8, NOW());

INSERT INTO invoice (customer_id, created_at) VALUES (9, NOW());

INSERT INTO invoice (customer_id, created_at) VALUES (10, NOW());

INSERT INTO invoice_item (invoice_id, item_id, quantity) VALUES (1, 1, 13);

INSERT INTO invoice_item (invoice_id, item_id, quantity) VALUES (2, 4, 4);

INSERT INTO invoice_item (invoice_id, item_id, quantity) VALUES (2, 8, 2);

INSERT INTO invoice_item (invoice_id, item_id, quantity) VALUES (3, 3, 2);

INSERT INTO invoice_item (invoice_id, item_id, quantity) VALUES (3, 5, 4);

INSERT INTO invoice_item (invoice_id, item_id, quantity) VALUES (4, 8, 10);

INSERT INTO invoice_item (invoice_id, item_id, quantity) VALUES (4, 1, 5);

INSERT INTO invoice_item (invoice_id, item_id, quantity) VALUES (5, 6, 9);

INSERT INTO invoice_item (invoice_id, item_id, quantity) VALUES (5, 3, 9);

INSERT INTO invoice_item (invoice_id, item_id, quantity) VALUES (6, 9, 11);

INSERT INTO invoice_item (invoice_id, item_id, quantity) VALUES (6, 3, 11);

INSERT INTO invoice_item (invoice_id, item_id, quantity) VALUES (7, 2, 4);

INSERT INTO invoice_item (invoice_id, item_id, quantity) VALUES (8, 5, 7);

INSERT INTO invoice_item (invoice_id, item_id, quantity) VALUES (9, 7, 6);

INSERT INTO invoice_item (invoice_id, item_id, quantity) VALUES (9, 2, 2);

INSERT INTO invoice_item (invoice_id, item_id, quantity) VALUES (10, 10, 2);