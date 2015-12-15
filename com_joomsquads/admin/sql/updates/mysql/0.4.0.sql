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