<HEAD>

  <style>
    .tab-btn {
      flex: 1;
      padding: 10px;
      background: #eee;
      border: none;
      border-bottom: 3px solid transparent;
      cursor: pointer;
      font-weight: bold;
      transition: 0.3s;
    }

    .tab-btn:hover {
      background: #ddd;
    }

    .tab-btn.active {
      background: #fff;
      border-bottom: 3px solid #007BFF;
      color: #007BFF;
    }

    .tab-content {
      animation: fadeIn 0.3s ease-in-out;
    }

    @keyframes fadeIn {
      from {opacity: 0;}
      to {opacity: 1;}
    }
  </style>

		   
  <div class="panel panel-info">
 
    <div class="panel box-shadow-none content-header margin-topbar">
        <div class="form-group col-xs-12 col-lg-12" style="background-color: #39b3d7; border: 1px solid; border-color:#269abc; padding: 10px 3px 10px 5px; line-height: 15px; top:-15px;">
            <!--colocar al estilo-->
            <b><font size=3 color="white"><center>BUSQUEDA DE USUARIOS</center></font></b>
        </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="script/investigacion.js"></script>                             

</HEAD>
<body>

  <div class="container">
    <h3>Buscar Usuario</h3>
    <form id="formBuscar" class="form-inline">
        <input type="text" id="nombre" class="form-control" placeholder="Nombre">
        <input type="text" id="rut" class="form-control" placeholder="RUT">
        <input type="text" id="correo" class="form-control" placeholder="Correo">
        <select id="vigente" class="form-control">
            <option value="">Vigente</option>
            <option value="S">Sí</option>
            <option value="N">No</option>
        </select>
        <input type="text" id="cargo" class="form-control" placeholder="Cargo">
        <input type="text" id="area" class="form-control" placeholder="Área">
        <br>
        <br>
        <button type="button" id="btnBuscar" class="btn btn-primary">Buscar</button>
        <button type="reset" id="btnLimpiar" class="btn btn-secondary">Limpiar</button>
    </form>
    <br>
    <!--boton exportar a pdf-->
    <button id="btnExportarPDF" class="btn btn-success">Exportar a PDF</button>
    <!---boton exportar a excel-->
    <button id="btnExportarExcel" class="btn btn-success">Exportar a Excel</button>
    <!-- boton pdf nuevo-->
    <button id="btnExportarPDFNuevo" class="btn btn-success">Exportar a PDF Nuevo</button>

    <hr>
    <div class="table-responsive" style="overflow-x: auto;">
        <table id="tablaResultados" class="table table-bordered" style="min-width: 1000px;">
            <thead>
                <tr>
                    <th>Detalle</th>
                    <th>Nombre</th>
                    <th style="white-space: nowrap; width: 12%;">RUT</th>
                    <th>Vigente</th>
                    <th>Correo</th>
                    <th>Cargo</th>
                    <th>Área</th>
                </tr>
            </thead>
            <tbody>
              
            </tbody>
        </table>
    </div>
  </div>

  <!-- Modal con estilo y pestañas -->
  <div id="modalDetalle" style="display:none; position:fixed; top:15%; left:50%; transform:translateX(-50%); width:50%; background:#fdfdfd; padding:20px; border-radius:10px; border:1px solid #ccc; box-shadow: 0 0 20px rgba(0,0,0,0.3); font-family: Arial, sans-serif; z-index:1000;">

    <h3 style="margin-top: 0; color: #007BFF; text-align:center;">Detalles del Usuario</h3>

    <!-- Pestañas -->
    <div style="display: flex; border-bottom: 1px solid #ccc; margin-bottom: 15px;">
      <button class="tab-btn active" onclick="mostrarTab('tabInfo')">Información</button>
      <button class="tab-btn" onclick="mostrarTab('tabContacto')">Contacto</button>
    </div>

    <!-- Contenido pestaña: Información -->
    <div class="tab-content" id="tabInfo" style="display: block;">
      <p><strong>Nombre:</strong> <span id="modalNombre"></span></p>
      <p><strong>RUT:</strong> <span id="modalRut"></span></p>
      <p><strong>Cargo:</strong> <span id="modalCargo"></span></p>
      <p><strong>Área:</strong> <span id="modalArea"></span></p>
    </div>

    <!-- Contenido pestaña: Contacto -->
    <div class="tab-content" id="tabContacto" style="display: none;">
      <p><strong>Correo:</strong> <span id="modalCorreo"></span></p>
      <!-- puedes agregar teléfono u otra info aquí -->
    </div>

    <div style="text-align: right; margin-top: 20px;">
      <button onclick="cerrarModal()" style="padding: 8px 16px; background: #007BFF; color: white; border: none; border-radius: 5px; cursor: pointer;">Cerrar</button>
    </div>
  </div>


</body>


