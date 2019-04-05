$(document).ready(function () {
    function myFunction(imgs) {
        // Get the expanded image
        var expandImg = document.getElementById("expandedImg");
        // Get the image text
        var imgText = document.getElementById("imgtext");
        // Use the same src in the expanded image as the image being clicked on from the grid
        expandImg.src = imgs.src;
        // Use the value of the alt attribute of the clickable image as text inside the expanded image
        imgText.innerHTML = imgs.alt;
        // Show the container element (hidden with CSS)
        expandImg.parentElement.style.display = "block";
    }
    $('#deleteComment').click(function(){
        let id = $(this).data('id');
        console.log(id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:'/deleteComment/' + id,
            method:'delete',
            data:{},
            success(data){
                location.reload();
            },
            error(err, xhr, msg){
                console.log(msg);
            }
        })
    });
    $('#oldPassConfirm').on('keyup',function(){
        let confirmPass = $('#oldPassConfirm').val();
        let oldPass = $('#oldPass').val();
        let confirmPassMD5 = $.MD5(confirmPass);
        if(oldPass !== confirmPassMD5){
            $('#oldPassConfirm').css('border','1px solid red');
            $('#newPass').attr('disabled', true);
        }
        else{
            $('#oldPassConfirm').css('border','1px solid green');
            $('#newPass').removeAttr('disabled');
        }
    });
    function timeConverterTommorow(UNIX_timestamp){
        var a = new Date(Date.now() + 86400000);
        var year = a.getFullYear().toString();
        var month = a.getMonth() + 1;
        var monthStr = month.toString();
        if(monthStr.length === 1){
            monthStr = "0" + monthStr;
        }
        var date = a.getDate().toString();
        if(date.length === 1){
            date = "0" + date;
        }
        var time = year + '-' + monthStr + '-' + date ;
        return time;
    }
    function timeConverterMonth(UNIX_timestamp) {
        var a = new Date(Date.now() + 2592000000);
        var year = a.getFullYear();
        var month = a.getMonth() + 1;
        var monthStr = month.toString();
        if(monthStr.length === 1){
            monthStr = "0" + monthStr;
        }
        var date = a.getDate().toString();
        if(date.length === 1){
            date = "0" + date;
        }
        var time = year + '-' + monthStr + '-' + date ;
        return time;
    }
    var date = $('#bookDate');
    date.attr('min',timeConverterTommorow(0));
    date.attr('max',timeConverterMonth(0));
    function noWeekends() {

        var day = new Date(date.val()).getUTCDay();

        if (day === 6 || day === 0) {

            alert("Ne mozete zakazati termin subotom ili nedeljom");
            date.css('border','1px solid red');
            date.val('dd----2019');

        }
        else{
            date.css('border','1px solid #AAEEAA');
        }
        console.log(date.val());

    }
    date.on('input',noWeekends)

    $('#makeAdmin').click(function(){
        let id = $("#makeAdminId option:checked").val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : '/updateAdmin/' + id,
            method : 'post',
            data : {},
            success(data){
                alert('Uspesno ste korisnika postavili za admina')
            },
            error(err, xhr, msg){
                alert(msg);
            }
        })
    });
    $('#deleteUser').click(function(){
        let id = $("#deleteUserId option:checked").val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : '/deleteUser/' + id,
            method : 'delete',
            data : {},
            success(data){
                alert('Uspesno ste izbrisali korisnika');
                location.reload();
            },
            error(err, xhr, msg){
                alert(msg);
            }
        })
    });
    $('#updateUserId').change(function(){
        let id = $("#updateUserId option:checked").val();
        $.ajax({
            url : '/user/' + id,
            method : 'get',
            data: {},
            success(data){
                let ispis = "<input type='hidden' id='id_ajax' class='form-control' value='" + data[0].id + "'/>" +
                    "<input type='text' id='first_name_ajax' class='form-control' value='" + data[0].first_name + "'/> <br/>" +
                    "<input type='text' id='last_name_ajax' class='form-control' value='" + data[0].last_name + "'/> <br/>" +
                    "<input type='text' id='email_ajax' class='form-control' value='" + data[0].email + "'/> <br/>" +
                    "<input type='button' id='updateAjaxButton' class='updateAjaxButton form-control w3-right' style='width:100px;' value='izmeni'/> <br/>";
                $('#updateUserDiv').html(ispis);
            },
            error(err, xhr, msg){
                alert(msg)
            }
        })
    });
    $('body').on('click', '.updateAjaxButton', function (){
        let id = document.getElementById('id_ajax').value;
        let f_name = document.getElementById('first_name_ajax').value;
        let l_name = document.getElementById('last_name_ajax').value;
        let email = document.getElementById('email_ajax').value;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : '/updateUserAjax/' + id,
            method : 'post',
            data : {
                first_name : f_name,
                last_name : l_name,
                email : email
            },
            success(data){
                location.reload()
            },
            error(err, xhr, msg){
                alert(msg);
            }
        })
    });
    $('#updateAppId').change(function(){
        document.getElementById('hiddenDivUpdate').style.visibility = 'visible';
    });
    $('#deleteCommentAdmin').click(function(){
        let id = $(this).data('id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:'/deleteCommentAdmin/' + id,
            method:'delete',
            data:{},
            success(data){
                location.reload();
            },
            error(err, xhr, msg){
                console.log(msg);
            }
        })
    });
    $('.answerMessage').click(function(){
        document.getElementById('answerDiv').style.visibility = 'visible';
        let id = $(this).data('id');
        $('#acc_id').val(id);
    });
    $('#deleteMessage').click(function(){
        let id = $(this).data('id');
        $.ajax({
            url : '/deleteMessage/' + id,
            method : 'get',
            success(data){
                location.reload();
            },
            error(err, xhr, msg){
                console.log(msg);
            }
        })
    })
});