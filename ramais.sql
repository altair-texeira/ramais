-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 02/09/2013 às 20:54:36
-- Versão do Servidor: 5.5.32-0ubuntu0.13.04.1
-- Versão do PHP: 5.4.9-4ubuntu2.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `ramais`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `servidor`
--

CREATE TABLE IF NOT EXISTS `servidor` (
  `id_servidor` int(11) NOT NULL AUTO_INCREMENT,
  `nome_servidor` varchar(50) NOT NULL,
  `funcao` varchar(20) NOT NULL,
  `email_instituicao` varchar(50) DEFAULT NULL,
  `email_pessoal` varchar(50) DEFAULT NULL,
  `email_pes_publico` tinyint(1) DEFAULT NULL,
  `msg_1` varchar(15) DEFAULT NULL,
  `tipo_1` varchar(12) DEFAULT NULL,
  `msg_1_publico` tinyint(1) DEFAULT NULL,
  `msg_2` varchar(15) DEFAULT NULL,
  `tipo_2` varchar(12) DEFAULT NULL,
  `msg_2_publico` tinyint(1) DEFAULT NULL,
  `msg_3` varchar(15) DEFAULT NULL,
  `tipo_3` varchar(12) DEFAULT NULL,
  `msg_3_publico` tinyint(1) DEFAULT NULL,
  `fone_res` int(11) DEFAULT NULL,
  `fone_res_publico` tinyint(1) DEFAULT NULL,
  `fone_movel` int(11) DEFAULT NULL,
  `operadora` varchar(6) DEFAULT NULL,
  `fone_movel_publico` tinyint(1) DEFAULT NULL,
  `ramal_1` int(11) NOT NULL,
  `local_1` varchar(20) NOT NULL,
  `ramal_2` int(11) DEFAULT NULL,
  `local_2` varchar(20) DEFAULT NULL,
  `ramal_3` int(11) DEFAULT NULL,
  `local_3` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_servidor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `servidor`
--

INSERT INTO `servidor` (`id_servidor`, `nome_servidor`, `funcao`, `email_instituicao`, `email_pessoal`, `email_pes_publico`, `msg_1`, `tipo_1`, `msg_1_publico`, `msg_2`, `tipo_2`, `msg_2_publico`, `msg_3`, `tipo_3`, `msg_3_publico`, `fone_res`, `fone_res_publico`, `fone_movel`, `operadora`, `fone_movel_publico`, `ramal_1`, `local_1`, `ramal_2`, `local_2`, `ramal_3`, `local_3`) VALUES
(1, 'SERVIDOR', 'telefonista', 'servidor@ifc-camboriu.edu.br', '', NULL, '', '', NULL, '', '', NULL, '', '', NULL, 0, NULL, 0, '', NULL, 1, 'central telefone', 0, '', 0, ''),
(2, 'altair', 'prof', 'altair@ifc-camboriu.edu.br', '', NULL, '', '', NULL, '', '', NULL, '', '', NULL, 0, NULL, 0, '', NULL, 555, 'sala', 0, '', 0, ''),
(4, 'Pedro', 'professor', 'pedro@ifc-camboriu.edu.br', '', NULL, '', '', NULL, '', '', NULL, '', '', NULL, 0, NULL, 0, '', NULL, 999, 'sala 3', 0, '', 0, ''),
(5, 'joao', 'prof', 'joao@ifc-camboriu.edu.br', '', NULL, '', '', NULL, '', '', NULL, '', '', NULL, 0, NULL, 0, '', NULL, 333, 'sala professores 2', 0, '', 0, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_servidor` int(11) DEFAULT NULL,
  `nome_servidor` varchar(50) DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL,
  `senha` varchar(20) DEFAULT NULL,
  `lembrete` varchar(20) DEFAULT NULL,
  `permissao` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_servidor` (`id_servidor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_servidor`, `nome_servidor`, `login`, `senha`, `lembrete`, `permissao`) VALUES
(0, 1, 'SERVIDOR', 'ramais', 'senha', 'nome aplicativo', 'a'),
(1, 2, 'altair', 'altair', '1', '1', 'a'),
(2, 2, 'altair', 'alt', '1', '1', '0');

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_servidor`) REFERENCES `servidor` (`id_servidor`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
