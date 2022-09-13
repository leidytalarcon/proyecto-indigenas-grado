# -*- coding: utf-8 -*-
"""
Created on Sat Jul  9 08:53:41 2022

@author: glori
"""

import pyodbc

class Conexion:

    def __init__(self):
        self.host = 'localhost'
        self.schema = 'PROYECTO_INDIGENAS'
        self.user = 'sa'
        self.password = '7Rogernikki.'
        self.conexion = 0

    def obtener(self):

        try:
            self.conexion = pyodbc.connect('DRIVER={ODBC Driver 17 for SQL Server};'+
                                      'SERVER=' + self.host +
                                      ';DATABASE=' + self.schema + 
                                      ';UID=' + self.user + 
                                      ';PWD=' + self.password)
            # OK! conexión exitosa
        except Exception as e:
            # Atrapar error
            print("Ocurrió un error al conectar a SQL Server: ", e)
        
        return self.conexion
    
    def cerrar(self):
        self.conexion.close()