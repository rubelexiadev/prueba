# Respuestas del Test de Conocimientos Generales para Desarrollador Fullstack Junior

## Aclaraciones sobre mis respuestas

Hola. Como mi mayor experiencia trabajando ha sido en la parte del front, debo decir que tuve que usar la documentación en cierta medida para las partes de Symfony y SQL. Debo decir que disfruté la experiencia de dar los primeros pasos en Symfony.

Sí he trabajado con backend antes pero mayormente en .NET y NodeJS. Domino los conceptos esenciales, eso sí. Además, ya había trasteado con PHP.

Todas las respuestas las pueden encontrar aquí abajo.

En cuanto a comentar el código, yo en lo personal no suelo hacerlo demasiado en mis proyectos personales puesto que priorizo un código auto-explicativo, y esta ha sido la filosofía que se me ha inculcado en la poca experiencia laboral que he tenido hasta el momento.

Sin embargo, entiendo que lo que se busca en este test es comprobar quizás a través de los comentarios que estoy entendiendo efectivamente el código que escribo. Por este motivo, en las preguntas donde supuse que podía ser necesario realizar alguna aclaración, adjunté la misma.

De todos modos, si finalmente deciden escogerme para avanzar en el proceso estoy dispuesto a explicar mi código en vivo y lo que haga falta. Como regla general, no me gusta escribir una línea de código sin saber lo que hace y soy extremadamente curioso.

Dicho esto, añadir que a pesar de que no soy el más experimentado, tengo muchas ganas de seguir aprendiendo y superándome, aunque sé que esto es algo que lo dice todo el mundo.

## Contacto

**Teléfono**: +53 59587424

**Correo**: rubennnda@gmail.com

## Sección 1: Symfony

1. **Pregunta de Configuración:**

- Describe los pasos básicos para levantar un proyecto en Symfony.

Estos son los pasos que seguí para levantar mi proyecto de Symfony:

- Abrí una terminal en la carpeta `symfony`.
- Ejecuté el comando `composer create-project symfony/skeleton:"7.1.*" test` para inicializar un proyecto con la plantilla de la última versión estable de Symfony en una nueva carpeta llamada `test`. Para esto usé Composer, el gestor de paquetes de PHP.
- Entré a la carpeta recién creada usando el comando `cd test`.
- Una vez dentro, ejecuté `composer require webapp` para de paso obtener un gran número de componentes necesarios en la creación de una aplicación web, pues al leer la prueba me di cuenta de que esto resulta conveniente para la realización de la misma.
- A continuación, usé el comando `symfony server:start -d`. Lo que hice aquí fue iniciar un servidor de desarrollo valiéndome de la interfaz de línea de comandos de Symfony (Symfony CLI). Lo inicié en segundo plano con `-d` para poder seguir ejecutando comandos a pesar de que el servidor ya esté corriendo.
- Finalmente, ejecuté el comando `code .` para poder trabajar cómodamente con mi nuevo proyecto de Symfony en Visual Studio Code.

2. **Pregunta de Código:**

- Crea un controlador en Symfony que maneje una ruta /hello/{name} y devuelva un saludo personalizado. Además, si el nombre no se proporciona, debe devolver un saludo predeterminado "Hello World". (opcional) Implementa también una prueba unitaria para verificar que la ruta devuelve el saludo correcto.

_Resuelto_.

3. **Pregunta Teórica:**

- Explica la arquitectura de Symfony y cómo se organiza un proyecto típico en términos de carpetas y archivos.

Symfony parece estar orientado más que nada a la construcción de aplicaciones siguiendo la clásica arquitectura MVC. Dentro de la carpeta `src` podemos almacenar tanto nuestros modelos (en `Entity`), como los controladores a utilizar (en `Controller`) y las vistas (en caso de estar desarrollando una aplicación web completa, con su respectiva interfaz). Del mismo modo podemos también en la carpeta `Repository` tener código cuya responsabilidad sea interactuar con alguna base de datos.

En la carpeta `config`, como su nombre indica, se encuentran configuraciones importantes como las relacionadas con nuestras bases de datos y servicios, así como archivos con las rutas de nuestra aplicación web.

Por otro lado está `templates`, donde, en el caso de estar construyendo una aplicación web, podemos almancenar plantillas para las vistas.

`public` contiene los archivos estáticos.

`var` se usa para guardar la caché de la aplicación y los logs.

`vendor` almacena las dependencias del proyecto.

