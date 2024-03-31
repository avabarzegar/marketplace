CREATE TABLE IF NOT EXISTS `users` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(100) NOT NULL,
    `email` varchar(150) NOT NULL, 
    `password` varchar(40) NOT NULL,
    PRIMARY KEY(`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;


INSERT INTO `users` (`id`, `name`, `email`, `password`)
VALUES (1, 'Anna', 'a@gmail.com', 'password1'),
(2, 'Bob', 'b@gmail.com', 'password2');