-- --------------------------------------------------------
--
-- # MES
--
CREATE TABLE mes (
    id_mes INT AUTO_INCREMENT NOT NULL,
    mes_nombre VARCHAR(30) NOT NULL,
    PRIMARY KEY (id_mes)
);

INSERT INTO
    mes (id_mes, mes_nombre)
VALUES
    (1, 'Enero'),
    (2, 'Febrero'),
    (3, 'Marzo'),
    (4, 'Abril'),
    (5, 'Mayo'),
    (6, 'Junio'),
    (7, 'Julio'),
    (8, 'Agosto'),
    (9, 'Septiembre'),
    (10, 'Octubre'),
    (11, 'Noviembre'),
    (12, 'Diciembre');

-- --------------------------------------------------------

-- --------------------------------------------------------
-- --------------------------------------------------------
--
-- # PERIODO
--
CREATE TABLE periodo (
    id_periodo INT AUTO_INCREMENT NOT NULL,
    periodo_info VARCHAR(80) NOT NULL,
    periodo_inicia DATE NOT NULL,
    periodo_termina DATE NOT NULL,
    periodo_status TINYINT NOT NULL,
    PRIMARY KEY (id_periodo)
);

INSERT INTO
    periodo (
        id_periodo,
        periodo_info,
        periodo_inicia,
        periodo_termina,
        periodo_status
    )
VALUES
    (1, 'Periodo 2019', '2019-08-26', '2020-08-26', 0),
    (2, 'Periodo 2020', '2020-01-01', '2021-01-01', 0),
    (3, 'Periodo 2021', '2021-01-01', '2022-02-12', 0),
    (4, 'Periodo 2022', '2022-08-10', '2023-08-11', 1);

-- --------------------------------------------------------
-- --------------------------------------------------------

-- --------------------------------------------------------
--
-- # TIPO ACCESO
--
CREATE TABLE tipo_acceso (
    id_tipo_acceso INT AUTO_INCREMENT NOT NULL,
    tipo_acceso_nombre VARCHAR(30) NOT NULL,
    PRIMARY KEY (id_tipo_acceso)
);

INSERT INTO
    tipo_acceso (id_tipo_acceso, tipo_acceso_nombre)
VALUES
    (1, 'Comite'),
    (2, 'Secretario'),
    (3, 'Administrador');

-- --------------------------------------------------------

-- --------------------------------------------------------
-- --------------------------------------------------------
--
-- # ESTADO CIVIL
--
CREATE TABLE estado_civil (
    id_estado_civil INT AUTO_INCREMENT NOT NULL,
    estado_civil VARCHAR(30) NOT NULL,
    PRIMARY KEY (id_estado_civil)
);

INSERT INTO
    estado_civil (id_estado_civil, estado_civil)
VALUES
    (1, 'Saltero(a)'),
    (2, 'Casado(a)'),
    (3, 'Viudo(a)'),
    (4, 'Divorciado(a)');

-- --------------------------------------------------------
-- --------------------------------------------------------

-- --------------------------------------------------------
--
-- # PERSONA
--
CREATE TABLE persona (
    id_persona INT AUTO_INCREMENT NOT NULL,
    persona_nombre VARCHAR(30) NOT NULL,
    persona_ape_pat VARCHAR(30) NOT NULL,
    persona_ape_mat VARCHAR(30),
    persona_status TINYINT NOT NULL,
    id_estado_civil INT NOT NULL,
    PRIMARY KEY (id_persona)
);

INSERT INTO
    persona (
        id_persona,
        persona_nombre,
        persona_ape_pat,
        persona_ape_mat,
        persona_status,
        id_estado_civil
    )
VALUES
    (1, 'Hector', 'Hernandez', 'Estrada', 1, 2),
    (2, 'Gladis', 'Falcón', 'Amado', 1, 1),
    (3, 'Eva', 'Jimenez', 'Acevedo', 1, 3),
    (4, 'Saul', 'Alvarez', 'Aguilar', 1, 4),
    (5, 'Maria de Jesus', 'Gonzalez', NULL, 1, 1),
    (6, 'Alberta', 'Estrada', 'Castillo', 1, 3),
    (7, 'Emilio', 'Hernández', 'Gonzaléz', 1, 4),
    (8, 'Santiago', 'Flores', 'Falcón', 1, 2),
    (9, 'Jose', 'Garcia', 'Luna', 1, 1),
    (10, 'Doroteo', 'Angeles', 'Perez', 1, 2);

-- --------------------------------------------------------
-- --------------------------------------------------------

-- --------------------------------------------------------
--
-- # PERSONA ACCESO
--
CREATE TABLE persona_acceso (
    id_persona_acceso INT AUTO_INCREMENT NOT NULL,
    acceso_usuario VARCHAR(30) NOT NULL,
    acceso_pass VARCHAR(30) NOT NULL,
    acceso_status TINYINT NOT NULL,
    id_persona INT NOT NULL,
    id_tipo_acceso INT NOT NULL,
    PRIMARY KEY (id_persona_acceso)
);

