
CREATE TABLE categories
(
id int(11) NOT NULL AUTO_INCREMENT,
title VARCHAR(255) UNIQUE,
description TEXT,
status tinyint(4) NOT NULL DEFAULT 1,
updated_at TIMESTAMP  ON UPDATE CURRENT_TIMESTAMP,
created_at TIMESTAMP NOT NULL,
PRIMARY KEY (id)
);

CREATE TABLE characteristics
(
id int(11) NOT NULL AUTO_INCREMENT,
title VARCHAR(255) UNIQUE,
description TEXT,
status tinyint(4) NOT NULL DEFAULT 1,
updated_at TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
created_at TIMESTAMP NOT NULL,
PRIMARY KEY (id)
);

CREATE TABLE orders
(
id int(11) NOT NULL AUTO_INCREMENT,
updated_at TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
created_at TIMESTAMP NOT NULL,
PRIMARY KEY (id)
);

CREATE TABLE products
(
id int(11) NOT NULL AUTO_INCREMENT,
title VARCHAR(255) UNIQUE,
description TEXT,
image VARCHAR(255) NOT NULL,
price DECIMAL(10,2),
status tinyint(4) NOT NULL DEFAULT 1,
updated_at TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
created_at TIMESTAMP NOT NULL,
PRIMARY KEY (id)
);

CREATE TABLE order_itens
(
id int(11) NOT NULL AUTO_INCREMENT,
order_id int(11),
product_id int(11) NOT NULL,
price DECIMAL(10,2) NOT NULL,
quantity INTEGER NOT NULL,
total DECIMAL(10,2) NOT NULL,
status tinyint(4) NOT NULL DEFAULT 1,
updated_at TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
created_at TIMESTAMP NOT NULL,
PRIMARY KEY (id)
);

CREATE TABLE product_categories
(
id int(11) NOT NULL AUTO_INCREMENT,
product_id int(11) NOT NULL,
category_id int(11) NOT NULL,
updated_at TIMESTAMP  ON UPDATE CURRENT_TIMESTAMP,
created_at TIMESTAMP NOT NULL,
PRIMARY KEY (id)
);

CREATE TABLE product_characteristics
(
id int(11) NOT NULL AUTO_INCREMENT,
product_id int(11) NOT NULL,
characteristic_id int(11) NOT NULL,
updated_at TIMESTAMP  ON UPDATE CURRENT_TIMESTAMP,
created_at TIMESTAMP NOT NULL,
PRIMARY KEY (id)
);

ALTER TABLE order_itens ADD FOREIGN KEY order_id_idxfk (order_id) REFERENCES orders (id);

ALTER TABLE order_itens ADD FOREIGN KEY product_id_idxfk (product_id) REFERENCES products (id);

ALTER TABLE product_categories ADD FOREIGN KEY product_id_idxfk_1 (product_id) REFERENCES products (id);

ALTER TABLE product_categories ADD FOREIGN KEY category_id_idxfk (category_id) REFERENCES categories (id);

ALTER TABLE product_characteristics ADD FOREIGN KEY product_id_idxfk_2 (product_id) REFERENCES products (id);

ALTER TABLE product_characteristics ADD FOREIGN KEY characteristic_id_idxfk (characteristic_id) REFERENCES characteristics (id);

