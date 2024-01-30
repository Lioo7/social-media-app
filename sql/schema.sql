CREATE TABLE IF NOT EXISTS `user` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `first_name` VARCHAR(255) NOT NULL,
  `last_name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `birthdate` DATE NOT NULL,
  `is_active` BOOLEAN NOT NULL
);

CREATE TABLE IF NOT EXISTS `post` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `content` TEXT NOT NULL,
  `creation_date` DATETIME NOT NULL,
  `is_active` BOOLEAN NOT NULL,
  FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
);

CREATE TABLE IF NOT EXISTS `posts_per_hour` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `date` DATE NOT NULL,
  `hour` INT NOT NULL,
  `post_count` INT NOT NULL
);
