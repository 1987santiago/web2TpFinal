create database reserva;
use reserva;


create table empleado (
id_legajo integer not null,
nombre varchar (30) not null,
apellido varchar (30) not null,
usuario varchar (10) not null,
clave varchar (8) not null,
es_administrador boolean,
primary key (id_legajo)
);

create table pasajero(
dni integer not null,
nombre varchar (30) not null,
apellido varchar (30) not null,
fecha_nac date not null,
telefono integer not null,
email varchar(30) not null,
nacionalidad varchar(15) not null,
primary key (dni)
); 

create table tipo_avion(
id_tipo_avion integer not null,
primera integer not null,
economy integer not null,
filas integer not null,
columna integer not null,
primary key (id_tipo_avion)
);


create table avion (
id_avion integer not null,
modelo varchar (20) not null,
primary key (id_avion)
);



create table provincia (
id_provincia integer not null,
provincia varchar (20) not null,
primary key (id_provincia)
);

create table ciudad (
id_ciudad integer not null,
ciudad varchar (20) not null,
id_provincia integer not null,
primary key (id_ciudad),
foreign key (id_provincia) references provincia (id_provincia)
); 

create table ruta (
id_ruta integer not null,
tarifa_primera real not null,
tarifa_economy real not null,
descuento integer not null,
tasas integer not null,
impuestos integer not null,
ciudad_origen integer not null,
ciudad_destino integer not null,
primary key (id_ruta),
foreign key (ciudad_origen) references ciudad (id_ciudad),
foreign key (ciudad_destino) references ciudad (id_ciudad)
);

create table vuelo (
num_vuelo integer not null,
salida datetime not null,
llegada datetime not null,
id_avion integer not null,
id_ruta integer not null,
primary key (num_vuelo),
foreign key (id_avion) references avion (id_avion),
foreign key (id_ruta) references ruta (id_ruta)
);

create table categoria (
id_categoria integer not null,
categoria varchar (8) not null,
primary key (id_categoria)
);

create table asiento (
id_asiento integer not null,
fila integer not null,
columna varchar (1) not null,
descripcion varchar (5) not null,
num_vuelo integer not null,
id_categoria integer not null,
dni integer not null,
primary key (id_asiento),
foreign key (num_vuelo) references vuelo (num_vuelo),
foreign key (id_categoria) references categoria (id_categoria), 
foreign key (dni) references pasajero (dni)
);

create table pago (
id_pago integer not null,
fecha_pago datetime not null,
forma_pago varchar (15) not null,
num_tarj integer not null,
monto real not null,
primary key (id_pago)
);

create table reserva(
codigo_reserva varchar(10) not null,
fecha_reserva date not null,
ida_vuelta boolean not null,
en_espera boolean not null,
dni integer not null,
id_pago integer not null,
num_vuelo integer not null,
primary key (codigo_reserva),
foreign key (dni) references pasajero (dni),
foreign key (id_pago) references pago (id_pago),
foreign key (num_vuelo) references vuelo (num_vuelo)
);

