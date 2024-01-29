-- This query retrieves the latest post for each user whose birthday falls in the current month
WITH LatestPost AS (
    SELECT user_id, MAX(creation_date) AS max_creation_date
    FROM post
    GROUP BY user_id
)
SELECT u.id AS user_id, u.first_name, u.last_name, p.title, p.content, p.creation_date
FROM LatestPost AS lp
JOIN post AS p ON lp.user_id = p.user_id AND lp.max_creation_date = p.creation_date
JOIN user AS u ON u.id = p.user_id
WHERE MONTH(u.birthdate) = MONTH(CURRENT_DATE())
ORDER BY p.creation_date DESC;
