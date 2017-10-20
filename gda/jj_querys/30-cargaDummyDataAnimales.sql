create table albergue.aux1 as 
	SELECT a.nombre, a.especie, a.raza, a.tamanio,a.color,a.pelo, a.nchip, a.registro,
		 e.fl_id_especie
	FROM intranet.animales as a
	inner join albergue.tb_animales_especies as e
		on a.especie=e.fl_especie_es
	where a.id > 10000
	order by rand()
	LIMIT 100;
    
insert into albergue.tb_animales (fl_nombre,fl_id_especie,fl_id_raza,fl_id_tamano,fl_id_color,fl_id_pelo,fl_chip,fl_registro)
SELECT a.nombre, a.fl_id_especie,r.fl_id_raza, t.fl_id_tamano,c.fl_id_color,p.fl_id_pelo, a.nchip, a.registro
from albergue.aux1 as a
inner join 
	albergue.tb_animales_razas as r
    on a.raza=r.fl_raza_es and a.fl_id_especie=r.fl_id_especie
inner join 
	albergue.tb_animales_tamanos as t
    on a.tamanio=t.fl_tamano_es and a.fl_id_especie=t.fl_id_especie
inner join 
	albergue.tb_animales_colores as c
    on a.color=c.fl_color_es and a.fl_id_especie=c.fl_id_especie
inner join 
	albergue.tb_animales_pelos as p
    on a.pelo=p.fl_pelo_es and a.fl_id_especie=p.fl_id_especie
;

drop table albergue.aux1;