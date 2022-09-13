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

serie_reporte = 0
for dpto in opciones_dpto:
    consulta = dpto.statement
    serie_reporte += 1
    id_compuesto_filtros = filtro_dpto.nombre + str(dpto.id)
    
    for edad in opciones_edad:
        consulta = consulta + " " + edad.statement
        id_compuesto_filtros = id_compuesto_filtros + filtro_edad.nombre + str(edad.id)
        
        for genero in opciones_genero:
            consulta = consulta + " " + genero.statement
            id_compuesto_filtros = id_compuesto_filtros + filtro_genero.nombre + str(genero.id)
            
            print("Consulta: " + consulta)
            personas = datos.obtener(consulta)
            reporte = resumen.generarReporte(personas)
            idGenerado = guardar.guardarReporte(id_compuesto_filtros, serie_reporte)
            print("Reporte: " + str(idGenerado))
            guardar.guardarReporteFactor(idGenerado, reporte)
            
            
    

