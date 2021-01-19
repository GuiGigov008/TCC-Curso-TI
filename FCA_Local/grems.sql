-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Nov-2020 às 23:10
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `grems`
--

DELIMITER $$
--
-- Funções
--
CREATE DEFINER=`root`@`localhost` FUNCTION `getNameTypeProduct` (`idType` INT) RETURNS VARCHAR(20) CHARSET utf8mb4 BEGIN
    DECLARE nameType VARCHAR(20);

    IF (idType = 1) THEN
		SET nameType = 'Serviço';
    ELSEIF (idType = 2) THEN
        SET nameType = 'Peça';
    END IF;
	-- return the customer level
	RETURN (nameType);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `Id_Cliente` int(11) NOT NULL,
  `Tipo_Cliente` varchar(15) DEFAULT NULL,
  `Descricao_Cliente` varchar(50) DEFAULT NULL,
  `CPF_CNPJ` varchar(50) DEFAULT NULL,
  `RG_IE` varchar(50) DEFAULT NULL,
  `Cep_Cliente` varchar(50) DEFAULT NULL,
  `Endereco_Cliente` varchar(50) DEFAULT NULL,
  `Bairro_Cliente` varchar(50) DEFAULT NULL,
  `Cidade_Cliente` varchar(50) DEFAULT NULL,
  `Estado_Cliente` varchar(50) DEFAULT NULL,
  `Numero_Cliente` varchar(50) DEFAULT NULL,
  `Celular_Cliente` varchar(50) DEFAULT NULL,
  `Telefone_Cliente` varchar(50) DEFAULT NULL,
  `Email_Cliente` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`Id_Cliente`, `Tipo_Cliente`, `Descricao_Cliente`, `CPF_CNPJ`, `RG_IE`, `Cep_Cliente`, `Endereco_Cliente`, `Bairro_Cliente`, `Cidade_Cliente`, `Estado_Cliente`, `Numero_Cliente`, `Celular_Cliente`, `Telefone_Cliente`, `Email_Cliente`) VALUES
