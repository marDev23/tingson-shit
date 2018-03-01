@extends('admin.master')

@section('content')
<script src="{{asset('js/jquery-1.12.4.js')}}"></script>
<script>
$(document).ready(function(){
<?php for($i=1;$i<60;$i++){?>
  // start loop
      $('#amountDiv<?php echo $i;?>').hide();
      $('#checkSale<?php echo $i;?>').show();
        $('#onSale<?php echo $i;?>').click(function(){  // run when admin need to add amount for sale
          $('#amountDiv<?php echo $i;?>').show();
          $('#checkSale<?php echo $i;?>').hide();
            $('#saveAmount<?php echo $i;?>').click(function(){
              var salePrice<?php echo $i;?> = $('#spl_price<?php echo $i;?>').val();
              var pro_id<?php echo $i;?> = $('#pro_id<?php echo $i;?>').val();
                $.ajax({
                  type: 'get',
                  dataType: 'html',
                  url: '<?php echo url('/admin/addSale');?>',
                  data: "salePrice=" + salePrice<?php echo $i;?> + "& pro_id=" + pro_id<?php echo $i;?>,
                  success: function (response) {
                      console.log(response);
                  }
              });
            });
        });
        $('#noSale<?php echo $i;?>').click(function(){ // this when admin dnt need sale
          $('#amountDiv<?php echo $i;?>').hide();
          $('#checkSale<?php echo $i;?>').show();

        });
        //end loop
        <?php }?>
        $('#import_products').hide();
        $('#open_importDiv').click(function(){
          $('#import_products').fadeIn();
          $('#open_importDiv').hide();
        });
});

</script>
  <section id="container" class="">
        @include('admin.sidebar')
        <section id="main-content">
            <section class="wrapper">
                <div class="content-box-large">
                    <h1>Orders</h1>
                    <table class="table table-striped">
                        <thead>
                          <tr>
                                <th>Order Id</th>
                                <th>User Name</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th>Reciept Image</th>
                                <th>Update</th>
                            </tr>
                        </thead>
                        
                    </table>
                </div>
</section>
</section>
</section>

@endsection
