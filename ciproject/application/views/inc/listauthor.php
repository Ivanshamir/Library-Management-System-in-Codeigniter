<h2>Author List</h2>
<hr/>
<?php
   $msg = $this->session->flashdata('msg');
    if (isset($msg)) {
      echo $msg;
    }
?>
<table class="table">
  <thead>
    <tr>
    <th>No.</th>
    <th>Author Name</th>
    <th style="width: 3.5em;">Action</th>
    </tr>
  </thead>
  <tbody>

    <?php
        $i = 0;
        foreach ($getauthor as $svalue) {
          $i++;
    ?>
    <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $svalue->author; ?></td>
    <td>
    <a href="<?php echo base_url(); ?>author/editauthor/<?php echo $svalue->aId; ?>"><i class="fa fa-pencil"></i></a>
    <a onclick="return confirm('Are you sure to delete?');" href="<?php echo base_url(); ?>author/delauthor/<?php echo $svalue->aId; ?>" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
    </td>
    </tr>
    <?php } ?>
</tbody>
</table>
