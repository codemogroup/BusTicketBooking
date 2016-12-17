INSERT INTO `admin`(`admin_id`, `name`, `nic`, `telephone`, `address`, `email`, `password`) VALUES ('ad1','a1','4589658745V','0771597856','156/B,colombo,srilanka','ad1@gmail.com','ad1@123');
INSERT INTO `admin`(`admin_id`, `name`, `nic`, `telephone`, `address`, `email`, `password`) VALUES ('ad2','ad2','4589858785V','0711597946','19/C,ampara,srilanka','ad2@gmail.com','ad2@123');

INSERT INTO `bank_account`(`account_num`, `total`) VALUES ('bank1',1000);
INSERT INTO `bank_account`(`account_num`, `total`) VALUES ('bank2',8000);
INSERT INTO `bank_account`(`account_num`, `total`) VALUES ('bank3',7000);
INSERT INTO `bank_account`(`account_num`, `total`) VALUES ('bank4',6000);
INSERT INTO `bank_account`(`account_num`, `total`) VALUES ('bank5',5000);

INSERT INTO `main_stations`(`station_id`, `station`) VALUES ('1','colombo');
INSERT INTO `main_stations`(`station_id`, `station`) VALUES ('2','gampaha');
INSERT INTO `main_stations`(`station_id`, `station`) VALUES ('3','kaluthara');
INSERT INTO `main_stations`(`station_id`, `station`) VALUES ('4','kandy');
INSERT INTO `main_stations`(`station_id`, `station`) VALUES ('5','galle');
INSERT INTO `main_stations`(`station_id`, `station`) VALUES ('6','matara');
INSERT INTO `main_stations`(`station_id`, `station`) VALUES ('7','ampara');
INSERT INTO `main_stations`(`station_id`, `station`) VALUES ('8','trinko');
INSERT INTO `main_stations`(`station_id`, `station`) VALUES ('9','jaffna');

INSERT INTO `customer`(`customer_id`, `name`, `nic`, `telephone`, `address`, `email`) VALUES ('cuz1','kamal','5678956231v','0754589784','41/a,gampaha,srilanka','kamal@gmail.com');
INSERT INTO `customer`(`customer_id`, `name`, `nic`, `telephone`, `address`, `email`) VALUES ('cuz2','namal','5676356231v','0726532148','96/c,gampaha,srilanka','namal@gmail.com');
INSERT INTO `customer`(`customer_id`, `name`, `nic`, `telephone`, `address`, `email`) VALUES ('cuz3','jagath','7854263157v','0786523145','5/l,miriswatta,srilanka','jagath@gmail.com');
INSERT INTO `customer`(`customer_id`, `name`, `nic`, `telephone`, `address`, `email`) VALUES ('cuz4','damith','7854741157v','078965145','51/k,galle,srilanka','damith@gmail.com');

INSERT INTO `route`(`route_id`, `route_no`, `first_station_id`, `second_station_id`) VALUES ('r1','1','1','2');
INSERT INTO `route`(`route_id`, `route_no`, `first_station_id`, `second_station_id`) VALUES ('r2','2','1','3');
INSERT INTO `route`(`route_id`, `route_no`, `first_station_id`, `second_station_id`) VALUES ('r3','3','1','4');
INSERT INTO `route`(`route_id`, `route_no`, `first_station_id`, `second_station_id`) VALUES ('r4','4','1','5');
INSERT INTO `route`(`route_id`, `route_no`, `first_station_id`, `second_station_id`) VALUES ('r5','5','1','6');

INSERT INTO `owner`(`owner_id`, `name`, `nic`, `telephone`, `address`, `email`, `password`, `account_num`) VALUES ('ow1','buskasun','7854268985v','0775658964','78/n,dunagaha,gampaha','buskasun@gmail.com','buskasun@123','bank1');
INSERT INTO `owner`(`owner_id`, `name`, `nic`, `telephone`, `address`, `email`, `password`, `account_num`) VALUES ('ow2','buskalum','8564726314v','0713598964','7/h,polgahalanda,vatinapaha','buskalum@gmail.com','buskalum@123','bank2');
INSERT INTO `owner`(`owner_id`, `name`, `nic`, `telephone`, `address`, `email`, `password`, `account_num`) VALUES ('ow3','bussunil','7854266474v','0762541358','78,kuliyapitiya,kurunegala','bussunil@gmail.com','bussunil@123','bank2');
INSERT INTO `owner`(`owner_id`, `name`, `nic`, `telephone`, `address`, `email`, `password`, `account_num`) VALUES ('ow4','busranjith','7896532415v','0725632148','86/j,kaburupitiya,mathara','busranjith@gmail.com','busranjith@123','bank4');
INSERT INTO `owner`(`owner_id`, `name`, `nic`, `telephone`, `address`, `email`, `password`, `account_num`) VALUES ('ow5','busashen','7896532415v','0725686142','78/n,kadawatha,gampaha','busranjith@gmail.com','busranjith@123','bank5');