`bin` contiene un archivo con el que podemos ejecutar comandos en la terminal y, de esa forma, correr distintas rutinas y scripts, en caso de que nos haga falta esto.

También he visto que en el archivo `.env` se almacenan variables de entorno de forma segura. Este archivo se actualiza también sistemáticamente conforme se instalan dependencias al proyecto.

4. **Pregunta de Código:**

- Escribe un servicio en Symfony que se inyecta en un controlador y realiza una operación matemática básica (por ejemplo, sumar dos números). ¿Qué configuraciones son necesarias para poder usarlo? (opcional) Implementa también una prueba unitaria para verificar el correcto funcionamiento del servicio.

_Resuelto_.

En cuanto a las configuraciones necesarias, realmente lo único que tuve que hacer fue que `SumController`, el controlador que consume el servicio, heredara de la clase `AbstractController`. De esta forma, Symfony inyecta por sí mismo el servicio y me facilita mucho la vida.

5. **Pregunta de Código:**

- Muestra cómo crear un formulario en Symfony para una entidad User con campos username y email.

_Resuelto (disponible para probar en la ruta ¨/users/0¨)_.

6. **Pregunta Teórica:**

- Explica el concepto de Dependency Injection (DI) en Symfony y cómo se configura.

La inyección de dependencias (dependency injection en inglés) es un patrón muy común en el desarrollo de software y, más específicamente, en la programación orientada a objetos. Consiste, esencialmente, en pasar por parámetros elementos (principalmente objetos) necesarios para el funcionamiento del código. ¿La ventaja de esto? Contribuye enormemente al desacople y la separación de responsabilidades, lo que es fundamental a la hora de llevar a cabo una arquitectura de software escalable.

En esta misma prueba ya hemos visto inyección de dependencias, de cierta forma, cuando, en la pregunta 4, el mismo Symfony inyectó el servicio creado por mí directamente en un controlador, sin yo tener que configurar nada.

Sin embargo, Symfony posee también un componente específicamente llamado `DependencyInjection` que permite estandarizar la forma en la que nuestros servicios asumen este comportamiento a través de contenedores, para tener un control más riguroso de nuestras inyecciones.

7. **Pregunta de Código:**

- Escribe una consulta Doctrine en Symfony para obtener todos los registros de una entidad Product donde el precio sea mayor a 100.

```php
<?php

$query = $em->createQuery(SELECT p FROM MyProject\Model\Product p WHERE p.price > 100);
$products = $query->getResult();
```

8. **Pregunta Teórica:**

- ¿Qué es el Event Dispatcher en Symfony y para qué se utiliza?

El Event Dispatcher es un componente de Symfony que nos permite implementar los patrones de diseño Observador y Mediador, muy importantes para flexibilizar la arquitectura de nuestra aplicación.

Lo que hace el Event Dispatcher, en esencia, es permitir la comunicación entre los distintos elementos que componen nuestra aplicación a través de eventos.

9. **Pregunta de Código:**

- Crea un validador personalizado en Symfony para asegurar que el campo email de una entidad User no pertenece a un dominio específico (por ejemplo, "example.com"). Muestra cómo configurar este validador y cómo sería utilizado en la entidad User.

_Resuelto_. El validador ya está creado e implementado en la entidad User y puede ser configurado pasándole en la opción `forbiddenDomain` el dominio a evitar.

NOTA: El código del validador asume que se está trabajando con un correo válido, puesto que para su correcta implementación es necesario que esta validación personalizada forme parte de una secuencia de validaciones donde, en primer lugar, debemos verificar que el email introducido sea válido.

10. **Pregunta de Código:**

- Implementa un Event Subscriber en Symfony que escuche el evento kernel.request y registre en un archivo de log cada visita a cualquier página de la aplicación. Asegúrate de configurar el servicio correctamente para que el suscriptor se registre con el evento.

_Resuelto_.

## Sección 2: JavaScript

1. **Pregunta Teórica:**

- Explica la diferencia entre var, let y const en JavaScript.

Ya no se recomienda utilizar `var`, puesto que su comportamiento puede resultar poco intuitivo; es diferente al que tenemos en la mayoría de lenguajes de programación. En vez de estar accesibles en el bloque de código en que fueron declaradas, las variables `var` se adhieren al contexto de las funciones en que son declaradas o, en su defecto, al contexto global (representado por el objeto `window`, en el caso del JavaScript de los navegadores).

