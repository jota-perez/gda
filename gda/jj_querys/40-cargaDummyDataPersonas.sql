INSERT INTO albergue.`tb_personas` VALUES 
    (1,'0','pdte vet',null,null,null,null,null,null,now(),now());

insert into albergue.tb_personas
	(fl_id,fl_nombre, fl_apellidos,fl_direccion,fl_cp,fl_provincia,fl_localidad,fl_pais)
select dni,nombre,apellidos,direccion,cp,provincia,municipio,pais
	from intranet.personas
order by rand()
limit 100
;
    
INSERT INTO albergue.`tb_personas` VALUES 
    (8888,'51922656-h','juanjo','pérez','c/mi calle, 27 4º izq','28080','prov','loc','egpaña',now(),now()),
    (9999,'no tiene','juanjo2','pérez2','c/la calle, 2','28880','prov2','loc2','chiquitistan',now(),now());

INSERT INTO albergue.`tb_personas_mas_tipos` VALUES 
    (1,1,10,now(),now()),
    (2,8888,2,now(),now()),
    (3,8888,3,now(),now()),
    (4,8888,4,now(),now()),
    (5,8888,10,now(),now()),
    (6,8888,1,now(),now()),
    (7,9999,1,now(),now());    
