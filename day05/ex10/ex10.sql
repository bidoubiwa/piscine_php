USE db_cvermand;
SELECT f.title as TITLE, f.summary as Summary, f.prod_year FROM film f INNER JOIN genre g ON g.id_genre = f.id_genre WHERE g.name = 'erotic' ORDER BY prod_year DESC;
