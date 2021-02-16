
PopulateSelect(0,'select[name="Course"]');
PopulateSelect(2,'select[name="Year"]');
$('#submit').on('click',function () {    
    if(ValidateForms("#reg_form")){
        PostRequest($('#reg_form').serialize()+"&btn_name=btn_register",'#reg_form');      
    }
    
    return false;
});
$('#reg_acctype').change(function () {
    
    if($('#reg_acctype').find(":selected").text()=="STUDENT"){
        $('select[name="Course"]').prop("disabled",false);
        $('select[name="Year"]').prop("disabled",false);
    }else{
        $('select[name="Course"]').prop("disabled",true);
        $('select[name="Year"]').prop("disabled",true);
    }
});
$('#login').on('click',function () {
    if(ValidateForms("#log_form")){
        PostRequest($('#log_form').serialize()+"&btn_name=btn_login",'#log_form',$('select[name="AccountType"]').val());         
    }
    return false;
});

$('#changepass_acctype').change(function (params) {
    if($('#changepass_acctype').find(":selected").text()!="USERTYPE"){
        if(ValidateForms('#changepass_form')){
            PostRequest($('#changepass_form').serialize()+"&btn_name=btn_changepass",'#changepass_form',$('#changepass_acctype').val());         
        }
        
    }
   
    return false;
});
$('#changepass').on('click',function (params) {
    GetRequest({"get_code":9});
    
});
var modal = document.getElementById('simpleModal');

var modalBtn = document.getElementById('modalBtn');

var closeBtn = document.getElementsByClassName('closeBtn')[0];

modalBtn.addEventListener('click', openModal);

closeBtn.addEventListener('click', closeModal);

window.addEventListener('click', outsideClick);

function openModal(){
    modal.style.display = 'block';
}

function closeModal(){
    modal.style.display = 'none';
}

function outsideClick(e){
    if(e.target == modal){
    modal.style.display = 'none';
    }
}    

