CREATE DATABASE googlemap;
use googlemap;

create table locales(
id int auto_increment primary key,
nombre varchar(100),
coordenadas varchar(100),
poblacion varchar(100),
tipo_local varchar(100)

);

insert into locales (nombre, coordenadas, poblacion, tipo_local) values('La Tagliatella','{ lat: 41.3579, lng: 2.16992 }','Barcelona','Restaurante');
insert into locales (nombre, coordenadas, poblacion, tipo_local) values('Sushi kokoro','{ lat: 41.3660, lng: 2.16993 }','Barcelona','Restaurante');
insert into locales (nombre, coordenadas, poblacion, tipo_local) values('Cassete Bar','{ lat: 41.3600, lng: 2.16988 }','Barcelona','Bar');
insert into locales (nombre, coordenadas, poblacion, tipo_local) values('Rubi Bar','{ lat: 41.3620, lng: 2.16992 }','Barcelona','Bar');
insert into locales (nombre, coordenadas, poblacion, tipo_local) values('CatWalk','{ lat: 41.3881, lng: 2.16994 }','Barcelona','Discoteca');
insert into locales (nombre, coordenadas, poblacion, tipo_local) values('Otto Zutz','{ lat: 41.3882, lng: 2.16800 }','Barcelona','Discoteca');

select * from locales;
drop database googlemap;
