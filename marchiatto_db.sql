-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16/05/2024 às 20:17
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `marchiatto_db`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`) VALUES
(1, 'Bebidas Quentes'),
(3, 'Iced'),
(4, 'Frapp'),
(5, 'Comidas'),
(6, 'Sucos'),
(7, 'Outros');

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `produto_id` int(11) DEFAULT NULL,
  `preco_produto` decimal(10,2) DEFAULT NULL,
  `data_pedido` timestamp NOT NULL DEFAULT current_timestamp(),
  `atendido` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text DEFAULT NULL,
  `categoria_id` int(11) NOT NULL,
  `preco` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `categoria_id`, `preco`) VALUES
(1, 'Expresso Nível I', 'Café expresso normal', 1, 6.00),
(2, 'Expresso Nível II', 'Café expresso forte', 1, 7.00),
(3, 'Expresso Nível III', 'Café expresso extra forte', 1, 8.00),
(6, 'Cappuccino Pequeno', 'Café com leite vaporizado e espuma de leite', 1, 9.00),
(7, 'Cappuccino Médio', 'Café com leite vaporizado e espuma de leite', 1, 11.00),
(8, 'Cappuccino Grande', 'Café com leite vaporizado e espuma de leite', 1, 13.00),
(9, 'Mocha Preto Pequeno', 'Café com chocolate e leite vaporizado', 1, 11.00),
(10, 'Mocha Preto Médio', 'Café com chocolate e leite vaporizado', 1, 13.00),
(11, 'Mocha Preto Grande', 'Café com chocolate e leite vaporizado', 1, 17.00),
(12, 'Mocha Branco Pequeno', 'Café com chocolate branco e leite vaporizado', 1, 11.00),
(13, 'Mocha Branco Médio', 'Café com chocolate branco e leite vaporizado', 1, 13.00),
(14, 'Mocha Branco Grande', 'Café com chocolate branco e leite vaporizado', 1, 17.00),
(15, 'Vanilla Latte Pequeno', 'Café com baunilha e leite vaporizado', 1, 11.00),
(16, 'Vanilla Latte Médio', 'Café com baunilha e leite vaporizado', 1, 13.00),
(17, 'Vanilla Latte Grande', 'Café com baunilha e leite vaporizado', 1, 17.00),
(18, 'Caramelo Macchiato Pequeno', 'Café com caramelo e leite vaporizado', 1, 11.00),
(19, 'Caramelo Macchiato Médio', 'Café com caramelo e leite vaporizado', 1, 13.00),
(20, 'Caramelo Macchiato Grande', 'Café com caramelo e leite vaporizado', 1, 17.00),
(21, 'Doce de Leite Pequeno', 'Café com doce de leite e leite vaporizado', 1, 11.00),
(22, 'Doce de Leite Médio', 'Café com doce de leite e leite vaporizado', 1, 13.00),
(23, 'Doce de Leite Grande', 'Café com doce de leite e leite vaporizado', 1, 17.00),
(24, 'Chai Latte Pequeno', 'Chá com especiarias e leite vaporizado', 1, 11.00),
(25, 'Chai Latte Médio', 'Chá com especiarias e leite vaporizado', 1, 13.00),
(26, 'Chai Latte Grande', 'Chá com especiarias e leite vaporizado', 1, 17.00),
(27, 'Iced Mocha Preto', 'Café gelado com chocolate', 3, 15.00),
(28, 'Iced Mocha Branco', 'Café gelado com chocolate branco', 3, 15.00),
(29, 'Iced Vanilla Latte', 'Café gelado com baunilha', 3, 15.00),
(30, 'Iced Caramelo Macchiato', 'Café gelado com caramelo', 3, 15.00),
(31, 'Iced Doce de Leite', 'Café gelado com doce de leite', 3, 15.00),
(32, 'Iced Chai Latte', 'Chá gelado com especiarias', 3, 15.00),
(33, 'Frapp Café', 'Bebida gelada com base de café', 4, 19.00),
(34, 'Frapp Mocha Preto', 'Bebida gelada com base de café e chocolate', 4, 19.00),
(35, 'Frapp Mocha Branco', 'Bebida gelada com base de café e chocolate branco', 4, 19.00),
(36, 'Frapp Doce de Leite', 'Bebida gelada com base de café e doce de leite', 4, 19.00),
(37, 'Frapp Baunilha', 'Bebida gelada com base de creme sabor baunilha', 4, 19.00),
(38, 'Frapp Morango', 'Bebida gelada com base de creme sabor morango', 4, 19.00),
(39, 'Frapp Chocolate', 'Bebida gelada com base de creme sabor chocolate', 4, 19.00),
(40, 'Frapp Chocolate Branco', 'Bebida gelada com base de creme sabor chocolate branco', 4, 19.00),
(41, 'Frapp Leite Ninho', 'Bebida gelada com base de creme sabor leite ninho', 4, 19.00),
(42, 'Pão na Chapa', 'Pão na chapa quentinho', 5, 5.00),
(43, 'Pão de Queijo', 'Delicioso pão de queijo', 5, 8.00),
(44, 'Panini', 'Sanduíche grelhado', 5, 11.00),
(45, 'Salgados', 'Salgados variados', 5, 11.00),
(46, 'Toast', 'Fatias de pão tostadas', 5, 9.00),
(47, 'Cookie', 'Biscoito Cookie', 5, 9.00),
(48, 'Waffle', 'Waffle com cobertura', 5, 9.00),
(49, 'Croissant', 'Croissant fresco', 5, 11.00),
(50, 'Brownie', 'Brownie de chocolate', 5, 11.00),
(51, 'Suco de Frutas Vermelhas', 'Suco de frutas vermelhas', 6, 11.00),
(52, 'Suco Detox', 'Suco detox de frutas', 6, 11.00),
(53, 'Suco de Melancia', 'Suco de melancia natural', 6, 11.00),
(54, 'Suco de Amora', 'Suco de amora fresca', 6, 11.00),
(55, 'Suco de Maracujá', 'Suco de maracujá natural', 6, 11.00),
(56, 'Suco de Morango', 'Suco de morango fresco', 6, 11.00),
(57, 'Suco de Manga', 'Suco de manga natural', 6, 11.00),
(58, 'Suco de Abacaxi', 'Suco de abacaxi natural', 6, 11.00),
(59, 'Cafe Latte Pequeno', 'Feita com café expresso e leite vaporizado', 1, 9.00),
(60, 'Cafe Latte Médio', 'Feita com café expresso e leite vaporizado', 1, 11.00),
(61, 'Cafe Latte Grande', 'Feita com café expresso e leite vaporizado', 1, 13.00),
(62, 'Água', 'Água mineral comum', 7, 4.00),
(63, 'Água com gás', 'Água gaseificada', 7, 5.00),
(64, 'Água tônica', 'Bebida carbonatada com sabor característico', 7, 8.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `senha` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nome`, `senha`) VALUES
(1, 'marchiatto', '202cb962ac59075b964b07152d234b70');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`),
  ADD KEY `produto_id` (`produto_id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`idCliente`),
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`);

--
-- Restrições para tabelas `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
