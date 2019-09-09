FROM yandex/clickhouse-server

COPY ./tables/ /opt/clickhouse/

RUN cd /opt/ && service clickhouse-server restart && \
    clickhouse-client -n < clickhouse/pinba.requests.sql && \
    clickhouse-client -n < clickhouse/pinba.report_by_all.sql
