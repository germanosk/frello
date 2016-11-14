#Time Tracking Database

create database ttracking_db;

use ttracking_db;


create table if not exists usuario
(id int (11) unsigned not null primary key,
 nome varchar (100),
 email varchar(300),
 senha varchar(10));
 
 create table if not exists equipe
 (id int (11) unsigned not null primary key,
  nome varchar(100));
  

create table if not exists quadro
(id int(11) unsigned not null primary key auto_increment, 
 nome varchar(50));

create table if not exists lista
(id int(11) unsigned not null primary key auto_increment,
 nome varchar(50), 
 quadro_id int(11) unsigned not null,  
 constraint lista_quadro_fk foreign key(quadro_id) references quadro (id) on delete cascade on update cascade);
 
 create table if not exists cartao 
 (id int(11) unsigned not null primary key auto_increment,
  nome varchar(50), 
  quadro_id int(11) unsigned not null,  
 constraint cartao_quadro_fk foreign key(quadro_id) references quadro (id) on delete cascade on update cascade);
 
 create table if not exists acao
 (id int(11) unsigned not null primary key auto_increment, 
  nome varchar(50));
  
 create table if not exists estado
 (id int(11) unsigned not null primary key auto_increment, 
  nome varchar(50));
  
 create table if not exists transicao_cartao
 (id int(11) unsigned not null primary key auto_increment,
  lista_id int(11) unsigned not null,
  cartao_id int (11) unsigned not null,
  data_hora timestamp default current_timestamp on update current_timestamp,
  usuario_id int (11) unsigned not null,
  acao_id int (11) unsigned not null,
  estado_id int(11) unsigned not null,
  constraint transicao_lista_fk foreign key(lista_id) references lista (id) on delete cascade on update cascade,
  constraint transicao_cartao_fk foreign key(cartao_id) references cartao (id) on delete cascade on update cascade, 
  constraint transicao_usuario_fk foreign key(usuario_id) references usuario (id) on delete cascade on update cascade,
  constraint transicao_acao_fk foreign key(acao_id) references acao (id) on delete cascade on update cascade,
  constraint transicao_estado_fk foreign key(estado_id) references estado (id) on delete cascade on update cascade);
  
 drop database ttracking_db; 
  