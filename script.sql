DROP TABLE IF EXISTS itemvenda;
DROP TABLE IF EXISTS venda;
DROP TABLE IF EXISTS produto;
DROP TABLE IF EXISTS usuario;
DROP SEQUENCE IF EXISTS seq_venda;

create table usuario (
IdUsuario SERIAL NOT NULL PRIMARY KEY,
Usuario VARCHAR(50) NOT NULL,
Senha VARCHAR(50) NOT NULL,
Nome VARCHAR(20) NOT NULL,
Email Varchar(30) NOT NULL,
Cpf VARCHAR(14) NOT NULL,
Endereço VARCHAR(50) NOT NULL,
Administrador BOOL DEFAULT FALSE,
Excluido BOOL DEFAULT FALSE,
DataExcluido DATE
);

create table produto (
IdProduto SERIAL NOT NULL,
codigovisual INT,
Nome VARCHAR(30) NOT NULL,
PrecoProduto NUMERIC(10,2) NOT NULL,
DescricaoProduto VARCHAR(80) NOT NULL,
QtdeEstoque INT NOT NULL,
Excluido BOOL DEFAULT FALSE,
DataExcluido DATE,
ImagemProduto VARCHAR,
CONSTRAINT pk_IdProduto PRIMARY KEY (IdProduto)
);

--Sequencia da venda
create sequence seq_venda
minvalue 1
increment 1
start 100;

create table venda(
IdUsuario INT NOT NULL,
IdVenda INT NOT NULL DEFAULT NEXTVAL('seq_venda'),
DataVenda DATE NOT NULL,
Excluido BOOL DEFAULT FALSE,
CONSTRAINT pk_venda PRIMARY KEY(IdVenda),
CONSTRAINT fK_usuario FOREIGN KEY (IdUsuario) REFERENCES
usuario (IdUsuario)
);

create table itemvenda(
IdVenda INT NOT NULL,
IdProduto INT NOT NULL,
Qtde INT NOT NULL,
Preco NUMERIC(10,2) NOT NULL,
Excluido BOOL DEFAULT FALSE,
CONSTRAINT pk_itemvenda PRIMARY KEY (IdVenda, IdProduto),
CONSTRAINT fK_venda FOREIGN KEY (IdVenda) REFERENCES
venda (IdVenda),
CONSTRAINT fk_produto FOREIGN KEY (IdProduto) REFERENCES
produto (IdProduto)
);