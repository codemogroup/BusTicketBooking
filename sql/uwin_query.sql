delimiter $$
CREATE FUNCTION ntc_get_user_count(id INT,pw VARCHAR(50) )
RETURNS INT
BEGIN
RETURN(select count(admin_id) from admin  where admin_id=id AND password=pw);
END$$
delimiter ;