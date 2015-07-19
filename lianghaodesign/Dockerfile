FROM tutum/apache-php:latest

ENV SMARTY_COMPILE_DIR /templates_c
ENV SMARTY_COMPILE_CACHE_DIR /templates_c/cache_c

RUN mkdir /templates_c && chmod 777 /templates_c
RUN mkdir /templates_c/cache_c && chmod 777 /templates_c/cache_c

COPY . /app
