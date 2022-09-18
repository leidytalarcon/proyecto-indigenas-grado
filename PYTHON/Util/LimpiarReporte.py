# -*- coding: utf-8 -*-
"""
Created on Sat Sep 17 22:17:13 2022

@author: alejo
"""


from Util.Conexion import Conexion

class LimpiarReporte:

    def __init__(self):
        self.db = Conexion()
        self.conexion = self.db.obtener()
        self.cursor = self.conexion.cursor()
        
    def truncarReportes(self):
        
        self.cursor.execute("TRUNCATE TABLE REPORTE.REPORTE_FACTOR")
        self.cursor.commit()
        
        self.cursor.execute("DELETE FROM REPORTE.REPORTE")
        self.cursor.commit()
        
        self.cursor.close()
        self.db.cerrar()
        