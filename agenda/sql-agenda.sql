Create database agenda;

USE agenda;
Create table contatos(
id INT NOT NULL AUTO_increment,
nome varchar(100),
endereco varchar(100),
telefone varchar(20),
primary key (`id`)
);