INSERT INTO `admin`( `name`, `nic`, `telephone`, `address`, `email`, `password`) VALUES ('a1','4589658745V','0771597856','156/B,colombo,srilanka','ad1@gmail.com','ad1@123');
INSERT INTO `admin`(`name`, `nic`, `telephone`, `address`, `email`, `password`) VALUES ('ad2','4589858785V','0711597946','19/C,ampara,srilanka','ad2@gmail.com','ad2@123');

INSERT INTO `bank_account`(`account_num`, `total`) VALUES ('bank1',1000);
INSERT INTO `bank_account`(`account_num`, `total`) VALUES ('bank2',8000);
INSERT INTO `bank_account`(`account_num`, `total`) VALUES ('bank3',7000);
INSERT INTO `bank_account`(`account_num`, `total`) VALUES ('bank4',6000);
INSERT INTO `bank_account`(`account_num`, `total`) VALUES ('bank5',5000);

INSERT INTO `main_stations`(`station`) VALUES ('colombo');
INSERT INTO `main_stations`( `station`) VALUES ('gampaha');
INSERT INTO `main_stations`( `station`) VALUES ('kaluthara');
INSERT INTO `main_stations`( `station`) VALUES ('kandy');
INSERT INTO `main_stations`( `station`) VALUES ('galle');
INSERT INTO `main_stations`( `station`) VALUES ('matara');
INSERT INTO `main_stations`( `station`) VALUES ('ampara');
INSERT INTO `main_stations`( `station`) VALUES ('trinko');
INSERT INTO `main_stations`( `station`) VALUES ('jaffna');

INSERT INTO `customer`(`name`, `nic`, `telephone`, `address`) VALUES ('kamal','5678956231v','0754589784','41/a,gampaha,srilanka');
INSERT INTO `customer`( `name`, `nic`, `telephone`, `address`) VALUES ('namal','5676356231v','0726532148','96/c,gampaha,srilanka');
INSERT INTO `customer`(`name`, `nic`, `telephone`, `address`) VALUES ('jagath','7854263157v','0786523145','5/l,miriswatta,srilanka');
INSERT INTO `customer`( `name`, `nic`, `telephone`, `address`) VALUES ('damith','7854741157v','078965145','51/k,galle,srilanka');

INSERT INTO `route`( `route_no`, `first_station_id`, `second_station_id`) VALUES ('1','1','2');
INSERT INTO `route`(`route_no`, `first_station_id`, `second_station_id`) VALUES ('2','1','3');
INSERT INTO `route`( `route_no`, `first_station_id`, `second_station_id`) VALUES ('3','1','4');
INSERT INTO `route`( `route_no`, `first_station_id`, `second_station_id`) VALUES ('4','1','5');
INSERT INTO `route`( `route_no`, `first_station_id`, `second_station_id`) VALUES ('5','1','6');

INSERT INTO `owner`( `owner_id`,`name`, `nic`, `telephone`, `address`, `email`, `password`, `account_num`) VALUES ('ow1','buskasun','7854268985v','0775658964','78/n,dunagaha,gampaha','buskasun@gmail.com','buskasun@123','bank1');
INSERT INTO `owner`(`owner_id`,`name`, `nic`, `telephone`, `address`, `email`, `password`, `account_num`) VALUES ('ow2','buskalum','8564726314v','0713598964','7/h,polgahalanda,vatinapaha','buskalum@gmail.com','buskalum@123','bank2');
INSERT INTO `owner`( `owner_id`,`name`, `nic`, `telephone`, `address`, `email`, `password`, `account_num`) VALUES ('ow3','bussunil','7854266474v','0762541358','78,kuliyapitiya,kurunegala','bussunil@gmail.com','bussunil@123','bank2');
INSERT INTO `owner`(`owner_id`,`name`, `nic`, `telephone`, `address`, `email`, `password`, `account_num`) VALUES ('ow4','busranjith','7896532415v','0725632148','86/j,kaburupitiya,mathara','busranjith@gmail.com','busranjith@123','bank4');
INSERT INTO `owner`( `owner_id`,`name`, `nic`, `telephone`, `address`, `email`, `password`, `account_num`) VALUES ('ow5','busashen','7896532415v','0725686142','78/n,kadawatha,gampaha','busranjith@gmail.com','busranjith@123','bank5');

INSERT INTO `operator`( `name`, `nic`, `telephone`, `address`, `email`, `password`, `station_id`) VALUES ('opkamal','7853214569v','0117568952','11c,mathara,srilanka','opkamal@gmail.com','opkamal@123','1');
INSERT INTO `operator`( `name`, `nic`, `telephone`, `address`, `email`, `password`, `station_id`) VALUES ('opnipun','7853269895v','0115864652','1/n,galle,srilanka','opnipun@gmail.com','opnipun@123','2');
INSERT INTO `operator`( `name`, `nic`, `telephone`, `address`, `email`, `password`, `station_id`) VALUES ('opsadun','7853787879v','0117575632','16a,mathara,srilanka','opsadun@gmail.com','opsadun@123','3');
INSERT INTO `operator`(`name`, `nic`, `telephone`, `address`, `email`, `password`, `station_id`) VALUES ('oplal','7853632569v','0117569985','11cmathara,srilanka','oplal@gmail.com','oplal@123','4');

