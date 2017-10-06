-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-10-2017 a las 12:36:34
-- Versión del servidor: 5.7.9
-- Versión de PHP: 5.6.16

SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nokentrain`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kanjis`
--

DROP TABLE IF EXISTS `kanjis`;
CREATE TABLE IF NOT EXISTS `kanjis` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `espa` varchar(80) NOT NULL,
  `japo` varchar(120) NOT NULL,
  `japo_image` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ;

--
-- Volcado de datos para la tabla `kanjis`
--

INSERT INTO `kanjis` (`id`, `name`, `espa`, `japo`, `japo_image`) VALUES
(1, 'uno', 'uno', '', ''),
(2, 'dos', 'dos', '', ''),
(3, 'tres', 'tres', '', ''),
(4, 'cuatro', 'cuatro', '', ''),
(5, 'cinco', 'cinco', '', ''),
(6, 'seis', 'seis', '', ''),
(7, 'siete', 'siete', '', ''),
(8, 'ocho', 'ocho', '', ''),
(9, 'nueve', 'nueve', '', ''),
(10, 'diez', 'diez', '', ''),
(11, 'cien-muchos', 'cien-mucho', '', ''),
(12, 'mil-muchos', 'mil-muchos', '', ''),
(13, 'diez mil-muchos', 'diez mil-muchos', '', ''),
(14, 'arriba-encima', 'arriba-encima', '', ''),
(15, 'abajo-debajo', 'bajo-debajo', '', ''),
(16, 'centro-dentro-medio', 'centro-dentro-medio', '', ''),
(17, 'persona', 'persona', '', ''),
(18, 'ahora', 'ahora', '', ''),
(19, 'descansar', 'descansar', '', ''),
(20, 'reunirse-encontrarse con-asociacion', 'reunirse-encontrarse con-asociacion', '', ''),
(21, 'que', 'que', '', ''),
(22, 'antes-adelante-previo-final', 'antes-adelante-previo-final', '', ''),
(23, 'entrar-insertar-introducir', 'entrar-insertar-introducir', '', ''),
(24, 'salir-dejar-sacar', 'salir-dejar-sacar', '', ''),
(25, 'yen, circular, redondo', 'yen-circular-redondo', '', ''),
(26, 'minuto-dividir-parte', 'minuto-dividir-parte', '', ''),
(27, 'antes-delante de', 'antes-delante de', '', ''),
(28, 'norte-huir-perder', 'norte-huir-perder', '', ''),
(29, 'mediodia', 'mediodia', '', ''),
(30, 'mitad-medio-incompleto', 'mitad-medio-incompleto', '', ''),
(31, 'sur', 'sur', '', ''),
(32, 'amigo-compañero', 'amigo-compañero', '', ''),
(33, 'boca-orificio-apertura', 'boca-orificio-apertura', '', ''),
(34, 'antiguo-viejo-desgastar', 'antiguo-viejo-desgastar', '', ''),
(35, 'derecha', 'derecha', '', ''),
(36, 'nombre-celebre-reputacion', 'nombre-celebre-reputacion', '', ''),
(37, 'pais', 'pais', '', ''),
(38, 'tierra-suelo', 'tierra-suelo', '', ''),
(39, 'fuera-exterior-otro-desatar', 'fuera-exterior-otro-desatar', '', ''),
(40, 'abundante', 'abundante', '', ''),
(41, 'grande-muy', 'grande-muy', '', ''),
(42, 'cielo-imperial-paraiso', 'cielo-imperial-paraiso', '', ''),
(43, 'mujer-femenino', 'mujer-femenino', '', ''),
(44, 'niño-chiquillo', 'niño-chiquillo', '', ''),
(45, 'estudiar-aprendizaje-estudio-ciencia', 'estudiar-aprendizaje-estudio-ciencia', '', ''),
(46, 'barato-pacifico-tranquilo', 'barato-pacifico-tranquilo', '', ''),
(47, 'poco-pequeno', 'poco-pequeno', '', ''),
(48, 'poco-apenas-un poco-pequeno', 'poco-apenas-un poco-pequeno', '', ''),
(49, 'montaña', 'montaña', '', ''),
(50, 'rio-arroyo', 'rio-arroyo', '', ''),
(51, 'izquierda', 'izquierda', '', ''),
(52, 'año, edad', 'año, edad', '', ''),
(53, 'tienda-establecimiento', 'tienda-establecimiento', '', ''),
(54, 'despues-atras-detras', 'despues-atras-detras', '', ''),
(55, 'mano', 'mano', '', ''),
(56, 'nuevo-fresco', 'nuevo-fresco', '', ''),
(57, 'dia-solar-sol', 'dia-solar-sol', '', ''),
(58, 'hora-tiempo-ocasion', 'hora-tiempo-ocasion', '', ''),
(59, 'escribir-escrito-escritura-libro', 'escribir-escrito-escritura-libro', '', ''),
(60, 'mes-luna', 'mes-luna', '', ''),
(61, 'arbol-madera', 'arbol-madera', '', ''),
(62, 'libro-origen', 'libro-origen', '', ''),
(63, 'venir-llegar-acercarse', 'venir-llegar-acercarse', '', ''),
(64, 'este', 'este', '', ''),
(65, 'colegio-escuela', 'colegio-escuela', '', ''),
(66, 'madre-base-cimientos', 'madre-base-cimientos', '', ''),
(67, 'cada-siempre', 'cada-siempre', '', ''),
(68, 'espiritu-mente-energia', 'espiritu-mente-energia', '', ''),
(69, 'agua', 'agua', '', ''),
(70, 'fuego-llama', 'fuego-llama', '', ''),
(71, 'padre', 'padre', '', ''),
(72, 'existir-nacer-vivir-crudo', 'existir-nacer-vivir-crudo', '', ''),
(73, 'hombre-masculino', 'hombre-masculino', '', ''),
(74, 'blanco', 'blanco', '', ''),
(75, 'ojo-mirada-percepcion', 'ojo-mirada-percepcion', '', ''),
(76, 'asociacion-compania-sociedad', 'asociacion-compania-sociedad', '', ''),
(77, 'cielo-vacio-atmosfera', 'cielo-vacio-atmosfera', '', ''),
(78, 'levantarse-alzarse-ponerse-en-pie', 'levantarse-alzarse-ponerse-en-pie', '', ''),
(79, 'oreja-oido', 'oreja-oido', '', ''),
(80, 'oir-escuchar-preguntar-rumor', 'oir-escuchar-preguntar-rumor', '', ''),
(81, 'flor', 'flor', '', ''),
(82, 'ir-fila-ocurrir-realizar-conducta', 'ir-fila-ocurrir-realizar-conducta', '', ''),
(83, 'oeste-espana', 'oeste-espana', '', ''),
(84, 'ver-mirar-esperanza', 'ver-mirar-esperanza', '', ''),
(85, 'decir-palabras', 'decir-palabras', '', ''),
(86, 'hablar-conversar-cuento-historia', 'hablar-conversar-cuento-historia', '', ''),
(87, 'palabra-lengua-habla-discurso-narrar', 'palabra-lengua-habla-discurso-narrar', '', ''),
(88, 'leer', 'leer', '', ''),
(89, 'comprar', 'comprar', '', ''),
(90, 'pierna-pie-bastar', 'pierna-pie-bastar', '', ''),
(91, 'coche', 'coche', '', ''),
(92, 'semana', 'semana', '', ''),
(93, 'camino-senda-carretera-calle-dogma', 'camino-senda-carretera-calle-dogma', '', ''),
(94, 'dinero-metal-oro', 'dinero-metal-oro', '', ''),
(95, 'largo-jefe', 'largo-jefe', '', ''),
(96, 'espacio-intervalo-habitacion', 'espacio-intervalo-habitacion', '', ''),
(97, 'lluvia', 'lluvia', '', ''),
(98, 'electricidad', 'electricidad', '', ''),
(99, 'comer-alimento-eclipse', 'comer-alimento-eclipse', '', ''),
(100, 'beber', 'beber', '', ''),
(101, 'estación-estación de tren-terminal', 'estación-estación de tren-terminal', '', ''),
(102, 'alto-caro-levantar', 'alto-caro-levantar', '', ''),
(103, 'pescado-pez', 'pescado-pez', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `pass` varchar(150) NOT NULL,
  `fails` varchar(650) NOT NULL DEFAULT ',,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,',
  `shoots` varchar(650) NOT NULL DEFAULT ',,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,',
  PRIMARY KEY (`id`)
) ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `pass`, `fails`, `shoots`) VALUES
(1, 'atry', '$2y$11$8qF99N/20aPv6UyGKZ3KIOj.GkTl/6NNn7URDlGFJ.7CCuSESeHqy', ',3,15,4,2,3,2,,4,3,9,,2,2,1,4,1,19,,2,,2,3,1,,2,3,1,4,3,,4,1,3,2,3,3,2,2,1,,,1,3,2,2,,2,,3,2,1,2,,1,2,3,3,2,1,1,1,2,2,2,2,,,3,1,2,,1,2,2,,2,2,4,1,2,,1,4,1,3,3,3,1,3,,1,3,5,3,1,2,4,3,,1,1,2,1,1', ',,7,2,2,1,2,3,,1,,1,2,1,,1,2,,1,1,2,2,1,3,1,3,,1,,2,1,1,1,,2,1,,3,,1,5,1,1,2,3,1,2,1,1,2,4,2,2,1,3,,,3,1,1,,2,1,1,1,1,1,1,3,1,2,2,1,6,,1,1,,1,2,,2,1,,1,,1,2,2,1,1,2,2,1,1,2,3,2,,1,1,1,,2'),
(2, 'teru', '$2y$11$S0icW8vBy22qO33oUUtEue0lxdbDbgadAW19wq12ZwkopWuScJ5IC', ',,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,', ',,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,'),
(6, 'test', '$2y$11$WzhgpUFQWAFG3cKT82ClV.IIIOFzqy4fBqMT3HKbcNHdf4EgLgBUa', '', ''),
(7, 'naussicaa', '$2y$11$vR/4TO50aDSFmIPDTq3FPe4w6gh1YOlWPlwp9.tE6.ktS6u9A0szi', ',,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,', ',,,1,,,,,,,,,,,,,,,,,,,,1,,1,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,1,,,,,,,,,,,,,,,1,,,,,,,,,,,,,,,,,1,,,,'),
(8, 'test2', '$2y$11$WZiHwsbTwGDx95XwaEMdo.lEqiwXA9JJos4ttxj9ja03I23PBcJcC', ',,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,1,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,1,,,,,,,,,,,,,,,,,,,,,1,,,,,,,,,,,', ',,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,1,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
