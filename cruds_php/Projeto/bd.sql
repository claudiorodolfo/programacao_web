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
	email varchar(64) not null,
	id_empresa bigint not null,
	foreign key (id_empresa) references Empresa (id),
	primary key (id)
);