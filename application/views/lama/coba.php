<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <!-- <input type="text" name="" value="" class="typeahead">
  <script src="<?php echo base_url() ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/typeahead.bundle.js"></script>
  <script type="text/javascript">

  var states = <?php echo file_get_contents(site_url('tes/cari')) ?>;

  // constructs the suggestion engine
var states = new Bloodhound({
datumTokenizer: Bloodhound.tokenizers.whitespace,
queryTokenizer: Bloodhound.tokenizers.whitespace,
// `states` is an array of state names defined in "The Basics"
local: states
});

$('.typeahead').typeahead({
hint: true,
highlight: true,
minLength: 1
},
{
name: 'states',
source: states
});
  </script> -->
  <?php foreach ($coba as $c) {
    echo $c;
  } ?>
</body>
</html>
