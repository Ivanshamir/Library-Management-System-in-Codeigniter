<h2>Student List</h2>
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
    <th>Name</th>
    <th>Department</th>
    <th>Roll</th>
    <th>Registration No.</th>
    <th>Phone No.</th>
    <th style="width: 3.5em;">Action</th>
    </tr>
  </thead>
  <tbody>

    <?php
        $i = 0;
        foreach ($getstudent as $svalue) {
          $i++;
    ?>
    <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $svalue->name; ?></td>
    <td>
      <?php
        $dpid = $svalue->dept;
        $deptname = $this->department_model->getDepartment($dpid);
        if (isset($deptname)) {
          echo $deptname->dept;
        }
      ?>
    </td>
    <td><?php echo $svalue->roll; ?></td>
    <td><?php echo $svalue->reg; ?></td>
    <td>0<?php echo $svalue->phone; ?></td>
    <td>
    <a href="<?php echo base_url(); ?>student/editstudent/<?php echo $svalue->sId; ?>"><i class="fa fa-pencil"></i></a>
    <a onclick="return confirm('Are you sure to delete?');" href="<?php echo base_url(); ?>student/delstudent/<?php echo $svalue->sId; ?>" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
    </td>
    </tr>
    <?php } ?>
</tbody>
</table>
