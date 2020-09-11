/*
BD preliminar de foro
*/
create database bd_prealfaforo;
use bd_prealfaforo;

create table category(
	id int not null auto_increment primary key,
	name varchar(255),
	description varchar(511)
);

create table user(
	id int not null auto_increment primary key,
	name varchar(50),
	lastname varchar(50),
	username varchar(50),
	email varchar(255),
	password varchar(60),
	image varchar(255),
	status int default 1,
	kind int default 1,
	created_at datetime
);

create table post(
	id int not null auto_increment primary key,
	title varchar(255),
	brief varchar(511),
	content text,
	image varchar(255),
	created_at datetime,
	status int default 1,
	category_id int not null,
	user_id int not null,
	foreign key (user_id) references user(id),
	foreign key (category_id) references category(id)
);


create table comment(
	id int not null auto_increment primary key,
	comment varchar(255),
	post_id int not null,
	user_id int not null,
	created_at datetime,
	status int default 1,
	foreign key (post_id) references post(id),
	foreign key (user_id) references user(id)
);





/**
Usuario Admin por defecto con pass: admin (encriptada en md5)
**/

insert into user (name,username,password,kind,created_at) value ("Administrator","admin",sha1(md5("admin")),1,NOW());
