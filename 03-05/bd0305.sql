-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21/06/2024 às 18:44
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd0305`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbautor`
--

CREATE TABLE `tbautor` (
  `codAutor` int(11) NOT NULL,
  `nomeAutor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbautor`
--

INSERT INTO `tbautor` (`codAutor`, `nomeAutor`) VALUES
(6, 'Clarice Lispector'),
(7, 'Edgar Allan Poe'),
(8, 'William Shakespeare'),
(9, 'Eiichiro Oda'),
(10, 'Akira Toriyama');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbgenero`
--

CREATE TABLE `tbgenero` (
  `codGenero` int(11) NOT NULL,
  `genero` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbgenero`
--

INSERT INTO `tbgenero` (`codGenero`, `genero`) VALUES
(7, 'Fantasia'),
(8, 'Ação'),
(9, 'Misterio'),
(10, 'Suspense'),
(11, 'Aventura');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblivro`
--

CREATE TABLE `tblivro` (
  `codLivro` int(11) NOT NULL,
  `nomeLivro` varchar(50) NOT NULL,
  `codAutor` int(11) DEFAULT NULL,
  `codGenero` int(11) DEFAULT NULL,
  `anoLancamento` date DEFAULT NULL,
  `edicaoLivro` varchar(50) NOT NULL,
  `statusLivro` varchar(1) NOT NULL,
  `descricaoLivro` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tblivro`
--

INSERT INTO `tblivro` (`codLivro`, `nomeLivro`, `codAutor`, `codGenero`, `anoLancamento`, `edicaoLivro`, `statusLivro`, `descricaoLivro`) VALUES
(10, 'Dragon Ball', 10, 11, '1984-01-01', '1', '1', 'Dragon Ball é legal'),
(11, 'one piece', 9, 11, '1996-01-01', '#1', '1', 'Top'),
(12, '1984', 7, 10, '2024-06-02', 'Lançamento', '0', 'Legal'),
(13, 'Romeu e Julieta', 8, 9, '2018-01-01', 'Edição Nova', '1', 'Romance'),
(15, 'Laços de Família', 6, 10, '1960-01-01', '1', '1', 'Muito Bom');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbautor`
--
ALTER TABLE `tbautor`
  ADD PRIMARY KEY (`codAutor`);

--
-- Índices de tabela `tbgenero`
--
ALTER TABLE `tbgenero`
  ADD PRIMARY KEY (`codGenero`);

--
-- Índices de tabela `tblivro`
--
ALTER TABLE `tblivro`
  ADD PRIMARY KEY (`codLivro`),
  ADD KEY `fk_LivroAutor` (`codAutor`),
  ADD KEY `fk_LivroGenero` (`codGenero`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbautor`
--
ALTER TABLE `tbautor`
  MODIFY `codAutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tbgenero`
--
ALTER TABLE `tbgenero`
  MODIFY `codGenero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `tblivro`
--
ALTER TABLE `tblivro`
  MODIFY `codLivro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tblivro`
--
ALTER TABLE `tblivro`
  ADD CONSTRAINT `fk_LivroAutor` FOREIGN KEY (`codAutor`) REFERENCES `tbautor` (`codAutor`),
  ADD CONSTRAINT `fk_LivroGenero` FOREIGN KEY (`codGenero`) REFERENCES `tbgenero` (`codGenero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
