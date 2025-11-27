# 🐾 Protectora MVC

**Protectora MVC** es una aplicación web en desarrollo para la gestión básica de una protectora de animales. Está construida con **PHP** siguiendo una arquitectura **MVC ligera**, pensada para ser clara, educativa y fácilmente ampliable.

Su objetivo principal es servir como **plantilla base** para aprender, experimentar y evolucionar hacia un sistema más completo que gestione animales, usuarios y autenticación, manteniendo siempre una buena separación de responsabilidades.

---

## 🚀 Estado del proyecto

**Prototipo funcional — en desarrollo.**
El proyecto crecerá paso a paso mediante iteraciones pequeñas y continuas, incorporando mejoras en calidad, seguridad y funcionalidades.

---

## 🧱 Arquitectura y componentes

Protectora MVC está estructurada en capas simples y bien diferenciadas:

### 🔸 Front Controller & Router

* Punto de entrada único a la aplicación.
* Enrutador minimalista que dirige cada petición al controlador correspondiente.

### 🔸 Controladores

* Gestionan las acciones HTTP.
* Reciben peticiones, coordinan servicios y devuelven respuestas.

### 🔸 Servicios

* Encapsulan la **lógica de negocio**.
* Reducen la complejidad dentro de los controladores.

### 🔸 Modelos

* Acceso a datos y representación de entidades.
* Pensados para ser extendidos con validaciones y consultas más completas.

### 🔸 Vistas

* Plantillas sencillas para la representación final (HTML).
* Separación clara entre lógica y presentación.

---

## 📚 Filosofía del proyecto

Este repositorio está creado con una intención **educativa y evolutiva**:

* Facilitar el aprendizaje de MVC en PHP.
* Servir como base mínima para construir un proyecto más grande.
* Permitir iterar e incorporar mejoras reales del día a día.

Entre las futuras mejoras previstas:

* Pruebas unitarias y funcionales
* Validaciones de formularios
* Autenticación y gestión de usuarios
* Seguridad (XSS, CSRF, sanitización…)
* Refactorizaciones y mejores patrones

---

## 🤝 Contribuciones

Todo tipo de aportaciones, sugerencias o ideas para mejorar la estructura y las buenas prácticas serán bienvenidas.

---

## 🐕‍🦺 Licencia

Este proyecto es abierto y puede utilizarse con fines educativos y experimentales.

---

Si quieres, puedo añadir badges, un apartado de instalación/uso, capturas, o una sección de roadmap. ¿Quieres extenderlo aún más?

