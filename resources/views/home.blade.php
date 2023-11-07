    @extends('layouts.main')
    @section('title', 'Bienvenidos')
    @section('main')

        <section class="bienvenida">
            <h1 class="text-end">Bienvenidos a Editorial Quesitas</h1>
            <div class="intro">
                <p class="text-center">Sumérgete en un mundo de magia, aventuras y aprendizaje a través de los libros. En
                    Editorial Quesitas, nos apasiona despertar la imaginación de los más pequeños y cultivar el amor por la
                    lectura desde temprana edad. Nuestra página está llena de maravillosas historias, novedades emocionantes
                    y una selección cuidadosamente elegida de libros infantiles.</p>
                <a href="#quienes" class="btn">Saber más</a>
            </div>
        </section>

        <section class="somos" id="quienes">
            <h2>¿Quiénes Somos?</h2>
            <p>Conoce a nuestro increíble equipo de amantes de la literatura infantil que está comprometido en ofrecerte
                experiencias de lectura inolvidables. Estamos aquí para ayudarte a encontrar las historias perfectas para
                tus pequeños lectores. Descubre más sobre nosotros y nuestra pasión por los libros</p>
            <a href="{{ route('nosotros') }}" class="btn">Saber más</a>
        </section>

        <section class="novedades">
            <h2>Novedades</h2>
            <p>Mantente al tanto de las últimas novedades en el mundo de la literatura infantil. Nuestra sección de
                novedades te ofrece una selección actualizada de las noticias más importantes del momento.</p>
            <a href="{{ route('news.index') }}" class="btn">Saber más</a>
        </section>

        <section class="libros">
            <h2>Explora nuestra selección a los 5 mejores libros</h2>
            <p>Sumérgete en nuestra encantadora colección de libros infantiles cuidadosamente seleccionados. Desde clásicos
                atemporales hasta las últimas publicaciones, cada libro ha sido elegido para ofrecerte una experiencia de
                lectura excepcional. Encuentra historias que inspiran, personajes que cobran vida y aventuras que
                transportarán a tus pequeños lectores a nuevos mundos. Explora nuestra colección y encuentra el libro
                perfecto para disfrutar en familia.</p>
            <a href="{{ route('libros.index') }}" class="btn">Saber más</a>
        </section>

        <section class="final text-center">
            <p>En Quesitas Editorial, nos apasiona crear momentos de conexión a través de la lectura. Estamos comprometidos
                en nutrir la imaginación de los niños y despertar su curiosidad por el mundo que los rodea. Únete a nosotros
                en esta maravillosa aventura literaria y descubre el poder transformador de los libros infantiles.</p>
            <p>¡Explora, aprende y disfruta de la magia de la lectura en Quesitas Editorial!</p>
        </section>

    @endsection
