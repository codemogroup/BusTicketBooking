drop database if exists ticketbookingDB;
create database ticketbookingDB;
use ticketbookingDB;

CREATE TABLE bank_account
(
    account_id  INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    account_num VARCHAR(15) NOT NULL UNIQUE,
    total DOUBLE
);

CREATE TABLE main_stations
(
    station_id  INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    station     VARCHAR(100) NOT NULL
);

CREATE TABLE route
(
    route_id    INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    route_no    VARCHAR(15) NOT NULL,
    first_station_id INT NOT NULL,
    second_station_id INT NOT NULL,
    FOREIGN KEY (first_station_id)  REFERENCES main_stations(station_id) ON UPDATE CASCADE,
    FOREIGN KEY (second_station_id) REFERENCES main_stations(station_id) ON UPDATE CASCADE
);

CREATE TABLE intermediate
(
    intermediate_id FLOAT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    station         VARCHAR(100) NOT NULL,
    route_id        INT NOT NULL,
    FOREIGN KEY (route_id) REFERENCES route(route_id) ON UPDATE CASCADE

);

CREATE TABLE owner
(
    owner_id    VARCHAR(11) PRIMARY KEY NOT NULL,
    name        VARCHAR(150) NOT NULL,
    nic         VARCHAR(11) NOT NULL,
    telephone   VARCHAR(11) NOT NULL,
    address     VARCHAR(250) NOT NULL,
    email       VARCHAR(100),
    password    VARCHAR(50) NOT NULL,
    account_num VARCHAR(15),
    FOREIGN KEY (account_num) REFERENCES bank_account(account_num) ON UPDATE CASCADE
);

CREATE TABLE admin
(
    admin_id    INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name        VARCHAR(150) NOT NULL,
    nic         VARCHAR(11) NOT NULL,
    telephone   VARCHAR(11) NOT NULL,
    address     VARCHAR(250) NOT NULL,
    email       VARCHAR(100),
    password    VARCHAR(50) NOT NULL
);

CREATE TABLE operator
(
    operator_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name        VARCHAR(150) NOT NULL,
    nic         VARCHAR(11) NOT NULL,
    telephone   VARCHAR(11) NOT NULL,
    address     VARCHAR(250) NOT NULL,
    email       VARCHAR(100),
    password    VARCHAR(50) NOT NULL,
    station_id  INT,
    FOREIGN KEY (station_id) REFERENCES main_stations(station_id) ON DELETE SET NULL ON UPDATE CASCADE
);

CREATE TABLE customer
(
    customer_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name        VARCHAR(150) NOT NULL,
    nic         VARCHAR(11) NOT NULL,
    telephone   VARCHAR(11) NOT NULL,
    address     VARCHAR(250) NOT NULL

);

CREATE TABLE bus
(
    bus_id              INT  PRIMARY KEY NOT NULL AUTO_INCREMENT,
    number_plate        VARCHAR(15) NOT NULL,
    type                VARCHAR(50) NOT NULL,
    no_of_seats         INT NOT NULL,
    seats_for_booking   INT,
    owner_id            VARCHAR(11) NOT NULL,
    route_id            INT NOT NULL,
    FOREIGN KEY (owner_id) REFERENCES owner(owner_id) ON UPDATE CASCADE,
    FOREIGN KEY (route_id) REFERENCES route(route_id) ON UPDATE CASCADE
);
CREATE TABLE bus_requests
(
    bus_id              INT  PRIMARY KEY NOT NULL AUTO_INCREMENT,
    number_plate        VARCHAR(15) NOT NULL,
    type                VARCHAR(50) NOT NULL,
    no_of_seats         INT NOT NULL,
    seats_for_booking   INT,
    owner_id            VARCHAR(11) NOT NULL,
    route_id            INT NOT NULL,
    FOREIGN KEY (owner_id) REFERENCES owner(owner_id) ON UPDATE CASCADE,
    FOREIGN KEY (route_id) REFERENCES route(route_id) ON UPDATE CASCADE
);

CREATE TABLE journey
(
    journey_id          INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    direction           BOOLEAN NOT NULL,
    time                TIME NOT NULL,
    unavailable_days    VARCHAR(80),
    bus_id              INT NOT NULL,
    route_id            INT NOT NULL,
    FOREIGN KEY (bus_id)    REFERENCES bus(bus_id),
    FOREIGN KEY (route_id)  REFERENCES route(route_id)
);

CREATE TABLE bus_fee
(
    price_id        INT PRIMARY KEY AUTO_INCREMENT,
    price_normal    DOUBLE NOT NULL,
    price_highway   DOUBLE NOT NULL
);

CREATE TABLE fare
(
    fare_id           INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    route_id          INT NOT NULL,
    intermediate_id_1 FLOAT NOT NULL,
    intermediate_id_2 FLOAT NOT NULL,
    price_id          INT NOT NULL,
    FOREIGN KEY (route_id)          REFERENCES route(route_id),
    FOREIGN KEY (intermediate_id_1) REFERENCES intermediate(intermediate_id),
    FOREIGN KEY (intermediate_id_2) REFERENCES intermediate(intermediate_id),
    FOREIGN KEY (price_id)          REFERENCES bus_fee(price_id)
);

CREATE TABLE booking
(
    booking_id      INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    date            DATE NOT NULL,
    seats           INT NOT NULL,
    no_of_seats     VARCHAR(50) NOT NULL,
    bus_id          INT NOT NULL,
    journey_id      INT NOT NULL ,
    fare_id         INT NOT NULL ,
    customer_id     INT NOT NULL ,
    status          INT,
    FOREIGN KEY (bus_id)        REFERENCES bus(bus_id),
    FOREIGN KEY (journey_id)    REFERENCES journey(journey_id),
    FOREIGN KEY (customer_id)   REFERENCES customer(customer_id),
    FOREIGN KEY (fare_id)       REFERENCES fare(fare_id)
);

CREATE TABLE transaction
(
    transaction_id  INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    booking_id      INT NOT NULL ,
    amount          DOUBLE NOT NULL,
    transfered      BOOLEAN,
    FOREIGN KEY (booking_id) REFERENCES booking(booking_id)
);
