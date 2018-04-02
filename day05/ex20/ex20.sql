SELECT	f.id_genre, 
		g.name as "name_genre", 
		d.id_distrib, 
		d.name as "name_distrib", 
		f.title as "title_film" 
		FROM film f 
		LEFT JOIN genre g 
			ON f.id_genre = g.id_genre 
		LEFT JOIN distrib d 
			ON f.id_distrib = d.id_distrib 
		WHERE	f.id_genre >= 4 
				AND f.id_genre <= 8;
