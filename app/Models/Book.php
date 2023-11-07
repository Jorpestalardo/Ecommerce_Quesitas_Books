<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Usuario;

/**
 * App\Models\Book
 *
 * @property int $book_id
 * @property string $title
 * @property string $publishDate
 * @property int $price
 * @property string $synopsis
 * @property int $pages
 * @property string $synopsis
 * @property string $editorial
 * @property string $author
 * @property string|null $cover
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Movie newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Movie newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Movie query()
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereCoverDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereMovieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereReleaseDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereSynopsis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereUpdatedAt($value)
 * @property string|null $language
 * @property string|null $img
 * @property string $img_description
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Book onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereBookId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereEditorial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereImgDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book wherePages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book wherePublishDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Book withoutTrashed()
 * @mixin \Eloquent
 */
class Book extends Model
{
    use SoftDeletes;
    protected $table = 'books';

    protected $primaryKey = 'book_id';

    protected $fillable = [
        'title',
        'img',
        'user_id',
        'img_description',
        'publishDate',
        'synopsis',
        'pages',
        'language',
        'editorial',
        'author',
        'price'
    ];

    public static function validationRules(): array
    {
        return [
            'title' => 'required',
            'synopsis' => 'required|min:10',
            'price' => 'required|numeric',
            'editorial' => 'required',
            'author' => 'required',
            'publishDate' => 'required',
            'pages' => 'required|numeric',
            'img_description' => 'required',
        ];
    }

    public static function validationRulesAlerts(): array
    {
        return [
            'title.required' => 'Tenés que escribir el título del libro',
            'synopsis.required' => 'Tenés que escribir la sinópsis del libro',
            'synopsis.min' => 'El mínimo de caracteres son :min. Escriba la sinópsis más extensa',
            'price.required' => 'Tenés que escribir el precio del libro',
            'price.numeric' => 'El precio del libro tiene que estar compuesto por números',
            'editorial.required' => 'Tenés que escribir la editorial del libro',
            'author.required' => 'Tenés que escribir el/la autor/a del libro',
            'img_description.required' => 'Tenés que escribir la descripción de la imagen del libro',
            'publishDate.required' => 'Tenés que escribir la fecha de publicación del libro',
            'pages.required' => 'Tenés que escribir la cantidad de páginas que contiene el libro',
            'pages.numeric' => 'La cantidad del libro tiene que estar compuesta por números',
        ];
    }

    protected function price(): Attribute
    {
        return Attribute::make(
            get: fn(int $price): float => (float) number_format($price / 100, 2, '.', ''),
            set: fn(float $price): int => (int) ($price * 100)
        );
    }


    /**
     * Relaciones de n:m retorna categorias de generos para los libros.
     */
    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(
            Genre::class,
            'books_have_genres',
            'book_id',
            'genre_id',
            'book_id',
            'genre_id',
        );

    }

    public function getGenresIdChecked(): array
    {
        return $this->genres()->pluck('genres.genre_id')->all();
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'user_id', 'user_id');
    }
}