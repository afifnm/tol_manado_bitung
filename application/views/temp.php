            <div class="form-group">
              <label class="col-sm-3 control-label">Lampiran Gambar Kerja</label>
              <div class="col-sm-8">
                <select class="form-control select" name="id_gambar_kerja" required>
                    <option value="-" selected>Tanpa Lampiran</option>
                  <?php foreach ($gambar as $a) { ?>
                    <option value="<?php echo$a['id_gambar_kerja']; ?>"> <?php echo$a['judul_gambar']; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Lampiran Metode Kerja</label>
              <div class="col-sm-8">
                <select class="form-control select" name="id_metode" required>
                    <option value="-" selected>Tanpa Lampiran</option>
                  <?php foreach ($metode as $aa) { ?>
                    <option value="<?php echo$aa['id_metode']; ?>"> <?php echo$aa['judul_metode']; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Lampiran Data Quality</label>
              <div class="col-sm-8">
                <select class="form-control select" name="id_data_quality" required>
                    <option value="-" selected>Tanpa Lampiran</option>
                  <?php foreach ($data_quality as $aaa) { ?>
                    <option value="<?php echo$aaa['id_data_quality']; ?>"> <?php echo$aaa['judul_data_quality']; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>