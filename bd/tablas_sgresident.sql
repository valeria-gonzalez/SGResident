USE sgresident;
drop table titular; /*era una prueba*/

CREATE TABLE titular(
	ID_TITULAR		INT 			auto_increment		PRIMARY KEY, /*AQUI OCUPA SER AUTO INCREMENT Y NO SERIAL PQ SI NO NO DEJA USAR FOREIGN KEY CONSTRAINT*/
	NOMBRE	 		VARCHAR(50)		NOT NULL,						/*ESTO PQ OCUPA ESPECIFICAR FORZOSAMENTE EL MISMO TIPO DE DATO*/
	PR_APELL		VARCHAR(50) 	NOT NULL,
	SEG_APELL		VARCHAR(50)		NOT NULL,
	SEXO			VARCHAR(1)		NULL,
	EDAD			INT 			NOT NULL,
	CELULAR			VARCHAR(25)		NULL,
	TEL_CASA		VARCHAR(25)		NULL,
	INACTIVO		BIT  			DEFAULT 0	/*AQUI NO SE OCUPAN COMILLAS*/
);

drop table pago;/*tambien una prueba*/
CREATE TABLE pago(
	ID_PAGO			INT 			auto_increment			PRIMARY KEY,
	MES				VARCHAR(20)		NOT NULL,
	MONTO	 		DECIMAL(6,2)	DEFAULT 320.00,
	RECIBIDO		DECIMAL(6,2)	NULL,
	FCHA_PAGO		TIMESTAMP		DEFAULT current_timestamp,
	NOM_PAGADOR		VARCHAR(50) 	NULL,
	PAG_APELL_1		VARCHAR(50)		NULL,
	PAG_APELL_2		VARCHAR(50)		NULL,
	ADEUDO 			BIT				DEFAULT 0,
	ID_TITULAR		INT,
	
	CONSTRAINT FKPago FOREIGN KEY(ID_TITULAR) /*RESULTA QUE PUEDES JUNTAR LOS CONSTRAINTS, jejeje*/
		REFERENCES titular(ID_TITULAR) 
		ON UPDATE CASCADE
        ON DELETE SET NULL
);


CREATE TABLE domicilio(
	CALLE			VARCHAR(50)		NOT NULL,
	NO_CASA			INT				NOT NULL,
	VIALIDAD_1		VARCHAR(50)		NOT NULL,
	VIALIDAD_2		VARCHAR(50)		NOT NULL,
	REFERENCIAS		VARCHAR(50)		NULL,
	ID_TITULAR		INT,
	
	PRIMARY KEY(CALLE, NO_CASA),
	
	CONSTRAINT FK_DOM_DEL FOREIGN KEY(ID_TITULAR) 
		REFERENCES titular(ID_TITULAR)
        ON UPDATE CASCADE
		ON DELETE SET NULL
);

drop table metodo_pago;
CREATE TABLE metodo_pago(
	TIPO				VARCHAR(20)		NOT NULL, /*puede ser: efectivo, cheque, tarjeta de credito, tarjeta de debito, transferencia*/
	NO_CUENTA			VARCHAR(20)		NULL,
	NO_CHEQUE			VARCHAR(20)		NULL,
	NO_TARJETA			VARCHAR(20)		NULL,
	COD_TARJETA			VARCHAR(7)		NULL,
	FCHA_EXP			VARCHAR(8)		NULL,
	NO_TRANSFERENCIA	VARCHAR(20)		NULL,
	ID_PAGO				INT,
	
	PRIMARY KEY(TIPO, ID_PAGO),
	
	CONSTRAINT FK_METPAGO_DEL FOREIGN KEY(ID_PAGO) 
		REFERENCES pago(ID_PAGO)
        ON UPDATE CASCADE
		ON DELETE CASCADE
);
        
/* datos de referencia q pueden usar: INSERTAR TITULAR*/
 INSERT INTO titular (NOMBRE, PR_APELL, SEG_APELL, SEXO, EDAD, CELULAR, TEL_CASA) VALUES
	('Valeria', 'Gonzalez', 'Segura', 'M', 20, '3531040025', null),
	('Diego Tristán', 'Dominguez', 'Dueñas', 'H', 20, '3531040056', '3256142205'),
	('Samir', 'Algo', 'Algo', 'H', 20, '3531040514', '5426125523');

select * from titular;

/*Insertar domicilio*/
INSERT INTO domicilio (CALLE, NO_CASA, VIALIDAD_1, VIALIDAD_2, REFERENCIAS, ID_TITULAR) VALUES
	('Fray Antonio de Segovia', '713', 'COLORES', 'CAMICHINES', 'Casa amarilla', 1),
	('Ruben Romero', '225', 'Miguel Hidalgo', 'Sor Juana Ines de la Cruz', 'Casa verde', 2),
	('Boulevard Marcelino Barragan', '252', 'Calle Pedrito Sola', 'Calle Paty Cantu', 'Vive en la escuela', 3);
	
select * from domicilio;

/*Insertar pago*/
INSERT INTO pago(MES, MONTO, RECIBIDO, NOM_PAGADOR, 
				 PAG_APELL_1, PAG_APELL_2, ID_TITULAR) VALUES
	('Octubre', 320.00, 320.00, 'Camila', 'Cabello', null, 1 ),
	('Octubre', default, 350.00, 'Stephen', 'Hawking', 'Gutierrez', 2),
	('Octubre', 350.00, 320.00, 'Andres', 'Lopez', 'Obrador', 3);
	
select * from pago;

/*Insertar metodo de pago*/
INSERT INTO metodo_pago(TIPO, NO_CUENTA, NO_CHEQUE, NO_TARJETA, COD_TARJETA, 
						FCHA_EXP, NO_TRANSFERENCIA, ID_PAGO) VALUES
	('Efectivo', null, null, null, null, null, null, 1),
	('Tarejta de Credito', null, null, '4000 00012 3456 7899', '9898', '12/22', null, 2),
	('Cheque', null, null, null, null, null, null, 3);
	
select * from metodo_pago;