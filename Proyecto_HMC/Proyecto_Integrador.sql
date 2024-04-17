create database HMC;

create table HMC_registro(HMC_id_registro varchar(10),
                          HMC_password_registro varchar(10),
                          HMC_password_secreto varchar(5),
                          primary key(HMC_id_registro, HMC_password_registro)
                          );

CREATE TABLE HMC_sesion_iniciada (HMC_id_sesion varchar(10),
                         HMC_password_sesion varchar(10),       
                         HMC_password_secreto varchar(5), 
                         HMC_fecha_inicio date,
                         HMC_hora_inicio time,                    
                         FOREIGN KEY (HMC_id_sesion, HMC_password_sesion) 
                         REFERENCES HMC_registro(HMC_id_registro, HMC_password_registro)
                        );

CREATE TABLE HMC_sesion_finalizada (HMC_id_sesion varchar(10),
                         HMC_password_sesion varchar(10),       
                         HMC_password_secreto varchar(5),
                         HMC_fecha_final date,
                         HMC_hora_final time,
                         FOREIGN KEY (HMC_id_sesion, HMC_password_sesion) 
                         REFERENCES HMC_registro(HMC_id_registro, HMC_password_registro)
                        );                                                  

create table HMC_registroAdmin(HMC_idAdmin_registro varchar(10),
                               HMC_passwordAdmin_registro varchar(10),
                               HMC_passwordAdmin_secreto varchar(5),
                               HMC_id_registro varchar(10),
                               primary key(HMC_idAdmin_registro, HMC_passwordAdmin_registro),
                               foreign key(HMC_id_registro) references HMC_registro(HMC_id_registro)
                               );                          

CREATE TABLE HMC_sesionAdmin_iniciada (HMC_idAdmin_sesion varchar(10),
                              HMC_passwordAdmin_sesion varchar(10),
                              HMC_passwordAdmin_secreto varchar(5),
                              HMC_id_registro varchar(10),
                              HMC_fecha_inicioAdmin date,
                              HMC_hora_inicioAdmin time,                            
                              FOREIGN KEY (HMC_idAdmin_sesion, HMC_passwordAdmin_sesion) 
                              REFERENCES HMC_registroAdmin(HMC_idAdmin_registro, HMC_passwordAdmin_registro),
                              FOREIGN KEY (HMC_id_registro) 
                              REFERENCES HMC_registroAdmin(HMC_id_registro)
                             );

CREATE TABLE HMC_sesionAdmin_finalizada (HMC_idAdmin_sesion varchar(10),
                              HMC_passwordAdmin_sesion varchar(10),
                              HMC_passwordAdmin_secreto varchar(5),
                              HMC_id_registro varchar(10),
                              HMC_fecha_finalAdmin date,
                              HMC_hora_finalAdmin time,                            
                              FOREIGN KEY (HMC_idAdmin_sesion, HMC_passwordAdmin_sesion) 
                              REFERENCES HMC_registroAdmin(HMC_idAdmin_registro, HMC_passwordAdmin_registro),
                              FOREIGN KEY (HMC_id_registro) 
                              REFERENCES HMC_registroAdmin(HMC_id_registro)
                             );                                                    

create table HMC_estudiante (HMC_id_registro varchar(10),    
                             HMC_nombre varchar(50), 
                             HMC_apellido_paterno varchar(30),
                             HMC_apellido_materno varchar(30),
                             HMC_genero varchar(20), 
                             HMC_fecha_nacimiento date,
                             HMC_calle varchar(60),
                             HMC_numero_interior int(3),
                             HMC_numero_exterior varchar(2),
                             HMC_municipio varchar(60),
                             HMC_telefono_personal varchar(10),
                             HMC_telefono_casa varchar(10),                             
                             HMC_estado varchar(20),
                             HMC_cuatrimestre int(2),
                             HMC_carrera varchar(30),
                             HMC_password_secreto varchar(5),
                             foreign key(HMC_id_registro) references HMC_registro(HMC_id_registro)
                             );

create table HMC_padreAdmin (HMC_idAdmin_registro varchar(10),
                             HMC_nombre1 varchar(50),
                             HMC_apelllido_paterno1 varchar(30),
                             HMC_apellido_materno1 varchar(30),
                             HMC_genero1 varchar(20), 
                             HMC_fecha_nacimiento1 date,
                             HMC_calle1 varchar(60),
                             HMC_numero_interior1 int(3),
                             HMC_numero_exterior1 varchar(2),
                             HMC_municipio1 varchar(60),
                             HMC_telefono_personal1 varchar(10),
                             HMC_telefono_casa1 varchar(10),                             
                             HMC_estado1 varchar(20),
                             HMC_id_registro varchar(10),
                             HMC_password_secreto(5),
                             foreign key(HMC_id_registro) references HMC_registro(HMC_id_registro)
                             );

create table HMC_usuario (HMC_us varchar(20),
                           HMC_nombre2 varchar(50),
                           HMC_apellido_paterno2 varchar(30),
                           HMC_apellido_materno2 varchar(30),
                           HMC_genero2 varchar(20),
                           HMC_fecha_nacimiento2 date,
                           HMC_calle2 varchar(60),
                           HMC_numero_interior2 int(3),
                           HMC_numero_exterior2 varchar(2),
                           HMC_municipio2 varchar(60),
                           HMC_telefono_personal2 int(10),
                           HMC_telefono_casa2 int(10),                             
                           HMC_estado2 varchar(20),
                           HMC_empresa varchar(30),
                           HMC_empresa_calle varchar(30),
                           HMC_salario varchar(20),
                           primary key(HMC_us)
                           );

create table HMC_usuarioAdmin (HMC_ua varchar(20),
                               HMC_nombre2 varchar(50),
                               HMC_apellido_paterno2 varchar(30),
                               HMC_apellido_materno2 varchar(30),
                               HMC_genero2 varchar(20),
                               HMC_fecha_nacimiento2 date,
                               HMC_calle2 varchar(60),
                               HMC_numero_interior2 int(3),
                               HMC_numero_exterior2 varchar(2),
                               HMC_municipio2 varchar(60),
                               HMC_telefono_personal2 int(10),
                               HMC_telefono_casa2 int(10),                             
                               HMC_estado2 varchar(20),
                               HMC_us varchar(20),
                               primary key(HMC_ua),
                               foreign key(HMC_us) references HMC_usuario(HMC_us)
                               );