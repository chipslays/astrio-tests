<?php

if (!function_exists('isCorrectHtml')) {
    /**
     * @param array $tags
     * @return bool
     */
    function isCorrectHtml(array $tags = []): bool
    {
        $openTags = [];

        foreach ($tags as $tag) {
            if (strpos($tag, '/>') !== false) {
                continue;
            }

            if (strpos($tag, '/') !== false) {
                $lastOpenTag = array_pop($openTags);
                if (str_replace('<', '</', $lastOpenTag) !== $tag) {
                    return false;
                }
                continue;
            }

            $openTags[] = $tag;
        }

        return true;
    }
}


