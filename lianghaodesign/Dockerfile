FROM tutum/apache-php:latest

RUN apt-get update && apt-get install -y ruby2.0 rsync
RUN gem list && gem install -y sass

ENV SMARTY_COMPILE_DIR /templates_c
ENV SMARTY_COMPILE_CACHE_DIR /templates_c/cache_c

RUN mkdir /templates_c && chmod 777 /templates_c
RUN mkdir /templates_c/cache_c && chmod 777 /templates_c/cache_c

WORKDIR /app

RUN mkdir /site-images && chmod 777 /site-images
VOLUME /uploaded_images

RUN echo "* * * * * rsync -avr /site-images/* /uploaded_images" >> /var/spool/cron/crontabs/root
RUN echo "* * * * * echo hello /var/log/test.log" >> /var/spool/cron/crontabs/root

COPY run.sh /
RUN chmod +x /run.sh
CMD ["/run.sh"]

COPY . /app
