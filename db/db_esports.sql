-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-06-2023 a las 04:44:52
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_esports`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `game`
--

CREATE TABLE `game` (
  `id_game` int(11) NOT NULL,
  `name_game` varchar(100) NOT NULL,
  `description_game` varchar(1000) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `game`
--

INSERT INTO `game` (`id_game`, `name_game`, `description_game`, `genre_id`) VALUES
(2, 'DOTA 2', 'Dota 2 es un videojuego de estrategia en línea que combina elementos de acción y estrategia en tiempo real (RTS). Fue desarrollado por Valve Corporation y se lanzó en 2013 como la secuela del popular mod de Warcraft III llamado Defense of the Ancients (DotA).\r\nEn el juego, los jugadores forman dos equipos de cinco jugadores cada uno y asumen el papel de héroes poderosos con habilidades únicas. El objetivo principal es destruir el antiguo enemigo, una estructura ubicada en la base enemiga, mientras se defiende el propio antiguo.\r\nDota 2 ofrece una amplia selección de héroes, cada uno con un estilo de juego único y roles específicos, como tanques, soportes, asesinos, entre otros. Los jugadores deben trabajar en equipo, comunicarse y coordinarse para ganar la partida, ya que la estrategia y la toma de decisiones en equipo son fundamentales.\r\n', 3),
(3, 'HEROES OF THE STORM', 'Heroes of the Storm es un juego de combate en línea ', 3),
(4, 'COUNTER STRIKE GLOBAL OFFENSIVE', 'Counter-Strike: Global Offensive (CS:GO) es un juego de disparos en primera persona (FPS) desarrollado por Valve Corporation y Hidden Path Entertainment. Es la últi y desafíos estratégicos. Los jugadores deben utilizar habilidades de puntería, tácticas de equipo y coordinación para tener éxito. Además de los modos de juego estándar, CS:GO también incluye modos competitivos y casuales, así como partidas personalizadas.\r\nCS:GO es conocido por su alta competitividad y su escen\r\npara tener éxito. Además de los modos de juego estándar, CS:GO también incluye modos competitivos y casuales, así como partidas personalizadas.\r\nCS:GO es conocido por su alta competitividad y su escenpara ', 4),
(5, 'OVERWATCH', 'Overwatch es un juego de disparos en equipo desarrollado por Blizzard Entertainment. Es un shooter en p una carga \r\n\r\nOverwatch es un juego de disparos en equipo desarrollado por Blizzard Entertainment. Es un shooter en p una carga \r\n\r\nOverwatch es un juego de disparos en equipo desarrollado por Blizzard Entertainment. Es un shooter en p una carga \r\n\r\nOverwatch es un juego de disparos en equipo desarrollado por Blizzard Entertainment. Es un shooter en p una carga \r\n\r\nOverwatch es un juego de disparos en equipo desarrollado por Blizzard Entertainment. Es un shooter en p una carga \r\n\r\nOverwatch es un juego de disparos en equipo desarrollado por Blizzard Entertainment. Es un shooter en p una carga \r\n\r\nOverwatch es un juego de disparos en equipo desarrollado por Blizzard Entertainment. Es un shooter en p una carga \r\n\r\n', 2),
(6, 'VALORANT', 'Valorant es un FPS táctico en línea desarrollado por Riot Games. Los jugadores se dividen en dos equipos de cinco y luchan en partidas intensas y estratégicas. Cada jugador elige un agente con habilidades únicas que complementan el estilo de juego. El objetivo principal es plantar o desactivar una bomba, o eliminar al equipo contrario. Con un equilibrio entre habilidad y estrategia, Valorant ofrece un juego competitivo y dinámico, con un enfoque en el trabajo en equipo y la comunicación. Los jugadores pueden mejorar sus habilidades, desbloquear nuevos agentes y participar en torneos emocionantes en constante evolución.\r\n', 2),
(7, 'FORTNITE', 'Fortnite es un popular juego de batalla real desarrollado por Epic Games. En este juego multijugador en línea, los jugadores son dejados en una isla donde deben luchar contra otros jugadores para ser el último en pie. Los jugadores pueden construir estructuras defensivas y utilizar una variedad de armas y habilidades para enfrentarse a sus oponentes. Además del modo de juego principal, Fortnite ofrece eventos en vivo, desafíos semanales y colaboraciones con otras marcas, lo que lo convierte en una experiencia dinámica y siempre cambiante. Con su estilo artístico colorido y su comunidad activa, Fortnite ha ganado una gran popularidad en todo el mundo.\r\n\r\n5555555555555\r\n', 3),
(8, 'PLAYERUNKNOWN\'S BATTLEGROUNDS ', 'PUBG (PlayerUnknown\'s Battlegrounds) es un juego de batalla real desarrollado por PUBG Corporation. En este juego multijugador en línea, hasta 100 jugadores son lanzados en paracaídas en una isla y luchan entre sí para ser el último en pie. Los jugadores deben buscar armas, equipos y vehículos mientras exploran el mapa y evitan una zona de juego que se reduce con el tiempo. El objetivo es sobrevivir y eliminar a otros jugadores hasta convertirse en el ganador. PUBG ofrece una experiencia realista con una amplia variedad de armas y estrategias para adaptarse a diferentes estilos de juego. Con su tensión constante y acción intensa, PUBG se ha convertido en un juego popular en el género de batalla real.', 3),
(9, 'APEX LEGENDS', 'Apex Legends es un juego de batalla real desarrollado por Respawn Entertainment. En este juego multijugador en línea, los jugadores forman equipos de tres y se enfrentan en un mapa repleto de acción. Cada jugador elige un personaje con habilidades únicas que complementan el equipo. El objetivo principal es ser el último equipo en pie, mientras se saquea y combate contra otros jugadores. Apex Legends se destaca por su juego rápido y fluido, su estilo artístico futurista y su énfasis en el trabajo en equipo y la comunicación. Con constantes actualizaciones, nuevos personajes y eventos, Apex Legends ofrece una emocionante experiencia de batalla real.', 3),
(10, 'STARCRAFT 2', 'StarCraft 2 es un juego de estrategia en tiempo real desarrollado por Blizzard Entertainment. En este juego, los jugadores asumen el control de una de las tres razas: Terran, Zerg o Protoss. Cada raza tiene sus propias unidades y tecnologías únicas. El objetivo principal es construir una base, recolectar recursos, entrenar un ejército y derrotar a los oponentes en batallas estratégicas. StarCraft 2 cuenta con una campaña épica para un solo jugador, así como modos multijugador competitivos y cooperativos. Con su profunda jugabilidad, equilibrio estratégico y comunidad activa, StarCraft 2 es considerado uno de los mejores juegos de estrategia en tiempo real de todos los tiempos.', 4),
(11, 'AGE OF EMPIRES', 'Age of Empires (también conocido como Age of Empires I) es un videojuego de estrategia en tiempo real para computadoras personales, el primero de la serie homónima, lanzado el 26 de octubre de 1997 y escenificado en una línea del tiempo de 3000 años, desde la temprana Edad de piedra hasta la Edad del hierro. El jugador tiene opción de elegir entre 12 civilizaciones.\r\n\r\nSe pueden ver varios tipos de civilizaciones las cuales dependiendo de su elección le favorecerán ciertas estrategias, por la simple razón que cada una tiene bonificaciones particulares en el juego. ', 4),
(12, 'HEROES OF THE STORM', 'Héroes de la tormenta es un juego que gira en torno a un modo de combate cooperativo en línea de cinco contra cinco jugadores, operados a través de la página Battle.net, el servicio de juegos en línea de Blizzard. Los jugadores pueden elegir entre cinco modos de juego, que incluyen jugar contra héroes controlados por la computadora o contra otros jugadores. Cuando los jugadores inician el juego, solo pueden usar de seis a diez héroes proporcionados por la rotación de héroes libre, una lista seleccionada de forma metódica que cambia cada semana, pero mediante el uso de oro, una fuente en el juego de riqueza, o a través de microtransacciones, se puede tener acceso permanente a un héroe. ', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genre`
--

