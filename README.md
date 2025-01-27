# **Sistema de Evaluación Basado en Proyectos**  
## Grupo 9

### **Herramientas Utilizadas**
- **Lenguajes de Programación**: PHP, JavaScript, HTML, CSS  
- **Frameworks**: Laravel, React  
- **Base de Datos**: MySQL  
- **IDE**: Visual Studio Code, MySQL Workbench  
- **Sistema de Control de Versiones**: Git y GitHub  
- **Task Board**: Trello  
- **Reuniones Diarias (Daily)**: Meet, Discord  

---

### **Roles del Equipo**
| Nombre                            | Rol             |
|-----------------------------------|-----------------|
| Mendoza Hinojosa Arnold Anthony   | QA              |
| Huanca Verduguez Giuliano Nicola  | Development     |
| Caprirolo Delgado Danitza         | QA              |
| Calisaya Marco Antonio            | Development     |
| Gerl Serelis Ethan Pierce         | Scrum Master    |

---

### **Modelo de negocios y Estructura de Datos**

### **Modelo**
El objetivo es facilitar a los docentes-tutores el seguimiento, evaluación semanal y final de
los equipos, así como promover una evaluación justa y sistemática.

#### **Grupo**
- **id**: Identificador único del grupo  
- **id_estudiantes**: IDs de los estudiantes asociados  
- **id_docente**: ID del docente responsable  
- **número_grupo**: Número del grupo  
- **fecha_creacion**: Fecha en que se creó el grupo  
- **cantidad_minima_permitida**: Mínimo número de miembros permitidos  
- **cantidad_maxima_permitida**: Máximo número de miembros permitidos  

#### **Docente**
- **nombre_completo**: Nombre completo del docente  
- **correo_electronico**: Email del docente  
- **telefono**: Número de contacto  
- **direccion**: Dirección del docente  
- **fecha_contratacion**: Fecha de contratación  
- **salario**: Salario del docente  
- **estado**: Estado actual del docente (activo/inactivo)  

#### **Estudiante**
- **nombre_completo**: Nombre completo del estudiante  
- **correo_electronico**: Email del estudiante  
- **telefono**: Número de contacto  
- **metodo_contacto_preferido**: Método preferido para comunicación  

#### **Evaluaciones**
- **id**: Identificador único de la evaluación  
- **id_estudiante**: ID del estudiante evaluado  
- **id_proyecto**: ID del proyecto relacionado  
- **calificacion_individual**: Nota individual  
- **calificacion_grupal**: Nota grupal  
- **calificacion_final**: Nota final  
- **fecha_evaluada**: Fecha de la evaluación  
- **estado**: Estado de la evaluación (completada/pendiente)  
- **id_docente**: ID del docente evaluador  
- **grupo**: Grupo asociado  

#### **Proyecto**
- **id**: Identificador único del proyecto  
- **fecha_entrega**: Fecha límite de entrega  
- **grupo_responsable**: Grupo encargado del proyecto  
- **estudiantes**: Lista de estudiantes involucrados  
- **codigo_proyecto**: Código asignado al proyecto  
- **nombre_proyecto**: Nombre del proyecto  
- **calificacion**: Calificación final del proyecto  

#### **Generación de Evaluaciones**
- Evaluaciones generadas en formato PDF.

---

### **Instrucciones**
1. **Clonar el repositorio**:  
   ```bash
   git clone [URL_DEL_REPOSITORIO]
