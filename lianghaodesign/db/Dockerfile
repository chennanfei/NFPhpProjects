FROM mysql:5.7

RUN apt-get update && apt-get install -y vim

VOLUME /var/lib/mysql

COPY lianghao.sql .

ENV MYSQL_ROOT_PASSWORD 'lianghao'
RUN mysql -uroot -p$MYSQL_ROOT_PASSWORD -e "create database if not exists lianghao default charset utf8 collate utf8_general_ci;"
RUN mysql -uroot -p$MYSQL_ROOT_PASSWORD --default-character-set=utf8 lianghao < lianghao.sql
