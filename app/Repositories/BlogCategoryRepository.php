<?php

namespace App\Repositories;

use App\Models\BlogCategory as Model;
use Illuminate\Database\Eloquent\Collection;

class BlogCategoryRepository extends CoreRepository
{
    /**
     *
     * @return string
     */
    public function getModelClass()
    {
        return Model::class;
    }

    /**
     * Получить модель для редактирования в админке
     *
     * @param int $id
     *
     * @return Model
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    /**
     * Получить список категорий для вывода в выпадающем списке
     *
     * @return Collection
     */
    public function getForComboBox()
    {
//        return $this->startConditions()->all();

        return $this
            ->startConditions()
            ->select('id', 'title')
            ->toBase()
            ->get();

    }

    /**
     * Получить категории для вывода пагинатором
     *
     */
    public function getAllWithPaginate($perpage = null)
    {
        $columns = ['id', 'title', 'parent_id'];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->with([
                'parentCategory:id,title'
            ])
            ->paginate($perpage);

        return $result;
    }
}
