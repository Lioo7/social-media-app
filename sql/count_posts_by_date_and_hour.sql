-- Retrieves post counts for each date and hour from the post table in the social media database
SELECT DATE(p.creation_date) AS post_date, HOUR(p.creation_date) AS post_hour, COUNT(*) AS post_count
FROM social_media.post AS p
GROUP BY post_date, post_hour;
