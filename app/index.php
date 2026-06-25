<?php
declare(strict_types=1);

/**
 * Escapa texto para imprimirlo de forma segura dentro del HTML.
 *
 * @param string $valor Texto original que se mostrará en la vista.
 * @return string Texto convertido a entidades HTML.
 */
function escapar(string $valor): string
{
    return htmlspecialchars($valor, ENT_QUOTES, 'UTF-8');
}

$tituloPagina = 'Gestor personal de Tareas';
$textoPrincipal = 'Crea y administra tus Tareas y subtareas.';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= escapar($tituloPagina) ?></title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <script defer src="assets/js/app.js"></script>
</head>
<body>
    <div class="app-shell">
        <!-- Barra lateral con la marca de la aplicación y el formulario principal -->
        <aside class="sidebar">
            <div class="sidebar__brand">
                <div class="brand-mark">TG</div>
                <div class="brand-copy">
                    <strong><?= escapar($tituloPagina) ?></strong>
                    <span>Organiza tus pendientes</span>
                </div>
            </div>

            <!-- Formulario para registrar un nuevo grupo de tareas -->
            <section class="sidebar__panel">
                <div class="section-heading section-heading--tight">
                    <h2>Crear Tarea</h2>
                    <p> </p>
                </div>

                <form id="formulario-grupo" class="stack-form">
                    <div class="field">
                        <label for="titulo-grupo">Nombre tarea</label>
                        <input
                            type="text"
                            id="titulo-grupo"
                            name="titulo"
                            maxlength="120"
                            placeholder="Ejemplo: Entrega del laboratorio"
                            required
                        >
                    </div>

                    <div class="field">
                        <label for="descripcion-grupo">Descripción</label>
                        <textarea
                            id="descripcion-grupo"
                            name="descripcion"
                            rows="4"
                            maxlength="2000"
                            placeholder="Objetivo o notas."
                        ></textarea>
                    </div>

                    <button class="button button--primary" type="submit">Crear tarea</button>
                    <div id="mensaje-formulario-grupo" class="form-message" aria-live="polite"></div>
                </form>
            </section>
        </aside>

        <div class="workspace">
            <!-- Encabezado superior reservado para la estructura principal -->
            <header class="topbar">
                <div class="topbar__spacer" aria-hidden="true"></div>
            </header>

            <div class="workspace__grid">
                <main class="content">
                    <!-- Presentación principal del listado de grupos -->
                    <section class="content__hero">
                        <div class="content__hero-copy">
                            <h1><?= escapar($tituloPagina) ?></h1>
                            <p><?= escapar($textoPrincipal) ?></p>
                        </div>
                    </section>

                    <!-- Mensajes generales de la página y listado principal de grupos -->
                    <div id="mensaje-pagina" class="page-message" aria-live="polite"></div>
                    <div id="lista-grupos" class="group-list" aria-live="polite"></div>
                </main>

            </div>
        </div>
    </div>

    <!-- Modal para revisar el detalle del grupo y gestionar su contenido -->
    <div id="modal-grupo" class="modal hidden" aria-hidden="true">
        <div class="modal__backdrop" data-close-modal></div>

        <div class="modal__dialog modal__dialog--task" role="dialog" aria-modal="true" aria-labelledby="titulo-modal-grupo">
            <button class="modal__close" type="button" data-close-modal aria-label="Cerrar grupo">
                &times;
            </button>

            <div class="modal__shell">
                <header class="modal__header">
                    <div class="modal__header-copy">
                        <p class="eyebrow">Tarea</p>
                        <h2 id="titulo-modal-grupo">Cargando tarea...</h2>
                        <p id="subtitulo-modal-grupo" class="modal__subtitle"></p>
                    </div>

                    <div id="insignia-modal-grupo" class="modal__badge-slot"></div>
                </header>

                <div id="mensaje-modal" class="page-message" aria-live="polite"></div>
                <div id="cuerpo-modal" class="modal__body"></div>
            </div>
        </div>
    </div>
</body>
</html>
