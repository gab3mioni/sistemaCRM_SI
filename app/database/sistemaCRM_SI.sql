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

DROP TABLE IF EXISTS `vendedores`;
CREATE TABLE IF NOT EXISTS `vendedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100) NOT NULL,
  `nome_completo` varchar(14) NOT NULL,
  `cpf` varchar(45) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
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
 (1, 'admin', 'admin@gmail.com', '123');

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
(4, 'Empresa 1', '12345678911', 'Argamassa 20kg', 2, 100.0, '2024-05-20 15:40:59'),
(5, 'Empresa 2', '12345678912', 'Caneta Azul', 100, 50.0, '2024-05-21 10:20:00'),
(6, 'Empresa 2', '12345678912', 'Papel A4', 500, 150.0, '2024-05-21 10:30:00'),
(7, 'Empresa 2', '12345678912', 'Grampeador', 20, 200.0, '2024-05-21 10:40:00'),
(8, 'Empresa 2', '12345678912', 'Lápis', 300, 90.0, '2024-05-21 10:50:00'),
(9, 'Empresa 3', '12345678913', 'Pão de Forma', 50, 100.0, '2024-05-22 11:00:00'),
(10, 'Empresa 3', '12345678913', 'Leite Integral', 200, 400.0, '2024-05-22 11:10:00'),
(11, 'Empresa 3', '12345678913', 'Manteiga', 100, 250.0, '2024-05-22 11:20:00'),
(12, 'Empresa 3', '12345678913', 'Queijo', 80, 320.0, '2024-05-22 11:30:00'),
(13, 'Empresa 4', '12345678914', 'Laptop', 10, 15000.0, '2024-05-23 12:00:00'),
(14, 'Empresa 4', '12345678914', 'Mouse', 50, 1250.0, '2024-05-23 12:10:00'),
(15, 'Empresa 4', '12345678914', 'Teclado', 30, 1500.0, '2024-05-23 12:20:00'),
(16, 'Empresa 4', '12345678914', 'Monitor', 20, 8000.0, '2024-05-23 12:30:00'),
(17, 'Empresa 5', '12345678915', 'Creme Hidratante', 150, 4500.0, '2024-05-24 13:00:00'),
(18, 'Empresa 5', '12345678915', 'Shampoo', 200, 4000.0, '2024-05-24 13:10:00'),
(19, 'Empresa 5', '12345678915', 'Condicionador', 180, 3600.0, '2024-05-24 13:20:00'),
(20, 'Empresa 5', '12345678915', 'Sabonete', 300, 1500.0, '2024-05-24 13:30:00'),
(21, 'Empresa 6', '12345678916', 'Pneu', 50, 5000.0, '2024-05-25 14:00:00'),
(22, 'Empresa 6', '12345678916', 'Óleo de Motor', 100, 2000.0, '2024-05-25 14:10:00'),
(23, 'Empresa 6', '12345678916', 'Bateria', 20, 4000.0, '2024-05-25 14:20:00'),
(24, 'Empresa 6', '12345678916', 'Freio a Disco', 60, 6000.0, '2024-05-25 14:30:00'),
(25, 'Empresa 1', '12345678911', 'Escada', 10, 1000.0, '2024-05-26 15:00:00'),
(26, 'Empresa 1', '12345678911', 'Pincel', 50, 250.0, '2024-05-26 15:10:00'),
(27, 'Empresa 1', '12345678911', 'Lixa', 100, 500.0, '2024-05-26 15:20:00'),
(28, 'Empresa 1', '12345678911', 'Tinta', 200, 4000.0, '2024-05-26 15:30:00'),
(29, 'Empresa 2', '12345678912', 'Tesoura', 60, 180.0, '2024-05-27 16:00:00'),
(30, 'Empresa 2', '12345678912', 'Régua', 80, 240.0, '2024-05-27 16:10:00'),
(31, 'Empresa 2', '12345678912', 'Apontador', 100, 100.0, '2024-05-27 16:20:00'),
(32, 'Empresa 2', '12345678912', 'Corretivo', 50, 125.0, '2024-05-27 16:30:00'),
(33, 'Empresa 3', '12345678913', 'Cereal', 70, 210.0, '2024-05-28 17:00:00'),
(34, 'Empresa 3', '12345678913', 'Café', 200, 800.0, '2024-05-28 17:10:00'),
(35, 'Empresa 3', '12345678913', 'Açúcar', 100, 250.0, '2024-05-28 17:20:00'),
(36, 'Empresa 3', '12345678913', 'Sal', 150, 300.0, '2024-05-28 17:30:00'),
(37, 'Empresa 4', '12345678914', 'Smartphone', 30, 30000.0, '2024-05-29 18:00:00'),
(38, 'Empresa 4', '12345678914', 'Tablet', 20, 20000.0, '2024-05-29 18:10:00'),
(39, 'Empresa 4', '12345678914', 'Smartwatch', 25, 12500.0, '2024-05-29 18:20:00'),
(40, 'Empresa 4', '12345678914', 'Fone de Ouvido', 40, 4000.0, '2024-05-29 18:30:00'),
(41, 'Empresa 5', '12345678915', 'Base para Unhas', 100, 500.0, '2024-05-30 19:00:00'),
(42, 'Empresa 5', '12345678915', 'Removedor de Esmalte', 150, 750.0, '2024-05-30 19:10:00'),
(43, 'Empresa 5', '12345678915', 'Cotonete', 200, 400.0, '2024-05-30 19:20:00'),
(44, 'Empresa 5', '12345678915', 'Toalha de Rosto', 80, 400.0, '2024-05-30 19:30:00'),
(45, 'Empresa 6', '12345678916', 'Câmbio', 30, 15000.0, '2024-05-31 20:00:00'),
(46, 'Empresa 6', '12345678916', 'Velas de Ignição', 120, 3600.0, '2024-05-31 20:10:00'),
(47, 'Empresa 6', '12345678916', 'Radiador', 40, 8000.0, '2024-05-31 20:20:00'),
(48, 'Empresa 6', '12345678916', 'Farol', 70, 7000.0, '2024-05-31 20:30:00'),
(49, 'Empresa 1', '12345678911', 'Parafuso', 500, 500.0, '2024-06-01 21:00:00'),
(50, 'Empresa 1', '12345678911', 'Serra', 25, 2500.0, '2024-06-01 21:10:00'),
(51, 'Empresa 1', '12345678911', 'Trena', 40, 400.0, '2024-06-01 21:20:00'),
(52, 'Empresa 1', '12345678911', 'Broca', 60, 600.0, '2024-06-01 21:30:00'),
(53, 'Empresa 2', '12345678912', 'Grampo', 100, 100.0, '2024-06-02 22:00:00'),
(54, 'Empresa 2', '12345678912', 'Clipes', 200, 200.0, '2024-06-02 22:10:00'),
(55, 'Empresa 2', '12345678912', 'Marcador', 60, 300.0, '2024-06-02 22:20:00'),
(56, 'Empresa 2', '12345678912', 'Pasta de Dente', 80, 320.0, '2024-06-02 22:30:00'),
(57, 'Empresa 3', '12345678913', 'Detergente', 90, 270.0, '2024-06-03 23:00:00'),
(58, 'Empresa 3', '12345678913', 'Esponja', 150, 450.0, '2024-06-03 23:10:00'),
(59, 'Empresa 3', '12345678913', 'Sabão em Pó', 200, 600.0, '2024-06-03 23:20:00'),
(60, 'Empresa 3', '12345678913', 'Amaciante', 180, 540.0, '2024-06-03 23:30:00');

INSERT INTO `vendedores` (`id`, `usuario`, `nome_completo`, `cpf`, `endereco`, `email`) VALUES
(1, 'jsilva', 'João Silva', '123.456.789-00', 'Rua das Flores, 123, São Paulo, SP', 'joao.silva@gmail.com.br'),
(2, 'msouza', 'Maria Souza', '987.654.321-00', 'Avenida Brasil, 456, Rio de Janeiro, RJ', 'maria.souza@gmail.com.br'),
(3, 'poliveira', 'Pedro Oliveira', '111.222.333-44', 'Rua Amazonas, 789, Belo Horizonte, MG', 'pedro.oliveira@gmail.com.br'),
(4, 'apereira', 'Ana Pereira', '555.666.777-88', 'Rua dos Jacarandás, 101, Curitiba, PR', 'ana.pereira@gmail.com.br'),
(5, 'clima', 'Carlos Lima', '999.888.777-66', 'Avenida das Palmeiras, 202, Porto Alegre, RS', 'carlos.lima@gmail.com.br'),
(6, 'fcosta', 'Fernanda Costa', '222.333.444-55', 'Rua Rio Negro, 303, Manaus, AM', 'fernanda.costa@gmail.com.br'),
(7, 'lfernandes', 'Lucas Fernandes', '666.777.888-99', 'Avenida Paulista, 404, São Paulo, SP', 'lucas.fernandes@gmail.com.br'),
(8, 'jalmeida', 'Juliana Almeida', '444.555.666-77', 'Rua das Laranjeiras, 505, Salvador, BA', 'juliana.almeida@gmail.com.br'),
(9, 'rsantos', 'Ricardo Santos', '777.888.999-00', 'Avenida Atlântica, 606, Fortaleza, CE', 'ricardo.santos@gmail.com.br'),
(10, 'procha', 'Patrícia Rocha', '888.999.000-11', 'Rua das Acácias, 707, Recife, PE', 'patricia.rocha@gmail.com.br');