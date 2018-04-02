SELECT count(*) as 'movies' FROM member_history WHERE date between "2006-10-30" and "2007-07-27" OR DATE_FORMAT(date, "%c-%d") = "12-24";
