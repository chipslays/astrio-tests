<?php

if (!function_exists('searchCategory')) {
    /**
     * @param array $categories
     * @param int $id
     * @return string|null
     */
    function searchCategory(array $categories, int $id): ?string
    {
        foreach ($categories as $category) {
            if ($category['id'] == $id) {
                return $category['title'];
            }

            if (
                isset($category['children'])
                && is_array($category['children'])
                && $category['children'] !== []
            ) {
                if ($categoryName = searchCategory($category['children'], $id)) {
                    return $categoryName;
                }
            }
        }

        return null;
    }
}
