drop function operator_get_customer_count;
delimiter $$
CREATE FUNCTION operator_get_customer_count(id INT, pw VARCHAR(50))
RETURNS INT
BEGIN
RETURN(select count(operator_id) from operator  where operator_id=id and password=pw);
END$$
delimiter ;

drop VIEW if exists station1;
drop VIEW if exists station2;
drop VIEW if exists busfare;
CREATE VIEW station1 AS SELECT station as station1, intermediate_id_1,fare_id FROM intermediate join fare on fare.intermediate_id_1=intermediate.intermediate_id;
CREATE VIEW station2 AS SELECT station as station2, intermediate_id_2,fare_id FROM intermediate join fare on fare.intermediate_id_2=intermediate.intermediate_id;
CREATE VIEW busfare AS SELECT fare_id, price_normal,price_highway FROM bus_fee join fare on fare.price_id=bus_fee.price_id;
