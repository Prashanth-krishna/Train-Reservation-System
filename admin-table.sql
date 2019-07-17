use bus_rev;

create table siteuser
(
username varchar(30) primary key,
pwd varchar(50),
dob date,
gender varchar(6),
hintq varchar(255),
hinta varchar(255),
emailadd varchar(50),
smsno varchar(15),
role varchar(20)
);
insert into siteuser values('admin','admin','1989-12-4','male','Be','php','admin@gmail.com','8602768216','admin');