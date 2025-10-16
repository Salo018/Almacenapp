create DATABASE almacen;
use almacen;

create Table usuarios(
    nombre VARCHAR(20),
    email VARCHAR(30),
    password VARCHAR(20),
    usuario VARCHAR(20),
    PRIMARY KEY (usuario));

create Table productos(
    id INT AUTO_INCREMENT,
    nombre VARCHAR(50),
    inventario INT,
    precio DECIMAL(10, 2),
    PRIMARY KEY (id)
);


CREATE TABLE ordenes(
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombreCliente VARCHAR(120),
  emailCliente  VARCHAR(120),
  totalCuenta   DECIMAL(10,2),
  fecha         DATETIME
);
