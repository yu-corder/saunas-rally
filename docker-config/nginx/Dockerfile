 FROM alpine:3.24
 RUN apk update && \
     apk add --no-cache nginx
 RUN mkdir -p /run/nginx
 CMD nginx -g "daemon off;"