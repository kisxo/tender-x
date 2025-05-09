CREATE DATABASE tenderx DEFAULT CHARACTER SET utf8mb4;
USE tenderx;

-- USERS
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  role ENUM('admin', 'user') DEFAULT 'user',
  status ENUM('active', 'inactive') DEFAULT 'active',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- CATEGORIES
CREATE TABLE categories (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL UNIQUE,
  description TEXT
);

-- TENDERS
CREATE TABLE tenders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(200) NOT NULL,
  description TEXT,
  category_id INT,
  posted_by INT,
  budget DECIMAL(12,2),
  deadline DATE,
  status ENUM('open', 'closed', 'awarded') DEFAULT 'open',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (category_id) REFERENCES categories(id),
  FOREIGN KEY (posted_by) REFERENCES users(id)
);

-- BIDS
CREATE TABLE bids (
  id INT AUTO_INCREMENT PRIMARY KEY,
  tender_id INT,
  user_id INT,
  bid_amount DECIMAL(12,2) NOT NULL,
  message TEXT,
  submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (tender_id) REFERENCES tenders(id),
  FOREIGN KEY (user_id) REFERENCES users(id)
);