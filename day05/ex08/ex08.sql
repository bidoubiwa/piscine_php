use db_cvermand;
SELECT last_name, first_name, DATE(birthdate) as birthdate FROM user_card WHERE year(birthdate) = 1989;