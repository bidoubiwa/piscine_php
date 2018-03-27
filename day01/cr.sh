#!/bin/bash
mkdir ex$1
cd ex$1
touch $2
echo "#!/usr/bin/php" > $2
echo "<?PHP" >> $2
echo "\n\n\n" >> $2
echo "?>" >> $2
chmod +x $2
