jQuery( document ).ready(function($) {
         
    $(".add_pri_var").click(function(event){
    	event.preventDefault();
       var current_size = $("#attr_size").val();
       //alert(current_size);
       var new_size = parseInt(current_size);
       	   new_size = new_size+1;	
       var var_html = '<tr><td><input type="text" name="att_var_option['+new_size+']" value="" /></td><td class="varian_price"><input type="text" value="" name="att_var_price['+new_size+']"/></td><td><textarea name="att_var_sele['+new_size+']"></textarea></td><td><textarea name="att_var_sele1['+new_size+']"></textarea></td><input type="hidden" value="'+new_size+'" name="attr_order" id="attr_order"></tr>';
       $("#product-price").append(var_html);
       $("#attr_size").val(new_size);
  })
    $(".del_variance").click(function(event){
	     event.preventDefault();
	     var get_id = $(this).attr("id");
	     var split_arr =get_id.split("_");
	     var r = confirm("Are you sure to delete ?");
		if (r == true) {
	       $("#"+split_arr[1]).remove();
	       /*var current_size = $("#attr_size").val();
	       var new_size = parseInt(current_size);
	       new_size = new_size-1;*/
		} else {
	    
		}
	    //$("#attr_size").val(new_size);   	
    })

 $("#add_price_section").click(function(event){
       event.preventDefault();
       var select_box_html = "<p><label>select role for discount price</label><select id='user_role' name='user_role[]'>";
       
       $.each(roles_arr,function (key,data) {
       	if ( default_role == key) {
  			select_box_html = select_box_html +"<option selected='selected' value='"+key+"'>"+data+"</option>";	 
  		 }else{
  		 	select_box_html = select_box_html +"<option  value='"+key+"'>"+data+"</option>";	 
  		 }	
       });
       select_box_html = select_box_html+"</select></p>";
       var input_box = "<p><label>Enter discount price for selected role</label><input type='text' name='role_discount[]' id='role_discount' value=''></p>";
       var del_but = "<input type='button' value='Delete price group' cladd='del_group' onclick='delgroup(this);'>";
       var group_html = "<div class='gr_boxes'>"+select_box_html+input_box+del_but+"</div>";
       $(".pricing_options").append(group_html);

  });
	

});
function delgroup(ele){
		jQuery(ele).parents(".gr_boxes").remove();
}