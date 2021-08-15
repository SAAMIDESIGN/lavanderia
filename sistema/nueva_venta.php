<?php include_once "includes/header.php"; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <?php
                                include "../conexion.php";
                                $query = mysqli_query($conexion, "SELECT * FROM cliente");
                                mysqli_close($conexion);
                                $resultado = mysqli_num_rows($query);
                                if ($resultado > 0) {
                                    $data = mysqli_fetch_array($query);
                                }
                                ?>
                                <h4 class="text-center">Datos del Cliente</h4>
                                <a href="#" class="btn btn-primary btn_new_cliente"><i class="fas fa-user-plus"></i> Nuevo Cliente</a>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <form method="post" name="form_new_cliente_venta" id="form_new_cliente_venta">
                                        <input type="hidden" name="action" value="addCliente">
                                        <input type="hidden" id="idcliente" value="<?php echo $data['idcliente']; ?>" name="idcliente" required>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>C.C</label>
                                                    <input type="number" name="dni_cliente" id="dni_cliente" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Nombre</label>
                                                    <input type="text" name="nom_cliente" id="nom_cliente" class="form-control" disabled required>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Teléfono</label>
                                                    <input type="number" name="tel_cliente" id="tel_cliente" class="form-control" disabled required>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Dirreción</label>
                                                    <input type="text" name="dir_cliente" id="dir_cliente" class="form-control" disabled required>
                                                </div>

                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Profesión</label>
                                                    <input type="text" name="pro_cliente" id="pro_cliente" class="form-control" disabled required>
                                                </div>

                                            </div>
                                            <div id="div_registro_cliente" style="display: none;">
                                                <button type="submit" class="btn btn-primary">Guardar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <h4 class="text-center">Datos Venta</h4>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label><i class="fas fa-user"></i> Vendedor</label>
                                        <p style="font-size: 16px; text-transform: uppercase; color: blue;"><?php echo $_SESSION['nombre']; ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label>Acciones</label>
                                    <div id="acciones_venta" class="form-group">
                                        <a href="#" class="btn btn-danger" id="btn_anular_venta">Anular</a>
                                        <a href="#" class="btn btn-primary" id="btn_facturar_venta"><i class="fas fa-save"></i> Generar Venta</a>
                                    </div>
                                </div>
                            </div>
                              <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th width="100px">Código</th>
                                            <th>Producto</th>
                                            <th>Descripción</th>
                                            <th width="100px">Cantidad</th>
                                            <th class="textright">Precio</th>
                                            <th class="textright">Precio Total</th>
                                            <th>Acciones</th>
                                        </tr>
                                        <tr>
                                            <td><input type="number" name="txt_cod_producto" id="txt_cod_producto"></td>
                                            <td id="txt_descripcion">-</td>
                                            <td><input type="text" name="txt_observacion" id="txt_observacion"disabled></td>
                                            <td><input type="text" name="txt_cant_producto" id="txt_cant_producto"value="0" min="1" disabled></td>
                                            <td id="txt_precio" class="textright">0.00</td>
                                            <td id="txt_precio_total" class="txtright">0.00</td>
                                            <td><a href="#" id="add_product_venta" class="btn btn-dark" style="display: none;">Agregar</a></td>
                                        </tr>
                                        <tr>
                                            <th>Código</th>
                                            <th>Producto</th>
                                            <th>Descripción</th>
                                            <th>Cantidad</th>
                                            <th class="textright">Precio</th>
                                            <th class="textright">Precio Total</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="detalle_venta">
                                        <!-- Contenido ajax -->

                                    </tbody>

                                    <tfoot id="detalle_totales">
                                        <!-- Contenido ajax -->
                                    </tfoot>
                                </table>

                              </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


            <?php include_once "includes/footer.php"; ?>
