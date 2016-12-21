delimiter $$
CREATE PROCEDURE bus_owner_get_account_details(IN mail varchar(100))
BEGIN
select owner.name,owner.account_num,total from bank_account,owner where owner.account_num=bank_account.account_num and email=mail;
END$$
delimiter $$
CREATE PROCEDURE bus_owner_get_password(IN mail varchar(100))
BEGIN
select password from owner where email=mail;
END$$
delimiter $$
CREATE PROCEDURE bus_owner_get_name(IN mail varchar(100))
BEGIN
select name from owner where email=mail;
END$$

delimiter ;