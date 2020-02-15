<?php

namespace App\Repositories;

use App\Models\BlogPost as Model;
use Illuminate\Database\Eloquent\Collection;

class BlogPostRepository extends CoreRepository
{
    /**
     *
     * @return string
     */
    public function getModelClass()
    {
        return Model::class;
    }

    public function getAllWithPaginate($perpage = null)
    {
        $columns = [
            'id',
            'title',
            'slug',
            'is_published',
            'published_at',
            'user_id',
            'category_id',
        ];

        $result = $this->startConditions()
                        ->select($columns)
                        ->with([
                            'category:id,title',
                            'user:id,name'
                        ])
                        ->orderBy('id', 'DESC')
                        ->paginate($perpage);

        return $result;
    }

    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }


}
