CREATE DATABASE IF NOT EXISTS `latelier_egv` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `latelier_egv`;

-- Tabela de Usuários (Clientes e Revendedores)
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nome` VARCHAR(150) NOT NULL,
  `email` VARCHAR(150) NOT NULL UNIQUE,
  `senha` VARCHAR(255) NOT NULL,
  `telefone` VARCHAR(30) DEFAULT NULL,
  `cpf_cnpj` VARCHAR(30) DEFAULT NULL,
  `tipo` ENUM('Cliente', 'Revendedor') DEFAULT 'Cliente',
  `status_revendedor` VARCHAR(20) DEFAULT 'ativo',
  `criado_em` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabela de Favoritos (Vincula o usuário ao produto curtido)
CREATE TABLE IF NOT EXISTS `favoritos` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `usuario_id` INT NOT NULL,
    `produto_id` VARCHAR(50) NOT NULL,
    `criado_em` DATETIME DEFAULT CURRENT_TIMESTAMP,
    UNIQUE KEY `usuario_produto_unico` (`usuario_id`, `produto_id`),
    FOREIGN KEY (`usuario_id`) REFERENCES `usuarios`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
