-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 01-Dez-2018 às 01:03
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fidelity`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresas`
--

CREATE TABLE `empresas` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `razao_social` varchar(200) NOT NULL,
  `cnpj` int(14) NOT NULL,
  `email` varchar(200) NOT NULL,
  `telefone` int(13) NOT NULL,
  `cep` int(8) NOT NULL,
  `rua` varchar(400) NOT NULL,
  `numero` int(10) DEFAULT NULL,
  `complemento` varchar(200) DEFAULT NULL,
  `bairro` varchar(200) NOT NULL,
  `cidade` varchar(200) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `password` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `empresas`
--

INSERT INTO `empresas` (`id`, `nome`, `razao_social`, `cnpj`, `email`, `telefone`, `cep`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `password`) VALUES
(1, 'empresa1', 'razao1', 2147483647, 'empresa1@empresa', 34555555, 123456789, 'rua um', 1, 'andar 1', 'bairro teste', 'cidade teste', '', 3),
(2, 'empresa2', 'razao2', 2147483647, 'empresa2@empresa', 345512345, 13456000, 'Rua Tereza Cibim Maluf', 1, 'andar 2', 'Jardim Boa Vista', 'Santa BÃ¡rbara D\'Oeste', 'SP', 0),
(3, 'empresa3', 'razao3', 123456789, 'empresa3@empresa', 34551010, 13457040, 'Rua Tupininquins', 0, '', 'Jardim SÃ£o Francisco', 'Santa BÃ¡rbara D\'Oeste', 'SP', 0),
(4, 'Predinhos Eventos', 'Eventos Prendin', 2147483647, 'predinho@evento', 34551010, 13450885, 'Avenida Vereadora Maria JosÃ© Cavedal dos Santos Mano', 300, 'torre b apto 102', 'Jardim Firenze', 'Santa BÃ¡rbara D\'Oeste', 'SP', 0),
(5, 'Predinhos Eventos', 'Eventos Prendin', 2147483647, 'predinho@evento', 34551010, 13450885, 'Avenida Vereadora Maria JosÃ© Cavedal dos Santos Mano', 300, 'torre b apto 102', 'Jardim Firenze', 'Santa BÃ¡rbara D\'Oeste', 'SP', 0),
(6, 'empresa teste', 'razao teste', 2147483647, 'empresateste@teste', 34557070, 13457040, 'Rua Tupininquins', 1, '', 'Jardim SÃ£o Francisco', 'Santa BÃ¡rbara D\'Oeste', 'SP', 0),
(7, 'Bonecaria', 'Industria e comÃ©rcio de bonecas', 142, 'bonecariadoll@gmail.com', 34666070, 13457, 'Rua Tupininquins', 69, '', 'Jardim SÃ£o Francisco', 'Santa BÃ¡rbara D\'Oeste', 'SP', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'Leandro Alves', 'leandroalves.web@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'Victor Marcorin', 'victor@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'Anderson Wiezel', 'anderson@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(4, 'Erick Prendin', 'erick@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(5, 'Bruna Souza', 'bruna@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(6, 'teste', 'teste@gmail', '202cb962ac59075b964b07152d234b70'),
(7, 'Kleber', 'kleber@gmail.com', 'caf1a3dfb505ffed0d024130f58c5cfa'),
(8, 'teste3', 'teste3@teste', 'e10adc3949ba59abbe56e057f20f883e'),
(9, 'loginteste', 'login@teste', '25f9e794323b453885f5181f1b624d0b'),
(10, 'leandro segundo', 'leandro@segundo', 'e10adc3949ba59abbe56e057f20f883e'),
(11, 'Madeline Hatter', 'madeline@hatter', '81dc9bdb52d04dc20036dbd8313ed055'),
(12, 'Teste Login2', 'testelogin2@teste', 'e10adc3949ba59abbe56e057f20f883e'),
(13, 'ana cecilia', 'anac@fidelity', '4297f44b13955235245b2497399d7a93');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
