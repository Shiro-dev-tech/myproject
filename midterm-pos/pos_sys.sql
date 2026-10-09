-- POS System Final Database Export
-- Generated: 2026-10-09 08:41:03

SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `customers` (`id`, `full_name`, `email`, `phone`, `created_at`) VALUES ('1', 'Juan Dela Cruz', 'juan@gmail.com', '09171234567', '2026-10-04 17:29:43');
INSERT INTO `customers` (`id`, `full_name`, `email`, `phone`, `created_at`) VALUES ('2', 'Pedro Santos', 'pedro@gmail.com', '09181234567', '2026-10-04 17:29:43');
INSERT INTO `customers` (`id`, `full_name`, `email`, `phone`, `created_at`) VALUES ('3', 'Ana Reyes', 'ana@gmail.com', '09191234567', '2026-10-04 17:29:43');
INSERT INTO `customers` (`id`, `full_name`, `email`, `phone`, `created_at`) VALUES ('4', 'Liza Garcia', 'liza@gmail.com', '09201234567', '2026-10-04 17:29:43');
INSERT INTO `customers` (`id`, `full_name`, `email`, `phone`, `created_at`) VALUES ('5', 'Carlo Mendoza', 'carlo@gmail.com', '09211234567', '2026-10-04 17:29:43');

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock_quantity` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `is_archived` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `products` (`id`, `name`, `price`, `stock_quantity`, `image`, `created_at`, `is_archived`) VALUES ('1', 'Notebook', '45.00', '100', 'notebook.jpg', '2026-10-04 18:55:27', '0');
INSERT INTO `products` (`id`, `name`, `price`, `stock_quantity`, `image`, `created_at`, `is_archived`) VALUES ('2', 'Ballpen', '15.00', '198', 'ballpen.jpg', '2026-10-04 18:55:27', '0');
INSERT INTO `products` (`id`, `name`, `price`, `stock_quantity`, `image`, `created_at`, `is_archived`) VALUES ('3', 'Pencil', '10.00', '150', 'pencil.jpg', '2026-10-04 18:55:27', '0');
INSERT INTO `products` (`id`, `name`, `price`, `stock_quantity`, `image`, `created_at`, `is_archived`) VALUES ('4', 'Eraser', '8.00', '120', 'eraser.jpg', '2026-10-04 18:55:27', '1');
INSERT INTO `products` (`id`, `name`, `price`, `stock_quantity`, `image`, `created_at`, `is_archived`) VALUES ('5', 'Ruler 12-inch', '25.00', '80', 'ruler.jpg', '2026-10-04 18:55:27', '0');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`id`, `username`, `full_name`, `password`, `avatar`, `created_at`) VALUES ('1', 'admin', 'John Cruz', '$2y$10$gkEYTXjfHuT6wnUPozyiHukup/GydGBXf22qZAqjElgrcTb4vb6sC', 'avatar1.jpg', '2026-10-04 18:43:57');
INSERT INTO `users` (`id`, `username`, `full_name`, `password`, `avatar`, `created_at`) VALUES ('2', 'maria', 'Maria Santos', '', 'avatar2.jpg', '2026-10-04 18:43:57');
INSERT INTO `users` (`id`, `username`, `full_name`, `password`, `avatar`, `created_at`) VALUES ('3', 'mark', 'Mark Reyes', '', 'avatar3.jpg', '2026-10-04 18:43:57');
INSERT INTO `users` (`id`, `username`, `full_name`, `password`, `avatar`, `created_at`) VALUES ('4', 'anna', 'Anna Garcia', '', 'avatar4.jpg', '2026-10-04 18:43:57');
INSERT INTO `users` (`id`, `username`, `full_name`, `password`, `avatar`, `created_at`) VALUES ('5', 'paul', 'Paul Mendoza', '', 'avatar5.jpg', '2026-10-04 18:43:57');

DROP TABLE IF EXISTS `sales`;
CREATE TABLE `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `sold_by` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `customer_id` (`customer_id`),
  KEY `sold_by` (`sold_by`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `sales` (`id`, `product_id`, `customer_id`, `sold_by`, `quantity`, `total_price`, `created_at`) VALUES ('1', '1', '1', '1', '2', '90.00', '2026-10-04 18:56:02');
INSERT INTO `sales` (`id`, `product_id`, `customer_id`, `sold_by`, `quantity`, `total_price`, `created_at`) VALUES ('2', '2', '2', '2', '5', '75.00', '2026-10-04 18:56:02');
INSERT INTO `sales` (`id`, `product_id`, `customer_id`, `sold_by`, `quantity`, `total_price`, `created_at`) VALUES ('3', '3', '3', '3', '10', '100.00', '2026-10-04 18:56:02');
INSERT INTO `sales` (`id`, `product_id`, `customer_id`, `sold_by`, `quantity`, `total_price`, `created_at`) VALUES ('4', '4', '4', '4', '3', '24.00', '2026-10-04 18:56:02');
INSERT INTO `sales` (`id`, `product_id`, `customer_id`, `sold_by`, `quantity`, `total_price`, `created_at`) VALUES ('5', '5', '5', '5', '2', '50.00', '2026-10-04 18:56:02');
INSERT INTO `sales` (`id`, `product_id`, `customer_id`, `sold_by`, `quantity`, `total_price`, `created_at`) VALUES ('6', '2', '1', '1', '2', '30.00', '2026-10-09 08:19:48');

SET FOREIGN_KEY_CHECKS=1;
