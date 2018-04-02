SELECT name, id_distrib FROM distrib WHERE id_distrib IN (42, 62, 63, 64, 65, 66, 67, 68, 69, 71, 88, 89, 90) OR length(name) - 2 = length(REPLACE(LOWER(name),'y','')) LIMIT 5 OFFSET 3;
