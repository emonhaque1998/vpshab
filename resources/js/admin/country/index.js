import CountryClasses from "./CountryClasses";

const country = new CountryClasses();

// Add Category Request
if (country.addCountryForm) {
    country.addCountryForm.addEventListener("submit", async (e) => {
        e.preventDefault();
        country.addState();
    });
}

// edit Country
if(country.countryEditBtn){  
    country.countryEditBtn.forEach((item, index) => {
        item.addEventListener("click", (e) => {
            e.preventDefault();
            country.editCountry(country.countryId[index]);
        })
    })    
}


window.addEventListener("load", ()=>{
    if(country.addCountryForm){
        country.loadWorking();
    }
})