(1, 'Físico', 'Elias Alexandre Garcia', '48569885402', '34534', '01311-000', 'Avenida Paulista', 'Bela Vista', 'São Paulo', 'SP', '100', '11958648855', '11585673044', 'eliasgarcia@gmail.com'),
(2, '2', 'Marcos Silva', '81548468548746', '484816516', '01207-001', 'Rua Santa Ifigênia', 'Santa Efigênia', 'São Paulo', 'SP', '48', '11986484745', '1156730455', 'marcoss@gmail.com'),
(3, '1', 'Alciomar Hollanda', '48569885402', '34534', '13183-250', 'Avenida Thereza Ana Cecon Breda', 'Vila São Pedro', 'Hortolândia', 'SP', '89', '11958648855', '19566321842', 'alciomar.hollanda@gmail.com'),
(4, '1', 'Josemar', '11111111111111', '000000000', '13184-010', 'Rua Pastor Hugo Gegembauer', 'Parque Ortolândia', 'Hortolândia', 'SP', '1414', '99999999999', '99999999999', 'isso_e_um_teste@gmail.com'),
(9, '2', 'ola', '10000000000000', '000000000', '13082782', 'Avenida Doutor Eduardo Pereira de Almeida', 'Real Parque', 'Campinas', 'SP', '000', '10000000000', '99999999999', 'M@gmail.com'),
(10, '2', 'ola', '10000000000000', '100000000', '13380410', 'Avenida Brasil', 'Jardim Marajoara', 'Nova Odessa', 'SP', '10000', '10000000000', '2147483647', ''),
(11, '2', 'ola', '10000000000000', '100000000', '13380410', 'Avenida Brasil', 'Real Parque', 'Nova Odessa', 'SP', '000', '10000000000', '2147483647', 'jaja_123@gmail.com'),
(12, '2', 'Adalberto', '10000000000000', '000000000', '13380410', 'Avenida Brasil', 'Real Parque', 'Nova Odessa', 'SP', '10000', '10000000000', '2147483647', 'jaja_123@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `despesas`
--

CREATE TABLE `despesas` (
  `Id_Despesa` int(11) NOT NULL,
  `Descricao_Despesa` varchar(30) DEFAULT NULL,
  `Valor_Despesa` double DEFAULT NULL,
  `Data_Despesa` datetime DEFAULT current_timestamp(),
  `id_situacao_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `despesas`
--

INSERT INTO `despesas` (`Id_Despesa`, `Descricao_Despesa`, `Valor_Despesa`, `Data_Despesa`, `id_situacao_fk`) VALUES
(13, 'Conserto da fachada', 600, '2020-11-01 19:03:15', 1),
(14, 'Conserto da fachada', 1000, '2020-11-01 19:41:39', 1),
(15, 'Conserto do banheiro', 80, '2020-11-02 20:52:42', 1),
(16, 'Jogo de peças', 600, '2020-11-02 22:00:00', 4),
(17, 'Salário dos funcionários', 3000, '2020-11-11 18:54:51', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `Id_Fornecedor` int(11) NOT NULL,
  `Descricao_Fornecedor` varchar(30) DEFAULT NULL,
  `Cep_Fornecedor` int(15) DEFAULT NULL,
  `Endereco_Fornecedor` varchar(30) DEFAULT NULL,
  `Bairro_Fornecedor` varchar(30) DEFAULT NULL,
  `Cidade_Fornecedor` varchar(30) DEFAULT NULL,
  `Estado_Fornecedor` varchar(30) DEFAULT NULL,
  `Numero_Fornecedor` int(10) DEFAULT NULL,
  `Representante_Fornecedor` varchar(30) DEFAULT NULL,
  `Telefone_Fornecedor` varchar(30) DEFAULT NULL,
  `Email_Fornecedor` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`Id_Fornecedor`, `Descricao_Fornecedor`, `Cep_Fornecedor`, `Endereco_Fornecedor`, `Bairro_Fornecedor`, `Cidade_Fornecedor`, `Estado_Fornecedor`, `Numero_Fornecedor`, `Representante_Fornecedor`, `Telefone_Fornecedor`, `Email_Fornecedor`) VALUES
(1, 'Pirelli', 13199350, 'Rua João Giatti', 'Chácaras Meu Cantinho', 'Monte Mor', 'SP', 111, 'Reginaldo', '13959788888', 'teste@gmail.com'),
(4, 'Moura', 13082782, 'Avenida Doutor Eduardo Pereira', 'Real Parque', 'Campinas', 'SP', 47, 'Vanessa Duarte Souza', '99999999999', 'M@gmail.com'),
(6, 'Mecânica', 13380410, 'Avenida Brasil', 'Jardim Marajoara', 'Nova Odessa', 'SP', 47, 'Reinaldo', '2147483647', 'jaja_123@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `Id_Func` int(4) NOT NULL,
  `Nome_Func` varchar(30) NOT NULL,
  `CPF_Func` int(30) NOT NULL,
  `RG_Func` int(30) NOT NULL,
  `Telefone_Func` int(30) NOT NULL,
  `Celular_Func` int(30) NOT NULL,
  `Email_Func` varchar(30) NOT NULL,
  `CEP_Func` int(30) NOT NULL,
  `Cidade_Func` varchar(30) NOT NULL,
  `Estado_Func` varchar(30) NOT NULL,
  `Bairro_Func` varchar(30) NOT NULL,
  `Endereco_Func` varchar(30) NOT NULL,
  `Numero_Func` int(30) NOT NULL,
  `Cargo_Func` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`Id_Func`, `Nome_Func`, `CPF_Func`, `RG_Func`, `Telefone_Func`, `Celular_Func`, `Email_Func`, `CEP_Func`, `Cidade_Func`, `Estado_Func`, `Bairro_Func`, `Endereco_Func`, `Numero_Func`, `Cargo_Func`) VALUES
(3, 'Guilherme Paulino Gigov', 2147483647, 122021548, 2147483647, 2147483647, 'guigigov@outlook.com', 1311, 'São Paulo', 'SP', 'Bela Vista', 'Avenida Paulista 1313', 50, '2'),
(4, 'Ryan Nicolau Lopes', 2147483647, 122021548, 2147483647, 2147483647, 'ryan_nlopes@outlook.com', 13183621, 'Hortolândia', 'SP', 'Jardim Nova Hortolândia II', 'Rua Sebastiana Maria Santos So', 104, '1'),
(5, 'Jailson', 2147483647, 222222222, 2147483647, 0, 'jaja_123@gmail.com', 13380410, 'Nova Odessa', 'SP', 'Jardim Marajoara', 'Avenida Brasil', 11111, '2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamento`
--

CREATE TABLE `orcamento` (
  `Numero_Orcamento` int(9) NOT NULL,
  `Data_Retorno` varchar(20) NOT NULL,
  `Cliente` varchar(30) DEFAULT NULL,
  `Placa` varchar(30) DEFAULT NULL,
  `Modelo` varchar(30) NOT NULL,
  `Tecnico` varchar(30) DEFAULT NULL,
  `Atendente` varchar(30) DEFAULT NULL,
  `Produtos` int(10) NOT NULL,
  `Descontos` int(4) DEFAULT NULL,
  `Total_Geral` int(10) DEFAULT NULL,
  `Sugestao` varchar(200) DEFAULT NULL,
  `fk_id_cliente` int(11) DEFAULT NULL,
  `fk_id_situacao` int(11) DEFAULT NULL,
  `Data_Emissao` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `orcamento`
--

INSERT INTO `orcamento` (`Numero_Orcamento`, `Data_Retorno`, `Cliente`, `Placa`, `Modelo`, `Tecnico`, `Atendente`, `Produtos`, `Descontos`, `Total_Geral`, `Sugestao`, `fk_id_cliente`, `fk_id_situacao`, `Data_Emissao`) VALUES
(10, '2021-09-16', 'Elias Garcia', 'ACB-8564', 'Z1', 'guilherme paulino gigov', 'Ryan Nicolau Lopes', 95, 0, 95, '', 1, 4, '2020-09-29 11:51:07'),
(12, '', 'Elias Alexandre Garcia', 'ACB-8564', 'Z1', 'Guilherme Paulino Gigov', 'Ryan Nicolau Lopes', 156, 0, 156, '', 1, 1, '2020-11-29 11:51:07'),
(20, '2020-10-09', 'Alciomar Hollanda', 'DRA0129', 'Mustang', 'Guilherme Paulino Gigov', 'Ryan Nicolau Lopes', 26, 0, 26, '', 3, NULL, '2020-09-29 11:51:07'),
(21, '2020-09-21', 'Elias Alexandre Garcia', 'ACB-8564', 'Z1', 'Guilherme Paulino Gigov', 'Ryan Nicolau Lopes', 71, 10, 64, 'OBS', 1, 4, '2020-09-29 11:51:07'),
(22, '2020-09-21', 'Elias Alexandre Garcia', 'ACB-8564', 'Z1', 'Guilherme Paulino Gigov', 'Ryan Nicolau Lopes', 26, 1, 26, 'TESTE', 1, 1, '2020-09-29 11:51:07'),
(23, '2020-09-21', 'Elias Alexandre Garcia', 'ACB-8564', 'Z1', 'Guilherme Paulino Gigov', 'Ryan Nicolau Lopes', 26, 14, 22, 'PRESENTE', 1, 1, '2020-09-29 11:51:07'),
(24, '2021-09-29', 'Marcos Silva', 'OAE-5630', 'Renegade', 'Guilherme Paulino Gigov', 'Ryan Nicolau Lopes', 50, 0, 50, '', 2, 1, '2020-09-29 11:51:07'),
(25, '2020-10-10', 'Elias Alexandre Garcia', 'ACB-8564', 'Z1', 'Guilherme Paulino Gigov', 'Ryan Nicolau Lopes', 50, 0, 50, '', 1, 1, '2020-09-29 11:51:07'),
(26, '2020-10-02', 'Alciomar Hollanda', 'DRA0129', 'Mustang', 'Guilherme Paulino Gigov', 'Ryan Nicolau Lopes', 50, 0, 50, '', 3, 4, '2020-09-29 11:51:07'),
(27, '2020-10-07', 'Alciomar Hollanda', 'DRA0129', 'Mustang', 'Guilherme Paulino Gigov', 'Ryan Nicolau Lopes', 50, 0, 50, '', 3, 4, '2020-09-29 11:51:07'),
(29, '2020-10-10', 'Alciomar Hollanda', 'DRA0129', 'Mustang', 'Guilherme Paulino Gigov', 'Ryan Nicolau Lopes', 50, 12, 44, '', 3, 1, '2020-09-29 11:51:07'),
(30, '2020-10-05', 'Alciomar Hollanda', 'DRA0129', 'Mustang', 'Guilherme Paulino Gigov', 'Ryan Nicolau Lopes', 50, 0, 50, '', 3, 4, '2020-09-29 11:51:07'),
(31, '2020-10-10', 'Marcos Silva', 'OAE-5630', 'Renegade', 'Guilherme Paulino Gigov', 'Ryan Nicolau Lopes', 50, 0, 50, '', 2, 1, '2020-09-29 11:52:46'),
(33, '2021-11-01', 'Alciomar Hollanda', 'DRA0129', 'Mustang', 'Guilherme Paulino Gigov', 'Ryan Nicolau Lopes', 50, 0, 50, '', 3, 4, '2020-11-01 11:39:51'),
(34, '', 'Elias Alexandre Garcia', 'ACB-8564', 'Z1', 'Guilherme Paulino Gigov', 'Ryan Nicolau Lopes', 50, 0, 50, '', 1, 1, '2020-10-01 11:42:35'),
(35, '2021-11-02', 'Josemar', 'KUO-1234', 'Oito', 'Jailson', 'Ryan Nicolau Lopes', 600, 20, 480, 'Pagar a vista.', 4, 1, '2020-11-02 22:01:27'),
(37, '2021-11-11', 'Alciomar Hollanda', 'DRA0129', 'Mustang', 'Guilherme Paulino Gigov', 'Ryan Nicolau Lopes', 260, 10, 234, 'Pagar em 3x.', 3, 1, '2020-11-11 15:17:27'),
(38, '2020-11-27', 'Elias Alexandre Garcia', 'ACB-8564', 'Z1', 'Jailson', 'Ryan Nicolau Lopes', 500, 5, 475, 'Transferir para a conta.', 1, 1, '2020-11-11 15:40:02'),
(39, '2020-11-15', 'Alciomar Hollanda', 'DRA0129', 'Mustang', 'Jailson', 'Ryan Nicolau Lopes', 550, 4, 528, 'Pagar 5 agora e 5 no próximo mês.', 3, 1, '2020-11-11 15:44:55'),
(40, '', 'Josemar', 'KUO-1234', 'Oito', 'Guilherme Paulino Gigov', 'Ryan Nicolau Lopes', 50, 1, 50, 'TESTE', 4, 1, '2020-11-11 15:45:52');

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamento_detalhes`
--

CREATE TABLE `orcamento_detalhes` (
  `ID` int(10) NOT NULL,
  `FK_Detalhes` int(10) NOT NULL,
  `Produto` varchar(30) DEFAULT NULL,
  `Quantidade` int(10) DEFAULT NULL,
  `Valor_Unico` double DEFAULT NULL,
  `Sub_Total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `orcamento_detalhes`
--

INSERT INTO `orcamento_detalhes` (`ID`, `FK_Detalhes`, `Produto`, `Quantidade`, `Valor_Unico`, `Sub_Total`) VALUES
(10, 10, 'Troca de oleo', 1, 44.99, 44.99),
(11, 10, 'Limpeza', 1, 50, 50),
(12, 12, 'Volante', 6, 25.99, 155.94),
(13, 20, 'Volante', 1, 25.99, 25.99),
(14, 21, 'Volante', 1, 25.99, 25.99),
(15, 21, 'Troca de oleo', 1, 44.99, 44.99),
(16, 22, 'Volante', 1, 25.99, 25.99),
(17, 23, 'Volante', 1, 25.99, 25.99),
(18, 24, 'Pneu', 1, 50, 50),
(19, 25, 'Pneu', 1, 50, 50),
(20, 26, 'Pneu', 1, 50, 50),
(21, 27, 'Pneu', 1, 50, 50),
(22, 29, 'Pneu', 1, 50, 50),
(23, 30, 'Pneu', 1, 50, 50),
(24, 31, 'Pneu', 1, 50, 50),
(25, 33, 'Pneu', 1, 50, 50),
(26, 34, 'Pneu', 1, 50, 50),
(27, 35, 'Pneu', 1, 50, 50),
(28, 35, 'Jogo de Pneus Voyage', 1, 500, 500),
(29, 35, 'Troca de Oléo', 1, 50, 50),
(30, 37, 'Limpeza no cabeçote', 1, 60, 60),
(31, 37, 'Válvula', 1, 200, 200),
(32, 38, 'Jogo de Pneus Voyage', 1, 500, 500),
(33, 39, 'Pneu', 11, 50, 550),
(34, 40, 'Pneu', 1, 50, 50);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `Id_Produto` int(4) NOT NULL,
  `Descricao_Produto` varchar(27) DEFAULT NULL,
  `Preco_Produto` double DEFAULT NULL,
  `Tipo_Produto` varchar(25) DEFAULT NULL,
  `fk_id_forn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`Id_Produto`, `Descricao_Produto`, `Preco_Produto`, `Tipo_Produto`, `fk_id_forn`) VALUES
(2, 'Pneu', 50, 'Peca', 1),
(4, 'Jogo de Pneus Voyage', 500, 'Peca', 1),
(6, 'Troca de Oléo', 50, 'Servico', 6),
(7, 'Válvula', 200, 'Peca', 6),
(8, 'Limpeza no cabeçote', 60, 'Servico', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacao`
--

CREATE TABLE `situacao` (
  `Id_Situacao` int(11) NOT NULL,
  `Descricao_Situacao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `situacao`
--

INSERT INTO `situacao` (`Id_Situacao`, `Descricao_Situacao`) VALUES
(1, 'Finalizado'),
(2, 'Não Pago'),
(3, 'Não Realizado'),
(4, 'Em andamento');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `adm` int(1) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`email`, `senha`, `nome`, `adm`, `id`) VALUES
('ryan_nlopes@outlook.com', '1234', 'Ryan Nicolau Lopes', 1, 1),
('guigigov@outlook.com', '1234', 'Guilherme Paulino Gigov', 1, 3),
('teste@teste.com', '123', 'Guilherme', 1, 4),
('alciomar.hollanda@hotmail.com', '1234', 'Alciomar Hollanda', 0, 5),
('araclecio@gmail.com', '1234', 'Araclécio', 2, 9),
('g@gmail.com', '123', 'Olaf', 1, 10),
('julia@gmail.com', '1234', 'Julia', 2, 14),
('ricardo@gmail.com', '1234', 'Ricardo', 2, 15),
('ricardo@gmail.com', '123', 'Ricardo', 1, 16),
('marcos.abel@hotmail.com', '1234', 'Marcos Abel', 0, 17);

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculos`
--

CREATE TABLE `veiculos` (
  `Placa` varchar(30) COLLATE utf8_bin NOT NULL,
  `Modelo` varchar(50) COLLATE utf8_bin NOT NULL,
  `Marca` varchar(50) COLLATE utf8_bin NOT NULL,
  `Ano` year(4) NOT NULL,
  `cor` varchar(50) COLLATE utf8_bin NOT NULL,
  `fk_id_cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `veiculos`
--

INSERT INTO `veiculos` (`Placa`, `Modelo`, `Marca`, `Ano`, `cor`, `fk_id_cliente`) VALUES
('ACB-8564', 'Z1', 'BMW', 2016, 'Branco', 1),
('DRA0129', 'Mustang', 'Ford', 2020, 'Preto', 3),
('KUO-1234', 'Oito', 'Audi', 2030, 'Verde', 4),
('LPO-5649', 'Civic', 'Honda', 2018, 'Amarelo', 12),
('OAE-5630', 'Renegade', 'Jeep', 2018, 'Preto', 2),
('PHJ-5641', 'Onix', 'Chevrolet', 2016, 'Branco', 4);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`Id_Cliente`);

--
-- Índices para tabela `despesas`
--
ALTER TABLE `despesas`
  ADD PRIMARY KEY (`Id_Despesa`),
  ADD KEY `id_situacao_fk` (`id_situacao_fk`);

--
-- Índices para tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`Id_Fornecedor`),
  ADD UNIQUE KEY `Cep_Fornecedor` (`Cep_Fornecedor`);

--
-- Índices para tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`Id_Func`);

--
-- Índices para tabela `orcamento`
--
ALTER TABLE `orcamento`
  ADD PRIMARY KEY (`Numero_Orcamento`),
  ADD KEY `fk_id_cliente` (`fk_id_cliente`),
  ADD KEY `fk_id_situacao` (`fk_id_situacao`);

--
-- Índices para tabela `orcamento_detalhes`
--
ALTER TABLE `orcamento_detalhes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_Detalhes` (`FK_Detalhes`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`Id_Produto`),
  ADD KEY `fk_id_forn` (`fk_id_forn`);

--
-- Índices para tabela `situacao`
--
ALTER TABLE `situacao`
  ADD PRIMARY KEY (`Id_Situacao`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`,`email`);

--
-- Índices para tabela `veiculos`
--
ALTER TABLE `veiculos`
  ADD PRIMARY KEY (`Placa`),
  ADD KEY `fk_id_cliente` (`fk_id_cliente`) USING BTREE;

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `Id_Cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `despesas`
--
ALTER TABLE `despesas`
  MODIFY `Id_Despesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `Id_Fornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `Id_Func` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `orcamento`
--
ALTER TABLE `orcamento`
  MODIFY `Numero_Orcamento` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `orcamento_detalhes`
--
ALTER TABLE `orcamento_detalhes`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `Id_Produto` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `situacao`
--
ALTER TABLE `situacao`
  MODIFY `Id_Situacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `despesas`
--
ALTER TABLE `despesas`
  ADD CONSTRAINT `id_situacao_fk` FOREIGN KEY (`id_situacao_fk`) REFERENCES `situacao` (`Id_Situacao`);

--
-- Limitadores para a tabela `orcamento`
--
ALTER TABLE `orcamento`
  ADD CONSTRAINT `orcamento_ibfk_1` FOREIGN KEY (`fk_id_cliente`) REFERENCES `clientes` (`Id_Cliente`),
  ADD CONSTRAINT `orcamento_ibfk_2` FOREIGN KEY (`fk_id_situacao`) REFERENCES `situacao` (`Id_Situacao`);

--
-- Limitadores para a tabela `orcamento_detalhes`
--
ALTER TABLE `orcamento_detalhes`
  ADD CONSTRAINT `orcamento_detalhes_ibfk_1` FOREIGN KEY (`FK_Detalhes`) REFERENCES `orcamento` (`Numero_Orcamento`);

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `fk_id_forn` FOREIGN KEY (`fk_id_forn`) REFERENCES `fornecedores` (`Id_Fornecedor`);

--
-- Limitadores para a tabela `veiculos`
--
ALTER TABLE `veiculos`
  ADD CONSTRAINT `veiculos_ibfk_1` FOREIGN KEY (`fk_id_cliente`) REFERENCES `clientes` (`Id_Cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
