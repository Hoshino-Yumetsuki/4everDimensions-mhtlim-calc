-- Minimal schema for mhtlim-calc (derived from PHP usage)
SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

CREATE TABLE IF NOT EXISTS `cha_stat` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip` VARCHAR(255) NOT NULL,
  `ms` DOUBLE NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_ms` (`ms`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `user_users` (
  `id` VARCHAR(36) NOT NULL,
  `regDate` DATETIME NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `nickName` VARCHAR(60) NOT NULL,
  `status` VARCHAR(32) NOT NULL DEFAULT 'NORMAL',
  `loginName` VARCHAR(48) NOT NULL,
  `loginToken` VARCHAR(48) NOT NULL,
  `regIP` VARCHAR(255) DEFAULT NULL,
  `authInfo` TEXT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_loginName` (`loginName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `user_saves` (
  `uid` VARCHAR(36) NOT NULL,
  `selfid` VARCHAR(36) NOT NULL,
  `title` VARCHAR(1024) NOT NULL,
  `score` VARCHAR(1024) NOT NULL,
  `description` VARCHAR(2048) NOT NULL,
  `content` LONGTEXT NOT NULL,
  `owner` VARCHAR(36) NOT NULL,
  `datetime` DATETIME NOT NULL,
  PRIMARY KEY (`uid`),
  KEY `idx_owner_datetime` (`owner`, `datetime`),
  KEY `idx_owner_selfid` (`owner`, `selfid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `site_info` (
  `name` VARCHAR(64) NOT NULL,
  `value` TEXT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

SET FOREIGN_KEY_CHECKS = 1;