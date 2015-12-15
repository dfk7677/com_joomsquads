CREATE TABLE IF NOT EXISTS `#__jsq_applications` (
	`id`       INT(11)  auto_increment   NOT NULL,
	`name` VARCHAR(255) NOT NULL,
	`email` VARCHAR(255) NOT NULL,
	`nickname` VARCHAR(255) NOT NULL,
	`squad_id` INT(11) NOT NULL,
	`age` INT(11) NOT NULL,
	`info` TEXT NOT NULL,
	`date_sent` DATE NOT NULL,
	`date_replied` DATE,
	`status` INT(11) NOT NULL,
	PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8;
