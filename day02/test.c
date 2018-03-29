#include <stdio.h>
#include "/usr/include/utmpx.h"

typedef struct utmpx 			t_utmp;;

int	main(void)
{
		t_utmp	lol;

		printf("tot : %zu\n", sizeof(lol));
		printf("user : %zu\n", sizeof(lol.ut_user));
		printf("ut_id : %zu\n", sizeof(lol.ut_id));
		printf("ut_line :  %zu\n", sizeof(lol.ut_line));
		printf("ut_pid : %zu\n", sizeof(lol.ut_pid));
		printf("short ut_type : %zu\n", sizeof(lol.ut_type));
		printf("struc ut_tv : %zu\n", sizeof(lol.ut_tv));
		printf("ut_host %zu\n", sizeof(lol.ut_host));
		printf("ut_pad %zu\n", sizeof(lol.ut_pad));
		return (0);
}
