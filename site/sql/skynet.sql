-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generaci�n: 22-06-2014 a las 23:48:15
-- Versi�n del servidor: 5.6.16
-- Versi�n de PHP: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES latin1 */;

--
-- Base de datos: 'skynet'
--
CREATE DATABASE IF NOT EXISTS skynet DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci;
USE skynet;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'aeropuerto'
--
-- Creaci�n: 22-06-2014 a las 18:36:50
--

CREATE TABLE IF NOT EXISTS aeropuerto (
  codigo_oaci varchar(4) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  nombre varchar(70) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  ciudad varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  provincia varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (codigo_oaci)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla 'aeropuerto'
--

INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAAC', 'Aeropuerto Comodoro Pierrestegui', 'Concordia', 'Entre Rios');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAAJ', 'Aeropuerto de Junin', 'Junin', 'Buenos Aires');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAAK', 'Aeropuerto Isla Martin Garcia', 'Isla Martin Garcia', 'Buenos Aires');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAAP', 'Aeropuerto General Justo Jose de Urquiza', 'Parana', 'Entre Rios');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAAR', 'Aeropuerto Internacional Rosario Islas Malvinas', 'Rosario', 'Santa Fe');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAAU', 'Aeropuerto de Villaguay', 'Villaguay', 'Entre Rios');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAAV', 'Aeropuerto de Sauce Viejo', 'Sauce Viejo', 'Santa Fe');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SABE', 'Aeroparque Jorge Newbery', 'Buenos Aires', 'CABA');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SACC', 'Aeropuerto La Cumbre', 'La Cumbre', 'Cordoba');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SACO', 'Aeropuerto Internacional Ingeniero Ambrosio Taravella', 'Cordoba', 'Cordoba');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SACP', 'Aeropuerto Chepes', 'Chepes', 'La Rioja');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SACT', 'Aeropuerto Gobernador Gordillo', 'Chamical', 'La Rioja');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SADD', 'Aerodromo de Don Torcuato�(Cerrado)', 'Don Torcuato', 'Buenos Aires');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SADF', 'Aeropuerto Internacional de San Fernando', 'San Fernando', 'Buenos Aires');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SADJ', 'Aeropuerto Mariano Moreno', 'Jose C. Paz', 'Buenos Aires');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SADL', 'Aeropuerto de La Plata', 'La Plata', 'Buenos Aires');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SADM', 'Aeropuerto de Moron', 'Moron', 'Buenos Aires');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SADO', 'Aerodromo de Campo de Mayo', 'Campo de Mayo', 'Buenos Aires');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SADP', 'Aeropuerto El Palomar', 'El Palomar', 'Buenos Aires');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SADS', 'Aeropuerto de San Justo', 'San Justo', 'Buenos Aires');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAEM', 'Aerodromo Juan Domingo Peron', 'Miramar', 'Buenos Aires');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAEZ', 'Aeropuerto Internacional Ministro Pistarini', 'Ezeiza', 'Buenos Aires');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAFS', 'Aeropuerto de Sunchales', 'Sunchales', 'Santa Fe');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAHE', 'Aeropuerto de Caviahue', 'Caviahue', 'Neuquen');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAHR', 'Aeropuerto de General Roca', 'General Roca', 'Rio Negro');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAHZ', 'Aeropuerto de Zapala', 'Zapala', 'Neuquen');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAMA', 'Aeropuerto de General Alvear', 'General Alvear', 'Mendoza');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAME', 'Aeropuerto Internacional El Plumerillo', 'Mendoza', 'Mendoza');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAMM', 'Aeropuerto Internacional Comodoro Ricardo Salomon', 'Malargue', 'Mendoza');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAMR', 'Aeropuerto Internacional Suboficial Ayudante Santiago Germano', 'San Rafael', 'Mendoza');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SANC', 'Aeropuerto Coronel Felipe Varela', 'San Fernando del Valle de Catamarca', 'Catamarca');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SANE', 'Aeropuerto Vicecomodoro Angel de la Paz Aragones', 'Santiago del Estero', 'Santiago del Estero');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SANL', 'Aeropuerto Capitan Vicente Almandos Amonacide', 'La Rioja', 'La Rioja');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SANO', 'Aeropuerto Chilecito', 'Chilecito', 'La Rioja');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SANR', 'Aeropuerto Internacional Termas de Rio Hondo', 'Termas de Rio Hondo', 'Santiago del Estero');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SANT', 'Aeropuerto Internacional Teniente General Benjamin Matienzo', 'San Miguel de Tucuman', 'Tucuman');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SANU', 'Aeropuerto Domingo Faustino Sarmiento', 'San Juan', 'San Juan');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SANW', 'Aeropuerto Ceres', 'Ceres', 'Santa Fe');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAOC', 'Aeropuerto de Rio Cuarto', 'Rio Cuarto', 'Cordoba');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAOD', 'Aeropuerto de Villa Dolores', 'Villa Dolores', 'Cordoba');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAOL', 'Aerodromo de Laboulaye', 'Laboulaye', 'Cordoba');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAOR', 'Aeropuerto de Villa Reynolds', 'Villa Reynolds', 'San Luis');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAOS', 'Aeropuerto Internacional Valle del Conlara', 'Merlo', 'San Luis');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAOU', 'Aeropuerto Brigadier Mayor Cesar Raul Ojeda', 'San Luis', 'San Luis');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SARC', 'Aeropuerto Internacional Doctor Fernando Piragine Niveyro', 'Corrientes', 'Corrientes');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SARE', 'Aeropuerto Internacional de Resistencia', 'Resistencia', 'Chaco');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SARF', 'Aeropuerto Internacional de Formosa', 'Formosa', 'Formosa');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SARI', 'Aeropuerto Internacional de Puerto Iguazu', 'Puerto Iguazu', 'Misiones');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SARL', 'Aeropuerto Internacional de Paso de los Libres', 'Paso de los Libres', 'Corrientes');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SARM', 'Aeropuerto de Monte Caseros', 'Monte Caseros', 'Corrientes');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SARP', 'Aeropuerto Internacional Libertador General Jose de San Martin', 'Posadas', 'Misiones');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SASA', 'Aeropuerto de Presidencia Roque Saenz Pe�a', 'Presidencia Roque Saenz Pe�a', 'Chaco');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SASJ', 'Aeropuerto Internacional Gobernador Horacio Guzman', 'Perico', 'Jujuy');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SASO', 'Aero Club Oran', 'San Ramon de la Nueva Oran', 'Salta');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAST', 'Aeropuerto de Tartagal', 'Tartagal', 'Salta');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SASZ', 'Aeropuerto Internacional Martin Miguel de Guemes', 'Salta', 'Salta');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SATC', 'Aeropuerto Clorinda', 'Clorinda', 'Formosa');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SATK', 'Aerodromo Alferez Armando Rodriguez', 'Las Lomitas', 'Formosa');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SATR', 'Aeropuerto Daniel Jurkic', 'Reconquista', 'Santa Fe');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SATU', 'Aeropuerto de Curuzu Cuatia', 'Curuzu Cuatia', 'Corrientes');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAVB', 'Aeropuerto de El Bolson', 'El Bolson', 'Rio Negro');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAVC', 'Aeropuerto Internacional General Enrique Mosconi', 'Comodoro Rivadavia', 'Chubut');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAVE', 'Aeropuerto Brigadier General Antonio Parodi', 'Esquel', 'Chubut');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAVH', 'Aeropuerto Las Heras', 'Las Heras', 'Santa Cruz');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAVJ', 'Aeropuerto de Ingeniero Jacobacci', 'Ingeniero Jacobacci', 'Rio Negro');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAVR', 'Aeropuerto Alto Rio Senguer', 'Alto Rio Senguer', 'Chubut');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAVT', 'Aeropuerto Almirante Marco Andres Zar', 'Trelew', 'Chubut');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAVV', 'Aeropuerto Gobernador Edgardo Castello', 'Viedma', 'Rio Negro');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAVY', 'Aeropuerto El Tehuelche', 'Puerto Madryn', 'Chubut');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAWA', 'Aeropuerto de Lago Argentino�(Cerrado)', 'El Calafate', 'Santa Cruz');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAWC', 'Aeropuerto Comandante Armando Tola', 'El Calafate', 'Santa Cruz');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAWD', 'Aeropuerto Puerto Deseado', 'Puerto Deseado', 'Santa Cruz');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAWE', 'Aeropuerto Internacional Gob. Ramon Trejo Noel', 'Rio Grande', 'Tierra del Fuego');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAWG', 'Aeropuerto Internacional Piloto Civil Norberto Fernandez', 'Rio Gallegos', 'Santa Cruz');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAWH', 'Aeropuerto de Ushuaia', 'Ushuaia', 'Tierra del Fuego');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAWJ', 'Aeropuerto Capitan Jose Daniel Vazquez', 'Puerto San Julian', 'Santa Cruz');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAWP', 'Aeropuerto Perito Moreno', 'Perito Moreno', 'Santa Cruz');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAWT', 'Aeropuerto Rio Turbio', 'Rio Turbio', 'Santa Cruz');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAWU', 'Aeropuerto de Puerto Santa Cruz', 'Puerto Santa Cruz', 'Santa Cruz');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAZA', 'Aeropuerto de Azul', 'Azul', 'Buenos Aires');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAZB', 'Aeropuerto Comandante Espora', 'Bahia Blanca', 'Buenos Aires');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAZC', 'Aeropuerto Brigadier Hector Eduardo Ruiz', 'Coronel Suarez', 'Buenos Aires');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAZD', 'Aerodromo de Dolores', 'Dolores', 'Buenos Aires');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAZF', 'Aeropuerto de Olavarria', 'Olavarria', 'Buenos Aires');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAZG', 'Aeropuerto de General Pico', 'General Pico', 'La Pampa');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAZH', 'Aeropuerto Municipal Primer Teniente Hector Ricardo Volponi', 'Tres Arroyos', 'Buenos Aires');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAZI', 'Aeropuerto de Bolivar', 'Bolivar', 'Buenos Aires');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAZL', 'Aeropuerto de Santa Teresita', 'Santa Teresita', 'Buenos Aires');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAZM', 'Aeropuerto Internacional Astor Piazolla', 'Mar del Plata', 'Buenos Aires');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAZN', 'Aeropuerto Internacional Presidente Per�n', 'Neuquen', 'Neuquen');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAZO', 'Aeropuerto Edgardo Hugo Yelpo', 'Necochea', 'Buenos Aires');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAZP', 'Aeropuerto Comodoro P. Zanni', 'Pehuajo', 'Buenos Aires');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAZR', 'Aeropuerto de Santa Rosa', 'Santa Rosa', 'La Pampa');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAZS', 'Aeropuerto Internacional Teniente Luis Candelaria', 'Bariloche', 'Rio Negro');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAZT', 'Aeropuerto de Tandil', 'Tandil', 'Buenos Aires');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAZV', 'Aeropuerto de Villa Gesell', 'Villa Gesell', 'Buenos Aires');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAZW', 'Aeropuerto de Cutral-Co', 'Cutral-Co', 'Neuquen');
INSERT INTO aeropuerto (codigo_oaci, nombre, ciudad, provincia) VALUES('SAZY', 'Aeropuerto Aviador Carlos Campos', 'San Martin de los Andes', 'Neuquen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'asiento'
--
-- Creaci�n: 22-06-2014 a las 18:36:53
--

CREATE TABLE IF NOT EXISTS asiento (
  id_asiento int(11) NOT NULL AUTO_INCREMENT,
  descripcion varchar(5) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  fila int(11) NOT NULL,
  columna int(11) NOT NULL,
  numero_vuelo int(11) NOT NULL,
  id_categoria int(11) NOT NULL,
  dni varchar(8) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (id_asiento),
  KEY fk_numero_vuelo (numero_vuelo),
  KEY fk_id_categoria (id_categoria),
  KEY fk_dni (dni)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'avion'
--
-- Creaci�n: 22-06-2014 a las 18:36:50
--

CREATE TABLE IF NOT EXISTS avion (
  codigo_avion int(11) NOT NULL AUTO_INCREMENT,
  marca varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  modelo varchar(10) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  total_asientos int(11) NOT NULL,
  asientos_economy int(11) NOT NULL,
  filas_economy int(11) NOT NULL,
  columnas_economy int(11) NOT NULL,
  asientos_primera int(11) NOT NULL,
  filas_primera int(11) NOT NULL,
  columnas_primera int(11) NOT NULL,
  PRIMARY KEY (codigo_avion)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla 'avion'
--

INSERT INTO avion (codigo_avion, marca, modelo, total_asientos, asientos_economy, filas_economy, columnas_economy, asientos_primera, filas_primera, columnas_primera) VALUES(1, 'Embraer', 'EMB-120', 30, 30, 10, 3, 0, 0, 0);
INSERT INTO avion (codigo_avion, marca, modelo, total_asientos, asientos_economy, filas_economy, columnas_economy, asientos_primera, filas_primera, columnas_primera) VALUES(2, 'Embraer', 'ER-145', 80, 70, 14, 5, 10, 5, 2);
INSERT INTO avion (codigo_avion, marca, modelo, total_asientos, asientos_economy, filas_economy, columnas_economy, asientos_primera, filas_primera, columnas_primera) VALUES(3, 'Embraer', 'ER-145', 125, 105, 21, 5, 20, 10, 2);
INSERT INTO avion (codigo_avion, marca, modelo, total_asientos, asientos_economy, filas_economy, columnas_economy, asientos_primera, filas_primera, columnas_primera) VALUES(4, 'Embraer', 'ER-170', 150, 120, 30, 4, 30, 10, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'categoria'
--
-- Creaci�n: 22-06-2014 a las 18:36:51
--

CREATE TABLE IF NOT EXISTS categoria (
  id_categoria int(11) NOT NULL AUTO_INCREMENT,
  categoria varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (id_categoria)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=201 ;

--
-- Volcado de datos para la tabla 'categoria'
--

INSERT INTO categoria (id_categoria, categoria) VALUES(100, 'primera');
INSERT INTO categoria (id_categoria, categoria) VALUES(200, 'economy');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'empleado'
--
-- Creaci�n: 22-06-2014 a las 18:36:51
--

CREATE TABLE IF NOT EXISTS empleado (
  id_legajo int(11) NOT NULL AUTO_INCREMENT,
  apellido varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  nombre varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  usuario varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  clave varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  es_administrador tinyint(1) NOT NULL,
  PRIMARY KEY (id_legajo)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla 'empleado'
--

INSERT INTO empleado (id_legajo, apellido, nombre, usuario, clave, es_administrador) VALUES(1, 'desarrollo', 'web', 'admin', 'web2', 1);
INSERT INTO empleado (id_legajo, apellido, nombre, usuario, clave, es_administrador) VALUES(2, 'Eduardo', 'Gallo', 'eduga', 'web2', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'pago'
--
-- Creaci�n: 22-06-2014 a las 18:36:51
--

CREATE TABLE IF NOT EXISTS pago (
  id_pago int(11) NOT NULL AUTO_INCREMENT,
  fecha_pago date NOT NULL,
  forma_pago varchar(15) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  numero_tarjeta varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  monto float NOT NULL,
  codigo_reserva varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (id_pago),
  KEY fk_codigo_reserva (codigo_reserva)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'pasajero'
--
-- Creaci�n: 22-06-2014 a las 18:36:51
--

CREATE TABLE IF NOT EXISTS pasajero (
  dni varchar(8) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  nombre varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  apellido varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  fecha_nac date NOT NULL,
  telefono varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  email varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  nacionalidad varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (dni)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'reserva'
--
-- Creaci�n: 22-06-2014 a las 18:36:52
--

CREATE TABLE IF NOT EXISTS reserva (
  codigo_reserva varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  fecha_reserva date NOT NULL,
  fecha_partida date NOT NULL,
  esta_en_espera tinyint(1) NOT NULL,
  dni varchar(8) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  numero_vuelo int(11) NOT NULL,
  id_categoria int(11) NOT NULL,
  PRIMARY KEY (codigo_reserva),
  KEY fk_dni (dni),
  KEY fk_numero_vuelo (numero_vuelo),
  KEY fk_id_categoria2 (id_categoria)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'vuelo'
--
-- Creaci�n: 22-06-2014 a las 18:36:52
--

CREATE TABLE IF NOT EXISTS vuelo (
  numero_vuelo int(11) NOT NULL AUTO_INCREMENT,
  origen varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  destino varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  tarifa_economy float NOT NULL,
  tarifa_primera float NOT NULL,
  dias_vuelo int(11) NOT NULL,
  oaci_origen varchar(4) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  oaci_destino varchar(4) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  codigo_avion int(11) NOT NULL,
  PRIMARY KEY (numero_vuelo),
  KEY fk_oaci_origen (oaci_origen),
  KEY fk_oaci_destino (oaci_destino),
  KEY fk_codigo_avion (codigo_avion)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=261 ;

--
-- Volcado de datos para la tabla 'vuelo'
--

INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(1, 'Alto Rio Senguer', 'San Martin de los Andes', 1191, 1464.93, 112, 'SAVR', 'SAZY', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(2, 'Azul', 'Cutral-Co', 1836, 2258.28, 49, 'SAZA', 'SAZW', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(3, 'Bahia Blanca', 'Villa Gesell', 2497, 3071.31, 39, 'SAZB', 'SAZV', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(4, 'Bariloche', 'Tandil', 2161, 2658.03, 2, 'SAZS', 'SAZT', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(5, 'Bolivar', 'Bariloche', 1228, 1510.44, 13, 'SAZI', 'SAZS', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(6, 'Campo de Mayo', 'Pehuajo', 968, 1190.64, 6, 'SADO', 'SAZP', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(7, 'Caviahue', 'Necochea', 1281, 1575.63, 36, 'SAHE', 'SAZO', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(8, 'Ceres', 'Neuquen', 2085, 2564.55, 104, 'SANW', 'SAZN', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(9, 'Chamical', 'Mar del Plata', 1656, 2036.88, 57, 'SACT', 'SAZM', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(10, 'Chepes', 'Santa Teresita', 1982, 2437.86, 50, 'SACP', 'SAZL', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(11, 'Chilecito', 'Bolivar', 924, 1136.52, 48, 'SANO', 'SAZI', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(12, 'Clorinda', 'Tres Arroyos', 2108, 2592.84, 69, 'SATC', 'SAZH', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(13, 'Comodoro Rivadavia', 'General Pico', 915, 1125.45, 115, 'SAVC', 'SAZG', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(14, 'Cordoba', 'Olavarria', 1182, 1453.86, 125, 'SACO', 'SAZF', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(15, 'Concordia', 'Dolores', 1587, 1952.01, 94, 'SAAC', 'SAZD', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(16, 'Coronel Suarez', 'Coronel Suarez', 1564, 1923.72, 61, 'SAZC', 'SAZC', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(17, 'Corrientes', 'Bahia Blanca', 2477, 3046.71, 115, 'SARC', 'SAZB', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(18, 'Curuzu Cuatia', 'Azul', 2491, 3063.93, 124, 'SATU', 'SAZA', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(19, 'Cutral-Co', 'Puerto Santa Cruz', 1555, 1912.65, 79, 'SAZW', 'SAWU', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(20, 'Dolores', 'Rio Turbio', 2451, 3014.73, 48, 'SAZD', 'SAWT', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(21, 'Don Torcuato', 'Perito Moreno', 1762, 2167.26, 77, 'SADD', 'SAWP', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(22, 'El Bolson', 'Puerto San Julian', 2314, 2846.22, 49, 'SAVB', 'SAWJ', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(23, 'El Calafate', 'Ushuaia', 1661, 2043.03, 75, 'SAWC', 'SAWH', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(24, 'El Calafate', 'Rio Gallegos', 1317, 1619.91, 71, 'SAWA', 'SAWG', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(25, 'El Palomar', 'Rio Grande', 2257, 2776.11, 30, 'SADP', 'SAWE', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(26, 'Esquel', 'Puerto Deseado', 2021, 2485.83, 76, 'SAVE', 'SAWD', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(27, 'Ezeiza', 'El Calafate', 1933, 2377.59, 59, 'SAEZ', 'SAWC', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(28, 'Formosa', 'El Calafate', 950, 1168.5, 22, 'SARF', 'SAWA', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(29, 'General Alvear', 'Puerto Madryn', 1216, 1495.68, 34, 'SAMA', 'SAVY', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(30, 'General Pico', 'Viedma', 1946, 2393.58, 91, 'SAZG', 'SAVV', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(31, 'General Roca', 'Trelew', 1889, 2323.47, 105, 'SAHR', 'SAVT', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(32, 'Ingeniero Jacobacci', 'Alto Rio Senguer', 887, 1091.01, 23, 'SAVJ', 'SAVR', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(33, 'Isla Martin Garcia', 'Ingeniero Jacobacci', 1131, 1391.13, 114, 'SAAK', 'SAVJ', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(34, 'Jose C. Paz', 'Las Heras', 913, 1122.99, 65, 'SADJ', 'SAVH', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(35, 'Junin', 'Esquel', 2326, 2860.98, 11, 'SAAJ', 'SAVE', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(36, 'Laboulaye', 'Comodoro Rivadavia', 1306, 1606.38, 58, 'SAOL', 'SAVC', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(37, 'La Cumbre', 'El Bolson', 1721, 2116.83, 12, 'SACC', 'SAVB', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(38, 'La Plata', 'Curuzu Cuatia', 2181, 2682.63, 67, 'SADL', 'SATU', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(39, 'La Rioja', 'Reconquista', 1821, 2239.83, 109, 'SANL', 'SATR', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(40, 'Las Heras', 'Las Lomitas', 1956, 2405.88, 91, 'SAVH', 'SATK', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(41, 'Las Lomitas', 'Clorinda', 2209, 2717.07, 118, 'SATK', 'SATC', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(42, 'Malargue', 'Tartagal', 2197, 2702.31, 95, 'SAMM', 'SAST', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(43, 'Mar del Plata', 'San Ramon de la Nueva Oran', 1358, 1670.34, 32, 'SAZM', 'SASO', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(44, 'Mendoza', 'Perico', 895, 1100.85, 14, 'SAME', 'SASJ', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(45, 'Merlo', 'Presidencia Roque Saenz Pe�a', 847, 1041.81, 17, 'SAOS', 'SASA', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(46, 'Miramar', 'Presidencia Roque Saenz Pe�a', 2045, 2515.35, 85, 'SAEM', 'SASA', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(47, 'Monte Caseros', 'Posadas', 1109, 1364.07, 38, 'SARM', 'SARP', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(48, 'Moron', 'Monte Caseros', 1763, 2168.49, 111, 'SADM', 'SARM', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(49, 'Necochea', 'Paso de los Libres', 1665, 2047.95, 45, 'SAZO', 'SARL', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(50, 'Neuquen', 'Puerto Iguazu', 1809, 2225.07, 2, 'SAZN', 'SARI', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(51, 'Olavarria', 'Formosa', 1841, 2264.43, 4, 'SAZF', 'SARF', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(52, 'Parana', 'Resistencia', 1079, 1327.17, 13, 'SAAP', 'SARE', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(53, 'Paso de los Libres', 'Corrientes', 1108, 1362.84, 125, 'SARL', 'SARC', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(54, 'Pehuajo', 'San Luis', 2112, 2597.76, 97, 'SAZP', 'SAOU', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(55, 'Perico', 'Merlo', 2412, 2966.76, 36, 'SASJ', 'SAOS', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(56, 'Perito Moreno', 'Villa Reynolds', 1980, 2435.4, 17, 'SAWP', 'SAOR', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(57, 'Posadas', 'Laboulaye', 862, 1060.26, 127, 'SARP', 'SAOL', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(58, 'Puerto Deseado', 'Villa Dolores', 1525, 1875.75, 65, 'SAWD', 'SAOD', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(59, 'Puerto Iguazu', 'Rio Cuarto', 2229, 2741.67, 79, 'SARI', 'SAOC', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(60, 'Puerto Madryn', 'Ceres', 870, 1070.1, 4, 'SAVY', 'SANW', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(61, 'Puerto San Julian', 'San Juan', 2166, 2664.18, 8, 'SAWJ', 'SANU', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(62, 'Puerto Santa Cruz', 'San Miguel de Tucuman', 1173, 1442.79, 66, 'SAWU', 'SANT', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(63, 'Presidencia Roque Saenz Pe�a', 'Termas de Rio Hondo', 2001, 2461.23, 95, 'SASA', 'SANR', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(64, 'Reconquista', 'Chilecito', 2217, 2726.91, 47, 'SATR', 'SANO', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(65, 'Resistencia', 'La Rioja', 2334, 2870.82, 68, 'SARE', 'SANL', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(66, 'Rio Cuarto', 'Santiago del Estero', 2014, 2477.22, 50, 'SAOC', 'SANE', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(67, 'Rio Gallegos', 'San Fernando del Valle de Catamarca', 1462, 1798.26, 45, 'SAWG', 'SANC', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(68, 'Rio Grande', 'San Rafael', 2269, 2790.87, 7, 'SAWE', 'SAMR', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(69, 'Rio Turbio', 'Malargue', 2205, 2712.15, 90, 'SAWT', 'SAMM', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(70, 'Rosario', 'Mendoza', 1097, 1349.31, 17, 'SAAR', 'SAME', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(71, 'Presidencia Roque Saenz Pe�a', 'General Alvear', 989, 1216.47, 19, 'SASA', 'SAMA', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(72, 'San Fernando', 'Zapala', 2357, 2899.11, 1, 'SADF', 'SAHZ', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(73, 'San Fernando del Valle de Catamarca', 'General Roca', 1716, 2110.68, 74, 'SANC', 'SAHR', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(74, 'San Juan', 'Caviahue', 1387, 1706.01, 61, 'SANU', 'SAHE', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(75, 'San Luis', 'Sunchales', 1032, 1269.36, 29, 'SAOU', 'SAFS', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(76, 'San Rafael', 'Ezeiza', 1577, 1939.71, 126, 'SAMR', 'SAEZ', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(77, 'San Ramon de la Nueva Oran', 'Miramar', 1456, 1790.88, 69, 'SASO', 'SAEM', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(78, 'San Justo', 'Cordoba', 1342, 1650.66, 84, 'SADS', 'SACO', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(79, 'San Miguel de Tucuman', 'El Palomar', 1632, 2007.36, 116, 'SANT', 'SADP', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(80, 'Santa Rosa', 'Campo de Mayo', 2414, 2969.22, 12, 'SAZR', 'SADO', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(81, 'Santa Teresita', 'Moron', 2350, 2890.5, 109, 'SAZL', 'SADM', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(82, 'Santiago del Estero', 'La Plata', 1840, 2263.2, 41, 'SANE', 'SADL', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(83, 'San Martin de los Andes', 'Jose C. Paz', 2095, 2576.85, 49, 'SAZY', 'SADJ', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(84, 'Sauce Viejo', 'San Fernando', 1763, 2168.49, 20, 'SAAV', 'SADF', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(85, 'Sunchales', 'Don Torcuato', 2284, 2809.32, 38, 'SAFS', 'SADD', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(86, 'Tandil', 'Chamical', 2272, 2794.56, 68, 'SAZT', 'SACT', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(87, 'Tartagal', 'Chepes', 1849, 2274.27, 65, 'SAST', 'SACP', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(88, 'Termas de Rio Hondo', 'Cordoba', 1552, 1908.96, 30, 'SANR', 'SACO', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(89, 'Trelew', 'La Cumbre', 2472, 3040.56, 46, 'SAVT', 'SACC', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(90, 'Tres Arroyos', 'Buenos Aires', 2390, 2939.7, 125, 'SAZH', 'SABE', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(91, 'Ushuaia', 'Sauce Viejo', 1498, 1842.54, 22, 'SAWH', 'SAAV', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(92, 'Viedma', 'Villaguay', 1183, 1455.09, 90, 'SAVV', 'SAAU', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(93, 'Villa Dolores', 'Rosario', 1322, 1626.06, 71, 'SAOD', 'SAAR', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(94, 'Villa Gesell', 'Parana', 1227, 1509.21, 42, 'SAZV', 'SAAP', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(95, 'Villa Reynolds', 'Isla Martin Garcia', 1546, 1901.58, 40, 'SAOR', 'SAAK', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(96, 'Villaguay', 'Junin', 830, 1020.9, 55, 'SAAU', 'SAAJ', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(97, 'Zapala', 'Concordia', 1973, 2426.79, 122, 'SAHZ', 'SAAC', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(98, 'Buenos Aires', 'Campo de Mayo', 2477, 3046.71, 79, 'SABE', 'SADO', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(99, 'Buenos Aires', 'Caviahue', 2327, 2862.21, 43, 'SABE', 'SAHE', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(100, 'Buenos Aires', 'Ceres', 1071, 1317.33, 7, 'SABE', 'SANW', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(101, 'Buenos Aires', 'Chamical', 2312, 2843.76, 57, 'SABE', 'SACT', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(102, 'Buenos Aires', 'Chepes', 980, 1205.4, 42, 'SABE', 'SACP', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(103, 'Buenos Aires', 'Chilecito', 2138, 2629.74, 60, 'SABE', 'SANO', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(104, 'Buenos Aires', 'Clorinda', 1947, 2394.81, 89, 'SABE', 'SATC', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(105, 'Buenos Aires', 'Comodoro Rivadavia', 958, 1178.34, 55, 'SABE', 'SAVC', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(106, 'Buenos Aires', 'Cordoba', 2083, 2562.09, 95, 'SABE', 'SACO', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(107, 'Buenos Aires', 'Concordia', 2093, 2574.39, 121, 'SABE', 'SAAC', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(108, 'Buenos Aires', 'Coronel Suarez', 1062, 1306.26, 66, 'SABE', 'SAZC', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(109, 'Buenos Aires', 'Corrientes', 1376, 1692.48, 99, 'SABE', 'SARC', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(110, 'Buenos Aires', 'Curuzu Cuatia', 1429, 1757.67, 67, 'SABE', 'SATU', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(111, 'Buenos Aires', 'Cutral-Co', 1159, 1425.57, 41, 'SABE', 'SAZW', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(112, 'Buenos Aires', 'Dolores', 1741, 2141.43, 27, 'SABE', 'SAZD', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(113, 'Buenos Aires', 'Don Torcuato', 2395, 2945.85, 49, 'SABE', 'SADD', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(114, 'Buenos Aires', 'El Bolson', 1159, 1425.57, 68, 'SABE', 'SAVB', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(115, 'Buenos Aires', 'El Calafate', 1334, 1640.82, 84, 'SABE', 'SAWC', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(116, 'Buenos Aires', 'El Calafate', 1792, 2204.16, 61, 'SABE', 'SAWA', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(117, 'Buenos Aires', 'El Palomar', 1234, 1517.82, 82, 'SABE', 'SADP', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(118, 'Buenos Aires', 'Esquel', 1954, 2403.42, 121, 'SABE', 'SAVE', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(119, 'Buenos Aires', 'Ezeiza', 1237, 1521.51, 125, 'SABE', 'SAEZ', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(120, 'Buenos Aires', 'Formosa', 1163, 1430.49, 79, 'SABE', 'SARF', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(121, 'Buenos Aires', 'General Alvear', 1653, 2033.19, 81, 'SABE', 'SAMA', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(122, 'Buenos Aires', 'General Pico', 1757, 2161.11, 13, 'SABE', 'SAZG', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(123, 'Buenos Aires', 'General Roca', 2321, 2854.83, 44, 'SABE', 'SAHR', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(124, 'Buenos Aires', 'Ingeniero Jacobacci', 1237, 1521.51, 71, 'SABE', 'SAVJ', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(125, 'Buenos Aires', 'Isla Martin Garcia', 1846, 2270.58, 52, 'SABE', 'SAAK', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(126, 'Buenos Aires', 'Jose C. Paz', 2188, 2691.24, 86, 'SABE', 'SADJ', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(127, 'Buenos Aires', 'Junin', 1617, 1988.91, 107, 'SABE', 'SAAJ', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(128, 'Buenos Aires', 'Laboulaye', 1105, 1359.15, 124, 'SABE', 'SAOL', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(129, 'Buenos Aires', 'La Cumbre', 1610, 1980.3, 48, 'SABE', 'SACC', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(130, 'Buenos Aires', 'La Plata', 1871, 2301.33, 123, 'SABE', 'SADL', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(131, 'Buenos Aires', 'La Rioja', 1369, 1683.87, 76, 'SABE', 'SANL', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(132, 'Buenos Aires', 'Las Heras', 1995, 2453.85, 35, 'SABE', 'SAVH', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(133, 'Buenos Aires', 'Las Lomitas', 2139, 2630.97, 47, 'SABE', 'SATK', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(134, 'Buenos Aires', 'Malargue', 2236, 2750.28, 6, 'SABE', 'SAMM', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(135, 'Buenos Aires', 'Mar del Plata', 1275, 1568.25, 44, 'SABE', 'SAZM', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(136, 'Buenos Aires', 'Mendoza', 1515, 1863.45, 50, 'SABE', 'SAME', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(137, 'Buenos Aires', 'Merlo', 2487, 3059.01, 34, 'SABE', 'SAOS', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(138, 'Buenos Aires', 'Miramar', 2163, 2660.49, 95, 'SABE', 'SAEM', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(139, 'Buenos Aires', 'Monte Caseros', 2414, 2969.22, 91, 'SABE', 'SARM', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(140, 'Buenos Aires', 'Moron', 2399, 2950.77, 99, 'SABE', 'SADM', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(141, 'Buenos Aires', 'Necochea', 1905, 2343.15, 59, 'SABE', 'SAZO', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(142, 'Buenos Aires', 'Neuquen', 2457, 3022.11, 116, 'SABE', 'SAZN', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(143, 'Buenos Aires', 'Olavarria', 1366, 1680.18, 69, 'SABE', 'SAZF', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(144, 'Buenos Aires', 'Parana', 2474, 3043.02, 17, 'SABE', 'SAAP', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(145, 'Buenos Aires', 'Paso de los Libres', 1201, 1477.23, 21, 'SABE', 'SARL', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(146, 'Buenos Aires', 'Pehuajo', 2197, 2702.31, 31, 'SABE', 'SAZP', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(147, 'Buenos Aires', 'Perico', 1228, 1510.44, 44, 'SABE', 'SASJ', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(148, 'Buenos Aires', 'Perito Moreno', 1796, 2209.08, 112, 'SABE', 'SAWP', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(149, 'Buenos Aires', 'Posadas', 2469, 3036.87, 88, 'SABE', 'SARP', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(150, 'Buenos Aires', 'Puerto Deseado', 1629, 2003.67, 119, 'SABE', 'SAWD', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(151, 'Buenos Aires', 'Puerto Iguazu', 1856, 2282.88, 8, 'SABE', 'SARI', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(152, 'Buenos Aires', 'Puerto Madryn', 952, 1170.96, 72, 'SABE', 'SAVY', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(153, 'Buenos Aires', 'Puerto San Julian', 834, 1025.82, 48, 'SABE', 'SAWJ', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(154, 'Buenos Aires', 'Puerto Santa Cruz', 2372, 2917.56, 33, 'SABE', 'SAWU', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(155, 'Buenos Aires', 'Presidencia Roque Saenz Pe�a', 1249, 1536.27, 88, 'SABE', 'SASA', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(156, 'Buenos Aires', 'Reconquista', 1951, 2399.73, 120, 'SABE', 'SATR', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(157, 'Buenos Aires', 'Resistencia', 1767, 2173.41, 71, 'SABE', 'SARE', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(158, 'Buenos Aires', 'Rio Cuarto', 918, 1129.14, 119, 'SABE', 'SAOC', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(159, 'Buenos Aires', 'Rio Gallegos', 2014, 2477.22, 55, 'SABE', 'SAWG', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(160, 'Buenos Aires', 'Rio Grande', 1437, 1767.51, 90, 'SABE', 'SAWE', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(161, 'Buenos Aires', 'Rio Turbio', 1450, 1783.5, 99, 'SABE', 'SAWT', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(162, 'Buenos Aires', 'Rosario', 933, 1147.59, 22, 'SABE', 'SAAR', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(163, 'Buenos Aires', 'Presidencia Roque Saenz Pe�a', 1140, 1402.2, 120, 'SABE', 'SASA', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(164, 'Buenos Aires', 'San Fernando', 2264, 2784.72, 85, 'SABE', 'SADF', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(165, 'Buenos Aires', 'San Fernando del Valle de Catamarca', 2404, 2956.92, 57, 'SABE', 'SANC', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(166, 'Buenos Aires', 'San Juan', 1166, 1434.18, 25, 'SABE', 'SANU', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(167, 'Buenos Aires', 'San Luis', 1519, 1868.37, 110, 'SABE', 'SAOU', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(168, 'Buenos Aires', 'San Rafael', 1784, 2194.32, 98, 'SABE', 'SAMR', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(169, 'Buenos Aires', 'San Ramon de la Nueva Oran', 2445, 3007.35, 43, 'SABE', 'SASO', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(170, 'Buenos Aires', 'San Justo', 1734, 2132.82, 88, 'SABE', 'SADS', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(171, 'Buenos Aires', 'San Miguel de Tucuman', 1955, 2404.65, 118, 'SABE', 'SANT', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(172, 'Buenos Aires', 'Santa Rosa', 2158, 2654.34, 82, 'SABE', 'SAZR', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(173, 'Buenos Aires', 'Santa Teresita', 2236, 2750.28, 32, 'SABE', 'SAZL', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(174, 'Buenos Aires', 'Santiago del Estero', 1966, 2418.18, 118, 'SABE', 'SANE', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(175, 'Buenos Aires', 'San Martin de los Andes', 2121, 2608.83, 100, 'SABE', 'SAZY', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(176, 'Buenos Aires', 'Sauce Viejo', 1606, 1975.38, 43, 'SABE', 'SAAV', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(177, 'Buenos Aires', 'Sunchales', 1710, 2103.3, 33, 'SABE', 'SAFS', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(178, 'Buenos Aires', 'Tandil', 1285, 1580.55, 100, 'SABE', 'SAZT', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(179, 'Buenos Aires', 'Tartagal', 1273, 1565.79, 78, 'SABE', 'SAST', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(180, 'Buenos Aires', 'Termas de Rio Hondo', 2308, 2838.84, 42, 'SABE', 'SANR', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(181, 'Buenos Aires', 'Trelew', 1934, 2378.82, 49, 'SABE', 'SAVT', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(182, 'Buenos Aires', 'Tres Arroyos', 1573, 1934.79, 6, 'SABE', 'SAZH', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(183, 'Buenos Aires', 'Ushuaia', 827, 1017.21, 95, 'SABE', 'SAWH', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(184, 'Buenos Aires', 'Viedma', 1052, 1293.96, 91, 'SABE', 'SAVV', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(185, 'Buenos Aires', 'Villa Dolores', 1030, 1266.9, 30, 'SABE', 'SAOD', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(186, 'Buenos Aires', 'Villa Gesell', 1378, 1694.94, 28, 'SABE', 'SAZV', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(187, 'Buenos Aires', 'Villa Reynolds', 1286, 1581.78, 69, 'SABE', 'SAOR', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(188, 'Buenos Aires', 'Villaguay', 2259, 2778.57, 61, 'SABE', 'SAAU', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(189, 'Buenos Aires', 'Zapala', 1432, 1761.36, 35, 'SABE', 'SAHZ', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(190, 'Cordoba', 'Ezeiza', 1591, 1956.93, 100, 'SACO', 'SAEZ', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(191, 'Cordoba', 'Formosa', 884, 1087.32, 56, 'SACO', 'SARF', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(192, 'Cordoba', 'General Alvear', 2012, 2474.76, 86, 'SACO', 'SAMA', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(193, 'Cordoba', 'General Pico', 2432, 2991.36, 51, 'SACO', 'SAZG', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(194, 'Cordoba', 'General Roca', 817, 1004.91, 39, 'SACO', 'SAHR', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(195, 'Cordoba', 'Ingeniero Jacobacci', 2160, 2656.8, 28, 'SACO', 'SAVJ', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(196, 'Cordoba', 'Isla Martin Garcia', 985, 1211.55, 57, 'SACO', 'SAAK', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(197, 'Cordoba', 'Jose C. Paz', 1178, 1448.94, 60, 'SACO', 'SADJ', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(198, 'Cordoba', 'Junin', 2078, 2555.94, 123, 'SACO', 'SAAJ', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(199, 'Cordoba', 'Laboulaye', 1153, 1418.19, 46, 'SACO', 'SAOL', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(200, 'Cordoba', 'La Cumbre', 1585, 1949.55, 3, 'SACO', 'SACC', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(201, 'Cordoba', 'La Plata', 2128, 2617.44, 71, 'SACO', 'SADL', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(202, 'Cordoba', 'La Rioja', 1729, 2126.67, 109, 'SACO', 'SANL', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(203, 'Cordoba', 'Las Heras', 1202, 1478.46, 29, 'SACO', 'SAVH', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(204, 'Cordoba', 'Las Lomitas', 2399, 2950.77, 90, 'SACO', 'SATK', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(205, 'Cordoba', 'Malargue', 2277, 2800.71, 13, 'SACO', 'SAMM', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(206, 'Cordoba', 'Mar del Plata', 1339, 1646.97, 47, 'SACO', 'SAZM', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(207, 'Cordoba', 'Mendoza', 2364, 2907.72, 91, 'SACO', 'SAME', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(208, 'Cordoba', 'Merlo', 1305, 1605.15, 45, 'SACO', 'SAOS', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(209, 'Cordoba', 'Miramar', 2344, 2883.12, 95, 'SACO', 'SAEM', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(210, 'Cordoba', 'Monte Caseros', 817, 1004.91, 78, 'SACO', 'SARM', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(211, 'Cordoba', 'Moron', 1728, 2125.44, 45, 'SACO', 'SADM', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(212, 'Cordoba', 'Necochea', 1820, 2238.6, 44, 'SACO', 'SAZO', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(213, 'Cordoba', 'Neuquen', 2174, 2674.02, 69, 'SACO', 'SAZN', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(214, 'Cordoba', 'Olavarria', 839, 1031.97, 3, 'SACO', 'SAZF', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(215, 'Cordoba', 'Parana', 927, 1140.21, 5, 'SACO', 'SAAP', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(216, 'Cordoba', 'Paso de los Libres', 853, 1049.19, 102, 'SACO', 'SARL', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(217, 'Cordoba', 'Pehuajo', 2189, 2692.47, 19, 'SACO', 'SAZP', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(218, 'Cordoba', 'Perico', 1130, 1389.9, 118, 'SACO', 'SASJ', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(219, 'Cordoba', 'Perito Moreno', 1039, 1277.97, 41, 'SACO', 'SAWP', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(220, 'Cordoba', 'Posadas', 2038, 2506.74, 57, 'SACO', 'SARP', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(221, 'Cordoba', 'Puerto Deseado', 2159, 2655.57, 102, 'SACO', 'SAWD', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(222, 'Cordoba', 'Puerto Iguazu', 2253, 2771.19, 38, 'SACO', 'SARI', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(223, 'Cordoba', 'Puerto Madryn', 2374, 2920.02, 125, 'SACO', 'SAVY', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(224, 'Cordoba', 'Puerto San Julian', 2477, 3046.71, 91, 'SACO', 'SAWJ', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(225, 'Cordoba', 'Puerto Santa Cruz', 1020, 1254.6, 123, 'SACO', 'SAWU', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(226, 'Cordoba', 'Presidencia Roque Saenz Pe�a', 1045, 1285.35, 40, 'SACO', 'SASA', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(227, 'Cordoba', 'Reconquista', 1484, 1825.32, 96, 'SACO', 'SATR', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(228, 'Cordoba', 'Resistencia', 1846, 2270.58, 72, 'SACO', 'SARE', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(229, 'Cordoba', 'Rio Cuarto', 2054, 2526.42, 43, 'SACO', 'SAOC', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(230, 'Cordoba', 'Rio Gallegos', 2392, 2942.16, 115, 'SACO', 'SAWG', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(231, 'Cordoba', 'Rio Grande', 1687, 2075.01, 38, 'SACO', 'SAWE', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(232, 'Cordoba', 'Rio Turbio', 959, 1179.57, 103, 'SACO', 'SAWT', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(233, 'Cordoba', 'Rosario', 1147, 1410.81, 50, 'SACO', 'SAAR', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(234, 'Cordoba', 'Presidencia Roque Saenz Pe�a', 2302, 2831.46, 57, 'SACO', 'SASA', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(235, 'Cordoba', 'San Fernando', 2399, 2950.77, 43, 'SACO', 'SADF', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(236, 'Cordoba', 'San Fernando del Valle de Catamarca', 1572, 1933.56, 73, 'SACO', 'SANC', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(237, 'Cordoba', 'San Juan', 1361, 1674.03, 51, 'SACO', 'SANU', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(238, 'Cordoba', 'San Luis', 1982, 2437.86, 82, 'SACO', 'SAOU', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(239, 'Cordoba', 'San Rafael', 2395, 2945.85, 125, 'SACO', 'SAMR', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(240, 'Cordoba', 'San Ramon de la Nueva Oran', 2383, 2931.09, 61, 'SACO', 'SASO', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(241, 'Cordoba', 'San Justo', 1300, 1599, 101, 'SACO', 'SADS', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(242, 'Cordoba', 'San Miguel de Tucuman', 2431, 2990.13, 85, 'SACO', 'SANT', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(243, 'Cordoba', 'Santa Rosa', 1653, 2033.19, 77, 'SACO', 'SAZR', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(244, 'Cordoba', 'Santa Teresita', 1945, 2392.35, 118, 'SACO', 'SAZL', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(245, 'Cordoba', 'Santiago del Estero', 1654, 2034.42, 115, 'SACO', 'SANE', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(246, 'Cordoba', 'San Martin de los Andes', 1778, 2186.94, 50, 'SACO', 'SAZY', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(247, 'Cordoba', 'Sauce Viejo', 2246, 2762.58, 108, 'SACO', 'SAAV', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(248, 'Cordoba', 'Sunchales', 1985, 2441.55, 64, 'SACO', 'SAFS', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(249, 'Cordoba', 'Tandil', 2463, 3029.49, 20, 'SACO', 'SAZT', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(250, 'Cordoba', 'Tartagal', 1504, 1849.92, 126, 'SACO', 'SAST', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(251, 'Cordoba', 'Termas de Rio Hondo', 1398, 1719.54, 96, 'SACO', 'SANR', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(252, 'Cordoba', 'Trelew', 813, 999.99, 98, 'SACO', 'SAVT', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(253, 'Cordoba', 'Tres Arroyos', 2288, 2814.24, 21, 'SACO', 'SAZH', 4);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(254, 'Cordoba', 'Ushuaia', 1916, 2356.68, 45, 'SACO', 'SAWH', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(255, 'Cordoba', 'Viedma', 1321, 1624.83, 18, 'SACO', 'SAVV', 1);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(256, 'Cordoba', 'Villa Dolores', 941, 1157.43, 102, 'SACO', 'SAOD', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(257, 'Cordoba', 'Villa Gesell', 2049, 2520.27, 116, 'SACO', 'SAZV', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(258, 'Cordoba', 'Villa Reynolds', 2313, 2844.99, 49, 'SACO', 'SAOR', 3);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(259, 'Cordoba', 'Villaguay', 2400, 2952, 59, 'SACO', 'SAAU', 2);
INSERT INTO vuelo (numero_vuelo, origen, destino, tarifa_economy, tarifa_primera, dias_vuelo, oaci_origen, oaci_destino, codigo_avion) VALUES(260, 'Cordoba', 'Zapala', 1347, 1656.81, 14, 'SACO', 'SAHZ', 2);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla asiento
--
ALTER TABLE asiento
  ADD CONSTRAINT asiento_ibfk_1 FOREIGN KEY (numero_vuelo) REFERENCES vuelo (numero_vuelo),
  ADD CONSTRAINT asiento_ibfk_2 FOREIGN KEY (id_categoria) REFERENCES categoria (id_categoria),
  ADD CONSTRAINT asiento_ibfk_3 FOREIGN KEY (dni) REFERENCES pasajero (dni);

--
-- Filtros para la tabla reserva
--
ALTER TABLE reserva
  ADD CONSTRAINT reserva_ibfk_1 FOREIGN KEY (dni) REFERENCES pasajero (dni),
  ADD CONSTRAINT reserva_ibfk_2 FOREIGN KEY (numero_vuelo) REFERENCES vuelo (numero_vuelo),
  ADD CONSTRAINT reserva_ibfk_3 FOREIGN KEY (id_categoria) REFERENCES categoria (id_categoria);

--
-- Filtros para la tabla vuelo
--
ALTER TABLE vuelo
  ADD CONSTRAINT vuelo_ibfk_1 FOREIGN KEY (oaci_origen) REFERENCES aeropuerto (codigo_oaci),
  ADD CONSTRAINT vuelo_ibfk_2 FOREIGN KEY (oaci_destino) REFERENCES aeropuerto (codigo_oaci),
  ADD CONSTRAINT vuelo_ibfk_3 FOREIGN KEY (codigo_avion) REFERENCES avion (codigo_avion);

--
-- Filtros para la tabla pago
--  
ALTER TABLE pago
  ADD CONSTRAINT pago_ibfk_1 FOREIGN KEY (codigo_reserva) REFERENCES reserva (codigo_reserva);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
