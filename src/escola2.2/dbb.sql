-- executar no cmd: mysql> source c:/temp/import.sql [enter]
-- Database: `escola` 

-- --------------------------------------------------------
-- descobrir oque é a coluna CPU
DROP TABLE IF EXISTS alunos;
CREATE TABLE alunos(
   ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY
  ,NOME      VARCHAR(23)
  ,LOGRAD    VARCHAR(25) NOT NULL
  ,BAIRRO    VARCHAR(15) NOT NULL
  ,CEP       VARCHAR(9) NOT NULL
  ,REFER     VARCHAR(22)
  ,TEL       VARCHAR(3) 
  ,NASC      VARCHAR(10)
  ,SEXO      VARCHAR(4) NOT NULL
  ,IDENT     VARCHAR(13) NOT NULL
  ,CPF       VARCHAR(14) NOT NULL
  ,PIS       VARCHAR(14) NOT NULL
  ,CTPS      VARCHAR(15) NOT NULL
  ,PROGRAMAS VARCHAR(21)
  ,FAMILIA   VARCHAR(2)
  ,CNASC     VARCHAR(10) NOT NULL
  ,PAI       VARCHAR(29) NOT NULL
  ,MAE       VARCHAR(34) NOT NULL
  ,FOTO 	 VARCHAR(150) NOT NULL
);
INSERT INTO alunos(NOME,LOGRAD,BAIRRO,CEP,REFER,TEL,NASC,SEXO,IDENT,CPF,PIS,CTPS,PROGRAMAS,FAMILIA,CNASC,PAI,MAE,FOTO) VALUES (
'Eduarda Vargas Correa','Rua Silvio Sanson 87 ap 2','Piratini','93214-570','Sacolao Valdecir','sim','07/11/1999','Fem','6119569348 RS','042.841.440-06','142.02953.89-0','6427013/0040/RS',NULL,3,'sim','Jose Eduardo Bueno Correa','Eleuza Vargas Correa','3.jpg');
INSERT INTO alunos(NOME,LOGRAD,BAIRRO,CEP,REFER,TEL,NASC,SEXO,IDENT,CPF,PIS,CTPS,PROGRAMAS,FAMILIA,CNASC,PAI,MAE,FOTO) VALUES (
'Natalia Toledo Nunes','Rua Joraci da Cruz 609','Vargas','93222-635','Caixa dagua','sim','29/10/1998','Fem','1128563317 RS','046.328.550-65','201.43043.60-3','8964067/0040/RS','Bolsa Familia 31500',6,'sim','Carlos Alberto da Silva Nunes','Paula Beatriz da Silva Toledo','5.jpg');
INSERT INTO alunos(NOME,LOGRAD,BAIRRO,CEP,REFER,TEL,NASC,SEXO,IDENT,CPF,PIS,CTPS,PROGRAMAS,FAMILIA,CNASC,PAI,MAE,FOTO) VALUES (
'Eduarda Leandra Aretz','Rua Adao de Carvalho 143','Colonial','93212-010','Supermercado Sonho Meu','sim','06/01/2001','Fem','6117551801 RS','046.323.740-40','161.57433.56-7','9601237/0040/RS',NULL,4,'sim','Adao de Carvalho','Andreia Aretz','7.jpg');
INSERT INTO alunos(NOME,LOGRAD,BAIRRO,CEP,REFER,TEL,NASC,SEXO,IDENT,CPF,PIS,CTPS,PROGRAMAS,FAMILIA,CNASC,PAI,MAE,FOTO) VALUES (
'Vitor Fernandes Parraga','Rua Sao Caetano 55','Vargas','93222-430','Creche Romana','sim','13/04/2000','Masc','6120092421 RS','036.776.150-54','210.64092.92-8','6879720/0040/RS',NULL,4,'sim','Sergio Parraga','Adriana Raquel Garbarino Fernandes','1.jpg');
INSERT INTO alunos(NOME,LOGRAD,BAIRRO,CEP,REFER,TEL,NASC,SEXO,IDENT,CPF,PIS,CTPS,PROGRAMAS,FAMILIA,CNASC,PAI,MAE,FOTO) VALUES (
'Joice da Silva da Silva','Rua das Abelhas 380','Horto Florestal','93212-605','Atacad?o','sim','13/02/2001','Fem','1125290385 RS','047.577.750-67','162.84792.07-8','9606025/0040/RS',NULL,4,'sim','Valdeci Antonio da Silva','Cleci Goularte da Silva','11.jpg');
