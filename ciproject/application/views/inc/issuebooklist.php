<script src="<?php echo base_url(); ?>lib/jquery.dataTables.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>lib/jquery.dataTables.css"/>
<h2>Issue Book List</h2>
<hr/>
<?php
    $msg = $this->session->flashdata('msg');
    if (isset($msg)) {
      echo $msg;
    }
?>
<table class="display" id="shamir">
  <thead>
    <tr>
    <th>No.</th>
    <th>Name</th>
    <th>Registration No</th>
    <th>Department</th>
    <th>Bookname</th>
    <th>Issue Book Date</th>
    <th>Return Date</th>
    <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $i = 0;
        foreach ($getissuedata as $ivalue) {
          $i++;
    ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $ivalue->name; ?></td>
        <td><?php echo $ivalue->reg; ?></td>
        <td>
          <?php
            $dpid = $ivalue->dept;
            $deptname = $this->department_model->getDepartment($dpid);
            if (isset($deptname)) {
              echo $deptname->dept;
            }
          ?>
        </td>
        <td>
          <?php
            $bookid = $ivalue->bookname;
            $bkname = $this->book_model->getBookById($bookid);
            if (isset($bkname)) { ?>
            <a target="_blank" href="<?php echo base_url(); ?>manage/bookdetails/<?php echo $bookid; ?>"><?php echo $bkname->bookname; ?></a>
          <?php } ?>
        </td>
        <td><?php echo date("d/m/Y h:ia", strtotime($ivalue->date)); ?></td>
        <td><?php echo $ivalue->return; ?></td>
        <td>
            <a onclick="return confirm('Are you sure to delete?');" href="<?php echo base_url(); ?>manage/delissue/<?php echo $ivalue->id; ?>" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a> ||
            <a target="_blank" href="<?php echo base_url(); ?>manage/studetails/<?php echo $ivalue->reg; ?>" role="button" data-toggle="modal"><i class="fa fa-eye"></i></a>
        </td>
    </tr>
  <?php } ?>
</tbody>
</table>
<script type="text/javascript">
  $(document).ready(function(){
    $("#shamir").DataTable();
  });
</script>
