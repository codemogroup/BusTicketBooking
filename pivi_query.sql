delimiter $$
CREATE PROCEDURE get_customer_id(IN booking_id INT)
BEGIN
SELECT customer_id from booking where booking.booking_id=booking_id;
END$$

CREATE PROCEDURE get_cus_id(IN nic varchar(20))
BEGIN
SELECT customer_id from customer where customer.nic=nic;
END$$


CREATE PROCEDURE booking_result(IN id INT)
BEGIN
select distinct(booking_id),date,seats,bus.type,bus_fee.price_normal,bus_fee.price_highway,journey.direction,station,temp.end_station from booking,bus,fare,bus_fee,intermediate,journey,(select distinct(booking_id) as id,station as end_station from booking,fare,intermediate where customer_id=id and  booking.fare_id=fare.fare_id and  fare.intermediate_id_2=intermediate.intermediate_id and(booking.status=0 or booking.status=1)) as temp where customer_id=id and booking.bus_id=bus.bus_id and booking.fare_id=fare.fare_id and bus_fee.price_id=fare.price_id and fare.intermediate_id_1=intermediate.intermediate_id and booking.journey_id=journey.journey_id and booking_id=temp.id and (booking.status=0 or booking.status=1);
END$$

delimiter $$
CREATE FUNCTION customer_get_customer_count1(id varchar(11))
RETURNS INT
BEGIN
RETURN(select count(customer_id) from customer  where nic=id);
END$$

CREATE TRIGGER customer_check
BEFORE INSERT ON customer
FOR EACH ROW
BEGIN
IF NEW.address='' THEN
SET NEW.address=null;
END IF;
END$$

DELIMITER ;
CREATE INDEX type_index
ON bus(type)

CREATE INDEX intermediate_index
ON intermediate(route_id)

CREATE INDEX intermediate_index
ON intermediate(route_id)
