<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

trait HasImage
{
    use InteractsWithMedia;

    private Collection $mediaUrls;

    /**
     * Get Original Image.
     */
    public function image()
    {
        return optional($this->getMedia('main')->first())->getFullUrl();
    }

    public function imagePath()
    {
        return optional($this->getMedia('main')->first())->getPath();
    }

    /**
     * Get Original Image.
     */
    public function imageUsingCollection($collection)
    {
        return optional($this->getMedia($collection)->first())->getFullUrl();
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumbnail')
            ->width(150)
            ->height(150);
    }

    /**
     * get images url from polymporfic realationship
     *
     */
    public function images()
    {
        $this->mediaUrls = new Collection();

        $this->media->each(fn ($medium) =>  $this->mediaUrls->push($medium->getFullUrl()));

        return $this->mediaUrls;
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('main')->singleFile();

        $this->addMediaCollection('gallery');
    }
}
