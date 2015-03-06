create database bd_meson;
use bd_meson;

create table usuarios(
correo varchar(75) primary key,
pass varchar(250),
rol varchar(25)
);

create table tipo_servicio(
id_servicio int primary key auto_increment,
servicio varchar(50)
);


create table clientes(
correo varchar(75) primary key,
nombre varchar(75),
apellido varchar(75),
dui varchar(12),
telefono varchar(10)
);


create table platillos(
id_platillo int primary key auto_increment,
platillo varchar(75),
descripcion varchar(500),
imagen varchar(75),
id_servicio int,
constraint fk_servicio_platillos foreign key (id_servicio) references tipo_servicio (id_servicio)

);

create table reservacion(
id_reservacion int primary key auto_increment,
tipo varchar(20),
hora time,
fecha date,
cantidad_personas int,
correo varchar(75),
visto int,
constraint fk_cliente_reservacion foreign key (correo) references clientes (correo)

);

create table servicio(
id_reservacion int,
id_platillo int,
cantidad int,
constraint fk_servicio_reservacion foreign key (id_reservacion) references reservacion (id_reservacion),
constraint fk_platillos_reservacion foreign key (id_platillo) references platillos (id_platillo)
);  

create table galeria(
id int primary key auto_increment,
descripcion varchar(500),
ruta varchar(500)
);

create table promociones(
id int primary key auto_increment,
descripcion varchar(500),
ruta varchar(500)
);
