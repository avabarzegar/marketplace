-- Create database
CREATE DATABASE IF NOT EXISTS marketplace;

-- Use database
USE marketplace;

-- Create users table
CREATE TABLE users (
    UserID INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(255),
    Email VARCHAR(255),
    Password VARCHAR(255),
    ProfilePicture VARCHAR(255)
);

-- Create categories table
CREATE TABLE categories (
    CategoryID INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(255),
);

-- Create listings table
DROP TABLE products;

CREATE TABLE products (
    ProductID INT PRIMARY KEY AUTO_INCREMENT,
    Title VARCHAR(255),
    Price DECIMAL(10, 2),
    CategoryID INT,
    UserID INT,
    Location VARCHAR(255),
    FOREIGN KEY (CategoryID) REFERENCES categories(CategoryID),
    FOREIGN KEY (UserID) REFERENCES users(UserID)
);

-- Create images table with a single image per listing
CREATE TABLE images (
    ImageID INT PRIMARY KEY AUTO_INCREMENT,
    ProductsID INT UNIQUE,
    ImageURL VARCHAR(255),
    FOREIGN KEY (ProductsID) REFERENCES products(ProductsID)
);

-- relationships:
-- Users - Listings Relationship:
ALTER TABLE listings
ADD CONSTRAINT fk_users_listings FOREIGN KEY (UserID)
REFERENCES users(UserID);

--Listings - Categories Relationship:
--Each listing belongs to one category, but a category can have multiple listings.
ALTER TABLE listings
ADD CONSTRAINT fk_categories_listings FOREIGN KEY (CategoryID)
REFERENCES categories(CategoryID);

--Listings - Images Relationship:
--Each listing can only have one image, each image belongs to only one listing.
ALTER TABLE images
ADD CONSTRAINT fk_images_listings FOREIGN KEY (ListingID)
REFERENCES listings(ListingID);
