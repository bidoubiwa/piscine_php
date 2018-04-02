use db_cvermand;
SELECT title, summary FROM film WHERE summary LIKE '%42%' OR title LIKE '%42%' ORDER BY duration ASC;
