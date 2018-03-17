@extends('admin.master')

@section('content')

<script src="{{asset('js/jquery-1.12.4.js')}}"></script>
<script>
$(document).ready(function() {
  <?php for($i=1;$i<15;$i++) { ?>
      $('#successMsg<?php echo $i;?>').hide();
  $('#role<?php echo $i;?>').change(function(){
    var role_val<?php echo $i;?> = $('#role<?php echo $i;?>').val();
    var userId<?php echo $i;?> = $('#userId<?php echo $i;?>').val();
    $.ajax({
      type: 'get',
      data: 'userID='+userId<?php echo $i;?> + '&role_val=' + role_val<?php echo $i;?>,
      url: '<?php echo url('/admin/updateRole');?>',
      success: function(response){
        console.log(response);
        $('#successMsg<?php echo $i;?>').show();
        $('#successMsg<?php echo $i;?>').html(response);
      }
    });
  });
	$('#ban<?php echo $i;?>').change(function(){
      var ban_val<?php echo $i;?> = $('#ban<?php echo $i;?>').val();
      var userId<?php echo $i;?> = $('#userId<?php echo $i;?>').val();
      $.ajax({
        type: 'get',
        data: 'userID='+userId<?php echo $i;?> + '&ban_val=' + ban_val<?php echo $i;?>,
        url: '<?php echo url('/admin/banUser');?>',
        success: function(response){
          console.log(response);
        }
      });

	});
<?php } ?>
});
</script>
<section id="container" class="">
      @include('admin.sidebar')
      <section id="main-content">
          <section class="wrapper">
              <div class="content-box-large">
                @if(session('msg'))
                <div class="alert alert-info">  {{session('msg')}}</div>
                @endif
                  <h1>Users</h1>
                  <table class="table table-striped table-advance table-hover">
                      <thead>
                        <tr>
                              <th><i class="icon_profile"></i> Name</th>
                              <th><i class="icon_mail_alt"></i> Email</th>
                              <th><i class="icon_calendar"></i> Role</th>
                            	<th><i class="icon_mobile"></i> Ban</th>
															<th><i class="icon_cogs"></i> Actions</th>
                          </tr>
                      </thead>


                      <tbody>
                          <?php $countRole =1;?>
                        @foreach($usersData as $userData)
                        <input type="hidden" value="{{$userData->id}}" id="userId<?php echo $countRole;?>">

                        <tr>
                          <td>{{$userData->name}}</td>
                         <td>{{$userData->email}}</td>
                         <td><select name="role" class="form-control" id="role<?php echo $countRole;?>">
                           <option value="1" @if($userData->admin=='1')
                             selected="selected" @endif>Admin</option>
                           <option value="0"  @if($userData->admin=='' || $userData->admin=='0')
                             selected="selected" @endif>User</<option>
                           </select>
                           <p id="successMsg<?php echo $countRole;?>"
														  class="alert alert-success"></p>
                          </td>
                          <td>
                          <select name="ban" class="form-control" id="ban<?php echo $countRole;?>">
                           <option value="1" @if($userData->isBan=='1')
                             selected="selected" @endif>Yes</option>
                           <option value="0"  @if($userData->isBan=='' || $userData->isBan=='0')
                             selected="selected" @endif>No</<option>
                           </select>
                          </td>
													<td>
														<div class="btn-group">
                                    <a class="btn btn-info popovers" data-trigger="hover"
																		 data-content="Edit User" data-placement="top" href="{{url('/admin/UserEditForm')}}/{{$userData->id}}">
																				<i class="icon_minus_alt2"></i>
																		</a>
																	 <a class="btn btn-danger popovers" data-trigger="hover"
																		 data-content="Remove" data-placement="top" href="{{url('/admin/deleteUser')}}/{{$userData->id}}">
																				<i class="icon_close_alt2"></i>
																		</a>
                                  </div>
													</td>
                        </tr>
                          <?php $countRole++;?>
                        @endforeach

                      </tbody>
                    </table>

                  </div>
                </section>
              </section>
@endsection
