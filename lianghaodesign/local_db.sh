#!/bin/bash

docker run -d -p 3306:3306 --name lh_db \
    -e MYSQL_ROOT_PASSWORD=lianghao \
    -v /Users/ucdream/Sites/lianghaodesign/data/volume:/var/lib/mysql \
    mysql:5.7
