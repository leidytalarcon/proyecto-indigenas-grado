# -*- coding: utf-8 -*-
"""
Created on Sat Jul  9 08:54:28 2022

@author: glori
"""

from Util.Conexion import Conexion
from Model.Persona import Persona

class ObtenerDatos:

    def __init__(self):
        self.db = Conexion()
        self.conexion = self.db.obtener()
        self.cursor = self.conexion.cursor()
        self.personas = Persona()
        
    def obtener(self, consulta):
        
        self.cursor.execute("SELECT " +
                            "P_SEXO," +
                            "P_EDADR," +
                            "P_ALFABETA," +
                            "TIPO_REG," +
                            "U_DPTO," +
                            "U_MPIO," +
                            "UA_CLASE," +
                            "COD_ENCUESTAS," +
                            "U_VIVIENDA," +
                            "P_NROHOG," +
                            "P_NRO_PER," +
                            "P_PARENTESCOR," +
                            "PA1_GRP_ETNIC," +
                            "PA11_COD_ETNIA," +
                            "PA12_CLAN," +
                            "PA21_COD_VITSA," +
                            "PA22_COD_KUMPA," +
                            "PA_HABLA_LENG," +
                            "PA1_ENTIENDE," +
                            "PB_OTRAS_LENG," +
                            "PB1_QOTRAS_LENG," +
                            "PA_LUG_NAC," +
                            "PA_VIVIA_5ANOS," +
                            "PA_VIVIA_1ANO," +
                            "P_ENFERMO," +
                            "P_QUEHIZO_PPAL," +
                            "PA_LO_ATENDIERON," +
                            "PA1_CALIDAD_SERV," +
                            "CONDICION_FISICA," +
                            "PA_ASISTENCIA," +
                            "P_NIVEL_ANOSR," +
                            "P_TRABAJO," +
                            "P_EST_CIVIL," +
                            "PA_HNV," +
                            "PA1_THNV," +
                            "PA2_HNVH," +
                            "PA3_HNVM," +
                            "PA_HNVS," +
                            "PA1_THSV," +
                            "PA2_HSVH," +
                            "PA3_HSVM," +
                            "PA_HFC," +
                            "PA1_THFC," +
                            "PA2_HFCH," +
                            "PA3_HFCM," +
                            "PA_UHNV," +
                            "PA1_MES_UHNV," +
                            "PA2_ANO_UHNV " +
                            "FROM PERSONAS WITH(NOLOCK) " +
                            "WHERE P_ALFABETA != 0 " + consulta )
        
        rows = self.cursor.fetchall()
        
        for row in rows:
            
            self.personas.sexo.append(int(row.P_SEXO))
            self.personas.edad.append(int(row.P_EDADR))
            self.personas.alfabeta.append(int(row.P_ALFABETA))
            self.personas.region.append(int(row.TIPO_REG))
            self.personas.departamento.append(int(row.U_DPTO))
            self.personas.municipio.append(int(row.U_MPIO))
            self.personas.cabecera_municipal.append(int(row.UA_CLASE))
            self.personas.Codigo_Encuestas.append(int(row.COD_ENCUESTAS))
            self.personas.Numero_orden_de_la_vivienda.append(int(row.U_VIVIENDA))
            self.personas.numero_vivienda_hogar.append(int(row.P_NROHOG))
            self.personas.numero_personas_hogar.append(int(row.P_NRO_PER))
            self.personas.parentesco_con_jefe_hogar.append(int(row.P_PARENTESCOR))
            self.personas.grupo_etnico.append(int(row.PA1_GRP_ETNIC))
            self.personas.etnia_indigena.append(int(row.PA11_COD_ETNIA))
            self.personas.clan.append(int(row.PA12_CLAN))
            self.personas.vitsa.append(int(row.PA21_COD_VITSA))
            self.personas.kumpia.append(int(row.PA22_COD_KUMPA))
            self.personas.habla_lengua_nativa.append(int(row.PA_HABLA_LENG))
            self.personas.Entiende_lengua_nativa_de_su_pueblo.append(int(row.PA1_ENTIENDE))
            self.personas.habla_otras_lengua_nativa.append(int(row.PB_OTRAS_LENG))
            self.personas.Numero_otras_lenguas_nativas.append(int(row.PB1_QOTRAS_LENG))
            self.personas.lugar_nacimiento.append(int(row.PA_LUG_NAC))
            self.personas.lugar_residencia_5_anos.append(int(row.PA_VIVIA_5ANOS))
            self.personas.lugar_residencia_1_anos.append(int(row.PA_VIVIA_1ANO))
            self.personas.enfermo_ultimo_mes.append(int(row.P_ENFERMO))
            self.personas.Tratamiento_principal_problema_salud.append(int(row.P_QUEHIZO_PPAL))
            self.personas.atención_problema_salud.append(int(row.PA_LO_ATENDIERON))
            self.personas.calidad_serivicio.append(int(row.PA1_CALIDAD_SERV))
            self.personas.dificultad_fisica.append(int(row.CONDICION_FISICA))
            self.personas.asiste_educacion.append(int(row.PA_ASISTENCIA))
            self.personas.nivel_escolar_alcanzado.append(int(row.P_NIVEL_ANOSR))
            self.personas.trabajo_semana_pasada.append(int(row.P_TRABAJO))
            self.personas.estado_civil.append(int(row.P_EST_CIVIL))
            self.personas.hijos.append(int(row.PA_HNV))
            self.personas.hijos_nacidos_vivos_total.append(int(row.PA1_THNV))
            self.personas.hijos_nacidos_Hombres.append(int(row.PA2_HNVH))
            self.personas.hijos_nacidos_Mujeres.append(int(row.PA3_HNVM))
            self.personas.hijos_sobrevivientes.append(int(row.PA_HNVS))
            self.personas.hijos_sobrevivientes_total.append(int(row.PA1_THSV))
            self.personas.hijos_sobrevivientes_hombres.append(int(row.PA2_HSVH))
            self.personas.hijos_sobrevivientes_mujeres.append(int(row.PA3_HSVM))
            self.personas.hijos_viven_fuera_actualmente_de_colombia.append(int(row.PA_HFC))
            self.personas.hijos_viven_fuera_total.append(int(row.PA1_THFC))
            self.personas.hijos_viven_fueraColombia_Hombres.append(int(row.PA2_HFCH))
            self.personas.hijos_viven_fueraColombia_Mujeres.append(int(row.PA3_HFCM))
            self.personas.fecha_nacimiento_ultimoHijo.append(int(row.PA_UHNV))
            self.personas.mes_nacimiento_ultimoHijo.append(int(row.PA1_MES_UHNV))
            self.personas.anio_nacimiento_ultimo_hijo.append(int(row.PA2_ANO_UHNV))
              
        return self.personas
            
        self.cursor.close()
        self.db.cerrar()