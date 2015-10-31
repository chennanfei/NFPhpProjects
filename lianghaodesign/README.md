### start site ###
```
docker run -d --name lh -p 80:80 \
    -v /Users/ucdream/Github/NFPhpProjects/lianghaodesign:/app \
    -v /Users/ucdream/Sites/lianghaodesign/images:/uploaded_images \
    -e DATABASE_NAME=lianghao \
    -e DATABASE_HOST=192.168.59.103 \
    -e DATABASE_PASSWORD=lianghao \
    -e DATABASE_USER=root \
    index.alauda.cn/lianghaotech/lianghaosite:latest
```

### start database ###
```
docker run -d -p 3306:3306 --name lh_db \
    -e MYSQL_ROOT_PASSWORD=lianghao \
    -v  /Users/ucdream/Sites/lianghaodesign/data:/var/lib/mysql \
    mysql:5.7
```
