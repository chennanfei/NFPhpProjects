FROM tutum/apache-php:latest

RUN apt-get update && apt-get install -y ruby2.0 rsync
RUN gem list && gem install -y sass
RUN apt-get install -y python-setuptools
RUN easy_install supervisor
RUN easy_install supervisor-stdout

ENV SMARTY_COMPILE_DIR /templates_c
ENV SMARTY_COMPILE_CACHE_DIR /templates_c/cache_c

RUN mkdir /templates_c && chmod 777 /templates_c \
    && mkdir /templates_c/cache_c && chmod 777 /templates_c/cache_c \
    && mkdir /site-images && chmod 777 /site-images

WORKDIR /app
VOLUME /uploaded_images

RUN echo "* * * * * rsync -avr /site-images/* /uploaded_images" >> /var/spool/cron/crontabs/root \
    && chmod 600 /var/spool/cron/crontabs/root

CMD ["supervisord", "-c", "/app/conf/supervisord.conf"]

COPY . /app