INSERT INTO `bus`( `type`, `no_of_seats`, `seats_for_booking`, `owner_id`, `route_id`) VALUES ('luxury','60','20','ow1','1');
INSERT INTO `bus`( `type`, `no_of_seats`, `seats_for_booking`, `owner_id`, `route_id`) VALUES ('semiluxury','60','30','ow2','2');
INSERT INTO `bus`( `type`, `no_of_seats`, `seats_for_booking`, `owner_id`, `route_id`) VALUES ('normal','55','20','ow3','3');
INSERT INTO `bus`( `type`, `no_of_seats`, `seats_for_booking`, `owner_id`, `route_id`) VALUES ('luxury','60','15','ow4','4');

INSERT INTO `journey`( `direction`, `time`, `unavailable_days`, `bus_id`, `route_id`) VALUES ('1','09:00:00',"sunday",'1','1');
INSERT INTO `journey`( `direction`, `time`, `unavailable_days`, `bus_id`, `route_id`) VALUES ('1','12:00:00',"sunday",'1','1');
INSERT INTO `journey`( `direction`, `time`, `unavailable_days`, `bus_id`, `route_id`) VALUES ('1','15:00:00',"sunday",'1','1');
INSERT INTO `journey`( `direction`, `time`, `unavailable_days`, `bus_id`, `route_id`) VALUES ('1','18:00:00',"sunday",'1','1');
INSERT INTO `journey`( `direction`, `time`, `unavailable_days`, `bus_id`, `route_id`) VALUES ('1','21:00:00',"sunday",'1','1');
INSERT INTO `journey`( `direction`, `time`, `unavailable_days`, `bus_id`, `route_id`) VALUES ('0','10:30:00',"sunday",'1','1');
INSERT INTO `journey`( `direction`, `time`, `unavailable_days`, `bus_id`, `route_id`) VALUES ('0','13:30:00',"sunday",'1','1');
INSERT INTO `journey`( `direction`, `time`, `unavailable_days`, `bus_id`, `route_id`) VALUES ('0','16:30:00',"sunday",'1','1');
INSERT INTO `journey`( `direction`, `time`, `unavailable_days`, `bus_id`, `route_id`) VALUES ('0','19:30:00',"sunday",'1','1');
INSERT INTO `journey`( `direction`, `time`, `unavailable_days`, `bus_id`, `route_id`) VALUES ('0','22:30:00',"sunday",'1','1');

INSERT INTO `intermediate`( `intermediate_id`,`station`, `route_id`) VALUES (1.01,'colombo','1');
INSERT INTO `intermediate`( `intermediate_id`,`station`, `route_id`) VALUES (1.02,'kadawatha','1');
INSERT INTO `intermediate`( `intermediate_id`,`station`, `route_id`) VALUES (1.03,'kiribathgoda','1');
INSERT INTO `intermediate`( `intermediate_id`,`station`, `route_id`) VALUES (1.04,'nugegoda','1');
INSERT INTO `intermediate`( `intermediate_id`,`station`, `route_id`) VALUES (1.05,'miriswatta','1');
INSERT INTO `intermediate`( `intermediate_id`,`station`, `route_id`) VALUES (1.06,'gampaha','1');

INSERT INTO `bus_fee`( `price_normal`, `price_highway`) VALUES ('10','15');
INSERT INTO `bus_fee`( `price_normal`, `price_highway`) VALUES ('12','20');
INSERT INTO `bus_fee`( `price_normal`, `price_highway`) VALUES ('15','18');
INSERT INTO `bus_fee`( `price_normal`, `price_highway`) VALUES ('18','33');
INSERT INTO `bus_fee`( `price_normal`, `price_highway`) VALUES ('21','36');
INSERT INTO `bus_fee`( `price_normal`, `price_highway`) VALUES ('25','40');

INSERT INTO `fare`( `route_id`, `intermediate_id_1`, `intermediate_id_2`, `price_id`) VALUES ('1','1.01','1.02','1');
INSERT INTO `fare`( `route_id`, `intermediate_id_1`, `intermediate_id_2`, `price_id`) VALUES ('1','1.01','1.03','2');
INSERT INTO `fare`( `route_id`, `intermediate_id_1`, `intermediate_id_2`, `price_id`) VALUES ('1','1.01','1.04','3');
INSERT INTO `fare`( `route_id`, `intermediate_id_1`, `intermediate_id_2`, `price_id`) VALUES ('1','1.01','1.05','4');
INSERT INTO `fare`( `route_id`, `intermediate_id_1`, `intermediate_id_2`, `price_id`) VALUES ('1','1.01','1.06','5');

INSERT INTO `booking`(`date`, `seats`, `no_of_seats`,`bus_id`, `journey_id`, `fare_id`, `customer_id`) VALUES ('2016/12/20',3,'4,5,6','1','1','3','1');
INSERT INTO `booking`( `date`, `seats`,`no_of_seats`,`bus_id`, `journey_id`, `fare_id`, `customer_id`) VALUES ('2016/12/20',3,'7,8,9','1','1','4','2');
INSERT INTO `booking`( `date`, `seats`,`no_of_seats`, `bus_id`, `journey_id`, `fare_id`, `customer_id`) VALUES ('2016/12/20',3,'10,11,12','1','1','5','3');
INSERT INTO `booking`(`date`, `seats`, `no_of_seats`,`bus_id`, `journey_id`, `fare_id`, `customer_id`) VALUES ('2016/12/20',2,'13,14','1','1','5','4');

INSERT INTO `transaction`( `booking_id`, `amount`, `transfered`) VALUES ('1','45','1');
INSERT INTO `transaction`( `booking_id`, `amount`, `transfered`) VALUES ('2','54','0');
INSERT INTO `transaction`( `booking_id`, `amount`, `transfered`) VALUES ('3','63','0');
INSERT INTO `transaction`( `booking_id`, `amount`, `transfered`) VALUES ('4','42','0');
