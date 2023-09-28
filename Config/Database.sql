CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_unique` (`username`)
) ENGINE = InnoDB;

CREATE TABLE `todo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `todo` varchar(255) NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `due_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_todo` (`id_user`),
  CONSTRAINT `fk_users_todo` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE = InnoDB;