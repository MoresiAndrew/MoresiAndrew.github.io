SET PASSWORD FOR 'root'@'localhost' = PASSWORD('andrew');


-- create a regular user so you don't use the admin user from the website
CREATE USER 'ec2-user'@'localhost' IDENTIFIED BY 'andrew';

GRANT SELECT, INSERT, UPDATE ON CS2830.* TO 'ec2-user'@'localhost';


create table users (
id int primary key auto_increment,
username varchar(255) not null unique,
password text not null, 
addDate datetime,
changeDate datetime
); 

INSERT INTO users (username, password, addDate, changeDate) VALUES ('andrew', 'andrew', now(), now() ); 

select * from users; 

update users set password = sha1(password), changeDate = now() where id = 1;  

INSERT INTO users (username, password, addDate, changeDate) VALUES ('test', sha1('pass'), now(), now() ); 

insert into users (username, password, addDate, changeDate) values ('guest', sha1('guest'), now(), now() ); 


