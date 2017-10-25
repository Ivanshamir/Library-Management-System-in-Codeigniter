<h2>Book List</h2>
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
    <th>Book Name</th>
    <th>Department Name</th>
    <th>Author Name</th>
    <th>Book Stock</th>
    <th style="width: 3.5em;">Action</th>
    </tr>
  </thead>
  <tbody>

    <?php
        $i = 0;
        foreach ($getbook as $svalue) {
          $i++;
    ?>
    <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $svalue->bookname; ?></td>
    <td>
      <?php
        $dpid = $svalue->dept;
        $deptname = $this->department_model->getDepartment($dpid);
        if (isset($deptname)) {
          echo $deptname->dept;
        }
      ?>
    </td>
    <td>
      <?php
        $athrid = $svalue->author;
        $athrname = $this->author_model->getAuthor($athrid);
        if (isset($athrname)) {
          echo $athrname->author;
        }
      ?>
  </td>
  <td><?php echo $svalue->stock; ?></td>
    <td>
    <a href="<?php echo base_url(); ?>book/editbook/<?php echo $svalue->bookId; ?>"><i class="fa fa-pencil"></i></a>
    <a onclick="return confirm('Are you sure to delete?');" href="<?php echo base_url(); ?>book/delbook/<?php echo $svalue->bookId; ?>" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
    </td>
    </tr>
    <?php } ?>
</tbody>
</table>
