CREATE TABLE `orders` (
  `order_id` INT(50) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY  (`order_id`)
);

CREATE TABLE `item` (
  `item_id` INT(50) NOT NULL AUTO_INCREMENT,
  `item_desc` VARCHAR(100),
  `order_status` VARCHAR(100),
  PRIMARY KEY  (`item_id`)
);

CREATE TABLE `transaction` (
  `trans_id` INT(50) NOT NULL AUTO_INCREMENT,
  `trans_status` VARCHAR(100),
  `trans_note` TEXT,
  `barcode` VARCHAR(50),
  `serial` VARCHAR(50),
  `order_quantity` INT(10),
  `order_date` TIMESTAMP,
  `item_id` INT,
  `item_name` INT,
  `item_id` INT,
  PRIMARY KEY  (`trans_id`)
);

CREATE TABLE `users` (
  `user_id` INT(50) NOT NULL AUTO_INCREMENT,
  `user_sid` VARCHAR(10),
  `user_pw` VARCHAR(100),
  `fname` VARCHAR(25),
  `lname` VARCHAR(25),
  `user_sid` INT,
  PRIMARY KEY  (`user_id`)
);



ALTER TABLE `transaction` ADD CONSTRAINT `transaction_fk1` FOREIGN KEY (`item_id`) REFERENCES item(`item_id`);
ALTER TABLE `transaction` ADD CONSTRAINT `transaction_fk2` FOREIGN KEY (`item_id`) REFERENCES item(`item_id`);
ALTER TABLE `users` ADD CONSTRAINT `users_fk1` FOREIGN KEY (`user_sid`) REFERENCES users(`user_sid`);
