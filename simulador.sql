-- Creación de la base de datos
CREATE DATABASE simula_banca;

-- Seleccionamos la base de datos
USE simula_banca;


-- Tabla para los usuarios registrados
CREATE TABLE usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    correo VARCHAR(100) DEFAULT NULL,
    contrasena VARCHAR(255) DEFAULT NULL,
    tipo_usuario ENUM('Administrador', 'Usuario') NOT NULL DEFAULT 'Usuario',
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE KEY correo (correo)
);

-- Tabla para las simulaciones
CREATE TABLE simulaciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo_simulacion ENUM('CreditoLibreInversion', 'CreditoHipotecario') NOT NULL,
    valor DECIMAL(15, 2) NOT NULL,
    plazo INT NOT NULL,
    tasa_interes DECIMAL(5, 2),
    cuota_mensual DECIMAL(15, 2),
    usuario_id INT NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id_usuario)
);

