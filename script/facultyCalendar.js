const date = new Date();


//function 
const renderCalendar = () => {
    
    date.setDate(1);
    
    const monthDays = document.querySelector(".days");
    
    const lastDay = new Date(date.getFullYear(),date.getMonth() + 1, 0).getDate();
    
    const firstDayIndex = date.getDay();
    
    const prevLastDay = new Date(date.getFullYear(),date.getMonth(), 0).getDate();
    
    const lastDayIndex = new Date(date.getFullYear(),date.getMonth() + 1, 0).getDay();
    
    const nextDays = 7 - lastDayIndex - 1;
    
    const months = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December",
    ];
    
    document.querySelector(".date h1").innerHTML = months[date.getMonth()];
    
    document.querySelector(".date p").innerHTML = new Date().toDateString();
    
    let days = "";
    
    // for prev days
    for(let x = firstDayIndex; x > 0; x--){
        days += `<div class="prev-date">${prevLastDay - x + 1}</div>`;
    }
    
    // for days 
    for(let i = 1; i<=lastDay ; i++){
        if( i === new Date().getDate() && date.getMonth() === new Date().getMonth()){
            days += `<div class="day" id="today">${i}<span></span></div>`;
        } else{
            days += `<div class="day">${i}<span></span></div>`;
        } 
    }
    
    // for next days
    for(let j = 1; j <= nextDays; j++){
        days += `<div class="next-date">${j}</div>`; 
        monthDays.innerHTML = days;
    }
    let day = document.getElementsByClassName('day');
    for (let index = 0; index < day.length; index++) {
        const element = day[index];
        element.onclick = function () {
            document.getElementById('roomNumber').textContent = "ROOM LIST";
            if(a!=null&&b!=null){
                b.forEach(e => {
                    if(element.textContent==new Date(a[e]['date']).getDate()){
                        
                        let ul = document.getElementById("roomlist");
                        var li = document.createElement("li");
                        li.appendChild(document.createTextNode("ROOM: "+a[e]['roomID']+" TIME IN: "+a[e]['timeIn']+" TIME OUT: "+a[e]['timeOut']));
                        ul.appendChild(li);
                    }  
                }); 
                $('#simpleModal2').css("z-index","2");
                $('#simpleModal3').css("display","block");
                
            }

        }
        
    }
}

//for arrows next and prev
document.querySelector('.prev').addEventListener('click', () =>{
    date.setMonth(date.getMonth() - 1)
    ReservationInMonth();
    renderCalendar(); //for calling  function
})

document.querySelector('.next').addEventListener('click', () =>{
    date.setMonth(date.getMonth() + 1)
    ReservationInMonth();
    renderCalendar();
     //for calling  function
})

   

renderCalendar(); //for calling global scope