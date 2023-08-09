<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    const FILE_PATH = 'admin/images/projects/';

    protected $fillable=['region_id','bitrix_id','apartments','floors','card_image','background_image','logo','status','3d_tour_one','3d_tour_two','yard_image','hall_image','location','latitude','longitude','order','logo_map','slug'];

    protected $attributes=['status'=>1];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($item){
            if(file_exists(self::FILE_PATH.$item->yard_image)){
                unlink(self::FILE_PATH.$item->yard_image);
            }
            if(file_exists(self::FILE_PATH.$item->hall_image)){
                unlink(self::FILE_PATH.$item->hall_image);
            }
            if(file_exists(self::FILE_PATH.$item->card_image)){
                unlink(self::FILE_PATH.$item->card_image);
            }
            if(file_exists(self::FILE_PATH.$item->background_image)){
                unlink(self::FILE_PATH.$item->background_image);
            }
            if (file_exists(self::FILE_PATH.$item->logo)){
                unlink(self::FILE_PATH.$item->logo);
            }
            foreach ($item->images as $image) {
                if (file_exists(self::FILE_PATH.$image['image'])){
                    unlink(self::FILE_PATH.$image['image']);
                }
            }
            foreach ($item->translations as $translation) {
                if (file_exists(self::FILE_PATH.$translation['booklet'])) {
                    unlink(self::FILE_PATH.$translation['booklet']);
                }
            }
        });
    }

    public function deleteFile(string $name)
    {
        if (file_exists(self::FILE_PATH.$this->{$name})) {
            unlink(self::FILE_PATH.$this->{$name});
        }
    }

    public function deleteProjectImages(): bool
    {
        foreach ($this->images as $image) {
            if (file_exists(self::FILE_PATH.$image['image'])) {
                unlink(self::FILE_PATH.$image['image']);
            }
            $image->delete();
        }
        return true;
    }

    public function deleteBookletImages(): bool
    {
        foreach ($this->translations as $translation) {
            if (file_exists(self::FILE_PATH.$translation['booklet'])) {
                unlink(self::FILE_PATH.$translation['booklet']);
            }
        }
        return true;
    }

    public function getTranslatedAttributes($localeId)
    {
        return $this->translations->where('localization_id', $localeId)->first();
    }

    public function translations(): HasMany
    {
        return $this->hasMany(ProjectTranslation::class);
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function flats(): HasMany
    {
        return $this->hasMany(Flat::class);
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    public function roomTypes(): HasMany
    {
        return $this->hasMany(RoomType::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProjectImage::class, 'project_id');
    }

    public function videos(): HasMany
    {
        return $this->hasMany(ProjectVideo::class, 'project_id');
    }

    public function advantages(): BelongsToMany
    {
        return $this->belongsToMany(ProjectAdvantage::class, 'project_advantages_project');
    }

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'post_project', 'project_id');
    }
}
