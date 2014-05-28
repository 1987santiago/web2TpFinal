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

create table avion(
cod_avion integer not null,
marca varchar (10) not null,
modelo varchar (10),
economy integer not null,
f_economy integer not null,
c_economy integer not null,
primera integer not null,
f_primera integer not null,
c_primera integer not null,
primary key (cod_avion)); 

create table aeropuerto(
oaci varchar (4) not null,
ciudad varchar (40) not null,
provincia varchar (30) not null,
nombre varchar (70) not null,
primary key (oaci)
);


create table vuelo(
id_vuelo integer not null,
oaci_or varchar (5) not null,
ciudad_or varchar (40) not null,
oaci_des varchar (5) not null,
ciudad_des varchar (40) not null,
tipo_avion integer not null,
tarifa_primera real not null,
tarifa_economy real not null,
l boolean not null,
m boolean not null,
x boolean not null,
j boolean not null,
v boolean not null, 
s boolean not null,
d boolean not null,
primary key (id_vuelo),
foreign key (oaci_or) references aeropuerto (oaci),
foreign key (oaci_des) references aeropuerto (oaci),
foreign key (tipo_avion) references avion (cod_avion)
);

create table categoria (
id_categoria integer not null,
categoria varchar (8) not null,
primary key (id_categoria));


create table asiento(
id_asiento integer not null,
fila integer not null,
columna varchar (1) not null,
descripcion varchar (5) not null,
num_vuelo integer not null,
id_categoria integer not null,
dni integer not null,
primary key (id_asiento),
foreign key (num_vuelo) references vuelo (id_vuelo),
foreign key (id_categoria) references categoria (id_categoria), 
foreign key (dni) references pasajero (dni));

create table pago 
(id_pago integer not null,
fecha_pago datetime not null,
forma_pago varchar (15) not null,
num_tarj integer not null,
monto real not null,
primary key (id_pago));

create table reserva
(codigo_reserva varchar(10) not null,
fecha_reserva date not null,
ida_vuelta boolean not null,
en_espera boolean not null,
dni integer not null,
id_pago integer not null,
num_vuelo integer not null,
primary key (codigo_reserva),
foreign key (dni) references pasajero (dni),
foreign key (id_pago) references pago (id_pago),
foreign key (num_vuelo) references vuelo (id_vuelo)
);