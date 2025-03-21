-- CREATE DATABASE Rent_Inn;
use Rent_Inn;

-- create different tables;
-- user tables
CREATE TABLE users(
user_id INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(50) NOT NULL UNIQUE,
password VARCHAR(255) NOT NULL,
user_role ENUM('landlord', 'tenant') NOT NULL,
email VARCHAR(100) NOT NULL UNIQUE,
phone VARCHAR(15),
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
-- Properties table
CREATE TABLE properties(
property_id INT AUTO_INCREMENT PRIMARY KEY,
user_id INT,
address VARCHAR(255) NOT NULL,
city VARCHAR(100) NOT NULL,
rent_amount DECIMAL(10, 2) NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

--  Payments table
CREATE TABLE payments(
payment_id INT AUTO_INCREMENT PRIMARY KEY,
property_id INT,
tenant_id INT,
amount DECIMAL(10,2) NOT NULL,
payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
status ENUM('pending', 'completed','failde') NOT NULL,
FOREIGN KEY(property_id) REFERENCES properties(property_id) ON DELETE CASCADE,
FOREIGN KEY(tenant_id) REFERENCES users(user_id) ON DELETE CASCADE
);

-- feedback table

CREATE TABLE feedback(
feedback_id INT AUTO_INCREMENT PRIMARY KEY,
tenant_id INT,
property_id INT,
message TEXT NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (tenant_id) REFERENCES users(user_id) ON DELETE CASCADE,
FOREIGN KEY (property_id) REFERENCES properties(property_id) ON DELETE CASCADE
);

-- testimonials table
CREATE TABLE testimonials(
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100) NOT NULL,
text TEXT NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- alter testimonial table to add profile_picture 
ALTER TABLE testimonials ADD COLUMN profile_picture VARCHAR(255) DEFAULT NULL;

-- create new testimonial table
-- Step 1: Create a new testimonials table with user_id as the first column  
CREATE TABLE new_testimonials (  
    user_id INT NOT NULL,  
    id INT AUTO_INCREMENT PRIMARY KEY,  
    name VARCHAR(100) NOT NULL,  
    text TEXT NOT NULL,  
    profile_picture VARCHAR(255) DEFAULT NULL,  
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP  
);  

-- Step 4: Rename the new testimonials table to testimonials  
ALTER TABLE new_testimonials RENAME TO testimonials;  
