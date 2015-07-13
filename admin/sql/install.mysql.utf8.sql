
CREATE TABLE `#__jsq_players` (
	`id`       INT(11)     NOT NULL,
	`nickname` VARCHAR(255) NOT NULL,
	`first_name` VARCHAR(255) NOT NULL,
	`last_name` VARCHAR(255) NOT NULL,
	`position` VARCHAR(255) NOT NULL,
	`squad_id`       INT(11)     NOT NULL,
	`ordering`       INT(11)     NOT NULL,
	PRIMARY KEY (`id`)
)
ENGINE =MyISAM
DEFAULT CHARSET =utf8;

CREATE TABLE `#__jsq_squads` (
	`id`       INT(11)  auto_increment   NOT NULL,
	`name` VARCHAR(255) NOT NULL,
	`short_name` VARCHAR(255) NOT NULL,
	`ordering`       INT(11)     NOT NULL,
	PRIMARY KEY (`id`)
)
ENGINE =MyISAM
DEFAULT CHARSET =utf8;

