
CREATE TABLE `#__jsq_players` (
	`id`       INT(11)  auto_increment   NOT NULL,
	`nickname` VARCHAR(255) NOT NULL,
	`first_name` VARCHAR(255) NOT NULL,
	`last_name` VARCHAR(255) NOT NULL,
	`image` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
)
ENGINE =MyISAM
DEFAULT CHARSET =utf8;

CREATE TABLE `#__jsq_squads` (
	`id`       INT(11)  auto_increment   NOT NULL,
	`name` VARCHAR(255) NOT NULL,
	`short_name` VARCHAR(255) NOT NULL,
	`ordering`       INT(11)     NOT NULL,
	`published`		TINYINT(4) NOT NULL DEFAULT '0',
	`image` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
)
ENGINE =MyISAM
DEFAULT CHARSET =utf8;

CREATE TABLE IF NOT EXISTS `#__jsq_playerssquads` (
  `squad_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `position` VARCHAR(255) NOT NULL,
  `squad_ordering` int(11) NOT NULL,
	PRIMARY KEY (`squad_id`,`player_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ;
