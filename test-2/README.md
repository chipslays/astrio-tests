# Задание #2

## Задача
Даны три таблицы:

таблица `worker` (работник) с данными — id (id работника), first_name (имя), last_name (фамилия)
таблица `child` (ребенок) с данными — worker_id (id работника), name (имя ребенка)
таблица `car` (машина) с данными — worker_id (id работника), model (модель машины)

Структура таблиц:

```sql
CREATE TABLE `worker` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


CREATE TABLE `car` (
  `user_id` int(11) NOT NULL,
  `model` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `child` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```

Небходимо написать один SQL запрос который возвращает: имена и фамилии всех работников, список их детей через запятую и марку машины. Выбрать нужно только тех работников у которых есть или была машина (если машина была и потом её не стало то поле model становится null).

## Решение

Интерактивное решение на db-fiddle:

* https://www.db-fiddle.com/f/5jy6FkS8fDuWgArHm1F6En/2

<details>
  <summary>Schema</summary>

  ```sql
SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));

CREATE TABLE `worker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


CREATE TABLE `car` (
  `user_id` int(11) NOT NULL,
  `model` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `child` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `worker` (first_name, last_name) VALUES ('Ivan', 'Ivanov');
INSERT INTO `worker` (first_name, last_name) VALUES ('Petr', 'Petrov');
INSERT INTO `worker` (first_name, last_name) VALUES ('Irina', 'Irinova');
INSERT INTO `worker` (first_name, last_name) VALUES ('Dmitriy', 'Dmitriev');
INSERT INTO `worker` (first_name, last_name) VALUES ('Test5', 'Testov5');
INSERT INTO `worker` (first_name, last_name) VALUES ('Test6', 'Testov6');

INSERT INTO `car` (user_id, model) VALUES (1, NULL);
INSERT INTO `car` (user_id, model) VALUES (3, 'Lexus');
INSERT INTO `car` (user_id, model) VALUES (4, 'Lada');
INSERT INTO `car` (user_id, model) VALUES (5, 'Tesla');
INSERT INTO `car` (user_id, model) VALUES (6, 'Uaz');

INSERT INTO `child` (user_id, name) VALUES (1, 'Masha');
INSERT INTO `child` (user_id, name) VALUES (2, 'Grisha');
INSERT INTO `child` (user_id, name) VALUES (3, 'Kristina');
INSERT INTO `child` (user_id, name) VALUES (3, 'Danil');
INSERT INTO `child` (user_id, name) VALUES (4, 'Yulya');
INSERT INTO `child` (user_id, name) VALUES (6, 'Child6_1');
INSERT INTO `child` (user_id, name) VALUES (6, 'Child6_2');
INSERT INTO `child` (user_id, name) VALUES (6, 'Child6_3');


  ```

</details>

```sql
SELECT
    worker.first_name,
    worker.last_name,
    car.model,
    GROUP_CONCAT(child.name SEPARATOR ', ')
FROM
    worker
    LEFT JOIN car ON car.user_id = worker.id
    LEFT JOIN child ON child.user_id = worker.id
WHERE
    worker.id IN (SELECT user_id FROM car)
GROUP BY
	  worker.id;
```