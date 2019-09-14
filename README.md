# docker_pinba
Simple start pinba in docker compose with clickhouse and grafana.

Docker compose remaster of https://github.com/pinba-server/pinba-server.

## Requirements
- Docker          version >=18.06
- docker-compose  version >=1.23.2
- git             version 2.7.4

## Installation
````
# clone repo
git clone https://github.com/z0dd/docker_pinba.git && cd cd docker_pinba
# create env file
cp .env.example .env
# start containers
docker-compose up -d
````
### Grafana
Visit 		http://localhost:3000

> [!NOTE]
> Login: admin
> Password: see in your .env

##### Add datasourse to Grafana
- Go to "Configuration" -> Data Sources
- Find Clickhouse
- Fill URL field like *http://clickhouse:8123*
- Press **Save & Test**

### Pinba client
For generate test data you should visit *http://localhost:13131*

> [!NOTE]
> You can change test app as you want in **/app**

### Clickhouse
You can check data in table by 
````docker exec clickhouse clickhouse-client -d pinba -q "select * from requests"````

> [!NOTE]
> Pinba server flush data to clickhouse every 60s.


#### Pinba project (by tony2001 https://github.com/tony2001)
http://pinba.org/ 
https://github.com/tony2001/pinba_engine

#### Pinba server (by Vladimir Goncharov https://github.com/morozovsk)
https://github.com/pinba-server