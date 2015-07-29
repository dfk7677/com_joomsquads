
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
	`image` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
)
ENGINE =MyISAM
DEFAULT CHARSET =utf8;

CREATE TABLE IF NOT EXISTS `#__jsq_playerssquads` (
  `squad_id` int(11) NOT NULL default "0",
  `player_id` int(11) NOT NULL default '0',
  `position` VARCHAR(255) NOT NULL default '0',
  `squad_ordering` int(11) NOT NULL default "1",
	PRIMARY KEY (`squad_id`,`player_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ;
