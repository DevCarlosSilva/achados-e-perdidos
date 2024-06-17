SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS `lost_and_found` DEFAULT CHARACTER SET utf8 ;
USE `lost_and_found` ;

-- Tables
CREATE TABLE IF NOT EXISTS `lost_and_found`.`accounts` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL UNIQUE,
  `admin` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`));

CREATE TABLE IF NOT EXISTS `lost_and_found`.`categories` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`));

CREATE TABLE IF NOT EXISTS `lost_and_found`.`returned_items` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(100) NOT NULL,
  `receiver_name` VARCHAR(45) NOT NULL,
  `date_of_return` DATETIME NOT NULL,
  `category_id` INT NOT NULL,
  PRIMARY KEY (`id`),
    FOREIGN KEY (`category_id`) REFERENCES `lost_and_found`.`category` (`id`));

CREATE TABLE IF NOT EXISTS `lost_and_found`.`found_items` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(100) NOT NULL,
  `date_of_find` DATETIME NOT NULL,
  `place_of_find` VARCHAR(45) NOT NULL,
  `category_id` INT NOT NULL,
  PRIMARY KEY (`id`),
    FOREIGN KEY (`category_id`) REFERENCES `lost_and_found`.`category` (`id`));

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- Views
create view found_items_view as select fi.name, fi.description, fi.date_of_find, fi.place_of_find, c.name as category
from found_items as fi
join categories as c on fi.category_id = c.id;

create view returned_items_view as select ri.name, ri.description, ri.receiver_name, ri.date_of_return, c.name as category
from returned_items as ri
join categories as c on ri.category_id = c.id;

create view report as select count(c.id) as countIDcat, c.name as category
from found_items as fi
join categories as c on fi.category_id = c.id
group by c.id order by countIDcat desc;

-- Account examples
INSERT INTO `accounts` (`id`, `username`, `password`, `email`, `admin`) VALUES 
(NULL, 'carlos', '123', 'carlos@gmail.com', '0'), 
(NULL, 'admin', '000', 'admin@gmail.com', '1');

-- Category examples
INSERT INTO `categories` (`id`, `name`) VALUES 
(NULL, 'Outros'), 
(NULL, 'Material escolar'), 
(NULL, 'Roupas'), 
(NULL, 'Livros'), 
(NULL, 'Eletrônicos'), 
(NULL, 'Acessórios'), 
(NULL, 'Esportes'), 
(NULL, 'Pertences');

-- Found item examples
INSERT INTO `found_items` (`id`, `name`, `description`, `date_of_find`, `place_of_find`, `category_id`) VALUES 
(NULL, 'Mochila vermelha', 'Mochila de tecido vermelho, com zíper quebrado.', '2024-06-13 11:07:00', 'Biblioteca', '2'), 
(NULL, 'Casaco azul', 'Casaco de lã azul, tamanho médio.', '2024-06-02 04:10:38', 'Sala de aula 3B', '3'), 
(NULL, 'Chaveiro de borboleta', 'Chaveiro com pingente de borboleta dourada.', '2024-05-18 04:18:25', 'Pátio', '6'), 
(NULL, 'Livro \"Harry Potter\"', 'Livro \"Harry Potter e a Pedra Filosofal\", capa desgastada.', '2024-05-25 05:49:36', 'Biblioteca', '4'), 
(NULL, 'Garrafa de Água', 'Garrafa de água azul com adesivos.', '2024-05-28 05:51:04', 'Cantina', '8'), 
(NULL, 'Boné Branco', 'Boné branco com logotipo da escola.', '2024-05-30 05:51:47', 'Quadra de esportes', '6'), 
(NULL, 'Fones de Ouvido', 'Fones de ouvido preto, marca Sony.', '2024-06-01 05:52:13', 'Sala de informática', '5'), 
(NULL, 'Caderno de Desenho', 'Caderno de desenho com capa vermelha, vários desenhos a lápis.', '2024-06-04 05:52:44', 'Sala de arte', '2'), 
(NULL, 'Óculos de Grau', 'Óculos de grau com armação preta.', '2024-06-05 05:53:20', 'Banheiro do segundo andar', '6'), 
(NULL, 'Carteira', 'Carteira de couro marrom com documentos e dinheiro dentro.', '2024-06-16 10:15:00', 'Refeitório', '8'), 
(NULL, 'Celular', 'Smartphone preto com capa protetora roxa.', '2024-06-16 12:45:00', 'Pátio', '5'), 
(NULL, 'Óculos de Sol', 'Óculos de sol modelo aviador com armação dourada.', '2024-06-16 14:20:00', 'Quadra de Esportes', '6'), 
(NULL, 'Chaves', 'Conjunto de chaves com chaveiro de chave de fenda.', '2024-06-16 15:55:00', 'Laboratório de Informática', '8'), 
(NULL, 'Anel', 'Anel de prata com uma pedra azul.', '2024-06-16 17:30:00', 'Biblioteca', '6'), 
(NULL, 'Bola de Futebol', 'Bola de futebol tamanho oficial, branca e preta.', '2024-06-17 09:00:00', 'Campo de Futebol', '7'), 
(NULL, 'Caderno', 'Caderno universitário com capa dura azul.', '2024-06-17 11:20:00', 'Sala de Estudos', '2'), 
(NULL, 'Brinquedo', 'Carrinho de controle remoto vermelho.', '2024-06-17 13:45:00', 'Parquinho', '1'), 
(NULL, 'Relógio', 'Relógio de pulso dourado com pulseira de couro marrom.', '2024-06-17 16:10:00', 'Corredor Principal', '6'), 
(NULL, 'Livro', 'Livro de matemática do 2º ano.', '2024-06-17 18:30:00', 'Sala de Aula 1A', '4');

