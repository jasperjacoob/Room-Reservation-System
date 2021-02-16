var timein_hrs;
var timein_mins;
var timeout_hrs;
var timeout_mins;
var timeData;
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
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
}
