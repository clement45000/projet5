// pour faire un appel ajax 
//api.openweathermap.org/data/2.5/weather?q=London&appid=1ce2eb5c8138a9cafa3dcf60d9f652a6
//<!--onclick="getWeather()"-->  
function ajaxGet(url, callback){  //
    var req = new XMLHttpRequest(); 
    req.open("GET", url);  
    req.addEventListener("load", function () { 
        if (req.status >= 200 && req.status < 400) { 
            callback(req.responseText);
        } else {
            console.error(req.status + " " + req.statusText + " " + url);
        }
    });
    req.addEventListener("error", function () {
        console.error("Erreur réseau avec l'URL " + url);
    });
    req.send(null);
}
 
 //Verification Utilisateur
var button =document.getElementById('get_weather');
        button.addEventListener('click',function(){
            if(document.getElementById('enter_town').value ==''){
                alert('Veuillez saisir une ville');
            }else{
                 getWeather();
            }
        })  
       

function getWeather(){ //recupère apidata transforme en json et affiche dans le dom
         
    var inputCity = document.getElementById('enter_town').value;
        
    ajaxGet("https://api.openweathermap.org/data/2.5/weather?q="+inputCity+"&units=metric&appid=1ce2eb5c8138a9cafa3dcf60d9f652a6&lang=fr", function(reponse)
    {
        apidata = JSON.parse(reponse);
        // var error = temp.cod.message;
        // console.log(error);
            var weatherDescription = apidata.weather[0].description; //condition
            var weatherTemperature = apidata.main.temp; //temperature
            var weatherByTown = apidata.name;//nom de la ville


            var city = document.querySelector('#ville'); //ville
            city.textContent = weatherByTown;

            var temp = document.querySelector('#temperature'); // temperature
            temp.textContent = Math.round(weatherTemperature);

            var desc = document.querySelector('#conditions');//condition
            desc.textContent = weatherDescription;
    });
}
