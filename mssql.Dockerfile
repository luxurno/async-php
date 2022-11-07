FROM mcr.microsoft.com/mssql/server:2017-latest

# Installing Microsoft deps
RUN apt-get update
RUN apt-get install curl gnupg -y

RUN curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add -
RUN curl https://packages.microsoft.com/config/ubuntu/18.04/prod.list | tee /etc/apt/sources.list.d/msprod.list

RUN apt-get update
RUN apt-get install mssql-tools unixodbc-dev -y
