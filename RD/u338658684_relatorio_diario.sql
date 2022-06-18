-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 26-Abr-2022 às 21:02
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u338658684_relatorio_diario`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ajuda`
--

DROP TABLE IF EXISTS `ajuda`;
CREATE TABLE IF NOT EXISTS `ajuda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idViagem01` int(11) NOT NULL,
  `setor` varchar(50) DEFAULT NULL,
  `prefixo` varchar(200) DEFAULT NULL,
  `turno` varchar(200) DEFAULT NULL,
  `matricula_motorista` varchar(50) DEFAULT NULL,
  `km` varchar(50) DEFAULT NULL,
  `dataHoraInicioDeColeta` datetime DEFAULT NULL,
  `coletor01` varchar(50) DEFAULT NULL,
  `coletor02` varchar(50) DEFAULT NULL,
  `coletor03` varchar(50) DEFAULT NULL,
  `coletor04` varchar(50) DEFAULT NULL,
  `dataHoraSaidaDaGaragem` datetime DEFAULT NULL,
  `kmInicioDeSetor` int(11) DEFAULT NULL,
  `dataHoraInicioDeSetor` datetime DEFAULT NULL,
  `kmFinalDoSetor` int(11) DEFAULT NULL,
  `dataHoraFinalDeSetor` datetime DEFAULT NULL,
  `kmInicioDeDescarga` int(11) DEFAULT NULL,
  `dataHoraInicioDeDescarga` datetime DEFAULT NULL,
  `kmFimDeDescarga` int(11) DEFAULT NULL,
  `peso` varchar(50) DEFAULT NULL,
  `ticket` varchar(50) DEFAULT NULL,
  `dataHoraFimDeDescarga` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `refeicao`
--

DROP TABLE IF EXISTS `refeicao`;
CREATE TABLE IF NOT EXISTS `refeicao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numeroRd` int(11) DEFAULT NULL,
  `inicioRefeicao` datetime DEFAULT NULL,
  `fimRefeicao` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `refeicao`
--

