<?php
/**
 *  app/Traits/ScopeFilter.php
 *
 * Date-Time: 14.06.21
 * Time: 09:52
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */

namespace App\Traits;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

/**
 * Trait ScopeFilter
 * @package App\Traits
 */
trait ScopeFilter
{

    /**
     * @param  $request
     * @return Builder
     */
    public function filter( $request): Builder
    {
        $data = $this->query();
        $filterScopes = $this->getFilterScopes();
        foreach ($this->getActiveFilters($request) as $filter => $value) {
            if (!array_key_exists($filter, $filterScopes)) {
                continue;
            }
            $filterScopeData = $filterScopes[$filter];

            if (false === $filterScopeData['hasParam']) {
                $data->{$value}();
                continue;
            }
            $methodToExecute = $filterScopeData['scopeMethod'];
            $data->{$methodToExecute}($value);
        }

        $sortParams = [
            'sort' => $this->defaultSort,
            'order' => $this->defaultOrder
        ];

        if ($request->filled('sort') && $request->filled('order')) {
            $sortParams = $request->only('sort','order');
        }

        return $data->sorted($sortParams);
    }

    /**
     * @param  $request
     * @return array
     */
    public function getActiveFilters($request): array
    {
        $activeFilters = [];
        foreach ($this->getFilterScopes() as $key => $value) {
            if ($request->filled($key)) {
                $activeFilters [$key] = $request->{$key};
            }
        }
        return $activeFilters;
    }

    /**
     * @param $query
     * @param array $sortParams
     * @return mixed
     */
    public function scopeSorted($query, array $sortParams)
    {
        return $query->orderBy($sortParams['sort'], $sortParams['order']);
    }
}
