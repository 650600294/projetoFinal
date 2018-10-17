-- executar no cmd: mysql> source c:/temp/import.sql [enter]
-- Database: `escola` 

-- --------------------------------------------------------
-- descobrir oque é a coluna CPU
DROP TABLE IF EXISTS alunos;
CREATE TABLE alunos(
   ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY
  ,NOME      VARCHAR(23)
  ,LOGRAD    VARCHAR(25) NOT NULL
  ,FOTO 	 VARCHAR(150) NOT NULL
);
INSERT INTO alunos(NOME,LOGRAD,FOTO) 
VALUES 
('Eduarda Vargas Correa','Rua Silvio Sanson 87 ap 2','3.jpg'),
('Natalia Toledo Nunes','Rua Joraci da Cruz 609','5.jpg'),
('Eduarda Leandra Aretz','Rua Adao de Carvalho 143','7.jpg'),
('Vitor Fernandes Parraga','Rua Sao Caetano 55','1.jpg'),
('Joice da Silva da Silva','Rua das Abelhas 380','11.jpg');