INSERT INTO `operator`(`operator_id`, `name`, `nic`, `telephone`, `address`, `email`, `password`, `station_id`) VALUES ('op1','opkamal','7853214569v','0117568952','11c,mathara,srilanka','opkamal@gmail.com','opkamal@123','1');
INSERT INTO `operator`(`operator_id`, `name`, `nic`, `telephone`, `address`, `email`, `password`, `station_id`) VALUES ('op2','opnipun','7853269895v','0115864652','1/n,galle,srilanka','opnipun@gmail.com','opnipun@123','2');
INSERT INTO `operator`(`operator_id`, `name`, `nic`, `telephone`, `address`, `email`, `password`, `station_id`) VALUES ('op3','opsadun','7853787879v','0117575632','16a,mathara,srilanka','opsadun@gmail.com','opsadun@123','3');
INSERT INTO `operator`(`operator_id`, `name`, `nic`, `telephone`, `address`, `email`, `password`, `station_id`) VALUES ('op4','oplal','7853632569v','0117569985','11cmathara,srilanka','oplal@gmail.com','oplal@123','4');

INSERT INTO `bus`(`bus_id`, `type`, `no_of_seats`, `seats_for_booking`, `owner_id`, `route_id`) VALUES ('bus1','luxury','60','20','ow1','r1');
INSERT INTO `bus`(`bus_id`, `type`, `no_of_seats`, `seats_for_booking`, `owner_id`, `route_id`) VALUES ('bus2','semiluxury','60','30','ow2','r2');
INSERT INTO `bus`(`bus_id`, `type`, `no_of_seats`, `seats_for_booking`, `owner_id`, `route_id`) VALUES ('bus3','normal','55','20','ow3','r3');
INSERT INTO `bus`(`bus_id`, `type`, `no_of_seats`, `seats_for_booking`, `owner_id`, `route_id`) VALUES ('bus4','luxury','60','15','ow4','r4');

INSERT INTO `journey`(`journey_id`, `direction`, `time`, `unavailable_days`, `bus_id`, `route_id`) VALUES ('j1','1','9:00',"sunday",'bus1','r1');
INSERT INTO `journey`(`journey_id`, `direction`, `time`, `unavailable_days`, `bus_id`, `route_id`) VALUES ('j2','1','12:00',"sunday",'bus1','r1');
INSERT INTO `journey`(`journey_id`, `direction`, `time`, `unavailable_days`, `bus_id`, `route_id`) VALUES ('j3','1','15:00',"sunday",'bus1','r1');
INSERT INTO `journey`(`journey_id`, `direction`, `time`, `unavailable_days`, `bus_id`, `route_id`) VALUES ('j4','1','18:00',"sunday",'bus1','r1');
INSERT INTO `journey`(`journey_id`, `direction`, `time`, `unavailable_days`, `bus_id`, `route_id`) VALUES ('j5','1','21:00',"sunday",'bus1','r1');
INSERT INTO `journey`(`journey_id`, `direction`, `time`, `unavailable_days`, `bus_id`, `route_id`) VALUES ('j6','0','10:30',"sunday",'bus1','r1');
INSERT INTO `journey`(`journey_id`, `direction`, `time`, `unavailable_days`, `bus_id`, `route_id`) VALUES ('j7','0','13:30',"sunday",'bus1','r1');
INSERT INTO `journey`(`journey_id`, `direction`, `time`, `unavailable_days`, `bus_id`, `route_id`) VALUES ('j8','0','16:30',"sunday",'bus1','r1');
INSERT INTO `journey`(`journey_id`, `direction`, `time`, `unavailable_days`, `bus_id`, `route_id`) VALUES ('j9','0','19:30',"sunday",'bus1','r1');
INSERT INTO `journey`(`journey_id`, `direction`, `time`, `unavailable_days`, `bus_id`, `route_id`) VALUES ('j10','0','22:30',"sunday",'bus1','r1');

