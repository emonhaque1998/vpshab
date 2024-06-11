import TermsClasses from "./TermsClasses";

const terms = new TermsClasses();

if(terms.website_terms_form){
    terms.website_terms_form.addEventListener("submit", (e)=>{
        e.preventDefault();
        terms.updateTerms();
    })
}

if(terms.website_privacy_form){
    terms.website_privacy_form.addEventListener("submit", (e) => {
        e.preventDefault();
        terms.updatePolicy();
    })
}

if(terms.website_cookie_form){
    terms.website_cookie_form.addEventListener("submit", (e) => {
        e.preventDefault();
        terms.updateCookie();
    })
}
