var a;
var b;
var email;
var accID;
var accType;
var firstname;
function ValidateForms(form) {
    
    switch (form) {
            
            default:
            case '#log_form':
                if($("input[name='Username']").val()==""||$("input[name='Password']").val()==""||$("#log_acctype").find(":selected").text()=="USERTYPE"){
                    swal ( "Oops" ,  "Please Complete Fields!" ,  "error" ); //alert for login complete fields
                    return false;
                }else{
                    return true;
                }
            case '#reg_form':
                if($("input[class='username']").val()==""||$("#reg_acctype").val()==""||$("input[name='Lastname']").val()==""||$("input[name='Firstname']").val()==""||$("input[name='Middlename']").val()==""||$("input[class='pass']").val().length==0||$("input[name='Birthday']").val()==""||$("input[name='EmailAddress']").val()==""){
                    swal ( "Oops" ,  "Please Complete Fields!" ,  "error" ); 
                    return false;
                }else{
                    return true;
                }
            case '#res_room':
                if($("#timeout").val()==""||$("#timein").val()==""||$('select[name="Professor"]').find(":selected").text()=="NO REGISTERED PROF"){
                    if($('select[name="Professor"]').find(":selected").text()=="NO REGISTERED PROF"){
                        swal ( "Oops" ,  "WAIT FOR THE PROF TO REGISTER" ,  "error" );    
                        return false;
                    }
                    swal ( "Oops" ,  "Please Complete Fields!" ,  "error" );
                    return false;
                }else{
                    return true;
                }
            case '#prof_res':
                if($("#timeout").val()==""||$("#timein").val()==""){
                    swal ( "Oops" ,  "Please Complete Fields!" ,  "error" );
                    return false;
                }else{
                    return true;
                }
            case '#changepass_form':
                if($("#emailAdd").val()==""||$("#userID").val()==""||$('#changepass_acctype').find(":selected").text()=="USERTYPE"){
                    swal ( "Oops" ,  "Please Complete Fields!" ,  "error" );
                    return false;
                }else{
                    return true;
                }
                
    }
}

