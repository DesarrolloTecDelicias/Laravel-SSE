use new 
/*** Users ***/
select
  CONCAT(
    'INSERT INTO users(`name`, `email`, `password`, `role`, `control_number`, `year_graduated`, `is_new_user`, `created_at`, `updated_at`)',
    'VALUES(\'',
    UPPER(CONVERT(CAST(CONVERT(exalumno.nombres USING latin1) AS BINARY) USING utf8)),
    '\',',
    CONCAT('\'',login.email, '\','),
    '\' \',',
    '\'student\',',
    CONCAT('\'', exalumno.nControl, '\','),
    CONCAT('\'', exalumno.egreso, '\','),
    '1 ,NOW(), NOW());'
  )
from
  login
  inner join exalumno on TRIM(exalumno.nControl) = TRIM(login.NumeroControl)
group by
  login.NumeroControl
order by
  login.id_user


/*** Survey 1 ***/
select
  CONCAT(
    'INSERT INTO survey_ones(`user_id`, `first_name`,`fathers_surname`,`mothers_surname`,`control_number` 
    ,`birthday`,`curp`,`sex`,`marital_status`,`address`,`zip_code`,`suburb`,`state`,`city`
    ,`municipality`,`phone`,`cellphone`,`email`,`career`,`specialty`,`qualified`,`month`
    ,`year`,`percent_english`,`another_language`,`percent_another_language`,`software`
    ,`created_at`, `updated_at`)',
    'VALUES(',
    CONCAT('\'', users.id, '\','),
    CONCAT('\'', TRIM(UPPER(CONVERT(
      CAST(CONVERT(perfilegresados.Nombre USING latin1) AS BINARY) USING utf8
    ))), '\','),
    CONCAT('\'', TRIM(UPPER(CONVERT(
      CAST(CONVERT(perfilegresados.ApellidoPaterno USING latin1) AS BINARY) USING utf8
    ))), '\','),
    CONCAT('\'', TRIM(UPPER(CONVERT(
      CAST(CONVERT(perfilegresados.ApellidoMaterno USING latin1) AS BINARY) USING utf8
    ))), '\','),
    CONCAT('\'', TRIM(perfilegresados.NumeroControl), '\','),
    CONCAT('\'', TRIM(perfilegresados.FechaNacimiento), '\','),
    CONCAT('\'', TRIM(perfilegresados.Curp), '\','),
    CONCAT('\'', TRIM(perfilegresados.Sexo), '\','),
    CONCAT('\'', TRIM(perfilegresados.estadoCivil), '\','),
    CONCAT('\'', TRIM(UPPER(CONVERT(
      CAST(CONVERT(perfilegresados.Calle USING latin1) AS BINARY) USING utf8
    ))),' ',TRIM(perfilegresados.Numero) ,'\','),
    CONCAT('\'', TRIM(perfilegresados.CP), '\','),
    CONCAT('\'', TRIM(UPPER(CONVERT(
      CAST(CONVERT(perfilegresados.Colonia USING latin1) AS BINARY) USING utf8
    ))), '\','),
    CONCAT('\'', TRIM(UPPER(CONVERT(
      CAST(CONVERT(perfilegresados.Estado USING latin1) AS BINARY) USING utf8
    ))), '\','),
    CONCAT('\'', TRIM(UPPER(CONVERT(
      CAST(CONVERT(perfilegresados.Ciudad USING latin1) AS BINARY) USING utf8
    ))), '\','),
    CONCAT('\'', TRIM(UPPER(CONVERT(
      CAST(CONVERT(perfilegresados.Municipio USING latin1) AS BINARY) USING utf8
    ))), '\','),
    CONCAT('\'', TRIM(perfilegresados.TelCasaPat), '\','),
    CONCAT('\'', TRIM(perfilegresados.TelefonoCelular), '\','),
    CONCAT('\'', TRIM(perfilegresados.Email), '\','),
    CONCAT('\'', TRIM(perfilegresados.NombreCarrera), '\','),
    CONCAT('\'', TRIM(perfilegresados.Especialidad), '\','),
    CONCAT('\'', IF(perfilegresados.Titulado = 'NO', 'NO', 'SÍ'), '\','),
    CONCAT('\'', TRIM(UPPER(perfilegresados.MesEgreso)), '\','),
    CONCAT('\'', TRIM(perfilegresados.AnioEgreso), '\','),
    CONCAT('\'', TRIM(perfilegresados.DominioIdioma), '\','),
    CONCAT('\'', TRIM(UPPER(CONVERT(
      CAST(CONVERT(perfilegresados.OtroIdioma USING latin1) AS BINARY) USING utf8
    ))), '\','),
    CONCAT('\'', TRIM(perfilegresados.PorcentajeOtroIdioma), '\','),
    if(perfilegresados.ManejoPaquetesComputacionales is NULL, 'NULL',  
      CONCAT('\'',UPPER(CONVERT(
      CAST(CONVERT(perfilegresados.ManejoPaquetesComputacionales USING latin1) AS BINARY) USING utf8
    )),'\',')),
    'NOW(), NOW());'
  )
