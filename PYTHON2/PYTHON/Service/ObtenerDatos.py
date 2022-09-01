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
        self.cursor = self.db.obtener().cursor()
        self.personas = Persona()
        
    def obtener(self):
        
        self.cursor.execute("SELECT TOP 1000 " +
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
                            " FROM PERSONAS WITH(NOLOCK) ")
        
        rows = self.cursor.fetchall()

        for row in rows:
            
            print(row)
            
            self.personas.sexo.append(int(row[0]))
            self.personas.edad.append(int(row[1]))
            self.personas.alfabeta.append(int(row[2]))
            self.personas.region.append(int(row[3]))
            self.personas.departamento.append(int(row[4]))
            self.personas.municipio.append(int(row[5]))
            self.personas.cabecera_municipal.append(int(row[6]))
            self.personas.Codigo_Encuestas.append(int(row[7]))
            self.personas.Numero_orden_de_la_vivienda.append(int(row[8]))
            self.personas.numero_vivienda_hogar.append(int(row[9]))
            self.personas.numero_personas_hogar.append(int(row[10]))
            self.personas.parentesco_con_jefe_hogar.append(int(row[11]))
            self.personas.grupo_etnico.append(int(row[12]))
            self.personas.etnia_indigena.append(int(row[13]))
            self.personas.clan.append(int(row[14]))
            self.personas.vitsa.append(int(row[15]))
            self.personas.kumpia.append(int(row[16]))
            self.personas.habla_lengua_nativa.append(int(row[17]))
            self.personas.Entiende_lengua_nativa_de_su_pueblo.append(int(row[18]))
            self.personas.habla_otras_lengua_nativa.append(int(row[19]))
            self.personas.Numero_otras_lenguas_nativas.append(int(row[20]))
            self.personas.lugar_nacimiento.append(int(row[21]))
            self.personas.lugar_residencia_5_anos.append(int(row[22]))
            self.personas.lugar_residencia_1_anos.append(int(row[23]))
            self.personas.enfermo_ultimo_mes.append(int(row[24]))
            self.personas.Tratamiento_principal_problema_salud.append(int(row[25]))
            self.personas.atención_problema_salud.append(int(row[26]))
            self.personas.calidad_serivicio.append(int(row[27]))
            self.personas.dificultad_fisica.append(int(row[28]))
            self.personas.asiste_educacion.append(int(row[29]))
            self.personas.nivel_escolar_alcanzado.append(int(row[30]))
            self.personas.trabajo_semana_pasada.append(int(row[31]))
            self.personas.estado_civil.append(int(row[32]))
            self.personas.hijos.append(int(row[33]))
            self.personas.hijos_nacidos_vivos_total.append(int(row[34]))
            self.personas.hijos_nacidos_Hombres.append(int(row[35]))
            self.personas.hijos_nacidos_Mujeres.append(int(row[36]))
            self.personas.hijos_sobrevivientes.append(int(row[37]))
            self.personas.hijos_sobrevivientes_total.append(int(row[38]))
            self.personas.hijos_sobrevivientes_hombres.append(int(row[39]))
            self.personas.hijos_sobrevivientes_mujeres.append(int(row[40]))
            self.personas.hijos_viven_fuera_actualmente_de_colombia.append(int(row[41]))
            self.personas.hijos_viven_fuera_total.append(int(row[42]))
            self.personas.hijos_viven_fueraColombia_Hombres.append(int(row[43]))
            self.personas.hijos_viven_fueraColombia_Mujeres.append(int(row[44]))
            self.personas.fecha_nacimiento_ultimoHijo.append(int(row[45]))
            self.personas.mes_nacimiento_ultimoHijo.append(int(row[46]))
            self.personas.anio_nacimiento_ultimo_hijo.append(int(row[47]))
              
        return self.personas
            
        self.cursor.close()
        self.db.cerrar()