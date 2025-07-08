
<HEAD>
		   
  <div class="panel panel-info">
 
    <div class="panel box-shadow-none content-header margin-topbar">
        <div class="form-group col-xs-12 col-lg-12" style="background-color: #39b3d7; border: 1px solid; border-color:#269abc; padding: 10px 3px 10px 5px; line-height: 15px; top:-15px;">
            <!--colocar al estilo-->
            <b><font size=3 color="white"><center>INVESTIGACION</center></font></b>
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
    <button id="btnExportarExcel" class="btn btn-success">Exportar a Excel</button>
    

    <hr>
    <div class="table-responsive">
        <table id="tablaResultados" class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>RUT</th>
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





</body>


