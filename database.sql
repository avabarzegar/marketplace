-- Database: `marketplace`
CREATE DATABASE marketplace;
GRANT USAGE ON *.* TO 'avayawing'@'marketplace-assignment2';
GRANT ALL PRIVILEGES ON products.* TO 'avayawing'@'marketplace-assinment2';
FLUSH PRIVILEGES;

USE marketplace;


--** You Need to copy from here **--
-- Use database
USE `marketplace`;

-- Drop Tables if they exist
DROP TABLE IF EXISTS `images`;
DROP TABLE IF EXISTS `products`;
DROP TABLE IF EXISTS `listings`;
DROP TABLE IF EXISTS `categories`;
DROP TABLE IF EXISTS `users`;

-- Create users table
CREATE TABLE `users` (
    `UserID` INT PRIMARY KEY AUTO_INCREMENT,
    `Name` VARCHAR(255),
    `Email` VARCHAR(255),
    `Password` VARCHAR(255)
);

-- Create categories table
CREATE TABLE `categories` (
    `CategoryID` INT PRIMARY KEY AUTO_INCREMENT,
    `Name` VARCHAR(255)
);

-- Create listings table
CREATE TABLE `listings` (
    `ListingID` INT PRIMARY KEY AUTO_INCREMENT,
    `UserID` INT,
    `CategoryID` INT,
    FOREIGN KEY (`UserID`) REFERENCES `users`(`UserID`),
    FOREIGN KEY (`CategoryID`) REFERENCES `categories`(`CategoryID`)
);

-- Create products table
CREATE TABLE `products` (
    `ProductID` INT PRIMARY KEY AUTO_INCREMENT,
    `Title` VARCHAR(255),
    `Price` DECIMAL(10, 2),
    `CategoryID` INT,
    `UserID` INT,
    `Location` VARCHAR(255),
    FOREIGN KEY (`CategoryID`) REFERENCES `categories`(`CategoryID`),
    FOREIGN KEY (`UserID`) REFERENCES `users`(`UserID`)
);

-- Create images table with a single image per listing
CREATE TABLE `images` (
    `ImageID` INT PRIMARY KEY AUTO_INCREMENT,
    `ProductID` INT,
    `ListingID` INT,
    `ImageURL` VARCHAR(255),
    FOREIGN KEY (`ProductID`) REFERENCES `products`(`ProductID`),
    FOREIGN KEY (`ListingID`) REFERENCES `listings`(`ListingID`)
);

-- Add Relationships
ALTER TABLE `listings`
ADD CONSTRAINT `fk_users_listings` FOREIGN KEY (`UserID`)
REFERENCES `users`(`UserID`);

ALTER TABLE `listings`
ADD CONSTRAINT `fk_categories_listings` FOREIGN KEY (`CategoryID`)
REFERENCES `categories`(`CategoryID`);

ALTER TABLE `images`
ADD CONSTRAINT `fk_images_listings` FOREIGN KEY (`ListingID`)
REFERENCES `listings`(`ListingID`);

-- ** Inserting **
-- Inserting into categories
INSERT INTO `categories` (`Name`) VALUES 
('Electronics'),
('Clothing'),
('Books'),
('Furniture'),
('Automotive'),
('Other');

-- Inserting some users
INSERT INTO `users` (`Name`, `Email`, `Password`)
VALUES
('Aya', 'aya@gmail.com', '12345'),
('Ava', 'ava@gmail.com', '12345');

-- Inserting Random values to products table
INSERT INTO `products` (`Title`, `Price`, `CategoryID`, `UserID`, `Location`)
VALUES
('Laptop', 999.99, 1, 1, '123 Main St, Toronto, ON'), -- Electronics
('T-Shirt', 19.99, 2, 1, '456 Elm St, Vancouver, BC'), -- Clothing
('Book', 29.99, 3, 2, '789 Oak St, Montreal, QC'), -- Books
('Sofa', 699.99, 4, 2, '321 Maple St, Calgary, AB'), -- Furniture
('Jeans', 49.99, 2, 2, '555 Pine St, Ottawa, ON'), -- Clothing
('Smartphone', 499.99, 1, 1, '777 Birch St, Edmonton, AB'), -- Electronics
('Car', 19999.99, 5, 2, '888 Cedar St, Halifax, NS'), -- Automotive
('Tire', 99.99, 5, 2, '999 Spruce St, Winnipeg, MB'), -- Automotive
('Desk', 199.99, 6, 1, '111 Elm St, Saskatoon, SK'), -- Other
('Hat', 9.99, 2, 2, '222 Birch St, Victoria, BC'); -- Clothing
