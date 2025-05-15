-- Create database
CREATE DATABASE tenderx;

-- create tables
-- USERS
CREATE TABLE users (
  id SERIAL PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  role TEXT CHECK (role IN ('admin', 'user')) DEFAULT 'user',
  status TEXT CHECK (status IN ('active', 'inactive')) DEFAULT 'active',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- CATEGORIES
CREATE TABLE categories (
  id SERIAL PRIMARY KEY,
  name VARCHAR(100) NOT NULL UNIQUE,
  description TEXT
);

-- TENDERS
CREATE TABLE tenders (
  id SERIAL PRIMARY KEY,
  title VARCHAR(200) NOT NULL,
  description TEXT,
  category_id INT REFERENCES categories(id),
  posted_by INT REFERENCES users(id),
  budget NUMERIC(12,2),
  deadline DATE,
  location VARCHAR(100) NOT NULL,
  status TEXT CHECK (status IN ('open', 'closed', 'awarded')) DEFAULT 'open',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- BIDS
CREATE TABLE bids (
  id SERIAL PRIMARY KEY,
  tender_id INT REFERENCES tenders(id),
  user_id INT REFERENCES users(id),
  bid_amount NUMERIC(12,2) NOT NULL,
  message TEXT,
  submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);