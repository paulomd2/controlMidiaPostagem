CREATE TABLE  `comentarios` (
  `idComentario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idUsuario` int(10) unsigned NOT NULL,
  `idPost` int(10) unsigned NOT NULL,
  `comentario` text COLLATE utf8_unicode_ci NOT NULL,
  `datahora` datetime NOT NULL,
  PRIMARY KEY (`idComentario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE  `posts` (
  `idPost` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `texto` text COLLATE utf8_unicode_ci NOT NULL,
  `imagem` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datahora` datetime NOT NULL,
  `idUsuario` int(10) unsigned NOT NULL,
  `aprovacao_usuario` int(10) unsigned NOT NULL DEFAULT '0',
  `aprovacao_data` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idPost`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE  `usuarios` (
  `idUsuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `nivel` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE clientes (
  `idCliente` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL DEFAULT '',
  `logo` VARCHAR(45) NOT NULL DEFAULT '',
  `cor1` VARCHAR(7) NOT NULL DEFAULT '',
  `cor2` VARCHAR(7) NOT NULL DEFAULT '',
  `dataCadastro` DATETIME NOT NULL DEFAULT 0,
  PRIMARY KEY(`idCliente`)
)
ENGINE = InnoDB;

create table clienteUsuario(
idCliente integer UNSIGNED NOT NULL,
idUsuario integer UNSIGNED NOT NULL,
dataCadastro datetime NOT NULL DEFAULT 0
)
ENGINE = InnoDB;