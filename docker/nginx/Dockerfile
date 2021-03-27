FROM nginx:1.19.8-alpine

WORKDIR /app

HEALTHCHECK --timeout=10s --start-period=3s CMD nc -z localhost 80

COPY ./default.conf /etc/nginx/conf.d/

RUN nginx -V