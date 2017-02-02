
CREATE TABLE district (
id INT NOT NULL AUTO_INCREMENT,  
district_name VARCHAR(50) NOT NULL, 
PRIMARY KEY (id)
);

CREATE TABLE bts_name (
id INT NOT NULL AUTO_INCREMENT,
bts_site_name CHAR(50) NOT NULL,
PRIMARY KEY (id)
);

CREATE TABLE identification (
id INT NOT NULL AUTO_INCREMENT,
consumer_id INT(25) NOT NULL,
computer_id INT(25) NOT NULL,
district INT NOT NULL,
bts_name INT NOT NULL,    
PRIMARY KEY (id),
FOREIGN KEY (district) 
	REFERENCES district(id) 
	ON DELETE CASCADE 
	ON UPDATE CASCADE,
FOREIGN KEY (bts_name) 
	REFERENCES bts_name(id) 
	ON DELETE CASCADE 
	ON UPDATE CASCADE	
);

CREATE TABLE monthly_charges ( 
id INT NOT NULL AUTO_INCREMENT, 
date DATE NULL,
district INT NOT NULL, 
bts_name INT NOT NULL,
month CHAR(25) NOT NULL,
monthly_bill INT(25) NOT NULL,  
other_charge INT(25) NULL, 
penalty INT(25) NULL, 
rebate INT(25) NULL, 
excess_amount INT(25) NULL, 
total_bill_amount BIGINT NOT NULL, 
advance INT(25) NULL, 
total_payment_amount BIGINT NOT NULL, 
PRIMARY KEY (id), 
FOREIGN KEY (district) 
	REFERENCES district(id) 
	ON DELETE CASCADE 
	ON UPDATE CASCADE,
FOREIGN KEY (bts_name) 
	REFERENCES bts_name(id) 
	ON DELETE CASCADE 
	ON UPDATE CASCADE	
); 
    
    