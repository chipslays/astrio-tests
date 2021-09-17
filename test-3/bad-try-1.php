<?php

function isCorrectHtml(array $tags = [])
{
    $html = implode('', $tags);

    $tags = array_map(function ($tag) {
        return str_replace('/', '', $tag);
    }, $tags);

    $tags = array_unique($tags);

    foreach ($tags as $tag) {
        $openTag = $tag;
        $closeTag = str_replace('<', '</', $tag);

        if (mb_substr_count($html, $openTag) !== mb_substr_count($html, $closeTag)) {
            return false;
        }
    }

    return true;
}