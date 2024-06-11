import CountryClasses from "./CountryClasses";

const country = new CountryClasses();

// Add Category Request
if (country.addCountryForm) {
    country.addCountryForm.addEventListener("submit", async (e) => {
        e.preventDefault();
        country.addState();
    });
}
