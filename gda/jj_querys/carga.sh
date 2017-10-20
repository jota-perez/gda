for i in `ls *.sql`; do
    echo "--- $i ---\n";
    mysql -s -h 127.0.0.1 -ualbergue1 -ppassword1 albergue -P33060 <$i;
done;