SELECT TIMESTAMPDIFF(DAY, ( SELECT last_projection FROM film ORDER BY last_projection LIMIT 1) , (SELECT last_projection FROM film ORDER BY last_projection DESC LIMIT 1)) as 'uptime';
