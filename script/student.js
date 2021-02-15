window.onload = function () {
var timein_hrs;
var timein_mins;
var timeout_hrs;
var timeout_mins;
var timeData;
PopulateSelect(1,'select[name="RoomNum"]');
PopulateSelect(0,'select[name="Course"]');
PopulateSelect(2,'select[name="Year"]');
PopulateSelect(4,'select[name="Professor"]');
PopulateSelect(7,'select[name="SubjectCode"]');
PopulateSelect(10,'select[name="Equipment"]');
var id = document.cookie.substr(3,document.cookie.indexOf(";")-3);
GetRequest({"get_code":"11","StudNum":id},11);
CheckTime('timein','timeout');
CheckTime('timein_equip','timeout_equip');
function CheckTime(timeInID,timeOutID) {    
    document.getElementById(timeInID).onchange = function (params) {
        timein_hrs = $('#'+timeInID).val().substring(0,$('#'+timeInID).val().indexOf(":"));
        timein_mins = $('#'+timeInID).val().substring($('#'+timeInID).val().indexOf(":")+1,$('#'+timeInID).val().length);    
        if($('#'+timeOutID).val()!=""){    
            if(CheckHrsMin(timein_hrs,timein_mins,timeout_hrs,timeout_mins)){
                timeData = "TIME ALLOWED";
                swal (  "TIME ALLOWED",  {
                    buttons: false,
                    timer: 3000,
                });
            }else{
                timeData = "TIME NOT ALLOWED";
                swal ( "TIME NOT ALLOWED" ,  {
                    buttons: false,
                    timer: 3000,
                });
            } 
        }
    };   
        
    document.getElementById(timeOutID).onchange = function (params) {
        timeout_hrs = $('#'+timeOutID).val().substring(0,$('#'+timeOutID).val().indexOf(":"));
            timeout_mins = $('#'+timeOutID).val().substring($('#'+timeOutID).val().indexOf(":")+1,$('#'+timeOutID).val().length);
            
        if($('#'+timeInID).val()!=""){    

            if(CheckHrsMin(timein_hrs,timein_mins,timeout_hrs,timeout_mins,$('#'+timeOutID).val())){
                timeData = "TIME ALLOWED";
                swal (  "TIME ALLOWED",  {
                    buttons: false,
                    timer: 3000,
                });
            }else{
                timeData = "TIME NOT ALLOWED";
                swal ( "TIME NOT ALLOWED" ,  {
                    buttons: false,
                    timer: 3000,
                });
            } 
        }
    };
}
function CheckHrsMin(timeIhrs,timeImin,timeOhrs,timeOmin,time){
    
    if(time > "21:01"){
        return false;
    }
    if(timeOhrs > timeIhrs){
        return true;
    }
    if(timeOhrs == timeIhrs){
        if(timeOmin > timeImin){
            return true;
        }
    }
    return false;

}

$('button[class="btnFooter"]').on('click',function (params) {
    if(ValidateForms('#res_room')&&timeData=="TIME ALLOWED"){
        PostRequest($('#res_room').serialize()+"&StudNum="+id+"&btn_name=btn_reserve",'#res_room');
    }
    return false;
});

$('#reserveEquipment').on('click',function (params) {
    if(ValidateForms('#res_equip')&&timeData=="TIME ALLOWED"){
        PostRequest($('#res_equip').serialize()+"&StudNum="+id+"&btn_name=btn_reserve",'#res_equip');
    }
    return false;
});
var btnequip = document.getElementById('resEquipment');
btnequip.onclick = function (params) {
    modal3.style.display = "block";
};

    // get element modal for room availability
var modal = document.getElementById('simpleModal');

// get element modal for room reservation
var modal1 = document.getElementById('simpleModal1');

// get element modal for about modal
var modal2 = document.getElementById('simpleModal2');
var modal3 = document.getElementById('simpleModal3');
// get button element for button reserve
var resModalBtn = document.getElementById('resModalBtn');

// get button element for button about
var aboutBtn = document.getElementById('aboutBtn');

// baka alam mo pano proper syntax dito na mas maikli, eto yung pag ni click yung 
// table data diko alam pano makuha element ng table data e


//get element for close button in modal

//get element for close button in modal
var closeBtn1 = document.getElementsByClassName('closeBtn1')[0];

//get element for close button in modal
var closeBtn2 = document.getElementsByClassName('closeBtn2')[0];





// to open modal for room reservation
resModalBtn.addEventListener('click', openModal1);

// to open modal for about 
aboutBtn.addEventListener('click', openModal2);


// event listener for close button


// event listener for close button in room reservation
closeBtn1.addEventListener('click', closeModal1);

// event listener for close button in room reservation
closeBtn2.addEventListener('click', closeModal2);

// event listener for clicking outside the modal in room avail and room res
window.addEventListener('click', outsideClick);
window.addEventListener('click', outsideClick1);
window.addEventListener('click', outsideClick2);
window.addEventListener('click', outsideClick3);
// function for opening modal for room availabiliy
function openModal(){
    
    modal.style.display = 'block';
}
//function for opening modal for room res
function openModal1(){
    modal1.style.display = 'block';
}
//function for opening about modal
function openModal2(){
    modal2.style.display = 'block';
}

//function for close button in room avail
function closeModal(){
    modal.style.display = 'none';
}

//function for close button in room res
function closeModal1(){
    modal1.style.display = 'none';
   
}

//function for close button in about
function closeModal2(){
    modal2.style.display = 'none';
   
}


function outsideClick(e){
    if(e.target == modal){
    modal.style.display = 'none';
    }
}

function outsideClick1(e){
    if(e.target == modal1){
    modal1.style.display = 'none';
    }
}

function outsideClick2(e){
    if(e.target == modal2){
    modal2.style.display = 'none';
    }
}

function outsideClick3(e) {
    if(e.target == modal3){
        modal3.style.display = 'none';
        }
}
}