CREATE TABLE IF NOT EXISTS `contacts` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(200),
	`surname` VARCHAR(200),
	PRIMARY KEY (`id`) USING BTREE
);

CREATE TABLE IF NOT EXISTS `orders` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(200),
	`summ` VARCHAR(200),
	PRIMARY KEY (`id`) USING BTREE
);

CREATE TABLE IF NOT EXISTS `contacts_orders` (
	`order_id` INT,
	`contact_id` INT,
	INDEX `order_id` (`order_id`) USING BTREE,
	INDEX `contact_id` (`contact_id`) USING BTREE
);
