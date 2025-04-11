-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11/04/2025 às 02:29
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
-- Banco de dados: `db_sistema_logistica`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_cargas`
--

CREATE TABLE `tb_cargas` (
  `id_Carga` int(11) NOT NULL,
  `cod_rastreio` varchar(8) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `status` varchar(25) NOT NULL,
  `comprovante_entrega` text DEFAULT NULL,
  `fk_Rotas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_motorista`
--

CREATE TABLE `tb_motorista` (
  `id_Motorista` int(11) NOT NULL,
  `cnh` varchar(20) NOT NULL,
  `categoria` enum('A','B','C','D','E') NOT NULL,
  `validade_cnh` date NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_motorista`
--

INSERT INTO `tb_motorista` (`id_Motorista`, `cnh`, `categoria`, `validade_cnh`, `id_usuario`) VALUES
(2, '212541', 'D', '2025-05-02', 11),
(3, '212541', 'A', '2025-04-09', 12);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_ocorrencia`
--

CREATE TABLE `tb_ocorrencia` (
  `id_Ocorrencia` int(11) NOT NULL,
  `tipo` varchar(25) NOT NULL,
  `descricao` text NOT NULL,
  `data_hora` datetime NOT NULL,
  `fk_Rotas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_rotas`
--

CREATE TABLE `tb_rotas` (
  `id_Rotas` int(11) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `status` varchar(20) NOT NULL,
  `data_criacao` datetime NOT NULL,
  `data_encerramento` datetime DEFAULT NULL,
  `motivo_encerramento` varchar(50) DEFAULT NULL,
  `origem` varchar(20) NOT NULL,
  `destino` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `id_usuario` int(11) NOT NULL,
  `nomeCompleto` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `id_tipo` enum('Motorista','ADM','Usuario','Cliente') NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `id_status_func` enum('Ativo','Inativo') NOT NULL,
  `email` varchar(100) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`id_usuario`, `nomeCompleto`, `user`, `senha`, `telefone`, `id_tipo`, `cpf`, `id_status_func`, `email`, `foto`) VALUES
(11, 'Rômulo França', 'ROMULLO.FRANCA', '1234', '61993022343', 'ADM', '12244455544', 'Ativo', 'romulo.franca03@gmail.com', NULL),
(12, 'Sergio Lima', 'SERGIO.DNA', '1234', '619296563266', 'ADM', '12454128541', 'Ativo', 'teste@gmail.com', '67f5c1b529839.jpg'),
(13, 'Larissa', 'JOAO12', '123456', '61993022343', 'Usuario', '42141254212', 'Ativo', 'admin@livros.com', '67f5c1a92db6d.jpg'),
(15, 'Maria ', 'maria.DNA', '1234', '61966554455', 'Cliente', '45154215451', 'Ativo', 'admin@livro.com', '67f5c11c2d4ad.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_veiculo`
--

CREATE TABLE `tb_veiculo` (
  `id_veiculo` int(11) NOT NULL,
  `placa` varchar(10) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `ano` year(4) NOT NULL,
  `cor` varchar(50) NOT NULL,
  `status_veiculo` enum('Ativo','Inativo','Manutenção','em_uso') NOT NULL,
  `observacoes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_veiculo`
--

INSERT INTO `tb_veiculo` (`id_veiculo`, `placa`, `modelo`, `marca`, `ano`, `cor`, `status_veiculo`, `observacoes`) VALUES
(1, 'aaa111', 'sodium_add0', 'c', '2000', 'sss', 'Ativo', 's'),
(2, 's', 's', 'd', '2000', 'd', 'Ativo', 'ss');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_cargas`
--
ALTER TABLE `tb_cargas`
  ADD PRIMARY KEY (`id_Carga`,`fk_Rotas`),
  ADD KEY `fk_tb_Carga_tb_Rota_idx` (`fk_Rotas`);

--
-- Índices de tabela `tb_motorista`
--
ALTER TABLE `tb_motorista`
  ADD PRIMARY KEY (`id_Motorista`,`id_usuario`),
  ADD KEY `fk_tb_motorista_tb_usuario1_idx` (`id_usuario`);

--
-- Índices de tabela `tb_ocorrencia`
--
ALTER TABLE `tb_ocorrencia`
  ADD PRIMARY KEY (`id_Ocorrencia`,`fk_Rotas`),
  ADD KEY `fk_tb_Ocorrencia_tb_Rota1_idx` (`fk_Rotas`);

--
-- Índices de tabela `tb_rotas`
--
ALTER TABLE `tb_rotas`
  ADD PRIMARY KEY (`id_Rotas`);

--
-- Índices de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `CPF_UNIQUE` (`cpf`),
  ADD KEY `fk_tb_Usuario_tb_tipo1_idx` (`id_tipo`),
  ADD KEY `fk_tb_usuario_tb_status_func1_idx` (`id_status_func`);

--
-- Índices de tabela `tb_veiculo`
--
ALTER TABLE `tb_veiculo`
  ADD PRIMARY KEY (`id_veiculo`),
  ADD UNIQUE KEY `placa_UNIQUE` (`placa`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_cargas`
--
ALTER TABLE `tb_cargas`
  MODIFY `id_Carga` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_motorista`
--
ALTER TABLE `tb_motorista`
  MODIFY `id_Motorista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tb_ocorrencia`
--
ALTER TABLE `tb_ocorrencia`
  MODIFY `id_Ocorrencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_rotas`
--
ALTER TABLE `tb_rotas`
  MODIFY `id_Rotas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `tb_veiculo`
--
ALTER TABLE `tb_veiculo`
  MODIFY `id_veiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tb_cargas`
--
ALTER TABLE `tb_cargas`
  ADD CONSTRAINT `fk_tb_Carga_tb_Rota` FOREIGN KEY (`fk_Rotas`) REFERENCES `tb_rotas` (`id_Rotas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `tb_motorista`
--
ALTER TABLE `tb_motorista`
  ADD CONSTRAINT `fk_tb_motorista_tb_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `tb_ocorrencia`
--
ALTER TABLE `tb_ocorrencia`
  ADD CONSTRAINT `fk_tb_Ocorrencia_tb_Rota1` FOREIGN KEY (`fk_Rotas`) REFERENCES `tb_rotas` (`id_Rotas`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
