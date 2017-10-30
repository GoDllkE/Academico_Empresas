/*
    File:
    Generate-bd.sql

    Descrição:
    Utilize este script SQL para criar e configurar o banco de dados e o 
    usuário de acesso, utilizado nesta aplicação.

    Criado por:
    Gustavo Toledo de Oliveira  - gustavot53@gmail.com

    Para rodar este script, execute o comando abaixo em seu MySQL. Troque o usuário e 
    senha para o desejado. (Precisa de permissão para criar usuário e banco de dados)
    $  source (caminho-para-este-script)

    Banco de dados utilizado: MariaDB/MySQL
*/

/* ------------------------------------------------------------------------------------ */
/*                              Criando Banco de dados                                  */
/* ------------------------------------------------------------------------------------ */
-- Criando base de dados
CREATE DATABASE IF NOT EXISTS bdEmpresas;
USE bdEmpresas;

--- Criando usuário que utilizará esta base de dados
CREATE USER IF NOT EXISTS 'empresario'@'localhost' IDENTIFIED BY '123456';
GRANT ALL PRIVILEGES ON bdEmpresas.* TO 'empresario'@'localhost';
FLUSH PRIVILEGES;

/* ------------------------------------------------------------------------------------ */
/*                                 Criando tabelas                                      */
/* ------------------------------------------------------------------------------------ */
--
-- Tabela `categorias`
--
CREATE TABLE IF NOT EXISTS categorias (
    codigo   INT(11)       NOT NULL    PRIMARY KEY AUTO_INCREMENT,
    nome     VARCHAR(60)   NOT NULL
) 
ENGINE=InnoDB;

-- --------------------------------------------------------

-- Tabela `empresas`
CREATE TABLE empresas (
    codigo            INT(11)         NOT NULL      PRIMARY KEY     AUTO_INDENT,
    nome              VARCHAR(120)    DEFAULT NULL,
    endereco          VARCHAR(150)    DEFAULT NULL,
    bairro            VARCHAR(60)     DEFAULT NULL,
    email             VARCHAR(120)    DEFAULT NULL,
    senha             VARCHAR(32)     DEFAULT NULL,
    imagem            VARCHAR(36)     DEFAULT NULL,
    codigoRegiao      INT(11)         DEFAULT NULL,
    codigoCategoria   INT(11)         DEFAULT NULL
) 
ENGINE=InnoDB;

-- --------------------------------------------------------

-- Tabela `regioes`
CREATE TABLE regioes (
    codigo   INT(11)       NOT NULL    PRIMARY KEY     AUTO_INDENT,
    nome     VARCHAR(60)   NOT NULL
) 
ENGINE=InnoDB;

-- --------------------------------------------------------

-- Tabela `servicos`
CREATE TABLE servicos (
    codigo          INT(11)         NOT NULL    PRIMARY KEY     AUTO_INCREMENT,
    nome            VARCHAR(120)    DEFAULT NULL,
    descricao       TEXT            DEFAULT NULL,
    valor           FLOAT           DEFAULT NULL,
    imagem          VARCHAR(36)     DEFAULT NULL,
    codigoEmpresa   INT(11)         DEFAULT NULL
) 
ENGINE=InnoDB;


/* ------------------------------------------------------------------------------------ */
/*                        Adicionando dados inciais as tabelas                          */
/* ------------------------------------------------------------------------------------ */

-- Dados inciais da tabela 'categorias'
INSERT INTO categorias (nomeC) VALUES
('Micro'),
('Pequeno Porte'),
('Médio Porte'),
('Grande Porte'),
('Gigante');

-- Dados inciais da tabela 'regioes'
INSERT INTO regioes (nomeR) VALUES
('Zona Leste'),
('Zona Norte'),
('Zona Oeste'),
('Zona Sul'),
('Centro');

-- Dados inciais da tabela 'empresas'
INSERT INTO empresas (nome, endereco, bairro, email, senha, imagem, codigoRegiao, codigoCategoria) VALUES
('Empresa 1', 'Rua 1', 'Bairro 1', 'empresa1@email.com', '202cb962ac59075b964b07152d234b70', 'bfbd297a4f15b4db71bcf5383864d483.jpg', 1, 2),
('Empresa 2', 'Rua 2', 'Bairro 2', 'empresa1@email.com', '202cb962ac59075b964b07152d234b70', '92f85102e30ccf6732652b69191a6109.jpg', 2, 3);

-- Dados inciais da tabela 'servicos'
INSERT INTO servicos (nome, descricao, valor, imagem, codigoEmpresa) VALUES
('Servico 1', 'Servico da empresa 1', 10.00, NULL, 1);
('Servico 2', 'Servico da empresa 1', 10.00, NULL, 1);
('Servico 3', 'Servico da empresa 2', 15.00, NULL, 2);
('Servico 4', 'Servico da empresa 2', 13.00, NULL, 2);
('Servico 5', 'Servico da empresa 2', 07.00, NULL, 2);

/* ------------------------------------------------------------------------------------ */
/*                             Configurações adicionais                                 */
/* ------------------------------------------------------------------------------------ */
COMMIT;
