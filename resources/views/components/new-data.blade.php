<div class="book">
    <x-new-img :new="$new" />
    <div class="infoBook">
        <div class="autorDate">
            <p>{{ $new->author }} <span>(Autor)</span> </p>
            <p>{{ $new->publishDate }} <span>(Fecha de publicación)</span></p>
        </div>

        <p>{{ $new->info }}</p>

        <div class="infoExtra">
            <div>
                <h3>Título</h3>
                <p>{{ $new->title }}</p>
            </div>
            <div>
                <h3>Subtítulo</h3>
                <p>{{ $new->subtitle }}</p>
            </div>
            <div>
                <h3>Posteo</h3>
                <p>{{ $new->new_id }}</p>
            </div>
        </div>
        <p class="precio">Si queres saber más info -> {{ $new->link }}</p>
    </div>


</div>