from
  users
  inner join perfilegresados on TRIM(perfilegresados.NumeroControl) = TRIM(users.control_number)
  

/*** Survey 2 ***/
select
  CONCAT(
    'INSERT INTO survey_twos(`user_id`, `quality_teachers`,`syllabus`
    ,`study_condition`,`experience`,`study_emphasis`,`participate_projects`
    ,`created_at`, `updated_at`)',
    'VALUES(',
    CONCAT('\'',users.id,'\','),
    CONCAT('\'', TRIM(UPPER(pertinenciadisponibilidadmediosrecursosaprendizaje.CalidadDocente)), '\','),
    CONCAT('\'', TRIM(UPPER(pertinenciadisponibilidadmediosrecursosaprendizaje.PlanEstudios)), '\','),
    CONCAT('\'', TRIM(UPPER(pertinenciadisponibilidadmediosrecursosaprendizaje.SatisfaccionCondicionesEstudio)), '\','),
    CONCAT('\'', TRIM(UPPER(pertinenciadisponibilidadmediosrecursosaprendizaje.ExperienciaObtenidaResidenciaProfesional)), '\','),
    CONCAT('\'', TRIM(UPPER(pertinenciadisponibilidadmediosrecursosaprendizaje.InvestigacionProcesoEnsenanza)), '\','),
    CONCAT('\'', TRIM(UPPER(pertinenciadisponibilidadmediosrecursosaprendizaje.OportunidadProyectosInvestigacionDesarrollo)), '\','),
    'NOW(), NOW());'
  )
from
  users
  inner join pertinenciadisponibilidadmediosrecursosaprendizaje on TRIM(pertinenciadisponibilidadmediosrecursosaprendizaje.NumeroControl) = TRIM(users.control_number)


