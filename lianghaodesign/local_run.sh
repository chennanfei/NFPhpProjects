#!/bin/bash

docker run -d --name lh -p 80:80 \
    -v /Users/ucdream/Github/NFPhpProjects/lianghaodesign:/app \
    -v /Users/ucdream/Sites/lianghaodesign/images:/uploaded_images \
    -e DATABASE_NAME=lianghao \
    -e DATABASE_HOST=192.168.59.103 \
    -e DATABSE_PORT=3306 \
    -e DATABASE_PASSWORD= \
    -e DATABASE_USER=root \
    index.alauda.cn/lianghaotech/lianghaosite:dev
