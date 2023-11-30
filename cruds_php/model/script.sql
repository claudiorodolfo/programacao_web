mysql -uroot - p

CREATE USER 'claudio'@'localhost' IDENTIFIED BY '2019';
GRANT ALL PRIVILEGES ON * . * TO 'claudio'@'localhost';

mysql -uclaudio - p2019

create database pw1;
show databases;
use pw1;

create table postagem (
    id int not null auto_increment,
    titulo varchar(15),
    categoria varchar(7), /*PHP ou Python*/
    descricao varchar(63),
    conteudo varchar(255),
    primary key(id)
);

show tables;