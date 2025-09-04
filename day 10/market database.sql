DROP DATABASE IF EXISTS market;
CREATE DATABASE market;
use market;

CREATE TABLE `users`(
    `id` int(30) unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
	`name` varchar(30) NOT NULL,
    `email` varchar(30) NOT NULL UNIQUE,
    `password` varchar(30) NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE `categories`(
	`id` int(30) unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `name` varchar(30) NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE `products`(
    `id` int(30) unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
	`name` varchar(30) NOT NULL,
    `description` TEXT,
    `price` DECIMAL(10,2) NOT NULL,
    `quantity` int NOT NULL,
    `category_id` int(30) unsigned NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`category_id`) REFERENCES `categories`(`id`) ON DELETE CASCADE ON UPDATE CASCADE   
);
CREATE TABLE `orders`(
	`id` int(30) unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `total` DECIMAL(10,2) NOT NULL DEFAULT 0,
    `user_id` int(30) unsigned NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE SET NULL ON UPDATE CASCADE
);

CREATE TABLE `order_products`(
	`order_id` int(30) unsigned NOT NULL,
    `product_id` int(30) unsigned NOT NULL,
    `price` int NOT NULL,
    `quantity` int NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`order_id`) REFERENCES `orders`(`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`product_id`) REFERENCES `products`(`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    PRIMARY KEY(`order_id`, `product_id`)
);

-- inserting data 

-- users
INSERT INTO users (name, email, password, created_at) VALUES
('Alice', 'alice@example.com', 'pass123', '2025-01-10'),
('Bob', 'bob@example.com', 'pass123', '2025-02-15'),
('Charlie', 'charlie@example.com', 'pass123', '2025-03-05'),
('Diana', 'diana@example.com', 'pass123', '2025-04-20'),
('Ethan', 'ethan@example.com', 'pass123', '2025-05-12'),
('Fiona', 'fiona@example.com', 'pass123', '2025-06-22');

-- categories
INSERT INTO categories (name, created_at) VALUES
('Electronics', '2025-01-01'),
('Clothing', '2025-01-01'),
('Books', '2025-01-01'),
('Home Appliances', '2025-01-01'),
('Sports', '2025-01-01'),
('Beauty', '2025-01-01');


-- products
INSERT INTO products (name, description, price, quantity, category_id, created_at) VALUES
('Laptop', 'High performance laptop', 1200.00, 10, 1, '2025-01-05'),
('Headphones', 'Noise cancelling headphones', 150.00, 20, 1, '2025-01-08'),
('T-Shirt', 'Cotton t-shirt', 25.00, 50, 2, '2025-02-02'),
('Jeans', 'Blue denim jeans', 60.00, 30, 2, '2025-02-10'),
('Novel', 'Fictional novel', 15.00, 100, 3, '2025-03-12'),
('Textbook', 'Educational textbook', 80.00, 40, 3, '2025-03-15'),
('Microwave', 'Kitchen microwave oven', 200.00, 15, 4, '2025-04-01'),
('Football', 'Standard size football', 50.00, 25, 5, '2025-04-10'),
('Perfume', 'Luxury perfume', 90.00, 12, 6, '2025-05-18'),
('Blender', 'Juicer blender', 120.00, 18, 4, '2025-06-01');


-- orders
INSERT INTO orders (user_id, created_at) VALUES
(1, '2025-01-15'), -- Alice
(1, '2025-02-20'),   -- Alice
(2, '2025-02-25'),   -- Bob
(2, '2025-03-05'),   -- Bob
(3, '2025-07-01'), -- Charlie (current month July)
(4, '2025-07-02'),   -- Diana (current month July)
(5, '2025-04-15'),  -- Ethan
(5, '2025-05-18'),  -- Ethan
(6, '2025-06-20'),  -- Fiona
(6, '2025-07-03');  -- Fiona (current month July)


-- order products
-- Order 1 (Alice, Jan)
INSERT INTO order_products (order_id, product_id, price, quantity, created_at) VALUES
(1, 1, 1200, 1, '2025-01-15'),
(1, 2, 150, 1, '2025-01-15');

-- Order 2 (Alice, Feb)
INSERT INTO order_products (order_id, product_id, price, quantity, created_at) VALUES
(2, 3, 25, 2, '2025-02-20'),
(2, 4, 60, 1, '2025-02-20');

-- Order 3 (Bob, Feb)
INSERT INTO order_products (order_id, product_id, price, quantity, created_at) VALUES
(3, 4, 60, 1, '2025-02-25');

-- Order 4 (Bob, Mar)
INSERT INTO order_products (order_id, product_id, price, quantity, created_at) VALUES
(4, 5, 15, 1, '2025-03-05'),
(4, 3, 25, 2, '2025-03-05'),
(4, 4, 60, 1, '2025-03-05');

-- Order 5 (Charlie, July)
INSERT INTO order_products (order_id, product_id, price, quantity, created_at) VALUES
(5, 1, 1200, 1, '2025-07-01');

-- Order 6 (Diana, July)
INSERT INTO order_products (order_id, product_id, price, quantity, created_at) VALUES
(6, 5, 15, 2, '2025-07-02'),
(6, 6, 80, 1, '2025-07-02');

-- Order 7 (Ethan, Apr)
INSERT INTO order_products (order_id, product_id, price, quantity, created_at) VALUES
(7, 7, 200, 1, '2025-04-15'),
(7, 8, 50, 2, '2025-04-15');

-- Order 8 (Ethan, May)
INSERT INTO order_products (order_id, product_id, price, quantity, created_at) VALUES
(8, 9, 90, 2, '2025-05-18'),
(8, 3, 25, 4, '2025-05-18');

-- Order 9 (Fiona, Jun)
INSERT INTO order_products (order_id, product_id, price, quantity, created_at) VALUES
(9, 10, 120, 1, '2025-06-20'),
(9, 4, 60, 1, '2025-06-20'),
(9, 3, 25, 1, '2025-06-20');

-- Order 10 (Fiona, Jul)
INSERT INTO order_products (order_id, product_id, price, quantity, created_at) VALUES
(10, 2, 150, 1, '2025-07-03'),
(10, 5, 15, 1, '2025-07-03');


-- update orders total
UPDATE orders
SET total = (
    SELECT SUM(quantity * price)
    FROM order_products
    WHERE order_products.order_id = orders.id
);


-- transaction 
-- trigger  => event function call when another action done => insert, delete, update
-- loops
-- if 
-- declare variable
-- set value to variable