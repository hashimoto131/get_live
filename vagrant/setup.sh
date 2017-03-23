#!/bin/sh
sudo yum -y update
sudo yum -y install git
sudo yum -y install gcc make glibc-headers openssl-devel readline libyaml-devel readline-devel sqlite-devel wget expect zip unzip

sudo /sbin/iptables -F
sudo /sbin/service iptables stop
sudo /sbin/chkconfig iptables off

sudo yum -y install ntp
sudo /sbin/service ntpd start
sudo /sbin/chkconfig ntpd on

#install node.js
git clone git://github.com/creationix/nvm.git ~/.nvm
echo 'source ~/.nvm/nvm.sh' >> ~/.bash_profile
source ~/.nvm/nvm.sh
nvm install v6.7.0
npm install -g webpack bower phantomjs gulp coffee babel

#install php7
sudo yum -y remove php-*
sudo yum -y install epel-release
wget http://rpms.famillecollet.com/enterprise/remi-release-6.rpm
sudo rpm -Uvh remi-release-6*.rpm
sudo yum -y install --enablerepo=remi --enablerepo=remi-php70 php php-devel php-mbstring php-pdo php-gd php-mysqlnd php-openssl phpunit php-mcrypt

# sudo cp -a /vagrant/php.ini /etc/php.ini


sudo yum -y install httpd
sudo cp -a /vagrant/httpd.conf /etc/httpd/conf/
sudo service httpd start
sudo chkconfig httpd on
sudo chown -R vagrant:vagrant /var/www/html

#install mysql
sudo yum -y install http://repo.mysql.com/mysql-community-release-el6-4.noarch.rpm
sudo yum -y install mysql-community-server
sudo service mysqld start
sudo chkconfig mysqld on
mysql -u root -e "create database app default charset utf8"
mysql -u root -e "create database test default charset utf8"

#install composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /var/www/html/current
cd /var/www/html/current && php composer.phar install

# setting cakephp
# ここちゃんと動いてないかも・・・
# cd /var/www/html && bin/cake bake project app
# cd /var/www/html && expect -c "
# spawn bin/cake bake project app
# expect y
# send y
# exit 0
# "
cp -a /vagrant/database.php /var/www/html/current/app/config
cp -a /vagrant/core.php /var/www/html/current/app/config
cd /var/www/html/current/app/webroot && npm install

# # E-mail
# cp -a /vagrant/email.php /var/www/html/app/Config/email.php
# # Core
# cp -a /vagrant/core.php /var/www/html/app/Config/core.php
