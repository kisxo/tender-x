-- Some test data of tenderx webapp
INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `status`, `created_at`) VALUES (NULL, 'Uday Subba', 'udaysubba2004@gmail.com', SHA1('12345'), 'admin', 'active', current_timestamp()), (NULL, 'Rahul Saikia', 'rahulsaikia682@gmail.com', SHA1('12345'), 'user', 'active', current_timestamp())

-- Demo categories
INSERT INTO categories (name, description) VALUES
('Construction', 'All tenders related to construction projects, including building, roads, bridges, and other civil works.'),
('IT Services', 'Technology services, including software development, IT infrastructure, and cloud solutions.'),
('Healthcare', 'Tenders for medical services, healthcare equipment, pharmaceuticals, and hospital infrastructure.'),
('Education', 'Tenders related to schools, universities, and educational infrastructure projects.'),
('Transportation', 'Tenders in the transport sector including roads, railways, and logistics services.');