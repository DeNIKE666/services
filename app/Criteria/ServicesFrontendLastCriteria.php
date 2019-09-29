<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class ServicesFrontendLastCriteria.
 *
 * @package namespace App\Criteria;
 */
class ServicesFrontendLastCriteria implements CriteriaInterface
{
    /**
     * Apply criteria in query repository
     *
     * @param string              $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $model = $model->where('amount' , '>', 0)
                      ->orderBy('id' ,'desc')->limit(5);

        return $model;
    }
}
