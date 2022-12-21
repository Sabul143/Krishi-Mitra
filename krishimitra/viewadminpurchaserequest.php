<?php 
include("header.php");
include("dbconnection.php");
if(isset($_GET['deleteid']))
{
	$sql = "DELETE FROM purchase_request WHERE purchase_request_id='$_GET[deleteid]'";
	if(!mysqli_query($con,$sql))
	{
		echo "<script>alert('Failed to delete record'); </script>";
	}
	else
	{
		
		if(mysqli_affected_rows($con)  >= 1)
		{
		echo "<script>alert('This record deleted successfully..'); </script>";
		}
	}
}

?>
  <main id="main">


    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container">

        <div class="text-center" data-aos="zoom-in">
		<br><br>
          <h3>Farm Produce Purchase Request</h3>
        </div>

      </div>
    </section><!-- End Cta Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div class="row">
		

          <div class="col-lg-12" data-aos="fade-up" data-aos-delay="100">
            <div class="info mt-4 ">
			
		<center><h4>View Farm Produce Purchase Request...</h4></center><hr>

<?php
 $sql = "SELECT * FROM purchase_request";
							  $qsql = mysqli_query($con,$sql);
							  if(mysqli_num_rows($qsql)  == 0)
									{
										echo "<center>There is no Purchase Request to display!!</center>";
									}
									else
									{
										?>
							<table ID="datatable" class="table table-striped table-bordered"  style="width:100%">
								<THEAD>
							  <tr>
						      <th><strong>Product</strong></th>
						      <th><strong>Quantity</strong></th>
						      <th><strong>Request Date</strong></th>
						      <th><strong>Expiry Date</strong></th>
						      <th><strong>Note</strong></th>
						      <th><strong>Status</strong></th>
						      </tr>
								</THEAD>
								<TBODY>
                              <?php
							  $sql = "SELECT * FROM purchase_request";
							  $qsql = mysqli_query($con,$sql);
							  while($rs = mysqli_fetch_array($qsql))
							  {
								  
								  $sql1 = "SELECT * FROM product WHERE product_id='$rs[product_id]'";
								  $qsql1 = mysqli_query($con,$sql1);
								  $rs1 = mysqli_fetch_array($qsql1);
							  echo "
						    <tr>
						      <td>&nbsp;$rs1[title]</td>
						      <td>&nbsp;$rs[quantity]</td>
						      <td>&nbsp;$rs[request_date]</td>
						      <td>&nbsp;$rs[request_date_expire]</td>
						      <td>&nbsp;$rs[note]</td>
						      <td>&nbsp;$rs[status]</td>
							 </tr>";
							  }
							  ?>
								</TBODY>
						  </table>
						<?php
						 }
						?>
            </div>
		  </div>
		  
        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
  
<?php
include("footer.php");
?>
<script type="application/javascript">
function delconfirm()
{
	if(confirm("Are you sure want to delete this record?") == true)
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>	