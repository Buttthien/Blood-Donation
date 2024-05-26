DELIMITER //

CREATE TRIGGER after_account_insert
AFTER INSERT ON Account
FOR EACH ROW
BEGIN
    IF NEW.Function_Account = 'Hospital' THEN
        INSERT INTO Hospital_Account (ID_Account) VALUES (NEW.ID);
    END IF;
END;

//

DELIMITER ;
