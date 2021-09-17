<?php

require __DIR__ . '/functions/isCorrectHtml.php';

// true
var_dump(isCorrectHtml([
    '<div>',
        '<a>',
        '<a>',
    '</div>',
]));

// true
var_dump(isCorrectHtml([
    '<a>',
        '<div>',
        '</div>',
    '</a>',
    '<span>', '</span>'
]));

// false
var_dump(isCorrectHtml([
    '<a>',
        '</div>',
    '</a>'
]));

// true
var_dump(isCorrectHtml([
    '<span>',
        '<img/>',
    '</span>'
]));

// true
var_dump(isCorrectHtml(['<span>', '</span>']));

// true
var_dump(isCorrectHtml(['<hr/>']));

// true
var_dump(isCorrectHtml([
    '<html>',
        '<body>',
            '<br />',
        '</body>',
    '</html>'
]));

// false
var_dump(isCorrectHtml([
    '<html>',
        '<body>',
            '</style>',
        '</body>',
    '</html>'
]));
