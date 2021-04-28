DROP database cs371spring2021;

 

CREATE database cs371spring2021;

USE cs371spring2021;

 

CREATE TABLE IF NOT EXISTS

Categories (

  category_id CHAR(3) NOT NULL PRIMARY KEY,

  catname VARCHAR(50) NOT NULL

  );

 

INSERT INTO

  Categories (category_id, catname)

  VALUES

  ('CAT', 'Cars and Trucks'),

  ('HOU', 'Housing'),

  ('ELC', 'Electronics'),

  ('CCA', 'Child Care');

 

CREATE TABLE IF NOT EXISTS

Statuses (

  status_id CHAR(2) NOT NULL PRIMARY KEY,

  status_name VARCHAR(50) NOT NULL

  );

 

INSERT INTO

  Statuses (status_id, status_name)

  VALUES

  ('PN', 'Pending'),

  ('AC', 'Active'),

  ('DI', 'Disapproved');

 

CREATE TABLE IF NOT EXISTS

Users (

  user_id VARCHAR(12) NOT NULL PRIMARY KEY,

  userfirst_name VARCHAR(25) NOT NULL,

  userlast_name VARCHAR(25) NOT NULL

  );

 

INSERT INTO

  Users (user_id, userfirst_name, userlast_name)

  VALUES

  ('Jsmith', 'John', 'Smith'),

  ('Ajackson', 'Ann', 'Jackson'),

  ('Rkale', 'Rania', 'Kale'),

  ('Sali', 'Samir', 'Ali');

 

CREATE TABLE IF NOT EXISTS

Moderators (

  user_id VARCHAR(12) NOT NULL PRIMARY KEY,

  FOREIGN KEY (user_id) REFERENCES Users (user_id) ON DELETE RESTRICT

  );

 

INSERT INTO

  Moderators (user_id)

  VALUES

  ('Jsmith'),

  ('Ajackson');

 

CREATE TABLE IF NOT EXISTS

Advertisements (

  advertisement_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,

  advtitle VARCHAR(60),

  advdetails VARCHAR(240),

  advdatetime TIMESTAMP,

  price DECIMAL(9,2),

  user_id VARCHAR(12),

  moderator_id VARCHAR(12),

  category_id CHAR(3),

  status_id CHAR(2),

  FOREIGN KEY (category_id) REFERENCES Categories (category_id) ON DELETE RESTRICT,

  FOREIGN KEY (user_id) REFERENCES Users (user_id) ON DELETE CASCADE,

  FOREIGN KEY (moderator_id) REFERENCES Moderators (user_id) ON DELETE SET NULL,

  FOREIGN KEY (status_id) REFERENCES Statuses (status_id) ON DELETE RESTRICT

  );

 

INSERT INTO Advertisements

  (advtitle, advdetails, advdatetime, price, category_id, user_id, moderator_id, status_id)

  VALUES

  ('2010 Sedan Subaru','2010 sedan car in great shape for sale','2017-02-10',6000.0,'CAT','Rkale','Jsmith','AC'),

  ('Nice Office Desk','Nice office desk for sale','2017-02-15',50.25,'HOU','Rkale','Jsmith','AC'),

  ('Smart LG TV for $200 ONLY','Smart LG TV 52 inches! Really cheap!','2017-03-15',200.0,'ELC','Sali','Jsmith','AC'),

  ('HD Tablet for $25 only','Amazon Fire Tablet HD','2017-03-20',25.0,'ELC','Rkale',NULL,'PN'),

  ('Laptop for $100','Amazing HP Laptop for $100','2017-03-20',100.0,'ELC','Rkale',NULL,'PN');