CREATE TABLE IF NOT EXISTS `hashes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Unique ID',
  `hash` varchar(32) DEFAULT NULL COMMENT 'Hash of resource',
  `uri` varchar(256) DEFAULT NULL COMMENT 'Path of resource',
  `type` tinyint(4) DEFAULT '1' COMMENT '1 - Video, 2 - Thumbnail',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'Creation time',
  PRIMARY KEY (`id`),
  UNIQUE KEY `hash` (`hash`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `languages` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Unique ID',
  `english` varchar(256) DEFAULT NULL COMMENT 'Language name in English',
  `original` varchar(256) DEFAULT NULL COMMENT 'Language name in its own',
  `iso` varchar(256) DEFAULT NULL COMMENT 'ISO standard code',
  `enabled` tinyint(2) unsigned DEFAULT NULL COMMENT 'Usability',
  `ltr` tinyint(2) unsigned DEFAULT NULL COMMENT 'Left to right?',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

DELETE FROM `languages`;

INSERT INTO `languages` (`id`, `english`, `original`, `iso`, `enabled`, `ltr`) VALUES
	(1, 'English', 'English', 'en', 1, 1),
	(2, 'Chinese Simplified', '中文（简体）', 'zh-cn', 1, 1),
	(3, 'Chinese Traditional', '中文（繁體）', 'zh-tw', 0, 1),
	(4, 'Korean', '한국어', 'ko', 1, 1),
	(5, 'Russian', 'Русский', 'ru', 1, 1),
	(6, 'Japanese', '日本語', 'ja', 1, 1),
	(7, 'Arabic', 'العربية', 'ar', 0, 0),
	(8, 'Bulgarian', 'български език', 'bg', 0, 1),
	(9, 'Czech', 'Český Jazyk', 'cs', 0, 1),
	(10, 'Danish', 'Dansk', 'da', 0, 1),
	(11, 'Dutch', 'Nederlands', 'nl', 1, 1),
	(12, 'Burmese', 'မြန်မာစာ', 'my', 0, 1),
	(13, 'Finnish', 'Suomi', 'fi', 0, 1),
	(14, 'French', 'Français', 'fr', 1, 1),
	(15, 'German', 'Deutsch', 'de', 1, 1),
	(16, 'Greek', 'Ελληνικά', 'el', 1, 1),
	(17, 'Hungarian', 'Magyar', 'hu', 0, 1),
	(18, 'Italian', 'Italiano', 'it', 1, 1),
	(19, 'Polish', 'Język polski', 'pl', 0, 1),
	(20, 'Portuguese', 'Português', 'pt', 1, 1),
	(21, 'Romanian', 'Română', 'ro', 0, 1),
	(22, 'Spanish', 'Español', 'es', 1, 1),
	(23, 'Swedish', 'Svenska', 'sv', 0, 1),
	(24, 'Thai', 'ภาษาไทย', 'th', 0, 1),
	(25, 'Vietnamese', 'Tiếng Việt Nam', 'vi', 0, 1);

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) DEFAULT NULL COMMENT '1 - Login, 2 - Wrong Password, 3 - Request to Reset Password, 4 - Reset Password, 5 - Upload Media, 6 - Download Request',
  `user_id` int(11) DEFAULT NULL,
  `video_id` int(11) DEFAULT NULL,
  `from_ip` varchar(15) DEFAULT NULL,
  `initiated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `pull_requests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `video_id` int(10) unsigned DEFAULT NULL,
  `consumer_id` tinyint(3) unsigned DEFAULT NULL,
  `initiated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(128) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `initiated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `trans_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `video_id` int(10) unsigned DEFAULT NULL,
  `language_id` tinyint(3) unsigned DEFAULT NULL,
  `status_id` tinyint(3) unsigned DEFAULT '1',
  `issued_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `users` (
  `id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Unique ID',
  `username` varchar(32) DEFAULT NULL COMMENT 'Username',
  `password` varchar(32) DEFAULT NULL COMMENT 'Password',
  `email` varchar(64) DEFAULT NULL COMMENT 'Email address',
  `status` tinyint(3) unsigned DEFAULT NULL COMMENT '1 - inactive, 2 - active, 3 - disabled',
  `role` tinyint(3) unsigned DEFAULT NULL COMMENT '1 - admin, 2 - uploader, 3 - consumer',
  `firstname` varchar(64) DEFAULT NULL COMMENT 'First name',
  `lastname` varchar(64) DEFAULT NULL COMMENT 'Last name',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'Creation time',
  `last_login` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Last login time',
  `last_ip` varchar(19) DEFAULT NULL COMMENT 'Last login IP address',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `user_roles` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `user_roles` (`id`, `name`) VALUES
	(1, 'Administrator'),
	(2, 'Upload/Clip Manager'),
	(3, 'Consumer');


CREATE TABLE IF NOT EXISTS `user_status` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `user_status` (`id`, `title`) VALUES
	(1, 'Inactive'),
	(2, 'Active'),
	(3, 'Disabled');

CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Unique ID',
  `resource_hash` int(11) unsigned DEFAULT NULL COMMENT 'Video hash ID',
  `title` varchar(256) DEFAULT NULL COMMENT 'Video title',
  `description` varchar(2048) DEFAULT NULL COMMENT 'Video description',
  `origin` tinyint(3) unsigned DEFAULT NULL COMMENT 'Original language of video',
  `uploader` tinyint(3) unsigned DEFAULT NULL COMMENT 'Uploader ID',
  `uploaded_time` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'Uploaded time',
  `languages_into` varchar(1024) DEFAULT NULL COMMENT 'Languages, that should translated into',
  `consumers_to` varchar(1024) DEFAULT NULL COMMENT 'Consumers, that can request to pull',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `video_status` (
  `id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
  `title` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `video_status` (`id`, `title`) VALUES
	(1, 'Uploaded'),
	(2, 'Translating...'),
	(3, 'Under review'),
	(4, 'Published');