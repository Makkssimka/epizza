let date = new Date();
let hour = date.getHours();
let minute = date.getMinutes();

let job = false

if(hour >= 10 && hour < 21){
    job = false;
}
else if(hour == 22 && minute <= 30){
    job = false;
}
else{
    job = true;
}

module.exports = job;