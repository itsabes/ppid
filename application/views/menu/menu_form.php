<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
      <div class='box'>
        <div class='box-header'>
          <h3 class='box-title'><?= $title ?></h3>
        </div>
        <div class='box-body'>
          <div class='box box-primary'>
            <form action="<?= $action; ?>" method="post">
              <table class='table table-bordered'>
                <tr>
                  <td width="120">Name <?= form_error('name') ?></td>
                  <td><input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?= $name; ?>" /></td>
                </tr>
                <tr>
                  <td>Link <?= form_error('link') ?></td>
                  <td><input type="text" class="form-control" name="link" id="link" placeholder="Link" value="<?= $link; ?>" /></td>
                </tr>
                <tr>
                  <td>Icon <?= form_error('icon') ?></td>
                  <td><input type="text" class="form-control" name="icon" id="icon" placeholder="Icon" value="<?= $icon; ?>" /></td>
                </tr>
                <tr>
                  <td>Aplikasi <?= form_error('aplikasi') ?></td>
                  <td><select name="aplikasi" id="aplikasi" class="form-control select2" placeholder="Aplikasi" />
                    <option value=""></option>
                    <option value="ppid-dinkes" <?php if ($aplikasi == "ppid-dinkes") {
                                                  echo "selected";
                                                } ?>>PPID Dinkes</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Is Active <?= form_error('is_active') ?></td>
                  <td><?= form_dropdown('is_active', array('1' => 'AKTIF', '0' => 'TIDAK AKTIF'), $is_active, "class='form-control'"); ?></td>
                </tr>
                <tr>
                  <td>Is Parent <?= form_error('is_parent') ?></td>
                  <td>
                    <select name="is_parent" class="form-control">
                      <option value="0">YA</option>
                      <?php
                      $menu = $this->db->order_by('name', 'ASC')->get('menu');
                      foreach ($menu->result() as $m) {
                        echo "<option value='$m->id' ";
                        echo $m->id == $is_parent ? 'selected' : '';
                        echo ">" .  strtoupper($m->name) . "</option>";
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Level <?= form_error('level') ?></td>
                  <td><?= form_dropdown('level', array('' => '', 'admin' => 'Admin', 'jajaran' => 'Jajaran', '*' => 'Semua'), $level, "class='form-control'"); ?></td>
                </tr>
                <tr>
                  <td width="120">Order <?= form_error('urut') ?></td>
                  <td><input type="text" class="form-control" name="urut" id="urut" placeholder="Order" value="<?= $urut; ?>" /></td>
                </tr>
                <input type="hidden" name="id" value="<?= $id; ?>" />
                <input type="hidden" name="pos" value="<?= $pos; ?>" />
                <tr>
                  <td colspan='2'><button type="submit" class="btn btn-primary btn-flat"><?= $button ?></button>
                    <a href="<?= site_url('menu') . '/index/' . $pos ?>" class="btn btn-default btn-flat">Cancel</a>
                  </td>
                </tr>
              </table>
            </form>
          </div>
        </div>
      </div>
    </div>
</section>