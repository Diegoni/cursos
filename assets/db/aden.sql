-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-03-2018 a las 23:50:50
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `aden`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
`id` int(11) NOT NULL,
  `Nombre` varchar(128) NOT NULL,
  `RazonSocial` varchar(128) NOT NULL,
  `Descripcion` varchar(128) NOT NULL,
  `CodIVa` varchar(128) NOT NULL,
  `NroDoc` varchar(128) NOT NULL,
  `FechaCumple` varchar(128) NOT NULL,
  `Telefono` varchar(128) NOT NULL,
  `EMail` varchar(128) NOT NULL,
  `potencial` varchar(128) NOT NULL,
  `codtipodoc` varchar(128) NOT NULL,
  `empresa` varchar(128) NOT NULL,
  `codtipo` varchar(128) NOT NULL,
  `codigo` varchar(128) NOT NULL,
  `eliminado` varchar(128) NOT NULL,
  `clave` varchar(128) NOT NULL,
  `limite` varchar(128) NOT NULL,
  `comentarioventa` varchar(128) NOT NULL,
  `comentarioentrega` varchar(128) NOT NULL,
  `codjerarquia` varchar(128) NOT NULL,
  `mayorista` varchar(128) NOT NULL,
  `contacto1` varchar(128) NOT NULL,
  `telefono1` varchar(128) NOT NULL,
  `contacto2` varchar(128) NOT NULL,
  `telefono2` varchar(128) NOT NULL,
  `contacto3` varchar(128) NOT NULL,
  `telefono3` varchar(128) NOT NULL,
  `contacto4` varchar(128) NOT NULL,
  `telefono4` varchar(128) NOT NULL,
  `estadoclie` varchar(128) NOT NULL,
  `fechaEstado` varchar(128) NOT NULL,
  `alias` varchar(128) NOT NULL,
  `saldo` varchar(128) NOT NULL,
  `codlistaprecio` varchar(128) NOT NULL,
  `codvendedor` varchar(128) NOT NULL,
  `codcondicionpago` varchar(128) NOT NULL,
  `codCondib` varchar(128) NOT NULL,
  `nroIB` varchar(128) NOT NULL,
  `CodTipoDocTexto` varchar(128) NOT NULL,
  `calificacion` varchar(128) NOT NULL,
  `codCondEsp` varchar(128) NOT NULL,
  `codigoant` varchar(128) NOT NULL,
  `preventa` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientesjerarquias`
--

CREATE TABLE IF NOT EXISTS `clientesjerarquias` (
`id` int(11) NOT NULL,
  `codcliente` int(11) NOT NULL,
  `codjerarquia` int(11) NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE IF NOT EXISTS `cursos` (
`id` int(11) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `modalidad` varchar(128) NOT NULL,
  `visible` varchar(128) NOT NULL,
  `sede` varchar(128) NOT NULL,
  `precio` varchar(128) NOT NULL,
  `horas` varchar(128) NOT NULL,
  `calificacion` varchar(128) NOT NULL,
  `creditos` varchar(128) NOT NULL,
  `certificados` varchar(128) NOT NULL,
  `estado` varchar(128) NOT NULL,
  `tesis` varchar(128) NOT NULL,
  `descripcion` varchar(128) NOT NULL,
  `asistencia` varchar(128) NOT NULL,
  `codprofesor` varchar(128) NOT NULL,
  `clase` varchar(128) NOT NULL,
  `materia` varchar(128) NOT NULL,
  `coduniversidad` varchar(128) NOT NULL,
  `coddiploma` varchar(128) NOT NULL,
  `abreviatura` varchar(128) NOT NULL,
  `cantmat` varchar(128) NOT NULL,
  `trabajofinalMBA` varchar(128) NOT NULL,
  `codservicio` varchar(128) NOT NULL,
  `nombref` varchar(128) NOT NULL,
  `nombrei` varchar(128) NOT NULL,
  `codsubrubro` varchar(128) NOT NULL,
  `codsubdirector` varchar(128) NOT NULL,
  `copiaCanvas` varchar(128) NOT NULL,
  `tipogral` varchar(128) NOT NULL,
  `FechaMaterialAdicional` varchar(128) NOT NULL,
  `codedicion` varchar(128) NOT NULL,
  `edicioncurso` varchar(128) NOT NULL,
  `codtutor` varchar(128) NOT NULL,
  `fecha` varchar(128) NOT NULL,
  `fechaFin` varchar(128) NOT NULL,
  `semanas_teoricas` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE IF NOT EXISTS `personas` (
`id` int(11) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `apellido` varchar(128) NOT NULL,
  `codprofesion` varchar(128) NOT NULL,
  `codcargo` varchar(128) NOT NULL,
  `codarea` varchar(128) NOT NULL,
  `codempresa` varchar(128) NOT NULL,
  `fechanacimiento` varchar(128) NOT NULL,
  `sexo` varchar(128) NOT NULL,
  `telparticular` varchar(128) NOT NULL,
  `tellaboral` varchar(128) NOT NULL,
  `codestadoCivil` varchar(128) NOT NULL,
  `celular` varchar(128) NOT NULL,
  `emailparticular` varchar(128) NOT NULL,
  `emaillaboral` varchar(128) NOT NULL,
  `direccion` varchar(128) NOT NULL,
  `notas` varchar(128) NOT NULL,
  `codsede` varchar(128) NOT NULL,
  `codformacion` varchar(128) NOT NULL,
  `documento_tipo_id` varchar(128) NOT NULL,
  `documento_tipo` varchar(128) NOT NULL,
  `documento_numero` varchar(128) NOT NULL,
  `cp` varchar(128) NOT NULL,
  `eliminado` varchar(128) NOT NULL,
  `comentario` varchar(128) NOT NULL,
  `credito` varchar(128) NOT NULL,
  `login_id` varchar(128) NOT NULL,
  `codestadopersona` varchar(128) NOT NULL,
  `fecha_alta` varchar(128) NOT NULL,
  `localidad_id` varchar(128) NOT NULL,
  `provincia_id` varchar(128) NOT NULL,
  `pais_id` varchar(128) NOT NULL,
  `pais` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personasclientes`
