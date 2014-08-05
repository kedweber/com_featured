-- ----------------------------
--  Table structure for `#__featured_types`
-- ----------------------------
CREATE TABLE IF NOT EXISTS `#__featured_types` (
  `featured_type_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) NOT NULL,
  `title` varchar(255) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `published_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `locked_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `locked_by` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`featured_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `#__featured_types`
-- ----------------------------
CREATE TABLE IF NOT EXISTS `#__featured_nodes` (
  `row` int(11) NOT NULL,
  `table` varchar(255) NOT NULL DEFAULT '1',
  `uuid` char(36) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `published_on` date NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`row`,`table`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;