INSERT INTO `intermediate`(`intermediate_id`, `station`, `route_id`) VALUES ('inter1','colombo','r1');
INSERT INTO `intermediate`(`intermediate_id`, `station`, `route_id`) VALUES ('inter2','kadawatha','r1');
INSERT INTO `intermediate`(`intermediate_id`, `station`, `route_id`) VALUES ('inter3','kiribathgoda','r1');
INSERT INTO `intermediate`(`intermediate_id`, `station`, `route_id`) VALUES ('inter4','nugegoda','r1');
INSERT INTO `intermediate`(`intermediate_id`, `station`, `route_id`) VALUES ('inter5','miriswatta','r1');
INSERT INTO `intermediate`(`intermediate_id`, `station`, `route_id`) VALUES ('inter6','gampaha','r1');

INSERT INTO `bus_fee`(`price_id`, `price_normal`, `price_highway`) VALUES ('p1','10','15');
INSERT INTO `bus_fee`(`price_id`, `price_normal`, `price_highway`) VALUES ('p2','12','20');
INSERT INTO `bus_fee`(`price_id`, `price_normal`, `price_highway`) VALUES ('p3','15','18');
INSERT INTO `bus_fee`(`price_id`, `price_normal`, `price_highway`) VALUES ('p4','18','33');
INSERT INTO `bus_fee`(`price_id`, `price_normal`, `price_highway`) VALUES ('p5','21','36');
INSERT INTO `bus_fee`(`price_id`, `price_normal`, `price_highway`) VALUES ('p6','25','40');

INSERT INTO `fare`(`fare_id`, `route_id`, `intermediate_id_1`, `intermediate_id_2`, `price_id`) VALUES ('f1','r1','inter1','inter2','p1');
INSERT INTO `fare`(`fare_id`, `route_id`, `intermediate_id_1`, `intermediate_id_2`, `price_id`) VALUES ('f2','r1','inter1','inter3','p2');
INSERT INTO `fare`(`fare_id`, `route_id`, `intermediate_id_1`, `intermediate_id_2`, `price_id`) VALUES ('f3','r1','inter1','inter4','p3');
INSERT INTO `fare`(`fare_id`, `route_id`, `intermediate_id_1`, `intermediate_id_2`, `price_id`) VALUES ('f4','r1','inter1','inter5','p4');
INSERT INTO `fare`(`fare_id`, `route_id`, `intermediate_id_1`, `intermediate_id_2`, `price_id`) VALUES ('f5','r1','inter1','inter6','p5');

INSERT INTO `booking`(`booking_id`, `date`, `seats`, `bus_id`, `journey_id`, `fare_id`, `customer_id`) VALUES ('book1','2016/12/20','4,5,6','bus1','j1','f3','cuz1');
INSERT INTO `booking`(`booking_id`, `date`, `seats`, `bus_id`, `journey_id`, `fare_id`, `customer_id`) VALUES ('book2','2016/12/20','7,8,9','bus1','j1','f4','cuz2');
INSERT INTO `booking`(`booking_id`, `date`, `seats`, `bus_id`, `journey_id`, `fare_id`, `customer_id`) VALUES ('book3','2016/12/20','10,11,12','bus1','j1','f5','cuz3');
INSERT INTO `booking`(`booking_id`, `date`, `seats`, `bus_id`, `journey_id`, `fare_id`, `customer_id`) VALUES ('book4','2016/12/20','13,14','bus1','j1','f5','cuz4');

INSERT INTO `transaction`(`transaction_id`, `booking_id`, `amount`, `transfered`) VALUES ('trans1','book1','45','1');
INSERT INTO `transaction`(`transaction_id`, `booking_id`, `amount`, `transfered`) VALUES ('trans2','book2','54','0');
INSERT INTO `transaction`(`transaction_id`, `booking_id`, `amount`, `transfered`) VALUES ('trans3','book3','63','0');
INSERT INTO `transaction`(`transaction_id`, `booking_id`, `amount`, `transfered`) VALUES ('trans4','book4','42','0');
