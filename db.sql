CREATE TABLE IF NOT EXISTS `storm_app` (
	`id` INT NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`) USING BTREE
);

CREATE TABLE `categories` (
	`id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50),
	`description` VARCHAR(300),
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8mb4_0900_ai_ci'
;

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
	(1, 'Music', 'A music you can sing and listen to'),
	(2, 'Games', 'Games you play');

CREATE TABLE `articles` (
	`id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
	`image` VARCHAR(100),
	`name` VARCHAR(100),
	`description` VARCHAR(300),
	`content` VARCHAR(3000),
	`views` BIGINT UNSIGNED DEFAULT '0',
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8mb4_0900_ai_ci'
;

INSERT INTO `articles` (`id`, `image`, `name`, `description`, `content`, `views`) VALUES
	(1, NULL, 'Alice in Chains', 'Layne Staley', NULL, 0),
	(2, NULL, 'Mad season', 'Layne Staley', NULL, 0),
	(3, NULL, 'Doom', 'John Carmack John Romero 1993', NULL, 0),
	(4, NULL, 'Quake', 'John Carmack John Romero 1996 also some soundtrack from NIN Trent Reznor', NULL, 0);

CREATE TABLE `articles_categories` (
	`article_id` BIGINT UNSIGNED,
	`category_id` BIGINT UNSIGNED,
	INDEX `article_id` (`article_id`) USING BTREE,
	INDEX `category_id` (`category_id`) USING BTREE
)
;

INSERT INTO `articles_categories` (`article_id`, `category_id`) VALUES
	(1, 1),
	(2, 1),
	(3, 2),
	(4, 2),
	(4, 1);
