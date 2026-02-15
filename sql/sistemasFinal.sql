-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.32-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.13.0.7147
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para sistemasfinal
DROP DATABASE IF EXISTS `sistemasfinal`;
CREATE DATABASE `sistemasfinal` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sistemasfinal`;

-- Volcando estructura para tabla sistemasfinal.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`username`, `password`) VALUES ('root', 'root');

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla sistemasfinal.viajes
CREATE TABLE IF NOT EXISTS `viajes` (
  `id_viaje` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `presupuesto` decimal(10,2) DEFAULT NULL,
  `destacado` tinyint(1) DEFAULT 0,
  `tipo_viaje` varchar(50) DEFAULT NULL,
  `plazas` int(11) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_viaje`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `viajes` 
(`titulo`, `tipo_viaje`, `destacado`, `descripcion`, `imagen`, `fecha_inicio`, `fecha_fin`, `precio`, `presupuesto`, `plazas`) 
VALUES 
('Japón: siente la cultura', 'Ciudad', 1, 'Un viaje increíble recorriendo desde los templos de Kioto hasta los neones de Tokio. Incluye ruta por los Alpes Japoneses. Excursiones de cosas interesantes para probar esto va a ser un texto largo de prueba', 'japon.jpg', '2024-05-10', '2024-05-25', 2450.00, 3000.00, 15),

('Perú: nuevas sensaciones', 'Montaña', 1, 'Una ruta mágica por los Andes hasta llegar a la ciudad perdida de Machu Picchu. Gastronomía y cultura viva.', 'peru.jpg', '2024-06-01', '2024-06-15', 1890.50, 2200.00, 20),

('image', 'Ciudad', 0, '1111121212123132', 'prueba.jpg', '2024-07-05', '2024-07-10', 450.00, 600.00, 10),

('España', 'Playa', 0, 'Descripcion', 'paris.png', '2024-08-01', '2024-08-15', 1200.00, 1500.00, 30),

('Capadocia', 'Montaña', 0, 'Turquía la Capdocia', 'capadocia.jpg', '2024-09-10', '2024-09-20', 1650.00, 1900.00, 18);

-- La exportación de datos fue deseleccionada.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
