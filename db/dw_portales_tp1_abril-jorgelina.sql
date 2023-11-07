-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2023 a las 01:55:29
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dw_portales_tp1_abril-jorgelina`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `books`
--

CREATE TABLE `books` (
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publishDate` date NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `synopsis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pages` int(10) UNSIGNED NOT NULL,
  `language` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `editorial` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `books`
--

INSERT INTO `books` (`book_id`, `title`, `publishDate`, `price`, `synopsis`, `pages`, `language`, `editorial`, `author`, `img`, `img_description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Amigos', '2020-10-02', 5000, '\"Amigos\" es una cautivadora historia escrita por Emily Bannister y Ana Sanfelippo que nos sumerge en el mundo de la amistad y la superación. La trama gira en torno a Laura y Sofía, dos chicas de diferentes orígenes y personalidades que se encuentran en el colegio y, a pesar de sus diferencias, establecen un vínculo especial. Juntas, descubren el valor de la empatía, el apoyo mutuo y la importancia de aceptar a los demás tal como son. A medida que enfrentan desafíos y adversidades, Laura y Sofía aprenden que la verdadera amistad puede trascender las diferencias y ayudar a construir un mundo más inclusivo y amoroso.\r\n\r\nCon una narrativa conmovedora y personajes entrañables, \"Amigos\" nos invita a reflexionar sobre la importancia de la amistad en nuestras vidas y cómo puede influir en nuestro crecimiento personal. A través de sus páginas, los lectores experimentarán una montaña rusa de emociones mientras acompañan a Laura y Sofía en su viaje de descubrimiento y comprensión. Este libro nos recuerda que la verdadera amistad no conoce barreras y puede convertirse en un faro de luz en los momentos más oscuros.', 32, 'Español', 'Lecturita', 'Emily Bannister y Ana Sanfelippo.', 'amigos-libro.jpg', 'Amigos Libro Quesitas Editorial', '2023-05-17 07:32:58', '2023-05-22 01:48:17', NULL),
(2, 'El Principito', '2016-08-13', 6000, 'Viví así, solo, sin nadie con quien hablar verdaderamente, hasta que tuve una avería en el desierto del Sahara, hace seis años. Algo se había roto en mi motor. Y como no tenía conmigo ni mecánico ni pasajeros, me dispuse a realizar, solo, una reparación difícil. Era, para mí, cuestión de vida o muerte. Tenía agua apenas para ocho días. La primera noche dormí sobre la arena a mil millas de todatierra habitada. Estaba más aislado que un náufrago sobre una balsa en medio del océano. Imaginaos, pues, mi sorpresa cuando, al romper el día, me despertó una extraña vocecita que decía: -Por favor..., ¡dibújame un cordero! -¿Eh!? -Dibújame un cordero...', 96, 'Español', 'Salamandra', 'Antoine De Saint-Exupery', '20230521224650_el-principito.jpg', 'El Principito Libro Quesitas Editorial', '2023-05-17 07:32:58', '2023-05-22 01:46:50', NULL),
(3, 'Para Crecer Felices', '2021-06-10', 4500, 'Como familia, la crianza nos presenta nuevos retos cada día: el sueño, el pañal, la llegada de un nuevo hermano, las frustraciones, los miedos... ¿Qué mejor manera de afrontarlos que desde el respeto, la empatía y la consciencia? Con cuentos para los niños y explicaciones para los padres, este precioso libro de la autora del conocido blog Pequefelicidad los ayudará a crecer juntos a partir de los principios de la filosofía Montessori y la crianza respetuosa.', 96, 'Español', 'Nube De Tinta', 'Marta Prada', '20230521224948_para-crecer-felices.jpg', 'Para Crecer Felices Libro Quesitas Editorial', '2023-05-17 07:32:58', '2023-05-22 01:49:48', NULL),
(4, 'Voy al Baño', '2020-04-01', 4500, 'Un cuento para acompañar el pasaje de los pañales a la pelela y el inodoro. Narrado desde la perspectiva infantil; ayuda a entender las señales del propio cuerpo y a adquirir hábitos saludables. Ayuda a niñas y niños en el camino del crecimiento; que puede generar temores; pero también mucha alegría.¡Crecer no es tarea sencilla! Esta colección fue pensada para brindar herramientas a las familias; entendiendo que cada niño y cada niña crecerán a sus propios tiempos; pero siempre de nuestra mano.', 36, 'Español', 'El Ateneo', 'Carolina Mora', '20230521225104_voy-al-bano.jpg', 'Voy al Baño Libro Quesitas Editorial', '2023-05-17 07:32:58', '2023-05-22 01:51:04', NULL),
(5, 'Diario para mentes revoltosas', '2023-01-18', 3400, 'Diario para mentes revoltosas te ayuda a explorar el órgano más maravilloso que existe: ¡tu cerebro!, y a conocer todo lo que hay en tu cabeza para que puedas entender mejor por qué sentís lo que sentís, cuáles son las emociones que están más presentes en tu vida y por qué a veces reaccionamos sin pensar. De la mano de las neurociencias y con muchos espacios para expresar tus ideas, objetivos, miedos y sueños, podrás saber cómo funciona tu mente, comprender y regular tus emociones, bucear en tus pensamientos, y encontrar atajos para cambiar las cosas que no te hacen bien ¡y sentirte un campeón o una campeona!', 144, 'Español', 'Planeta Junior', 'María Roca y Amelia Sola', '20230521225314_diario-para-mentes-revoltosas.jpg', 'Diario para mentes revoltosas Quesitas Editorial', '2023-05-17 07:32:58', '2023-05-22 01:53:14', NULL),
(6, 'Libro Prueba', '2023-05-18', 1254, 'fdsfsafa\r\n            fdsfsdfsdfsfsd', 45, NULL, 'dfsdfsfds', 'dfssfsfds', NULL, 'fdsfs', '2023-05-17 09:15:25', '2023-05-17 09:19:28', '2023-05-17 09:19:28'),
(8, 'dsads', '2023-05-31', 432, 'fdfdsfdsfsdfdsfsdfdsfds', 32, 'fsdfsdfsd', 'fdsfdsfdsfs', 'fdsfdsfsdfs', NULL, 'dsdsa', '2023-05-17 09:28:14', '2023-05-19 00:13:52', '2023-05-19 00:13:52'),
(9, 'fdsfdsfds', '2023-05-10', 543545, 'dfsfdsfdsfsfsfdsfdsfsd', 15, 'fdsfdsfds', 'fsdfdsfds', 'fdsfdfds', NULL, 'fdsfdsfdsfds', '2023-05-18 05:11:37', '2023-05-21 23:09:49', '2023-05-21 23:09:49'),
(10, 'Alicia y el cerebro maravilloso', '2023-06-02', 6500, '\"Alicia y el cerebro maravilloso\" es una fascinante obra que combina la magia de \"Alicia en el país de las maravillas\" con la ciencia del cerebro y la neurociencia. En esta historia, Alicia se sumerge en un viaje intrincado y emocionante a través de su propio cerebro, donde se encuentra con personajes peculiares y se enfrenta a desafíos cognitivos. A medida que explora las diversas regiones de su mente, Alicia descubre la importancia de la memoria, la atención, la creatividad y la resiliencia, aprendiendo valiosas lecciones sobre cómo funciona su propio pensamiento y cómo aprovechar al máximo su potencial cerebral.\r\n\r\nCon una narrativa imaginativa y educativa, \"Alicia y el cerebro maravilloso\" nos sumerge en un mundo de maravillas y conocimientos científicos. A través de la mezcla de la fantasía y la realidad, los autores nos invitan a explorar la complejidad y la belleza del cerebro humano, brindándonos una perspectiva única sobre cómo nuestras mentes dan forma a nuestras experiencias y cómo podemos aprovechar al máximo nuestro potencial intelectual. Esta obra cautivadora nos enseña no solo sobre la ciencia del cerebro, sino también sobre la importancia de la imaginación, la curiosidad y la autodescubrimiento en nuestro viaje hacia el conocimiento y la comprensión de nosotros mismos.', 32, 'Español', 'Beascoa', 'Nazareth Castellanos.', '20230521222540_alicia-y-el-cerebro-maravilloso.jpg', 'Portada del libro \"Alicia y el cerebro maravilloso\"', '2023-05-21 23:09:12', '2023-05-22 01:54:34', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `books_have_genres`
--

CREATE TABLE `books_have_genres` (
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `genre_id` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `books_have_genres`
--

INSERT INTO `books_have_genres` (`book_id`, `genre_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-05-17 07:32:58', '2023-05-17 07:32:58'),
(1, 5, '2023-05-17 07:32:58', '2023-05-17 07:32:58'),
(2, 2, '2023-05-17 07:32:58', '2023-05-17 07:32:58'),
(2, 3, '2023-05-17 07:32:58', '2023-05-17 07:32:58'),
(3, 4, '2023-05-17 07:32:58', '2023-05-17 07:32:58'),
(3, 6, '2023-05-17 07:32:58', '2023-05-17 07:32:58'),
(4, 4, '2023-05-17 07:32:58', '2023-05-17 07:32:58'),
(4, 6, '2023-05-17 07:32:58', '2023-05-17 07:32:58'),
(5, 5, '2023-05-17 07:32:58', '2023-05-17 07:32:58'),
(5, 6, '2023-05-17 07:32:58', '2023-05-17 07:32:58'),
(8, 1, NULL, NULL),
(8, 3, NULL, NULL),
(9, 1, NULL, NULL),
(9, 2, NULL, NULL),
(10, 1, NULL, NULL),
(10, 3, NULL, NULL),
(10, 2, NULL, NULL),
(10, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genres`
--

CREATE TABLE `genres` (
  `genre_id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `genres`
--

INSERT INTO `genres` (`genre_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Aventura', '2023-05-17 07:32:58', '2023-05-17 07:32:58'),
(2, 'Fábula', '2023-05-17 07:32:58', '2023-05-17 07:32:58'),
(3, 'Fantasía', '2023-05-17 07:32:58', '2023-05-17 07:32:58'),
(4, 'Aprendizaje/Educación', '2023-05-17 07:32:58', '2023-05-17 07:32:58'),
(5, 'Humor', '2023-05-17 07:32:58', '2023-05-17 07:32:58'),
(6, 'Informativos', '2023-05-17 07:32:58', '2023-05-17 07:32:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_04_30_210521_create_books_table', 1),
(7, '2023_04_30_210658_create_news_table', 1),
(8, '2023_05_13_005416_add_deleted_at_column_to_books_table', 1),
(9, '2023_05_13_233400_create_usuarios_table', 1),
(10, '2023_05_17_033224_create_genres_table', 1),
(11, '2023_05_17_033440_create_books_have_genres_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `news`
--

CREATE TABLE `news` (
  `new_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imgDescription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publishDate` date NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `news`
--

INSERT INTO `news` (`new_id`, `title`, `subtitle`, `img`, `imgDescription`, `info`, `author`, `publishDate`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Una tiktoker muestra cómo ganar dinero creando libros infantiles con ChatGPT', 'La tiktoker utiliza las herramientas de inteligencia artificial ChatGPT y Midjourney para crear libros infantiles.', 'tiktoker-gpt-libros.jpg', '10 Maneras de Dormir un Unicornio Libro Quesitas Editorial', '¿Quieres ganar dinero con ChatGPT? ¿Te apasiona la literatura y quieres utilizar la tecnología para escribir tu propio libro? Una usuaria de TikTok ha compartido un vídeo en su perfil sobre cómo ganar dinero creando libros infantiles con la inteligencia artificial (IA) de OpenAI.\n\n                @lauranewstech explica que el primer paso es preguntarle a ChatGPT la temática y pedirle diez ideas de libros infantiles para colorear. Tras hacer las peticiones, la IA le muestra un listado de consejos, y una vez elegida la mejor alternativa, la tiktoker señala que el segundo paso consiste en abrir Midjourney para crear las imágenes.\n                Para ello, @lauranewstech realiza el siguiente proceso: ', 'Ana Higuera', '2023-04-04', 'https://www.20minutos.es/tecnologia/inteligencia-artificial/tiktoker-muestra-como-ganar-dinero-creando-libros-infantiles-chatgpt-5118867/', NULL, NULL),
(2, 'Muere a los 93 años Juan Muñoz Martín, autor de clásicos infantiles como Fray Perico y su borrico, y El pirata Garrapata ', 'El Ministerio de Cultura ha lamentado la muerte de Juan Muñoz y ha recordado que el pasado mes de diciembre recibió de manos de los reyes la Medalla de Oro al Mérito en las Bellas Artes 2021. ', 'juan-munoz-martin.jpg', 'Juan Munoz Martin Fallecimiento', 'El escritor Juan Muñoz Martín, autor de famosos libros infantiles y juveniles como Fray Perico y su borrico o El pirata Garrapata ha fallecido este lunes a los 93 años, según ha informado su familia a través de la cuenta oficial de Twitter de Muñoz.\n\n                \"Queridos lectores y alumnos de Juan Muñoz, tristemente os anunciamos su fallecimiento. Sus libros siempre nos harán recordar los mejores momentos de nuestra infancia, riendo con sus disparatadas historias. Deseamos que nuevos lectores le descubran. Le recordamos así de alegre\", reza el mensaje.\n                \"En esta cuenta anunciaremos eventos o publicaciones que os puedan interesar del autor. Gracias a todos: lectores, libreros, profesores, padres, editoriales, periodistas y amigos del mundo del libro y la cultura que le habéis hecho tan feliz\", han escrito después los responsables del perfil de Twitter.', 'Ana Higuera', '2023-02-27', 'https://www.20minutos.es/noticia/5104899/0/muere-juan-munoz-autor-de-libros-como-fray-perico-y-su-borrico-o-el-pirata-garrapata/', NULL, NULL),
(3, 'Lectura fácil para que todos los niños puedan navegar en Barco de Vapor: \"La accesibilidad cognitiva es la gran asignatura pendiente\"', 'Barco de Vapor, la ya clásica colección de libros infantiles que, clasifica, a través de distintos colores, la edad de los lectores a los que van dirigidos sus libros. ', 'barco-de-vapor.jpg', 'Barco de vapor', 'Tiene como objetivo de que esta ya mítica colección sea accesible a cualquier niño, hace cinco años SM decidió introducirse en el mundo de la lectura fácil, que consiste, a grandes rasgos, en adaptar libros ya publicados para garantizar la accesibilidad a la información y la cultura a todas las personas, con independencia de sus capacidades. \n                De momento, la colección tiene catorce títulos de distintos niveles, pero el objetivo es ir ampliando la colección y sacar, al menos, dos títulos al año, como explican Iria Torres, editora de la colección y experta en lectura fácil, y Berta Márquez, gerente editorial de Literatura Infantil y Juvenil de la editorial. \"Barco de Vapor es nuestro buque insignia, la que hemos leído todos desde que éramos pequeños, y queremos que su colección tenga un catálogo completo y representativo para todos, tanto en contenido como en forma, para todas las edades, de todos los géneros... Sólo nos faltaba la pata de lectura fácil para poder llegar a todos\", cuenta Berta Márquez.', 'Merche Borja', '2022-11-10', 'https://www.20minutos.es/noticia/5075065/0/asi-es-el-proyecto-de-lectura-facil-de-sm-con-esta-coleccion-queremos-hacer-accesible-el-barco-de-vapor-a-todos-los-ninos/', NULL, NULL),
(4, 'Los adolescentes con familias lectoras leen seis libros más de media al año: \"La escuela es crucial, pero también lo es aprender en casa', 'Los adolescentes españoles leen, de media, unos 11 libros al año. Aproximadamente un tercio admite que casi todos los que leyó durante el último año fueron impuestos en la escuela', 'adolescentes-lectores-familias.jpg', 'Los adolescentes con familias lectoras', 'Son algunos de los resultados que se desprenden del estudio llevado a cabo por GoStudent para conocer en detalle los hábitos de lectura de 1.000 adolescentes y estudiantes de secundaria encuestados en el mes de abril de este año. \n\n                El estudio, llevado a cabo con motivo del Día Internacional del Libro, reafirma un dato que bien podría extenderse a los adultos y que se ha ido reflejando también en distintos barómetros durante el último año: el 65% de los adolescentes admite leer más desde la irrupción de la pandemia. Por ahora, no parece que el auge de los videojuegos, los teléfonos móviles y las redes sociales estén afectando de manera exagerada en el consumo de libros, aunque la media española -11 libros al año- sí que sea menor a la europea (13,5).  ', 'Elena Omedes', '2022-04-23', 'https://www.20minutos.es/noticia/4989347/0/habitos-lectura-adolescentes-espana-familiares-escuela-importantes/', NULL, NULL),
(5, 'La alta sensibilidad, sobre todo en el caso de los niños, puede confundirse con introversión, susceptibilidad o rebeldía', 'Según la Asociación de Profesionales de la Alta Sensibilidad entre un 15% y un 30% de la población humana presenta una mayor actividad de procesamiento sensorial', 'ninos-procesamiento-sesorial.jpg', 'Niños alta sensibilidad', 'Es un rasgo de la personalidad poco divulgado. Este es uno de los motivos principales por el que la psicóloga y escritora Susanna Isern ha decidido abordarlo en su nuevo libro: La armadura de Hugo (Beascoa, 2022).\n\n                El nuevo álbum ilustrado de una de las autoras de referencia de la literatura infantil contemporánea - títulos de cabecera como El gran libro de los superpoderes, Daniela Pirata o La bruja que no quería ser princesa son también suyos- narra la historia de Hugo, uno de tantos niños con una sensibilidad extraordinaria. Para la especialista acompañar debidamente a estos niños es fundamental por lo que también es prioritario que sus padres y su entorno en general sepa identificar y reconocer este rasgo. ', 'Nani Cores', '2022-02-14', 'https://www.20minutos.es/salud/familia/la-alta-sensibilidad-sobre-todo-en-el-caso-de-los-ninos-puede-confundirse-con-introversion-susceptibilidad-o-rebeldia-4955768/', NULL, NULL),
(6, '\"El Principito\", 80 años de un clásico universal que aún conquista a mayores y pequeños\n                ', 'Este abril se celebra el 80.º aniversario de la obra de Antoine de Saint-Exupéry, y Salamandra lanza cuatro libros.', 'novedad-principito.jpg', '80 años del principito', 'Este abril se celebra su 80.º aniversario, y Salamandra, su editorial en español desde principios de los cincuenta, lanza cuatro libros: El Principito. ¿Dónde estás, Zorro? Un libro interactivo, recomendado a partir de los 3 años; El Principito en edición bilingüe en inglés (español y catalán); una agenda escolar (prevista para julio) y una edición troquelada rotatoria para Navidad que verá la luz en noviembre.\n\n                Es de esperar que esta fábula narrada en tono poético desate en la efeméride una auténtica principitomanía. \"El tirón no decae, cada año se vende el mismo número de ejemplares. El Principito es más que un libro, es un universo. En Salamandra, ya tenemos la versión en francés, la idea es ofrecer esta herramienta en inglés a los profesores. El formato que más se vende es el escolar\", nos cuenta por teléfono Laia Zamarrón, directora literaria de Salamandra.', 'María Ovelar', '2023-04-28', 'https://www.20minutos.es/noticia/5123028/0/80-anos-de-el-principito-un-clasico-universal-de-mayores-y-pequenos/', NULL, NULL),
(7, 'Miguel Alayrach, escritor: \"Hace falta pedagogía sobre inclusión y diversidad, pero más dirigida a los adultos que a los menores\"', 'Miguel Alayrach es el autor de \"¿Y si nuestro hermanito Laconcito no es un cerdito?\", un álbum ilustrado infantil en el que uno de los protagonistas \"cerditos\" tiene autismo. ', 'miguel-alayrach.jpg', 'Miguel Alayrach', 'Licenciado en periodismo y documentación, después de trabajar en varios medios de comunicación, Miguel Alayrach ha decidido dedicar su vida a la escritura, tanto de relatos como de literatura infantil, una especialidad en la que lleva publicados más de una veintena de cuentos, entre los que destacan Jo… ¡siempre lo mismo!, La revolución de los animales feos, Álex y el misterioso Clokin, ¡Yo no pienso así! (2015) y El pet volador (2018). Todos ellos tienen un denominador común, trasmitir valores como la amistad, el respeto y la solidarias, valores que podemos identificar en ¿Y si nuestro hermanito Laconcito no es un cerdito?, un álbum ilustrado infantil que trasmite a los más pequeños la idea de poner en valor el cariño, en este caso fraternal, por encima de cualquier opinión externa.', 'Merche Borja', '2023-04-23', 'https://www.20minutos.es/noticia/5120581/0/miguel-alayrach-escritor-hace-falta-pedagogia-sobre-inclusion-y-diversidad-pero-mas-dirigida-a-los-adultos-que-a-los-menores/', NULL, NULL),
(8, 'Un escritor analiza el libro infantil más leído por los niños españoles: \"Es una obra de orfebrería\"', '\"El pollo pepe\" cuenta actualmente con casi treinta ediciones en castellano.', '20230521234112_un-escritor-analiza-el-libro-infantil-mas-leido-por-los-ninos-espanoles-es-una-obra-de-orfebreria.jpg', 'Análisis a Pollo Pepe', 'El novelista,Jorge Corrales, que también es padre, ha querido dedicarle un hilo en su perfil de la red social \"Twitter\" para hablar sobre el libro que ha conseguido atraer a millones de niños en España. Porque, aunque los padres lo consideran \"una chorrada\", como ha asegurado, lo cierto es que no deja de sorprender a los más pequeños.\r\n\r\n                El formato de la obra se basa en la repetición de una misma estructura a modo de introducción de Pop-ups. Precisamente esa es la fórmula de su éxito. Como el autor ha asegurado, el libro consigue crear suspense para que los niños no dejen de presentar atención a la obra. \r\n                El hilo cuenta ya con más de 500.000 reproducciones y ha conseguido atraer a miles de autores y padres que han dado sus opiniones sobre la aventura de Pepe y la literatura infantil en general. No han sido pocos los que han alabado las palabras de Corrales, aunque otros han optado por hablar de los libros que a sus hijos \"vuelven locos\".', 'Ana Higuera', '2023-04-04', 'https://www.20minutos.es/gonzoo/noticia/5105872/0/un-escritor-analiza-el-libro-infantil-mas-leido-por-los-ninos-espanoles-el-pollo-pepe-es-una-obra-de-orfebreria/', NULL, '2023-05-22 02:41:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`user_id`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'abril1@gmail.com', '$2y$10$TL1tQjKFD.USJF7uOwxyA.YtCLuAD/GBRzGeYDqfddX7wRAbR4HIC', NULL, NULL, '2023-05-17 07:32:59', '2023-05-17 07:32:59'),
(3, 'jorpestalardo@gmail.com', '$2y$10$TL1tQjKFD.USJF7uOwxyA.YtCLuAD/GBRzGeYDqfddX7wRAbR4HIC', NULL, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indices de la tabla `books_have_genres`
--
ALTER TABLE `books_have_genres`
  ADD KEY `books_have_genres_book_id_foreign` (`book_id`),
  ADD KEY `books_have_genres_genre_id_foreign` (`genre_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`new_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `usuarios_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `books`
--
ALTER TABLE `books`
  MODIFY `book_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `genres`
--
ALTER TABLE `genres`
  MODIFY `genre_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `news`
--
ALTER TABLE `news`
  MODIFY `new_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `books_have_genres`
--
ALTER TABLE `books_have_genres`
  ADD CONSTRAINT `books_have_genres_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`),
  ADD CONSTRAINT `books_have_genres_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`genre_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
