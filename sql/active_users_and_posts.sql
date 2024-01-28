-- Display the posts of all the active users
SELECT user.id AS 'user_id', user.first_name, user.last_name, post.title, post.content 
FROM user
JOIN post ON user.id = post.user_id
WHERE user.is_Active = 1 AND post.is_active = 1;