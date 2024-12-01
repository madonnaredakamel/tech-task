
USE courses;
--up

CREATE TABLE categories (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  parent_id INT DEFAULT NULL,
  depth INT NOT NULL CHECK (depth >= 1 AND depth <= 4),
  FOREIGN KEY (parent_id) REFERENCES categories(id) ON DELETE CASCADE
);




--down
DROP TABLE `categories`;
