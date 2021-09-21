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
	worker.first_name;