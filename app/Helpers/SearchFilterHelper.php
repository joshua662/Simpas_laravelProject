<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Builder;

class SearchFilterHelper
{
    /**
     * Apply search functionality to a query
     * 
     * @param Builder $query
     * @param string $searchTerm
     * @param array $searchFields Fields to search in
     * @return Builder
     */
    public static function applySearch(Builder $query, ?string $searchTerm, array $searchFields): Builder
    {
        if (empty($searchTerm)) {
            return $query;
        }

        $query->where(function($q) use ($searchTerm, $searchFields) {
            foreach ($searchFields as $index => $field) {
                if ($index === 0) {
                    $q->where($field, 'like', "%{$searchTerm}%");
                } else {
                    $q->orWhere($field, 'like', "%{$searchTerm}%");
                }
            }
        });

        return $query;
    }

    /**
     * Apply filter functionality to a query
     * 
     * @param Builder $query
     * @param string|null $filterValue
     * @param string $filterField
     * @param array|null $specialValues Special handling for values like 'unassigned', 'all', etc.
     * @return Builder
     */
    public static function applyFilter(Builder $query, ?string $filterValue, string $filterField, ?array $specialValues = null): Builder
    {
        if (empty($filterValue)) {
            return $query;
        }

        // Handle special values
        if ($specialValues && isset($specialValues[$filterValue])) {
            $handler = $specialValues[$filterValue];
            
            if (is_callable($handler)) {
                return $handler($query);
            }
            
            if (is_string($handler) && $handler === 'null') {
                return $query->whereNull($filterField);
            }
        }

        // Regular filter
        return $query->where($filterField, $filterValue);
    }

    /**
     * Apply multiple filters to a query
     * 
     * @param Builder $query
     * @param array $filters Array of ['field' => 'value'] pairs
     * @return Builder
     */
    public static function applyFilters(Builder $query, array $filters): Builder
    {
        foreach ($filters as $field => $value) {
            if (!empty($value)) {
                $query->where($field, $value);
            }
        }

        return $query;
    }

    /**
     * Get search and filter parameters from request
     * 
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public static function getSearchFilterParams($request): array
    {
        return [
            'search' => $request->input('search'),
            'filters' => $request->except(['search', 'page', '_token']),
        ];
    }

    /**
     * Build query string for maintaining filters in pagination
     * 
     * @param array $params
     * @return string
     */
    public static function buildQueryString(array $params): string
    {
        return http_build_query(array_filter($params));
    }
}

