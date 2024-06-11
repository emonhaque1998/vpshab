import OrderClasses from "./OrderClasses";

const order = new OrderClasses();

if (order.statusUpdateSubmitForm) {
    order.statusUpdateSubmitForm.addEventListener("submit", (e) => {
        e.preventDefault();
        order.updateStatus();
    });
}
