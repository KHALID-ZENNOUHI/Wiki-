-- create database Wiki™;
-- use database Wiki™;

create table users(
    id int primary key AUTO_INCREMENT,
    name varchar(255) not null,
    email varchar(255) not null,
    role enum("admin","auteur")
);

create table categories(
    id int primary key AUTO_INCREMENT,
    categorie varchar(255) not null,
    c_description varchar(255) not null
);

create table tags(
    id int primary key AUTO_INCREMENT,
    tag varchar(255) not null
);

create table wikis(
    id int primary key AUTO_INCREMENT,
    title varchar(255) not null,
    description varchar(255) not null,
    contenue varchar(255) not null,
    id_user int,
    foreign key (id_user) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE,
    id_categorie int,
    foreign key (id_categorie) REFERENCES categories(id) ON DELETE CASCADE ON UPDATE CASCADE,
    update_at date DEFAULT NULL,
    delete_at date DEFAULT NULL
);

create table wikis_tags(
    id int primary KEY AUTO_INCREMENT,
    id_wiki int,
    foreign key (id_wiki) REFERENCES wikis(id) ON DELETE CASCADE ON UPDATE CASCADE,
    id_tag int,
    foreign key (id_tag) references tags(id) ON DELETE CASCADE ON UPDATE CASCADE
)wikis_tags