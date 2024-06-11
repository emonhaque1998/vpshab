import CupponClasses from "./CupponClasses";

const cuppon = new CupponClasses();

if (cuppon.cupponSubmitForm) {
    cuppon.cupponSubmitForm.addEventListener("submit", (e) => {
        e.preventDefault();
        cuppon.addCuppon();
    });
}
