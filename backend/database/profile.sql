use webapp;

create table profile {
    userid int primary key,
    name VARCHAR(40) not null,
    email VARCHAR(40) not null,
    password VARCHAR(255) not null,
    contact_number VARCHAR(40) not null,
    address VARCHAR(40) not null,
}