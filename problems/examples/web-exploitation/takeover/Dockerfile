FROM php:latest
WORKDIR /challenge

ENV USERNAME=admin
ENV SALT=\$6\$2Ib78Dhu1@1h\$
ENV PASSWORD_HASH=\$6\$2Ib78Dhu1@1h\$wKpd/LchWk7m8tgbay0RTjoMqXDoEI4h6aTGfZtM0cLxiR.Dx910ePUprPHGy8kq.6s985r2VAPcmy/mFg2.r1

COPY html /challenge/html
COPY start.sh /challenge/start.sh
EXPOSE 5555
CMD sh /challenge/start.sh