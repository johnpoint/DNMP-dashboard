#!/bin/bash

echo "面板域名"
read -p ">>" dom

git clone https://github.com/johnpoint/DNMP-dashboard
git clone https://github.com/BotoX/ServerStatus

cd ServerStatus/server
make
./sergate

cp DNMP-dashboard/web/* /web/vhost/${dom} -r

curl https://${dom}/install.php

