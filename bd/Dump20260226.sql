-- MySQL dump 10.13  Distrib 8.0.42, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: pruebamvc
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ambientes`
--

DROP TABLE IF EXISTS `ambientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ambientes` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `ambientesnombre` varchar(60) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `ambientestipo` enum('Ambiente','Taller','Laboratorio') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'Ambiente',
  `ambientesobservacion` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ambientes`
--

LOCK TABLES `ambientes` WRITE;
/*!40000 ALTER TABLE `ambientes` DISABLE KEYS */;
INSERT INTO `ambientes` VALUES (1,'Bilinguismo','Taller','Taller de bilingüismo '),(3,'Hidráulica','Laboratorio','Laboratorio para hidráulica'),(4,'Uno para eliminar','Laboratorio','eliminar'),(6,'Ambiente 308','Taller','ambiente de adso'),(7,'Ambiente 201A','Ambiente','ninguna'),(10,'Ambiente 201','Ambiente','observación ambiente sucio'),(11,'Ambiente 203','Taller','ambiente se encontró sucio'),(12,'Ambiente nuevo','Taller','nuevo ambiente');
/*!40000 ALTER TABLE `ambientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `email` varchar(80) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `password` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `intentos` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Pedro','pedro@gmail.com','123456',0),(2,'Jaime','jaime@gmail.com','$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS',0),(3,'Ernesto','ernesto@gmail.com','9876',0),(4,'Camilo','Camilo@gmail.com','$2a$07$asxx54ahjppf45sd87a5auCtvvfiVuv5ilKJHjBItBcgf9U8mXfL6',0),(8,'ercruz','ercruz@sena.edu.co','123456',0),(12,'ercruz','benavides@gmail.cpm','$2a$07$asxx54ahjppf45sd87a5auxX9WRmhYe69XMj9LGnOrtdmXpAu0ufC',0),(24,'ercruz','nepumuseno@gmail.com','$2a$07$asxx54ahjppf45sd87a5auxX9WRmhYe69XMj9LGnOrtdmXpAu0ufC',0),(29,'ercruz','majo@hotmail.com','$2a$07$asxx54ahjppf45sd87a5auxX9WRmhYe69XMj9LGnOrtdmXpAu0ufC',0),(30,'ercruz','prueba@gmail.com','$2a$07$asxx54ahjppf45sd87a5auxX9WRmhYe69XMj9LGnOrtdmXpAu0ufC',0),(32,'Hector','hectro@hetor.com','3578',0),(45,'Facundo','facundo@gamil.com','$2a$07$asxx54ahjppf45sd87a5auxX9WRmhYe69XMj9LGnOrtdmXpAu0ufC',0),(48,'Carlosastro','carlos@gmail.com','$2a$07$asxx54ahjppf45sd87a5auxX9WRmhYe69XMj9LGnOrtdmXpAu0ufC',0),(49,'cambio','ercruz64@gmail.com','$2a$07$asxx54ahjppf45sd87a5auxX9WRmhYe69XMj9LGnOrtdmXpAu0ufC',0),(50,'Facundo','jaime@gmail.com','$2a$07$asxx54ahjppf45sd87a5au1mMwPFOiFOa2BiMswhkNpbB7hBZc6pa',0),(64,'Facundos','facundo@gamil.coms','$2a$07$asxx54ahjppf45sd87a5auBjH39CLyE6/cIlZbTx1M2782.SW6Emm',0),(66,'Facundoeee','fac@csd.com','$2a$07$asxx54ahjppf45sd87a5auBjH39CLyE6/cIlZbTx1M2782.SW6Emm',0),(67,'Eudoro','eudoro@gmail.com','$2a$07$asxx54ahjppf45sd87a5aujGXJq8AoMNrywiGorVjytofrP.yDeci',0);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-02-26  7:11:29
