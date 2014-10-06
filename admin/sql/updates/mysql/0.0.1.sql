CREATE TABLE IF NOT EXISTS `#__studentmanager_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studentid` int(11) NOT NULL DEFAULT '0',
  `studentname` varchar(256) NOT NULL,
  `classroomid` varchar(256) NOT NULL,
  `parentid` varchar(256) NOT NULL,
  `user_created` int(11) NOT NULL DEFAULT '0',
  `user_modified` int(11) NOT NULL DEFAULT '0',
  `date_created` DATETIME NOT NULL,
  `date_modified` DATETIME NOT NULL,
  `checked_out` int(11) NOT NULL,
  `checked_out_time` DATETIME NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;