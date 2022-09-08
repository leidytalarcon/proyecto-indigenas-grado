# -*- coding: utf-8 -*-
"""
Created on Sat Jul  9 08:55:41 2022

@author: glori
"""
from Service.ObtenerDatos import ObtenerDatos
from Service.ObtenerFiltros import ObtenerFiltros
import numpy as np

datos = ObtenerDatos()
filtros = ObtenerFiltros()




filtro_dpto = filtros.obtenerFiltro("DEPARTAMENTO")
filtro_edad = filtros.obtenerFiltro("RANGO EDAD")
filtro_genero = filtros.obtenerFiltro("GENERO")

opciones_dpto = filtros.obtenerOpciones(filtro_dpto.id_filtro)
opciones_edad = filtros.obtenerOpciones(filtro_edad.id_filtro)
opciones_genero = filtros.obtenerOpciones(filtro_genero.id_filtro)

id_reporte = 0
for dpto in opciones_dpto:
    consulta = dpto.statement
    id_reporte += 1
    id_compuesto_filtros = filtro_dpto.nombre + dpto.id
    
    for edad in opciones_edad:
        consulta = consulta + " " + edad.statement
        id_compuesto_filtros = id_compuesto_filtros + filtro_edad + edad.id
        
        for genero in opciones_genero:
            consulta = consulta + " " + genero.statement
            id_compuesto_filtros = id_compuesto_filtros + filtro_genero + genero.id
            
            personas = datos.obtener(consulta)
            
    

pearson_coeficient = np.corrcoef(personas.sexo, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.edad, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.region, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.departamento, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.municipio, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.cabecera_municipal, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.Codigo_Encuestas, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.Numero_orden_de_la_vivienda, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.numero_vivienda_hogar, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.numero_personas_hogar, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.parentesco_con_jefe_hogar, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.grupo_etnico, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.etnia_indigena, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.clan, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.vitsa, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.kumpia, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.habla_lengua_nativa, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.Entiende_lengua_nativa_de_su_pueblo, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.habla_otras_lengua_nativa, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.Numero_otras_lenguas_nativas, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.lugar_nacimiento, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.lugar_residencia_5_anos, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.lugar_residencia_1_anos, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.enfermo_ultimo_mes, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.Tratamiento_principal_problema_salud, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.atención_problema_salud, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.calidad_serivicio, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.dificultad_fisica, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.asiste_educacion, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.nivel_escolar_alcanzado, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.trabajo_semana_pasada, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.estado_civil, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.hijos, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.hijos_nacidos_vivos_total, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.hijos_nacidos_Hombres, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.hijos_nacidos_Mujeres, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.hijos_sobrevivientes, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.hijos_sobrevivientes_total, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.hijos_sobrevivientes_hombres, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.hijos_sobrevivientes_mujeres, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.hijos_viven_fuera_actualmente_de_colombia, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.hijos_viven_fuera_total, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.hijos_viven_fueraColombia_Hombres, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.hijos_viven_fueraColombia_Mujeres, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.fecha_nacimiento_ultimoHijo, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.mes_nacimiento_ultimoHijo, personas.alfabeta)
pearson_coeficient = np.corrcoef(personas.anio_nacimiento_ultimo_hijo, personas.alfabeta)
