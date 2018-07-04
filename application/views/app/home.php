<?php $this->load->view('app/header'); ?>

<div class="container calculator">
  <div class="row no-margin-bottom">
    <div class="col s12">
      <div class="field without-padding calculator-body">
        <div class="row line first">
          <div class="col s4">
            <h4><?php echo $this->lang->line('calculator_cost'); ?></h4>
          </div>
          <div class="col s4">
            <h4><?php echo $this->lang->line('calculator_cards'); ?></h4>
          </div>
          <div class="col s4">
            <h4><?php echo $this->lang->line('calculator_result'); ?></h4>
          </div>
        </div>

        <div class="row line values-line" id="line-1">
          <div class="col s4">
            <input type="number" name="" value="" class="count-trigger" data-lvl="1" data-field="1">
          </div>
          <div class="col s4">
            <input type="number" name="" value="" class="count-trigger" data-lvl="1" data-field="2">
          </div>
          <div class="col s4">
            <input type="number" name="" value="" class="count-trigger" data-lvl="1" data-field="3">
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row add-line">
    <div class="col s12">
      <div class="field">
        <div class="row no-margin-bottom">
          <div class="col s6 center-align">
            <a class="waves-effect waves-light btn blue darken-1 create-new-line"><i class="material-icons left">add_circle_outline</i><?php echo $this->lang->line('calculator_add_line'); ?></a>
          </div>

          <div class="col s6 center-align">
            <a class="waves-effect waves-light btn red darken-1 delete-last-line"><i class="material-icons left">remove_circle_outline</i><?php echo $this->lang->line('calculator_del_line'); ?></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col s12">
      <div class="field">
        <p><?php echo $this->lang->line('calculator_cards'); ?>: <span id="display-total-cards">0</span></p>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col s12">
      <div class="field center-align">
        <p class="no-margin-bottom"><small><?php echo $this->lang->line('calculator_lands_quantity'); ?></small></p>
        <h1 class="display-result">0</h1>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col s12">
      <div class="field">
        <canvas id="mana-curve-chart" width="400" height="400"></canvas>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col s12">
      <p><?php echo $this->lang->line('calculator_ask_how_it_works'); ?> <a href="<?php echo site_url() . 'documentation/how_it_works/'; ?>"><?php echo $this->lang->line('calculator_read_how_it_works'); ?></a>.</p>
    </div>
  </div>
</div>

<?php $this->load->view('app/footer'); ?>
