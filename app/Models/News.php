<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;


/**
 * App\Models\News
 *
 * @property int $new_id
 * @property string $title
 * @property string|null $subtitle
 * @property string|null $img
 * @property string $imgDescription
 * @property string $info
 * @property string $author
 * @property string $publishDate
 * @property string $link
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|News newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News query()
 * @method static \Illuminate\Database\Eloquent\Builder|News whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereImgDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereNewId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News wherePublishDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereSubtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class News extends Model
{

    protected $table = 'news';

    protected $primaryKey = 'new_id';

    protected $fillable = [
        'title',
        'user_id',
        'subtitle',
        'img',
        'imgDescription',
        'info',
        'author',
        'publishDate',
        'link'
    ];


    public static function validationRules(): array
    {
        return
            [
                'title' => 'required',
                'subtitle' => 'required|min:10',
                'info' => 'required|min:20',
                'author' => 'required',
                'img' => 'required',
                'imgDescription' => 'required',
                'publishDate' => 'required',
                'link' => 'required',
            ];
    }

    public static function validationRulesAlerts(): array
    {
        return
            [
                'title.required' => 'Tenés que escribir el título de la novedad',
                'title.min' => 'El mínimo de caracteres son :min. Escriba un título más extenso',
                'subtitle.required' => 'Tenés que escribir el subtitulo de la novedad',
                'subtititle.min' => 'El mínimo de caracteres son :min. Escriba el subtitulo más extenso',
                'info.required' => 'Tenés que escribir la información de la novedad',
                'info.min' => 'El mínimo de caracteres son :min. Escriba la información más extensa',
                'author.required' => 'Tenés que escribir el nombre del autor',
                'img.required' => 'Tenés que cargar la imagen de la novedad',
                'imgDescription.required' => 'Tenés que escribir la descripción de la imagen de la novedad',
                'publishDate.required' => 'Tenés que escribir la fecha de publicación de la novedad',
                'link.required' => 'Tenés que escribir el link de donde proviene la información',
            ];
    }

    public function limitWords($subtitle, $limit = 30)
    {
        return Str::limit($subtitle, $limit);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'user_id', 'user_id');
    }
}