jQuery(document).ready(function(){
    
    //Adding the datepicker event to the fields
	jQuery('.datebotton_mf').live('click',function(){
	    	    
        the_id = jQuery(this).attr('id');
        picker = the_id.replace(/pick_/,'');
        format = jQuery('#format_date_field_'+picker).text();
        format = switch_formats(format);
				
        picker = 'display_date_field_' + picker;
        
        jQuery('#'+picker).datepicker({
            showAnim: 'fadeIn',
            changeYear: true,
            dateFormat: format,
            altFormat: "yy-mm-dd",
            altField: '#' + the_id.replace(/pick_/,'date_field_'),
            showOn:'focus',
            onClose: function(){
                input = jQuery(this);
                date = input.val();
                //id = input.attr('id').replace(/display_/,'');
                //jQuery('#'+id).val(date);
                
                //unbind the event
                jQuery(this).datepicker('destroy');
            }
        }).focus();
	});
	
	//TODAY Botton
	jQuery('.todaybotton_mf').live('click',function(){
	    the_id = jQuery(this).attr('id');
	    picker = the_id.replace(/today_/,'');
	    today = 'tt_' + picker;    
	    today = jQuery('#'+today);
	    today_raw = jQuery('#tt_raw_' + picker);
	    date = today.val();
	    date_raw = today_raw.val();
	    
      jQuery('#display_date_field_'+picker).val(date);
			jQuery('#date_field_'+picker).val(date_raw);
	});
	
	//BLANK Botton
	jQuery('.blankBotton_mf').live('click',function(){
	    the_id = jQuery(this).attr('id');
	    picker = the_id.replace(/blank_/,'');	    
      jQuery('#display_date_field_'+picker).val("");
			jQuery('#date_field_'+picker).val("");
	});
	
});

//From php date format to jqueyr datepicker format
switch_formats = function(date){

    if(date == "m/d/Y"){
        return "mm/dd/yy";
    }

    if(date == "l, F d, Y"){
        return "DD, MM dd, yy"; 
    }
    
    if(date == "F d, Y"){
        return "MM dd, yy"
    }
    
    if(date == "m/d/y"){
        return "mm/dd/y";
    }
    
    if(date == "Y-d-m"){
        return "yy-dd-mm";
    }
    
    if(date == "Y-m-d"){
        return "yy-mm-dd";
    }
    
    if(date == "d-M-y"){
        return "dd-M-y";
    }
    
    if(date == "m.d.Y"){
        return "mm.dd.yy";
    }
    
    if(date == "m.d.y"){
        return "mm.dd.y";
    }
}
