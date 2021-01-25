-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Jan-2021 às 16:32
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cadvis`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotos`
--

CREATE TABLE `fotos` (
  `id` int(11) NOT NULL,
  `id_visitante` int(11) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `fotos`
--

INSERT INTO `fotos` (`id`, `id_visitante`, `foto`) VALUES
(1, 1, ''),
(2, 2, ''),
(3, 3, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivel_acessos`
--

CREATE TABLE `nivel_acessos` (
  `id` int(11) NOT NULL,
  `nome_nivel` varchar(220) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `nivel_acessos`
--

INSERT INTO `nivel_acessos` (`id`, `nome_nivel`, `created`, `modified`) VALUES
(1, 'Admin', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `setor`
--

CREATE TABLE `setor` (
  `id` int(11) NOT NULL,
  `nome` varchar(520) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `setor`
--

INSERT INTO `setor` (`id`, `nome`, `created`, `modified`) VALUES
(5, 'SEA', '2020-12-19 17:03:32', NULL),
(6, 'COAD', '2020-12-19 17:03:56', NULL),
(7, 'SUSEG', '2020-12-19 17:04:20', NULL),
(8, 'SUAM', '2020-12-19 17:04:44', NULL),
(9, 'COF', '2020-12-19 17:05:08', NULL),
(12, 'CRH', '2020-12-19 17:06:18', NULL),
(13, 'SUCA', '2020-12-19 17:06:35', NULL),
(14, 'SUGRT', '2020-12-19 17:06:48', NULL),
(15, 'SUAFP', '2020-12-19 17:07:00', NULL),
(16, 'SUIIRH', '2020-12-19 17:07:12', NULL),
(17, 'CPCS', '2020-12-19 17:07:25', NULL),
(18, 'SUCOPE', '2020-12-19 17:07:40', NULL),
(19, 'SUPCAH', '2020-12-19 17:07:52', NULL),
(20, 'SUDEAPS', '2020-12-19 17:08:03', NULL),
(21, 'SUININ', '2020-12-19 17:08:17', NULL),
(22, 'SUVISA', '2020-12-19 17:08:29', NULL),
(23, 'SUVIGE', '2020-12-19 17:08:43', NULL),
(24, 'SUVAM', '2020-12-19 17:08:56', NULL),
(25, 'SIEC', '2020-12-19 17:09:09', NULL),
(26, 'SUAS', '2020-12-19 17:09:21', NULL),
(27, 'COHUR', '2020-12-19 17:09:32', NULL),
(28, 'SUSEH', '2020-12-19 17:09:44', NULL),
(29, 'SUSER', '2020-12-19 17:09:56', NULL),
(30, 'COAER', '2020-12-19 17:10:08', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) NOT NULL,
  `email` varchar(220) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `nivel_acesso_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `usuario`, `senha`, `nivel_acesso_id`, `created`, `modified`, `cpf`) VALUES
(1, 'Joseph Oliveira', 'josepholiveira@teste', 'joseph', '12345', 1, '2020-12-19 16:56:03', NULL, '08551660481');

-- --------------------------------------------------------

--
-- Estrutura da tabela `visita`
--

CREATE TABLE `visita` (
  `id_visita` int(11) NOT NULL,
  `id_visitante` int(11) DEFAULT NULL,
  `id_usuarios` int(11) DEFAULT NULL,
  `entrada` datetime DEFAULT NULL,
  `saida` datetime DEFAULT NULL,
  `empresa` varchar(100) DEFAULT NULL,
  `objetivo` varchar(200) DEFAULT NULL,
  `setor` varchar(50) DEFAULT NULL,
  `visita_em_andamento` tinyint(1) DEFAULT NULL,
  `habilitado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `visita`
--

INSERT INTO `visita` (`id_visita`, `id_visitante`, `id_usuarios`, `entrada`, `saida`, `empresa`, `objetivo`, `setor`, `visita_em_andamento`, `habilitado`) VALUES
(1, 1, NULL, '2021-01-14 13:23:42', '2021-01-14 16:16:24', 'NET', 'teste50', '21', 0, NULL),
(2, 1, NULL, '2021-01-14 13:42:59', '2021-01-14 13:43:10', 'NET', 'Visitar Patrick', 'Selecione', 0, NULL),
(3, 1, NULL, '2021-01-14 14:22:26', '2021-01-14 16:44:05', 'teste', '', 'Selecione', 0, NULL),
(4, 3, NULL, '2021-01-14 16:16:18', '2021-01-14 16:44:45', 'KKDOE', 'Visitar Patrick', '20', 0, NULL),
(5, 1, NULL, '2021-01-14 16:52:42', '2021-01-14 16:52:47', 'teste', 'Visitar Patrick', 'Selecione', 0, NULL),
(6, 2, NULL, '2021-01-14 16:53:29', '2021-01-14 16:53:33', 'teste', 'teste', 'Selecione', 0, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `visitante`
--

CREATE TABLE `visitante` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) DEFAULT NULL,
  `empresa` varchar(100) DEFAULT NULL,
  `telefone` varchar(255) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `rg` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `visitante`
--

INSERT INTO `visitante` (`id`, `nome`, `empresa`, `telefone`, `cpf`, `rg`) VALUES
(1, 'joseph', 'teste', '(84)99710-9645', '89998989898', '989898989'),
(2, 'Hugo', 'teste', '(84)88787-8787', '97979797979', '848878787'),
(3, 'tESTE', 'KKDOE', '(84)99989-8989', '98989898989', '878787878');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_visitante` (`id_visitante`);

--
-- Índices para tabela `nivel_acessos`
--
ALTER TABLE `nivel_acessos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `setor`
--
ALTER TABLE `setor`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `visita`
--
ALTER TABLE `visita`
  ADD PRIMARY KEY (`id_visita`),
  ADD KEY `fk_visita_visitante_idx` (`id_visitante`),
  ADD KEY `fk_visita_funcionario1_idx` (`id_usuarios`);

--
-- Índices para tabela `visitante`
--
ALTER TABLE `visitante`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `nivel_acessos`
--
ALTER TABLE `nivel_acessos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `setor`
--
ALTER TABLE `setor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `visita`
--
ALTER TABLE `visita`
  MODIFY `id_visita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `visitante`
--
ALTER TABLE `visitante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `fotos_ibfk_1` FOREIGN KEY (`id_visitante`) REFERENCES `visitante` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
