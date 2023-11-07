<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Para insertar registros en nuestras tablas, se puede usar la clase de Laravel: 
        DB::table('books')->insert([
            [
                'book_id' => 1,
                'user_id' => 1,
                'title' => 'Amigos',
                'publishDate' => '2020-10-02',
                'price' => 500000,
                'synopsis' => 'Vengan a ver qué linda celebración: muchos amigos dentro del corazón.',
                'pages'=> 32,
                'language'=> 'Español',
                'editorial'=> 'Lecturita',
                'author'=> 'Emily Bannister y Ana Sanfelippo.',
                'img' => 'amigos-libro.jpg',
                'img_description' => 'Amigos Libro Quesitas Editorial',
                // now() es una función que retorna la fecha y hora actual
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'book_id' => 2,
                'user_id' => 1,
                'title' => 'El Principito',
                'publishDate' => '2016-08-13',
                'price' => 600000,
                'synopsis' => 'Viví así, solo, sin nadie con quien hablar verdaderamente, hasta que tuve una avería en el desierto del Sahara, hace seis años. Algo se había roto en mi motor. Y como no tenía conmigo ni mecánico ni pasajeros, me dispuse a realizar, solo, una reparación difícil. Era, para mí, cuestión de vida o muerte. Tenía agua apenas para ocho días. La primera noche dormí sobre la arena a mil millas de todatierra habitada. Estaba más aislado que un náufrago sobre una balsa en medio del océano. Imaginaos, pues, mi sorpresa cuando, al romper el día, me despertó una extraña vocecita que decía: -Por favor..., ¡dibújame un cordero! -¿Eh!? -Dibújame un cordero...',
                'pages'=> 96,
                'language'=> 'Español',
                'editorial'=> 'Salamandra',
                'author'=> 'Antoine De Saint-Exupery',
                'img' => 'el-principito-libro.jpg',                
                'img_description' => 'El Principito Libro Quesitas Editorial',
                // now() es una función que retorna la fecha y hora actual
                'created_at' => now(),
                'updated_at' => now(),


            ],
            [
                'book_id' => 3,
                'user_id' => 1,
                'title' => 'Para Crecer Felices',
                'publishDate' => '2021-06-10',
                'price' => 450000,
                'synopsis' => 'Como familia, la crianza nos presenta nuevos retos cada día: el sueño, el pañal, la llegada de un nuevo hermano, las frustraciones, los miedos... ¿Qué mejor manera de afrontarlos que desde el respeto, la empatía y la consciencia? Con cuentos para los niños y explicaciones para los padres, este precioso libro de la autora del conocido blog Pequefelicidad los ayudará a crecer juntos a partir de los principios de la filosofía Montessori y la crianza respetuosa.',
                'pages'=> 96,
                'language'=> 'Español',
                'editorial'=> 'Nube De Tinta',
                'author'=> 'Marta Prada',
                'img' => 'para-crecer-felices.jpg',
                'img_description' => 'Para Crecer Felices Libro Quesitas Editorial',
                // now() es una función que retorna la fecha y hora actual
                'created_at' => now(),
                'updated_at' => now(),


            ],
            [
                'book_id' => 4,
                'user_id' => 1,
                'title' => 'Voy al Baño',
                'publishDate' => '2020-04-01',
                'price' => 450000,
                'synopsis' => 'Un cuento para acompañar el pasaje de los pañales a la pelela y el inodoro. Narrado desde la perspectiva infantil; ayuda a entender las señales del propio cuerpo y a adquirir hábitos saludables. Ayuda a niñas y niños en el camino del crecimiento; que puede generar temores; pero también mucha alegría.¡Crecer no es tarea sencilla! Esta colección fue pensada para brindar herramientas a las familias; entendiendo que cada niño y cada niña crecerán a sus propios tiempos; pero siempre de nuestra mano.',
                'pages'=> 36,
                'language'=> 'Español',
                'editorial'=> 'El Ateneo',
                'author'=> 'Carolina Mora',
                'img' => 'voy-al-bano-libro.jpg',
                'img_description' => 'Voy al Baño Libro Quesitas Editorial',
                'created_at' => now(),
                'updated_at' => now(),


            ],
            [
                'book_id' => 5,
                'user_id' => 1,
                'title' => 'Diario para mentes revoltosas',
                'publishDate' => '2023-01-18',
                'price' => 340000,
                'synopsis' => 'Diario para mentes revoltosas te ayuda a explorar el órgano más maravilloso que existe: ¡tu cerebro!, y a conocer todo lo que hay en tu cabeza para que puedas entender mejor por qué sentís lo que sentís, cuáles son las emociones que están más presentes en tu vida y por qué a veces reaccionamos sin pensar. De la mano de las neurociencias y con muchos espacios para expresar tus ideas, objetivos, miedos y sueños, podrás saber cómo funciona tu mente, comprender y regular tus emociones, bucear en tus pensamientos, y encontrar atajos para cambiar las cosas que no te hacen bien ¡y sentirte un campeón o una campeona!',
                'pages'=> 144,
                'language'=> 'Español',
                'editorial'=> 'Planeta Junior',
                'author'=> 'María Roca y Amelia Sola',
                'img' => 'diario-para-mentes-revoltosas.jpg',
                'img_description' => 'Diario para mentes revoltosas Quesitas Editorial',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_id' => 6,
                'user_id' => 1,
                'title' => 'Alicia y el cerebro maravilloso',
                'publishDate' => '2023-01-18',
                'price' => 340000,
                'synopsis' => 'Acompañada por un pensamiento positivo, Alicia se aventuró a explorar los recovecos de su mente, donde se encontró con desafíos y obstáculos que representaban sus miedos y preocupaciones. Con ingenio y valentía, aprendió a superar estos obstáculos, descubriendo la importancia de la autoconfianza y la determinación.
                A medida que avanzaba en su viaje, Alicia se dio cuenta de la importancia de la creatividad, la empatía y el amor propio en la formación de su propio cerebro. Finalmente, después de superar varios desafíos, Alicia regresó al mundo exterior con un nuevo entendimiento de sí misma y una mente más fuerte y positiva.
                "Alicia y el Cerebro Maravilloso" es una historia que inspira a los niños a explorar su propio potencial, a enfrentar sus miedos y a nutrir pensamientos positivos y saludables en sus mentes. Les enseña que, como Alicia, pueden superar desafíos y crecer en confianza mientras exploran el maravilloso mundo de su imaginación y su mente.',
                'pages'=> 351,
                'language'=> 'Español',
                'editorial'=> 'Planeta Junior',
                'author'=> 'María Roca y Amelia Sola',
                'img' => 'alicia-y-el-cerebro-maravilloso.jpg',
                'img_description' => 'Alicia y el cerebro maravilloso Quesitas Editorial',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('books_have_genres')->insert([
            [
                'book_id' => 1,
                'genre_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'book_id' => 1,
                'genre_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'book_id' => 2,
                'genre_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'book_id' => 2,
                'genre_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'book_id' => 3,
                'genre_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'book_id' => 3,
                'genre_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'book_id' => 4,
                'genre_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'book_id' => 4,
                'genre_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'book_id' => 5,
                'genre_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'book_id' => 5,
                'genre_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'book_id' => 6,
                'genre_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),

            ],

        ]);

    }
}
