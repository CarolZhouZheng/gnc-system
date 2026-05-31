-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.4.3 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.14.0.7165
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando datos para la tabla gnc_systembd.categories: ~4 rows (aproximadamente)
INSERT INTO `categories` (`id`, `name`) VALUES
	(1, 'Proteínas'),
	(2, 'Creatinas'),
	(3, 'Vitaminas'),
	(4, 'Pre-entrenos');

-- Volcando datos para la tabla gnc_systembd.products: ~4 rows (aproximadamente)
INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `price`, `stock`, `image`) VALUES
	(16, 4, 'Vitamina C Member Selection', 'Vitamina C', 10000.00, 100, 'vitaminac.webp'),
	(18, 1, 'Omega-3 Member Selection', 'grasa saludable', 14000.00, 100, 'omega3.jpg'),
	(19, 3, 'Creatina', 'Suplemento con más evidencia científica.', 15000.00, 100, 'creatine_monohydrate_91_1_02da21f60e0f00d17f1a448a2bf04ec1.webp'),
	(20, 3, 'BUM Raspberry', 'Potencia el rendimiento físico y mental en las sesiones de fuerza. Maximiza el PUMP!', 18000.00, 100, 'raspberryBUM.webp');

-- Volcando datos para la tabla gnc_systembd.sale_details: ~7 rows (aproximadamente)
INSERT INTO `sale_details` (`id`, `sale_id`, `product_id`, `quantity`, `subtotal`) VALUES
	(1, 6, 18, 1, 10000.00),
	(2, 7, 18, 1, 10000.00),
	(3, 7, 16, 2, 20000.00),
	(4, 8, 16, 2, 20000.00),
	(5, 8, 19, 2, 600000.00),
	(6, 9, 18, 1, 10000.00),
	(7, 10, 16, 1, 10000.00);

-- Volcando datos para la tabla gnc_systembd.sales: ~10 rows (aproximadamente)
INSERT INTO `sales` (`id`, `user_id`, `total`, `sale_date`, `payment_method`, `product_id`, `quantity`) VALUES
	(1, NULL, 20000.00, NULL, NULL, 16, 2),
	(2, NULL, 220000.00, NULL, NULL, 16, 22),
	(3, NULL, 20000.00, NULL, NULL, 2, 2),
	(4, NULL, 9220000.00, NULL, NULL, 2, 922),
	(5, NULL, 230000.00, NULL, NULL, 2, 23),
	(6, NULL, 10000.00, '2026-05-20 18:37:53', 'Efectivo', NULL, NULL),
	(7, NULL, 30000.00, '2026-05-20 19:03:17', 'Efectivo', NULL, NULL),
	(8, NULL, 620000.00, '2026-05-20 20:36:27', 'Efectivo', NULL, NULL),
	(9, NULL, 10000.00, '2026-05-23 17:44:37', 'Efectivo', NULL, NULL),
	(10, 1, 10000.00, '2026-05-23 18:19:55', 'Efectivo', NULL, NULL);

-- Volcando datos para la tabla gnc_systembd.users: ~2 rows (aproximadamente)
INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
	(1, 'Admin', 'admin@gmail.com', 'admin1234', 'admin'),
	(2, 'Carol', 'carito@gmail.com', '1234', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
