-- Database: `marketplace`
CREATE DATABASE marketplace;
GRANT USAGE ON *.* TO 'avayawing'@'marketplace-assignment2';
GRANT ALL PRIVILEGES ON products.* TO 'avayawing'@'marketplace-assinment2';
FLUSH PRIVILEGES;

USE marketplace;


--** You Need to copy from here **--

-- drop table
DROP TABLE `products`;

-- creating table for products

CREATE TABLE IF NOT EXISTS `products` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(100) NOT NULL,
    `price` DECIMAL(10, 2) NOT NULL DEFAULT 0,
    `address` varchar(255) NOT NULL,
    `image_path` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
)ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;;

-- inserting data to talbe products

-- Inserting vehicles
INSERT INTO `products` (`name`, `address`, `price`, `image_path`) VALUES 
('Car', '123 Main Street, Toronto, ON', 25000.00, 'C:\xampp\htdocs\marketplace-master\images\car.jpg'),
('Motorcycle', '456 Maple Avenue, Vancouver, BC', 8000.00, 'C:\xampp\htdocs\marketplace-master\images\motor.jpg'),
('Truck', '789 Elm Street, Montreal, QC', 35000.00, 'C:\xampp\htdocs\marketplace-master\images\truck.jpg');

-- Inserting clothes
INSERT INTO `products` (`name`, `address`, `price`, `image_path`) VALUES 
('Dress', '321 Oak Street, Edmonton, AB', 50.00, 'C:\xampp\htdocs\marketplace-master\images\dress.jpg'),
('T-Shirt', '567 Pine Avenue, Calgary, AB', 20.00, 'C:\xampp\htdocs\marketplace-master\images\tshirt.jpg'),
('Jeans', '890 Cedar Boulevard, Ottawa, ON', 70.00, 'C:\xampp\htdocs\marketplace-master\images\jeans.jpg');

-- Inserting home tools
INSERT INTO `products` (`name`, `address`, `price`, `image_path`) VALUES 
('Hammer', '432 Birch Road, Halifax, NS', 15.00, 'C:\xampp\htdocs\marketplace-master\images\hammer.jpg'),
('Drill', '654 Spruce Lane, Winnipeg, MB', 80.00, 'C:\xampp\htdocs\marketplace-master\images\drill.jpg'),
('Screwdriver Set', '987 Birchwood Drive, Quebec City, QC', 30.00, 'C:\xampp\htdocs\marketplace-master\images\screw.jpg');


