 <!--Sacar este codigo-->
 <?php if (isset($_GET["kind"]) && $_GET["kind"] == 4) : ?>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Razon social </label>
            <div class="col-md-6">
              <select name="razonsocial_id" class="form-control" required>
                <option value="">-- SELECCIONAR --</option>
                <?php foreach (RazonsocialData::getAll() as $g) : ?>
                  <option value="<?php echo $g->id;  ?>"><?php echo $g->name; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
        <?php endif; ?>
        <?php if (isset($_GET["kind"]) && $_GET["kind"] == 5) : ?>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Subdireccion </label>
            <div class="col-md-6">
              <select name="subdireccion_id" class="form-control" required>
                <option value="">-- SELECCIONAR --</option>
                <?php foreach (SubdireccionData::getAll() as $g) : ?>
                  <option value="<?php echo $g->id;  ?>"><?php echo $g->name; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div><?php endif; ?>
        <?php if (isset($_GET["kind"]) && $_GET["kind"] == 6) : ?>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Gerencia </label>
            <div class="col-md-6">
              <select name="gerencia_id" class="form-control" required>
                <option value="">-- SELECCIONAR --</option>
                <?php foreach (GerenciaData::getAll() as $g) : ?>
                  <option value="<?php echo $g->id;  ?>"><?php echo $g->name; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
        <?php endif; ?>
        <?php if (isset($_GET["kind"]) && $_GET["kind"] == 7) : ?>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Razon social </label>
            <div class="col-md-6">
              <select name="razonsocial_id" class="form-control" required>
                <option value="">-- SELECCIONAR --</option>
                <?php foreach (RazonsocialData::getAll() as $g) : ?>
                  <option value="<?php echo $g->id;  ?>"><?php echo $g->name; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
        <?php endif; ?>

        <?php if (isset($_GET["kind"]) && $_GET["kind"] == 8) : ?>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Razon social </label>
            <div class="col-md-6">
              <select name="razonsocial_id" class="form-control" required>
                <option value="">-- SELECCIONAR --</option>
                <?php foreach (RazonsocialData::getAll() as $g) : ?>
                  <option value="<?php echo $g->id;  ?>"><?php echo $g->name; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">CLO </label>
            <div class="col-md-6">
              <select name="clo_id" class="form-control" required>
                <option value="">-- SELECCIONAR --</option>
                <?php foreach (CloData::getAll() as $g) : ?>
                  <option value="<?php echo $g->id;  ?>"><?php echo $g->name; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

        <?php endif; ?>