Por otro lado, `let` viene a solucionar esto al permitirnos crear variables con su contexto situado en el bloque de código en el que han sido declaradas. Un bloque de código en JavaScript se delimita usando llaves (`{}`).

Por último `const` es similar a `let` en el sentido de tomar el contexto de su bloque de código de origen. Sin embargo, la diferencia radica en que se usa para declarar constantes, no variables. En el caso de JavaScript sucede algo particular, y es que a pesar de que las constantes se comportan de la forma que esperaríamos al permitirnos declarar constantes que contienen valores primitivos como cadenas de texto y números, siendo estas inmutables, hay algo más. Podemos declarar constantes que contengan valores de referencia, como arrays y objetos. En este último caso, lo único que logramos al declarar estos valores como constantes es evitar que puedan cambiar su tipo de dato en tiempo de ejecución, ya que siguen siendo mutables a pesar de ser constantes.

2. **Pregunta de Código:**

- Escribe una función en JavaScript que invierta una cadena de texto.

_Resuelto_. Pasos para ejecutar estos ejemplos:

- Abrir una terminal en la carpeta `javascript` del repositorio.
- Ejecutar el comando `node <nombre_del_archivo_de_la_pregunta>.js`, con NodeJS instalado en el sistema.

3. **Pregunta Teórica:**

- ¿Qué es el Event Loop en JavaScript y cómo funciona?

Resumidamente, el Event Loop es un mecanismo que permite a JavaScript manejar tanto las operaciones síncronas como las asíncronas a pesar de ser un lenguaje de un solo hilo (single-threaded). Se compone de tres partes fundamentales, siendo una de ellas el Call Stack, o pila de llamadas, que es una pila (estructura de datos del tipo Last In First Out o LIFO) donde se van almacenando las funciones a ejecutar.

Por otro lado están las WEB APIs que incluyen operaciones asíncronas como `fetch` y `setTimeout`. Las operaciones que involucran el uso de estas Web APIs se ejecutan fuera de la pila de llamadas y, una vez completadas, se añaden a la cola de tareas (Task Queue).

Las operaciones en la cola de tareas, que ya están listas para ser utilizadas, se van añadiendo ordenadamente (a la forma First In First Out o FIFO, característica de las colas) a la pila de llamadas una vez que esta se vacía.

4. **Pregunta de Código:**

- Escribe un script en JavaScript que filtre los números pares de un array de números y los muestre en la consola.

_Resuelto_.

5. **Pregunta Teórica:**

- ¿Qué es el DOM y cómo se manipula usando JavaScript?

El Document Object Model, conocido comúnmente como DOM a causa de sus siglas en inglés, es la API que tiene el JavaScript del navegador para comunicarse con el documento HTML, permitiendo de esta forma la creación de páginas web interactivas.

Para manipular el DOM en JavaScript podemos utilizar el objeto `document`.

6. **Pregunta de Código:**

- Escribe un código en JavaScript que añada un event listener a un botón con el id #myButton para mostrar una alerta con el mensaje "Hello World" al hacer clic.

_Resuelto_.

NOTA: Por simplicidad de cara a esta prueba, colocaré el código JavaScript en el mismo archivo HTML, a pesar de que esto sea una mala práctica.

7. **Pregunta Teórica:**

- Explica qué es una Promesa en JavaScript y proporciona un ejemplo básico.

Una promesa es un tipo de dato en JavaScript que devuelven ciertas funciones asíncronas, como `fetch`. Este objeto representa tanto el posible éxito de una operación asíncrona como cualquier fallo que pueda suceder. Son esenciales en el manejo de estas operaciones, pues de no tenerlas caeríamos en la necesidad de enrevesar nuestro código entrando en patrones repudiados históricamente como el Callback Hell o una serie extremadamente larga de `catch` tras `catch`. Yo, por suerte, nunca viví una época en la que JavaScript no tuviera promesas todavía, y solo sé de estas cosas por historias.

8. **Pregunta de Código:**

- Escribe una función en JavaScript que haga una petición AJAX (usando fetch) para obtener datos de una API y los muestre en un elemento con el id #result.

_Resuelto_.

9. **Pregunta Teórica:**

- ¿Cuál es la diferencia entre null, undefined y NaN en JavaScript?

En JavaScript, los valores son `undefined` cuando han sido inicializados. No tienen un valor definido, como su nombre indica.

`null`, por otro lado, es usado para indicar una ausencia de valor intencional. Es el programador quien decide que algo es `null`.

