# -*- coding: utf-8 -*-
"""
Created on Sat Jul  9 08:55:41 2022

@author: glori
"""
from Service.ObtenerDatos import ObtenerDatos
from Service.ObtenerFiltros import ObtenerFiltros
from Service.ResumenReporte import ResumenReporte
from Service.GuardarReporte import GuardarReporte
from Model.Reporte import Reporte

datos = ObtenerDatos()
filtros = ObtenerFiltros()
resumen = ResumenReporte()
reporte = Reporte()
guardar = GuardarReporte()


filtro_dpto = filtros.obtenerFiltro("DEPARTAMENTO")
filtro_edad = filtros.obtenerFiltro("RANGO EDAD")
filtro_genero = filtros.obtenerFiltro("GENERO")

opciones_dpto = filtros.obtenerOpciones(filtro_dpto.id_filtro)
opciones_edad = filtros.obtenerOpciones(filtro_edad.id_filtro)
opciones_genero = filtros.obtenerOpciones(filtro_genero.id_filtro)

secuencia_reporte = 0
for dpto in opciones_dpto:
    
    secuencia_reporte += 1
    
    for edad in opciones_edad:
        
        for genero in opciones_genero:
            
            consulta = dpto.statement + " " + edad.statement + " " + genero.statement
            id_reporte = filtro_dpto.nombre + str(dpto.id) + filtro_edad.nombre + str(edad.id) + filtro_genero.nombre + str(genero.id)
            
            print("Procesando Filtros: " + consulta)
            personas = datos.obtener(consulta)
            
            print("   Cantidad registros: " + str(len(personas.alfabeta)))
            
            if (len(personas.alfabeta) > 0):
                
                reporte = resumen.generarReporte(personas)
                id_reporte_generado = guardar.guardarReporte(id_reporte, secuencia_reporte)
                
                print("   Id Reporte: " + str(id_reporte_generado))
                guardar.guardarReporteFactor(id_reporte_generado, reporte)
            
            
    

