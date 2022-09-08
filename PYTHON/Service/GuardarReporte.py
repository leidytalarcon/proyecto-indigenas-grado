# -*- coding: utf-8 -*-
"""
Created on Sat Jul  9 08:54:28 2022

@author: glori
"""

from Util.Conexion import Conexion
from Model.Persona import Persona
from Model.Reporte import Reporte

class ObtenerFiltros:

    def __init__(self):
        self.db = Conexion()
        self.cursor = self.db.obtener().cursor()
        
    def guardarReporte(self, nombreReporte, idReporte):
        
        self.cursor.execute("INSERT INTO [reporte].[REPORTE]" +
                            "([NOMBRE], " +
                            "[DESCRIPCION], " +
                            "[FECHA_CREACION]) " +
                            "VALUES " +
                            "( '" + nombreReporte + "', '" + 
                            idReporte + "', " +
                            "CURRENT_TIMESTAMP)")
        
        row = self.cursor.fetchone()

        filtro = Filtro()
        filtro.id_filtro = row.ID
        filtro.nombre = row.NOMBRE
              
        return filtro
            
        self.cursor.close()
        self.db.cerrar()
        
    def guardarReporteFactor(self, personas):
        
        self.cursor.execute("SELECT " +
                            "O.ID, " +
                            "O.NOMBRE, " +
                            "O.[STATEMENT] " +
                            "FROM REPORTE.FILTRO_OPCION O WITH(NOLOCK) " +
                            "WHERE O.ID_FILTRO = " + idFiltro)
        
        rows = self.cursor.fetchall()

        opciones = []
        for row in rows:
            opcion = Opcion()
            opcion.id = row.ID
            opcion.nombre = row.NOMBRE
            opcion.statement = row.STATEMENT
            
            opciones.append(opcion)
        return opciones
            
        self.cursor.close()
        self.db.cerrar()