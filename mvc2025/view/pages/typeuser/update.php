<!-- header -->
<?php require_once('../include/header.php'); ?>

<!-- body -->
        <section>
            <br>
            <div class="card">
                <div class="card-body">
                <div class="row">
                        <div class="col-10">
                        <h2>Editar tipo de usuario</h2>
                        </div>
                        <div class="col">
                            <a href="read.php" class="btn btn-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                                <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
                                </svg>
                                Volver
                            </a>
                        </div>
                    </div>
                    <hr>
                    <form action="read.php" method="post">
                        <div class="mb-3">
                            <label for="tipousuario" class="form-label">Nombre del tipo</label>
                            <input type="text" class="form-control" id="tipousuario" name="tipousuario" value="Un Nombre" required>
                            <input type="hidden" class="form-control"  name="id" value="Un id">
                            
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" value="Una descripción" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </form>
                </div>
            </div>
        </section>

        <br>
        <!-- end body -->
<!-- footer -->
<?php require_once('../include/footer.php'); ?>