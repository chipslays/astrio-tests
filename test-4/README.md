# Задание #4

## Задача

Написать класс-оболочку хранилища «Box».
В хранилище можно установить данные (`setData($key, $value)`), получить данные (`getData($key)`), сохранить данные (save()) и загрузить данные (load())

`$key` — произвольный идентификатор данных

$value — скаляные данные или массив

Хранилище состоит из:
- Интерфейс описывающий методы установки данных, получения данных, сохранения и загрузки
- Абстрактный класс AbstractBox содержащий реализацию необходимых общих методов
- Класс FileBox расширяющий абстрактный класс AbstractBox. При вызове save() сохраняет заданные в класс данные в файл. При вызове load() достает данные из файла.
- Класс DbBox расширяющий абстрактный класс AbstractBox. При вызове save() сохраняет заданные в класс данные в базу. При вызове load() достает данные из базы.

Функция load не должна ничего возвращать, должна лишь сохранять полученные данные внутри объекта. Для получения данных служит функция getData($key).

При сохранении данных необходимо учитывать ключи новых данных и тех данных что хранятся в базе(файле), если значение с ключом в базе(файле) уже существует, то нужно его значение заменить на новое.

Классы FileBox и DbBox должен быть реализованы таким образом, чтобы нельзя было создать более одного экземпляра каждого из классов.

## Решение

```bash
composer install
```

```php
use Box\Box;
use Box\Repository\FileBox;

require __DIR__ . '/vendor/autoload.php';

FileBox::create([
    'dir' => __DIR__ . '/storage/box',
]);

Box::setRepostitory(FileBox::class);

Box::setData('key', 'value');
echo Box::getData('key');
```

```php
use Box\Box;
use Box\Repository\DbBox;

require __DIR__ . '/vendor/autoload.php';

DbBox::create([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'box',
    'username' => 'mysql',
    'password' => 'mysql',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);

Box::setRepostitory(DbBox::class);

Box::setData('key', 'value');
echo Box::getData('key');
```
