<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    DB::table('news') -> insert([
            [
                'new_id' => 1,
                'user_id' => 1,
                'title' => 'Una tiktoker muestra cómo ganar dinero creando libros infantiles con ChatGPT',
                'subtitle' => 'La tiktoker utiliza las herramientas de inteligencia artificial ChatGPT y Midjourney para crear libros infantiles.',
                'img' => 'tiktoker-gpt-libros.jpg',
                'imgDescription' => '10 Maneras de Dormir un Unicornio Libro Quesitas Editorial',
                'info' => '¿Quieres ganar dinero con ChatGPT? ¿Te apasiona la literatura y quieres utilizar la tecnología para escribir tu propio libro? Una usuaria de TikTok ha compartido un vídeo en su perfil sobre cómo ganar dinero creando libros infantiles con la inteligencia artificial (IA) de OpenAI.

                @lauranewstech explica que el primer paso es preguntarle a ChatGPT la temática y pedirle diez ideas de libros infantiles para colorear. Tras hacer las peticiones, la IA le muestra un listado de consejos, y una vez elegida la mejor alternativa, la tiktoker señala que el segundo paso consiste en abrir Midjourney para crear las imágenes.
                Para ello, @lauranewstech realiza el siguiente proceso: ',
                'link' => 'https://www.20minutos.es/tecnologia/inteligencia-artificial/tiktoker-muestra-como-ganar-dinero-creando-libros-infantiles-chatgpt-5118867/',
                'author' => 'Ana Higuera',
                'publishDate' => '2023-04-04'
            ],
            [
                'new_id' => 2,
                'user_id' => 2,
                'title' => 'Muere a los 93 años Juan Muñoz Martín, autor de clásicos infantiles como Fray Perico y su borrico, y El pirata Garrapata ',
                'subtitle' => 'El Ministerio de Cultura ha lamentado la muerte de Juan Muñoz y ha recordado que el pasado mes de diciembre recibió de manos de los reyes la Medalla de Oro al Mérito en las Bellas Artes 2021. ',
                'img' => 'juan-munoz-martin.jpg',
                'imgDescription' => 'Juan Munoz Martin Fallecimiento',
                'info' => 'El escritor Juan Muñoz Martín, autor de famosos libros infantiles y juveniles como Fray Perico y su borrico o El pirata Garrapata ha fallecido este lunes a los 93 años, según ha informado su familia a través de la cuenta oficial de Twitter de Muñoz.

                "Queridos lectores y alumnos de Juan Muñoz, tristemente os anunciamos su fallecimiento. Sus libros siempre nos harán recordar los mejores momentos de nuestra infancia, riendo con sus disparatadas historias. Deseamos que nuevos lectores le descubran. Le recordamos así de alegre", reza el mensaje.
                "En esta cuenta anunciaremos eventos o publicaciones que os puedan interesar del autor. Gracias a todos: lectores, libreros, profesores, padres, editoriales, periodistas y amigos del mundo del libro y la cultura que le habéis hecho tan feliz", han escrito después los responsables del perfil de Twitter.',
                'link' => 'https://www.20minutos.es/noticia/5104899/0/muere-juan-munoz-autor-de-libros-como-fray-perico-y-su-borrico-o-el-pirata-garrapata/',
                'author' => 'Ana Higuera',
                'publishDate' => '2023-02-27'
            ],[
                'new_id' => 3,
                'user_id' => 1,
                'title' => 'Lectura fácil para que todos los niños puedan navegar en Barco de Vapor: "La accesibilidad cognitiva es la gran asignatura pendiente"',
                'subtitle' => 'Barco de Vapor, la ya clásica colección de libros infantiles que, clasifica, a través de distintos colores, la edad de los lectores a los que van dirigidos sus libros. ',
                'img' => 'barco-de-vapor.jpg',
                'imgDescription' => 'Barco de vapor',
                'info' => 'Tiene como objetivo de que esta ya mítica colección sea accesible a cualquier niño, hace cinco años SM decidió introducirse en el mundo de la lectura fácil, que consiste, a grandes rasgos, en adaptar libros ya publicados para garantizar la accesibilidad a la información y la cultura a todas las personas, con independencia de sus capacidades. 
                De momento, la colección tiene catorce títulos de distintos niveles, pero el objetivo es ir ampliando la colección y sacar, al menos, dos títulos al año, como explican Iria Torres, editora de la colección y experta en lectura fácil, y Berta Márquez, gerente editorial de Literatura Infantil y Juvenil de la editorial. "Barco de Vapor es nuestro buque insignia, la que hemos leído todos desde que éramos pequeños, y queremos que su colección tenga un catálogo completo y representativo para todos, tanto en contenido como en forma, para todas las edades, de todos los géneros... Sólo nos faltaba la pata de lectura fácil para poder llegar a todos", cuenta Berta Márquez.',
                'link' => 'https://www.20minutos.es/noticia/5075065/0/asi-es-el-proyecto-de-lectura-facil-de-sm-con-esta-coleccion-queremos-hacer-accesible-el-barco-de-vapor-a-todos-los-ninos/',
                'author' => 'Merche Borja',
                'publishDate' => '2022-11-10'
            ],[
                'new_id' => 4,
                'user_id' => 2,
                'title' => 'Los adolescentes con familias lectoras leen seis libros más de media al año: "La escuela es crucial, pero también lo es aprender en casa',
                'subtitle' => 'Los adolescentes españoles leen, de media, unos 11 libros al año. Aproximadamente un tercio admite que casi todos los que leyó durante el último año fueron impuestos en la escuela',
                'img' => 'adolescentes-lectores-familias.jpg',
                'imgDescription' => 'Los adolescentes con familias lectoras',
                'info' => 'Son algunos de los resultados que se desprenden del estudio llevado a cabo por GoStudent para conocer en detalle los hábitos de lectura de 1.000 adolescentes y estudiantes de secundaria encuestados en el mes de abril de este año. 

                El estudio, llevado a cabo con motivo del Día Internacional del Libro, reafirma un dato que bien podría extenderse a los adultos y que se ha ido reflejando también en distintos barómetros durante el último año: el 65% de los adolescentes admite leer más desde la irrupción de la pandemia. Por ahora, no parece que el auge de los videojuegos, los teléfonos móviles y las redes sociales estén afectando de manera exagerada en el consumo de libros, aunque la media española -11 libros al año- sí que sea menor a la europea (13,5).  ',
                'link' => 'https://www.20minutos.es/noticia/4989347/0/habitos-lectura-adolescentes-espana-familiares-escuela-importantes/',
                'author' => 'Elena Omedes',
                'publishDate' => '2022-04-23'
            ],[
                'new_id' => 5,
                'user_id' => 1,
                'title' => 'La alta sensibilidad, sobre todo en el caso de los niños, puede confundirse con introversión, susceptibilidad o rebeldía',
                'subtitle' => 'Según la Asociación de Profesionales de la Alta Sensibilidad entre un 15% y un 30% de la población humana presenta una mayor actividad de procesamiento sensorial',
                'img' => 'ninos-procesamiento-sesorial.jpg',
                'imgDescription' => 'Niños alta sensibilidad',
                'info' => 'Es un rasgo de la personalidad poco divulgado. Este es uno de los motivos principales por el que la psicóloga y escritora Susanna Isern ha decidido abordarlo en su nuevo libro: La armadura de Hugo (Beascoa, 2022).

                El nuevo álbum ilustrado de una de las autoras de referencia de la literatura infantil contemporánea - títulos de cabecera como El gran libro de los superpoderes, Daniela Pirata o La bruja que no quería ser princesa son también suyos- narra la historia de Hugo, uno de tantos niños con una sensibilidad extraordinaria. Para la especialista acompañar debidamente a estos niños es fundamental por lo que también es prioritario que sus padres y su entorno en general sepa identificar y reconocer este rasgo. ',
                'link' => 'https://www.20minutos.es/salud/familia/la-alta-sensibilidad-sobre-todo-en-el-caso-de-los-ninos-puede-confundirse-con-introversion-susceptibilidad-o-rebeldia-4955768/',
                'author' => 'Nani Cores',
                'publishDate' => '2022-02-14'
            ],[
                'new_id' => 6,
                'user_id' => 2,
                'title' => '"El Principito", 80 años de un clásico universal que aún conquista a mayores y pequeños
                ',
                'subtitle' => 'Este abril se celebra el 80.º aniversario de la obra de Antoine de Saint-Exupéry, y Salamandra lanza cuatro libros.',
                'img' => 'novedad-principito.jpg',
                'imgDescription' => '80 años del principito',
                'info' => 'Este abril se celebra su 80.º aniversario, y Salamandra, su editorial en español desde principios de los cincuenta, lanza cuatro libros: El Principito. ¿Dónde estás, Zorro? Un libro interactivo, recomendado a partir de los 3 años; El Principito en edición bilingüe en inglés (español y catalán); una agenda escolar (prevista para julio) y una edición troquelada rotatoria para Navidad que verá la luz en noviembre.

                Es de esperar que esta fábula narrada en tono poético desate en la efeméride una auténtica principitomanía. "El tirón no decae, cada año se vende el mismo número de ejemplares. El Principito es más que un libro, es un universo. En Salamandra, ya tenemos la versión en francés, la idea es ofrecer esta herramienta en inglés a los profesores. El formato que más se vende es el escolar", nos cuenta por teléfono Laia Zamarrón, directora literaria de Salamandra.',
                'link' => 'https://www.20minutos.es/noticia/5123028/0/80-anos-de-el-principito-un-clasico-universal-de-mayores-y-pequenos/',
                'author' => 'María Ovelar',
                'publishDate' => '2023-04-28'
            ],[
                'new_id' => 7,
                'user_id' => 1,
                'title' => 'Miguel Alayrach, escritor: "Hace falta pedagogía sobre inclusión y diversidad, pero más dirigida a los adultos que a los menores"',
                'subtitle' => 'Miguel Alayrach es el autor de "¿Y si nuestro hermanito Laconcito no es un cerdito?", un álbum ilustrado infantil en el que uno de los protagonistas "cerditos" tiene autismo. ',
                'img' => 'miguel-alayrach.jpg',
                'imgDescription' => 'Miguel Alayrach',
                'info' => 'Licenciado en periodismo y documentación, después de trabajar en varios medios de comunicación, Miguel Alayrach ha decidido dedicar su vida a la escritura, tanto de relatos como de literatura infantil, una especialidad en la que lleva publicados más de una veintena de cuentos, entre los que destacan Jo… ¡siempre lo mismo!, La revolución de los animales feos, Álex y el misterioso Clokin, ¡Yo no pienso así! (2015) y El pet volador (2018). Todos ellos tienen un denominador común, trasmitir valores como la amistad, el respeto y la solidarias, valores que podemos identificar en ¿Y si nuestro hermanito Laconcito no es un cerdito?, un álbum ilustrado infantil que trasmite a los más pequeños la idea de poner en valor el cariño, en este caso fraternal, por encima de cualquier opinión externa.',
                'link' => 'https://www.20minutos.es/noticia/5120581/0/miguel-alayrach-escritor-hace-falta-pedagogia-sobre-inclusion-y-diversidad-pero-mas-dirigida-a-los-adultos-que-a-los-menores/',
                'author' => 'Merche Borja',
                'publishDate' => '2023-04-23'
            ],[
                'new_id' => 8,
                'user_id' => 2,
                'title' => 'Un escritor analiza el libro infantil más leído por los niños españoles: "Es una obra de orfebrería"',
                'subtitle' => '"El pollo pepe" cuenta actualmente con casi treinta ediciones en castellano. ',
                'img' => 'pollito-pepe-novedad.jpg',
                'imgDescription' => 'Análisis a Pollo Pepe',
                'info' => 'El novelista,Jorge Corrales, que también es padre, ha querido dedicarle un hilo en su perfil de la red social "Twitter" para hablar sobre el libro que ha conseguido atraer a millones de niños en España. Porque, aunque los padres lo consideran "una chorrada", como ha asegurado, lo cierto es que no deja de sorprender a los más pequeños.

                El formato de la obra se basa en la repetición de una misma estructura a modo de introducción de Pop-ups. Precisamente esa es la fórmula de su éxito. Como el autor ha asegurado, el libro consigue crear suspense para que los niños no dejen de presentar atención a la obra. 
                El hilo cuenta ya con más de 500.000 reproducciones y ha conseguido atraer a miles de autores y padres que han dado sus opiniones sobre la aventura de Pepe y la literatura infantil en general. No han sido pocos los que han alabado las palabras de Corrales, aunque otros han optado por hablar de los libros que a sus hijos "vuelven locos". ',
                'link' => 'https://www.20minutos.es/gonzoo/noticia/5105872/0/un-escritor-analiza-el-libro-infantil-mas-leido-por-los-ninos-espanoles-el-pollo-pepe-es-una-obra-de-orfebreria/',
                'author' => 'Ana Higuera',
                'publishDate' => '2023-04-04'
            ]
        ]);
    }
}
