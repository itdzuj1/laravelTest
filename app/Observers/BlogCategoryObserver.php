<?php

namespace App\Observers;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Support\Str;

class BlogCategoryObserver
{
    public function creating(BlogCategory $blogCategory)
    {
        $this->setSlug($blogCategory);
    }

    protected function setSlug(BlogCategory $blogCategory)
    {
        if (empty($blogCategory->slug)) {
            $blogCategory->slug = Str::slug($blogCategory->title);
        }
    }

    public function created(BlogCategory $blogCategory)
    {
        //
    }

    public function updating(BlogCategory $blogCategory)
    {
        $this->setSlug($blogCategory);
    }

    public function updated(BlogCategory $blogCategory)
    {
        //
    }

    public function deleted(BlogCategory $blogCategory)
    {
        //
    }

    public function restored(BlogCategory $blogCategory)
    {
        //
    }

    public function forceDeleted(BlogCategory $blogCategory)
    {
        //
    }
}
