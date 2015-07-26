FROM tutum/apache-php:latest

RUN apt-get update && apt-get install -y sass

ENV SMARTY_COMPILE_DIR /templates_c
ENV SMARTY_COMPILE_CACHE_DIR /templates_c/cache_c

RUN mkdir /templates_c && chmod 777 /templates_c
RUN mkdir /templates_c/cache_c && chmod 777 /templates_c/cache_c

WORKDIR /app

COPY run.sh /
RUN chmod +x /run.sh

COPY . /app

CMD ["/run.sh"]