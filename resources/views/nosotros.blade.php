@extends('layouts.main')
@section('title', '¿Quiénes Somos?')
@section('main')
    <section class="secQuienes">
        <h1>¿Quiénes somos?</h1>
        <article class="introQuienes">
            <p>En Quesitas Editorial, estamos apasionados por los libros infantiles y queremos llevar la magia de la lectura
                a cada rincón. Nuestro objetivo es inspirar y nutrir la imaginación de los más pequeños a través de
                historias cautivadoras y personajes inolvidables.</p>
            <p>Conozca a nuestro increíble equipo:</p>
        </article>

        <article class="sofia">
            <h2>Sofía, la buscadora de tesoros literarios -></h2>
            <p>Sofía es nuestra experta en selección de libros. Se apasiona por descubrir las historias más encantadoras y
                significativas para niños de todas las edades. Ella investiga, explora y elige cuidadosamente cada título en
                nuestra colección para asegurarse de que cada libro que encuentres en nuestra página sea una joya que
                despierte la imaginación y el amor por la lectura.</p>
        </article>
        <article class="lucia">
            <h2>Lucía, la experta en recomendaciones -></h2>
            <p>Lucía es nuestra amante de la lectura y una entusiasta defensora de los libros infantiles. Con su amplio
                conocimiento y su pasión por las historias, Lucía está aquí para ayudarte a encontrar el libro perfecto para
                cada niño. Ya sea que estés buscando una historia de aventuras, un cuento de hadas clásico o una novela
                llena de humor, Lucía tiene la recomendación ideal para satisfacer los gustos y las necesidades de cada
                pequeño lector.</p>
        </article>
        <article class="carlos">
            <h2>Carlos, el responsable logístico -></h2>
            <p>Carlos se encarga de que tu experiencia de compra en Quesitas Editorial sea excepcional. Desde el momento en
                que haces tu pedido hasta que el libro llega a tu puerta, Carlos se asegura de que todo salga sin problemas.
                Con su dedicación y atención al detalle, puedes estar seguro de que recibirás tu libro en perfectas
                condiciones y a tiempo para disfrutarlo con tus pequeños.</p>
        </article>
        <article class="laura">
            <h2>Laura, la comunicadora creativa -> </h2>
            <p>Laura es nuestra encargada de dar vida a nuestras redes sociales y comunicaciones. Con su pluma creativa y su
                amor por las palabras, se encarga de compartir contenido inspirador, reseñas de libros y noticias
                emocionantes sobre el mundo de la literatura infantil. Laura también está aquí para escuchar tus
                comentarios, sugerencias y responder a tus preguntas, creando así una comunidad de amantes de los libros
                infantiles.</p>
        </article>

        <article class="conclusionQuienes text-center">
            <p>Juntos, Sofía, Lucía, Carlos y Laura formamos un equipo comprometido en ofrecerte una experiencia única al
                adentrarte en el maravilloso mundo de los libros infantiles. Nos apasiona fomentar el amor por la lectura
                desde temprana edad y estamos emocionados de poder acompañarte en este viaje.</p>
            <p>Explora <a href="{{ route('libros.index') }}">nuestra colección</a> , descubre nuevas historias y crea
                momentos inolvidables de lectura en compañía de tus pequeños. En Quesitas Editorial, estamos aquí para
                ayudarte a encontrar el libro perfecto y hacer de la lectura una experiencia mágica para toda la familia.
            </p>
            <p>¡Gracias por unirte a nosotros en esta aventura literaria!</p>
        </article>
    </section>
    
@endsection
