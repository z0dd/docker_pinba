# docker_pinba
simple example of use pinba in docker with clickhouse and grafana.

Docker remaster of https://github.com/pinba-server/pinba-server.

## Pinba server
```sh
git clone
update your docker-compose.yml
docker-compose up -d
````

visit http://your_grafana:3000

## PHP Pinba client
Install pinba in app server:
apt -y install php-pinba
edit your /mods-available/pinba.ini
```sh
extension=pinba.so
pinba.enabled=1
pinba.server=pinba_server_url:30002
````


I strongly don't recommend use it in production.

### Pinba project (by tony2001 https://github.com/tony2001)
http://pinba.org/ 
https://github.com/tony2001/pinba_engine

### Pinba server (by Vladimir Goncharov https://github.com/morozovsk)
https://github.com/pinba-server
