-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Jun-2020 às 21:49
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `crud`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_task`
--

CREATE TABLE `tb_task` (
  `id_task` int(11) NOT NULL,
  `name_task` varchar(100) NOT NULL,
  `date_task` datetime NOT NULL,
  `resp_task` varchar(50) NOT NULL,
  `desc_task` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_task`
--

INSERT INTO `tb_task` (`id_task`, `name_task`, `date_task`, `resp_task`, `desc_task`) VALUES
(64, 'Fazer relatório sobre assalto do carrinho de cachorro quente', '2020-08-01 00:00:00', 'Rosa Diaz', 'Detalhar todos os acontecimentos de acordo com testemunhas.'),
(65, 'Conversar com Boyle', '2020-08-01 00:00:00', 'Rosa Diaz', 'Diga para seu namorado parar de querer massagear meus cabelos (os quais nem tenho).'),
(66, 'Marcar treinamento para a equipe', '2020-08-01 00:00:00', 'Amy Santiago', 'Pesquisar campos de treinamento policial para a nossa equipe e marcar data para o mês de agosto.'),
(67, 'Fazer o Jake tomar banho', '2020-08-01 00:00:00', 'Amy Santiago', 'Peça para seu namorado tomar banho, por favor...'),
(68, 'Entregar relatórios de reuniões do mês de agosto', '2020-08-01 00:00:00', 'Gina Linetti', 'Detalhar todos integrantes e o tema de cada reunião do mês de agosto.'),
(69, 'TRABALHAR MAIS', '2020-01-01 00:00:00', 'Gina Linetti', 'POR FAVOR GINA, PARE DE PERDER TEMPO PASSANDO TANTO BATOM E COMECE A TRABALHAR!!!!'),
(70, 'Acompanhar Jake na busca por Doug Judy', '2020-08-05 00:00:00', 'Charles Boyle', 'Charles, auxilie o Jake na força tarefa.'),
(71, 'Organizar layout do escritório', '2020-08-10 00:00:00', 'Terry Jeffords', 'Pedir para todos os agentes arrumarem suas mesas e os auxiliarem numa nova posição de mesas e móveis do escritório.'),
(72, 'Tirar um dia de folga', '2020-08-07 00:00:00', 'Terry Jeffords', 'Terry, você merece um dia de folga. Aproveite-o até o dia estipulado.'),
(73, 'Limpar sua mesa', '2020-02-01 00:00:00', 'Scully', 'Scully, por favor, limpe sua mesa e pare de comer encima dela.'),
(74, 'Ajudar Scully a limpar sua mesa', '2020-02-01 00:00:00', 'Hitchcock', 'Hitchcock, ajude seu parceiro a limpar a mesa. Aproveite e limpe a sua também!'),
(75, 'Capture Doug Judy', '2020-08-05 00:00:00', 'Jake Peralta', 'Jake, capture nosso homem mais procurado. Charles estará contigo nesta força tarefa.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(12) NOT NULL,
  `admin` varchar(2) NOT NULL,
  `photo` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `name`, `email`, `login`, `password`, `admin`, `photo`) VALUES
(32, 'Rosa Diaz', 'rosa.diaz@b99.com', 'rosa.diaz', 'boyle123', '', 'S7_Stephanie_Beatriz_-_Rosa_Diaz.png'),
(33, 'Amy Santiago', 'amy.santiago@b99.com', 'amy.santiago', 'jake123', '', '10f8b7f0495b2f5eca74ed778f0393a3.jpg'),
(34, 'Gina Linetti', 'gina.linetti@b99.com', 'gina.linetti', 'celebrite123', '', 'GinaS5.jpg'),
(35, 'Ray Holt', 'ray.holt@b99.com', 'ray.holt', 'kevin2020', 'S', 'S7_Andre_Braugher_-_Raymond_Holt.png'),
(36, 'Charles Boyle', 'charles.boyle@b99.com', 'charles.boyle', 'iloverosa', '', 'charles-boyle-costume.jpg'),
(37, 'Terry Jeffords', 'terry.jeff@b99.com', 'terry.jeff', 'ihave2works', 'S', 'TerryS5-932x1024.jpg'),
(38, 'Scully', 'scully@b99.com', 'scully', 'scully123', '', 'Scully.jpg'),
(39, 'Hitchcock', 'hitchcock@b99.com', 'hitchcock', 'hitchcock123', '', 'S7_Dirk_Blocker_-_Michael_Hitchcock.png'),
(43, 'Jake Peralta', 'jake.peralta@b99.com', 'jake.peralta', 'iloveamy123', '', 'jake-peralta.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_task`
--
ALTER TABLE `tb_task`
  ADD PRIMARY KEY (`id_task`);

--
-- Índices para tabela `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_task`
--
ALTER TABLE `tb_task`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de tabela `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
