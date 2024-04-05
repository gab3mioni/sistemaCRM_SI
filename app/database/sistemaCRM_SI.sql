DROP DATABASE IF EXISTS `sistemaCRM`;
CREATE DATABASE IF NOT EXISTS `sistemaCRM`;
USE `sistemaCRM`;

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin`(
  `id` int(11) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`idaprovacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `cpf` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
)