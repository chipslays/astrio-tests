<?php

if (!function_exists('isCorrectHtml')) {
    /**
     * @param array $tags
     * @return bool
     */
    function isCorrectHtml(array $tags = []): bool
    {
        $html = implode('', $tags);

        preg_match_all('/<([a-z]+)>/i', $html, $matches, PREG_OFFSET_CAPTURE);
        $openTags = $matches[1];

        preg_match_all('/<\/([a-z]+)>/i', $html, $matches, PREG_OFFSET_CAPTURE);
        $closeTags = $matches[1];

        if (count($openTags) !== count($closeTags)) {
            return false;
        }

        $index = count($closeTags) - 1;
        foreach ($closeTags as $closeTag) {
            if (
                $closeTag[0] !== $openTags[$index][0]
                || $closeTag[1] <  $openTags[$index][1]
            ) {
                return false;
            }
            $index--;
        }

        return true;
    }
}