INSERT INTO `refeicao` (`id`, `numeroRd`, `inicioRefeicao`, `fimRefeicao`) VALUES
(1, 1, '2022-04-26 17:52:01', '2022-04-26 17:52:03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `relatorio_diario`
--

DROP TABLE IF EXISTS `relatorio_diario`;
CREATE TABLE IF NOT EXISTS `relatorio_diario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setor` varchar(50) DEFAULT NULL,
  `prefixo` varchar(200) DEFAULT NULL,
  `turno` varchar(200) DEFAULT NULL,
  `matricula_motorista` varchar(50) DEFAULT NULL,
  `km` varchar(50) DEFAULT NULL,
  `dataHoraInicioDeColeta` datetime DEFAULT NULL,
  `coletor01` varchar(50) DEFAULT NULL,
  `coletor02` varchar(50) DEFAULT NULL,
  `coletor03` varchar(50) DEFAULT NULL,
  `coletor04` varchar(50) DEFAULT NULL,
  `dataHoraSaidaDaGaragem` datetime DEFAULT NULL,
  `kmInicioDeSetor` int(11) DEFAULT NULL,
  `dataHoraInicioDeSetor` datetime DEFAULT NULL,
  `kmFinalDoSetor` int(11) DEFAULT NULL,
  `dataHoraFinalDeSetor` datetime DEFAULT NULL,
  `kmInicioDeDescarga` int(11) DEFAULT NULL,
  `dataHoraInicioDeDescarga` datetime DEFAULT NULL,
  `kmFimDeDescarga` int(11) DEFAULT NULL,
  `peso` varchar(50) DEFAULT NULL,
  `ticket` varchar(50) DEFAULT NULL,
  `dataHoraFimDeDescarga` datetime DEFAULT NULL,
  `kmInicioRetornoGaragem` int(11) DEFAULT NULL,
  `dataHoraInicioRetornoGaragem` datetime DEFAULT NULL,
  `kmFimRetornoGaragem` int(11) DEFAULT NULL,
  `dataHoraFimRetornoGaragem` datetime DEFAULT NULL,
  `kmAbastecimento` int(11) DEFAULT NULL,
  `litros` int(11) DEFAULT NULL,
  `dataHoraAbastecimento` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `relatorio_diario`
--

INSERT INTO `relatorio_diario` (`id`, `setor`, `prefixo`, `turno`, `matricula_motorista`, `km`, `dataHoraInicioDeColeta`, `coletor01`, `coletor02`, `coletor03`, `coletor04`, `dataHoraSaidaDaGaragem`, `kmInicioDeSetor`, `dataHoraInicioDeSetor`, `kmFinalDoSetor`, `dataHoraFinalDeSetor`, `kmInicioDeDescarga`, `dataHoraInicioDeDescarga`, `kmFimDeDescarga`, `peso`, `ticket`, `dataHoraFimDeDescarga`, `kmInicioRetornoGaragem`, `dataHoraInicioRetornoGaragem`, `kmFimRetornoGaragem`, `dataHoraFimRetornoGaragem`, `kmAbastecimento`, `litros`, `dataHoraAbastecimento`) VALUES
(1, '1000', '450', 'D', '3282', '100', '2022-04-26 17:51:07', '1', '2', '3', '4', '2022-04-26 17:51:11', 120, '2022-04-26 17:51:14', 140, '2022-04-26 17:51:17', 160, '2022-04-26 17:51:19', 180, '3000', '66666', '2022-04-26 17:51:30', 500, '2022-04-26 17:52:15', 520, '2022-04-26 17:52:24', 530, 120, '2022-04-26 17:52:29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `relatorio_diario_2a_viagem`
--

DROP TABLE IF EXISTS `relatorio_diario_2a_viagem`;
CREATE TABLE IF NOT EXISTS `relatorio_diario_2a_viagem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id1aViagem` int(11) DEFAULT NULL,
  `kmSaidaDoAterro` varchar(50) DEFAULT NULL,
  `dataHoraSaidaDoAterro` varchar(50) DEFAULT NULL,
  `kmInicioSetor2aViagem` int(11) DEFAULT NULL,
  `dataHoraInicioSetor2aViagem` datetime DEFAULT NULL,
  `kmFimSetor2aViagem` int(11) DEFAULT NULL,
  `dataHoraFimSetor2aViagem` datetime DEFAULT NULL,
  `kmInicioDeDescarga2aViagem` int(11) DEFAULT NULL,
  `dataHoraInicioDeDescarga2aViagem` datetime DEFAULT NULL,
  `kmFimDeDescarga2aViagem` int(11) DEFAULT NULL,
  `peso2aViagem` varchar(50) DEFAULT NULL,
  `ticket2aViagem` varchar(50) DEFAULT NULL,
  `dataHoraFimDeDescarga2aViagem` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `relatorio_diario_2a_viagem`
--

INSERT INTO `relatorio_diario_2a_viagem` (`id`, `id1aViagem`, `kmSaidaDoAterro`, `dataHoraSaidaDoAterro`, `kmInicioSetor2aViagem`, `dataHoraInicioSetor2aViagem`, `kmFimSetor2aViagem`, `dataHoraFimSetor2aViagem`, `kmInicioDeDescarga2aViagem`, `dataHoraInicioDeDescarga2aViagem`, `kmFimDeDescarga2aViagem`, `peso2aViagem`, `ticket2aViagem`, `dataHoraFimDeDescarga2aViagem`) VALUES
(1, 1, '200', '2022-04-26 17:51:37', 220, '2022-04-26 17:51:44', 240, '2022-04-26 17:51:46', 260, '2022-04-26 17:51:50', 280, '3654', '54789', '2022-04-26 17:51:56');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sos`
--

DROP TABLE IF EXISTS `sos`;
CREATE TABLE IF NOT EXISTS `sos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numeroRd` int(11) DEFAULT NULL,
  `inicioSOS` datetime DEFAULT NULL,
  `fimSOS` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sos`
--

INSERT INTO `sos` (`id`, `numeroRd`, `inicioSOS`, `fimSOS`) VALUES
(1, 1, '2022-04-26 17:52:05', '2022-04-26 17:52:07');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