/*** Survey 3 ***/
select
  CONCAT(
    'INSERT INTO survey_threes(`user_id`, `do_for_living`,`speciality`,`school`,`long_take_job` 
    ,`hear_about`,`competence1`,`competence2`,`competence3`,`competence4`,`competence5`,`competence6`
    ,`language_most_spoken`,`speak_percent`,`write_percent`,`read_percent`,`listen_percent`,`seniority`
    ,`year`,`salary`,`management_level`,`job_condition`,`job_relationship`,`business_name`,`business_activity`
    ,`address`,`zip`,`suburb`,`state`,`city`,`municipality`,`phone`,`fax`,`web_page`,`boss_email`
    ,`business_structure`,`company_size`,`business_activity_selector`
    ,`created_at`, `updated_at`)',
    'VALUES(',
    CONCAT('\'', users.id, '\','),
    CONCAT('\'', TRIM(UPPER(ubicacionlaboral.Dedicacion)), '\','),

    if(ubicacionlaboral.Estudios is NULL, 'NULL,',  
      CONCAT('\'',UPPER(CONVERT(
      CAST(CONVERT(ubicacionlaboral.Estudios USING latin1) AS BINARY) USING utf8
    )),'\',')),

    if(ubicacionlaboral.Institucion is NULL, 'NULL,',  
      CONCAT('\'',UPPER(CONVERT(
      CAST(CONVERT(ubicacionlaboral.Institucion USING latin1) AS BINARY) USING utf8
    )),'\',')),

    if(ubicacionlaboral.Tiempo is NULL, 'NULL,',
      CONCAT('\'',UPPER(CONVERT(
      CAST(CONVERT(ubicacionlaboral.Tiempo USING latin1) AS BINARY) USING utf8
    )),'\',')),

    if(ubicacionlaboral.Medio is NULL, 'NULL,',
      CONCAT('\'',UPPER(CONVERT(
      CAST(CONVERT(ubicacionlaboral.Medio USING latin1) AS BINARY) USING utf8
    )),'\',')),

    if(ubicacionlaboral.competencia1 is NULL, 'NULL', ubicacionlaboral.competencia1),    
    ',',
    if(ubicacionlaboral.competencia2 is NULL, 'NULL', ubicacionlaboral.competencia2),
    ',',
    if(ubicacionlaboral.competencia3 is NULL, 'NULL', ubicacionlaboral.competencia3),
    ',',
    if(ubicacionlaboral.competencia4 is NULL, 'NULL', ubicacionlaboral.competencia4),
    ',',
    if(ubicacionlaboral.competencia5 is NULL, 'NULL', ubicacionlaboral.competencia5),
    ',',
    if(ubicacionlaboral.competencia6 is NULL, 'NULL', ubicacionlaboral.competencia6),
    ',',

    if(ubicacionlaboral.idioma is NULL, 'NULL,',
      CONCAT('\'',UPPER(CONVERT(
      CAST(CONVERT(ubicacionlaboral.idioma USING latin1) AS BINARY) USING utf8
    )),'\',')),

    if(ubicacionlaboral.PropHablar is NULL, 'NULL,', CONCAT('\'',ubicacionlaboral.PropHablar,'\',')),

    if(ubicacionlaboral.PropEscribir is NULL, 'NULL,', CONCAT('\'',ubicacionlaboral.PropEscribir,'\',')),

    if(ubicacionlaboral.PropLeer is NULL, 'NULL,', CONCAT('\'',ubicacionlaboral.PropLeer,'\',')),

    if(ubicacionlaboral.PropEscuchar is NULL, 'NULL,', CONCAT('\'',ubicacionlaboral.PropEscuchar,'\',')),

    if(ubicacionlaboral.Antiguedad is NULL, 'NULL,',
      CONCAT('\'',UPPER(CONVERT(
      CAST(CONVERT(ubicacionlaboral.Antiguedad USING latin1) AS BINARY) USING utf8
    )),'\',')),

    if(ubicacionlaboral.AnioIngreso is NULL, 'NULL,', CONCAT('\'',ubicacionlaboral.AnioIngreso,'\',')),      

    if(ubicacionlaboral.IngresoEconomico is NULL, 'NULL,',
      CONCAT('\'',UPPER(CONVERT(
      CAST(CONVERT(ubicacionlaboral.IngresoEconomico USING latin1) AS BINARY) USING utf8
    )),'\',')),

    if(ubicacionlaboral.Nivel is NULL, 'NULL,',
      CONCAT('\'',UPPER(CONVERT(
      CAST(CONVERT(ubicacionlaboral.Nivel USING latin1) AS BINARY) USING utf8
    )),'\',')),

    if(ubicacionlaboral.Condicion is NULL, 'NULL,',
      CONCAT('\'',UPPER(CONVERT(
      CAST(CONVERT(ubicacionlaboral.Condicion USING latin1) AS BINARY) USING utf8
    )),'\',')),

    if(ubicacionlaboral.RelTrab is NULL, 'NULL,', CONCAT('\'',ubicacionlaboral.RelTrab,'\',')),
    
    if(ubicacionlaboral.RazonSocial is NULL, 'NULL,',
      CONCAT('\'',UPPER(CONVERT(
      CAST(CONVERT(ubicacionlaboral.RazonSocial USING latin1) AS BINARY) USING utf8
    )),'\',')),

    if(ubicacionlaboral.Giro is NULL, 'NULL,',
      CONCAT('\'',UPPER(CONVERT(
      CAST(CONVERT(ubicacionlaboral.Giro USING latin1) AS BINARY) USING utf8
    )),'\',')),

    if(ubicacionlaboral.DomicilioCalle is NULL, 'NULL,',
      CONCAT('\'', UPPER(CONVERT(
      CAST(CONVERT(ubicacionlaboral.DomicilioCalle USING latin1) AS BINARY) USING utf8
    )),' ', if(ubicacionlaboral.DomicilioNumero is NULL, '', ubicacionlaboral.DomicilioNumero),'\',')),

    if(ubicacionlaboral.DomicilioCP is NULL, 'NULL,', CONCAT('\'',ubicacionlaboral.DomicilioCP,'\',')),

    if(ubicacionlaboral.DomicilioColonia is NULL, 'NULL,',
      CONCAT('\'',UPPER(CONVERT(
      CAST(CONVERT(ubicacionlaboral.DomicilioColonia USING latin1) AS BINARY) USING utf8
    )),'\',')),

    if(ubicacionlaboral.DomicilioEstado is NULL, 'NULL,',
      CONCAT('\'',UPPER(CONVERT(
      CAST(CONVERT(ubicacionlaboral.DomicilioEstado USING latin1) AS BINARY) USING utf8
    )),'\',')),

    if(ubicacionlaboral.DomicilioCiudad is NULL, 'NULL,',
      CONCAT('\'',UPPER(CONVERT(
      CAST(CONVERT(ubicacionlaboral.DomicilioCiudad USING latin1) AS BINARY) USING utf8
    )),'\',')),

    if(ubicacionlaboral.DomicilioMunicipio is NULL, 'NULL,',
      CONCAT('\'',UPPER(CONVERT(
      CAST(CONVERT(ubicacionlaboral.DomicilioMunicipio USING latin1) AS BINARY) USING utf8
    )),'\',')),

    if(ubicacionlaboral.Telefonos is NULL, 'NULL,', CONCAT('\'', ubicacionlaboral.Telefonos,'\',')),

    if(ubicacionlaboral.Fax is NULL, 'NULL,', CONCAT('\'', ubicacionlaboral.Fax,'\',')),

    if(ubicacionlaboral.PaginaWeb is NULL, 'NULL,', CONCAT('\'', ubicacionlaboral.PaginaWeb,'\',')),
    
    if(ubicacionlaboral.CorreoJefe is NULL, 'NULL,', CONCAT('\'', ubicacionlaboral.CorreoJefe,'\',')),
    
    if(ubicacionlaboral.Sector is NULL, 'NULL,',
      CONCAT('\'',UPPER(CONVERT(
      CAST(CONVERT(ubicacionlaboral.Sector USING latin1) AS BINARY) USING utf8
    )),'\',')),

    if(ubicacionlaboral.TamanoEmpresa is NULL, 'NULL,',
      CONCAT('\'',UPPER(CONVERT(
      CAST(CONVERT(ubicacionlaboral.TamanoEmpresa USING latin1) AS BINARY) USING utf8
    )),'\',')),

    if(ubicacionlaboral.Economica is NULL, 'NULL,',
      CONCAT('\'',UPPER(CONVERT(
      CAST(CONVERT(ubicacionlaboral.Economica USING latin1) AS BINARY) USING utf8
    )),'\',')),
    
    'NOW(), NOW());'
  )
