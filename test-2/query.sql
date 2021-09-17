SELECT
    worker.first_name,
    worker.last_name,
    car.model,
    child.name
FROM
    worker
    LEFT JOIN car ON car.user_id = worker.id
    LEFT JOIN child ON child.user_id = worker.id
WHERE
    car.model != 'none'
    OR car.model IS NULL;