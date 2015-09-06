FROM tutum/apache-php:latest

RUN apt-get update && apt-get install -y ruby2.0
RUN gem list && gem install -y sass

ENV SMARTY_COMPILE_DIR /templates_c
ENV SMARTY_COMPILE_CACHE_DIR /templates_c/cache_c

RUN mkdir /templates_c && chmod 777 /templates_c
RUN mkdir /templates_c/cache_c && chmod 777 /templates_c/cache_c

COPY run.sh /
RUN chmod +x /run.sh
CMD ["/run.sh"]

WORKDIR /app
RUN mkdir /uploaded_images && chmod 777 /uploaded_images
RUN ln -s /uploaded_images
VOLUME /uploaded_images

COPY . /app
