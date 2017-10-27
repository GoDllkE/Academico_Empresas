-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19-Out-2017 às 09:06
-- Versão do servidor: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdempresas`
--
CREATE DATABASE IF NOT EXISTS `bdEmpresas` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bdempresas`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--
CREATE TABLE `categorias` (
    `codigoC`   int(11)     NOT NULL,
    `nomeC`     varchar(60) NOT NULL
) 
ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categorias`
--
INSERT INTO `categorias` (`codigoC`, `nomeC`) VALUES
(1, 'Pequeno Porte'),
(2, 'Médio Porte'),
(3, 'GrandePorte');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresas`
--
CREATE TABLE `empresas` (
    `codigo`            int(11)         NOT NULL,
    `nome`              varchar(120)    DEFAULT NULL,
    `endereco`          varchar(150)    DEFAULT NULL,
    `bairro`            varchar(60)     DEFAULT NULL,
    `email`             varchar(120)    DEFAULT NULL,
    `senha`             varchar(32)     DEFAULT NULL,
    `imagem`            varchar(36)     DEFAULT NULL,
    `codigoRegiao`      int(11)         DEFAULT NULL,
    `codigoCategoria`   int(11)         DEFAULT NULL
) 
ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `empresas`
--
INSERT INTO `empresas` (`codigo`, `nome`, `endereco`, `bairro`, `email`, `senha`, `imagem`, `codigoRegiao`, `codigoCategoria`) VALUES
(34, 'Petunia', 'Rua 1 ', 'Bairro 1', 'pet@email.com', '202cb962ac59075b964b07152d234b70', 'bfbd297a4f15b4db71bcf5383864d483.jpg', 3, 1),
(35, 'Flaky', 'Rua 2', 'Bairro 2', 'fla@email.com', '202cb962ac59075b964b07152d234b70', '92f85102e30ccf6732652b69191a6109.jpg', 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `regioes`
--

CREATE TABLE `regioes` (
    `codigoR`   int(11)         NOT NULL,
    `nomeR`     varchar(60)  NOT NULL
) 
ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `regioes`
--
INSERT INTO `regioes` (`codigoR`, `nomeR`) VALUES
(1, 'Zona Leste'),
(2, 'Zona Norte'),
(3, 'Zona Oeste'),
(4, 'Zona Sul'),
(5, 'Centro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--
CREATE TABLE `servicos` (
    `codigo`        int(11)         NOT NULL,
    `nome`          varchar(120)    DEFAULT NULL,
    `descricao`     text,
    `valor`         float           DEFAULT NULL,
    `imagem`        varchar(36)     DEFAULT NULL,
    `codigoEmpresa` int(11)         DEFAULT NULL
) 
ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`codigo`, `nome`, `descricao`, `valor`, `imagem`, `codigoEmpresa`) VALUES
(1, 'Teste', 'asdadsas', 11, NULL, 35);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`codigoC`);

--
-- Indexes for table `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `regioes`
--
ALTER TABLE `regioes`
  ADD PRIMARY KEY (`codigoR`);

--
-- Indexes for table `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `codigoC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `empresas`
--
ALTER TABLE `empresas`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `regioes`
--
ALTER TABLE `regioes`
  MODIFY `codigoR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `servicos`
--
ALTER TABLE `servicos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
