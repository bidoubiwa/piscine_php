USE db_cvermand;
SELECT UPPER(u.last_name) as 'NAME', u.first_name, s.price 
		FROM user_card u 
		INNER JOIN member m 
			ON u.id_user = m.id_user_card 
		INNER JOIN subscription s 
			ON m.id_sub = s.id_sub 
		WHERE s.price > 42 
		ORDER BY last_name ASC, first_name ASC;
