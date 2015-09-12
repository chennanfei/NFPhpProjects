#!/bin/bash
chown www-data:www-data /app -R

if [ "$ALLOW_OVERRIDE" = "**False**" ]; then
    unset ALLOW_OVERRIDE
else
    sed -i "s/AllowOverride None/AllowOverride All/g" /etc/apache2/apache2.conf
    a2enmod rewrite
fi

source /etc/apache2/envvars

sass assets/css/aggregator.scss assets/css/page.css

# start cron daemon
cron start

tail -F /var/log/apache2/* &
exec apache2 -D FOREGROUND