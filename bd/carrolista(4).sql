-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 17-Maio-2016 às 17:07
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
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `idAvaliacao` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `avaliacao` int(11) NOT NULL,
  `comentario` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `avaliacao`
--

INSERT INTO `avaliacao` (`idAvaliacao`, `idUsuario`, `idCliente`, `avaliacao`, `comentario`) VALUES
(1, 9, 34, 2, 'asdasdasdasdasd'),
(2, 9, 34, 2, 'asdasdasdasdasd'),
(3, 9, 34, -2, 'teste123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `bairro`
--

CREATE TABLE `bairro` (
  `idBairro` int(11) NOT NULL,
  `nomeBairro` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bairro`
--

INSERT INTO `bairro` (`idBairro`, `nomeBairro`) VALUES
(1, 'CAMPO GRANDE'),
(2, 'SANTA CRUZ'),
(3, 'BANGU'),
(4, 'COSMOS'),
(5, 'SENADOR VASCONCELOS'),
(6, 'RECREIO'),
(7, 'BARRA DA TIJUCA'),
(8, 'SENADOR CAMARA'),
(9, 'SANTÍSSIMO'),
(10, 'SEPETIBA');

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
  `idUsuario` int(11) NOT NULL,
  `image1` varchar(100) DEFAULT NULL,
  `image2` varchar(100) DEFAULT NULL,
  `image3` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`idCliente`, `nomeCliente`, `endCliente`, `numCliente`, `bairroCliente`, `cepCliente`, `telCliente`, `celCliente`, `descCliente`, `estatus`, `idUsuario`, `image1`, `image2`, `image3`) VALUES
(1, 'West Importados', 'AVENIDA JOÃƒO XXIII', 90, 'SANTA CRUZ', '23570-000', '3232-3232', '1212-5858', 'Venda de peÃ§as para veiculos <b>nacionais e importados</b>!', 'I', 6, '', '', ''),
(2, 'Auto MecÃ¢nica do Mauro', 'Rua 2', 5577, 'Campo Grande', '88888-888', '8888-8888', '88888-8888', 'teste 123', 'A', 8, '', '', ''),
(3, 'Vende PeÃ§a', 'rua 5', 9193, 'Santa Cruz', '77777-777', '7777-7777', '77777-7777', 'TESTE@TESTE.COM', 'I', 3, '', '', ''),
(4, 'West Importados', 'AVENIDA JOÃƒO XXIII', 90, 'SANTA CRUZ', '23570-000', '3232-3232', '1212-5858', 'Venda de peÃ§as para veiculos <b>nacionais e importados</b>!', 'A', 6, '', '', ''),
(5, 'West Importados', 'AVENIDA JOÃƒO XXIII', 90, 'SANTA CRUZ', '23570-000', '3232-3232', '1212-5858', 'Venda de peÃ§as para veiculos <b>nacionais e importados</b>!', 'A', 6, '', '', ''),
(6, 'West Importados', 'AVENIDA JOÃƒO XXIII', 90, 'SANTA CRUZ', '23570-000', '3232-3232', '1212-5858', 'Venda de peÃ§as para veiculos <b>nacionais e importados</b>!', 'A', 6, '275f1ced315d8fae516db34b8c7d0483.jpg', '275f1ced315d8fae516db34b8c7d0483.jpg', '275f1ced315d8fae516db34b8c7d0483.jpg'),
(7, 'West Importados', 'AVENIDA JOÃƒO XXIII', 90, 'SANTA CRUZ', '23570-000', '3232-3232', '1212-5858', 'Venda de peÃ§as para veiculos <b>nacionais e importados</b>!', 'A', 6, '847697c35c12e4897ffc52f3dfdc8825.jpg', 'a0d2afcee83a5f77435918d5f427b68c.jpg', 'a0d2afcee83a5f77435918d5f427b68c.jpg'),
(8, 'West Importados', 'AVENIDA JOÃƒO XXIII', 90, 'SANTA CRUZ', '23570-000', '3232-3232', '1212-5858', 'Venda de peÃ§as para veiculos <b>nacionais e importados</b>!', 'A', 6, '45e009d1c15014ef506746cc99a32834.jpg', NULL, NULL),
(9, 'West Importados', 'AVENIDA JOÃƒO XXIII', 90, 'SANTA CRUZ', '23570-000', '3232-3232', '1212-5858', 'Venda de peÃ§as para veiculos <b>nacionais e importados</b>!', 'A', 6, '1caf05113397146e45d7231e08b04245.jpg', NULL, NULL),
(10, 'West Importados', 'AVENIDA JOÃƒO XXIII', 90, 'SANTA CRUZ', '23570-000', '3232-3232', '1212-5858', 'Venda de peÃ§as para veiculos <b>nacionais e importados</b>!', 'A', 6, '373efb096cb420d2dd32dbf85289e539.jpg', NULL, NULL),
(11, 'West Importados', 'AVENIDA JOÃƒO XXIII', 90, 'SANTA CRUZ', '23570-000', '3232-3232', '1212-5858', 'Venda de peÃ§as para veiculos <b>nacionais e importados</b>!', 'A', 6, '344c020a941839433dc27d83ca9226db.jpg', '344c020a941839433dc27d83ca9226db.jpg', '344c020a941839433dc27d83ca9226db.jpg'),
(12, 'West Importados', 'AVENIDA JOÃƒO XXIII', 90, 'SANTA CRUZ', '23570-000', '3232-3232', '1212-5858', 'Venda de peÃ§as para veiculos <b>nacionais e importados</b>!', 'A', 6, '7362a95b6b0ab12528918925ea3e98f3.jpg', '7362a95b6b0ab12528918925ea3e98f3.jpg', '7362a95b6b0ab12528918925ea3e98f3.jpg'),
(13, 'West Importados', 'AVENIDA JOÃƒO XXIII', 90, 'SANTA CRUZ', '23570-000', '3232-3232', '1212-5858', 'Venda de peÃ§as para veiculos <b>nacionais e importados</b>!', 'A', 6, 'beb25ef21e0be49cfe7f4bf6ec33db23.jpg', 'beb25ef21e0be49cfe7f4bf6ec33db23.jpg', 'beb25ef21e0be49cfe7f4bf6ec33db23.jpg'),
(14, 'West Importados', 'AVENIDA JOÃƒO XXIII', 90, 'SANTA CRUZ', '23570-000', '3232-3232', '1212-5858', 'Venda de peÃ§as para veiculos <b>nacionais e importados</b>!', 'I', 6, '5c0c654e2ddc8ea2ab751837e28b2e63.jpg', '5c0c654e2ddc8ea2ab751837e28b2e63.jpg', '5c0c654e2ddc8ea2ab751837e28b2e63.jpg'),
(15, 'West Importados', 'AVENIDA JOÃƒO XXIII', 90, 'SANTA CRUZ', '23570-000', '3232-3232', '1212-5858', 'Venda de peÃ§as para veiculos <b>nacionais e importados</b>!', 'A', 6, '4a3ab27f6c5c32f79cdb934de771ae7e.jpg', '4a3ab27f6c5c32f79cdb934de771ae7e.jpg', '4a3ab27f6c5c32f79cdb934de771ae7e.jpg'),
(16, 'West Importados', 'AVENIDA JOÃƒO XXIII', 90, 'SANTA CRUZ', '23570-000', '3232-3232', '1212-5858', 'Venda de peÃ§as para veiculos <b>nacionais e importados</b>!', 'A', 6, '8db2a6e61f71a8b11f968e3aa18f7c08.jpg', '8db2a6e61f71a8b11f968e3aa18f7c08.jpg', '8db2a6e61f71a8b11f968e3aa18f7c08.jpg'),
(17, 'West Importados', 'AVENIDA JOÃƒO XXIII', 90, 'SANTA CRUZ', '23570-000', '3232-3232', '1212-5858', 'Venda de peÃ§as para veiculos <b>nacionais e importados</b>!', 'A', 6, 'f4034efd9bfda642c3c23381ed2aa8af.jpg', 'f4034efd9bfda642c3c23381ed2aa8af.jpg', 'f4034efd9bfda642c3c23381ed2aa8af.jpg'),
(18, 'West Importados', 'AVENIDA JOÃƒO XXIII', 90, 'SANTA CRUZ', '23570-000', '3232-3232', '1212-5858', 'Venda de peÃ§as para veiculos <b>nacionais e importados</b>!', 'A', 6, 'd3c5b11cfd4fbfcd4d6b9feca639f164.jpg', 'd3c5b11cfd4fbfcd4d6b9feca639f164.jpg', 'd3c5b11cfd4fbfcd4d6b9feca639f164.jpg'),
(19, 'West Importados', 'AVENIDA JOÃƒO XXIII', 90, 'SANTA CRUZ', '23570-000', '3232-3232', '1212-5858', 'Venda de peÃ§as para veiculos <b>nacionais e importados</b>!', 'A', 6, '8de7a043d537ffebabbfd1da03466183.jpg', '8de7a043d537ffebabbfd1da03466183.jpg', '8de7a043d537ffebabbfd1da03466183.jpg'),
(20, 'West Importados', 'AVENIDA JOÃƒO XXIII', 90, 'SANTA CRUZ', '23570-000', '3232-3232', '1212-5858', 'Venda de peÃ§as para veiculos <b>nacionais e importados</b>!', 'A', 6, 'c82b00a9173bee32a24d72d62b9df12d.jpg', 'c82b00a9173bee32a24d72d62b9df12d.jpg', 'c82b00a9173bee32a24d72d62b9df12d.jpg'),
(21, 'West Importados', 'AVENIDA JOÃƒO XXIII', 90, 'SANTA CRUZ', '23570-000', '3232-3232', '1212-5858', 'Venda de peÃ§as para veiculos <b>nacionais e importados</b>!', 'A', 6, '4fb1524d11d4ef47c7c13c040618d702.jpg', '4fb1524d11d4ef47c7c13c040618d702.jpg', '4fb1524d11d4ef47c7c13c040618d702.jpg'),
(22, 'West Importados', 'AVENIDA JOÃƒO XXIII', 90, 'SANTA CRUZ', '23570-000', '3232-3232', '1212-5858', 'Venda de peÃ§as para veiculos <b>nacionais e importados</b>!', 'A', 6, 'a3d5ea17a6f89cde3461974a5ed6c0c2.jpg', 'a3d5ea17a6f89cde3461974a5ed6c0c2.jpg', 'a3d5ea17a6f89cde3461974a5ed6c0c2.jpg'),
(23, 'Auto Eletrica Fricar', 'CesÃ¡rio de Mello', 5000, 'CAMPO GRANDE', '23570-530', '3232-3232', '5858-5858', 'Venda de peÃ§as para veiculos <b>nacionais e importados</b>!', 'A', 6, '887dbfffb1ddb71c0d859117e3e6f7a2.jpg', '887dbfffb1ddb71c0d859117e3e6f7a2.jpg', '887dbfffb1ddb71c0d859117e3e6f7a2.jpg'),
(24, 'West Importados', 'AVENIDA JOÃƒO XXIII', 90, 'SANTA CRUZ', '23570-000', '3232-3232', '1212-5858', 'Venda de peÃ§as para veiculos <b>nacionais e importados</b>!', 'A', 6, '5a4f924ff5c83afe6a4d9e249e8c9d10.jpg', '5a4f924ff5c83afe6a4d9e249e8c9d10.jpg', '5a4f924ff5c83afe6a4d9e249e8c9d10.jpg'),
(25, 'West Importados', 'AVENIDA JOÃƒO XXIII', 90, 'SANTA CRUZ', '23570-000', '3232-3232', '1212-5858', 'Venda de peÃ§as para veiculos <b>nacionais e importados</b>!', 'A', 6, 'fb8e051f3d781a17c41acf94bac1b556.jpg', 'fb8e051f3d781a17c41acf94bac1b556.jpg', 'fb8e051f3d781a17c41acf94bac1b556.jpg'),
(26, 'West Importados', 'AVENIDA JOÃƒO XXIII', 90, 'SANTA CRUZ', '23570-000', '3232-3232', '1212-5858', 'Venda de peÃ§as para veiculos <b>nacionais e importados</b>!', 'A', 6, 'dc8300fe8720850602c51cb73805b50e.jpg', 'dc8300fe8720850602c51cb73805b50e.jpg', 'dc8300fe8720850602c51cb73805b50e.jpg'),
(27, 'West Importados', 'AVENIDA JOÃƒO XXIII', 90, 'SANTA CRUZ', '23570-000', '3232-3232', '1212-5858', 'Venda de peÃ§as para veiculos <b>nacionais e importados</b>!', 'A', 6, '.jpg', '.jpg', '.jpg'),
(28, 'West Importados', 'AVENIDA JOÃƒO XXIII', 90, 'SANTA CRUZ', '23570-000', '3232-3232', '1212-5858', 'Venda de peÃ§as para veiculos <b>nacionais e importados</b>!', 'A', 6, 'd41d8cd98f00b204e9800998ecf8427e.jpg', 'd41d8cd98f00b204e9800998ecf8427e.jpg', 'd41d8cd98f00b204e9800998ecf8427e.jpg'),
(29, 'West Importados', 'AVENIDA JOÃƒO XXIII', 90, 'SANTA CRUZ', '23570-000', '3232-3232', '1212-5858', 'Venda de peÃ§as para veiculos <b>nacionais e importados</b>!', 'A', 6, NULL, NULL, NULL),
(30, 'West Importados', 'AVENIDA JOÃƒO XXIII', 90, 'SANTA CRUZ', '23570-000', '3232-3232', '1212-5858', 'Venda de peÃ§as para veiculos <b>nacionais e importados</b>!', 'A', 6, '7cad009d8c526600df04534a7831ffc8.jpg', '13490d8227e0a08a29518f97d680050a.jpg', '837723918a7b543ab710e90a64c97188.jpg'),
(31, 'West Importados', 'AVENIDA JOÃƒO XXIII', 90, 'SANTA CRUZ', '23570-000', '3232-3232', '1212-5858', 'Venda de peÃ§as para veiculos <b>nacionais e importados</b>!', 'A', 6, 'dec06797c36e6c757a3cdd0255d40dee.jpg', 'a917c55c4d35a846948bab265c345754.jpg', '713fcf83cd63912fd0eb76077ec0cedc.jpg'),
(32, 'West Importados', 'AVENIDA JOÃƒO XXIII', 90, 'SANTA CRUZ', '23570-000', '3232-3232', '1212-5858', 'Venda de peÃ§as para veiculos <b>nacionais e importados</b>!', 'A', 6, 'dec06797c36e6c757a3cdd0255d40dee.jpg', 'a917c55c4d35a846948bab265c345754.jpg', '713fcf83cd63912fd0eb76077ec0cedc.jpg'),
(33, 'West Importados', 'AVENIDA JOÃƒO XXIII', 90, 'SANTA CRUZ', '23570-000', '3232-3232', '1212-5858', 'Venda de peÃ§as para veiculos <b>nacionais e importados</b>!', 'A', 6, 'f7c737c04703af34ea936bcb2eb39773.jpg', 'c8a6f789bca77a7c413f58d566c42f22.jpg', '1275f1ea1458967ffbddfb4971de99fe.jpg'),
(34, 'West Importados', 'AVENIDA JOÃƒO XXIII', 90, 'SANTA CRUZ', '23570-000', '3232-3232', '1212-5858', 'Venda de peÃ§as para veiculos <b>nacionais e importados</b>!', 'A', 6, 'e7015854e9b7faac3b94fb25bf070756.jpg', 'd4b71c674d33a618f282d1409ac146ae.jpg', '30381161452eaf0e22a7a3ba764ba283.jpg'),
(35, 'Desentorta Carro', 'AVENIDA JOÃƒO XXIII', 5000, 'COSMOS', '23570-000', '3232-3232', '1212-5858', 'asdasdasdas', 'A', 6, '0c2586c087a05da22d21a9f921a5ba94.jpg', '8bc81bafee2d28b6849a269081e85a57.jpg', 'b4b4250196dda9ad4a78bd5db3521713.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `resposta`
--

CREATE TABLE `resposta` (
  `idResposta` int(11) NOT NULL,
  `resposta` varchar(255) NOT NULL,
  `idAvaliacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `resposta`
--

INSERT INTO `resposta` (`idResposta`, `resposta`, `idAvaliacao`) VALUES
(1, 'asdasdasdasdasdasd', 3);

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
(1, 20, 'Lavagem a Seco'),
(1, 2, 'E cambagem'),
(23, 22, '1234');

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
-- Indexes for table `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`idAvaliacao`);

--
-- Indexes for table `bairro`
--
ALTER TABLE `bairro`
  ADD PRIMARY KEY (`idBairro`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indexes for table `resposta`
--
ALTER TABLE `resposta`
  ADD PRIMARY KEY (`idResposta`);

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
-- AUTO_INCREMENT for table `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `idAvaliacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `bairro`
--
ALTER TABLE `bairro`
  MODIFY `idBairro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `resposta`
--
ALTER TABLE `resposta`
  MODIFY `idResposta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
