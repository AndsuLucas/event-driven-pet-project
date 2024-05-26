FROM nginx:stable-alpine

ARG UID
ARG GID

ENV UID=1000
ENV GID=1000

RUN addgroup -g ${GID} --system phpuser
RUN adduser -G phpuser --system -D -s /bin/sh -u ${UID} phpuser
RUN sed -i "s/user  nginx/user phpuser/g" /etc/nginx/nginx.conf

ADD ./nginx/default.conf /etc/nginx/conf.d/

RUN mkdir -p /var/www/html