CREATE DATABASE db_prova01;
USE db_prova01;

CREATE TABLE tbl_usuarios (
  usu_codigo INT PRIMARY KEY AUTO_INCREMENT,
  usu_nome VARCHAR(100) NOT NULL,
  usu_email VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE tbl_tarefas (
  tar_codigo INT PRIMARY KEY AUTO_INCREMENT,
  usu_codigo INT,
  tar_nome VARCHAR(100) NOT NULL,
  tar_prioridade ENUM('baixo', 'médio', 'alto') NOT NULL,
  tar_descricao TEXT,
  tar_status ENUM('pendente', 'em andamento', 'concluído') NOT NULL,
  FOREIGN KEY (usu_codigo) REFERENCES tbl_usuarios(usu_codigo)
);

INSERT INTO tbl_usuarios (usu_nome, usu_email) VALUES
('Julia Mendes', 'ester.sampaio90@email.com'),
('Maria Oliveira', 'maria.oliveira@email.com'),
('Laura Silva', 'carlos.silva@email.com');

INSERT INTO tbl_tarefas (usu_codigo, tar_nome, tar_prioridade, tar_descricao, tar_status) VALUES
(1, 'Desenvolvimento de Site', 'alto', 'Criar um site responsivo para a empresa.', 'em andamento'),
(2, 'Campanha de Marketing Digital', 'médio', 'Lançar uma campanha nas redes sociais.', 'pendente'),
(3, 'Revisão de Orçamento Anual', 'baixo', 'Analisar e revisar o orçamento do ano anterior.', 'concluído');
