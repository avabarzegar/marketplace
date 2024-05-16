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
    `ProductsID` INT PRIMARY KEY AUTO_INCREMENT,
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
    `ProductsID` INT,
    `ListingID` INT,
    `ImageURL` VARCHAR(255),
    FOREIGN KEY (`ProductsID`) REFERENCES `products`(`ProductsID`),
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
