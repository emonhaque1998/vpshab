import SupportClasses from "./SupportClasses";

const support = new SupportClasses();

if (support.departmentSubmitForm) {
    support.departmentSubmitForm.addEventListener("submit", (e) => {
        e.preventDefault();
        support.addDepartment();
    });
}

if (support.deleteBtn) {
    support.deleteBtn.forEach((item) => {
        item.addEventListener("click", (e) => {
            e.preventDefault();
            alert("Hi Eman, I am finaly working");
        });
    });
}

if (support.announcementSubmitForm) {
    support.announcementSubmitForm.addEventListener("submit", (e) => {
        e.preventDefault();
        support.postAnnouncement();
    });
}

if (support.messageFromAdmin) {
    support.messageFromAdmin.addEventListener("submit", (e) => {
        e.preventDefault();
        support.sendReplayForUser();
    });
}