-- Returned item examples
INSERT INTO `returned_items` (`id`, `name`, `description`, `receiver_name`, `date_of_return`, `category_id`) VALUES 
(NULL, 'Bicicleta Azul', 'Bicicleta de criança azul, sem pedais.', 'João Silva', '2024-06-20 14:00:00', '1'), 
(NULL, 'Jaqueta Preta', 'Jaqueta de couro preta, tamanho grande.', 'Maria Oliveira', '2024-06-21 16:30:00', '3'), 
(NULL, 'Brinco de Pérola', 'Par de brincos de pérola.', 'Ana Souza', '2024-06-22 11:00:00', '6'), 
(NULL, 'Caderno de Matemática', 'Caderno de matemática, capa azul.', 'Carlos Lima', '2024-06-23 09:15:00', '4'), 
(NULL, 'Smartwatch', 'Relógio inteligente preto, marca Apple.', 'Rafael Costa', '2024-06-24 10:45:00', '5'), 
(NULL, 'Garrafa Térmica', 'Garrafa térmica vermelha, com adesivo de flor.', 'Fernanda Almeida', '2024-06-25 08:30:00', '8'), 
(NULL, 'Boneca', 'Boneca de pano com vestido rosa.', 'Lucas Pereira', '2024-06-26 12:00:00', '1'), 
(NULL, 'Carteira', 'Carteira de couro preta, com documentos.', 'Mariana Santos', '2024-06-27 13:45:00', '8'), 
(NULL, 'Tablet', 'Tablet Samsung branco.', 'Pedro Fernandes', '2024-06-28 15:30:00', '5'), 
(NULL, 'Óculos de Sol', 'Óculos de sol aviador, armação prateada.', 'Juliana Azevedo', '2024-06-29 17:00:00', '6'), 
(NULL, 'Chave de Carro', 'Chave de carro com chaveiro de bola de futebol.', 'Gabriel Rodrigues', '2024-06-30 18:30:00', '8'), 
(NULL, 'Livro', 'Livro "O Pequeno Príncipe", capa amarela.', 'Beatriz Silva', '2024-07-01 10:00:00', '4'), 
(NULL, 'Fones de Ouvido', 'Fones de ouvido azul, marca JBL.', 'Lucas Martins', '2024-07-02 11:30:00', '5'), 
(NULL, 'Casaco Vermelho', 'Casaco de lã vermelho, tamanho médio.', 'Letícia Almeida', '2024-07-03 12:45:00', '3'), 
(NULL, 'Chaveiro de Coração', 'Chaveiro com pingente de coração vermelho.', 'Joana Dias', '2024-07-04 14:15:00', '6'), 
(NULL, 'Mochila', 'Mochila escolar azul, com adesivos.', 'Ricardo Neves', '2024-07-05 16:00:00', '2'), 
(NULL, 'Pulseira', 'Pulseira de prata com pingente de estrela.', 'Camila Sousa', '2024-07-06 17:30:00', '6'), 
(NULL, 'Caneta Tinteiro', 'Caneta tinteiro dourada.', 'Arthur Ribeiro', '2024-07-07 18:45:00', '2'), 
(NULL, 'Tênis', 'Par de tênis esportivos, tamanho 42.', 'Daniela Cunha', '2024-07-08 19:00:00', '3'), 
(NULL, 'Livro de História', 'Livro de história do Brasil, capa verde.', 'Tiago Mendes', '2024-07-09 20:15:00', '4');