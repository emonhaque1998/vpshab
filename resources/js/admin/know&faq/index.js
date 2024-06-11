import KnowlageFaqClasses from "./KnowlageFaqClasses";

const knowFaq = new KnowlageFaqClasses();

if (knowFaq.website_knowlegebase_submit) {
    knowFaq.website_knowlegebase_submit.addEventListener("submit", (e) => {
        e.preventDefault();
        knowFaq.updateKnowlagebas();
    });
}

if (knowFaq.website_faq_submit_form) {
    knowFaq.website_faq_submit_form.addEventListener("submit", (e) => {
        e.preventDefault();
        knowFaq.updateFaq();
    });
}
