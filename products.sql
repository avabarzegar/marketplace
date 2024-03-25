-- Database: `marketplace`
CREATE DATABASE marketplace;
GRANT USAGE ON *.* TO 'avayawing'@'marketplace-assignment2';
GRANT ALL PRIVILEGES ON products.* TO 'avayawing'@'marketplace-assinment2';
FLUSH PRIVILEGES;

USE marketplace;

-- creating table for products

CREATE TABLE IF NOT EXISTS `products` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(100) NOT NULL,
    `price` DECIMAL(10, 2) NOT NULL DEFAULT 0,
    `address` varchar(255) NOT NULL,
    `image` longblob, -- BLOB data type for storing images
    PRIMARY KEY (`id`)
)ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;;

-- inserting data to talbe products

-- Inserting vehicles
INSERT INTO `products` (`name`, `address`, `price`) VALUES 
('Car', '123 Main Street, Toronto, ON', 25000.00),
('Motorcycle', '456 Maple Avenue, Vancouver, BC', 8000.00),
('Truck', '789 Elm Street, Montreal, QC', 35000.00);

-- Inserting clothes
INSERT INTO `products` (`name`, `address`, `price`) VALUES 
('Dress', '321 Oak Street, Edmonton, AB', 50.00),
('T-Shirt', '567 Pine Avenue, Calgary, AB', 20.00),
('Jeans', '890 Cedar Boulevard, Ottawa, ON', 70.00);

-- Inserting home tools
INSERT INTO `products` (`name`, `address`, `price`) VALUES 
('Hammer', '432 Birch Road, Halifax, NS', 15.00),
('Drill', '654 Spruce Lane, Winnipeg, MB', 80.00),
('Screwdriver Set', '987 Birchwood Drive, Quebec City, QC', 30.00);
