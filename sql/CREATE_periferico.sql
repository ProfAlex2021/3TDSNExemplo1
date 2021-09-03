--
-- Banco de dados: `3tdsn`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `periferico`
--

CREATE TABLE IF NOT EXISTS `periferico` (
  `cod` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `cor` varchar(20) NOT NULL,
  `formato` varchar(20) NOT NULL,
  `cabo` tinyint(1) NOT NULL,
  `wireless` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `periferico`
--

INSERT INTO `periferico` (`cod`, `marca`, `modelo`, `cor`, `formato`, `cabo`, `wireless`) VALUES
(1, 'Logitech', 'G900s', 'preto', 'ergonômico', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `mouse`
--

CREATE TABLE IF NOT EXISTS `mouse` (
  `periferico` int(11) NOT NULL PRIMARY KEY,
  `botoes` int(11) NOT NULL,
  FOREIGN KEY (`periferico`) REFERENCES `periferico` (`cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `mouse`
--

INSERT INTO `mouse` (`periferico`, `botoes`) VALUES
(1, 11);

