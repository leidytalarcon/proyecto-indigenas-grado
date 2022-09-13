# -*- coding: utf-8 -*-
"""
Created on Sat Jul  9 09:07:30 2022

@author: glori
"""
from Model.Factor import Factor

class Reporte:
    
    def __init__(self):
        self.sexo = Factor("sexo")
        self.edad = Factor("edad")
        self.region = Factor("region")
        self.departamento = Factor("departamento")
        self.municipio = Factor("municipio")
        self.cabecera_municipal = Factor("cabecera_municipal")
        self.Codigo_Encuestas = Factor("Codigo_Encuestas")
        self.Numero_orden_de_la_vivienda = Factor("Numero_orden_de_la_vivienda")
        self.numero_vivienda_hogar = Factor("numero_vivienda_hogar")
        self.numero_personas_hogar = Factor("numero_personas_hogar")
        self.parentesco_con_jefe_hogar = Factor("parentesco_con_jefe_hogar")
        self.grupo_etnico = Factor("grupo_etnico")
        self.etnia_indigena = Factor("etnia_indigena")
        self.clan = Factor("clan")
        self.vitsa = Factor("vitsa")
        self.kumpia = Factor("kumpia")
        self.habla_lengua_nativa = Factor("habla_lengua_nativa")
        self.Entiende_lengua_nativa_de_su_pueblo = Factor("Entiende_lengua_nativa_de_su_pueblo")
        self.habla_otras_lengua_nativa = Factor("habla_otras_lengua_nativa")
        self.Numero_otras_lenguas_nativas = Factor("Numero_otras_lenguas_nativas")
        self.lugar_nacimiento = Factor("lugar_nacimiento")
        self.lugar_residencia_5_anos = Factor("lugar_residencia_5_anos")
        self.lugar_residencia_1_anos = Factor("lugar_residencia_1_anos")
        self.enfermo_ultimo_mes = Factor("enfermo_ultimo_mes")
        self.Tratamiento_principal_problema_salud = Factor("Tratamiento_principal_problema_salud")
        self.atención_problema_salud = Factor("atención_problema_salud")
        self.calidad_serivicio = Factor("calidad_serivicio")
        self.dificultad_fisica = Factor("dificultad_fisica")
        self.asiste_educacion = Factor("asiste_educacion")
        self.nivel_escolar_alcanzado = Factor("nivel_escolar_alcanzado")
        self.trabajo_semana_pasada = Factor("trabajo_semana_pasada")
        self.estado_civil = Factor("estado_civil")
        self.hijos = Factor("hijos")
        self.hijos_nacidos_vivos_total = Factor("hijos_nacidos_vivos_total")
        self.hijos_nacidos_Hombres = Factor("hijos_nacidos_Hombres")
        self.hijos_nacidos_Mujeres = Factor("hijos_nacidos_Mujeres")
        self.hijos_sobrevivientes = Factor("hijos_sobrevivientes")
        self.hijos_sobrevivientes_total = Factor("hijos_sobrevivientes_total")
        self.hijos_sobrevivientes_hombres = Factor("hijos_sobrevivientes_hombres")
        self.hijos_sobrevivientes_mujeres = Factor("hijos_sobrevivientes_mujeres")
        self.hijos_viven_fuera_actualmente_de_colombia = Factor("hijos_viven_fuera_actualmente_de_colombia")
        self.hijos_viven_fuera_total = Factor("hijos_viven_fuera_total")
        self.hijos_viven_fueraColombia_Hombres = Factor("hijos_viven_fueraColombia_Hombres")
        self.hijos_viven_fueraColombia_Mujeres = Factor("hijos_viven_fueraColombia_Mujeres")
        self.fecha_nacimiento_ultimoHijo = Factor("fecha_nacimiento_ultimoHijo")
        self.mes_nacimiento_ultimoHijo = Factor("mes_nacimiento_ultimoHijo")
        self.anio_nacimiento_ultimo_hijo = Factor("anio_nacimiento_ultimo_hijo")