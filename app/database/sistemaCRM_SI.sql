DROP DATABASE IF EXISTS `sistemaCRM`;
CREATE DATABASE IF NOT EXISTS `sistemaCRM`;
USE `sistemaCRM`;

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `razao` varchar(100) NOT NULL,
  `cnpj` varchar(14) NOT NULL,
  `ramo` varchar(45) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `vendas`;
CREATE TABLE IF NOT EXISTS `vendas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `razao` varchar(100) NOT NULL,
  `cnpj` varchar(14) NOT NULL,
  `itens` varchar(100) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor` float NOT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- INSERINDO DADOS PARA TESTES

INSERT INTO `admin` (`id`, `usuario`, `email`, `senha`) VALUES
 (1, 'admin', 'admin@gmail.com', '123'),
 (2, 'gabriel', 'gabriel@gmail.com', 'gabriel123'),
 (3, 'melissa', 'melissa@gmail.com', 'melissa123');

INSERT INTO `clientes` (`id`, `razao`, `cnpj`, `ramo`, `endereco`, `email`) VALUES
(1, 'Empresa 1', '12345678911', 'Financeiro', 'Endereço 1, 001', 'empresa1@gmail.com'),
(2, 'Empresa 2', '12345678912', 'Farmaceutico', 'Endereço 2, 002', 'empresa2@gmail.com'),
(3, 'Empresa 3', '12345678913', 'Alimenticio', 'Endereço 3, 003', 'empresa3@gmail.com'),
(4, 'Empresa 4', '12345678914', 'Tecnologia', 'Endereço 4, 004', 'empresa4@gmail.com'),
(5, 'Empresa 5', '12345678915', 'Estético', 'Endereço 5, 005', 'empresa5@gmail.com'),
(6, 'Empresa 6', '12345678916', 'Automobilistico', 'Endereço 6, 006', 'empresa6@gmail.com');

INSERT INTO `vendas` (`id`, `razao`, `cnpj`, `itens`, `quantidade`, `valor`, `data`) VALUES
(1, 'Empresa 1', '12345678911', 'Bola de futebol', 5, 25.0, '2024-05-20 15:40:59'),
(2, 'Empresa 1', '12345678911', 'Saco 10kg Cimento', 2, 200.0, '2024-05-20 15:40:59'),
(3, 'Empresa 1', '12345678911', 'T PVC 100mm', 5, 10.0, '2024-05-20 15:40:59'),
(4, 'Empresa 1', '12345678911', 'Argamassa 20kg', 2, 100.0, '2024-05-20 15:40:59');


