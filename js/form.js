function submitForm(e) {
    e.preventDefault();
    var name = $("input#name").val();
    var email = $("input#email").val();
    var subject = $("input#subject").val();
    var message = $("textarea#message").val();
    var spam = $("input#spam").val();
	var i = 0;
    if (name === "") {
		$("#name-group").addClass("has-error");
		$("#name").addClass("error");
        i = 1;
    }
	else {
		$( "#name-group" ).removeClass( "has-error" ).addClass( "has-success" );
		$("#name").removeClass("error");
	}
    if (email === "") {
		$("#email-group").addClass("has-error");
		$("#email").addClass("error");
        i = 1;
    }
	else {
		$( "#email-group" ).removeClass( "has-error" ).addClass( "has-success" );
		$("#email").removeClass("error");
	}
    if (subject === "") {
		$("#subject-group").addClass("has-error");
		$("#subject").addClass("error");
        i = 1;
    }
	else {
		$( "#subject-group" ).removeClass( "has-error" ).addClass( "has-success" );
		$("#subject").removeClass("error");
	}
    if (message === "") {
		$("#message-group").addClass("has-error");
		$("#message").addClass("error");
        i = 1;
    }
	else {
		$( "#message-group" ).removeClass( "has-error" ).addClass( "has-success" );
		$("#message").removeClass("error");
	}
    if (spam === "") {
		$("#spam-group").addClass("has-error");
		$("#spam").addClass("error");
        i = 1;
    }
	else {
		$( "#spam-group" ).removeClass( "has-error" ).addClass( "has-success" );
		$("#spam").removeClass("error");
	}
    if (spam != "7") {
		$("#spam-group").addClass("has-error");
		$("#spam").addClass("error");
        i = 1;
    }
	else {
		$( "#spam-group" ).removeClass( "has-error" ).addClass( "has-success" );
		$("#spam").removeClass("error");
	}
	if(i)
		return false;
    var dataString = 'name=' + name + '&email=' + email + '&subject=' + subject + '&message=' + message;
    $('#success_message').html('<img src="images/ajax_load_small.gif"/>');
    $.ajax({
        type: "POST",
        url: "pages/email.php",
        data: dataString,
        success: function () {
            $('#success_message').html('<div class="alert alert-success">Contact Form Submitted</div>'),
            $('input').val(''),
            $('#message').val('');
        }
    });
    return false;
}