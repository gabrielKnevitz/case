-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Nov-2022 às 07:59
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projreacoes`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_colaboradores`
--

CREATE TABLE `tb_colaboradores` (
  `matricula` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `sobrenome` varchar(255) NOT NULL,
  `departamento` varchar(255) NOT NULL,
  `cargo` varchar(255) NOT NULL,
  `foto_colaborador` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_colaboradores`
--

INSERT INTO `tb_colaboradores` (`matricula`, `email`, `nome`, `sobrenome`, `departamento`, `cargo`, `foto_colaborador`) VALUES
(1318, 'leonardo.lima@cliente.com', 'Leonardo', 'Lima', 'Materiais', 'Transportador', '9fabb62e825bf9d7665afba74a4ba787.png'),
(1694, 'alvaro.souza@cliente.com', 'Alvaro', 'Souza', 'Suprimentos', 'Analista', 'c3f49d0795603fe63bb33470681f4c45.png'),
(1827, 'nathalia.garcia@cliente.com', 'Nathalia', 'Garcia', 'Materiais', 'Transportador', '690d11a41214faf21945e1267492ac0f.png'),
(1996, 'thales.ferreira@cliente.com', 'Thales', 'Ferreira', 'Carga', 'Transportador', '92e732515d4abb512c67b0e7e22004fe.png'),
(2049, 'anna.alves@cliente.com', 'Anna', 'Alves', 'Carga', 'Transportador', 'ff33a95ed99521847a077d8ce4e9d36b.png'),
(2482, 'pedro.lima@cliente.com', 'Pedro', 'Lima', 'Logistica', 'Transportador', 'a80bd7e776b01433345c553e6f2b5dfc.png'),
(2710, 'ana.oliveira@cliente.com', 'Ana', 'Oliveira', 'Carga', 'Transportador', '1ed6503420197a4ec42044d90380d304.png'),
(2749, 'kevin.restom@cliente.com', 'Kevin', 'Restom', 'Logistica', 'Transportador', '1fbef757272387664a9b014d958b112e.png'),
(3564, 'giulia.scarppa@cliente.com', 'Giulia', 'Scarppa', 'Materiais', 'Manutenção', '6349747a8dc2f6a954986912a78c3671.png'),
(3748, 'lucas.fernandes@cliente.com', 'Lucas', 'Fernandes', 'Financeiro', 'Analista', '12508a1df8283a4e23a046d48b47e538.png'),
(4128, 'amanda.amorim@cliente.com', 'Amanda', 'Amorim', 'Suprimentos', 'Operador', 'c1453c1cd26121420396dc1e19affd3f.png'),
(4567, 'gabriel@gmail.com', 'gabriel', 'knevitz', 'Financeiro', 'Analista', '386c9f2185df603b3ffbb682add83e53.jpg'),
(4879, 'pedro.matos@cliente.com', 'Pedro', 'Matos', 'Suprimentos', 'Almoxarife', '8d7b688683e4c0dfb8793304a938f2ff.png'),
(5723, 'otavio.costa@cliente.com', 'Otávio', 'Costa', 'Financeiro', 'Analista', 'ae622b9a2f6885c9761d98329e0ff2bf.png'),
(5945, 'carla.pereira@cliente.com', 'Carla', 'Pereira', 'Suprimentos', 'Almoxarife', '7a8e475d3bcedc630acccd8662703ef1.png'),
(6449, 'maria.julianelli@cliente.com', 'Maria', 'Juanelli', 'Logistica', 'Planejador', '920a6ade28f06a2eafa3e0e6a4a9db8d.png'),
(6870, 'natan.franco@cliente.com', 'Natan', 'Franco', 'Materiais', 'Operador', '1e0dc2db4a372005017751f9697be3b4.png'),
(8120, 'marcela.santos@cliente.com', 'Marcela', 'santos', 'Logistica', 'Analista', 'a0d7f630ed6cfddaf24fb5127d39d84d.png'),
(9178, 'michael.pereira@cliente.com', 'Michael', 'Pereira', 'Materiais', 'Manutenção', '64c30b3a042bffc7a9d0ae750d1a56bc.png'),
(9252, 'fernanda.silva@cliente.com', 'Fernanda', 'Silva', 'Suprimentos', 'Operador', '30d0169aebbc562fc4b2f3bc1e371f7e.png'),
(23456, 'teste@gmail.com', 'Gabriel teste', 'teste', 'Financeiro', 'Contador', '5d39878b94b4c83fdc54c57d6ed938fd.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_reacoes`
--

CREATE TABLE `tb_reacoes` (
  `id_reacao` int(11) NOT NULL,
  `elogio` varchar(255) NOT NULL,
  `motivo` varchar(500) NOT NULL,
  `elogiado` int(11) NOT NULL,
  `elogiador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_reacoes`
--

INSERT INTO `tb_reacoes` (`id_reacao`, `elogio`, `motivo`, `elogiado`, `elogiador`) VALUES
(1, 'Colaboração', 'Gosto de Trabalhar com a Fernanda, pois ela sempre torna o ambiente descontraído!', 9252, 23456),
(2, 'Colaboração', 'Gosto de Trabalhar com a Fernanda, pois ela sempre torna o ambiente descontraído!', 9252, 23456),
(3, 'Colaboração', 'Gosto de Trabalhar com a Fernanda, pois ela sempre torna o ambiente descontraído!', 9252, 23456),
(4, 'Orgulho', 'É muito bom trabalhar com a Amanda, pois não mede esforços para ajudar sua equipe', 4128, 4567),
(5, 'Excelente trabalho', 'Gabriel, é um excelente profissional', 4567, 23456),
(6, 'Like', 'Gosto muito de trabalhar com o Gabriel, pois ele é muito dedicado', 4567, 1694),
(7, 'Colaboração', 'Gabriel, é muito colaborativo, sempre ajudando', 4567, 2049),
(8, 'Orgulho', 'Fernanda é muito querida e sempre zela pelo seu serviço', 9252, 2049);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_colaboradores`
--
ALTER TABLE `tb_colaboradores`
  ADD PRIMARY KEY (`matricula`);

--
-- Índices para tabela `tb_reacoes`
--
ALTER TABLE `tb_reacoes`
  ADD PRIMARY KEY (`id_reacao`),
  ADD KEY `Foreign` (`elogiado`),
  ADD KEY `forei` (`elogiador`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_colaboradores`
--
ALTER TABLE `tb_colaboradores`
  MODIFY `matricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23457;

--
-- AUTO_INCREMENT de tabela `tb_reacoes`
--
ALTER TABLE `tb_reacoes`
  MODIFY `id_reacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_reacoes`
--
ALTER TABLE `tb_reacoes`
  ADD CONSTRAINT `Foreign` FOREIGN KEY (`elogiado`) REFERENCES `tb_colaboradores` (`matricula`),
  ADD CONSTRAINT `forei` FOREIGN KEY (`elogiador`) REFERENCES `tb_colaboradores` (`matricula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
