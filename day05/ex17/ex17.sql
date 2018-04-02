SELECT COUNT(*) as 'nb_susc', FLOOR(AVG(price)) as 'av_susc', SUM(duration_sub) as 'ft' FROM subscription;
