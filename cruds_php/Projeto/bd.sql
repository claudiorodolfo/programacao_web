create database Projeto;
use Projeto;

create table Empresa (
	id bigint not null auto_increment,
	nome varchar(64) not null,
	primary key (id)
);

create table Cliente (
	id bigint not null auto_increment,
	nome varchar(64) not null,
	senha varchar(32) not null,	
	email varchar(64) not null,
	id_empresa bigint not null,
	foreign key (id_empresa) references Empresa (id),
	primary key (id)
);

insert into Empresa (nome) values ('Casas Bahia');
insert into Empresa (nome) values ('Magazine Luiza');

insert into Cliente (nome, senha, email, id_empresa) values ('Cláudio Oliveira', '81dc9bdb52d04dc20036dbd8313ed055', 'claudio@gmail.com', 1);
insert into Cliente (nome, senha, email, id_empresa) values ('Maria Santos', '81dc9bdb52d04dc20036dbd8313ed055', 'maria@gmail.com', 2);
insert into Cliente (nome, senha, email, id_empresa) values ('José Silva', '81dc9bdb52d04dc20036dbd8313ed055', 'jose@gmail.com', 1);
insert into Cliente (nome, senha, email, id_empresa) values ('João Carlos Maciel', '81dc9bdb52d04dc20036dbd8313ed055', 'joao@gmail.com', 1);