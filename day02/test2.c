#include <stdio.h>
#include <utmpx.h>
int     main(void)
{
        struct timeval  tmp;
        printf("%zu\n", sizeof(tmp.tv_sec));
        printf("%zu\n", sizeof(tmp.tv_usec));
        return (0);
}
