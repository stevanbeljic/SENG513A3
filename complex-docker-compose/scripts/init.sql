-- Create users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(50) NOT NULL
);

/* create admin user */
INSERT INTO users (username, password, role) VALUES ('admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin');

INSERT INTO users (username, password, role) VALUES ('generic', '5f4dcc3b5aa765d61d8327deb882cf99', 'user');