function PostRequest(frmdata,form,accountType) {
    
    $.ajax({
        url: "php/Process.php",
        method: "POST",
        data:frmdata,
        success: function(data,textStatus,jqXHR) {   
            if(data=="SUCCESSFUL"){
                switch (form) {
                    default:
                    case '#log_form':
                        document.cookie = "ID="+$('input[name="Username"]').val();
                        document.cookie = "AccType="+$('select[name="AccountType"]').val();
                        swal ( data ,  {
                            buttons: false,
                            timer: 2000,
                          });
                        if(accountType=="student"){
                        
                            window.location.replace('studentUI.php');
                        }else{
                            
                            window.location.replace('new.php');
                        }
                        $("#log_form")[0].reset();
                        break;
                    case '#reg_form':
                        swal ( data ,  {
                            buttons: false,
                            timer: 2000,
                          });
                          $("#reg_form")[0].reset();
                        break;
                    case '#res_room':
                        swal ( data ,  {
                            buttons: false,
                            timer: 2000,
                          });
                        $('#res_room')[0].reset();      
                        break;
                    case '#prof_res':
                        swal ( data ,  {
                            buttons: false,
                            timer: 2000,
                          });
                          $('#prof_res')[0].reset();      
                        break;
                    case '#changepass_form':
                        swal( data ,  {
                            buttons: false,
                            timer: 2000,
                          });
                          $('#changepass').prop('disabled',false);
                          
                        break;
                    case '#res_equip':
                        swal( data ,  {
                            buttons: false,
                            timer: 2000,
                        });
                        $('#res_equip')[0].reset();
                        break;
                    case '#prof_res_equip':
                        swal ( data ,  {
                            buttons: false,
                            timer: 2000,
                          });
                          $('#prof_res_equip')[0].reset();      
                        break;
                    
                }
                
            }else{
                switch (form) {
                    default:
                    case '#log_form':
                        swal ( data ,  {
                            buttons: false,
                            timer: 3000,
                          });
                        break;
                    case '#reg_form':
                        swal ( data ,  {
                            buttons: false,
                            timer: 2000,
                          });
                        break;
                    case '#res_room':
                        swal ( data ,  {
                            buttons: false,
                            timer: 2000,
                          });
                        
                        break;
                    case '#prof_res':
                        swal ( data ,  {
                            buttons: false,
                            timer: 2000,
                          });
                        break;
                    case '#changepass_form':
                        swal( data ,  {
                            buttons: false,
                            timer: 2000,
                          });
                        $('#changepass').prop('disabled',true);
                          break;
            }
                
            }
            
            }
    });

}
function PopulateSelect(code,select){
    $.ajax({
        url: "php/Process.php",
        method: "GET",
        data: {"get_code":code},
        
        success: function(data,textStatus,jqXHR) {            
            if(code==4&&data.trim()=="NO REGISTERED PROF"){
                $(select).append(new Option(data));
                return;
            }
            
            let a = JSON.parse(data);
            let b = Object.keys(a);
            for (let index = 0; index < b.length; index++) {
                
                const element = a[b[index]];
                if(code==4){
                        $(select).append(new Option("Prof "+element[0]+" "+element[1],b[index]));
                    
                }else if(code == 10){
                    $(select).append(new Option("ITEM:"+element["item"]+" CATEGORY:"+element["category"],b[index]));
                }else{
                    $(select).append(new Option(element,b[index]));
                }

                
            }
            
            
        }
        });
    return false;

}
function GetRequest(sentdata,code) {
    
    $.ajax({
        url: "php/Process.php",
        method: "GET",
        data:sentdata,
        
        success: function(data,textStatus,jqXHR) {         
            switch (code) {
                default:
                case 0:
                    
                    break;
            
                case 1:
                    break;
                case 2:
                    break;
                case 3:
                    break;
                case 4:
                    break;
                case 5:
                    a = JSON.parse(data);
                    b = Object.keys(a);
                    b.forEach(function (res) {
                       let day =  document.getElementsByClassName("day");
                       for (let index = 0; index < day.length; index++) {
                           const element = day[index];
                           if(new Date(a[res]['date']).getDate()==element.textContent){
                                element.firstElementChild.setAttribute("class","mark");
                                
                           } 
                       }    
                    });
                    break;
                case 6:            
                    if(data.trim()=="VACANT"&&$('.modal-body').css("display","block")){
                        $('input[type=text][class="read"]').val("VACANT");
                    }else{
                    let c = JSON.parse(data);
                    let d = Object.keys(c);
                        
                        $('input[name="professor"]').val(c[d[0]]['prof']);
                        $('input[name="dateTime"]').val(c[d[0]]['date']+" TIME IN: "+c[d[0]]['timeIn']+" TIME OUT: "+c[d[0]]['timeOut']);
                        $('input[name="course"]').val(c[d[0]]['courseID']);
                        $('input[name="year"]').val(c[d[0]]['year']);
                        $('input[name="subject"]').val(c[d[0]]['subjectID']);
                    }

                    break;
                case 7:
                    
                    break;
                case 8:
                    
                    let name = JSON.parse(data);
                    $('#profname').val(name[0]);
                    $('#profname_equip').val(name[0]);
                    
                    break;
                case 9:
                    if(data.trim()!="ACCOUNT NOT FOUND OR EMAIL ADDRESS IS NOT REGISTERED WITH THIS ACCOUND ID"){
                        let c = JSON.parse(data);
                        accID = c[0];
                        email = c[1];
                        firstname = c[2];
                        accType =c[3];
                        $('#changepass').css("visibility","visible");
                        
                    }else{
                        
                    }
         
                    break;
                case 10:
                    $('#changepass').css("visibility","hidden");
                    $('#changepass_form')[0].reset();
                    break;
                case 11:
                    
                    $('#tbl_room').append(data);
                    break;
            }
        }
        });
    return false;

        
}

