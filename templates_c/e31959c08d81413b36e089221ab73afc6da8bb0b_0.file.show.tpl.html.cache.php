<?php
/* Smarty version 3.1.39, created on 2021-12-24 06:28:33
  from 'C:\xampp\htdocs\sourcenew\templates\dashboard\show.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61c51b39890a42_98742745',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e31959c08d81413b36e089221ab73afc6da8bb0b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sourcenew\\templates\\dashboard\\show.tpl.html',
      1 => 1640274727,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61c51b39890a42_98742745 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '130623271461c51b3987b603_44632178';
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Purchase Chart</h6>
    </div>
    <div class="card-body">
        <div class="chart-bar">
            <canvas id="myBarChart"></canvas>
        </div>        
    </div>
</div>

<?php echo '<script'; ?>
 src="vendor/chart.js/Chart.min.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>

var data_lable = new Array();
var data_data = new Array();
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['purc']->value, 'mod');
$_smarty_tpl->tpl_vars['mod']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['mod']->value) {
$_smarty_tpl->tpl_vars['mod']->do_else = false;
?>
    //data_lable
    data_lable.push('<?php echo $_smarty_tpl->tpl_vars['mod']->value['month'];?>
-<?php echo $_smarty_tpl->tpl_vars['mod']->value['year'];?>
');
    data_data.push(<?php echo $_smarty_tpl->tpl_vars['mod']->value['total'];?>
);
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
//data_lable = ["January", "February", "March", "April", "May", "June"];
//data_data = [1, 5312, 6251, 7841, 9821, 14984];
console.log(data_data)
console.log(data_lable)



var ctx = document.getElementById("myBarChart");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: data_lable,
    datasets: [{
      label: "Purchase",
      backgroundColor: "#4e73df",
      data: data_data
    }],
  },
  options: {
    maintainAspectRatio: false,
    scales: {
      yAxes: [{
        ticks: {
          min: 0
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': Rs.' + tooltipItem.yLabel;
        }
      }
    },
  }
});

<?php echo '</script'; ?>
><?php }
}
