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
                            "VALUES " +
                            "( '" + nombreReporte + "', '" + 
                            idReporte + "', " +
                            "CURRENT_TIMESTAMP)")
        
        self.cursor.commit()
        
        idGenerado = self.cursor.fetchone()[0]
        
        return idGenerado
        
    def guardarReporteFactor(self, idReporte, reporteFactor:Reporte):
        
        for attr, value in reporteFactor.__dict__.items():
            print(attr, value)
        
            self.cursor.execute("""INSERT INTO [reporte].[REPORTE_FACTOR]
               ([ID_FACTOR]
               ,[ID_REPORTE]
               ,[COEFICIENTE]
               ,[FECHA_CREACION])
               VALUES """ +
               "(SELECT ID FROM reporte.FACTOR WHERE alias = '" + attr + "' " +
               "," + idReporte +
               "," + value.coeficiente +
               ",CURRENT_TIMESTAMP)")
            
            print(self.cursor.fetchone()[0])
            self.cursor.commit()
            