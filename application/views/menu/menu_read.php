<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
      <div class='box'>
        <div class='box-header'>
          <h3 class='box-title'>Menu Read</h3>
          <table class="table table-bordered">
            <tr>
              <td>Name</td>
              <td><?= $name; ?></td>
            </tr>
            <tr>
              <td>Link</td>
              <td><?= $link; ?></td>
            </tr>
            <tr>
              <td>Icon</td>
              <td><?= $icon; ?></td>
            </tr>
            <tr>
              <td>Aplikasi</td>
              <td><?= $aplikasi; ?></td>
            </tr>
            <tr>
              <td>Is Active</td>
              <td><?= $is_active; ?></td>
            </tr>
            <tr>
              <td>Is Parent</td>
              <td><?= $is_parent; ?></td>
            </tr>
            <tr>
              <td>Level</td>
              <td><?= $level; ?></td>
            </tr>
            <tr>
              <td>Nomor Urut</td>
              <td><?= $urut; ?></td>
            </tr>
            <tr>
              <td></td>
              <td><a href="<?= site_url('menu/index/') . $pos ?>" class="btn btn-primary">Cancel</a></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>