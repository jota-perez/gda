insert into tb_aux_vias (fl_via_es) 
	select distinct lower(trim(nombre)) 
    from intranet.vias
    where nombre is not null and nombre!='';

insert into tb_animales_especies (fl_especie_es) 
	select distinct lower(trim(especie)) 
    from intranet.animales
    where especie is not null and especie!='';
    
insert into albergue.tb_animales_razas (fl_id_especie,fl_raza_es,fl_raza_al,fl_raza_in)
	select distinct e.fl_id_especie,lower(trim(r.raza)),lower(trim(r.aleman)),lower(trim(r.ingles)) 
	from intranet.animales as a
    inner join intranet.raza as r
		on a.raza=r.raza
	inner join albergue.tb_animales_especies as e
		on a.especie=e.fl_especie_es
    where a.raza is not null and a.raza !='';

insert into albergue.tb_animales_razas (fl_id_especie,fl_raza_es,fl_raza_al,fl_raza_in)
	select fl_id_especie,'otro','andere','other' from tb_animales_especies;
    
insert into albergue.tb_animales_colores (fl_id_especie,fl_color_es,fl_color_al,fl_color_in)
	select distinct e.fl_id_especie,lower(trim(r.color)),lower(trim(r.aleman)),lower(trim(r.ingles)) 
	from intranet.animales as a
    inner join intranet.color as r
		on a.color=r.color
	inner join albergue.tb_animales_especies as e
		on a.especie=e.fl_especie_es
    where a.color is not null and a.color !='';

insert into albergue.tb_animales_colores (fl_id_especie,fl_color_es,fl_color_al,fl_color_in)
	select fl_id_especie,'otro','andere','other' from tb_animales_especies;
    
insert into albergue.tb_animales_tamanos (fl_id_especie,fl_tamano_es,fl_tamano_al,fl_tamano_in)
	select distinct e.fl_id_especie,lower(trim(r.tamanio)),lower(trim(r.aleman)),lower(trim(r.ingles)) 
	from intranet.animales as a
    inner join intranet.tamanio as r
		on a.tamanio=r.tamanio
	inner join albergue.tb_animales_especies as e
		on a.especie=e.fl_especie_es
    where a.tamanio is not null and a.tamanio !='';

insert into albergue.tb_animales_tamanos (fl_id_especie,fl_tamano_es,fl_tamano_al,fl_tamano_in)
	select fl_id_especie,'otro','andere','other' from tb_animales_especies;

insert into albergue.tb_animales_pelos (fl_id_especie,fl_pelo_es,fl_pelo_al,fl_pelo_in)
	select distinct e.fl_id_especie,lower(trim(r.pelo)),lower(trim(r.aleman)),lower(trim(r.ingles)) 
	from intranet.animales as a
    inner join intranet.pelo as r
		on a.pelo=r.pelo
	inner join albergue.tb_animales_especies as e
		on a.especie=e.fl_especie_es
    where a.pelo is not null and a.pelo !='';

insert into albergue.tb_animales_pelos (fl_id_especie,fl_pelo_es,fl_pelo_al,fl_pelo_in)
	select fl_id_especie,'otro','andere','other' from tb_animales_especies;
    
insert into tb_tratamientos (fl_tratamiento_es,fl_id_especie)
	select distinct f.tratamiento,e.fl_id_especie
	from intranet.fichavet as f
	inner join intranet.pruebasytratamientos as p
		on f.tratamiento=p.nombre
	inner join intranet.animales as a
		on a.registro=f.idanimal
	inner join albergue.tb_animales_especies as e
		on a.especie=e.fl_especie_es;

INSERT INTO `tb_personas_tipos` VALUES 
    (1,'adoptante',now(),now()),
	(2,'canguro',now(),now()),
	(3,'padrino',now(),now()),
	(4,'socio',now(),now()),
	(10,'veterinario',now(),now()),
	(11,'atv',now(),now()),
	(12,'guardés',now(),now()),
	(13,'laboral',now(),now());



