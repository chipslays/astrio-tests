# Задание #1

## Задача

Дан массив "категории". Каждая категория имеет следующие параметры:

"id" — уникальный числовой идентификатор категорий

"title" — название категории

"children" - дочерние категории (массив из категорий)

Вложенность категории неограниченна (дочерние категории могу иметь свои вложенные категории и т.д.)

Пример массива :

```php
$categories = array(
	array(
   	"id" => 1,
   	"title" =>  "Обувь",
   	'children' => array(
       	array(
           	'id' => 2,
           	'title' => 'Ботинки',
           	'children' => array(
               	array('id' => 3, 'title' => 'Кожа'),
               	array('id' => 4, 'title' => 'Текстиль'),
           	),
       	),
       	array('id' => 5, 'title' => 'Кроссовки',),
   	)
	),
	array(
   	"id" => 6,
   	"title" =>  "Спорт",
   	'children' => array(
       	array(
           	'id' => 7,
           	'title' => 'Мячи'
       	)
   	)
	),
);
```

Необходимо написать функцию searchCategory($categories, $id), которая по идентификатору категории возвращает название категории

## Решение

### В терминале
```bash
$ php test.php <categoryId categoryId ...>
```

```bash
$ php test.php 1
string(20) "Категория 1"
```

```bash
$ php test.php 1 4 7 11 999
string(20) "Категория 1"
string(20) "Категория 4"
string(20) "Категория 7"
string(21) "Категория 11"
NULL
```

### Использование в коде
```php
require __DIR__ . '/functions/searchCategory.php';

$categoryName = searchCategory($categories, $categoryId);

var_dump($categoryName);
```


