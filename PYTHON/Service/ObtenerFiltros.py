# -*- coding: utf-8 -*-
"""
Created on Sat Jul  9 08:54:28 2022

@author: glori
"""

from Util.Conexion import Conexion
from Model.Filtro import Filtro
from Model.Opcion import Opcion

class ObtenerFiltros:

    def __init__(self):
        self.db = Conexion()
        self.cursor = self.db.obtener().cursor()
        
    def obtenerFiltro(self, nombreFiltro):
        
        self.cursor.execute("SELECT " +
                            "F.ID, " +
                            "F.NOMBRE " +
                            "FROM REPORTE.FILTRO F WITH(NOLOCK) "+
                            "WHERE F.NOMBRE = '" + nombreFiltro + "'")
        
        row = self.cursor.fetchone()

        filtro = Filtro()
        filtro.id_filtro = row.ID
        filtro.nombre = row.NOMBRE
              
        return filtro
            
        self.cursor.close()
        self.db.cerrar()
        
    def obtenerOpciones(self, idFiltro):
        
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