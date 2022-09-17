# -*- coding: utf-8 -*-
"""
Created on Sat Jul  9 08:54:28 2022

@author: glori
"""

from Util.Conexion import Conexion
from Model.Reporte import Reporte

class GuardarReporte:

    def __init__(self):
        self.db = Conexion()
        self.conexion = self.db.obtener()
        self.cursor = self.conexion.cursor()
        
    def guardarReporte(self, nombreReporte, idReporte):
        
        self.cursor.execute("INSERT INTO [reporte].[REPORTE]" +
                            "([NOMBRE], " +
                            "[DESCRIPCION], " +
                            "[FECHA_CREACION]) " +
                            "OUTPUT INSERTED.ID " +
                            "VALUES " +
                            "( ?, ?, CURRENT_TIMESTAMP)",
                            str(nombreReporte),
                            str(idReporte))
        
        idGenerado = self.cursor.fetchone()[0]
        
        self.cursor.commit()
        
        return idGenerado
        
    def guardarReporteFactor(self, idReporte, reporteFactor:Reporte):
        
        for attr, value in reporteFactor.__dict__.items():
            
            idFactor = self.obtenerFactor(attr)
            
            self.cursor.execute("INSERT INTO [reporte].[REPORTE_FACTOR] " +
                       "([ID_FACTOR], " +
                       "[ID_REPORTE], " +
                       "[COEFICIENTE], " +
                       "[FECHA_CREACION]) " +
                       "VALUES " +
                       "(?, ?, ?, CURRENT_TIMESTAMP)",
                       str(idFactor),
                       str(idReporte),
                       str(value.coeficiente[0][1]))
            
            print("ReporteFactor: " + str(self.cursor.fetchone()[0]))
            
            self.cursor.commit()
            
    def obtenerFactor(self, aliasFactor):
        
        self.cursor.execute("SELECT ID " +
                            "FROM REPORTE.FACTOR F WITH(NOLOCK) "+
                            "WHERE F.alias = '" + aliasFactor + "'")
        
        row = self.cursor.fetchone()

        return row.ID