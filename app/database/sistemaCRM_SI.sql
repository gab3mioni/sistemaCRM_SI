DROP DATABASE IF EXISTS `sistemaCRM`;
CREATE DATABASE IF NOT EXISTS `sistemaCRM`;
USE `sistemaCRM`;

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `vendedores`;
CREATE TABLE IF NOT EXISTS `vendedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `cpf` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
)  ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS  `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `razao` varchar(45) NOT NULL,
  `cnpj` varchar(45) NOT NULL,
  `ramo` varchar(45) NOT NULL,
  `endereco` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `vendas`;
CREATE TABLE IF NOT EXISTS `vendas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa` varchar(45) NOT NULL,
  `cnpj` varchar(45) NOT NULL,
  `itens` varchar(45) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor` float NOT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`id`)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `leads`;
CREATE TABLE IF NOT EXISTS `leads` (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255),
    nome_lead VARCHAR(255),
    email VARCHAR(255),
    telefone VARCHAR(20),
    interesse VARCHAR(255),
    data_captura DATE,
    valor VARCHAR(255)
);

DROP TABLE IF EXISTS `contatos`;
CREATE TABLE IF NOT EXISTS `contatos` (
    id INT PRIMARY KEY AUTO_INCREMENT,
    lead_id INT,
    lead_nome VARCHAR(255),
    data_contato DATE,
    meio_contato VARCHAR(50),
    detalhes TEXT,
    data_captura DATE
);

DELIMITER //
CREATE TRIGGER trg_before_insert_contatos
BEFORE INSERT ON contatos
FOR EACH ROW
BEGIN
    DECLARE v_id INT;
    DECLARE v_nome VARCHAR(255);
    DECLARE v_data_captura DATE;
    
    SELECT id, nome_lead, data_captura INTO v_id, v_nome, v_data_captura FROM leads WHERE id = NEW.lead_id;
    
    IF v_id IS NOT NULL AND v_nome IS NOT NULL THEN
        SET NEW.lead_id = v_id;
        SET NEW.lead_nome = v_nome;
        SET NEW.data_captura = v_data_captura;
    ELSE
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Erro: lead_id ou lead_nome inválido.';
    END IF;
END //
DELIMITER ;

CREATE TABLE IF NOT EXISTS `progresso` (
    id INT PRIMARY KEY AUTO_INCREMENT,
    lead_id INT,
    nome_lead_progresso VARCHAR (255),
    atividade VARCHAR(255),
    data_atividade DATE,
    detalhes TEXT
);

DELIMITER //
CREATE TRIGGER trg_before_insert_progresso
BEFORE INSERT ON progresso
FOR EACH ROW
BEGIN
    DECLARE v_id INT;
    DECLARE v_nome VARCHAR(255);
    
    SELECT id, nome_lead INTO v_id, v_nome FROM leads WHERE id = NEW.lead_id;
    
    IF v_id IS NOT NULL AND v_nome IS NOT NULL THEN
        SET NEW.nome_lead_progresso = v_nome;
    ELSE
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Erro: lead_id ou lead_nome inválido.';
    END IF;
END //
DELIMITER ;

DROP TABLE IF EXISTS `propostas`;
CREATE TABLE IF NOT EXISTS `propostas` (
    id INT PRIMARY KEY AUTO_INCREMENT,
    lead_id INT,
    nome_proposta VARCHAR(255),
    data_primeiro_contato DATE,
    data_proposta DATE,
    descricao TEXT,
    status VARCHAR(50),
    FOREIGN KEY (lead_id) REFERENCES leads(id)
);

DELIMITER //
CREATE TRIGGER trg_before_insert_propostas
BEFORE INSERT ON propostas
FOR EACH ROW
BEGIN
    DECLARE v_id INT;
    DECLARE v_nome VARCHAR(255);
    DECLARE v_captura DATE;
    
    SELECT id, nome_lead, data_captura INTO v_id, v_nome, v_captura FROM leads WHERE id = NEW.lead_id;
    
    IF v_id IS NOT NULL AND v_nome IS NOT NULL THEN
        SET NEW.nome_proposta = v_nome;
        SET NEW.data_primeiro_contato = v_captura;
    ELSE
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Erro: lead_id ou lead_nome inválido.';
    END IF;
END //
DELIMITER ;

DROP TABLE IF EXISTS `negociacoes`;
CREATE TABLE IF NOT EXISTS `negociacoes` (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome_negociacao VARCHAR (255),
    lead_id INT,
    data_negociacao DATE,
    descricao TEXT,
    status VARCHAR(50),
    FOREIGN KEY (lead_id) REFERENCES leads(id)
);
DELIMITER //
CREATE TRIGGER trg_before_insert_negociacoes
BEFORE INSERT ON negociacoes
FOR EACH ROW
BEGIN
    DECLARE v_id INT;
    DECLARE v_nome VARCHAR(255);
    
    SELECT id, nome_lead INTO v_id, v_nome FROM leads WHERE id = NEW.lead_id;
    
    IF v_id IS NOT NULL AND v_nome IS NOT NULL THEN
        SET NEW.nome_negociacao = v_nome;
    ELSE
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Erro: lead_id ou lead_nome inválido.';
    END IF;
END //
DELIMITER ;


 -- INSERINDO DADOS PARA TESTES

 INSERT INTO `clientes` (`id`, `razao`, `cnpj`, `ramo`, `endereco`, `email`) VALUES
 (1, 'Empresa 1', 12345678911, 'Financeiro',      'Endereço 1, 001', 'empresa1@gmail.com'),
 (2, 'Empresa 2', 12345678912, 'Farmaceutico',    'Endereço 2, 002', 'empresa2@gmail.com'),
 (3, 'Empresa 3', 12345678913, 'Alimenticio',     'Endereço 3, 003', 'empresa3@gmail.com'),
 (4, 'Empresa 4', 12345678914, 'Tecnologia',      'Endereço 4, 004', 'empresa4@gmail.com'),
 (5, 'Empresa 5', 12345678915, 'Estético',        'Endereço 5, 005', 'empresa5@gmail.com'),
 (6, 'Empresa 6', 12345678916, 'Automobilistico', 'Endereço 6, 006', 'empresa6@gmail.com');

 INSERT INTO `admin` (`id`, `usuario`, `email`, `senha`) VALUES
 (1, 'admin', 'admin@gmail.com', '123');