INSERT INTO
    persona_acceso (
        id_persona_acceso,
        acceso_usuario,
        acceso_pass,
        acceso_status,
        id_persona,
        id_tipo_acceso
    )
VALUES
    (1, 'hhector', 'hhector', 1, 1, 3);

-- --------------------------------------------------------
-- --------------------------------------------------------

-- --------------------------------------------------------
--
-- # GASTO
--
CREATE TABLE gasto (
    id_gasto INT AUTO_INCREMENT NOT NULL,
    gasto_monto DECIMAL NOT NULL,
    gasto_fecha DATE NOT NULL,
    gasto_info VARCHAR(200) NOT NULL,
    gasto_nota_img VARCHAR(50),
    id_persona_acceso INT NOT NULL,
    PRIMARY KEY (id_gasto)
);

INSERT INTO
    gasto (
        id_gasto,
        gasto_monto,
        gasto_fecha,
        gasto_info,
        gasto_nota_img,
        id_persona_acceso
    )
VALUES
    (
        1,
        520,
        '2022-08-13',
        'Energia Electrica',
        'nota1.jpg',
        1
    ),
    (
        2,
        220,
        '2022-08-13',
        'Mantenimiento',
        'nota2.jpg',
        1
    ),
    (
        3,
        820,
        '2022-08-13',
        'Secretaria',
        'nota3.jpg',
        1
    );

-- --------------------------------------------------------

-- --------------------------------------------------------
-- --------------------------------------------------------
--
-- # GASTO DETALLE
--
CREATE TABLE gasto_detalle (
    id_gasto_detalle INT AUTO_INCREMENT NOT NULL,
    gasto_detalle_producto VARCHAR(50) NOT NULL,
    gasto_detalle_precio_uni DOUBLE PRECISION NOT NULL,
    gasto_detalle_cantidad INT NOT NULL,
    gasto_detalle_descuento DOUBLE PRECISION NOT NULL,
    gasto_detalle_status VARCHAR(20) NOT NULL,
    id_gasto INT NOT NULL,
    PRIMARY KEY (id_gasto_detalle)
);

INSERT INTO
    gasto_detalle (
        id_gasto_detalle,
        gasto_detalle_producto,
        gasto_detalle_precio_uni,
        gasto_detalle_cantidad,
        gasto_detalle_descuento,
        gasto_detalle_status,
        id_gasto
    )
VALUES
    (
        1,
        'Pago mensual de energia electrica',
        520,
        1,
        0,
        'PAGADO',
        1
    ),
    (
        2,
        'Pago por mantenimiento de pozo de agua',
        220,
        1,
        0,
        'PAGADO',
        2
    ),
    (
        3,
        'Pago servicios de secreatria',
        820,
        1,
        0,
        'PAGADO',
        3
    );

-- --------------------------------------------------------
-- --------------------------------------------------------

-- --------------------------------------------------------
--
-- # SERVICIO
--
CREATE TABLE servicio (
    id_servicio INT AUTO_INCREMENT NOT NULL,
    servicio_folio VARCHAR(30) NOT NULL,
    servicio_info VARCHAR(50) NOT NULL,
    servicio_fecha_alta DATE NOT NULL,
    servicio_status TINYINT NOT NULL,
    servicio_direc_actual TINYINT NOT NULL,
    id_persona INT NOT NULL,
    PRIMARY KEY (id_servicio)
);

INSERT INTO
    servicio (
        id_servicio,
        servicio_folio,
        servicio_info,
        servicio_fecha_alta,
        servicio_status,
        servicio_direc_actual,
        id_persona
    )
VALUES
    (1, '1001', 'Toma principal', '2022-09-24', 1, 1, 1),
    (2, '1001', 'Toma principal', '2022-09-24', 1, 1, 2),
    (3, '1001', 'Toma principal', '2022-09-24', 1, 1, 3),
    (4, '1001', 'Toma principal', '2022-09-24', 1, 1, 4),
    (5, '1001', 'Toma principal', '2022-09-24', 1, 1, 5),
    (6, '1001', 'Toma principal', '2022-09-24', 1, 1, 6),
    (7, '1001', 'Toma principal', '2022-09-24', 1, 1, 7),
    (8, '1001', 'Toma principal', '2022-09-24', 1, 1, 8),
    (9, '1001', 'Toma principal', '2022-09-24', 1, 1, 9),
    (10, '1001', 'Toma principal', '2022-09-24', 1, 1, 10);

-- --------------------------------------------------------
-- --------------------------------------------------------

-- --------------------------------------------------------
--
-- # PAGO SERVICIO
--
CREATE TABLE pago_servicio (
    id_pago_servicio INT AUTO_INCREMENT NOT NULL,
    pago_servicio_fecha DATE NOT NULL,
    pago_servicio_codigo VARCHAR(30) NOT NULL,
    id_periodo INT NOT NULL,
    id_servicio INT NOT NULL,
    PRIMARY KEY (id_pago_servicio)
);
-- --------------------------------------------------------
-- --------------------------------------------------------