--

CREATE TABLE IF NOT EXISTS `personasclientes` (
`id` int(11) NOT NULL,
  `codpersona` varchar(128) NOT NULL,
  `codcliente` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`codRol` int(11) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `permisos` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

CREATE TABLE IF NOT EXISTS `sedes` (
`codSede` int(11) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `img` varchar(128) NOT NULL,
  `direccion` varchar(128) NOT NULL,
  `telefono` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `abreviatura` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`codUsuario` int(11) NOT NULL,
  `nombre` int(11) NOT NULL,
  `correo` int(11) NOT NULL,
  `rol` int(11) NOT NULL,
  `acceso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vsearchpersonas`
--

CREATE TABLE IF NOT EXISTS `vsearchpersonas` (
`codpersona` int(11) NOT NULL,
  `nombre` int(11) NOT NULL,
  `apellido` int(11) NOT NULL,
  `codprofesion` int(11) NOT NULL,
  `codcargo` int(11) NOT NULL,
  `codarea` int(11) NOT NULL,
  `codciudad` int(11) NOT NULL,
  `codempresa` int(11) NOT NULL,
  `fechanacimiento` int(11) NOT NULL,
  `sexo` int(11) NOT NULL,
  `password` int(11) NOT NULL,
  `codusuario` int(11) NOT NULL,
  `telparticular` int(11) NOT NULL,
  `tellaboral` int(11) NOT NULL,
  `codestadoCivil` int(11) NOT NULL,
  `nacionalidad` int(11) NOT NULL,
  `celular` int(11) NOT NULL,
  `emailparticular` int(11) NOT NULL,
  `emaillaboral` int(11) NOT NULL,
  `localidad` int(11) NOT NULL,
  `direccion` int(11) NOT NULL,
  `notas` int(11) NOT NULL,
  `ateneo` int(11) NOT NULL,
  `codformacion` int(11) NOT NULL,
  `codtipodoc` int(11) NOT NULL,
  `nrodoc` int(11) NOT NULL,
  `fechaactualizacion` int(11) NOT NULL,
  `cp` int(11) NOT NULL,
  `foto` int(11) NOT NULL,
  `comentario` int(11) NOT NULL,
  `pasaporte` int(11) NOT NULL,
  `credito` int(11) NOT NULL,
  `actualizado` int(11) NOT NULL,
  `usuarioactualizador` int(11) NOT NULL,
  `codlocalidad` int(11) NOT NULL,
  `actualizado1` int(11) NOT NULL,
  `fechaactcontrasenia` int(11) NOT NULL,
  `dato1` int(11) NOT NULL,
  `dato2` int(11) NOT NULL,
  `EmailDesuscr1` int(11) NOT NULL,
  `EmailDesuscr2` int(11) NOT NULL,
  `usuarioEmailDesuscr` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `fecha_alta` int(11) NOT NULL,
  `codsede` int(11) NOT NULL,
  `eliminado` int(11) NOT NULL,
  `puntos` int(11) NOT NULL,
  `estadopersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vsearchpersonas_bak`
--

CREATE TABLE IF NOT EXISTS `vsearchpersonas_bak` (
`codpersona` int(11) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `apellido` varchar(128) NOT NULL,
  `codprofesion` varchar(128) NOT NULL,
  `codcargo` varchar(128) NOT NULL,
  `codarea` varchar(128) NOT NULL,
  `codciudad` varchar(128) NOT NULL,
  `codempresa` varchar(128) NOT NULL,
  `fechanacimiento` varchar(128) NOT NULL,
  `sexo` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `codusuario` varchar(128) NOT NULL,
  `telparticular` varchar(128) NOT NULL,
  `tellaboral` varchar(128) NOT NULL,
  `codestadoCivil` varchar(128) NOT NULL,
  `nacionalidad` varchar(128) NOT NULL,
  `celular` varchar(128) NOT NULL,
  `emailparticular` varchar(128) NOT NULL,
  `emaillaboral` varchar(128) NOT NULL,
  `localidad` varchar(128) NOT NULL,
  `direccion` varchar(128) NOT NULL,
  `notas` varchar(128) NOT NULL,
  `ateneo` varchar(128) NOT NULL,
  `codformacion` varchar(128) NOT NULL,
  `codtipodoc` varchar(128) NOT NULL,
  `nrodoc` varchar(128) NOT NULL,
  `fechaactualizacion` varchar(128) NOT NULL,
  `cp` varchar(128) NOT NULL,
  `eliminado` varchar(128) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `comentario` varchar(128) NOT NULL,
  `pasaporte` varchar(128) NOT NULL,
  `credito` varchar(128) NOT NULL,
  `actualizado` varchar(128) NOT NULL,
  `usuarioactualizador` varchar(128) NOT NULL,
  `codlocalidad` varchar(128) NOT NULL,
  `actualizado1` varchar(128) NOT NULL,
  `codcliente` varchar(128) NOT NULL,
  `fechaactcontrasenia` varchar(128) NOT NULL,
  `dato1` varchar(128) NOT NULL,
  `dato2` varchar(128) NOT NULL,
  `EmailDesuscr1` varchar(128) NOT NULL,
  `EmailDesuscr2` varchar(128) NOT NULL,
  `usuarioEmailDesuscr` varchar(128) NOT NULL,
  `login_id` varchar(128) NOT NULL,
  `codsede` varchar(128) NOT NULL,
  `fecha_alta` varchar(128) NOT NULL,
  `estadopersona` varchar(128) NOT NULL,
  `puntos` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientesjerarquias`
--
ALTER TABLE `clientesjerarquias`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personasclientes`
--
ALTER TABLE `personasclientes`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`codRol`);

--
-- Indices de la tabla `sedes`
--
ALTER TABLE `sedes`
 ADD PRIMARY KEY (`codSede`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`codUsuario`);

--
-- Indices de la tabla `vsearchpersonas`
--
ALTER TABLE `vsearchpersonas`
 ADD PRIMARY KEY (`codpersona`);

--
-- Indices de la tabla `vsearchpersonas_bak`
--
ALTER TABLE `vsearchpersonas_bak`
 ADD PRIMARY KEY (`codpersona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `clientesjerarquias`
--
ALTER TABLE `clientesjerarquias`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `personasclientes`
--
ALTER TABLE `personasclientes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
MODIFY `codRol` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `sedes`
--
ALTER TABLE `sedes`
MODIFY `codSede` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `codUsuario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `vsearchpersonas`
--
ALTER TABLE `vsearchpersonas`
MODIFY `codpersona` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `vsearchpersonas_bak`
--
ALTER TABLE `vsearchpersonas_bak`
MODIFY `codpersona` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
