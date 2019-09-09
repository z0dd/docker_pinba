FROM centos:7

RUN yum -y install systemd; yum clean all; \
(cd /lib/systemd/system/sysinit.target.wants/; for i in *; do [ $i == systemd-tmpfiles-setup.service ] || rm -f $i; done); \
rm -f /lib/systemd/system/multi-user.target.wants/*;\
rm -f /etc/systemd/system/*.wants/*;\
rm -f /lib/systemd/system/local-fs.target.wants/*; \
rm -f /lib/systemd/system/sockets.target.wants/*udev*; \
rm -f /lib/systemd/system/sockets.target.wants/*initctl*; \
rm -f /lib/systemd/system/basic.target.wants/*;\
rm -f /lib/systemd/system/anaconda.target.wants/*;

RUN yum install -y wget curl git

# php
RUN yum install -y epel-release yum-utils
RUN yum install -y http://rpms.remirepo.net/enterprise/remi-release-7.rpm
RUN yum-config-manager --enable remi-php73
RUN yum install -y php-cli php-fpm

# pinba extension for php
RUN yum install -y php-pinba

# pinba-server
RUN cd /opt/ && git clone https://github.com/pinba-server/pinba-server.git && cd pinba-server && php composer.phar install && \
    cp systemd/pinba-server.service /usr/lib/systemd/system/pinba-server.service && \
    sed -i 's|User=www-data|User=nginx|g' /usr/lib/systemd/system/pinba-server.service

# protobuf & libevent
RUN yum -y install php-pecl-protobuf php-pecl-event php-posix

CMD ["/bin/bash"]

#systemctl daemon-reload
#systemctl enable pinba-server clickhouse-server grafana-server pinba-server php7.3-fpm
#systemctl restart clickhouse-server grafana-server pinba-server php7.3-fpm