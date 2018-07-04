<?php $this->load->view('app/header'); ?>

<div class="container">
  <div class="row">
    <form class="col s12">
      <div class="field">
        <div class="row">
          <div class="input-field col s12">
            <input id="total_lands" type="number" value="" class="validate distribution-trigger">
            <label for="total_lands"><?php echo $this->lang->line('cd_total_lands'); ?></label>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="container">
  <div class="row">
    <form class="col s12 color-distribution-calculator">
      <div class="field">
        <table>
          <thead>
            <tr>
              <td><?php echo $this->lang->line('cd_color'); ?></td>
              <td><?php echo $this->lang->line('cd_quantity'); ?></td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><i class="ms ms-cost ms-w"></i> &nbsp; <?php echo $this->lang->line('cd_white'); ?></td>
              <td><input type="number" name="" value="" class="distribution-trigger" data-color="w"></td>
            </tr>
            <tr>
              <td><i class="ms ms-cost ms-u"></i> &nbsp; <?php echo $this->lang->line('cd_blue'); ?></td>
              <td><input type="number" name="" value="" class="distribution-trigger" data-color="u"></td>
            </tr>
            <tr>
              <td><i class="ms ms-cost ms-b"></i> &nbsp; <?php echo $this->lang->line('cd_black'); ?></td>
              <td><input type="number" name="" value="" class="distribution-trigger" data-color="b"></td>
            </tr>
            <tr>
              <td><i class="ms ms-cost ms-r"></i> &nbsp; <?php echo $this->lang->line('cd_red'); ?></td>
              <td><input type="number" name="" value="" class="distribution-trigger" data-color="r"></td>
            </tr>
            <tr>
              <td><i class="ms ms-cost ms-g"></i> &nbsp; <?php echo $this->lang->line('cd_green'); ?></td>
              <td><input type="number" name="" value="" class="distribution-trigger" data-color="g"></td>
            </tr>
          </tbody>
        </table>
      </div>
    </form>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col s12">
      <div class="field">
        <h4><?php echo $this->lang->line('cd_distribution_resume'); ?></h4>

        <ul class="distribution-percentage">
          <li><strong><i class="ms ms-cost ms-w"></i> &nbsp; <?php echo $this->lang->line('cd_white'); ?>: </strong> <span data-color="w">0.0</span>% (<span data-lands="w">0</span> <?php echo $this->lang->line('cd_lands_nearly'); ?>)</li>
          <li><strong><i class="ms ms-cost ms-u"></i> &nbsp; <?php echo $this->lang->line('cd_blue'); ?>: </strong> <span data-color="u">0.0</span>% (<span data-lands="u">0</span> <?php echo $this->lang->line('cd_lands_nearly'); ?>)</li>
          <li><strong><i class="ms ms-cost ms-b"></i> &nbsp; <?php echo $this->lang->line('cd_black'); ?>: </strong> <span data-color="b">0.0</span>% (<span data-lands="b">0</span> <?php echo $this->lang->line('cd_lands_nearly'); ?>)</li>
          <li><strong><i class="ms ms-cost ms-r"></i> &nbsp; <?php echo $this->lang->line('cd_red'); ?>: </strong> <span data-color="r">0.0</span>% (<span data-lands="r">0</span> <?php echo $this->lang->line('cd_lands_nearly'); ?>)</li>
          <li><strong><i class="ms ms-cost ms-g"></i> &nbsp; <?php echo $this->lang->line('cd_green'); ?>: </strong> <span data-color="g">0.0</span>% (<span data-lands="g">0</span> <?php echo $this->lang->line('cd_lands_nearly'); ?>)</li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col s12">
      <div class="field">
        <canvas id="color-distribution-chart" width="400" height="400"></canvas>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('app/footer'); ?>
