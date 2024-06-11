import axios from "axios";
import CheckoutClasses from "./CheckoutClasses";

const checkOut = new CheckoutClasses();
// Select country after change State automaticaly
if (checkOut.countryList) {
    checkOut.countryList.addEventListener("change", async (e) => {
        e.preventDefault();
        checkOut.selectCountryChangeState(e);
    });
}

// Fresh Ip check
if (checkOut.freshIpCheck) {
    checkOut.freshIpCheck.addEventListener("change", (e) => {
        e.preventDefault();
        checkOut.freshIPChangeHandler();
    });
}

if(checkOut.freshIpCheck){
    window.addEventListener("load", (e) => {
        e.preventDefault();
        checkOut.freshIPChangeHandler();
    });
}

// Terms Condition Cchange Handler
if(checkOut.termsCondition){
    checkOut.termsCondition.addEventListener("change", (e) => {
        e.preventDefault();
        checkOut.termsConditionChangeHandler();
    });
}

if(checkOut.termsCondition){
    window.addEventListener("load",  (e) => {
        e.preventDefault();
        checkOut.termsConditionChangeHandler();
    });
}
