drop database x;
create database x;
use x;

CREATE TABLE bank_account
(
    account_num VARCHAR(15) PRIMARY KEY NOT NULL,
    total DOUBLE
);

CREATE TABLE main_stations
(
    station_id  INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    station     VARCHAR(100) NOT NULL
);

CREATE TABLE route
(
    route_id    VARCHAR(10) PRIMARY KEY NOT NULL,
    route_no    VARCHAR(15) NOT NULL,
    first_station_id INT,
    second_station_id INT,
    FOREIGN KEY (first_station_id)  REFERENCES main_stations(station_id) ON UPDATE CASCADE,
    FOREIGN KEY (second_station_id) REFERENCES main_stations(station_id) ON UPDATE CASCADE
);

CREATE TABLE intermediate
(
    intermediate_id VARCHAR(10) PRIMARY KEY NOT NULL,
    station         VARCHAR(100) NOT NULL,
    route_id        VARCHAR(10) NOT NULL,
    FOREIGN KEY (route_id) REFERENCES route(route_id) ON UPDATE CASCADE

);

CREATE TABLE owner
(
    owner_id    VARCHAR(15) PRIMARY KEY NOT NULL,
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
    admin_id    VARCHAR(15) PRIMARY KEY NOT NULL,
    name        VARCHAR(150) NOT NULL,
    nic         VARCHAR(11) NOT NULL,
    telephone   VARCHAR(11) NOT NULL,
    address     VARCHAR(250) NOT NULL,
    email       VARCHAR(100),
    password    VARCHAR(50) NOT NULL
);

CREATE TABLE operator
(
    admin_id    VARCHAR(15) PRIMARY KEY NOT NULL,
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
    customer_id VARCHAR(15) PRIMARY KEY NOT NULL,
    name        VARCHAR(150) NOT NULL,
    nic         VARCHAR(11) NOT NULL,
    telephone   VARCHAR(11) NOT NULL,
    address     VARCHAR(250) NOT NULL,
    email       VARCHAR(100)
);

CREATE TABLE bus
(
    bus_id              VARCHAR(15) PRIMARY KEY NOT NULL,
    type                VARCHAR(50) NOT NULL,
    no_of_seats         INT NOT NULL,
    seats_for_booking   INT,
    owner_id            VARCHAR(15) NOT NULL,
    route_id            VARCHAR(10) NOT NULL,
    FOREIGN KEY (owner_id) REFERENCES owner(owner_id) ON UPDATE CASCADE,
    FOREIGN KEY (route_id) REFERENCES route(route_id) ON UPDATE CASCADE
);

CREATE TABLE journey
(
    journey_id          VARCHAR(15) PRIMARY KEY NOT NULL,
    direction           BOOLEAN NOT NULL,
    time                DATETIME NOT NULL,
    unavailable_days    VARCHAR(80),
    bus_id              VARCHAR(15) NOT NULL,
    route_id            VARCHAR(15) NOT NULL,
    FOREIGN KEY (bus_id)    REFERENCES bus(bus_id),
    FOREIGN KEY (route_id)  REFERENCES route(route_id)
);

CREATE TABLE bus_fee
(
    price_id        VARCHAR(10) PRIMARY KEY,
    price_normal    DOUBLE NOT NULL,
    price_highway   DOUBLE NOT NULL
);

CREATE TABLE fare
(
    fare_id           VARCHAR(15) PRIMARY KEY NOT NULL,
    route_id          VARCHAR(10) NOT NULL,
    intermediate_id_1 VARCHAR(10),
    intermediate_id_2 VARCHAR(10),
    price_id          VARCHAR(10),
    FOREIGN KEY (route_id)          REFERENCES route(route_id),
    FOREIGN KEY (intermediate_id_1) REFERENCES intermediate(intermediate_id),
    FOREIGN KEY (intermediate_id_2) REFERENCES intermediate(intermediate_id),
    FOREIGN KEY (price_id)          REFERENCES bus_fee(price_id)
);

CREATE TABLE booking
(
    booking_id      VARCHAR(15) PRIMARY KEY NOT NULL,
    date            DATETIME    NOT NULL,
    seats           VARCHAR(15) NOT NULL,
    bus_id          VARCHAR(15) NOT NULL,
    journey_id      VARCHAR(15) NOT NULL ,
    fare_id         VARCHAR(15) NOT NULL ,
    customer_id     VARCHAR(15) NOT NULL ,
    FOREIGN KEY (journey_id)    REFERENCES journey(journey_id),
    FOREIGN KEY (customer_id)   REFERENCES customer(customer_id),
    FOREIGN KEY (fare_id)       REFERENCES fare(fare_id)
);

CREATE TABLE transaction
(
    transaction_id  VARCHAR(15) PRIMARY KEY NOT NULL ,
    booking_id      VARCHAR(15) NOT NULL ,
    amount          DOUBLE,
    transfered      BOOLEAN,
    FOREIGN KEY (booking_id) REFERENCES booking(booking_id)
);
