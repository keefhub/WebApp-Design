use webapp;

CREATE TABLE profile 
(
    userid int primary key auto_increment,
    name VARCHAR(40) not null,
    email VARCHAR(40) not null,
    password VARCHAR(40) not null,
    contact_number int not null,
    address VARCHAR(40) not null
);

CREATE TABLE inventory (
    itemid int,
    itemname VARCHAR(255),
    price float,
    sizeS int,
    sizeM int,
    sizeL int,
    brandid int,
    colourid int,
);

INSERT INTO inventory VALUES 
    (1, 'White shirt', 10, 12, 2, 4, 1, 4),
    (2, 'White shirt', 30, 12, 2, 4, 2, 4),
    (3, 'White shirt', 70, 12, 2, 4, 3, 4),
    (4, 'Black shirt', 10, 10, 2, 4, 1, 5),
    (5, 'Black shirt', 30, 5, 2, 4, 2, 5),
    (6, 'Black shirt', 70, 5, 2, 4, 3, 5),
    (7, 'White pants', 20, 0, 2, 23, 1, 4),
    (8, 'White pants', 55, 0, 2, 23, 2, 4),
    (9, 'White pants', 120, 0, 2, 23, 3, 4),
    (10, 'Black pants', 20, 18, 30, 4, 1, 5),
    (11, 'Black pants', 55, 14, 30, 4, 2, 5),
    (12, 'Black pants', 120, 12, 30, 4, 3, 5),
    (13, 'Red shirt', 40, 12, 0, 3, 2, 6),
    (14, 'Red shirt', 80, 12, 2, 3, 3, 6),
    (15, 'Green shirt', 30, 12, 2, 3, 2, 7),
    (16, 'Yellow shirt', 40, 12, 2, 3, 2, 8),
    (17, 'Blue shirt', 15, 3, 2, 0, 1, 9),
    (18, 'Blue shirt', 80, 12, 2, 3, 3, 9);