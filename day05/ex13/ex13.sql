USE db_cvermand;
SELECT ROUND(SUM(nb_seats)/COUNT(*)) as average FROM cinema;
