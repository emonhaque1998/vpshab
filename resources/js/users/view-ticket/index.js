import TicketClasses from "./TicketClasses";

const ticket = new TicketClasses();

if (ticket.replayBtn) {
    ticket.replayBtn.addEventListener("click", (e) => {
        e.preventDefault();
        ticket.replayButtonAction();
    });
}

if (ticket.replayMessage) {
    ticket.replayMessage.addEventListener("submit", (e) => {
        e.preventDefault();
        ticket.storeMessage();
    });
}
