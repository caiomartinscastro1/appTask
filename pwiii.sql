CREATE DATABASE pwiii;

USE pwiii;

CREATE TABLE `caio_user` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `adm` tinyint(4) DEFAULT '0'
);

INSERT INTO caio_user(
	nome,
    email,
    password,
    adm
)VALUES(
	'Caio Martins',
    'caio@caio',
    'root',
    1
);

CREATE TABLE `caio_user_excluido` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `adm` tinyint(1) DEFAULT '0',
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `nome` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(100) COLLATE latin1_general_ci DEFAULT NULL
);


CREATE TABLE `caio_task` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `titulo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `descricao` text COLLATE latin1_general_ci,
  `data` date DEFAULT NULL,
  `local` varchar(120) COLLATE latin1_general_ci DEFAULT NULL,
  `prioridade` int(11) NOT NULL,
  `hora` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;



ALTER TABLE `caio_task`
  ADD CONSTRAINT `caio_task_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `caio_user` (`id`);
COMMIT;

CREATE TABLE `caio_task_excluido` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `data` date DEFAULT NULL,
  `descricao` text COLLATE latin1_general_ci,
  `hora` time DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `local` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `prioridade` int(11) DEFAULT '1',
  `titulo` varchar(100) COLLATE latin1_general_ci DEFAULT NULL
);