CREATE TABLE `genre` (
  `id_genre` int(11) NOT NULL,
  `name_genre` varchar(100) NOT NULL,
  `description_genre` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `genre`
--

INSERT INTO `genre` (`id_genre`, `name_genre`, `description_genre`) VALUES
(1, 'MOBA', 'Un MOBA, abreviatura de Multiplayer Online Battle Arena, es un subgénero de videojuegos de estrategia en tiempo real en el que dos equipos de jugadores, normalmente 5 jugadores por equipo compiten entre sí en un campo de Batalla predeterminada. Cada jugador controla un solo personaje con un conjunto de habilidades únicas que mejoran a medida que avanza el juego. Los jugadores también pueden mejora'),
(2, 'FPS', 'Un videojuego de disparos en primera persona o FPS (del inglés, first-person shooter) es un género de videojuegos que simula el uso de armas de fuego desde una perspectiva de primera persona. El género comparte rasgos comunes con otros juegos de disparos, que a su vez hacen que caiga bajo el título de juego de acción. Desde el inicio del género, los gráficos avanzados en 3D y pseudo-3D han desafia'),
(3, 'Battle Royale', 'En inglés, battle royale, algunas veces referido en español como batalla real,1?2?3? es un género de videojuegos que combina los elementos de un videojuego de supervivencia con la jugabilidad de un último jugador en pie. Los videojuegos tipo battle royale desafían a un grupo de jugadores, comenzando con un equipamiento mínimo, a que busquen armas y eliminen a otros oponentes, mientras evitan queda'),
(4, 'RTS', 'Los videojuegos de estrategia en tiempo real o RTS (siglas en inglés de real-time strategy) son videojuegos de estrategia en los que no hay turnos sino que el tiempo transcurre de forma continua para los jugadores.\r\n\r\nLos videojuegos en tiempo real son uno de los subgéneros de los juegos de estrategia más dinámicos que hay. Además, por regla general están más trabajados en el apartado gráfico, ya ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`) VALUES
(1, 'admin@admin.com', '123456');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id_game`),
  ADD KEY `game_genre` (`genre_id`);

--
-- Indices de la tabla `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `game`
--
ALTER TABLE `game`
  MODIFY `id_game` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_genre` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id_genre`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