-- --------------------------------------------------------
--
-- # PAGO
--
CREATE TABLE mes_pago (
    id_mes_pago INT AUTO_INCREMENT NOT NULL,
    id_mes INT NOT NULL,
    id_pago_servicio INT NOT NULL,
    PRIMARY KEY (id_mes_pago)
);
-- --------------------------------------------------------
-- --------------------------------------------------------

-- --------------------------------------------------------
--
-- # MANZANA
--
CREATE TABLE manzana (
    id_manzana INT AUTO_INCREMENT NOT NULL,
    manzana_nombre VARCHAR(50) NOT NULL,
    manzana_numero INT NOT NULL,
    PRIMARY KEY (id_manzana)
);

INSERT INTO
    manzana (id_manzana, manzana_nombre, manzana_numero)
VALUES
    (1, 'Los Fresnos', 1),
    (2, 'La Playa', 2),
    (3, 'La Palma', 3),
    (4, 'La Frontera', 4),
    (5, 'Centro', 5),
    (6, 'Barrio Alto', 6),
    (7, 'Fraccionamiento', 7),
    (8, '3 de Mayo', 8);

-- --------------------------------------------------------
-- --------------------------------------------------------

-- --------------------------------------------------------
--
-- # SERVICIO DIRECCION
--
CREATE TABLE servicio_direccion (
    id_servicio_direccion INT AUTO_INCREMENT NOT NULL,
    direccion_tipo VARCHAR(30) NOT NULL,
    direccion_calle VARCHAR(80) NOT NULL,
    direccion_numero VARCHAR(20),
    servicio_info VARCHAR(30) NOT NULL,
    id_manzana INT NOT NULL,
    id_servicio INT NOT NULL,
    PRIMARY KEY (id_servicio_direccion)
);
INSERT INTO
    servicio_direccion (
        id_servicio_direccion,
        direccion_tipo,
        direccion_calle,
        direccion_numero,
        servicio_info,
        id_manzana,
        id_servicio
    )
VALUES
    (1, 'Avenida', 'Reforma', 'S/N', 'En servicio', 1, 1),
    (2, 'Avenida', 'Tula', 'S/N', 'En servicio', 2, 2),
    (3, 'Calle', 'Melchor Ocampo', 'S/N', 'En servicio', 3, 3),
    (4, 'Calle', 'Moderna','S/N', 'En servicio', 4, 4),
    (5, 'Avenida', 'Insurgentes','S/N', 'En servicio', 5,5),
    (6, 'Avenida', 'Del trabajo','10', 'En servicio', 6, 6),
    (7, 'Avenida', 'Reforma','S/N', 'En servicio', 7,7),
    (8, 'Avenida', 'Reforma','S/N', 'En servicio', 8,8),
    (9, 'Avenida', 'Reforma','S/N', 'En servicio', 1,9),
    (10, 'Avenida', 'Reforma','S/N', 'En servicio',2,10);


-- --------------------------------------------------------
-- --------------------------------------------------------

-- --------------------------------------------------------
--
-- # FOREING KEYS
--
ALTER TABLE
    mes_pago
ADD
    CONSTRAINT mes_mes_pago_fk FOREIGN KEY (id_mes) REFERENCES mes (id_mes) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE
    pago_servicio
ADD
    CONSTRAINT periodo_pago_servicio_fk FOREIGN KEY (id_periodo) REFERENCES periodo (id_periodo) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE
    persona_acceso
ADD
    CONSTRAINT tipo_acceso_persona_acceso_fk FOREIGN KEY (id_tipo_acceso) REFERENCES tipo_acceso (id_tipo_acceso) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE
    persona
ADD
    CONSTRAINT estado_civil_persona_fk FOREIGN KEY (id_estado_civil) REFERENCES estado_civil (id_estado_civil) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE
    persona_acceso
ADD
    CONSTRAINT persona_persona_acceso_fk FOREIGN KEY (id_persona) REFERENCES persona (id_persona) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE
    servicio
ADD
    CONSTRAINT persona_servicio_fk FOREIGN KEY (id_persona) REFERENCES persona (id_persona) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE
    gasto
ADD
    CONSTRAINT persona_acceso_gasto_fk FOREIGN KEY (id_persona_acceso) REFERENCES persona_acceso (id_persona_acceso) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE
    gasto_detalle
ADD
    CONSTRAINT gasto_gasto_detalle_fk FOREIGN KEY (id_gasto) REFERENCES gasto (id_gasto) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE
    servicio_direccion
ADD
    CONSTRAINT servicio_servicio_direccion_fk FOREIGN KEY (id_servicio) REFERENCES servicio (id_servicio) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE
    pago_servicio
ADD
    CONSTRAINT servicio_pago_servicio_fk FOREIGN KEY (id_servicio) REFERENCES servicio (id_servicio) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE
    mes_pago
ADD
    CONSTRAINT pago_servicio_mes_pago_fk FOREIGN KEY (id_pago_servicio) REFERENCES pago_servicio (id_pago_servicio) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE
    servicio_direccion
ADD
    CONSTRAINT manzana_servicio_direccion_fk FOREIGN KEY (id_manzana) REFERENCES manzana (id_manzana) ON DELETE NO ACTION ON UPDATE NO ACTION;