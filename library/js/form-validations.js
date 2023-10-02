jQuery(document).ready(function() {
    jQuery('#new_user').bootstrapValidator({
    		container: 'tooltip',
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'fa fa-check',
            invalid: 'fa fa-close',
            validating: 'fa fa-spinner fa-spin'
        },
        fields: {            
            user_email: {            	            	
                validators: {
                    notEmpty: {
                        message: 'The email address is required and cannot be empty'
                    },
                    emailAddress: {
                        message: 'The email address is not a valid'
                    },
                    regexp: {
                        regexp: /[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}/,
                        message: 'Invalid email format'
                    },
                }
            },
            user_name: {            	            	
                validators: {
                    notEmpty: {
                        message: 'The username is required and cannot be empty'
                    },
                stringLength: {
                        min: 5,
                        message: 'The Username must have at least 5 characters'
                   }
                }
            },
            password: {
                validators: {
                		identical: {
                        field: 'confirm_password',
                        	message: 'The password and its confirm are not the same'
                    		},
                    		notEmpty: {
                        	message: 'The password is required and cannot be empty'
                    		},
                    		different: {
                        	field: 'username',
                        	message: 'The password cannot be the same as username'
                    		},
                    		stringLength: {
                        	min: 8,
                        	message: 'The password must have at least 8 characters'
                    		}
                }
            },
             confirm_password: {
                validators: {
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    }
                }
            },            
            user_phone: {
                validators: {
                    notEmpty: {
                        message: 'Required'
                    },
                    digits: {                       
                        message: 'Enter a valid phone number'
                    }
                }
            }
            //new field
        }
    })
    .on('success.form.bv', function(e) {
            // Prevent form submission
            e.preventDefault();
            
            // Get the form instance
            var form = jQuery(e.target);
            
            // Get the BootstrapValidator instance
            var bv = form.data('bootstrapValidator');
				// Serialize data and send to register_account function in theme_scripts
            var serialized_data = form.serialize();
            	register_account(serialized_data);            
            
        });
        
        jQuery('input[name="user_email"]').on('blur', function(e) {
        	var valid = jQuery('#new_user').data('bootstrapValidator').isValidField('user_email');
        		if(valid){
        			check_email(jQuery(this).val()); //check_email is in theme_scripts
        		}        
    		});
    		jQuery('input[name="user_name"]').on('blur', function(e) {
        	var valid = jQuery('#new_user').data('bootstrapValidator').isValidField('user_name');
        		if(valid){
        			check_username(jQuery(this).val()); //check_username is in theme_scripts
        		}        
    		});
    	
    	// Login Validation and Ajax Call
    	jQuery('#login_form').bootstrapValidator({
    		container: 'tooltip',
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'fa fa-check',
            invalid: 'fa fa-close',
            validating: 'fa fa-spinner fa-spin'
        },
        fields: {            
            login_email: {            	            	
                validators: {
                    notEmpty: {
                        message: 'The email address is required and cannot be empty'
                    },
                    emailAddress: {
                        message: 'The email address is not a valid'
                    },
                    regexp: {
                        regexp: /[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}/,
                        message: 'Invalid email format'
                    },
                }
            }            
            //new field
        }
    })
    .on('success.form.bv', function(e) {
            // Prevent form submission
            e.preventDefault();
            
            // Get the form instance
            var form = jQuery(e.target);
            
            // Get the BootstrapValidator instance
            var bv = form.data('bootstrapValidator');
				// Serialize data and send to register_account function in theme_scripts
            var serialized_data = form.serialize();
            	//alert(serialized_data);
            	login_user(serialized_data); //login_user from theme_scripts   
            
        });        
        
});