--CREATE SCHEMA reporte;
GO

CREATE TABLE [reporte].[FACTOR](
    [ID] INT IDENTITY (1,1) PRIMARY KEY NOT NULL,
    [NOMBRE_COLUMNA] [varchar](50) NOT NULL,
    [ALIAS] [varchar](50) NOT NULL
)

CREATE TABLE [reporte].[REPORTE](
    [ID] INT IDENTITY (1,1) PRIMARY KEY NOT NULL,
    [NOMBRE] [varchar](50) NOT NULL,
    [DESCRIPCION] [varchar](50) NOT NULL,
    [FECHA_CREACION] [datetime] NOT NULL
)

CREATE TABLE [reporte].[REPORTE_FACTOR](
    [ID]  INT IDENTITY (1,1) PRIMARY KEY NOT NULL,
    [ID_FACTOR] int not null FOREIGN KEY REFERENCES REPORTE.FACTOR(ID),
	[ID_REPORTE] int not null FOREIGN KEY REFERENCES REPORTE.REPORTE(ID),
	[COEFICIENTE] DECIMAL(6,3),
    [FECHA_CREACION] [datetime] NOT NULL
)

CREATE TABLE [reporte].[FILTRO](
    [ID] INT IDENTITY (1,1) PRIMARY KEY NOT NULL,
    [NOMBRE] [varchar](50) NOT NULL,
    [DESCRIPCION] [varchar](50) NOT NULL,
    [FECHA_CREACION] [datetime] NOT NULL
)

CREATE TABLE [reporte].[FILTRO_OPCION](
    [ID] INT IDENTITY (1,1) PRIMARY KEY NOT NULL,
	[ID_FILTRO] int not null FOREIGN KEY REFERENCES REPORTE.FILTRO(ID),
    [NOMBRE] [varchar](50) NOT NULL,
	[STATEMENT] [varchar](50) NOT NULL,
    [DESCRIPCION] [varchar](50) NOT NULL,
    [FECHA_CREACION] [datetime] NOT NULL
)