from
  users
  inner join ubicacionlaboral on TRIM(ubicacionlaboral.NumeroControl) = TRIM(users.control_number)


/*** Survey 4 ***/
select
  CONCAT(
    'INSERT INTO survey_fours(`user_id`, `efficiency_work_activities`,`academic_training`
    ,`usefulness_professional_residence`,`study_area`,`title`,`experience`,`job_competence`
    ,`positioning`,`languages`,`recommendations`,`personality`,`leadership`,`others`
    ,`created_at`, `updated_at`)',
    'VALUES(',
    CONCAT('\'', users.id, '\','),
    CONCAT('\'', TRIM(UPPER(CONVERT(CAST(CONVERT(desempenoprofesionalegresados.EficienciaLaboral USING latin1) AS BINARY) USING utf8))), '\','),
    CONCAT('\'', TRIM(UPPER(CONVERT(CAST(CONVERT(desempenoprofesionalegresados.FormacionAcademica USING latin1) AS BINARY) USING utf8))), '\','),
    CONCAT('\'', TRIM(UPPER(CONVERT(CAST(CONVERT(desempenoprofesionalegresados.UtilidadResidencia USING latin1) AS BINARY) USING utf8))), '\','),
    TRIM(desempenoprofesionalegresados.Area), ',',
    TRIM(desempenoprofesionalegresados.Titulacion), ',',
    TRIM(desempenoprofesionalegresados.ExperienciaLaboral), ',',
    TRIM(desempenoprofesionalegresados.CompeteniaLaboral), ',',
    TRIM(desempenoprofesionalegresados.Poicionamiento), ',',
    TRIM(desempenoprofesionalegresados.ConocimientoIdiomas), ',',
    TRIM(desempenoprofesionalegresados.Recomendaciones), ',',
    TRIM(desempenoprofesionalegresados.Personalidad), ',',
    TRIM(desempenoprofesionalegresados.CapacidadLiderazgo), ',',
    TRIM(desempenoprofesionalegresados.Otros), ',',
    'NOW(), NOW());'
  )
