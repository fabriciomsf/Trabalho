-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04-Maio-2016 às 20:30
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carrolista`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL,
  `nomeCliente` varchar(55) NOT NULL,
  `endCliente` varchar(50) NOT NULL,
  `numCliente` int(4) NOT NULL,
  `bairroCliente` varchar(15) NOT NULL,
  `cepCliente` varchar(9) NOT NULL,
  `telCliente` varchar(10) NOT NULL,
  `celCliente` varchar(10) NOT NULL,
  `descCliente` varchar(255) NOT NULL,
  `estatus` varchar(1) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`idCliente`, `nomeCliente`, `endCliente`, `numCliente`, `bairroCliente`, `cepCliente`, `telCliente`, `celCliente`, `descCliente`, `estatus`, `idUsuario`) VALUES
(1, 'Garcia Lubificantes', 'Avenidada Cesario de Mello', 4502, 'PaciÃªncia', '23570-000', '9999-9999', '99999-9999', 'Troca de oleo e venda de peÃ§as de primeira linha', 'I', 6),
(2, 'Auto MecÃ¢nica do Mauro', 'Rua 2', 5577, 'Campo Grande', '88888-888', '8888-8888', '88888-8888', 'teste 123', 'A', 8),
(3, 'Vende PeÃ§a', 'rua 5', 9193, 'Santa Cruz', '77777-777', '7777-7777', '77777-7777', 'TESTE@TESTE.COM', 'I', 3),
(4, 'Garcia Lubificantes', 'Avenidada Cesario de Mello', 4502, 'PaciÃªncia', '23570-000', '9999-9999', '99999-9999', 'Troca de oleo e venda de peÃ§as de primeira linha', 'A', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `localidades`
--

CREATE TABLE `localidades` (
  `idLocalidade` int(11) NOT NULL,
  `nomeLocalidade` varchar(55) NOT NULL,
  `municipioLocalidade` varchar(55) NOT NULL,
  `estadoLocalidade` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `idServico` int(11) NOT NULL,
  `nomeServico` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`idServico`, `nomeServico`) VALUES
(1, 'Alarme'),
(2, 'Alinhamento e Balanceamento'),
(3, 'Alinhamento Técnico (monobloco, longarina, chassi, susp'),
(4, 'Aplicação de Películas para Vidros'),
(5, 'Ar-condicionado'),
(6, ' Auto Elétrica'),
(7, 'Auto Socorro'),
(8, 'Capotaria'),
(9, 'Direção'),
(10, 'Embreagem'),
(11, 'Envelopamento'),
(12, 'Escapamento'),
(13, 'Fechaduras'),
(14, 'Freios'),
(15, 'Higienização de Ar Condicionado'),
(16, ' Iluminação'),
(17, 'Injeção Eletrônica'),
(18, 'Instalação e Manutenção de GNV'),
(19, 'Lanternagem e Pintura'),
(20, 'Lavagem'),
(21, 'Limpeza e Higienização de Estofados'),
(22, 'Martelinho de Ouro'),
(23, 'Mecânica em Geral'),
(24, 'Seguros'),
(25, 'Som e Vídeo'),
(26, 'Suspensão'),
(27, 'Troca de Óleo'),
(28, 'Vidraceiro'),
(29, 'Vidros Elétricos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_serv_cli`
--

CREATE TABLE `tb_serv_cli` (
  `idClientes` int(11) NOT NULL,
  `idServicos` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_serv_cli`
--

INSERT INTO `tb_serv_cli` (`idClientes`, `idServicos`, `descricao`) VALUES
(1, 1, 'asdasdsa'),
(1, 2, 'Cambagem!'),
(1, 20, 'Lavagem a Seco');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nomeUsuario` varchar(15) NOT NULL,
  `emailUsuario` varchar(55) NOT NULL,
  `senhaUsuario` varchar(55) NOT NULL,
  `tpUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nomeUsuario`, `emailUsuario`, `senhaUsuario`, `tpUser`) VALUES
(4, 'julia elisabete', 'juliaelisabete.91@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(5, 'Vinicius Fontou', 'vinisciusfontoura@hotmail.com', '00c66aaf5f2c3f49946f15c1ad2ea0d3', 0),
(6, 'SERGIO MURILLO', 'SRG.MRLL@GMAIL.COM', '274c0a599a858a6c31c455356d6aba6d', 1),
(7, 'strapopolos', 'strapopolos@strapopolos.com', '533695e68f2615a73339650ce3cb2348', 0),
(8, 'juncbiloba', 'jj@jj.com', '698dc19d489c4e4db73e28a713eab07b', 0),
(9, 'GAUNFO UFONAUTA', 'TESTE@TESTE.COM', '698dc19d489c4e4db73e28a713eab07b', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indexes for table `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`idServico`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `emailUsuario` (`emailUsuario`),
  ADD UNIQUE KEY `nomeUsuario` (`nomeUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `servicos`
--
ALTER TABLE `servicos`
  MODIFY `idServico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
