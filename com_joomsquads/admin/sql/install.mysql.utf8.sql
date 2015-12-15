
CREATE TABLE IF NOT EXISTS `#__jsq_players` (
	`id`       INT(11)  auto_increment   NOT NULL,
	`nickname` VARCHAR(255) NOT NULL,
	`first_name` VARCHAR(255) NOT NULL,
	`last_name` VARCHAR(255) NOT NULL,
	`image` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__jsq_squads` (
	`id`       INT(11)  auto_increment   NOT NULL,
	`name` VARCHAR(255) NOT NULL,
	`short_name` VARCHAR(255) NOT NULL,
	`ordering`       INT(11)     NOT NULL,
	`published`		TINYINT(4) NOT NULL DEFAULT '0',
	`image` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__jsq_playerssquads` (
  `squad_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `position` VARCHAR(255) NOT NULL,
  `squad_ordering` int(11) NOT NULL,
	PRIMARY KEY (`squad_id`,`player_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

CREATE TABLE IF NOT EXISTS `#__jsq_achievements` (
  `id`       INT(11)  auto_increment   NOT NULL,
  `place` int(11) NOT NULL,
  `squad` VARCHAR(255) NOT NULL,
  `date_won` DATE NOT NULL,
  `competition` VARCHAR(255) NOT NULL,
  `competition_url` VARCHAR(255) NOT NULL,
  `prizepot` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

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

