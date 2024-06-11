import IspClasses from "./IspClasses";

const ispClasses = new IspClasses();

if (ispClasses.ispSubmitForm) {
    ispClasses.ispSubmitForm.addEventListener("submit", (e) => {
        e.preventDefault();
        ispClasses.addIsp();
    });
}
