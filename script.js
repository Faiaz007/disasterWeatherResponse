const cityInput = document.querySelector(".city-input");
const searchButton = document.querySelector(".search-btn");
const locationButton = document.querySelector(".location-btn");
const API_KEY="aeb3211014ab6736d2e287a6a79af95f";
const currentWeatherDiv = document.querySelector(".current-weather");
const weatherCardsDiv = document.querySelector(".weather-cards");

const createWeatheraCard =(cityName, weatherItem, index)=>{
    if(index===0){//HTML for main weather
        return`<div class="current-weather">
        <div class="details">
            <h2>${cityName}(${weatherItem.dt_txt.substring(0, 10)})</h2>
            <h5>Temperature: ${(weatherItem.main.temp -273.15).toFixed(2)}°C</h5>
            <h5>Humidity:${weatherItem.main.humidity}%</h5>
            <h5>Wind Speed:${weatherItem.wind.speed}M/S</h5>
        </div>
        <div class="icon">
        <img src="https://openweathermap.org/img/wn/${weatherItem.weather[0].icon}@4x.png" alt="weather-icon">
            <h4>${weatherItem.weather[0].description}</h4>
        </div>`;
    }//HTML for 5 days forcast cards
    return ` <li class="card">
    <h3>( ${weatherItem.dt_txt.substring(0, 10)} )</h3>
    <img src="https://openweathermap.org/img/wn/${weatherItem.weather[0].icon}@2x.png" alt="weather-icon">
    <h5>Temperature: ${(weatherItem.main.temp -273.15).toFixed(2)}°C</h5>
    <h5>Humidity:${weatherItem.main.humidity}%</h5>
    <h5>Wind Speed:${weatherItem.wind.speed}M/S</h5>
</li>`;
};

const getWeatherDetails = (cityName,lat,lon) =>{
    const WEATHER_API_URL = `http://api.openweathermap.org/data/2.5/forecast?lat=${lat}&lon=${lon}&appid=${API_KEY}`;
    fetch(WEATHER_API_URL).then(res=>res.json()).then(data => {
        const uniqueForecastDays = [];
        const fiveDaysForecast =data.list.filter(forecast=>{
            const forecastDate = new Date(forecast.dt_txt).getDate();
            if(!uniqueForecastDays.includes(forecastDate)){
                uniqueForecastDays.push(forecastDate);
                return true;
            }
            return false;
        });

        //Clearing previouse weather data
        cityInput.value ="";
        weatherCardsDiv.innerHTML = "";
        currentWeatherDiv.innerHTML = "";
       
         //Creating weather cards and adding them to the DOM
        fiveDaysForecast.forEach((weatherItem,index) => {
            if(index===0){
                currentWeatherDiv.insertAdjacentHTML("beforeend",createWeatheraCard(cityName,weatherItem,index));
            } else {
            weatherCardsDiv.insertAdjacentHTML("beforeend",createWeatheraCard(cityName,weatherItem,index));
            }
        });

    }).catch(()=>{
        alert("An error occured while fetching weather forecast"); 
    });
};

const getCityCoordinates =() =>{
    const cityName = cityInput.value.trim();

    if (!cityName)return;   //Return if city empty

    //Get city coordinates(latitide,longitude,name) from API
    const GEOCODING_API_URL = `http://api.openweathermap.org/geo/1.0/direct?q=${cityName}&limit=1&appid=${API_KEY}`;
    fetch(GEOCODING_API_URL).then(res => res.json()).then(data=>{
        if(!data.length)return alert(`No Coordinates found for ${cityName}`);
        const{name,lat,lon}= data[0];
        getWeatherDetails(name,lat,lon);

    }).catch(()=>{

        alert("An error occured while fetching the coordinates!");
    });
};

const getUserCoordinates = () =>{
    navigator.geolocation.getCurrentPosition(
    position => {
        const {latitude,longitude} = position.coords;//Get coordinates of user location
        const REVERSE_GEOCODING_URL = `http://api.openweathermap.org/geo/1.0/reverse?lat=${latitude}&lon=${longitude}&limit=1&appid=${API_KEY}`;
        //Get city name from coordinates using reverse geocoding api
        fetch(REVERSE_GEOCODING_URL).then(res => res.json()).then(data=>{
            const{name}= data[0];
            getWeatherDetails(name,latitude,longitude);

        }).catch(()=>{

            alert("An error occured while fetching the city coordinates!");
        });
    },  
    error => { //Show error if user denied the location permission

        if(error.code === error.PERMISSION_DENIED){
            
           alert("Geolocation request denied. Please reset the location to grant access.") 
        };
        }
    );
}
searchButton.addEventListener("click", getCityCoordinates);
locationButton.addEventListener("click", getUserCoordinates);
