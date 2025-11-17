-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17/11/2025 às 22:20
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `locadora_filme_site`
CREATE DATABASE locadora_filme_site;
USE locadora_filme_site;
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `dataNas` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `dataNas`, `email`, `senha`) VALUES
(5, 'Niely', '2025-10-04', 'mestre@gmail.com', '$2y$10$.KTOaOwMaH83sRfHwdGwaOqneAqhnlcz2IOTHkiyrDZqJhmuUN.wu'),
(6, 'Caveira', '1998-02-28', 'caveira@gmail.com', '$2y$10$MCxp2WTRBlV4yalErNXMf.ZrpXQmHRztfwWkzKhll0xyXpfkXhHv.'),
(7, 'Nicoly', '2000-01-01', 'nic.sOUZA19092006@gmail.com', '$2y$10$OEWD8fEnhg0k62psOP3Kre3J4MG6NJ58rx5ZNS/hPSW6Ej1whn1sa'),
(8, 'a', '2005-02-03', 'a@gmail.com', '$2y$10$CkTzsPEuMremsx/EOWK3huPR4I3y4crI.fZB0Hs1vbBIfG8E1Esl.'),
(9, 'n', '2025-11-07', 'n@gmail.com', '$2y$10$UuoacNsQ6SuwZmAUdDR5iejqIAy2wotiS2NavBb0z/G4HUT6ne1Yu');

-- --------------------------------------------------------

--
-- Estrutura para tabela `filmes`
--

CREATE TABLE `filmes` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `ano` int(11) NOT NULL,
  `valor` decimal(6,2) NOT NULL,
  `imagem` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `filmes`
--

