CREATE TABLE [reporte].[FACTOR](
    [ID] [int] IDENTITY(1,1) NOT NULL,
    [NOMBRE_COLUMNA] [varchar](20) NOT NULL,
    [ALIAS] [varchar](50) NOT NULL
)

CREATE TABLE [reporte].[REPORTE](
    [ID] [int] IDENTITY(1,1) NOT NULL,
    [NOMBRE] [varchar](20) NOT NULL,
    [DESCRIPCION] [varchar](50) NOT NULL,
    [FECHA_CREACION] [datetime] NOT NULL
)

CREATE TABLE [reporte].[REPORTE_FACTOR](
    [ID] [int] IDENTITY(1,1) NOT NULL,
    [ID_REPORTE] [int] NOT NULL FOREIGN KEY REFERENCES REPORTE(ID),
    [ID_FACTOR] [int] NOT NULL FOREIGN KEY REFERENCES FACTOR(ID),
	[COEFICIENTE] DECIMAL(6,3),
    [FECHA_CREACION] [datetime] NOT NULL
)

