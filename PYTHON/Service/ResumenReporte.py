# -*- coding: utf-8 -*-
"""
Created on Sat Jul  9 08:54:28 2022

@author: glori
"""


from Model.Reporte import Reporte
import numpy as np

class ResumenReporte:

    def __init__(self):
        None
        
    def generarReporte(self, personas):
        reporte = Reporte()
        
        reporte.sexo.coeficiente = np.corrcoef(personas.sexo, personas.alfabeta)
        reporte.edad.coeficiente = np.corrcoef(personas.edad, personas.alfabeta)
        reporte.region.coeficiente = np.corrcoef(personas.region, personas.alfabeta)
        reporte.departamento.coeficiente = np.corrcoef(personas.departamento, personas.alfabeta)
        reporte.municipio.coeficiente = np.corrcoef(personas.municipio, personas.alfabeta)
        reporte.cabecera_municipal.coeficiente = np.corrcoef(personas.cabecera_municipal, personas.alfabeta)
        reporte.Codigo_Encuestas.coeficiente = np.corrcoef(personas.Codigo_Encuestas, personas.alfabeta)
        reporte.Numero_orden_de_la_vivienda.coeficiente = np.corrcoef(personas.Numero_orden_de_la_vivienda, personas.alfabeta)
        reporte.numero_vivienda_hogar.coeficiente = np.corrcoef(personas.numero_vivienda_hogar, personas.alfabeta)
        reporte.numero_personas_hogar.coeficiente = np.corrcoef(personas.numero_personas_hogar, personas.alfabeta)
        reporte.parentesco_con_jefe_hogar.coeficiente = np.corrcoef(personas.parentesco_con_jefe_hogar, personas.alfabeta)
        reporte.grupo_etnico.coeficiente = np.corrcoef(personas.grupo_etnico, personas.alfabeta)
        reporte.etnia_indigena.coeficiente = np.corrcoef(personas.etnia_indigena, personas.alfabeta)
        reporte.clan.coeficiente = np.corrcoef(personas.clan, personas.alfabeta)
        reporte.vitsa.coeficiente = np.corrcoef(personas.vitsa, personas.alfabeta)
        reporte.kumpia.coeficiente = np.corrcoef(personas.kumpia, personas.alfabeta)
        reporte.habla_lengua_nativa.coeficiente = np.corrcoef(personas.habla_lengua_nativa, personas.alfabeta)
        reporte.Entiende_lengua_nativa_de_su_pueblo.coeficiente = np.corrcoef(personas.Entiende_lengua_nativa_de_su_pueblo, personas.alfabeta)
        reporte.habla_otras_lengua_nativa.coeficiente = np.corrcoef(personas.habla_otras_lengua_nativa, personas.alfabeta)
        reporte.Numero_otras_lenguas_nativas.coeficiente = np.corrcoef(personas.Numero_otras_lenguas_nativas, personas.alfabeta)
        reporte.lugar_nacimiento.coeficiente = np.corrcoef(personas.lugar_nacimiento, personas.alfabeta)
        reporte.lugar_residencia_5_anos.coeficiente = np.corrcoef(personas.lugar_residencia_5_anos, personas.alfabeta)
        reporte.lugar_residencia_1_anos.coeficiente = np.corrcoef(personas.lugar_residencia_1_anos, personas.alfabeta)
        reporte.enfermo_ultimo_mes.coeficiente = np.corrcoef(personas.enfermo_ultimo_mes, personas.alfabeta)
        reporte.Tratamiento_principal_problema_salud.coeficiente = np.corrcoef(personas.Tratamiento_principal_problema_salud, personas.alfabeta)
        reporte.atención_problema_salud.coeficiente = np.corrcoef(personas.atención_problema_salud, personas.alfabeta)
        reporte.calidad_serivicio.coeficiente = np.corrcoef(personas.calidad_serivicio, personas.alfabeta)
        reporte.dificultad_fisica.coeficiente = np.corrcoef(personas.dificultad_fisica, personas.alfabeta)
        reporte.asiste_educacion.coeficiente = np.corrcoef(personas.asiste_educacion, personas.alfabeta)
        reporte.nivel_escolar_alcanzado.coeficiente = np.corrcoef(personas.nivel_escolar_alcanzado, personas.alfabeta)
        reporte.trabajo_semana_pasada.coeficiente = np.corrcoef(personas.trabajo_semana_pasada, personas.alfabeta)
        reporte.estado_civil.coeficiente = np.corrcoef(personas.estado_civil, personas.alfabeta)
        reporte.hijos.coeficiente = np.corrcoef(personas.hijos, personas.alfabeta)
        reporte.hijos_nacidos_vivos_total.coeficiente = np.corrcoef(personas.hijos_nacidos_vivos_total, personas.alfabeta)
        reporte.hijos_nacidos_Hombres.coeficiente = np.corrcoef(personas.hijos_nacidos_Hombres, personas.alfabeta)
        reporte.hijos_nacidos_Mujeres.coeficiente = np.corrcoef(personas.hijos_nacidos_Mujeres, personas.alfabeta)
        reporte.hijos_sobrevivientes.coeficiente = np.corrcoef(personas.hijos_sobrevivientes, personas.alfabeta)
        reporte.hijos_sobrevivientes_total.coeficiente = np.corrcoef(personas.hijos_sobrevivientes_total, personas.alfabeta)
        reporte.hijos_sobrevivientes_hombres.coeficiente = np.corrcoef(personas.hijos_sobrevivientes_hombres, personas.alfabeta)
        reporte.hijos_sobrevivientes_mujeres.coeficiente = np.corrcoef(personas.hijos_sobrevivientes_mujeres, personas.alfabeta)
        reporte.hijos_viven_fuera_actualmente_de_colombia.coeficiente = np.corrcoef(personas.hijos_viven_fuera_actualmente_de_colombia, personas.alfabeta)
        reporte.hijos_viven_fuera_total.coeficiente = np.corrcoef(personas.hijos_viven_fuera_total, personas.alfabeta)
        reporte.hijos_viven_fueraColombia_Hombres.coeficiente = np.corrcoef(personas.hijos_viven_fueraColombia_Hombres, personas.alfabeta)
        reporte.hijos_viven_fueraColombia_Mujeres.coeficiente = np.corrcoef(personas.hijos_viven_fueraColombia_Mujeres, personas.alfabeta)
        reporte.fecha_nacimiento_ultimoHijo.coeficiente = np.corrcoef(personas.fecha_nacimiento_ultimoHijo, personas.alfabeta)
        reporte.mes_nacimiento_ultimoHijo.coeficiente = np.corrcoef(personas.mes_nacimiento_ultimoHijo, personas.alfabeta)
        reporte.anio_nacimiento_ultimo_hijo.coeficiente = np.corrcoef(personas.anio_nacimiento_ultimo_hijo, personas.alfabeta)
        
        return reporte
                
                