`NaN`, que significa Not a Number, es un valor numérico en JavaScript que representa la imposibilidad de realizar una operación aritmética.

10. **Pregunta de Código:**

- Implementa una función en JavaScript que use localStorage para guardar una clave-valor y luego recuperarla.

_Resuelto_.

## Sección 3: Git

1. **Pregunta Teórica:**

- ¿Qué es Git y para qué se utiliza en el desarrollo de software?

Git es una herramienta utilizada para el control de versiones. Seguramente la más famosa y la que tiene el uso más extendido.

2. **Pregunta de Comandos:**

- ¿Cuál es el comando para clonar un repositorio de Git?

`git clone <dirección-url-del-repositorio-a-clonar>`

3. **Pregunta Teórica:**

- Explica qué es un "branch" (rama) en Git y para qué se utiliza.

Una rama en Git sirve para, como su nombre indica, ramificar el código. De este modo, cada desarrollador puede, por ejemplo, tener su propia rama en un proyecto. De este modo, nos evitamos problemas relacionados con la aparición de conflictos y podemos tener un mejor control del desarrollo del proyecto.

4. **Pregunta de Comandos:**

- Proporciona los comandos necesarios para crear una nueva rama llamada feature-xyz, cambiar a esa rama, y luego fusionarla con la rama main.

```batch
# creamos la nueva rama y cambiamos a ella al mismo tiempo usando git switch
git switch -c feature-xyz
# luego de esto trabaja en la rama y pushéala si así deseas usando git push (en caso de estar usando GitHub, por ejemplo), finalmente cambia a main
git switch main
# con el siguiente comando nos aseguramos de tener los últimos cambios antes de la fusión, en caso de estar trabajando en un proyecto colaborativo
git pull origin main
# finalmente, ejecutamos el merge que permitirá concretar la fusión de inmediato en caso de no existir ningún conflicto
git merge feature-xyz
```

5. **Pregunta Teórica:**

- ¿Qué es un "merge conflict" y cómo se resuelve?

Los conflictos se dan cuando nuestros cambios interfieren con cambios sucedidos en la rama con la que queremos mergear después de nosotros haber ejecutado pull por última vez antes de comenzar a trabajar por nuestra cuenta. Para resolverlos, debemos hacer los cambios pertinentes en los archivos que originan el conflicto.

6. **Pregunta de Comandos:**

- ¿Cuál es el comando para visualizar el estado actual del repositorio en Git?

`git status`

7. **Pregunta Teórica:**

- Explica la diferencia entre git pull y git fetch.

`git fetch` te permite descargar los últimos cambios de una rama, para así poder revisarlos y decidir si quieres o no integrarlos.

por otro lado, `git pull` es una combinación de `git fetch` y `git merge`. este comando automáticamente integra los últimos cambios de una rama con tu código, sin darte la oportunidad de revisar estos cambios.

8. **Pregunta de Comandos:**

- ¿Cuál es el comando para revertir el último commit en Git?

`git reset --hard HEAD~1` para de plano eliminar los cambios de tu sistema de archivos.

`git reset HEAD~1` para conservar los archivos como cambios _unstaged_.

9. **Pregunta Teórica:**

- ¿Qué es un "remote repository" y cómo se configura en Git?

Un repositorio remoto es un repositorio que ha sido subido a la nube para poder trabajar con él de forma remota, ya sea por una sola persona o por un equipo, a través de internet.

Para configurar uno en Git basta con usar el comando `git remote add <nombre-del-origen> <url-del-origen>`, que añade un origen remoto al que por convención se le llama `origin`.

Luego, con `git push origin main` podemos subir nuestra rama `main` al origen remoto que añadimos previamente. Lo que comúnmente se conoce como "pushear".

Uno de los lugares más famosos para hostear estos repositorios remotos es GitHub.

10. **Pregunta de Comandos:**

- Proporciona los comandos para añadir todos los cambios en los archivos al staging area y luego realizar un commit con el mensaje "Initial commit".

```batch
git add .
git commit -m "Initial commit"
```

## Sección 4: MySQL

1. **Pregunta de Código:**

- Escribe una consulta SQL para crear una base de datos llamada company y una tabla llamada employees con las siguientes columnas: id (INT, auto-increment, primary key), name (VARCHAR(100)), position (VARCHAR(50)), salary (DECIMAL(10, 2)), y hire_date (DATE).

