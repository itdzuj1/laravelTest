<?php

namespace App\Observers;

use App\Models\BlogPost;
use Carbon\Carbon;
use Illuminate\Support\Str;

class BlogPostObserver
{
    public function creating(BlogPost $blogPost)
    {
        $this->setPublished($blogPost);
        $this->setSlug($blogPost);
        $this->setHtml($blogPost);
        $this->setUser($blogPost);
    }
    public function created(BlogPost $blogPost)
    {
        //
    }

    public function updating(BlogPost $blogPost)
    {
        $this->setPublished($blogPost);

        $this->setSlug($blogPost);
    }

    protected function setPublished(BlogPost $blogPost)
    {
        if (empty($blogPost->published_at) && $blogPost->is_published) {
            $blogPost->published_at = Carbon::now();
        }
    }

    protected function setSlug(BlogPost $blogPost)
    {
        if (empty($blogPost->slug)) {
            $blogPost->slug = Str::slug($blogPost->title);
        }
    }

    protected function setHtml(BlogPost $blogPost)
    {
        if ($blogPost->isDirty('content_raw')) {
            $blogPost->content_html = $blogPost->content_raw;
        }
    }

    protected function setUser(BlogPost $blogPost)
    {
        $blogPost->user_id = auth()->id() ?? BlogPost::UNKNOWN_USER;
    }

    public function updated(BlogPost $blogPost)
    {
        //
    }

    public function deleted(BlogPost $blogPost)
    {
        //
    }

    public function restored(BlogPost $blogPost)
    {
        //
    }

    public function forceDeleted(BlogPost $modelsBlogpost)
    {
        //
    }
}
