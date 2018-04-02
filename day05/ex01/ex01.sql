USE db_cvermand;
CREATE TABLE ft_table (id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, login varchar(8) DEFAULT 'toto' NOT NULL, `group` ENUM('staff', 'student', 'other') NOT NULL, creation_date date NOT NULL);