```sql
CREATE DATABASE IF NOT EXISTS company;

USE company;

CREATE TABLE IF NOT EXISTS employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    position VARCHAR(50),
    salary DECIMAL(10, 2),
    hire_date DATE
);
```

2. **Pregunta Teórica:**

- Explica la diferencia entre una clave primaria (Primary Key) y una clave foránea (Foreign Key) en MySQL. ¿Cuándo y por qué se utilizan?

La Primary Key nos permite tener un identificador único con el que acceder a elementos de nuestra tabla. En resumidas cuentas, identifica cada fila.

Una Foreign Key, por otro lado, lo que nos permite es establecer relaciones entre distintas tablas. Una clave foránea en una columna de una tabla hace referencia a una clave primaria de otra, creando de este modo una relación.

Sin estas claves, sería imposible transitar organizadamente nuestra base de datos y crear las relaciones pertinentes entre nuestras entidades.

3. **Pregunta de Código:**

- Escribe una consulta SQL para insertar tres registros en la tabla employees creada en la pregunta 2.

```sql
INSERT INTO employees (name, position, salary, hire_date) VALUES
('Ruben Gongora', 'Desarrollador', 40000.00, '2024-01-15'),
('Harry Potter', 'Mago', 60000.00, '2024-01-21'),
('Yugi Muto', 'Duelista', 55000.00, '2024-03-16');
```

4. **Pregunta de Código:**

- Muestra cómo actualizar el salario de un empleado específico en la tabla employees. Por ejemplo, actualiza el salario del empleado con id = 1 a 60000.00.

```sql
UPDATE employees
SET salary = 60000.00
WHERE id = 1;
```

5. **Pregunta de Código:**

- Escribe una consulta SQL para seleccionar todos los empleados cuyo salario sea mayor a 50000.00 y ordenarlos por el campo hire_date en orden descendente.

```sql
SELECT *
FROM employees
WHERE salary > 50000.00
ORDER BY hire_date DESC;
```

6. **Pregunta Teórica:**

- ¿Qué es una transacción en MySQL y cómo se utiliza? Proporciona un ejemplo de uso.

Una transacción en MySQL es una serie de operaciones que realizan de forma secuencial. Si ocurre algún fallo, podemos revertir la transacción en su conjunto y entonces ninguna de las operaciones es realizada. De este modo, podemos decir que las transacciones funcionan de la siguiente manera: o se realizan todas las operaciones o no se realiza ninguna.

Podemos utilizar los comandos `BEGIN`, para comenzar la transacción; `COMMIT` para concluir satisfactoriamente la transacción y aplicar todos los cambios; y `ROLLBACK` para echar para atrás los cambios como si nada hubiera ocurrido en un primer lugar.

Un ejemplo de dónde podría ser interesante implementar una transacción sería por ejemplo en una operación de compra, donde es fundamental para la lógica de negocio que podamos, por decir algo, adquirir cada uno de los productos del carrito, y si alguno de estos presentara algún error a la hora de ser adquirido, entonces no queremos quedarnos a medio camino, sino cancelar la transacción en su totalidad, ya que de otro modo podríamos dar lugar a un comportamiento inesperado de la aplicación y, en última instancia, a un cliente insatisfecho.

En general, es bueno aplicar transacciones en operaciones sensibles.

7. **Pregunta de Código:**

- Crea una vista en MySQL llamada high_earning_employees que seleccione todas las columnas de los empleados cuyo salario sea mayor a 70000.00.

```sql
CREATE VIEW high_earning_employees AS
SELECT *
FROM employees
WHERE salary > 70000.00;
```

---

## Instrucciones para el Candidato:

- Responde cada pregunta de manera clara y concisa.
- Para las preguntas de código, asegúrate de que el código sea funcional, esté bien comentado y siga las buenas prácticas, patrones de diseño y PSR-12 de PHP.
- Estructura tu respuesta como si se tratara de un proyecto real.
- Crea un repositorio en GitHub con visibilidad pública y sube todas tus respuestas al repositorio.
- Incluye un archivo README.md en el repositorio que explique cómo ejecutar el proyecto y cualquier otra información relevante.
- Puedes utilizar cualquier recurso en línea para ayudarte a responder las preguntas, pero las respuestas deben ser comprensibles y reflejar tu propio conocimiento y habilidades.
- Envía el enlace al repositorio de GitHub antes de la fecha límite especificada.

¡Buena suerte!

```

```
