数据库

create table layoutTemplate (
  id int auto_increment primary key,
  json text,
  name text,
  description text,
  createTime varchar(13)
);

create table baseModule (
  id int auto_increment primary key,
  json text,
  name text,
  description text,
  createTime varchar(13)
);

create table dataModule (
  id int auto_increment primary key,
  json text,
  name text,
  description text,
  createTime varchar(13)
);


create table pages (
  id int auto_increment primary key,
  json text,
  name text,
  description text,
  createTime varchar(13)
)