from
  users
  inner join desempenoprofesionalegresados on TRIM(desempenoprofesionalegresados.NumeroControl) = TRIM(users.control_number)


/*** Survey 5 ***/
select
  CONCAT(
    'INSERT INTO survey_fives(`user_id`, `courses_yes_no`,`courses`,`master_yes_no`,`master`,`created_at`, `updated_at`)',
    'VALUES(',
    CONCAT('\'', users.id, '\','),
    CONCAT('\'', IF(expectativasdesarrollo.CursoActualizacion = 'No', 'NO', 'SÍ'), '\','),
    CONCAT('\'', TRIM(CONVERT(CAST(CONVERT(expectativasdesarrollo.CurActCuales USING latin1) AS BINARY) USING utf8)), '\','),
    CONCAT('\'', IF(expectativasdesarrollo.Posgrado = 'No', 'NO', 'SÍ'), '\','),
    CONCAT('\'', TRIM(CONVERT(CAST(CONVERT(expectativasdesarrollo.Cual USING latin1) AS BINARY) USING utf8)), '\','),
    'NOW(), NOW());'
  )
from
  users
  inner join expectativasdesarrollo on TRIM(expectativasdesarrollo.NumeroControl) = TRIM(users.control_number)


/*** Survey 6 ***/
select
  CONCAT(
    'INSERT INTO survey_sixes(`user_id`, `organization_yes_no`,`organization`,`agency_yes_no`,`agency`,`association_yes_no`, `association`,`created_at`, `updated_at`)',
    'VALUES(',
    CONCAT('\'', users.id, '\','),
    CONCAT('\'', IF(participacionsocialegresados.OrganizacionSocial = 'No', 'NO', 'SÍ'), '\','),
    CONCAT('\'', TRIM(CONVERT(CAST(CONVERT(participacionsocialegresados.OrgSocCuales USING latin1) AS BINARY) USING utf8)), '\','),
    CONCAT('\'', IF(participacionsocialegresados.OrganismoProfesional = 'No', 'NO', 'SÍ'), '\','),
    CONCAT('\'', TRIM(CONVERT(CAST(CONVERT(participacionsocialegresados.OrgProfCuales USING latin1) AS BINARY) USING utf8)), '\','),
    CONCAT('\'', IF(participacionsocialegresados.AsociacionEgresados = 'No', 'NO', 'SÍ'), '\','),
    CONCAT('\'', TRIM(CONVERT(CAST(CONVERT(participacionsocialegresados.AsoEgreCuales USING latin1) AS BINARY) USING utf8)), '\','), 
    'NOW(), NOW());'
  )
from
  users
  inner join participacionsocialegresados on TRIM(participacionsocialegresados.NumeroControl) = TRIM(users.control_number)


/*** Survey 7 ***/
select
  CONCAT(
    'INSERT INTO survey_sevens(`user_id`, `comments`, `created_at`, `updated_at`)',
    'VALUES(',
    CONCAT('\'', users.id, '\','),
    CONCAT('\'', TRIM(CONVERT(CAST(CONVERT(comentariossugerencias.OpinionMejoraProfesional USING latin1) AS BINARY) 
          USING utf8)), '\','),
    'NOW(), NOW());'
  )
from
  users
  inner join comentariossugerencias on TRIM(comentariossugerencias.NumeroControl) = TRIM(users.control_number)
where
  comentariossugerencias.OpinionMejoraProfesional <> ''
  or comentariossugerencias.OpinionMejoraProfesional <> ' '