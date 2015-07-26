FROM index.alauda.cn/alauda/mysql:5.5

COPY lianghao.sql .
RUN mysql -uroot -p$MYSQL_ROOT_PASSWORD --default-character-set=utf-8 lianghao < lianghao.sql