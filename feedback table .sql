use bus_rev;
create table feedback
(
feedbackid int(5) primary key auto_increment,
name varchar(30),
mobileno varchar(30),
email varchar(30),
date varchar(30),
ymsg varchar(200)
);

insert into feedback values('','pankaj','8602768216','pankaj@gmail.com','12-12-2013','welcome');