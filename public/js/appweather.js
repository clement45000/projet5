
    function ajaxGet(url, callback,err){  //
        var req = new XMLHttpRequest(); 
        req.open("GET", url);  
        req.addEventListener("load", function () { 
            if (req.status >= 200 && req.status < 400) { 
                callback(req.responseText);
            } else{
               // Si la ville existe pas (message erreur)
                if(req.status === 404){
                    var err = document.getElementById('erreur').style.display="block";
                    var error_jojo = document.getElementById('error_number').style.display="none";
                }
            }
        });
        req.send(null);
    }
    
    function getWeather(){ //recupère apidata transforme en json et affiche dans le dom      
        var inputCity = document.getElementById('enter_town').value;
        ajaxGet("https://api.openweathermap.org/data/2.5/weather?q="+inputCity+"&units=metric&appid=1ce2eb5c8138a9cafa3dcf60d9f652a6&lang=fr", function(reponse)
        {
            apidata = JSON.parse(reponse);
            var error = apidata.cod;

            if(apidata.cod === 200 ){
                var err = document.getElementById('erreur').style.display="none";
            }

            var errornumber = document.getElementById('data_weather').style.display="block";
            var weatherDescription = apidata.weather[0].description; 
            var weatherTemperature = apidata.main.temp; 
            var weatherByTown = apidata.name;
                
            var city = document.querySelector('#ville'); 
            city.textContent = weatherByTown;

            var temp = document.querySelector('#temperature'); 
            temp.textContent = Math.round(weatherTemperature);

            var desc = document.querySelector('#conditions');
            desc.textContent = weatherDescription;  
        });
    }
     
    var button = document.getElementById('get_weather');

    button.addEventListener('click',function(){
        if(document.getElementById('enter_town').value =='' ){
            alert('Veuillez saisir le nom d\'une ville');
        } 
    });  
    
    var reg = /\d/;
    var button = document.getElementById('get_weather');

    button.addEventListener('click',function(){
        if(reg.test(document.getElementById('enter_town').value)){
            var errornumber = document.getElementById('data_weather').style.display="none";
            var error_number = document.getElementById('error_number').style.display="block";
            var err = document.getElementById('erreur').style.display="none";
        } else {
            getWeather();
            var error_number = document.getElementById('error_number').style.display="none";
        }
    });  

