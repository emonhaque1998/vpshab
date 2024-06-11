import ContactClasses from "./ContactClasses";

const contact = new ContactClasses();

if(contact.contactSubmitForm){
    contact.contactSubmitForm.addEventListener("submit", (e) => {
        e.preventDefault();
        contact.submitContact();
    })
}