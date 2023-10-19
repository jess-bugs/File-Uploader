


In order to avoid SQL server errors, make sure that the 'bugs'@'localhost' or 'bugs'@'server_ip' has the privilege to execute SQL queries to the specific  database on the server.

> sudo mysql -u root -p
[type password]
> create account 'bugs'@'192.168.1.14' identified by 'password';
> grant all on database.* to 'bugs'@'192.168.1.14';


