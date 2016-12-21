delimiter $$
CREATE PROCEDURE get_operator_result(IN nic varchar(11))
BEGIN
select booking.booking_id,booking.date,booking.seats ,booking.status,customer.name,customer.nic ,bus.number_plate,bus.type,journey.direction, journey.time,station1.station1, station2.station2, busfare.price_normal,busfare.price_highway
                  from booking
                  join customer on booking.customer_id=customer.customer_id
                  join bus on booking.bus_id=bus.bus_id
                  join journey on booking.journey_id=journey.journey_id
                  join station1 on booking.fare_id= station1.fare_id
                  join station2 on booking.fare_id= station2.fare_id
                  join busfare on booking.fare_id= busfare.fare_id
                  where customer.nic =nic;
END$$
delimiter $$
CREATE FUNCTION operator_get_customer_count(id INT)
RETURNS INT
BEGIN
RETURN(select count(operator_id) from operator  where operator_id=id);
END$$
delimiter ;