INSERT INTO `filmes` (`id`, `nome`, `categoria`, `ano`, `valor`, `imagem`) VALUES
(18, 'Gladiador', 'Ação', 2000, 19.90, 'https://www.cafecomfilme.com.br/media/k2/items/cache/7a7a1b5b62bd91f168816ae073e91b87_XL.jpg'),
(20, 'O Senhor dos Anéis: A Sociedade do Anel', 'Fantasia', 2001, 22.00, 'https://img.elo7.com.br/product/zoom/269274A/poster-o-senhor-dos-aneis-a-sociedade-do-anel-lo04-90x60-cm-presente-geek.jpg'),
(21, 'Efeito Borboleta', 'Ficção Científica', 2004, 16.75, 'https://br.web.img3.acsta.net/pictures/13/12/18/20/56/273919.jpg'),
(22, 'Coraline', 'Mistério', 2004, 15.60, 'https://m.media-amazon.com/images/S/pv-target-images/748372ce6a4340835989bb47e3db8b6ca47def2c89ff874dad3ee8b8ca78971b.png'),
(23, 'Pânico 4', 'Terror', 2004, 13.20, 'https://cinema10.com.br/upload/featuredImage.php?url=https%3A%2F%2Fcinema10.com.br%2Fupload%2Ffilmes%2Ffilmes_797_Panico+4+Poster.jpg'),
(24, 'Quarteto Fantástico', 'Aventura', 2005, 18.95, 'https://br.web.img3.acsta.net/pictures/14/04/02/18/17/010475.jpg'),
(25, 'Batman Begins', 'Ação', 2005, 21.00, 'https://m.media-amazon.com/images/I/61V96oRNd7L._AC_UF1000,1000_QL80_.jpg'),
(26, 'King Kong', 'Aventura', 2005, 19.50, 'https://br.web.img3.acsta.net/medias/nmedia/18/95/13/92/20384102.jpg'),
(27, 'A Praia', 'Suspense', 2000, 17.20, 'https://br.web.img2.acsta.net/pictures/210/100/21010018_20130603224655252.jpg'),
(28, 'Mulholland Drive', 'Terror', 2001, 16.10, 'https://www.cinebelasartes.com.br/wp-content/uploads/2017/11/cidade-dos-sonhos.jpg'),
(29, 'Donnie Darko', 'Drama', 2001, 15.90, 'https://m.media-amazon.com/images/I/A10ZN4iJTxL.jpg'),
(30, 'Homem-Aranha 2', 'Ação', 2004, 20.00, 'https://img.elo7.com.br/product/zoom/26776BD/big-poster-filme-homem-aranha-2-2004-lo02-tamanho-90x60-cm-marvel.jpg'),
(31, 'O Diário de Uma Paixão', 'Romance', 2004, 18.40, 'https://br.web.img3.acsta.net/medias/nmedia/18/91/21/92/20135014.jpg'),
(32, 'V de Vingança', 'Ação', 2005, 22.50, 'https://br.web.img2.acsta.net/pictures/210/506/21050637_20131017235623573.jpg'),
(33, 'Senhor e Senhora Smith', 'Ação', 2005, 19.80, 'https://br.web.img3.acsta.net/medias/nmedia/18/91/11/31/20130070.jpg'),
(34, 'Os Infiltrados', 'Crime', 2006, 21.70, 'https://br.web.img3.acsta.net/medias/nmedia/18/90/18/94/20085052.jpg'),
(35, 'Matrix Reloaded', 'Ficção Científica', 2003, 19.90, 'https://play-lh.googleusercontent.com/n5czjPGyqPFb7rLe26pe24UC21hM_UFUKyhEbXL7e3wRxykbteJDLwQuYFMjmJpcM9YXGFHgSQyEQc4hAg'),
(36, 'Matrix Revolutions', 'Ficção Científica', 2003, 19.90, 'https://m.media-amazon.com/images/S/pv-target-images/1912f4bf994d82ad9af79714a05eb9140bde65953b2f68b87a8e77d09d330d18.jpg'),
(37, 'O Senhor dos Anéis: As Duas Torres', 'Fantasia', 2002, 22.50, 'https://br.web.img2.acsta.net/medias/nmedia/18/92/34/89/20194741.jpg'),
(38, 'O Senhor dos Anéis: O Retorno do Rei', 'Fantasia', 2003, 22.50, 'https://play-lh.googleusercontent.com/Jzu6hPVBKBp3aFkKHvsOEsv5OeO33XneO3YVbWO818SUN1gLMCkT2vuQZGk55D2PUmyVwzTSRzJ92WtD4A'),
(39, 'Homem-Aranha', 'Ação', 2002, 18.90, 'https://www.sonypictures.com.br/sites/brazil/files/2022-03/HA1_KEY%20ART.JPG'),
(40, 'Harry Potter e a Pedra Filosofal', 'Fantasia', 2001, 20.00, 'https://upload.wikimedia.org/wikipedia/pt/1/1d/Harry_Potter_Pedra_Filosofal_2001.jpg'),
(41, 'Harry Potter e a Câmara Secreta', 'Fantasia', 2002, 20.00, 'https://m.media-amazon.com/images/S/pv-target-images/90d472ec5e2bfb57399f22f0037c9cf7be9fb7a452a73f741805472092bca6ad.jpg'),
(43, 'O Código Da Vinci', 'Mistério', 2006, 19.50, 'https://m.media-amazon.com/images/S/pv-target-images/2a57bcaa550fc1a8b76e8a5c5203f55067aa09ddc2fa2666757d2749d6bd3524.jpg'),
(44, 'Os Outros', 'Suspense', 2001, 16.80, 'https://m.media-amazon.com/images/I/611tlXI0pwL._AC_UF894,1000_QL80_.jpg'),
(45, 'A Ilha do Medo', 'Thriller', 2010, 18.70, 'https://m.media-amazon.com/images/M/MV5BNDE4NDk1ODItMWVkNi00YTA0LWIzNDEtYzdjYjA2MGE3MzllXkEyXkFqcGc@._V1_.jpg'),
(46, 'Pearl Harbor', 'Guerra', 2001, 17.60, 'https://m.media-amazon.com/images/S/pv-target-images/5f11557ad33b00e0638334ae324a8cef3c784fd5ad17a1b259cf3f75c2b383ee.jpg'),
(47, 'Procurando Nemo', 'Animação', 2003, 15.90, 'https://m.media-amazon.com/images/I/61KcmrlBKqL._AC_UF1000,1000_QL80_.jpg'),
(48, 'Os Incríveis', 'Animação', 2004, 16.50, 'https://m.media-amazon.com/images/M/MV5BYTU0MWVhOTUtNGI4YS00ZGE3LTg0NjMtNzQ2ZjZjMDBkZTc4XkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg'),
(49, 'Up: Altas Aventuras', 'Animação', 2009, 17.50, 'https://br.web.img3.acsta.net/medias/nmedia/18/92/03/73/20176438.jpg'),
(51, 'Piratas do Caribe: O Baú da Morte', 'Aventura', 2006, 19.90, 'https://img.elo7.com.br/product/zoom/26881DC/big-poster-piratas-do-caribe-o-bau-da-morte-lo01-90x60-cm-poster.jpg'),
(53, 'A Origem', 'Ficção Científica', 2010, 22.00, 'https://m.media-amazon.com/images/I/61AFbsFwh7L._AC_UF894,1000_QL80_.jpg'),
(54, 'O Grande Truque', 'Suspense', 2006, 18.00, 'https://m.media-amazon.com/images/I/51kWc9rO0bL._AC_UF894,1000_QL80_.jpg'),
(55, 'Constantine', 'Ação', 2005, 19.50, 'https://br.web.img2.acsta.net/pictures/210/163/21016319_20130627174102758.jpg'),
(56, 'Homem de Ferro', 'Ação', 2008, 21.00, 'https://m.media-amazon.com/images/I/81vTHovrz+L._AC_UF894,1000_QL80_.jpg'),
(57, 'O Incrível Hulk', 'Ação', 2008, 20.00, 'https://i.pinimg.com/736x/e1/5a/f0/e15af0210c2f64fb31108149dd5bd331.jpg'),
(59, 'Thor', 'Ação', 2011, 21.00, 'https://super.abril.com.br/wp-content/uploads/2018/07/cartaz-thor.jpg'),
(60, 'Capitão América: O Primeiro Vingador', 'Ação', 2011, 21.00, 'https://img.elo7.com.br/product/zoom/2665135/big-poster-capitao-america-o-primeiro-vingador-lo01-90x60-cm-poster-cinema.jpg'),
(61, 'Os Vingadores', 'Ação', 2012, 23.00, 'https://img.elo7.com.br/product/zoom/267846A/big-poster-filme-os-vingadores-2012-lo01-tamanho-90x60-cm-poster-de-filme.jpg'),
(62, 'Avatar', 'Ficção Científica', 2009, 22.50, 'https://img.elo7.com.br/product/zoom/46B927D/big-poster-filme-avatar-o-caminho-da-agua-90x60-cm-lo001-avatar-o-caminho-da-agua.jpg'),
(63, 'Star Wars: Episódio I - A Ameaça Fantasma', 'Ficção Científica', 1999, 19.00, 'https://m.media-amazon.com/images/I/31hvZEKoxNL._AC_UF1000,1000_QL80_.jpg'),
(64, 'Star Wars: Episódio II - Ataque dos Clones', 'Ficção Científica', 2002, 19.00, 'https://m.media-amazon.com/images/I/51Cd26gZ9cL._UF1000,1000_QL80_.jpg'),
(65, 'As Vantagens de Ser Invisível', 'Drama', 2012, 17.90, 'https://m.media-amazon.com/images/I/81mbcHKS84L._AC_UF1000,1000_QL80_.jpg'),
(66, 'Forrest Gump', 'Drama', 1994, 19.50, 'https://uauposters.com.br/media/catalog/product/3/5/352820210407-uau-posters-forrest-gump-filmes-3.jpg'),
(67, 'Maze Runner: Correr ou Morrer', 'Ação', 2014, 18.90, 'https://i.pinimg.com/736x/6a/14/1f/6a141f8ca520aa504fa76e386c8a804a.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `locacao_filme`
--

CREATE TABLE `locacao_filme` (
  `id` int(11) NOT NULL,
  `id_filme` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `data_locacao` date NOT NULL,
  `data_devolucao` date NOT NULL,
  `valor` decimal(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `locacao_filme`
--

INSERT INTO `locacao_filme` (`id`, `id_filme`, `id_cliente`, `data_locacao`, `data_devolucao`, `valor`) VALUES
(1, 39, 6, '2025-10-30', '2025-10-31', NULL),
(2, 22, 6, '2025-10-30', '2025-11-04', NULL),
(3, 20, 6, '2025-10-30', '2025-11-05', NULL),
(4, 65, 6, '2025-10-30', '2025-10-31', NULL),
(5, 65, 6, '2025-10-30', '2025-10-31', NULL),
(6, 65, 6, '2025-10-30', '2025-10-31', NULL),
(7, 65, 6, '2025-10-30', '2025-11-06', NULL),
(8, 65, 6, '2025-10-30', '2025-11-04', NULL),
(9, 65, 6, '2025-10-30', '2025-11-04', NULL),
(10, 65, 6, '2025-10-30', '2025-11-04', NULL),
(11, 65, 6, '2025-10-30', '2025-11-04', NULL),
(12, 28, 6, '2025-10-30', '2025-11-05', NULL),
(13, 20, 7, '2025-11-05', '2025-11-21', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `filmes`
--
ALTER TABLE `filmes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `locacao_filme`
--
ALTER TABLE `locacao_filme`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `filmes`
--
ALTER TABLE `filmes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de tabela `locacao_filme`
--
ALTER TABLE `locacao_filme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
