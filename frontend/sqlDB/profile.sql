use webapp;

create table profile 
(
    userid int primary key auto_increment,
    name VARCHAR(40) not null,
    email VARCHAR(40) not null,
    password VARCHAR(40) not null,
    contact_number int not null,
    address VARCHAR(40) not null,
);