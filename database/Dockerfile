FROM mysql:5.6

ENV MYSQL_DATABASE orbis_db
ENV MYSQL_ROOT_PASSWORD root

COPY orbis_db.sql /docker-entrypoint-initdb.d/orbis_db.sql

RUN /entrypoint.sh mysqld & sleep 30 && killall mysqld
RUN rm /docker-entrypoint-initdb.d/orbis_db.sql

EXPOSE 3306